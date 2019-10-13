<?php

include_once '/pages/model/iModel.php';
include_once '/pages/model/abstractModel.php';

class PageNotFoundModel extends AbstractModel implements iModel  {

	private $data;

	public function __construct(){
		parent::__construct(array('text' => 'страница не найдена. код ошибки 404'));
	} 


	public function getName(){
		return '404';
	}

}

?>