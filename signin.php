<?php

require_once __DIR__ . '/functions/functions.php';

if (session_status() !== PHP_SESSION_ACTIVE) session_start();


include __DIR__ . './parts/_header.php';

include __DIR__ . './parts/_login_form.php';

include __DIR__ . './parts/_footer.php';
?>