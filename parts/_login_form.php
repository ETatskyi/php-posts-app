<link rel="stylesheet" href="../assets/forms.css">
<h1>Log in</h1>
<form action="controllers/login.php" method="post">
    <div class="input-container">
        <input class="input" type="email" name="email" placeholder="e-mail" value="<?=getFormData('login','email') ?>">
        <?php showFormError('email') ?>
    </div>
    <div class="input-container">
        <input class="input" type="password" name="password" placeholder="password" value="">
        <?php showFormError('password') ?>
    </div>
    <div class="input-container">
        <button class="button primary-button" type="submit">Log in!</button>
        <?php showFormError('login_failed:') ?>
    </div>
</form>