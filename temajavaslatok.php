<?php
    session_start();
    
    include_once "dao\TanarDAO.php";
    include_once "dao\TemaDAO.php";

    $tanarDAO = new TanarDAO;

    //initialize an array with all teachers
    $tanarok = $tanarDAO->findAll();
    usort($tanarok,function($first,$second){
        return strtolower($first->csaladnev) > strtolower($second->csaladnev);
    });

    $temaDAO = new TemaDAO;

    //initialize an array with all themes
    $temak = $temaDAO->findAll();
    usort($temak,function($first,$second){
        return strtolower($first->nev) > strtolower($second->nev);
    });

?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <?php include "view/head_view.html"; ?>
</head>

<body>
    <div class="container-back">

        <a href="http://hu.econ.ubbcluj.ro/" target="_blank"><img class="fsega-logo" alt="FSEGA logo" src="images\fsega.png"></a>
        <a href="https://www.ubbcluj.ro/hu/" target="_blank"><img class="bbte-logo" alt="BBTE logo" src="images\bbte.png"></a>
        <img id="background" alt="Háttérkép" src="images\background.jpg">
        <?php include "view\login_view.php"; ?>
        <div class="background-text">
            <div class="col-md-12">
                <h1 class="title">Témajavaslatok</h1>
            </div>
        </div> 

    </div>

    <div class="container">

        <div class="row">

            <?php

                foreach ($tanarok as $tanar) {
                    echo "<div class='col-md-8 margin-left-right'>
                        <p class='paragraf-bordered'>$tanar->csaladnev $tanar->keresztnev - $tanar->fokozat</p>
                        <ul class='disc-list'>";
                        foreach($temak as $tema){
                            if ($tanar->email == $tema->tanarEmail) {
                                echo "<li>" . $tema->nev . "</li>";
                            }
                        }
                    echo "</ul>
                        </div>";
                }
                
            ?>
        </div>
            
    </div>

    <?php include "view/navigation_view.php"; ?>

    <?php include "view/footer_view.html"; ?>
    
    <script src="js\Szakdolgozat.js"></script>

</body>

</html>