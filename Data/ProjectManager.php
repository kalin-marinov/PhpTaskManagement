<?php

require_once(__DIR__.'\ProviderBase.php');
require_once(__DIR__.'\models\Project.php');

class ProjectManager extends ProviderBase
{
    /**
    * Constructs a new ProjectDataProvider
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
        return $this->mapProjects($this->executeQuery("SELECT * FROM projects"));
    }
    
    public function findProject(string $key)
    {
        $param = array('key' => $key);
        $query = $this->executeQuery("SELECT * FROM projects p WHERE p.key = :key", $param);
        $mapped = $this->mapProjects($query);

        return $mapped[0];
    }
    
    
    /**
    * Adds a new project to the database. If the key already exists,
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
    * Edits an existing database project
    * @return string
    **/
    public function editProjectDescription(string $projectKey, string $newDescription) : string
    {
        return $this->executeNonQuery("UPDATE projects SET 
           projects.description=:description WHERE projects.key = :key ", array("key" => $projectKey, "description" => $newDescription));
    }
    
    
    /**
    * Removes a project by given project key
    * @param string $projectKey the key of the project
    * @return string
    **/
    public function removeProject(string $projectKey) : string
    {
        return $this->executeNonQuery("DELETE FROM projects WHERE projects.key = :key", array('key' => $projectKey));
    }
    
    /**
    * Returns an array of Projects from array of arrays
    * @return Project[]
    **/
    public function mapProjects(array $arr) : array
    {
        $mapFunc = function ($el) {
            $pr = new Project();
            $pr->fromArray($el);
            return $pr;
        };
        
        return array_map($mapFunc, $arr);
    }
}
