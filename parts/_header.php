<?php
require_once __DIR__ . '/../functions/functions.php';
require_once __DIR__ . '/../controllers/CONSTANTS.php';
?>

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
                <div class="right-login">
                <a href="/blogs.php?mode=add" class="button primary-button">Add blog</a>
                <a href="/blogs.php?mode=view" class="button primary-button">View blogs</a>
                <a href="/signout.php" class="button secondary-button">Log out</a>
                </div>
            ') : ('
                <div class="right-login">
                <a href="/signin.php" class="button primary-button">Log in</a>
                <a href="/signup.php" class="button secondary-button">Register for Free</a>
                </div>
            ') ?>
        </div>
</header>