<?php
    require_once(__DIR__.'\ViewModelBase.php');

    class RegisterViewModel extends ViewModelBase { 
        
        /**
        * @var string $userName username */
        public $userName;

        /**
        * @var string $userName username */
        public $password;

          /**
        * @var string $userName username */
        public $confirmPass;

         /**
        * @var string $userName username */
        public $email;

         /**
        * @var string $userName username */
        public $fullName;

        /**
        * @var string $userName username */
        public $errors;

        function __construct(string $userName = null, string $password = null, string $confirmPass = null,
         string $email = null, string $fullName = null,string $errors = null)
        {
            $this->viewPath = __DIR__."\..\Views\login.php";
        }
    }

?>