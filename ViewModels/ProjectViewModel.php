<?php

require_once(__DIR__.'/../Data/Models/ModelBase.php');

class CreateProjectViewModel extends ModelBase {
    
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
    
    /**
    * Maps the view model to a Project (data model)
    */
    public function convertToProject() : Project
    {
        $newTask = new Task($this->taskKey,$this->taskName,
        $this->taskDescription, $this->projectKey, $this->parentKey);
    }
}

?>