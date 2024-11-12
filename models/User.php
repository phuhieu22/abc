<?php
class User 
{
    public $connection;
    public function __construct()
    {
        $this ->connection = connect();
    }
    public function listUser(){
        $sql = "SELECT * FROM user";
        $stmt = $this -> connection-> prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>
