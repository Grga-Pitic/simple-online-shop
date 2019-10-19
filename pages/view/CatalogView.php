<?php

namespace Pages\View;

class CatalogView implements iView {
	public function getCode($model){

		$productsData = $model->getDataByKey('products'); // получаем массив с информацией о продуктах.
		$code = '';

		foreach ($productsData as $product) {
			$productURI = '/product?id=' . $product['id']; 
			$code .= "<p><a href=$productURI>";
			foreach ($product as $value) {
				$code .= $value . '; ';
			}
			
			$code .= '</a></p>';
		}

		return "<p>$code</p>";
	}
}

?>