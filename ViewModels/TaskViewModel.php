<?php
    require_once(__DIR__.'\ViewModelBase.php');

    class TaskViewModel extends ViewModelBase { 
        
        /**
        * @var string $taskName task name */
        public $taskName;

        /**
        * @var string $taskDescription task description */
        public $taskDescription;        

        /**
        * List of errors that occured during registration
        * @var string $userName username */
        public $errors;

        function __construct(string $taskName = null, string $taskDescription = null, string $errors = null)
        {
            $viewPath = __DIR__."/../Views/createTask.php";
            parent::__construct($viewPath);
        }
    }

?>