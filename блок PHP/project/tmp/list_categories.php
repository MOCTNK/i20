<div class="store__body" style="width: 100%;">
	<?php 
	include "./tmp/heading.php";
	include "./tmp/breadcrumbs.php";
	?>
	<div class="categories">
		<?php 
		foreach($list_category as $category) {
			?>
			<a href="/store.php?cat_id=<?= $category['id']?>">
				<div class="categories__card">
					<img class="categories__image" src="/images/categories/<?= $category['image']?>" alt="<?= $category['name']?>">
					<div class="categories__info">
						<div class="categories__name"><?= $category['name']?></div>
						<div class="categories__count"><?= $category['count']?></div>
					</div>
				</div>
			</a>
			<?php 
		}
		?>
	</div>
</div>