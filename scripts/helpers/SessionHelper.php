<?php

class SessionHelper
{
    /**
     * Method which creates session if it's not created
     */

    public static function setSession()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    /**
     * Method which sets needed params in session when user logs in
     */

    public static function setUserLoggedIn($userId)
    {
        SessionHelper::setSession();
        $_SESSION['USER']['LOGGED'] = true;
        $_SESSION['USER']['ID'] = $userId;
    }

    /**
     * Method which sets needed params in session when user logs out
     */
    public static function setUserLoggedOut()
    {
        SessionHelper::setSession();
        $_SESSION['USER']['LOGGED'] = false;
    }

    /**
     * Method which checks if user is logged in
     * @return bool true if user is logged in, false if not
     */
    public static function isUserLoggedIn()
    {
        SessionHelper::setSession();
        return isset($_SESSION['USER']['LOGGED']) && $_SESSION['USER']['LOGGED'] && isset($_SESSION['USER']['ID']);
    }

    /**
     * Method which gets logged user id
     * @return int user id
     */
    public static function getLoggedUserId()
    {
        SessionHelper::setSession();
        return $_SESSION['USER']['ID'];
    }

}