-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jul 2020 pada 19.45
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
  `pendidikan` varchar(20) DEFAULT NULL,
  `jabatan` varchar(20) DEFAULT NULL,
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

INSERT INTO `data_lppm` (`id_data`, `nip`, `nama`, `id_dosen`, `pendidikan`, `jabatan`, `jml_pn`, `jml_jia`, `jml_ji`, `jml_jna`, `jml_jn`, `jml_jl`, `jml_pl`, `jml_sm`, `jml_pg`) VALUES
(19, '302', 'UKM', 0, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20, '302', 'UKM', 63, 'S2', 'Pengajar', 7, 1, 0, 0, 0, 0, 6, 7, 2),
(21, '302', 'UKM', 56, 'S2', 'Asisten Ahli', 2, 0, 0, 2, 2, 0, 3, 2, 3),
(22, '302', 'UKM', 57, 'S2', 'Asisten Ahli', 2, 0, 0, 2, 2, 0, 3, 2, 3),
(23, '302', 'UKM', 48, 'S2', 'Lektor', 2, 0, 0, 2, 2, 2, 2, 2, 4),
(24, '302', 'UKM', 52, 'S2', 'Asisten Ahli', 2, 0, 0, 2, 2, 2, 3, 2, 2),
(25, '302', 'UKM', 58, 'S2', 'Lektor', 2, 0, 0, 2, 2, 0, 2, 2, 2),
(26, '302', 'UKM', 69, 'S2', 'Lektor', 3, 1, 0, 0, 0, 2, 2, 2, 2),
(27, '302', 'UKM', 70, 'S3', 'Lektor', 3, 1, 0, 0, 0, 0, 2, 2, 2);

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
  `c7_saw` double NOT NULL DEFAULT 1,
  `c8_saw` double NOT NULL DEFAULT 1,
  `c9_saw` double NOT NULL DEFAULT 1,
  `c10_saw` double NOT NULL DEFAULT 1,
  `vektor_s` double NOT NULL DEFAULT 1,
  `vektor_v` double NOT NULL DEFAULT 1,
  `total_nilai_saw` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen_peserta`
--

INSERT INTO `dosen_peserta` (`id_dosen`, `nip`, `nama`, `jurusan`, `alamat`, `pendidikan`, `jabatan`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `c7`, `c8`, `c9`, `c10`, `c4_saw`, `c5_saw`, `c6_saw`, `c7_saw`, `c8_saw`, `c9_saw`, `c10_saw`, `vektor_s`, `vektor_v`, `total_nilai_saw`) VALUES
(48, '3', 'NVR', 'Teknik Informatika', 'Jakarta', 'S2', 'Lektor', 4.455, 3.9, 3.6, 3, 3, 3, 3, 3, 5, 3, 3, 3, 3, 3, 3, 1, 3, 3.5041174838772, 0.2047485204509, 0.9212),
(52, '7', 'STO', 'Teknik Informatika', 'Bogor', 'S2', 'Asisten Ahli', 4.4666, 3.4, 3.4, 3, 3, 3, 4, 3, 3, 2, 3, 3, 3, 2, 3, 3, 4, 3.2413091355564, 0.18939240846881, 0.8529),
(56, '11', 'YDN', 'Teknik Informatika', 'Jakarta', 'S2', 'Asisten Ahli', 4.49, 4.6, 4.6, 3, 3, 3, 4, 3, 4, 2, 3, 3, 3, 2, 3, 2, 4, 3.6121739361098, 0.2110623494882, 0.94),
(57, '12', 'RNL', 'Teknik Informatika', 'Jakarta', 'S2', 'Asisten Ahli', 4.433, 4, 4.6, 3, 3, 3, 4, 3, 4, 2, 3, 3, 3, 2, 3, 2, 4, 3.5313654144951, 0.20634063986614, 0.9188),
(58, '13', 'SSO', 'Teknik Informatika', 'Bekasi', 'S2', 'Lektor', 3.5357, 3.6, 3.6, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3.2252846050591, 0.18845608172596, 0.8315),
(63, '0', 'test', 'Teknik Kimia', 'Jakarta', 'S2', 'Pengajar', 1, 1, 1, 3, 5, 5, 5, 5, 3, 1, 3, 1, 1, 1, 1, 3, 5, 2.094010727779, 1, 1);

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
(58, '3', 'NVR', 'Teknik Informatika', 0, 0, 0, 0, 0, 0, 0),
(62, '7', 'STO', 'Teknik Informatika', 0, 0, 0, 0, 0, 0, 0),
(66, '11', 'YDN', 'Teknik Informatika', 0, 0, 0, 0, 0, 0, 0),
(67, '12', 'RNL', 'Teknik Informatika', 0, 0, 0, 0, 0, 0, 0),
(68, '13', 'SSO', 'Teknik Informatika', 0, 0, 0, 0, 0, 0, 0),
(73, '0', 'test', 'Teknik Kimia', 0, 0, 0, 0, 0, 0, 0);

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
(60, '2016470001', 'Achmad Farhan', 'Teknik Informatika', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(61, '2019470005', 'Afrahani Luthfiyah', 'Teknik Informatika', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(62, '2019470009', 'Adriansyahdan Restuadi Putra', 'Teknik Informatika', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(63, '2019470014', 'Aulia Nur Ramadhan', 'Teknik Informatika', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(64, '2016470012', 'Bayu Arif Saputra', 'Teknik Informatika', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(65, '2019470021', 'Debby Arrizqi Kamila', 'Teknik Informatika', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(66, '2016470023', 'Ibnu Adam Syah', 'Teknik Informatika', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(67, '2016470029', 'Maulana Ary Purnomo', 'Teknik Informatika', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(68, '2016470047', 'Noviarum', 'Teknik Informatika', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(69, '2016470057', 'Syaifudin Alkatiri', 'Teknik Informatika', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
(48, '201', 'Renty', 'Teknik Industri', 0, 0, 0, 0, 0, 0, 0),
(49, '301', 'Nurul Hidayati', 'Teknik Kimia', 0, 0, 0, 0, 0, 0, 0),
(50, '401', 'Sulis Yulianto', 'Teknik Mesin', 0, 0, 0, 0, 0, 0, 0),
(51, '501', 'Trijeti', 'Teknik Sipil', 0, 0, 0, 0, 0, 0, 0),
(52, '601', 'Wafirul', 'Arsitektur', 0, 0, 0, 0, 0, 0, 0),
(53, '701', 'Erwin Dermawan', 'Teknik Elektro', 0, 0, 0, 0, 0, 0, 0),
(54, '801', 'Hasan Basri', 'D3OAB', 0, 0, 0, 0, 0, 0, 0),
(55, '101', 'Rita Dewi Risanty', 'Teknik Informatika', 0, 0, 0, 0, 0, 0, 0),
(56, '101', 'Rita Dewi Risanty', 'Teknik Informatika', 48, 4, 3, 3, 5, 3, 3.6),
(57, '101', 'Rita Dewi Risanty', 'Teknik Informatika', 52, 3, 2, 5, 4, 3, 3.4),
(58, '101', 'Rita Dewi Risanty', 'Teknik Informatika', 56, 5, 5, 4, 4, 5, 4.6),
(59, '101', 'Rita Dewi Risanty', 'Teknik Informatika', 57, 5, 5, 5, 4, 4, 4.6),
(60, '101', 'Rita Dewi Risanty', 'Teknik Informatika', 58, 3, 3, 4, 5, 3, 3.6);

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
(41, '202', 'Nelfiyanti', 'Kepala Laboratorium', 'Laboratorium', 'Teknik Industri', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(43, '201', 'Renty', 'Kepala Program Studi', 'Administrasi Prodi', 'Teknik Industri', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(44, '302', 'Isimiyati', 'Kepala Laboratorium', 'Laboratorium', 'Teknik Kimia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(45, '301', 'Nurul Hidayati', 'Kepala Program Studi', 'Administrasi Prodi', 'Teknik Kimia', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(47, '402', 'Ahmad Yunus Nasution', 'Kepala Laboratorium', 'Laboratorium', 'Teknik Mesin', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(48, '401', 'Sulis Yulianto', 'Kepala Program Studi', 'Administrasi Prodi', 'Teknik Mesin', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(51, '501', 'Trijeti', 'Kepala Program Studi', 'Administrasi Prodi', 'Teknik Sipil', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(52, '601', 'Wafirul', 'Kepala Program Studi', 'Administrasi Prodi', 'Arsitektur', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(54, '701', 'Erwin Dermawan', 'Kepala Program Studi', 'Administrasi Prodi', 'Teknik Elektro', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(56, '801', 'Hasan Basri', 'Kepala Program Studi', 'Administrasi Prodi', 'D3OAB', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(58, '901', 'Zul Amri', 'Kepala Perpustakaan', 'Perpustakaan', 'Perpustakaan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(59, '101', 'Rita Dewi Risanty', 'Kepala Program Studi', 'Administrasi Prodi', 'Teknik Informatika', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(60, '102', 'Retnani Latifah', 'Kepala Laboratorium', 'Laboratorium', 'Teknik Informatika', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(61, '901', 'Zul Amri', 'Kepala Perpustakaan', 'Perpustakaan', 'Perpustakaan', 62, 3, 3, 4, 5, 4, 5, 3, 3, 3, 2, 2, 3, 3, 4, 3, 3, 3, 3, 3, 3, 5, 4, 5, 5, 4, 4, 4, 3, 3, 4, 2.6, 3.2, 3, 4.75, 3.6),
(62, '901', 'Zul Amri', 'Kepala Perpustakaan', 'Perpustakaan', 'Perpustakaan', 63, 4, 4, 4, 5, 4, 5, 3, 3, 4, 4, 3, 4, 3, 3, 3, 4, 3, 3, 4, 3, 4, 4, 3, 4, 4, 4, 3, 3, 4, 4.3333333333333, 3.4, 3.4, 3.25, 3.75, 3.6),
(63, '901', 'Zul Amri', 'Kepala Perpustakaan', 'Perpustakaan', 'Perpustakaan', 64, 4, 4, 3, 5, 4, 5, 3, 3, 4, 4, 3, 4, 4, 4, 4, 3, 4, 4, 4, 4, 4, 4, 3, 4, 4, 4, 4, 4, 4, 4.1666666666667, 3.4, 3.8, 4, 3.75, 4),
(64, '102', 'Retnani Latifah', 'Kepala Laboratorium', 'Laboratorium', 'Teknik Informatika', 48, 4, 4, 4, 5, 4, 5, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 3, 4, 4, 4, 4.3333333333333, 4, 4, 4, 4, 3.8),
(65, '102', 'Retnani Latifah', 'Kepala Laboratorium', 'Laboratorium', 'Teknik Informatika', 49, 4, 4, 4, 5, 4, 5, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4.3333333333333, 4, 4, 4, 4, 4);

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
(1, 0.13, 0.15, 0.13, 0.08, 0.1, 0.1, 0.08, 0.07, 0.08, 0.08);

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
(1, 'Penilaian Dosen Sejawat ', 13),
(2, 'Penilaian Mahasiswa ', 15),
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
(48, '1', 'IRD', 'Laboratorium', 'Teknik Informatika', 4.3333333333333, 4, 4, 4, 4, 3.8, 1.6666666666667, 4.0172868952887, 0.49807651094928, 0.8425),
(49, '2', 'AUI', 'Laboratorium', 'Teknik Informatika', 4.3333333333333, 4, 4, 4, 4, 4, 1.6666666666667, 4.0483150894991, 0.50192348905072, 0.85),
(50, '3', 'SRO', 'Administrasi Prodi', 'Teknik Informatika', 1, 1, 1, 1, 1, 1, 1, 0, 0, 0),
(51, '4', 'MII', 'Laboratorium', 'Teknik Industri', 1, 1, 1, 1, 1, 1, 1, 0, 0, 0),
(52, '5', 'ASW', 'Laboratorium', 'Teknik Industri', 1, 1, 1, 1, 1, 1, 1, 0, 0, 0),
(53, '6', 'SIO', 'Administrasi Prodi', 'Teknik Industri', 1, 1, 1, 1, 1, 1, 1, 0, 0, 0),
(54, '7', 'MRH', 'Laboratorium', 'Teknik Mesin', 1, 1, 1, 1, 1, 1, 1, 0, 0, 0),
(55, '8', 'UMA', 'Administrasi Prodi', 'Teknik Mesin', 1, 1, 1, 1, 1, 1, 1, 0, 0, 0),
(56, '9', 'BFA', 'Laboratorium', 'Teknik Kimia', 1, 1, 1, 1, 1, 1, 1, 0, 0, 0),
(57, '10', 'DLT', 'Administrasi Prodi', 'Teknik Kimia', 1, 1, 1, 1, 1, 1, 1, 0, 0, 0),
(58, '11', 'ISN', 'Administrasi Prodi', 'Teknik Sipil', 1, 1, 1, 1, 1, 1, 1, 0, 0, 0),
(59, '12', 'CII', 'Administrasi Prodi', 'Arsitektur', 1, 1, 1, 1, 1, 1, 1, 0, 0, 0),
(60, '13', 'MRI', 'Administrasi Prodi', 'Teknik Elektro', 1, 1, 1, 1, 1, 1, 1, 0, 0, 0),
(61, '14', 'HNS', 'Administrasi Prodi', 'D3OAB', 1, 1, 1, 1, 1, 1, 1, 0, 0, 0),
(62, '15', 'EEA', 'Perpustakaan', 'Perpustakaan', 4, 2.6, 3.2, 3, 4.75, 3.6, 2, 3.395089822535, 0.31439826271233, 0.843855),
(63, '16', 'MKM', 'Perpustakaan', 'Perpustakaan', 4.3333333333333, 3.4, 3.4, 3.25, 3.75, 3.6, 1.6666666666667, 3.5846557173778, 0.331952787371, 0.90424),
(64, '17', 'SUN', 'Perpustakaan', 'Perpustakaan', 4.1666666666667, 3.4, 3.8, 4, 3.75, 4, 1.8333333333333, 3.8189458817425, 0.35364894991667, 0.95479);

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
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `dosen_peserta`
--
ALTER TABLE `dosen_peserta`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `nilai_dosen`
--
ALTER TABLE `nilai_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT untuk tabel `nilai_mhs`
--
ALTER TABLE `nilai_mhs`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `nilai_pimpinan`
--
ALTER TABLE `nilai_pimpinan`
  MODIFY `id_pimpinan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `nilai_pimpinan_tendik`
--
ALTER TABLE `nilai_pimpinan_tendik`
  MODIFY `id_pimpinan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

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
  MODIFY `id_tendik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
