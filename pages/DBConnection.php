<?php 

namespace Pages;

use \PDO;

DEFINE( 'DB_ADDRESS', '127.0.0.1' );
DEFINE( 'DB_PORT', '3306' );
DEFINE( 'DB_NAME', 'myshop' );
DEFINE( 'LOGIN', 'root' );
DEFINE( 'PASSWORD', '' );

class DBConnection {
	private static $instance;

	private $connection;

	public function open($host, $user, $password, $database){
		$this->connection = new PDO("mysql:host=$host;dbname=$database", $user, $password);
	}

	public function executeQuery($query){
		$result = $this->connection->query($query);
		return $result;
	}


	public static function getInstance(){
		if(is_null(self::$instance)){
			self::$instance = new DBConnection();
		}
		return self::$instance;
	}
}

?>