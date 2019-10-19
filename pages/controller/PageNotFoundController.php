<?php

namespace Pages\Controller;

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