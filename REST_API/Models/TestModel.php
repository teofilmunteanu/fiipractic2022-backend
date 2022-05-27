<?php
require_once PROJECT_ROOT_PATH."/Models/Database.php";
 
class TestModel extends Database
{
    public function readTests()
    {
        return $this->get("SELECT * FROM tests");
    }
    
    /*public function readTestsX($x)
    {
        return $this->get("SELECT * FROM test WHERE number=".$x.";");
    }*/
    
    public function createTest($value)
    {
        //return $this->post("INSERT INTO tests (text) VALUES ('{$value}');");
        return $this->post("INSERT INTO tests (text) "
                ."VALUES ('{$value}')");
    }
    
    public function updateTest($id,$value)
    {
        return $this->post("UPDATE tests SET text = '{$value}' WHERE id ='{$id}'");
    }
    
    public function deleteTest($id)
    {
        return $this->post("DELETE FROM tests WHERE id='{$id}'");
    }
    
}