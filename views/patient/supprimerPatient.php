<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    require_once(ROOT . '/views/layout/header.php');
    ?>

</head>


<body class="container-medium">
<div class="bg-grey px-3 mt-5 py-5">
    <h1 class="">Supprmier rendez-vous</h1>
    <hr>
    <div class="">
        <?php
        ?>
        <form action="<?php echo ROOT_DIRECTORY ?>patient/delete/<?php echo $data['id']?>" class="" id="deleteForm" method="POST">
            <div class="form-group d-flex flex-row justify-content-between">
                <p>Voulez vous supprimer le patient <?php echo $data['lastname'] . " " . $data['firstname']?> et ses rendez-vous ?</p>
            </div>

            <button class="btn btn-primary form-control col-lg-4 shadow" id="sendForm" type="submit">Supprimer</button>
            <a href="<?php echo ROOT_DIRECTORY?>" class="btn btn-danger shadow">Retour</a>
        </form>

    </div>

</div>
</body>
</html>
