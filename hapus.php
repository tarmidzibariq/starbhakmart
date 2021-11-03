<?php
include 'koneksi.php';
if (isset($_GET['id'])) {
    header('Location: index.php');
}
$id = $_GET['id']; 

$sql    = "DELETE FROM stockbarang WHERE id='$id'";
$query  = mysqli_query($connect, $sql);

if ($query){
    echo "<script> alert(' Data Berhasil Di Hapus')</script>";
    
    echo "<meta http-equiv='refresh' content='1;url=input.php'>";
}else{
    header('Location: hapus.php?status=gagal');
}

?>