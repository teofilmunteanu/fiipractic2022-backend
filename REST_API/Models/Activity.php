<?php
require_once PROJECT_ROOT_PATH."/Models/Database.php";

class Activity extends Database
{
    public function readActivities()
    {
        return $this->get("SELECT * FROM activities");
    }
    
    public function readActivity($x)
    {
        return $this->get("SELECT * FROM activities WHERE name=".$x.";");
    }
    
    public function createActivity($name)
    {
        return $this->post("INSERT INTO activities(name) "
                ."VALUES('{$name}')");
    }
}
