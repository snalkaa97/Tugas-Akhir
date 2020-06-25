-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jun 2020 pada 16.04
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas-akhir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `user_admin` varchar(30) NOT NULL,
  `password_admin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama_admin`, `user_admin`, `password_admin`) VALUES
(1, 'Admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_lppm`
--

CREATE TABLE `data_lppm` (
  `id_data` int(11) NOT NULL,
  `nip` varchar(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `jml_pn` int(11) NOT NULL,
  `jml_jia` int(11) NOT NULL,
  `jml_ji` int(11) NOT NULL,
  `jml_jna` int(11) NOT NULL,
  `jml_jn` int(11) NOT NULL,
  `jml_jl` int(11) NOT NULL,
  `jml_pl` int(11) NOT NULL,
  `jml_sm` int(11) NOT NULL,
  `jml_pg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_lppm`
--

INSERT INTO `data_lppm` (`id_data`, `nip`, `nama`, `id_dosen`, `jml_pn`, `jml_jia`, `jml_ji`, `jml_jna`, `jml_jn`, `jml_jl`, `jml_pl`, `jml_sm`, `jml_pg`) VALUES
(8, '301', 'Budi', 10, 3, 0, 0, 3, 0, 0, 1, 2, 1),
(9, '301', 'Budi', 11, 2, 0, 0, 0, 3, 1, 3, 2, 1),
(10, '301', 'Budi', 13, 5, 0, 0, 2, 0, 1, 2, 3, 1),
(11, '301', 'Budi', 23, 2, 1, 0, 2, 1, 4, 2, 1, 2),
(12, '301', 'Budi', 26, 5, 0, 3, 0, 5, 0, 5, 5, 5),
(13, '301', 'Budi', 27, 5, 1, 0, 0, 0, 0, 3, 2, 4),
(14, '301', 'Budi', 29, 10, 0, 1, 2, 3, 5, 3, 3, 2),
(15, '301', 'Budi', 31, 7, 1, 2, 1, 4, 4, 2, 3, 3),
(16, '301', 'Budi', 33, 9, 0, 2, 1, 3, 5, 5, 7, 5),
(17, '301', 'Budi', 34, 6, 0, 4, 2, 5, 7, 7, 10, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen_peserta`
--

CREATE TABLE `dosen_peserta` (
  `id_dosen` int(11) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pendidikan` varchar(10) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `c1` double NOT NULL DEFAULT 1,
  `c2` double NOT NULL DEFAULT 1,
  `c3` double NOT NULL DEFAULT 1,
  `c4` double NOT NULL DEFAULT 1,
  `c5` double NOT NULL DEFAULT 1,
  `c6` double NOT NULL DEFAULT 1,
  `c7` double NOT NULL DEFAULT 1,
  `c8` double NOT NULL DEFAULT 1,
  `c9` double NOT NULL DEFAULT 1,
  `c10` double NOT NULL DEFAULT 1,
  `c4_saw` double NOT NULL DEFAULT 1,
  `c5_saw` double NOT NULL DEFAULT 1,
  `c6_saw` double NOT NULL DEFAULT 1,
  `c7_saw` double DEFAULT 1,
  `c8_saw` double NOT NULL DEFAULT 1,
  `c9_saw` double NOT NULL DEFAULT 1,
  `c10_saw` double NOT NULL DEFAULT 1,
  `vektor_s` double NOT NULL,
  `vektor_v` double NOT NULL,
  `total_nilai_saw` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen_peserta`
--

INSERT INTO `dosen_peserta` (`id_dosen`, `nip`, `nama`, `jurusan`, `alamat`, `pendidikan`, `jabatan`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `c7`, `c8`, `c9`, `c10`, `c4_saw`, `c5_saw`, `c6_saw`, `c7_saw`, `c8_saw`, `c9_saw`, `c10_saw`, `vektor_s`, `vektor_v`, `total_nilai_saw`) VALUES
(10, '101', 'Rita', 'Teknik Informatika', 'Bogor', 'S2', 'Asisten Ahli', 13.9333, 4.4, 4.0667, 3, 3, 3, 4, 3, 2, 2, 1, 1, 1, 1, 1, 1, 1, 3.9607776398183, 0.19718489361653, 0.6853),
(13, 'dsn5', 'Yana', 'Teknik Informatika', 'Sukabumi', 'S2', 'Pengajar', 10.95, 4, 3.7, 3, 5, 3, 3, 4, 2, 1, 1, 1, 1, 1, 1, 1, 1, 3.7001664974916, 0.18421052720465, 0.6553),
(23, '201', 'Rully', 'Teknik Informatika', 'Bekasi', 'S2', 'Pengajar', 11.25, 4.2, 3.8, 3, 2, 2, 2, 2, 3, 1, 1, 1, 1, 1, 1, 1, 1, 3.1316055416581, 0.15590506757383, 0.7942),
(26, '206', 'Popy', 'Teknik Informatika', 'Jakarta', 'S2', 'Pengajar', 13.1333, 4.8, 4.5, 3, 5, 3, 5, 5, 5, 1, 1, 1, 1, 1, 1, 1, 1, 4.5475448885818, 0.22639674241155, 0.6406),
(27, '210', 'Retnani', 'Teknik Informatika', 'Jakarta', 'S2', 'Pengajar', 18.8, 4.4, 4.6, 3, 5, 5, 4, 3, 5, 1, 1, 1, 1, 1, 1, 1, 1, 4.7465234647677, 0.23630276919345, 0.6778),
(29, '601', 'Deni Almanda', 'Teknik Elektro', 'Bogor', 'S2', 'Pengajar', 4.1, 4.4, 4.8, 3, 5, 3, 4, 4, 3, 1, 3, 1, 3, 2, 2, 3, 5, 3.5349665831739, 0.074845337587598, 0.6664),
(31, '602', 'Idhar Mahasen', 'Teknik Elektro', 'Jakarta', 'S2', 'Pengajar', 4.65, 4.8, 4.8, 3, 5, 5, 3, 4, 4, 1, 3, 1, 1, 3, 2, 2, 5, 3.8342732965537, 0.081182515458465, 0.76),
(33, '603', 'Sultan', 'Teknik Elektro', 'Bekasi', 'S2', 'Pengajar', 4.8, 4.4, 4.4, 3, 5, 3, 5, 5, 5, 1, 3, 1, 3, 1, 1, 1, 5, 3.8550126612887, 0.081621627036586, 0.8049),
(34, '604', 'Dewi', 'Teknik Elektro', 'Bekasi', 'S3', 'Lektor Kepala', 5, 5, 4.8, 5, 5, 3, 5, 5, 5, 4, 1, 1, 3, 1, 1, 1, 4, 4.6422399920912, 0.098289477763253, 0.8533),
(35, '300', 'Syamsudin AB', 'Teknik Kimia', 'Bogor', 'S2', 'Pengajar', 1, 1, 1, 3, 1, 1, 1, 1, 1, 1, 3, 1, 1, 1, 1, 1, 5, 0, 0, 0),
(36, '301', 'Sri Yuni', 'Teknik Kimia', 'Jakarta', 'S3', 'Lektor Kepala', 1, 1, 1, 5, 1, 1, 1, 1, 1, 4, 1, 1, 1, 1, 1, 1, 2, 0, 0, 0),
(37, '500', 'Hikmatu Manzila', 'Teknik Industri', 'Jakarta', 'S2', 'Pengajar', 1, 1, 1, 3, 1, 1, 1, 1, 1, 1, 3, 1, 1, 1, 1, 1, 5, 0, 0, 0),
(38, '605', 'Fahri', 'Teknik Elektro', 'Bekasi', 'S2', 'Asisten Ahli', 4.8, 4.8, 4.4, 3, 5, 3, 5, 5, 4, 2, 3, 1, 3, 1, 1, 2, 4, 4.0482555532626, 0.085713130915303, 0.7913),
(39, '606', 'Jihan', 'Teknik Elektro', 'Jakarta', 'S2', 'Pengajar', 4.65, 4.8, 4.4, 3, 5, 5, 5, 4, 4, 2, 3, 1, 1, 1, 2, 2, 4, 4.1744652646506, 0.088385350930234, 0.8185),
(40, '607', 'Aldi', 'Teknik Elektro', 'Bogor', 'S2', 'Pengajar', 4.1, 4.4, 4.8, 3, 5, 5, 5, 4, 4, 2, 3, 1, 1, 1, 2, 2, 4, 4.0963823596046, 0.086732112844248, 0.8024),
(41, '609', 'Dinda', 'Teknik Elektro', 'Bekasi', 'S2', 'Pengajar', 4.8, 4.4, 4.4, 3, 5, 3, 5, 5, 4, 1, 3, 1, 3, 1, 1, 2, 5, 3.7868055742235, 0.080177488220236, 0.7649),
(42, '611', 'Anggun', 'Teknik Elektro', 'Bogor', 'S2', 'Pengajar', 4.8, 4.4, 4.4, 3, 5, 3, 5, 5, 4, 1, 3, 1, 3, 1, 1, 2, 5, 3.7868055742235, 0.080177488220236, 0.7649),
(43, '612', 'Wibi', 'Teknik Elektro', 'Jakarta', 'S2', 'Pengajar', 4.1, 4.4, 4.4, 3, 5, 3, 4, 4, 4, 1, 3, 1, 3, 2, 2, 2, 5, 3.5765796294836, 0.075726404614913, 0.6689),
(44, '613', 'Firman', 'Teknik Elektro', 'Bekasi', 'S2', 'Pengajar', 4.65, 4.8, 4.8, 3, 5, 5, 4, 5, 4, 1, 3, 1, 1, 2, 1, 2, 5, 3.9853077598253, 0.084380346364344, 0.8083),
(45, '614', 'Galih', 'Teknik Elektro', 'Bogor', 'S2', 'Asisten Ahli', 4.1, 4.4, 4.4, 3, 5, 3, 5, 5, 4, 2, 3, 1, 3, 1, 1, 2, 4, 3.9091901903341, 0.082768720044584, 0.7599);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_dosen`
--

CREATE TABLE `nilai_dosen` (
  `id` int(11) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `q1` double NOT NULL,
  `q2` double NOT NULL,
  `q3` double NOT NULL,
  `q4` double NOT NULL,
  `q5` double NOT NULL,
  `avg` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_dosen`
--

INSERT INTO `nilai_dosen` (`id`, `nip`, `nama`, `jurusan`, `id_dosen`, `q1`, `q2`, `q3`, `q4`, `q5`, `avg`) VALUES
(17, '201', 'Nani', 'Teknik Informatika', 10, 4, 4, 3, 3, 4, 3.6),
(18, '202', 'Baya', 'Teknik Informatika', 10, 5, 3, 4, 4, 3, 3.8),
(19, '203', 'Emi', 'Teknik Informatika', 11, 5, 4, 4, 4, 4, 4.2),
(20, '201', 'Nani', 'Teknik Informatika', 11, 4, 4, 3, 3, 4, 3.6),
(21, '202', 'Baya', 'Teknik Informatika', 13, 4, 5, 4, 4, 3, 4),
(25, '101', 'Ayu', 'Teknik Informatika', 10, 5, 5, 5, 4, 4, 4.6),
(26, '101', 'Ayu', 'Teknik Informatika', 26, 4, 5, 5, 4, 5, 4.6),
(27, '101', 'Ayu', 'Teknik Informatika', 11, 4, 4, 4, 5, 5, 4.4),
(28, '101', 'Ayu', 'Teknik Informatika', 23, 5, 5, 3, 3, 3, 3.8),
(29, '101', 'Ayu', 'Teknik Informatika', 13, 5, 4, 3, 3, 2, 3.4),
(30, '201', 'Nani', 'Teknik Informatika', 27, 5, 4, 4, 5, 5, 4.6),
(31, '201', 'Nani', 'Teknik Informatika', 26, 4, 4, 5, 4, 5, 4.4),
(37, '300', 'Syamsudin AB', 'Teknik Kimia', 0, 0, 0, 0, 0, 0, 0),
(38, '301', 'Sri Yuni', 'Teknik Kimia', 0, 0, 0, 0, 0, 0, 0),
(39, '500', 'Hikmatu Manzila', 'Teknik Industri', 0, 0, 0, 0, 0, 0, 0),
(40, '601', 'Deni Almanda', 'Teknik Elektro', 0, 0, 0, 0, 0, 0, 0),
(41, '602', 'Idhar Mahasen', 'Teknik Elektro', 0, 0, 0, 0, 0, 0, 0),
(42, '603', 'Sultan', 'Teknik Elektro', 0, 0, 0, 0, 0, 0, 0),
(43, '604', 'Dewi', 'Teknik Elektro', 0, 0, 0, 0, 0, 0, 0),
(44, '601', 'Deni Almanda', 'Teknik Elektro', 29, 5, 5, 5, 4, 5, 4.8),
(45, '601', 'Deni Almanda', 'Teknik Elektro', 31, 4, 5, 5, 5, 5, 4.8),
(46, '601', 'Deni Almanda', 'Teknik Elektro', 33, 5, 5, 5, 3, 4, 4.4),
(47, '601', 'Deni Almanda', 'Teknik Elektro', 34, 5, 5, 5, 4, 5, 4.8),
(48, '605', 'Fahri', 'Teknik Elektro', 0, 0, 0, 0, 0, 0, 0),
(49, '606', 'Jihan', 'Teknik Elektro', 0, 0, 0, 0, 0, 0, 0),
(50, '607', 'Aldi', 'Teknik Elektro', 0, 0, 0, 0, 0, 0, 0),
(51, '609', 'Dinda', 'Teknik Elektro', 0, 0, 0, 0, 0, 0, 0),
(52, '611', 'Anggun', 'Teknik Elektro', 0, 0, 0, 0, 0, 0, 0),
(53, '612', 'Wibi', 'Teknik Elektro', 0, 0, 0, 0, 0, 0, 0),
(54, '613', 'Firman', 'Teknik Elektro', 0, 0, 0, 0, 0, 0, 0),
(55, '614', 'Galih', 'Teknik Elektro', 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_mhs`
--

CREATE TABLE `nilai_mhs` (
  `id_mhs` int(11) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `q1` double NOT NULL,
  `q2` double NOT NULL,
  `q3` double NOT NULL,
  `q4` double NOT NULL,
  `q5` double NOT NULL,
  `q6` double NOT NULL,
  `q7` double NOT NULL,
  `q8` double NOT NULL,
  `q9` double NOT NULL,
  `q10` double NOT NULL,
  `q11` double NOT NULL,
  `q12` double NOT NULL,
  `q13` double NOT NULL,
  `q14` double NOT NULL,
  `q15` double NOT NULL,
  `q16` double NOT NULL,
  `q17` double NOT NULL,
  `q18` double NOT NULL,
  `q19` double NOT NULL,
  `q20` double NOT NULL,
  `avg` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_mhs`
--

INSERT INTO `nilai_mhs` (`id_mhs`, `nim`, `nama`, `jurusan`, `id_dosen`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12`, `q13`, `q14`, `q15`, `q16`, `q17`, `q18`, `q19`, `q20`, `avg`) VALUES
(23, '2016470012', 'Adit', 'Teknik Informatika', 10, 5, 4, 4, 4, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4.4),
(24, '2016470022', 'Bani', 'Teknik Informatika', 11, 5, 5, 4, 4, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4.2),
(26, '2016470002', 'Fendi', 'Teknik Informatika', 11, 4, 4, 5, 3, 5, 4, 5, 4, 4, 5, 5, 5, 5, 4, 5, 5, 5, 4, 5, 5, 18.2),
(27, '2016470003', 'Hari', 'Teknik Informatika', 13, 4, 4, 3, 3, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3.4),
(30, '2016410001', 'Alka', ' Teknik Sipil', 0, 1, 1, 1, 1, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1.4),
(31, '2016470057', 'Syaifudin Alkatiri', 'Teknik Informatika', 10, 5, 5, 4, 4, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 19.4),
(32, '2016470057', 'Syaifudin Alkatiri', 'Teknik Informatika', 13, 4, 4, 4, 3, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 18.8),
(33, '2016470057', 'Syaifudin Alkatiri', 'Teknik Informatika', 26, 4, 4, 5, 3, 5, 5, 5, 5, 5, 4, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 18),
(34, '2016470012', 'Adit', 'Teknik Informatika', 11, 4, 4, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4.4),
(35, '2016470012', 'Adit', 'Teknik Informatika', 26, 3, 4, 4, 3, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3.8),
(36, '2016470012', 'Adit', 'Teknik Informatika', 23, 5, 5, 4, 4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4.4),
(37, '2016470012', 'Adit', 'Teknik Informatika', 13, 4, 4, 4, 4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4),
(38, '2016470057', 'Syaifudin Alkatiri', 'Teknik Informatika', 11, 5, 5, 4, 4, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4),
(39, '2016470057', 'Syaifudin Alkatiri', 'Teknik Informatika', 23, 4, 4, 3, 3, 3, 5, 5, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 17.4),
(40, '2016470003', 'Hari', 'Teknik Informatika', 23, 5, 5, 5, 4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4.6),
(41, '2016430002', 'Safira', 'Teknik Kimia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(42, '2016470057', 'Syaifudin Alkatiri', 'Teknik Informatika', 27, 5, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 19.8),
(43, '2016470002', 'Fendi', 'Teknik Informatika', 10, 5, 4, 5, 3, 5, 5, 5, 4, 4, 5, 4, 5, 4, 5, 4, 5, 5, 5, 4, 4, 18),
(44, '2016470002', 'Fendi', 'Teknik Informatika', 13, 5, 5, 4, 3, 5, 5, 5, 5, 4, 4, 3, 3, 4, 4, 5, 5, 4, 5, 5, 5, 17.6),
(45, '2016470002', 'Fendi', 'Teknik Informatika', 23, 5, 5, 5, 3, 4, 5, 5, 5, 5, 4, 4, 4, 5, 5, 5, 5, 5, 5, 4, 5, 18.6),
(46, '2016470002', 'Fendi', 'Teknik Informatika', 26, 5, 5, 4, 4, 5, 4, 4, 5, 5, 4, 4, 5, 3, 3, 3, 5, 5, 5, 5, 5, 17.6),
(47, '2016470002', 'Fendi', 'Teknik Informatika', 27, 5, 5, 5, 5, 5, 4, 4, 4, 4, 4, 4, 3, 4, 4, 4, 5, 5, 5, 5, 5, 17.8),
(48, '2018420001', 'Rafi', 'Teknik Elektro', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(54, '2016430047', 'Syilah', 'Teknik Kimia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(55, '2016420002', 'Gilang', 'Teknik Elektro', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(56, '2016420002', 'Gilang', 'Teknik Elektro', 34, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5),
(57, '2016420002', 'Gilang', 'Teknik Elektro', 29, 5, 5, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 3, 5, 4, 4, 4, 4, 4, 4.1),
(58, '2016420002', 'Gilang', 'Teknik Elektro', 31, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 4, 4, 4, 4, 4, 4, 4, 5, 5, 4.65),
(59, '2016420002', 'Gilang', 'Teknik Elektro', 33, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 4, 4, 4, 4, 5, 5, 5, 5, 5, 5, 4.8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_pimpinan`
--

CREATE TABLE `nilai_pimpinan` (
  `id_pimpinan` int(11) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `q1` double NOT NULL,
  `q2` double NOT NULL,
  `q3` double NOT NULL,
  `q4` double NOT NULL,
  `q5` double NOT NULL,
  `avg` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_pimpinan`
--

INSERT INTO `nilai_pimpinan` (`id_pimpinan`, `nip`, `nama`, `jurusan`, `id_dosen`, `q1`, `q2`, `q3`, `q4`, `q5`, `avg`) VALUES
(37, '301', 'Rahmi Tiara', 'Teknik Industri', 0, 0, 0, 0, 0, 0, 0),
(39, '200', 'Budi', 'Teknik Elektro', 0, 0, 0, 0, 0, 0, 0),
(43, '101', 'Rita Rosanty', 'Teknik Informatika', 0, 0, 0, 0, 0, 0, 0),
(44, '200', 'Budi', 'Teknik Elektro', 29, 4, 4, 4, 5, 5, 4.4),
(45, '200', 'Budi', 'Teknik Elektro', 31, 5, 5, 5, 5, 4, 4.8),
(46, '200', 'Budi', 'Teknik Elektro', 33, 5, 5, 4, 4, 4, 4.4),
(47, '200', 'Budi', 'Teknik Elektro', 34, 5, 5, 5, 5, 5, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_pimpinan_tendik`
--

CREATE TABLE `nilai_pimpinan_tendik` (
  `id_pimpinan` int(20) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `tendik` varchar(60) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `id_tendik` int(20) NOT NULL,
  `q1` double NOT NULL,
  `q2` double NOT NULL,
  `q3` double NOT NULL,
  `q4` double NOT NULL,
  `q5` double NOT NULL,
  `q6` double NOT NULL,
  `q7` double NOT NULL,
  `q8` double NOT NULL,
  `q9` double NOT NULL,
  `q10` double NOT NULL,
  `q11` double NOT NULL,
  `q12` double NOT NULL,
  `q13` double NOT NULL,
  `q14` double NOT NULL,
  `q15` double NOT NULL,
  `q16` double NOT NULL,
  `q17` double NOT NULL,
  `q18` double NOT NULL,
  `q19` double NOT NULL,
  `q20` double NOT NULL,
  `q21` double NOT NULL,
  `q22` double NOT NULL,
  `q23` double NOT NULL,
  `q24` double NOT NULL,
  `q25` double NOT NULL,
  `q26` double NOT NULL,
  `q27` double NOT NULL,
  `q28` double NOT NULL,
  `q29` double NOT NULL,
  `rata_kehadiran` double NOT NULL,
  `rata_tanggungjawab` double NOT NULL,
  `rata_kerjasama` double NOT NULL,
  `rata_loyalitas` double NOT NULL,
  `rata_kearsipan` double NOT NULL,
  `rata_pelayanan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_pimpinan_tendik`
--

INSERT INTO `nilai_pimpinan_tendik` (`id_pimpinan`, `nip`, `nama`, `jabatan`, `tendik`, `jurusan`, `id_tendik`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12`, `q13`, `q14`, `q15`, `q16`, `q17`, `q18`, `q19`, `q20`, `q21`, `q22`, `q23`, `q24`, `q25`, `q26`, `q27`, `q28`, `q29`, `rata_kehadiran`, `rata_tanggungjawab`, `rata_kerjasama`, `rata_loyalitas`, `rata_kearsipan`, `rata_pelayanan`) VALUES
(7, '102', 'Retnani Latifah', 'Kepala Laboratorium', 'Laboratorium', 'Teknik Informatika', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, '101', 'Rita Rosanty', 'Kepala Program Studi', 'Administrasi Prodi', 'Teknik Informatika', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, '900', 'Benyamin Suep', 'Kepala Perpustakaan', 'Perpustakaan', 'Perpustakaan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, '301', 'Rahmi Tiara', 'Kepala Program Studi', 'Administrasi Prodi', 'Teknik Industri', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, '302', 'Nensi', 'Kepala Laboratorium', 'Laboratorium', 'Teknik Industri', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, '102', 'Retnani Latifah', 'Kepala Laboratorium', '', 'Teknik Informatika', 0, 5, 5, 5, 3, 5, 5, 5, 5, 5, 4, 4, 5, 5, 4, 4, 5, 2, 5, 5, 5, 4, 4, 4, 4, 4, 4, 4, 5, 4, 4.6666666666667, 4.6, 4.6, 4.25, 4, 4.2),
(14, '102', 'Retnani Latifah', 'Kepala Laboratorium', 'Laboratorium', 'Teknik Informatika', 10, 5, 5, 5, 4, 5, 5, 5, 4, 4, 4, 5, 4, 4, 4, 4, 4, 5, 5, 5, 5, 4, 3, 4, 4, 4, 4, 4, 4, 4, 4.8333333333333, 4.4, 4, 5, 3.75, 4),
(15, '102', 'Retnani Latifah', 'Kepala Laboratorium', 'Laboratorium', 'Teknik Informatika', 11, 5, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 3, 4, 3, 3, 4.1666666666667, 4, 4, 4, 4, 3.4),
(16, '102', 'Retnani Latifah', 'Kepala Laboratorium', 'Laboratorium', 'Teknik Informatika', 12, 4, 4, 5, 4, 5, 5, 5, 5, 5, 5, 5, 4, 4, 4, 4, 4, 4, 5, 5, 5, 4, 4, 4, 4, 4, 5, 4, 5, 5, 4.5, 5, 4, 4.75, 4, 4.6),
(17, '100', 'Gericko', 'Kepala Laboratorium', 'Laboratorium', ' Teknik Sipil', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, '200', 'Fachri', 'Kepala Laboratorium', 'Laboratorium', 'Teknik Elektro', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19, '900', 'Benyamin Suep', 'Kepala Perpustakaan', 'Perpustakaan', 'Perpustakaan', 36, 5, 4, 3, 5, 3, 5, 5, 4, 3, 3, 3, 4, 4, 4, 4, 4, 4, 5, 3, 4, 4, 4, 4, 4, 5, 4, 5, 4, 3, 4.1666666666667, 3.6, 4, 4, 4, 4.2),
(20, '900', 'Benyamin Suep', 'Kepala Perpustakaan', 'Perpustakaan', 'Perpustakaan', 37, 4, 4, 4, 5, 4, 5, 3, 4, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 3, 3, 4, 3, 5, 4, 4, 4, 4, 4.3333333333333, 3.4, 4, 4, 3.25, 4.2),
(21, '900', 'Benyamin Suep', 'Kepala Perpustakaan', 'Perpustakaan', 'Perpustakaan', 38, 5, 5, 4, 5, 5, 5, 5, 5, 4, 4, 4, 4, 3, 3, 4, 5, 4, 5, 4, 3, 5, 4, 4, 4, 3, 4, 4, 4, 4, 4.8333333333333, 4.4, 3.8, 4, 4.25, 3.8),
(22, '900', 'Benyamin Suep', 'Kepala Perpustakaan', 'Perpustakaan', 'Perpustakaan', 39, 4, 4, 5, 5, 3, 5, 4, 4, 4, 4, 4, 4, 5, 5, 5, 5, 4, 5, 5, 5, 5, 4, 5, 5, 5, 4, 4, 4, 4, 4.3333333333333, 4, 4.8, 4.75, 4.75, 4.2),
(23, '900', 'Benyamin Suep', 'Kepala Perpustakaan', '', 'Perpustakaan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(24, '102', 'Retnani Latifah', 'Kepala Laboratorium', '', 'Teknik Informatika', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(25, '102', 'Retnani Latifah', 'Kepala Laboratorium', '', 'Teknik Informatika', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(26, '301', 'Rahmi Tiara', 'Kepala Program Studi', '', 'Teknik Industri', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27, '102', 'Retnani Latifah', 'Kepala Laboratorium', '', 'Teknik Informatika', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28, '102', 'Retnani Latifah', 'Kepala Laboratorium', '', 'Teknik Informatika', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(29, '900', 'Benyamin Suep', 'Kepala Perpustakaan', '', 'Perpustakaan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(30, '200', 'Budi', 'Kepala Program Studi', '', 'Teknik Elektro', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(31, '610', 'Taslim', 'Kepala Laboratorium', '', 'Arsitektur', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(33, '900', 'Benyamin Suep', 'Kepala Perpustakaan', 'Perpustakaan', 'Perpustakaan', 40, 4, 4, 4, 5, 4, 5, 4, 4, 4, 3, 4, 4, 4, 4, 4, 3, 4, 4, 4, 4, 4, 3, 4, 4, 4, 4, 4, 4, 4, 4.3333333333333, 3.8, 3.8, 4, 3.75, 4),
(34, '900', 'Benyamin Suep', 'Kepala Perpustakaan', 'Perpustakaan', 'Perpustakaan', 41, 5, 5, 4, 5, 4, 5, 5, 5, 4, 5, 5, 4, 4, 5, 5, 4, 5, 4, 4, 4, 5, 4, 5, 5, 4, 4, 4, 4, 4, 4.6666666666667, 4.8, 4.4, 4.25, 4.75, 4),
(35, '900', 'Benyamin Suep', 'Kepala Perpustakaan', 'Perpustakaan', 'Perpustakaan', 42, 4, 4, 4, 5, 5, 5, 5, 5, 5, 4, 4, 4, 4, 4, 4, 4, 3, 4, 3, 3, 4, 4, 4, 4, 4, 4, 3, 4, 5, 4.5, 4.6, 4, 3.25, 4, 4),
(36, '900', 'Benyamin Suep', 'Kepala Perpustakaan', 'Perpustakaan', 'Perpustakaan', 43, 4, 4, 5, 5, 3, 5, 5, 4, 5, 5, 5, 4, 4, 4, 4, 4, 4, 4, 4, 4, 3, 3, 3, 3, 4, 4, 4, 4, 3, 4.3333333333333, 4.8, 4, 4, 3, 3.8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bobot_baru`
--

CREATE TABLE `tb_bobot_baru` (
  `id` int(10) NOT NULL,
  `b1` double NOT NULL,
  `b2` double NOT NULL,
  `b3` double NOT NULL,
  `b4` double NOT NULL,
  `b5` double NOT NULL,
  `b6` double NOT NULL,
  `b7` double NOT NULL,
  `b8` double NOT NULL,
  `b9` double NOT NULL,
  `b10` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_bobot_baru`
--

INSERT INTO `tb_bobot_baru` (`id`, `b1`, `b2`, `b3`, `b4`, `b5`, `b6`, `b7`, `b8`, `b9`, `b10`) VALUES
(1, 0.15, 0.13, 0.13, 0.08, 0.1, 0.1, 0.08, 0.07, 0.08, 0.08);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bobot_baru_tendik`
--

CREATE TABLE `tb_bobot_baru_tendik` (
  `id_bobot` int(20) NOT NULL,
  `b1` double NOT NULL,
  `b2` double NOT NULL,
  `b3` double NOT NULL,
  `b4` double NOT NULL,
  `b5` double NOT NULL,
  `b6` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_bobot_baru_tendik`
--

INSERT INTO `tb_bobot_baru_tendik` (`id_bobot`, `b1`, `b2`, `b3`, `b4`, `b5`, `b6`) VALUES
(1, 0.15, 0.2, 0.2, 0.15, 0.15, 0.15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hmp_kriteria`
--

CREATE TABLE `tb_hmp_kriteria` (
  `id_hmp` int(11) NOT NULL,
  `himpunan` varchar(70) NOT NULL,
  `keterangan` varchar(40) NOT NULL,
  `nilai` int(11) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_hmp_kriteria`
--

INSERT INTO `tb_hmp_kriteria` (`id_hmp`, `himpunan`, `keterangan`, `nilai`, `nama_kriteria`) VALUES
(1, '86 - 100', 'sangat baik', 5, 'penilaian mahasiswa '),
(2, '76 - 85', 'baik', 4, 'penilaian mahasiswa '),
(3, '66 - 75', 'cukup', 3, 'penilaian mahasiswa '),
(4, '51 - 65', 'kurang', 2, 'penilaian mahasiswa '),
(5, '0 - 50', 'sangat kurang', 1, 'penilaian mahasiswa '),
(8, '89 - 100', 'sangat baik', 5, 'penilaian dosen sejawat'),
(9, '76 - 85', 'baik', 4, 'penilaian dosen sejawat '),
(10, '66 -75', 'cukup', 3, 'penilaian dosen sejawat'),
(11, '51 - 65', 'kurang', 2, 'penilaian dosen sejawat '),
(12, '0 - 50', 'sangat kurang', 1, 'penilaian dosen sejawat'),
(13, '86 - 100', 'sangat baik', 5, 'penilaian pimpinan'),
(14, '76 - 85', 'baik', 4, 'penilaian pimpinan'),
(15, '66 - 75', 'cukup', 3, 'penilaian pimpinan'),
(16, '51 - 65', 'kurang', 2, 'penilaian pimpinan'),
(17, '0 - 50', 'sangat kurang', 1, 'penilaian pimpinan'),
(18, 'S3', 'baik', 5, 'kualifikasi pendidikan'),
(19, 'S2', 'cukup', 3, 'kualifikasi pendidikan'),
(20, 'S1', 'kurang', 1, 'kualifikasi pendidikan'),
(21, '>= 4', 'sangat baik', 5, 'penelitian'),
(22, '3', 'baik', 4, 'penelitian'),
(23, '2', 'cukup', 3, 'penelitian'),
(24, '1', 'kurang', 2, 'penelitian'),
(25, '0', 'sangat kurang', 1, 'penelitian'),
(26, '>=1  Jurnal Internasional Akreditasi  ', 'sangat baik', 5, 'jurnal'),
(27, '>=3  Jurnal Nasional Terakreditasi    ', 'cukup', 4, 'jurnal'),
(28, '1-2  Jurnal Nasional Terakreditasi    ', 'cukup', 3, 'jurnal'),
(29, '>=1  Jurnal Internasional                 ', 'cukup', 3, 'jurnal'),
(30, '>=3  Jurnal Nasional                       ', 'cukup', 3, 'jurnal'),
(31, '1-2  Jurnal Nasional                       ', 'kurang', 2, 'jurnal'),
(32, '>=3  Jurnal Lokal                            ', 'kurang', 2, 'jurnal'),
(35, '1-2  Jurnal Lokal                            ', 'sangat kurang', 1, 'jurnal'),
(36, '>=4', 'Sangat Baik', 5, 'pelatihan'),
(38, '2', 'cukup', 3, 'pelatihan'),
(39, '1', 'kurang', 2, 'pelatihan'),
(40, 'o', 'sangat kurang', 1, 'pelatihan'),
(41, '3', 'baik', 4, 'pelatihan'),
(42, '>=4', 'sangat baik', 5, 'seminar'),
(43, '3', 'baik', 4, 'seminar'),
(44, '2', 'cukup', 3, 'seminar'),
(45, '1', 'kurang', 2, 'seminar'),
(46, '0', 'sangat kurang', 1, 'seminar'),
(47, '>=4', 'sangat baik', 5, 'pengabdian masyarakat'),
(48, '3', 'baik', 4, 'pengabdian masyarakat'),
(49, '2', 'cukup', 3, 'pengabdian masyarakat'),
(50, '1', 'kurang', 2, 'pengabdian masyarakat'),
(51, '0', 'sangat kurang', 1, 'pengabdian masyarakat'),
(52, 'guru besar', 'sangat baik', 5, 'jabatan akademik'),
(53, 'lektor kepala', 'baik', 4, 'jabatan akademik'),
(54, 'lektor', 'cukup', 3, 'jabatan akademik'),
(55, 'asisten ahli', 'kurang', 2, 'jabatan akademik'),
(56, 'pengajar', 'sangat kurang', 1, 'jabatan akademik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hmp_kriteria_tendik`
--

CREATE TABLE `tb_hmp_kriteria_tendik` (
  `id_hmp` int(11) NOT NULL,
  `himpunan` varchar(70) NOT NULL,
  `keterangan` varchar(40) NOT NULL,
  `nilai` int(11) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_hmp_kriteria_tendik`
--

INSERT INTO `tb_hmp_kriteria_tendik` (`id_hmp`, `himpunan`, `keterangan`, `nilai`, `nama_kriteria`) VALUES
(1, '86 - 100', 'sangat baik', 5, 'Kehadiran'),
(2, '76 - 85', 'baik', 4, 'Kehadiran'),
(3, '66 - 75', 'cukup', 3, 'Kehadiran'),
(4, '51 - 65', 'kurang', 2, 'Kehadiran'),
(5, '0 - 50', 'sangat kurang', 1, 'Kehadiran'),
(8, '89 - 100', 'sangat baik', 5, 'Tanggung Jawab Pekerjaan'),
(9, '76 - 85', 'baik', 4, 'Tanggung Jawab Pekerjaan'),
(10, '66 -75', 'cukup', 3, 'Tanggung Jawab Pekerjaan'),
(11, '51 - 65', 'kurang', 2, 'Tanggung Jawab Pekerjaan'),
(12, '0 - 50', 'sangat kurang', 1, 'Tanggung Jawab Pekerjaan'),
(13, '86 - 100', 'sangat baik', 5, 'Kerjasama'),
(14, '76 - 85', 'baik', 4, 'Kerjasama'),
(15, '66 - 75', 'cukup', 3, 'Kerjasama'),
(16, '51 - 65', 'kurang', 2, 'Kerjasama'),
(17, '0 - 50', 'sangat kurang', 1, 'Kerjasama'),
(57, '86 - 100', 'sangat baik', 5, 'Kearsipan'),
(58, '76 - 85', 'baik', 4, 'Kearsipan'),
(59, '66 - 75', 'cukup', 3, 'Kearsipan'),
(60, '51 - 65', 'kurang', 2, 'Kearsipan'),
(61, '0 - 50', 'sangat kurang', 1, 'Kearsipan'),
(62, '86 - 100', 'sangat baik', 5, 'Loyalitas'),
(63, '76 - 85', 'baik', 4, 'Loyalitas'),
(64, '66 - 75', 'cukup', 3, 'Loyalitas'),
(65, '51 - 65', 'kurang', 2, 'Loyalitas'),
(66, '0 - 50', 'sangat kurang', 1, 'Loyalitas'),
(67, '86 - 100', 'sangat baik', 5, 'Pelayanan'),
(68, '76 - 85', 'baik', 4, 'Pelayanan'),
(69, '66 - 75', 'cukup', 3, 'Pelayanan'),
(70, '51 - 65', 'kurang', 2, 'Pelayanan'),
(71, '0 - 50', 'sangat kurang', 1, 'Pelayanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`id_kriteria`, `nama_kriteria`, `bobot`) VALUES
(1, 'Penilaian Mahasiswa ', 15),
(2, 'Penilaian Dosen Sejawat ', 13),
(3, 'Penilaian Pimpinan ', 13),
(4, 'Kualifikasi Pendidikan ', 8),
(5, 'Penelitian', 10),
(6, 'Jurnal ', 10),
(7, 'Pelatihan ', 8),
(8, 'Seminar ', 7),
(9, 'Pengabdian Masyarakat ', 8),
(10, 'Jabatan Akademik ', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kriteria_tendik`
--

CREATE TABLE `tb_kriteria_tendik` (
  `id_kriteria` int(20) NOT NULL,
  `nama_kriteria` varchar(128) NOT NULL,
  `bobot` int(10) NOT NULL,
  `bobot_baru` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kriteria_tendik`
--

INSERT INTO `tb_kriteria_tendik` (`id_kriteria`, `nama_kriteria`, `bobot`, `bobot_baru`) VALUES
(1, 'Kehadiran', 15, 0.15),
(2, 'Tanggung Jawab Pekerjaan', 20, 0.15),
(3, 'Kerjasama', 20, 0.15),
(4, 'Loyalitas', 15, 0.15),
(5, 'Kearsipan', 15, 0.15),
(6, 'Pelayanan', 15, 0.15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tendik_peserta`
--

CREATE TABLE `tendik_peserta` (
  `id_tendik` int(11) NOT NULL,
  `nip` varchar(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `tendik` varchar(60) NOT NULL,
  `jurusan` varchar(60) NOT NULL,
  `c1` double NOT NULL DEFAULT 1,
  `c2` double NOT NULL DEFAULT 1,
  `c3` double NOT NULL DEFAULT 1,
  `c4` double NOT NULL DEFAULT 1,
  `c5` double NOT NULL DEFAULT 1,
  `c6` double NOT NULL DEFAULT 1,
  `c1_saw` double NOT NULL DEFAULT 1,
  `vektor_s` double NOT NULL,
  `vektor_v` double NOT NULL,
  `nilai_total_saw` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tendik_peserta`
--

INSERT INTO `tendik_peserta` (`id_tendik`, `nip`, `nama`, `tendik`, `jurusan`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `c1_saw`, `vektor_s`, `vektor_v`, `nilai_total_saw`) VALUES
(10, '401', 'Aryuni', 'Laboratorium', 'Teknik Informatika', 4.8333333333333, 4.4, 4, 5, 3.75, 4, 1, 4.2953517582253, 0.33864825291344, 0.82105978260869),
(11, '402', 'Iffah', 'Laboratorium', 'Teknik Informatika', 4.1666666666667, 4, 4, 4, 4, 3.4, 1, 3.9276442586467, 0.30965796077334, 0.77086956521739),
(12, '403', 'Zakiyah', 'Laboratorium', 'Teknik Informatika', 4.5, 5, 4, 4.75, 4, 4.6, 1, 4.4608188892193, 0.35169378631322, 0.862),
(34, '201', 'Gilang Hafid', 'Administrasi Prodi', 'Teknik Elektro', 1, 1, 1, 1, 1, 1, 1, 1, 0.5, 0.85),
(35, '202', 'Rafi', 'Administrasi Prodi', 'Teknik Elektro', 1, 1, 1, 1, 1, 1, 1, 1, 0.5, 0.85),
(36, '901', 'Aul', 'Perpustakaan', 'Perpustakaan', 4.1666666666667, 3.6, 4, 4, 4, 4.2, 1.8333333333333, 3.9695950294144, 0.12078713019718, 0.688435),
(37, '902', 'Amel', 'Perpustakaan', 'Perpustakaan', 4.3333333333333, 3.4, 4, 4, 3.25, 4.2, 1.6666666666667, 3.8265729108723, 0.11643524263046, 0.66595),
(38, '903', 'Ucup', 'Perpustakaan', 'Perpustakaan', 4.8333333333333, 4.4, 3.8, 4, 4.25, 3.8, 1.1666666666667, 4.1573744669245, 0.126500896765, 0.761605),
(39, '904', 'Novi', 'Perpustakaan', 'Perpustakaan', 4.3333333333333, 4, 4.8, 4.75, 4.75, 4.2, 1.6666666666667, 4.4532701004246, 0.13550443091484, 0.77166),
(40, '905', 'Danis', 'Perpustakaan', 'Perpustakaan', 4.3333333333333, 3.8, 3.8, 4, 3.75, 4, 1.6666666666667, 3.9278911206998, 0.11951816058836, 0.682965),
(41, '906', 'Vico', 'Perpustakaan', 'Perpustakaan', 4.6666666666667, 4.8, 4.4, 4.25, 4.75, 4, 1.3333333333333, 4.4808579833234, 0.13634387704949, 0.80745),
(42, '907', 'Wawan', 'Perpustakaan', 'Perpustakaan', 4.5, 4.6, 4, 3.25, 4, 4, 1.5, 4.0583167750672, 0.12348676201455, 0.744165),
(43, '908', 'Rehan', 'Perpustakaan', 'Perpustakaan', 4.3333333333333, 4.8, 4, 4, 3, 3.8, 1.6666666666667, 3.9905089278355, 0.12142349984013, 0.70212);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_lppm`
--
ALTER TABLE `data_lppm`
  ADD PRIMARY KEY (`id_data`);

--
-- Indeks untuk tabel `dosen_peserta`
--
ALTER TABLE `dosen_peserta`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `nilai_dosen`
--
ALTER TABLE `nilai_dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai_mhs`
--
ALTER TABLE `nilai_mhs`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indeks untuk tabel `nilai_pimpinan`
--
ALTER TABLE `nilai_pimpinan`
  ADD PRIMARY KEY (`id_pimpinan`);

--
-- Indeks untuk tabel `nilai_pimpinan_tendik`
--
ALTER TABLE `nilai_pimpinan_tendik`
  ADD PRIMARY KEY (`id_pimpinan`);

--
-- Indeks untuk tabel `tb_bobot_baru`
--
ALTER TABLE `tb_bobot_baru`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_bobot_baru_tendik`
--
ALTER TABLE `tb_bobot_baru_tendik`
  ADD PRIMARY KEY (`id_bobot`);

--
-- Indeks untuk tabel `tb_hmp_kriteria`
--
ALTER TABLE `tb_hmp_kriteria`
  ADD PRIMARY KEY (`id_hmp`);

--
-- Indeks untuk tabel `tb_hmp_kriteria_tendik`
--
ALTER TABLE `tb_hmp_kriteria_tendik`
  ADD PRIMARY KEY (`id_hmp`);

--
-- Indeks untuk tabel `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `tb_kriteria_tendik`
--
ALTER TABLE `tb_kriteria_tendik`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `tendik_peserta`
--
ALTER TABLE `tendik_peserta`
  ADD PRIMARY KEY (`id_tendik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_lppm`
--
ALTER TABLE `data_lppm`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `dosen_peserta`
--
ALTER TABLE `dosen_peserta`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `nilai_dosen`
--
ALTER TABLE `nilai_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `nilai_mhs`
--
ALTER TABLE `nilai_mhs`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `nilai_pimpinan`
--
ALTER TABLE `nilai_pimpinan`
  MODIFY `id_pimpinan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `nilai_pimpinan_tendik`
--
ALTER TABLE `nilai_pimpinan_tendik`
  MODIFY `id_pimpinan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `tb_bobot_baru_tendik`
--
ALTER TABLE `tb_bobot_baru_tendik`
  MODIFY `id_bobot` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_hmp_kriteria`
--
ALTER TABLE `tb_hmp_kriteria`
  MODIFY `id_hmp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `tb_hmp_kriteria_tendik`
--
ALTER TABLE `tb_hmp_kriteria_tendik`
  MODIFY `id_hmp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_kriteria_tendik`
--
ALTER TABLE `tb_kriteria_tendik`
  MODIFY `id_kriteria` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tendik_peserta`
--
ALTER TABLE `tendik_peserta`
  MODIFY `id_tendik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
