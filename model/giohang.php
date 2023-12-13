<?php
function cart_insert($order_id, $idpro, $soluong, $price){
    $sql = "INSERT INTO cart(order_id, idpro, soluong, price) VALUES (?, ?, ?, ?)";
    pdo_execute($sql, $order_id, $idpro, $soluong, $price);
}
function viewcart(){    
    $html_cart='';
    $i=1;
    $totalPrice = 0;
    foreach ($_SESSION['giohang'] as $name => $sp) {
        extract($sp);
        $price = floatval(str_replace(',', '', $sp['price']));
        $soluong = $sp['soluong'];
        $subtotal = $price * $soluong;
       
        $html_cart .= '
        <tr>
            <td>'.$i.'</td>
            <td><img src="uploads/'.$img.'" alt="" style="width:100px"></td>
            <td>'.$name.'</td>
            <td>'.$soluong.'</td>
            <td>'.number_format($price).'</td>
            <td>'.number_format($subtotal, 0, '.', ',').'</td>
            <td><a href="?pg=viewcart&del='.$idpro.'">Xóa</a></td>
        </tr>';
    
                $i++;
    } 
    return $html_cart;
}

function minicart() {
    $html_cart = '';
    $grand_total = 0;
    foreach ($_SESSION['giohang'] as $sp) {
        extract($sp);
            $price = floatval(str_replace(',', '', $sp['price']));
            $soluong = $sp['soluong'];
            $total = $price * $soluong;
        $html_cart .= '
            <div class="cart_item top">
                <div class="cart_img">
                    <a href="#"><img src="uploads/' . $img . '" alt=""></a>
                </div>
                <div class="cart_info">
                    <a href="#">' . $name . '</a>
                    <span>' . $soluong . 'x ' . number_format($price). ' đ</span>
                </div>
            </div>';
        $grand_total += $total;
    }

    $html_cart .= '<div class="cart__table">
                     <table>
                         <tbody>
                             <tr>
                                 <td class="text-left">Tổng cộng</td>
                                 <td class="text-right">' .number_format($grand_total, 0, '.', ','). ' đ</td>
                             </tr>
                         </tbody>
                     </table>
                 </div>';

    return $html_cart;
}
function checkout(){
    $html_cart='';
    $totalPrice = 0;
    foreach ($_SESSION['giohang'] as $sp) {
        extract($sp);
        $price = floatval(str_replace(',', '', $sp['price']));
        $soluong = $sp['soluong'];
        $subtotal = $price * $soluong;
        $totalPrice+=$subtotal;
        $vanchuyen=15000;
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
function get_tongdonhang(){
    $totalPrice = 0;
    foreach ($_SESSION['giohang'] as $sp) {
        extract($sp);
        $price = floatval(str_replace(',', '', $sp['price']));
        $soluong = $sp['soluong'];
        $subtotal = $price * $soluong;
        $totalPrice += $subtotal;
    }
    return number_format($totalPrice);
}
?>
