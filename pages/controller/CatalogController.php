<?php

namespace Pages\Controller;

use Pages\DBConnection;
use Blocks\Left;

class CatalogController implements iController{
	public function getContentCode($model, $view){
		if(isset($_GET['cat'])){
			$model->getProductsByCat(DBConnection::getInstance(), $_GET['cat']);
			return $view->getCode($model);
		}
		
	}

	public function getMenuCode($model){
		$model->getCategoriesFromDB(DBConnection::getInstance());
		$leftBlock = new Left($model->getDataByKey('menu'));
		return  $leftBlock->getCode();
	}
}

?>