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

    <!-- font roboto -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">


    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <!-- css -->
    <link rel="stylesheet" href="payment.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <title>PESAN</title>
    <style>
    body {
    background-color: #dfe4ea;
}
    nav{
        background-color: #2980b9;
        font-family: 'Roboto Mono', monospace;
    }
    .container{
        background-color: white;
        box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.2);
        padding: 0;
    }
    .hero p{
        width: 100%;
        background-color: #eef2f7;
        height: 50px;
        display: flex;
        align-items: center;
        color: #636e72;
        font-size: 14px;
    }
    .hero a{
        background-color: #f36270;
        text-decoration: none;
        border-radius: 5px;
        font-size: 14px;
    }

    </style>
  </head>
  <body>
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
    
    <!-- form input -->
    <div class="container mt-2 mb-5">
        
        <div class="hero">
            <p><i class="fas fa-list ps-3"></i> <span class="ms-2 fw-bold">Keranjang</span></p>
            <a href="index.php" class=" btn text-white  ms-3"></i>Kembali</a>
        </div>
        <div class="input ms-3 me-3 mt-3 pb-3">
            <table class="table table-bordered border-primary text-primary text-center">
                <tr class="table-bordered ">
                    <td>NO</td>
                    <td>NAMA PEMBELI</td>
                    <td>NAMA PRODUK</td>
                    <td>QUANTITY</td>
                    <td>HARGA PRODUK</td>
                    <td>DISCOUNT</td>
                    <td>PAJAK</td>
                    <td>TOTAL HARGA</td>
                    <td>ACTION</td>
                </tr>
                <?php
            $sql = "SELECT * FROM tbl_payment";
            $query = mysqli_query($connect,$sql);

                while($pel = mysqli_fetch_array($query)){
                    echo"<tr>";
                    echo"<td>".$pel['id']."</td>";
                    echo"<td>".$pel['nama_pembeli']."</td>";
                    echo"<td>".$pel['nama_produk']."</td>";
                    echo"<td>".$pel['quantity']."</td>";
                    echo"<td>".$pel['harga_awal']."</td>";
                    echo"<td>".$pel['diskon']."</td>";
                    echo"<td>".$pel['pajak']."</td>";
                    echo"<td>".$pel['total_harga']."</td>";
                    echo"<td>";
                    echo "<a href='hapus_payment.php?id=".$pel['id']."'>Hapus</a>";
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