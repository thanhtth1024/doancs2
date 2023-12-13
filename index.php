<?php
    session_start();
    ob_start();
    if(!isset($_SESSION["giohang"])){
        $_SESSION["giohang"]=[];
    }
    // nhúng kết nối csdl
    include "model/pdo.php";
    include "model/global.php";
    include "model/user.php";
    include "model/danhmuc.php";
    include "model/sanpham.php";
    include "model/giohang.php";
    include "model/binhluan.php";
    include "model/donhang.php";
    include "view/home/header.php";
    
    //data dành cho trang chủ
    $dssp_new=get_dssp_new(8);
    $dssp_best=get_dssp_best(8);
    $dssp_view=san_pham_select_top10();
  

    if(!isset($_GET['pg'])){
        include "view/home/home.php";
    }
    else{
        switch ($_GET['pg']) {
            case 'sanpham':
                $dsdm = danhmuc_all();
                $kyw = "";
                $titlepage = "";
            
                if (!isset($_GET['iddm'])) {
                    $iddm = 0;
                } else {
                    $iddm = $_GET['iddm'];
                    $titlepage = get_name_dm($iddm);
                }
            
                // Kiểm tra có phải form search không?
                if (isset($_POST["timkiem"]) && ($_POST["timkiem"])) {
                    $kyw = $_POST["kyw"];
                    $titlepage = "Kết quả tìm kiếm với từ khóa: <span>" . $kyw . "</span>";
                }
            
                if (!isset($_GET['page'])) {
                    $page = 1;
                } else {
                    $page = $_GET['page'];
                }
            
                $soluongsp = 9;
                $minPrice = isset($_GET['minPrice']) ? $_GET['minPrice'] : 0;
                $maxPrice = isset($_GET['maxPrice']) ? $_GET['maxPrice'] : 5000000;
            
                $dssp = get_sanpham_pt($kyw, $page, $iddm, $soluongsp, $minPrice, $maxPrice);
                $tongsosp = get_dssp_all();
                $hienthisotrang = hien_thi_so_trang($tongsosp, $soluongsp);
                include "view/sanpham/sanpham.php";
                break;
            
            // case 'sanpham':
            //     $dsdm=danhmuc_all();
            //     $kyw="";
            //     $titlepage="";

            //     if(!isset($_GET['iddm'])){
            //         $iddm=0;
            //     }else{
            //         $iddm=$_GET['iddm'];
            //         $titlepage=get_name_dm($iddm);
            //     }
                
            //     // kiểm tra có phải form search không?
            //     if(isset($_POST["timkiem"])&&($_POST["timkiem"])){
            //         $kyw=$_POST["kyw"];
            //         $titlepage="Kết quả tìm kiếm với từ khóa: <span>".$kyw."</span>";
            //     }
            //     if(!isset($_GET['page'])){
            //         $page=1;
            //      }else{
            //         $page=$_GET['page'];
            //      }
            //      $soluongsp=9;
            //     // $dssp=get_dssp($kyw,$iddm,12);
            //     $dssp=get_sanpham_pt($kyw,$page,$iddm,$soluongsp);
            //     $tongsosp=get_dssp_all();
                // $hienthisotrang=hien_thi_so_trang($tongsosp,$soluongsp);
            //     include "view/sanpham/sanpham.php";
            //     break;
            case 'sanphamchitiet':
                $dsdm=danhmuc_all();
                if(isset($_GET["id"])&&($_GET["id"]>0)){
                    $id=$_GET["id"];
                    san_pham_tang_so_luot_xem($id);
                    $iddm=get_iddm($id);
                    $dssp_lienquan=get_dssp_lienquan($iddm,$id,4);
                    $spchitiet=get_sanphamchitiet($id);
                    include "view/sanpham/sanphamchitiet.php";
                }else{
                    include "view/home/home.php";
                }

                break;
                
            case 'addcart':
                if(isset($_POST["addcart"])){
                    $idpro = $_POST["idpro"];
                    $name = $_POST["name"];
                    $img = $_POST["img"];
                    $price = $_POST["price"];
                    $soluong = $_POST["soluong"];
                  
                    $thanhtien=(int)$soluong*(int)$price;
                    $sp=array(  "idpro"=>$idpro,
                                "name"=>$name,
                                "img"=>$img,
                                "price"=>$price,
                               
                                "soluong"=>$soluong,
                                "thanhtien"=>$thanhtien
                             );
                    array_push($_SESSION["giohang"],$sp);
                    header('location: index.php?pg=viewcart');
                }
                break;
            
                case 'viewcart':
                    if (isset($_GET['del'])) {
                        $action = $_GET['del'];
                        if ($action == 'all') {
                            // Xóa toàn bộ giỏ hàng
                            unset($_SESSION['giohang']);
                        } else {
                            // Xóa một sản phẩm cụ thể dựa trên ID
                            $id_to_delete = $action;
                            foreach ($_SESSION['giohang'] as $index => $sp) {
                                if ($sp['idpro'] == $id_to_delete) {
                                    unset($_SESSION['giohang'][$index]);
                                }
                            }
                            
                        }
                        header('location: index.php?pg=viewcart');
                }
                else{
                    if(isset($_SESSION["giohang"])) {
                        $tongdonhang = get_tongdonhang();
                        $tongdonhang = floatval(str_replace(',', '', $tongdonhang));
                        $phivanchuyen = 15000; 
                        $thanhtoan = $tongdonhang + $phivanchuyen;
                        include "view/cart/viewcart.php"; 
                    } else {
                        echo "Không có sản phẩm trong giỏ hàng";
                    }
            }
                break;

            case 'login':
                if(isset($_POST["dangnhap"])&&($_POST["dangnhap"])){
                    $username=$_POST["username"];
                    $password=$_POST["password"];
                    $kq=checkuser($username,$password);
                    if(is_array($kq)&&(count($kq))){
                        $_SESSION['s_user']=$kq;
                        if($bill==1){
                            header('location: index.php?pg=donhang');  
                        } else if($_SESSION['trang']=="sanphamchitiet") {
                             header('Location: index.php?pg=sanphamchitiet&id='.$_SESSION['idpro'].'#binhluan');
                        }
                        header('location: index.php?pg=trangchu');
                        } else {
                        $tb="Tài khoản không tồn tại hoặc thông tin đăng nhập sai! ";
                        $_SESSION['tb_dangnhap']=$tb;
                        header('location: index.php?pg=dangnhap');
                        }
                }
                break;
            case 'dangnhap':
                include "view/taikhoan/dangnhap.php";
                break;
            case 'myaccount':
                if(isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)){     
                    include "view/taikhoan/myaccount.php";
                }              
                break;
            case 'logout':
                if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
                    // unset($_SESSION['giohang']);
                    unset($_SESSION['s_user']); 
                }
                 unset($_SESSION['current_user']);
                header('location: index.php?pg=trangchu');
                exit();
                break;
            case 'adduser':
                if(isset($_POST["dangky"])&&($_POST["dangky"])){
                    $username=$_POST["username"];
                    $password=($_POST["password"]);
                    $fullname=$_POST["fullname"];
                    $address=$_POST["address"];
                    $email=$_POST["email"];
                    $sdt=$_POST['sdt'];
                    $role=1;
                    // xử lý
                    user_insert($username, $password,$fullname,$address, $email,$sdt, $role);
                  $_SESSION['success_message'] = "Bạn đã đăng kí thành công tài khoản!";   
                }
               
                // 
                include "view/taikhoan/dangnhap.php";
                break;
            case 'updateuser':
                // xác định giá trị input
                if(isset($_POST["capnhat"])&&($_POST["capnhat"])){
                    $username=$_POST["username"];
                    $password=$_POST["password"];
                    $fullname=$_POST["fullname"];
                    $email=$_POST["email"];
                    $diachi=$_POST["diachi"];
                    $dienthoai=$_POST["dienthoai"];
                    $id=$_POST["id"];
                    // xử lý
                    user_update($username,$password,$email,$fullname,$diachi,$dienthoai,$id);
                    $_SESSION['success_mess'] = "Bạn đã cập nhật thành công tài khoản!";
                    include "view/taikhoan/myaccount.php";
                }

                break;
           
            case 'dangky':
                include "view/taikhoan/dangky.php";
                break;
            case 'gioithieu':
                include "view/gioithieu/gioithieu.php";
                break;
            case 'contact':
                include "view/lienhe/contact.php";
                break;
            case 'checkout':
                if(isset($_POST['thanhtoan'])) {
                    $ten=$_POST['nguoidat'];
                    $email=$_POST['email'];
                    $sdt=$_POST['sdt'];
                    $diachi=$_POST['diachi'];
                    $pttt=$_POST['pttt'];
                    $iduser=$_SESSION['s_user']['id'];
                    $madh="N".rand(100000,999999);
                    $total=get_tongdonhang();
                    $total=floatval(str_replace(',', '', $total));
                    $ship=15000;
                    $tongtt=(int)$total+(int)$ship;
                    $order_id = bill_insert_id($madh, $iduser, $ten, $sdt, $email, $diachi, $total, $ship, $tongtt, $pttt);    
                    //insert giỏ hàng từ session đưa vào table cart
                     foreach ($_SESSION['giohang'] as $sp) {
                        extract($sp);
                        cart_insert($order_id, $idpro, $soluong, $price);
                     }
                    //  unset($_SESSION['giohang']);
                   
                    header('Location: index.php?pg=donhang_confirm');
                }
                include "view/checkout/thanhtoan.php";
                break;
            case 'donhang_confirm':
                include "view/donhang/donhang_confirm.php";
                break;
            case 'mybill':
                include "view/donhang/mybill.php";
                break;
            default:
                include "view/home/home.php";
                break;
        }
    }
    include "view/home/footer.php";

?>