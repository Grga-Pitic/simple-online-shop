<?php

include_once 'abstractModel.php';
include_once 'iModel.php';

class CatalogModel extends AbstractModel implements iModel {

	public function __construct(){
		parent::__construct(array('test'));
	}

	private $categories;
	private $currentCategory;
	private $currentProduct;

	public function getProductsByCat($db, $category){
		$query = "select `name`, `description`, `price`, `discount`, `picture` from product where cat_id in (select id from category where address = \"$category\")";
		// $query = "select `name`, `description`, `price`, `discount`, `picture` from product";
		$result = $db->executeQuery($query);

		$product_data = array();

		while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			array_push($product_data, $row); // добавляем инфу о продукте в массив
		}

		$this->AddDataByKey('products', $product_data);
	}

	public function getCategoriesFromDB($db){
		$query = 'select `name`, `address` from category';
		$result = $db->executeQuery($query);

		$categories = array();

		while ($row = mysql_fetch_array($result)) {
			$categories['?cat=' . $row['address']] = $row['name'];
		}

		$this->AddDataByKey('menu', $categories);
		mysql_free_result($result);

	}

}

?>