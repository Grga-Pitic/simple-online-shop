<?php

namespace Blocks;

/**
*  
*/
class Header
{
	

	private $arr;
	private $logoPath;

	public function __construct($arr, $logoPath)
	{
		$this->arr = $arr;
		$this->logoPath = $logoPath;
	}

	public function getCode()
	{
		$headerCode = '';
		foreach ($this->arr as $key => $value) { // я знаю что бессмысленно так усложнять. 
			$headerCode .= "<a href=\"/{$key}\">$value</a>";
		}
		return $headerCode;
	}

}
