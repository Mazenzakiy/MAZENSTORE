<?php

use TechStore\Classes\Models\Product;

include "inc/header.php"; ?>

<?php
// now i need to to call id product

if ($request->getHas('id')) {
	$id = $request->get('id');
}else {
	$id=1;
}

$prod = new Product;
$pr = $prod->selectId($id,"products.id,products.name,products.desc,products.price,products.img,cats.name AS category ");

// echo"<pre>";
// print_r($pr);
// echo"</pre>";

?>

<!-- Single Product -->
<?php if (!empty($pr)) : ?>
<div class="single_product">
	<div class="container">
		<div class="row">

			<!-- Selected Image -->
			<div class="col-lg-6 order-lg-2 order-1">
				<div class="image_selected"><img src=" <?= URL . "uploads/" . $pr['img']; ?>" alt="" height="100px"></div>
			</div>

			<!-- Description -->
			<div class="col-lg-6 order-3">
				<div class="product_description">
					<div class="product_category"><?=$pr['category'];?></div>
					<div class="product_name"><?= $pr['name']; ?></div>
					<div class="product_text">
						<p><?= $pr['desc']; ?></p>
					</div>
					<div class="order_info d-flex flex-row">
						<form method="post" action="<?= URL ;?>handlers/add-cart.php">
							<div class="clearfix" style="z-index: 1000;">


							<input type="hidden" name="id" value="<?= $pr['id'] ;?>">
							<input type="hidden" name="name" value="<?= $pr['name'] ;?>">
							<input type="hidden" name="price" value="<?= $pr['price'] ;?>">
							<input type="hidden" name="img" value="<?= $pr['img'] ;?>">
							
								<!-- Product Quantity -->
								<div class="product_quantity clearfix">
									<span>Quantity: </span>
									<input id="quantity_input" name="qty" type="text" pattern="[0-9]*" value="1">
									<div class="quantity_buttons">
										<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
										<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
									</div>
								</div>

								<div class="product_price"><?= $pr['price']; ?></div>

							</div>

							<div class="button_container">
								<button type="submit" name="submit" class="button cart_button">Add to Cart</button>
							</div>

						</form>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<?php else : ?>
	<div class="single_product text-center " style="height: 450px;">
		<?=" no data fouund" ?>
	</div>
	<?php endif ;?>
<?php include "inc/footer.php"; ?>