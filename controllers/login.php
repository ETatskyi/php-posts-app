<?php
require_once '../functions/functions.php';
require_once '../functions/validation.php';

session_start();

// debug($_POST);
// debug($_SERVER);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    setSessionMessage('Method not allowed', 'error');
    header('Location: '. ($_SERVER['HTTP_REFERER'] ?? '../index.php'));
    exit;
}



?>