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
			<?php foreach($most as $values) { ?> 
				<!-- Single Product -->
				<div class="col-md-6 col-lg-4 col-xl-3">
				<a href="?product=<?php echo $values['id'] ?>">
					<img class="img-fluid" src="files.php?name=downloadFile&fileId=<?php echo $values['lib_id']; ?>" width="250">
					<div id="product-1" class="single-product">
						<div class="part-2">
							<h3 class="product-title"> <?php echo $values['name'] ?> </h3>
							<h4 class="product-price"><?php echo $values['description'] ?> </h4>
						</div>
					</div>
					</a>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
<?php  include('./thems/footer.php');?>
