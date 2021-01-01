<?php
    session_start();

    if (!isset($_SESSION['felhasznalonev']) || $_SESSION['felhasznalonev'] == "" || $_SESSION['szerep'] != 'diak') {
        header('Location: http://localhost/website/Web_projekt/kezdooldal.php');
        exit();
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
                <h1 class="title">Fontos határidők</h1>
            </div>
        </div> 

    </div>

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h2 class="table-title"><a href="szakdolgozat.php" class="link-bourdon" target="_blank">Szakdolgozat</a></h2>
                <div class="table-responsive">
                    <table id="t01">
                        <tr>
                            <td>2020.október 15.</td>
                            <td><a href="temajavaslatok.php" class="link-bourdon" target="_blank">Vezető tanárok témajavaslatainak kifüggesztése</a></td>
                        </tr>
                        <tr>
                            <td>2020.október 25.</td>
                            <td><a href="beiratkozas.php" class="link-bourdon" target="_blank">Téma és vezető tanár kiválasztása</a></td>
                        </tr>
                        <tr>
                            <td>2020.november 1.</td>
                            <td><a href="http://hu.econ.ubbcluj.ro/data/pdf/Vegzosoknek/Temavalasztas%20leosztas%202019.pdf" class="link-bourdon" target="_blank">Vezető tanárok által elfogadott diákok listájának kifüggesztése</a></td>
                        </tr>
                        <tr>
                            <td>2021.február 11</td>
                            <td>Februári <a href="szakdolgozat.php#Lead" class="link-bourdon" target="_blank">szakdolgozatok leadása</a></td>
                        </tr>
                        <tr>
                            <td>2021.február 18. - 21.</td>
                            <td>Februári <a href="szakdolgozat.php#Megved" class="link-bourdon" target="_blank">szakdolgozatok megvédése</a></td>
                        </tr>
                        <tr>
                            <td>2021.június 23</td>
                            <td>Júniusi <a href="szakdolgozat.php#Lead" class="link-bourdon" target="_blank">szakdolgozatok leadása</a></td>
                        </tr>
                        <tr>
                            <td>2021.június 30. - július 03.</td>
                            <td>Júniusi <a href="szakdolgozat.php#Megved" class="link-bourdon" target="_blank">szakdolgozatok megvédése</a></td>
                        </tr>
                    </table>
                </div>
           </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <p class="paragraf-centered">Hátralevő idő a szakdolgozatotok leadására:</p>
            </div>
        </div>

        <div class="row">
            <div class="container-clock">

                <img id = "time-runs-out" src="images\clock.jpeg" alt="Telik az idő">
                <div class="background-clock">
                    <div class="col-md-6">
                        
                    </div>
                    <div class="col-md-12">
                        <p class="paragraf dates">Júniusi szesszió</p>
                        <table id="countdown-table1">
                            <tr class="time">
                                <td id="jdays" class="time-td"></td>
                                <td id="jhours" class="time-td"></td>
                                <td id="jminutes" class="time-td"></td>
                                <td id="jseconds" class="time-td"></td>
                            </tr>
                            <tr class="datum">
                                <td id="jd"></td>
                                <td id="jh"></td>
                                <td id="jm"></td>
                                <td id="js"></td>
                            </tr>
                            <p id="timeout2" class="option-paragraf center"></p>
                        </table>
                        <p class="paragraf dates">Februári szesszió</p>
                        <table id="countdown-table2">
                            <tr class="time">
                                <td id="fdays" class="time-td"></td>
                                <td id="fhours" class="time-td"></td>
                                <td id="fminutes" class="time-td"></td>
                                <td id="fseconds" class="time-td"></td>
                            </tr>
                            <tr class="datum">
                                <td id="fd"></td>
                                <td id="fh"></td>
                                <td id="fm"></td>
                                <td id="fs"></td>
                            </tr>
                            <p id="timeout1" class="option-paragraf center"></p>
                        </table>
                    </div>
                </div>
        
            </div>
            
        </div>

        <div class="row">
            <div class="col-md-12">
                <h2 class="table-title"><a href="szakdolgozat.php#Kutterv" class="link-bourdon" target="_blank">Kutatási terv</a></h2>
                <div class="table-responsive">
                    <table id="t02">
                        <tr>
                            <td>2020.december 10.</td>
                            <td>Kutatási terv vagy félkész-/kész dolgozat benyújtása a februári szesszióra</td>
                        </tr>
                        <tr>
                            <td>2021.április 20.</td>
                            <td>Kutatási terv vagy félkész-/kész dolgozat benyújtása a júniusi szesszióra</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h2 class="table-title" id="Zarovizsga"><a href="zarovizsga.php" class="link-bourdon" target="_blank">Záróvizsga</a></h2>
                <div class="table-responsive">
                    <table id="t03">
                        <tr>
                            <td>2021.február 03. - 07.</td>
                            <td>Beiratkozás a februári záróvizsgára</td>
                        </tr>
                        <tr>
                            <td>2021.február 17.</td>
                            <td>Februári záróvizsga</td>
                        </tr>
                        <tr>
                            <td>2021.június 10. - 22.</td>
                            <td>Beiratkozás a júniusi záróvizsgára</td>
                        </tr>
                        <tr>
                            <td>2021.június 29.</td>
                            <td>Júniusi záróvizsga</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>
    
    <?php include "view/navigation_view.php"; ?>

    <?php include "view/footer_view.html"; ?>
    
    <script src="js\Szakdolgozat.js"></script>
    <script src="js\Countdown.js"></script>

</body>

</html>