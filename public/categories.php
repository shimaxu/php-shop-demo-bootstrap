<?php
try {
    include __DIR__ . '/../classes/Category.php';
    include __DIR__ . '/../classes/User.php';

    $category = new Category();
    $user = new User();
    
    $loggedIn = false;
    if($_SESSION) {
        $loggedIn = $user->loggedIn($_SESSION['email'], $_SESSION['password']);
    }

    if(isset($_POST['CategoryID'])) {
        $category->deleteCategory($_POST['CategoryID']);
    }

    $datas = $category->getCategories();
    
    $categories = [];
    foreach ($datas as $data) {
        $categories[] = [
        'id' => $data['CategoryID'],
        'name' => $data['CategoryName'],
        ];
    }

    $title = 'Categories';
    $totalCategories = $category->getTotal();
    ob_start();
    include __DIR__ . '/../views/categories.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage() . ' in ' .
    $e->getFile() . ':' . $e->getLine();
}
include __DIR__ . '/../views/layout.php';