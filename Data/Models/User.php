<?php

require_once('data\models\ModelBase.php');

class User extends ModelBase{
    
    /**
    * Username - used for logging in
    * @var string
    **/
    public $username;
    
    /**
    * Full name
    * @var string
    **/
    public $fullName;
    
    /**
    * Email address of the user
    * @var string
    **/
    public $email;
    
    function __construct(string $username = null, string $fullname = null, string $email = null){
        $this->username = $username;
        $this->fullName = $fullname;
        $this->email = $email;
    }
}

?>