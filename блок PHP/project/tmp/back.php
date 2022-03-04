<?php

if(isset($get_cat_id) && !isset($get_id)) {
	$url = "/";
}

if(isset($get_cat_id) && isset($get_id)) {
	$url = "/store.php?cat_id=".$get_cat_id;
}

if(!isset($get_cat_id) && isset($get_id)) {
	$url = "/store.php?cat_id=".$product['id_category'];
}

if(!(!isset($get_cat_id) && !isset($get_id))) {
	?>
	<a href="<?= $url?>">
		<span class="store__back back">Назад</span>
	</a>
	<?php
}
?>