<?php

class SecurityHelper
{

    /**
     * Method which prevent unauthorized users to enter pages
     */
    public static function preventUnauthorizedUsers()
    {
        if (!SessionHelper::isUserLoggedIn()) {
            ValidationHelper::setLoginError("You must be logged in to access this page!");
            header("Location: ../index.php");
        }
    }

    /**
     * Method which prevent unauthorized user to edit post
     */

    public static function preventUnauthorizedPostEdit($creator)
    {
        if (SessionHelper::getLoggedUserId() != $creator) {
            header("Location: ../posts/posts.php");
        }
    }

}