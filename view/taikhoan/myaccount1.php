<style>
body, h1, h2, h3, p, ul, li {
    margin: 0;
    padding: 0;
}

.containerfull {
    width: 100%;
    background-color: #f2f2f2; 
    padding: 20px;
}

.container {
    max-width: 1200px; 
    margin: 0 auto; 
    overflow: hidden;
}

.boxleft {
    float: left;
    width: 25%;
}

.mr2pt {
    margin-right: 2%;
}

.menutrai a {
    display: block;
    padding: 10px 0;
    text-decoration: none;
    color: #333; 
}

.menutrai a:hover {
    background-color: #ddd; 
}

.boxright {
    float: left;
    width: 70%;
}

form {
    display: block;
}

.row {
    margin-bottom: 15px;
}

.col-25 {
    float: left;
    width: 25%;
}

.col-75 {
    float: left;
    width: 75%;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0 15px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4caf50; 
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049; /* Set your desired background color for the submit button on hover */
}

</style>
<?php
    if(isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)){
      extract($_SESSION['s_user']);
    }
?>
<div class="containerfull">
        <div class="bgbanner"><h3>Tài khoản của tôi</h3></div>
    </div>

    <section class="containerfull">
        <div class="container">
            <div class="boxleft mr2pt menutrai">
                <h4>Dành cho bạn</h4><br>
                <a href="index.php?pg=myaccount">Cập nhật thông tin</a>
                <a href="index.php?pg=donhang_confirm">Lịch sử mua hàng</a>
                <a href="index.php?pg=logout">Thoát hệ thống</a>
            </div>
            <div class="boxright">
                <h4>Thông tin cá nhân</h4><br>
                <div class="containerfull mr30">
                <form action="index.php?pg=updateuser" method="post">
                     <div class="row">
                        <div class="col-25">
                           <label for="username">Tên đăng nhập</label>
                        </div>
                        <div class="col-75">
                           <input type="text" id="username" value="<?=$username?>" name="username" placeholder="Nhập tên đi">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-25">
                           <label for="password">Mật khẩu</label>
                        </div>
                        <div class="col-75">
                           <input type="password" id="password" value="<?=$password?>" name="password" placeholder="Nhập mật khẩu..">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-25">
                           <label for="fullname">Tên người dùng</label>
                        </div>
                        <div class="col-75">
                           <input type="text" id="fullname" value="<?=$ten?>" name="fullname" placeholder="Nhập họ và tên..">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-25">
                           <label for="email">Email</label>
                        </div>
                        <div class="col-75">
                           <input type="text" id="email" value="<?=$email?>" name="email" placeholder="Nhập email..">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-25">
                           <label for="email">Địa chỉ</label>
                        </div>
                        <div class="col-75">
                           <input type="text" id="diachi" value="<?=$diachi?>" name="diachi" placeholder="Nhập địa chỉ..">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-25">
                           <label for="email">Điện thoại</label>
                        </div>
                        <div class="col-75">
                           <input type="text" id="dienthoai" value="<?=$dienthoai?>" name="dienthoai" placeholder="Nhập số điện thoại..">
                        </div>
                     </div>
                     <br>
                     <div class="row">
                        <input type="hidden" name="id" value="<?=$id?>">
                        <input type="submit" name="capnhat" value="Cập nhật">
                     </div>
                     </form>
                </div>
            </div>


        </div>
    </section>