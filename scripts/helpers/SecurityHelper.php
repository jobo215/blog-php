<?php

class SecurityHelper
{

    public static function preventUnauthorizedUsers()
    {
        if (!SessionHelper::isUserLoggedIn()) {
            ValidationHelper::setLoginError("You must be logged in to access this page!");
            header("Location: ../index.php");
        }
    }

    public static function preventUnauthorizedPostEdit($creator)
    {
        if (SessionHelper::getLoggedUserId() != $creator) {
            header("Location: ../posts/posts.php");
        }
    }

}