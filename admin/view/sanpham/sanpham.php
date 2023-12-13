<?php
$html_sanphamlist = showsp_admin($sanphamlist);
?>
<div class="main-content">
          <h3 class="title-page">Sản phẩm</h3>
          <div class="d-flex justify-content-end">
            <a href="index.php?pg=sanphamadd" class="btn btn-primary mb-2">Thêm sản phẩm</a>
          </div>
          <div class="d-flex justify-content-start">
            <form action="index.php?pg=sanphamlist" method="post">
                <input type="text" name="kyw">
                <button type="submit" name="timkiem">Tìm kiếm</button>
            </form>
          </div>
          
          <table id="example" class="table table-striped" style="width: 100%">
            <thead>
              <tr>
                <th>STT</th>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Tác Giả</th>
                <th>Nhà Xuất Bản</th>
                <th>Giá</th>
                <th>Giá giảm</th>
                <th>Lượt xem</th>
                <th>Mô tả</th>
                <th>Thao tác</th>
              </tr>
            </thead>
            <tbody>
              <?=$html_sanphamlist;?>
            </tbody>
          </table>
          <div class="phantrang">
            <ul>
               <?php
            echo $hienthisotrang;
            ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <script src="layout/layout/assets/js/main.js"></script>
    <script>
      new DataTable("#example");
    </script>