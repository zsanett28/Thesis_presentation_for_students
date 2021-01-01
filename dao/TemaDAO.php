<?php

include_once __DIR__ . "\..\model\Tema.php";
include_once __DIR__ . "\..\db\DBConnection.php";

class TemaDAO
{
    private $dbcon;

    //construct
    function __construct() {
        $this->dbcon = DBConnection::getInstance()->getConnection();
    }

    //returns null if the searched object does not exist
    //returns the object with the given 'kod' (ID)
    function findByKod($kod) {
        $sql = "SELECT * FROM tema WHERE TemaKod = '$kod'";
        $result = mysqli_query($this->dbcon, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            return $this->transformResultRow($row);
        } else {
            return null;
        }
    }

    //returns null if the searched object does not exist
    //returns the object with the given 'email' (Email)
    function findAllByTanarEmail($tanarEmail) {
        $sql = "SELECT * FROM tema WHERE TEmail = '$tanarEmail'";
        $result = mysqli_query($this->dbcon, $sql);

        $temak = array();

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                array_push($temak, $this->transformResultRow($row));
            }
        }

        return $temak;
    }

    ////returns an array, which contains all objects of "tema" table
    function findAll() {
        $sql = "SELECT * FROM tema";
        $result = mysqli_query($this->dbcon, $sql);

        $temak = array();

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                array_push($temak, $this->transformResultRow($row));
            }
        }

        return $temak;
    }

    //if the given 'tema' does not exits in the tema table, it will be inserted
    //if the given 'tema' exists, the fields in the table will be updated
    //returns the new 'tema' object, which can be found in the database
    function save($tema) {
        if($tema->kod == null) {
            $sql = "INSERT INTO tema (TemaKod, Nev, TemaEv, TEmail) 
                    VALUES ('$tema->kod', '$tema->nev', '$tema->ev', '$tema->tanarEmail')";
        } else {
            $sql="UPDATE tema
            SET Nev = '$tema->nev',
                TemaEv = '$tema->ev',
                TEmail = '$tema->tanarEmail'
            WHERE TemaKod = '$tema->kod'";
        }

        $result = mysqli_query($this->dbcon, $sql);

        if($tema->kod == null) {
            $kod = mysqli_insert_id($this->dbcon);
        } else {
            $kod = $tema->kod;
        }

        if ($result) {
            return $this->findByKod($kod);
        } else {
            return null;
        }
    }

    //returns the result of deletion
    function deleteByKod($kod) {
        $sql = "DELETE FROM Tema WHERE TemaKod = $kod";
        $result = mysqli_query($this->dbcon, $sql);
        return $result;
    }

    //makes and returns a 'tema' object
    private function transformResultRow($row) {
        $tema = new Tema;

        $tema->kod = $row["TemaKod"];
        $tema->nev = $row["Nev"];
        $tema->ev = $row["TemaEv"];
        $tema->tanarEmail = $row["TEmail"];

        return $tema;
    }
}

?>