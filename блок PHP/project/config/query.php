<?php 

	function selectListCategory() {
		global $link;
		$sql = 'SELECT category.id, category.name, COUNT(category.name) AS count, 
				image.name AS image FROM category
				JOIN product_category ON product_category.id_category = category.id
				JOIN product ON product.id = product_category.id_category
				JOIN image ON image.id = category.id_image
				JOIN warehouse ON warehouse.id_product = product.id
				WHERE warehouse.count > 0
				GROUP BY category.id, category.name
				UNION
				SELECT category.id, category.name, COUNT(category.name) AS count, 
				image.name AS image FROM category
				JOIN product ON product.id_category = category.id
				JOIN image ON image.id = category.id_image
				JOIN warehouse ON warehouse.id_product = product.id
				WHERE warehouse.count > 0
				GROUP BY category.id, category.name
				ORDER BY count DESC';

		if(!$result = mysqli_query($link, $sql)) {
			return false;
		}

		$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);

		return $data;
	}

	function selectListProducts($cat_id, $page) {
		global $link;
		$sql = 'SELECT DISTINCT product.id, product.name, image.name AS image, product.price, product.sale FROM product
				JOIN image ON image.id = product.id_image
				JOIN product_category ON product_category.id_product = product.id
				JOIN category ON category.id = product_category.id_category OR category.id = product.id_category
				JOIN warehouse ON warehouse.id_product = product.id
				WHERE warehouse.count > 0 AND category.id = '.$cat_id.'
				LIMIT 12 OFFSET '.$page;

		if(!$result = mysqli_query($link, $sql)) {
			return false;
		}

		$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);

		return $data;
	}

	function selectProduct($id) {
		global $link;
		$sql = 'SELECT product.id, product.name, image.name AS image, product.id_category, category.name AS category, 
				product.price, product.sale, product.price_promocode, product.info FROM product
				JOIN image ON image.id = product.id_image
				JOIN category ON category.id = product.id_category
				JOIN warehouse ON warehouse.id_product = product.id
				WHERE warehouse.count > 0 AND product.id = '.$id;

		if(!$result = mysqli_query($link, $sql)) {
			return false;
		}

		$data = mysqli_fetch_assoc($result);
		mysqli_free_result($result);

		return $data;
	}

	function selectProductImage($id) {
		global $link;
		$sql = 'SELECT image.name FROM product_image
				JOIN image ON image.id = product_image.id_image
				JOIN product ON product.id = product_image.id_product
				WHERE product.id = '.$id;

		if(!$result = mysqli_query($link, $sql)) {
			return false;
		}

		$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);

		return $data;
	}

	function selectProductCategory($id) {
		global $link;
		$sql = 'SELECT category.id, category.name FROM product_category
				JOIN category ON category.id = product_category.id_category
				JOIN product ON product.id = product_category.id_product
				WHERE product.id = '.$id;

		if(!$result = mysqli_query($link, $sql)) {
			return false;
		}

		$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);

		return $data;
	}
?>