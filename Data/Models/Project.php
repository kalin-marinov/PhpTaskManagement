<?php

require_once('data\models\ModelBase.php');

class Project extends ModelBase{
    
    /**
    * Username - used for logging in
    * @var string
    **/
    public $key;
    
    /**
    * Full name
    * @var string
    **/
    public $name;
    
    /**
    * Email address of the user
    * @var string
    **/
    public $description;
    
    function __construct(string $key = null, string $name = null, string $description = null){
        $this->key = $key;
        $this->name = $name;
        $this->description = $description;
    }
}

?>