<div class="background-login col-md-10">
    <div class="row">
        <?php if (isset($_SESSION['felhasznalonev'])): ?>

            <div class="greeting-logout">
                <div class="col-md-4">
                    <h2 class="greeting"> <?= "Üdvözlünk, " . $_SESSION['keresztnev'] . "!" ?> </h2>
                </div>

                <div class="col-md-3">
                    <form class="logout-form" action = "logout.php" id="form-kijelentkezes" method="POST">
                        <div class="form-group col-md-12">
                            <button type="submit" name="button" class="btn btn-logout">Kijelentkezés</button>
                        </div>
                    </form>
                </div>
            </div>

        <?php else: ?>

            <form class="login-form" action="login.php" id="form-bejelentkezes" method="POST">

                <div class="form-group col-md-3">
                    <label class="bejelentkezes">Felhasználónév:</label>
                    <input type="text" class="form-control one-name" name="felhasznalonev" id="felhnev">
                    <?php if ((isset($_GET['error']) && $_GET['error'] == "invalid-login")):?>
                        <span class="error">Hibás felhasználó vagy jelszó!</span>
                    <?php endif; ?>
                </div>
                <div class="form-group col-md-2">
                    <label class="bejelentkezes">Jelszó:</label>
                    <input type="password" class="form-control one-name" name="jelszo">
                </div>
                <div class="form-group col-md-2">
                    <button type="submit" name="button" class="btn btn-login center-block">Bejelentkezés</button>
                </div>
                    
            </form>
            <form class="password-form" action="recover_password.php" id="form-password" method="POST">
                <div class="form-group col-md-2">
                    <button type="submit" name="button" class="btn btn-login center-block">Elfelejtettem a jelszavam</button>
                </div>       
            </form>

        <?php endif; ?>  
    </div>  
</div>

