<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    require_once(ROOT . '/views/layout/header.php');
    ?>

</head>
<body class="container-medium">
<div class="bg-grey px-3 mt-5 py-5">
    <h1 class="">Liste des Rendez-vous</h1>
    <hr>
    <a href="<?php echo ROOT_DIRECTORY ?>appointment/create" class="btn btn-primary shadow">Ajouter un rendez-vous</a>
    <a href="<?php echo ROOT_DIRECTORY?>" class="btn btn-danger shadow">Retour</a>
    <div class="  py-2 rounded card-deck">
        <?php
        foreach ($data as $appointment) {
            $date = explode(' ', $appointment['dateHour']);
            $hour = $date[1];
            $hour = explode(':', $hour);
            $hour = $hour[0] . ":" . $hour[1];

            $date = $date[0];
            $date = explode('-', $date);
            $date = array_reverse($date);
            $date = implode('-', $date)
            ?>

            <div class="card col-lg-3 ">
                <div class="text-center"><i class="fas fa-user fa-3x my-3 text-primary"></i></div>

                <hr>
                <div class="text-center h4"><?php echo $appointment['lastname'] . " " .   $appointment['firstname']  ?></div>
                <div class="container">

                    <hr>
                    <p><?php echo "Date: " .$date?></p>
                    <p><?php echo "Horaire: " .$hour?></p>
                </div>
                <div class="text-right container my-2">
                    <a href="<?php echo ROOT_DIRECTORY ?>appointment/profil/<?php echo $appointment['id'] ?>"
                       class="shadow btn btn-dark">Voir</a>

                    <a href="<?php echo ROOT_DIRECTORY ?>appointment/delete/<?php echo $appointment['id'] ?>"
                       class="shadow btn btn-danger">Supprimer</a>
                </div>
            </div>
        <?php } ?>
    </div>

</div>
</body>
</html>
