<?php
require_once 'pdo.php';

function insert_binhluan($iduser, $user, $idpro, $noidung, $ngaybl)
{
    $sql = "INSERT INTO binhluan(iduser, name, idpro, noidung, ngaybl) VALUES('$iduser', '$user', '$idpro', '$noidung', '$ngaybl')";
    pdo_execute($sql);
}
function binhluan_select_all(){
    $sql = "SELECT * FROM binhluan ORDER BY id DESC";
    return pdo_query($sql);
}

// function binhluan_delete($ma_bl){
//     $sql = "DELETE FROM binhluan WHERE ma_bl=?";
//     if(is_array($ma_bl)){
//         foreach ($ma_bl as $ma) {
//             pdo_execute($sql, $ma);
//         }
//     }
//     else{
//         pdo_execute($sql, $ma_bl);
//     }
// }
function binhluan_select_by_id($id){
    $sql = "SELECT * FROM binhluan WHERE id=?";
    return pdo_query($sql, $id);
}

// function binhluan_select_by_hang_hoa($id){
//     $sql = "SELECT b.*, h.name FROM comments b JOIN sanpham h ON h.id=b.id_cm WHERE b.id_cm=? ORDER BY created_at DESC";
//     return pdo_query($sql, $id);
// }

// function binhluan_update($ma_bl, $ma_kh, $ma_hh, $noi_dung, $ngay_bl){
//     $sql = "UPDATE binhluan SET ma_kh=?,ma_hh=?,noi_dung=?,ngay_bl=? WHERE ma_bl=?";
//     pdo_execute($sql, $ma_kh, $ma_hh, $noi_dung, $ngay_bl, $ma_bl);
// }





// function binhluan_exist($ma_bl){
//     $sql = "SELECT count(*) FROM binhluan WHERE ma_bl=?";
//     return pdo_query_value($sql, $ma_bl) > 0;
// }
//-------------------------------//
