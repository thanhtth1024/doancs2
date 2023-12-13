<?php
function bill_insert_id($madh, $iduser, $ten, $email, $sdt, $diachi, $total, $ship, $tongtt, $pttt){
    $sql = "INSERT INTO bill(madh, iduser,  nguoidat_ten, nguoidat_email, nguoidat_tel, nguoidat_diachi, total, ship, tongthanhtoan, pttt) VALUES (?, ?, ?, ?, ?, ? ,?, ?, ?, ?)";
    return pdo_execute_and_get_lastInsertId($sql, $madh, $iduser, $ten, $email, $sdt, $diachi, $total, $ship, $tongtt, $pttt);
}
function donhang_select_all(){
    $sql = "SELECT * FROM bill";
    return pdo_query($sql);
}

function get_orders_by_user_id($user_id) {
    $sql = "SELECT * FROM bill WHERE id=?";
    return pdo_query($sql, $user_id);
}

function get_ttdh($n) {
    switch ($n) {
        case '1':
            $tt="Đơn hàng mới";
            break;
        case '2':
            $tt="Đang xử lý";
            break;
        case '3':
            $tt="Đã giao hàng";
            break;
        case '4':
            $tt="Hủy";
            break;
        default:
            $tt="Đơn hàng mới";
            break;
    }
}
function updateStatus($id, $status) {
    $sql = "UPDATE bill SET status=? WHERE id=?";
    pdo_execute($sql,$status,$id);   
}

function donhang_detail_select_id($id) {
    $sql = "SELECT * FROM cart WHERE id = ?";
    $result = pdo_query_one($sql, $id);
    return $result;
}
function donhang_delete($id){
    $sql = "DELETE FROM bill  WHERE id=?";
        pdo_execute($sql, $id);
}
function donhang_detail_admin($dhdt){
    $html_dsdh = '';
    $i = 1;
    foreach ($dhdt as $cart) {
        extract($cart);
        $html_dsdh .= '<tr>
                            <td>' . $i . '</td>
                            <td>' . $name . '</td> 
                            <td>' . $price. '</td>
                            <td>' . $soluong. '</td>
                            <td>'.number_format($tongthanhtoan, 0, '.', ',').' đ</td>
                            <td>
                            <a href="index.php?pg=detail&id=' . $id . '" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Xem đh</a>                                       
                            <a href="index.php?pg=deldh&id=' . $id . '" onclick="return confirm(\'Bạn có thật sự muốn xóa ?\');" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Xóa</a>
                        </tr>';
        $i++;
    }
    return $html_dsdh;
}
function showdonhang_admin($dsdh){
    $html_dsdh = '';
    $i = 1;
    foreach ($dsdh as $bill) {
        extract($bill);

        $html_dsdh .= '<tr>
                            <td>' . $i . '</td>
                            <td>' . $madh . '</td>
                            <td>' . $nguoidat_ten. '</td>
                            <td>' . $nguoidat_email. '</td>
                            <td>' . $nguoidat_diachi . '</td>
                            <td>'.number_format($tongthanhtoan, 0, '.', ',').' đ</td>
                            <td>';
        $html_dsdh .= '<form action="index.php?pg=select" method="POST">
                            <input type="hidden" name="id" value="' . $id . '"/>
                            <select name="status" onchange="this.form.submit()">
                                <option value="0" ' . ($status == '0' ? 'selected' : '') . '>Chưa xác nhận</option>
                                <option value="1" ' . ($status == '1' ? 'selected' : '') . '>Đã vận chuyển</option>
                                <option value="2" ' . ($status == '2' ? 'selected' : '') . '>Đã nhận hàng</option>
                                <option value="3" ' . ($status == '3' ? 'selected' : '') . '>Đã hủy</option>
                            </select>
                        </form>';

        $html_dsdh .= '</td>
                            <td>
                                <a href="index.php?pg=detail&id=' . $id . '" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Xem đh</a>                                       
                                <a href="index.php?pg=deldh&id=' . $id . '" onclick="return confirm(\'Bạn có thật sự muốn xóa ?\');" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Xóa</a>
                            </td>
                        </tr>';
        $i++;
    }
    return $html_dsdh;
}
function showdonhang_user($dsdh){
    $html_dsdh = '';
    $i = 1;
    foreach ($dsdh as $bill) {
        extract($bill);

        $status_text = '';
        switch ($status) {
            case 0:
                $status_text = 'Chờ xét duyệt';
                break;
            case 1:
                $status_text = 'Đã vận chuyển';
                break;
            case 2:
                $status_text = 'Đã nhận hàng';
                break;
            case 3:
                $status_text = 'Hủy';
                break;
            default:
                $status_text = 'Không xác định';
                break;
        }

        $html_dsdh .= '<tr>
                            <td>' . $i . '</td>
                            <td>' . $madh . '</td>
                            <td>' . $nguoidat_ten. '</td>
                            <td>' . $nguoidat_diachi . '</td>
                            <td>'.number_format($tongthanhtoan, 0, '.', ',').' đ</td>
                            <td>' . $status_text . '</td>
                        </tr>';
        $i++;
    }
    return $html_dsdh;
}

function showdh_home_admin($dsdh){
    $html_dsdh = '';
    $i = 1;
    foreach ($dsdh as $bill) {
        extract($bill);

        $html_dsdh .= '<tr>
                            <td>' . $i . '</td>
                            <td>' . $madh . '</td>
                            <td>'.number_format($tongthanhtoan, 0, '.', ',').' đ</td>
                        </tr>';
    
        $i++;
    }
    return $html_dsdh;
}
function donhang_confirm(){
    $html_cart='';
    $totalPrice = 0;
     
    foreach ($_SESSION['giohang'] as $sp) {
        extract($sp);
        $price = floatval(str_replace(',', '', $sp['price']));
        $soluong = $sp['soluong'];
        $subtotal = $price * $soluong;
        $totalPrice+=$subtotal;
        $vanchuyen = 15000;
        $tong=$totalPrice+$vanchuyen; 
       $html_cart .= '<tbody>
                    <tr>
                        <td>'.$name.'</td>
                        <td>'.number_format($subtotal, 0, '.', ',').'</td>
                        
                    </tr>
                    </tbody>
                  ';
           }   
             
        $html_cart .= ' <tfoot>
                            <th>Vận chuyển</th>
							<td>'.number_format($vanchuyen).'đ</td>
                            <tr>
                                <th>Tổng</th>
                                <td>'.number_format($tong).' đ</td>
                            </tr>
                        </tfoot>';
    
    return $html_cart;
}

?>