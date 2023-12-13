<?php
require_once 'pdo.php';
function danhmuc_insert($name){
    $sql = "INSERT INTO danhmuc(name) VALUES(?)";
    pdo_execute($sql, $name);
}
function update_danhmuc($name, $id) {
    global $pdo; // Sử dụng biến kết nối PDO đã khai báo trước đó

    try {
        // Chuẩn bị câu truy vấn SQL
        $sql = "UPDATE danhmuc SET name = :name WHERE id = :id";

        // Chuẩn bị và thực thi truy vấn
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Kiểm tra và trả về kết quả
        return $stmt->rowCount(); // Trả về số hàng bị ảnh hưởng bởi câu truy vấn UPDATE
    } catch(PDOException $e) {
        // Xử lý nếu có lỗi
        return false; // Hoặc có thể xử lý theo nhu cầu của bạn, ví dụ: throw $e; để hiển thị thông báo lỗi
    }
}


function danhmuc_delete($id){
    $sql = "DELETE FROM danhmuc WHERE id=?";
        pdo_execute($sql, $id);
}
function danhmuc_all(){
    $sql = "SELECT * FROM danhmuc ORDER BY stt DESC";
    return pdo_query($sql);
}
function showdm($dsdm){
    $html_dm='';
    foreach ($dsdm as $dm) {
        extract($dm);
        $link='index.php?pg=sanpham&iddm='.$id;
        // $html_dm.='<a href="'.$link.'">'.$name.'</a>';
        $html_dm.='<div class="widget_list widget_categories">
                    <ul>
                        <li><a href="'.$link.'">'.$name.'</a></li>
                    </ul>
                </div>';
    }
    return $html_dm;
}

function get_name_dm($id){
    $sql = "SELECT name FROM danhmuc WHERE id=".$id;
    $kq=pdo_query_one($sql);
    return $kq["name"];
}
// ===========ADMIN=====================
function showdm_admin($dsdm, $iddm){
    $html_dm='';
    foreach ($dsdm as $dm) {
        extract($dm);
        if($id === $iddm) {
          $s="selected";  
        } else {
          $s="";
        } 
        $link='index.php?pg=sanpham&iddm='.$id;
        $html_dm.='<option value="'.$id.'" '.$s.'>'.$name.'</option>';

    }
    return $html_dm;
}
function showdmuc_admin($dsdm){
    $html_dm='';
    $i = 1;
    if (!is_null($dsdm) && (is_array($dsdm) || is_object($dsdm))) {
        foreach ($dsdm as $dm) {
            extract($dm);
            $html_dm.='<tr>
                            <td>'.$i.'</td>
                            <td>'.$name.'</td>
                            <td>
    <a href="index.php?pg=formupdatedm&id='.$id.'" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>                                       
    <a href="index.php?pg=deldanhmuc&id='.$id.'" onclick="return confirm(\'Bạn có thật sự muốn xóa ?\');" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Xóa</a>                                      
</td>

                        </tr>';
            $i++;
        }
    } else {
        $html_dm = 'Dữ liệu danh mục không hợp lệ.';
    }

    return $html_dm;
}


