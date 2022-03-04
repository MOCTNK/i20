<div class="store__body">
	<?php 
		include "./tmp/heading.php";
		include "./tmp/breadcrumbs.php";
	?>
	<div class="product">
	<div class="product__preview">
		<div class="product__slaider">
			<?php 
				for($i = 0; $i < count($images); $i++) {
			?>
			<img id="slaider-image-<?php echo $i + 1;?>" class="product__slaider-image" src="images/products/<?= $images[$i]['name'] ?>" alt="<?= $product['name']?>" />
			<?php 
				}
			?>
		</div>
		<img id="product" class="product__item" src="images/products/<?= $product['image'] ?>" alt="<?= $product['name']?>"/>
	</div>
	<div class="product__description">
		<div class="product__categories">
			<a class="product__categories-name" href="/?cat_id=<?= $product['id_category']?>"><?= $product['category']?></a>
			<?php 
				foreach($categories as $category) {
			?>
			<a class="product__categories-name" href="/store.php?cat_id=<?= $category['id'] ?>"><?= $category['name']?></a>
			<?php 
				}
			?>
		</div>
		<div class="product__price">
			<div class="product__price-actual">
				<?php 
					if($product['sale'] != 0) {
						$sale = (int)($product['price'] * (100 - $product['sale']) / 100);
				?>
				<span class="product__price-old"><?= $product['price']?></span>
				<?php 
					} else {
						$sale = $product['price'];
					}
				?>
				<span class="product__price-current price"><?= $sale ?></span>
			</div>
			<div class="product__price-discount">
				<span class="product__price-sale price"><?= $product['price_promocode']?></span>
				<span class="product__price-code">- с промокодом</span>
			</div>
		</div>
		<div class="product__counter">
			<button id="counter-minus" class="product__counter-button">-</button>
			<input id="counter-count" class="product__counter-count" type="text" value="1" readonly />
			<button id="counter-plus" class="product__counter-button">+</button>
		</div>
		<div class="product__action">
			<button id="buy" class="custom-button custom-button--blue">Купить</button>
			<button class="custom-button">В избранное</button>
		</div>
		<div class="product__text"><?= $product['info']?></div>
	</div>
</div>
</div>