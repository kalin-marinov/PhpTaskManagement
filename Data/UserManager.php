<?php
require_once('data\ProviderBase.php');

class UserManager extends ProviderBase{
    
    /**
    * Constructs a new UserManager
    * @param PDO $connection - MySQL connection
    */
    function __construct(PDO $connection)
    {
        parent::__construct($connection);
    }
    
    public function createUser(User $user, string $password){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $params = $user->toArray();
        $params['passwordHash'] = $hash;
        
        return $this->executeNonQuery("INSERT INTO Users VALUES (0, :username, :passwordHash, :fullName, :email)", $params);
    }
    
    public function verifyCredentials(string $username, string $password) : bool{
        $result = $this->executeQuery("SELECT passwordHash FROM Users where Users.username = :name)", array("name" => $username));
        $hash = $result[0];
        return password_verify($password, $hash);
    }
    
    public function signIn(string $username, string $password) : User {
        $result = $this->executeQuery("SELECT * FROM users where username = :name", array("name" => $username));
        $hash = $result[0]['passwordHash'];
        
        $isValid = password_verify($password, $hash);
        
        if($isValid){
            $user = new User();
            $user->fromArray($result[0]);
            $this->prepareSession($user);
            return $user;
        } else{
            return null;
        }
    }
    
    public function getCurrentUser(){
        return  $_SESSION['user'];
    }
    
    public function logOut(){
        unset($_SESSION['user']);
        unset($_SESSION['isLoggedIn']);
    }
    
    private function prepareSession(User $user){
        $_SESSION['user'] = $user;
        $_SESSION['isLoggedIn'] = true;
    }
}

?>