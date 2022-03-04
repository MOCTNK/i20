<?php 
foreach($list_category as $category) {
	if($category['id'] == $get_cat_id) {
		$count_product = $category['count'];
		break;
	}
} 
if($count_product > 12) {
	?>
	<div class="pages-slaider">
		<?php 
		for($i = 0 ; $i < ceil($count_product / 12); $i++) {
			$url = "/store.php?cat_id=".$get_cat_id."&page=".($i + 1);
			?>
			<a href="<?= $url ?>">
				<div class="pages-slaider__page"><?= $i + 1?></div>
			</a>
			<?php 
		}
		?>
	</div>
	<?php 
}
?>