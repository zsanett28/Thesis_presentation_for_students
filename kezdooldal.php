<?php
    session_start();
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
                <h1 class="title">Szakdolgozat a közgázon</h1>
                <h2 class="subtitle">- Avagy minden, amiről tudnod kell -</h2>
            </div>
        </div> 

    </div>

    <div class="container">

        <div class="row">

            <div class="col-md-6 letter">

                <p class="first">Kedves végzős diákok!</p>
                <p>Az alapképzés végén mindenkinek közületek egy szakdolgozatot kell készítenie, amely megfelel a 
                szakképzettségeteknek, az alapos tárgyi ismereteiteket bizonyítja, illetve a szakmai tárgyakhoz kapcsolódó témával rendelkezik.</p>
                <p>Elkészítésével tanúsítanotok kell, hogy tanulmányaitok során elsajátítottátok a szakirodalmi áttekintés 
                elkészítésének alapjait, valamint, hogy egy szakmai kérdés feldolgozása kapcsán képesek vagytok saját, önálló véleményt szabatosan és tömören 
                megfogalmazni, és írásos formában dokumentálni, továbbá az államvizsga bizottság előtt szóbeli vitában megfelőképpen megvédeni.
                A sikeres végzés érdekében a szakdolgozat megírásának folyamata viszont megfelelő előkészületet igényel. </p>
                <p>Sok munkát, időt ígénylő feladat ez, de kellő kitartással, türelemmel és 
                szorgalommal egy kiváló eredményhez juthattok. A szakdolgozat mellett pedig ne feledkezzetek meg a záróvizsgáról, amihez szintén 
                tanulás, az eddigi anyag áttekintése, illetve annak mégjobban való elmélyítése szükséges.</p>
                <div class="ultimate">
                    <p>Minden végzős hallgatónak kitartást és eredményes munkát!</p>
                    <p>BBTE Közgazdaság- és Gazdálkodástudományi Kar Magyar Intézete</p>
                </div>
            </div>

            <div class="col-md-6 pictures">
                <img id="fsega-building" alt="FSEGA épülete" src="images\1.jpg">
                <img id="students" alt="Végzősök" src="images\2.jpg">
                <img id="final-exam" alt="Szakdolgozat írás" src="images\3.jpg">
                <img id="diploma" alt="Diploma" src="images\4.jpg">
                <img id="graduation" alt="Ballagás" src="images\5.jpg">
                <img id="learning-students" alt="Tanuló diákok" src="images\6.jpg">
                <img id="fsega-entrance" alt="Egyetem bejárata" src="images\7.jpg">
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <p class="paragraf-margin-top xsmall-title">Végzős hírek:</p>
            </div>
        </div>

        <div class="row article-row">

            <div class="col-md-6 article-column">

                <article class="col-xs-6 article-box">
                    <figure>
                        <a href="http://hu.econ.ubbcluj.ro/hirek/az-idei-xxiii-etdk-online-kerul-megszervezesre" target="_blank"><img src="images/ETDK.jpg" alt="ETDK" class="img-responsive"></a>
                    </figure>
                    <h2 class="center"><a href="http://hu.econ.ubbcluj.ro/hirek/az-idei-xxiii-etdk-online-kerul-megszervezesre" class="article-title" target="_blank">Az idei, XXIII. ETDK online kerül megszervezésre</a></h2>
                    <span class="article-date">2020.01.05</span>
                </article>

                <article class="col-xs-6 article-box">
                    <figure>
                        <a href="http://hu.econ.ubbcluj.ro/hirek/szakdolgozatfelkeszito2019" target="_blank"><img src="images/thesis_preparation1.jpg" alt="Szakdolgozatírás felkészítő" class="img-responsive"></a>
                    </figure>
                    <h2 class="center"><a href="http://hu.econ.ubbcluj.ro/hirek/szakdolgozatfelkeszito2019" class="article-title" target="_blank">Szakdolgozatírás felkészítő dr. Rácz Bélával: kutatásmódszertan és prezentáció-készítés</a></h2>
                    <span class="article-date">2019.11.20</span>
                </article>
                
            </div>

            <div class="col-md-6 article-column">

                <article class="col-xs-6 article-box">
                    <figure>
                        <a href="http://hu.econ.ubbcluj.ro/hirek/szakdolgozat2019" target="_blank"><img src="images/thesis_preparation2.jpg" alt="Felkészítő a szakdolgozatra és ETDK-ra" class="img-responsive"></a>
                    </figure>
                    <h2 class="center"><a href="http://hu.econ.ubbcluj.ro/hirek/szakdolgozat2019" class="article-title" target="_blank">Felkészítő szakdolgozat és ETDK dolgozat írására dr. Szász Leventével</a></h2>
                    <span class="article-date">2019.11.13</span>
                </article>
                
                <article class="col-xs-6 article-box">
                    <figure>
                        <a href="http://hu.econ.ubbcluj.ro/hirek/elballagtak-alapkepzeses-vegzos-hallgatoink" target="_blank"><img src="images/2019_graduation.jpg" alt="2019-es ballagás" class="img-responsive"></a>
                    </figure>
                    <h2 class="center"><a href="http://hu.econ.ubbcluj.ro/hirek/elballagtak-alapkepzeses-vegzos-hallgatoink" class="article-title" target="_blank">Elballagtak alapképzéses végzős hallgatóink</a></h2>
                    <span class="article-date">2019.06.28</span>
                </article>

            </div>

        </div>

    </div>

    <?php include "view/navigation_view.php"; ?>
    
    <?php include "view/footer_view.html"; ?>        
       
    <script src="js\Szakdolgozat.js"></script>

</body>

</html>