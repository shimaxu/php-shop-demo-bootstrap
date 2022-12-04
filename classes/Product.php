<?php
require_once __DIR__ . '/Database.php';

class Product
{
    private $pdo;
    public $name;
    public $supplierId;
    public $categoryId;
    public $unit;
    public $price;

    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->connect();
    }

    public function getProducts() {
        $stmt = $this->pdo->prepare('SELECT * FROM `products` ORDER BY `ProductID` DESC');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getTotal() {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) FROM `products`');
        $stmt->execute();
        $row = $stmt->fetch();
        return $row[0];
    }

    public function saveProduct() {
        $query = 'INSERT INTO `products` (`ProductName`, `SupplierID`, `CategoryID`, `Unit`, `Price`)
        VALUES(:ProductName, :SupplierID, :CategoryID, :Unit, :Price)';

        $values = [
            ':ProductName' => $this->name,
            ':SupplierID' => $this->supplierId,
            ':CategoryID' => $this->categoryId,
            ':Unit' => $this->unit,
            ':Price' => $this->price,
        ];
        
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($values);
    }

    public function findProduct($column, $value) {
        $query = 'SELECT * FROM `products` WHERE `' . $column . '` =:value';
        
        $values = [
        ':value' => $value
        ];

        $stmt = $this->pdo->prepare($query);
        $stmt->execute($values);
        return $stmt->fetch();
    }

    public function updateProduct($productId) {
        $query = 'UPDATE `products` SET
                `ProductName` = :ProductName,
                `SupplierID` = :SupplierID,
                `CategoryID` = :CategoryID,
                `Unit` = :Unit,
                `Price` = :Price
                WHERE `ProductID` = :ProductID';

        $values = [
            ':ProductName' => $this->name,
            ':SupplierID' => $this->supplierId,
            ':CategoryID' => $this->categoryId,
            ':Unit' => $this->unit,
            ':Price' => $this->price,
            ':ProductID' => $productId,
        ];

        $stmt = $this->pdo->prepare($query);
        $stmt->execute($values);
    }

    public function deleteProduct($productId) {
        $values = [
        ':ProductID' => $productId,
        ];

        // delete order details
        $deleteOrderDetailsQuery = 'DELETE FROM order_details WHERE ProductID = :ProductID';
        $stmt = $this->pdo->prepare($deleteOrderDetailsQuery);
        $stmt->execute($values);

        // delete products
        $deleteProductQuery = 'DELETE FROM `products` WHERE `ProductID` =:ProductID';
        $stmt = $this->pdo->prepare($deleteProductQuery);
        $stmt->execute($values);
    }
}