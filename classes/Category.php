<?php
require_once __DIR__ . '/Database.php';

class Category
{
    private $pdo;
    public $name;
    public $description;

    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->connect();
    }

    public function getCategories() {
        $stmt = $this->pdo->prepare('SELECT * FROM `categories` ORDER BY `CategoryID` DESC');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getTotal() {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) FROM `categories`');
        $stmt->execute();
        $row = $stmt->fetch();
        return $row[0];
    }

    public function saveCategory() {
        $query = 'INSERT INTO `Categories` (`CategoryName`, `Description`)
        VALUES(:CategoryName, :Description)';

        $values = [
            ':CategoryName' => $this->name,
            ':Description' => $this->description,
        ];
        
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($values);
    }

    public function findCategory($column, $value) {
        $query = 'SELECT * FROM `categories` WHERE `' . $column . '` =:value';
        
        $values = [
        ':value' => $value
        ];

        $stmt = $this->pdo->prepare($query);
        $stmt->execute($values);
        return $stmt->fetch();
    }

    public function updateCategory($categoryId) {
        $query = 'UPDATE `categories` SET
                `CategoryName` = :CategoryName,
                `Description` = :Description
                WHERE `CategoryID` = :CategoryID';

        $values = [
            ':CategoryName' => $this->name,
            ':Description' => $this->description,
            ':CategoryID' => $categoryId,
        ];

        $stmt = $this->pdo->prepare($query);
        $stmt->execute($values);
    }

    public function deleteCategory($categoryId) {
        $values = [
        ':CategoryID' => $categoryId,
        ];

        // update product category to null
        $query = 'UPDATE `products` SET
                `CategoryID` = null
                WHERE `CategoryID` = :CategoryID';

        $stmt = $this->pdo->prepare($query);
        $stmt->execute($values);

        // delete category
        $deleteCategoryQuery = 'DELETE FROM `categories` WHERE `CategoryID` =:CategoryID';
        $stmt = $this->pdo->prepare($deleteCategoryQuery);
        $stmt->execute($values);
    }
}