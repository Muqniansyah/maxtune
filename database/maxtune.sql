-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 08:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

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
-- Table structure for table `form`
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
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `nama`, `email`, `nohp`, `alamat`, `provinsi`, `kota`, `motor`, `jenis_servis`, `jadwal`, `jam`) VALUES
(1, 'carlo', 'your@gmail.com', 2147483647, 'taman indah', 'Kalimantan Timur', 'Tangerang', 'Honda Vario', 'oli bocor', '2024-05-08', '19:28:00'),
(2, 'muni', 'your@gmail.com', 2147483647, 'taman kota', 'Kepulauan Bangka Belitung', 'Batam', 'Kawasaki Ninja', 'ban ilang', '2024-05-23', '17:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `formkontak`
--

CREATE TABLE `formkontak` (
  `id_kontak` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pesan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formkontak`
--

INSERT INTO `formkontak` (`id_kontak`, `nama`, `email`, `pesan`) VALUES
(1, 'Rangga', 'Rangga99@gmail.com', 'Hallo Admin maxtune, websitenya sangat bagus dan memudahkan pelanggan untuk mengetahui informasi seputar bengkel maxtune'),
(3, 'chiko', 'chiko@gmail.com', 'Bagus Websitenya, Mantapss'),
(4, 'Matthew', 'Matt@gmail.com', 'Mantaps slurrr');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`id`, `email`) VALUES
(1, 'muni@gmail.com'),
(2, 'admin@gmail.com'),
(3, 'anjai@gmail.com'),
(4, 'rangga@gmail.com'),
(5, 'init@gmail.com'),
(6, 'aku@gmail.com'),
(7, 'your@gmail.com'),
(8, 'aray@gmail.com'),
(9, 'coba@gmail.com'),
(10, 'www@gmail.co'),
(11, 'sasa@gmail.co'),
(12, 'asem@gmial.co'),
(13, 'aisyah@gmail.com'),
(14, 'asxasx@gmail.co'),
(15, 'your@gmail.com'),
(16, 'su@gmail.com'),
(17, 'asik@gmial.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`) VALUES
(1, 'muni', 'muni@gmail.com', 'muni', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'admin', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'Rangga', 'Rangga99@gmail.com', 'rangga', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formkontak`
--
ALTER TABLE `formkontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `formkontak`
--
ALTER TABLE `formkontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
