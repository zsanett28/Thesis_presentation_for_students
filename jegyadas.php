<?php
    session_start();

    include_once "dao\DiakDAO.php";
    include_once "dao\SzakdolgozatDAO.php";

    if (!isset($_SESSION['felhasznalonev']) || $_SESSION['felhasznalonev'] == "" || $_SESSION['szerep'] != 'tanar') {
        header('Location: http://localhost/website/Web_projekt/kezdooldal.php');
        exit();
    }

    $felhasznalonev = $_SESSION['felhasznalonev'];

    $szakdolgozatDAO = new SzakdolgozatDAO;
    $szakdolgozatok = array();
    $szakdolgozatok = $szakdolgozatDAO->findByTanarEmailElfogadott($felhasznalonev);

    $diakDAO = new DiakDAO;
    $diakok = array();
    //create an array with the teacher's students, who are accepted
    foreach ($szakdolgozatok as $szakdolgozat) {
        $diak = $diakDAO->findBySzemelyiszam($szakdolgozat->diakSzemelyiszam);
        array_push($diakok, $diak);
    }

    //sort the array by ABC
    usort($diakok,function($first,$second){
        return strtolower($first->csaladnev) > strtolower($second->csaladnev);
    });

    //giving grade for 'kutatasi terv'
    if (isset($_POST['jegyadas-diak']) && $_POST['jegyadas-diak'] != "" && isset($_POST['kutatasitervJegy']) && $_POST['kutatasitervJegy'] != "") {
        $diakSzemelyiszam = $_POST['jegyadas-diak'];
        $szakdolgozat = $szakdolgozatDAO->findByDiakSzemelyiszam($diakSzemelyiszam);
        $szakdolgozat->kutatasitervJegy = $_POST['kutatasitervJegy'];
        $szakdolgozat = $szakdolgozatDAO->save($szakdolgozat);

        if ($szakdolgozat == null) {
            echo "Could not save";
            exit();
        }
    }

    //giving grade for 'szakdolgozat'
    if (isset($_POST['szakjegyadas-diak']) && $_POST['szakjegyadas-diak'] != "" && isset($_POST['szakdolgozatJegy']) && $_POST['szakdolgozatJegy'] != "") {
        $diakSzemelyiszam = $_POST['szakjegyadas-diak'];
        $szakdolgozat = $szakdolgozatDAO->findByDiakSzemelyiszam($diakSzemelyiszam);
        $szakdolgozat->jegy = $_POST['szakdolgozatJegy'];
        $szakdolgozat = $szakdolgozatDAO->save($szakdolgozat);

        if ($szakdolgozat == null) {
            echo "Could not save";
            exit();
        }
    }

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
                <h1 class="title">Jegyadás</h1>
            </div>
        </div> 

    </div>

    <div class="container">

        <div class="row">
            <div class="col-md-1">

            </div>
            <div class="col-md-12">
                <p class="paragraf-bordered">Eddig elfogadott diákjaim: </p>
                <div class="row">
                    <div class="col-md-3">
                        <p class="paragraf-tabletitle">Diák
                    </div>
                    <div class="col-md-5">
                        <p class="paragraf-tabletitle">Téma</p>
                    </div>
                    <div class="col-md-2">
                        <p class="paragraf-tabletitle">Kutatási terv jegy</p>
                    </div>
                    <div class="col-md-2">
                        <p class="paragraf-tabletitle">Szakdolgozat jegy</p>
                    </div>
                </div>
                <?php   
                    if (empty($diakok)) {
                        echo "<p class='paragraf-diak'>Nincs egy diák sem a listán!</p>";
                    } else {
                        foreach($diakok as $diak) {
                ?>
                <div class='col-md-12 paragraf-bottom-bordered margin-top-paragraf'>
                    <div class='col-md-3'>
                        <p class='paragraf-diak'>
                            <?php echo $diak->csaladnev . " " . $diak->keresztnev . ", " . $diak->szak_rov; ?>
                        </p>
                    </div>
                    <div class='col-md-5'>
                        <p class='paragraf-valasztott-tema'>
                            <?php echo ($szakdolgozatDAO->findByDiakSzemelyiszam($diak->szemelyiszam))->cim ?>
                        </p>
                    </div>
                    <div class='col-md-2'>
                        <p class='ultimate center'>
                            <?php
                                $jegy = $szakdolgozatDAO->findByDiakSzemelyiszam($diak->szemelyiszam)->kutatasitervJegy;
                                if ($jegy == 0)
                                    echo "-";
                                else
                                    echo $jegy;
                            ?>
                        </p>
                    </div>
                    <div class='col-md-2'>
                        <p class='ultimate center'>
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

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h2 class="xsmall-title">Kutatási terv értékelése</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-1">

            </div>
            <div class="col-md-10">
                <div class="row">
                    <form class="jegyadas-diak-form" onsubmit="return checkJegyadasKut()" action="jegyadas.php" id="jegyadas-form-diak" method="POST">
                        <div class="form-group col-md-7">
                            <select class="form-control dropdown" onchange="changeDropDownDiak()" id="dropdown-diak-jegy" name="jegyadas-diak">
                                <option selected="selected" value="">Válaszd ki</option>
                                <?php
                                    if (!empty($diakok)) {
                                        foreach($diakok as $diak){   
                                            echo "<option value='$diak->szemelyiszam'>$diak->csaladnev $diak->keresztnev</option>";
                                        }
                                    }
                                ?>
                            </select>
                            <span id="error-drop3"></span>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="number" onchange="changeJegyKut()" class="form-control" class="number" id="kut-jegy" name="kutatasitervJegy" value="">
                            <span id="jegy-error"></span>
                        </div>
                        <div class="form-group col-md-2">
                            <button type="submit" name="button" class="btn btn-default-no-margin center-block">Jegyet ad</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-1">
            
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h2 class="xsmall-title">Szakdolgozat értékelése</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-1">

            </div>
            <div class="col-md-10">
                <div class="row">
                    <form class="jegyadas-diak-form" onsubmit="return checkJegyadasSzak()" action="jegyadas.php" id="szakjegyadas-form-diak" method="POST">
                        <div class="form-group col-md-7">
                            <select class="form-control dropdown" onchange="changeDropDownDiak2()" id="dropdown-diak-szakjegy" name="szakjegyadas-diak">
                                <option selected="selected" value="">Válaszd ki</option>
                                <?php
                                    if (!empty($diakok)) {
                                        foreach($diakok as $diak){   
                                            echo "<option value='$diak->szemelyiszam'>$diak->csaladnev $diak->keresztnev</option>";
                                        }
                                    }
                                ?>
                            </select>
                            <span id="error-drop4"></span>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="number" onchange="changeJegySzak()" class="form-control" class="number" id="szak-jegy" name="szakdolgozatJegy" value="">
                            <span id="szak-jegy-error"></span>
                        </div>
                        <div class="form-group col-md-2">
                            <button type="submit" name="button" class="btn btn-default-no-margin center-block">Jegyet ad</button>
                        </div>
                    </form>
                </div>
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