<?php
    if(isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)){
      extract($_SESSION['s_user']);
      $userinfo=get_user($id);
      $_SESSION['s_user']=$userinfo;
      extract($userinfo);
    }
?>
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
    <section class="containerfull">
        <div class="container">
            <div class="boxleft mr2pt menutrai">
                <h3>DÀNH CHO BẠN</h3><br><br>
                <a href="index.php?pg=myaccount">Cập nhật thông tin</a>
                <a href="index.php?pg=donhang_confirm">Lịch sử mua hàng</a>
                <a href="index.php?pg=logout">Thoát hệ thống</a>
            </div>
            <div class="boxright">
                <h3>THÔNG TIN ĐĂNG KÝ ĐÃ ĐƯỢC CẬP NHẬT</h3><br>
                <div class="containerfull mr30">
                     <div class="row">
                        <div class="col-25">
                           <label for="username">Tên đăng nhập:</label>
                        </div>
                        <div class="col-75">
                           <?=$username?>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-25">
                           <label for="email">Tên người dùng:</label>
                        </div>
                        <div class="col-75">
                           <?=$ten?>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-25">
                           <label for="email">Email:</label>
                        </div>
                        <div class="col-75">
                           <?=$email?>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-25">
                           <label for="email">Địa chỉ:</label>
                        </div>
                        <div class="col-75">
                           <?=$diachi?>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-25">
                           <label for="email">Điện thoại:</label>
                        </div>
                        <div class="col-75">
                           <?=$dienthoai?>
                        </div>
                     </div>      
                     <br>
                </div>
            </div>
        </div>
    </section>