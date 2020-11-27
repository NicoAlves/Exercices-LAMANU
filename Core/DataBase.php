<?php


abstract class DataBase
{
    private string $Host = 'localhost';
    private string $User = 'root';
    private string $Password = '';
    private string $Base = 'hospitale2n';

    protected $_connection;

    public function getConnection(){
        $this->_connection = NULL;
        // connexion à la base
        try{
            $this->_connection = new PDO("mysql:host=" . $this->Host . ";dbname=" . $this->Base, $this->User, $this->Password);
            $this->_connection->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Erreur à la connexion: " . $exception->getMessage();
        }
    }

}