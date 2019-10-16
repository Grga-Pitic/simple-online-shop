<?php

include_once 'abstractModel.php';
include_once 'iModel.php';

class HomepageModel extends AbstractModel implements iModel {
	public function __construct(){
		parent::__construct(array('text' => 'Простой интернет магазин для изучения PHP.'));
	}
}

?>