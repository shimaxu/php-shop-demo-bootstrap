<?php

try {
    include __DIR__ . '/../classes/Home.php';
    include __DIR__ . '/../classes/User.php';

    $home = new Home();
    $user = new User();

    $loggedIn = false;
    if($_SESSION) {
        $loggedIn = $user->loggedIn($_SESSION['email'], $_SESSION['password']);
    }

    $productCount = $home->getProductCount();
    $categoryCount = $home->getCategoryCount();

    $title = 'Home';

    ob_start();

    include  __DIR__ . '/../views/home.php';

    $output = ob_get_clean();

} catch (PDOException $e) {
    $title = 'An error has occurred';

    $output = 'Database error: ' . $e->getMessage() . ' in ' .
    $e->getFile() . ':' . $e->getLine();
}

include  __DIR__ . '/../views/layout.php';