-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2021 at 05:16 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thuongmai`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `admin_name`, `email`, `password`) VALUES
(19, 'Tiên Nguyễn', 'tiennguyenthimy29@gmail.com', '75c03fd3d15cc55bbfa80668f2e7ab09');

-- --------------------------------------------------------

--
-- Table structure for table `ctdondathang`
--

CREATE TABLE `ctdondathang` (
  `maddh` int(11) NOT NULL,
  `mahang` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctdondathang`
--

INSERT INTO `ctdondathang` (`maddh`, `mahang`, `soluong`, `dongia`) VALUES
(8, 10, 1, 249000),
(17, 12, 1, 9290000),
(19, 10, 1, 249000),
(22, 10, 1, 249000),
(25, 10, 1, 249000),
(26, 10, 1, 249000),
(28, 10, 1, 249000),
(30, 2, 1, 14590000);

-- --------------------------------------------------------

--
-- Table structure for table `dondathang`
--

CREATE TABLE `dondathang` (
  `maddh` int(11) NOT NULL,
  `makhach` int(11) NOT NULL,
  `ngaydat` timestamp NOT NULL DEFAULT current_timestamp(),
  `noigiao` varchar(100) NOT NULL,
  `tongtien` int(11) NOT NULL,
  `trangthai` int(11) NOT NULL DEFAULT 0,
  `huydon` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dondathang`
--

INSERT INTO `dondathang` (`maddh`, `makhach`, `ngaydat`, `noigiao`, `tongtien`, `trangthai`, `huydon`) VALUES
(7, 10, '2021-11-30 13:31:11', 'Cần thơ', 6146000, 3, 0),
(8, 10, '2021-11-30 15:29:26', 'Cần thơ', 249000, 3, 0),
(16, 10, '2021-11-30 17:19:31', 'Ninh kiều, Cần Thơ', 699000, -1, 1),
(17, 10, '2021-12-01 09:55:32', 'sóc trăng', 9290000, 3, 0),
(18, 11, '2021-12-02 13:22:27', 'Tiền Giang', 22790000, 1, 0),
(19, 11, '2021-12-02 13:23:24', 'Tiền Giang', 249000, 2, 0),
(20, 10, '2021-12-02 19:41:53', 'sóc trăng', 249000, -1, 1),
(22, 10, '2021-12-03 15:42:26', 'Cái Răng, TP Cần Thơ', 249000, 3, 0),
(23, 11, '2021-12-04 15:12:33', 'Cà Mau', 5696000, -1, 1),
(24, 11, '2021-12-04 15:29:58', 'Bến Tre', 22790000, -1, 1),
(25, 10, '2021-12-04 15:48:43', 'sóc trăng', 249000, 1, 0),
(26, 11, '2021-12-04 15:58:15', 'Cái Răng, TP Cần Thơ', 249000, 0, 0),
(27, 11, '2021-12-05 00:11:52', 'Tiền Giang', 22790000, -1, 1),
(28, 11, '2021-12-05 00:26:36', 'Long an', 249000, 0, 0),
(29, 13, '2021-12-05 03:44:25', 'cần Thơ', 22790000, -1, 1),
(30, 13, '2021-12-05 03:45:02', 'cần Thơ', 14590000, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `id_giohang` int(11) NOT NULL,
  `mahang` int(11) NOT NULL,
  `soluong` int(11) DEFAULT 1,
  `makhach` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `giohang`
--

INSERT INTO `giohang` (`id_giohang`, `mahang`, `soluong`, `makhach`) VALUES
(4, 7, 1, 10),
(15, 1, 1, 10),
(16, 2, 1, 11),
(17, 2, 1, 10),
(20, 10, 1, 10),
(21, 1, 2, 11),
(23, 10, 1, 11),
(24, 2, 1, 13);

-- --------------------------------------------------------

--
-- Table structure for table `hangsanxuat`
--

CREATE TABLE `hangsanxuat` (
  `mahsx` int(11) NOT NULL,
  `tenhsx` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hangsanxuat`
--

INSERT INTO `hangsanxuat` (`mahsx`, `tenhsx`) VALUES
(1, 'Dell'),
(2, 'Samsung'),
(3, 'Iphone'),
(4, 'Oppo'),
(5, 'Remax'),
(6, 'VE Monk'),
(7, 'Havit'),
(12, 'asus');

-- --------------------------------------------------------

--
-- Table structure for table `hinhanhsp`
--

CREATE TABLE `hinhanhsp` (
  `id_hinh` int(11) NOT NULL,
  `mahang` int(11) NOT NULL,
  `link_anh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hinhanhsp`
--

INSERT INTO `hinhanhsp` (`id_hinh`, `mahang`, `link_anh`) VALUES
(1, 1, './img/dell 5570-5.jpeg'),
(2, 1, './img/dell i7_1.jpg'),
(3, 1, './img/dell i7_2.jpg'),
(4, 2, './img/del_vostro_2.jpg'),
(5, 2, './img/dell i5.jpg'),
(6, 2, './img/dell_vostro_1.png'),
(7, 16, './img/asus-flip-br1100fka-xam-dd.jpg'),
(8, 16, './img/asus-vivobook-a515-bac-dd.jpg'),
(9, 16, './img/asus-vivobook-e210ma-xanh-dd.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `makhach` int(11) NOT NULL,
  `ho_ten` varchar(100) NOT NULL,
  `tenkhach` varchar(100) NOT NULL,
  `diachi` varchar(100) DEFAULT NULL,
  `dienthoai` char(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`makhach`, `ho_ten`, `tenkhach`, `diachi`, `dienthoai`, `email`, `matkhau`) VALUES
(10, 'Nguyễn thị mỹ tiên', 'Tien_Tien', NULL, '0344093397', 'nguyenngocut566@gmail.com', '5f376840ac4213d91c7935aaac15b38a'),
(11, 'Nguyễn Thị Thảo', 'Tien_Nguyen', NULL, '0352865782', 'tien@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(12, '', 'TuTu', NULL, '0467839925', 'tu@gmail.com', 'f93f6389d0174fe733babc219344025e'),
(13, 'Nguyễn Thị mỹ Tiên', 'lyly', NULL, '0357092997', 'tien@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `maloai` int(11) NOT NULL,
  `tenloai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`maloai`, `tenloai`) VALUES
(1, 'Laptop'),
(2, 'Điện thoại'),
(3, 'Tai nghe');

-- --------------------------------------------------------

--
-- Table structure for table `mathang`
--

CREATE TABLE `mathang` (
  `mahang` int(11) NOT NULL,
  `tenhang` varchar(100) NOT NULL,
  `dongia` int(11) NOT NULL,
  `soluongton` int(11) NOT NULL,
  `hinhanh` varchar(200) NOT NULL,
  `mota` varchar(200) DEFAULT NULL,
  `maloai` int(11) NOT NULL,
  `mahsx` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mathang`
--

INSERT INTO `mathang` (`mahang`, `tenhang`, `dongia`, `soluongton`, `hinhanh`, `mota`, `maloai`, `mahsx`) VALUES
(1, 'Laptop Dell Inspiron 5570 i7 8550U', 22790000, 19, './img/dell 5570-5.jpeg', 'core i7-88550U 1.8GHz , Ram: 8GB đ4', 1, 1),
(2, 'Laptop Dell Vostro 3568 i5 7200U', 14590000, 10, './img/dell i5.jpg', 'core i5 72000U 2.5GHz, Ram: 4GB', 1, 1),
(3, 'Laptop Dell Vostro 3400 70253900 i5-1135G7', 22790000, 30, './img/dell 1.jpg', '', 1, 1),
(6, 'Điện thoại Galaxy S20+', 14999000, 18, './img/samsung.jpg', '', 2, 2),
(7, 'Điện thoại Oppo A92', 5696000, 9, './img/oppo.jpg', '', 2, 4),
(8, 'Điện thoại iPhone 12 Mini', 13990000, 10, './img/iphone 12.jpg', '', 2, 3),
(9, 'Tai nghe Remax TWS-10I True Wireless', 590000, 10, './img/earpod remax.jpg', '', 3, 5),
(10, 'Tai nghe VE Monk Plus Mic-U', 249000, 5, './img/tainghecoday.jpg', '', 3, 6),
(11, 'Tai nghe chụp tai Havit i62', 450000, 9, './img/headphone havit.jpg', '', 3, 7),
(12, 'Điện thoại Samsung Galaxy A52', 9290000, 10, 'img/samsunga52.jpg', NULL, 2, 2),
(16, 'asus ', 10000000, 10, './img/asus-flip-br1100fka-xam-dd.jpg', NULL, 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tskthuat_dt`
--

CREATE TABLE `tskthuat_dt` (
  `mahang` int(11) NOT NULL,
  `maloai` int(11) NOT NULL DEFAULT 2,
  `manhinh` varchar(100) NOT NULL,
  `hdh` varchar(100) NOT NULL,
  `camera_sau` varchar(50) NOT NULL,
  `camera_truoc` varchar(50) NOT NULL,
  `RAM` varchar(10) NOT NULL,
  `bo_nho_trong` varchar(10) NOT NULL,
  `SIM` varchar(100) NOT NULL,
  `dung_luong_pin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tskthuat_dt`
--

INSERT INTO `tskthuat_dt` (`mahang`, `maloai`, `manhinh`, `hdh`, `camera_sau`, `camera_truoc`, `RAM`, `bo_nho_trong`, `SIM`, `dung_luong_pin`) VALUES
(7, 2, 'TFT LCD6.5\"Full HD+', 'Android 10', '16 MP', 'Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP', '8 GB', '', '2 Nano SIMHỗ trợ 4G', '5000 mAh18');

-- --------------------------------------------------------

--
-- Table structure for table `tskthuat_laptop`
--

CREATE TABLE `tskthuat_laptop` (
  `mahang` int(11) NOT NULL,
  `maloai` int(11) NOT NULL DEFAULT 1,
  `model` varchar(100) NOT NULL,
  `CPU` varchar(100) NOT NULL,
  `RAM` varchar(100) NOT NULL,
  `manhinh` varchar(1000) NOT NULL,
  `card_manhinh` varchar(300) NOT NULL,
  `o_cung` varchar(100) NOT NULL,
  `hedieuhanh` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tskthuat_laptop`
--

INSERT INTO `tskthuat_laptop` (`mahang`, `maloai`, `model`, `CPU`, `RAM`, `manhinh`, `card_manhinh`, `o_cung`, `hedieuhanh`) VALUES
(1, 1, 'Dell Inspiron 5570', 'Intel® Core™ i7-8550U 1.8GHz với turbo boost lên tới 4.0Ghz, 8M cache, 8 luồng xử lí', ' 8GB, DDR4 (2 khe), 2400 MHz', '15.6 inch, Full HD (1920 x 1080)', ' Card đồ họa rời, AMD Radeon 530 4 GB', 'M.2 PCIe.128G SSD +1TB HDD', 'Windows 10 Home 64bit LICENCE'),
(2, 1, 'Dell Vostro 3568', 'Intel Core i5 Kabylake, 7200U, 2.50 GHz', '8 GB, DDR4 (2 khe), 2400 MHz', '15.6 inch, Full HD (1080×1920)', 'Card đồ họa rời, AMD Radeon R5 M420, 2 GB', 'SSD 120G + HDD 1T', 'Windows 10-64 bit'),
(3, 1, 'Dell Vostro V3400', 'Intel Core i5-1135G7', '8 GB, DDR4', '14.0\", 1920 x 1080 Pixel, WVA, 60 Hz, WVA Anti-glare LED Backlit Narrow Border', 'Intel UHD Graphics', 'SSD 256 GB', 'Windows 10'),
(16, 1, 'asus', 'core i3', '8GB', '15.6 inch, Full HD (1080×1920)', 'Intel UHD Graphics', 'ssd15.6', 'Windows 10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `ctdondathang`
--
ALTER TABLE `ctdondathang`
  ADD PRIMARY KEY (`maddh`,`mahang`);

--
-- Indexes for table `dondathang`
--
ALTER TABLE `dondathang`
  ADD PRIMARY KEY (`maddh`),
  ADD KEY `tbl_makhach` (`makhach`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id_giohang`),
  ADD KEY `mahang` (`mahang`),
  ADD KEY `makhach` (`makhach`);

--
-- Indexes for table `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  ADD PRIMARY KEY (`mahsx`);

--
-- Indexes for table `hinhanhsp`
--
ALTER TABLE `hinhanhsp`
  ADD PRIMARY KEY (`id_hinh`),
  ADD KEY `mahang` (`mahang`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`makhach`);

--
-- Indexes for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`maloai`);

--
-- Indexes for table `mathang`
--
ALTER TABLE `mathang`
  ADD PRIMARY KEY (`mahang`),
  ADD KEY `maloai` (`maloai`),
  ADD KEY `mahsx` (`mahsx`);

--
-- Indexes for table `tskthuat_dt`
--
ALTER TABLE `tskthuat_dt`
  ADD PRIMARY KEY (`mahang`,`maloai`),
  ADD KEY `mahang` (`mahang`);

--
-- Indexes for table `tskthuat_laptop`
--
ALTER TABLE `tskthuat_laptop`
  ADD PRIMARY KEY (`mahang`,`maloai`),
  ADD KEY `mahang` (`mahang`),
  ADD KEY `maloai` (`maloai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `dondathang`
--
ALTER TABLE `dondathang`
  MODIFY `maddh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id_giohang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  MODIFY `mahsx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hinhanhsp`
--
ALTER TABLE `hinhanhsp`
  MODIFY `id_hinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `makhach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `maloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mathang`
--
ALTER TABLE `mathang`
  MODIFY `mahang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ctdondathang`
--
ALTER TABLE `ctdondathang`
  ADD CONSTRAINT `maddh` FOREIGN KEY (`maddh`) REFERENCES `dondathang` (`maddh`);

--
-- Constraints for table `dondathang`
--
ALTER TABLE `dondathang`
  ADD CONSTRAINT `tbl_makhach` FOREIGN KEY (`makhach`) REFERENCES `khachhang` (`makhach`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `mahang` FOREIGN KEY (`mahang`) REFERENCES `mathang` (`mahang`),
  ADD CONSTRAINT `makhach` FOREIGN KEY (`makhach`) REFERENCES `khachhang` (`makhach`);

--
-- Constraints for table `hinhanhsp`
--
ALTER TABLE `hinhanhsp`
  ADD CONSTRAINT `hinhanhsp_ibfk_1` FOREIGN KEY (`mahang`) REFERENCES `mathang` (`mahang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mathang`
--
ALTER TABLE `mathang`
  ADD CONSTRAINT `mahsx` FOREIGN KEY (`mahsx`) REFERENCES `hangsanxuat` (`mahsx`),
  ADD CONSTRAINT `maloai` FOREIGN KEY (`maloai`) REFERENCES `loaisanpham` (`maloai`);

--
-- Constraints for table `tskthuat_dt`
--
ALTER TABLE `tskthuat_dt`
  ADD CONSTRAINT `tskthuat_dt_ibfk_1` FOREIGN KEY (`mahang`) REFERENCES `mathang` (`mahang`);

--
-- Constraints for table `tskthuat_laptop`
--
ALTER TABLE `tskthuat_laptop`
  ADD CONSTRAINT `tskthuat_laptop_ibfk_1` FOREIGN KEY (`mahang`) REFERENCES `mathang` (`mahang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
