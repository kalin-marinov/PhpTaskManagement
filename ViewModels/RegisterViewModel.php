<?php
    require_once(__DIR__.'\ViewModelBase.php');

    class RegisterViewModel extends ViewModelBase { 
        
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

        function __construct(string $username = null, string $password = null, string $confirmPassword = null,
         string $email = null, string $fullName = null,string $errors = null)
        {
            $viewPath = __DIR__."/../Views/register.php";
            parent::__construct($viewPath);
        }
    }

?>