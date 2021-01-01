<?php

include_once __DIR__ . "\..\model\Tanar.php";
include_once __DIR__ . "\..\db\DBConnection.php";

class TanarDAO
{
    private $dbcon;

    //construct
    function __construct() {
        $this->dbcon = DBConnection::getInstance()->getConnection();
    }

    //returns null if the searched object does not exist
    //returns the object with the given 'email' (Email)
    function findByEmail($email) {
        $sql = "SELECT * FROM tanar WHERE TEmail = '$email'";
        $result = mysqli_query($this->dbcon, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            return $this->transformResultRow($row);
        } else {
            return null;
        }
    }

    //returns an array, which contains all objects of 'tanar', where the email adress is not admin@econ.ubbcluj.ro
    function findAll() {
        $sql = "SELECT * FROM tanar WHERE TEmail <> 'admin@econ.ubbcluj.ro'";
        $result = mysqli_query($this->dbcon, $sql);

        $tanarok = array();

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                array_push($tanarok, $this->transformResultRow($row));
            }
        }

        return $tanarok;
    }

    //makes and returns a 'tanar' object
    private function transformResultRow($row) {
        $tanar = new Tanar;

        $tanar->email = $row["TEmail"];
        $tanar->telefonszam = $row["Telefonszam"];
        $tanar->keresztnev = $row["Keresztnev"];
        $tanar->csaladnev = $row["Csaladnev"];
        $tanar->fokozat = $row["Fokozat"];

        return $tanar;
    }
}

?>