-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Apr 2021 pada 06.35
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahlikode-chat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_account`
--

CREATE TABLE `tbl_account` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `join_date` varchar(225) NOT NULL,
  `ban_account` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_account`
--

INSERT INTO `tbl_account` (`user_id`, `unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`, `join_date`, `ban_account`) VALUES
(26, 251082529, 'Ahli', 'Kode', 'ahlikode@gmail.com', '$2y$10$/YA3ENm0uMfGSTAhE8DCXeeub9vrnurTOjZKhTXoU.rLQma7DWH3y', '1618374786devover.jpg', 'offline', '14-Apr-2021', 't'),
(27, 609130802, 'Admin ', 'istrator', 'admin@gmail.com', '$2y$10$VSmeKyatAdX5Wp8ZpM2/Q./msMQ88f5EdW2/DCTe7Wy5dWRDEzOGi', '1618374817smkbisa-.jpg', 'offline', '14-Apr-2021', 't');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_configration`
--

CREATE TABLE `tbl_configration` (
  `id_config` int(11) NOT NULL,
  `fname` varchar(225) NOT NULL,
  `lname` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `create_date` varchar(225) NOT NULL,
  `s` varchar(2) NOT NULL,
  `a` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_configration`
--

INSERT INTO `tbl_configration` (`id_config`, `fname`, `lname`, `email`, `password`, `create_date`, `s`, `a`) VALUES
(1, 'Ahli', 'Kode', 'admin@gmail.com', '$2y$10$VSmeKyatAdX5Wp8ZpM2/Q./msMQ88f5EdW2/DCTe7Wy5dWRDEzOGi', '10-sep-2021', '1', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_language`
--

CREATE TABLE `tbl_language` (
  `id_language` int(11) NOT NULL,
  `Name_language` varchar(225) NOT NULL,
  `action` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_language`
--

INSERT INTO `tbl_language` (`id_language`, `Name_language`, `action`) VALUES
(1, 'Indonesia', 'Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_messages`
--

CREATE TABLE `tbl_messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `chat_date` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_report`
--

CREATE TABLE `tbl_report` (
  `id_report` int(11) NOT NULL,
  `incoming_id` int(225) NOT NULL,
  `categori` varchar(225) NOT NULL,
  `massage_report` varchar(225) NOT NULL,
  `img` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL,
  `report_Date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_report`
--

INSERT INTO `tbl_report` (`id_report`, `incoming_id`, `categori`, `massage_report`, `img`, `status`, `report_Date`) VALUES
(14, 251082529, 'Tes Laporan', 'tes', '1618374866devover.jpg', 'Checking', '14-Apr-2021');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_site`
--

CREATE TABLE `tbl_site` (
  `id_site` int(12) NOT NULL,
  `nama_site` varchar(225) NOT NULL,
  `description_site` text NOT NULL,
  `author_site` varchar(225) NOT NULL,
  `default_lang` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_site`
--

INSERT INTO `tbl_site` (`id_site`, `nama_site`, `description_site`, `author_site`, `default_lang`) VALUES
(1, 'Chattapp', 'Chattapp', 'Chattapp', 'indonesia');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `tbl_configration`
--
ALTER TABLE `tbl_configration`
  ADD PRIMARY KEY (`id_config`);

--
-- Indeks untuk tabel `tbl_language`
--
ALTER TABLE `tbl_language`
  ADD PRIMARY KEY (`id_language`);

--
-- Indeks untuk tabel `tbl_messages`
--
ALTER TABLE `tbl_messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indeks untuk tabel `tbl_report`
--
ALTER TABLE `tbl_report`
  ADD PRIMARY KEY (`id_report`);

--
-- Indeks untuk tabel `tbl_site`
--
ALTER TABLE `tbl_site`
  ADD PRIMARY KEY (`id_site`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_account`
--
ALTER TABLE `tbl_account`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tbl_configration`
--
ALTER TABLE `tbl_configration`
  MODIFY `id_config` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_language`
--
ALTER TABLE `tbl_language`
  MODIFY `id_language` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_messages`
--
ALTER TABLE `tbl_messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT untuk tabel `tbl_report`
--
ALTER TABLE `tbl_report`
  MODIFY `id_report` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_site`
--
ALTER TABLE `tbl_site`
  MODIFY `id_site` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
