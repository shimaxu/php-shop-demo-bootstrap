<?php
try {
    include __DIR__ . '/../classes/User.php';
    $user = new User();

    $loggedIn = false;

    if(isset($_POST['email']) && isset($_POST['password'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == true) {
            $user->email = $_POST['email'];
            $user->password = $_POST['password'];
            $registered = $user->register();
            // register succesful redirect to login
            if($registered) {
                $success = 'User Registration successful!';
            } else {
                $error = 'Email already exists!';
            }
        }
        else {
            $error = 'Invalid email address!';
        }
        
        
    } 
    $title = 'Sign up';
        ob_start();
        include __DIR__ . '/../views/registerForm.php';
        $output = ob_get_clean();
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage() . ' in ' .
    $e->getFile() . ':' . $e->getLine();
}
include __DIR__ . '/../views/layout.php';