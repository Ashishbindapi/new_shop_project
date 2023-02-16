<?php
   class ImageModel
   {
      private $conn;
      public function __construct($conn)
      {
         $this->conn = $conn;
      } 

      public function saveImage($data)
      {
         $sql = "INSERT INTO  library (file_path, file_name,  mime_type)VALUES (?,?,?)";
         $stmt = $this->conn->prepare($sql);
         $stmt->execute([$data['file']['tmp_name'],$data['file']['name'],$data['file']['type']]); 
      }
   }