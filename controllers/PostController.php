<?php
class PostController 
{
    public $postModel;
    public $userModel;
    public $cateModel;
    public function __construct() 
    {
        $this->postModel = new Post();
        $this -> userModel= new User();
        $this-> cateModel= new Category();
    }

    public function hienThiDanhSach()
    {
        //B1: tạo ra 1 object từ class Post.php là $this->postModel
        //B2: dùng object để gọi hàm: $this->postModel->danhSachPost()
        $posts = $this->postModel->danhSachPost();

        require_once './views/listPost.php';
    }

    public function thongtinchitiet()
    {
        //kiểm tra xem có truyền giá trị id_post lên url khong và id_post>0
        if(isset($_GET["id_posts"]) ){
            $id = $_GET['id_posts'];
           $post= $this -> postModel->chitietPost($id);
            require_once "./views/detaiPost.php";
        }
    }

    public function xoa(){
        if(isset($_GET["id_posts"]) && $_GET["id_posts"]>0){//kiểm tra id có tồn tại
            $id=$_GET["id_posts"];//lấy giá trị id_posts cần xoá
             $this ->postModel->deletePost($id);//gọi hàm trong model để thục thi
            header("location: index.php?act=list");//trả về trang danh sách
        }
    } 

    public function taomoi()
    {
        if (isset($_POST['them'])) {
            //kiểm tra ng dùng bấm nút submit hay chưa
            $title = $_POST['title'];
            $content = $_POST['content'];
            $userId =$_POST['user_id'];
            $categoryId = $_POST['category_id'];

            // $thumbnail = $_POST ['thumbnail'];
            $thumbnail = $_FILES['image']['name'];  
            //code logic upload ảnh
            $from= $_FILES['image']['tmp_name'] ; //lấy file từ đâu
            $target_folder = PATH_ROOT."upload/"; //lưu file ở đâu
            $to = $target_folder.basename($_FILES['image']['name']); //đặt tên cho file
            //dùng hàm upload ở file function.php để upload ảnh
            move_uploaded_file($from,$to);
             $this->postModel -> themPost($title,$content,$userId,$categoryId,$thumbnail);
             header ("location: index.php?act=list");
        }
        else{
            $userss = $this -> userModel->listUser();
            $catess = $this -> cateModel->listCate();
            //nếu chưa ng dùng bấm nút submit thì hiệm ra form nhập dữ liệu
            require_once "./views/createPost.php";
        }
    }
    public function chinhsua(){
        if(isset($_GET["id_posts"]) ){
            $id = $_GET['id_posts'];
            if (isset($_POST['sua'])) {
                
                $title = $_POST['title'];
                $content = $_POST['content'];
                $userId =$_POST['user_id'];
                $categoryId = $_POST['category_id'];
                $thumbnail = $_POST ['thumbnail'];
                $this->postModel ->suaPost($id, $title,$content,$userId,$categoryId,$thumbnail);
                header ("location: index.php?act=list");
            }else{
                $post= $this -> postModel->chitietPost($id);
                $userss = $this -> userModel->listUser();
                $catess = $this -> cateModel->listCate();
                require_once "./views/editPost.php";
            }
        }
    }
}
?>
