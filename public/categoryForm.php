<?php
try {

    include __DIR__ . '/../classes/Category.php';
    include __DIR__ . '/../classes/User.php';

    $category = new Category();
    $user = new User();

    $loggedIn = false;
    if($_SESSION) {
        $loggedIn = $user->loggedIn($_SESSION['email'], $_SESSION['password']);
    } else {
         header('location: categories.php');
    }

    if (isset($_POST['CategoryName'])) {
        $category->name = $_POST['CategoryName'];
        $category->description = $_POST['Description'];

        if (!empty($_POST['CategoryID'])) {
            $category->updateCategory($_POST['CategoryID']);
        } else {
            $category->saveCategory();
        }

        header('location: categories.php');
    } else {
        
        if (isset($_GET['id'])) {
            $category = $category->findCategory('CategoryID', $_GET['id']) ?? null;
        }
        else {
            $category = null;
        }

        $title = 'Category Form';
        ob_start();
        include __DIR__ . '/../views/categoryForm.php';
        $output = ob_get_clean();
    }
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage() . ' in ' .
    $e->getFile() . ':' . $e->getLine();
}
include __DIR__ . '/../views/layout.php';