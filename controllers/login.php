<?php
require_once '../functions/functions.php';
require_once '../functions/validation.php';
require_once './CONSTANTS.php';

session_start();

// debug($_POST);
// debug($_SERVER);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    setSessionMessage('Method not allowed', 'error');
    header('Location: '. ($DOMAIN . 'index.php'));
    exit;
}



?>