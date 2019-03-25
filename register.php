<?php require 'header.php';

function validpassword($password)
{
    if (strlen($password) >= 8) {
        if (!ctype_upper($password) && !ctype_lower($password)) {
            return TRUE;
        }
    }
}
?>

<form action="loginController.php" method="post">
    <input type="hidden" name="type" value="register">
    <div class="form-group">
        <label for="username">username</label>
        <input type="text" name="username" id="username">
    </div>

    <div class="form-group">
        <label for="email">email</label>
        <input type="email" name="email" id="email">
    </div>

    <div class="form-group">
        <label for="password">password</label>
        <input type="password" name="password" id="password">
        <?php
            if (!preg_match('/^(?=[a-z])(?=[A-Z])[a-zA-Z]{8,}$/', $password))
                {
                    echo 'Password must be at least 8 characters long, must have at least 1 uppercase and lowercase letter and must have a special character.';
                } ?>
    </div>

    <div class="form-group">
        <label for="password_confirm">Please confirm your password</label>
        <input type="password" name="password_confirm" id="password_confirm">
    </div>

    <input type="submit" value="Register">
</form>

<?php require 'footer.php'; ?>

