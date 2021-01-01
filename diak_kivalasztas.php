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
    $szakdolgozatok = $szakdolgozatDAO->findByTanarEmail($felhasznalonev);

    $diakDAO = new DiakDAO;
    $diakok = array();
    //create an array with the teachers students
    foreach ($szakdolgozatok as $szakdolgozat) {
        $diak = $diakDAO->findBySzemelyiszam($szakdolgozat->diakSzemelyiszam);
        array_push($diakok, $diak);
    }

    //sort the array by ABC
    usort($diakok,function($first,$second){
        return strtolower($first->csaladnev) > strtolower($second->csaladnev);
    });

    if (isset($_POST['elfogadott-diak']) && $_POST['elfogadott-diak'] != "") {
        $diakSzemelyiszam = $_POST['elfogadott-diak'];
        $szakdolgozat = $szakdolgozatDAO->findByDiakSzemelyiszam($diakSzemelyiszam);
        $szakdolgozat->elfogadva = 1;
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
                <h1 class="title">Diákjaim kiválasztása</h1>
            </div>
        </div> 

    </div>

    <div class="container">

        <div class="row">
            <div class="col-md-1">

            </div>
            <div class="col-md-12">
                <p class="paragraf-bordered">A listán levő diákok: </p>
                <?php   
                    if (empty($diakok)) {
                        echo "<p class='paragraf-diak'>Nincs egy diák sem a listán!</p>";
                    } else {
                        foreach($diakok as $diak) {
                ?>
                <div class='col-md-12 paragraf-bottom-bordered'>
                    <div class='col-md-3'>
                        <p class='paragraf-diak'>
                            <?php echo $diak->csaladnev . " " . $diak->keresztnev . ", " . $diak->szak_rov; ?>
                        </p>
                    </div>
                    <div class='col-md-6'>
                        <p class='paragraf-valasztott-tema'>
                            <?php echo ($szakdolgozatDAO->findByDiakSzemelyiszam($diak->szemelyiszam))->cim ?>
                        </p>
                    </div>
                    <div class='col-md-3'>
                        <p class='ultimate'>
                            <?php
                                if ($szakdolgozatDAO->findByDiakSzemelyiszam($diak->szemelyiszam)->elfogadva)
                                    echo "Elfogadott";
                                else
                                    echo "Nem elfogadott";
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
            <div class="col-md-1">

            </div>
            <div class="col-md-10">
                <div class="row">
                    <form class="hozzaad-diak-form" action="diak_kivalasztas.php" id="hozzaad-form-diak" method="POST">
                        <div class="form-group col-md-10">
                            <select class="form-control dropdown" id="dropdown-diak" name="elfogadott-diak">
                                <option selected="selected" value="">Válaszd ki</option>
                                <?php
                                    if (!empty($diakok)) {
                                        foreach($diakok as $diak){ 
                                            if (($szakdolgozatDAO->findByDiakSzemelyiszam($diak->szemelyiszam))->elfogadva == 0)    
                                            echo "<option value='$diak->szemelyiszam'>$diak->csaladnev $diak->keresztnev</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <button type="submit" name="button" class="btn btn-default-no-margin center-block">Elvállal</button>
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