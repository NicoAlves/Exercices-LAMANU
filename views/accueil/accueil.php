<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Patient</title>
    <link rel="stylesheet" href="./styles.css">
    <link rel="stylesheet" href="./components/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


    <script src="./components/jquery/jquery.js"></script>
    <script src="./components/bootstrap/js/bootstrap.js"></script>

</head>
<body class="container-medium">
<div class="bg-grey px-3 mt-5 py-5">
    <h1 class="">Gestion des patients</h1>
    <hr>
    <div class="border d-flex flex-row py-2 rounded flex-wrap">
        <div class="card custom-card text-center col-lg-3 ">
            <div class="bg-primary text-white rounded-top py-2"><i class="fas fa-user "></i> Gestion patient</div>
            <a href="<?php echo ROOT_DIRECTORY?>patient/create"><i class="fas fa-plus fa-3x my-3"></i></a>
            <p>Ajouter un patient</p>
            <a href="<?php echo ROOT_DIRECTORY?>patient/list"><i class="fas fa-list fa-3x my-3"></i></a>
            <p>Liste des patients</p>
        </div>
        <div class="card custom-card text-center col-lg-3">
            <div class="bg-primary text-white rounded-top py-2"><i class="fas fa-clock "></i> Ajouter un rendez-vous</div>
            <a href="<?php echo ROOT_DIRECTORY?>appointment/create"><i class="fas fa-plus fa-3x my-3"></i></a>
            <p class="">Ajouter un rendez-vous</p>
            <a href="<?php echo ROOT_DIRECTORY?>appointment/list"><i class="fas fa-list fa-3x my-3"></i></a>
                <p class="">Liste des rendez-vous</p>

        </div>

        <div class="card custom-card text-center col-lg-3">
            <div class="bg-primary text-white rounded-top py-2"><i class="fas fa-user "></i> <i class="fas fa-clock "></i> Ajouter patient & rendez-vous</div>
            <a href="<?php echo ROOT_DIRECTORY?>patientAppointment/create"><i class="fas fa-plus fa-3x my-3"></i></a>
            <p class="">Ajouter simultanément un patient et un rendez-vous</p>
        </div>
    </div>

</div>
</body>
</html>
