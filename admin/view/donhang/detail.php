<div class="main-content">
            <h3 class="title-page">
                Đơn hàng chi tiết
            </h3>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $id = $_GET['id'];
                    $dhdt = donhang_detail_select_id($id);
                    echo donhang_detail_admin($dhdt);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    <script src="layout/layout/assets/js/main.js"></script>
    <script>
        new DataTable('#example');
    </script>