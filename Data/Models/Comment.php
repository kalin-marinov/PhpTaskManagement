<?php

require_once('data\models\ModelBase.php');

class Comment extends ModelBase{
    

    
    /**
    * Comment id
    * @var int
    **/
    public $id;

    /**
    * User id - the id of the user that posted the comment
    * @var string
    **/
    public $userId;
    
    /**
    * task name
    * @var string
    **/
    public $taskkey;
    
    /**
    * Description
    * @var string
    **/
    public $description;
    
    
    /**
    * Timestamp
    * @var string
    **/
    public $time;
    
    function __construct(string $userId = null, string $taskkey = null, string $description = null){
        $this->userId = $userId;
        $this->taskkey = $taskkey;
        $this->description = $description;
    }
}

?>