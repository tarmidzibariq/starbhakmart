<?php
    include 'koneksi.php';
    if (isset($_POST['bayar'])) {
        $id = $_POST['id'];
        $nama_pembeli = $_POST['nama_pembeli'];
        $nama_produk = $_POST['nama_produk'];
        $quantity = $_POST['quantity'];
        $harga_awal = $_POST['harga_awal'];
        $diskon = $_POST['diskon'];
        $pajak = $_POST['pajak'];
        $total_harga = $_POST['total_harga'];
        unset($_SESSION['keranjang']);

        $sql = "INSERT INTO tbl_payment (nama_pembeli,nama_produk,quantity,harga_awal,diskon,pajak,total_harga) VALUES ('$nama_pembeli','$nama_produk','$quantity','$harga_awal','$diskon','$pajak','$total_harga')";
        $query = mysqli_query($connect, $sql);
        
        $sql = "INSERT INTO keranjang (id_barang,nama_produk,quantity) VALUES ('$id','$nama_produk','$quantity')";
        $query = mysqli_query($connect, $sql);
        if ($query){
            header('Location: payment.php');
        }else{
            header('location: simpanpayment.php?status=gagal');
        }
}
?>
