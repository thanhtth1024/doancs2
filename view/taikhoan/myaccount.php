
<!--breadcrumbs area start-->
<div class="breadcrumbs_area other_bread">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="?pg=trangchu">Home</a></li>
                            <li>/</li>
                            <li>Cập nhật tài khoản</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    <!-- customer login start -->
    <div class="customer_login">
        <div class="container">
            <div class="row">
               <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>Thông tin cá nhân của bạn</h2>
                        <form action="" method="post">
                             <p>   
                                <label>Tên đăng nhập<span>*</span></label>
                                <input type="text" name="username" value="<?=$username?>" required>
                             </p>
                             <p>   
                                <label>Tên khách hàng<span>*</span></label>
                                <input type="text" name="fullname" value="<?=$ten?>" required>
                             </p>
                             <p>   
                                <label>Địa chỉ<span>*</span></label>
                                <input type="text" name="address" value="<?=$diachi?>" required>
                             </p>
                             <p>   
                                <label>Email<span>*</span></label>
                                <input type="text" name="email" value="<?=$email?>" required>
                             </p>
                             <p>   
                                <label>Số điện thoại<span>*</span></label>
                                <input type="text" name="sdt" value="<?=$dienthoai?>" required>
                             </p>
                        </form>
                     </div>    
                </div>
                <!--login area start-->

                <!--register area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form register">
                        <h2>Cập nhật thông tin cá nhân</h2>
                        <form action="?pg=updateuser" method="post">
                            <?php
                            if(isset($_SESSION['success_mess']) && $_SESSION['success_mess'] != "") {
                                echo '<h4 class="success-mess">' . $_SESSION['success_mess'] . '</h4>';
                                unset($_SESSION['success_mess']);
                            }
                            ?>
                        
                            <p>   
                                <label>Tên đăng nhập<span>*</span></label>
                                <input type="text" name="username" value="<?=$username?>" required>
                             </p>
                             <p>   
                                <label>Mật khẩu<span>*</span></label>
                                <input type="password" name="password" value="<?=$password?>" required>
                             </p>
                             <p>   
                                <label>Tên khách hàng<span>*</span></label>
                                <input type="text" name="fullname" value="<?=$ten?>" required>
                             </p>
                             <p>   
                                <label>Địa chỉ<span>*</span></label>
                                <input type="text" name="diachi" value="<?=$diachi?>" required>
                             </p>
                             <p>   
                                <label>Email<span>*</span></label>
                                <input type="text" name="email" value="<?=$email?>" required>
                             </p>
                             <p>   
                                <label>Số điện thoại<span>*</span></label>
                                <input type="text" name="dienthoai" value="<?=$dienthoai?>" required>
                             </p>
                            <div class="login_submit">
                            <input type="hidden" name="id" value="<?=$id?>">
                            <input type="submit" name="capnhat" value="Cập nhật">
                            </div>
                        </form>
                    </div>    
                </div>
                <!--register area end-->
            </div>
        </div>    
    </div>
    <!-- customer login end -->
    
