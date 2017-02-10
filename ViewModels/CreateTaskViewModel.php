<?php

require_once(__DIR__.'/../Data/Models/ModelBase.php');

class CreateTaskViewModel extends ModelBase {
    
    /**
    * @var string $taskKey task key */
    public $taskKey;
    
    /**
    * @var array $projectKeys project keys */
    public $projectKeys;

     /**
    * @var array $selectedKey project keys */
    public $selectedKey;
    
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
    * @var array $users all available users */
    public $users;

     /**
    * @var string $user selected user for the task */
    public $user;
    
    /**
    * List of errors that occured during registration
    * @var array $erros errors */
    public $errors;
    
    /**
    * @return Task
    */
    public function convertToTask() : Task {
        
        return new Task($this->taskKey,$this->taskName,
        $this->taskDescription, $this->selectedKey, $this->parentKey);
    }

      function __construct(string $taskKey = null, string $taskName = null, 
     string $taskDescription = null, string $projectKey = null, 
     string $parentKey = null){
        $this->taskKey = $taskKey;
        $this->taskName = $taskName;
        $this->taskDescription = $taskDescription;
        $this->parentKey = $parentKey;
        $this->selectedKey = $projectKey;
    }
    
}

?>