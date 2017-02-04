<?php

include('data\ProviderBase.php');

class TasksDataProvider extends ProviderBase
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
	* Adds a new task to the database. If the key already exists,
	* the database will not be modified
	* @return string
	**/
	public function addTask($taskData) : string
	{ 
		return $this->executeNonQuery("INSERT INTO Tasks VALUES (:key, :name, :description)", $taskData);
	}

	public function removeTask(string $taskKey) : string
	{
	    return $this->executeNonQuery("DELETE FROM Tasks WHERE key = :key", array('key' => $taskKey));
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