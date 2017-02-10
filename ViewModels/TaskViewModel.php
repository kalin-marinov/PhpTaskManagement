<?php

    class CreateTaskViewModel { 
        
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

        /**
        * @return Task
        */
        public function convertToTask():Task{
          return new Task($this->taskKey,$this->taskName,
                  $this->taskDescription, $this->projectKey, $this->parentKey);
        }

    }

?>