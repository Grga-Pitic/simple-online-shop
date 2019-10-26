<?php

namespace Pages\Model;

class PageNotFoundModel extends AbstractModel implements iModel  {

	public function __construct(){
		parent::__construct(array('text' => 'страница не найдена. код ошибки 404'));
	} 


	public function getName(){
		return '404';
	}

}
