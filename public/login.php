<?php
include '../scripts/helpers/SessionHelper.php';
include '../scripts/helpers/ValidationHelper.php';
SessionHelper::setSession();
ValidationHelper::hideLoginMessageOnRedirect();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="../scripts/login.php" method="POST">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <?php if (isset($_SESSION['ERROR']['LOGIN_ERROR']) && $_SESSION['ERROR']['LOGIN_ERROR']): ?>
                <div class="alert alert-invalid">
                    <strong>Error!</strong> Invalid username or password. Please try again!
                </div>
            <?php endif ?>
            <button type="submit">Login</button>
        </form>
        <div class="form-footer">
            <p>Don't have an account? <a href="register.php">Register</a></p>
        </div>
    </div>
</body>

</html>