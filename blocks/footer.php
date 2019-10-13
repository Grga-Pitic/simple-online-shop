<?php

/**
* 
*/
class Footer
{
	
	private $text;

	function __construct($inText)
	{
		$this->text = $inText;
	}

	function getCode()
	{
		return '<p>' . $this->text . '</p>';
	}
}

?>