<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    require_once(ROOT . '/views/layout/header.php');
    ?>
    <script src="<?php echo ROOT_DIRECTORY ?>App/js/appointmentForm.js"></script>
    <script src="<?php echo ROOT_DIRECTORY ?>App/js/controls.js"></script>
</head>


<body class="container-medium">
<div class="bg-grey px-3 mt-5 py-5">
    <h1 class="">Profil rendez-vous</h1>
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
        <form action="<?php echo ROOT_DIRECTORY ?>appointment/profil/<?php echo($data['id']); ?>" class="" id="appointmentForm" method="POST">

            <div>
                <p>Patient: <?php echo $data['lastname'] . " " . $data['firstname'] ?></p>
                <p>Date: <?php echo $date?></p>
                <p>Horaire: <?php echo $hour?></p>


            </div>
            <hr>
            <div class="form-group h3 text-center text-uppercase">

                    <h1>Editer</h1>

                <label for="lastname"></label>
                <input type="datetime-local" id="dateTime" class="form-control" name="dateTime"
                       value="<?php echo $date . "T" . $hour ?>">
            </div>

            <button class="btn btn-primary form-control col-lg-4 shadow" id="sendForm" type="submit">Editer</button>
            <a href="<?php echo ROOT_DIRECTORY ?>" class="btn btn-danger shadow">Retour</a>
        </form>

    </div>

</div>
</body>
</html>
