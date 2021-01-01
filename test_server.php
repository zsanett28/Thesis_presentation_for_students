<?php

    $server = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'szakdolgozatdb';

    $dbcon = new mysqli($server, $user, $password, $dbname);

    if (!$dbcon) {
        die("Connection failed: " . $conn -> connect_error) . "<br>";
    }
?>