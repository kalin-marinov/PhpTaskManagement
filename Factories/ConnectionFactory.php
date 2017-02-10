<?php

class ConnectionFactory{
    
    public static function create() : PDO {
        // Default parameters:
        $host = "eu-cdbr-azure-west-d.cloudapp.net";
        $db = "taskmanagement";
        $user = "b42e25c9b39192";
        $pass = "d7cd0911";

    
        $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        return $conn;
    }
}

?>