<?php
    $html_cart = '';
if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {
    extract($_SESSION['s_user']);
    
    // Kiểm tra quyền admin
    $is_admin     = isset($role) && $role == 2;

    $html_cart    = minicart();
    $html_account = '<p>Chào ' . $ten . '</p> 
                    <a href="index.php?pg=myaccount">Tài khoản</a><br>
                    ' . ($is_admin ? '<a href="admin/index.php">Trang quản lý</a><br>' : '') . '
                    <a href="index.php?pg=logout">Đăng xuất</a>';   
} else {
    $html_account = '<h4>Khách hàng</h4>
                     <a href="index.php?pg=dangnhap">ĐĂNG NHẬP</a>';
}

if (isset($_GET['pg']) && ($_GET['pg'] == 'thanhtoan' || $_GET['pg'] == 'checkout' || $_GET['pg'] == 'viewcart')) {
    if (!isset($_SESSION['s_user']) || empty($_SESSION['s_user'])) {
        $_SESSION['cart'] = array();

        header('Location: index.php?pg=dangnhap');
        exit();
    } else {

        $_SESSION['current_user'] = $_SESSION['s_user'];
    }
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>T&T Book Store</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/xxx-icon" href="layout/assets/img/title.png">
    
    <!-- CSS 
    ========================= -->
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="layout/assets/css/plugins.css">
    <link rel="stylesheet" href="/code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="layout/assets/css/style.css">
    
</head>
<style>
    .logo img {
        width: 15%; /* Kích thước ảnh */
        height: auto; /* Để tự động điều chỉnh chiều cao */
    }
</style>

<body>

    <!-- Main Wrapper Start -->
    <!--Offcanvas menu area start-->
    <div class="off_canvars_overlay"></div>
                
    <div class="offcanvas_menu">
        <div class="canvas_open">
                        <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                    </div>
        <div class="offcanvas_menu_wrapper">
                        <div class="canvas_close">
                              <a href="javascript:void(0)"><i class="ion-android-close"></i></a>  
                        </div>
                        
                        <div class="top_right">
                            <ul>
                               <li class="top_links"><a href="#">Tài Khoản <i class="fas fa-user"></i></a>
                                    <ul class="dropdown_links">
                                    <?=$html_account;?>   
                                    </ul>
                                </li> 
                                
                            </ul>
                        </div> 
                       
                        <div class="cart_area">
                            <div class="middel_links">
                               <ul>
                               <?=$html_account;?>   
                               </ul>

                            </div>
                            <div class="cart_link">
                                <a href="index.php?pg=viewcart"><i class="fa fa-shopping-basket"></i>Giỏ hàng</a>
                                <!--mini cart-->
                                
                                <!--mini cart end-->
                            </div>
                        </div>
                        <div id="menu" class="text-left ">
                            <ul class="offcanvas_main_menu">
                                <li class="menu-item-has-children active">
                                    <a href="index.php?pg=trangchu">TRANG CHỦ</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="index.php?pg=sanpham">CỬA HÀNG</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="index.php?pg=gioithieu">GIỚI THIỆU</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="index.php?pg=myaccount">MY ACCOUNT</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="index.php?pg=checkout">THANH TOÁN</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="index.php?pg=contact">LIÊN HỆ</a> 
                                </li>
                            </ul>
                        </div>
                        <div class="offcanvas_footer">
                            <span><a href="#"><i class="fa fa-envelope-o"></i>support@gmail.com</a></span>
                            <ul>
                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
    </div>
    <!--Offcanvas menu area end-->
    
    <!--header area start-->
    <header class="header_area header_three">
        <!--header top start-->
        <div class="header_top">
            <div class="container-fluid">   
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-12">
                        <div class="welcome_text">
                           <ul>
                               <li><span>Giao hàng miễn phí:</span> Đối với những đơn hàng trên 1tr</li>
                              
                           </ul>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12">
    <div class="top_right text-right">
        <ul>
            <li class="top_links">
                <a href="#">
                    Tài Khoản<i class="ion-person"></i><i class="ion-chevron-down"></i>
                </a>
                <ul class="dropdown_links">
                    <?=$html_account;?>   
                </ul>
            </li> 
        </ul>
    </div>   
</div>

                </div>
            </div>
        </div>
        <!--header top start-->

        <!--header middel start-->
        <div class="header_middel">
            <div class="container-fluid">
                <div class="middel_inner">
                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            <div class="search_bar">
                                <form action="index.php?pg=sanpham" method="post">                          
                                    <input type="text" name="kyw" placeholder="Tìm kiếm sản phẩm..." >
                                    <button type="submit" name="timkiem" value="Tìm kiếm"><i class="ion-ios-search-strong"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4" >
                            <div class="logo" >
                                <a href="index.html"><img src="layout/assets/img/logo/T& T.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="cart_area">
                                <div class="cart_link">
                                    <a href="#"><i class="fa fa-shopping-basket"></i>Giỏ hàng</a>
                                    <!--mini cart-->
                                   
                                     <div class="mini_cart">
                                      <?=$html_cart;?>   
                                      <div class="cart_button view_cart">
                                        <a href="index.php?pg=viewcart">View Cart</a>
                                      </div>
                                      <div class="cart_button checkout">
                                        <a href="index.php?pg=mybill">Đơn hàng của tôi</a>
                                      </div>
                                    
                                </div>
                            </div>
                                    <!--mini cart end-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="horizontal_menu">
                    <div class="left_menu">
                        <div class="main_menu"> 
                            <nav>  
                                <ul>
                                    <li class="active"><a href="index.php?pg=trangchu">TRANG CHỦ<i class="fa fa-angle-down"></i></a>
                                    </li>
                                    <li class="mega_items"><a href="index.php?pg=sanpham">CỬA HÀNG <i class="fa fa-angle-down"></i></a> </li>
                                        <li class="banner_menu"><a href="#"><img src="layout/assets/img/bg/banner1.jpg" alt=""></a></li>
                                    </ul>
                                    </li>
                                    <li><a href="index.php?pg=gioithieu">GIỚI THIỆU<i class="fa fa-angle-down"></i></a>
                                    </li>
                                </ul> 
                            </nav> 
                        </div>
                    </div>
                    <div class="logo_container">
                        <a href="index.html"><img src="layout/assets/img/logo/logo.png" alt=""></a>
                    </div>
                    <!-- <div class="right_menu">
                        <div class="main_menu"> 
                            <nav>  
                                <ul>
                                    <li><a href="#">Specials</a></li>
                                    <li><a href="#">Sneaker</a></li>
                                    <li><a href="about.html">About us</a></li>
                                    <li><a href="contact.html">Contact Us</a></li>
                                </ul> 
                            </nav> 
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <!--header middel end-->

        <!--header bottom satrt-->
        <div class="header_bottom sticky-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="main_menu_inner">
                            <div class="main_menu"> 
                                <nav>  
                                    <ul>
                                        <li class="active"><a href="index.php?pg=trangchu">TRANG CHỦ</a></li>
                                        <li><a href="index.php?pg=sanpham">CỬA HÀNG</a></li>
                                        <li><a href="index.php?pg=gioithieu">GIỚI THIỆU</a></li>
                                        <li><a href="index.php?pg=checkout">THANH TOÁN</a></li>                                      
                                        <li><a href="index.php?pg=contact">LIÊN HỆ</a></li>
                                    </ul>   
                                </nav> 
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <!--header bottom end-->
    </header>
    <!--header area end-->
<!-- Plugins JS -->



