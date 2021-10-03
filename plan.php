<!doctype html>
<html lang="en">
 
    <?php include_once "imports/head.php"; ?>

    <body>
        <?php include_once "imports/navbar.php"; ?>

        <div class="container my-5">

           <div class="title">Planverwaltung</div>
            <div class="title-text">Bearbeiten Sie Ihre Ein- und Ausgaben.</div>

            <hr class="mt-3 mb-2">

            <div class="mb-3">
                <?php
                
                if (isset($_POST["editIncome"])) {

                    $counter = 0;
                    $arrayNumber = 0;
                    $resultArray = array();

                    foreach($_POST as $key => $value)
                    {

                
                        $resultArray[$counter] = array();
                        if (strpos($key, 'category') !== false) $resultArray[$arrayNumber]["category"] = $value;
                        if (strpos($key, 'balance') !== false) $resultArray[$arrayNumber]["balance"] = $value;
                        

                        $counter++;
                        if ($counter % 2 == 0) $arrayNumber++; 
                    }

                    $incomeArray = array_filter($resultArray);
                    add_income($_SESSION["user_id"], $incomeArray);


                } else if (isset($_POST["editOutcome"])) {

                    $counter = 0;
                    $arrayNumber = 0;
                    $resultArray = array();

                    foreach($_POST as $key => $value)
                    {

                
                        $resultArray[$counter] = array();
                        if (strpos($key, 'category') !== false) $resultArray[$arrayNumber]["category"] = $value;
                        if (strpos($key, 'budget') !== false) $resultArray[$arrayNumber]["budget"] = $value;
                        if (strpos($key, 'price') !== false) $resultArray[$arrayNumber]["price"] = $value;

                        $counter++;
                        if ($counter % 3 == 0) $arrayNumber++; 
                    }

                    $outcomeArray = array_filter($resultArray);
                    add_outcome($_SESSION["user_id"], $outcomeArray);

                }

                ?>
            </div>

            <!-- Income Card -->
            <div class="card-title">Einkommen</div>
            <div class="card mb-5 rounded-0">
                <div class="card-body">

                    <form method="post" class="p-2">

                        <div class="row" id="row">

                            <?php

                            $incomesObj = user_incomes($_SESSION["user_id"]);
                            if ($incomesObj == null) {
                                echo
                                '
                                <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 mb-2">
                                    <label for="category" class="col-forum-lable"><b>Kategorie <span class="text-danger">*</span></b></label>
                                    <input type="text" name="category" class="form-control rounded-0 shadow-none" placeholder="Job" required>
                                </div>

                                <div class="col-lg-5 col-xl-5 col-md-12 col-sm-12 mb-2">
                                    <label for="balance" class="col-forum-lable"><b>Gehalt <span class="text-danger">*</span></b></label>
                                    <input type="number" name="balance" class="form-control rounded-0 shadow-none" placeholder="8000" required>
                                </div>
                                ';
                            } else {

                                $counter = 0;
                                while($income = $incomesObj->fetch_assoc()) {

                                    if ($counter == 0) {

                                        echo
                                        '
                                        <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 mb-2">
                                            <label for="category" class="col-forum-lable"><b>Kategorie <span class="text-danger">*</span></b></label>
                                            <input type="text" name="category" class="form-control rounded-0 shadow-none" placeholder="Job" value="'. $income['category'] .'" required>
                                        </div>

                                        <div class="col-lg-5 col-xl-5 col-md-12 col-sm-12 mb-2">
                                            <label for="balance" class="col-forum-lable"><b>Gehalt <span class="text-danger">*</span></b></label>
                                            <input type="number" name="balance" class="form-control rounded-0 shadow-none" placeholder="8000" value="'. $income['balance'] .'" required>
                                        </div>
                                        ';

                                        $counter++;

                                    } else {

                                        $token = uniqid();

                                        echo
                                        '
                                        <hr id="hr_' . $token . '" class="my-4">

                                        <div id="category_'. $token .'" class="col-lg-6 col-xl-6 col-md-12 col-sm-12 mb-2">
                                            <label for="category" class="col-forum-lable"><b>Kategorie</b></label>
                                            <input type="text" name="category_'. $token .'" class="form-control rounded-0 shadow-none" placeholder="Job" value="'. $income['category'] .'" required>
                                        </div>
    
                                        <div id="balance_'. $token .'" class="col-lg-5 col-xl-5 col-md-12 col-sm-12 mb-2">
                                            <label for="balance" class="col-forum-lable"><b>Gehalt</b></label>
                                            <input type="number" name="balance_'. $token .'" class="form-control rounded-0 shadow-none" placeholder="8000" value="'. $income['balance'] .'" required>
                                        </div>
    
                                        <div id="remove_' . $token . '" class="col-lg-1 col-xl-1 col-md-12 col-sm-12 mb-2">
                                            <label for="' . $token . '" class="col-forum-lable">&nbsp;</label>
                                            <button type="button"  id="' . $token . '" class="form-control removeObj btn btn-outline-danger rounded-0 shadow-none"><i class="fas fa-times"></i></button>
                                        </div>
                                        ';

                                    }

                                    


                                }

                            }

                            ?>

                        </div>
                        <div class="row">

                            <div class="col-12 my-2">

                                <button type="button" name="add" id="add" class="btn btn-outline-dark btn-sm rounded-0 shadow-none"><i class="fas fa-plus"></i>&nbsp; Einnahmequelle hinzufügen</button>
                                
                            </div>
                            
                            <div class="col-12 mt-5">

                                <button type="submit" name="editIncome" class="btn btn-outline-success me-2 rounded-0 shadow-none">Speichern</button>
                                <a href="./plan" name="resetIncome" class="btn btn-outline-danger rounded-0 shadow-none">Zurücksetzen</a>

                            </div>

                        </div>

                    </form>

                </div>
            </div>
            <!-- End Income Card -->

            <!-- Outcome Card -->
            <div class="card-title">Ausgaben</div>
            <div class="card mb-5 rounded-0">
                <div class="card-body">

                    <form method="post" class="p-2">

                        <div class="row" id="row2">

                            <?php

                            $outcomesObj = user_outcomes($_SESSION["user_id"]);
                            if ($outcomesObj == null) {
                                echo
                                '
                                <div id="category2" class="col-lg-5 col-xl-5 col-md-12 col-sm-12 mb-2">
                                    <label for="category" class="col-forum-lable"><b>Kategorie <span class="text-danger">*</span></b></label>
                                    <input type="text" name="category2" class="form-control rounded-0 shadow-none" placeholder="Job" required>
                                </div>

                                <div id="budget2" class="col-lg-3 col-xl-3 col-md-12 col-sm-12 mb-2">
                                    <label for="budget" class="col-forum-lable"><b>Budget <span class="text-danger">*</span></b></label>
                                    <input type="number" name="budget2" class="form-control rounded-0 shadow-none" placeholder="3000" required>
                                </div>

                                <div id="price2" class="col-lg-3 col-xl-3 col-md-12 col-sm-12 mb-2">
                                    <label for="price" class="col-forum-lable"><b>Kosten <span class="text-danger">*</span></b></label>
                                    <input type="number" name="price2" class="form-control rounded-0 shadow-none" placeholder="1600" required>
                                </div>
                                ';
                            } else {

                                $counter = 0;
                                while($outcome = $outcomesObj->fetch_assoc()) {

                                    if ($counter == 0) {

                                        echo
                                        '
                                        <div id="category2" class="col-lg-5 col-xl-5 col-md-12 col-sm-12 mb-2">
                                            <label for="category" class="col-forum-lable"><b>Kategorie <span class="text-danger">*</span></b></label>
                                            <input type="text" name="category2" class="form-control rounded-0 shadow-none" placeholder="Job" value="'. $outcome['category'] .'" required>
                                        </div>

                                        <div id="budget2" class="col-lg-3 col-xl-3 col-md-12 col-sm-12 mb-2">
                                            <label for="budget" class="col-forum-lable"><b>Budget <span class="text-danger">*</span></b></label>
                                            <input type="number" name="budget2" class="form-control rounded-0 shadow-none" placeholder="3000" value="'. $outcome['budget'] .'" required>
                                        </div>

                                        <div id="price2" class="col-lg-3 col-xl-3 col-md-12 col-sm-12 mb-2">
                                            <label for="price" class="col-forum-lable"><b>Kosten <span class="text-danger">*</span></b></label>
                                            <input type="number" name="price2" class="form-control rounded-0 shadow-none" placeholder="1600" value="'. $outcome['balance'] .'" required>
                                        </div>
                                        ';

                                        $counter++;

                                    } else {

                                    
                                        $token = uniqid();

                                        echo
                                        '
                                        <hr id="hr2_' . $token . '" class="my-4">

                                        <div id="category2_' . $token . '" class="col-lg-5 col-xl-5 col-md-12 col-sm-12 mb-2">
                                            <label for="category" class="col-forum-lable"><b>Kategorie</b></label>
                                            <input type="text" name="category2_' . $token . '" class="form-control rounded-0 shadow-none" placeholder="Job" value="'. $outcome['category'] .'" required>
                                        </div>

                                        <div id="budget2_' . $token . '" class="col-lg-3 col-xl-3 col-md-12 col-sm-12 mb-2">
                                            <label for="budget" class="col-forum-lable"><b>Budget</b></label>
                                            <input type="number" name="budget2_' . $token . '" class="form-control rounded-0 shadow-none" placeholder="3000" value="'. $outcome['budget'] .'" required>
                                        </div>

                                        <div id="price2_' . $token . '" class="col-lg-3 col-xl-3 col-md-12 col-sm-12 mb-2">
                                            <label for="price" class="col-forum-lable"><b>Kosten</b></label>
                                            <input type="number" name="price2_' . $token . '" class="form-control rounded-0 shadow-none" placeholder="1600" value="'. $outcome['balance'] .'" required>
                                        </div>

                                        <div id="remove2_' . $token . '" class="col-lg-1 col-xl-1 col-md-12 col-sm-12 mb-2">
                                            <label for="' . $token . '" class="col-forum-lable">&nbsp;</label>
                                            <button type="button"  id="' . $token . '" class="form-control removeObj2 btn btn-outline-danger rounded-0 shadow-none"><i class="fas fa-times"></i></button>
                                        </div>
                                        ';

                                    }

                                    


                                }

                            }

                            ?>

                        </div>
                        <div class="row">

                            <div class="col-12 my-2">

                                <button type="button" name="add" id="add2" class="btn btn-outline-dark btn-sm rounded-0 shadow-none"><i class="fas fa-plus"></i>&nbsp; Ausgabe hinzufügen</button>
                                
                            </div>
                            
                            <div class="col-12 mt-5">

                                <button type="submit" name="editOutcome" class="btn btn-outline-success me-2 rounded-0 shadow-none">Speichern</button>
                                <button type="submit" name="resetOutcome" class="btn btn-outline-danger rounded-0 shadow-none">Zurücksetzen</button>

                            </div>

                        </div>

                    </form>

                </div>
            </div>
            <!-- End Outcome Card -->

        </div>

        <?php include_once "imports/scripts.php"; ?>

        <script>
            $(document).ready(function() {

                var number = 1;
                $('#add').click(function() {
                    number++;
                    $('#row').append('<hr id="hr_' + number + '" class="my-4"><div id="category_' + number + '" class="col-lg-6 col-xl-6 col-md-12 col-sm-12 mb-2"><label for="category_' + number + '" class="col-forum-lable"><b>Kategorie</b></label><input type="text" name="category_' + number + '" class="form-control rounded-0 shadow-none" placeholder="Job" required></div><div id="balance_' + number + '" class="col-lg-5 col-xl-5 col-md-12 col-sm-12 mb-2"><label for="balance_' + number + '" class="col-forum-lable"><b>Gehalt</b></label><input type="number" name="balance_' + number + '" class="form-control rounded-0 shadow-none" placeholder="8000" required></div><div id="remove_' + number + '" class="col-lg-1 col-xl-1 col-md-12 col-sm-12 mb-2"><label for="' + number + '" class="col-forum-lable">&nbsp;</label><button type="button"  id="' + number + '" class="form-control removeObj btn btn-outline-danger rounded-0 shadow-none"><i class="fas fa-times"></i></button></div>');
                });
            });

            $(document).ready(function() {

                var number = 1;
                $('#add2').click(function() {
                    number++;
                    $('#row2').append('<hr id="hr2_' + number + '" class="my-4"><div id="category2_' + number + '" class="col-lg-5 col-xl-5 col-md-12 col-sm-12 mb-2"><label for="category2_' + number +'" class="col-forum-lable"><b>Kategorie</b></label><input type="text" name="category2_' + number + '" class="form-control rounded-0 shadow-none" placeholder="Job" required></div><div id="budget2_' + number +'" class="col-lg-3 col-xl-3 col-md-12 col-sm-12 mb-2"><label for="budget_' + number +'" class="col-forum-lable"><b>Budget</b></label><input type="number" name="budget_' + number + '" class="form-control rounded-0 shadow-none" placeholder="3000" required></div><div id="price2_' + number + '" class="col-lg-3 col-xl-3 col-md-12 col-sm-12 mb-2"><label for="price_' + number + '" class="col-forum-lable"><b>Kosten</b></label><input type="number" name="price_' + number + '" class="form-control rounded-0 shadow-none" placeholder="1600" required></div> <div id="remove2_' + number + '" class="col-lg-1 col-xl-1 col-md-12 col-sm-12 mb-2"><label for="' + number + '" class="col-forum-lable">&nbsp;</label><button type="button"  id="' + number + '" class="form-control removeObj2 btn btn-outline-danger rounded-0 shadow-none"><i class="fas fa-times"></i></button></div>');
                });

            });

            $(document).ready(function() {

                $(document).on('click', '.removeObj', function() {
                    var tokenId = $(this).attr('id');
                    $('#category_' + tokenId).remove();
                    $('#hr_' + tokenId).remove();
                    $('#balance_' + tokenId).remove();
                    $('#remove_' + tokenId).remove();
                });

            });

             $(document).ready(function() {

                $(document).on('click', '.removeObj2', function() {
                    var tokenId = $(this).attr('id');
                    $('#category2_' + tokenId).remove();
                    $('#hr2_' + tokenId).remove();
                    $('#budget2_' + tokenId).remove();
                    $('#price2_' + tokenId).remove();
                    $('#remove2_' + tokenId).remove();
                });

            });
        </script>
        
    </body>

</html>
