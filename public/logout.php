<?php
try {
    include __DIR__ . '/../classes/User.php';
    $user = new User();

    $user->logout();

    header('location: index.php');
    
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage() . ' in ' .
    $e->getFile() . ':' . $e->getLine();
}