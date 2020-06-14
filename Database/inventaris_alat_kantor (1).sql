-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 03, 2020 at 04:54 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris_alat_kantor`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `jenis_barang` varchar(50) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `gambar` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `jenis_barang`, `jumlah`, `keterangan`, `gambar`) VALUES
('1000', 'test', 'Alat Tulis', 1, '<p>coba</p>', 0x66696c655f736b70706b6f6d5f32303230303630315f3039343733355f62376464666438363032313064663537366563396166643034623230366165302e6a706567),
('110', 'Kertas', 'Alat Tulis', 30, '<p>per RIM</p>', 0x66696c655f736b70706b6f6d5f32303230303532395f3137343233315f30393966363363333862326561643363646165343930373337636133313736302e6a706567),
('111', 'outner', 'Alat Tulis', 0, '<p>Buah</p>', 0x66696c655f736b70706b6f6d5f32303230303532395f3137343331385f63316162366166356537333866333033653566373665633763666133623766642e6a7067),
('112', 'Clip Kertas', 'Alat Tulis', 0, '<p>Doos</p>', 0x66696c655f736b70706b6f6d5f32303230303532395f3137343430375f34316339313837643130646437363662363132616530366462333738333336342e6a7067),
('113', 'Buku Quarto', 'Alat Tulis', 8, '<p>Lusin</p>', 0x66696c655f736b70706b6f6d5f32303230303532395f3137343434325f35343161306239366137316436396531383639303837613231356262396232382e6a7067),
('114', 'Selotip Besar Bening', 'Alat Tulis', 3, '<p>Buah</p>', 0x66696c655f736b70706b6f6d5f32303230303532395f3137343832355f33303662353966663266626663653032303538303535333638343166363135622e6a7067),
('115', 'Tinta Stempel', 'Alat Tulis', 10, '<p>pack</p>', 0x66696c655f736b70706b6f6d5f32303230303532395f3137343930325f30326137303633666134656239393961333231623865666330396465303761322e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `deskripsi`) VALUES
(4, 'Alat Tulis', '<p>ATK</p>'),
(5, 'test', '<p>coba</p>');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nik` varchar(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jk` varchar(2) DEFAULT NULL,
  `ttl` date DEFAULT NULL,
  `bagian` varchar(10) DEFAULT NULL,
  `gambar` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama`, `jk`, `ttl`, `bagian`, `gambar`) VALUES
('15683182', 'Yuni Artati, S.E., M.M', 'P', '1968-08-14', 'Kep TU', 0x66696c655f6b7279776e5f35396235313431373462666665346165343032623364363361616437396665302e6a7067),
('1630511095', 'Ardian Ferdy F', 'L', '1999-05-23', 'IT', 0x66696c655f6b7279776e5f34363633326135323662393830623431343738636136303738666230326332382e6a7067),
('16783681', 'Dra. SriKudiyanti,MM', 'P', '1966-03-17', 'Kep Umum', 0x66696c655f6b7279776e5f35396235313431373462666665346165343032623364363361616437396665302e6a7067),
('17080198', 'Ir. Eko Cahyono', 'L', '1965-02-10', 'Sekretaris', 0x66696c655f6b7279776e5f35396235313431373462666665346165343032623364363361616437396665302e6a7067),
('17086537', 'Drs. Joko Purwanto, MM', 'L', '1972-05-10', 'Kep Sidang', 0x66696c655f6b7279776e5f35396235313431373462666665346165343032623364363361616437396665302e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_transaksi` varchar(12) DEFAULT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_transaksi`, `tgl_pengembalian`, `id_petugas`) VALUES
('20200313001', '2020-03-13', 10),
('20200427001', '2020-04-27', 10),
('20200427003', '2020-04-27', 10),
('20200601013', '2020-06-01', 11),
('20200531005', '2020-06-01', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tmp`
--

CREATE TABLE `tmp` (
  `kode_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL,
  `jumlah_barang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tmp`
--

INSERT INTO `tmp` (`kode_barang`, `nama_barang`, `jenis_barang`, `jumlah_barang`) VALUES
('1000', 'test', 'Alat Tulis', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(12) NOT NULL,
  `nik` varchar(10) DEFAULT NULL,
  `kode_barang` varchar(5) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nik`, `kode_barang`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `id_petugas`) VALUES
('20200427003', '1630511094', '110', '2020-04-27', '2020-05-04', 'Y', 10),
('20200531004', '1630511095', '111', '2020-05-31', '2020-06-07', 'N', 11),
('20200531005', '17080198', '111', '2020-05-31', '2020-06-07', 'Y', 11),
('20200531006', '17080198', '111', '2020-05-31', '2020-06-07', 'N', 11),
('20200531007', '1630511095', '111', '2020-05-31', '2020-06-07', 'N', 11),
('20200531008', '1630511095', '111', '2020-05-31', '2020-06-07', 'N', 11),
('20200531009', '17080198', '110', '2020-05-31', '2020-06-07', 'N', 11),
('20200531010', '17080198', '110', '2020-05-31', '2020-06-07', 'N', 11),
('20200531011', '1630511095', '110', '2020-05-31', '2020-06-07', 'N', 11),
('20200531012', '17080198', '112', '2020-05-31', '2020-06-07', 'N', 11),
('20200601013', '16783681', '112', '2020-06-01', '2020-06-08', 'Y', 11),
('20200601014', '17080198', '112', '2020-06-01', '2020-06-08', 'N', 11),
('20200601015', '17080198', '112', '2020-06-01', '2020-06-08', 'N', 11),
('20200601016', '17080198', '110', '2020-06-01', '2020-06-08', 'N', 11),
('20200601017', '17086537', '118', '2020-06-01', '2020-06-08', 'N', 11),
('20200601018', '17086537', '118', '2020-06-01', '2020-06-08', 'N', 11),
('20200601019', '17086537', '118', '2020-06-01', '2020-06-08', 'N', 11),
('20200601020', '17080198', '112', '2020-06-01', '2020-06-08', 'N', 11),
('20200601021', '17080198', '111', '2020-06-01', '2020-06-08', 'N', 11),
('20200601022', '17080198', '111', '2020-06-01', '2020-06-08', 'N', 11),
('20200601023', '17080198', '111', '2020-06-01', '2020-06-08', 'N', 11),
('20200601024', '1630511095', '113', '2020-06-01', '2020-06-08', 'N', 11),
('20200601025', '15683182', '1000', '2020-06-01', '2020-06-08', 'N', 11),
('20200601026', '17086537', '1000', '2020-06-01', '2020-06-08', 'N', 11);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_petugas`, `username`, `full_name`, `password`) VALUES
(11, 'setwan', 'admin', '$2y$05$dYySizlr32hbWfw9gvtjpupT78cQCzWkjHejBlDaepxCcGnGlxNMa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
