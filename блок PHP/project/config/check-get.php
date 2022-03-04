<?php 

	if(isset($_GET['cat_id'])) {
		if(empty($_GET['cat_id']) ) {
			header("Location: /404.php");
		}

		$check = intval($_GET['cat_id']);

		if(!$check) {
			header("Location: /404.php");
		}

		$get_cat_id = checkInt($_GET['cat_id']);
	}

	if(isset($_GET['id'])) {
		if(empty($_GET['id']) ) {
			header("Location: /404.php");
		}

		$check = intval($_GET['id']);

		if(!$check) {
			header("Location: /404.php");
		}

		$get_id = checkInt($_GET['id']);
	}

	if(isset($_GET['page'])) {
		if(empty($_GET['page']) ) {
			header("Location: /404.php");
		}

		$check = intval($_GET['page']);

		if(!$check) {
			header("Location: /404.php");
		}

		$get_page = checkInt($_GET['page']);
	}

?>