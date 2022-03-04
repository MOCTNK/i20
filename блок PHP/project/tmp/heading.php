<?php
if(!isset($get_cat_id) && !isset($get_id)) {
	$heading_name = "Категории товаров";
}

if(isset($get_cat_id) && !isset($get_id)) {
	foreach($list_category as $category) {
		if($category['id'] == $get_cat_id) {
			$heading_name = $category['name'];
			break;
		}
	}
}

if(isset($get_id)) {
	$heading_name = $product['name'];
}
?>
<h2 class="store__body-header"><?= $heading_name ?></h2>