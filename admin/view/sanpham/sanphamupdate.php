<?php
if(is_array($sp)&&(count($sp)>0)) {
    extract($sp);
    $idupdate = $id;
    $imgpath = IMG_PATH_ADMIN.$img;
    if(is_file($imgpath)) {
        $img = '<img src="'.$imgpath.'" width = "80">';
    } else {
        $img="";
    }
} 
$html_danhmuclist = showdm_admin($danhmuclist,$iddm);
?>
<div class="main-content">
    <h3 class="title-page">
        Cập nhật sản phẩm
    </h3>
                
    <form class="addPro" action="index.php?pg=updateproduct" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputFile">Ảnh sản phẩm 1</label>
            <div class="custom-file">
                <input type="file" name="img" class="custom-file-input" id="exampleInputFile">
                <?=$img?>
            </div>
            
        <div class="form-group">
            <label for="name">Tên sản phẩm:</label>
            <input type="text" class="form-control" name="name" value="<?=($name!="")?$name:"";?>" id="name" placeholder="Nhập tên sản phẩm">
        </div>
        <div class="form-group">
            <label for="name">Tác Giả:</label>
            <input type="text" class="form-control" name="tacgia" value="<?=($tacgia!="")?$tacgia:"";?>" id="tacgia" placeholder="Nhập tên tác giả">
        </div>
        <div class="form-group">
            <label for="name">Nhà Xuất Bản:</label>
            <input type="text" class="form-control" name="nxb" value="<?=($nxb!="")?$nxb:"";?>" id="nxb" placeholder="Nhập tên nhà xuất bản">
        </div>
        <div class="form-group">
            <label for="categories">Danh mục:</label>
            <select class="form-select" name="iddanhmuc" aria-label="Default select example">
                <option selected>Chọn danh mục</option>
                <?=$html_danhmuclist;?>
            </select>
        </div>
        <div class="form-group">
            <label for="price">Giá gốc:</label>
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text">$</span>
                </div>
                <input type="text" name="price" value="<?=($name>0)?$price:0;?>" id="price" class="form-control" placeholder="Nhập giá gốc">
            </div>
        </div>
        <div class="form-group">
            <label for="price_sale">Giá khuyến mãi:</label>
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text">$</span>
                </div>
                <input type="text" name="price_sale" value="<?=($name>0)?$giagiam:0;?>" id="price_sale" class="form-control"placeholder="Giá khuyến mãi"> 
            </div>
        </div>
        <div class="form-group">
    <label>Mô tả chi tiết</label>
    <textarea class="form-control" name="mota" id="editor" rows="3" placeholder="Nhập 1 đoạn mô tả chi tiết về sản phẩm" style="height: 78px;">
        <?= ($mota != "") ? $mota : ""; ?>
    </textarea>
</div>

        <div class="form-group">
            <input type="hidden" name="id" value="<?=$idupdate?>">
            <button type="submit" name="updateproduct" class="btn btn-primary">Cập nhật sản phẩm</button>
        </div>
    </form>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
    <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

<script>
    new DataTable('#example');
</script>