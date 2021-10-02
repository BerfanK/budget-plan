<!doctype html>
<html lang="en">
 
    <?php include_once "imports/head.php"; ?>

    <body>
        <?php include_once "imports/navbar.php"; ?>

        <div class="container my-5">

           <div class="title">Planverwaltung</div>
            <div class="title-text">Bearbeiten Sie Ihre Ein- und Ausgaben.</div>

            <hr class="mt-3 mb-5">

            <!-- Income Card -->
            <div class="card-title">Einkommen</div>
            <div class="card mb-5 rounded-0">
                <div class="card-body">

                    <form method="post" class="p-2">

                        <div class="row" id="row">

                            <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 mb-2">
                                <label for="category" class="col-forum-lable"><b>Kategorie <span class="text-danger">*</span></b></label>
                                <input type="text" name="category" class="form-control rounded-0 shadow-none" placeholder="Job" required>
                            </div>

                            <div class="col-lg-5 col-xl-5 col-md-12 col-sm-12 mb-2">
                                <label for="balance" class="col-forum-lable"><b>Gehalt <span class="text-danger">*</span></b></label>
                                <input type="number" name="balance" class="form-control rounded-0 shadow-none" placeholder="8000" required>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-12 my-2">

                                <button type="button" name="add" id="add" class="btn btn-outline-dark btn-sm rounded-0 shadow-none"><i class="fas fa-plus"></i>&nbsp; Einnahmequelle hinzufügen</button>
                                
                            </div>
                            
                            <div class="col-12 mt-5">

                                <button type="submit" name="edit" class="btn btn-outline-success me-2 rounded-0 shadow-none">Speichern</button>
                                <button type="reset" name="reset" class="btn btn-outline-danger rounded-0 shadow-none">Zurücksetzen</button>

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

                            <div class="col-lg-5 col-xl-5 col-md-12 col-sm-12 mb-2">
                                <label for="category" class="col-forum-lable"><b>Kategorie <span class="text-danger">*</span></b></label>
                                <input type="text" name="category" class="form-control rounded-0 shadow-none" placeholder="Job" required>
                            </div>

                            <div class="col-lg-3 col-xl-3 col-md-12 col-sm-12 mb-2">
                                <label for="budget" class="col-forum-lable"><b>Budget <span class="text-danger">*</span></b></label>
                                <input type="number" name="budget" class="form-control rounded-0 shadow-none" placeholder="3000" required>
                            </div>

                            <div class="col-lg-3 col-xl-3 col-md-12 col-sm-12 mb-2">
                                <label for="price" class="col-forum-lable"><b>Kosten <span class="text-danger">*</span></b></label>
                                <input type="number" name="price" class="form-control rounded-0 shadow-none" placeholder="1600" required>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-12 my-2">

                                <button type="button" name="add" id="add2" class="btn btn-outline-dark btn-sm rounded-0 shadow-none"><i class="fas fa-plus"></i>&nbsp; Ausgabe hinzufügen</button>
                                
                            </div>
                            
                            <div class="col-12 mt-5">

                                <button type="submit" name="edit" class="btn btn-outline-success me-2 rounded-0 shadow-none">Speichern</button>
                                <button type="reset" name="reset" class="btn btn-outline-danger rounded-0 shadow-none">Zurücksetzen</button>

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
                    $('#row').append('<hr id="hr_' + number + '" class="my-4"><div id="category_' + number + '" class="col-lg-6 col-xl-6 col-md-12 col-sm-12 mb-2"><label for="category_' + number + '" class="col-forum-lable"><b>Kategorie</b></label><input type="text" name="category_' + number + '" class="form-control rounded-0 shadow-none" placeholder="Job" required></div><div id="balance_' + number + '" class="col-lg-5 col-xl-5 col-md-12 col-sm-12 mb-2"><label for="balance_' + number + '" class="col-forum-lable"><b>Gehalt</b></label><input type="number" name="balance_' + number + '" class="form-control rounded-0 shadow-none" placeholder="8000" required></div><div id="remove_' + number + '" class="col-lg-1 col-xl-1 col-md-12 col-sm-12 mb-2"><label for="' + number + '" class="col-forum-lable">&nbsp;</label><button type="button"  id="' + number + '" class="form-control remove btn btn-outline-danger rounded-0 shadow-none"><i class="fas fa-times"></i></button></div>');
                });

                $(document).on('click', '.remove', function() {
                    var buttonId = $(this).attr("id");
                    $('#category_' + buttonId).remove();
                    $('#hr_' + buttonId).remove();
                    $('#balance_' + buttonId).remove();
                    $('#remove_' + buttonId).remove();
                });

            });
        </script>

        <script>
            $(document).ready(function() {

                var number = 1;
                $('#add2').click(function() {
                    number++;
                    $('#row2').append('<hr id="hr2_' + number + '" class="my-4"><div id="category2_' + number + '" class="col-lg-5 col-xl-5 col-md-12 col-sm-12 mb-2"><label for="category2_' + number +'" class="col-forum-lable"><b>Kategorie <span class="text-danger">*</span></b></label><input type="text" name="category2_' + number + '" class="form-control rounded-0 shadow-none" placeholder="Job" required></div><div id="budget_' + number +'" class="col-lg-3 col-xl-3 col-md-12 col-sm-12 mb-2"><label for="budget_' + number +'" class="col-forum-lable"><b>Budget <span class="text-danger">*</span></b></label><input type="number" name="budget_' + number + '" class="form-control rounded-0 shadow-none" placeholder="3000" required></div><div id="price_' + number + '" class="col-lg-3 col-xl-3 col-md-12 col-sm-12 mb-2"><label for="price_' + number + '" class="col-forum-lable"><b>Kosten <span class="text-danger">*</span></b></label><input type="number" name="price_' + number + '" class="form-control rounded-0 shadow-none" placeholder="1600" required></div> <div id="remove_' + number + '" class="col-lg-1 col-xl-1 col-md-12 col-sm-12 mb-2"><label for="' + number + '" class="col-forum-lable">&nbsp;</label><button type="button"  id="' + number + '" class="form-control remove2 btn btn-outline-danger rounded-0 shadow-none"><i class="fas fa-times"></i></button></div>');
                });

                $(document).on('click', '.remove2', function() {
                    var buttonId = $(this).attr("id");
                    $('#category2_' + buttonId).remove();
                    $('#hr2_' + buttonId).remove()
                    $('#price_' + buttonId).remove();
                    $('#budget_' + buttonId).remove();
                    $('#remove_' + buttonId).remove();
                });

            });
        </script>
        
    </body>

</html>