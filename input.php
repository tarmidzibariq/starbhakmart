<?php
include 'koneksi.php';
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
    <link rel="stylesheet" href="style-input.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <title>KONTROL ADMIN</title>  
  </head>
  <body>
    <nav class="navbar navbar-dark">
        <div class="container-fluid fw-bold ">
            <a class="navbar-brand ms-3 " href="input.php">Starbhak Mart</a>
            <div class="nav-right">
                <a class="navbar-brand ms-3 " href="index.php">HOME</a>
                <a class="navbar-brand ms-3 " href="input.php">ADMIN</a>
                <a class="navbar-brand ms-3 " href="payment.php">KERANJANG</a>
            </div>
        </div>
    </nav>
    
    <!-- form input -->
    <div class="container mt-2 mb-5">
        
        <div class="hero">
            <p><i class="fas fa-list ps-3"></i> <span class="ms-2 fw-bold">Produk</span></p>
            <a href="tambah.html" class=" btn text-white  ms-3">Tambah Baru</a>
        </div>
        <div class="input ms-3 me-3 mt-3 pb-3">
            <table class="table table-bordered border-primary text-primary text-center">
                <tr>
                    <td>NO</td>
                    <td>GAMBAR</td>
                    <td>NAMA PRODUK</td>
                    <td>HARGA PRODUK</td>
                    <td>STOCK</td>
                    <td>ACTION</td>
                </tr>
                <?php
            $sql = "SELECT * FROM stockbarang";
            $query = mysqli_query($connect,$sql);

                while($pel = mysqli_fetch_array($query)){
                    echo"<tr>";
                    echo"<td>".$pel['id']."</td>";
                    echo "<td><img src='".$pel['gambar']."'style='width:80px; height:80px;'></td>";
                    echo"<td>".$pel['nama_produk']."</td>";
                    echo"<td>"."Rp".number_format($pel['harga'])."</td>";
                    echo"<td>".$pel['stock']."</td>";

                    echo"<td>";
                    echo "<a href='formedit.php?id=".$pel['id']."'>Edit</a> | ";
                    echo "<a href='hapus.php?id=".$pel['id']."'>Hapus</a>";
                    echo"</td>";
                    echo"</tr>";    
                }

            ?>
            </table>
        </div>
    </div>
    
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>