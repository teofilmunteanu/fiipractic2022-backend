<?php
require_once PROJECT_ROOT_PATH."/Models/Database.php";

class Event extends Database
{
    public function readEvents()
    {
        return $this->get("SELECT * FROM events");
    }
    
    public function readEvent($x)
    {
        return $this->get("SELECT * FROM events WHERE id=".$x.";");
    }
    
    public function createEvent($name, $date, $start_time, $adress)
    {
        return $this->post("INSERT INTO events(name, date, start_time, adress) "
                ."VALUES('{$name}', '{$date}', '{$start_time}', '{$adress}')");
    }
}
