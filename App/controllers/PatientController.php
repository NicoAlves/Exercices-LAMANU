<?php

require_once ROOT . '/forms/patientForm.php';

class PatientController extends Controller
{


    public function __construct()
    {
        //n instancie les modèles
        $this->loadModel('patient');
        $this->loadModel('appointment');
    }
//affiche les patients et la pagination
    public function list()
    {

        //on récupère les paramètre de l'url
        $params = explode('/', $_GET['param']);
        if (isset($params[2]) && $params[2] == "search") {
            //si le formulaire est envoyer avec la méthode POST
            if ($_SERVER['REQUEST_METHOD'] === "POST") {
                //si il s'agit d'une recherche
                if (isset($_POST['searchTerm'])) {
                    //appel de la fonction getPatientSearch qui renvoie un patient en passant en paramètre le numéro de téléphone
                    $patient = $this->patient->getPatientSearch($_POST['searchTerm']);
                    //données pour la vue
                    $data = ['searchTerm' => $_POST['searchTerm'], 'patient' => $patient];
                    //renvoie la vue
                    $this->render('patient/listePatients.php', $data);
                } else {
                    http_response_code(404);
                }
            } else {

                http_response_code(404);


            }


        }
        //si il ne s'agit pas d'une recherche
        else if (isset($params[2]) && $params[2] !== "search" && $params[2] != "") {
            //si c'est un nombre valide
            if (preg_match('/^[1-9].*$/', $params[2])) {
                //appel de la req de pagination
                $data = $this->patient->getPatientsPagination($params[2], 3);
                //renvoie la vue
                $this->render('patient/listePatients.php', $data);
            }else {
                http_response_code(404);
            }

        }
        //si le numéro de page n'est pas défini
        else {
            $data = $this->patient->getPatientsPagination(1, 3);
            $this->render('patient/listePatients.php', $data);
        }

    }

//affiche le formulaire de création
    public function create()
    {
        //renvoie la vue
        $this->render('patient/ajouterPatient.php');
        //si le formulaire est envoyer avec la méthode POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //instanciation de classe de validation du formulaire
            $form = new patientForm();
            $validation = $form->validation($_POST['lastname'], $_POST['firstname'], $_POST['birthdate'], $_POST['phone'], $_POST['mail']);
            //si la validation renvoie true
            if ($validation === "true") {
                //ajout du patient
                $this->patient->create($_POST['lastname'], $_POST['firstname'], $_POST['birthdate'], $_POST['phone'], $_POST['mail']);
            }

        }
    }
//affiche le profil d'un patient
    public function profil()
    {
        //on récupère les paramètre de l'url
        $params = explode('/', $_GET['param']);
        if (isset($params[2]) && $params[2] != NULL) {
            $id = $params[2];
            //on recupère le patient par son id
            $patient = $this->patient->getPatientById($id);
            $appointments = $this->appointment->getAppointmentsByPatientId($id);

            $data = ['patient' => $patient,
                'appointments' => $appointments];
            //si le patient existe
            if ($patient != false) {
                $this->render('patient/profilPatient.php', $data);
            } else {
                http_response_code(404);
            }
            //si le formulaire est envoyer avec la méthode POST
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                //instanciation de classe de validation du formulaire
                $form = new patientForm();
                $validation = $form->validation($_POST['lastname'], $_POST['firstname'], $_POST['birthdate'], $_POST['phone'], $_POST['mail']);
                //si la validation renvoie true
                if ($validation === "true") {
                    //on edit le patient
                    $this->patient->edit($id, $_POST['lastname'], $_POST['firstname'], $_POST['birthdate'], $_POST['phone'], $_POST['mail']);
                    //on redirige sur la liste des patients
                    header('Location:' . ROOT_DIRECTORY . '/patient/list');

                }
            }


        } else {
            http_response_code(404);
        }


    }
//supprime un patient
    public function delete()
    {
        //on récupère les paramètre de l'url
        $params = explode('/', $_GET['param']);
        if (isset($params[2]) && $params[2] != NULL) {
            $id = $params[2];
            //on recupère le patient par son id
            $patient = $this->patient->getPatientById($id);
            //si le patient existe
            if ($patient != false) {
                //renvoie la vue
                $this->render('patient/supprimerPatient.php', $patient);
            } else {
                http_response_code(404);
            }
            //si le formulaire est envoyer avec la méthode POST
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                //suppresion du patient et de ses rendez-vous
                $this->appointment->deleteByPatientId($id);
                $this->patient->delete($id);

                //redirection sur la liste des patients
                header('Location:' . ROOT_DIRECTORY . '/patient/list');


            }


        } else {
            http_response_code(404);
        }
    }


}