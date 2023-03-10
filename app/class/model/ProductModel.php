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
           return  $this->conn->lastInsertId(); 
        }

        public function saveFileToDb($filePath, $fileName, $mime){
            $sql = "INSERT INTO library VALUES (NULL, ?, ?, ?)";
            $pdo = $this->conn->prepare($sql);
            $pdo->execute([$filePath, $fileName, $mime]);
            return  $this->conn->lastInsertId();
        }

        function saveId($productId,$libId)
        {
            $sql = "INSERT INTO product_to_library (product_id,library_id) VALUES (?,?)";
            $pdo = $this->conn->prepare($sql);
            $pdo->execute([$productId,$libId]);
        }
        public function getFile($fileId){
            $sql = "SELECT * FROM library WHERE lib_id = ?";
            $pdo = $this->conn->prepare($sql);
            $pdo->execute([$fileId]);
            return $pdo->fetch(PDO::FETCH_ASSOC);
        }
        Public function getproduct_to_library()
        {
            $sql = "SELECT * FROM product_to_library
            JOIN products ON product_to_library.product_id = products.id
            JOIN library ON product_to_library.library_id = library.lib_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO ::FETCH_ASSOC);
        }
    }
