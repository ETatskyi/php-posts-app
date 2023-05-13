<?php
require_once __DIR__ . '/../functions/functions.php';
require_once __DIR__ . '/../controllers/CONSTANTS.php';
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
<link rel="stylesheet" href="../assets/header.css">
<header class="header-of-page" style="top: 0px;">
    <div class="header-content">
        <a href="/" class="company-logo">
            <img src="/assets/logo.png" alt="Company logo" class="logo">
            <span>Blog app</span>
        </a>

        <div class="header-nav">
            <div class="nav-item">

            </div>
            <?= checkAuth() ? ('
                <div class="flex-block">
                <a href="/blogs.php?mode=add" class="button primary-button">Add blog</a>
                <a href="/blogs.php?mode=view" class="button primary-button">View blogs</a>
                <a href="/signout.php" class="button secondary-button">Log out</a>
                </div>
            ') : ('
                <div class="flex-block">
                <a href="/signin.php" class="button primary-button">Log in</a>
                <a href="/signup.php" class="button secondary-button">Register for Free</a>
                </div>
            ') ?>
        </div>
</header>