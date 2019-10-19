<?php

namespace Pages\Controller;

use Pages\DBConnection;

class CartController implements iController {
	public function getContentCode($model, $view) {
		$db = DBConnection::getInstance();
		$model->getProductsData($db);
		return $view->getCode($model);
	}


	public function getMenuCode($model) {
		return '';
	}
}

?>