<?php

require_once(_DIR_.'\..\..\data\ProviderBase.php');

class ProjectManager extends ProviderBase
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
    * Returns an array of projects containing all projects stored
    * @return Project[]
    **/
    public function getProjects() : array
    {
        return $this->mapProjects($this->executeQuery("SELECT * FROM tasks"));
    }
    
    public function findProject(string $key) : Project
    {
        try{
            $param = array('key' => $key);
            return $this->mapProjects($this->executeQuery("SELECT * FROM projects where key = :key", $param))[0];
        } catch(Exception $err){
            return null;
        }
    }
    
    
    /**
    * Adds a new task to the database. If the key already exists,
    * the database will not be modified
    * @return string
    **/
    public function addProject(Project $project) : string
    {
        $params = $project->toArray();
        return $this->executeNonQuery("INSERT INTO projects 
           VALUES (:key, :name, :description)", $params);
    }
    
    /**
    * Edits an existing database task
    * @return string
    **/
    public function editProjectDescription(string $projectKey, string $newDescription) : string
    {
        return $this->executeNonQuery("UPDATE projects SET 
           description=:description WHERE key = :key ", array(key => $project, description => $newDescription));
    }
    
    
    /**
    * Removes a task by given task key
    * @param string $projectKey the key of the task
    * @return string
    **/
    public function removeProjcet(string $projectKey) : string
    {
        return $this->executeNonQuery("DELETE FROM projects WHERE key = :key", array('key' => $projectKey));
    }
    
    /**
    * Returns an array of Projects from array of arrays
    * @return Project[]
    **/
    private function mapProjects(array $arr) : array{
        $mapFunc = function($el) {
            $pr = new Project();
            $pr->fromArray($el);
            return $pr;
        };
        
        return array_map($mapFunc, $arr);
    }
}

?>