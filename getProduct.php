<?php
	include('./app/init.php');
    $productcontroller = new ProductController(new ProductModel($connection));
    $most = $productcontroller-> getproduct_to_library();
    if(isset($_GET['product_id']))
    {
        $data = $productcontroller->Products($_GET['product_id']);
    }else{
        $data = $productcontroller->getProduct();
    }

    