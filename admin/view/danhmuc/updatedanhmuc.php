<?php
$conn = new mysqli("localhost", "root", "", "doancs2");

// Kiểm tra xem có ID thể loại được truyền từ URL không
if (isset($_GET['id'])) {
    $id_theloai = $_GET['id'];

    // Truy vấn để lấy thông tin thể loại dựa trên ID
    $sql = "SELECT * FROM danhmuc WHERE id = $id_theloai";
    $query = mysqli_query($conn, $sql);
    $theloai = mysqli_fetch_assoc($query);
}
?>

<div class="main-content">
    <h3 class="title-page">
        Sửa danh mục
    </h3>
    <form class="addPro" action="index.php?pg=updatedm" method="POST">
        <div class="form-group">
            <input type="hidden" name="idtheloai" value="<?php echo isset($theloai['id']) ? $theloai['id'] : ''; ?>">
            <label for="name">Tên danh mục mới</label>
            <input type="text" class="form-control" name="tendanhmuc" id="name" placeholder="<?php echo isset($theloai['name']) ? $theloai['name'] : ''; ?>">
        </div>
        <div class="form-group">
            <button type="submit" name="updatedanhmucc" class="btn btn-primary">Cập nhật danh mục</button>
        </div>
    </form>
</div>

<script>
    new DataTable('#example');
</script>
