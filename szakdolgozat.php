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
                <h1 class="title">Szakdolgozat elkészítése</h1>
            </div>
        </div> 

    </div>

    <div class="container">

        <div class="row">

            <div class="col-md-6">

                <div class="row">
                    <div class="col-md-12">
                        <h2 class="small-title"><span class="special-number">1 </span>Téma és vezető tanár kiválasztása</h2>
                    </div>
                </div>
                <p class="paragraf">Első és legfontosabb dolgotok, ami a szakdolgozatot és 
                    az ezzel kapcsolatos kötelességeiteket illeti, a beiratkozás. Ennek 
                    határideje 2019. október 25. Ha még nem választottátok ki az általatok 
                    kidolgozandó témát, illetve a vezető tanárt, akivel dolgozni szeretnétek, 
                    akkor itt az idő! 
                </p>
                <p class="paragraf">Miután beiratkozás formájában is megbizonyosodott, 
                    hogy belevágtok a szakdolgozat elkészítésébe, vállaljátok a vele járó munkát 
                    és annak bemutatását a bizottság előtt, fontos, hogy átlássátok az ezzel 
                    kapcsolatos eseményeket, teendőket.
                </p>
            </div>

            <div class="col-md-6">

                <div class="row">
                    <div class="col-md-12">
                        <h2 class="small-title"><span class="special-number">2 </span>Vezető tanárok visszaigazolása</h2>
                    </div>
                </div>
                <p class="paragraf">Beiratkozást követően várnotok kell arra, hogy a vezető 
                    tanárok által elfogadott diákok listája megjelenjen. Ekkor tekinthetitek meg, 
                    hogy melyik tanár lesz az, aki a munkátokat nyomonköveti, segít nektek. Ezt az alábbi csatolmányban jelenítjük meg: 
                    <a class="link" target="_blank" href="http://hu.econ.ubbcluj.ro/data/pdf/Vegzosoknek/Temavalasztas%20leosztas%202019.pdf">
                        Vezető tanárok által elfogadott diákok listája</a>.</p>
                <p class="paragraf">Amennyiben elutasításra kerültök, lehetőségetek van választani más témát 
                    olyan tanárnál, akinél még vannak szabad helyek.
                </p>
            
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <h2 class="small-title"><span class="special-number">3 </span>A szakdolgozat struktúrája</h2>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12">
                <p class="paragraf">Miután meglett mindenkinek a vezető tanára, illetve 
                    szakdolgozat témája, meg kell határoznotok a dolgozat felépítését. Letölthetitek a szakdolgozat általános sablonját, 
                    amelyet felhasználva már neki is foghattok a munkának: 
                    <a class="file" href="Szakdolgozat-Sablon.docx">Szakdolgozat-Sablon.docx</a>
                    Az alábbi egy általánosan javasolt struktúra, viszont ez a dolgozatotok 
                    elkészítése során a vizsgált témának megfelelően változhat:
                </p>
                <ul class="disc-list strait">
                    <li class="pointer list-accordion">Összefoglaló</li>
                    <p class="description">Javasolt, hogy az összefoglalóban fogalmazzátok meg a
                        személyes, tudományos és szakmai hozzájárulásotok elemeit: elméleti (szakirodalom
                        kutatás/összefoglalás, fogalmak tisztázása, szakértői vélemények stb.), valamint gyakorlati
                        (módszertan, felhasznált adatok, eredmények, következtetések, hasznosság) szinten. Legyen
                        tömör, azt mutassa be, amit a dolgozatban megvalósítottatok.
                    </p>

                    <li class="pointer list-accordion">Tartalomjegyzék</li>
                    <p class="description">Javasolt a tartalomjegyzék automatikus generálása.</p>

                    <li class="pointer list-accordion">Rövidítések</li>
                    <p class="description">Csak akkor szükséges ezt az oldalt használni, ha a dolgozat rövidítéseket tartalmaz. 
                        Más esetben az oldalt törölni kell.
                    </p>

                    <li class="pointer list-accordion">Táblázatok és ábrák jegyzéke</li>
                    <p class="description">Csak abban az esetben kitöltendő, amennyiben a dolgozatban jelentős számú (legalább 10) ábra/táblázat
                        található.
                    </p>

                    <li class="pointer list-accordion">Bevezető</li>
                    <p class="description">A téma rövid bemutatása, a témaválasztás indoklása, legtöbb 1 oldal terjedelemben.</p>

                    <li class="pointer list-accordion">Fejezetek és alfejezetek</li>
                    <p class="description">Fontos, hogy a szakdolgozatotok fejezetekből, illetve alfejezetekből 
                        legyen felépítve. Így sokkal átláthatóbb lesz a munkátok.
                    </p>

                    <li class="pointer list-accordion">Következtetések</li>
                    <p class="description">Ebben a fejezetben kell összegezni a dolgozat fontosabb
                        eredményeit, összevetve a szakirodalomban megjelent eredményekkel és a
                        dolgozatban megfogalmazott célokkal. Be kell mutatni a dolgozat gyenge és
                        erős pontjait, és a további kutatási lehetőségeket.
                    </p>

                    <li class="pointer list-accordion">Irodalomjegyzék</li>
                    <p class="description">Az irodalomjegyzék a felhasznált szakirodalmi források
                        adatait tartalmazza. Csak azokat a szakcikkeket és könyveket tüntessük fel,
                        amelyeket valóban használtunk a dolgozat készítése során, és azokra a
                        szövegben is hivatkoztunk. Elvárás legalább 15-20 forrás felhasználása, ezek
                        között kívánatos idegen nyelvű közlemények szerepeltetése is. A lehető
                        legfrissebb szakcikkeket, könyveket használjuk. Nem javasolt a Wikipedia-ra
                        hivatkozni vagy nem tudományos szaklapokra és blogokra.
                    </p>

                    <li class="pointer list-accordion">Mellékletek</li>
                    <p class="description">Mellékletekként szerepeltessük azokat a kiegészítő
                        dokumentumokat, amelyek nem tartoznak szervesen a dolgozat törzséhez, de a
                        témában elmélyülni szándékozó olvasó számára további kiegészítő
                        információt tartalmaznak (egyedi adatok, részletes kérdőívek, az
                        eredményeket részletesen illusztráló táblázatok, stb.). A mellékletek nem
                        számítanak bele a dolgozat terjedelmébe.
                    </p>

                </ul>
            </div>

        </div>

        <div class="row">

            <div class="col-md-6">

                <div class="row">
                    <div class="col-md-12">
                        <h2 class="small-title"><span class="special-number">4 </span>A szakdolgozat szerkesztése</h2>
                    </div>
                </div>
                <p class="paragraf">A szakdolgozat fejezetekből, illetve alfejezetekből kell felépüljön. Nem létezik egyedi szabály a
                    szerkesztésére vonatkozóan, viszont be kell tartani bizonyos kéréseket, követelményeket, amelyek a
                    szövegszerkesztésre vonatkoznak. Ugyanakkor figyelembe kell venni a szerzői jogokat is a dolgozat megírása során.
                </p>
                <p class="paragraf">A szakdolgozat elkészítésénél ajánlatos egy optimális struktúra használata, így elkerülendő a dolgozat 7-nél több fejezetre való
                    felosztása. Egy fejezet sem állhat csupán egyetlen alfejezetből.
                </p>
                <p class="paragraf">Az alábbiakban megtekinthetitek a szakdolgozat útmutatóját, amely egy konkrét témát tárgyalva bemutatja, hogy
                    milyen kell legyen a szakdolgozat szerkezete, e téma esetén példázza a dolgozat tartalmát, illetve leírja a szövegszerkesztésre vonatkozó szabályokat: <a class="link" target="_blank" 
                    href="http://hu.econ.ubbcluj.ro/data/pdf/Licensz%20irasbeli/Szak-es-disszertacios-dolgozatok-utmutatoja-2018.pdf">Szakdolgozat útmutató</a>
                </p>
            </div>

            <div class="col-md-6">

                <div class="row">
                    <div class="col-md-12">
                        <h2 class="small-title"><span class="special-number">5 </span><span id="Kutterv">Kutatási terv elkészítése</span></h2>
                    </div>
                </div>
                <p class="paragraf">A dolgozatotok elkészítése során kutatási tervet vagy a már félkész-/kész dolgozatot kell benyújtsátok a vezető tanárotoknak. 
                    Vele egyeztetve, illetve attól függően, hogy ki hogy haladt a szakdolgozatával, döntsétek el, hogy kutatási tervet készítetek, 
                    vagy az eddig elkészült dolgozatot külditek el neki.
                </p>
                <p class="paragraf">Az alábbiakban csatoltuk a kutatási terv formai, illetve tartalmi követelményeit: 
                    <a class="file" href="Szakdolgozat-Kutatási-terv.docx">Szakdolgozat-Kutatási-terv.docx</a>. A kutatási tervek vagy elkészült dolgozatok 
                    leadási határideje: 2020. április 20. A munkátokat elektronikusan kell a vezető tanárotoknak elküldeni az említett határidőig.</p>
                <p class="paragraf">Fontos, hogy azok a hallgatók is készítsenek kutatási tervet, akik 
                    esetleg nem tervezik a dolgozatot most megírni, hiszen a kutatási terv mindenkinek külön tantárgyként szerepel a tantervben, 
                    tehát minden diák jegyet kell kapjon az említett tárgyból.
                </p>
            </div>

        </div>

        <div class="row">

            <div class="col-md-5">
                <img id="print" alt="Szakdolgozat kinyomtatva, bekötve" src="images/printing-thesis.jpg">
            </div>

            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="small-title"><span class="special-number">6 </span>A szakdolgozat nyomtatása</h2>
                    </div>
                </div>
                
                <p class="paragraf">A szakdolgozatot három példányba, A4-es lapokra kell kinyomtatni. Egy leadásra kerül a titkárságra, egy a
                    vezető konzulens példánya (ha több van, akkor mindenkinek el kell juttatni egy példányt) és egy
                    a saját példányotok. A dolgozat beköthető műanyagspirálozással, fémspirálozással vagy klasszikusan bőrkötéssel.
                </p>
                <p class="paragraf">Fontos, hogy a fedőlapok, összefoglaló, tartalomjegyzék, rövidítések (hogyha van), táblázatok listája (hogyha
                    van) egyoldalasan, a dolgozat többi része pedig kétoldalasan legyen kinyomtatva.
                </p>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <h2 class="small-title"><span class="special-number">7 </span><span id="Lead">A szakdolgozat leadása</span></h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                
                <p class="paragraf">A leadás előtt javasolt, hogy a témavezető tanár jóváhagyja a diák által elkészített szakdolgozat szerkezetét.
                    A témavezető beleegyezése és aláírása után a dolgozatot leadhatjátok az egyetem titkárságán, és ugyanakkor
                    szükséges, hogy egy CD-n elektronikus formában is mellékeljétek a dolgozatot.
                </p>
                <p class="paragraf">A témavezetőnek joga van nem javasolni megvédésre azon dolgozatokat, amelyek nem felelnek
                    meg a minimális szakmai és formai követelményeknek.
                </p>
            </div>

        </div>

        <div class="row">

            <div class="col-md-6">

                <div class="row">
                    <div class="col-md-12">
                        <h2 class="small-title"><span class="special-number">8 </span><span id="Megved">A szakdolgozat megvédése</span></h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <p class="paragraf">Miután sikeresen befejeztétek és leadtátok a szakdolgozatotokat, következik annak megvédése. 
                            A bemutatás időtartama általában 10 perc, az ezt követő 5 percben a kérdések következnek, majd a hallgató bizottság meghatározza 
                            a végleges jegyet. Az alábbi csatolmányokban nézhetitek meg, mikor és melyik terembe vagytok beosztva, természetesen abban a szesszióban, 
                            amit beiratkozáskor kiválasztottatok:
                        </p>
                        <div class="row margin-top-bottom">
                            <div class="col-md-6">
                                <ul class="disc-list">
                                    <li class="bold margin-top-bottom">2021. februári szesszió</li>
                                    <p class="department"><a href="# return: false;" class="link-bourdon">Gazdasági informatika</a></p>
                                    <p class="department"><a href="https://econ.ubbcluj.ro/documente2020/sustinere-lucrari-licenta-februarie/Marketing%20(in%20limba%20maghiara).PDF" class="link-bourdon" target="_blank">Marketing</a></p>
                                    <p class="department"><a href="# return: false;" class="link-bourdon">Menedzsment</a></p>
                                    <p class="department"><a href="https://econ.ubbcluj.ro/documente2020/sustinere-lucrari-licenta-februarie/Finante%20si%20banci%20(in%20limba%20maghiara).PDF" class="link-bourdon" target="_blank">Pénzügy és bank</a></p>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="disc-list">
                                    <li class="bold margin-top-bottom">2021. júniusi szesszió</li>
                                    <p class="department"><a href="# return: false;" class="link-bourdon">Gazdasági informatika</a></p>
                                    <p class="department"><a href="# return: false;" class="link-bourdon">Marketing</a></p>
                                    <p class="department"><a href="# return: false;" class="link-bourdon">Menedzsment</a></p>
                                    <p class="department"><a href="# return: false;" class="link-bourdon">Pénzügy és bank</a></p>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">

                <div class="row">
                    <div class="col-md-12">
                        <h2 class="small-title"><span class="special-number">9 </span><span id="Ertekel">A szakdolgozat értékelési szempontjai</span></h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div id="harmonica1">
                            <h3 class="paragraf bourdon pointer bold">1. Témaválasztás és bevezetés <span class="point bourdon">(10 pont)</span></h3>
                            <div>
                                <ul class="disc-list">
                                    <li>A hallgató indokolja-e a témaválasztását, illetve a téma újszerűségét?</li>
                                    <li>A hallgató meghatároz célkitűzéseket?</li>
                                    <li>A dolgozat felépítésének és kifejtésének bemutatása szerepel a bevezetésben?</li>
                                </ul>
                            </div>
                            <h3 class="paragraf bourdon pointer bold">2. Elméleti felvezetés és bemutatás <span class="point bourdon">(20 pont)</span></h3>
                            <div>
                                <ul class="disc-list">
                                    <li>A felhasznált szakirodalom illeszkedik-e a feldolgozott témához? Aktuális? Megbízható?</li>
                                    <li>Milyen mértékben alkalmazza a hallgató a képzés során szerzett ismereteket? Mennyire merít
                                        az egyes tárgyak kapcsán feldolgozott kötelező irodalomból?
                                    </li>
                                    <li>A tananyagot milyen mértékben egészíti ki más, hazai vagy nemzetközi, releváns forrásokkal
                                        (szakkönyvek, tudományos cikkek, tanulmányok)?
                                    </li>
                                    <li>Megtalálható-e az elméletek szintetizálása?</li>
                                </ul>
                            </div>
                            <h3 class="paragraf bourdon pointer bold">3. Módszertan <span class="point bourdon">(10 pont)</span></h3>
                            <div>
                                <ul class="disc-list">
                                    <li>A meghatározott célkitűzésekhez, valamint az elemezett problémához megfelelő módszereket
                                        alkalmaz-e a hallgató?
                                    </li>
                                    <li>A kiválasztott kutatásmódszertan összhangban áll a kiválasztott elméleti megközelítéssel?</li>
                                    <li>A módszertani megközelítés (kvantitatív vagy kvalitatív), a konkrét adatgyűjtési eszközök (pl.
                                        kérdőív, interjú), illetve az adatgyűjtés konkrét módjára vonatkozó információk
                                        (mintajellemzők, kérdőív kitöltésének és feldolgozásának módja, interjúkészítés) a megfelelő
                                        részletességgel van-e elmagyarázva?
                                    </li>
                                </ul>
                            </div>
                            <h3 class="paragraf bourdon pointer bold">4. Gyakorlati rész bemutatása és az adatok elemzése <span class="point bourdon">(30 pont)</span></h3>
                            <div>
                                <ul class="disc-list">
                                    <li>A gyakorlati rész mennyire alapszik az elméleti részen?</li>
                                    <li>Az adatgyűjtés és a feldolgozás igazodik-e az elméleti és módszertani részben megfogalmazott célkitűzésekhez?</li>
                                    <li>Az adatfeldolgozás szakszerű? Aktuális adatokat dolgoz fel? Helyes a módszertani feldolgozás?</li>
                                    <li>Mennyire teljes körű az elemzés?</li>
                                </ul>
                            </div>
                            <h3 class="paragraf bourdon pointer bold">5. Eredmények, következtetések és javaslatok <span class="point bourdon">(20 pont)</span></h3>
                            <div>
                                <ul class="disc-list">
                                    <li>Mennyire képes a hallgató összegezni és összefoglalni az eredményeket?</li>
                                    <li>Összhangban vannak az eredmények a célkitűzésekkel?</li>
                                    <li>Az eredmények úgy számszakilag, mint tartalmilag helytállóak?</li>
                                    <li>Tartalmaz a dolgozat újszerű eredményeket vagy megállapításokat?</li>
                                    <li>A következtetések és javaslatok helytállóak, aktuálisak?</li>
                                    <li>Tartalmaz a dolgozat kitekintést a további kapcsolódó témákra vagy elvégzendő elemzésekre?</li>
                                    <li>Megnevezi a hallgató a kutatás korlátait?</li>
                                </ul>
                            </div>
                            <h3 class="paragraf bourdon pointer bold">6. Szerkezeti és formai követelmények <span class="point bourdon">(10 pont)</span></h3>
                            <div>
                                <ul class="disc-list">
                                    <li>Igazodik a dolgozat felépítése az Útmutató-ban előírt struktúrához?</li>
                                    <li>Az ábrák, táblázatok megfelelően vannak alkalmazva? Formailag teljesek?</li>
                                    <li>Mennyire világos és érthető a dolgozat az olvasó számára?</li>
                                    <li>Megfelelő a szerkesztés, stílus és külalak?</li>
                                </ul>
                            </div>
                        </div>
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