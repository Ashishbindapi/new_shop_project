<?php
	include('./app/init.php');
    $productcontroller = new ProductController(new ProductModel($connection));

    if(isset($_GET['product_id']))
    {
        $data = $productcontroller->Products($_GET['product_id']);
    }else{
        $data = $productcontroller->getProduct();
    }

    