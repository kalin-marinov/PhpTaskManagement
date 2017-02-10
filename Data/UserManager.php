<?php
require_once(__DIR__.'\ProviderBase.php');
require_once(__DIR__.'\models\user.php');

class UserManager extends ProviderBase
{
    
    /**
    * Constructs a new UserManager
    * @param PDO $connection - MySQL connection
    */
    function __construct(PDO $connection)
    {
        parent::__construct($connection);
    }
    
    public function createUser(User $user, string $password)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $params = $user->toArray();
        $params['passwordHash'] = $hash;
        
        return $this->executeNonQuery("INSERT INTO Users VALUES (0, :username, :passwordHash, :fullName, :email)", $params);
    }

    public function getUserId(string $username) : int{
        $id = $this->executeQuery("SELECT id FROM Users WHERE username = :name", array("name" => $username));
        return $id[0]['id'];
    }
    
    
    public function findById(int $userId) : User {
        $users = $this->executeQuery("SELECT u.* FROM Users u WHERE u.id = :id", array("id" => $userId));
        $user = new User();
        $user->fromArray($users[0]);
        return $user;
    }
    /**
    * Returns array of all users
    * @return Task[]
    **/
      public function getAll() : array
    {  
        $all = $this->mapUsers($this->executeQuery("SELECT * FROM Users"));       
            
        return $all;
    }
    

    
    public function verifyCredentials(string $username, string $password) : bool
    {
        $result = $this->executeQuery("SELECT passwordHash FROM Users where Users.username = :name)", array("name" => $username));
        $hash = $result[0];
        return password_verify($password, $hash);
    }
    
    public function signIn(string $username, string $password) : User
    {
        $result = $this->executeQuery("SELECT * FROM users where username = :name", array("name" => $username));
        $hash = $result[0]['passwordHash'];
        
        $isValid = password_verify($password, $hash);
        
        if ($isValid) {
            $user = new User();
            $user->fromArray($result[0]);
            $this->prepareSession($user);
            return $user;
        } else {
            return new User();
        }
    }
    
    public function getCurrentUser() : User
    {
        $user = $this->convertToUser($_SESSION['user']);
        return  $user;
    }
    
    public function logOut()
    {
        unset($_SESSION['user']);
        unset($_SESSION['isLoggedIn']);
    }
    
    private function prepareSession(User $user)
    {
        $_SESSION['user'] = $user;
        $_SESSION['isLoggedIn'] = true;
    }
    
    public function convertToUser(&$object)
    {
        if (!is_object ($object) && gettype ($object) == 'object') {
            return ($object = unserialize (serialize ($object)));
        }
        return $object;
    }

      /**
    * Returns an array of User from array of arrays
    * @return User[]
    **/
    public function mapUsers(array $arr) : array
    {
        $mapFunc = function ($el) {
            $pr = new User();
            $pr->fromArray($el);
            return $pr;
        };
        
        return array_map($mapFunc, $arr);
    }
}