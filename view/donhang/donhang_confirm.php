<?php
$html_cart = donhang_confirm();
?>
<style>

   .pages-title {
    background-color: #f4f4f4;
    padding: 20px 0;
  }
  .pages-title h2 {
    color: #333;
  }
  .pages-title-text ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }
  .pages-title-text ul li {
    display: inline-block;
    margin-right: 5px;
    font-size: 14px;
  }
  .pages-title-text ul li a {
    text-decoration: none;
    color: #777;
  }
  
  .order-complete {
    padding-top: 50px;
    padding-bottom: 50px;
    background-color: #fff;
  }
  .complete-title {
    margin-bottom: 30px;
  }
  .complete-title p {
    font-size: 18px;
    color: #333;
  }
  .complete-title p:nth-child(2) {
    font-weight: bold;
  }
  
  .cart-form-text table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }
  .cart-form-text th,
  .cart-form-text td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }
  .cart-form-text thead th {
    font-weight: bold;
    color: #e60b0b;
  }
.cart-form-text table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    border: 2px solid #ccc; 
}

.cart-form-text th,
.cart-form-text td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}


.cart-form-text thead th {
    font-weight: bold;
    color: #333;
    border-bottom: 2px solid #ccc;
}

</style>
<!-- pages-title-start -->
<div class="pages-title section-padding">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="pages-title-text text-center">
					<h3>HOÀN THÀNH ĐƠN HÀNG</h3>
					<ul class="text-left">
						<li><a href="index.php?act=home">Trang chủ</a></li>
						<li><span> // </span>HOÀN THÀNH ĐƠN HÀNG</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- pages-title-end -->
<!-- order-complete content section start -->
<section class="pages checkout order-complete section-padding">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 text-center">
				<div class="complete-title">
					<p>Cảm ơn bạn đã đặt hàng. Đơn đặt hàng của bạn đã được nhận.</p>
					<p>Vui Lòng Chờ Xét Duyệt</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<div class="padding60">
					<div class="log-title">
						<h3><strong>ĐƠN ĐẶT HÀNG CỦA BẠN</strong></h3>
					</div>
					<div class="cart-form-text pay-details">
						<table>
							<thead>
                                <tr>
									<th>Sản phẩm</th>
									<td>Thành Tiền</td>
								</tr>
							</thead>
                            <?=$html_cart;?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- order-complete content section end -->