<?php
	include('./app/init.php');
    
    $imagecontroller = new ImageController(new ImageModel($connection));   
    	if(isset($_POST['upload'])){
    		$file_name = $_FILES['file']['name'];
    		$file_temp = $_FILES['file']['tmp_name'];
    		$file_size = $_FILES['file']['size'];
    		$file_type = $_FILES['file']['type'];
    		$imagecontroller->saveImage($_FILES);
    		$location="uploaded_pic/".$file_name;
    		move_uploaded_file($file_temp, $location);
    	}
    ?>
    <div class="col-md-3">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Upload here</label>
                <input name="file" type="file"  required="required" class="form-control"/>
            </div>
            <button class="btn btn-primary" name="upload">Upload</button>
        </form>
    </div>