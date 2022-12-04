<?php
try {
    include __DIR__ . '/../classes/User.php';
    $user = new User();

    $loggedIn = false;

    if(isset($_POST['email']) && isset($_POST['password'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == true) {
            $user->email = $_POST['email'];
            $user->password = $_POST['password'];
            $loggedIn = $user->login();
            // success login redirect to home or dashboard
            if($loggedIn) {
                header('location: index.php');
            } else {
                $credentialError = 'Incorrect Email or password!';
            }
        }
        else {
            $error = 'Invalid email address!';
        }
        
        
    } 
    $title = 'Sign In';
        ob_start();
        include __DIR__ . '/../views/loginForm.php';
        $output = ob_get_clean();
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage() . ' in ' .
    $e->getFile() . ':' . $e->getLine();
}
include __DIR__ . '/../views/layout.php';