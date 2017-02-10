<?php
    require_once(__DIR__.'\ViewModelBase.php');

    class TaskViewModel extends ViewModelBase { 
        
         /**
        * @var string $taskKey task key */
        public $taskKey;
        
        /**
        * @var string $projectKey project key */
        public $projectKey;

        /**
        * @var string $taskName task name */
        public $taskName;

        /**
        * @var string $taskDescription task description */
        public $taskDescription;   

          /**
        * @var string $parentKey parent task key (it's used for subtasks) */
        public $parentKey;             

        /**
        * List of errors that occured during registration
        * @var string $userName username */
        public $errors;

        function __construct(string $taskKey = null, string $projectKey = null, string $taskName = null,
       string $taskDescription = null, string $parentKey = null, string $errors = null)
        {
            $viewPath = __DIR__."/../Views/createTask.php";
            parent::__construct($viewPath);
        }
    }

?>