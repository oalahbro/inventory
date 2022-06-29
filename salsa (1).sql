-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 16 Jun 2022 pada 11.01
-- Versi server: 10.5.15-MariaDB-0+deb11u1
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `status` smallint(1) DEFAULT NULL,
  `level` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `status`, `level`) VALUES
(16, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1),
(26, 'admin12', '827ccb0eea8a706c4c34a16891f84e7b', 1, 2),
(27, 'salsa1', '827ccb0eea8a706c4c34a16891f84e7b', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventory`
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
-- Dumping data untuk tabel `inventory`
--

INSERT INTO `inventory` (`id_inventory`, `id_admin`, `id_kategori`, `nama`, `deskripsi`, `tahun`, `jumlah`, `image`, `harga`) VALUES
(4, 16, 3, 'SULAIMAN', 'asdfghjklzsdfh xsdfgh cfj', '2022-06-14', 13, 'wekek.jpeg', 1000),
(5, 16, 1, 'SULAIMAN', 'asdfghjklzsdfh xsdfgh cfj', '2022-06-14', 13, 'xss_poc.png', 1000),
(6, 16, 1, 'beruang', 'adadad adadad', '2022-06-21', 100, '202206160df2.png', 8000),
(8, 16, 2, 'Davetta McBride', 'asdf asfda', '2022-06-30', 0, '2022061607a3.png', 1000),
(9, 16, 1, 'asdasd', 'dadadada', '2022-06-27', 100, '202206160a6e.png', 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'ruang'),
(2, 'barang'),
(3, 'elektron'),
(5, 'hahah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyewa`
--

CREATE TABLE `penyewa` (
  `id_penyewa` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `telp` varchar(18) DEFAULT NULL,
  `no_identitas` varchar(16) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `level` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `penyewa`
--

INSERT INTO `penyewa` (`id_penyewa`, `nama`, `email`, `password`, `telp`, `no_identitas`, `alamat`, `level`) VALUES
(2, 'SULAIMAN', 'eka@email.com', '21232f297a57a5a743894a0e4a801fc3', '0890890809098', '1110890890809098', 'madiun', 1),
(8, 'Davetta McBride', 'epradana15@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '345678998765434567', '3456789987654345', '1255 N Grove Street Apt E', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewa`
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
-- Dumping data untuk tabel `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `id_penyewa`, `id_admin`, `tgl_mulai`, `tgl_selesai`, `tgl_booking`, `status`, `bukti_bayar`, `total`) VALUES
(2, 2, 16, '2022-06-16 10:42:45', '2022-06-18 10:42:45', '2022-06-16', 4, 'ok', 12000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewa_detail`
--

CREATE TABLE `sewa_detail` (
  `id_sewa_detail` int(11) NOT NULL,
  `id_sewa` int(11) NOT NULL,
  `id_inventory` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id_inventory`),
  ADD KEY `fk_id_admin_idx` (`id_admin`),
  ADD KEY `fk_id_kategori_idx` (`id_kategori`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`id_penyewa`);

--
-- Indeks untuk tabel `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `fk_id_user_idx` (`id_penyewa`),
  ADD KEY `fk_id_admin_idx` (`id_admin`);

--
-- Indeks untuk tabel `sewa_detail`
--
ALTER TABLE `sewa_detail`
  ADD PRIMARY KEY (`id_sewa_detail`),
  ADD KEY `fk_sewa_idx` (`id_sewa`),
  ADD KEY `fk_inventory_idx` (`id_inventory`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id_inventory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penyewa`
--
ALTER TABLE `penyewa`
  MODIFY `id_penyewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sewa_detail`
--
ALTER TABLE `sewa_detail`
  MODIFY `id_sewa_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `fk_admin` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `sewa`
--
ALTER TABLE `sewa`
  ADD CONSTRAINT `fo_admin` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `fo_penyewa` FOREIGN KEY (`id_penyewa`) REFERENCES `penyewa` (`id_penyewa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `sewa_detail`
--
ALTER TABLE `sewa_detail`
  ADD CONSTRAINT `fk_inventory` FOREIGN KEY (`id_inventory`) REFERENCES `inventory` (`id_inventory`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sewa` FOREIGN KEY (`id_sewa`) REFERENCES `sewa` (`id_sewa`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
