
<div class="main-content">
                <h3 class="title-page">
                    Database người dùng
                </h3>
                <div class="d-flex justify-content-end">
                    <a href="" class="btn btn-primary mb-2">Thêm thành viên</a>
                </div>
                
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tài khoản</th>
                            <th>Điện thoại</th> 
                            <th>Địa chỉ</th>                      
                            <th>Email</th>
                            <th>Quyền hạn</th>
                            <th>Thao tác</th>                                                     
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $dsus = user_select_all();
                        echo showuser($dsus);
                    ?>
                   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        new DataTable('#example');
    </script>