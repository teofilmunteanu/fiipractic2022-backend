<?php
class Database{
    protected $connection = null;
 
    public function __construct()
    {
        try {
            $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
         
            if ( mysqli_connect_errno()) {
                throw new Exception("Connection failed.");   
            }
        } 
        catch (Exception $e) {
            throw new Exception($e->getMessage());   
        }           
    }
    
    private function execute($query = "", $params = [])
    {
        try {
            $statement = $this->connection->prepare($query);
 
            if($statement === false) {
                throw New Exception("Failed to execute statement: ".$query);
            }
            if($params) {
                $statement->bind_param($params[0], $params[1]);
            }
            
            $statement->execute();
 
            return $statement;
        } 
        catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }   
    }
    
    /**********************************************************************/
 
    public function select($query = "" , $params = [])
    {
        try {
            $statement = $this->execute($query , $params);
            $result = $statement->get_result()->fetch_all(MYSQLI_ASSOC);               
            $statement->close();
 
            return $result;
        } 
        catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
        return false;
    }  
}