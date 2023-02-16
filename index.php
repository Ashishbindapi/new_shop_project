<?php
	include('./getProduct.php');
    include('./thems/header.php');
	?>
<section class="section-products">
	<div class="container">
		<div class="row justify-content-center text-center">
			<div class="col-md-8 col-lg-6">
				<div class="header">
					<h3>Featured Product</h3>
					<h2>Popular Products</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<?php foreach($data as $product){ ?>
					<div class="col-md-6 col-lg-4 col-xl-3">
						<div id="product-4" class="single-product">
							<a href="http://dev7.pro/new_shop_project/index.php?product_id=<?php echo $product['id'] ?>">
								<div class="part-1">
									<span class="new">new</span>
								</div>
							</a>
							<div class="part-2">
								<h3 class="product-title"><?php echo $product['name'] ?></h3>
							</div>
						</div>
					</div>
			<?php } ?>
		</div>
	</div>
</section>
<?php  include('./thems/footer.php');?>
