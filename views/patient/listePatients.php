<!DOCTYPE html>
<html lang="fr">
<head>
    <?php
    require_once(ROOT . '/views/layout/header.php');
    ?>

</head>
<body class="container-medium">
<div class="bg-grey px-3 mt-5 py-5">
    <h1 class="">Liste des Patients <?php if (isset($_POST['searchTerm'])) {
            echo "<span class='h3 border-left px-2' > recherche -> " . $_POST['searchTerm'] . "</span>";
        } ?></h1>
    <hr>
    <div class="d-flex flex-row flex-wrap ">
        <form action="<?php echo ROOT_DIRECTORY ?>patient/list/search" class="d-flex flex-row " method="post">
            <input type="text" name="searchTerm" placeholder="Numéro de Téléphone" class="form-control shadow">
            <button type="submit" class="btn btn-success shadow">Rechercher</button>

        </form>
        <div class="d-flex justify-content-end  align-self-center ml-lg-4">
            <a href="<?php echo ROOT_DIRECTORY ?>patient/create" class="btn btn-primary shadow">Ajouter un patient</a>
            <a href="<?php echo ROOT_DIRECTORY ?>" class="btn btn-danger shadow">Retour</a>
        </div>

    </div>


    <div class=" py-2 rounded card-deck">
        <?php
        if (isset($_POST['searchTerm'])) {
            foreach ($data['patient'] as $patient) {
                $date = explode('-', $patient['birthdate']);;
                $date = array_reverse($date);
                $date = implode('-', $date)
                ?>

                <div class="card col-lg-3">
                    <div class="text-center"><i class="fas fa-user fa-3x my-3 text-primary"></i></div>

                    <hr>
                    <div class="text-center h4"><?php echo $patient['lastname'] . " " . $patient['firstname'] ?></div>
                    <div class="container">
                        <hr>
                        <p><?php echo $date ?></p>
                        <p><?php echo $patient['phone'] ?></p>
                        <p><?php echo $patient['mail'] ?></p>


                    </div>
                    <div class="text-right container my-2">
                        <a href="<?php echo ROOT_DIRECTORY ?>patient/profil/<?php echo $patient['id'] ?>"
                           class="shadow btn btn-dark">Voir</a>
                        <a href="<?php echo ROOT_DIRECTORY ?>patient/delete/<?php echo $patient['id'] ?>"
                           class="shadow btn btn-danger">Supprimer</a>
                    </div>
                </div>
            <?php }
        } else {
            foreach ($data['patients'] as $patient) {
                $date = explode('-', $patient['birthdate']);;
                $date = array_reverse($date);
                $date = implode('-', $date) ?>

                <div class="card col-lg-3">
                    <div class="text-center"><i class="fas fa-user fa-3x my-3 text-primary"></i></div>

                    <hr>
                    <div class="text-center h4"><?php echo $patient['lastname'] . " " . $patient['firstname'] ?></div>
                    <div class="container">
                        <hr>
                        <p><?php echo $date ?></p>
                        <p><?php echo $patient['phone'] ?></p>
                        <p><?php echo $patient['mail'] ?></p>


                    </div>
                    <div class="text-right container my-2">
                        <a href="<?php echo ROOT_DIRECTORY ?>patient/profil/<?php echo $patient['id'] ?>"
                           class="shadow btn btn-dark">Voir</a>
                        <a href="<?php echo ROOT_DIRECTORY ?>patient/delete/<?php echo $patient['id'] ?>"
                           class="shadow btn btn-danger">Supprimer</a>
                    </div>
                </div>
            <?php }
        } ?>
    </div>
    <?php

    if (!isset($_POST['searchTerm'])) {
        $pages = ceil($data['nbPatient'] / 3);
        $params = explode('/', $_GET['param']);
        if (isset($params[2]) && $params[2] !== "search") {
            $currentPage = $params[2];
        } else {
            $currentPage = 1;
        }


        { ?>
            <nav>
                <ul class="pagination">
                    <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                    <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                        <a href="<?= ROOT_DIRECTORY . "patient/list/" . ($currentPage - 1) ?>" class="page-link">Précédente</a>
                    </li>
                    <?php for ($page = 1; $page <= $pages; $page++): ?>
                        <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                        <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                            <a href="<?= ROOT_DIRECTORY . "patient/list/" . $page ?>" class="page-link"><?= $page ?></a>
                        </li>
                    <?php endfor ?>
                    <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                    <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                        <a href="<?= ROOT_DIRECTORY . "patient/list/" . ($currentPage + 1) ?>" class="page-link">Suivante</a>
                    </li>
                </ul>
            </nav>
            <?php
        }
    } ?>

</div>
</body>
</html>
