<?php
	require "./config/db.php";
	require "./config/query.php";
	require "./config/lib.php";
	require "./config/check-get.php";
	if(!isset($get_id)) {
		header("Location: /404.php");
	}
	$list_category = selectListCategory();
	$product = selectProduct($get_id);
	$images = selectProductImage($get_id);
	$categories = selectProductCategory($get_id);
	if(isset($get_cat_id)) {
		$error = true;
		if($get_cat_id == $product['id_category']) {
			$error = false;
		}
		foreach($categories as $category) {
			if($get_cat_id == $category['id']) {
				$error = false;
				break;
			}
		}
		if($error) {
			header("Location: /404.php");
		}
	}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title><?= $product['name']?></title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="layout">
		<div class="store">
			<?php 
				include "./tmp/menu.php";
				include "./tmp/product_info.php";
			?>
		</div>
	</div>
</body>
<script src="jquery/jquery.js"></script>
<script src="jquery/notice/dist/notice.js"></script>
<script src="jquery/main.js"></script>
</html>