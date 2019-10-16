<?php

include_once 'iView.php';

class ProductView implements iView {

	public function getCode($model) {

		$data = $model->getDataByKey('data');
		$comments = $model->getDataByKey('comments');


		$code  = '<p>';
		$code .= $data['name']; // информация о товаре
		$code .= '</p>';
		$code .= "<a href=\"cart?add={$data['id']}\">Добавить в корзину</a>";
		$code  .= '<p><b>комментарии</b>';
		if(count($comments) > 0){
			foreach ($comments as $value) {
				$code .= '<p>';
				$code .= $value['name'] . ' пишет: ' . $value['text']; // информация о товаре
				$code .= '</p>';
			}
		} else {
			$code .= '<p>Комментариев нет</p>';
		}
		
		$code .= '<p>';
		$code .= '<form name="commentform" method="POST" action="product?id=' . $data['id'] . '">
					<p>
						<b>Ваше имя:</b><br>
						<input type="text" name="name" size="40">
					</p>
					<p>Комментарий<Br>
						<textarea name="comment" cols="40" rows="3"></textarea></p>
					<p>
						<input type="submit" value="Отправить">
						<input type="reset" value="Очистить">
					</p>
				 </form>';
		return $code;
	}

	public function noSelectedCode(){
		return '<p>Товар не выбран!</p>';
	}

}

?>