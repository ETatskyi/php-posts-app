<?php

require_once __DIR__ . '/../functions/functions.php';
require_once __DIR__ . '/CONSTANTS.php';

setAuth(false);
header('Location: ' . (DOMAIN . '/index.php'));