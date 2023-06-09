<?php
require_once __DIR__ . '/../functions/functions.php';
require_once __DIR__ . '/../functions/validation.php';
require_once __DIR__ . '/CONSTANTS.php';
require_once __DIR__ . '/database.php';

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    setSessionMessage('Method not allowed', 'error');
    header('Location: ' . (DOMAIN . '/index.php'));
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

    clearSavedFormData();
    saveFormData('registration', $_POST);
    header("Location: " . (DOMAIN . '/signup.php'));
} else {
    //connect to database
    $name = $_POST['name'];
    $email = $_POST['email'];

    if (!isEmailExists($connect, $email)) {
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        registerUser($connect, ['name' => $name, 'email' => $email, 'password' => $password]);

        setAuth(true);
        clearSavedFormData();
    } else {
        setSessionMessage(['registration_failed:' => ['email already exists']]);
        header("Location: " . (DOMAIN . '/signup.php'));
    }
};
