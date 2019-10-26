<?php

namespace Pages\Model;

use Pages\Model\AbstractModel;

class CatalogModel extends AbstractModel implements iModel {

	public function __construct(){
		parent::__construct(array());
	}

	private $categories;

	public function getProductsByCat($db, $category){
		$query = "select `id`, `name`, `description`, `price`, `discount`, `picture` from product where cat_id in (select id from category where address = \"$category\")";
		$result = $db->executeQuery($query)->fetchAll();

		$product_data = array();
		foreach ($result as $row) {
			array_push($product_data, $row); // добавляем инфу о продукте в массив
		}

		$this->AddDataByKey('products', $product_data);

		$this->AddDataByKey('test', 'test');
	}

	public function getCategoriesFromDB($db){
		$query = 'select `name`, `address` from category';
		$result = $db->executeQuery($query)->fetchAll();

		$categories = array();

		foreach ($result as $row) {
			$categories['?cat=' . $row['address']] = $row['name'];
		}

		$this->AddDataByKey('menu', $categories);

	}

}
