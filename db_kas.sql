-- phpMyAdmin SQL Dump
-- version 3.1.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 01, 2017 at 12:21 PM
-- Server version: 5.1.35
-- PHP Version: 5.2.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_kas`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kas`
--

CREATE TABLE IF NOT EXISTS `tb_kas` (
  `idkas` int(11) NOT NULL AUTO_INCREMENT,
  `kdrek` varchar(50) NOT NULL,
  `ket` varchar(50) NOT NULL,
  `jenis` varchar(15) NOT NULL,
  `tgl` date NOT NULL,
  `debit` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  PRIMARY KEY (`idkas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tb_kas`
--

INSERT INTO `tb_kas` (`idkas`, `kdrek`, `ket`, `jenis`, `tgl`, `debit`, `kredit`) VALUES
(14, '6 1 1', 'Pemasukan Dari A', 'Pendapatan', '2017-03-01', 619069, 0),
(15, '6 1 1', 'Pengeluaran Dari B', 'Pengeluaran', '2017-03-02', 0, 449069),
(16, '5 1 1', 'TERIMA SP2D Nomor 000213/SP2D-GJ/2017', 'Pendapatan', '2017-04-01', 122367, 0),
(17, '6 1 1', 'Pembayaran Gaji Pegawai Negeri Sipil Dinas Pangan ', '', '2017-04-02', 0, 0),
(18, '5 1 1', 'Dinas Pangan', 'Pengeluaran', '2017-04-04', 0, 122367);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `kode_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` longtext NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `keterangan` longtext NOT NULL,
  `level` varchar(10) NOT NULL,
  PRIMARY KEY (`kode_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`kode_user`, `username`, `password`, `pass`, `nama_lengkap`, `jenis_kelamin`, `alamat`, `no_telepon`, `keterangan`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Mohammad Nur Fawaiq', 'Laki-laki', 'Jl. Panunggulan 17B Pati Jawa Tengah', '085786447406', 'Pemilik Toserba Fawaiq', 'admin');
