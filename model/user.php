<?php
function user_insert($username, $password,$fullname,$address, $email, $sdt, $role){
    $sql = "INSERT INTO user(username, password,ten,diachi, email,dienthoai, role) VALUES (?, ?, ?, ?,?,?,?)";
    pdo_execute($sql,$username, $password,$fullname,$address, $email,$sdt,$role);
}

function user_update($username, $password, $email, $fullname, $diachi, $dienthoai, $id) {
    $sql = "UPDATE user SET username=?, password=?, email=?, ten=?, diachi=?, dienthoai=? WHERE id=?";
    pdo_execute($sql, $username, $password, $email, $fullname, $diachi, $dienthoai, $id);    
}

function checkuser($username,$password){
    $sql="Select * from user where username=? and password=?";
    return pdo_query_one($sql, $username,$password);
}
function get_user($id){
    $sql="Select * from user where id=? ";
    return pdo_query_one($sql, $id);
}

function update_user($name, $pass, $sdt, $email, $maquyen, $id){
    $sql = "UPDATE user SET username=?,password=?,email=?,diachi=?,dienthoai=?,role=? WHERE id=?";
    pdo_execute($sql,$name,$pass,$sdt,$email,$maquyen,$id);    
}

function user_delete($id){
    $sql = "DELETE FROM user  WHERE id=?";
        pdo_execute($sql, $id);
}

function user_select_all(){
    $sql = "SELECT * FROM user";
    return pdo_query($sql);
}
function showuser($dsus){
    $html_dsus = '';
    $i = 1;
    foreach ($dsus as $user) {
        extract($user);

        $html_dsus .= '<tr>
                            <td>' . $i . '</td>
                            <td>' . $username . '</td>
                            <td>' . $dienthoai. '</td>
                            <td>' . $diachi. '</td>
                            <td>' . $email . '</td>
                            <td>';
        if ($role == 2) {
            $html_dsus .= 'Quản trị viên';
        } else {
            $html_dsus .= 'Khách hàng';
        }
        $html_dsus .= '</td>
                            <td>
                                <a href="index.php?pg=updateuserr&id=' . $id . '" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>                                       
                                <a href="index.php?pg=deluser&id=' . $id . '" onclick="return confirm(\'Bạn có thật sự muốn xóa ?\');" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Xóa</a>

                            </td>
                        </tr>';
        $i++;
    }
    return $html_dsus;
}
function showuser_home($dsuser){
    $html_dsuser = '';
    $i = 1;
    foreach ($dsuser as $user) {
        extract($user);

        $html_dsuser .= '<tr>
                            <td>' . $i . '</td>
                            <td>' . $ten . '</td>
                        </tr>';
    
        $i++;
    }
    return $html_dsuser;
}
function get_listuser($id){
    $sql = "SELECT * FROM user WHERE id=?";
    return pdo_query_one($sql,$id);
}

// function user_select_by_id($ma_kh){
//     $sql = "SELECT * FROM user WHERE ma_kh=?";
//     return pdo_query_one($sql, $ma_kh);
// }

// function user_exist($ma_kh){
//     $sql = "SELECT count(*) FROM user WHERE $ma_kh=?";
//     return pdo_query_value($sql, $ma_kh) > 0;
// }

// function user_select_by_role($vai_tro){
//     $sql = "SELECT * FROM user WHERE vai_tro=?";
//     return pdo_query($sql, $vai_tro);
// }

// function user_change_password($ma_kh, $mat_khau_moi){
//     $sql = "UPDATE user SET mat_khau=? WHERE ma_kh=?";
//     pdo_execute($sql, $mat_khau_moi, $ma_kh);
// }
