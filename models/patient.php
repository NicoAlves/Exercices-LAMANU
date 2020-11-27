<?php


class patient extends DataBase
{


    public function __construct()
    {
        //ouverture de la connexion
        $this->getConnection();
    }


    public function getPatients()
    {

        $sql = <<<EOD
        SELECT id, lastname, firstname, birthdate, phone, mail FROM patients
        EOD;
        $curseur = $this->_connection->prepare($sql);
        $curseur->execute();
        $ligne = $curseur->fetchAll(PDO::FETCH_ASSOC);
        return $ligne;

    }

    public function getPatientsPagination(int $currentPage, int $patientMaxPerPage = 3)
    {
        $firstElement = ($currentPage * $patientMaxPerPage) - $patientMaxPerPage;
        $firstElement = (int)$firstElement;



        $sql = 'SELECT * FROM patients ORDER BY lastname LIMIT :firstelement, :patientMaxPerPage ';


        $curseur = $this->_connection->prepare($sql);;

        $curseur->bindValue('firstelement', $firstElement, PDO::PARAM_INT);
        $curseur->bindValue('patientMaxPerPage', $patientMaxPerPage, PDO::PARAM_INT);

        $curseur->execute();
        $ligne = $curseur->fetchAll(PDO::FETCH_ASSOC);

        $sqlCount = 'SELECT COUNT(*) AS nb_patients FROM patients;';

        $curseur = $this->_connection->prepare($sqlCount);
        $curseur->execute();
        $nbPatient = $curseur->fetch();
        $nbPatient = (int)$nbPatient['nb_patients'];

        $data = ['patients' => $ligne, 'nbPatient' => $nbPatient];

        return $data;

    }

    public function getPatientById($id)
    {

        $sql = <<<EOD
        SELECT id, lastname, firstname, birthdate, phone, mail FROM patients WHERE id = :id;
        EOD;
        $curseur = $this->_connection->prepare($sql);
        $curseur->bindParam('id', $id);
        $curseur->execute();
        $ligne = $curseur->fetch(PDO::FETCH_ASSOC);
        return $ligne;

    }

    public function getPatientSearch($searchTerm)
    {

        $sql = <<<EOD
        SELECT id, lastname, firstname, birthdate, phone, mail FROM patients WHERE phone = :searchTerm;
        EOD;
        $curseur = $this->_connection->prepare($sql);
        $curseur->bindParam('searchTerm', $searchTerm);
        $curseur->execute();
        $ligne = $curseur->fetchall(PDO::FETCH_ASSOC);
        return $ligne;

    }


    public function create($lastname, $firstname, $birthdate, $phone, $mail)
    {
        $sql = <<<EOD
        INSERT INTO patients (lastname, firstname, birthdate, phone, mail)
        VALUES (:lastname, :firstname, :birthdate, :phone, :mail);
        EOD;
        $curseur = $this->_connection->prepare($sql);
        $curseur->bindParam('lastname', $lastname);
        $curseur->bindParam('firstname', $firstname);
        $curseur->bindParam('birthdate', $birthdate);
        $curseur->bindParam('phone', $phone);
        $curseur->bindParam('mail', $mail);
        $curseur->execute();
        return $this->_connection->lastInsertId();

    }


    public function edit($id, $lastname, $firstname, $birthdate, $phone, $mail)
    {
        $sql = <<<EOD
    UPDATE patients SET lastname = :lastname, firstname = :firstname, birthdate = :birthdate, phone = :phone, mail = :mail
    WHERE id = :id;
    EOD;
        $curseur = $this->_connection->prepare($sql);
        $curseur->bindParam('id', $id);
        $curseur->bindParam('lastname', $lastname);
        $curseur->bindParam('firstname', $firstname);
        $curseur->bindParam('birthdate', $birthdate);
        $curseur->bindParam('phone', $phone);
        $curseur->bindParam('mail', $mail);
        $curseur->execute();

    }

    public function delete($id)
    {
        $sql = <<<EOD
    DELETE FROM patients
    WHERE id = :id;
    EOD;
        $curseur = $this->_connection->prepare($sql);
        $curseur->bindParam('id', $id);
        $curseur->execute();

    }
}



