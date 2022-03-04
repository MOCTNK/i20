<?php
	require "./config/db.php";
	require "./config/query.php";
	require "./config/lib.php";
	require "./config/check-get.php";
	if(!empty($_GET)) {
		header("Location: /404.php");
	}
	$list_category = selectListCategory();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Категории товаров</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="layout">
		<div class="store">
			<?php 
				include "./tmp/list_categories.php";
			?>
		</div>
	</div>
</body>
</html>