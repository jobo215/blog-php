<?php

class ValidationHelper
{

    public static function setRegisterError($errorMessage)
    {
        ValidationHelper::setSession();
        $_SESSION['SUCCESS']['REGISTER_SUCCESS'] = false;
        $_SESSION['ERROR']['REGISTER_ERROR'] = true;
        $_SESSION['ERROR']['REGISTER_ERROR_MESSAGE'] = $errorMessage;
    }

    public static function setRegistrationSuccessMessage($message)
    {
        ValidationHelper::setSession();
        $_SESSION['ERROR']['REGISTER_ERROR'] = false;
        $_SESSION['SUCCESS']['REGISTER_SUCCESS'] = true;
        $_SESSION['SUCCESS']['REGISTER_SUCCESS_MESSAGE'] = $message;
    }

    public static function hideRegistrationMessagesOnRedirect()
    {
        $path = explode("/", $_SERVER['HTTP_REFERER']);
        $page = $path[count($path) - 1];
        if ($page != "register.php") {
            $_SESSION['SUCCESS']['REGISTER_SUCCESS'] = false;
            $_SESSION['ERROR']['REGISTER_ERROR'] = false;
        }
    }

    public static function hideLoginMessageOnRedirect()
    {
        ValidationHelper::setSession();
        $path = explode("/", $_SERVER['HTTP_REFERER']);
        $page = $path[count($path) - 1];
        if ($page != "login.php") {
            $_SESSION['ERROR']['LOGIN_ERROR'] = false;
        }
    }

    public static function setLoginError()
    {
        ValidationHelper::setSession();
        $_SESSION['ERROR']['LOGIN_ERROR'] = true;
    }

    public static function hideLoginError()
    {
        ValidationHelper::setSession();
        $_SESSION['ERROR']['LOGIN_ERROR'] = false;
    }

    private static function setSession()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

}