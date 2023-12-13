<?php
require_once("banner.php")
?>
<?php
    $html_dssp_new=showspp($dssp_new);
    $html_dssp_best=showspp($dssp_best);
    $html_dssp_view=showspp($dssp_view);
    
?>

<!--product section area start-->
<section class="product_section womens_product">
        <div class="container">
            <div class="row">   
                <div class="col-12">
                   <div class="section_title">
                       <h2>Sản phẩm mới nhất</h2>
                   </div>
                </div> 
            </div>    
                 <div class="product_container">
                    <div class="row product_column4">
                    <?=$html_dssp_new;?> 
                    </div>
                </div> 
                
                <div class="row">   
                <div class="col-12">
                   <div class="section_title">
                       <h2>Bestseller</h2>
                   </div>
                </div> 
            </div>
                
            <div class="product_area"> 
                <div class="row">
                    
                    <div class="col-12">
                        <div class="product_tab_button">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a  data-toggle="tab" href="#clothing" role="tab" aria-controls="clothing" aria-selected="true">Hàng mới về</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#handbag" role="tab" aria-controls="handbag" aria-selected="false">Sản phẩm nhiều view</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#shoes" role="tab" aria-controls="shoes" aria-selected="false">Hàng bestseller</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                 <div class="tab-content">
                     <div class="tab-pane fade show active" id="clothing" role="tabpanel">
                            <div class="product_container">
                                <div class="row product_column4">
                                <?=$html_dssp_new;?> 
                                </div>
                            </div> 
                        </div> 
                      <div class="tab-pane fade show active" id="handbag" role="tabpanel">
                             <div class="product_container">
                                <div class="row product_column4">
                                    <?=$html_dssp_view;?> 
                                </div>
                                
                            </div>
                      </div>
                      
                        <div class="tab-pane fade" id="shoes" role="tabpanel">
                             <div class="product_container">
                                <div class="row product_column4">
                                    <?=$html_dssp_best;?>                             
                                </div>
                            </div>
                      </div>  
                </div>
            </div>
        </div>
    </section>
    <!--product section area end-->
    
    <!--banner area start-->
    <section class="banner_section banner_section_three">
        <div class="container-fluid">
            <div class="row ">
               <div class="col-lg-6 col-md-6">
                    <div class="banner_area">
                        <div class="banner_thumb">
                            <a href=""><img src="layout/assets/img/bg/sachtt.jpg" alt="#"></a>
                            <!-- <div class="banner_content">
                               <h1>Handbag <br> Men’s Collection</h1>
                                <a href="">Discover Now</a>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="banner_area">
                        <div class="banner_thumb">
                            <a href="index.php?pg=sanpham.php"><img src="layout/assets/img/bg/18.jpg" alt="#"></a>
                            <!-- <div class="banner_content">
                               <h1>Sneaker <br> Men’s Collection</h1>
                                <a href="index.php?pg=sanpham">Discover Now</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--banner area end-->
    
    <!--product section area start-->
    <section class="product_section womens_product bottom">
        <div class="container">
            <div class="row">   
                <div class="col-12">
                   <div class="section_title">
                       <h2>Sản phẩm thịnh hành</h2>
                       <p>Sản phẩm ấn tượng và bán chạy nhất</p>
                   </div>
                </div> 
            </div>    
            <div class="product_area"> 
                 <div class="row">
                    <div class="product_carousel product_three_column4 owl-carousel">
                    <?=$html_dssp_view;?>
                    </div>
                </div>
            </div>
               
        </div>
    </section>
    <?php
    include 'view/blog.php';
    ?>
    <!--product section area end-->
    <script src="layout/assets/js/main.js"></script>

    