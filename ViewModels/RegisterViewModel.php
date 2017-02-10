<?php

require_once(__DIR__.'/../Data/Models/ModelBase.php');

class RegisterViewModel extends ModelBase {
    
    /**
    * @var string $userName username */
    public $username;
    
    /**
    * @var string $password password */
    public $password;
    
    /**
    * @var string $confirmPassword password confirm */
    public $confirmPassword;
    
    /**
    * @var string $email user email */
    public $email;
    
    /**
    * @var string $fullName full name */
    public $fullName;
    
    /**
    * List of errors that occured during registration
    * @var string $userName username */
    public $errors;
    
}

?>