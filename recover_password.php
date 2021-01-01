<?php

    session_start();

    include_once "dao\DiakDAO.php";

    if (isset($_SESSION['felhasznalonev']) && $_SESSION['felhasznalonev'] != "") {
        header('Location: http://localhost/website/Web_projekt/kezdooldal.php');
        exit();
    }

    if (isset($_POST['email']) && $_POST['email'] != "") {
        $to = $_POST['email'];

        $diakDAO = new DiakDAO;
        $diak = $diakDAO->findByDEmail($to);

        if ($diak) {
            $first = strtolower(($diak->csaladnev)[0]);

            $elso_keresztnev = explode(" ", $diak->keresztnev);
            $second = strtolower($elso_keresztnev[0]);

            $password = $first . "." . $second;

            $from = "kozgaz.magyarkar@gmail.com";

            header('Content-Type: text/html; charset=utf-8'); 

            // Define and Base64 encode the subject line
            $subject_text = "Jelszó visszanyerése";
            $subject = '=?UTF-8?B?' . base64_encode($subject_text) . '?=';

            // Add custom headers
            $headers = 'Content-Type: text/plain; charset=utf-8' . "\r\n";
            $headers .= 'Content-Transfer-Encoding: base64';

            $msg = base64_encode("Kedves $diak->keresztnev!\n\nA Közgazdaság és Gazdálkodástudományi Kar Magyar Tagozatának szakdolgozatra való bejelentkezésének weboldalára az alábbi jelszavad érvényes:\n\n$password******, ahol a csillagok helyére a személyi számod utolsó 6 számjegye kerül.\n\nA Közgazdaság és Gazdálkodástudományi Kar Magyar Tagozata");
            mail($to, $subject, $msg, $headers);
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
                <h1 class="title">Szakdolgozat a közgázon</h1>
                <h2 class="subtitle">- Avagy minden, amiről tudnod kell -</h2>
            </div>
        </div> 

    </div>

    <div class="container">

        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                <div class="col-md-12">
                    <p class="paragraf">Megkérünk, írd be az egyetemi email címed, hogy el tudjuk neked küldeni a jelszódat!</p>
                </div>
            </div>
            <div class="col-md-2">

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="col-md-2">

                </div>
                <div class="col-md-8">
                    <form class="password-form" onsubmit="return checkEmail()" action="recover_password.php" id="form-password" method="POST">

                        <div class="form-group col-md-7">
                            <label class="password">Email cím:</label>
                            <input type="email" onchange="changeEmailText()" class="form-control one-name" name="email" id="email-cim" value="">
                            <span id="error-email"></span>
                        </div>
                        <div class="form-group col-md-5">
                            <button type="submit" name="button" class="btn btn-default center-block">Elküld</button>
                        </div>

                    </form>
                </div>
                <div class="col-md-2">
                
                </div>
            </div>
        </div>

    </div>

    <?php include "view/navigation_view.php"; ?>
    
    <?php include "view/footer_view.html"; ?>        
       
    <script src="js\Szakdolgozat.js"></script>

</body>

</html>