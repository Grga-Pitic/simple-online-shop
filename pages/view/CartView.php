<?php

namespace Pages\View;

class CartView implements iView {
	public function getCode($model){
		$data = $model->getDataByKey('data');
		if($_COOKIE['count'] == 0){
			return '<p>Корзина пуста</p>';
		}
		$code = '';

		foreach ($data as $key => $value) {
			$code .= '<p>' . $value['name'] . "<a href=\"cart?del=$key\">Удалить элемент</a>". '</p>';
		}

		return $code;
	}
}

?>