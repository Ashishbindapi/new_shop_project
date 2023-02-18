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
      public function init($data)
      {
          switch ($data['name']) {
              case 'uploadFile' :
                  $this->saveFiles();
                  break;
              case 'downloadFile' :
                  $this->downloadFile($data['fileId']);
                  break;
          }
      }
  
      public function downloadFile($fileId)
      {
          $file = $this->model->getFile($fileId);
          $name = $file['file_name'];
          $mime = $file['mime_type'];
          $filePath = __DIR__ . '/../../../' . $file['file_path'];
          // Set headers for image file
          header("Content-Type: " . $mime);
          header("Content-Disposition: attachment; filename=" . $name);
          ob_clean();
          flush();
          // Output image file to client
          readfile($filePath);
          exit;
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
     public function getproduct_to_library()
    {
        return $this->model->getproduct_to_library();
    }
    }