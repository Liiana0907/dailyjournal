-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2025 at 06:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdailyjournal`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `judul` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `isi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `gambar` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `judul`, `isi`, `gambar`, `tanggal`, `username`) VALUES
(1, 'Matrikulasi', 'kami para mahasiswa baru menjalani masa orientasi atau yang lebih dikenal dengan matrikulasi di Gedung H lantai 7. Kami berkesempatan untuk mengabadikan momen berharga bersama teman-teman satu matrikulasi. Dengan mengenakan almamater kebanggaan, kami berpose ceria di berbagai sudut kampus. Foto bersama ini menjadi kenang-kenangan manis di awal perjalanan kami sebagai mahasiswa.', 'gambar1.jpeg', '2023-08-27 10:45:32', 'admin'),
(2, 'Wonosobo', 'Aku dan teman-teman sepakat untuk mengadakan liburan singkat ke Wonosobo setelah penantian panjang wacana. Tujuan kami yaitu ada 3 wisata yang pertama yaitu di Candi Arjuna kemudian dilanjuttkan ke Kawah Sikidang dan destinasi terakhir yaitu ke Caffe The Heaven yang lagi viral di daerah Wonosobo. Aku sangat kagum dengan keindahan daerah Wonosobo yang masih sejuk dan asri begitu cantik pemandangannya banyak bunga bunga yang sangat indah cocok untuk buat berfoto-foto.', 'gambar2.jpg', '2024-03-15 08:15:23', 'admin'),
(3, 'Photo Studi', 'Setelah menunggu cukup lama dan menyesuaikan jadwal yang padat, akhirnya rencana lama untuk melakukan sesi foto studio dengan teman-teman SMA sehabis liburan semester kuliah akhirnya terwujud. Awalnya, ini hanya jadi wacana setiap kali ingin menentukan tanggal, pasti ada saja yang berhalangan. Sesi foto pun penuh canda tawa, membawa kembali kenangan masa SMA yang tak terlupakan.', 'gambar3.JPG', '2024-03-03 19:21:13', 'admin'),
(4, 'Bukber', 'Buka puasa bersama sekaligus reuni dengan teman-teman les SMA menjadi momen yang sangat dinantikan. Suasana akrab dan hangat langsung terasa saat kami saling bertukar kabar dan cerita tentang kehidupan masing-masing. Banyak kenangan masa SMA yang kembali terngiang, membuat kami tertawa bersama mengingat tingkah konyol saat itu. Kami tidak lupa untuk mengabadikan buka puasa ini dengan berfoto-foto.', 'gambar4.jpeg', '2024-05-24 20:45:13', 'admin'),
(8, 'Candi Arjuna', 'Candi Arjuna di Dieng, Wonosobo, merupakan salah satu candi Hindu tertua di Indonesia yang memadukan pesona sejarah dan keindahan alam pegunungan. Berdiri megah dengan arsitektur khas Hindu, candi ini dikelilingi hamparan rumput hijau, kabut tipis, dan perbukitan, menciptakan suasana mistis nan menenangkan. Tempat ini populer bagi wisatawan dan fotografer, terutama saat matahari terbit, serta menjadi lokasi upacara tradisional seperti Dieng Culture Festival.', '20241213160332.jpeg', '2024-12-13 16:03:32', 'admin'),
(10, 'Photo Booth', 'Suatu sore di Queen City, kami sedang jalan-jalan santai tanpa rencana apa pun. Tiba-tiba, terlihat sebuah foto booth unik dengan lampu neon yang mencolok di sudut jalan. Tanpa pikir panjang, kami langsung masuk dan mulai berpose, tertawa tanpa henti karena spontanitasnya. Hasil fotonya penuh ekspresi kocak dan tak terduga, menjadi kenang-kenangan dadakan yang tak terlupakan. Kadang, hal-hal tak direncanakan memang yang paling berkesan!', '20241213160348.jpg', '2024-12-13 16:03:48', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `tanggal`, `gambar`) VALUES
(1, '2024-05-24 22:20:13', 'gambar4.jpeg'),
(2, '2024-03-15 08:15:23', 'gambar2.jpg'),
(3, '2024-03-03 19:21:13', 'gambar3.JPG'),
(4, '2023-08-27 10:45:32', 'gambar1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `foto`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
