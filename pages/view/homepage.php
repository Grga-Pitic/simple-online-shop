<?php

include_once 'iView.php';

class HomepageView implements iView {
	public function getCode($model){
		$text = $model->getDataByKey('text');
		$code = "<p>$text</p>";
		return $code;
	}
}

?>