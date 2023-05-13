<link rel="stylesheet" href="../assets/forms.css">
<h1>Registation</h1>
<form class="my-form" action="controllers/registration.php" method="post">
    <div class="input-container">
        <input class="input" type="text" name="name" placeholder="name surname" value="asdasd">
        <?php showFormError('name') ?>
    </div>
    <div class="input-container">
        <input class="input" type="email" name="email" placeholder="e-mail" value="test@gmail.com">
        <?php showFormError('email') ?>
    </div>
    <div class="input-container">
        <input class="input" type="password" name="password" placeholder="password" value="12345678Aa">
        <?php showFormError('password') ?>
    </div>
    <div class="input-container">
        <input class="input" type="password" name="password_confirm" placeholder="confirm password" value="12345678Aa">
        <?php showFormError('password_confirm') ?>
    </div>
        <button class="button primary-button" type="submit">Submit</button>
</form>