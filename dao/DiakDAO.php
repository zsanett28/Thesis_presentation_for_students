<?php

include_once __DIR__ . "\..\model\Diak.php";
include_once __DIR__ . "\..\db\DBConnection.php";

class DiakDAO
{
    private $dbcon;

    //constructor
    function __construct() {
        $this->dbcon = DBConnection::getInstance()->getConnection();
    }

    //returns null if the searched object does not exist
    //returns the object with the given 'szemelyiszam' (Person ID)
    function findBySzemelyiszam($szemelyiszam) {
        $sql = "SELECT * FROM diak WHERE SzemelyiSzam = $szemelyiszam";        
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
    function findByDEmail($email) {
        $sql = "SELECT * FROM diak WHERE DEmail = '$email'";        
        $result = mysqli_query($this->dbcon, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            return $this->transformResultRow($row);
        } else {
            return null;
        }
    }

    //returns null if the update of the given 'diak' object is not successful
    //returns the updated object if the update of the given 'diak' object is successful
    function update($diak) {
        $sql="UPDATE diak 
        SET BeiratkozasiEv = '$diak->beiratkozasiEv',
            AnyakonyviSzam = '$diak->anyakonyviszam',
            Keresztnev = '$diak->keresztnev',
            Csaladnev = '$diak->csaladnev',
            Szak = '$diak->szak_rov',
            DEmail = '$diak->email',
            Telefonszam = '$diak->telefonszam',
            TEmail = '$diak->tanarEmail',
            ValasztasiHatarido = '$diak->valasztasiHatarido'
        WHERE SzemelyiSzam = '$diak->szemelyiszam'";

        $result = mysqli_query($this->dbcon, $sql);

        if ($result) {
            return $this->findBySzemelyiszam($diak->szemelyiszam);
        } else {
            return null;
        }
        
    }

    //makes and returns a 'diak' object
    private function transformResultRow($row) {
        $diak = new Diak;

        $diak->szemelyiszam = $row["SzemelyiSzam"];
        $diak->beiratkozasiEv = $row["BeiratkozasiEv"];
        $diak->anyakonyviszam = $row["AnyakonyviSzam"];
        $diak->keresztnev = $row["Keresztnev"];
        $diak->csaladnev = $row["Csaladnev"];
        $diak->szak_rov = $row["Szak"];
        $diak->email = $row["DEmail"];
        $diak->telefonszam = $row["Telefonszam"];
        $diak->tanarEmail = $row["TEmail"];
        $diak->valasztasiHatarido = $row["ValasztasiHatarido"];

        switch ($diak->szak_rov) {
            case "IEM":
                $diak->szak = "Gazdasági informatika";
            break;
            case "MKM":
                $diak->szak = "Marketing";
            break;
            case "MGM":
                $diak->szak = "Menedzsment";
            break;
            case "PBM":
                $diak->szak = "Pénzügy és bank";
            break;
        }

        return $diak;
    }
}

?>