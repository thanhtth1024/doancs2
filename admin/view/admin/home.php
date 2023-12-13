
<div class="main-content">
        <h3 class="title-page">
            Bảng thống kê
        </h3>
        <section class="statistics row">
            <div class="col-sm-12 col-md-6 col-xl-3">
                <a href="products.html">
                    <div class="card mb-3 widget-chart">
                        <div class="widget-subheading fsize-1 pt-2 opacity-10 text-warning font-weight-bold">
                            <h5>
                                Tổng sản phẩm
                            </h5>
                        </div>
                        <span class="widget-numbers">
                        <?php
                            $productCount = count(get_dssp_new(100));
                            echo $productCount;
                        ?>
                        </span>
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-3">
                <a href="user.html">
                    <div class="card mb-3 widget-chart">

                        <div class="widget-subheading fsize-1 pt-2 opacity-10 text-warning font-weight-bold">
                            <h5>
                                Tổng thành viên
                            </h5>
                        </div>
                        <span class="widget-numbers">
                            <?php
                                $userCount = count(user_select_all());
                                echo $userCount;
                            ?>
                        </span>
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-3">
                <a href="caterogies.html">
                    <div class="card mb-3 widget-chart">
                        <div class="widget-subheading fsize-1 pt-2 opacity-10 text-warning font-weight-bold">
                            <h5>
                                Tổng danh mục
                            </h5>
                        </div>
                        <span class="widget-numbers">
                            <?php
                                $categoryCount = count(danhmuc_all());
                                echo $categoryCount;
                            ?>
                        </span>
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-3">
                <a href="#">
                    <div class="card mb-3 widget-chart">
                        <div class="widget-subheading fsize-1 pt-2 opacity-10 text-warning font-weight-bold">
                            <h5>
                                Tổng đơn hàng
                            </h5>
                        </div>
                        <?php
                            $dhCount = count(donhang_select_all());
                            echo $dhCount;
                        ?>
                    </div>
                </a>
            </div>
        </section>
        <section class="row">
            <div class="col-sm-12 col-md-6 col xl-6">
                <div class="card chart">
                    <p>Tổng doanh thu: <span>
                    
                    </span></p>
                    <table class="revenue table table-hover">
                        <thead>
                            <th>STT</th>
                            <th>Mã đơn hàng</th>
                            <th>Doanh thu</th>
                        </thead>
                        <tbody>
                           <?php
                                $dsdh = donhang_select_all();
                                echo showdh_home_admin($dsdh);
                           ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-3">
                <div class="card chart">
                    <h4>Đơn hàng mới</h4>
                    <table class="revenue table table-hover">
                        <thead>
                            <th>Mã đơn hàng</th>
                            <th>Trạng thái</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>GIA001</td>
                                <td>Chờ duyệt</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-3">
                <div class="card chart">
                    <h4>Khách hàng</h4>
                    <table class="revenue table table-hover">
                        <thead>
                            <th>STT</th>
                            <th>Tên người dùng</th>
                        </thead>
                        <tbody>
                            <?php
                                $dsuser = user_select_all();
                                echo showuser_home($dsuser);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        </div>
    </div>
</div>
    <script src="layout/layout/assets/js/main.js"></script>
<script>
    new DataTable('#example');
</script>