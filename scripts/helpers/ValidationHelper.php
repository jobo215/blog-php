<?php

include "./SessionHelper.php";

class ValidationHelper
{

    public static function setRegisterError($errorMessage)
    {
        SessionHelper::setSession();
        $_SESSION['SUCCESS']['REGISTER_SUCCESS'] = false;
        $_SESSION['ERROR']['REGISTER_ERROR'] = true;
        $_SESSION['ERROR']['REGISTER_ERROR_MESSAGE'] = $errorMessage;
    }

    public static function setRegistrationSuccessMessage($message)
    {
        SessionHelper::setSession();
        $_SESSION['ERROR']['REGISTER_ERROR'] = false;
        $_SESSION['SUCCESS']['REGISTER_SUCCESS'] = true;
        $_SESSION['SUCCESS']['REGISTER_SUCCESS_MESSAGE'] = $message;
    }

    public static function setLoginError()
    {
        SessionHelper::setSession();
        $_SESSION['ERROR']['LOGIN_ERROR'] = true;
    }

}