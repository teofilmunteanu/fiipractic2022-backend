<?php
require_once PROJECT_ROOT_PATH."/Models/Database.php";
 
class TestModel extends Database
{
    public function getTests()
    {
        return $this->select("SELECT * FROM test");
    }
    
    public function getTestsX($x)
    {
        return $this->select("SELECT * FROM test WHERE number=".$x.";");
    }
    
    public function postTest($value)
    {
        return $this->insert("INSERT INTO test (number) "
                ."VALUES ('{$value}')");
    }
}