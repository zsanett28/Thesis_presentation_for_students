<?php
    session_start();

    include_once "dao\SzakdolgozatDAO.php";

    if (!isset($_SESSION['felhasznalonev']) || $_SESSION['felhasznalonev'] == "" || $_SESSION['szerep'] != 'diak') {
        header('Location: http://localhost/website/Web_projekt/kezdooldal.php');
        exit();
    }

    $felhasznalonev = $_SESSION['felhasznalonev'];

    $szakdolgozatDAO = new SzakdolgozatDAO;
    $szakdolgozat = $szakdolgozatDAO->findByDiakSzemelyiszam($felhasznalonev);
   
    //initializing variables, which help to show the corresponding message for the student
    if ($szakdolgozat != null) {
        if($szakdolgozat->elfogadva) {
            $disabled = "";
            $message = "";
            if($szakdolgozat->kutatasiterv != null) {
                $kutatasiterv_nev = $szakdolgozat->kutatasiterv;
            } else {
                $kutatasiterv_nev = "nincs még feltöltve";
            }
            if($szakdolgozat->tartalom != null) {
                $szakdolgozat_nev = $szakdolgozat->tartalom;
            } else {
                $szakdolgozat_nev = "nincs még feltöltve";
            }
        } else {
            $disabled = "disabled";
            $kutatasiterv_nev = "nincs még feltöltve";
            $szakdolgozat_nev = "nincs még feltöltve";
            $message = "Ahhoz, hogy állományt feltölts, először vissza kell igazoljon a kiválasztott tanárod!";
        }
    } else {
        $disabled = "disabled";
        $kutatasiterv_nev = "nincs még feltöltve";
        $szakdolgozat_nev = "nincs még feltöltve";
        $message = "Ahhoz, hogy állományt feltölts, először ki kell válaszd a vezetőtanárod és témád!";
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
                <h1 class="title">Dokumentumok feltöltése</h1>
            </div>
        </div> 

    </div>

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h2 class="small-title">Kutatási terv feltöltése</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <p class="paragraf">Mielőtt a végleges szakdolgozatotokat feltöltitek, szükséges egy kutatási tervet elkészíteni a második félév során.
                Feltöltés előtt a terveket ellenőrizzétek le, hogy megfelel-e a dokumentum a formai, illetve tartalmi követelményeknek. 
                Az alábbiakban megtalálhatjátok ennek sablonját:
                <a class="file" href="Szakdolgozat-Kutatási-terv.docx">Szakdolgozat-Kutatási-terv.docx</a>.</p>
                
                <div class="col-md-8 margin-left">
                    <p class="xsmall-title">Követelmények a feltöltendő állományra vonatkozóan: </p>
                    <ul class="disc-list">
                        <li><b>pdf</b> formátum</li>
                        <li>állomány ajánlott neve: <b>CsaládnévKeresztnév_Szak_Kutatásiterv.pdf</b>, ahol a szak a szakirány rövidített formája (IEM, MKM, MGM, PBM)</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <form class="upload-form" onsubmit="return checkKutatasiterv()" action="upload_kutatasiterv.php" id="form-feltoltes1" method="POST" enctype="multipart/form-data">

                        <div class="col-md-2">

                        </div>
                        <div class="form-group col-md-5">
                            <label>Kutatási terv kiválasztása:</label>
                            <input type="file" onchange="changeFileKutatasi()" class="form-control" name="kutatasiterv" id="kutTerv" <?php echo $disabled;?>>
                            <span id="error1"></span>
                        </div>

                        <div class="form-group col-md-2">
                            <button type="submit" id="kutatasiterv-button" name="button" class="btn btn-default-no-margin button-margin-top center-block" <?php echo $disabled;?>>Feltöltés</button>
                        </div>
                        <div class="col-md-3">
                            
                        </div>
                                
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <p class="paragraf margin-left-bigger">Jelenleg feltöltött állományod: <?php echo $kutatasiterv_nev; ?></p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-6">
                <?php
                    echo "<p class='paragraf-centered-italic'>";
                    echo $message;
                    echo "</p>";
                ?>
            </div>
            <div class="col-md-3">

            </div>
        </div>

    </div>

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h2 class="small-title">Szakdolgozat feltöltése</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <p class="paragraf">A szakdolgozatotok megírása során bizonyos szövegszerkesztési kéréseket, követelményeket be kell 
                tartsatok, ugyanakkor figyelembe kell venni a szerzői jogokat is a dolgozat elkészítése során. 
                Miután elkészítettétek a szakdolgozatotokat, ezeket a követelményeket mindenképp ellenőrizzétek le.
                Az alábbiakban letölthetitek a szakdolgozat általános sablonját:
                <a class="file" href="Szakdolgozat-Sablon.docx">Szakdolgozat-Sablon.docx</a>.</p>
                
                <div class="col-md-8 margin-left">
                    <p class="xsmall-title">Követelmények a feltöltendő állományra vonatkozóan: </p>
                    <ul class="disc-list">
                        <li><b>pdf</b> formátum</li>
                        <li>állomány ajánlott neve: <b>CsaládnévKeresztnév_Szak_Szakdolgozat.pdf</b>, ahol a szak a szakirány rövidített formája (IEM, MKM, MGM, PBM)</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <form class="upload-form" onsubmit="return checkSzakdolgozat()" action="upload_szakdolgozat.php" id="form-feltoltes2" method="POST" enctype="multipart/form-data">

                        <div class="col-md-2">

                        </div>
                        <div class="form-group col-md-5">
                            <label>Szakdolgozat kiválasztása:</label>
                            <input type="file" onchange="changeFileSzakdolgozat()" class="form-control" name="szakdolgozat" id="szakdolg" <?php echo $disabled;?>>
                            <span id="error2"></span>
                        </div>

                        <div class="form-group col-md-2">
                            <button type="submit" id="szakdolgozat-button" name="button" class="btn btn-default-no-margin button-margin-top center-block" <?php echo $disabled;?>>Feltöltés</button>
                        </div>
                        <div class="col-md-3">

                        </div>
                                
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <p class="paragraf margin-left-bigger">Jelenleg feltöltött állományod: <?php echo $szakdolgozat_nev; ?></p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-6">
                <?php
                    echo "<p class='paragraf-centered-italic'>";
                    echo $message;
                    echo "</p>";
                ?>
            </div>
            <div class="col-md-3">

            </div>
        </div>

    </div>

    <?php include "view/navigation_view.php"; ?>
    
    <?php include "view/footer_view.html"; ?>        
       
    <script src="js\Szakdolgozat.js"></script>

</body>

</html>