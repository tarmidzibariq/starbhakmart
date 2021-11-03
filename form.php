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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- css -->
    <link rel="stylesheet" href="style-formedit.css">
    <title>Hello, world!</title>
  </head>
  <body>
    <nav class="navbar navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand ms-3 " href="#">Starbhak Mart</a>
        </div>
    </nav>

    <h3>Form Edit Pelanggan</h3>
     
        <input type="hidden" name="id" value="<?php echo $pel['id']?>"/>
        <p><label>Nama Pelanggan : <input type="text" name="nama_produk" value="<?php echo $pel['nama_produk']?>"></label></p>
        <p><label>Alamat : <input type="text" name="gambar" value="<?php echo $pel['gambar']?>"></label></p>
        <p><label>No Telepon : <input type="text" name="harga" value="<?php echo $pel['harga']?>"></label></p>
        <p><label>Email : <input type="text" name="stock" value="<?php echo $pel['stock']?>"></label></p>
        <input type="submit" name="simpan" value="simpan"/> 
    </form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    
  </body>
</html>