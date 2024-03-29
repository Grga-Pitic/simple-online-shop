<?php

namespace Pages;

require_once 'vendor/autoload.php';  
use Pages\Router;
use Pages\DBConnection;
use Blocks\Factories\HeaderFactory;
use Blocks\Footer;

$router = new Router();

$view = $router->getView();
$controller = $router->getController();
$model = $router->getModel();

if(!isset($_COOKIE['cart'])){
	$arr = array();
	$arr = serialize($arr);
	setcookie('cart', $arr);
	setcookie('count', 0);
}


$conn = new DBConnection();

$conn = DBConnection::getInstance();
$conn->open(DB_ADDRESS, LOGIN, PASSWORD, DB_NAME);

echo $model->sendCookie();

?>

<html>
   <head>
		<title>Главная</title>
		<?php 
    	$header = HeaderFactory::create();
    	echo $header->getCode();
    	echo '<br>';
    	echo 'Корзина ('.$_COOKIE['count'].')';
   		?>
   		</head>
   	<body>

    
	<table border="1" width="100%" height="100%">
		<tr>
			<td width="160">
				
				<?php

				echo $controller->getMenuCode($model);

				?>

			</td>
			<td>
				<?php 

				echo $controller->getContentCode($model, $view);

				?>
			</td>
			<td width="160"><!-- подушка --></td>
		</tr>
		<tr height="100">
			<td></td>
			<td align="right"><?php 
					$footer = new Footer('Все права защищены (нет).');
					echo $footer->getCode();
					?>
			</td>
			<td></td>
		</tr>
	</table>
   </body>
</html>
