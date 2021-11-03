<?php
include 'koneksi.php';
if (isset($_GET['id'])) {
    header('Location: payment.php');
}
$id = $_GET['id']; 

$sql    = "DELETE FROM tbl_payment WHERE id='$id'";
$query  = mysqli_query($connect, $sql);

if ($query){
    echo "<script> alert(' Data Berhasil Di Hapus')</script>";
    
    echo "<meta http-equiv='refresh' content='1;url=payment.php'>";
}else{
    header('Location: hapus.php?status=gagal');
}

?>