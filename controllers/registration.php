<?php
require_once '../functions/functions.php';
require_once '../functions/validation.php';
require_once './CONSTANTS.php';

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    setSessionMessage('Method not allowed', 'error');
    header('Location: ' . ($DOMAIN . '/index.php'));
    exit;
}

$errors = validate($_POST, [
    'name' => 'required|min_length[3]|max_length[15]',
    'email' => 'required|min_length[3]|email',
    'password' => 'required|password|min_length[8]|max_length[16]',
    'password_confirm' => 'required|password_confirm',
]);

if ($errors) {
    foreach ($errors as $field => $fieldErrors) {
        setSessionMessage([$field => $fieldErrors]);
    }
    header("Location: " . ($DOMAIN . '/signup.php'));
} else {
    //todo connect to database
    setAuth();
};



