-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Nov 2021 pada 13.35
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujilevel2`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `tampildata` ()  BEGIN
SELECT nama_produk,harga FROM stockbarang;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(10) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id`, `id_barang`, `nama_produk`, `quantity`) VALUES
(11, 0, 'EAGLE SANCHEZ ', 1),
(12, 0, 'ORTUSEIGHT QUIVER', 4),
(13, 0, 'ORTUSEIGHT QUIVER', 4),
(15, 0, 'SPECH METASA', 1),
(16, 0, 'SPECH METASA', 2),
(17, 0, 'SPECH METASA', 3),
(18, 0, 'SPECH METASA', 3),
(19, 4, 'EAGLE RONIN', 1),
(20, 4, 'EAGLE RONIN', 1),
(21, 1, 'SPECH METASA', 1),
(22, 1, 'SPECH METASA', 1),
(23, 1, 'SPECH METASA', 1),
(24, 1, 'SPECH METASA', 1),
(25, 1, 'SPECH METASA', 1),
(26, 1, 'SPECH METASA', 1),
(27, 1, 'SPECH METASA', 1),
(28, 1, 'SPECH METASA', 1),
(29, 1, 'SPECH METASA', 1),
(30, 1, 'SPECH METASA', 1),
(31, 3, 'ORTUSEIGHT BLITZ', 1);

--
-- Trigger `keranjang`
--
DELIMITER $$
CREATE TRIGGER `kurang_stok` AFTER INSERT ON `keranjang` FOR EACH ROW BEGIN
	UPDATE stockbarang SET stock=stock-			NEW.quantity WHERE id=NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stockbarang`
--

CREATE TABLE `stockbarang` (
  `id` int(10) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` int(100) NOT NULL,
  `stock` int(50) NOT NULL,
  `gambar` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stockbarang`
--

INSERT INTO `stockbarang` (`id`, `nama_produk`, `harga`, `stock`, `gambar`) VALUES
(1, 'SPECH METASA', 200000, 3, 'https://topscore.id/wp-content/uploads/2021/03/SEPATU-FUTSAL-SPECS-METASALA-NATIV-2-MARSMALLOW-BLACK-WHITE-3-600x600.jpeg'),
(2, 'ORTUSEIGHT QUIVER', 200000, 10, 'https://topscore.id/wp-content/uploads/2021/03/SEPATU-FUTSAL-ORTUSEIGHT-CATALYST-QUIVER-IN-PHANTOM-BLACK-3-600x600.jpeg'),
(3, 'ORTUSEIGHT BLITZ', 300000, 9, 'https://topscore.id/wp-content/uploads/2019/12/Ortuseight-BLITZ-FG-BLACK-GOLD-Murah-2.jpg'),
(4, 'EAGLE RONIN', 250000, 3, 'https://topscore.id/wp-content/uploads/2019/12/IMG_9557.jpg'),
(5, 'EAGLE NOVA ', 190000, 4, 'https://topscore.id/wp-content/uploads/2019/12/IMG_8237.jpg'),
(6, 'METASALA VOID', 385000, 4, 'https://topscore.id/wp-content/uploads/2021/03/SEPATU-FUTSAL-SPECS-METASALA-VOID-WHITE-DUST-ORANGE-1-600x600.jpeg'),
(7, 'MUNICH GRESCA', 300000, 4, 'https://topscore.id/wp-content/uploads/2019/12/IMG_6115.jpg'),
(8, 'EAGLE JESSICA', 210000, 4, 'https://topscore.id/wp-content/uploads/2019/12/IMG_5287.jpg'),
(9, 'EAGLE SANCHEZ ', 245000, 4, 'https://topscore.id/wp-content/uploads/2019/12/Eagle-Navy-White-Murah-1.jpg'),
(10, 'EAGLE JAVELINE', 200000, 4, 'https://topscore.id/wp-content/uploads/2019/12/IMG_4516.jpg'),
(11, 'EAGLE NOVA', 230000, 4, 'https://topscore.id/wp-content/uploads/2019/12/IMG_8237.jpg'),
(13, 'PUMA ONE', 500000, 4, 'https://topscore.id/wp-content/uploads/2019/12/PUMA-ONE-19.3-FG-BLACK-WHITE-1.jpg'),
(14, 'FUTSAL Puma Future', 500000, 4, 'https://topscore.id/wp-content/uploads/2019/12/Puma-Future-18.3-IT-Black-Yellow-Asphalt-4-copy.jpg'),
(15, 'PUMA SPIRIT', 350000, 4, 'https://topscore.id/wp-content/uploads/2019/12/Spirit-FG-Red-Silver-Black2.jpg'),
(16, 'Puma Future', 450000, 4, 'https://topscore.id/wp-content/uploads/2019/12/Puma-Future-18.3-IT-Black-Yellow-Asphalt-4-copy.jpg'),
(17, 'BADMINTON EAGLE', 245000, 4, 'https://topscore.id/wp-content/uploads/2019/12/IMG_9708.jpg'),
(18, 'SNEAKERS PHOENIX', 250000, 4, 'https://topscore.id/wp-content/uploads/2021/03/SEPATU-SNEAKERS-PHOENIX-ALBUS-NAVY-3-600x600.jpeg'),
(19, '910 SHINJI', 250000, 10, 'https://topscore.id/wp-content/uploads/2019/12/IMG_9723.jpg'),
(20, '910 NORU ', 240000, 10, 'https://topscore.id/wp-content/uploads/2019/12/Noru-Merah-Hitam-Putih-Murah-1.jpg'),
(21, 'SEPATU', 100000, 4, 'https://topscore.id/wp-content/uploads/2019/12/IMG_0981.jpg'),
(2147483647, 'CASUAL EAGLE', 10000, 1, 'https://s1.bukalapak.com/img/1840229911/w-1000/Baju_Koko_Busana_Muslim_Pria_Cowok_Lengan_Panjang_Warna_Biru.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(10) NOT NULL,
  `nama_pembeli` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `quantity` int(50) NOT NULL,
  `harga_awal` int(100) NOT NULL,
  `diskon` varchar(255) NOT NULL,
  `pajak` varchar(255) NOT NULL,
  `total_harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `nama_pembeli`, `nama_produk`, `quantity`, `harga_awal`, `diskon`, `pajak`, `total_harga`) VALUES
(21, 'afafaf', 'SPECH METASA', 1, 200000, '200000', '200000', 220000),
(22, '', 'SPECH METASA', 1, 200000, '200000', '200000', 220000),
(23, '', 'SPECH METASA', 1, 200000, '200000', '200000', 220000),
(24, 'bariq', 'SPECH METASA', 1, 200000, '200000', '200000', 220000),
(25, '', 'ORTUSEIGHT BLITZ', 1, 700000, '700000', '700000', 720000);

--
-- Trigger `tbl_payment`
--
DELIMITER $$
CREATE TRIGGER `kurang` BEFORE INSERT ON `tbl_payment` FOR EACH ROW BEGIN
UPDATE stockbarang SET
stock=stock-new.quantity
WHERE id=new.id;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stockbarang`
--
ALTER TABLE `stockbarang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `stockbarang`
--
ALTER TABLE `stockbarang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT untuk tabel `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
