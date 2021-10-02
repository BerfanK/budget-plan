<!doctype html>
<html lang="en">
 
    <?php include_once "imports/head.php"; ?>

    <body>
        <?php include_once "imports/navbar.php"; ?>

        <div class="container my-5">

            <div class="title">Ihr Budgetplan</div>
            <div class="title-text">Einblick über Ihre Ein- und Ausgaben.</div>

            <hr class="mt-3 mb-5">

            <!-- Summary Card -->
            <div class="card-title">Zusammenfassung</div>
            <div class="card mb-5 rounded-0">
                <div class="card-body">

                    <div>
                        <span class="card-input">Einkommen</span>
                        <span class="card-value">CHF <span class="balance">6'150</span></span>
                    </div>

                    <div>
                        <span class="card-input">Ausgaben</span>
                        <span class="card-value">CHF <span class="balance">1'320</span></span>
                    </div>

                    <hr>

                    <div>
                        <span class="card-input">Übriges Gehalt</span>
                        <span class="card-value fw-bold">CHF <span class="balance">4'830</span></span>
                    </div>

                </div>
            </div>
            <!-- End Summary Card -->

            <!-- Income Card -->
            <div class="card-title">Einkommen</div>
            <div class="card mb-5 rounded-0">
                <div class="card-body">

                    <div>
                        <span class="card-input">Einkommen</span>
                        <span class="card-value">CHF <span class="balance">4'000</span></span>
                    </div>

                    <div>
                        <span class="card-input">Eltern</span>
                        <span class="card-value">CHF <span class="balance">150</span></span>
                    </div>

                    <div>
                        <span class="card-input">Anderes</span>
                        <span class="card-value">CHF <span class="balance">2'000</span></span>
                    </div>

                    <hr>

                    <div>
                        <span class="card-input">Total Gehalt</span>
                        <span class="card-value fw-bold">CHF <span class="balance">6'150</span></span>
                    </div>
                
                </div>
            </div>
            <!-- End Income Card -->

            <!-- Outcome Card -->
            <div class="card-title">Ausgaben</div>
            <div class="card mb-5 rounded-0">
                <div class="card-body">

                <div class="table-responsive"> 

                    <table class="table">

                        <thead>
                            <tr>
                                <th>Kategorie</th>
                                <th>Budget</th>
                                <th>Kosten</th>
                                <th>Differenz</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td><span class="card-value fw-bold">Führerschein</span></td>
                                <td><span class="card-value">CHF <span class="balance">900</span></span></td>
                                <td><span class="card-value">CHF <span class="balance">1'200</span></span></td>
                                <td><span class="card-value text-danger">CHF <span class="balance">300</span></span></td>
                            </tr>

                            <tr>
                                <td><span class="card-value fw-bold">Unterhaltung</span></td>
                                <td><span class="card-value">CHF <span class="balance">25</span></span></td>
                                <td><span class="card-value">CHF <span class="balance">20</span></span></td>
                                <td><span class="card-value text-success">CHF <span class="balance">5</span></span></td>
                            </tr>

                            <tr>
                                <td><span class="card-value fw-bold">Lebensmittel</span></td>
                                <td><span class="card-value">CHF <span class="balance">500</span></span></td>
                                <td><span class="card-value">CHF <span class="balance">100</span></span></td>
                                <td><span class="card-value text-success">CHF <span class="balance">400</span></span></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr>
                                <td><span class="card-value fw-bold">Gesamt</span></td>
                                <td><span class="card-value fw-bold">CHF <span class="balance">1'425</span></span></td>
                                <td><span class="card-value fw-bold">CHF <span class="balance">1'320</span></span></td>
                                <td><span class="card-value fw-bold">CHF <span class="balance">105</span></span></td>
                            </tr>
                        </tbody>

                    </table>

                </div>


                </div>
            </div>
            <!-- End Outcome Card -->

        </div>

        <?php include_once "imports/scripts.php"; ?>
    </body>

</html>
