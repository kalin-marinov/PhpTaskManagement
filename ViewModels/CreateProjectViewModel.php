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
    * @var string $errors list of errors */
    public $errors;
    
    /**
    * Maps the view model to a Project (data model)
    */
    public function convertToProject() : Project
    {
        return  new Project($this->projectKey,$this->projectName,
        $this->projectDescription);
    }

     function __construct(string $projectKey = null, string $projectName = null, 
     string $projectDescription = null){
         $this->projectKey = $projectKey;
         $this->projectName = $projectName;
         $this->projectDescription = $projectDescription;
    }
}

?>