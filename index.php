<?php 
//require file cấu hình/biến môi trường
require_once './commons/env.php';
require_once './commons/function.php';

//require controllers
require_once './controllers/PostController.php';

//require models
require_once './models/Post.php';
require_once './models/User.php';
require_once './models/Category.php';
//Routing: điều hướng website
//VD URL: http://localhost/web2014.02/asm/index.php?act=list
$action = isset($_GET['act']) ? $_GET['act']:'/';
//toán tử 3 ngôi tương tụ
/**
 * if(isset($_GET['act'])){
 *  $action = $_GET['act'];
 * }else{
 * $action='/';
 * }
 */

switch ($action) {
    case 'list':
        /* B1: khởi tạo 1 object từ class PostController
            B2: từ object vừa tạo, thực hiện gọi hàm */
        // $postController = new PostController();
        // $postController->hienThiDanhSach();
        (new PostController())->hienThiDanhSach();
        break;
    case 'detail':
        (new PostController())->thongtinchitiet();
        break;
    case 'create':
       (new PostController())->taomoi();
        break;
    case "delete":
        (new PostController())->xoa();
        break;
    case "edit":
        (new PostController())->chinhsua();
        break;
}
?>
