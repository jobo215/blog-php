<?php

include './helpers/UserHelper.php';
include './helpers/SessionHelper.php';
include './helpers/RedirectionHelper.php';
include './helpers/ValidationHelper.php';

if (isset($_POST) && isset($_POST['username']) && isset($_POST['password'])) {
    if (UserHelper::login($_POST['username'], $_POST['password']) != null) {
        SessionHelper::setUserLoggedIn();
        RedirectionHelper::redirectToPostsPage();
    } else {
        ValidationHelper::setLoginError();
        RedirectionHelper::redirectToLoginPage();
    }
}