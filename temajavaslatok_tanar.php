<?php
    session_start();

    include_once "dao\TemaDAO.php";

    if (!isset($_SESSION['felhasznalonev']) || $_SESSION['felhasznalonev'] == "" || $_SESSION['szerep'] != 'tanar') {
        header('Location: http://localhost/website/Web_projekt/kezdooldal.php');
        exit();
    }

    $felhasznalonev = $_SESSION['felhasznalonev'];

    $temaDAO = new TemaDAO;

    if (isset($_POST['tema']) && $_POST['tema'] != "") {
        $ujTemaNev = $_POST['tema'];
        //save the new given theme in "tema" table (for the current teacher)
        $temaDAO->save(new Tema($ujTemaNev, $felhasznalonev));
    }

    if (isset($_POST['torlendo-tema']) && $_POST['torlendo-tema'] != "") {
        $torolTemaKod = $_POST['torlendo-tema'];
        //delete the selected theme from "tema" table (for the current teacher)
        $temaDAO->deleteByKod($torolTemaKod);
    }

    //sort the array with the themes by ABC
    $temak = $temaDAO->findAllByTanarEmail($felhasznalonev);
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
                <h1 class="title">Témajavaslataim</h1>
            </div>
        </div> 

    </div>

    <div class="container">

        <div class="row">
            <div class="col-md-1">

            </div>
            <div class="col-md-10">
                <p class="paragraf-bordered">A diákok jelenleg az alábbi témáid közül választhatnak:</p>
                <ul class="roman-list">
                <?php  
                    if (empty($temak)) {
                        echo "Nincs még egy téma sem felvezetve!";
                    } else {
                        foreach ($temak as $tema){
                            echo "<li>$tema->nev</li>";
                        }
                    }
                ?>
                </ul>
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
                    <form class="hozzaad-tema-form" action="temajavaslatok_tanar.php" id="hozzaad-form-tema" method="POST">
                        <div class="form-group col-md-10">
                            <label>Új téma ajánlása:</label>
                            <input type="text" class="form-control one-name" name="tema" id="temanev">
                        </div>
                        <div class="form-group col-md-2">
                            <label></label>
                            <button type="submit" name="button" class="btn btn-default-no-margin center-block">Hozzáad</button>
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
            <div class="col-md-1">

            </div>
            <div class="col-md-10">
                <div class="row">
                    <form class="torol-tema-form" action="temajavaslatok_tanar.php" id="torol-form-tema" method="POST">
                        <div class="form-group col-md-10">
                            <label>Téma törlése:</label>
                            <select class="form-control dropdown" id="dropdown-temail" name="torlendo-tema">
                                <option selected="selected">Válaszd ki</option>
                                <?php
                                    foreach ($temak as $tema){
                                        echo "<option value='$tema->kod'>$tema->nev</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label></label>
                            <button type="submit" name="button" class="btn btn-default-no-margin center-block">Töröl</button>
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