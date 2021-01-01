<?php

include_once __DIR__ . "\..\model\Szakdolgozat.php";
include_once __DIR__ . "\..\db\DBConnection.php";

class SzakdolgozatDAO
{
    private $dbcon;

    //constructor
    function __construct() {
        $this->dbcon = DBConnection::getInstance()->getConnection();
    }

    //returns null if the searched object does not exist
    //returns the object with the given 'kod' (ID)
    function findByKod($kod) {
        $sql = "SELECT * FROM szakdolgozat WHERE SzakdolgozatKod = '$kod'";
        $result = mysqli_query($this->dbcon, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            return $this->transformResultRow($row);
        } else {
            return null;
        }
    }

    //returns an array, which contains all objects of 'szakdolgozat'
    function findAll() {
        $sql = "SELECT * FROM szakdolgozat";
        $result = mysqli_query($this->dbcon, $sql);

        $szakdolgozatok = array();

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                array_push($szakdolgozatok, $this->transformResultRow($row));
            }
        }

        return $szakdolgozatok;
    }

    //returns null if the searched object does not exist
    //returns the object with the given 'diakSzemelyiszam' (Student ID)
    function findByDiakSzemelyiszam($diakSzemelyiszam) {
        $sql = "SELECT * FROM szakdolgozat WHERE SzemelyiSzam = '$diakSzemelyiszam'";
        $result = mysqli_query($this->dbcon, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            return $this->transformResultRow($row);
        } else {
            return null;
        }
    }

    //returns the result of deletion
    function deleteByDiakSzemelyiszam($diakSzemelyiszam) {
        $sql = "DELETE FROM szakdolgozat WHERE SzemelyiSzam = '$diakSzemelyiszam'";
        $result = mysqli_query($this->dbcon, $sql);
        return $result;
    }

    //returns an array, which contains objects of 'szakdolgozat' where the given 'tanarEmail' is available (Teacher Email)
    function findByTanarEmail($tanarEmail) {
        $sql = "SELECT * FROM szakdolgozat WHERE TEmail = '$tanarEmail'";
        $result = mysqli_query($this->dbcon, $sql);

        $diakok = array();

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                array_push($diakok, $this->transformResultRow($row));
            }
        }

        return $diakok;
    }

    //returns an array, which contains objects of 'szakdolgozat' where the given 'tanarEmail' is available (Teacher Email) and
    //the 'szakdolgozat' is accepted by the teacher
    function findByTanarEmailElfogadott($tanarEmail) {
        $sql = "SELECT * FROM szakdolgozat WHERE TEmail = '$tanarEmail' AND Elfogadva = 1";
        $result = mysqli_query($this->dbcon, $sql);

        $diakok = array();

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                array_push($diakok, $this->transformResultRow($row));
            }
        }

        return $diakok;
    }

    //if the given 'szakdolgozat' does not exits in the szakdolgozat table, it will be inserted
    //if the given 'szakdolgozat' exists, the fields in the table will be updated
    //returns the new 'szakdolgozat' object, which can be found in the database
    function save($szakdolgozat) {
        if($szakdolgozat->kod == null) {
            $sql = "INSERT INTO szakdolgozat (Cim, Kutatasiterv, KutatasitervJegy, Tartalom, SzakdolgozatEv, 
                    Jegy, TEmail, SzemelyiSzam, ElkeszitesiHatarido, Elfogadva) 
                    VALUES ('$szakdolgozat->cim', '$szakdolgozat->kutatasiterv', '$szakdolgozat->kutatasitervJegy', 
                    '$szakdolgozat->tartalom', '$szakdolgozat->ev', '$szakdolgozat->jegy', '$szakdolgozat->tanarEmail', 
                    '$szakdolgozat->diakSzemelyiszam', '$szakdolgozat->elkeszitesiHatarido', '$szakdolgozat->elfogadva')";
        } else {
            $sql="UPDATE szakdolgozat
            SET Cim = '$szakdolgozat->cim',
                Kutatasiterv = '$szakdolgozat->kutatasiterv',
                KutatasitervJegy = '$szakdolgozat->kutatasitervJegy',
                Tartalom = '$szakdolgozat->tartalom',
                SzakdolgozatEv = '$szakdolgozat->ev',
                Jegy = '$szakdolgozat->jegy',
                TEmail = '$szakdolgozat->tanarEmail',
                SzemelyiSzam = '$szakdolgozat->diakSzemelyiszam',
                ElkeszitesiHatarido = '$szakdolgozat->elkeszitesiHatarido',
                Elfogadva = '$szakdolgozat->elfogadva'
            WHERE SzakdolgozatKod = '$szakdolgozat->kod'";
        }

        $result = mysqli_query($this->dbcon, $sql);

        if($szakdolgozat->kod == null) {
            $kod = mysqli_insert_id($this->dbcon);
        } else {
            $kod = $szakdolgozat->kod;
        }

        if ($result) {
            return $this->findByKod($kod);
        } else {
            return null;
        }
    }

    //makes and returns a 'szakdolgozat' object
    private function transformResultRow($row) {
        $szakdolgozat = new Szakdolgozat;

        $szakdolgozat->kod = $row["SzakdolgozatKod"];
        $szakdolgozat->cim = $row["Cim"];
        $szakdolgozat->kutatasiterv = $row["Kutatasiterv"];
        $szakdolgozat->kutatasitervJegy = $row["KutatasitervJegy"];
        $szakdolgozat->tartalom = $row["Tartalom"];
        $szakdolgozat->ev = $row["SzakdolgozatEv"];
        $szakdolgozat->jegy = $row["Jegy"];
        $szakdolgozat->tanarEmail = $row["TEmail"];
        $szakdolgozat->diakSzemelyiszam = $row["SzemelyiSzam"];
        $szakdolgozat->elkeszitesiHatarido = $row["ElkeszitesiHatarido"];
        $szakdolgozat->elfogadva = $row["Elfogadva"];

        return $szakdolgozat;
    }
}

?>