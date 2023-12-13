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

.pages.checkout {
    padding: 60px 0;
}

.main-input {
    background-color: #fff;
    padding: 30px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.log-title h3 {
    color: #333;
}

.custom-input input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

.submit-text button {
    background-color: #4caf50;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

.cart-form-text table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.cart-form-text th, .cart-form-text td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.cart-form-text tfoot {
    font-weight: bold;
    border-top: 2px solid #333;
}

@media screen and (max-width: 768px) {
    .col-sm-6 {
        width: 100%;
        margin-bottom: 20px;
    }
}
.boxcart{
    border:1px #ccc solid;
    padding: 10px;
    margin-bottom: 20px;
}
.qr-code {
    display: none;
	text-align: center;
}
</style>
<?php
$html_cart = checkout();
?>
<!-- pages-title-start -->
<div class="pages-title section-padding">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="pages-title-text text-center">
					<h2>Thanh Toán</h2>
					<ul class="text-left">
						<li><a href="?pg=trangchu">Trang chủ</a></li>
						<li><span> // </span>Thanh Toán</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- pages-title-end -->
<!-- Checkout content section start -->
<section class="pages checkout section-padding">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<div class="padding60">
					<div class="log-title">
						<h3><strong>Hóa đơn</strong></h3>
					</div>
					<div class="cart-form-text pay-details table-responsive">
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
			<div class="col-sm-6">
				<div class="main-input single-cart-form padding60">
					<div class="log-title">
						<h3><strong>Thông tin người đặt hàng</strong></h3>
					</div>
					<div class="custom-input">
						<form action="index.php?pg=checkout" method="post">
							Họ tên
							<input type="text" name="nguoidat" placeholder="Người nhận" required value="<?=$ten?>"/>
							Email
							<input type="email" name="email" placeholder="Địa chỉ Email.." required  value="<?=$email?>"/>
							Số điện thoại
							<input type="text" name="sdt" placeholder="Số điện thoại.." required pattern="[0-9]+" minlength="10"  value="<?=$dienthoai?>"/>
							Địa chỉ giao hàng
							<input type="text" name="diachi" placeholder="Địa chỉ giao hàng" required/>
							<div class="pttt">
								<div class="boxcart">
								<h4>Phương thức thanh toán</h4>
								<input type="radio" name="pttt" value="1" id="" require> Thanh toán tại nhà<br>
								<input type="radio" name="pttt" value="2" id=""> Thanh toán online<br>
								</div>
							</div>
							<div class="qr-code">
								<h4>Tiến hành quét mã QR để thanh toán</h4>
								<img src="https://tse4.mm.bing.net/th?id=OIP.IDLrcDjBSmAuBTQbkLrewQAAAA&pid=Api&P=0&h=220" alt="QR Code for Online Payment">
							</div>
							<hr>
							<div class="submit-text">
								<button type="submit" name="thanhtoan">Thanh toán</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Checkout content section end -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const onlinePayment = document.querySelector('input[value="2"]');
    const cashOnDelivery = document.querySelector('input[value="1"]');
    const qrCodeDiv = document.querySelector('.qr-code');

    onlinePayment.addEventListener('change', function() {
        if (onlinePayment.checked) {
            qrCodeDiv.style.display = 'block'; // Hiển thị mã QR khi chọn thanh toán online
        } else {
            qrCodeDiv.style.display = 'none'; // Ẩn mã QR nếu không chọn thanh toán online
        }
    });

    cashOnDelivery.addEventListener('change', function() {
        if (cashOnDelivery.checked) {
            qrCodeDiv.style.display = 'none'; // Ẩn mã QR khi chọn thanh toán tại nhà
        }
    });
});

</script>