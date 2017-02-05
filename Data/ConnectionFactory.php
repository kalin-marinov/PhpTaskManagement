<?php

class ConnectionFactory{
    
    public static function create() : PDO {
        // Default parameters:
        $host = "localhost";
        $db = "taskmanagement";
        $user = "testUser";
        $pass = "testPassword";
        
        $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        return $conn;
    }
}

?>