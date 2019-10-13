<?php

include_once 'iController.php';

class HomepageController implements iController {

	public function getContentCode($model, $view){
		return $view->getCode($model);
	}

	public function getMenuCode($model){
		return '';
	}

}

?>