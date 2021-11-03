<?php
    include 'koneksi.php';
    if (isset($_POST['simpan'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama_produk'];
        $harga = $_POST['harga'];
        $stock = $_POST['stock'];
        $gambar = $_POST['gambar'];
        $sql = "INSERT INTO stockbarang (id,nama_produk,harga,stock,gambar) 
        VALUES ('$id','$nama','$harga','$stock','$gambar')";
        $query = mysqli_query($connect, $sql);

        if ($query){
            header('Location: input.php');
        }else{
            header('location: simpan.php?status=gagal');
        }
    }
?>