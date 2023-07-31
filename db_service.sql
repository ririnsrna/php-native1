-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jun 2022 pada 10.07
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_service`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `kd_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(25) NOT NULL,
  `tugas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`kd_jabatan`, `nama_jabatan`, `tugas`) VALUES
(1, 'programer', 'Menciptakan program'),
(2, 'System Analysist', 'melakukan analisis sistem'),
(3, 'designer', 'Menciptakan Konten yang Efektif dan Juga Efisien'),
(4, 'web developer', 'mewujudkan desain sebuah produk atau layanan, biasanya berupa software atau website'),
(5, 'web developer', 'mewujudkan desain sebuah produk atau layanan, biasanya berupa software atau website'),
(6, 'web developer', 'mewujudkan desain sebuah produk atau layanan, biasanya berupa software atau website');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `kd_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `jk` varchar(9) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `jabatan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`kd_karyawan`, `nama_karyawan`, `jk`, `no_hp`, `jabatan`) VALUES
(1, 'Nur Nisrina Sudrayanti', 'Perempuan', '085899852476', 'Programmer'),
(2, 'Dini Kurniawati', 'Perempuan', '081299004430', 'System Analysist'),
(3, 'Astriyanti', 'Perempuan', '088292139819', 'Designer'),
(4, 'indah', 'Perempuan', '089876543218', 'designer'),
(5, 'Nayla ', 'Perempuan', '0893763829', 'Designer'),
(7, 'Yuli', 'perempuan', '083672827', 'system analysist');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_keluhan`
--

CREATE TABLE `tb_keluhan` (
  `kd_keluhan` int(11) NOT NULL,
  `keluhan` text NOT NULL,
  `tgl_keluhan` date NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_keluhan`
--

INSERT INTO `tb_keluhan` (`kd_keluhan`, `keluhan`, `tgl_keluhan`, `nama_karyawan`) VALUES
(1, 'Wifi mati', '2022-06-02', 'Nur Nisrina Sudrayanti'),
(2, 'AC tidak Menyala', '2022-06-02', 'Dini Kurniawati'),
(3, 'internet lama', '2022-06-02', 'Astriyanti'),
(4, 'Gaji berkurang', '2022-06-02', 'Indah Purnama'),
(8, 'Bos Galak', '2022-06-02', 'Yuli');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`kd_jabatan`);

--
-- Indeks untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`kd_karyawan`);

--
-- Indeks untuk tabel `tb_keluhan`
--
ALTER TABLE `tb_keluhan`
  ADD PRIMARY KEY (`kd_keluhan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `kd_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `kd_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_keluhan`
--
ALTER TABLE `tb_keluhan`
  MODIFY `kd_keluhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
