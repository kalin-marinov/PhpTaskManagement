<?php

require_once(__DIR__.'\ProviderBase.php');

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

    /**
    * Returns an array of usernames that are assigned to the task
    * @return string[]
    **/
    public function getTasksForUser(string $userName) : array
    {
        return $this->mapTasks($this->executeQuery(
        "SELECT t.* FROM usertasks ut
         JOIN users u on u.Id = ut.userId
         JOIN tasks t on t.key = ut.taskKey
         WHERE u.userName = :name", array("name" => $userName)));
    }
    
    /** assigns a task to the given user */
    public function assignTask(string $userName, string $taskKey) : string
    {
        $userId =  $this->executeQuery('SELECT id FROM users WHERE username=:name', array("name" => $userName))[0]['id'];
        return $this->executeNonQuery("INSERT INTO usertasks VALUES (:taskKey, :userId)", array("taskKey" => $taskKey, "userId" => $userId));
    }
    
    
    /**
    * Removes a task by given task key
    * @param string $taskKey the key of the task
    * @return string
    **/
    public function unAssignUser(string $userName, string $taskKey) : string
    {
        $userId =  $this->executeQuery('SELECT id FROM users WHERE username=:name', array("name" => $userName))[0]["id"];
        return $this->executeNonQuery("DELETE FROM usertasks WHERE usertasks.taskkey = :taskKey and usertasks.userId = :userId",
             array("taskKey" => $taskKey, "userId" => $userId));
    }

      /**
    * Returns an array of Tasks from array of arrays
    * @return Task[]
    **/
    private function mapTasks(array $arr) : array{
        $mapFunc = function($el) {
            $task = new Task();
            $task->fromArray($el);
            return $task;
        };
        
        return array_map($mapFunc, $arr);
    }
}

?>