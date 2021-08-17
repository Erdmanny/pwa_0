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
$session = \Config\Services::session();
?>

<div class="container">
    <h1 class="mt-3 text-light">People</h1>
    <div class="row mt-3">


        <div class="col-lg-12">
            <div class="card">
                <div class="card-header row">
                    <a type="button" class="col-lg-2 btn btn-primary" href="/addPerson">
                        Add Person
                    </a>
                    <?php
                    if ($session->getFlashdata('success')):
                        ?>
                        <div class="col-lg-1"></div>
                        <div class="bg-success text-light col-lg-9 d-flex justify-content-center align-items-center">
                            <?= $session->getFlashdata("success") ?>
                        </div>
                    <?php
                    endif;
                    ?>
                </div>
                <div class="card-body">
                    <table
                            data-toggle="table"
                            data-mobile-responsive="true"
                            data-pagination="true">
                        <thead>
                        <tr>
                            <th data-sortable="true">ID</th>
                            <th data-sortable="true">Name</th>
                            <th data-sortable="true">Street</th>
                            <th data-sortable="true">City</th>
                            <th data-sortable="true">Created</th>
                            <th data-sortable="true">Edited</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($people as $person) : ?>
                            <tr>
                                <td><?= $person->id ?></td>
                                <td><?= $person->prename . " " . $person->surname ?></td>
                                <td><?= $person->street ?></td>
                                <td><?= $person->zip . " " . $person->city ?></td>
                                <td><?= $person->created_by ?></td>
                                <td><?= $person->edited_by ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url() . "/people/editPerson/" . $person->id ?>"
                                       class="btn btn-warning btn-sm mr-2">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                    <button type="button" onclick="deletePerson('<?= $person->id ?>')"
                                            class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</div>

<script>

    function deletePerson(id) {
        if (confirm("Are you sure you want to remove the person with id " + id + " ?")) {
            window.location.href = "<?= base_url(); ?>/people/deletePerson/" + id;
        }
    }

</script>


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