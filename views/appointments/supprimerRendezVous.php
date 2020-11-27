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
        $date = explode(' ', $data['dateHour']);
        $hour = $date[1];
        $hour = explode(':', $hour);
        $hour = $hour[0] . ":" . $hour[1];

        $date = $date[0];
        $date = explode('-', $date);
        $date = array_reverse($date);
        $date = implode('-', $date)
        ?>
        <form action="<?php echo ROOT_DIRECTORY ?>appointment/delete/<?php echo $data['id']?>" class="" id="deleteForm" method="POST">
            <div class="form-group d-flex flex-row justify-content-between">
                <p>Voulez vous supprimer le rdv de <?php echo $data['lastname'] . " " . $data['firstname']?> du  <?php echo $date. " à " . $hour?> ?</p>
            </div>

            <button class="btn btn-primary form-control col-lg-4 shadow" id="sendForm" type="submit">Supprimer</button>
            <a href="<?php echo ROOT_DIRECTORY?>" class="btn btn-danger shadow">Retour</a>
        </form>

    </div>

</div>
</body>
</html>
