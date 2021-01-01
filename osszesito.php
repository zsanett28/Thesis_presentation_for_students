<?php
    session_start();

    include_once "dao\DiakDAO.php";
    include_once "dao\TanarDAO.php";
    include_once "dao\SzakdolgozatDAO.php";

    if (!isset($_SESSION['felhasznalonev']) || $_SESSION['felhasznalonev'] == "" || $_SESSION['szerep'] != 'admin') {
        header('Location: http://localhost/website/Web_projekt/kezdooldal.php');
        exit();
    }

    $szakdolgozatDAO = new SzakdolgozatDAO;
    $szakdolgozatok = array();
    $szakdolgozatok = $szakdolgozatDAO->findAll();

    $tanarDAO = new TanarDAO;

    $diakDAO = new DiakDAO;
    $diakok = array();
    //create an array with all rows of "szakdolgozat" table
    foreach ($szakdolgozatok as $szakdolgozat) {
        $diak = $diakDAO->findBySzemelyiszam($szakdolgozat->diakSzemelyiszam);
        array_push($diakok, $diak);
    }

    //sort the array by ABC (Student's name)
    usort($diakok,function($first,$second){
        return strtolower($first->csaladnev) > strtolower($second->csaladnev);
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
                <h1 class="title">Összesítő</h1>
            </div>
        </div> 

    </div>

    <div class="container">

        <div class="row">
            <div class="col-md-1">

            </div>
            <div class="col-md-12">
                <p class="paragraf-bordered margin-bottom-paragraf">Az eddig feljegyzett szakdolgozatok adatai: </p>
                <div class="row">
                    <div class="col-md-2">
                        <p class="paragraf-tabletitle">Diák
                    </div>
                    <div class="col-md-2">
                        <p class="paragraf-tabletitle">Tanár</p>
                    </div>
                    <div class="col-md-4">
                        <p class="paragraf-tabletitle">Téma</p>
                    </div>
                    <div class="col-md-2">
                        <p class="paragraf-tabletitle">Státusz</p>
                    </div>
                    <div class="col-md-1">
                        <p class="paragraf-tabletitle">Kutatási terv jegy</p>
                    </div>
                    <div class="col-md-1">
                        <p class="paragraf-tabletitle">Szakdolgozat jegy</p>
                    </div>
                </div>
                <?php   
                    if (empty($diakok)) {
                        echo "<p class='paragraf-diak'>Nincs még egy diák sem beiratkozva!</p>";
                    } else {
                        foreach($diakok as $diak) {
                ?>
                <div class='col-md-12 paragraf-bottom-bordered margin-top-paragraf'>
                    <div class='col-md-2'>
                        <p class='paragraf-diak'>
                            <?php echo $diak->csaladnev . " " . $diak->keresztnev . ", " . $diak->szak_rov; ?>
                        </p>
                    </div>
                    <div class='col-md-2'>
                        <p class='paragraf-tanar'>
                            <?php echo ($tanarDAO->findByEmail($diak->tanarEmail))->csaladnev . " " . ($tanarDAO->findByEmail($diak->tanarEmail))->keresztnev; ?>
                        </p>
                    </div>
                    <div class='col-md-4'>
                        <p class='paragraf-valasztott-tema'>
                            <?php echo ($szakdolgozatDAO->findByDiakSzemelyiszam($diak->szemelyiszam))->cim; ?>
                        </p>
                    </div>
                    <div class='col-md-2'>
                        <p class='ultimate'>
                            <?php
                                if ($szakdolgozatDAO->findByDiakSzemelyiszam($diak->szemelyiszam)->elfogadva)
                                    echo "Elfogadott";
                                else
                                    echo "Nem elfogadott";
                            ?>
                        </p>
                    </div>
                    <div class='col-md-1'>
                        <p class='ultimate'>
                            <?php
                                $jegy = $szakdolgozatDAO->findByDiakSzemelyiszam($diak->szemelyiszam)->kutatasitervJegy;
                                if ($jegy == 0)
                                    echo "-";
                                else
                                    echo $jegy;
                            ?>
                        </p>
                    </div>
                    <div class='col-md-1'>
                        <p class='ultimate'>
                            <?php
                                $jegy = $szakdolgozatDAO->findByDiakSzemelyiszam($diak->szemelyiszam)->jegy;
                                if ($jegy == 0)
                                    echo "-";
                                else
                                    echo $jegy;
                            ?>
                        </p>
                    </div>
                </div>
                <?php }} ?>
            </div>
            <div class="col-md-1">

            </div>

        </div>
            
    </div>

    <?php include "view/navigation_view.php"; ?>

    <?php include "view/footer_view.html"; ?>
    
    <script src="js\Szakdolgozat.js"></script>

</body>

</html>