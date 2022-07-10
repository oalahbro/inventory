-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2022 at 02:20 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `status` smallint(1) DEFAULT NULL,
  `level` tinyint(2) DEFAULT NULL,
  `image` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `status`, `level`, `image`) VALUES
(16, 'nana', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 1, 2, '20220706f6cbd.png'),
(27, 'salsaaaaa', 'salsa1', '827ccb0eea8a706c4c34a16891f84e7b', 1, 1, '20220706f71a8.png');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id_inventory` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(15) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `tahun` date DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `image` varchar(20) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id_inventory`, `id_admin`, `id_kategori`, `nama`, `deskripsi`, `tahun`, `jumlah`, `image`, `harga`) VALUES
(4, 16, 1, 'XI IPA 1', 'Ruang kelas dengan ukuran 9mx8m ', '1991-06-01', 0, '2022062947a92.jpg', 100000),
(6, 16, 2, 'MEJA SISWA', 'Meja sekolah dengan tinggi sekitar 60 sampai 65 cm, tinggi standar yakni 75 cm, dan lebar 50 sampai 55 cm', '2004-06-01', 600, '202206294669b.jpg', 2000),
(10, 16, 2, 'KURSI SISWA', 'kursi dengan ukuran Panjang 40 X Lebar 40 cm, Sedangkan untuk tingkat SMP dan SMA menggunakan ukuran Panjang X Lebar 42 cm', '2004-06-01', 600, '202207061401d.jpg', 500),
(12, 16, 2, 'LCD PROYEKTOR', 'Proyektor berbasis Liquid Crystal Display atau layar kristal cair yang dapat menampilkan dokumen, gambar, atau video.', '2004-06-01', 25, '202207058e9df.jpg', 100000),
(13, 16, 2, 'AUDIO AMPLIFIER', 'Penguat suara atau audio power amplifier adalah rangkaian komponen elektronika yang digunakan untuk menguatkan daya atau tenaga secara umum.', '2004-06-01', 25, '202207059f083.jpg', 50000),
(14, 16, 2, 'SLIDE PROYEKTOR', ' LCD atau Liquid Crystal Display adalah suatu jenis media display (tampilan) yang menggunakan kristal cair (liquid crystal) untuk menghasilkan gambar yang terlihat.', '1970-01-01', 25, '20220705aa877.jpg', 20000),
(15, 16, 1, 'GEDUNG OLAHRAGA', 'GOR adalah sebuah wadah atau tempat yang dikhususkan untuk mewadahi sebuah kegiatan olahraga. Ukuran arena GOR tipe A minimum; panjang50 m lebar 40 m, tinggi diatas area permainan 15 m dan tinggi diatas zona bebas', '1970-01-01', 1, '20220705cb4aa.jpg', 300000),
(16, 16, 1, 'AULA', 'Aula adalah ruangan besar yang dapat digunakan untuk rapat, upacara, dan sebagainya. Ruang aula berbentuk persegi panjang,ukuran panjangnya 25 m dan lebar 12m', '1970-01-01', 1, '20220705e6e1d.jpg', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'ruang'),
(2, 'barang');

-- --------------------------------------------------------

--
-- Table structure for table `penyewa`
--

CREATE TABLE `penyewa` (
  `id_penyewa` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `telp` varchar(18) DEFAULT NULL,
  `no_identitas` varchar(16) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `level` tinyint(2) DEFAULT NULL,
  `image` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penyewa`
--

INSERT INTO `penyewa` (`id_penyewa`, `nama`, `email`, `password`, `telp`, `no_identitas`, `alamat`, `level`, `image`) VALUES
(2, 'SALSA', 'sal@email.com', '202cb962ac59075b964b07152d234b70', '62895395667414', '1110890890809098', 'madiun', 1, '202207075990c.png'),
(18, 'Salsa Hermiyawatiiiii', 'tisalsahh@gmail.com', '202cb962ac59075b964b07152d234b70', '0890890809098', '1110890890809098', 'asdfghjk', 1, ''),
(25, '6B_Salsa Hermiyawati', 'salsahh17@gmail.com', NULL, NULL, NULL, NULL, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` int(11) NOT NULL,
  `id_penyewa` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `tgl_mulai` datetime DEFAULT NULL,
  `tgl_selesai` datetime DEFAULT NULL,
  `tgl_booking` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `bukti_bayar` varchar(20) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `id_penyewa`, `id_admin`, `tgl_mulai`, `tgl_selesai`, `tgl_booking`, `status`, `bukti_bayar`, `total`) VALUES
(39, 2, NULL, '2022-07-07 23:58:00', '2022-07-09 23:58:00', '2022-07-07', 3, NULL, 400000),
(40, 2, NULL, '2022-07-07 00:00:00', '2022-07-09 00:00:00', '2022-07-07', 2, NULL, 400000),
(41, 2, NULL, '2022-07-08 00:01:00', '2022-07-30 00:01:00', '2022-07-07', 3, '202207071f382.jpg', 2200000),
(42, 2, NULL, '2022-07-11 17:53:00', '2022-07-15 17:53:00', '2022-07-10', 2, NULL, 1200000),
(43, 2, NULL, '2022-07-11 17:57:00', '2022-07-15 17:57:00', '2022-07-10', 3, '202207100ca96.jpg', 1200000);

-- --------------------------------------------------------

--
-- Table structure for table `sewa_detail`
--

CREATE TABLE `sewa_detail` (
  `id_sewa_detail` int(11) NOT NULL,
  `id_sewa` int(11) NOT NULL,
  `id_inventory` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `status_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sewa_detail`
--

INSERT INTO `sewa_detail` (`id_sewa_detail`, `id_sewa`, `id_inventory`, `jumlah`, `harga`, `sub_total`, `status_qty`) VALUES
(56, 39, 16, 1, 200000, 200000, 1),
(57, 40, 16, 1, 200000, 200000, 1),
(58, 41, 4, 1, 100000, 100000, 1),
(59, 42, 15, 1, 300000, 300000, 1),
(60, 43, 15, 1, 300000, 300000, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id_inventory`),
  ADD KEY `fk_id_admin_idx` (`id_admin`),
  ADD KEY `fk_id_kategori_idx` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`id_penyewa`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `fk_id_user_idx` (`id_penyewa`),
  ADD KEY `fk_id_admin_idx` (`id_admin`);

--
-- Indexes for table `sewa_detail`
--
ALTER TABLE `sewa_detail`
  ADD PRIMARY KEY (`id_sewa_detail`),
  ADD KEY `fk_sewa_idx` (`id_sewa`),
  ADD KEY `fk_inventory_idx` (`id_inventory`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id_inventory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penyewa`
--
ALTER TABLE `penyewa`
  MODIFY `id_penyewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `sewa_detail`
--
ALTER TABLE `sewa_detail`
  MODIFY `id_sewa_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `fk_admin` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sewa`
--
ALTER TABLE `sewa`
  ADD CONSTRAINT `fo_admin` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `fo_penyewa` FOREIGN KEY (`id_penyewa`) REFERENCES `penyewa` (`id_penyewa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sewa_detail`
--
ALTER TABLE `sewa_detail`
  ADD CONSTRAINT `fk_inventory` FOREIGN KEY (`id_inventory`) REFERENCES `inventory` (`id_inventory`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sewa` FOREIGN KEY (`id_sewa`) REFERENCES `sewa` (`id_sewa`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

