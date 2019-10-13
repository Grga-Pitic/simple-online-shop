<?php

include_once '/pages/view/iView.php';

class PageNotFoundView implements iView {
	public function getCode($model){
		$text = $model->getDataByKey('text');
		$code = "<p>$text</p>";
		return $code;
	}

}

?>