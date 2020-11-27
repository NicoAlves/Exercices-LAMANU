<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    require_once(ROOT . '/views/layout/header.php');
    ?>
    <script src="<?php echo ROOT_DIRECTORY ?>App/js/patientForm.js"></script>
    <script src="<?php echo ROOT_DIRECTORY ?>App/js/controls.js"></script>
</head>


<body class="container-medium">
<div class="bg-grey px-3 mt-5 py-5">
    <h1 class="">Profil <?php echo $data['patient']['lastname'] . " " . $data['patient']['firstname'] ?></h1>
    <hr>
    <div>
        <p>Nom de famille: <?php echo $data['patient']['lastname'] ?></p>
        <p>Prénom: <?php echo $data['patient']['firstname'] ?></p>
        <p>Date de naissance: <?php $dateBirth = explode('-', $data['patient']['birthdate']);$dateBirth = array_reverse($dateBirth);$dateBirth = implode('-',$dateBirth); echo $dateBirth ?></p>
        <p>Tel: <?php echo $data['patient']['phone'] ?></p>
        <p>Email: <?php echo $data['patient']['mail'] ?></p>
    </div>

    <div class="d-flex flex-column"><h2>Liste des rendez-vous : </h2>

        <?php foreach ($data['appointments'] as $appointment) { ?>
            <?php
            $date = explode(' ', $appointment['dateHour']);
            $hour = $date[1];
            $hour = explode(':', $hour);
            $hour = $hour[0] . ":" . $hour[1];

            $date = $date[0];
            $date = explode('-', $date);
            $date = array_reverse($date);
            $date = implode('-', $date)
            ?>
           <div class="card shadow col-lg-4 ">
               <p class="text-center mt-1">Numéro : <?php echo $appointment['id']?></p>
               <hr>
               <p>Date : <?php echo $date?></p>
               <p>Horaire : <?php echo $hour?></p>
           </div>
            <hr>
        <?php } ?>
    </div>
    <hr>
    <div class="text-center text-uppercase"><h3>Editer : </h3></div>
    <div class="">
        <form action="<?php echo ROOT_DIRECTORY . 'patient/edit/' . $data['patient']['id'] ?>" class="" id="patientForm"
              method="POST">
            <div class="form-group d-flex flex-row justify-content-between">
                <label for="lastname"></label>
                <input type="text" placeholder="Nom" id="lastname" class="form-control" name="lastname"
                       value="<?php echo $data['patient']['lastname'] ?>">
                <label for="firstname"></label>
                <input type="text" placeholder="Prénom" id="firstname" class="form-control" name="firstname"
                       value="<?php echo $data['patient']['firstname'] ?>">
            </div>
            <div class="form-group">
                <label for="birthdate"></label>
                <input type="date" placeholder="Date de naissance" id="birthdate" class="form-control" name="birthdate"
                       value="<?php echo $data['patient']['birthdate'] ?>">
                <label for="tel"></label>
                <input type="tel" placeholder="Téléphone" id="phone" class="form-control" name="phone"
                       value="<?php echo $data['patient']['phone'] ?>">
                <label for="mail"></label>
                <input type="email" placeholder="Adresse email" id="mail" class="form-control" name="mail"
                       value="<?php echo $data['patient']['mail'] ?>">
            </div>

            <button class="btn btn-primary form-control col-lg-4 shadow" id="sendForm" type="submit">Editer</button>
            <a href="<?php echo ROOT_DIRECTORY ?>" class="btn btn-danger shadow">Retour</a>
        </form>

    </div>

</div>
</body>
</html>
