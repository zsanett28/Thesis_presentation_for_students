<?php

    session_start();
    include_once "dao\DiakDAO.php";
    include_once "dao\SzakdolgozatDAO.php";
    include_once "dao\TanarDAO.php";

    $kivalasztott_tanar_email = $_POST['tanar'];
    $kivalasztott_tema_nev = $_POST['tema'];

    $felhasznalonev = $_SESSION['felhasznalonev'];

    $diakDAO = new DiakDAO;
    $diak = $diakDAO->findBySzemelyiszam($felhasznalonev);

    $diak->tanarEmail = $kivalasztott_tanar_email;

    //update 'diak' object
    $diak = $diakDAO->update($diak);

    //check if the update was successful
    if($diak == null) {
        echo "Update failed";
        exit();
    }

    $szakdolgozatDAO = new SzakdolgozatDAO;
    //delete from "szakdolgozat" table the row where the Student ID is the current ID
    $szakdolgozatDAO->deleteByDiakSzemelyiszam($diak->szemelyiszam);

    $szakdolgozat = new Szakdolgozat($kivalasztott_tema_nev, $kivalasztott_tanar_email, $diak->szemelyiszam);
    //save the new 'szakdolgozat'
    $szakdolgozat = $szakdolgozatDAO->save($szakdolgozat);

    //check if saving was successful
    if ($szakdolgozat == null) {
        echo "Could not save";
        exit();
    }

    //Sending the email

    $from = "kozgaz.magyarkar@gmail.com";
    $to = $diak->email;

    header('Content-Type: text/html; charset=utf-8'); 

    // Define and Base64 encode the subject line
    $subject_text = "Vezetőtanár és téma kiválasztása";
    $subject = '=?UTF-8?B?' . base64_encode($subject_text) . '?=';

    // Add custom headers
    $headers = 'Content-Type: text/plain; charset=utf-8' . "\r\n";
    $headers .= 'Content-Transfer-Encoding: base64';

    $tanar_email = ($szakdolgozatDAO->findByDiakSzemelyiszam($felhasznalonev))->tanarEmail;
    $tanarDAO = new TanarDAO;
    $tanar_name = ($tanarDAO->findByEmail($tanar_email))->csaladnev . " " . ($tanarDAO->findByEmail($tanar_email))->keresztnev;
    $szakdolgozat_tema = ($szakdolgozatDAO->findByDiakSzemelyiszam($felhasznalonev))->cim;

    $msg = base64_encode(
        "Kedves $diak->keresztnev!\n\nSikeresen kiválasztottad a vezetőtanárod és szakdolgozat témád! Reméljük gördülékenyen fog menni a közös munka és sikeres szakdolgozatot fogsz tudni felmutatni!\n\nVezetőtanárod neve: $tanar_name\nTémád: $szakdolgozat_tema\n\nSok sikert,\na Közgazdaság és Gazdálkodástudományi Kar Magyar Tagozata");
    mail($to, $subject, $msg, $headers);
    echo "Message sent";

    header('Location: ' . $_SERVER['HTTP_REFERER']);

?>