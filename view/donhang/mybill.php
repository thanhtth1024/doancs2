<?php

    $user_id = $_SESSION['s_user']['id']; 
    
    $orders = get_orders_by_user_id($user_id);

    $order_html = showdonhang_user($orders); 

?>
<div class="main-content">
            <h3 class="title-page">
                Đơn đặt hàng của tôi
            </h3>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã đơn hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Địa chỉ</th>
                        <th>Tổng tiền</th>
                        <th>Tình trạng</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                    echo $order_html;
                   ?>
                </tbody>
            </table>
        </div>
    </div>
</div>