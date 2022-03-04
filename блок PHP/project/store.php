<?php
	require "./config/db.php";
	require "./config/query.php";
	require "./config/lib.php";
	require "./config/check-get.php";
	if(!isset($get_cat_id)) {
		header("Location: /404.php");
	}
	$list_category = selectListCategory();
	if(isset($get_page)) {
		foreach($list_category as $category) {
			if($category['id'] == $get_cat_id) {
				$count_product = $category['count'];
				break;
			}
		}
		$count_pages = ceil($count_product / 12);
		if($get_page < 0 || $get_page > $count_pages) {
			header("Location: /404.php");
		}
		$page_offset = ($get_page - 1) * 12;
	} else {
		$page_offset = 0;
	}
	$list_products = selectListProducts($get_cat_id, $page_offset);
	if(isset($get_cat_id)) {
		$error = true;
		foreach($list_category as $category) {
			if((int)$category['id'] == (int)$get_cat_id) {
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
	<?php 
		foreach($list_category as $category) {
			if($category['id'] == $get_cat_id) {
				$heading_name = $category['name'];
				break;
			}
		}
	?>
	<title><?= $heading_name?></title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="layout">
		<div class="store">
			<?php 
				include "./tmp/menu.php";
				include "./tmp/list_products.php";
			?>
		</div>
	</div>
</body>
</html>