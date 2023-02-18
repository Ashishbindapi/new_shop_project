<?php
    include('./app/init.php');

    $Controller = new ProductController (new ProductModel($connection));    

    if(isset($_GET['name']))
    {
    $Controller->init($_GET);
    }