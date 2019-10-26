<?php

namespace Pages\Model;

class CartModel extends AbstractModel implements iModel {
	public function __construct(){
		parent::__construct(array());
	} 

	public function getProductsData($db){
		$idArray = unserialize($_COOKIE['cart']);
		$data = array();
		foreach ($idArray as $id) {
			$query = "select * from product where id=$id";
			$result = $db->executeQuery($query)->fetch();
		
			array_push($data, $result);
		}

		$this->AddDataByKey('data', $data);
	}

	public function sendCookie(){

		if(isset($_GET['add'])){
			$this->addProductToCart($_GET['add']);
			return;
		}

		if(isset($_GET['del'])){
			$this->removeProductById($_GET['del']);
			return;
		}
	}

	private function addProductToCart($productId){
		$cart_array = unserialize($_COOKIE['cart']);
		array_push($cart_array, $productId);

		$count = count($cart_array);
		setcookie('cart', serialize($cart_array));
		setcookie('count', $count);
	}

	private function removeProductById($productId){
		$cart_array = unserialize($_COOKIE['cart']);
		
		unset($cart_array[$productId]);
		$cart_array = array_values($cart_array);
		$count = count($cart_array);

		setcookie('cart', serialize($cart_array));
		setcookie('count', $count);
	}

}
