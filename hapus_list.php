<?php
include 'koneksi.php';
session_start();
$id = $_GET["id"];
    unset($_SESSION['keranjang'][$id]);

    // echo "<script>alert('List Produk Telah Dihapus')</script>";
    echo "<script>location='index.php'</script>";