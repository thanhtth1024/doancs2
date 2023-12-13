<?php
$dsdm = array();
$html_danhmuclist = showdm_admin($danhmuclist, $dsdm);
?>
<script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>

<div class="main-content">
    <h3 class="title-page">
        Thêm sản phẩm
    </h3>
                
    <form class="addPro" action="index.php?pg=addproduct" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputFile">Ảnh sản phẩm 1</label>
            <div class="custom-file">
                <input type="file" name="img" class="custom-file-input" id="exampleInputFile">
            </div>
       
        </div>
        <div class="form-group">
            <label for="name">Tên sản phẩm:</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên sản phẩm">
        </div>
        <div class="form-group">
            <label for="name">Tác Giả:</label>
            <input type="text" class="form-control" name="tacgia" id="name" placeholder="Nhập tên tác giả">
        </div>
        <div class="form-group">
            <label for="name">Nhà Xuất Bản:</label>
            <input type="text" class="form-control" name="nxb" id="name" placeholder="Nhập tên nhà xuất bản">
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
                <input type="text" name="price" id="price" class="form-control" placeholder="Nhập giá gốc">
            </div>
        </div>
        <div class="form-group">
            <label for="price_sale">Giá khuyến mãi:</label>
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text">$</span>
                </div>
                <input type="text" name="price_sale" id="price_sale" class="form-control"placeholder="Giá khuyến mãi"> 
            </div>
        </div>
        <div class="form-group">
            <label>Mô tả chi tiết</label>
            <textarea class="form-control" name="mota" id="editor" cols="15" rows="10"
            placeholder="Nhập 1 đoạn mô tả chi tiết về sản phẩm"></textarea>               
        </div>
        <div class="form-group">
            <button type="submit" name="addproduct" class="btn btn-primary">Thêm sản phẩm</button>
        </div>
    </form>
    </div>

<script>
    new DataTable('#example');
</script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
