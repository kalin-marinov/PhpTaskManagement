<?php
    require_once(__DIR__.'\ViewModelBase.php');

    class ProjectViewModel extends ViewModelBase { 
        
        /**
        * @var string $projectKey project key should at least 10 charters long */
        public $projectKey;

        /**
        * @var string $projectName project name */
        public $projectName;

        /**
        * @var string $projectDescription project description */
        public $projectDescription;        

        /**
        * List of errors that occured during registration
        * @var string $userName username */
        public $errors;

        function __construct(string $projectName = null, string $projectDescription = null, string $errors = null)
        {
            $viewPath = __DIR__."/../Views/createProject.php";
            parent::__construct($viewPath);
        }
    }

?>