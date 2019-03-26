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
        <input type="text" name="username" id="username" required>
    </div>

    <div class="form-group">
        <label for="email">email</label>
        <input type="email" name="email" id="email" required>
    </div>

    <div class="form-group">
        <label for="password">password</label>
        <input type="password" name="password" id="password" required>
        <?php
           ?>
    </div>

    <div class="form-group">
        <label for="password_confirm">Please confirm your password</label>
        <input type="password" name="password_confirm" id="password_confirm" required>
    </div>
    <a href="terms.php">Agree to our terms of service</a>
    <input type="checkbox" value="checked" name="checkbox" required>
    <input type="submit" value="Register">
</form>

<?php require 'footer.php'; ?>

