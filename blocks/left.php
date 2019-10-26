<?php

namespace Blocks;

/**
*  
*/
class Left
{
	
	private $items;

	function __construct($items)
	{
		$this->items = $items;
	}

	function getCode(){
		$verMenuCode = '';

		foreach ($this->items as $key => $value) {
			$verMenuCode .= "<a href=\"{$key}\">$value</a><br>";
		}

		return $verMenuCode;

	}
}
