<div class="breadcrumbs">
	<a href="/">
		<span class="breadcrumbs__name">Категории</span>
	</a>
	<?php
	if(isset($get_cat_id)) {
		foreach($list_category as $category) {
			if($category['id'] == $get_cat_id) {
				$breadcrumb_name = $category['name'];
				?>
				<a href="/store.php?cat_id=<?= $get_cat_id?>">
					<span class="breadcrumbs__name next"><?= $breadcrumb_name?></span>
				</a>
				<?php
				break;
			}
		}
	} else {
		if(isset($get_id)) {
			$breadcrumb_name = $product['category'];
			?>
			<a href="/store.php?cat_id=<?= $product['id_category'] ?>">
				<span class="breadcrumbs__name next"><?= $breadcrumb_name?></span>
			</a>
			<?php 
		}
	}
	?>
	<?php 
	if(isset($get_id)) {
		$breadcrumb_name = $product['name'];
		?>
		<a href="/product.php?id=<?= $get_id ?>">
			<span class="breadcrumbs__name next"><?= $breadcrumb_name?></span>
		</a>
		<?php
	}
	include "./tmp/back.php";
	?>
</div>