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
			<?php foreach($data as $key => $value){?>
				<!-- Single Product -->
				<div class="col-md-6 col-lg-4 col-xl-3">
					<a href="?products=<?php echo $value ['id']; ?>">
						<div id="product-1" class="single-product">
							<div class="part-1">
							</div>
							<div class="part-2">
								<h3 class="product-title"><?php echo $value ['name']; ?></h3>
								<h4 class="product-price"><?php echo $value['description']; ?></h4>
							</div>
						</div>
					</a>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
<?php  include('./thems/footer.php');?>
