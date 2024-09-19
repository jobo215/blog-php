<?php
include '../scripts/helpers/ValidationHelper.php';
SessionHelper::setSession();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Register Form</title>
    <link rel="stylesheet" href="./css/register.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="../dist/jquery.js" defer></script>
    <script src="./js/register.js" defer></script>
</head>

<body>
    <div class="register-container">
        <h2>Register</h2>
        <form action="../scripts/register.php" method="POST" id="register-form">
            <div class="form-group">

                <label for="first-name">First Name</label>
                <input type="text" id="first+name" name="first_name" required>
            </div>

            <div class="form-group">

                <label for="last-name">Last Name</label>
                <input type="text" id="last-name" name="last_name" required>
            </div>

            <div class="form-group">

                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <small class="error-message" id="password-error">Passwords do not match!</small>
            </div>

            <div class="form-group">
                <label for="re-password">Re-enter Password</label>
                <input type="password" id="re-password" name="re-password" required>
            </div>

            <?php if (isset($_SESSION['ERROR']['REGISTER_ERROR']) || isset($_SESSION['SUCCESS']['REGISTER_SUCCESS'])): ?>
                <div class="alert <?= $_SESSION['ERROR']['REGISTER_ERROR'] ? "alert-invalid" : "alert-valid" ?>">
                    <strong>Error!</strong>
                    <?= $_SESSION['ERROR']['REGISTER_ERROR'] ? $_SESSION['ERROR']['REGISTER_ERROR_MESSAGE'] : $_SESSION['SUCCESS']['REGISTER_SUCCESS_MESSAGE'] ?>
                </div>
            <?php endif ?>

            <button type=" button" id="register-button">Register</button>
        </form>
        <div class="form-footer">
            <p>You already have an account? <a href="login.php">Login</a></p>
        </div>
    </div>
</body>

</html>