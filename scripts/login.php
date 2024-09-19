<?php

include './helpers/UserHelper.php';
include './helpers/SessionHelper.php';
include './helpers/RedirectionHelper.php';
include './helpers/ValidationHelper.php';

if (isset($_POST) && isset($_POST['username']) && isset($_POST['password'])) {
    if (UserHelper::login($_POST['username'], $_POST['password']) != null) {
        SessionHelper::setUserLoggedIn();
        ValidationHelper::hideLoginError();
        header("Location: ../posts/posts.php");
    } else {
        ValidationHelper::setLoginError();
        header("Location: ../public/login.php");
    }
}