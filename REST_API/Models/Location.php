<?php
require_once PROJECT_ROOT_PATH."/Models/Database.php";

class Location extends Database
{
    public function readLocations()
    {
        return $this->get("SELECT * FROM locations");
    }
    
    public function createLocation($adress, $name)
    {
        return $this->post("INSERT INTO locations(adress, name) "
                ."VALUES('{$adress}', '{$name}')");
    }
}

