<?php
require_once PROJECT_ROOT_PATH."/Models/Database.php";
 
class User extends Database
{
    public function readUsers()
    {
        return $this->get("SELECT * FROM people");
    }
    
    public function readUser($x)
    {
        return $this->get("SELECT * FROM people WHERE id=".$x);
        //return $this->get("SELECT * FROM people WHERE id=".$x.";");
    }
    
    public function createUser($first_name, $last_name, $email)
    {
        return $this->post("INSERT INTO people(first_name, last_name, email) "
                ."VALUES('{$first_name}', '{$last_name}', '{$email}')");
    }
    
}