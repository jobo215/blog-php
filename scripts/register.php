<?php

include './helpers/UserHelper.php';
include './helpers/ValidationHelper.php';
include './helpers/RedirectionHelper.php';

if (isset($_POST) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
    if (UserHelper::getUserByUsername($_POST['username']) == null) {
        if (UserHelper::createUser($_POST['first_name'], $_POST['last_name'], $_POST['username'], $_POST['email'], $_POST['password']) != null) {
            ValidationHelper::setRegistrationSuccessMessage("User created successfully!");
            RedirectionHelper::redirectToRegisterPage();
        } else {
            ValidationHelper::setRegisterError("Error creating new user!");
            RedirectionHelper::redirectToRegisterPage();
        }
    } else {
        ValidationHelper::setRegisterError("User with entered username already exists!");
        RedirectionHelper::redirectToRegisterPage();
    }
} else {
    ValidationHelper::setRegisterError("All fields must be populated!");
    RedirectionHelper::redirectToRegisterPage();
}
