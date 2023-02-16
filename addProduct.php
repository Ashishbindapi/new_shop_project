<?php
	include('./app/init.php');
    
    $productcontroller = new ProductController(new ProductModel($connection));
    if(isset($_POST['name']))
    {
        $productcontroller->addProduct($_POST);
        
    }
    $data = $productcontroller->getProduct();
?>
<?php include('./thems/header.php');?>
    <div class="container  mt-5 d-flex justify-content-around">
        <div class="row mt-5 border rounded">
            <form  method="post" class="mt-4 mb-3 me-2" enctype="multipart/form-data">
                <h4>Name</h4>
                    <input type="text" class="form-control" name="name" placeholder="Product name" required/><br>
                <h4>Description</h4>
                    <input type="text" class="form-control" name="description" placeholder="Description" required/><br>
                <select name="parent_id" class="mt-2 form-select" required>
                    <option>Products</option>
                    <?php foreach($data as $product){ ?>
                    <option class="form-control" value="<?php echo $product['id'];?>"><?php echo $product['name']; ?></option>
                    <?php } ?>
                </select><br>
                <input type="file" name="file" id="profile_pic">
                <button type="submit" class="btn btn-primary mt-2 mb-2">Submit</button>
            </form>
        </div>
    </div>    
<?php include('./thems/footer.php');?>