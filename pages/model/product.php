<?php

include_once 'abstractModel.php';
include_once 'iModel.php';

class ProductModel extends AbstractModel implements iModel {

	public function __construct(){
		parent::__construct(array());
	}

	public function getProductByID($db, $id){
		$query = "select `id`, `name`, `description`, `price`, `discount`, `picture` from product where id = $id"; 
		$result = $db->executeQuery($query); // получаем инфу о продукте по id.

		$data = mysql_fetch_array($result, MYSQL_ASSOC);

		$this->AddDataByKey('data', $data);
	}	

	public function getCommentsByID($db, $id){
		$query = "select name, text from comments where product_id=$id";

		$result = $db->executeQuery($query);

		$commentsArray = array();

		while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			array_push($commentsArray, $row); // добавляем инфу о продукте в массив
		}

		$this->AddDataByKey('comments', $commentsArray);
	}

	public function sendCommentToDB($db, $id){
		
		if(!isset($_POST['name'])){  // проверяет наличие необходимых парметров.
			return;
		}

		if(!isset($_POST['comment'])){
			return;
		}

		$name = $_POST['name'];
		$text = $_POST['comment'];

		$insertQuery = "insert into comments (name, text, product_id) values (\"$name\", \"$text\", $id)";
		$db->executeQuery($insertQuery);

	}

}

?>