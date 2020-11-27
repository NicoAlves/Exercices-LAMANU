<?php
//on charge la class contenant la validation du formulaire des rendez-vous
require_once ROOT . '/forms/appointmentForm.php';

class AppointmentController extends Controller
{
    public function __construct()
    {
        //on instancie les modèles
        $this->loadModel('appointment');
        $this->loadModel('patient');
    }

//affiche la liste des rendez-vous
    public function list()
    {
        //on récupère les rendez-vous avec la fonction getAppointments du modèle appointment
        $appointments = $this->appointment->getAppointments();
        //appel de la fonction render de la class Controller qui affiche la vue
        $this->render('appointments/listeRendezVous.php', $appointments);


    }
//affiche le formulaire
    public function create()
    {
        //on récupère les patients avec la fonction getPatients du modèle patient
        $patients = $this->patient->getPatients();
        //appel de la fonction render de la class Controller qui affiche la vue
        $this->render('appointments/ajouterRendezVous.php', $patients);

        //si le formulaire est envoyer avec la méthode POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //instanciation de classe de validation du formulaire
            $form = new appointmentForm();
            //appel de la méthode de validation
            $validation = $form->validation($_POST['dateTime']);
            //si validation() renvoie true
            if ($validation === "true") {
                //manipulation sur la date pour la mettre au format mysql
                $dateTime = $_POST['dateTime'];
                $dateTime = explode('T', $dateTime);
                $dateTime = implode(' ', $dateTime);
                $dateTime = $dateTime . ":00";
                //on ajouter le rendez-vous avec la fonction create du modèle appointment
                $this->appointment->create($dateTime, $_POST['idPatient']);
            }

        }

    }

    public function profil()
    {
    //on récupère les paramètre de l'url
        $params = explode('/', $_GET['param']);
        if (isset($params[2]) && $params[2] != NULL) {
            $id = $params[2];
            //on recupère un rendez-vous par son id
            $appointment = $this->appointment->getAppointmentById($id);
            //si le rendez-vous existe
            if ($appointment != false) {
                $this->render('appointments/profilRendezVous.php', $appointment);
            } else {
                http_response_code(404);
            }
            //si le formulaire est envoyer avec la méthode POST
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                //instanciation de classe de validation du formulaure
                $form = new appointmentForm();
                $validation = $form->validation($_POST['dateTime']);
                //si validation() renvoie true
                if ($validation === "true") {
                    //manipulation sur la date pour la mettre au format mysql
                    $dateTime = $_POST['dateTime'];
                    $dateTime = explode('T', $dateTime);
                    $dateTime = implode(' ', $dateTime);
                    $dateTime = $dateTime . ":00";
                    $this->appointment->edit($id, $dateTime);

                    header('Location:' . ROOT_DIRECTORY . '/appointment/list');

                }
            }


        } else {
            http_response_code(404);
        }


    }

    public function delete()
    {
        //on récupère les paramètre de l'url
        $params = explode('/', $_GET['param']);
        if (isset($params[2]) && $params[2] != NULL) {
            $id = $params[2];
            //on recupère un rendez-vous par son id
            $appointment = $this->appointment->getAppointmentById($id);
            //si le rendez-vous existe
            if ($appointment != false) {
                //on affiche la vue
                $this->render('appointments/supprimerRendezVous.php', $appointment);
            } else {
                http_response_code(404);
            }
            //si le formulaire est envoyer avec la méthode POST
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                //on supprime le rendez-vous
                $this->appointment->delete($id);
                //on redirige vers la liste des rendez-vous
                header('Location:' . ROOT_DIRECTORY . '/appointment/list');


            }


        } else {
            http_response_code(404);
        }
    }
}