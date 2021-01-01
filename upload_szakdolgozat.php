<?php

    session_start();

    include_once "dao\DiakDAO.php";
    include_once "dao\SzakdolgozatDAO.php";

    $felhasznalonev = $_SESSION['felhasznalonev'];

    $diakDAO = new DiakDAO;
    $diak = $diakDAO->findBySzemelyiszam($felhasznalonev);

    $to = $diak->email;

    $szakdolgozatDAO = new SzakdolgozatDAO;
    $szakdolgozat = $szakdolgozatDAO->findByDiakSzemelyiszam($felhasznalonev);

    $file_name = $szakdolgozat->kutatasiterv;
    $from = "kozgaz.magyarkar@gmail.com";

    header('Content-Type: text/html; charset=utf-8'); 

    // Define and Base64 encode the subject line
    $subject_text = "Szakdolgozat beküldése";
    $subject = '=?UTF-8?B?' . base64_encode($subject_text) . '?=';

    // Add custom headers
    $headers = 'Content-Type: text/plain; charset=utf-8' . "\r\n";
    $headers .= 'Content-Transfer-Encoding: base64';

    //upload "szakdolgozat" file and update the 'szakdolgozat' table
    if (($_FILES["szakdolgozat"]["type"] == "application/pdf") && ($_FILES["szakdolgozat"]["size"] <= 5000000)) {
        if ($_FILES["szakdolgozat"]["error"] > 0) {
            echo "Error: " . $_FILES["szakdolgozat"]["error"] . "<br>";
        } else {
            echo "Upload: " . $_FILES["szakdolgozat"]["name"] . "<br>";
            echo "Type: " . $_FILES["szakdolgozat"]["type"] . "<br>";
            echo "Size: " . $_FILES["szakdolgozat"]["size"] . "<br>";
            echo "Stored in: " . $_FILES["szakdolgozat"]["tmp_name"] . "<br>";
            $name = $diak->csaladnev . $diak->keresztnev . "_" . $diak->szak_rov . "_" . "Szakdolgozat" . ".pdf";
            if (file_exists("uploads/szakdolgozat/" . $name)) {
                move_uploaded_file($_FILES["szakdolgozat"]["tmp_name"], "uploads/szakdolgozat/$name");
                echo "File update successful" . "<br>";;
                echo "Renamed: " . $name;
            } else {
                move_uploaded_file($_FILES["szakdolgozat"]["tmp_name"], "uploads/szakdolgozat/$name");
                echo "File upload successful" . "<br>";;
                echo "Renamed: " . $name;
            }
            $szakdolgozat->tartalom = $name;
            $szakdolgozat = $szakdolgozatDAO->save($szakdolgozat);

            // Define and Base64 the email body text
            $msg = base64_encode("Kedves $diak->keresztnev!\n\nSikeresen megkaptuk az általad beküldött szakdolgozatot! További sok sikert a záróvizsgán!\n\nA Közgazdaság és Gazdálkodástudományi Kar Magyar Tagozata");
            mail($to, $subject, $msg, $headers);
            echo "Message sent";
        }
    } else {
        echo "File type does not match.";
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    
?>