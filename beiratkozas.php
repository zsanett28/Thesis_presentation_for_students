<?php
    session_start();
    include_once "dao\DiakDAO.php";
    include_once "dao\TanarDAO.php";
    include_once "dao\TemaDAO.php";
    include_once "dao\SzakdolgozatDAO.php";

    if (!isset($_SESSION['felhasznalonev']) || $_SESSION['felhasznalonev'] == "" || $_SESSION['szerep'] != 'diak') {
        header('Location: http://localhost/website/Web_projekt/kezdooldal.php');
        exit();
    }

    $diakDAO = new DiakDAO;
    $diak = $diakDAO->findBySzemelyiszam($_SESSION['felhasznalonev']);

    $tanarDAO = new TanarDAO;
    //initialize an array with all teachers from database
    $tanarok = $tanarDAO->findAll();

    //sort the teachers's array by ABC
    usort($tanarok,function($first,$second){
        return strtolower($first->csaladnev) > strtolower($second->csaladnev);
    });

    //check if a teacher is selected from the dropdown list
    //if it is selected, then initialize an array with his/her themes
    //if it is not selected, initialize a variable to null
    if (isset($_GET['tanar']) && $_GET['tanar'] != "") {
        $valasztott_tanar_email = $_GET['tanar'];
        $temaDAO = new TemaDAO;
        $temak = $temaDAO->findAllByTanarEmail($valasztott_tanar_email);

        usort($temak,function($first,$second){
            return strtolower($first->nev) > strtolower($second->nev);
        });
    } else {
        $valasztott_tanar_email = null;
    }

    $szakdolgozatDAO = new SzakdolgozatDAO;
    $szakdolgozat = $szakdolgozatDAO->findByDiakSzemelyiszam($diak->szemelyiszam);

    if ($szakdolgozat == null) {
        $van = false;
    } else {
        $van = true;
        $tanar = $tanarDAO->findByEmail($szakdolgozat->tanarEmail);
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
                <h1 class="title">Téma és tanár választás</h1>
            </div>
        </div> 

    </div>

    <div class="container-fluid">

        <?php if ($van): ?>
            <div class="row">
                <div class="col-md-1">

                </div>
                <div class="col-md-10">
                    <p class="small-title paragraf-centered margin-bottom-paragraf">Jelenlegi vezetőtanárod és témád: </p>
                    <div class="row">
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-10">

                            <div class="col-md-3">
                                <p class="small-paragraf-tabletitle">Név
                            </div>
                            <div class="col-md-4">
                                <p class="small-paragraf-tabletitle">Téma</p>
                            </div>
                            <div class="col-md-1">
                                <p class="small-paragraf-tabletitle">Státusz
                            </div>
                            <div class="col-md-2">
                                <p class="small-paragraf-tabletitle">Kutatási terv jegy</p>
                            </div>
                            <div class="col-md-2">
                                <p class="small-paragraf-tabletitle">Szakdolgozat jegy</p>
                            </div>
                        </div>
                        <div class="col-md-1">

                        </div>
                    </div> 
                    <div class='col-md-10 margin-left margin-right paragraf-bottom-top-bordered margin-top-bottom'>
                        <div class='col-md-3'>
                            <p class='paragraf-valasztott-tanar'>
                                <?php echo $tanar->csaladnev . " " . $tanar->keresztnev; ?>
                            </p>
                        </div>
                        <div class='col-md-4'>
                            <p class='paragraf-valasztott-tema'>
                                <?php echo $szakdolgozat->cim; ?>
                            </p>
                        </div>
                        <div class='col-md-1'>
                            <p class='ultimate center'>
                                <?php
                                    if ($szakdolgozat->elfogadva)
                                        echo "Elfogadott";
                                    else
                                        echo "Még nem elfogadott";
                                ?>
                            </p>
                        </div>
                        <div class='col-md-2'>
                            <p class='ultimate center'>
                                <?php
                                    $jegy = $szakdolgozat->kutatasitervJegy;
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
                                    $jegy = $szakdolgozat->jegy;
                                    if ($jegy == 0)
                                        echo "-";
                                    else
                                        echo $jegy;
                                ?>
                            </p>
                        </div> 
                    </div>
                </div>
                <div class="col-md-1">

                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="paragraf-centered-italic margin-top-bottom">Ha megszeretnéd változtatni a témavezető tanárod, vagy a témád, megkérünk, töltsd ki újra a lenti űrlapot!</p>
                </div>
            </div>
        
        <?php endif;?>

        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <h2 class="form-title">Szakdolgozat 2020/2021-es tanév</h2>
                    <p class="paragraf">A Babeș-Bolyai Tudományegyetem, Közgazdaság- es Gazdálkodástudományi Kar magyar tagozata végzős 
                        diákjainak szakdolgozat írására való bejelentkezése: téma és témavezető tanár választása.
                    </p>
                    <p class="paragraf">A helyek száma a vezető tanároknál korlátozott, tehát a jelentkezést megelőzően ajánljuk, hogy 
                        konzultálj a jövendőbeli vezetőtanároddal, így biztosan nem maradsz le az általa kiválasztott diákok 
                        listájáról.
                    </p>
                    <p class="paragraf">Abban az esetben, ha még nem igazán van ötleted a szakdolgozatra vonatkozóan, érdemes megnézned a lehetséges 
                        vezető tanárok által meghirdetett <a class="link" target="_blank" href="temajavaslatok.php">témajavaslatokat</a>, mielőtt nekifognál 
                        az űrlap kitöltésének. Ha saját ötleted van a szakdolgozatod témájához, akkor megkérünk egyeztess a jövendőbeli 
                        vezető tanároddal/tanáraiddal.
                    </p>

                    <form action="beiratkozas-form.php" onsubmit="return checkBeiratkozasForm()" id="beiratkozas" method="POST">
                        <div class="row form-row">
                            <div class="form-group col-md-1">
            
                            </div>
                            <div class="form-group col-md-4">
                                <label>Családnév:</label>
                                <input type="text" class="form-control one-name" value = "<?php echo $diak->csaladnev; ?>" disabled>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Keresztnév:</label>
                                <input type="text" class="form-control one-name" value = "<?php echo $diak->keresztnev; ?>" disabled>
                            </div>
                            <div class="form-group col-md-3">
                                <label>E-mail cím:</label>
                                <input type="email" class="form-control" class="email" value = "<?php echo $diak->email; ?>" disabled>
                            </div>
                            <div class="form-group col-md-1">
            
                            </div>
                        </div>

                        <div class="row form-row">
                            <div class="form-group col-md-1">
            
                            </div>
                            <div class="form-group col-md-2">
                                <label>Anyakönyvi szám:</label>
                                <input type="text" class="form-control" id="matricol" value = "<?php echo $diak->anyakonyviszam; ?>" disabled>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Telefonszám:</label>
                                <input type="text" class="form-control" id ="tel" value = "<?php echo $diak->telefonszam; ?>" disabled>
                            </div>
                            <div class="form-group select-group">
                                <div class="form-group col-md-5">
                                    <label>Milyen szakirányon írod a dolgozatod?</label>
                                    <input type="text" class="form-control" id ="szakirany" value = "<?php echo $diak->szak; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group col-md-1">
            
                            </div>
                        </div>

                        <div class="row form-row select-group">
                            <div class="form-group col-md-1">
            
                            </div>
                            <div class="form-group col-md-10">
                                <p class="option-paragraf">Témavezető tanár kiválasztása:</p>
                                <select class="form-control dropdown" id="dropdown-tanarok" name="tanar">
                                    <?php if ($valasztott_tanar_email == null):?>
                                        <option selected="selected" value="">Válaszd ki</option>'
                                    <?php else: ?>
                                       <option value="">Válaszd ki</option>';
                                    <?php endif; ?>
                                    <?php
                                        foreach($tanarok as $tanar){
                                            if ($tanar->email == $valasztott_tanar_email) {
                                                $option_start = '<option selected="selected" ';
                                            } else {
                                                $option_start = '<option ';
                                            }
                                            echo "$option_start value='$tanar->email'>$tanar->csaladnev $tanar->keresztnev - $tanar->fokozat</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-1">
            
                            </div>
                        </div>
                        
                        <?php if ($valasztott_tanar_email != null): ?>

                        <div class="row form-row">
                            <div class="form-group col-md-1">
            
                            </div>
                            <div class="form-group col-md-10">
                                <p class="option-paragraf">Téma kiválasztása:</p>
                                <select class="form-control dropdown" onchange="changeDropDown()" id="dropdown-temak" name="tema">
                                    <option selected="selected" value="">Válaszd ki</option>
                                    <?php
                                        foreach($temak as $tema){
                                            echo "<option value='$tema->nev'>$tema->nev</option>";
                                        }
                                    ?>
                                </select>
                                <span id="error-drop2"></span>
                            </div>
                            <div class="form-group col-md-1">
            
                            </div>
                        </div>

                        <div class="row form-row">
                            <div class="form-group col-md-1">
            
                            </div>
                            <div class="form-group checkbox-row col-md-10">
                                <label><input type="checkbox" onchange="changeCheckBox()" name="check" id="check-box"> Elfogadom, hogy a személyes adataim feldolgozásra kerüljenek!</label>
                                <br>
                                <span id="error-checkbox"></span>
                            </div>
                            <div class="form-group col-md-1">
            
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-default center-block">Küldés</button>
                            </div>
                        </div>

                        <?php endif;?>

                    </form>

                    
    
                </div>
            </div>
        </div>

    </div>

    <?php include "view/navigation_view.php"; ?>
    
    <?php include "view/footer_view.html"; ?>
    
    <script src="js\Szakdolgozat.js"></script>
    <script src="js\beiratkozas.js"></script>

</body>