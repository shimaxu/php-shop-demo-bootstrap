<?php
require __DIR__ . '/Database.php';
class Home
{
    private $pdo;
    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->connect();
    }

    public function getProductCount() {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) FROM `products`');
        $stmt->execute();
        $row = $stmt->fetch();
        return $row[0];
    }

    public function getCategoryCount() {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) FROM `categories`');
        $stmt->execute();
        $row = $stmt->fetch();
        return $row[0];
    }

}