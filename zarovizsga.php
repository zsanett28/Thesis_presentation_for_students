<?php
    session_start();

    include_once "dao\DiakDAO.php";

    if (!isset($_SESSION['felhasznalonev']) || $_SESSION['felhasznalonev'] == "" || $_SESSION['szerep'] != 'diak') {
        header('Location: http://localhost/website/Web_projekt/kezdooldal.php');
        exit();
    }

    $diakDAO = new DiakDAO;
    $diak = $diakDAO->findBySzemelyiszam($_SESSION["felhasznalonev"]);

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
                <h1 class="title">Záróvizsga</h1>
            </div>
        </div> 

    </div>

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h2 class="small-title">Tematika</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <p class="paragraf">Az egyetemi éveitek sikeres befejezését a szakdolgozat elkészítése és megvédése mellett a záróvizsga is jelenti. 
                    Ez a vizsga méri fel, illetve bizonyítja, hogy az eddigi évek során, milyen mértékben sajátítottátok el azokat az ismereteket, melyeket
                    tanáraitok tanítottak. A záróvizsgára az alábbi témakörök áttekintése, megtanulása szükséges:
                </p>
            </div>
        </div>

        <?php 

        if ($diak->szak == "Gazdasági informatika"): ?>

            <div class="row">

                <div class="col-md-6">

                    <div class="row">
                        <div class="col-xs-6">
                            <p class="paragraf-bordered paragraf-bordered-small">Gazdasági informatika</p>
                        </div>
                    </div>

                    <div class="row">
                        <ol type="I" class="roman-list">
                            <li class="pointer accordion">Algoritmusok és programozás</li>
                                <div class="panel">
                                    <ol type="1" class="number-list">
                                        <li>Algoritmusok és adatszerkezetek</li>
                                        <ul class="disc-list-small">
                                            <li>Algoritmusok reprezentálása</li>
                                            <li>Vezérlési szerkezetek</li>
                                            <li>Rendezési algoritmusok</li>
                                            <li>Rekurzivítás</li>
                                            <li>Proramozási módszerek: Backtracking, Divide et Impera, Greedy</li>
                                            <li>Adatszerkezetek</li>
                                        </ul>
                                        <li>Objektumorientált programozás</li>
                                        <ul class="disc-list-small">
                                            <li>Az objektumorientált paradigma</li>
                                            <li>Osztályok és objektumok</li>
                                            <li>Konstruktorok és destruktorok</li>
                                            <li>Öröklődés, polimorfizmus, absztrakt osztályok</li>
                                        </ul>
                                    </ol>  
                                </div>
                            <li class="pointer accordion">Adatbázisrendszerek</li>
                                <div class="panel">
                                    <ol type="1" class="number-list">
                                        <li>Relációs adatbáziskezelő rendszerek</li>
                                        <ul class="disc-list-small">
                                            <li>Adatbázisok architektúrája. Adatmodellek</li>
                                            <li>Adatbázis-tervezés. Az egyed/kapcsolat adatmodell. Egyed/kapcsolat diagrammok</li>
                                            <li>A relációs adatmodell</li>
                                            <ul class="disc-list-small">
                                                <li>Normálformák és normalizálás</li>
                                                <li>Műveletek a relációs modellben</li>
                                                <li>Az SQL nyelv</li>
                                            </ul>
                                        </ul>
                                        <li>Adatbázisok kliens-szerver architektúrája. Kliens-szerver alkalmazások
                                            programozása</li>
                                        <ul class="disc-list-small">
                                            <li>Tárolt eljárások és triggerek</li>
                                            <li>Tranzakciókezelés</li>
                                            <li>Konkurrenciavezérlés</li>
                                        </ul>
                                    </ol>
                                </div>
                            <li class="pointer accordion">Webes technológiák</li>
                                <div class="panel">
                                    <ol type="1" class="number-list">
                                        <li>Relációs adatbáziskezelő rendszerek</li>
                                        <ul class="disc-list-small">
                                            <li>Webes alkalmazások kliens-szerver architektúrája</li>
                                            <li>Webes alkalmazások tevezése. Responsive web design</li>
                                            <li>Kliens oldali technológiák: HTML, CSS, Javascript</li>
                                            <li>Szerver oldali programozás: PHP şi MySQL</li>
                                            <ul class="disc-list-small">
                                                <li>PHP alapok</li>
                                                <li>HTML űrlapok feldolgozása PHP-ben</li>
                                                <li>MySQL adatbázis elérése PHP-ből</li>
                                            </ul>
                                        </ul>
                                    </ol>
                                </div>
                            <li class="pointer accordion">Informatikai rendszerek tervezése</li>
                                <div class="panel">
                                    <ol type="1" class="number-list">
                                        <li>A rendszerfejlesztés lépései</li>
                                        <li>Életciklus modellek</li>
                                        <li>Felhasználói felület tervezése</li>
                                        <li>UML nyelv</li>
                                        <li>UML diagrammok</li>
                                    </ol>
                                </div>
                            <li class="pointer accordion">Operációs rendszerek. Számítógépes hálózatok.</li>
                                <div class="panel">
                                    <ol type="1" class="number-list">
                                        <li>Operációs rendszerek</li>
                                        <ul class="disc-list-small">
                                            <li>Az operációs rendszer fogalma, célja, osztályozása, vázlatos felépítése, fejlődésének mérföldkövei</li>
                                            <li>Memóriakezelés; I/O ütemezés</li>
                                            <li>Az operációs rendszerek biztonsági kérdései</li>
                                        </ul>
                                        <li>Számítógépes hálózatok arhitectúrája és biztonsága</li>
                                        <ul class="disc-list-small">
                                            <li>Az adatkapcsolati réteg</li>
                                            <li>A hálózati réteg</li>
                                            <li>A szállítási réteg</li>
                                            <li>A számítógép-hálózatok használata</li>
                                            <li>Hálózati biztonság</li>
                                        </ul>
                                    </ol>
                                </div>
                            <p class="pointer paragraf-book accordion">Bibliográfia</p>
                                <div class="panel">
                                    <ul class="disc-list-book">
                                        <li>Avornicului M., Informatikai rendszerek tervezése és menedzsmentje, Ábel Kiadó, 2010</li>
                                        <li>Avornicului M., Programozási nyelvek és környezetek, Ábel Kiadó, 2007</li>
                                        <li>Avornicului M., Seer L. Gazdasági ügyletek az Interneten, Ábel Kiadó, Kolozsvár, 2014</li>
                                        <li>Boian F, Vancea A. Boian R. Bufnea D., Sterca A., Cobarzan C., Cojocar D., Sisteme de operare, Ed.
                                            Risoprint, 2006
                                        </li>
                                        <li>Ionescu K., Bevezetés az algoritmikába, Egyetemi Kiadó, 2005</li>
                                        <li>Ullman J. D., Widom J. Adatbázisrendszerek, Panem Könyvkiadó, Budapest, 2. kiadás, 2008</li>
                                        <li>Varga I. Adatbázisrendszerek (A relációs modelltől az XML adatokig), Kolozsvári Egyetemi Kiadó, 2005</li>
                                        <li>Nagy Gusztáv, Java programozás, Kecskemét, 2007</li>
                                        <li>Nagy Gusztáv, Web programozás alapismeretek, Ad Librum Kiadó Budapest, 2011</li>
                                        <li>Laura Thomson, Luke Welling, PHP és MySQL webfejlesztőknek - Hogyan építsünk webáruházat?,
                                            Perfact-Pro Kft., 2010
                                        </li>
                                        <li>Wetherall D., Tanenenbaum A. Számítógép-hálózatok, Panem Kft, Budapest, 2013</li>  
                                    </ul>
                                </div>
                        </ol>
                    </div>
                </div>

            </div>


        <?php elseif ($diak->szak == "Marketing"): ?>

            <div class="row">

                <div class="col-md-6">

                    <div class="row">
                        <div class="col-xs-6">
                            <p class="paragraf-bordered paragraf-bordered-small">Marketing</p>
                        </div>
                    </div>

                    <div class="row">
                        <ol type="I" class="roman-list">
                            <li class="pointer accordion">A Marketingkutatás rendszere</li>
                            <div class="panel">
                                <ol type="1" class="number-list">
                                    <li>A marketingkutatás meghatározása és szerepe a vállalati döntéshozatalban</li>
                                    <li>A kutatási probléma meghatározása és megközelítésének kidolgozása</li>
                                </ol>
                            </div>
                            <li class="pointer accordion">A kutatási terv kialakítása</li>
                            <div class="panel">
                                <ol type="1" class="number-list">
                                    <li>A kutatási terv kialakítása</li>
                                    <li>Feltáró kutatási módszerek: szekunder adatok (a szekunder adatok előnyei és hátrányai a primer</li>
                                    <li>Leíró kutatási módszerek: megkérdezés és megfigyelés</li>
                                    <li>Mérési módszerek a marketingkutatásban: alap és összehasonlító skálaképzés</li>
                                    <li>Mérési módszerek a marketingkutatásban: nem összehasonlító skálaképzési technikák</li>
                                    <li>Kérdőívszerkesztés és nyomtatványok tervezése</li>
                                </ol>
                            </div>
                            <li class="pointer accordion">Fogyasztói magatartás</li>
                            <div class="panel">
                                <ol type="1" class="number-list">
                                        <li>A vásárlási döntési folyamat</li>
                                        <li>A referenciacsoportok befolyása a fogyasztói magatartásra</li>
                                        <li>A fogyasztói percepció és következményei a marketing területeire</li>
                                        <li>A fogyasztó attitűdje és a hatása a vásárlási döntésre</li>
                                </ol>
                            </div>
                            <li class="pointer accordion">Marketingtervezés</li>
                            <div class="panel">
                                <ol type="1" class="number-list">
                                    <li>Bevezetés a marketingterv készítésébe</li>
                                    <li>A marketingterv szerkezete</li>
                                    <li>A vezetői összefoglaló</li>
                                    <li>Helyzetelemzés</li>
                                    <ul class="disc-list-small">
                                        <li>A makrokörnyezet elemzése</li>
                                        <li>Az iparági környezet elemzése</li>
                                        <li>Versenytársak elemzése</li>
                                        <li>A vállalat és a környezet viszonyának elemzése</li>
                                    </ul>
                                    <li>A vevők elemzése</li>
                                    <ul class="disc-list-small">
                                        <li>A vevők elemzése fogyasztói piacokon</li>
                                        <li>A vevők elemzése szervezeti piacokon</li>
                                        <li>Szegmentálás</li>
                                        <li>Célcsoportképzés</li>
                                    </ul>
                                    <li>Marketingcélok</li>
                                    <li>Marketingstratégiák</li>
                                    <li>Marketingeszközök tervezése</li>
                                    <ul class="disc-list-small">
                                        <li>Termékpolitika</li>
                                        <li>Árképzés</li>
                                        <li>Az értékesítési csatornák megtervezése</li>
                                        <li>A vállalat marketingkommunikációs tevékenysége</li>
                                    </ul>
                                        <li>Erőforrás és időterv</li>
                                        <li>Ellenőrzés és visszacsatolás</li>
                                    </ul>
                                </ol>
                            </div>
                            <p class="pointer paragraf-book accordion">Bibliográfia</p>
                            <div class="panel">
                                <ul class="disc-list-book">
                                    <li>Malhotra K. N., Marketingkutatás, Akadémiai Kiadó, Budapest, 2009</li>
                                    <li>Hofmeister-Tóth Á., A fogyasztói magatartás alapjai, Akadémiai Kiadó, Budapest, 2014</li>
                                    <li>Keszey T., Gyulavári T., Marketingtervezés, Akadémiai Kiadó, Budapest, 2016</li>
                                </ul>
                            </div>
                        </ol>
                    </div>

                </div>

            </div>

        <?php elseif($diak->szak == "Menedzsment"): ?>

            <div class="row">

                <div class="col-md-6">

                    <div class="row">
                        <div class="col-xs-6">
                            <p class="paragraf-bordered paragraf-bordered-small">Menedzsment</p>
                        </div>
                    </div>

                    <div class="row">
                        <ol type="I" class="roman-list">
                            <li class="pointer accordion">Stratégiai menedzsment</li>
                            <div class="panel">
                                <ol type="1" class="number-list">
                                    <li>A teljesítménnyel kapcsolatos tevékenységek a stratégiai menedzsmentben</li>
                                    <ul class="disc-list-small">
                                        <li>A stratégiai tervezés fejlődése</li>
                                        <li>Stratégiai elméletek</li>
                                        <ul class="disc-list-small">
                                            <li>Klasszikus irányzat</li>
                                            <li>Folyamatorientált stratégiai elméletek</li>
                                            
                                        </ul>
                                    </ul>
                                    <li>A stratégiai menedzsment és a környezet kapcsolata</li>
                                    <ul class="disc-list-small">
                                        <li>Az átalakító vezető erőtere és alappillérei</li>
                                        <li>A környezeti piramis (hatalmi piramis) alrendszerei</li>
                                        <li>Az átalakító vezető és az értékváltozások kapcsolata</li>
                                    </ul>
                                    <li>Az átalakító vezető és a struktúra elméleti összefüggései</li>
                                    <ul class="disc-list-small">
                                        <li>Szervezetelméleti jellemzők</li>
                                        <li>„Egy a háromhoz modell”</li>
                                        <ul>
                                            <li>Négy feszültség egyensúlya a struktúrában és kultúrában</li>
                                            <li>Szervezeti viselkedésformák</li>
                                            <li>A „csoportok a rendszerben” modell</li> 
                                        </ul>
                                        <li>Változtatási stratégiák</li>
                                        <li>Szervezeti mozgásokat befolyásoló főbb erők</li>
                                    </ul>
                                </ol>
                            </div>
                            <li class="pointer accordion">Humán erőforrás menedzsment</li>
                            <div class="panel">
                                <ol type="1" class="number-list">
                                    <li>A munkakörök tervezése és elemzése</li>
                                    <ul class="disc-list-small">
                                        <li>Munkakörtervezés</li>
                                        <li>Munkakörelemzés</li>
                                    </ul>
                                    <li>Toborzás és kiválasztás</li>
                                    <ul class="disc-list-small">
                                        <li>Toborzás</li>
                                        <li>Kiválasztás</li>
                                    </ul>
                                    <li>Ösztönzésmenedzsment</li>
                                    <ul class="disc-list-small">
                                        <li>Az ösztönzésmenedzsment rendszere</li>
                                        <li>A teljes javadalmazás</li>
                                    </ul>
                                    <li>Teljesítményértékelés</li>
                                    <ul class="disc-list-small">
                                        <li>A teljesítményértékelés céljai és szempontjai</li>
                                        <li>Értékelési módszerek és technikák</li>
                                        <li>Értékelők és értékeltek</li>
                                    </ul>
                                    <li>Az emberi erőforrások fejlesztése</li>
                                    <ul class="disc-list-small">
                                        <li>Képzés</li>
                                        <li>Karriermenedzsment</li>
                                    </ul>
                                </ol>
                            </div>
                            <li class="pointer accordion">Logisztika</li>
                            <div class="panel">
                                <ol type="1" class="number-list">
                                    <li>A logisztikai menedzsment alapjai</li>
                                    <ul class="disc-list-small">
                                        <li>A logisztika a vállalati gazdálkodás rendszerében</li>
                                        <ul class="disc-list-small">
                                            <li>A logisztika értelmezése</li>
                                            <li>A logisztika küldetése</li>
                                        </ul>
                                        <li>A logisztika és marketingfunkciók kölcsönhatásai</li>
                                        <li>A teljesköltség-koncepció</li>
                                        <ul class="disc-list-small">
                                            <li>Logisztikai költségtényezők összefüggései</li>
                                            <li>Logisztikai költségek integrálása</li>
                                            <li>A logisztikai célfüggvény</li>
                                            <li>A logisztikai rendszer változásának hatása a különböző költségekre</li>
                                        </ul>
                                    </ul>
                                    <li>A beszerzés menedzsmentje</li>
                                    <ul class="disc-list-small">
                                        <li>A beszerzés/ellátás feladatai</li>
                                        <li>A beszállítói menedzsment</li>
                                        <ul>
                                            <li>A beszerzési információgyűjtés, piackutatás</li>
                                            <li>A beszállítók minősítése</li>
                                            <li>A kapcsolatmenedzsment</li>
                                        </ul>
                                    </ul>
                                    <li>Az áruszállítás menedzsmentje</li>
                                    <ul class="disc-list-small">
                                        <li>A közlekedési és áruszállítási rendszerek jellemzése</li>
                                        <li>Hagyományos áruszállítási rendszerek</li>
                                        <li>Kombinált áruszállítási rendszerek</li>
                                    </ul>
                                    <li>A készletezés menedzsmentje</li>
                                    <ul class="disc-list-small">
                                        <li>A készletezés általános kérdései</li>
                                        <ul class="disc-list-small">
                                            <li>A készletek értelmezése, a készletezés általános fogalmai</li>
                                            <li>A készletek csoportosítása, készletezési költségek</li>
                                        </ul>
                                        <li>Készletezési mechanizmusok, készletgazdálkodási modellek</li>
                                        <ul class="disc-list-small">
                                            <li>A készletezési mechanizmusok áttekintése, működése</li>
                                            <li>Jellegzetes készletezési modellek</li>
                                        </ul>
                                    </ul>
                                </ol>
                            </div>
                            <li class="pointer accordion">Értékteremtő folyamatok menedzsmentje</li>
                            <div class="panel">
                                <ol type="1" class="number-list">
                                    <li>Értékteremtő folyamatok stratégiai szerepe</li>
                                    <ul class="disc-list-small">
                                        <li>Az értékteremtő folyamatok meghatározása</li>
                                        <li>Termelési/szolgáltatási tevékenységek termelékenysége</li>
                                        <li>Versenyképesség és versenyelőny az értékteremtő folyamatok tükrében</li>
                                        <li>Értékteremtő folyamatok stratégiája - a termelési stratégia</li>
                                        
                                    </ul>
                                    <li>Értékteremtő folyamatok teljesítménye és minősége</li>
                                    <ul class="disc-list-small">
                                        <li>A minőség fogalma</li>
                                        <li>A minőség dimenziói</li>
                                        <li>A megbízhatóság fogalma</li>
                                        <li>A minőség mint versenytényező</li>
                                        <li>A minőség költségei</li>
                                    </ul>
                                    <li>A Teljeskörű Minőségirányítás (TQM)</li>
                                    <ul class="disc-list-small">
                                        <li>A TQM alapelvei</li>
                                        <li>A TQM statisztikai eszközei</li>
                                        <li>Folyamatok statiszikai ellenőrzése</li>
                                        <ul class="disc-list-small">
                                            <li>Méréses szabályozókártyák: átlagkártya, terjedelem kártya</li>
                                            <li>Minősítéses szabályozókártyák: hibaszám kártya, selejtarány kártya</li>
                                            <li>Folyamatok minőségképessége. Hat szigma módszer</li> 
                                        </ul>
                                    </ul>
                                    <li>Termelési/szolgáltatási kapacitások elrendezése</li>
                                    <ul class="disc-list-small">
                                        <li>Elrendezések típusai a termelési folyamat típusának függvényében</li>
                                        <ul class="disc-list-small">
                                            <li>Fix elrendezés</li>
                                            <li>Folyamatcentrikus (flexibilis) elrendezés</li>
                                            <li>Celláris (hibrid) elrendezés</li> 
                                            <li>Termékcentrikus (lineáris) folyamatkialakítás</li> 
                                        </ul>
                                        <li>Kapacitások elrendezésének tervezése</li>
                                        <ul class="disc-list-small">
                                            <li>Folyamatcentrikus elrendezés tervezése (KTM módszer)</li>
                                            <li>Termékcentrikus elrendezés tervezése (termelősor kiegyensúlyozása)</li>
                                        </ul>
                                    </ul>
                                </ol>
                            </div>
                            <p class="pointer paragraf-book accordion">Bibliográfia</p>
                            <div class="panel">
                                <ul class="disc-list-book">
                                    <li>Chikán, A. & Demeter, K. (2004) Az értékteremtő folyamatok menedzsmentje, Aula Kiadó,
                                        Budapest, 2-15 oldalak</li>
                                    <li>Karoliny M. & Poór J. (2004) Emberi erőforrás menedzsment kézikönyv, KJK Kiadó,
                                        Budapest, 125-132, 161-173, 255-277, 289-294 oldalak</li>
                                    <li>Poór J. (2013) Rugalmas ösztönzés – rugalmas juttatások, Wolters Kluwer–Complex Kiadó,
                                        Budapest, 55-67 oldalak</li>
                                    <li>Szegedi Z. & Prezenszki J. (2010) Logisztika-menedzsment, Kossuth Kiadó, Budapest, 27-48,
                                        85-88, 90-100, 117-119, 125-152, 193-210 oldalak</li>
                                    <li>Szintay I. (2003) Stratégiai Menedzsment, Bíbor Kiadó, Miskolc, 63-125 oldalak</li>
                                    <li>Vörös J. (2010) Termelés- és szolgáltatásmenedzsment, Akadémiai Kiadó, Budapest, 11-15,
                                        29-43, 141-175, 179-201 oldalak</li>
                                </ul>
                            </div>
                        </ol>
                    </div>

                </div>

            </div>

        <?php elseif($diak->szak == "Pénzügy és bank"): ?>

            <div class="row">

                <div class="col-md-6">

                    <div class="row">
                        <div class="col-xs-6">
                            <p class="paragraf-bordered paragraf-bordered-small">Pénzügy és bank</p>
                        </div>
                    </div>

                    <div class="row">
                        <ol type="I" class="roman-list">
                            <li class="pointer accordion">Banki termékek, szolgáltatások, kockázatok kezelése</li>
                            <div class="panel">
                                <ol type="1" class="number-list">
                                    <li>Bankműveletek</li>
                                    <ul class="disc-list-small">
                                        <li>Aktív bankműveletek</li>
                                        <li>Passzív bankműveletek</li>
                                        <li>Fizetési forgalom lebonyolítása</li> 
                                    </ul>
                                    <li>A banktevékenység bűvös háromszöge</li>
                                    <ul class="disc-list-small">
                                        <li>Likviditás</li>
                                        <li>Szolvencia</li>
                                        <li>Jövedelmezőség</li>
                                    </ul>
                                    <li>A banki mérleg sajátosságai</li>
                                    <li>A bank jövedelmének szerkezete</li>
                                    <li>Banki kockázatok mérése és kezelése</li>
                                    <ul class="disc-list-small">
                                        <li>Hitelkockázat</li>
                                        <ul class="disc-list-small">
                                            <li>Hitelkockázat összetevői</li>
                                            <li>A hitelkockázat kezelése</li>
                                        </ul>
                                        <li>Piaci kockázatok mérése és kezelése</li>
                                        <ul class="disc-list-small">
                                            <li>Kamatlábkockázat kezelése</li>
                                            <li>Devizaárfolyam kockázat kezelése</li>
                                        </ul>
                                        <li>Likviditási kockázat mérése és kezelése</li>
                                        <li>Működési kockázat</li>
                                    </ul>
                                </ol>
                            </div>
                            <li class="pointer accordion">Vállalati pénzügyek. Beruházás-értékelés.</li>
                            <div class="panel">
                                <ol type="1" class="number-list">
                                    <li>A jelenérték és a tőke alternatívaköltsége</li>
                                    <ul class="disc-list-small">
                                        <li>A kamatos kamat és a jelenérték fogalma</li>
                                        <li>A nettó jelenérték szabály alapjai</li>
                                        <li>Örökjáradék és annuitás</li> 
                                    </ul>
                                    <li>A belső megtérülési ráta</li>
                                    <ul class="disc-list-small">
                                        <li>A belső megtérülési ráta fogalma</li>
                                        <li>A belső megtérülési ráta csapdái</li>
                                    </ul>
                                    <li>Beruházási döntések a nettó jelenérték szabály alapján</li>
                                    <ul class="disc-list-small">
                                        <li>Az éves költség- és jövedelemegyenértékes</li>
                                        <ul class="disc-list-small">
                                            <li>Különböző élettartamú projektek közötti választás</li>
                                            <li>Meglévő eszközök cseréje</li>
                                        </ul>
                                        <li>A beruházási javaslatok kölcsönhatásai</li>
                                        <ul class="disc-list-small">
                                            <li>A beruházás optimális időzítése</li>
                                            <li>Változó kapacitáskihasználás</li>
                                        </ul>
                                    </ul>
                                    <li>Tőkeköltségvetés és kockázat</li>
                                    <ul class="disc-list-small">
                                        <li>A kockázat és hozam kapcsolata – a tőkepiaci árfolyamok modellje (CAPM)</li>
                                        <li>A tőkeszerkezet és a vállalati tőkeköltség</li>
                                    </ul>
                                    <li>A vállalati hitelfelvételi politika jelentősége</li>
                                    <ul class="disc-list-small">
                                        <li>A tőkeáttétel hatása adómentes gazdaságban</li>
                                        <li>A vállalati súlyozott átlagos tőkeköltség (WACC)</li>
                                        <li>A Modigliani és Miller által megfogalmazott hagyományos álláspont</li>
                                    </ul>
                                    <li>Mennyi hitelt vegyen fel a vállalat?</li>
                                    <ul class="disc-list-small">
                                        <li>A vállalati adók hatása – kamat miatti adómegtakarítás</li>
                                        <li>Csődköltségek</li>
                                    </ul>
                                    <li>A lízing</li>
                                    <ul class="disc-list-small">
                                        <li>Mért érdemes lízingelni?</li>
                                        <li>Operatív lízing</li>
                                        <li>A pénzügyi lízing értékelése</li>
                                    </ul>
                                </ol> 
                            </div>
                            <li class="pointer accordion">Pénzügyi piacok. Portfolióelmélet.</li>
                            <div class="panel">
                                <ol type="1" class="number-list">
                                    <li>Bevezetés a pénzügyi piacokba</li>
                                    <ul class="disc-list-small">
                                        <li>A pénzügyi piacok értelmezése és csoportosítása</li>
                                        <li>Pénzügyi termékekre vonatkozó alapfogalmak</li>
                                    </ul>
                                    <li>Határidős ügyletek</li>
                                    <ul class="disc-list-small">
                                        <li>A határidős ügyletek tipológiája</li>
                                        <li>A tőzsdei futures versus tőzsdén kívüli forward ügyletek</li>
                                        <li>A futures kereskedés szabályai</li>
                                        <li>Az azonnali és határidős árfolyamok közötti összefüggések</li>
                                        <li>Fedezeti ügyletek határidős ügyletek segítségével</li>
                                    </ul>
                                    <li>Opciós szerződések</li>
                                    <ul class="disc-list-small">
                                        <li>A részvényopciók értelmezése, tipológiája</li>
                                        <li>Az alapvető opciós pozíciók</li>
                                        <li>Az opció értékét befolyásoló tényezők</li>
                                        <li>Arbitrázsmentes egyensúlyi feltételek. A put-call paritás</li>
                                        <li>Opciós kereskedési stratégiák</li>
                                        <ul class="disc-list-small">
                                            <li>Fedezett call (covered call) és biztonsági eladási jog (protective put)</li>
                                            <li>Különbözeti és terpesz pozíciók</li>
                                        </ul>
                                    </ul>
                                    <li>Optimális portfoliók és a hatékony határvonal</li>
                                    <ul class="disc-list-small">
                                        <li>A hatékony diverzifikáció</li>
                                        <li>Markowitz modellje és a hatékony határvonal</li>
                                        <li>A hatékony határvonal a kockázatmentes eszköz hiányában</li>
                                    </ul>
                                    <li>A tőkepiaci árfolyamok egyensúlyi modellje (CAPM)</li>
                                    <ul class="disc-list-small">
                                        <li>A modell előfeltételei</li>
                                        <li>A modell kidolgozása</li>
                                        <li>A CAPM jelentősége a pénzügyekben</li>
                                        <li>A CAPM kritikái</li>
                                    </ul>
                                </ol>
                            </div>
                            <p class="pointer paragraf-book accordion">Bibliográfia</p>
                            <div class="panel">
                                <ul class="disc-list-book">
                                    <li>Fellegi Miklós (2010), Pénzügyi ismeretek, Miskolci Egyetemi Kiadó, Miskolc,
                                        1. fejezet: 78-97. oldalak</li>
                                    <li>Erdős Mihály, Mérő Katalin (2010), Pénzügyi közvetítő intézmények. Bankok és
                                        intézményi befektetők., Akadémiai Kiadó, Budapest, 
                                        2.fejezet: 52-57. oldalak, 
                                        3.fejezet: 57-69. oldalak, 
                                        4.fejezet: 69-74. oldalak, 
                                        5.fejezet: 74-107. oldalak</li>
                                    <li>Bugár Gyöngyi (2010), Kockázatmérés és –kezelés, Carbocomp Nyomda, Pécs
                                        5.fejezet: 15-20. oldalak, 84-94. oldalak</li>
                                    <li>Brealey, Richard A., Myers, Stewart C. (2012), Modern vállalati pénzügyek, Panem
                                        Kiadó, Budapest, 
                                        6. fejezet: 17-24, 35-45. oldalak, 
                                        7. fejezet: 101-111. oldalak, 
                                        8. fejezet: 140-150. oldalak, 
                                        9. fejezet: 205-208., 240-245. oldalak, 
                                        10. fejezet: 492-508. oldalak, 
                                        11. fejezet: 517-522., 528-530. oldalak, 
                                        12. fejezet: 779-795. oldalak</li>
                                    <li>Száz János (2009) Pénzügyi termékek áralakulása, Jet Set Tipográfiai Műhely Kft,
                                        Budapest 13. fejezet: 15-95. oldalak</li>
                                    <li>Madár Péter, Schepp Zoltán, Szabó Zoltán, Szebellédi István, Zeller Gyula (2002),
                                        Pénzügyek alapjai, Finance Oktatási és Kulturális Alapítvány, Budapest, 
                                        13. fejezet: 340-345. oldalak</li>
                                    <li>Bodie, Zvi, Kane, Alex, Marcus, Alan J. (2005), Befektetések, Aula Kiadó, Budapest, 
                                        14. fejezet: 854-872. oldalak, 
                                        15. fejezet: 753-779. oldalak, 
                                        16. fejezet: 247-277. oldalak, 
                                        17. fejezet: 305-324. oldalak</li>
                                </ul>
                            </div>
                        </ol>
                    </div>

                </div>
            </div>

        <?php endif; ?>

        <div class="row">
            <div class="col-md-12">
                <h2 class="small-title not-first-title">Beiratkozáshoz szükséges iratok</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <p class="paragraf">A záróvizsgára minden diáknak kötelező a beiratkozás, és fontos, hogy ezt a határidőt ne késsétek le, hiszen
                    ez esetben nem jöhettek vizsgázni. A beiratkozással és az egyéb záróvizsgára vonatkozó határidőket itt találhatjátok: 
                    <a href="fontos_datumok.php#Zarovizsga" class="link" target="_blank">Záróvizsga határidők.</a>
                    Ugyanakkor a záróvizsgára való bejelentkezésetek során szükséges lesz néhány személyes dokumentum leadása: 
                </p>
                <ul class="disc-list list-margin-left">
                    <li>Aláírt beiratkozási kérelem</li>
                    <li>A vezetőtanár által elfogadott szakdolgozat</li>
                    <li>Aláírt nyilatkozat a munka eredetiségéről</li>
                    <li>Születési anyakönyvi kivonat</li>
                    <li>Házassági anyakönyvi kivonat (ha esedékes)</li>
                    <li>Személyi igazolvány</li>
                    <li>Nyelvismereti bizonyítvány (ha az eredeti nincs leadva)</li>
                    <li>Érettségi diploma és gimnáziumi bizonyítvány (ha az eredetiek nincsenek leadva)</li>
                    <li>Beiratkozási díj kifizetésének igazolása</li>
                </ul>
                <p class="one-line-paragraf">A külföldön végző diákok számára még szükséges: </p>
                <ul class="disc-list list-margin-left">
                    <li>A tanulmányok egyenértékűségi igazolása</li>
                    <li>Tanulmányi dokumentumok és ezen dokumentumok mellékletei (ha az eredetiek nincsenek leadva)</li>
                </ul>
                <p class="one-line-paragraf">A szükséges <a href="https://econ.ubbcluj.ro/documente2020/Documente%20inscriere%20online%20la%20examenul%20de%20licenta%20-%20Sesiunea%20iulie%202020.pdf" class="link" target="_blank">dokumentumok listáját román nyelven</a> is megtekinthetitek.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-12">
                        <h2 class="small-title not-first-title">Terembeosztások</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <p class="xsmall-title center">Februári szesszió</p>
                        <div class="table-responsive">
                            <table id="t04">
                                <tr>
                                    <th>Szakirány</th>
                                    <th>Dátum</th>
                                    <th>Időpont</th>
                                    <th>Terem</th>
                                </tr>
                                <tr>
                                    <td>Gazdasági informatika</td>
                                    <td>február 17</td>
                                    <td>9.00</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>Marketing</td>
                                    <td>február 17</td>
                                    <td>9.00</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>Menedzsment</td>
                                    <td>február 17</td>
                                    <td>9.00</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>Pénzügy és bank</td>
                                    <td>február 17</td>
                                    <td>9.00</td>
                                    <td>-</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-2">
                        
                    </div>
                    <div class="col-md-5">
                        <p class="xsmall-title center">Júniusi szesszió</p>
                        <div class="table-responsive">
                            <table id="t04">
                                <tr>
                                    <th>Szakirány</th>
                                    <th>Dátum</th>
                                    <th>Időpont</th>
                                    <th>Terem</th>
                                </tr>
                                <tr>
                                    <td>Gazdasági informatika</td>
                                    <td>június 30</td>
                                    <td>9.00</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>Marketing</td>
                                    <td>június 30</td>
                                    <td>9.00</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>Menedzsment</td>
                                    <td>június 30</td>
                                    <td>9.00</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>Pénzügy és bank</td>
                                    <td>június 30</td>
                                    <td>9.00</td>
                                    <td>-</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>


        <div class="row">
            <div class="col-md-12">
                <h2 class="small-title not-first-title">Bizottságok</h2>
            </div>
        </div>

        <div class="row">

            <?php 
            
            if ($diak->szak == "Gazdasági informatika"): ?>

                <div class="col-md-4 margin-left">
                    <p class="xsmall-title">Gazdasági informatika</p>
                    <ul class="disc-list">
                        <li>dr. Varga Viorica</li>
                        <li>dr. Gubán Ákos</li>
                        <li>dr. Avornicului Mihai-Constantin</li>
                        <li>dr. Kovács Gyöngyvér Emese</li>
                        <li>drd. Benedek Botond</li>
                    </ul>
                </div>
                
                
            <?php elseif ($diak->szak == "Marketing"): ?>
            
                <div class="col-md-4 margin-left">
                    <p class="xsmall-title">Marketing</p>
                    <ul class="disc-list">
                        <li>dr. Alt Mónika-Anetta</li>
                        <li>dr. Horváth Réka</li>
                        <li>dr. Molnár Iudita</li>
                        <li>dr. Săplăcan Zsuzsa</li>
                        <li>dr. Seer László-Csaba</li>
                    </ul>
                </div>
            
            <?php elseif($diak->szak == "Menedzsment"): ?>
            
                <div class="col-md-4 margin-left">
                    <p class="xsmall-title">Menedzsment</p>
                    <ul class="disc-list">
                        <li>dr. Szász Levente</li>
                        <li>dr. Györfy Lehel-Zoltán</li>
                        <li>dr. Kerekes Kinga</li>
                        <li>dr. Fekete-Pali-Pista Szilveszter</li>
                        <li>dr. Rácz Béla-Gergely</li>
                    </ul>
                </div>
            
            <?php elseif($diak->szak == "Pénzügy és bank"): ?>
            
                <div class="col-md-4 margin-left">
                    <p class="xsmall-title">Pánzügy és bank</p>
                    <ul class="disc-list">
                        <li>dr. Nagy Ágnes</li>
                        <li>dr. Nagy Bálint-Zsolt</li>
                        <li>dr. Cardoș Ildikó-Réka</li>
                        <li>dr. Juhász Jácint-Attila</li>
                        <li>dr. Székely Imre</li>
                    </ul>
                </div>
            
            <?php endif; ?>
        
            <div class="col-md-6">
                <img id="exam" alt="Záróvizsga" src="images\exam.jpg">
            </div>

        </div>

    </div>

    <?php include "view/navigation_view.php"; ?>

    <?php include "view/footer_view.html"; ?>
    
    <script src="js\Szakdolgozat.js"></script>
    
</body>