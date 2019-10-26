<?php

namespace Pages\Controller;

class HomepageController implements iController {

	public function getContentCode($model, $view){
		return $view->getCode($model);
	}

	public function getMenuCode($model){
		return '';
	}

}
