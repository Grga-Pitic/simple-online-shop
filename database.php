<?php 

DEFINE( 'DB_ADDRESS', '127.0.0.1' );
DEFINE( 'DB_PORT', '3306' );
DEFINE( 'DB_NAME', 'myshop' );
DEFINE( 'LOGIN', 'root' );
DEFINE( 'PASSWORD', '' );

class DBConnection {
	private static $instance;

	public function open($host, $user, $password, $database){
		$link = mysql_connect($host, $user, $password) or die('Не удалось соединиться: ' . mysql_error());
		mysql_select_db($database);
	}

	public function executeQuery($query){
		$result = mysql_query($query);
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