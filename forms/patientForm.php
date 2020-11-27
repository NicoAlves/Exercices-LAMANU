<?php

class patientForm
{
    private $flag = "false";

    public function validation($lastname, $firstname, $birthdate, $phone, $mail)
    {

        $this->controlLastname($lastname);
        $this->controlfirstName($firstname);
        $this->controlBirthDate($birthdate);
        $this->controlPhone($phone);
        $this->controlmail($mail);

        return $this->flag;


    }

    public function controlLastname($lastname)
    {
        if (empty($lastname)) {
            return false;

        }
        if (!preg_match('/^[a-zA-Z.\-]+$/', $lastname)) {
            return false;
        }
        return true;


    }


    public function controlfirstName($firstname)
    {
        if (empty($firstname)) {
            return false;

        }
        if (!preg_match('/^[a-zA-Z.\-]+$/', $firstname)) {
            return false;
        }
        return true;

    }

    public function controlBirthDate($birthdate)
    {
        $dateofday = date('d-m-yy');
        $birthdate = explode('-', $birthdate);
        $birthdate = array_reverse($birthdate);
        $birthdate = implode('-', $birthdate);

        if (empty($birthdate)) {
            return false;
        }

        if (!preg_match('/^(\d{1,2})[-.\/](\d{1,2})[-.\/](\d{4})$/', $birthdate)) {
            return false;
        }


        if ($birthdate == $dateofday) {
            return false;
        }
        $birthdate = explode('-', $birthdate);
        $dateofday = explode('-', $dateofday);
        // si l'année est supérieur à l'année en cours
        if ($birthdate[2] > $dateofday[2]) {
            return false;
        }
        // si l'année est égale à l'année en cours et si le mois et supérieure  au mois courrant
        if ($birthdate[2] == $dateofday[2] && $birthdate[1] > $dateofday[1]) {

            return false;
        }
        if ($birthdate[2] >= $dateofday[2] && $birthdate[1] >= $dateofday[1] && $birthdate[0] > $dateofday[0]) {
            return false;
        }

        return true;

    }

    public function controlPhone($phone)
    {
        if (empty($phone)) {
            return false;
        }

        if (!preg_match('/^(0)[1-9](\d{2}){4}$/', $phone)) {
            return false;
        }


        return true;
    }

    public function controlmail($mail)
    {
        if (empty($mail)) {
            return false;
        }

        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        $this->flag = "true";
        return true;

    }
}