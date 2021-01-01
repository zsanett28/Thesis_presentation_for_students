<?php
    function active($currect_page){
        $url_array =  explode('/', $_SERVER['REQUEST_URI']);
        $url = end($url_array);
        $url=strtok($url,'?');
        if($currect_page == $url){
            echo 'active';
        } 
    }
?>

<?php if (isset($_SESSION['szerep']) && $_SESSION['szerep'] == "diak"): ?>

    <div class="container-fluid">
        <div class="menu">
            <nav class="navigation">
                
                <nav class="navbar navbar-light bg-light" id="navbar">
                    <div id="hamburger">
                        <div class="slice slice-1"></div>
                        <div class="slice slice-2"></div>
                        <div class="slice slice-3"></div>
                    </div>
                </nav>
            
                <ul class="list-unstyled">
                    <li class="list-item1">
                        <a href="kezdooldal.php" class ="menulink <?php active('kezdooldal.php');?>">Kezdőoldal</a>
                    </li>
                    <li class="list-item1">
                        <a href="temajavaslatok.php" class ="menulink <?php active('temajavaslatok.php');?>">Témajavaslatok</a>
                    </li>
                    <li class="list-item1">
                        <a href="beiratkozas.php" class ="menulink <?php active('beiratkozas.php');?>">Téma és tanár választás</a>
                    </li>
                    <li class="list-item1">
                        <a href="szakdolgozat.php" class ="menulink <?php active('szakdolgozat.php');?>">Szakdolgozat elkészítése</a>
                    </li>
                    <li class="list-item1">
                        <a href="feltoltes.php" class ="menulink <?php active('feltoltes.php');?>">Dokumentumok feltöltése</a>
                    </li>
                    <li class="list-item1">
                        <a href="zarovizsga.php" class ="menulink <?php active('zarovizsga.php');?>">Záróvizsga</a>
                    </li>
                    <li class="list-item1">
                        <a href="fontos_datumok.php" class ="menulink <?php active('fontos_datumok.php');?>">Fontos határidők</a>
                    </li>
                    <li class="list-item1">
                        <a href="gyik.php" class ="menulink <?php active('gyik.php');?>">Gyakran feltett kérdések</a>
                    </li>
                    <li class="list-item1">
                        <a href="kapcsolat.php" class ="menulink <?php active('kapcsolat.php');?>">Kapcsolat</a>
                    </li>
                </ul>       
                
            </nav>
        </div>
    </div>

<?php elseif (isset($_SESSION['felhasznalonev']) && $_SESSION['szerep'] == "tanar"): ?>

    <div class="container-fluid">
        <div class="menu">
            <nav class="navigation">
                
                <nav class="navbar navbar-light bg-light" id="navbar">
                    <div id="hamburger">
                        <div class="slice slice-1"></div>
                        <div class="slice slice-2"></div>
                        <div class="slice slice-3"></div>
                    </div>
                </nav>
            
                <ul class="list-unstyled">
                    <li class="list-item1">
                        <a href="kezdooldal.php" class ="menulink <?php active('kezdooldal.php');?>">Kezdőoldal</a>
                    </li>
                    <li class="list-item1">
                        <a href="temajavaslatok_tanar.php" class ="menulink <?php active('temajavaslatok_tanar.php');?>">Témajavaslataim</a>
                    </li>
                    <li class="list-item1">
                        <a href="diak_kivalasztas.php" class ="menulink <?php active('diak_kivalasztas.php');?>">Diákjaim kiválasztása</a>
                    </li>
                    <li class="list-item1">
                        <a href="jegyadas.php" class ="menulink <?php active('jegyadas.php');?>">Jegyadás</a>
                    </li>
                    <li class="list-item1">
                        <a href="gyik.php" class ="menulink <?php active('gyik.php');?>">Gyakran feltett kérdések</a>
                    </li>
                </ul>
                
            </nav>
        </div>
    </div>

<?php elseif (isset($_SESSION['felhasznalonev']) && $_SESSION['szerep'] == "admin"): ?>

    <div class="container-fluid">
        <div class="menu">
            <nav class="navigation">
                
                <nav class="navbar navbar-light bg-light" id="navbar">
                    <div id="hamburger">
                        <div class="slice slice-1"></div>
                        <div class="slice slice-2"></div>
                        <div class="slice slice-3"></div>
                    </div>
                </nav>
            
                <ul class="list-unstyled">
                    <li class="list-item1">
                        <a href="kezdooldal.php" class ="menulink <?php active('kezdooldal.php');?>">Kezdőoldal</a>
                    </li>
                    <li class="list-item1">
                        <a href="temajavaslatok.php" class ="menulink <?php active('temajavaslatok.php');?>">Témajavaslatok</a>
                    </li>
                    <li class="list-item1">
                        <a href="osszesito.php" class ="menulink <?php active('osszesito.php');?>">Összesítő</a>
                    </li>
                    <li class="list-item1">
                        <a href="gyik.php" class ="menulink <?php active('gyik.php');?>">Gyakran feltett kérdések</a>
                    </li>
                </ul>
                
            </nav>
        </div>
    </div>

<?php else: ?>

    <div class="container-fluid">
        <div class="menu">
            <nav class="navigation">
                
                <nav class="navbar navbar-light bg-light" id="navbar">
                    <div id="hamburger">
                        <div class="slice slice-1"></div>
                        <div class="slice slice-2"></div>
                        <div class="slice slice-3"></div>
                    </div>
                </nav>
            
                <ul class="list-unstyled">
                    <li class="list-item1">
                        <a href="kezdooldal.php" class ="menulink <?php active('kezdooldal.php');?>">Kezdőoldal</a>
                    </li>
                    <li class="list-item1">
                        <a href="temajavaslatok.php" class ="menulink <?php active('temajavaslatok.php');?>">Témajavaslatok</a>
                    </li>
                    <li class="list-item1">
                        <a href="szakdolgozat.php" class ="menulink <?php active('szakdolgozat.php');?>">Szakdolgozat elkészítése</a>
                    </li>
                    <li class="list-item1">
                        <a href="gyik.php" class ="menulink <?php active('gyik.php');?>">Gyakran feltett kérdések</a>
                    </li>
                    <li class="list-item1">
                        <a href="kapcsolat.php" class ="menulink <?php active('kapcsolat.php');?>">Kapcsolat</a>
                    </li>
                </ul>
                
            </nav>
        </div>
    </div>

<?php endif; ?>