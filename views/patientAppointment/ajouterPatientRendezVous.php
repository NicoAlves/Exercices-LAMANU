<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    require_once(ROOT . '/views/layout/header.php');
    ?>
    <script src="<?php echo ROOT_DIRECTORY?>App/js/patientAppointmentForm.js"></script>
    <script src="<?php echo ROOT_DIRECTORY?>App/js/controls.js"></script>
</head>


<body class="container-medium">
<div class="bg-grey px-3 mt-5 py-5">
    <h1 class="">Ajout Patient & rendez-vous</h1>
    <hr>
    <div class="">
        <form action="<?php echo ROOT_DIRECTORY ?>patientAppointment/create" class="" id="patientAppointmentForm" method="POST">
            <div class="form-group d-flex flex-row justify-content-between">
                <label for="lastname"></label>
                <input type="text" placeholder="Nom" id="lastname" class="form-control" name="lastname">
                <label for="firstname"></label>
                <input type="text" placeholder="Prénom" id="firstname" class="form-control" name="firstname">
            </div>
            <div class="form-group">
                <label for="birthdate"></label>
                <input type="date" placeholder="Date de naissance" id="birthdate" class="form-control" name="birthdate">
                <label for="tel"></label>
                <input type="tel" placeholder="Téléphone" id="phone" class="form-control" name="phone">
                <label for="mail"></label>
                <input type="email" placeholder="Adresse email" id="mail" class="form-control" name="mail">
            </div>
            <hr>
            <div class="form-group py-2 border">
                <div class="mx-2">
                    <label for="dateTime">Horaire du rendez-vous: </label>
                    <input type="datetime-local" id="dateTime" class="form-control" name="dateTime">
                </div>

            </div>

            <button class="btn btn-primary form-control col-lg-4 shadow" id="sendForm" type="submit">Ajouter</button>
            <a href="<?php echo ROOT_DIRECTORY?>" class="btn btn-danger shadow">Retour</a>
        </form>

    </div>

</div>
</body>
</html>
