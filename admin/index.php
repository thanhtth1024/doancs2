<?php
 session_start();
include "../model/global.php";
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/user.php";
include "../model/sanpham.php";
include "../model/donhang.php";

include "view/admin/header.php";
function auth() {
    if (isset($_SESSION['s_user'])) {
        $user = $_SESSION['s_user'];
        if ($user['role'] != 2) {
            header('Location:login.php'); 
            exit;
        }
    } else {
        header('Location:login.php'); 
        exit;
    }
}
if(isset($_GET['pg'])) {
    $pg = $_GET['pg'];
    switch ($pg) {
        case 'sanpham':
            if(isset($_POST['timkiem'])){
                $kyw=$_POST['kyw'];
             }else{
                $kyw="";
             }
             if(!isset($_GET['page'])){
                $page=1;
             }else{
                $page=$_GET['page'];
             }
             $soluongsp=8;
             $sanphamlist=get_dssp_admin($kyw,$page,$soluongsp);
             $tongsosp=get_dssp_all();
             $hienthisotrang=hien_thi_so_trang($tongsosp,$soluongsp);
            include "view/sanpham/sanpham.php";
            break;
        case 'sanphamadd':
            $danhmuclist = danhmuc_all();
            include "view/sanpham/sanphamadd.php";
            break;
        case 'addproduct':
            if (isset($_POST['addproduct'])) {
                $name = $_POST['name'];
                $tacgia = $_POST['tacgia'];
                $nxb = $_POST['nxb'];
                $price = $_POST['price'];
                $price_sale = $_POST['price_sale'];
                $mota = $_POST['mota'];
                $iddm = $_POST['iddanhmuc'];
        
                $img1 = $_FILES['img']['name'];
           
        
                insert_sanpham($name, $img1, $tacgia, $nxb, $price, $price_sale, $mota, $iddm);
        
                $target_file1 = IMG_PATH_ADMIN . $img1;
                move_uploaded_file($_FILES['img']['tmp_name'], $target_file1);
        
              
                if(isset($_POST['timkiem'])){
                    $kyw=$_POST['kyw'];
                } else {
                    $kyw="";
                }
                if(!isset($_GET['page'])){
                    $page=1;
                } else {
                    $page=$_GET['page'];
                }
                $soluongsp=8;
                $sanphamlist=get_dssp_admin($kyw,$page,$soluongsp);
                $tongsosp=get_dssp_all();
                $hienthisotrang=hien_thi_so_trang($tongsosp,$soluongsp);
                include "view/sanpham/sanpham.php";
            } else {
                $danhmuclist = danhmuc_all();
                include "view/sanpham/sanphamadd.php";
            }
            break;
            case 'updateproduct':
                if (isset($_POST['updateproduct'])) {
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $tacgia = $_POST['tacgia'];
                    $nxb = $_POST['nxb'];
                    $price = $_POST['price'];
                    $price_sale = $_POST['price_sale'];
                    $mota = $_POST['mota'];
                    $iddm = $_POST['iddanhmuc'];
                    $img1 = $_FILES['img']['name'];
                
            
                    if ($img1 != "") {
                        $target_file1 = IMG_PATH_ADMIN . $img1;
                        move_uploaded_file($_FILES['img']['tmp_name'], $target_file1);
                    } else {
                        $img1 = ""; 
                    }
            
                    
            
                   
            
                    
            
                    update_sanpham($name, $img1, $tacgia, $nxb,  $price, $price_sale, $mota, $iddm, $id);
                }
            
                if(isset($_POST['timkiem'])){
                    $kyw=$_POST['kyw'];
                } else {
                    $kyw="";
                }
                if(!isset($_GET['page'])){
                    $page=1;
                } else {
                    $page=$_GET['page'];
                }
                $soluongsp=8;
                $sanphamlist=get_dssp_admin($kyw,$page,$soluongsp);
                $tongsosp=get_dssp_all();
                $hienthisotrang=hien_thi_so_trang($tongsosp,$soluongsp);
                include "view/sanpham/sanpham.php";
                break;
        case 'select':
            $status = $_POST['status']; 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Lấy dữ liệu từ form
                $id = $_POST['id'];
                $newStatus = $_POST['status'];
                $updateResult = updateStatus($id, $status);

                if ($updateResult) {
                    echo "Cập nhật trạng thái đơn hàng thành công!";
                } else {
                    echo "Có lỗi xảy ra khi cập nhật trạng thái đơn hàng!";
                }
            }
            include "view/donhang/bills.php";
            break;
        case 'sanphamupdate':
            if(isset($_GET['id'])&& ($_GET['id']>0)) {
                $id = $_GET['id'];
                $sp = get_sanphamchitiet($id);
            }
            $danhmuclist = danhmuc_all();
            include "view/sanpham/sanphamupdate.php";
            break;
        case 'delproduct':
            if(isset($_GET['id'])&& ($_GET['id']>0)) {
                $id = $_GET['id'];
                $img = IMG_PATH_ADMIN.get_img($id);
                if(is_file($img)) {
                    unlink($img);
                }
                try {
                    sanpham_delete($id);
                } catch (\Throwable $th) {
                    echo "<h3 style='color: red; text-align: center;'>Sản phẩm đã có trong giỏ hàng! Không được quyền xóa</h3>";
                }
            }
            
            if(isset($_POST['timkiem'])){
                $kyw=$_POST['kyw'];
            } else {
                $kyw="";
            }
            if(!isset($_GET['page'])){
                $page=1;
            } else {
                $page=$_GET['page'];
            }
            $soluongsp=8;
            $sanphamlist=get_dssp_admin($kyw,$page,$soluongsp);
            $tongsosp=get_dssp_all();
            $hienthisotrang=hien_thi_so_trang($tongsosp,$soluongsp);
            include "view/sanpham/sanpham.php";
            break;
        // ======= DANH MỤC ============
        case 'danhmuclist':
            $danhmuclist = danhmuc_all();
            include "view/danhmuc/danhmuclist.php";
            break;
        
        case 'danhmucadd':
            include "view/danhmuc/adddanhmuc.php";
            break;
        case 'adddanhmuc':
            if (isset($_POST['adddanhmuc'])) {
                // lấy dữ liệu về 
                $name = $_POST['name'];
                danhmuc_insert($name);
                $danhmuclist = danhmuc_all();
                include "view/danhmuc/danhmuclist.php";
            }
            break;
        case 'deldanhmuc':
            if(isset($_GET['id'])&& ($_GET['id']>0)) {
                $id = $_GET['id'];
                danhmuc_delete($id);
            }
            $danhmuclist = danhmuc_all();
            include "view/danhmuc/danhmuclist.php";
            break;
            case 'formupdatedm':
                include "view/danhmuc/updatedanhmuc.php";
                break;
            
        case 'updatedm':
            
        $conn = new mysqli ("localhost", "root", "", "doancs2");
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
           
            if(isset($_POST['idtheloai']) && isset($_POST['tendanhmuc'])) {
                $id_theloai = $_POST['idtheloai'];
                $ten_theloai = $_POST['tendanhmuc'];
        
                // Câu lệnh SQL để cập nhật thông tin thể loại sách
                $sql = "UPDATE danhmuc SET name = '$ten_theloai' WHERE id = $id_theloai";
        
                // Thực hiện câu lệnh SQL và kiểm tra kết quả
                if(mysqli_query($conn, $sql)) {
                    header('Location: index.php');
                } else {
                    echo "Lỗi: " . mysqli_error($conn);
                }
            } 
        } 
        
        
     
            break;
            
        case 'catalog':
            include "view/catalog.php";
            break;
        case 'bills':
            include "view/donhang/bills.php";
            break;
        case 'deldh': 
            if(isset($_GET['id'])&& ($_GET['id']>0)) {
                $id = $_GET['id'];
                donhang_delete($id);
            }
            $dsdh = donhang_select_all();
            include "view/donhang/bills.php";
            break;
        case 'detail':
            include "view/donhang/detail.php";
            break;
        case 'users':
            include "view/nguoidung/users.php";
            break;
        case 'deluser': 
            if(isset($_GET['id'])&& ($_GET['id']>0)) {
                $id = $_GET['id'];
                user_delete($id);
            }
            $userlist = user_select_all();
            include "view/nguoidung/users.php";
            break;
        case 'updateuserr':
            if(isset($_GET['id'])&& ($_GET['id']>0)) {
                $id = $_GET['id'];
                $user = get_listuser($id);
            }
            $userlist = user_select_all();
            include "view/nguoidung/updateuser.php";
            break;
        case 'updateuser':
            // ktra và lấy dữ liệu
            if(isset($_POST['updateuser'])) {
                $id = $_POST['id'];
                $username = $_POST['username'];
                $password = $_POST['pass'];
                $dienthoai = $_POST['sdt'];
                $email = $_POST['email'];
                $diachi = $_POST['address'];
                $role = $_POST['maquyen'];
                if (user_update($username, $password, $email, $diachi, $dienthoai, $role, $id)) {
                    echo "Cập nhật thành công!";
                } else {
                    echo "Cập nhật thất bại!";
                }
            }
            // show danh sách user
            $userlist = user_select_all();
            include "view/nguoidung/users.php";
            break;

        default:
            include "view/admin/home.php";
            break;
    }
}else {
    auth();
    include "view/admin/home.php";
}

// function auth() {
//     if(isset($_SESSION['user'])) {
//         if ($_SESSION['user']['role'] != 2 ) {
//             header('Location:view/index.php');
//         }
//     } else {
//         header('Location:../index.php?pg=login');
//     }
// }
?>