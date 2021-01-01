<?php
    session_start();

    include_once "dao\DiakDAO.php";

    if (!isset($_SESSION['szerep'])) {
        $diak_email="";
    } else {
        if ($_SESSION['szerep'] == "tanar" || $_SESSION['szerep'] == "admin") {
            header('Location: http://localhost/website/Web_projekt/kezdooldal.php');
            exit();
        }
    }

    if (isset($_SESSION['felhasznalonev']) && $_SESSION['felhasznalonev'] != "") {
        $felhasznalonev = $_SESSION['felhasznalonev'];
        $diakDAO = new DiakDAO;
        $diak_email = ($diakDAO->findBySzemelyiszam($felhasznalonev))->email;
    }
    
    if(isset($_POST['email']) && $_POST['email'] != "" && isset($_POST['subject']) && $_POST['subject'] != "" && isset($_POST['message']) && $_POST['message'] != "") {
        $to = "kozgaz.magyarkar@gmail.com";
        $from = $_POST['email'];

        header('Content-Type: text/html; charset=utf-8'); 

        // Define and Base64 encode the subject line
        $subject_text = $_POST['subject'];
        $subject = '=?UTF-8?B?' . base64_encode($subject_text) . '?=';

        // Add custom headers
        $headers = 'Content-Type: text/plain; charset=utf-8' . "\r\n";
        $headers .= 'Content-Transfer-Encoding: base64' . "\r\n";
        $headers .= 'From: ' . $from;

        $message = $_POST['message'] . "\n\n<$from>";
        $msg = base64_encode($message);
        mail($to, $subject, $msg, $headers);
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
                <h1 class="title">Kapcsolat</h1>
            </div>
        </div> 

    </div>

    <div class="container">

        <div class="row">

            <div class="col-md-6">
                <img id="university-contact" alt="FSEGA épülete" src="images\university.jpg">
            </div>

            <div class="col-md-6 contact-letter">
                <p class="first">Kedves végzőseink!</p>
                <p>Bármilyen szakdolgozattal, záróvizsgával kapcsolatosan felmerülő kérdéseitekre, szívesen válaszolunk,  
                    el tudtok érni minket az alábbi elérhetőségeken. Ha továbbtanuláson gondolkodtok, tudatjuk veletek, hogy három magyar nyelvű 
                    közgazdasági mesteri képzést biztosítunk számotokra, mellyel kapcsolatos kérdéseiteket szintén örömmel várjuk!
                </p>
                <div class="ultimate">
                    <p>Nagyon sok sikert kívánunk nektek!</p>
                    <p>Közgazdaság- és Gazdálkodástudományi Kar</p>
                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-md-6">
                <p class="one-line-paragraf-small first-contact"><span class="contact">Cím: </span>Teodor Mihail út 58-60 szám, Kolozsvár</p>
                <p class="one-line-paragraf-small"><span class="contact">Telefonszám: </span>0264 418 652-5</p>
                <p class="one-line-paragraf-small"><span class="contact">E-mail cím: </span>
                    <a class="link" href="mailto:magyar.intezet@econ.ubbcluj.ro" target="_blank">magyar.intezet@econ.ubbcluj.ro</a>
                </p>
                <p class="one-line-paragraf-small"><span class="contact">Honlap: </span>
                    <a class="link" href="http://hu.econ.ubbcluj.ro/" target="_blank">http://hu.econ.ubbcluj.ro/</a>
                </p>
            </div>

            <div class="col-md-6">

                <p class="form2-title">Kérdéseiteket itt is megírhatjátok:</p>
                <form action="kapcsolat.php" onsubmit="return checkKapcsolatForm()" id="kapcsolat-form" method="POST">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>E-mail cím:</label>
                                    <input type="email" onchange="changeEmail()" class="form-control" class="email" id="email" name="email" value="<?php echo $diak_email;?>">
                                    <span id="email-error"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Tárgy:</label>
                                    <input type="input" onchange="changeSubject()" class="form-control" id="subject" name="subject">
                                    <span id="subject-error"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Üzenet/Kérdés:</label>
                                    <br>
                                    <textarea class="form-control" onchange="changeMessage()" rows="5" id="message" name="message"></textarea>
                                    <span id="message-error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <button type="submit" name="button" class="btn btn-default center-block">Küldés</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
    
            </div>

        </div>

    </div>

    <?php include "view/navigation_view.php"; ?>
    
    <?php include "view/footer_view.html"; ?>
    
    <script src="js\Szakdolgozat.js"></script>

</body>

</html>