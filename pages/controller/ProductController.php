<?php

namespace Pages\Controller;

use Pages\DBConnection;

class ProductController implements iController {

	public function getContentCode($model, $view){

		// для обработки страницы параметр id обязателен. 

		if(!isset($_GET['id'])){   // проверяет наличие параметра id
			return $view->noSelectedCode(); // если его нет возвращает сообщение о том что товар не выбран.
		}

		$productId = $_GET['id'];
		$db = DBConnection::getInstance();

		if($_SERVER['REQUEST_METHOD'] === 'POST'){ // проверяет является ли запрос POST.
			 $this->processPostRequest($db, $productId, $model); // обрабатывает его если да..
		}

		$model->getCommentsByID($db, $productId);
		$model->getProductByID($db, $productId);
		

		return $view->getCode($model);
	}

	public function getMenuCode($model){
		return '';
	}

	private function processPostRequest($db, $id, $model){
		
		$model->sendCommentToDB($db, $id);
		
	}

}
