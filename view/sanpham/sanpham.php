<?php
    $html_dm=showdm($dsdm);
    $html_dssp=showsp($dssp);
    $data_tong = count(get_dssp_new(100));
?>
 <!--breadcrumbs area start-->

 <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="?pg=trangchu">Trang chủ</a></li>
                            <li>//</li>
                            <li>Cửa Hàng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
   
    <!--shop  area start-->
    <div class="shop_area shop_reverse">
        <div class="container">
            <div class="shop_inner_area" style="margin: 0;">
                <div class="row">
                    <div class="col-lg-3 col-md-12">
                       <!--sidebar widget start-->
                        <div class="sidebar_widget">
                        <div class="widget_list widget_filter">
                            <h2>Filter by price</h2>
                            <form action="index.php?pg=sanpham" method="GET"> 
                                <div id="slider-range"></div>   
                                <button type="submit">Filter</button>
                                <input type="text" name="amount" id="amount"/>
                            </form> 
                        </div>
                          
                            <div class="widget_list widget_categories">
                            <h2>Danh mục sản phẩm</h2>  
                               <?=$html_dm;?> 
                            </div>
                        </div>
                        <!--sidebar widget end-->
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <!--shop wrapper start-->
                        <!--shop toolbar start-->
                        <div class="shop_title">
                            <?php
                            if($titlepage!="") $title=$titlepage;
                            else $title="T&T Book Store";
                            ?>
                            <h1><?=$title;?></h1>
                        </div>
                        <div class="shop_toolbar_wrapper">
                            <div class="shop_toolbar_btn">

                                <button data-role="grid_3" type="button" class="active btn-grid-3" data-toggle="tooltip" title="3"></button>

                                <button data-role="grid_4" type="button"  class=" btn-grid-4" data-toggle="tooltip" title="4"></button>

                                <button data-role="grid_5" type="button"  class="btn-grid-5" data-toggle="tooltip" title="5"></button>

                                <button data-role="grid_list" type="button"  class="btn-list" data-toggle="tooltip" title="List"></button>
                            </div>
                            
                            <div class="page_amount">
                                <p>Số sản phẩm <?= $data_tong?></p>
                            </div>
                        </div>
                         <!--shop toolbar end-->
                        
                         <div class="row shop_wrapper">
                         <?=$html_dssp;?>
                        </div>
                        <div class="shop_toolbar t_bottom">
                            <div class="pagination">
                                <ul>
                                        <?php
                                        echo $hienthisotrang;
                                        ?> 
                                </ul>
                            </div>
                        </div>
                        <!--shop toolbar end-->
                    </div>
                </div>
            </div>   
                
        </div>
    </div>
    
    <!--shop  area end-->
<!-- Main JS -->
<script src="layout/assets/js/main.js"></script>
