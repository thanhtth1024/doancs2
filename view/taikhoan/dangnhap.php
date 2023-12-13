
<!--breadcrumbs area start-->
<div class="breadcrumbs_area other_bread">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="?pg=trangchu">home</a></li>
                            <li>/</li>
                            <li>sign</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    <h3 style="color:red; text-align: center;">
        <?php
                if(isset($_SESSION['tb_dangnhap'])&&($_SESSION['tb_dangnhap']!="")){
                    echo $_SESSION['tb_dangnhap'];
                    unset($_SESSION['tb_dangnhap']);
                } 
        ?>
        </h3>
    <!-- customer login start -->
    <div class="customer_login">
        <div class="container">
            <div class="row">
               <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>Khách hàng đã đăng ký</h2>
                        <form action="?pg=login" method="post">
                            <p>Nếu bạn đã có tài khoản, vui lòng đăng nhập!</p>
                            <p>   
                                <label>Tài khoản<span>*</span></label>
                                <input type="text" name="username" required>
                             </p>
                             <p>   
                                <label>Mật khẩu<span>*</span></label>
                                <input type="password" name="password" required>
                             </p>   
                            <div class="login_submit">
                               <a href="index.php?pg=myaccount">Lost your password?</a>
                                <!-- <label for="remember">
                                    <input id="remember" type="checkbox">
                                    Remember me
                                </label> -->
                                <input type="submit" name="dangnhap" value="Đăng nhập">
                                <!-- <button type="submit" name="dangnhap">Đăng nhập</button> -->
                            </div>
                        </form>
                     </div>    
                </div>
                <!--login area start-->

                <!--register area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form register">
                        <h2>Khách hàng mới</h2>
                        <form action="?pg=adduser" method="post">
                            <?php
                            if(isset($_SESSION['success_message']) && $_SESSION['success_message'] != "") {
                                echo '<h4 class="success-message">' . $_SESSION['success_message'] . '</h4>';
                                unset($_SESSION['success_message']);
                            }                            
                            ?>
                            <p>   
                                <label>Tên đăng nhập<span>*</span></label>
                                <input type="text" name="username" required>
                             </p>
                             <p>   
                                <label>Mật khẩu<span>*</span></label>
                                <input type="password" name="password" required>
                             </p>
                             <p>   
                                <label>Nhập lại mật khẩu<span>*</span></label>
                                <input type="password" name="repassword" required>
                             </p>
                             <p>   
                                <label>Họ và tên<span>*</span></label>
                                <input type="text" name="fullname" required>
                             </p>
                             <p>   
                                <label>Địa chỉ<span>*</span></label>
                                <input type="text" name="address" required>
                             </p>
                             <p>   
                                <label>Email<span>*</span></label>
                                <input type="text" name="email" required>
                             </p>
                             <p>   
                                <label>Số điện thoại<span>*</span></label>
                                <input type="text" name="sdt" required>
                             </p>
                            <div class="login_submit">
                              <input type="submit" name="dangky" value="Đăng ký">
                            </div>
                        </form>
                    </div>    
                </div>
                <!--register area end-->
            </div>
        </div>    
    </div>
    <!-- customer login end -->
    
