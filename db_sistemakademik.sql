-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2019 at 07:48 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sistemakademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `nama_lengkap`, `level`, `foto`, `last_login`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'admin', '1.png', '2017-01-03 04:49:07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `kd_dosen` varchar(15) NOT NULL,
  `kd_prodi` varchar(15) NOT NULL,
  `nidn` varchar(30) NOT NULL,
  `nama_dosen` varchar(150) NOT NULL,
  `sex` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(254) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `pendidikan` char(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `prodi_dosen` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `file_foto` varchar(100) NOT NULL,
  `tgl_insert` datetime NOT NULL,
  `status_dosen` enum('Aktif','Keluar') NOT NULL DEFAULT 'Aktif',
  `tgl_update` datetime NOT NULL,
  `tgl_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`kd_dosen`, `kd_prodi`, `nidn`, `nama_dosen`, `sex`, `tempat_lahir`, `tgl_lahir`, `alamat`, `hp`, `pendidikan`, `email`, `prodi_dosen`, `password`, `file_foto`, `tgl_insert`, `status_dosen`, `tgl_update`, `tgl_masuk`) VALUES
('AGB17DS0007', '29', '0', 'Prof. Dr. H. Ansar, SE, M.Si', 'L', '-', '2017-10-01', '-', '-', 'S3', '', '-', 'cfcd208495d565ef66e7dff9f98764da', '', '2017-10-01 14:49:46', 'Keluar', '2017-10-02 02:39:02', '0000-00-00'),
('AGB17DS0008', '29', '0', 'Dr. H. Masnama Tadjo, MS', 'L', '-', '2017-10-01', '-', '-', 'S3', '', '-', 'cfcd208495d565ef66e7dff9f98764da', '', '2017-10-01 14:52:42', 'Keluar', '2017-10-02 02:39:10', '0000-00-00'),
('AGB17DS0009', '29', '0', 'Prof. Dr. Ir. H. Kahar Mustari, M.S', 'L', '-', '2017-10-01', '-', '-', 'S3', '', '-', 'cfcd208495d565ef66e7dff9f98764da', '', '2017-10-01 14:55:10', 'Keluar', '2017-10-02 02:39:17', '0000-00-00'),
('AGB17DS0010', '29', 'o', 'Dr. H. Jamaluddin M. Idris, M.Fil.I', 'L', '-', '2017-08-02', '-', '-', 'S3', '', '-', 'd95679752134a2d9eb61dbd7b91c4bcc', '', '2017-08-02 16:59:54', 'Keluar', '0000-00-00 00:00:00', '0000-00-00'),
('AGB19DS0001', '29', 'NIP. 195607271986031003', 'Dr. Andi Nuddin, M.Si', 'L', 'Maulana', '1956-07-27', 'Parepare', '0', 'S3', '', 'Ilmu Pertanian', '320baab3298b47d191da6fcbe65c0f4e', '', '2019-03-28 19:58:27', 'Aktif', '0000-00-00 00:00:00', '0000-00-00'),
('AGB19DS0002', '29', 'NIDN. 0910047902', 'Dr. Andi Sitti Halimah, S.P., M.P', 'P', 'Watampone', '1979-04-10', 'Parepare', '0', 'S3', '', 'Ilmu Pertanian', 'f306e02ad48181b45b6c55790d82f8f6', '', '2019-03-28 20:00:44', 'Aktif', '2019-04-01 20:27:53', '0000-00-00'),
('AGB19DS0003', '29', 'NIP. 196603301992031008', 'Dr. Haikal Ali, S.E.,M.T', 'L', 'Pangkajenne', '1966-03-23', 'Pangkajenne', '0', 'S3', '', 'Ilmu Pengetahuan SDA & Lingkungan', '0de48e391d94dc763b774c21b951c0b7', '', '2019-03-28 20:04:35', 'Aktif', '2019-04-01 20:28:43', '0000-00-00'),
('AGB19DS0004', '29', 'NIDN. 0919077901', 'Dr. Irmayani, S.P.,M.Si', 'P', 'Bule', '1979-07-19', 'Kios Lapadde Indah Blok D1  No.4 Jl. Ahmad Yani Km.6 Parepare', '0', 'S3', '', 'Ilmu Pertanian', '130cd9ca02127a94efe2eef07328bb67', '', '2019-03-28 20:44:06', 'Aktif', '0000-00-00 00:00:00', '0000-00-00'),
('AGB19DS0005', '29', 'NIDN. 0912106901', 'Dr. Nurhapsa, S.P.,M.Si', 'P', 'Siddo', '1969-10-12', 'Parepare', '0', 'S3', '', 'Ilmu Pertanian', 'c10c0d9396b69daf21119a833162012b', '', '2019-03-28 20:50:49', 'Aktif', '0000-00-00 00:00:00', '0000-00-00'),
('AGB19DS0006', '29', 'NIP. 195201121983031001', 'Prof. Dr. H. Muhammad Siri Dangnga, MS', 'L', 'Menge', '1952-01-12', 'Parepare', '0', 'S3', '', 'Ilmu Pertanian', '5d0ceed0893c9be48c56bc712c0e1b5a', 'AGB19DS0006.jpg', '2019-03-28 21:01:06', 'Aktif', '0000-00-00 00:00:00', '0000-00-00'),
('PAI19DS0001', '31', 'NIDN. 0921096201', 'Dr. St. Wardah Hanafie Das, M.Ag', 'P', '-', '1962-09-21', 'Parepare', '0', 'S3', '', 'Pendidikan & Keguruan', 'b59d9746c060ae59338616f2fc4e4db6', '', '2019-04-01 21:00:38', 'Aktif', '0000-00-00 00:00:00', '0000-00-00'),
('PAI19DS0002', '31', 'NIDN. 8829380018', 'Dr. Abd Rahman, M.Ag', 'L', '-', '1969-11-07', '-', '0', 'S3', '', 'Pendidikan & Keguruan', 'd1e213d2b1c269345d3592e8af8fc602', '', '2019-03-28 21:17:39', 'Aktif', '2019-04-01 21:02:15', '0000-00-00'),
('PAI19DS0003', '31', 'NIDN. 8891740017', 'Dr. Bustanul Iman RN, MA', 'L', '-', '1969-11-06', '-', '0', 'S3', '', 'Pendidikan & Keguruan', '60577b810f29e81837b0e513f22b5e74', '', '2019-03-28 21:19:58', 'Aktif', '2019-04-01 21:03:59', '0000-00-00'),
('PAI19DS0004', '31', 'NIDN. 8825770018', 'Dr. Syarifuddin Kulle, M.Pd', 'L', '-', '1967-01-01', '-', '0', 'S3', '', 'Pendidikan & Keguruan', 'f7bb41c2a8d7f5352bc4735666645e65', '', '2019-03-28 21:25:51', 'Aktif', '2019-04-01 21:05:35', '0000-00-00'),
('PAI19DS0005', '31', 'NIDN. 8892180018', 'Dr. Arsyad M.Pd.I', 'L', '-', '1969-03-05', '-', '0', 'S3', '', 'Pendidikan & Keguruan', 'c6ad58e8a665e3a44962f1b70997a3bc', '', '2019-03-28 21:28:01', 'Aktif', '2019-04-01 21:07:11', '0000-00-00'),
('PAI19DS0006', '31', 'NIDN. 8855180018', 'Dr. Hasmawati, M.Pd.I', 'P', '-', '1970-06-22', '-', '0', 'S3', '', 'Pendidikan & Keguruan', '661299ec005da0904e8f087bdfb8be72', '', '2019-03-28 21:31:45', 'Aktif', '2019-04-01 21:09:18', '0000-00-00'),
('PAI19DS0007', '31', 'NIDN. 8868380018', 'Dr. Syarif, MA', 'L', '-', '1980-07-07', '-', '0', 'S3', '', 'Pendidikan & Keguruan', 'cae484b97b8cbca0eb00520f242278d4', '', '2019-03-28 21:37:54', 'Aktif', '2019-04-01 21:10:40', '0000-00-00'),
('PAI19DS0008', '31', 'NIDN. 9921000791', 'Dr. Husen., S.H.,M.M., M.S.i., MH', 'L', '-', '1968-06-25', '-', '0', 'S3', '', 'Pendidikan Agama Islam', '5b1c434c31e67aac018a634815e2bcdb', '', '2019-04-01 21:12:24', 'Aktif', '0000-00-00 00:00:00', '0000-00-00'),
('PBI17DS0009', '30', '0', 'Prof. Dr. Abdul Hakim Yassi, Dipl. TESL., M.A', 'L', '-', '2017-08-02', '-', '0', 'S3', '', '-', 'cfcd208495d565ef66e7dff9f98764da', '', '2017-08-02 17:37:17', 'Keluar', '0000-00-00 00:00:00', '0000-00-00'),
('PBI17DS0010', '30', '0', 'Dr. Kisman Salija, M.Pd', 'L', '-', '2017-08-02', '-', '0', 'S3', '', '-', 'cfcd208495d565ef66e7dff9f98764da', '', '2017-08-02 17:40:53', 'Keluar', '0000-00-00 00:00:00', '0000-00-00'),
('PBI17DS0011', '30', 'NIDN. 0012015201', 'Prof. Dr. H. Muhammad Siri Dangnga., M.S', 'L', 'Mange', '1952-01-12', 'Parepare', '08124257930', 'S3', '', 'Ilmu Pertanian', '14edbfa26c7d616f95dff6ec1af1810c', '', '2017-08-02 17:49:44', 'Aktif', '0000-00-00 00:00:00', '0000-00-00'),
('PBI17DS0012', '30', '0', 'Drs. Mahsyar Idris, M.Ag', 'L', 'Bulukumba', '2017-08-02', 'Parepare', '0', 'S2', '', 'Hadits', 'cfcd208495d565ef66e7dff9f98764da', '', '2017-08-02 17:59:47', 'Aktif', '0000-00-00 00:00:00', '0000-00-00'),
('PBI19DS0001', '30', 'NIDN. 0007036502', 'Dr. Drs. amaluddin, M.Hum', 'L', 'Minanga', '1965-03-07', 'Jl. Padat karya Lapadde Mas Parepare', '0', 'S3', '', 'Pendidikan Bahasa Inggris', '5cb33aad9a057dbc00b9ce905266c9b6', '', '2019-03-28 18:40:52', 'Aktif', '2019-03-28 19:23:54', '0000-00-00'),
('PBI19DS0002', '30', 'NIDN. 0010046901', 'Dr. Rafi\'ah Nur, M.Hum', 'P', 'Soppeng', '1969-04-10', 'Jl. Padat Karya Lapadde Mas Parepare', '0', 'S3', '', 'Pendidikan Bahasa Inggris', '4908f95ab0c006fd40648c8675cbf86d', '', '2019-03-28 18:43:27', 'Aktif', '2019-03-28 19:24:26', '0000-00-00'),
('PBI19DS0003', '30', 'NIDN. 0915027001', 'Dr. Ammang Latifa, M.Hum', 'L', 'Parepare', '1970-02-15', 'Jl. Padat Karya Lapadde Mas Parepare', '0', 'S3', '', 'Pendidikan Bahasa Inggris', '2c1fa6a4fd0bb6092e7ee380b795adb9', '', '2019-03-28 18:46:25', 'Aktif', '2019-03-28 19:24:48', '0000-00-00'),
('PBI19DS0004', '30', 'NIDN. 8881540017', 'Abd. Rahman, M.Ed., Ph.D', 'L', 'Parepare', '1975-11-06', 'Makassar', '0', 'S3', '', 'Teacher\'s Profesional Development', '8466e35a2aaf56dfbc582582f7671218', '', '2019-03-28 18:49:45', 'Aktif', '2019-03-28 19:25:09', '0000-00-00'),
('PBI19DS0005', '30', 'NIDN. 884540017', 'Suriani, S.S, M.Pd., D.A', 'P', 'Gowaa', '1971-04-17', 'Makassar', '0', 'S3', '', 'Kesustraan Bahasa Inggris', '825efd9e826fc6d97940d57de3f25649', '', '2019-03-28 18:51:56', 'Aktif', '2019-03-28 19:25:40', '0000-00-00'),
('PBI19DS0006', '30', 'NIDN. 8831840017', 'Dr. Hj. Hasmiati, M.Pd', 'P', 'Soppeng', '1968-06-01', 'Makassar', '0', 'S3', '', 'Pendidikan Bahasa Inggris', '3d3e36215ec7a83a4cb65557aa8e42d0', '', '2019-03-28 18:53:36', 'Aktif', '2019-03-28 19:26:24', '0000-00-00'),
('PBI19DS0007', '30', 'NIDN. 0907027601', 'Hj. Salasiah, S.Pd., M.Ed', 'P', 'Parepare', '1976-02-07', 'Perumnas Wekke\'e', '0', 'S3', '', 'Pendidikan Bahasa Inggris', 'b5142b5f7d5ec8732dbdde8e0a6690ff', '', '2019-03-28 19:06:42', 'Aktif', '2019-03-28 19:26:46', '0000-00-00'),
('PBI19DS0008', '30', 'NIDN. 0925107701', 'Siti Hajar, S.S, S.Pd, M.Hum', 'P', 'Parepare', '1977-10-25', 'Jl. Sulawesi Cappa\' Ujung Parepare', '0', 'S3', '', 'Ilmu-Ilmu Bahasa Inggris', '329a4478683c55ecafffb4947a608a9a', '', '2019-03-28 19:09:07', 'Aktif', '2017-08-02 17:36:08', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_identitas`
--

CREATE TABLE `tb_identitas` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status` varchar(25) NOT NULL,
  `jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id_jadwal` int(10) NOT NULL,
  `th_akademik` varchar(25) NOT NULL,
  `semester` enum('ganjil','genap') NOT NULL DEFAULT 'ganjil',
  `kd_prodi` varchar(15) NOT NULL,
  `kd_mk` varchar(10) NOT NULL,
  `kd_dosen` varchar(15) NOT NULL,
  `hari` varchar(40) NOT NULL,
  `pukul` varchar(50) NOT NULL,
  `ruang` varchar(30) NOT NULL,
  `tgl_insert` datetime NOT NULL,
  `tgl_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id_jadwal`, `th_akademik`, `semester`, `kd_prodi`, `kd_mk`, `kd_dosen`, `hari`, `pukul`, `ruang`, `tgl_insert`, `tgl_update`) VALUES
(1, '2017/2018-Ganjil', 'ganjil', '29', 'MKK 2902', 'AGB19DS0005', 'Ahad/29/10/2017', '08.30-17.30', 'E.10', '2017-08-02 17:28:33', '0000-00-00 00:00:00'),
(2, '2017/2018-Ganjil', 'ganjil', '29', 'MKK 2901', 'AGB17DS0007', 'Sabtu/04/11/2017', '08.30-17.30', 'E.10', '2017-08-02 17:29:03', '0000-00-00 00:00:00'),
(3, '2017/2018-Ganjil', 'ganjil', '29', 'MKD 2903', 'AGB19DS0006', 'Ahad/05/11/2017', '08.30-17.30', 'E.10', '2017-08-02 17:29:24', '0000-00-00 00:00:00'),
(4, '2017/2018-Ganjil', 'ganjil', '29', 'MKK 2903', 'AGB17DS0008', 'Sabtu/11/11/2017', '08.30-17.30', 'E.10', '2017-08-02 17:30:05', '0000-00-00 00:00:00'),
(5, '2017/2018-Ganjil', 'ganjil', '29', 'MKP 2901', 'AGB17DS0009', 'Ahad/12/11/2017', '08.30-17.30', 'E.10', '2017-08-02 17:31:18', '0000-00-00 00:00:00'),
(6, '2017/2018-Ganjil', 'ganjil', '29', 'MKD 2901', 'AGB17DS0010', 'Sabtu/18/11/2017', '08.30-17.30', 'E.10', '2017-08-02 17:32:20', '0000-00-00 00:00:00'),
(7, '2017/2018-Ganjil', 'ganjil', '30', 'KPB0130005', 'PBI19DS0002', 'Ahad/29/10/2017', '08.30-17.30', 'E.11', '2017-08-02 17:34:25', '0000-00-00 00:00:00'),
(8, '2017/2018-Ganjil', 'ganjil', '30', 'KIP0130005', 'PBI17DS0009', 'Sabtu/04/11/2017', '08.30-17.30', 'E.11', '2017-08-02 17:37:46', '0000-00-00 00:00:00'),
(9, '2017/2018-Ganjil', 'ganjil', '30', 'KPB0130002', 'PBI19DS0005', 'Ahad/05/11/2017', '08.30-17.30', 'E.11', '2017-08-02 17:39:35', '0000-00-00 00:00:00'),
(11, '2017/2018-Ganjil', 'ganjil', '30', 'KUP0130001', 'PBI17DS0011', 'Ahad/12/11/2017', '08.30-17.30', 'E.11', '2017-08-02 17:50:25', '0000-00-00 00:00:00'),
(12, '2017/2018-Ganjil', 'ganjil', '30', 'KPP0130001', 'PBI17DS0012', 'Sabtu/18/11/2017', '08.30-17.30', 'E.11', '2017-08-02 18:00:22', '0000-00-00 00:00:00'),
(16, '2017/2018-Ganjil', 'ganjil', '30', 'KKB0130004', 'PBI17DS0010', 'Sabtu/11/11/2017', '08.30-17.30', 'E.11', '2017-01-02 19:58:45', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_krs`
--

CREATE TABLE `tb_krs` (
  `id_krs` int(10) NOT NULL,
  `th_akademik` varchar(25) NOT NULL,
  `smt` smallint(6) NOT NULL,
  `semester` enum('ganjil','genap') NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `kd_prodi` varchar(15) NOT NULL,
  `kd_mk` varchar(10) NOT NULL,
  `nama_mk` varchar(100) NOT NULL,
  `sks` smallint(6) NOT NULL,
  `kd_dosen` varchar(15) NOT NULL,
  `nm_dosen` varchar(100) NOT NULL,
  `ruang` char(10) NOT NULL,
  `hari` char(15) NOT NULL,
  `pukul` char(15) NOT NULL,
  `nilai_uts` varchar(5) NOT NULL,
  `nilai_uas` varchar(5) NOT NULL,
  `nilai_akhir` enum('A','AB','B','BC','C') DEFAULT NULL,
  `acc_dosen` enum('Y','T') NOT NULL DEFAULT 'T',
  `status` enum('Baru','Remedial') NOT NULL DEFAULT 'Baru',
  `tampil` enum('Y','T') NOT NULL DEFAULT 'Y',
  `tgl_insert` datetime NOT NULL,
  `tgl_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_krs`
--

INSERT INTO `tb_krs` (`id_krs`, `th_akademik`, `smt`, `semester`, `id_jadwal`, `nim`, `kd_prodi`, `kd_mk`, `nama_mk`, `sks`, `kd_dosen`, `nm_dosen`, `ruang`, `hari`, `pukul`, `nilai_uts`, `nilai_uas`, `nilai_akhir`, `acc_dosen`, `status`, `tampil`, `tgl_insert`, `tgl_update`) VALUES
(2, '2017/2018-Ganjil', 0, 'ganjil', 1, '217290005', '29', 'MKK 2902', 'Perencanaan & Kebijakan Pembangunan Pertanian', 3, 'AGB19DS0005', 'Dr. Nurhapsa, S.P.,M.Si', 'E.10', 'Ahad/29/10/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 18:52:46', '2017-01-02 19:15:19'),
(3, '2017/2018-Ganjil', 0, 'ganjil', 2, '217290005', '29', 'MKK 2901', 'Ilmu Ekonomi', 3, 'AGB17DS0007', 'Prof. Dr. H. Ansar, SE, M.Si', 'E.10', 'Sabtu/04/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 18:54:33', '0000-00-00 00:00:00'),
(4, '2017/2018-Ganjil', 0, 'ganjil', 6, '217290002', '29', 'MKD 2901', 'Al-Islam Kemuhammadiyahan I', 1, 'AGB17DS0010', 'Dr. H. Jamaluddin M. Idris, M.Fil.I', 'E.10', 'Sabtu/18/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:00:33', '2017-01-02 19:10:06'),
(5, '2017/2018-Ganjil', 0, 'ganjil', 2, '217290002', '29', 'MKK 2901', 'Ilmu Ekonomi', 3, 'AGB17DS0007', 'Prof. Dr. H. Ansar, SE, M.Si', 'E.10', 'Sabtu/04/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:00:38', '0000-00-00 00:00:00'),
(6, '2017/2018-Ganjil', 0, 'ganjil', 3, '217290002', '29', 'MKD 2903', 'Filsafat Ilmu', 2, 'AGB19DS0006', 'Prof. Dr. H. Muhammad Siri Dangnga, MS', 'E.10', 'Ahad/05/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:10:20', '0000-00-00 00:00:00'),
(7, '2017/2018-Ganjil', 0, 'ganjil', 1, '217290002', '29', 'MKK 2902', 'Perencanaan & Kebijakan Pembangunan Pertanian', 3, 'AGB19DS0005', 'Dr. Nurhapsa, S.P.,M.Si', 'E.10', 'Ahad/29/10/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:10:27', '0000-00-00 00:00:00'),
(8, '2017/2018-Ganjil', 0, 'ganjil', 4, '217290002', '29', 'MKK 2903', 'Manajajemen Agribisnis', 3, 'AGB17DS0008', 'Dr. H. Masnama Tadjo, MS', 'E.10', 'Sabtu/11/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:10:31', '0000-00-00 00:00:00'),
(10, '2017/2018-Ganjil', 1, 'ganjil', 5, '217290002', '29', 'MKP 2901', 'Agribisnis Syariah', 3, 'AGB17DS0009', 'Prof. Dr. Ir. H. Kahar Mustari, M.S', 'E.10', 'Ahad/12/11/2017', '08.30-17.30', '', '', 'B', 'T', 'Baru', 'Y', '2017-01-02 19:14:27', '0000-00-00 00:00:00'),
(11, '2017/2018-Ganjil', 0, 'ganjil', 3, '217290005', '29', 'MKD 2903', 'Filsafat Ilmu', 2, 'AGB19DS0006', 'Prof. Dr. H. Muhammad Siri Dangnga, MS', 'E.10', 'Ahad/05/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:15:15', '0000-00-00 00:00:00'),
(12, '2017/2018-Ganjil', 0, 'ganjil', 4, '217290005', '29', 'MKK 2903', 'Manajajemen Agribisnis', 3, 'AGB17DS0008', 'Dr. H. Masnama Tadjo, MS', 'E.10', 'Sabtu/11/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:15:22', '0000-00-00 00:00:00'),
(13, '2017/2018-Ganjil', 0, 'ganjil', 5, '217290005', '29', 'MKP 2901', 'Agribisnis Syariah', 3, 'AGB17DS0009', 'Prof. Dr. Ir. H. Kahar Mustari, M.S', 'E.10', 'Ahad/12/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:15:29', '0000-00-00 00:00:00'),
(14, '2017/2018-Ganjil', 0, 'ganjil', 6, '217290005', '29', 'MKD 2901', 'Al-Islam Kemuhammadiyahan I', 1, 'AGB17DS0010', 'Dr. H. Jamaluddin M. Idris, M.Fil.I', 'E.10', 'Sabtu/18/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:16:05', '0000-00-00 00:00:00'),
(15, '2017/2018-Ganjil', 0, 'ganjil', 6, '217290008', '29', 'MKD 2901', 'Al-Islam Kemuhammadiyahan I', 1, 'AGB17DS0010', 'Dr. H. Jamaluddin M. Idris, M.Fil.I', 'E.10', 'Sabtu/18/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:16:36', '0000-00-00 00:00:00'),
(16, '2017/2018-Ganjil', 0, 'ganjil', 3, '217290008', '29', 'MKD 2903', 'Filsafat Ilmu', 2, 'AGB19DS0006', 'Prof. Dr. H. Muhammad Siri Dangnga, MS', 'E.10', 'Ahad/05/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:16:40', '0000-00-00 00:00:00'),
(17, '2017/2018-Ganjil', 0, 'ganjil', 2, '217290008', '29', 'MKK 2901', 'Ilmu Ekonomi', 3, 'AGB17DS0007', 'Prof. Dr. H. Ansar, SE, M.Si', 'E.10', 'Sabtu/04/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:16:43', '0000-00-00 00:00:00'),
(18, '2017/2018-Ganjil', 0, 'ganjil', 1, '217290008', '29', 'MKK 2902', 'Perencanaan & Kebijakan Pembangunan Pertanian', 3, 'AGB19DS0005', 'Dr. Nurhapsa, S.P.,M.Si', 'E.10', 'Ahad/29/10/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:16:49', '0000-00-00 00:00:00'),
(19, '2017/2018-Ganjil', 0, 'ganjil', 4, '217290008', '29', 'MKK 2903', 'Manajajemen Agribisnis', 3, 'AGB17DS0008', 'Dr. H. Masnama Tadjo, MS', 'E.10', 'Sabtu/11/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:16:54', '0000-00-00 00:00:00'),
(20, '2017/2018-Ganjil', 0, 'ganjil', 5, '217290008', '29', 'MKP 2901', 'Agribisnis Syariah', 3, 'AGB17DS0009', 'Prof. Dr. Ir. H. Kahar Mustari, M.S', 'E.10', 'Ahad/12/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:17:00', '0000-00-00 00:00:00'),
(21, '2017/2018-Ganjil', 0, 'ganjil', 6, '217290011', '29', 'MKD 2901', 'Al-Islam Kemuhammadiyahan I', 1, 'AGB17DS0010', 'Dr. H. Jamaluddin M. Idris, M.Fil.I', 'E.10', 'Sabtu/18/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:18:15', '0000-00-00 00:00:00'),
(22, '2017/2018-Ganjil', 0, 'ganjil', 3, '217290011', '29', 'MKD 2903', 'Filsafat Ilmu', 2, 'AGB19DS0006', 'Prof. Dr. H. Muhammad Siri Dangnga, MS', 'E.10', 'Ahad/05/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:18:21', '0000-00-00 00:00:00'),
(23, '2017/2018-Ganjil', 0, 'ganjil', 2, '217290011', '29', 'MKK 2901', 'Ilmu Ekonomi', 3, 'AGB17DS0007', 'Prof. Dr. H. Ansar, SE, M.Si', 'E.10', 'Sabtu/04/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:18:26', '0000-00-00 00:00:00'),
(24, '2017/2018-Ganjil', 0, 'ganjil', 1, '217290011', '29', 'MKK 2902', 'Perencanaan & Kebijakan Pembangunan Pertanian', 3, 'AGB19DS0005', 'Dr. Nurhapsa, S.P.,M.Si', 'E.10', 'Ahad/29/10/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:18:30', '0000-00-00 00:00:00'),
(25, '2017/2018-Ganjil', 0, 'ganjil', 4, '217290011', '29', 'MKK 2903', 'Manajajemen Agribisnis', 3, 'AGB17DS0008', 'Dr. H. Masnama Tadjo, MS', 'E.10', 'Sabtu/11/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:18:35', '0000-00-00 00:00:00'),
(26, '2017/2018-Ganjil', 0, 'ganjil', 5, '217290011', '29', 'MKP 2901', 'Agribisnis Syariah', 3, 'AGB17DS0009', 'Prof. Dr. Ir. H. Kahar Mustari, M.S', 'E.10', 'Ahad/12/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:18:40', '0000-00-00 00:00:00'),
(27, '2017/2018-Ganjil', 0, 'ganjil', 6, '217290012', '29', 'MKD 2901', 'Al-Islam Kemuhammadiyahan I', 1, 'AGB17DS0010', 'Dr. H. Jamaluddin M. Idris, M.Fil.I', 'E.10', 'Sabtu/18/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:19:07', '0000-00-00 00:00:00'),
(28, '2017/2018-Ganjil', 0, 'ganjil', 3, '217290012', '29', 'MKD 2903', 'Filsafat Ilmu', 2, 'AGB19DS0006', 'Prof. Dr. H. Muhammad Siri Dangnga, MS', 'E.10', 'Ahad/05/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:19:11', '0000-00-00 00:00:00'),
(29, '2017/2018-Ganjil', 0, 'ganjil', 2, '217290012', '29', 'MKK 2901', 'Ilmu Ekonomi', 3, 'AGB17DS0007', 'Prof. Dr. H. Ansar, SE, M.Si', 'E.10', 'Sabtu/04/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:19:14', '0000-00-00 00:00:00'),
(30, '2017/2018-Ganjil', 0, 'ganjil', 1, '217290012', '29', 'MKK 2902', 'Perencanaan & Kebijakan Pembangunan Pertanian', 3, 'AGB19DS0005', 'Dr. Nurhapsa, S.P.,M.Si', 'E.10', 'Ahad/29/10/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:19:24', '0000-00-00 00:00:00'),
(31, '2017/2018-Ganjil', 0, 'ganjil', 4, '217290012', '29', 'MKK 2903', 'Manajajemen Agribisnis', 3, 'AGB17DS0008', 'Dr. H. Masnama Tadjo, MS', 'E.10', 'Sabtu/11/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:19:29', '0000-00-00 00:00:00'),
(32, '2017/2018-Ganjil', 0, 'ganjil', 5, '217290012', '29', 'MKP 2901', 'Agribisnis Syariah', 3, 'AGB17DS0009', 'Prof. Dr. Ir. H. Kahar Mustari, M.S', 'E.10', 'Ahad/12/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:19:34', '0000-00-00 00:00:00'),
(33, '2017/2018-Ganjil', 0, 'ganjil', 6, '217290015', '29', 'MKD 2901', 'Al-Islam Kemuhammadiyahan I', 1, 'AGB17DS0010', 'Dr. H. Jamaluddin M. Idris, M.Fil.I', 'E.10', 'Sabtu/18/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:24:55', '0000-00-00 00:00:00'),
(34, '2017/2018-Ganjil', 0, 'ganjil', 3, '217290015', '29', 'MKD 2903', 'Filsafat Ilmu', 2, 'AGB19DS0006', 'Prof. Dr. H. Muhammad Siri Dangnga, MS', 'E.10', 'Ahad/05/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:24:59', '0000-00-00 00:00:00'),
(35, '2017/2018-Ganjil', 0, 'ganjil', 2, '217290015', '29', 'MKK 2901', 'Ilmu Ekonomi', 3, 'AGB17DS0007', 'Prof. Dr. H. Ansar, SE, M.Si', 'E.10', 'Sabtu/04/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:25:05', '0000-00-00 00:00:00'),
(36, '2017/2018-Ganjil', 0, 'ganjil', 1, '217290015', '29', 'MKK 2902', 'Perencanaan & Kebijakan Pembangunan Pertanian', 3, 'AGB19DS0005', 'Dr. Nurhapsa, S.P.,M.Si', 'E.10', 'Ahad/29/10/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:25:10', '0000-00-00 00:00:00'),
(37, '2017/2018-Ganjil', 0, 'ganjil', 4, '217290015', '29', 'MKK 2903', 'Manajajemen Agribisnis', 3, 'AGB17DS0008', 'Dr. H. Masnama Tadjo, MS', 'E.10', 'Sabtu/11/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:25:13', '0000-00-00 00:00:00'),
(38, '2017/2018-Ganjil', 0, 'ganjil', 5, '217290015', '29', 'MKP 2901', 'Agribisnis Syariah', 3, 'AGB17DS0009', 'Prof. Dr. Ir. H. Kahar Mustari, M.S', 'E.10', 'Ahad/12/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:25:18', '0000-00-00 00:00:00'),
(39, '2017/2018-Ganjil', 0, 'ganjil', 6, '217290016', '29', 'MKD 2901', 'Al-Islam Kemuhammadiyahan I', 1, 'AGB17DS0010', 'Dr. H. Jamaluddin M. Idris, M.Fil.I', 'E.10', 'Sabtu/18/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:25:43', '0000-00-00 00:00:00'),
(40, '2017/2018-Ganjil', 0, 'ganjil', 3, '217290016', '29', 'MKD 2903', 'Filsafat Ilmu', 2, 'AGB19DS0006', 'Prof. Dr. H. Muhammad Siri Dangnga, MS', 'E.10', 'Ahad/05/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:25:47', '0000-00-00 00:00:00'),
(41, '2017/2018-Ganjil', 0, 'ganjil', 2, '217290016', '29', 'MKK 2901', 'Ilmu Ekonomi', 3, 'AGB17DS0007', 'Prof. Dr. H. Ansar, SE, M.Si', 'E.10', 'Sabtu/04/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:25:51', '0000-00-00 00:00:00'),
(42, '2017/2018-Ganjil', 0, 'ganjil', 1, '217290016', '29', 'MKK 2902', 'Perencanaan & Kebijakan Pembangunan Pertanian', 3, 'AGB19DS0005', 'Dr. Nurhapsa, S.P.,M.Si', 'E.10', 'Ahad/29/10/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:25:56', '0000-00-00 00:00:00'),
(43, '2017/2018-Ganjil', 0, 'ganjil', 4, '217290016', '29', 'MKK 2903', 'Manajajemen Agribisnis', 3, 'AGB17DS0008', 'Dr. H. Masnama Tadjo, MS', 'E.10', 'Sabtu/11/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:25:59', '0000-00-00 00:00:00'),
(44, '2017/2018-Ganjil', 0, 'ganjil', 5, '217290016', '29', 'MKP 2901', 'Agribisnis Syariah', 3, 'AGB17DS0009', 'Prof. Dr. Ir. H. Kahar Mustari, M.S', 'E.10', 'Ahad/12/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:26:05', '0000-00-00 00:00:00'),
(45, '2017/2018-Ganjil', 0, 'ganjil', 6, '217290017', '29', 'MKD 2901', 'Al-Islam Kemuhammadiyahan I', 1, 'AGB17DS0010', 'Dr. H. Jamaluddin M. Idris, M.Fil.I', 'E.10', 'Sabtu/18/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:27:20', '0000-00-00 00:00:00'),
(46, '2017/2018-Ganjil', 0, 'ganjil', 3, '217290017', '29', 'MKD 2903', 'Filsafat Ilmu', 2, 'AGB19DS0006', 'Prof. Dr. H. Muhammad Siri Dangnga, MS', 'E.10', 'Ahad/05/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:27:25', '0000-00-00 00:00:00'),
(47, '2017/2018-Ganjil', 0, 'ganjil', 2, '217290017', '29', 'MKK 2901', 'Ilmu Ekonomi', 3, 'AGB17DS0007', 'Prof. Dr. H. Ansar, SE, M.Si', 'E.10', 'Sabtu/04/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:27:30', '0000-00-00 00:00:00'),
(48, '2017/2018-Ganjil', 0, 'ganjil', 1, '217290017', '29', 'MKK 2902', 'Perencanaan & Kebijakan Pembangunan Pertanian', 3, 'AGB19DS0005', 'Dr. Nurhapsa, S.P.,M.Si', 'E.10', 'Ahad/29/10/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:27:34', '0000-00-00 00:00:00'),
(49, '2017/2018-Ganjil', 0, 'ganjil', 4, '217290017', '29', 'MKK 2903', 'Manajajemen Agribisnis', 3, 'AGB17DS0008', 'Dr. H. Masnama Tadjo, MS', 'E.10', 'Sabtu/11/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:27:40', '0000-00-00 00:00:00'),
(50, '2017/2018-Ganjil', 0, 'ganjil', 5, '217290017', '29', 'MKP 2901', 'Agribisnis Syariah', 3, 'AGB17DS0009', 'Prof. Dr. Ir. H. Kahar Mustari, M.S', 'E.10', 'Ahad/12/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:27:44', '0000-00-00 00:00:00'),
(51, '2017/2018-Ganjil', 0, 'ganjil', 6, '217290022', '29', 'MKD 2901', 'Al-Islam Kemuhammadiyahan I', 1, 'AGB17DS0010', 'Dr. H. Jamaluddin M. Idris, M.Fil.I', 'E.10', 'Sabtu/18/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:28:23', '0000-00-00 00:00:00'),
(52, '2017/2018-Ganjil', 0, 'ganjil', 3, '217290022', '29', 'MKD 2903', 'Filsafat Ilmu', 2, 'AGB19DS0006', 'Prof. Dr. H. Muhammad Siri Dangnga, MS', 'E.10', 'Ahad/05/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:28:36', '0000-00-00 00:00:00'),
(53, '2017/2018-Ganjil', 0, 'ganjil', 2, '217290022', '29', 'MKK 2901', 'Ilmu Ekonomi', 3, 'AGB17DS0007', 'Prof. Dr. H. Ansar, SE, M.Si', 'E.10', 'Sabtu/04/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:28:40', '0000-00-00 00:00:00'),
(54, '2017/2018-Ganjil', 0, 'ganjil', 1, '217290022', '29', 'MKK 2902', 'Perencanaan & Kebijakan Pembangunan Pertanian', 3, 'AGB19DS0005', 'Dr. Nurhapsa, S.P.,M.Si', 'E.10', 'Ahad/29/10/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:28:44', '0000-00-00 00:00:00'),
(55, '2017/2018-Ganjil', 0, 'ganjil', 4, '217290022', '29', 'MKK 2903', 'Manajajemen Agribisnis', 3, 'AGB17DS0008', 'Dr. H. Masnama Tadjo, MS', 'E.10', 'Sabtu/11/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:28:49', '0000-00-00 00:00:00'),
(56, '2017/2018-Ganjil', 0, 'ganjil', 5, '217290022', '29', 'MKP 2901', 'Agribisnis Syariah', 3, 'AGB17DS0009', 'Prof. Dr. Ir. H. Kahar Mustari, M.S', 'E.10', 'Ahad/12/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:28:52', '0000-00-00 00:00:00'),
(60, '2017/2018-Ganjil', 0, 'ganjil', 12, '217300001', '30', 'KPP0130001', 'Al Islam dan Kemuhammadiyahan I', 1, 'PBI17DS0012', 'Drs. Mahsyar Idris, M.Ag', 'E.11', 'Sabtu/18/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:47:32', '2017-01-02 19:52:46'),
(61, '2017/2018-Ganjil', 0, 'ganjil', 8, '217300001', '30', 'KIP0130005', 'Theoris in Second Language Acquisition', 3, 'PBI17DS0009', 'Prof. Dr. Abdul Hakim Yassi, Dipl. TESL., M.A', 'E.11', 'Sabtu/04/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:52:36', '0000-00-00 00:00:00'),
(62, '2017/2018-Ganjil', 0, 'ganjil', 9, '217300001', '30', 'KPB0130002', 'ICT in Language Teaching', 3, 'PBI19DS0005', 'Suriani, S.S, M.Pd., D.A', 'E.11', 'Ahad/05/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:52:39', '0000-00-00 00:00:00'),
(63, '2017/2018-Ganjil', 0, 'ganjil', 7, '217300001', '30', 'KPB0130005', 'Curriculum and Material Development', 3, 'PBI19DS0002', 'Dr. Rafi\'ah Nur, M.Hum', 'E.11', 'Ahad/29/10/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:52:43', '0000-00-00 00:00:00'),
(64, '2017/2018-Ganjil', 0, 'ganjil', 11, '217300001', '30', 'KUP0130001', 'Language Philosophy', 2, 'PBI17DS0011', 'Prof. Dr. H. Muhammad Siri Dangnga., M.S', 'E.11', 'Ahad/12/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 19:52:51', '0000-00-00 00:00:00'),
(65, '2017/2018-Ganjil', 0, 'ganjil', 16, '217300001', '30', 'KKB0130004', 'Semantik and Pragmatics', 3, 'PBI17DS0010', 'Dr. Kisman Salija, M.Pd', 'E.11', 'Sabtu/11/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:03:52', '0000-00-00 00:00:00'),
(66, '2017/2018-Ganjil', 0, 'ganjil', 8, '217300006', '30', 'KIP0130005', 'Theoris in Second Language Acquisition', 3, 'PBI17DS0009', 'Prof. Dr. Abdul Hakim Yassi, Dipl. TESL., M.A', 'E.11', 'Sabtu/04/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:04:43', '0000-00-00 00:00:00'),
(67, '2017/2018-Ganjil', 0, 'ganjil', 16, '217300006', '30', 'KKB0130004', 'Semantik and Pragmatics', 3, 'PBI17DS0010', 'Dr. Kisman Salija, M.Pd', 'E.11', 'Sabtu/11/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:04:46', '0000-00-00 00:00:00'),
(68, '2017/2018-Ganjil', 0, 'ganjil', 9, '217300006', '30', 'KPB0130002', 'ICT in Language Teaching', 3, 'PBI19DS0005', 'Suriani, S.S, M.Pd., D.A', 'E.11', 'Ahad/05/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:04:51', '0000-00-00 00:00:00'),
(69, '2017/2018-Ganjil', 0, 'ganjil', 7, '217300006', '30', 'KPB0130005', 'Curriculum and Material Development', 3, 'PBI19DS0002', 'Dr. Rafi\'ah Nur, M.Hum', 'E.11', 'Ahad/29/10/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:04:56', '0000-00-00 00:00:00'),
(70, '2017/2018-Ganjil', 0, 'ganjil', 12, '217300006', '30', 'KPP0130001', 'Al Islam dan Kemuhammadiyahan I', 1, 'PBI17DS0012', 'Drs. Mahsyar Idris, M.Ag', 'E.11', 'Sabtu/18/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:05:05', '0000-00-00 00:00:00'),
(71, '2017/2018-Ganjil', 0, 'ganjil', 11, '217300006', '30', 'KUP0130001', 'Language Philosophy', 2, 'PBI17DS0011', 'Prof. Dr. H. Muhammad Siri Dangnga., M.S', 'E.11', 'Ahad/12/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:05:10', '0000-00-00 00:00:00'),
(72, '2017/2018-Ganjil', 0, 'ganjil', 8, '217300009', '30', 'KIP0130005', 'Theoris in Second Language Acquisition', 3, 'PBI17DS0009', 'Prof. Dr. Abdul Hakim Yassi, Dipl. TESL., M.A', 'E.11', 'Sabtu/04/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:05:23', '0000-00-00 00:00:00'),
(73, '2017/2018-Ganjil', 0, 'ganjil', 16, '217300009', '30', 'KKB0130004', 'Semantik and Pragmatics', 3, 'PBI17DS0010', 'Dr. Kisman Salija, M.Pd', 'E.11', 'Sabtu/11/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:05:27', '0000-00-00 00:00:00'),
(74, '2017/2018-Ganjil', 0, 'ganjil', 9, '217300009', '30', 'KPB0130002', 'ICT in Language Teaching', 3, 'PBI19DS0005', 'Suriani, S.S, M.Pd., D.A', 'E.11', 'Ahad/05/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:05:32', '0000-00-00 00:00:00'),
(75, '2017/2018-Ganjil', 0, 'ganjil', 7, '217300009', '30', 'KPB0130005', 'Curriculum and Material Development', 3, 'PBI19DS0002', 'Dr. Rafi\'ah Nur, M.Hum', 'E.11', 'Ahad/29/10/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:05:35', '0000-00-00 00:00:00'),
(76, '2017/2018-Ganjil', 0, 'ganjil', 12, '217300009', '30', 'KPP0130001', 'Al Islam dan Kemuhammadiyahan I', 1, 'PBI17DS0012', 'Drs. Mahsyar Idris, M.Ag', 'E.11', 'Sabtu/18/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:05:39', '0000-00-00 00:00:00'),
(77, '2017/2018-Ganjil', 0, 'ganjil', 11, '217300009', '30', 'KUP0130001', 'Language Philosophy', 2, 'PBI17DS0011', 'Prof. Dr. H. Muhammad Siri Dangnga., M.S', 'E.11', 'Ahad/12/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:05:42', '0000-00-00 00:00:00'),
(78, '2017/2018-Ganjil', 0, 'ganjil', 8, '217300011', '30', 'KIP0130005', 'Theoris in Second Language Acquisition', 3, 'PBI17DS0009', 'Prof. Dr. Abdul Hakim Yassi, Dipl. TESL., M.A', 'E.11', 'Sabtu/04/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:05:54', '0000-00-00 00:00:00'),
(79, '2017/2018-Ganjil', 0, 'ganjil', 16, '217300011', '30', 'KKB0130004', 'Semantik and Pragmatics', 3, 'PBI17DS0010', 'Dr. Kisman Salija, M.Pd', 'E.11', 'Sabtu/11/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:05:59', '0000-00-00 00:00:00'),
(80, '2017/2018-Ganjil', 0, 'ganjil', 9, '217300011', '30', 'KPB0130002', 'ICT in Language Teaching', 3, 'PBI19DS0005', 'Suriani, S.S, M.Pd., D.A', 'E.11', 'Ahad/05/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:06:08', '0000-00-00 00:00:00'),
(81, '2017/2018-Ganjil', 0, 'ganjil', 7, '217300011', '30', 'KPB0130005', 'Curriculum and Material Development', 3, 'PBI19DS0002', 'Dr. Rafi\'ah Nur, M.Hum', 'E.11', 'Ahad/29/10/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:06:13', '0000-00-00 00:00:00'),
(82, '2017/2018-Ganjil', 0, 'ganjil', 12, '217300011', '30', 'KPP0130001', 'Al Islam dan Kemuhammadiyahan I', 1, 'PBI17DS0012', 'Drs. Mahsyar Idris, M.Ag', 'E.11', 'Sabtu/18/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:06:17', '0000-00-00 00:00:00'),
(83, '2017/2018-Ganjil', 0, 'ganjil', 11, '217300011', '30', 'KUP0130001', 'Language Philosophy', 2, 'PBI17DS0011', 'Prof. Dr. H. Muhammad Siri Dangnga., M.S', 'E.11', 'Ahad/12/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:06:20', '0000-00-00 00:00:00'),
(84, '2017/2018-Ganjil', 0, 'ganjil', 8, '217300024', '30', 'KIP0130005', 'Theoris in Second Language Acquisition', 3, 'PBI17DS0009', 'Prof. Dr. Abdul Hakim Yassi, Dipl. TESL., M.A', 'E.11', 'Sabtu/04/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:06:27', '0000-00-00 00:00:00'),
(85, '2017/2018-Ganjil', 0, 'ganjil', 16, '217300024', '30', 'KKB0130004', 'Semantik and Pragmatics', 3, 'PBI17DS0010', 'Dr. Kisman Salija, M.Pd', 'E.11', 'Sabtu/11/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:06:31', '0000-00-00 00:00:00'),
(86, '2017/2018-Ganjil', 0, 'ganjil', 9, '217300024', '30', 'KPB0130002', 'ICT in Language Teaching', 3, 'PBI19DS0005', 'Suriani, S.S, M.Pd., D.A', 'E.11', 'Ahad/05/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:06:35', '0000-00-00 00:00:00'),
(87, '2017/2018-Ganjil', 0, 'ganjil', 7, '217300024', '30', 'KPB0130005', 'Curriculum and Material Development', 3, 'PBI19DS0002', 'Dr. Rafi\'ah Nur, M.Hum', 'E.11', 'Ahad/29/10/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:06:38', '0000-00-00 00:00:00'),
(88, '2017/2018-Ganjil', 0, 'ganjil', 12, '217300024', '30', 'KPP0130001', 'Al Islam dan Kemuhammadiyahan I', 1, 'PBI17DS0012', 'Drs. Mahsyar Idris, M.Ag', 'E.11', 'Sabtu/18/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:06:41', '0000-00-00 00:00:00'),
(89, '2017/2018-Ganjil', 0, 'ganjil', 11, '217300024', '30', 'KUP0130001', 'Language Philosophy', 2, 'PBI17DS0011', 'Prof. Dr. H. Muhammad Siri Dangnga., M.S', 'E.11', 'Ahad/12/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:06:44', '0000-00-00 00:00:00'),
(90, '2017/2018-Ganjil', 0, 'ganjil', 8, '217300025', '30', 'KIP0130005', 'Theoris in Second Language Acquisition', 3, 'PBI17DS0009', 'Prof. Dr. Abdul Hakim Yassi, Dipl. TESL., M.A', 'E.11', 'Sabtu/04/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:06:52', '0000-00-00 00:00:00'),
(91, '2017/2018-Ganjil', 0, 'ganjil', 16, '217300025', '30', 'KKB0130004', 'Semantik and Pragmatics', 3, 'PBI17DS0010', 'Dr. Kisman Salija, M.Pd', 'E.11', 'Sabtu/11/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:06:55', '0000-00-00 00:00:00'),
(92, '2017/2018-Ganjil', 0, 'ganjil', 9, '217300025', '30', 'KPB0130002', 'ICT in Language Teaching', 3, 'PBI19DS0005', 'Suriani, S.S, M.Pd., D.A', 'E.11', 'Ahad/05/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:07:00', '0000-00-00 00:00:00'),
(93, '2017/2018-Ganjil', 0, 'ganjil', 7, '217300025', '30', 'KPB0130005', 'Curriculum and Material Development', 3, 'PBI19DS0002', 'Dr. Rafi\'ah Nur, M.Hum', 'E.11', 'Ahad/29/10/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:07:07', '0000-00-00 00:00:00'),
(94, '2017/2018-Ganjil', 0, 'ganjil', 12, '217300025', '30', 'KPP0130001', 'Al Islam dan Kemuhammadiyahan I', 1, 'PBI17DS0012', 'Drs. Mahsyar Idris, M.Ag', 'E.11', 'Sabtu/18/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:07:11', '0000-00-00 00:00:00'),
(95, '2017/2018-Ganjil', 0, 'ganjil', 11, '217300025', '30', 'KUP0130001', 'Language Philosophy', 2, 'PBI17DS0011', 'Prof. Dr. H. Muhammad Siri Dangnga., M.S', 'E.11', 'Ahad/12/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:07:15', '0000-00-00 00:00:00'),
(96, '2017/2018-Ganjil', 0, 'ganjil', 8, '217300026', '30', 'KIP0130005', 'Theoris in Second Language Acquisition', 3, 'PBI17DS0009', 'Prof. Dr. Abdul Hakim Yassi, Dipl. TESL., M.A', 'E.11', 'Sabtu/04/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:07:23', '0000-00-00 00:00:00'),
(97, '2017/2018-Ganjil', 0, 'ganjil', 16, '217300026', '30', 'KKB0130004', 'Semantik and Pragmatics', 3, 'PBI17DS0010', 'Dr. Kisman Salija, M.Pd', 'E.11', 'Sabtu/11/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:07:27', '0000-00-00 00:00:00'),
(98, '2017/2018-Ganjil', 0, 'ganjil', 9, '217300026', '30', 'KPB0130002', 'ICT in Language Teaching', 3, 'PBI19DS0005', 'Suriani, S.S, M.Pd., D.A', 'E.11', 'Ahad/05/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:07:31', '0000-00-00 00:00:00'),
(99, '2017/2018-Ganjil', 0, 'ganjil', 7, '217300026', '30', 'KPB0130005', 'Curriculum and Material Development', 3, 'PBI19DS0002', 'Dr. Rafi\'ah Nur, M.Hum', 'E.11', 'Ahad/29/10/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:07:34', '0000-00-00 00:00:00'),
(100, '2017/2018-Ganjil', 0, 'ganjil', 12, '217300026', '30', 'KPP0130001', 'Al Islam dan Kemuhammadiyahan I', 1, 'PBI17DS0012', 'Drs. Mahsyar Idris, M.Ag', 'E.11', 'Sabtu/18/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:07:37', '0000-00-00 00:00:00'),
(101, '2017/2018-Ganjil', 0, 'ganjil', 11, '217300026', '30', 'KUP0130001', 'Language Philosophy', 2, 'PBI17DS0011', 'Prof. Dr. H. Muhammad Siri Dangnga., M.S', 'E.11', 'Ahad/12/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:07:41', '0000-00-00 00:00:00'),
(102, '2017/2018-Ganjil', 0, 'ganjil', 8, '217300028', '30', 'KIP0130005', 'Theoris in Second Language Acquisition', 3, 'PBI17DS0009', 'Prof. Dr. Abdul Hakim Yassi, Dipl. TESL., M.A', 'E.11', 'Sabtu/04/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:07:49', '0000-00-00 00:00:00'),
(103, '2017/2018-Ganjil', 0, 'ganjil', 16, '217300028', '30', 'KKB0130004', 'Semantik and Pragmatics', 3, 'PBI17DS0010', 'Dr. Kisman Salija, M.Pd', 'E.11', 'Sabtu/11/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:07:52', '0000-00-00 00:00:00'),
(104, '2017/2018-Ganjil', 0, 'ganjil', 9, '217300028', '30', 'KPB0130002', 'ICT in Language Teaching', 3, 'PBI19DS0005', 'Suriani, S.S, M.Pd., D.A', 'E.11', 'Ahad/05/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:07:55', '0000-00-00 00:00:00'),
(105, '2017/2018-Ganjil', 0, 'ganjil', 7, '217300028', '30', 'KPB0130005', 'Curriculum and Material Development', 3, 'PBI19DS0002', 'Dr. Rafi\'ah Nur, M.Hum', 'E.11', 'Ahad/29/10/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:07:59', '0000-00-00 00:00:00'),
(106, '2017/2018-Ganjil', 0, 'ganjil', 12, '217300028', '30', 'KPP0130001', 'Al Islam dan Kemuhammadiyahan I', 1, 'PBI17DS0012', 'Drs. Mahsyar Idris, M.Ag', 'E.11', 'Sabtu/18/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:08:02', '0000-00-00 00:00:00'),
(107, '2017/2018-Ganjil', 0, 'ganjil', 11, '217300028', '30', 'KUP0130001', 'Language Philosophy', 2, 'PBI17DS0011', 'Prof. Dr. H. Muhammad Siri Dangnga., M.S', 'E.11', 'Ahad/12/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:08:07', '0000-00-00 00:00:00'),
(108, '2017/2018-Ganjil', 0, 'ganjil', 8, '217300029', '30', 'KIP0130005', 'Theoris in Second Language Acquisition', 3, 'PBI17DS0009', 'Prof. Dr. Abdul Hakim Yassi, Dipl. TESL., M.A', 'E.11', 'Sabtu/04/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:08:13', '0000-00-00 00:00:00'),
(109, '2017/2018-Ganjil', 0, 'ganjil', 16, '217300029', '30', 'KKB0130004', 'Semantik and Pragmatics', 3, 'PBI17DS0010', 'Dr. Kisman Salija, M.Pd', 'E.11', 'Sabtu/11/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:08:18', '0000-00-00 00:00:00'),
(110, '2017/2018-Ganjil', 0, 'ganjil', 9, '217300029', '30', 'KPB0130002', 'ICT in Language Teaching', 3, 'PBI19DS0005', 'Suriani, S.S, M.Pd., D.A', 'E.11', 'Ahad/05/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:08:21', '0000-00-00 00:00:00'),
(111, '2017/2018-Ganjil', 0, 'ganjil', 7, '217300029', '30', 'KPB0130005', 'Curriculum and Material Development', 3, 'PBI19DS0002', 'Dr. Rafi\'ah Nur, M.Hum', 'E.11', 'Ahad/29/10/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:08:24', '0000-00-00 00:00:00'),
(112, '2017/2018-Ganjil', 0, 'ganjil', 12, '217300029', '30', 'KPP0130001', 'Al Islam dan Kemuhammadiyahan I', 1, 'PBI17DS0012', 'Drs. Mahsyar Idris, M.Ag', 'E.11', 'Sabtu/18/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:08:29', '0000-00-00 00:00:00'),
(113, '2017/2018-Ganjil', 0, 'ganjil', 11, '217300029', '30', 'KUP0130001', 'Language Philosophy', 2, 'PBI17DS0011', 'Prof. Dr. H. Muhammad Siri Dangnga., M.S', 'E.11', 'Ahad/12/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:08:32', '0000-00-00 00:00:00'),
(114, '2017/2018-Ganjil', 0, 'ganjil', 8, '217300030', '30', 'KIP0130005', 'Theoris in Second Language Acquisition', 3, 'PBI17DS0009', 'Prof. Dr. Abdul Hakim Yassi, Dipl. TESL., M.A', 'E.11', 'Sabtu/04/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:08:41', '0000-00-00 00:00:00'),
(115, '2017/2018-Ganjil', 0, 'ganjil', 16, '217300030', '30', 'KKB0130004', 'Semantik and Pragmatics', 3, 'PBI17DS0010', 'Dr. Kisman Salija, M.Pd', 'E.11', 'Sabtu/11/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:08:44', '0000-00-00 00:00:00'),
(116, '2017/2018-Ganjil', 0, 'ganjil', 9, '217300030', '30', 'KPB0130002', 'ICT in Language Teaching', 3, 'PBI19DS0005', 'Suriani, S.S, M.Pd., D.A', 'E.11', 'Ahad/05/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:08:47', '0000-00-00 00:00:00'),
(117, '2017/2018-Ganjil', 0, 'ganjil', 7, '217300030', '30', 'KPB0130005', 'Curriculum and Material Development', 3, 'PBI19DS0002', 'Dr. Rafi\'ah Nur, M.Hum', 'E.11', 'Ahad/29/10/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:08:50', '0000-00-00 00:00:00'),
(118, '2017/2018-Ganjil', 0, 'ganjil', 12, '217300030', '30', 'KPP0130001', 'Al Islam dan Kemuhammadiyahan I', 1, 'PBI17DS0012', 'Drs. Mahsyar Idris, M.Ag', 'E.11', 'Sabtu/18/11/201', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:08:53', '0000-00-00 00:00:00'),
(119, '2017/2018-Ganjil', 0, 'ganjil', 11, '217300030', '30', 'KUP0130001', 'Language Philosophy', 2, 'PBI17DS0011', 'Prof. Dr. H. Muhammad Siri Dangnga., M.S', 'E.11', 'Ahad/12/11/2017', '08.30-17.30', '', '', NULL, 'T', 'Baru', 'Y', '2017-01-02 20:08:57', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `th_akademik` varchar(40) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `kd_prodi` varchar(15) NOT NULL,
  `nama_mhs` varchar(150) NOT NULL,
  `kelas` enum('A','B','C','D','E','F') NOT NULL,
  `sex` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `hp` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `alamat_ortu` varchar(150) NOT NULL,
  `hp_ortu` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `file_foto` varchar(100) NOT NULL,
  `status` enum('Aktif','Cuti','DO','Meninggal','Lulus') DEFAULT NULL,
  `tgl_insert` datetime NOT NULL,
  `tgl_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`th_akademik`, `nim`, `kd_prodi`, `nama_mhs`, `kelas`, `sex`, `tempat_lahir`, `tgl_lahir`, `alamat`, `kota`, `hp`, `email`, `nama_ayah`, `nama_ibu`, `alamat_ortu`, `hp_ortu`, `password`, `file_foto`, `status`, `tgl_insert`, `tgl_update`) VALUES
('2017/2018-Ganjil', '217290002', '29', 'Ilham Kamba ', 'A', 'L', 'Kabere', '1993-09-06', 'Jl. Ahmad Yani No.6', 'Enrekang', '082386361565', 'immawan.ilham@gmail.com', 'Kamba', 'Zohrah', 'Enrekang', '0', 'b6ebe683ced19b580535f74980489406', '', 'Aktif', '2017-08-01 20:31:07', '2017-10-03 05:39:59'),
('2017/2018-Ganjil', '217290005', '29', 'Mustani', 'A', 'L', 'Rappang', '1972-06-17', 'Jl. Reformasi', 'Enrekang', '082338355567', 'moestani17@gmail.com', 'H. M. Yunus', 'Hj. Nurnong', 'Enrekang', '0', 'f52ef3ff0d9332833c6ec0c968bda08e', '', 'Aktif', '2017-08-01 19:49:29', '2017-08-01 20:18:38'),
('2017/2018-Ganjil', '217290008', '29', 'Ratmi', 'A', 'P', 'Camba', '1985-06-23', 'Jl. Yusuf Majid BTN VTS C/22 Soreang', 'Parepare', '081245142923', 'ratmitahra@gmail.com', 'Muh. Thawaf', 'St. Ratna', 'Parepare', '0', '7b8e148255049ac2c8197805456c7d02', '', 'Aktif', '2017-08-01 20:38:29', '2017-08-01 20:39:38'),
('2017/2018-Ganjil', '217290011', '29', 'Fatmawaty', 'A', 'P', 'Ujung Pandang', '1989-05-27', 'Sidrap', 'Watang Pulu', '081355601455', 'efatmawaty@rocketmail.com', 'Zainuddin', 'Salma', 'Sidrap', '0', 'dac9981394df063b0588c718b7dbe377', '', 'Aktif', '2017-08-01 19:39:54', '2017-08-01 20:23:39'),
('2017/2018-Ganjil', '217290012', '29', 'Nurhaeda', 'A', 'P', 'Maros', '1975-09-15', 'Pudee', 'Barru', '085298325072', '-Tidak ada', 'Amiruddin', 'Aisya', 'Barru', '0', '1d0bb74a287692792bec1ef6d07be2e8', '', 'Aktif', '2017-08-01 20:34:49', '2017-08-01 20:36:03'),
('2017/2018-Ganjil', '217290015', '29', 'Farawansyah Akbar Beddu', 'A', 'L', 'Tonronge', '1996-11-30', 'Sidrap', 'Baranti', '081354879799', 'farawansyah@ymail.com', 'Amiruddin Beddu', 'Bahra', 'Sidrap', '0', 'fdca635d98f714653e8dde737ba2562f', '', 'Aktif', '2017-08-01 19:31:56', '2017-08-01 20:24:57'),
('2017/2018-Ganjil', '217290016', '29', 'Haslinda Hasan', 'A', 'P', 'Ujung Pandang', '1968-08-29', 'Jl. Abd. Salil No. 210', 'Parepare', '081241045085', 'huslindahasan358@gmail.com', 'Hasan', 'Hj. Fatima', 'Parepare', '0', 'c67aea413b23184779bc03db284efbd4', '', 'Aktif', '2017-08-01 19:59:59', '2017-08-01 20:26:23'),
('2017/2018-Ganjil', '217290017', '29', 'Alamsyah', 'A', 'L', 'Ujung Pandang', '1982-05-16', 'Jl. Agus Salim', 'Polman', '082187928050', 'adnan.alamsyah.aa@gmail.com', 'Drs. H. M. Fachri', 'Hj. ST. Nurhajati. T', 'Polman', '0', '0c283dab82e17bb18ea009d6a7e81857', '', 'Aktif', '2017-08-01 19:44:08', '2017-08-01 20:27:46'),
('2017/2018-Ganjil', '217290022', '29', 'Sitti Nismah', 'A', 'P', 'Kaluppang', '1971-07-15', 'Kaluppang', 'Pinrang', '085299012842', 'Tidak ada', 'H. M. Yapit', 'Hj. Daha', 'Pinrang', '0', 'd66f7bf6d1e50d7089c483de7252d07f', '', 'Aktif', '2017-08-01 19:56:48', '2017-08-01 20:16:46'),
('2017/2018-Ganjil', '217300001', '30', 'Kasmawati', 'A', 'P', 'Parepare', '1991-05-31', 'Jl. Industri Kecil No.6', 'Parepare', '082393292779', '-', 'Lasennang', 'Hatija', 'Jl. INdustri Kecil No. 6 Parepare', '0', 'a285ae25880f4a38177348feb56e3494', '', 'Aktif', '2017-08-02 16:32:51', '2017-08-02 16:33:44'),
('2017/2018-Ganjil', '217300006', '30', 'Muliani', 'A', 'P', 'Pinrang', '1992-10-10', 'Mallang', 'Pinrang', '085299237477', 'mulianimulu903@gmail.com', 'Mulu', 'Hasmia', 'Mallang Kab. Pinrang', '0', '47b874615dd9a3eeace5da8180ca665a', '', 'Aktif', '2017-08-02 17:07:18', '2017-08-02 17:09:05'),
('2017/2018-Ganjil', '217300009', '30', 'Jusman', 'A', 'L', 'Tonrange', '1991-03-15', 'Jl. Cisadane Kec. Baranti', 'Sidrap', '082318739360', '-No', 'Lemmang', 'Ramlah', 'Jl. Cisadane Kec. Baranti Kab. Sidrap', '0', '51767acabf71186571ddfe21baf7fda5', '', 'Aktif', '2017-08-02 16:42:04', '2017-08-02 16:44:19'),
('2017/2018-Ganjil', '217300011', '30', 'Ikbal', 'A', 'L', 'Dolangang', '1994-12-27', 'Dolangang', 'Pinrang', '085240094794', '-', 'Abd. Rauf', 'Hj. St Aminah', 'Dolangang Pinrang', '0', '0b0a34c7ba101ff5083255af8bcada6a', '', 'Aktif', '2017-08-02 16:37:26', '2017-08-02 16:39:39'),
('2017/2018-Ganjil', '217300024', '30', 'Irma', 'A', 'P', 'Cilellang', '1996-03-03', 'Panyingkulue', 'Barru', '082393656273', 'irmaandawa@gmail.com', 'Andawa', 'Darma', 'Panyingkulue Kab. Barru', '0', '1ba609f706f8fcfd87f4cf47c77da63c', '', 'Aktif', '2017-08-02 16:48:34', '2017-08-02 16:50:11'),
('2017/2018-Ganjil', '217300025', '30', 'Agusman Saining', 'A', 'L', '-', '1973-08-14', 'Jl. Jend. Ahmad Yani No. 163', 'Parepare', '081342569403', '-', 'Saining', 'Messang', 'Jl. Jend. Ahmad Yani No. 163', '0', 'ffceba1bf8205c1529ede7861587ff1d', '', 'Aktif', '2017-08-02 17:18:04', '2017-08-02 17:19:24'),
('2017/2018-Ganjil', '217300026', '30', 'Rismayanti', 'A', 'P', 'Parepare', '1994-01-07', 'Jl. Patung Pemuda', 'Parepare', '08114210062', 'rismayantibakrin@gmail.com', 'Bakrin. S', 'Sumarni', 'Jl. Patung Pemuda Kota Parepare', '0', '470a33bb4106022cd192a15349dca10a', '', 'Aktif', '2017-08-02 17:11:49', '2017-08-02 17:12:56'),
('2017/2018-Ganjil', '217300028', '30', 'Sakriani', 'A', 'P', 'Awerange', '2017-03-26', 'Ujunge', 'Barru', '085242678029', '-', 'H. Muhammadong', 'Hj. Boddi', 'Ujunge Kab. Barru', '0', '001732271058923c751888e26f65351e', '', 'Aktif', '2017-08-02 16:52:50', '2017-08-02 16:54:09'),
('2017/2018-Ganjil', '217300029', '30', 'Fitrianti', 'A', 'P', 'Rappang', '1991-04-15', 'BTN Pattruki Indah Blok C No.6', 'Parepare', '085394043143', 'fitrianti.risman@gmail.com', 'Risman', 'Hanapiah', 'BTN Pattruki Indah Blok C No.6 Kota Parepare', '0', 'c63002507d36b4dc6f18f140a0e34ee1', '', 'Aktif', '2017-08-02 17:02:51', '2017-08-02 17:04:07'),
('2017/2018-Ganjil', '217300030', '30', 'Hasriani', 'A', 'P', 'Karondongan', '1993-01-24', 'Jl. Melingkar', 'Majene', '082395639937', '-', 'Mas\'ud', 'Halija', 'Jl. Melingkar Kab. Mejene', '0', 'c335060ece43f0b54737426810e6c81f', '', 'Aktif', '2017-08-02 16:57:23', '2017-08-02 16:58:27'),
('2017/2018-Ganjil', '217310001', '31', 'Humaerah Munir', 'A', 'P', 'Parepare', '1984-08-28', 'Jl. Abd Rasyid No.23', 'Parepare', '085242964593', 'rha.najwa@gmail.com', 'Drs. H. Munir Kadir, M.Ag', 'Hj. Haeriah, B.A', 'Parepare', '0', 'f74892a4af171ef8592fc1134944ce83', '', 'Aktif', '2017-08-02 14:23:07', '2017-08-02 14:23:55'),
('2017/2018-Ganjil', '217310002', '31', 'Bambang Seh Parianto', 'A', 'L', 'Wonomulyo', '1981-08-18', 'Jl. Teuku Umar No.38', 'Pinrang', '085255702706', 'bambangsehparianto@gmail.com', 'Djupari', 'Siningsi', 'Pinrang', '0', '3079623a9f212debfa8863614c334ab1', '', 'Aktif', '2017-08-02 14:07:26', '2017-08-02 14:08:32'),
('2017/2018-Ganjil', '217310003', '31', 'Hasriani N', 'A', 'P', 'Parepare', '1976-11-22', 'Jl. Bau Masepe Lorong Fatima', 'Parepare', '085298619276', 'hasrianiwarany34079@gmail.com', 'Lanikka', 'Hanifa', 'Parepare', '0', 'ce6e7f58c8bffaeaec5a70845d745e18', '', 'Aktif', '2017-08-02 14:04:35', '2017-08-02 14:05:17'),
('2017/2018-Ganjil', '217310005', '31', 'Nurholis', 'A', 'L', 'Ujung Pandang', '1992-05-13', 'Baraka', 'Enrekang', '085397843964', '-', 'Abd Rahim', 'Halisah', 'Enrekang', '0', '566745bfc217054cec3ae3151cad5bce', '', 'Aktif', '2017-08-02 14:14:40', '2017-08-02 14:15:07'),
('2017/2018-Ganjil', '217310007', '31', 'Saharuddin', 'A', 'L', 'Lappingan', '1992-07-16', 'Lappingan', 'Polewali Mandar', '082346416444', '-', 'Muhsin', 'Saiwa', 'Polewali Mandar', '0', 'e7b4f8ed3951163f51aea0d0e57a10a5', '', 'Aktif', '2017-08-02 14:09:55', '2017-08-02 14:10:43'),
('2017/2018-Ganjil', '217310008', '31', 'Kamiluddin', 'A', 'L', 'Saluaho', '1992-04-05', 'Saluaho', 'Mamasa', '085397619059', '-', 'Tembo', 'Maliha', 'Mamasa', '0', 'a747f68eb4c3fd2cd006fd2fb0eabef6', '', 'Aktif', '2017-08-02 14:18:46', '2017-08-02 14:19:21'),
('2017/2018-Ganjil', '217310009', '31', 'Rahmatullah', 'A', 'L', 'Pangkep', '1993-10-25', 'Attangsalo', 'Pangkep', '081243315397', '-', 'Baharuddin', 'Sairah', 'Pangkep', '0', '9e9ff92f5879ae86f901749e85bdcccd', '', 'Aktif', '2017-08-02 14:20:48', '2017-08-02 14:21:15'),
('2017/2018-Ganjil', '217310011', '31', 'Rati Paramita Pali', 'A', 'P', 'Parombean', '1994-07-06', 'Parombean', 'Enrekang', '085340798606', 'ratiparamitapali06@gmail.com', 'Pali', 'Tini', 'Enrekang', '0', '793504b4a83d5b429db4ce4f2ac850cb', '', 'Aktif', '2017-08-02 14:01:56', '2017-08-02 14:02:36'),
('2017/2018-Ganjil', '217310012', '31', 'Mayunida Damier', 'A', 'P', 'Batukarampuang', '1995-05-05', 'Batukarampuang', 'Mamuju Tengah', '081247794889', '-', 'Damier', 'Rosdiah', 'Mamuju Tengah', '0', '7dd2d8cf6d32505b8728a87d105d15bb', '', 'Aktif', '2017-08-02 14:12:20', '2017-08-02 14:12:49'),
('2017/2018-Ganjil', '217310015', '31', 'Yudio K', 'A', 'L', 'Jember', '1971-05-04', 'jl. Jamil Ismail I', 'Parepare', '082396154823', 'kristantoyudio@gmail.com', 'Suyoto', 'Sudarsilah', 'Parepare', '0', 'c977dacfa7abe7bd7e9402a243c14471', '', 'Aktif', '2017-08-02 14:16:48', '2017-08-02 14:17:21'),
('2017/2018-Ganjil', '217370001', '37', 'Subairi', 'A', 'L', 'Sumenep', '1987-12-29', 'Jl. Kemakmuran', 'Wajo', '0', 'mts_ddnpare@yahoo.co.id', '', '', '', '', '720d54f624c0b0ea21aca780df82d517', '', 'Aktif', '2017-08-02 14:34:11', '0000-00-00 00:00:00'),
('2017/2018-Ganjil', '217370002', '37', 'M Syahrir', 'A', 'L', 'Bangkala', '1974-07-10', 'Tancung Tanasitolo', 'Wajo', '0', '-', '', '', '', '', '43c54084541e1624c7bf3648aaca5e9d', '', 'Aktif', '2017-08-02 14:35:23', '0000-00-00 00:00:00'),
('2017/2018-Ganjil', '217370003', '37', 'Sahril', 'A', 'L', 'Parepare', '1966-04-01', 'Jl. H. Syamsul Alam Bulu', 'Parepare', '081242168956', '-', '', '', '', '', 'cd7da7461d2741d59af62edc6edac9ff', '', 'Aktif', '2017-08-02 14:37:08', '0000-00-00 00:00:00'),
('2017/2018-Ganjil', '217370004', '37', 'Syamsu T', 'A', 'L', 'Simpo', '1964-05-25', 'Jl. Poros Pangkajene Lt. Salo', 'Rappang', '085242521164', '-', '', '', '', '', 'caacb4b1800a5bf6839a0603010419da', '', 'Aktif', '2017-08-02 14:39:08', '0000-00-00 00:00:00'),
('2017/2018-Ganjil', '217370005', '37', 'Muhammad Ihwan', 'A', 'L', 'Pinrang', '1968-04-21', 'Jl. Anoa Lalle Baru', 'Pinrang', '0', '-', '', '', '', '', '7fb4d66519953c2f661a0b338081b1ed', '', 'Aktif', '2017-08-02 14:41:08', '0000-00-00 00:00:00'),
('2017/2018-Ganjil', '217370006', '37', 'Muhammad Risal', 'A', 'L', 'Pinrang', '1968-07-08', 'Jl. Sawitto No. 115', 'Pinrang', '0', '-', '', '', '', '', '8d79fd5031bbc256b5550d6eebc0f787', '', 'Aktif', '2017-08-02 14:43:00', '0000-00-00 00:00:00'),
('2017/2018-Ganjil', '217370008', '37', 'Syahrir Haruna', 'A', 'L', 'Pinrang', '1966-11-24', 'Sekkang Ruba', 'Watang Sawitto', '082395954539', '-', '', '', '', '', '90a5d5cd1b976aad28e88935cfce0e3a', '', 'Aktif', '2017-08-02 14:44:56', '0000-00-00 00:00:00'),
('2017/2018-Ganjil', '217370010', '37', 'Muh Dahlan', 'A', 'L', 'Lambur', '1973-04-20', 'Jl. Bambu Runcing Lorong Durian No. 25D', 'Parepare', '085398348177', 'dahlanppkn@gmail.com', '', '', '', '', '6b8b704a57b2a8c12d10d9bee1f9bb6b', '', 'Aktif', '2017-08-02 14:47:05', '0000-00-00 00:00:00'),
('2017/2018-Ganjil', '217370018', '37', 'Sulaeman', 'A', 'L', 'Pinrang', '1976-05-12', 'Pinrang', 'Pinrang', '0', '-', '', '', '', '', '8e06544670452241644b79151b3f6a77', '', 'Aktif', '2017-08-02 14:48:20', '0000-00-00 00:00:00'),
('2017/2018-Ganjil', '217370019', '37', 'Abd Gani', 'A', 'L', 'Beraim Praya', '1982-12-31', 'BTN Sekkang Mas', 'Pinrang', '085242053086', 'rahmigani16@gmail.com', '', '', '', '', 'fa51050e2fd5ffc7c9940f129544bece', '', 'Aktif', '2017-08-02 14:50:25', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mata_kuliah`
--

CREATE TABLE `tb_mata_kuliah` (
  `kd_mk` varchar(10) NOT NULL,
  `kd_prodi` varchar(15) NOT NULL,
  `nama_mk` varchar(100) NOT NULL,
  `sks` smallint(6) NOT NULL,
  `smt` enum('1','2','3','4','5','6','7','8') NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL,
  `tgl_insert` date NOT NULL,
  `tgl_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mata_kuliah`
--

INSERT INTO `tb_mata_kuliah` (`kd_mk`, `kd_prodi`, `nama_mk`, `sks`, `smt`, `semester`, `aktif`, `tgl_insert`, `tgl_update`) VALUES
('KIP0130005', '30', 'Theoris in Second Language Acquisition', 3, '1', 'Ganjil', 'Ya', '2019-03-28', '0000-00-00'),
('KIP0230001', '30', 'Psychology in Language Teaching', 3, '2', 'Genap', 'Ya', '2019-03-28', '0000-00-00'),
('KIP0330002', '30', 'Field Study', 1, '3', 'Ganjil', 'Ya', '2019-03-28', '0000-00-00'),
('KKB0130004', '30', 'Semantik and Pragmatics', 3, '1', 'Ganjil', 'Ya', '2019-03-28', '0000-00-00'),
('KKB0330001', '30', 'Discourse Analysis', 3, '3', 'Ganjil', 'Ya', '2019-03-28', '0000-00-00'),
('KKB0330002', '30', 'Linguistic Analysis', 3, '3', 'Ganjil', 'Ya', '2019-03-28', '0000-00-00'),
('KKB0330003', '30', 'English Literature', 3, '3', 'Ganjil', 'Ya', '2019-03-28', '0000-00-00'),
('KPB0130002', '30', 'ICT in Language Teaching', 3, '1', 'Ganjil', 'Ya', '2019-03-28', '0000-00-00'),
('KPB0130005', '30', 'Curriculum and Material Development', 3, '1', 'Ganjil', 'Ya', '2019-03-28', '0000-00-00'),
('KPB0230001', '30', 'Method of TEFL', 3, '2', 'Genap', 'Ya', '2019-03-28', '0000-00-00'),
('KPB0230006', '30', 'Research in Language Teaching', 3, '2', 'Genap', 'Ya', '2019-03-28', '0000-00-00'),
('KPB0330004', '30', 'Language Testing and Evaluation', 3, '3', 'Ganjil', 'Ya', '2019-03-28', '0000-00-00'),
('KPB0430003', '30', 'Microteaching', 1, '4', 'Genap', 'Ya', '2019-03-28', '0000-00-00'),
('KPL0230001', '30', 'Morphosyntax', 2, '2', 'Genap', 'Ya', '2019-03-28', '0000-00-00'),
('KPL0230002', '30', 'English for Specifik Purpose (ESP)', 2, '2', 'Genap', 'Ya', '2019-03-28', '0000-00-00'),
('KPP0130001', '30', 'Al Islam dan Kemuhammadiyahan I', 1, '1', 'Ganjil', 'Ya', '2019-03-28', '0000-00-00'),
('KPP0230002', '30', 'Al Islam dan Kemuhammadiyahan II', 1, '2', 'Genap', 'Ya', '2019-03-28', '0000-00-00'),
('KUP0130001', '30', 'Language Philosophy', 2, '1', 'Ganjil', 'Ya', '2019-03-28', '0000-00-00'),
('KUP0330002', '30', 'Sociolinguistics', 3, '3', 'Ganjil', 'Ya', '2019-03-28', '0000-00-00'),
('KUP0430003', '30', 'Seminar Proposal Penelitian', 1, '4', 'Genap', 'Ya', '2019-03-28', '0000-00-00'),
('KUP0430004', '30', 'Seminar Hasil Penelitian', 1, '4', 'Genap', 'Ya', '2019-03-28', '0000-00-00'),
('KUP0430005', '30', 'Thesis', 4, '4', 'Genap', 'Ya', '2019-03-28', '0000-00-00'),
('MBB 37 008', '37', 'Pendidikan Kesehatan, Lingkungan, dan Teknologi Pendidikan dalam Islam', 3, '2', 'Genap', 'Ya', '2019-03-28', '0000-00-00'),
('MKB 37 001', '37', 'Islam, Filsafat, Sains, dan Pendidikan', 3, '1', 'Ganjil', 'Ya', '2019-03-28', '0000-00-00'),
('MKB 37 002', '37', 'Klinik Metodologi', 3, '1', 'Ganjil', 'Ya', '2019-03-28', '0000-00-00'),
('MKB 37 009', '37', 'Seminar Proposal Disertasi', 3, '3', 'Ganjil', 'Ya', '2019-03-28', '2019-03-28'),
('MKB 37 010', '37', 'Ujian Proposal Disertasi', 3, '3', 'Ganjil', 'Ya', '2019-03-28', '0000-00-00'),
('MKB 37 012', '37', 'Work in Progress Disertasi', 2, '3', 'Ganjil', 'Ya', '2019-03-28', '0000-00-00'),
('MKB 37 014', '37', 'Ujian Pendahuluan Disertasi', 8, '3', 'Ganjil', 'Ya', '2019-03-28', '0000-00-00'),
('MKB 37 015', '37', 'Promosi Disertasi', 10, '3', 'Ganjil', 'Ya', '2019-03-28', '2019-03-28'),
('MKB 37 016', '37', 'Bahasa Inggris, Bahasa Arab, dan Bahasa Indonesia', 0, '2', 'Genap', 'Ya', '2019-03-28', '0000-00-00'),
('MKD 2901', '29', 'Al-Islam Kemuhammadiyahan I', 1, '1', 'Ganjil', 'Ya', '2017-10-01', '0000-00-00'),
('MKD 2902', '29', 'Al-Islam Kemuhammadiyahan II', 1, '2', 'Genap', 'Ya', '2017-10-01', '0000-00-00'),
('MKD 2903', '29', 'Filsafat Ilmu', 2, '1', 'Ganjil', 'Ya', '2017-10-01', '0000-00-00'),
('MKD 2904', '29', 'Integrated Agribusiness System', 3, '2', 'Genap', 'Ya', '2017-10-01', '0000-00-00'),
('MKD 3101', '31', 'Studi Tafsir dan Pembelajarannya', 2, '1', 'Ganjil', 'Ya', '2019-03-28', '0000-00-00'),
('MKD 3102', '31', 'Studi Hadis dan Pembelajarannya', 2, '1', 'Ganjil', 'Ya', '2019-03-28', '0000-00-00'),
('MKD 3103', '31', 'Studi Pemikiran Pendidikan Islma Kontemporer', 2, '1', 'Ganjil', 'Ya', '2019-03-28', '0000-00-00'),
('MKD 3104', '31', 'Sejarah Islam Klasik, Modern, dan Lokal', 2, '1', 'Ganjil', 'Ya', '2019-03-28', '0000-00-00'),
('MKD 3105', '31', 'Al Islam dan Kemuhammadiyahan I', 1, '1', 'Ganjil', 'Ya', '2019-03-28', '0000-00-00'),
('MKD 3106', '31', 'Al Islam dan Kemuhammadiyahan II', 1, '2', 'Genap', 'Ya', '2019-03-28', '0000-00-00'),
('MKK', '37', 'Kajian Pendidikan Islam Komprehensif', 0, '1', 'Ganjil', 'Ya', '2019-03-28', '0000-00-00'),
('MKK 2901', '29', 'Ilmu Ekonomi', 3, '1', 'Ganjil', 'Ya', '2017-10-01', '0000-00-00'),
('MKK 2902', '29', 'Perencanaan & Kebijakan Pembangunan Pertanian', 3, '1', 'Ganjil', 'Ya', '2017-10-01', '0000-00-00'),
('MKK 2903', '29', 'Manajajemen Agribisnis', 3, '1', 'Ganjil', 'Ya', '2017-10-01', '0000-00-00'),
('MKK 2904', '29', 'Manajemen Strategi Kebijakan Bisnis', 2, '2', 'Genap', 'Ya', '2017-10-01', '0000-00-00'),
('MKK 2905', '29', 'Manajemen Pemasaran', 3, '2', 'Genap', 'Ya', '2017-10-01', '0000-00-00'),
('MKK 2906', '29', 'Metodologi Penelitian', 3, '2', 'Genap', 'Ya', '2017-10-01', '0000-00-00'),
('MKK 2907', '29', 'Analisi Kelayakan Agribisnis', 3, '3', 'Ganjil', 'Ya', '2017-10-01', '0000-00-00'),
('MKK 2908', '29', 'Manajemen Sumber Daya Manusia', 2, '3', 'Ganjil', 'Ya', '2017-10-01', '0000-00-00'),
('MKK 2909', '29', 'Seminar Proposal Penelitian', 1, '4', 'Genap', 'Ya', '2017-10-01', '0000-00-00'),
('MKK 2910', '29', 'Seminar Hasil Penelitian', 1, '4', 'Genap', 'Ya', '2017-10-01', '0000-00-00'),
('MKK 2911', '29', 'Tesis', 4, '4', 'Genap', 'Ya', '2017-10-01', '0000-00-00'),
('MKK 3101', '31', 'Pengembangan Materi dan Kurikulum PAI berbasis kearifan lokal', 3, '2', 'Genap', 'Ya', '2019-03-28', '0000-00-00'),
('MKK 3102', '31', 'Pengembangan Strategi pembelajaran PAI berbasis TIK', 3, '3', 'Ganjil', 'Ya', '2019-03-28', '0000-00-00'),
('MKK 3103', '31', 'Analisis evaluasi pembelajaran PAI berbasis TIK', 3, '2', 'Genap', 'Ya', '2019-03-28', '0000-00-00'),
('MKK 3104', '31', 'Teori Belajar dan Inovasi Pembelajarannya', 3, '2', 'Genap', 'Ya', '2019-03-28', '0000-00-00'),
('MKK 3105', '31', 'Pendidikan Karakter di Sekolah, Madrasah dan Pesantren', 3, '2', 'Genap', 'Ya', '2019-03-28', '0000-00-00'),
('MKK 3106', '31', 'Teori-Teori Komunikasi Pendidikan dan Dakwah', 3, '3', 'Ganjil', 'Ya', '2019-03-28', '0000-00-00'),
('MKK 3107', '31', 'Manajemen mutu terpadu pendidikan Islam', 3, '3', 'Ganjil', 'Ya', '2019-03-28', '0000-00-00'),
('MKK 3108', '31', 'Metodologi Penelitian Pendidikan Islam', 3, '1', 'Ganjil', 'Ya', '2019-03-28', '0000-00-00'),
('MKK 3109', '31', 'Teknik Penulisan jurnal nasional dan Internasional', 1, '2', 'Genap', 'Ya', '2019-03-28', '0000-00-00'),
('MKK 3110', '31', 'Studi Lapang', 1, '4', 'Genap', 'Ya', '2019-03-28', '0000-00-00'),
('MKK 3111', '31', 'Tesis ', 6, '4', 'Genap', 'Ya', '2019-03-28', '2019-03-28'),
('MKK 3112', '31', 'Jurnal Nasional', 1, '4', 'Genap', 'Ya', '2019-03-28', '0000-00-00'),
('MKK 37 006', '37', 'Pendidikan Islam Normatif', 3, '2', 'Genap', 'Ya', '2019-03-28', '0000-00-00'),
('MKK 37 011', '37', 'Ujian Keahlian Komprehensif', 2, '3', 'Ganjil', 'Ya', '2019-03-28', '0000-00-00'),
('MKK 37 013', '37', 'Verifikasi Ujian-Ujian', 2, '3', 'Ganjil', 'Ya', '2019-03-28', '0000-00-00'),
('MKP 2901', '29', 'Agribisnis Syariah', 3, '1', 'Ganjil', 'Ya', '2017-10-01', '2017-01-02'),
('MKP 2902', '29', 'Ekonomi Pewilayahan Agribisnis', 3, '3', 'Ganjil', 'Ya', '2017-10-01', '0000-00-00'),
('MKP 2903', '29', 'Kelembagaan Pembangunan Pertanian', 3, '3', 'Ganjil', 'Ya', '2017-10-01', '0000-00-00'),
('MKP 2904', '29', 'Agroindustri Bahan Pangan', 2, '3', 'Ganjil', 'Ya', '2017-10-01', '0000-00-00'),
('MKP 2905', '29', 'Benchmarking', 1, '4', 'Genap', 'Ya', '2017-10-01', '0000-00-00'),
('MKP 3101', '31', 'Sosiologi Islam', 2, '3', 'Ganjil', 'Ya', '2019-03-28', '0000-00-00'),
('MKP 3102', '31', 'Studi kebijakan pendidikan Islam di Indonesia', 2, '3', 'Ganjil', 'Ya', '2019-03-28', '0000-00-00'),
('MKP 3103', '31', 'Studi Budaya Lokal Perspektif Islam', 2, '3', 'Ganjil', 'Ya', '2019-03-28', '0000-00-00'),
('MPB 37 003', '37', 'Kajian Islam Komprehensif', 0, '1', 'Ganjil', 'Ya', '2019-03-28', '0000-00-00'),
('MPK 37 005', '37', 'Tafsir & Hadis: Kajian Tekstual & Kontekstual', 3, '1', 'Ganjil', 'Ya', '2019-03-28', '2019-03-28'),
('MPK 37 007', '37', 'Pendidikan Islam dan Perubahan Sosial', 3, '2', 'Genap', 'Ya', '2019-03-28', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mutasi_mhs`
--

CREATE TABLE `tb_mutasi_mhs` (
  `id_mutasi` int(11) NOT NULL,
  `th_akademik` varchar(20) NOT NULL,
  `semester` enum('ganjil','genap') NOT NULL DEFAULT 'ganjil',
  `tgl_mutasi` date NOT NULL,
  `nim` varchar(20) NOT NULL,
  `status` enum('Aktif','Cuti','DO','Meninggal','Lulus') NOT NULL,
  `ket` text NOT NULL,
  `tgl_insert` datetime NOT NULL,
  `tgl_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `kd_prodi` varchar(15) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `singkat` char(4) NOT NULL,
  `kaprodi` varchar(50) NOT NULL,
  `nidn` varchar(30) NOT NULL,
  `akreditasi` char(1) NOT NULL,
  `tgl_insert` date NOT NULL,
  `tgl_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_prodi`
--

INSERT INTO `tb_prodi` (`kd_prodi`, `prodi`, `singkat`, `kaprodi`, `nidn`, `akreditasi`, `tgl_insert`, `tgl_update`) VALUES
('29', 'Agribisnis (S2)', 'AGB', 'Dr. Abdul Aziz Ambar, M.P.', '855484', 'B', '2019-03-28', '0000-00-00'),
('30', 'Pendidikan Bahasa Inggris (S2)', 'PBI', 'Dr. Ammang Latifa, M.Hum', '933292', 'B', '2019-03-28', '0000-00-00'),
('31', 'Pendidikan Agama Islam (S2)', 'PAI', 'Dr. St. Wardah Hanafie Das, M.Pd.I', '984442', 'B', '2019-03-28', '0000-00-00'),
('37', 'Pendidikan Agama Islam (S3)', 'PAI', 'Dr. Wardah Hanafie Das, M. Pd.I', '984422', 'P', '2019-03-28', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_setting`
--

CREATE TABLE `tb_setting` (
  `id` int(11) NOT NULL,
  `form` varchar(50) NOT NULL,
  `tgl_close` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_setting`
--

INSERT INTO `tb_setting` (`id`, `form`, `tgl_close`) VALUES
(1, 'KRS', '2021-01-01'),
(2, 'Wisuda', '2018-03-31'),
(3, 'Nilai', '2018-08-31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`kd_dosen`),
  ADD KEY `Kd_prodi` (`kd_prodi`);

--
-- Indexes for table `tb_identitas`
--
ALTER TABLE `tb_identitas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `Th_akademik` (`th_akademik`,`semester`,`kd_prodi`,`kd_mk`,`kd_dosen`,`hari`,`pukul`,`ruang`);

--
-- Indexes for table `tb_krs`
--
ALTER TABLE `tb_krs`
  ADD PRIMARY KEY (`id_krs`),
  ADD KEY `Id_jadwal` (`id_jadwal`,`nim`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `Kd_prodi` (`kd_prodi`);

--
-- Indexes for table `tb_mata_kuliah`
--
ALTER TABLE `tb_mata_kuliah`
  ADD PRIMARY KEY (`kd_mk`),
  ADD KEY `Kd_prodi` (`kd_prodi`);

--
-- Indexes for table `tb_mutasi_mhs`
--
ALTER TABLE `tb_mutasi_mhs`
  ADD PRIMARY KEY (`id_mutasi`);

--
-- Indexes for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`kd_prodi`);

--
-- Indexes for table `tb_setting`
--
ALTER TABLE `tb_setting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_identitas`
--
ALTER TABLE `tb_identitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_jadwal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_krs`
--
ALTER TABLE `tb_krs`
  MODIFY `id_krs` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `tb_mutasi_mhs`
--
ALTER TABLE `tb_mutasi_mhs`
  MODIFY `id_mutasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_setting`
--
ALTER TABLE `tb_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD CONSTRAINT `tb_dosen_ibfk_2` FOREIGN KEY (`kd_prodi`) REFERENCES `tb_prodi` (`kd_prodi`);

--
-- Constraints for table `tb_mata_kuliah`
--
ALTER TABLE `tb_mata_kuliah`
  ADD CONSTRAINT `tb_mata_kuliah_ibfk_1` FOREIGN KEY (`kd_prodi`) REFERENCES `tb_prodi` (`kd_prodi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
