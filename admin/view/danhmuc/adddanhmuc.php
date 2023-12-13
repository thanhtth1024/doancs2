<div class="main-content">
    <h3 class="title-page">
        Thêm danh mục
    </h3>       
    <form class="addPro" action="index.php?pg=adddanhmuc" method="POST">
        <div class="form-group">
            <label for="name">Tên danh mục</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên danh mục">
        </div>
        <div class="form-group">
            <button type="submit" name="adddanhmuc" class="btn btn-primary">Thêm danh mục</button>
        </div>
    </form>
    </div>

<script>
    new DataTable('#example');
</script>