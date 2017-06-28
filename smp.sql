-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28 Jun 2017 pada 09.06
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `tipe` varchar(25) NOT NULL,
  `gambar` text NOT NULL,
  `status` varchar(2) NOT NULL,
  `dibuat` datetime NOT NULL,
  `ubah` datetime NOT NULL,
  `id_user` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_berita`
--

INSERT INTO `tb_berita` (`id`, `judul`, `body`, `tipe`, `gambar`, `status`, `dibuat`, `ubah`, `id_user`) VALUES
(1, 'aaa', 'asdasda', '1', 'asdasd', '1', '2017-06-07 00:00:00', '2017-06-24 08:54:53', '123'),
(2, 'sss', 'asdasd', 'asd', 'dsa', '1', '2017-06-19 00:00:00', '0000-00-00 00:00:00', '123'),
(3, 'aaa', 'asdasda', '1', 'asdasd', '1', '2017-06-22 00:00:00', '0000-00-00 00:00:00', '123'),
(4, 'aaa', 'asdasda', '1', 'asdasd', '1', '2017-06-24 00:00:00', '0000-00-00 00:00:00', '123'),
(5, 'ssss', 'asdasda', '1', 'asdasd', '1', '2017-06-24 08:27:22', '0000-00-00 00:00:00', '123'),
(6, 'aaaasasa', 'asdasda', '1', 'asdasd', '1', '2017-06-24 08:55:26', '0000-00-00 00:00:00', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` varchar(8) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `username`, `password`, `last_login`) VALUES
('123', 'afdal', '9001e0835d73b4df72e4267c4e83eb38c3dbb6ef', '2017-06-18 01:32:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
