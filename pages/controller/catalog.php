<?php

include_once 'iController.php';
include_once '/database.php';
include_once '/blocks/left.php';

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