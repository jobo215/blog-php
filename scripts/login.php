<?php

include './helpers/UserHelper.php';
include './helpers/SessionHelper.php';
include './helpers/RedirectionHelper.php';
include './helpers/ValidationHelper.php';

if (isset($_POST) && isset($_POST['username']) && isset($_POST['password'])) {
    $user = UserHelper::login($_POST['username'], $_POST['password']);
    if ($user != null) {
        SessionHelper::setUserLoggedIn($user->getId());
        ValidationHelper::hideLoginError();
        header("Location: ../posts/posts.php");
    } else {
        ValidationHelper::setLoginError("Invalid username or password. Please try again!");
        header("Location: ../public/login.php");
    }
}