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
    * @var array $erros errors */
    public $errors;
    
    /**
    * @return Task
    */
    public function convertToTask($projectKey) : Task {
        
        return new Task($this->taskKey,$this->taskName,
        $this->taskDescription, $projectKey, $this->parentKey);
    }
    
}

?>