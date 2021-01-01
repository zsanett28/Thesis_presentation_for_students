<?php

    include "test_server.php";

    $sql_dj = "SELECT Jelszo, SzemelyiSzam FROM diak";
    $result_dj = mysqli_query($dbcon, $sql_dj);

    if (mysqli_num_rows($result_dj) > 0) {

        while ($row = mysqli_fetch_array($result_dj)) {
            if (strlen($row['Jelszo']) != 40) {
                $username = $row['SzemelyiSzam'];
                $new_psw = sha1($row['Jelszo']);
                echo $username . " " . $new_psw . "<br>";
                mysqli_query($dbcon,"UPDATE diak SET Jelszo = '$new_psw' WHERE SzemelyiSzam = '$username'");
            }
        }

    } else {
        echo "No such users!" . "<br>";
    }

    $sql_tj = "SELECT Jelszo, TEmail FROM tanar";
    $result_tj = mysqli_query($dbcon, $sql_tj);

    if (mysqli_num_rows($result_tj) > 0) {

        while ($row = mysqli_fetch_array($result_tj)) {
            if (strlen($row['Jelszo']) != 40) {
                $username = $row['TEmail'];
                $new_psw = sha1($row['Jelszo']);
                echo $username . " " . $new_psw . "<br>";
                mysqli_query($dbcon, "UPDATE tanar SET Jelszo = '$new_psw' WHERE TEmail = '$username'");
            }
        }
        
    } else {
        echo "No such users!" . "<br>";
    }

    $dbcon->close();

?>