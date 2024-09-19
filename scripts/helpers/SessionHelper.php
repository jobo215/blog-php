<?php

class SessionHelper
{

    public static function setSession()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public static function setUserLoggedIn()
    {
        SessionHelper::setSession();
        $_SESSION['USER']['LOGGED'] = true;
    }

    public static function setUserLoggedOut()
    {
        SessionHelper::setSession();
        $_SESSION['USER']['LOGGED'] = false;
    }


}