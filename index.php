<?php

include_once '/pages/router.php';
include_once '/database.php';

$router = new Router();

$model = $router->getModel();
$view = $router->getView();
$controller = $router->getController();

$conn = DBConnection::getInstance();
$conn->open(DB_ADDRESS, LOGIN, PASSWORD, DB_NAME);

?>

<html>
   <head>
		<title>Главная</title>
		<?php 
    	include_once '/blocks/factories/headerFactory.php';
    	$header = HeaderFactory::create();
    	echo $header->getCode();
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
			      	include_once '/blocks/footer.php';
					$footer = new Footer('Все права защищены.');
					echo $footer->getCode();
					?>
			</td>
			<td></td>
		</tr>
	</table>
   </body>
</html>
