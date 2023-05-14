<link rel="stylesheet" href="../assets/forms.css">
<h1>Registation</h1>
<form class="my-form" action="controllers/registration.php" method="post">
    <div class="input-container">
        <input class="input" type="text" name="name" placeholder="name surname" value="<?=getFormData('registration','name') ?>">
        <?php showFormError('name') ?>
    </div>
    <div class="input-container">
        <input class="input" type="email" name="email" placeholder="e-mail" value="<?=getFormData('registration','email') ?>">
        <?php showFormError('email') ?>
    </div>
    <div class="input-container">
        <input class="input" type="password" name="password" placeholder="password" value="">
        <?php showFormError('password') ?>
    </div>
    <div class="input-container">
        <input class="input" type="password" name="password_confirm" placeholder="confirm password" value="">
        <?php showFormError('password_confirm') ?>
    </div>
    <div class="input-container">
        <button class="button primary-button" type="submit">Submit</button>
        <?php showFormError('registration_failed:') ?>
    </div>
</form>