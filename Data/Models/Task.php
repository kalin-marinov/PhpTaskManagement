<?php

require_once('data\models\ModelBase.php');

class Task extends ModelBase{
    
    /**
    * The task key - unique for each task
    * @var string
    **/
    public $key;
    
    /**
    * The task name
    * @var string
    **/
    public $name;
    
    /**
    * A description of the task
    * @var string
    **/
    public $description;

    /**
    * The key of the parent task
    * @var string
    **/
    public $parentKey;

    /**
    * The key of the project that the task is part of
    * @var string
    **/
    public $projectKey;  
    
    function __construct(string $key = null, string $name = null, string $description = null,
       string $projectKey = null, string $parentKey = null){
        $this->key = $key;
        $this->name = $name;
        $this->description = $description;
        $this->parentKey = $parentKey;
        $this->projectKey = $projectKey;
    }
}

?>