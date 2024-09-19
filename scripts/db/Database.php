<?php

class Database
{
    private $_connection;
    private static $_instance;
    private $env;


    public static function getInstance()
    {
        if (!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function __construct()
    {
        $env = parse_ini_file('.env');

        $this->_connection = new mysqli(
            $env["DB_HOST"],
            $env['DB_USER'],
            $env["DB_PASS"],
            $env['DB_NAME']
        );

        if (mysqli_connect_error()) {
            trigger_error(
                "Failed to connect to MySQL!"
            );
        }
    }

    private function __clone()
    {
    }

    public function getConnection()
    {
        return $this->_connection;
    }
}
