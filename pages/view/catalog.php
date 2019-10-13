<?php

include_once 'iView.php';

class CatalogView implements iView {
	public function getCode($model){

		$productsData = $model->getDataByKey('products'); // получаем массив с информацией о продуктах.
		$code = '';

		foreach ($productsData as $product) {
			$code .= '<p>';
			foreach ($product as $value) {
				$code .= $value . '; ';
			}
			
			$code .= '</p>';
		}

		return "<p>$code</p>";
	}
}

?>