<?php

namespace Pages;

DEFINE( 'MODEL_PATH', 'pages/model/' );
DEFINE( 'VIEW_PATH', 'pages/view/' );
DEFINE( 'CONTROL_PATH', 'pages/controller/' );

/**
* 
*/
class Router
{

	public function getModel(){ 

		return $this->create(MODEL_PATH, 'Model');

	}

	public function getView(){

		return $this->create(VIEW_PATH, 'View');

	}

	public function getController(){
		return $this->create(CONTROL_PATH, 'Controller');
	}

	private function create($path, $type){
		$pageName = $this->getRoute();
		$className = "Pages\\$type\\" . $pageName . $type; 
		$classPath = $path . $pageName . $type . '.php';

	//	return $classPath;

		if(file_exists($classPath)){      // если файл с классом существует
			// include_once $classPath;      // подключаем файл и возвращаем объект.
			$newObject = new $className(); 
			return $newObject;
		}

		// include_once $path . '404.php';
		$notFoundClass = "Pages\\$type\\PageNotFound" . $type;
		return new $notFoundClass();
	}

	private function getRoute(){
		if(empty($_GET['route'])){
			return 'Homepage';
		}		

		if($_GET['route'] == 'index'){
			return 'Homepage';
		}

		return $_GET['route'];
	}

}
