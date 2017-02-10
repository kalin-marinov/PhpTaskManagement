<?php

require_once(__DIR__.'\ProviderBase.php');
require_once(__DIR__.'\..\Data\Models\Comment.php');

class CommentManager extends ProviderBase
{
    /**
    * Constructs a new CommentManager
    * @param PDO $connection - MySQL connection
    */
    function __construct(PDO $connection)
    {
        parent::__construct($connection);
    }
    
    /**
    * Returns an array of comment for given task key
    * @return Comment[]
    **/
    public function getComments(string $taskKey) : array
    {
        return $this->mapComments($this->executeQuery(
        "SELECT c.*, u.username FROM comments c 
         JOIN users u on u.id = c.userId
         where c.taskkey = :key", array("key" => $taskKey)));
    }
        
    
    /**
    * Adds a new comment to the database. 
    * @return string
    **/
    public function addComment(Comment $comment) : string
    {
        $params = array("userId" => $comment->userId, "taskKey" => $comment->taskkey, "descr" => $comment->description);
        return $this->executeNonQuery("INSERT INTO comments (userId, taskkey,description)
           VALUES (:userId, :taskKey, :descr)", $params);
    }
    
    /**
    * Edits an existing comment on exsting task
    * @return string
    **/
    public function editComment(int $commentId, string $newDescription) : string
    {
        return $this->executeNonQuery("UPDATE comments SET 
           description=:description WHERE id = :id ", array(id => $commentId, description => $newDescription));
    }
    
    /**
    * Removes a comment by given commentId
    * @param string $commentId the id of the comment
    * @return string
    **/
    public function removeComment(string $commentId) : string
    {
        return $this->executeNonQuery("DELETE FROM comments WHERE id = :id", array('id' => $commentId));
    }
    
    /**
    * Returns an array of comments from array of arrays
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