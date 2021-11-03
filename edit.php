<?php
include 'koneksi.php';
if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stock = $_POST['stock'];
    $gambar = $_POST['gambar'];   

    $sql = "UPDATE stockbarang SET nama_produk='$nama', harga='$harga', stock='$stock', gambar='$gambar' WHERE id='$id'";
    $query =mysqli_query($connect,$sql);
    if ($query) {
    header('Location: input.php');
    }else{
    header('location: edit.php?status=gagal');
    }
}
?>