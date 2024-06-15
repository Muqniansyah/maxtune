-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jun 2024 pada 09.05
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maxtune`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(128) NOT NULL,
  `nohp` int(12) NOT NULL,
  `alamat` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `provinsi` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kota` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `motor` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jenis_servis` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jadwal` date NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `form`
--

INSERT INTO `form` (`id`, `nama`, `email`, `nohp`, `alamat`, `provinsi`, `kota`, `motor`, `jenis_servis`, `jadwal`, `jam`) VALUES
(1, 'remon', 'admin@gmail.com', 2147483647, 'kiw', 'Dki Jakarta', 'Jakarta Timur', 'Yamaha Aerox', 'Ganti oli gardan', '2024-06-19', '15:03:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `formkontak`
--

CREATE TABLE `formkontak` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pesan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `formkontak`
--

INSERT INTO `formkontak` (`id`, `nama`, `email`, `pesan`) VALUES
(1, 'revan', 'admin@gmail.com', 'es teh satu\r\n'),
(2, 'carlo', 'admin@gmail.com', 'es teh satu'),
(3, 'remon', 'admin@gmail.com', 'yo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `subscribe`
--

INSERT INTO `subscribe` (`id`, `email`) VALUES
(1, 'muni@gmail.com'),
(2, 'revand@gmail.com'),
(3, 'kelvin@gmail.com'),
(4, 'rois@gmail.com'),
(5, 'amar@gmail.com'),
(6, 'vinagarut@gmail.com'),
(7, 'your@gmail.com'),
(8, 'muqniansyah@gmail.co'),
(9, 'muqniansyah@gmail.co'),
(10, 'amin@gmail.com'),
(11, 'aldiauau@gmail.com'),
(12, 'muqniansyah@gmail.co'),
(13, 'your@gmail.com'),
(14, 'your@gmail.com'),
(15, 'muni@gmail.com'),
(16, 'aldiauau@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temporary_form`
--

CREATE TABLE `temporary_form` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `nohp` int(12) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `provinsi` varchar(128) NOT NULL,
  `kota` varchar(128) NOT NULL,
  `motor` varchar(128) NOT NULL,
  `jenis_servis` varchar(128) NOT NULL,
  `jadwal` date NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `temporary_form`
--

INSERT INTO `temporary_form` (`id`, `nama`, `email`, `nohp`, `alamat`, `provinsi`, `kota`, `motor`, `jenis_servis`, `jadwal`, `jam`) VALUES
(1, 'remon', 'admin@gmail.com', 2147483647, 'kiw', 'Dki Jakarta', 'Jakarta Timur', 'Yamaha Aerox', 'Ganti oli gardan', '2024-06-19', '15:03:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temporary_formkontak`
--

CREATE TABLE `temporary_formkontak` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `temporary_formkontak`
--

INSERT INTO `temporary_formkontak` (`id`, `nama`, `email`, `pesan`) VALUES
(1, 'revan', 'admin@gmail.com', 'es teh satu\r\n'),
(2, 'carlo', 'admin@gmail.com', 'es teh satu'),
(3, 'remon', 'admin@gmail.com', 'yo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temporary_subscribe`
--

CREATE TABLE `temporary_subscribe` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `temporary_subscribe`
--

INSERT INTO `temporary_subscribe` (`id`, `email`) VALUES
(1, 'muni@gmail.com'),
(2, 'revand@gmail.com'),
(3, 'kelvin@gmail.com'),
(4, 'rois@gmail.com'),
(5, 'amar@gmail.com'),
(6, 'vinagarut@gmail.com'),
(7, 'your@gmail.com'),
(8, 'muqniansyah@gmail.co'),
(9, 'muqniansyah@gmail.co'),
(10, 'amin@gmail.com'),
(11, 'aldiauau@gmail.com'),
(12, 'muqniansyah@gmail.co'),
(13, 'your@gmail.com'),
(14, 'your@gmail.com'),
(15, 'muni@gmail.com'),
(16, 'aldiauau@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`) VALUES
(1, 'muni', 'muni@gmail.com', 'muni', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'admin', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'Rangga', 'Rangga99@gmail.com', 'rangga', '12345'),
(5, 'muni', 'inda@gmail.com', 'muni', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `formkontak`
--
ALTER TABLE `formkontak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `temporary_form`
--
ALTER TABLE `temporary_form`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `temporary_formkontak`
--
ALTER TABLE `temporary_formkontak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `temporary_subscribe`
--
ALTER TABLE `temporary_subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `formkontak`
--
ALTER TABLE `formkontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `temporary_form`
--
ALTER TABLE `temporary_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `temporary_formkontak`
--
ALTER TABLE `temporary_formkontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `temporary_subscribe`
--
ALTER TABLE `temporary_subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
