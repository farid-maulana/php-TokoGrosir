-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06 Okt 2019 pada 02.06
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaganza`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`user_id`, `username`, `password`, `nama`) VALUES
(1, 'admin', 'admin', 'Farid Maulana'),
(2, 'QrUgcNdRjaE74hfEIeThKa/RaqA9N/KpBI+X7VeiyfE=', 'QrUgcNdRjaE74hfEIeThKa/RaqA9N/KpBI+X7VeiyfE=', 'Farlan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kd_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `jumlah` int(255) DEFAULT NULL,
  `hrg_beli` int(255) DEFAULT NULL,
  `hrg_jual` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kd_barang`, `nama_barang`, `jenis`, `jumlah`, `hrg_beli`, `hrg_jual`) VALUES
('GLKU', 'Gulaku', 'Sembako', 476, 9000, 9500),
('GRM', 'Garam', 'Sembako', 591, 78900, 2000),
('KOPI', 'KOPI', 'Sembako', 500, 51200, 1500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `kd_barang` varchar(255) DEFAULT NULL,
  `jumlah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` int(11) NOT NULL,
  `no_nota` varchar(255) DEFAULT NULL,
  `kd_barang` varchar(255) DEFAULT NULL,
  `jumlah` int(255) DEFAULT NULL,
  `total_harga` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `no_nota`, `kd_barang`, `jumlah`, `total_harga`) VALUES
(2, 'N2201OT190614A13', 'GLKU', 1, 9500),
(5, 'N2201OT190628A12', 'KOPI', 2, 3000),
(6, 'N0602OT191107A39', 'GLKU', 1, 9500),
(7, 'N0602OT191107A39', 'GLKU', 1, 9500),
(8, 'N0602OT191107A39', 'GLKU', 1, 9500),
(9, 'N0602OT191107A39', 'GLKU', 1, 9500),
(10, 'N0602OT191107A39', 'GLKU', 1, 9500),
(11, 'N0602OT191109A17', 'GRM', 2, 4000),
(12, 'N0602OT191109A17', 'GLKU', 2, 19000),
(13, 'N0602OT191109A31', 'GLKU', 1, 9500),
(14, 'N0602OT191109A47', 'GLKU', 4, 38000),
(15, 'N0602OT191109A47', 'GRM', 2, 4000),
(16, 'N0602OT191109A47', 'KOPI', 1, 1500),
(17, 'N0602OT191111A02', 'GLKU', 3, 28500),
(18, 'N0602OT191111A02', 'GRM', 1, 2000),
(19, 'N0602OT191111A02', 'KOPI', 1, 1500),
(20, 'N0602OT191111A02', 'GLKU', 3, 28500),
(21, 'N0602OT191111A02', 'GRM', 1, 2000),
(22, 'N0602OT191111A02', 'KOPI', 1, 1500),
(23, 'N3004OT190357A45', 'GLKU', 2, 19000),
(24, 'N3004OT190357A45', 'GRM', 1, 2000),
(25, 'N3004OT190357A45', 'KOPI', 1, 1500),
(26, 'N3004OT190423A03', 'GRM', 1, 2000),
(27, 'N3004OT190423A03', 'KOPI', 1, 1500),
(28, 'N3004OT190423A03', 'GLKU', 1, 9500),
(29, 'N0210OT190318A30', 'GLKU', 3, 28500),
(30, 'N0210OT190318A30', 'GRM', 1, 2000),
(31, 'N0210OT190318A30', 'KOPI', 3, 4500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` varchar(255) NOT NULL,
  `nama_pembeli` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_telp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama_pembeli`, `alamat`, `no_telp`) VALUES
('123', 'Farid Maulana', 'Malang', '08563077527'),
('124', 'Farlan', 'Malang', '085679284823'),
('125', 'Farids', 'Malang', '085630775271'),
('126', 'Farid', 'Malang', '081234567890'),
('127', 'Arlans', 'Malang', '123456789'),
('129', 'Farid', 'Malang', '1234567');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `no_nota` varchar(255) NOT NULL,
  `id_pembeli` varchar(255) DEFAULT NULL,
  `tgl_transaksi` varchar(255) DEFAULT NULL,
  `total_bayar` int(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`no_nota`, `id_pembeli`, `tgl_transaksi`, `total_bayar`, `pic`) VALUES
('N0210OT190318A30', '129', '02-10-2019', 35000, 'Farlan'),
('N0602OT191107A39', '123', '06 February 2019', 9500, 'Farlan'),
('N0602OT191109A17', '123', '06 February 2019', 23000, 'Farlan'),
('N0602OT191109A31', '123', '06 February 2019', 9500, 'Farlan'),
('N0602OT191109A47', '123', '06 February 2019', 43500, 'Farlan'),
('N0602OT191111A02', '123', '06 February 2019', 32000, 'Farlan'),
('N2201OT190614A13', '124', '22 January 2019', 20000, 'Farlan'),
('N2201OT190623A01', '123', '22 January 2019', 21000, 'Farlan'),
('N2201OT190628A12', '126', '22 January 2019', 5000, 'Farlan'),
('N3004OT190357A45', '124', '30-04-2019', 22500, 'Farlan'),
('N3004OT190423A03', '125', '30-04-2019', 13000, 'Farlan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`) USING BTREE;

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_barang`) USING BTREE;

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `kd_barang` (`kd_barang`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `no_nota` (`no_nota`) USING BTREE,
  ADD KEY `kd_barang` (`kd_barang`) USING BTREE;

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`) USING BTREE;

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_nota`) USING BTREE,
  ADD KEY `id_pembeli` (`id_pembeli`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`no_nota`) REFERENCES `transaksi` (`no_nota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
