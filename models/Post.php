<?php
class Post 
{
    //tạo kết nối với CSDL
    public $connection;
    public function __construct()
    {   
        $this->connection = connect();
    }

    //lấy toàn bộ bản ghi trong bảng post
    public function danhSachPost() {
        //B1: Viết câu truy vấn 
        $sql = "SELECT *,user.name as ather, posts.id as pid FROM posts 
        JOIN user on posts.user_id = user.id 
        JOIN categoies on posts.category_id = categoies.id";
        // $sql ="SELECT * FROM  posts JOIN categoies on posts.category_id = categoies.id";

        //B2: Thực thi câu truy vấn: 
        $stmt = $this->connection->prepare($sql); //B2.1: prepare
        $stmt->execute(); //B2.2: execute: thực thi câu truy vấn

        return $stmt->fetchAll(); //lấy dữ liệu trả về cho controller
    }
    public function chitietPost($id){
        $sql = "SELECT * FROM posts WHERE id=".$id;
        $stml = $this -> connection->prepare($sql);
        $stml->execute();
        return $stml ->fetch();
    }

    public function deletePost($id){
        $sql = "DELETE FROM posts WHERE id=".$id;
        $sml = $this -> connection->prepare($sql);
        $sml-> execute();
        return $sml;
    }
    public function themPost($title,$content ,$userId,$categoryId,$thumbnail){
        $sql = "INSERT INTO posts (tile, content,user_id,category_id, thumbnail)
        VALUES ('$title', '$content', '$userId','$categoryId', '$thumbnail')";
        $stmt = $this -> connection-> prepare($sql);
        return $stmt-> execute();
    }
    public function suaPost($id, $title,$content ,$userId,$categoryId,$thumbnail){
        $sql = "UPDATE posts SET tile = '$title', content = '$content',user_id = '$userId',category_id = '$categoryId', thumbnail = '$thumbnail' WHERE id = '$id'";
        $stmt = $this -> connection-> prepare($sql);
        return $stmt-> execute();
    }

}
?>
