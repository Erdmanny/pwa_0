<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="logo.ico">
    <title>PWA 0</title>


    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!--Bootstrap-Table CSS-->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.0/dist/bootstrap-table.min.css">
    <!--    Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body class="bg-dark">

<nav class="navbar navbar-light bg-light sticky-top">
    <a class="navbar-brand" href="/">PWA 0</a>
    <div class="ml-auto d-flex">
        <a href="/logout" class="btn btn-warning mr-2">Logout</a>
        <div class="bg-success d-flex justify-content-center align-items-center p-2">
            Online
        </div>
    </div>
</nav>

<?php
$validation = \Config\Services::validation();
?>


<div class="container">
    <h1 class="mt-3 text-light">Add Person</h1>
    <div class="row mt-3">

        <div class="col-lg-12">
            <form action="<?php echo base_url("people/addPerson_Validation")?>" method="post" id="new-person-form">
                <div class="card">
                    <div class="card-body">
                        <div class="row m-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="new-prename">Prename:</label>
                                    <input type="text" class="form-control" name="new-prename" id="new-prename" placeholder="Peter">
                                </div>
                            </div>
                            <?php
                            if ($validation->getError('new-prename')):
                                ?>
                                <div class="col-12">
                                    <div class="alert alert-danger" role="alert">
                                        <?= $validation->getError('new-prename') ?>
                                    </div>
                                </div>
                            <?php
                            endif;
                            ?>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="new-surname">Surname:</label>
                                    <input type="text" class="form-control" name="new-surname" id="new-surname" placeholder="Mustermann">
                                </div>
                            </div>
                            <?php
                            if ($validation->getError('new-surname')):
                                ?>
                                <div class="col-12">
                                    <div class="alert alert-danger" role="alert">
                                        <?= $validation->getError('new-surname') ?>
                                    </div>
                                </div>
                            <?php
                            endif;
                            ?>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="new-street">Street:</label>
                                    <input type="text" class="form-control" name="new-street" id="new-street" placeholder="Musterstr. 11">
                                </div>
                            </div>
                            <?php
                            if ($validation->getError('new-street')):
                                ?>
                                <div class="col-12">
                                    <div class="alert alert-danger" role="alert">
                                        <?= $validation->getError('new-street') ?>
                                    </div>
                                </div>
                            <?php
                            endif;
                            ?>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="new-zip">Zip:</label>
                                    <input type="text" class="form-control" name="new-zip" id="new-zip" placeholder="54299">
                                </div>
                            </div>
                            <?php
                            if ($validation->getError('new-zip')):
                                ?>
                                <div class="col-12">
                                    <div class="alert alert-danger" role="alert">
                                        <?= $validation->getError('new-zip') ?>
                                    </div>
                                </div>
                            <?php
                            endif;
                            ?>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="new-city">City:</label>
                                    <input type="text" class="form-control" name="new-city" id="new-city" placeholder="Musterhausen">
                                </div>
                            </div>
                            <?php
                            if ($validation->getError('new-city')):
                                ?>
                                <div class="col-12">
                                    <div class="alert alert-danger" role="alert">
                                        <?= $validation->getError('new-city') ?>
                                    </div>
                                </div>
                            <?php
                            endif;
                            ?>

                            <div class="col-12">
                                <a href="/people" class="btn btn-warning">Cancel</a>
                                <button type="submit" class="btn btn-primary float-right">Save</button>
                            </div>
                        </div>


                    </div>

                </div>
            </form>
        </div>

    </div>
</div>

<!--JQuery JS-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!--Popper JS-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

<!--Bootstrap JS-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<!--Bootstrap-Table JS-->
<script src="https://unpkg.com/bootstrap-table@1.18.0/dist/bootstrap-table.min.js"></script>

<!--Bootstrap-Table-Mobile JS-->
<script src="https://unpkg.com/bootstrap-table@1.18.1/dist/extensions/mobile/bootstrap-table-mobile.min.js"></script>

</body>
</html>


