<?php


class appointment extends DataBase
{


    public function __construct()
    {
        //ouverture de la connexion
        $this->getConnection();
    }


    public function getAppointments()
    {

        $sql = <<<EOD
        SELECT patients.id, patients.lastname, patients.firstname, appointments.id, dateHour, idPatients 
        FROM patients, appointments
        WHERE patients.id = idPatients
        ;
        EOD;
        $curseur = $this->_connection->prepare($sql);
        $curseur->execute();
        $ligne = $curseur->fetchAll(PDO::FETCH_ASSOC);
        return $ligne;

    }

    public function getAppointmentById($id)
    {

        $sql = <<<EOD
        SELECT patients.id, patients.lastname, patients.firstname, appointments.id, dateHour, idPatients 
        FROM patients, appointments
        WHERE patients.id = idPatients
        AND appointments.id = :id
        EOD;
        $curseur = $this->_connection->prepare($sql);
        $curseur->bindParam('id', $id);
        $curseur->execute();
        $ligne = $curseur->fetch(PDO::FETCH_ASSOC);
        return $ligne;

    }

    public function getAppointmentsByPatientId($id)
    {

        $sql = <<<EOD
        SELECT patients.id, patients.lastname, patients.firstname, appointments.id, dateHour, idPatients 
        FROM patients, appointments
        WHERE patients.id = idPatients
        AND idPatients = :id
        EOD;
        $curseur = $this->_connection->prepare($sql);
        $curseur->bindParam('id', $id);
        $curseur->execute();
        $ligne = $curseur->fetchall(PDO::FETCH_ASSOC);
        return $ligne;

    }

    public function create($dateHour, $idPatient)
    {
        $sql = <<<EOD
        INSERT INTO appointments (dateHour, idPatients)
        VALUES (:dateHour, :idPatient);
        EOD;
        $curseur = $this->_connection->prepare($sql);
        $curseur->bindParam('dateHour', $dateHour);
        $curseur->bindParam('idPatient', $idPatient);
        $curseur->execute();

    }

    public function edit($id, $dateHour)
    {
        $sql = <<<EOD
    UPDATE appointments SET dateHour = :dateHour
    WHERE id = :id;
    EOD;
        $curseur = $this->_connection->prepare($sql);
        $curseur->bindParam('id', $id);
        $curseur->bindParam('dateHour', $dateHour);
        $curseur->execute();

    }

    public function delete($id)
    {
        $sql = <<<EOD
    DELETE FROM appointments
    WHERE id = :id;
    EOD;
        $curseur = $this->_connection->prepare($sql);
        $curseur->bindParam('id', $id);
        $curseur->execute();

    }


    public function deleteByPatientId($id)
    {
        $sql = <<<EOD
    DELETE FROM appointments
    WHERE idPatients = :id;
    EOD;
        $curseur = $this->_connection->prepare($sql);
        $curseur->bindParam('id', $id);
        $curseur->execute();

    }

}



