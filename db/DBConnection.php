<?php

class DBConnection
{
    private static $instance = null;
    private $dbcon;

    //constructor
    private function __construct()
    {
        $server = 'localhost';
        $user = 'root';
        $password = '';
        $dbname = 'szakdolgozatdb';

        $this->dbcon = new mysqli($server, $user, $password, $dbname);

        if (!$this->dbcon) {
            throw new Exception("Connection failed: " . $conn -> connect_error);
        }
    }

    public static function getInstance()
    {
        if (self::$instance == null)
        {
            self::$instance = new DBConnection();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->dbcon;
    }
}

?>