<?php
require_once '../functions/functions.php';
require_once '../functions/validation.php';
require_once './CONSTANTS.php';
require_once './database.php';

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    setSessionMessage('Method not allowed', 'error');
    header('Location: ' . ($DOMAIN . 'index.php'));
    exit;
}

$errors = validate($_POST, [
    'email' => 'required|min_length[3]|email',
    'password' => 'required|password|min_length[8]|max_length[16]',
]);

if ($errors) {
    foreach ($errors as $field => $fieldErrors) {
        setSessionMessage([$field => $fieldErrors]);
    }

    clearSavedFormData();
    saveFormData('login', $_POST);
    header("Location: " . (DOMAIN . '/signin.php'));
} else {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if (userAuth($connect, $email, $password)) {
        clearSavedFormData();
        setAuth(true);
    } else {
        setSessionMessage(['login_failed:' => ['no user with such credentials']]);
        header("Location: " . (DOMAIN . '/signin.php'));
    }
};
