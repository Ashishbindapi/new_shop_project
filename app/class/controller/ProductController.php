<?php
    class ProductController
    {
      private $model;
      public function __construct(ProductModel $model)
      {
         $this->model = $model;
      }
      
      public function products($id)
      {
         return $this->model->product($id);
      }

      public function getProduct()
      {
         return $this->model->getproducts();
      }

      public function addProduct($data)
      {
         $productId = $this->model->addProduct($data);
         $libId =  $this->saveFiles();
         return $this->model->saveId($productId,$libId);
      }

      public function saveFiles(){
         $fileName = 'uploaded_pic/' . time() . '_' . $_FILES['file']['name'];
         if($this->storeFileToDisk($fileName, $_FILES['file']['tmp_name'])){
             $res['success'] = $this->model->saveFileToDb($fileName, $_FILES['file']['name'], $_FILES['file']['type']);
         }
         return $res['success'];
     }

     private function storeFileToDisk($fileName, $fileToMoov)
     {
         return move_uploaded_file($fileToMoov, $fileName);
     }
 
    }