<?php

  class ProviderBase{
      /**
	 * the MySQL connection (PDO Object)
	 * @var PDO $conn connection
	 **/
	protected $conn;

	
	/**
	* Constructs a new TaskDataProvider
	* @param PDO $connection - MySQL connection
	*/	
     function __construct(PDO $connection){
		$this->conn = $connection;	
	}

    /**
     * Executes a data manipulation query and returns a success or error message
     * @param string $command the text of the command
     * @param array $parameters an associative array of parameters
     **/
    protected function executeNonQuery(string $command, array $parameters) : string
    {
        try {		
            $stmt = $this->conn->prepare($command);		
            
            foreach ($parameters as $key => &$value) {			
                $stmt->bindParam(":$key", $value);		
            }

            $result = $stmt->execute();	
            $count = $stmt->rowCount();	
            return "success. affected $count entries";		
        }	
        catch (Exception $e) {		
            return "{$e->getMessage()} \n";		
        }
    } 

    /**
     * Executes a query and return resut as array
     * @param string $command the text of the command
     * @param array $parameters an associative array of parameters
     **/
    protected function executeQuery(string $command, array $parameters = null) : array
    {		
        $stmt = $this->conn->prepare($command);		
        
        if($parameters != null){
            foreach ($parameters as $key => $value) {			
                $stmt->bindParam(":$key", $value);		
            }
        }
                
        $stmt->execute();

        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($result, $row);
        }
        
        return $result;		
    } 
  }
?>