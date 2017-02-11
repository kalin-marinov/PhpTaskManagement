<?php

class ConnectionFactory
{
    
    
    public static function create() : PDO
    {
        // Default parameters:
        $host = "eu-cdbr-azure-west-d.cloudapp.net";
        $db = "taskmanagement";
        $user = "b42e25c9b39192";
        $pass = "d7cd0911";
        
        // $host = "localhost:3306";
        // $db = "taskmanagement";
        // $user = "testUser";
        // $pass = "testPassword";
        
        if (!isset($GLOBALS['MYSQL_CONN'])) {
              $GLOBALS['MYSQL_CONN'] = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        }

        return $GLOBALS['MYSQL_CONN'] ;
    }

    public static function closeConnetion(){
         $GLOBALS['MYSQL_CONN'] = null;
    }
}
