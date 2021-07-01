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
                        <?php
                        if ($people):
                            foreach ($people as $person) :
                                ?>
                                <tr>
                                    <td><?= $person->id ?></td>
                                    <td><?= $person->prename . " " . $person->name ?></td>
                                    <td><?= $person->street ?></td>
                                    <td><?= $person->zip . " " . $person->city ?></td>
                                    <td><?= $person->created_by ?></td>
                                    <td><?= $person->edited_by ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url() . "/people/getSinglePerson/" . $person->id ?>"
                                           class="btn btn-warning btn-sm mr-2">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <button type="button" onclick="deletePerson('<?= $person->id ?>')"
                                                class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach;
                        endif;
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</div>

<script>
    function deletePerson(id) {
        if (confirm("Are you sure you want to remove the person with id " + id +" ?")) {
            window.location.href = "<?= base_url(); ?>/people/deletePerson/" + id;
        }
    }
</script>

