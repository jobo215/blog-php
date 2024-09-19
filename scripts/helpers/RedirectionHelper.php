<?php

class RedirectionHelper
{

    public static function redirectToRegisterPage()
    {
        header("Location: " . RedirectionHelper::getBaseServerUrl() . "public/register.php");
    }

    public static function redirectToLoginPage()
    {
        header("Location: " . RedirectionHelper::getBaseServerUrl() . "public/login.php");
    }

    public static function redirectToPostsPage()
    {
        header("Location: " . RedirectionHelper::getBaseServerUrl() . "posts/posts.php");
    }

    public static function getBaseServerUrl()
    {
        $localPrefix = $_SERVER['HTTP_HOST'] == 'localhost' ? 'blog-php/' : '';
        $protocol = isset($_SERVER['HTTPS']) &&
            $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
        $base_url = $protocol . $_SERVER['HTTP_HOST'] . '/' . $localPrefix;

        return $base_url;
    }

}