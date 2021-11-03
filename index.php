<?php
session_start();
include 'koneksi.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- style css -->
    <link rel="stylesheet" href="style.css">

    <!-- font roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@700&display=swap" rel="stylesheet">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <title>INDEX</title>
</head>

<body>
    <!-- nav -->

    <nav class="navbar navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand ms-3" href="#">Starbhak Mart</a>
            <div class="nav-right">
                <a class="navbar-brand ms-3 " href="index.php">HOME</a>
                <a class="navbar-brand ms-3 " href="input.php">ADMIN</a>
                <a class="navbar-brand ms-3 " href="payment.php">KERANJANG</a>
            </div>
        </div>
    </nav>

    <!-- tutup nav -->

    <!-- isi -->
    <div class="row">
        <div class="col-md-3">
            <div class="judul text-center mt-2 ms-2">
                <p class="pt-2 text-white ">
                    <marquee>Take Away | Shop Colection | Sale 10%</marquee>
                </p>
            </div>
            <div class="judul-2 mt-2 ms-2 text-center">
                <p class="pt-2 text-white"><i class="fas fa-user "></i> Mang.Jay</p>
            </div>
            <div class="card ms-2 mt-2">
                <div class="card-body">

                    <?php  
                        $discount = 0; 
                        $totalharga = 0; 
                        $pajak = 0; 
                        $tax = 0; 
                     $harga = 0; 
                     $disc = '';
                     $dis =0;
                     $total =0;
                     $semua =0;
                    
                    ?>
                    <?php foreach ($_SESSION['keranjang'] as $id => $jumlah) : ?>
                    <?php 
                        $sql = mysqli_query($connect, "SELECT * FROM stockbarang WHERE id='$id'");
                        $pecah = $sql->fetch_assoc();
                        $idpr = $pecah['id'];
                        $supharga = $pecah['harga'] * $jumlah;
                        $namaprod = $pecah['nama_produk'];
                        ?>
                    <div class="text-card bg-light p-2 mb-3">
                        <p><?php echo $pecah['nama_produk'] ?><span class="float-end fw-bold number-card" id="hrg">Rp.
                                <?php echo number_format($supharga) ?></span></p>

                        <p class="fw-light">Unit Price: <span class="fw-bold number-card mt-3">Rp.
                                <?php echo number_format($pecah['harga']) ?></span>
                            Quantity: <span class="float-end fw-bold"><?php echo $jumlah ?></span></p>
                        <button type="button" class="btn fs-4"><a href="hapus_list.php?id=<?php echo $id ?>"><i
                                    class="fas fa-trash"></i></a></button>
                    </div>

                    <?php 
                   $discount += $supharga ;
                   $pajak += $supharga ;
                   $semua = $supharga;
                   $totalharga += $semua;
                  
                  
                //   yang paling atas yang paling tinggi
                //   okok
                // kalo salah bilang riq gua close ya TMV OKE NUR TQTQ
                //   ini misal harga di atas 150 rb discont  60% 
                   if ($totalharga >= 250000 ) {
                    $disc = '10%';
                         // 60%
                    $tax += $totalharga * 0.1; 
                    $dis  += 10 * $totalharga / 100 ;
                    $total = $totalharga - $dis + $tax;
                    
                    //   ini misal harga di atas 100 rb discont 50% 
                } else{
                    $disc = '0%';
                         // 60%
                    $tax += $totalharga * 0.1; 
                    $total = $totalharga + $tax;
                }
             ?>



                    <?php endforeach ?>
                </div>
            </div>
            <table width="100%" class="ms-2">
                <tbody>
                    <tr>
                        <td>Seluruh Harga</td>
                        <td>Rp. <?php echo number_format($totalharga)?><span id="discount"></span></td>
                    </tr>
                    <tr>
                        <td>Discont (<?= $disc ?>) </td>
                        <td>Rp. <?php echo number_format($dis)?><span id="discount"></span></td>
                    </tr>
                    <tr>
                        <td>PPN</td>
                        <td>Rp. <?php echo ($tax)?><span id="pajak"></span></td>
                    </tr>
                    <tr class="background text-white">
                        <td>Total Bayar</td>
                        <td>Rp. <?php echo number_format($total)?><span id="totalbayar"></span></td>
                    </tr>
                </tbody>
            </table>
            <button class="btn  ms-2 mt-3 button-simpan text-white" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop">Payment</button>

        </div>
        <div class="col-md-9">
            <div class="judullist bg-light  font  mt-2 pt-2"><span class="ps-2">Item List</span> <span
                    class="float-end  pe-3"> <i class="fas fa-search "></i> <i class="fas fa-ellipsis-v"></i></span>
            </div>
            <div class="list-items mt-2 ">
                <?php
                    $id = mysqli_query($connect,'SELECT * FROM stockbarang ORDER BY stockbarang.id');
                    while ($prdk = mysqli_fetch_array($id)){
                        $idp = $prdk['id'];
                ?>
                <div class="list-card mt-3 ms-3 float-start">
                    <img src="<?php echo $prdk['gambar'] ?>" alt="" class="mt-2 ">
                    <p class="text-1 text-center fw-bold"><?php echo $prdk['nama_produk'] ?></p>
                    <p class="text-2 text-center ">Rp. <?php echo number_format($prdk['harga']) ?></p>
                    <a href="beli.php?id=<?php echo $prdk['id']; ?>"><button
                            class="btn  text-white mb-0 ">Beli</button></a>
                </div>
                <?php
                    }
                ?>
                <!-- <div class="list-card mt-3 ms-3 float-start">
                    <img src="foto/photo 1.webp" alt="" class="mt-2 ms-3 mb-1">
                    <p class="text-1 text-center fw-bold">SPECH METASALA</p>
                    <p class="text-2 text-center ">Rp. 359.000</p>
                </div> -->
            </div>
        </div>
    </div>

    <!-- modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Formulir Pembelian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="simpantransaksi.php" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label fw-bold">Id Produk</label>
                            <input type="text" class="form-control" id="nama_pembeli" name="id"
                                aria-describedby="emailHelp" value="<?php echo $idpr ?>">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label fw-bold">Nama Pembeli</label>
                            <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli"
                                aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label fw-bold">Nama Produk</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_produk"
                                aria-describedby="emailHelp" value="<?php echo $namaprod ?>">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label fw-bold">Qty</label>
                            <input type="number" class="form-control" id="quantity" name="quantity"
                                aria-describedby="emailHelp" value="<?php echo $jumlah ?>">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label fw-bold">Harga Awal</label>
                            <input type="number" class="form-control" id="harga_awal" name="harga_awal"
                                aria-describedby="emailHelp" value="<?php echo $totalharga?>">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label fw-bold">Diskon</label>
                            <input type="number" class="form-control" id="diskon" name="diskon"
                                aria-describedby="emailHelp" value="<?php echo $discount?>">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label fw-bold">Pajak</label>
                            <input type="number" class="form-control" id="pajak" name="pajak"
                                aria-describedby="emailHelp" value="<?php echo $pajak?>">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label fw-bold">Total Harga</label>
                            <input type="number" class="form-control" id="total_harga" name="total_harga"
                                aria-describedby="emailHelp" value="<?php echo $total?>">
                        </div>
                        <div class="p-2">
                            <input class="btn btn-primary mb-2" type="submit" name="bayar" style="width:100%;"
                                value="bayar">
                    </form>
                </div>
            </div>
        </div>
    </div>








    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>


</body>

</html>