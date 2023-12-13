<?php
require_once 'pdo.php';

function  insert_sanpham($name, $img1, $tacgia, $nxb, $price, $price_sale, $mota, $iddm)
{
    $sql = "INSERT INTO sanpham(name, img, tacgia, nxb,  price, giagiam, mota, iddm) VALUES('$name', '$img1', '$tacgia', '$nxb',  '$price', '$price_sale', '$mota', '$iddm')";
    pdo_execute($sql);
}

function update_sanpham($name, $img1, $tacgia, $nxb, $price, $price_sale, $mota, $iddm, $id){
    $sql = "UPDATE sanpham SET name=?, img=?, tacgia=?, nxb=?, price=?, giagiam=?, mota=?, iddm=? WHERE id=?";
    
    if(empty($img1)){
        $sql = "UPDATE sanpham SET name=?,tacgia=?, nxb=?, price=?, giagiam=?, mota=?, iddm=? WHERE id=?";
        pdo_execute($sql, $name, $tacgia, $nxb, $price, $price_sale, $mota, $iddm, $id);
    } else {
        pdo_execute($sql, $name, $img1, $tacgia, $nxb, $price, $price_sale, $mota, $iddm, $id);
    }
}

function sanpham_delete($id){
    $sql = "DELETE FROM sanpham WHERE  id=?";
        pdo_execute($sql, $id);
}
function get_dssp_new($limi){
    $sql = "SELECT * FROM sanpham ORDER BY id DESC limit ".$limi;
    return pdo_query($sql);
}
// function get_dssp_home($iddm) {
//     $sql = "SELECT * FROM sanpham WHERE iddm=?";
//     $params = array($iddm);
//     return pdo_query_params($sql, $params);
// }

function get_dssp_best($limi){
    $sql = "SELECT * FROM sanpham WHERE bestseller = 1 ORDER BY id DESC limit ".$limi;
    return pdo_query($sql);
}
function get_dssp_view($limi){
    $sql = "SELECT * FROM sanpham ORDER BY view DESC limit ".$limi;
    return pdo_query($sql);
}
// function get_dssp($kyw,$iddm,$limi){
//     $sql = "SELECT * FROM sanpham WHERE 1";
//     if($iddm>0){
//         $sql .=" AND iddm=".$iddm;
//     }
//     if($kyw!=""){
//         $sql .=" AND name like '%".$kyw."%'";
//     }
//     $sql .= " ORDER BY id DESC limit ".$limi;
//     return pdo_query($sql);
// }
function hien_thi_so_trang($dssp,$soluongsp){
    $tongsanpham=count($dssp);
    $sotrang=ceil($tongsanpham/$soluongsp);
    $html_sotrang="";
    for ($i=1; $i <=$sotrang ; $i++) { 
        $html_sotrang.='<li><a href="index.php?pg=sanpham&page='.$i.'">'.$i.'</a></li>';
    }
    return $html_sotrang;
}
function get_dssp_all($filter = null){
    $sql = "SELECT * FROM sanpham ORDER BY id DESC";
    return pdo_query($sql);
}

function get_dssp_admin($kyw,$page,$soluongsp){
    
    $batdau=($page-1)*$soluongsp;
     
    $sql = "SELECT * FROM sanpham WHERE 1";
    if($kyw!=""){
        $sql .= " AND name like ?";
        $sql .= " ORDER BY id DESC";
        $sql .= " LIMIT ".$batdau.",".$soluongsp;
        return pdo_query($sql,"%".$kyw."%");
    }else{
        $sql .= " ORDER BY id DESC";
        $sql .= " LIMIT ".$batdau.",".$soluongsp;
        return pdo_query($sql);
    }
}

function get_sanpham_pt($kyw, $page, $iddm, $soluongsp, $minPrice = 0, $maxPrice = 5000000) {
    $batdau = ($page - 1) * $soluongsp;
    $sql = "SELECT * FROM sanpham WHERE 1";

    if ($iddm > 0) {
        $sql .= " AND iddm=" . $iddm;
    }

    if ($kyw != "") {
        $sql .= " AND name LIKE ?";
    }

    // Thêm điều kiện lọc theo giá
    $sql .= " AND price BETWEEN ? AND ?";
    $sql .= " ORDER BY id DESC";
    $sql .= " LIMIT " . $batdau . "," . $soluongsp;

    if ($kyw != "") {
        return pdo_query($sql, "%".$kyw."%", $minPrice, $maxPrice);
    } else {
        return pdo_query($sql, $minPrice, $maxPrice);
    }
}

// function get_sanpham_pt($kyw,$page,$iddm,$soluongsp){
    
//     $batdau=($page-1)*$soluongsp;
     
//     $sql = "SELECT * FROM sanpham WHERE 1";
//     if($iddm>0){
//         $sql .=" AND iddm=".$iddm;
//     }
//     if($kyw!=""){
//         $sql .= " AND name like ?";
//         $sql .= " ORDER BY id DESC";
//         $sql .= " LIMIT ".$batdau.",".$soluongsp;
//         return pdo_query($sql,"%".$kyw."%");
//     }else{
//         $sql .= " ORDER BY id DESC";
//         $sql .= " LIMIT ".$batdau.",".$soluongsp;
//         return pdo_query($sql);
//     }
// }

function get_sanphamchitiet($id){
    $sql = "SELECT * FROM sanpham WHERE id=?";
    return pdo_query_one($sql,$id);
}

function get_img($id){
    $sql = "SELECT img FROM sanpham WHERE id=?";
    $getimg = pdo_query_one($sql,$id);
    return $getimg['img'];
}

function get_dssp_lienquan($iddm,$id,$limi){
    $sql = "SELECT * FROM sanpham WHERE iddm=? AND id<>? ORDER BY id DESC limit ".$limi;
    return pdo_query($sql,$iddm,$id);
}

function get_iddm($id){
    $sql = "SELECT iddm FROM sanpham WHERE id=?";
    return pdo_query_value($sql,$id);
}

function showspp($dssp){
    $html_dssp='';
    foreach ($dssp as $sp) {
        extract($sp);
        $discount_percent = 0;
        if ($price > 0 && $giagiam > 0) {
            $discount_percent = (($price - $giagiam) / $price) * 100;
        }
        if($bestseller==1){
            $best='<div class="best"></div>';
        }else{
            $best='';
        }
        $html_dssp.='
                      <div class="col-lg-3">
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="index.php?pg=sanphamchitiet&id='.$id.'"><img src="uploads/'.$img.'" alt="'.$name.'"></a>
                               
                                <div class="quick_button">
                                    <a href="index.php?pg=sanphamchitiet&id='.$id.'" title="quick_view">Xem sản phẩm</a>
                                </div>
                                <div class="product_sale">
                                <span>'.number_format($discount_percent, 0).'%</span>
                                </div>
                              
                            </div>
                            <div class="product_content">
                                <h3><a href="index.php?pg=sanphamchitiet&id='.$id.'">'.$name.'</a></h3>
                                <span class="current_price">'.number_format($giagiam).' đ</span>
                               <span class="old_price">'.number_format($price).' đ</span>
                            </div>
                    
                        </div>
                    </div>';
    }
    return $html_dssp;
}
function showsp($dssp){
    $html_dssp='';
    foreach ($dssp as $sp) {
        extract($sp);
        $discount_percent = 0;
        if ($price > 0 && $giagiam > 0) {
            $discount_percent = (($price - $giagiam) / $price) * 100;
        }
        $html_dssp.=' <div class="col-lg-4 col-md-4 col-12 ">
                        <div class="single_product">
                            <div class="product_thumb">
                            <a class="primary_img" href="index.php?pg=sanphamchitiet&id='.$id.'"><img src="uploads/'.$img.'" alt="'.$name.'"></a>
                           

                                <div class="quick_button">
                                    <a href="index.php?pg=sanphamchitiet&id='.$id.'"title="quick_view">Xem sản phẩm</a>
                                </div>
                                <div class="double_base">
                                    <div class="product_sale">
                                        <span>'.number_format($discount_percent, 0).'%</span>
                                    </div>
                                    <div class="label_product">
                                        <span>sale</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="product_content grid_content">
                               <h3><a href="index.php?pg=sanphamchitiet&id='.$id.'">'.$name.'</a></h3>
                               <span class="current_price">'.number_format($giagiam).' đ</span>
                               <span class="old_price">'.number_format($price).' đ</span>
                            </div>    
                        </div>
                    </div>';
    }
    return $html_dssp;
}
function showsp_lienquan($dssp){
    $html_dssp='';
    foreach ($dssp as $sp) {
        extract($sp);
        $html_dssp.=' <div class="col-lg-3">
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="index.php?pg=sanphamchitiet"><img src="uploads/'.$img.'" alt=""></a>
                               
                                <div class="product_action">
                                    <div class="hover_action">
                                    <a  href="#"><i class="fa fa-plus"></i></a>
                                        <div class="action_button">
                                            <ul>

                                                <li><a title="add to cart" href="index.php?pg=cart"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a></li>
                                                <li><a href="wishlist.html" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>

                                                <li><a href="compare.html" title="Add to Compare"><i class="fa fa-sliders" aria-hidden="true"></i></a></li>

                                            </ul>
                                        </div>
                                </div>

                                </div>
                                <div class="quick_button">
                                    <a href="index.php?pg=sanphamchitiet&id='.$id.'" data-toggle="modal" data-target="#modal_box" title="quick_view">+ quick view</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <h3><a href="index.php?pg=sanphamchitiet&id='.$id.'">'.$name.'</a></h3>
                                <span class="current_price">'.number_format($giagiam).' đ</span>
                                <span class="old_price">'.number_format($price).' đ</span>
                            </div>
                        </div>
                    </div>';
    }
    return $html_dssp;
}
       // admin
function showsp_admin($dssp){
    $html_dssp='';
    $i = 1;
    foreach ($dssp as $sp) {
        extract($sp);
        $html_dssp.='<tr>
                        <td>'.$i.'</td>
                        <td><img src="'.IMG_PATH_ADMIN.$img.'" alt="'.$name.'" width="90"></td>
                        <td>'.$name.'</td>
                        <td>'.$tacgia.'</td>
                        <td>'.$nxb.'</td>
                        <td>'.$price.'</td>
                        <td>'.$giagiam.'</td>
                        <td>'.$view.'</td>
                        <td>'.$mota.'</td>
                        <td>
                            <a href="index.php?pg=sanphamupdate&id='.$id.'" class="btn btn-warning" ><i class="fa-solid fa-pen-to-square"></i> Sửa</a>
                            <a href="index.php?pg=delproduct&id='.$id.'" onclick="return confirm(\'Bạn có thật sự muốn xóa ?\');" class="btn btn-danger" ><i class="fa-solid fa-trash"></i> Xóa</a>
                        </td>
                    </tr>';
                    $i++;
        }
        return $html_dssp;
}

function san_pham_tang_so_luot_xem($id){
    $sql = "UPDATE sanpham SET view = view + 1 WHERE id=?";
    pdo_execute($sql, $id);
}

function san_pham_select_top10(){
    $sql = "SELECT * FROM sanpham WHERE view > 0 ORDER BY view DESC LIMIT 0, 8";
    return pdo_query($sql);
}
