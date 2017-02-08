<?php

require_once('data\ProviderBase.php');

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
    * @return Comment[]
    **/
    public function getComments(string $taskKey) : array
    {
        return $this->mapComments($this->executeQuery("SELECT * FROM comments where  "));
    }
        
    
    /**
    * Adds a new task to the database. If the key already exists,
    * the database will not be modified
    * @return string
    **/
    public function addComment(Comment $project) : string
    {
        $params = $project->toArray();
        return $this->executeNonQuery("INSERT INTO projects 
           VALUES (:key, :name, :description)", $params);
    }
    
    /**
    * Edits an existing database task
    * @return string
    **/
    public function editComment(int $commentId, string $newDescription) : string
    {
        return $this->executeNonQuery("UPDATE comments SET 
           description=:description WHERE id = :id ", array(id => $commentId, description => $newDescription));
    }
    
    /**
    * Removes a task by given task key
    * @param string $projectKey the key of the task
    * @return string
    **/
    public function removeComment(string $commentId) : string
    {
        return $this->executeNonQuery("DELETE FROM comments WHERE id = :id", array('id' => $commentId));
    }
    
    /**
    * Returns an array of Projects from array of arrays
    * @return Comment[]
    **/
    private function mapComments(array $arr) : array{
        $mapFunc = function($el) {
            $comment = new Comment();
            $comment->fromArray($el);
            return $comment;
        };
        
        return array_map($mapFunc, $arr);
    }
}

?>