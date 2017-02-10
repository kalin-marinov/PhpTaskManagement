<?php

require_once(_DIR_.'\..\..\..\data\models\ModelBase.php');

class Project extends ModelBase{
    
    /**
    * Project key
    * @var string
    **/
    public $key;
    
    /**
    * Project name
    * @var string
    **/
    public $name;
    
    /**
    * Project description
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