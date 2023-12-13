<?php
   $html_cart=viewcart();
?>
<!--breadcrumbs area start-->
<div class="breadcrumbs_area other_bread">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="?pg=trangchu">Trang Chủ</a></li>
                            <li>/</li>
                            <li>Giỏ Hàng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
    <!-- shopping cart area start -->
    <div class="shopping_cart_area">
        <div class="container">  
            <form action="#"> 
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product_remove">STT</th>
                                            <th class="product_thumb">Hình ảnh</th>
                                            <th class="product_name">Tên sản phẩm</th>
                                            <th class="product_quantity">Số lượng</th>
                                            <th class="product_unitprice">Đơn giá</th>
                                            <th class="product_total">Thành tiền</th>
                                            <th class="product_total">Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?=$html_cart;?>
                                    </tbody>
                                </table>  
                            </div>  
                            <div class="cart_submit">
                                <button type="submit"><a href="?pg=viewcart&del=all">Xóa rỗng đơn hàng</a> </button>
                            </div>      
                        </div>
                    </div>
                </div>
                
                <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code left">
                                <h3>Coupon</h3>
                                <div class="coupon_inner"> 
                                    <p>Nhập mã voucher</p>  
                                   <form action="index.php?pg=viewcart&voucher=1" method="post">
                                        <input type="hidden" name="tongdonhang" value="<?=$tongdonhang?>">
                                        <input type="text" name="mavoucher" placeholder="Nhập voucher">
                                        <button type="submit">Áp mã</button>
                                    </form>              
                                </div>    
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code right">
                                <h3>Đơn hàng</h3>
                                <div class="coupon_inner">
                                   <div class="cart_subtotal">
                                       <p>Tổng giỏ hàng:</p>
                                       <p class="cart_amount"><?= number_format($tongdonhang)?> đ</p>
                                   </div>
                                   <div class="cart_subtotal">
                                       <p>Vận chuyển</p>
                                       <p class="cart_amount"><?= number_format($phivanchuyen)?> đ</p>
                                   </div>
                                   <div class="cart_subtotal">
                                       <p>VAT</p>
                                       <p class="cart_amount">0</p>
                                   </div>
                                   <div class="cart_subtotal">
                                       <p>Tổng tiền thanh toán: </p>
                                       <p class="cart_amount"><?=number_format($thanhtoan)?> đ</p>
                                   </div>
                                   <div class="checkout_btn">
                                       <a href="?pg=checkout">Thanh toán</a>
                                   </div>
                                   <hr>
                                   <div class="checkout_btn">
                                       <a href="?pg=sanpham">Tiếp tục đặt hàng</a>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area end-->
            </form> 
        </div>     
    </div>
    <!-- shopping cart area end -->
