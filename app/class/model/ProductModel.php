<?php
    class ProductModel
    {
        private $conn;
        public function __construct($conn)
        {
            $this->conn = $conn;
        }

        public function getproducts()
        {
            $sql = "SELECT * FROM products WHERE parent_id=0";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function product($id)
        {
            $sql = "SELECT * FROM products WHERE id=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function addProduct($data)
        {
           $sql = "INSERT INTO products (name,description,parent_id) VALUES (?,?,?)";
           $stmt = $this->conn->prepare($sql);
           $stmt->execute([$data['name'],$data['description'],$data['parent_id']]);
        }

        public function saveFileToDb($filePath, $fileName, $mime){
            $sql = "INSERT INTO library VALUES (NULL, ?, ?, ?)";
            $pdo = $this->conn->prepare($sql);
            return $pdo->execute([$filePath, $fileName, $mime]);
        }
    }