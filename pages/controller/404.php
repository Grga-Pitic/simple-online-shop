<?php

include_once 'pages/controller/iController.php';

/**
*  
*/
class PageNotFoundController implements iController {
	
	public function getContentCode($model, $view){
		return $view->getCode($model);
	}


	public function getMenuCode($model){
		return '';
	}


}

?>