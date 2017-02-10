<?php

require_once(__DIR__.'\ProviderBase.php');
require_once(__DIR__.'\models\Task.php');

class TasksManager extends ProviderBase
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
    * Returns an array of Tasks containing all tasks stored
    * @return Task[]
    **/
    public function getTasks() : array
    {
        return $this->mapTasks($this->executeQuery("SELECT * FROM tasks"));
    }

    /**
    * Returns array of tasks assign on the given project
    * @return Task[]
    **/
    public function getAllTasks(string $projectKey) : array
    {
        try{
            $param = array('projectKey' => $projectKey);
            return $this->mapTasks($this->executeQuery("SELECT * FROM tasks where tasks.projectKey = :projectKey", $param));
        } catch(Exception $err){
            return null;
        }
    }
    

    
     /**
    * Returns a Task with given task key
    * @return Task
    **/
    public function findTask(string $key) : Task
    {
        try{
            $param = array('key' => $key);
            return $this->mapTasks($this->executeQuery(
            "SELECT * FROM tasks t 
             JOIN usertasks ut on ut.taskkey = t.key
             WHERE t.key = :key", $param))[0];
        } catch(Exception $err){
            return null;
        }
    }
    
    
    /**
    * Adds a new task to the database. If the key already exists,
    * the database will not be modified
    * @return string
    **/
    public function addTask(Task $task) : string
    {
        $params = $task->toArray();
        return $this->executeNonQuery("INSERT INTO Tasks 
           VALUES (:key, :name, :description, :parentKey, :projectKey)", $params);
    }
    
    /**
    * Edits an existing database task
    * @return string
    **/
    public function editTask(Task $task) : string
    {
       $params = array('name' => $task->name , 'description' => $task->description,
                         'key'=> $task->key);
        return $this->executeNonQuery("UPDATE Tasks SET 
           name=:name, description=:description WHERE Tasks.Key = :key ", $params);
    }
    
    
    /**
    * Removes a task by given task key
    * @param string $taskKey the key of the task
    * @return string
    **/
    public function removeTask(string $taskKey) : string
    {
        return $this->executeNonQuery("DELETE FROM Tasks WHERE Tasks.key = :key", array('key' => $taskKey));
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