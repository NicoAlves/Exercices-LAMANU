<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    require_once(ROOT . '/views/layout/header.php');
    ?>
    <script src="<?php echo ROOT_DIRECTORY?>App/js/appointmentForm.js"></script>
    <script src="<?php echo ROOT_DIRECTORY?>App/js/controls.js"></script>
</head>


<body class="container-medium">
<div class="bg-grey px-3 mt-5 py-5">
    <h1 class="">Ajout Rendez-vous</h1>
    <hr>
    <div class="">

        <form action="<?php echo ROOT_DIRECTORY ?>appointment/create" class="" id="appointmentForm" method="POST">
            <div class="form-group d-flex flex-row justify-content-between">
                <select name="idPatient" id="idPatient" class="form-control">

                    <?php var_dump($data);
                    foreach ($data as $patient){?>
                    <option value="<?php echo $patient['id'] ?>"><?php echo $patient['lastname'] . " " .  $patient['firstname'] ?></option>
                    <?php }?>
                </select>
                <label for="lastname"></label>
                <input type="datetime-local"  id="dateTime" class="form-control" name="dateTime">
            </div>

            <button class="btn btn-primary form-control col-lg-4 shadow" id="sendForm" type="submit">Ajouter</button>
            <a href="<?php echo ROOT_DIRECTORY?>" class="btn btn-danger shadow">Retour</a>
        </form>

    </div>

</div>
</body>
</html>
