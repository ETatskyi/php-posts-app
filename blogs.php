<?php

require_once __DIR__ . '/functions/functions.php';
require_once __DIR__ . '/controllers/CONSTANTS.php';

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

if (!checkAuth()){
    header('Location:' . $DOMAIN);
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Registation</title>
</head>

<body>

    <?php
    include __DIR__ . './parts/_header.php';
    ?>
    <?php
    include __DIR__ . './parts/_blogs_content.php';
    ?>



</body>

</html>