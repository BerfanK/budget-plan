<!doctype html>
<html lang="en">
 
    <?php include_once "imports/head.php"; ?>

    <body>
        <?php include_once "imports/navbar.php"; ?>

        <div class="container my-5">

            <div class="title">Ihr Budgetplan</div>
            <div class="title-text">Hier haben Sie einen Einblick über Ihre Ein- und Ausgaben.</div>

            <hr class="mt-3 mb-5">

            <!-- Summary Card -->
            <div class="card-title">Zusammenfassung</div>
            <div class="card mb-5 rounded-0">
                <div class="card-body">

                    <div>
                        <span class="card-input">Einkommen</span>
                        <span class="card-value">$ 40,000</span>
                    </div>

                    <div>
                        <span class="card-input">Ausgaben</span>
                        <span class="card-value">$ 43,000</span>
                    </div>

                    <hr>

                    <div>
                        <span class="card-input text-danger">Verlust</span>
                        <span class="card-value">$  3,000</span>
                    </div>

                </div>
            </div>
            <!-- End Summary Card -->

            <!-- Income Card -->
            <div class="card-title">Einkommen</div>
            <div class="card mb-5 rounded-0">
                <div class="card-body">

                </div>
            </div>
            <!-- End Income Card -->

            <!-- Outcome Card -->
            <div class="card-title">Ausgaben</div>
            <div class="card mb-5 rounded-0">
                <div class="card-body">

                </div>
            </div>
            <!-- End Outcome Card -->

        </div>

        <?php include_once "imports/scripts.php"; ?>
    </body>

</html>
