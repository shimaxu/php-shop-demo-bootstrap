<?php
try {
    include __DIR__ . '/../classes/Product.php';
    include __DIR__ . '/../classes/User.php';

    $product = new Product();

    $user = new User();
    $loggedIn = false;
    if($_SESSION) {
        $loggedIn = $user->loggedIn($_SESSION['email'], $_SESSION['password']);
    }

    if(isset($_POST['ProductID'])) {
        $product->deleteProduct($_POST['ProductID']);
    }

    $datas = $product->getProducts();
    
    $products = [];
    foreach ($datas as $data) {
        $products[] = [
        'id' => $data['ProductID'],
        'name' => $data['ProductName'],
        ];
    }

    $title = 'Products';
    $totalProducts = $product->getTotal();
    ob_start();
    include __DIR__ . '/../views/products.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage() . ' in ' .
    $e->getFile() . ':' . $e->getLine();
}
include __DIR__ . '/../views/layout.php';