<?php

require_once __DIR__ . '/functions/functions.php';
require_once __DIR__ . '/controllers/CONSTANTS.php';

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

if (!checkAuth()) {
    header('Location:' . DOMAIN);
}


include __DIR__ . './parts/_header.php';

include __DIR__ . './parts/_blogs_content.php';

if (!isset($_REQUEST['mode'])) {
    include __DIR__ . './parts/_blogs_pick_mode.php';
} else if ($_REQUEST['mode'] == 'view') {
    include __DIR__ . './parts/_blogs_view.php';
} else if ($_REQUEST['mode'] == 'add') {
    include __DIR__ . './parts/_blogs_add.php';
}

include __DIR__ . './parts/_footer.php';
