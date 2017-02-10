<?php

require_once(__DIR__.'/../Data/Models/ModelBase.php');

class TaskViewModel extends ModelBase {
    
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
    * @var array $comments array of comments */
    public $comments;  

    /**
    * The user that is assigned to the task
    * @var string $user array of comments */
    public $user;

     function __construct(string $taskKey = null, string $taskName = null, 
     string $taskDescription = null, string $projectKey = null, 
     string $parentKey = null, array $comments =null, string $user = null){
        $this->taskKey = $taskKey;
        $this->taskName = $taskName;
        $this->taskDescription = $taskDescription;
        $this->parentKey = $parentKey;
        $this->projectKey = $projectKey;
        $this->comments = $comments;
        $this->user = $user;
    }
}

?>