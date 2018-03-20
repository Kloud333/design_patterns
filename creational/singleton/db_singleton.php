<?php

class Singleton
{
    protected static $db; // $instance

    public static function getInstance()
    {

        if (self::$db === null) {
            self::$db = new PDO('mysql:host=localhost;dbname=secret_santa_bb', 'root', '');
        }
        return self::$db;

    }

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

}