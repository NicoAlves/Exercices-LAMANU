<?php

class appointmentForm
{
    private $flag = "false";

    public function validation($dateTime)
    {

        $this->controlDateTime($dateTime);
        return $this->flag;


    }

    public function controlDateTime($dateTime)
    {
        if (empty($dateTime)) {
            return false;

        }
        date_default_timezone_set('Europe/Paris');
        $dateTime = explode('T', $dateTime);
        $date = $dateTime[0];
        $time = $dateTime[1];
        $dateofday = date('d-m-yy');
        $dateObj = new DateTime();
        $timeDay = $dateObj->getTimestamp();
        $time = strtotime($time);

        $date = explode('-', $date);
        $date = array_reverse($date);
        $date = implode('-', $date);


        if (!preg_match('/^(\d{1,2})[-.\/](\d{1,2})[-.\/](\d{4})$/', $date)) {

            return false;
        }


        $date = explode('-', $date);
        $dateofday = explode('-', $dateofday);
        // si l'année est inférieur à l'année en cours
        if ($date[2] < $dateofday[2]) {

            return false;
        }
        // si l'année est inférieur ou égal à l'année en cours et si le mois est inférieur au mois courrant
        if ($date[2] <= $dateofday[2] && $date[1] < $dateofday[1]) {
            return false;
        }
        if ($date[2] <= $dateofday[2] && $date[1] <= $dateofday[1] && $date[0] < $dateofday[0]) {
            return false;
        }

        if ($date[2] <= $dateofday[2] && $date[1] <= $dateofday[1] && $date[0] <= $dateofday[0]) {

            if ($time <= $timeDay) {

                return false;
            }
        }

        $this->flag = "true";
        return true;


    }


}