<?php

    require_once(__DIR__.'/../Data/Models/ModelBase.php');

    class LoginViewModel extends ModelBase{ 
        
        /**
        * @var string $userName username */
        public $username;

        /**
        * @var string $userName username */
        public $password;

        /**
        * @var string $userName username */
        public $errors;

    }

?>