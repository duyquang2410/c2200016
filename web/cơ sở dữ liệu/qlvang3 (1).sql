-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 02:53 AM
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
-- Database: `qlvang3`
--

-- --------------------------------------------------------

--
-- Table structure for table `bophan`
--

CREATE TABLE `bophan` (
  `Ma_BP` int(11) NOT NULL,
  `Ten_BP` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `bophan`
--

INSERT INTO `bophan` (`Ma_BP`, `Ten_BP`) VALUES
(1, 'Nhân viên bán hàng'),
(2, 'Quản lý'),
(3, 'Nhân viên kho');

-- --------------------------------------------------------

--
-- Table structure for table `chatlieu`
--

CREATE TABLE `chatlieu` (
  `Ma_CL` int(11) NOT NULL,
  `Loai_CL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `chatlieu`
--

INSERT INTO `chatlieu` (`Ma_CL`, `Loai_CL`) VALUES
(1, 'Vàng 18k '),
(2, 'Vàng 14k'),
(3, 'Vàng trắng 14k'),
(4, 'Vàng đính đá'),
(5, 'Bạc đính đá'),
(6, 'Bạc '),
(7, 'Vàng 10k'),
(8, 'Vàng trắng 18k'),
(9, 'Vàng 24k');

-- --------------------------------------------------------

--
-- Table structure for table `chitietchatlieu`
--

CREATE TABLE `chitietchatlieu` (
  `Ma_SP` int(11) NOT NULL,
  `Ma_CL` int(11) NOT NULL,
  `Gia_CL` int(11) DEFAULT NULL,
  `HamLuong` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `chitietchatlieu`
--

INSERT INTO `chitietchatlieu` (`Ma_SP`, `Ma_CL`, `Gia_CL`, `HamLuong`) VALUES
(1, 1, 5538, 100),
(2, 3, 3016, 200),
(3, 3, 3016, 150),
(4, 8, 5538, 500),
(5, 1, 5538, 50),
(6, 7, 2706, 500),
(8, 5, 3498, 300),
(9, 8, 4562, 100),
(10, 1, 0, 7000),
(12, 1, 0, 7500),
(13, 7, 0, 5000),
(14, 3, 0, 7500),
(15, 1, 0, 75000),
(16, 7, 0, 1500),
(17, 8, 0, 9900),
(18, 9, 0, 8800),
(19, 9, 0, 9900),
(20, 1, 0, 8800),
(21, 2, 0, 9900),
(22, 9, 0, 5500),
(23, 9, 0, 9900),
(24, 9, 0, 5500),
(25, 1, 0, 9900),
(26, 2, 0, 9900),
(27, 6, 0, 7000),
(28, 6, 0, 8800),
(29, 6, 0, 5000),
(30, 6, 0, 9250),
(31, 6, 0, 9250),
(32, 6, 0, 9250),
(33, 6, 0, 4120),
(34, 6, 0, 9250),
(35, 6, 0, 9250),
(36, 6, 0, 9300),
(37, 6, 0, 1000),
(38, 6, 0, 9200),
(39, 6, 0, 9250),
(40, 6, 0, 9200),
(41, 6, 0, 7000),
(42, 6, 0, 7500),
(43, 1, 0, 7500),
(44, 1, 0, 7500),
(45, 9, NULL, 9250),
(46, 7, NULL, 7200),
(47, 3, NULL, 7000),
(48, 1, NULL, 7500),
(49, 3, NULL, 7000),
(50, 1, NULL, 7500),
(51, 1, NULL, 7000),
(52, 9, NULL, 7500),
(53, 2, NULL, 7000),
(54, 3, NULL, 7500),
(55, 1, NULL, 9900),
(56, 9, NULL, 8800),
(57, 3, NULL, 5850),
(58, 1, NULL, 9200),
(59, 2, NULL, 9250),
(60, 8, NULL, 4160),
(61, 2, NULL, 7000),
(62, 2, NULL, 7000),
(63, 2, NULL, 4160),
(64, 3, NULL, 5000),
(65, 3, NULL, 4160),
(66, 3, NULL, 7500),
(67, 2, NULL, 5850),
(68, 2, NULL, 5850),
(69, 3, NULL, 4160),
(70, 2, NULL, 5850),
(71, 3, NULL, 5850),
(72, 1, NULL, 4160),
(73, 2, NULL, 4810),
(74, 5, NULL, 7000),
(75, 7, NULL, 4160),
(76, 4, NULL, 4160),
(77, 4, NULL, 4160),
(78, 8, NULL, 4160),
(79, 8, NULL, 9300);

-- --------------------------------------------------------

--
-- Table structure for table `chitietgiaodich`
--

CREATE TABLE `chitietgiaodich` (
  `Ma_GD` int(11) NOT NULL,
  `Ma_SP` int(11) NOT NULL,
  `SoLuong_GD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `chitietgiaodich`
--

INSERT INTO `chitietgiaodich` (`Ma_GD`, `Ma_SP`, `SoLuong_GD`) VALUES
(165, 4, 1),
(166, 24, 1),
(183, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `Ma_SP` int(11) NOT NULL,
  `Ma_GD` int(11) NOT NULL,
  `SO_LUONG_BAN` int(30) NOT NULL,
  `TONG_THANH_TOAN` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`Ma_SP`, `Ma_GD`, `SO_LUONG_BAN`, `TONG_THANH_TOAN`) VALUES
(1, 153, 4, 18600000),
(2, 161, 1, 4650000),
(3, 155, 3, 13875000),
(7, 158, 1, 800000);

-- --------------------------------------------------------

--
-- Table structure for table `chitiet_pn`
--

CREATE TABLE `chitiet_pn` (
  `Ma_PN` int(11) NOT NULL,
  `Ma_SP` int(11) NOT NULL,
  `SoLuong_PN` int(11) NOT NULL,
  `DonGia_PN` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `chitiet_pn`
--

INSERT INTO `chitiet_pn` (`Ma_PN`, `Ma_SP`, `SoLuong_PN`, `DonGia_PN`) VALUES
(1, 1, 3, 25579000),
(2, 2, 1, 450000000);

-- --------------------------------------------------------

--
-- Table structure for table `cochatlieu`
--

CREATE TABLE `cochatlieu` (
  `Ma_SP` int(11) NOT NULL,
  `Ma_CL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `Ma_DM` int(11) NOT NULL,
  `Ten_DM` varchar(20) NOT NULL,
  `HinhAnh_DM` varchar(100) DEFAULT NULL,
  `PARENT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`Ma_DM`, `Ten_DM`, `HinhAnh_DM`, `PARENT`) VALUES
(1, 'Trang Sức Cưới', 'upload/capnhancuoivang18k.jpg', 0),
(2, 'Trang Sức Vàng', 'upload/bongtaicuoivang24ka.jpg', 0),
(3, 'Trang Sức Bạc', 'upload/vongtayvangtrang10k.jpg', 0),
(4, 'Nhẫn cưới', '', 1),
(5, 'Vòng tay cưới', '', 1),
(6, 'Bông tai cưới', '', 1),
(7, 'Dây chuyền cưới', '', 1),
(8, 'Quà Tặng', 'upload/quatang.jpg', 0),
(9, 'Trang Sức Đính Đá', 'upload/dinhda.jpg', 0),
(10, 'Cho nàng', NULL, 8),
(11, 'Cho chàng', NULL, 8),
(14, 'Nhẫn vàng', NULL, 2),
(15, 'Bông tai vàng', NULL, 2),
(16, 'Dây chuyền vàng', NULL, 2),
(17, 'Vòng tay vàng', NULL, 2),
(18, 'Nhẫn bạc', NULL, 3),
(19, 'Bông tai bạc', NULL, 3),
(20, 'Vòng tay bạc', NULL, 3),
(21, 'Dây chuyền bạc', NULL, 3),
(22, 'Nhẫn', NULL, 9),
(23, 'Bông tai', NULL, 9),
(24, 'Vòng tay', NULL, 9),
(25, 'Dây chuyền', NULL, 9);

-- --------------------------------------------------------

--
-- Table structure for table `don_gia`
--

CREATE TABLE `don_gia` (
  `id_gia` int(11) NOT NULL,
  `ngay` date NOT NULL,
  `gia` float NOT NULL,
  `Ma_SP` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `don_gia`
--

INSERT INTO `don_gia` (`id_gia`, `ngay`, `gia`, `Ma_SP`) VALUES
(1, '2024-04-07', 4600000, 1),
(2, '2024-04-08', 4650000, 2),
(3, '2024-04-09', 4625000, 3),
(4, '2024-04-10', 3600000, 4),
(5, '2024-04-11', 6550000, 5),
(6, '2024-04-12', 7825000, 6),
(7, '2024-04-13', 8000000, 7),
(8, '2024-04-14', 1250000, 8),
(9, '2024-04-15', 5625000, 9),
(19, '2024-04-19', 8039000, 10),
(20, '2024-04-10', 16500900, 12),
(21, '2024-04-03', 15000000, 13),
(22, '2024-04-18', 15715000, 14),
(23, '2024-04-04', 19120000, 15),
(24, '2024-04-18', 18210000, 16),
(25, '2024-04-03', 14128000, 17),
(26, '2024-04-04', 16280000, 18),
(27, '2024-04-18', 10560000, 19),
(28, '2024-04-18', 8560000, 20),
(29, '2024-04-08', 5765000, 21),
(30, '2024-04-11', 8765000, 22),
(31, '2024-04-11', 19441000, 23),
(32, '2024-04-03', 9441000, 24),
(33, '2024-04-10', 3057000, 25),
(34, '2024-04-05', 10043000, 26),
(35, '2024-04-11', 1200000, 27),
(36, '2024-04-05', 485000, 28),
(37, '2024-04-12', 599000, 29),
(38, '2024-04-03', 645000, 30),
(39, '2024-04-11', 456000, 31),
(40, '2024-04-15', 745000, 32),
(41, '2024-04-03', 350000, 33),
(42, '2024-04-03', 695000, 34),
(43, '2024-04-03', 1125200, 35),
(44, '2024-04-03', 1123200, 36),
(45, '2024-04-03', 1195000, 37),
(46, '2024-04-03', 350000, 38),
(47, '2024-04-18', 1500000, 39),
(48, '2024-04-16', 375000, 40),
(49, '2024-04-03', 725000, 41),
(50, '0000-00-00', 976000, 42),
(51, '2024-04-18', 6950000, 43),
(52, '2024-04-16', 7563000, 44),
(53, '2024-04-18', 2050000, 45),
(54, '2024-04-18', 495000, 46),
(55, '2024-04-18', 8039000, 47),
(56, '2024-04-11', 3702000, 48),
(57, '2024-04-09', 4528000, 49),
(58, '2024-04-04', 6150000, 50),
(59, '2024-04-09', 7272000, 51),
(60, '2024-04-17', 6569000, 52),
(61, '2024-04-03', 1129000, 53),
(62, '2024-04-16', 8099000, 54),
(63, '2024-04-03', 13590000, 55),
(64, '2024-04-16', 25966000, 56),
(65, '2024-04-18', 11572000, 57),
(66, '2024-04-03', 31516600, 58),
(67, '2024-04-03', 3090000, 59),
(68, '2024-04-03', 2841000, 60),
(69, '2024-04-03', 3737000, 61),
(71, '2024-04-03', 5792000, 62),
(72, '2024-04-16', 12221000, 63),
(73, '2024-04-03', 4953000, 64),
(74, '2024-04-03', 26788000, 65),
(75, '2024-04-16', 20376000, 66),
(76, '2024-04-03', 20826000, 67),
(77, '2024-04-03', 3735000, 68),
(78, '2024-04-16', 2666000, 69),
(79, '2024-04-03', 4769000, 70),
(81, '2024-04-18', 128892000, 71),
(82, '2024-04-03', 33452000, 72),
(83, '2024-04-03', 17567000, 73),
(84, '2024-04-18', 3890000, 74),
(85, '2024-04-16', 12465000, 75),
(86, '2024-04-11', 3021750, 76),
(87, '2024-04-18', 90027000, 77),
(88, '2024-04-03', 20761000, 78),
(89, '2024-04-03', 12000000, 79);

-- --------------------------------------------------------

--
-- Table structure for table `giaodich`
--

CREATE TABLE `giaodich` (
  `Ma_GD` int(11) NOT NULL,
  `Ma_KH` int(11) DEFAULT NULL,
  `Ma_LGD` int(11) DEFAULT NULL,
  `Ma_NV` int(11) DEFAULT NULL,
  `TT_MA` int(11) DEFAULT NULL,
  `NGAY_LAP` date DEFAULT NULL,
  `PTTT_MA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `giaodich`
--

INSERT INTO `giaodich` (`Ma_GD`, `Ma_KH`, `Ma_LGD`, `Ma_NV`, `TT_MA`, `NGAY_LAP`, `PTTT_MA`) VALUES
(146, 6, 1, 2, 1, '2024-04-16', 1),
(147, 3, 1, 2, 1, '2024-04-16', 1),
(149, 2, 1, 1, 1, '2024-04-16', 1),
(153, 5, 1, 2, 1, '2024-04-16', 2),
(155, 4, 1, 2, 1, '2024-04-16', 1),
(158, 1, 1, 2, 1, '2024-04-16', 1),
(159, 1, 1, 1, 1, '2024-04-19', 1),
(160, 1, 1, 1, 1, '2024-04-19', 1),
(161, 1, 1, 1, 1, '2024-04-19', 1),
(162, 1, 1, 1, 1, '2024-04-19', 1),
(163, 1, 1, 1, 1, '2024-04-19', 1),
(164, 1, 1, 1, 1, '2024-04-19', 1),
(165, 2, 1, 1, 1, '2024-04-21', 1),
(166, 2, 1, 1, 1, '2024-04-21', 1),
(167, 1, 1, 1, 1, '2024-04-22', 1),
(168, 1, 1, 1, 1, '2024-04-22', 1),
(169, 1, 1, 1, 1, '2024-04-22', 1),
(170, 1, 1, 1, 1, '2024-04-22', 1),
(171, 1, 1, 1, 1, '2024-04-22', 1),
(172, 1, 1, 1, 1, '2024-04-22', 1),
(173, 1, 1, 1, 1, '2024-04-22', 1),
(174, 1, 1, 1, 1, '2024-04-22', 1),
(175, 1, 1, 1, 1, '2024-04-22', 1),
(176, 1, 1, 1, 1, '2024-04-22', 1),
(177, 1, 1, 1, 1, '2024-04-22', 1),
(178, 1, 1, 1, 1, '2024-04-22', 1),
(179, 1, 1, 1, 1, '2024-04-22', 1),
(180, 1, 1, 1, 1, '2024-04-22', 1),
(181, 1, 1, 1, 1, '2024-04-22', 1),
(182, 1, 1, 1, 1, '2024-04-22', 1),
(183, 1, 1, 1, 1, '2024-04-22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `Ma_KH` int(11) NOT NULL,
  `HoTen_KH` varchar(50) NOT NULL,
  `Sdt_KH` char(11) NOT NULL,
  `MatKhau_KH` varchar(32) DEFAULT NULL,
  `Email_KH` varchar(150) DEFAULT NULL,
  `NgaySinh_KH` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`Ma_KH`, `HoTen_KH`, `Sdt_KH`, `MatKhau_KH`, `Email_KH`, `NgaySinh_KH`) VALUES
(1, 'Trần Thị Lựu', '0939999944', '123', 'luu@gmail.com', '1994-03-17'),
(2, 'Lê Thị Xuân', '0937899944', '246', 'xuan@gmail.com', '1984-04-11'),
(3, 'Trần Văn C', '0265819502', '357', 'c@gmail.com', '1989-04-25'),
(4, 'Lưu Thị Thảo', '0371930285', '321', 'thao@gmail.com', '1999-06-11'),
(5, 'Trương Văn Hai', '0147691045', 'abc', 'hai@gmail.com', '2000-03-15'),
(6, 'Nguyễn Thị Ba', '0473728463', 'bca', 'ba@gmail.com', '2024-04-16');

-- --------------------------------------------------------

--
-- Table structure for table `loaigiaodich`
--

CREATE TABLE `loaigiaodich` (
  `Ma_LGD` int(11) NOT NULL,
  `Ten_LGD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `loaigiaodich`
--

INSERT INTO `loaigiaodich` (`Ma_LGD`, `Ten_LGD`) VALUES
(1, 'Mua vàng'),
(2, 'Bán vàng');

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `Ma_NCC` int(11) NOT NULL,
  `Ten_NCC` varchar(50) NOT NULL,
  `SDT_NCC` char(10) NOT NULL,
  `DiaChi_NCC` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`Ma_NCC`, `Ten_NCC`, `SDT_NCC`, `DiaChi_NCC`) VALUES
(1, 'Doji', '1234567521', 'Cần Thơ'),
(2, 'Minh Châu', '0349671948', 'Vĩnh Long'),
(3, 'PNJ', '0136491093', 'TP Hồ Chí Minh'),
(4, 'Ngọc Hà', '0123859205', 'An Giang');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `Ma_NV` int(11) NOT NULL,
  `Ma_BP` int(11) NOT NULL,
  `Ten_NV` varchar(50) NOT NULL,
  `NgaySinh_NV` date NOT NULL,
  `Sdt_NV` char(10) NOT NULL,
  `DiaChi_NV` varchar(255) NOT NULL,
  `MatKhau_NV` varchar(32) DEFAULT NULL,
  `Email_NV` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`Ma_NV`, `Ma_BP`, `Ten_NV`, `NgaySinh_NV`, `Sdt_NV`, `DiaChi_NV`, `MatKhau_NV`, `Email_NV`) VALUES
(1, 2, 'Nguyễn Văn Bốn', '1989-05-18', '0123456789', 'Cần Thơ', '123', 'bon@gmail.com'),
(2, 3, 'Nguyễn Thị A', '1995-03-02', '0123456709', 'Ninh Kiều, Cần Thơ', '123', 'nguyen@gmail.com'),
(4, 2, 'Lê Văn Năm', '1987-03-25', '0371495012', 'Ninh Kiều, Cần Thơ', '753', 'nam@gmail.com'),
(5, 1, 'Trần Lê Sáu', '1788-11-03', '0285910485', 'Hậu Giang', '642', 'sau@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `phieunhap`
--

CREATE TABLE `phieunhap` (
  `Ma_PN` int(11) NOT NULL,
  `Ma_NV` int(11) NOT NULL,
  `Ma_NCC` int(11) NOT NULL,
  `NgayLap_PN` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `phieunhap`
--

INSERT INTO `phieunhap` (`Ma_PN`, `Ma_NV`, `Ma_NCC`, `NgayLap_PN`) VALUES
(1, 5, 4, '2024-04-10'),
(2, 5, 2, '2024-04-02'),
(3, 4, 1, '2024-04-10'),
(4, 5, 2, '2024-04-02');

-- --------------------------------------------------------

--
-- Table structure for table `pt_thanhtoan`
--

CREATE TABLE `pt_thanhtoan` (
  `PTTT_MA` int(11) NOT NULL,
  `PTTT_TEN` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pt_thanhtoan`
--

INSERT INTO `pt_thanhtoan` (`PTTT_MA`, `PTTT_TEN`) VALUES
(1, 'Thanh toán trực tiếp'),
(2, 'Thanh toán qua momo'),
(3, 'Thanh toán qua visa');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `Ma_SP` int(11) NOT NULL,
  `Ma_DM` int(11) NOT NULL,
  `HinhAnh_SP` varchar(100) NOT NULL,
  `Ten_SP` varchar(50) NOT NULL,
  `TrongLuong_Sp` float NOT NULL,
  `MoTa_SP` mediumtext DEFAULT NULL,
  `soluong_sp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`Ma_SP`, `Ma_DM`, `HinhAnh_SP`, `Ten_SP`, `TrongLuong_Sp`, `MoTa_SP`, `soluong_sp`) VALUES
(1, 1, 'upload/nhancuoivang18kdinhdaruby.jpg', 'Nhẫn cưới Vàng 18K ', 14.1934, 'Hãy để các chất liệu kết hợp cùng nhau trong mùa cưới này. Nàng dâu có thể chọn cho mình chiếc nhẫn trong BST Trầu Cau được chế tác từ vàng 18K và ghi điểm với điểm nhấn đá Ruby đính một cách tinh xảo. Không chỉ là món trang sức làm đẹp mà nó còn là món quà hồi môn tuyệt vời dành cho nàng dâu mới.\r\n\r\n\r\n', 2),
(2, 2, 'upload/nhankimcuongvang14k.jpg', 'Nhẫn Kim cương Vàng 14K ', 11.222, 'Kim cương vốn là món trang sức mang đến niềm kiêu hãnh và cảm hứng thời trang bất tận. Sở hữu riêng cho mình món trang sức kim cương chính là điều mà ai cũng mong muốn. Chiếc nhẫn Disney được chế tác từ vàng 14K cùng điểm nhấn kim cương với 57 giác cắt chuẩn xác, tạo nên món trang sức đầy sự sang trọng và đẳng cấp.\r\nKim cương đã đẹp, trang sức kim cương lại càng mang sức hấp dẫn khó cưỡng. Sự kết hợp mới mẻ này chắc chắn sẽ tạo nên dấu ấn thời trang hiện đại và giúp quý cô trở nên nổi bật, tự tin và thu hút sự ngưỡng mộ của mọi người.\r\n', 2),
(3, 9, 'upload/bongtaivangtrang14kdindatopaz.jpg', 'Bông tai Vàng Trắng 14K  đính đá EZC', 14.6675, 'Lấy cảm hứng từ mặt gậy như ý thể hiện những điều tốt lành cùng sợi dây tơ hồng thể hiện sự kết nối không điểm dừng trong tình yêu, đôi bông tai vàng trắng 14K đính đá Topaz trong BST Kim Bảo Như Ý là một trong những món nữ trang quý cô cần có trong dịp tết 2024 này.\r\nĐược chế tác từ vàng trắng 14K cùng sự lấp lánh của đá Topaz, đôi bông tai không chỉ là món trang sức làm đẹp mà còn là vật phẩm mang đến sự bình an và thể hiện sự kết nối trong tình yêu cho người đeo.\r\n\r\n', 3),
(4, 2, 'upload/nhanvang18kdindaecz.jpg', 'Nhẫn Vàng 18K', 9.84788, 'Dù ở lứa tuổi nào, theo phong cách cổ điển hay hiện đại thì sắc màu của những viên đá ECZ màu trắng vẫn luôn biết chiều lòng các tín đồ thời trang. Mô phỏng nét kiêu sa của nàng, chiếc nhẫn vàng nhẹ nhàng kết đính những viên đá trắng tròn trịa trên chất vàng 18K, mang đến sản phẩm đầy tinh tế, tôn lên nhan sắc của phái đẹp.\r\n \r\n', 4),
(5, 9, 'upload/matdaychuyenvang18kdinhngoc.jpg', ' Mặt dây chuyền Vàng 18K', 2.40367, 'Ngọc trai Freshwater, còn được gọi là ngọc nước ngọt, rất phù hợp cho những cô nàng muốn sở hữu những viên ngọc trai tròn đẹp, óng ánh lớp xà cừ với ngân sách hợp lý. Cùng với hàm lượng vàng 18k đạt mức cân bằng trong chế tác, món trang sức của nàng sẽ có một sự tinh xảo đặc biệt.\r\n\r\n', 2),
(6, 9, 'upload/bongtaivang10kdinhda.jpg', 'Bông tai Vàng 10K Đính đá Synthetic', 6.36955, 'Đôi bông tai được chế tác từ chất liệu vàng 10K kết hợp màu sắc lung linh của đá Synthetic mang đến vẻ đẹp sang trọng và đẳng cấp.\r\nThiết kế quả táo nhỏ xinh tinh tế, hiện đại, tôn lên vẻ đẹp thanh tao và tinh tế của cô nàng cùng kiểu dáng trẻ trung, năng động, phù hợp với mọi phong cách và sở thích. Đây sẽ là món quà lý tưởng cho những dịp đặc biệt như sinh nhật, kỷ niệm,... để bày tỏ tình cảm chân thành của mình.\r\n\r\n', 1),
(7, 3, 'upload/bongtaibacdinhda.jpg', 'Bông tai Bạc đính đá STYLE', 4.80733, 'Bông tai bạc từ STYLE được thiết kế kiểu dáng cá tính ,tinh tế với điểm nhấn đính đá trên chất liệu bạc 92.5, sáng lấp lánh làm nền tạo điểm nhấn giúp tôn lên vẻ đẹp của nàng xinh, gây ấn tượng với nhiều người xung quanh.\r\nDù là cuộc gặp mặt cuối năm nhẹ nhàng hay những bữa tiệc sôi động, nàng hãy luôn toát lên vẻ thanh lịch nổi bật cá tính với sự kết hợp hoàn hảo của một chiếc váy đen sang trọng cùng đôi bông tai phong cách.\r\n\r\n', 1),
(8, 3, 'upload/lactaybacdinhda.jpg', 'Lắc tay Bạc', 9.83265, 'Sở hữu kiểu dáng không quá xa lạ nhưng lại cực kỳ độc đáo, chiếc lắc được chế tác từ chất liệu bạc 92.5 khoác lên mình vẻ ngoài trẻ trung, phá cách và “high fashion”.\r\nĐiểm tô cho cổ tay nàng với chiếc lắc bạc xinh xắn, đây chắc chắn sẽ là một nét chấm phá tinh tế tô điểm thêm nét cá tính, năng động và trẻ trung cho các cô gái. Tuy chỉ sở hữu thiết kế đơn giản với điểm nhấn đính đá nho nhỏ, nhưng nó lại là phụ kiện giúp các cô nàng có vẻ ngoài thanh lịch, nữ tính và trở nên nổi bật hơn bao giờ hết.\r\n', 2),
(9, 2, 'upload/kiengvangtrangy18k.jpg', 'Kiềng Vàng trắng Ý 18K', 54.2517, 'Sở hữu kiểu dáng độc đáo với lối thiết kế hiện đại, chiếc kiềng vàng Ý 18K không chỉ mang vẻ đẹp phá cách mà còn tô điểm nét thời thượng. Chiếc kiềng được chế tác từ vàng Ý 18K và ghi điểm với sự độc lạ, thiết kế sẽ cùng nàng kiêu hãnh tỏa sáng trên mọi bước đường. Sở hữu kiểu dáng mảnh mai, sản phẩm sẽ làm nổi bật vẻ đẹp kiêu sa của nàng.\r\nĐã là quý cô yêu thời trang và yêu thích cái đẹp thời thượng, nàng chắc chắn không thể bỏ qua phiên bản kiềng vàng Ý này.\r\n\r\n', 3),
(10, 1, 'upload/nhancuoikimcuongvabg18k.jpg', 'Nhẫn cưới Kim cương Vàng 18K ', 0.56908, 'Tôn vinh vẻ đẹp và sự chín muồi của tình yêu đích thực. Trang sức Cưới Trầu Cau - Tạo tác lưu dấu một đám cưới rạng rỡ, khắc họa hình tượng Trầu Têm Cánh Phượng trong đường nét đương đại của thiết kế.', 5),
(12, 4, 'upload/capnhancuoivang18k.jpg\r\n', 'Cặp nhẫn cưới Vàng 18K', 10.4252, 'Phụ nữ luôn thật đẹp khi biết chăm chút cho mọi thứ quanh mình, nàng hãy thử trổ tài làm một fashionista khi “kết đôi” các thời trang như nhẫn quý phái và dây chuyền hay đôi bông tai nhỏ xinh để luôn lộng lẫy và cuốn hút đến từng ánh nhìn.', 2),
(13, 4, 'upload/nhancuoivangtrang10k.jpg', 'Nhẫn cưới Vàng Trắng 10K', 83.7182, 'Hãy để các chất liệu kết hợp cùng nhau trong mùa cưới này. Các cặp đôi có thể chọn cho mình chiếc nhẫn trong BST Trầu Cau được chế tác từ vàng 10K và ghi điểm với điểm nhấn đá ECZ đính một cách tinh xảo. Không chỉ là món trang sức làm đẹp mà nó còn là vật đính ước thề nguyện hạnh phúc của đôi vợ chồng mới.', 2),
(14, 4, 'upload/capnhancuoikimcuongvangtrang1.jpg', 'Cặp nhẫn cưới Kim cương Vàng trắng 14K', 3.4975, ' Không chỉ là món trang sức làm đẹp mà nó còn là vật đính ước thề nguyện hạnh phúc của đôi vợ chồng mới.', 2),
(15, 5, 'upload/vongtaycuoivang18k.jpg', 'Vòng tay cưới Vàng 18K ', 20.4113, 'Chiếc vòng tay sở hữu sự cứng cáp của vàng 18K kết hợp các chi tiết tinh xảo, tạo nên sự sáng bóng và sang trọng. Với thiết kế độc lạ cùng ánh kim sắc sảo, sản phẩm sẽ tôn lên vẻ đẹp của các quý cô.', 2),
(16, 1, 'upload/vongtayvangtrang10k.jpg', 'Vòng tay Vàng trắng 10K ', 33.11, 'Thanh thoát trong chiếc đầm ôm nhẹ tôn dáng, yêu kiều quyến rũ cùng trang sức ECZ bắt mắt, nàng sẽ thu hút tất cả ánh nhìn. Với vẻ đẹp của sự tự tin ấy, nguồn năng lượng tích cực đầy tin yêu của nàng sẽ được lan toả ở bất cứ nơi nào nàng đến.', 1),
(17, 5, 'upload/vongtaycuoi18k.jpg', 'Vòng tay cưới Vàng 18K', 20, 'Sở hữu thiết kế đủ mềm mại nhưng lại đầy quyền năng, đủ phá cách như cho một sự khác lạ, vừa mang nét hiện đại, trẻ trung bởi sự rành mạch trong đường nét, lại vừa giữ được sự mềm mại, kiêu sa giữa sự ngẫu hứng cùng vàng, chiếc vòng tay ấn tượng như người phụ nữ trưởng thành với phong cách và con đường riêng để khẳng định bản ngã của chính mình.', 2),
(18, 5, 'upload/vongtaycuoivang24k.jpg', 'Vòng tay cưới Vàng 24K ', 20, 'Sở hữu thiết kế trẻ trung cộng hưởng cùng ánh kim quý phái của vàng 24K, chiếc vòng tay vàng tôn lên vẻ đẹp hiện đại và thời thượng của các quý cô, giúp nàng trông thật xinh đẹp rạng rỡ khi trưng diện cho ngày trọng đại của mình.', 1),
(19, 6, 'upload/bongtaicuoivang24k.jpg', 'Bông tai cưới Vàng 24K', 27.6257, 'Đối với người phương Đông, trang sức cưới mang ý nghĩa tinh thần, chúc phúc cho cuộc sống lứa đôi mà cả hai bên dòng họ gửi đến đôi vợ chồng trẻ, tượng trưng cho hạnh phúc viên mãn, kỷ vật minh chứng tình yêu vĩnh cửu.', 2),
(20, 6, 'upload/bongtaicuoivang18k.jpg', 'Bông tai cưới Vàng 18K ', 10.3984, 'Ưu tiên hàng đầu cho các nàng dâu mới, mang đến những đôi bông tai sở hữu thiết kế vừa hiện đại vừa cổ điển. ', 4),
(21, 6, 'upload/bongtaicuoivang14k.jpg', 'Bông tai cưới Vàng 18K', 19.0618, 'ang vẻ đẹp hoàn hảo không thua kém kim cương, đôi bông tai với điểm nhấn đá ECZ sẽ là “trợ thủ” nâng tầm nhan sắc của mọi cô nàng ưa chuộng phong cách hiện đại và thanh lịch.', 1),
(22, 6, 'upload/bongtaicuoivang24k.jpg', 'Bông tai cưới Vàng 24K', 10.5995, 'Đối với người phương Đông, trang sức cưới mang ý nghĩa tinh thần, chúc phúc cho cuộc sống lứa đôi mà cả hai bên dòng họ gửi đến đôi vợ chồng trẻ, tượng trưng cho hạnh phúc viên mãn, kỷ vật minh chứng tình yêu vĩnh cửu.', 2),
(23, 7, 'upload/matdaychuyencuoivang24k.jpg', 'Mặt dây chuyền cưới Vàng 24K', 14.8842, 'Sản phẩm chính là sự hội tụ của phong cách thiết kế hiện đại kết hợp đỉnh cao của trình độ chế tác và sẽ trở thành xu hướng trang sức mới, mang đến cho phái đẹp thêm nhiều sự lựa chọn cho bộ sưu tập của mình.', 1),
(24, 7, 'upload/matdaychuyencuoivang24ka.jpg', 'Mặt dây chuyền cưới Vàng 24K ', 11.5202, 'Mô phỏng nét tin yêu cùng vẻ đẹp tinh tế, thanh tú của nàng, PNJ mang đến hơi thở mới mẻ từ những chi tiết giản đơn cho thiết kế trang sức mới của mình. Chiếc mặt dây chuyền được chế tác từ sắc vàng 24K trên thiết kế đậm chất phóng khoáng và hiện đại.', 1),
(25, 7, 'upload/matdaychuyencuoi18k.jpg', 'Mặt dây chuyền cưới Vàng 24K', 4.15854, 'Sản phẩm chính là sự hội tụ của phong cách thiết kế hiện đại kết hợp đỉnh cao của trình độ chế tác và sẽ trở thành xu hướng trang sức mới, mang đến cho phái đẹp thêm nhiều sự lựa chọn cho bộ sưu tập của mình.', 1),
(26, 7, 'upload/matdaychuyencuoi14k.jpg', 'Mặt dây chuyền cưới Vàng 24K', 12.631, 'Vẻ đẹp nàng tựa đóa hoa, có khi thuần khiết, có khi quyến rũ nhưng lại chẳng thể nào quên giống như thiết kế mặt dây chuyền.', 1),
(27, 18, 'upload/nhabaca.jpg', 'Nhẫn bạc  DD00W060447', 3.86456, 'Sự kết hợp mới mẻ này chắc chắn sẽ tạo nên dấu ấn thời trang hiện đại và giúp quý cô trở nên nổi bật, tự tin và thu hút sự ngưỡng mộ của mọi người.', 2),
(28, 3, 'upload/nhanbacb.jpg', 'Nhẫn Bạc STYLE ', 4.067, 'hác với trang sức khác, chất liệu bạc 92.5 là lựa chọn thông minh, bền vững với thời gian, giúp các cô gái trẻ thể hiện cá tính cũng như gu thời trang của mình. Khi kết hợp cùng các mẫu trang sức khác, chắc chắn đây sẽ là điểm nhấn hoàn hảo mang đến vẻ đẹp của sự cá tính và thời thượng cho phong cách của nàng.', 2),
(29, 18, 'upload/nhanbacc.jpg', 'Nhẫn Bạc XMXMC060006', 5.7215, 'Với sản phẩm này, nàng có thể kết hợp với nhiều món trang sức hoặc phụ kiện khác nhau như dây cổ, lắc, vòng để tạo nên một phong cách thời trang của riêng mình hoặc tặng cho những người mà mình yêu thương.', 2),
(30, 18, 'upload/nhanbacd.jpg', 'Nhẫn Bạc STYLE Unisex ', 9.96875, 'Không sở hữu các chi tiết đính đá rực rỡ nhưng lại khoác lên mình thiết kế độc đáo với những đường nét sáng tạo, chiếc nhẫn STYLE  sẽ cùng nàng biến hóa đầy cá tính cùng chất riêng của mình.', 1),
(31, 19, 'upload/bongtaibacb.jpg', 'Bông tai trẻ em Bạc', 6.61033, 'Đôi bông tai sở hữu một thiết kế trẻ trung, thể hiện vẻ đẹp đáng yêu của những nàng công chúa nhỏ của ba mẹ. Sự đính kết và sắp xếp những điểm nhấn một cách hoàn hảo mang đến vẻ đẹp của sự phá cách, cá tính và thời thượng cho đôi bông tai.', 1),
(32, 19, 'upload/bongtaibaca.jpg', 'Bông tai Bạc  PMXMW060000', 4.17085, 'Cùng làm mới phong cách với đôi bông tai bạc tinh tế này nhé nàng ơi! Bởi sự tinh tế trong nó chính là điểm nhấn đặc biệt giúp nàng trở nên nổi bần bật và lan tỏa sức hút từ thần thái của mình.', 3),
(33, 19, 'upload/bongtaibacd.jpg', 'Bông tai  bạc XM00W000131', 2.92806, 'Mang vẻ đẹp hoàn hảo không thua kém kim cương, đôi bông tai với điểm nhấn đá ECZ sẽ là “trợ thủ” nâng tầm nhan sắc của mọi cô nàng ưa chuộng phong cách hiện đại và thanh lịch.', 2),
(34, 19, 'upload/bongtaibace.jpg', 'Bông tai bạc Mother of Pearl', 6.15043, 'Cùng Silver làm mới phong cách với đôi bông tai bạc tinh tế này nhé nàng ơi! Bởi sự tinh tế trong nó chính là điểm nhấn đặc biệt giúp nàng trở nên nổi bần bật và lan tỏa sức hút từ thần thái của mình.', 2),
(35, 20, 'upload/vongtaybaca.jpg', 'Lắc tay Bạc Silver', 38.8214, 'ở hữu kiểu dáng không quá xa lạ nhưng lại cực kỳ độc đáo, chiếc lắc tay Silver được chế tác từ chất liệu bạc 92.5 khoác lên mình vẻ ngoài trẻ trung, phá cách và “high fashion”.', 1),
(36, 20, 'upload/vongtaybacb.jpg', 'Vòng tay bạc  XM00W000008', 8.57531, 'Với sự sắp xếp đồng điệu của những viên đá, chiếc vòng tay luôn mang lại sự hài hòa và tinh tế. Đồng thời để khơi gợi sự chú ý, nàng hãy mix&match với các items khác để không chỉ nổi bật mà còn là tâm điểm của những bữa tiệc nhẹ cuối tuần.', 2),
(37, 20, 'upload/vongtaybacc.jpg', 'Vòng tay đôi bạc Friendzone Breaker', 9.84788, 'Với chiếc vòng tay này các cô nàng có thể mix&match với nhiều trang sức bạc và phong cách khác nhau. Đặc biệt, đây chính là món quà tuyệt vời nhất dành tặng cho các bạn gái, thể hiện tình cảm của bạn dành cho nàng.', 2),
(38, 20, 'upload/vongtaybacd.jpg', 'Vòng tay trẻ em Bạc', 12.6623, 'Với sự kết hợp giữa thiết kế hình chú chuột cùng vẻ lấp lánh của những viên đá với từng giác cắt chuẩn xác, mang đến cho các nàng công chúa nhỏ chiếc vòng tay xinh xắn và đáng yêu.', 1),
(39, 21, 'upload/daychuyenbaca.jpg', 'Dây cổ Bạc XMXMW060038', 6.21004, 'Đặc biệt hơn, chiếc dây cổ sẽ trở nên ý nghĩa hơn khi trở thành món quà ghi dấu yêu thương vào những dịp quan trọng. Đây chắc chắn sẽ là thứ giúp bạn gắn kết những khoảnh khắc đáng nhớ với mình hoặc người thương.', 1),
(40, 21, 'upload/daychuyenbacb.jpg', 'Dây chuyền Bạc ZTXMW060000', 2.86119, 'Tôn vinh nét đẹp thanh tú của nàng xinh với chiếc mặt dây chuyền lấp lánh sắc bạc ánh kim cổ điển cùng sắc trắng của viên đá đính kèm, chắc chắn đây sẽ là những gì các nàng cần để luôn tỏa sáng và thu hút mọi ánh nhìn.', 1),
(41, 21, 'upload/daychuyenbacc.jpg', 'Dây chuyền  DDDDW002552', 4.73011, 'Đặc biệt, những cô nàng công sở còn có thể diện cho mình một số phụ kiện cùng kiểu để tăng thêm tính thời trang, tạo điểm nhấn nổi bật. Và chắc chắn rằng, đồng nghiệp sẽ trầm trồ về gu thời trang chất lừ, thu hút và vẫn cực thanh lịch của nàng.', 2),
(42, 21, 'upload/daychuyenbacd.jpg', 'Dây chuyền  DDDDH000064', 5.452, 'Không chỉ sang trọng, còn giúp cho món trang sức của bạn trường tồn giữa dòng thời gian. Với sự kết hợp đồng điệu sở hữu một vẻ đẹp vừa trẻ trung, vừa toát lên khí chất của người phụ nữ quyền lực.', 4),
(43, 14, 'upload/nhanvanga.jpg', 'Nhẫn Vàng 18K  0000Y001843', 11.3588, 'Phụ nữ luôn thật đẹp khi biết chăm chút cho mọi thứ quanh mình, nàng hãy thử trổ tài làm một fashionista khi “kết đôi” các thời trang như nhẫn quý phái và dây chuyền hay chiếc nhẫn nhỏ xinh để luôn lộng lẫy và cuốn hút đến từng ánh nhìn.', 2),
(44, 14, 'upload/nhanvangb.jpg', 'Nhẫn Vàng 18K 0000Y001991', 10.2545, 'Nhấn nhá cho phong thái ngày càng mặn mà và kiêu sa, chiếc nhẫn vàng 18K sẽ cùng nàng chinh phục ngay những ánh nhìn đầu tiên. Với sự sáng tạo đến từ gu thẩm mĩ không thể hòa lẫn, chiếc nhẫn vàng 18K được chế tác với kỹ thuật chuyên nghiệp mang đến sản phẩm tinh xảo đến từng chi tiết, tạo nên vẻ đẹp vừa nữ tính lại vừa sắc sảo.', 2),
(45, 14, 'upload/nhanvangc.jpg', 'Nhẫn vàng STYLE 24K ', 10.4543, 'Khác với trang sức khác, chất liệu vàng 92.5 là lựa chọn thông minh, bền vững với thời gian, giúp các cô gái trẻ thể hiện cá tính cũng như gu thời trang của mình. Khi kết hợp cùng các mẫu trang sức khác, chắc chắn đây sẽ là điểm nhấn hoàn hảo mang đến vẻ đẹp của sự cá tính và thời thượng cho phong cách của nàng.', 1),
(46, 14, 'upload/nhanvangd.jpg', 'Nhẫn vàng CHOU CHOU ', 7.55103, 'Khác với trang sức khác, chất liệu vàng 92.5 là lựa chọn thông minh, bền vững với thời gian, giúp các cô gái trẻ thể hiện cá tính cũng như gu thời trang của mình. Khi kết hợp cùng các mẫu trang sức khác, chắc chắn đây sẽ là điểm nhấn hoàn hảo mang đến vẻ đẹp của sự cá tính và thời thượng cho phong cách của nàng.', 1),
(47, 15, 'upload/bongtaivanga.jpg', 'Bông tai Vàng trắng 14K', 3.45887, 'Đôi bông tai được chế tác từ vàng 14K và sở hữu kiểu dáng nhỏ xinh, phù hợp với những quý cô ưa chuộng phong cách sang trọng. Đặc biệt hơn nữa, đôi bông tai sở hữu điểm nhấn Kim cương tạo nên vẻ đẹp tinh tế, tôn lên vẻ đẹp dịu dàng, quý phái cho người đeo.', 2),
(48, 15, 'upload/bongtaivangb.jpg', 'Bông tai Vàng 18K 0000Y000082', 4.44773, 'Mô phỏng nét hoàn mỹ đậm chất Á đông của người phụ nữ, đặt trọn tâm huyết và tình cảm vào từng chi tiết trên đôi bông tai mới. PNJ cho ra đời thiết kế đôi bông tai tinh tế, là sự phối trộn hài hoà giữa kiểu dáng và chất liệu vàng 18K chuẩn mực.', 1),
(49, 15, 'upload/bongtaivangc.jpg', 'Bông tai Vàng 14K XM00Y000078', 5.72744, 'Đừng chờ đợi mà hãy chăm chút bản thân và đẹp mọi lúc mọi nơi vì chính nàng muốn thế mà chẳng cần lý do nào khác. Tin rằng, khí chất của nàng sẽ được lột tả hết khi ướm lên mình đôi bông tai này.', 1),
(50, 15, 'upload/bongtaivangd.jpg', 'Bông tai trẻ em Vàng 18K  0000Y060494', 0, 'Với mong muốn gửi gắm những cảm xúc yêu thương đến nàng thông qua những món trang sức nói chung và bông tai vàng nói riêng, tin rằng đây sẽ là món quà ý nghĩa nhất dành tặng cho người phụ nữ mà bạn yêu thương.', 2),
(51, 16, 'upload/daychuyenvangb.jpg', 'Mặt dây chuyền Vàng 24K', 8.49813, 'Mong muốn mang đến những món trang sức dành riêng cho quý cô nhân dịp Xuân 2024,  lấy cảm hứng từ biểu tượng mặt gậy như ý kết hợp với sự tài hoa của các nghệ nhân kim hoàn, BST Kim Bảo Như Ý đã được ra mắt trong dịp này.', 2),
(52, 16, 'upload/daychuyenvanga.jpg', 'Dây chuyền Vàng 18K Kim Bảo Như Ý ', 9.6694, 'Chiếc dây chuyền được chế tác từ vàng 18K cùng thiết kế hình Kim Bảo Như Ý - biểu tượng của sự phú quý trong sản phẩm mang đến món trang sức vừa đẹp lại vừa mang ý nghĩa cho năm mới đầy tài lộc.', 1),
(53, 16, 'upload/daychuyenvangc.jpg', 'Mặt dây chuyền Vàng 18K 0000Y000145', 1.36852, 'Sản phẩm chính là sự hội tụ của phong cách thiết kế hiện đại kết hợp đỉnh cao của trình độ chế tác và sẽ trở thành xu hướng trang sức mới, mang đến cho phái đẹp thêm nhiều sự lựa chọn cho bộ sưu tập của mình.', 2),
(54, 16, 'upload/daychuyenvangd.jpg', 'Dây chuyền Vàng Trắng 14K ', 4.13333, 'Xin giới thiệu một món trang sức đặc biệt, giúp nàng thu hút mọi sự chú ý xung quanh với chiếc mặt dây chuyền vàng 14K sở hữu chi tiết chất liệu vàng trắng 14K.', 3),
(55, 17, 'upload/vongtayvanga.jpg', 'Vòng tay Vàng 14K Disney Mickey alone', 19.4867, 'Vòng tay vàng 14K là một món quà ý nghĩa dành tặng cho người thân, bạn bè, đặc biệt là trong các dịp lễ, Tết. Vòng tay thể hiện tình yêu thương, sự quan tâm của người tặng dành cho người nhận.', 1),
(56, 17, 'upload/vongtayvangb.jpg', 'Vòng tay Vàng K 0000C000153', 39.4431, 'Với thiết kế tinh xảo của vòng tay, nàng sẽ bất ngờ khi phối với các bộ trang phục như áo dài trong ngày cưới hoặc những trang phục trang trọng. Với các điểm nhấn trên sản phẩm,tin rằng nàng sẽ trở nên thật sự tỏa sáng và nổi bật khi trưng diện chúng.', 1),
(57, 17, 'upload/vongtayvangc.jpg', 'Vòng tay  vàng trắng 14KDD00W000054', 37.995, 'Sản phẩm sở hữu thiết kế mềm mại đầy quyền năng, nét phá cách từ chất liệu vàng 14K ,  tự hào đem đến món trang sức dành riêng cho nàng. ', 1),
(58, 17, 'upload/vongtayvangd.jpg', 'Vòng tay Vàng 18K  Kim Bảo Như Ý 0000Y001452', 45.2771, 'Chiếc vòng tay được chế tác từ vàng 18K với điểm nhấn Kim Bảo, ở mọi góc nhìn đều thấy được hình ảnh 4 trái tim lồng ghép một cách khéo léo vào nhau nên còn gợi nhớ đến tình yêu vĩnh cửu và càng làm tăng vẻ đẹp lung linh cho sản phẩm.', 3),
(59, 22, 'upload/nhana.jpg', 'Nhẫn Vàng 14K đính đá Synthetic ❤️ HELLO KITTY', 5.24088, 'Những món trang sức tinh tế, những điểm nhấn nhỏ xinh mang trên mình sức hấp dẫn đến lạ kì bởi chính màu sắc được tác tạo trên chính nó. Nàng hãy tậu ngay cho mình món trang sức để tô cho mùa xuân thêm ngọt ngào và sự tươi mới nhé.', 1),
(60, 22, 'upload/nhanb.jpg', 'Nhẫn Vàng trắng 10K đính đá ECZ', 3.93791, 'Tạo ấn tượng với thiết kế với những đường nét cách điệu cùng vẻ lấp lánh của những viên đá ECZ, chiếc nhẫn không chỉ khoác lên mình vẻ đẹp trẻ trung mà còn tôn lên cá tính của riêng nàng.', 4),
(61, 22, 'upload/nhanc.jpg', 'Nhẫn Vàng 14K Nhẫn đính đá synthetic DisneyThe Lit', 3.34693, 'Đặc biệt hơn, chiếc nhẫn sẽ trở nên ý nghĩa hơn khi trở thành món quà ghi dấu yêu thương vào những dịp quan trọng. Đây chắc chắn sẽ là thứ giúp bạn gắn kết những khoảnh khắc đáng nhớ với mình hoặc người thương.', 3),
(62, 25, 'upload/daychuyenb.jpg', 'Dây chuyền Vàng 14K đính đá Sapphire ', 12.848, 'Tạm quên đi trang sức đính đá màu trắng, mang đến sự bùng nổ về màu sắc và kiểu dáng. Mặt dây chuyền được chế tác từ vàng 14K với điểm nhấn Sapphire sặc sỡ trên thiết kế quý phái, tất cả đã tạo nên xu hướng đa sắc màu cho trang sức mùa này.', 2),
(63, 25, 'upload/daychuyena.jpg', 'Dây chuyền Vàng trắng 14K đính đá Topaz', 5.41, 'Được chế tác từ chất liệu vàng 14K, chiếc mặt dây chuyền đính đá Topaz sẽ làm hài lòng các bạn nữ. Mỗi đường nét đều được những người thợ kim hoàn yêu nghề chăm chút kĩ lưỡng, tỉ mỉ. Cùng với nhiều năm kinh nghiệm,luôn cố gắng và nỗ lực để đem đến món trang sức phù hợp với cá tính của bạn cùng chất liệu tốt nhất.', 1),
(64, 25, 'upload/daychuyenc.jpg', 'ây chuyền Vàng Trắng 10K đính đá ECZ', 7.15858, 'Đặc biệt, những cô nàng công sở còn có thể diện cho mình một số phụ kiện cùng kiểu để tăng thêm tính thời trang, tạo điểm nhấn nổi bật. Và chắc chắn rằng, đồng nghiệp sẽ trầm trồ về gu thời trang chất lừ, thu hút và vẫn cực thanh lịch của nàng.', 2),
(65, 24, 'upload/vongtaya.jpg', 'Vòng tay Vàng Trắng 10K đính đá ECZ', 50.7703, 'Thanh thoát trong chiếc đầm ôm nhẹ tôn dáng, yêu kiều quyến rũ cùng trang sức ECZ bắt mắt, nàng sẽ thu hút tất cả ánh nhìn. Với vẻ đẹp của sự tự tin ấy, nguồn năng lượng tích cực đầy tin yêu của nàng sẽ được lan toả ở bất cứ nơi nào nàng đến.', 5),
(66, 24, 'upload/vongtayb.jpg', 'Vòng tay Vàng 10K đính đá Synthetic', 41.0008, 'Đây là BST cải tiến mới về mặt công nghệ, kỹ thuật setting đá và kiểu dáng thiết kế theo phong cách mới mẻ, sang trọng, thời trang. Không chỉ vậy, với cảm hứng từ hoa hướng dương, BST làm nổi bật được sự nữ tính của phụ nữ, nhất là những nét riêng của người phụ nữ trong bối cảnh hiện đại.', 3),
(67, 24, 'upload/vongtayc.jpg', 'Vòng tay Vàng 14K đính ngọc trai Akoya ', 24.9019, 'Đồng điệu nhưng không nhạt nhòa, sự kết hợp giữa trang sức và trang phục tương đồng màu sắc sẽ giúp nàng thêm ấn tượng! Và chiếc vòng tay sẽ cùng bạn rực sáng vẻ đẹp mà không mỹ từ nào có thể lột tả.', 3),
(68, 23, 'upload/bongtaia.jpg', 'Bông tai Vàng Trắng 10K Đính đá synthetic ', 4.36796, 'Cùng STYLE làm mới phong cách với đôi bông tai tinh tế này nhé nàng ơi! Bởi sự tinh tế trong nó chính là điểm nhấn đặc biệt giúp nàng trở nên nổi bần bật và lan tỏa sức hút từ thần thái của mình.', 1),
(69, 23, 'upload/bongtaib.jpg', 'Bông tai Vàng Trắng 10K Đính đá synthetic ', 4.22397, 'Sở hữu thiết kế thời thượng cùng các sắc đá kiêu sa, STYLE tự hào mang đến đôi bông tai với vẻ đẹp dịu dàng nhưng không kém phần cá tính. Bên cạnh đó, sản phẩm còn được chế tác từ vàng 10K nên đôi bông tai luôn sở hữu độ bền đẹp theo thời gian.', 3),
(70, 23, 'upload/bongtaic.jpg', 'Bông tai Vàng 14K đính ngọc trai FreshWater', 3.24371, 'Đôi bông tai vàng quý phái kết hợp cùng trang phục thanh lịch sẽ tạo nên một diện mạo chỉn chu nhưng không kém phần nổi bật. Với sự lộng lẫy đầy cuốn hút này, trang sức ngọc trai sẽ cùng nàng kiêu hãnh tỏa sáng trên mọi bước đường.', 6),
(71, 10, 'upload/quatanga.jpg', 'Bộ trang sức Vàng 18K đính đá Rub', 24.127, 'Dù ở lứa tuổi nào, theo phong cách cổ điển hay hiện đại thì sắc màu của ruby vẫn luôn biết chiều lòng các tín đồ thời trang. Bên cạnh đó, trang sức Ruby còn có độ cứng cao, chịu được sự va đập phù hợp với nhiều hoạt động hàng ngày của phụ nữ năng động.\r\n\r\n', 2),
(72, 10, 'upload/quatangb.jpg', 'Bộ trang sức Vàng trắng 10K đính đá ECZ', 12.671, 'Sở hữu thiết kế dựa trên tạo hình của hoa thủy tiên và lưu ly, chiếc nhẫn vàng không chỉ đơn giản là một món trang sức mà nó còn là biểu tượng của sự tự tin và mang đến niềm hạnh phúc. Ngoài ra, trong BST này, các thiết kế đa dạng, nàng có thể kết hợp những món trang sức khác như dây chuyền, lắc tay.', 1),
(73, 10, 'upload/quatangc.jpg', 'Bộ trang sức Vàng đính đá ECZ Family', 7.76415, 'Với thiết kế lấy cảm hứng từ hình ảnh nút thắt đặt trên biểu tượng vô cực, tượng trưng cho những cái nắm tay kết nối và tình yêu thương vô hạn của gia đình.', 1),
(74, 11, 'upload/chochanga.jpg', 'Lắc tay nam Bạc đính đá ', 144.05, 'Sở hữu kiểu dáng không quá xa lạ nhưng lại cực kỳ độc đáo, chiếc lắc tay  được chế tác từ chất liệu bạc 92.5 khoác lên mình vẻ ngoài trẻ trung, phá cách và “high fashion”.', 1),
(75, 11, 'upload/chochangb.jpg', 'Nhẫn nam Vàng 10K đính đá ECZ', 26.8762, 'Có thể nói, sản phẩm này như là món quà  gửi tặng đến các quý ông. Vì họ luôn biết cách rực rỡ theo sắc màu riêng, như cầu vồng tản ánh sắc không bao giờ trùng lắp.', 1),
(76, 11, 'upload/chochangc.jpg', 'Mặt dây chuyền Vàng trắng 10K đính đá ', 6.385, 'Với sự lộng lẫy của những viên đá ECZ trắng được đính một cách tỉ mỉ trên thiết kế đầy tinh xảo, chiếc mặt dây chuyền đính đá ECZ sẽ cùng nàng kiêu hãnh tỏa sáng trên mọi bước đường. Sở hữu kiểu dáng tròn, nhỏ nhắn bằng vàng 10K.', 1),
(77, 8, 'upload/quatang1/a.jpg', 'Nhẫn nam Kim cương Vàng 18K', 23.1367, 'Kim cương đã đẹp, trang sức kim cương lại càng mang sức hấp dẫn khó cưỡng. Sự kết hợp mới mẻ này chắc chắn sẽ tạo nên dấu ấn thời trang hiện đại và giúp quý cô trở nên nổi bật, tự tin và thu hút sự ngưỡng mộ của mọi người.', 1),
(78, 8, 'upload/quatang2/a.jpg', 'Bộ trang sức Vàng 18K đính đá Ruby', 10.5995, 'Sự kết hợp mới mẻ này chắc chắn sẽ tạo nên dấu ấn thời trang hiện đại và giúp quý cô trở nên nổi bật, tự tin và thu hút sự ngưỡng mộ của mọi người.', 1),
(79, 8, 'upload/quatang3/a.jpg', 'Bộ trang sức Bạc đính đá Silver', 9.16856, 'Sở hữu thiết kế dựa trên tạo hình của hoa thủy tiên và lưu ly, chiếc mặt dây chuyền không chỉ đơn giản là một món trang sức mà nó còn là biểu tượng của sự tự tin và mang đến niềm hạnh phúc.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `thuvien_anh`
--

CREATE TABLE `thuvien_anh` (
  `id_anh` int(11) NOT NULL,
  `tenhinh` varchar(100) NOT NULL,
  `Ma_SP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thuvien_anh`
--

INSERT INTO `thuvien_anh` (`id_anh`, `tenhinh`, `Ma_SP`) VALUES
(0, '', 22),
(1, 'upload/chonanga/a.jpg', 71),
(2, 'upload/chonanga/b.jpg', 71),
(3, 'upload/chonanga/c.jpg', 71),
(4, 'upload/chonangb/a.jpg', 72),
(5, 'upload/chonangb/b.jpg', 72),
(6, 'upload/chonangb/c.jpg', 72),
(7, 'upload/chonangc/a.jpg', 73),
(8, 'upload/chonangc/b.jpg', 73),
(9, 'upload/chonangc/c.jpg', 73),
(10, 'upload/chochanga/a.jpg', 74),
(11, 'upload/chochanga/b.jpg', 74),
(12, 'upload/chochanga/c.jpg', 74),
(13, 'upload/chochangb/a.jpg', 75),
(14, 'upload/chochangb/b.jpg', 75),
(15, 'upload/chochangb/c.jpg', 75),
(16, 'upload/chochangc/a.jpg', 76),
(17, 'upload/chochangc/b.jpg', 76),
(18, 'upload/chochangc/c.jpg', 76),
(19, 'upload/bongtaibaca/a.jpg', 32),
(20, 'upload/bongtaibaca/b.jpg', 32),
(21, 'upload/bongtaibaca/c.jpg', 32),
(22, 'upload/bongtaibacb/a.jpg', 31),
(23, 'upload/bongtaibacb/b.jpg', 31),
(24, 'upload/bongtaibacb/c.jpg', 31),
(25, 'upload/bongtaibacd/a.jpg', 33),
(26, 'upload/bongtaibacd/b.jpg', 33),
(27, 'upload/bongtaibacd/c.jpg', 33),
(28, 'upload/bongtaibacc.jpg/a.jpg', 34),
(29, 'upload/bongtaibacc.jpg/b.jpg', 34),
(30, 'upload/bongtaibacc.jpg/c.jpg', 34),
(31, 'upload/daychuyenbaca/a.jpg', 39),
(32, 'upload/daychuyenbaca/b.jpg', 39),
(33, 'upload/daychuyenbaca/c.jpg', 39),
(34, 'upload/daychuyenbacb/a.jpg', 40),
(35, 'upload/daychuyenbacb/b.jpg', 40),
(36, 'upload/daychuyenbacb/c.jpg', 40),
(37, 'upload/daychuyenbacc/a.jpg', 41),
(38, 'upload/daychuyenbacc/b.jpg', 41),
(39, 'upload/daychuyenbacc/c.jpg', 41),
(40, 'upload/daychuyenbacd/a.jpg', 42),
(41, 'upload/daychuyenbacd/b.jpg', 42),
(42, 'upload/daychuyenbacd/c.jpg', 42),
(43, 'upload/nhanbaca/a.jpg', 27),
(44, 'upload/nhanbaca/b.jpg', 27),
(45, 'upload/nhanbaca/c.jpg', 27),
(46, 'upload/nhanbacb/a.jpg', 28),
(47, 'upload/nhanbacb/b.jpg', 28),
(48, 'upload/nhanbacb/c.jpg', 28),
(49, 'upload/nhanbacc/a.jpg', 29),
(50, 'upload/nhanbacc/b.jpg', 29),
(51, 'upload/nhanbacc/c.jpg', 29),
(52, 'upload/nhanbacd/a.jpg', 30),
(53, 'upload/nhanbacd/b.jpg', 30),
(54, 'upload/nhanbacd/c.jpg', 30),
(55, 'upload/vongtaybaca/a.jpg', 35),
(56, 'upload/vongtaybaca/b.jpg', 35),
(57, 'upload/vongtaybaca/c.jpg', 35),
(58, 'upload/vongtaybacb/a.jpg', 36),
(59, 'upload/vongtaybacb/b.jpg', 36),
(60, 'upload/vongtaybacb/c.jpg', 36),
(61, 'upload/vongtaybacc/a.jpg', 37),
(62, 'upload/vongtaybacc/b.jpg', 37),
(64, 'upload/vongtaybacc/c.jpg', 37),
(65, 'upload/vongtaybacd/a.jpg', 38),
(66, 'upload/vongtaybacd/b.jpg', 38),
(67, 'upload/vongtaybacd/c.jpg', 38),
(68, 'upload/bongtaicuoivang24k/a.jpg', 19),
(69, 'upload/bongtaicuoivang24k/b.jpg', 19),
(70, 'upload/bongtaicuoivang24k/c.jpg', 19),
(71, 'upload/bongtaicuoivang18k/a.jpg', 20),
(72, 'upload/bongtaicuoivang18k/b.jpg', 20),
(73, 'upload/bongtaicuoivang18k/c.jpg', 20),
(74, 'upload/bongtaicuoivang14k/a.jpg', 21),
(75, 'upload/bongtaicuoivang14k/b.jpg', 21),
(76, 'upload/bongtaicuoivang14k/c.jpg', 21),
(77, 'upload/matdaychuyencuoi24k/a.jpg', 23),
(78, 'upload/matdaychuyencuoi24k/b.jpg', 23),
(79, 'upload/matdaychuyencuoi24k/c.jpg', 23),
(80, 'upload/matdaychuyencuoivang24ka/a.jpg', 24),
(81, 'upload/matdaychuyencuoivang24ka/b.jpg', 24),
(82, 'upload/matdaychuyencuoivang24ka/c.jpg', 24),
(83, 'upload/matdaychuyencuoi18k/a.jpg', 25),
(84, 'upload/matdaychuyencuoi18k/b.jpg', 25),
(85, 'upload/matdaychuyencuoi18k/c.jpg', 25),
(86, 'upload/matdaychuyencuoi14k/a.jpg', 26),
(87, 'upload/matdaychuyencuoi14k/b.jpg', 26),
(88, 'upload/matdaychuyencuoi14k/c.jpg', 26),
(89, 'upload/capnhancuoivang18k/a.jpg', 12),
(90, 'upload/capnhancuoivang18k/b.jpg', 12),
(91, 'upload/capnhancuoivang18k/c.jpg', 12),
(92, 'upload/nhancuoivangtrang10k/a.jpg', 13),
(93, 'upload/nhancuoivangtrang10k/b.jpg', 13),
(94, 'upload/nhancuoivangtrang10k/c.jpg', 13),
(95, 'upload/capnhancuoikimcuongvangtrang1/a.jpg', 14),
(96, 'upload/capnhancuoikimcuongvangtrang1/b.jpg', 14),
(97, 'upload/capnhancuoikimcuongvangtrang1/c.jpg', 14),
(98, 'upload/vongtaycuoivang18k/a.jpg', 15),
(99, 'upload/vongtaycuoivang18k/b.jpg', 15),
(100, 'upload/vongtaycuoivang18k/c.jpg', 15),
(101, 'upload/vongtayvangtrang10k/a.jpg', 16),
(102, 'upload/vongtayvangtrang10k/b.jpg', 16),
(103, 'upload/vongtayvangtrang10k/c.jpg', 16),
(104, 'upload/vongtaycuoi18k/a.jpg', 17),
(105, 'upload/vongtaycuoi18k/b.jpg', 17),
(106, 'upload/vongtaycuoi18k/c.jpg', 17),
(107, 'upload/vongtaycuoivang24k/a.jpg', 18),
(108, 'upload/vongtaycuoivang24k/b.jpg', 18),
(109, 'upload/vongtaycuoivang24k/c.jpg', 18),
(110, 'upload/bongtaia/a.jpg', 68),
(111, 'upload/bongtaia/b.jpg', 68),
(112, 'upload/bongtaia/c.jpg', 68),
(113, 'upload/bongtaib/a.jpg', 69),
(114, 'upload/bongtaib/b.jpg', 69),
(115, 'upload/bongtaib/c.jpg', 69),
(116, 'upload/bongtaic/a.jpg', 70),
(117, 'upload/bongtaic/b.jpg', 70),
(118, 'upload/bongtaic/c.jpg', 70),
(119, 'upload/daychuyenb/a.jpg', 62),
(120, 'upload/daychuyenb/b.jpg', 62),
(121, 'upload/daychuyenb/c.jpg', 62),
(122, 'upload/daychuyena/a.jpg', 63),
(123, 'upload/daychuyena/b.jpg', 63),
(124, 'upload/daychuyena/c.jpg', 63),
(125, 'upload/daychuyenc/a.jpg', 64),
(126, 'upload/daychuyenc/b.jpg', 64),
(127, 'upload/daychuyenc/c.jpg', 64),
(128, 'upload/nhana/a.jpg', 59),
(129, 'upload/nhana/b.jpg', 59),
(130, 'upload/nhana/c.jpg', 59),
(131, 'upload/nhanb/a.jpg', 60),
(132, 'upload/nhanb/b.jpg', 60),
(133, 'upload/nhanb/c.jpg', 60),
(134, 'upload/nhanc/a.jpg', 61),
(135, 'upload/nhanc/b.jpg', 61),
(136, 'upload/nhanc/c.jpg', 61),
(137, 'upload/vongtaya/a.jpg', 65),
(138, 'upload/vongtaya/b.jpg', 65),
(139, 'upload/vongtaya/c.jpg', 65),
(140, 'upload/vongtayb/a.jpg', 66),
(141, 'upload/vongtayb/b.jpg', 66),
(142, 'upload/vongtayb/c.jpg', 66),
(143, 'upload/vongtayc/a.jpg', 67),
(144, 'upload/vongtayc/b.jpg', 67),
(145, 'upload/vongtayc/c.jpg', 67),
(146, 'upload/bongtaivanga/a.jpg', 47),
(147, 'upload/bongtaivanga/b.jpg', 47),
(148, 'upload/bongtaivanga/c.jpg', 47),
(149, 'upload/bongtaivangb/a.jpg', 48),
(150, 'upload/bongtaivangb/b.jpg', 48),
(151, 'upload/bongtaivangb/c.jpg', 48),
(152, 'upload/bongtaivangc/a.jpg', 49),
(153, 'upload/bongtaivangc/b.jpg', 49),
(154, 'upload/bongtaivangc/c.jpg', 49),
(155, 'upload/bongtaivangd/a.jpg', 50),
(156, 'upload/bongtaivangd/b.jpg', 50),
(157, 'upload/bongtaivangd/c.png\r\n', 50),
(158, 'upload/daychuyenvangb/a.jpg', 51),
(159, 'upload/daychuyenvangb/b.jpg', 51),
(160, 'upload/daychuyenvangb/c.jpg', 51),
(161, 'upload/daychuyenvanga/a.jpg', 52),
(162, 'upload/daychuyenvanga/b.jpg', 52),
(163, 'upload/daychuyenvanga/c.jpg', 52),
(164, 'upload/daychuyenvangc/a.jpg', 53),
(165, 'upload/daychuyenvangc/b.jpg', 53),
(166, 'upload/daychuyenvangc/c.jpg', 53),
(167, 'upload/daychuyenvangd/a.jpg', 54),
(168, 'upload/daychuyenvangd/b.jpg', 54),
(169, 'upload/daychuyenvangd/c.jpg', 54),
(170, 'upload/nhanvanga/a.jpg', 43),
(171, 'upload/nhanvanga/b.jpg', 43),
(172, 'upload/nhanvanga/c.jpg', 43),
(173, 'upload/nhanvangb/a.jpg', 44),
(174, 'upload/nhanvangb/b.jpg', 44),
(175, 'upload/nhanvangb/c.jpg', 44),
(176, 'upload/nhanvangc/a.jpg', 45),
(177, 'upload/nhanvangc/b.jpg', 45),
(178, 'upload/nhanvangc/c.jpg', 45),
(179, 'upload/nhanvangd/a.jpg', 46),
(180, 'upload/nhanvangd/b.jpg', 46),
(181, 'upload/nhanvangd/c.jpg', 46),
(182, 'upload/vongtayvanga/a.jpg', 55),
(183, 'upload/vongtayvanga/b.jpg', 55),
(184, 'upload/vongtayvanga/c.jpg', 55),
(185, 'upload/vongtayvangb/a.jpg', 56),
(186, 'upload/vongtayvangb/b.jpg', 56),
(187, 'upload/vongtayvangb/c.jpg', 56),
(188, 'upload/vongtayvangc/a.jpg', 57),
(189, 'upload/vongtayvangc/b.jpg', 57),
(190, 'upload/vongtayvangc/c.jpg', 57),
(191, 'upload/vongtayvangd/a.jpg', 58),
(192, 'upload/vongtayvangd/b.jpg', 58),
(193, 'upload/vongtayvangd/c.jpg', 58),
(194, 'upload/nhancuoivang18kdinhdaruby/a.png', 1),
(195, 'upload/nhancuoivang18kdinhdaruby/b.png', 1),
(196, 'upload/nhancuoivang18kdinhdaruby/c.jpg', 1),
(197, 'upload/nhankimcuongvang14k/a.jpg', 2),
(198, 'upload/nhankimcuongvang14k/b.jpg', 2),
(199, 'upload/nhankimcuongvang14k/c.jpg', 2),
(200, 'upload/bongtaivangtrang14kdindatopaz/a.jpg', 3),
(201, 'upload/bongtaivangtrang14kdindatopaz/b.jpg', 3),
(202, 'upload/bongtaivangtrang14kdindatopaz/c.jpg', 3),
(203, 'upload/nhanvang18kdindaecz/a.jpg', 4),
(204, 'upload/nhanvang18kdindaecz/b.jpg', 4),
(205, 'upload/nhanvang18kdindaecz/c.jpg', 4),
(206, 'upload/matdaychuyenvang18kdinhngoc/a.jpg', 5),
(207, 'upload/matdaychuyenvang18kdinhngoc/b.jpg', 5),
(208, 'upload/matdaychuyenvang18kdinhngoc/c.jpg', 5),
(209, 'upload/bongtaivang10kdinhda/a.jpg', 6),
(210, 'upload/bongtaivang10kdinhda/b.jpg', 6),
(211, 'upload/bongtaivang10kdinhda/c.jpg', 6),
(212, 'upload/bongtaibacdinhda/a.jpg', 7),
(213, 'upload/bongtaibacdinhda/b.jpg', 7),
(214, 'upload/bongtaibacdinhda/c.jpg', 7),
(215, 'upload/lactaybacdinhda/a.jpg', 8),
(216, 'upload/lactaybacdinhda/b.jpg', 8),
(217, 'upload/lactaybacdinhda/c.jpg', 8),
(218, 'upload/kiengvangtrangy18k/b.jpg', 9),
(219, 'upload/kiengvangtrangy18k/c.jpg', 9),
(220, 'upload/kiengvangtrangy18k/d.jpg', 9),
(221, 'upload/kiengvangtrangy18k/c.jpg', 9),
(222, 'upload/kiengvangtrangy18k/d.jpg', 9),
(223, 'upload/nhancuoikimcuongvang18k/a.jpg', 10),
(224, 'upload/nhancuoikimcuongvang18k/b.jpg', 10),
(225, 'upload/nhancuoikimcuongvang18k/c.jpg', 10);

-- --------------------------------------------------------

--
-- Table structure for table `trangthai`
--

CREATE TABLE `trangthai` (
  `TT_MA` int(11) NOT NULL,
  `TT_TEN` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trangthai`
--

INSERT INTO `trangthai` (`TT_MA`, `TT_TEN`) VALUES
(1, 'Đang đặt'),
(2, 'Đã đặt'),
(3, 'Hoàn thành');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bophan`
--
ALTER TABLE `bophan`
  ADD PRIMARY KEY (`Ma_BP`);

--
-- Indexes for table `chatlieu`
--
ALTER TABLE `chatlieu`
  ADD PRIMARY KEY (`Ma_CL`);

--
-- Indexes for table `chitietchatlieu`
--
ALTER TABLE `chitietchatlieu`
  ADD PRIMARY KEY (`Ma_SP`,`Ma_CL`),
  ADD KEY `FK_CHITIETC_CHATLIEU__CHATLIEU` (`Ma_CL`);

--
-- Indexes for table `chitietgiaodich`
--
ALTER TABLE `chitietgiaodich`
  ADD PRIMARY KEY (`Ma_GD`,`Ma_SP`),
  ADD KEY `FK_CHITIETG_SANPHAM_C_SANPHAM` (`Ma_SP`);

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`Ma_SP`),
  ADD KEY `fk_giaodich_Ma_GD` (`Ma_GD`),
  ADD KEY `fk_sanpham_Ma_SP` (`Ma_SP`);

--
-- Indexes for table `chitiet_pn`
--
ALTER TABLE `chitiet_pn`
  ADD PRIMARY KEY (`Ma_PN`,`Ma_SP`),
  ADD KEY `FK_CHITIET__CHITIET_P_SANPHAM` (`Ma_SP`);

--
-- Indexes for table `cochatlieu`
--
ALTER TABLE `cochatlieu`
  ADD PRIMARY KEY (`Ma_SP`,`Ma_CL`),
  ADD KEY `FK_COCHATLI_COCHATLIE_CHATLIEU` (`Ma_CL`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`Ma_DM`);

--
-- Indexes for table `don_gia`
--
ALTER TABLE `don_gia`
  ADD PRIMARY KEY (`id_gia`),
  ADD KEY `FK_SanPham` (`Ma_SP`);

--
-- Indexes for table `giaodich`
--
ALTER TABLE `giaodich`
  ADD PRIMARY KEY (`Ma_GD`),
  ADD KEY `FK_GIAODICH_CUAKHACHH_KHACHHAN` (`Ma_KH`),
  ADD KEY `FK_GIAODICH_LAPHOADON_NHANVIEN` (`Ma_NV`),
  ADD KEY `FK_GIAODICH_LOAIGD_GD_LOAIGIAO` (`Ma_LGD`),
  ADD KEY `fk_trangthai` (`TT_MA`),
  ADD KEY `fk_giaodich_PTTT_MA` (`PTTT_MA`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`Ma_KH`);

--
-- Indexes for table `loaigiaodich`
--
ALTER TABLE `loaigiaodich`
  ADD PRIMARY KEY (`Ma_LGD`);

--
-- Indexes for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`Ma_NCC`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`Ma_NV`),
  ADD KEY `FK_NHANVIEN_NHANVIEN__BOPHAN` (`Ma_BP`);

--
-- Indexes for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`Ma_PN`),
  ADD KEY `FK_PHIEUNHA_PHIEULAPD_NHANVIEN` (`Ma_NV`),
  ADD KEY `FK_PHIEUNHA_TUNHACUNG_NHACUNGC` (`Ma_NCC`);

--
-- Indexes for table `pt_thanhtoan`
--
ALTER TABLE `pt_thanhtoan`
  ADD PRIMARY KEY (`PTTT_MA`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`Ma_SP`),
  ADD KEY `FK_SANPHAM_THUOCDANH_DANHMUC` (`Ma_DM`);

--
-- Indexes for table `thuvien_anh`
--
ALTER TABLE `thuvien_anh`
  ADD PRIMARY KEY (`id_anh`),
  ADD KEY `fk_thuvien_anh_Ma_SP` (`Ma_SP`);

--
-- Indexes for table `trangthai`
--
ALTER TABLE `trangthai`
  ADD PRIMARY KEY (`TT_MA`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitietgiaodich`
--
ALTER TABLE `chitietgiaodich`
  MODIFY `Ma_GD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `Ma_DM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `don_gia`
--
ALTER TABLE `don_gia`
  MODIFY `id_gia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `giaodich`
--
ALTER TABLE `giaodich`
  MODIFY `Ma_GD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `Ma_KH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietchatlieu`
--
ALTER TABLE `chitietchatlieu`
  ADD CONSTRAINT `FK_CHITIETC_CHATLIEU__CHATLIEU` FOREIGN KEY (`Ma_CL`) REFERENCES `chatlieu` (`Ma_CL`),
  ADD CONSTRAINT `FK_CHITIETC_SANPHAM_D_SANPHAM` FOREIGN KEY (`Ma_SP`) REFERENCES `sanpham` (`Ma_SP`);

--
-- Constraints for table `chitietgiaodich`
--
ALTER TABLE `chitietgiaodich`
  ADD CONSTRAINT `FK_CHITIETG_HOADON_CH_GIAODICH` FOREIGN KEY (`Ma_GD`) REFERENCES `giaodich` (`Ma_GD`),
  ADD CONSTRAINT `FK_CHITIETG_SANPHAM_C_SANPHAM` FOREIGN KEY (`Ma_SP`) REFERENCES `sanpham` (`Ma_SP`);

--
-- Constraints for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `fk_giaodich_Ma_GD` FOREIGN KEY (`Ma_GD`) REFERENCES `giaodich` (`Ma_GD`),
  ADD CONSTRAINT `fk_sanpham_Ma_SP` FOREIGN KEY (`Ma_SP`) REFERENCES `sanpham` (`Ma_SP`);

--
-- Constraints for table `chitiet_pn`
--
ALTER TABLE `chitiet_pn`
  ADD CONSTRAINT `FK_CHITIET__CHITIET_P_PHIEUNHA` FOREIGN KEY (`Ma_PN`) REFERENCES `phieunhap` (`Ma_PN`),
  ADD CONSTRAINT `FK_CHITIET__CHITIET_P_SANPHAM` FOREIGN KEY (`Ma_SP`) REFERENCES `sanpham` (`Ma_SP`);

--
-- Constraints for table `cochatlieu`
--
ALTER TABLE `cochatlieu`
  ADD CONSTRAINT `FK_COCHATLI_COCHATLIE_CHATLIEU` FOREIGN KEY (`Ma_CL`) REFERENCES `chatlieu` (`Ma_CL`),
  ADD CONSTRAINT `FK_COCHATLI_COCHATLIE_SANPHAM` FOREIGN KEY (`Ma_SP`) REFERENCES `sanpham` (`Ma_SP`);

--
-- Constraints for table `don_gia`
--
ALTER TABLE `don_gia`
  ADD CONSTRAINT `FK_SanPham` FOREIGN KEY (`Ma_SP`) REFERENCES `sanpham` (`Ma_SP`);

--
-- Constraints for table `giaodich`
--
ALTER TABLE `giaodich`
  ADD CONSTRAINT `FK_GIAODICH_CUAKHACHH_KHACHHAN` FOREIGN KEY (`Ma_KH`) REFERENCES `khachhang` (`Ma_KH`),
  ADD CONSTRAINT `FK_GIAODICH_LAPHOADON_NHANVIEN` FOREIGN KEY (`Ma_NV`) REFERENCES `nhanvien` (`Ma_NV`),
  ADD CONSTRAINT `FK_GIAODICH_LOAIGD_GD_LOAIGIAO` FOREIGN KEY (`Ma_LGD`) REFERENCES `loaigiaodich` (`Ma_LGD`),
  ADD CONSTRAINT `fk_giaodich_PTTT_MA` FOREIGN KEY (`PTTT_MA`) REFERENCES `pt_thanhtoan` (`PTTT_MA`),
  ADD CONSTRAINT `fk_trangthai` FOREIGN KEY (`TT_MA`) REFERENCES `trangthai` (`TT_MA`);

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `FK_NHANVIEN_NHANVIEN__BOPHAN` FOREIGN KEY (`Ma_BP`) REFERENCES `bophan` (`Ma_BP`);

--
-- Constraints for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `FK_PHIEUNHA_PHIEULAPD_NHANVIEN` FOREIGN KEY (`Ma_NV`) REFERENCES `nhanvien` (`Ma_NV`),
  ADD CONSTRAINT `FK_PHIEUNHA_TUNHACUNG_NHACUNGC` FOREIGN KEY (`Ma_NCC`) REFERENCES `nhacungcap` (`Ma_NCC`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_SANPHAM_THUOCDANH_DANHMUC` FOREIGN KEY (`Ma_DM`) REFERENCES `danhmuc` (`Ma_DM`);

--
-- Constraints for table `thuvien_anh`
--
ALTER TABLE `thuvien_anh`
  ADD CONSTRAINT `fk_thuvien_anh_Ma_SP` FOREIGN KEY (`Ma_SP`) REFERENCES `sanpham` (`Ma_SP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
