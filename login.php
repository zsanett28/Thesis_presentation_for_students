<?php

    session_start();

    include "test_server.php";

    if ((!isset($_POST["felhasznalonev"]) || $_POST["felhasznalonev"] == "") && (!isset($_POST["jelszo"]) || $_POST["jelszo"] == "")) {
        header('Location: http://localhost/website/Web_projekt/kezdooldal.php?error=invalid-login');
        exit();
    }

    $felhasznalonev = $_POST["felhasznalonev"];
    $jelszo = sha1($_POST["jelszo"]);

    //sqp prepare statements for find the proper user
    $sql_diak = "SELECT SzemelyiSzam FROM diak WHERE SzemelyiSzam = ?";
    $stmt_diak = $dbcon->prepare($sql_diak); 
    $stmt_diak->bind_param("s", $felhasznalonev);
    $stmt_diak->execute();
    $result_diak = $stmt_diak->get_result();
    $stmt_diak->close();

    $sql_tanar = "SELECT TEmail FROM tanar WHERE TEmail = ?";
    $stmt_tanar = $dbcon->prepare($sql_tanar);
    $stmt_tanar->bind_param("s", $felhasznalonev);
    $stmt_tanar->execute();
    $result_tanar = $stmt_tanar->get_result();
    $stmt_tanar->close();

    if(!$result_diak || !$result_tanar) {
        echo "Error by executing: " . mysqli_error($dbcon);
    }

    if (mysqli_num_rows($result_diak) > 0) {
        echo "Student exists";

        $sql_dpassw = "SELECT Jelszo FROM diak WHERE SzemelyiSzam = '$felhasznalonev' AND Jelszo = '$jelszo'";
        $result_dpassw = mysqli_query($dbcon, $sql_dpassw);
        
        if (mysqli_num_rows($result_dpassw) > 0){

            $sql_keresztnev = "SELECT Keresztnev FROM diak WHERE SzemelyiSzam = '$felhasznalonev'";
            $result_nev = mysqli_query($dbcon, $sql_keresztnev);
            $row = mysqli_fetch_array($result_nev);

            $_SESSION["felhasznalonev"] = $felhasznalonev;
            $_SESSION["keresztnev"] = $row["Keresztnev"];
            $_SESSION["szerep"] = "diak";
        } else {
            echo "Incorrect password";
            header('Location: http://localhost/website/Web_projekt/kezdooldal.php?error=invalid-login');
            exit();
        }

        header('Location: http://localhost/website/Web_projekt/kezdooldal.php');
        exit();   
    }
    
    if (mysqli_num_rows($result_tanar) > 0){
        echo "Teacher exists";

        $sql_tpassw = "SELECT Jelszo FROM tanar WHERE TEmail = '$felhasznalonev' AND Jelszo = '$jelszo'";
        $result_tpassw = mysqli_query($dbcon, $sql_tpassw);

        if (mysqli_num_rows($result_tpassw) > 0){

            $sql_keresztnev = "SELECT Keresztnev, Jelszo FROM tanar WHERE TEmail = '$felhasznalonev'";
            $result_nev = mysqli_query($dbcon, $sql_keresztnev);
            $row = mysqli_fetch_array($result_nev);

            $password = $jelszo;
            $_SESSION["felhasznalonev"] = $felhasznalonev;
            if ($felhasznalonev == "admin@econ.ubbcluj.ro") {
                $_SESSION["keresztnev"] = "Admin";
                $_SESSION["szerep"] = "admin";
            } else {
                $_SESSION["keresztnev"] = $row["Keresztnev"];
                $_SESSION["szerep"] = "tanar";
            }
        } else {
            echo "Incorrect password";
            header('Location: http://localhost/website/Web_projekt/kezdooldal.php?error=invalid-login');
            exit();
        }

        header('Location: http://localhost/website/Web_projekt/kezdooldal.php');
        exit();
    }

    header('Location: http://localhost/website/Web_projekt/kezdooldal.php?error=invalid-login');
    exit();

?>