<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="/logo.ico">
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
    <h1 class="mt-3 text-light">Edit Person</h1>
    <div class="row mt-3">

        <div class="col-lg-12">
            <form action="<?php echo base_url("people/editPerson_Validation") ?>" method="post" id="edit-person-form">
                <div class="card">
                    <div class="card-body">
                        <div class="row m-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="edit-prename">Prename:</label>
                                    <input type="text" class="form-control" name="edit-prename" id="edit-prename"
                                           placeholder="Peter" value="<?= $person->prename ?>">
                                </div>
                            </div>
                            <?php
                            if ($validation->getError('edit-prename')):
                                ?>
                                <div class="col-12">
                                    <div class="alert alert-danger" role="alert">
                                        <?= $validation->getError('edit-prename') ?>
                                    </div>
                                </div>
                            <?php
                            endif;
                            ?>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="edit-surname">Surname:</label>
                                    <input type="text" class="form-control" name="edit-surname" id="edit-surname"
                                           placeholder="Mustermann" value="<?= $person->surname ?>"">
                                </div>
                            </div>
                            <?php
                            if ($validation->getError('edit-surname')):
                                ?>
                                <div class="col-12">
                                    <div class="alert alert-danger" role="alert">
                                        <?= $validation->getError('edit-surname') ?>
                                    </div>
                                </div>
                            <?php
                            endif;
                            ?>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="edit-street">Street:</label>
                                    <input type="text" class="form-control" name="edit-street" id="edit-street"
                                           placeholder="Musterstr. 11" value="<?= $person->street ?>">
                                </div>
                            </div>
                            <?php
                            if ($validation->getError('edit-street')):
                                ?>
                                <div class="col-12">
                                    <div class="alert alert-danger" role="alert">
                                        <?= $validation->getError('edit-street') ?>
                                    </div>
                                </div>
                            <?php
                            endif;
                            ?>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="edit-zip">Zip:</label>
                                    <input type="text" class="form-control" name="edit-zip" id="edit-zip"
                                           placeholder="54299" value="<?= $person->zip ?>">
                                </div>
                            </div>
                            <?php
                            if ($validation->getError('edit-zip')):
                                ?>
                                <div class="col-12">
                                    <div class="alert alert-danger" role="alert">
                                        <?= $validation->getError('edit-zip') ?>
                                    </div>
                                </div>
                            <?php
                            endif;
                            ?>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="edit-city">City:</label>
                                    <input type="text" class="form-control" name="edit-city" id="edit-city"
                                           placeholder="Musterhausen" value="<?= $person->city ?>">
                                </div>
                            </div>
                            <?php
                            if ($validation->getError('edit-city')):
                                ?>
                                <div class="col-12">
                                    <div class="alert alert-danger" role="alert">
                                        <?= $validation->getError('edit-city') ?>
                                    </div>
                                </div>
                            <?php
                            endif;
                            ?>

                            <div class="col-12">
                                <a href="/people" class="btn btn-warning">Cancel</a>
                                <input type="hidden" name="id" value="<?= $person->id ?>">
                                <button type="submit" class="btn btn-primary float-right">Edit</button>
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