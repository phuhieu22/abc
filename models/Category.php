<?php
class Category 
{
    //kết nối database
    public $connection;
    public function __construct()
    {
        $this ->connection = connect();
    }

    public function listCate(){//lấy danh sách truy vấn
        //b1: viết câu truy vấn
        $sql = "SELECT * FROm categoies";
        //b2 : prepara câu truy vấn
         $stmt = $this -> connection ->prepare($sql);
         //b3: thực thi câu truy vấn
         $stmt ->execute();
         return $stmt -> fetchAll();
    }
}
?>
