<div class="store__menu">
	<h2 class="store__menu-header">Категории</h2>
	<div class="store__list-category">
		<?php
		foreach($list_category as $category) {
			?>
			<a href="/store.php?cat_id=<?= $category['id'] ?>">
				<div class="store__category <?= ($category['id'] != $get_cat_id) ?: "store__category_selected";?>">
					<div class="store__category-name"><?= $category['name'] ?></div>
					<div class="store__category-count"><?= $category['count'] ?></div>
				</div>
			</a>
			<? 
		}
		?>
	</div>
</div>