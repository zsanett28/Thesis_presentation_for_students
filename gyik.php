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
                <h1 class="title">Gyakran feltett kérdések</h1>
            </div>
        </div> 

    </div>

    <div class="container">

        <div class="row">

            <div class="col-md-12">
                <div id="harmonica2">
                    <h3 class="xsmall-title center pointer">Lehet más karról is vezető tanárt választani?</h3>
                    <div class="answer">
                        <p class="paragraf"><span class="bold">Igen</span>, ez lehetséges, viszont amennyiben a témavezetőtök nem a Közgazdaság- és Gazdálkodástudományi Magyar Intézet főállású oktatója, 
                            munkátokat a belső konzulens is segíti.
                        </p>
                        <p class="paragraf">A konzulens feladata az, hogy a dolgozatotok tartalmi és formai követelményeivel kapcsolatban tanácsot adjon, segítse 
                            ennek színvonalas összeállítását. A belső konzulenssel ajánlatos legalább 2 alkalommal konzultálni, 
                            nevezetesen a problémafelvetés és a szakirodalmi áttekintés elkészítésekor, illetve a dolgozat végleges formába öntését megelőzően, 
                            legkésőbb a dolgozat benyújtását megelőző utolsó előtti héten.
                        </p>
                    </div>
                    <h3 class="xsmall-title center pointer">Ha több szakirányt végzünk egyszerre, bemutatható mindegyik esetén ugyanaz a dolgozat?</h3>
                    <div class="answer">
                        <p class="paragraf"><span class="bold">Nem</span>, abban az esetben, ha több szakirányt végeztek egyszerre, mindegyiken más
                            szakdolgozat kell bemutatásra kerüljön az annak megfelelő bizottság előtt. Tehát szigorúan tilos ugyanazt a munkát többször is prezentálni, 
                            akkor is, ha ugyanabban a tanévben végeztek el más-más szakirányokat az adott karon.
                        </p>
                    </div>
                    <h3 class="xsmall-title center pointer">Ha más nyelven írjuk meg a dolgozatot, attól még a bemutatót meg lehet tartani magyarul?</h3>
                    <div class="answer">
                        <p class="paragraf center"><span class="bold">Nem</span>, ez esetben kötelezően azon a nyelven kell bemutassátok a szakdolgozatot, 
                            amilyen nyelven megírtátok.
                        </p>
                    </div>
                    <h3 class="xsmall-title center pointer">Lehet-e egy diáknak több vezető tanára?</h3>
                    <div class="answer">
                        <p class="paragraf center"><span class="bold">Igen</span>, abban az esetben, ha a kiválasztott téma interdiszciplináris, 
                            akkor két témavezető is lehet.
                        </p>
                    </div>
                    <h3 class="xsmall-title center pointer">Hány alkalommal kell konzultálni a vezető tanárral?</h3>
                    <div class="answer">
                        <p class="paragraf">A témavezető tanár a szakdolgozatotok készítésének szakmai felügyeletét látja el, az ő irányításával 
                            állítjátok össze a munkatervet. Éppen ezért kötelesek vagytok <span class="bold">legalább 3 alkalommal</span>  
                            a vezető tanárotokkal a dolgozatról konzultálni.
                        </p>
                        <p class="paragraf">Az első alkalommal ajánlott a szakirodalmi hátteret és a munkatervet megbeszélni, 
                            következő alkalommal az eredményeket és a harmadik alkalommal az összeállított dolgozatot megvitatni. 
                        </p>
                    </div>
                    <h3 class="xsmall-title center pointer">Le lehet-e adni a szakdolgozatot egy félévvel később is?</h3>
                    <div class="answer">
                        <p class="paragraf">Láthattátok, hogy <span class="bold">2</span> időpont van megjelölve a szakdolgozat leadására, illetve annak megvédésére. 
                            Az egyik a <span class="bold">júniusi szesszió</span>, amely az aktuális tanévben végző diákok számára van kitűzve, a 
                            <span class="bold">februári szesszió</span> viszont leginkább azoknak, akiknek valami miatt nem sikerült az előző tanévben ezt megvalósítani.
                        </p>
                        <p class="paragraf">Mindenkit arra bíztatunk, hogy a nyári dátumot vegye komolyan, hiszen, ha akkor sikeres szakdolgozattal, illetve záróvizsgával
                            zárja a tanévet, akkor biztosan nem kell a téli szesszióban újra az egyetemre látogatnia.
                        </p>
                    </div>
                    <h3 class="xsmall-title center pointer">Lehet-e más témát választani, mint ami a listán szerepel?</h3>
                    <div class="answer">
                        <p class="paragraf center"><span class="bold">Igen</span>, viszont saját ötlet esetén egyeztetni kell a jövendőbeli vezető tanárral/tanárokkal.</p>
                    </div>
                    <h3 class="xsmall-title center pointer">A szakdolgozatra jegyet vagy minősítést kapnak a diákok?</h3>
                    <div class="answer">
                        <p class="paragraf">A szakdolgozat megvédése során <span class="bold">jegyet</span> kaptok az elkészített munkátokra, amit a bemutatáson 
                            résztvevő bizottság fog megállapítani bizonyos szempontok alapján: 
                            <a href="szakdolgozat.php#Ertekel" class="link" target="_blank">A szakdolgozat értékelési szempontjai.</a>
                        </p>
                        <p class="paragraf"> Ugyanakkor a második félévben le kell adjátok vezető tanárotoknak a félig elkészült szakdolgozatot, 
                            vagy egy kutatási tervet, amire szintén jegyet kaptok, mivel külön tantárgyként szerepel a tantervben. 
                            Ez tehát minden diák számára kötelező, azoknak is, akik nem tervezik leadni nyáron a szakdolgozatot.
                            Erről bővebben az alábbiakban olvashattok: <a href="szakdolgozat.php#Kutterv" class="link" target="_blank">Szakdolgozat és kutatási terv.</a>
                        </p>
                    </div>
                    <h3 class="xsmall-title center pointer">A bemutatás jellege is beleszámít a jegybe?</h3>
                    <div class="answer">
                        <p class="paragraf"><span class="bold">Igen</span>, emellett értékelve lesz a dolgozat tudományos jellege, a dolgozat struktúrája, 
                            a felhasznált szakirodalom jellege, a kutatás módszertana, illetve a feltett kérdések megválaszolása a bemutató után.
                        </p>
                        <p class="paragraf">Erről még részletesebben az alábbiakban olvashattok: 
                            <a href="szakdolgozat.php#Ertekel" class="link" target="_blank">A szakdolgozat értékelési szempontjai.</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <?php include "view/navigation_view.php"; ?>

    <?php include "view/footer_view.html"; ?>
    
    <script src="js\Szakdolgozat.js"></script>

</body>

</html>