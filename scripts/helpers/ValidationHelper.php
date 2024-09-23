<?php

class ValidationHelper
{
    /**
     * Method which sets errors on registration
     * @param string $errorMessage Error message
     */

    public static function setRegisterError($errorMessage)
    {
        ValidationHelper::setSession();
        $_SESSION['SUCCESS']['REGISTER_SUCCESS'] = false;
        $_SESSION['ERROR']['REGISTER_ERROR'] = true;
        $_SESSION['ERROR']['REGISTER_ERROR_MESSAGE'] = $errorMessage;
    }

    /**
     * Method which sets success message on registration
     * @param string $message Success message
     */

    public static function setRegistrationSuccessMessage($message)
    {
        ValidationHelper::setSession();
        $_SESSION['ERROR']['REGISTER_ERROR'] = false;
        $_SESSION['SUCCESS']['REGISTER_SUCCESS'] = true;
        $_SESSION['SUCCESS']['REGISTER_SUCCESS_MESSAGE'] = $message;
    }

    /**
     * Method which hide registration error
     */
    public static function hideRegistrationMessagesOnRedirect()
    {
        $path = explode("/", $_SERVER['HTTP_REFERER']);
        $page = $path[count($path) - 1];
        if ($page != "register.php") {
            $_SESSION['SUCCESS']['REGISTER_SUCCESS'] = false;
            $_SESSION['ERROR']['REGISTER_ERROR'] = false;
        }
    }

    /**
     * Method which hide login error when user come from other page
     */
    public static function hideLoginMessageOnRedirect()
    {
        ValidationHelper::setSession();
        if (isset($_SERVER['HTTP_REFERER'])) {
            $path = explode("/", $_SERVER['HTTP_REFERER']);
            $page = $path[count($path) - 1];
            if ($page != "login.php") {
                $_SESSION['ERROR']['LOGIN_ERROR'] = false;
            }
        }
    }

    /**
     * Method which sets login error message
     * @param string $message Login error message
     */
    public static function setLoginError($message)
    {
        ValidationHelper::setSession();
        $_SESSION['ERROR']['LOGIN_ERROR'] = true;
        $_SESSION['ERROR']['LOGIN_ERROR_MESSAGE'] = $message;
    }

    /**
     * Method which hide login error message
     */
    public static function hideLoginError()
    {
        ValidationHelper::setSession();
        $_SESSION['ERROR']['LOGIN_ERROR'] = false;
    }

    /**
     * Method which starts session
     */
    private static function setSession()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

}