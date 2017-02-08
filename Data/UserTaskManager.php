<?php

require_once(_DIR_.'\..\..\data\ProviderBase.php');

class UserTaskManager extends ProviderBase
{
    /**
    * Constructs a new TaskDataProvider
    * @param PDO $connection - MySQL connection
    */
    function __construct(PDO $connection)
    {
        parent::__construct($connection);
    }
    
    /**
    * Returns an array of usernames that are assigned to the task
    * @return string[]
    **/
    public function getAssignedUsers(string $taskKey) : array
    {
        return $this->executeQuery(
        "SELECT u.username FROM usertasks ut
         JOIN users u on u.Id = ut.userId
         WHERE ut.taskKey = :key", array(key => $taskKey));
    }
    
    /** assigns a task to the given user */
    public function assignTask(string $userName, string $taskKey) : string
    {
        $userId =  $this->executeQuery('SELECT id FROM users WHERE username=:name', array(name => $userName))[0];
        return $this->executeNonQuery("INSERT INTO usertasks VALUES (:taskKey, :userId)", array(taskKey => $taskKey, userId => $userId));
    }
    
    
    /**
    * Removes a task by given task key
    * @param string $taskKey the key of the task
    * @return string
    **/
    public function unAssignUser(string $userName, string $taskKey) : string
    {
        $userId =  $this->executeQuery('SELECT id FROM users WHERE username=:name', array(name => $userName))[0];
        return $this->executeNonQuery("DELETE FROM usertasks where taskKey = :taskKey and userId = :userId", array(taskKey => $taskKey, userId => $userId));
    }
}

?>