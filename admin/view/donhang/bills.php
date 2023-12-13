<div class="main-content">
            <h3 class="title-page">
                Quản lí đơn hàng
            </h3>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã đơn hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Tổng tiền</th>
                        <th>Phương thức thanh toán</th>
                        <th>Tình trạng</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $dsdh = donhang_select_all();
                    echo showdonhang_admin($dsdh);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    <script src="assets/js/main.js"></script>
    <script>
        new DataTable('#example');
    </script>