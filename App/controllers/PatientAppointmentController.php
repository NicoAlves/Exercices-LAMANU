<?php

require_once ROOT . '/forms/appointmentForm.php';
require_once ROOT . '/forms/patientForm.php';

class PatientAppointmentController extends Controller
{
    public function __construct()
    {
        //on instancie les modèles
        $this->loadModel('appointment');
        $this->loadModel('patient');
    }

//affiche le formulaire
    public function create()
    {
        //retourne la vue
        $this->render('patientAppointment/ajouterPatientRendezVous.php');
        //si le formulaire est envoyer avec la méthode POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //instanciation de classe de validation du formulaire patient
            $formPatient = new patientForm();
            $validationPatient = $formPatient->validation($_POST['lastname'], $_POST['firstname'], $_POST['birthdate'], $_POST['phone'], $_POST['mail']);
            //instanciation de classe de validation du formulaire
            $formAppointment = new appointmentForm();
            $validationAppointment = $formAppointment->validation($_POST['dateTime']);
            //si les deux validation renvoie true
            if ($validationPatient === "true" && $validationAppointment === "true") {
                //manipulation sur la date pour la mettre au format mysql
                $dateTime = $_POST['dateTime'];
                $dateTime = explode('T', $dateTime);
                $dateTime = implode(' ', $dateTime);
                $dateTime = $dateTime . ":00";
                //instanciation de id au dernier id enrigstrer en base pour la table patient
                $id = $this->patient->create($_POST['lastname'], $_POST['firstname'], $_POST['birthdate'], $_POST['phone'], $_POST['mail']);
                if (!empty($id)) {
                    //ajout du rendez-vous
                    $this->appointment->create($dateTime, $id);

                }
            }

        }
    }

}