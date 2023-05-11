<h1>Log in</h1>
<form action="controllers/login.php" method="post">
    <?php
    if (hasErrors('login')) {
        foreach (getSessionMessageList()['login'] as $message) {
            echo "<p class='registration__error'>" . $message . "</p>";
        }
        removeMessage('login');
    }
    ?>
    <input class="input" type="email" name="email" placeholder="e-mail">
    <input class="input" type="password" name="password" placeholder="password">
    <button class="btn" type="submit">Log in!</button>
</form>