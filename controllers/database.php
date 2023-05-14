<?php

require_once __DIR__ . '/../functions/functions.php';
require_once __DIR__ . '/CONSTANTS.php';

try {
    $connect = new PDO(DB_DSN ,DB_USER, DB_PASSWORD,[
        PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
    ]);
} catch (PDOException $errors) {
    debug($errors);
}