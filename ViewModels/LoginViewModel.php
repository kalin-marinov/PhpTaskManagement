<?php
    require_once(__DIR__.'\ViewModelBase.php');

    class LoginViewModel extends ViewModelBase { 
        
        /**
        * @var string $userName username */
        public $username;

        /**
        * @var string $userName username */
        public $password;

        /**
        * @var string $userName username */
        public $errors;

        function __construct(string $userName = null, string $password = null, string $errors = null)
        {
            $viewPath = __DIR__."\..\Views\login.php";
            parent::__construct($viewPath);
        }
    }

?>