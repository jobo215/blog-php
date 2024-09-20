<?php

class SessionHelper
{

    public static function setSession()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public static function setUserLoggedIn($userId)
    {
        SessionHelper::setSession();
        $_SESSION['USER']['LOGGED'] = true;
        $_SESSION['USER']['ID'] = $userId;
    }

    public static function setUserLoggedOut()
    {
        SessionHelper::setSession();
        $_SESSION['USER']['LOGGED'] = false;
    }

    public static function isUserLoggedIn()
    {
        SessionHelper::setSession();
        return isset($_SESSION['USER']['LOGGED']) && $_SESSION['USER']['LOGGED'] && isset($_SESSION['USER']['ID']);
    }

    public static function getLoggedUserId()
    {
        SessionHelper::setSession();
        return $_SESSION['USER']['ID'];
    }

}