<?php

include_once '/pages/model/iModel.php';

abstract class AbstractModel implements iModel {

	private $data;

	public function __construct($data){
		$this->data = $data;
	}

	public function getDataByKey($key){
		return $this->data[$key];
	}

	protected function AddDataByKey($key, $data){
		$this->data[$key] = $data;
	}

	public function sendCookie(){
		
	}
}

?>