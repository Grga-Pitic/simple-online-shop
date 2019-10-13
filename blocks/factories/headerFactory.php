<?php

include_once '/blocks/header.php';

/**
* 
*/
class HeaderFactory 
{
	
	public static function create(){
		$horMenuArray = array();
		$horMenuArray['index'] = 'Главная'; 
		$horMenuArray['news'] = 'Новости';
		$horMenuArray['catalog'] = 'Каталог';
		$horMenuArray['contact'] = 'Контакты';
		$horMenuArray['auth'] = 'Авторизация';

		$header = new Header($horMenuArray, 'images/logo.jpeg'); // only hardcode!

		return $header;
	}
}

?>