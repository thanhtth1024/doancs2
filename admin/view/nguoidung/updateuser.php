<?php
if (isset($user) && is_array($user) && count($user) > 0) {
    extract($user);
    $idupdate = $id;
} else {
    echo "Invalid user data.";
    exit;
}
?>
<div class="main-content">
    <h3 class="title-page">
        Cập nhật tài khoản
    </h3>
                
    <form class="addPro" action="index.php?pg=updateuser" method="POST">
        <div class="form-group">
            <label for="name">Tên tài khoản</label>
            <input type="text" class="form-control" name="username" value="<?=($username!="")?$username:"";?>" id="name">
        </div>
        <div class="form-group">
            <label for="name">Password</label>
            <input type="password" class="form-control" name="pass" value="<?=$password?>" id="pass">
        </div>
        <div class="form-group">
            <label for="price">Số điện thoại</label>
            <div class="input-group mb-3">
                <input type="text" name="sdt" value="<?=$dienthoai?>" id="sdt" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="price_sale">Địa chỉ</label>
            <div class="input-group mb-3">
                <input type="text" name="address" value="<?=$diachi?>" id="address" class="form-control"> 
            </div>
        </div>
        <div class="form-group">
            <label for="price_sale">Email</label>
            <div class="input-group mb-3">
                <input type="text" name="email" value="<?=$email?>" id="email" class="form-control"> 
            </div>
        </div>
        <div class="form-group">
            <label for="categories">Mã quyền</label>
            <select class="form-select" name="maquyen" aria-label="Default select example"> 
                <option <?= ($role == '1')?'selected':''?> value="1"> Khách hàng</option>
                <option <?= ($role == '2')?'selected':''?> value="2"> Quản trị viên</option>
            </select>
        </div>
        <div class="form-group">
            <input type="hidden" name="id" value="<?=$idupdate?>">
            <button type="submit" name="updateuser" class="btn btn-primary">Cập nhật</button>
        </div>
    </form>
    </div>

<script>
    new DataTable('#example');
</script>