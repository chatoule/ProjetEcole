<?php

class Provider{
    private $host='localhost';
    private $dbName="fermeain_aich_school";
    private $user="fermeain_aich";
    private $password="5*Pu!(8QRI;$";


    public function getconnection(){
        $con=new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->user,  $this->password);
        if($con){
            //echo 'Connexion etablie!!!!';
        return $con;
    }else
        return null;
            //echo "Erreur connexion";
    }
}

$p=new Provider();
$p->getconnection();
?>