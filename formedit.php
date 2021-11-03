<?php
include 'koneksi.php';
    $id = $_GET['id'];
    $sql    = "SELECT * FROM stockbarang WHERE id='$id'";
    $query  = mysqli_query($connect, $sql);
    $pel = mysqli_fetch_assoc($query);

if ( mysqli_num_rows($query) < 1) {
    die("data tidak ditemukan...");
}

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

    <!-- css -->
    <link rel="stylesheet" href="style-formedit.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <title>EDIT</title>
</head>

<body>
    <nav class="navbar navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand ms-3 " href="#">Starbhak Mart</a>
            <div class="nav-right">
                <a class="navbar-brand ms-3 " href="index.php">HOME</a>
                <a class="navbar-brand ms-3 " href="input.php">ADMIN</a>
                <a class="navbar-brand ms-3 " href="payment.php">KERANJANG</a>
            </div>
        </div>
    </nav>
    <div class="container mt-2">
        <div class="hero fw-bold">
            <p><i class="fas fa-edit ps-3"></i></i></i><span class="ms-2">Edit Produk </span></p>
        </div>
        <form action="edit.php" method="POST">
            <div class="row ms-3 me-3 justify-content-evenly font">
                <div class="col-md-5">
                    
                        <!-- <label for="exampleFormControlInput1" class="form-label">Nomor</label> -->
                        <input type="hidden" class="form-control" id="id" name="id"   value="<?php echo $pel['id']?>"/>
                    
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Gambar</label>
                        <input type="text" class="form-control" id="" placeholder="Masukan URL" name="gambar" value="<?php echo $pel['gambar']?>">
                    </div>
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="" name="nama_produk" value="<?php echo $pel['nama_produk']?>">
                    </div>
                    <a href="input.php" class="btn btn-merah">kembali</a>
                    <button type="submit" name="simpan" value="simpan" class="btn btn-hijau">Submit</button>
                </div>
                <div class="col-md-5">
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="" name="harga" value="<?php echo $pel['harga']?>">
                    </div>
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="" name="stock" value="<?php echo $pel['stock']?>">
                        
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>


</body>

</html>