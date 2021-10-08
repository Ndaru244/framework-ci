-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 11 Sep 2021 pada 00.05
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_web`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(100) NOT NULL,
  `ket_brg` text NOT NULL,
  `kat_id` int(11) NOT NULL,
  `gambar_brg` varchar(250) NOT NULL,
  `stok_brg` int(11) NOT NULL,
  `harga_brg` int(11) NOT NULL,
  `total_brg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_brg`, `nama_brg`, `ket_brg`, `kat_id`, `gambar_brg`, `stok_brg`, `harga_brg`, `total_brg`) VALUES
(8, 'celana panjang', 'celana', 4, 'celana_panjang_hitam.jpeg', 26, 5000, 130000),
(9, 'topi flofy jerami', '<p>topi flofy jerami<br></p>', 2, 'topi_jerami.jpg', 30, 15000, 450000),
(10, 'hooide blue', '<p>hooide blue<br></p>', 6, 'hoodie_blue1.jpg', 20, 150000, 3000000),
(11, 'celana Jean', '<p>celana Jean<br></p>', 4, 'celana_panjang_hitam2.jpeg', 20, 35000, 700000);

--
-- Trigger `barang`
--
DELIMITER $$
CREATE TRIGGER `barang_masuk` AFTER INSERT ON `barang` FOR EACH ROW BEGIN
INSERT INTO barang_masuk 
SET id_brg = NEW.id_brg,
nama_brg = NEW.nama_brg,
harga_brg = NEW.harga_brg,
qty = NEW.stok_brg,
tgl_masuk = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_brg_keluar` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(250) NOT NULL,
  `harga_brg` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `tgl_keluar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_brg_keluar`, `id_brg`, `nama_brg`, `harga_brg`, `qty`, `tgl_keluar`) VALUES
(15, 8, 'celana panjang', 5000, 1, '2021-07-27 09:47:15'),
(16, 10, 'hooide blue', 150000, 1, '2021-07-27 09:47:15'),
(17, 9, 'topi flofy jerami', 15000, 1, '2021-07-27 09:48:21'),
(18, 8, 'celana panjang', 5000, 1, '2021-07-27 09:48:21'),
(19, 9, 'topi flofy jerami', 15000, 5, '2021-07-27 09:49:22'),
(20, 11, 'celana Jean', 35000, 1, '2021-07-27 10:48:46'),
(21, 10, 'hooide blue', 150000, 3, '2021-07-27 10:50:09'),
(22, 9, 'topi flofy jerami', 15000, 2, '2021-07-27 10:50:09'),
(23, 11, 'celana Jean', 35000, 2, '2021-07-27 10:50:09'),
(24, 10, 'hooide blue', 150000, 3, '2021-09-11 04:56:20'),
(25, 11, 'celana Jean', 35000, 2, '2021-09-11 04:56:21'),
(26, 8, 'celana panjang', 5000, 1, '2021-09-11 04:56:31'),
(27, 11, 'celana Jean', 35000, 8, '2021-09-11 05:00:18'),
(28, 10, 'hooide blue', 150000, 1, '2021-09-11 05:00:19'),
(29, 9, 'topi flofy jerami', 15000, 1, '2021-09-11 05:00:19');

--
-- Trigger `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `barang_keluar` AFTER INSERT ON `barang_keluar` FOR EACH ROW BEGIN
UPDATE barang
SET stok_brg = stok_brg-NEW.qty,
total_brg = stok_brg*harga_brg
WHERE id_brg = NEW.id_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_brg_msk` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(250) NOT NULL,
  `harga_brg` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `tgl_masuk` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_brg_msk`, `id_brg`, `nama_brg`, `harga_brg`, `qty`, `tgl_masuk`) VALUES
(13, 8, 'celana panjang', 5000, 6, '2021-07-27 09:32:01'),
(14, 9, 'topi flofy jerami', 15000, 50, '2021-07-27 09:33:09'),
(15, 10, 'hooide blue', 150000, 15, '2021-07-27 09:34:16'),
(16, 0, 'celana panjang', 5000, 25, '2021-07-27 09:07:08'),
(17, 11, 'celana Jean', 35000, 33, '2021-07-27 10:21:46'),
(18, 12, 'test', 1, 1, '2021-07-27 10:23:51'),
(19, 0, 'hooide blue', 150000, 15, '2021-07-27 10:07:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesan`
--

CREATE TABLE `detail_pesan` (
  `id_detail_pesan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kode_pesan` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_pesan`
--

INSERT INTO `detail_pesan` (`id_detail_pesan`, `id_pelanggan`, `kode_pesan`, `status`) VALUES
(7, 4, '072021HOG', 'dipesan'),
(8, 5, '072021KDM', 'dipesan'),
(9, 3, '072021XPO', 'dipesan'),
(10, 6, '072021SYN', 'dipesan'),
(11, 6, '072021SLH', 'dipesan'),
(12, 3, '092021FRM', 'dipesan'),
(13, 4, '092021SQC', 'dipesan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kat_id` int(11) NOT NULL,
  `kat_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kat_id`, `kat_nama`) VALUES
(1, 'baju'),
(2, 'topi'),
(4, 'celana'),
(5, 'jaket'),
(6, 'hoodie'),
(7, 'test 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kode_pesan` varchar(50) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(250) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tgl_pesan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_pelanggan`, `kode_pesan`, `id_brg`, `nama_brg`, `harga`, `jumlah`, `total`, `tgl_pesan`) VALUES
(15, 4, '072021HOG', 8, 'celana panjang', 5000, 1, 5000, '2021-07-27'),
(16, 4, '072021HOG', 10, 'hooide blue', 150000, 1, 150000, '2021-07-27'),
(17, 5, '072021KDM', 9, 'topi flofy jerami', 15000, 1, 15000, '2021-07-27'),
(18, 5, '072021KDM', 8, 'celana panjang', 5000, 1, 5000, '2021-07-27'),
(19, 3, '072021XPO', 9, 'topi flofy jerami', 15000, 5, 75000, '2021-07-27'),
(20, 6, '072021SYN', 11, 'celana Jean', 35000, 1, 35000, '2021-07-27'),
(21, 6, '072021SLH', 10, 'hooide blue', 150000, 3, 450000, '2021-07-27'),
(22, 6, '072021SLH', 9, 'topi flofy jerami', 15000, 2, 30000, '2021-07-27'),
(23, 6, '072021SLH', 11, 'celana Jean', 35000, 2, 70000, '2021-07-27'),
(24, 3, '092021FRM', 10, 'hooide blue', 150000, 3, 450000, '2021-09-11'),
(25, 3, '092021FRM', 11, 'celana Jean', 35000, 2, 70000, '2021-09-11'),
(26, 3, '092021FRM', 8, 'celana panjang', 5000, 1, 5000, '2021-09-11'),
(27, 4, '092021SQC', 11, 'celana Jean', 35000, 8, 280000, '2021-09-11'),
(28, 4, '092021SQC', 10, 'hooide blue', 150000, 1, 150000, '2021-09-11'),
(29, 4, '092021SQC', 9, 'topi flofy jerami', 15000, 1, 15000, '2021-09-11');

--
-- Trigger `pesan`
--
DELIMITER $$
CREATE TRIGGER `pesan_berhasil` AFTER INSERT ON `pesan` FOR EACH ROW BEGIN
INSERT INTO barang_keluar
SET id_brg = NEW.id_brg,
nama_brg = NEW.nama_brg,
harga_brg = NEW.harga,
qty = NEW.jumlah,
tgl_keluar = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(250) NOT NULL,
  `alamat_user` text NOT NULL,
  `telp_user` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_user` int(5) NOT NULL,
  `tgl_buat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama_user`, `alamat_user`, `telp_user`, `email`, `password`, `role_user`, `tgl_buat`) VALUES
(1, 'Admin', '-', '6849408940', 'admin@admin.com', 'admin123', 1, '2021-07-26 04:00:20'),
(3, 'pelanggan', 'bumi', '45184249', 'pelanggan@email.com', 'pelanggan', 3, '2021-07-26 04:23:59'),
(4, 'Ndaru Langgeng Santosa', 'banten, kab.tangerang, cu', '085693784773', 'ndaru110@gmail.com', 'ndaru08569', 3, '2021-07-26 15:46:45'),
(5, 'test', 'tset', '43242', 'test@email.com', 'test123', 3, '2021-07-27 01:59:58'),
(6, 'nyoba bikin', 'alamat nyoba', '2256489', 'nyoba@emai.com', 'nyoba123', 3, '2021-07-27 03:46:12');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_brg`),
  ADD KEY `kat_id` (`kat_id`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_brg_keluar`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_brg_msk`);

--
-- Indeks untuk tabel `detail_pesan`
--
ALTER TABLE `detail_pesan`
  ADD PRIMARY KEY (`id_detail_pesan`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kat_id`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_brg_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_brg_msk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `detail_pesan`
--
ALTER TABLE `detail_pesan`
  MODIFY `id_detail_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kat_id`) REFERENCES `kategori` (`kat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
