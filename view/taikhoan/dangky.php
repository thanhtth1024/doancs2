<style>
       
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
        background-color: #45a049;
    }
    
</style>
    <section class="containerfull">
        <div class="container">
            <div class="boxleft mr2pt menutrai">
                <h3>DÀNH CHO BẠN</h3><br><br>
                <a href="#">Cập nhật thông tin</a>
                <a href="#">Lịch sử mua hàng</a>
                <a href="#">Thoát hệ thống</a>
            </div>
            <div class="boxright">
                <h3>ĐĂNG KÝ</h3><br>
                <div class="containerfull mr30">
                <form action="index.php?pg=adduser" method="post">
                     <div class="row">
                        <div class="col-25">
                           <label for="username">Tên đăng nhập</label>
                        </div>
                        <div class="col-75">
                           <input type="text" id="username" name="username" placeholder="Nhập username...">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-25">
                           <label for="password">Mật khẩu</label>
                        </div>
                        <div class="col-75">
                           <input type="password" id="password" name="password" placeholder="Nhập mật khẩu..">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-25">
                           <label for="repassword">Nhập lại mật khẩu</label>
                        </div>
                        <div class="col-75">
                           <input type="password" id="repassword" name="repassword" placeholder="Nhập lại mật khẩu..">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-25">
                           <label for="fullname">Họ và tên</label>
                        </div>
                        <div class="col-75">
                           <input type="text" id="fullname" name="fullname" placeholder="Nhập họ và tên...">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-25">
                           <label for="address">Địa chỉ</label>
                        </div>
                        <div class="col-75">
                           <input type="text" id="address" name="address" placeholder="Nhập địa chỉ...">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-25">
                           <label for="email">Email</label>
                        </div>
                        <div class="col-75">
                           <input type="text" id="email" name="email" placeholder="Nhập email..">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-25">
                           <label for="sdt">Số điện thoại</label>
                        </div>
                        <div class="col-75">
                           <input type="text" id="sdt" name="sdt" placeholder="Nhập số điện thoại..">
                        </div>
                     </div>
                     <br>
                     <div class="row">
                        <input type="submit" name="dangky" value="Đăng ký">
                     </div>
                     </form>
                    
                </div>
            </div>


        </div>
    </section>