<!doctype html>
<html lang="en">
 
    <?php include_once "imports/head.php"; ?>

    <body>

        <div class="container justify-between" style="margin-top: 10rem;">

            <div class="row">

                <div class="col-lg-4 col-lg-4 col-md-12 col-sm-12 mx-auto">

                    <!-- Login Card -->
                    <div class="card my-5 rounded-0">
                        <div class="card-body">

                            <div class="login-title">Konto erstellen.</div>
                            <div class="login-text">Willkommen, bitte füllen Sie die Daten.</div>

                            <hr class="my-4">

                            <form autocomplete="off" class="needs-validation" method="post" novalidate>
                            
                                <div class="form-group mb-2">
                                    <label for="username" class="form-label"><b>Benutzername <span class="text-danger">*</span></b></label>
                                    <input type="text" class="form-control shadow-none rounded-0" name="username" placeholder="Ihr Benutzername ...">
                                </div>

                                <div class="form-group mb-2">
                                    <label for="email" class="form-label"><b>Email-Adresse <span class="text-danger">*</span></b></label>
                                    <input type="email" class="form-control shadow-none rounded-0" name="email" placeholder="Ihre Email-Adresse ...">
                                </div>

                                <div class="form-group mb-2">
                                    <label for="password" class="form-label"><b>Passwort <span class="text-danger">*</span></b></label>
                                    <input type="password" class="form-control shadow-none rounded-0" name="password" placeholder="Ihr Passwort ...">
                                </div>

                                <div class="form-group mb-2 mt-4">
                                    <button type="submit" class="form-control btn btn-dark shadow-none rounded-0" name="submit">Registrieren</button>
                                </div>

                                <div class="login-info">Haben Sie ein Konto? <a href="./login">Jetzt anmelden</a>.</div>

                            </form>

                        </div>
                    </div>
                    <!-- End Login Card -->

                </div>

            </div>

        </div>

        <?php include_once "imports/scripts.php"; ?>
    </body>

</html>
