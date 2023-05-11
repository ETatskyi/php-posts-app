<h1>Registation</h1>
<form class="my-form" action="controllers/registration.php" method="post">
    <div class="input-container">
        <input class="input" type="text" name="name" placeholder="name surname">
        <?php showFormError('name') ?>
    </div>
    <div class="input-container">
        <input class="input" type="email" name="email" placeholder="e-mail">
        <?php showFormError('email') ?>
    </div>
    <div class="input-container">
        <input class="input" type="password" name="password" placeholder="password">
        <?php showFormError('password') ?>
    </div>
    <div class="input-container">
        <input class="input" type="password" name="password_confirm" placeholder="confirm password">
        <?php showFormError('password_confirm') ?>
    </div>
        <button class="btn" type="submit">Submit</button>
</form>