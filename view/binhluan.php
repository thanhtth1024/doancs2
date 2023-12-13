<link rel="stylesheet" href="../layout/assets/css/main.css">
<?php
session_start();
include "../model/pdo.php";
include "../model/binhluan.php";
if(isset($_GET['idpro'])) {
    $idpro=$_GET['idpro'];
 }
 if(isset($_POST['guibinhluan'])) {
    $idpro=$_POST['idpro'];
    $noidung=$_POST['noidung'];
    $ngaybl=date('d/m/Y');
    $user = '';
    $iduser=$_SESSION['s_user']['id'];
    $user=$_SESSION['s_user']['ten'];
    insert_binhluan($iduser, $user, $idpro, $noidung, $ngaybl);
 }
$dsbl=binhluan_select_all();
$html_bl="";
    foreach ($dsbl as $bl) {
       extract($bl);
       $html_bl.='<div class="dsbl">
                       <h4>'.$name.'</h4>
                       <p>'.$noidung.'</p> 
                   </div>';
    }
?>
<?php
if(isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)) {

?> 
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
      <input type="hidden" name="idpro" value="idpro">
      <h3>Nhập đánh giá </h3>
      <textarea name="noidung" id="" cols="100%" rows="5"></textarea> <br> <br>
      <button type="submit" name="guibinhluan">Gửi đánh giá</button>
</form>
<?php
} else {
    $_SESSION['trang']="sanphamchitiet";
    $_SESSION['idpro']=$_GET['idpro'];
    echo "<a href='../index.php?pg=dangnhap' target='_parent'>Bạn phải đăng nhập mới có thể bình luận</a>";
}
?>
<div class="dsbl">
     <?php echo $html_bl; ?>
</div>


