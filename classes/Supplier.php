<?php
require_once __DIR__ . '/Database.php';

class Supplier
{
    private $pdo;

    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->connect();
    }

    public function getSuppliers() {
        $stmt = $this->pdo->prepare('SELECT * FROM `suppliers` ORDER BY `SupplierName` ASC');
        $stmt->execute();
        return $stmt->fetchAll();
    }
}