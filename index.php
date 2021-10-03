<!doctype html>
<html lang="en">
 
    <?php include_once "imports/head.php"; ?>

    <?php

    $userId = $_SESSION["user_id"];
    $incomeBalance = number_format((float) income_balance_total($userId), 0, ",", "'");
    $outcomeBudget =  number_format((float) outcome_budget_total($userId), 0, ",", "'");
    $outcomeBalance = number_format((float) outcome_balance_total($userId), 0, ",", "'");
    $remainingBalance = number_format((float) (income_balance_total($userId) - outcome_balance_total($userId)), 0, ",", "'");

    $incomeResult = user_incomes($userId);
    $outcomeResult = user_outcomes($userId); 

    ?>

    <body>
        <?php include_once "imports/navbar.php"; ?>

        <div class="container my-5">

            <div class="title">Ihr Budgetplan</div>
            <div class="title-text">Einblick über Ihre Einnahmen und Ausgaben.</div>

            <hr class="mt-3 mb-5">

            <!-- Summary Card -->
            <div class="card-title">Zusammenfassung</div>
            <div class="card mb-5 rounded-0">
                <div class="card-body">

                    <div>
                        <span class="card-input">Einkommen</span>
                        <span class="card-value">CHF <span class="balance"><?=$incomeBalance?></span></span>
                    </div>

                    <div>
                        <span class="card-input">Ausgaben</span>
                        <span class="card-value">CHF <span class="balance"><?=$outcomeBalance?></span></span>
                    </div>

                    <hr>

                    <div>
                        <span class="card-input">Übriges Gehalt</span>
                        <span class="card-value fw-bold">CHF <span class="balance"><?=$remainingBalance?></span></span>
                    </div>

                </div>
            </div>
            <!-- End Summary Card -->

            <!-- Income Card -->
            <div class="card-title">Einkommen</div>
            <div class="card mb-5 rounded-0">
                <div class="card-body">

                    <?php

                    if ($incomeResult == null) {

                        echo
                        '
                        <div>
                            <span class="card-input">Einnahmen</span>
                            <span class="card-value">CHF <span class="balance">0</span></span>
                        </div>
                        ';

                    } else {

                        while ($incomeObj = $incomeResult->fetch_assoc()) {
                            $category = $incomeObj['category'];
                            $balance = $incomeObj['balance'];

                            echo
                            '
                            <div>
                                <span class="card-input">'. $category .'</span>
                                <span class="card-value">CHF <span class="balance">'. $balance .'</span></span>
                            </div>
                            ';
                        }

                    }

                    ?>

                    <hr>

                    <div>
                        <span class="card-input">Total Gehalt</span>
                        <span class="card-value fw-bold">CHF <span class="balance"><?=$incomeBalance?></span></span>
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

                            <?php

                            if ($outcomeResult == null) {

                                echo
                                '
                                <tr>
                                    <td><span class="card-value fw-bold">Ausgaben</span></td>
                                    <td><span class="card-value">CHF <span class="balance">0</span></span></td>
                                    <td><span class="card-value">CHF <span class="balance">0</span></span></td>
                                    <td><span class="card-value">CHF <span class="balance">0</span></span></td>
                                </tr>
                                ';

                                $totalDifference = 0;

                            } else {

                                $totalDifference = 0;
                                while ($outcomeObj = $outcomeResult->fetch_assoc()) {
                                    $category = $outcomeObj['category'];
                                    $budget = $outcomeObj['budget'];
                                    $balance = $outcomeObj['balance'];
                                    
                                    $difference = $budget - $balance;
                                    $totalDifference += $difference;
                                    
                                    $differenceHtml = "text-success";
                                    if ($difference < 0) $differenceHtml = "text-danger";
                                    if ($difference == 0) $differenceHtml = "";

                                    echo
                                    '
                                    <tr>
                                        <td><span class="card-value fw-bold">'. $category .'</span></td>
                                        <td><span class="card-value">CHF <span class="balance">'. $budget .'</span></span></td>
                                        <td><span class="card-value">CHF <span class="balance">'. $balance .'</span></span></td>
                                        <td><span class="card-value '. $differenceHtml .'">CHF <span class="balance">'. $difference .'</span></span></td>
                                    </tr>
                                    ';
                                }

                            }

                            ?>

                            <tr>
                                <td>&nbsp;</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr>
                                <td><span class="card-value fw-bold">Gesamt</span></td>
                                <td><span class="card-value fw-bold">CHF <span class="balance"><?=$outcomeBudget?></span></span></td>
                                <td><span class="card-value fw-bold">CHF <span class="balance"><?=$outcomeBalance?></span></span></td>
                                <td><span class="card-value fw-bold">CHF <span class="balance"><?=$totalDifference?></span></span></td>
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
