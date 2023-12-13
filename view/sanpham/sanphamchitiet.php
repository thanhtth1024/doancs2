<?php
   $html_sp_lienquan=showsp_lienquan($dssp_lienquan);
   extract($spchitiet);
?>
<?php
    $discount_percent = 0;
    if ($price > 0 && $giagiam > 0) {
        $discount_percent = (($price - $giagiam) / $price) * 100;
    }
?>
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area product_bread">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.php?pg=trangchu">home</a></li>
                            <li>/</li>
                            <li><?=$name;?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
    <!--product details start-->
    <div class="product_details">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5">
                   <div class="product-details-tab">

                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1" src="uploads/<?=$img?>" data-zoom-image="uploads/<?=$img?>" alt="big-1">
                            </a>
                        </div>

                        
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="product_d_right">
                       <form action="index.php?pg=addcart" method="post">
                           
                            <h1><?=$name?></h1>
                            <div class=" product_ratting">
                                <ul>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li class="review"><a href="#"> 1 review </a></li>
                                </ul>
                            </div>
                            <div class="product_price">
                                <span class="current_price"><?=number_format($giagiam)?> đ</span>
                                <span class="old_price"><?=number_format($price)?> đ</span>   
                            </div>
                            <div class="discount_percent">
                                <?php if ($discount_percent > 0) : ?>
                                    Giảm <?= number_format($discount_percent, 0) ?>%
                                <?php else : ?>
                                    Không có giảm giá
                                <?php endif; ?>
                            </div>
                            <div class="product_desc" style=" padding-top: 20px; color: #212529;">
                            <h5>Tác Giả: <?=$tacgia?></h5>
                             
                            <h5>Nhà Xuất Bản: <?=$nxb?></h5>
                              
                            </div>
                            <input type="hidden" name="idpro" value="<?=$id?>">
                            <input type="hidden" name="name" value="<?=$name?>">
                                <input type="hidden" name="img" value="<?=$img?>">
                                <input type="hidden" name="price" value="<?=number_format($price)?>">
                            
                            <div class="product_variant quantity">
                                <label>Số Lượng</label>
                                <input min="1" max="20" name="soluong" value="1" type="number">
                                <button class="button" type="submit" name="addcart">Thêm Vào Giỏ Hàng</button>  
                            </div>
                        </form>
                        <div class="priduct_social">
                            <h3>Chia Sẻ:</h3>
                            <ul>
                                <li><a href="#"><i class="fa fa-rss"></i></a></li>           
                                <li><a href="#"><i class="fa fa-vimeo"></i></a></li>           
                                <li><a href="#"><i class="fa fa-tumblr"></i></a></li>           
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>        
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>        
                            </ul>      
                        </div>
                          <h4>Miễn phí vận chuyển toàn quốc cho đơn hàng trên 1tr.</h4>
                          <h4>Giao nhanh 2h trong nội thành Đà Nẵng.</h4>
                          <h4>Thời gian vận chuyển trung bình 3-4 ngày.</h4>
                          <div class="form" style="border: 4px dotted #333; text-align: center;">
                          
                            <h5>ĐỊA CHỈ: Trường CNTT và TT Việt Hàn</h5>
                            <h5>PHONE: 0793572609</h5>
                          </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <!--product details end-->
    <div class="product_d_info">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="product_d_inner">   
                        <div class="product_info_button">    
                            <ul class="nav" role="tablist">
                                <li >
                                    <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Thông tin</a>
                                </li>
                                <li>
                                     <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Mô tả sản phẩm</a>
                                </li>
                                <li>
                                   <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Đánh giá</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel" >
                                <div class="product_info_content">
                                   <p>Từng Trang Sách Là Một Chuyến Phiêu Lưu Mới</p>
                                </div>    
                            </div>

                            <div class="tab-pane fade" id="sheet" role="tabpanel" >
                                <div class="product_info_content">
                                   <p><?=$mota;?></p>
                                </div> 
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" >
                                <div id="binhluan">
                                    <iframe src="view/binhluan.php?idpro=<?=$id?>" width="100%" height="500px" frameborder="0"></iframe>
                                </div>
                                <!-- <div class="product_review_form">
                                    
                                    <form action="index.phpindex.php?pg=comment" method="post">
                                        <h2>Thêm đánh giá</h2>
                                        <div class="row">
                                        <div class="col-lg-12 ">
                                                <label for="author">Tên</label>
                                                <input name="username" id="author" type="text">
                                            </div>  
                                            <div class="col-lg-12">
                                                <label for="review_comment">Nhập đánh giá của bạn</label>
                                                <textarea name="comment" id="review_comment" ></textarea>
                                            </div>   
                                        </div>
                                        <button type="submit" name="gui">Gửi</button>
                                     </form>   
                                </div>   -->
                                    
                            </div>
                           
                        </div>
                    </div>     
                </div>
            </div>
        </div>    
    </div>  
     <!--product section area start-->
     <section class="product_section related_product">
        <div class="container">
            <div class="row">   
                <div class="col-12">
                   <div class="section_title">
                       <h2>Sản phẩm cùng loại</h2>
                   </div>
                </div> 
            </div>    
            <div class="product_area"> 
                 <div class="row">
                    <div class="product_carousel product_three_column4 owl-carousel">
                        <?=$html_sp_lienquan;?>
                    </div>
                </div>
            </div>
               
        </div>
    </section>
    <!--product section area end-->

<!-- Main JS -->
<script src="layout/assets/js/main.js"></script>
