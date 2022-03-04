<div class="store__body">
	<?php 
		include "./tmp/heading.php";
		include "./tmp/breadcrumbs.php";
	?>
	<div class="store__list-space">
		<?php
		foreach($list_products as $product) {
			?>
			<a href="/product.php<?= "?cat_id=".$get_cat_id."&id=".$product['id'] ?>">
				<div class="store__product">
					<img class="store__product-image" src="/images/products/<?= $product['image']?>" alt="<?= $product['name'] ?>">
					<div class="store__product-info">
						<h3 class="store__product-head"><?= $product['name'] ?></h3>
						<div class="store__price">
							<?php 
							if($product['sale'] != 0) {
								$sale = (int)($product['price'] * (100 - $product['sale']) / 100);
								?>
								<span class="store__price-old"><?= $product['price'] ?></span>
								<?php 
							} else {
								$sale = $product['price'];
							}
							?>
							<span class="store__price-current price"><?= $sale ?></span>
						</div>
					</div>
				</div>
			</a>
			<?php 
		}
		?>
	</div>
	<?php 
	include "./tmp/pages_slaider.php";
	?>
</div>