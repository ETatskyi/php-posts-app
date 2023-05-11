<?php
require_once '../functions/functions.php';
require_once '../functions/validation.php';

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    setSessionMessage('Method not allowed', 'error');
    header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? '../index.php'));
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
    header("Location: " . ($_SERVER['HTTP_REFERER'] ?? '../signup.php'));
} else {
};


