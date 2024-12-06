-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2024 at 04:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `btlphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `chidoan`
--

CREATE TABLE `chidoan` (
  `idchidoan` varchar(200) NOT NULL,
  `tenchidoan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chidoan`
--

INSERT INTO `chidoan` (`idchidoan`, `tenchidoan`) VALUES
('CD1', 'Khoa Công Nghệ Thông Tin'),
('CD2', 'Khoa Du Lịch'),
('CD3', 'Khoa Ô Tô'),
('CD4', 'Khoa Cơ Khí Điện Lạnh'),
('CD5', 'Khoa Tự Động Hóa'),
('CD6', 'Khoa Quản Trị Khách Sạn');

-- --------------------------------------------------------

--
-- Table structure for table `dangki`
--

CREATE TABLE `dangki` (
  `TAIKHOAN` varchar(200) NOT NULL,
  `MATKHAU` varchar(100) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `SDT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dangki`
--

INSERT INTO `dangki` (`TAIKHOAN`, `MATKHAU`, `EMAIL`, `SDT`) VALUES
('abc@gmail.com', '12345', 'abc@gmail.com', 325445554),
('cuong@gmail.com', '12345', 'cuong@gmail.com', 325445554),
('giangcuong0603@gmail.com', '12345', 'giangcuong0603@gmail.com', 325554445);

-- --------------------------------------------------------

--
-- Table structure for table `dangnhap`
--

CREATE TABLE `dangnhap` (
  `TAIKHOAN` varchar(100) NOT NULL,
  `MATKHAU` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dangnhap`
--

INSERT INTO `dangnhap` (`TAIKHOAN`, `MATKHAU`) VALUES
('abc@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `dgtheohk`
--

CREATE TABLE `dgtheohk` (
  `id` varchar(100) NOT NULL,
  `iddv` varchar(100) NOT NULL,
  `tendoanvien` varchar(250) NOT NULL,
  `idchidoan` varchar(200) NOT NULL,
  `hocki1` varchar(100) NOT NULL,
  `hocki2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dgtheohk`
--

INSERT INTO `dgtheohk` (`id`, `iddv`, `tendoanvien`, `idchidoan`, `hocki1`, `hocki2`) VALUES
('1', 'DV1', 'Giàng Xuân Cường', 'CD1', '80', '90'),
('2', 'DV2', 'Nguyễn Trọng Mạnh', 'CD1', '80', '80'),
('3', 'DV3', 'Nguyễn Quý Duy', 'CD1', '80', '85'),
('4', 'DV4', 'Nguyễn Văn An', 'CD1', '55', '80'),
('5', 'DV5', 'Trần Thị Trâm', 'CD1', '77', '90'),
('6', 'DV6', 'Lê Minh Cường', 'CD1', '77', '90'),
('7', 'DV7', 'Phạm Thị Dung', 'CD1', '50', '90'),
('8', 'DV8', 'Hoàng Đức', 'CD1', '78', '88');

-- --------------------------------------------------------

--
-- Table structure for table `dgtheonam`
--

CREATE TABLE `dgtheonam` (
  `id` varchar(100) NOT NULL,
  `iddv` varchar(100) NOT NULL,
  `tendoanvien` varchar(250) NOT NULL,
  `idchidoan` varchar(100) NOT NULL,
  `xeploai` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dgtheonam`
--

INSERT INTO `dgtheonam` (`id`, `iddv`, `tendoanvien`, `idchidoan`, `xeploai`) VALUES
('1', 'DV1', 'Giàng Xuân Cường', 'CD1', 'Giỏi'),
('2', 'DV2', 'Nguyễn Trọng Mạnh', 'CD1', 'Giỏi'),
('3', 'DV3', 'Nguyễn Quý Duy', 'CD1', 'Giỏi'),
('4', 'DV4', 'Nguyễn Văn An', 'CD1', 'khá'),
('5', 'DV5', 'Trần Thị Trâm', 'CD1', 'Giỏi'),
('6', 'DV6', 'Lê Minh Cường', 'CD1', 'Giỏi'),
('7', 'DV7', 'Phạm Thị Dung', 'CD1', 'khá'),
('8', 'DV8', 'Hoàng Đức', 'CD1', 'Giỏi');

-- --------------------------------------------------------

--
-- Table structure for table `dsdoanvien`
--

CREATE TABLE `dsdoanvien` (
  `iddv` varchar(100) NOT NULL,
  `tendoanvien` varchar(200) NOT NULL,
  `namsinh` date NOT NULL,
  `gioitinh` varchar(5) NOT NULL,
  `sdt` varchar(11) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `idchidoan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dsdoanvien`
--

INSERT INTO `dsdoanvien` (`iddv`, `tendoanvien`, `namsinh`, `gioitinh`, `sdt`, `diachi`, `idchidoan`) VALUES
('DV1', 'Giàng Xuân Cường', '2024-01-11', 'Nam', '0325554445', 'Tuyên Quang', 'CD1'),
('DV10', 'Lý Thị Hà', '2024-01-12', 'Nữ', '0355474445', 'Sơn La', 'CD1'),
('DV11', 'Vũ Văn Hải', '2024-01-04', 'Nam', '0225554448', 'Điện Biên', 'CD2'),
('DV12', 'Trịnh Đức Mạnh', '2024-01-11', 'Nam', '0335554445', 'Thái Bình', 'CD2'),
('DV13', 'Nguyễn Thị Phương', '2004-12-02', 'Nữ', '0359887774', 'Hà Nội', 'CD2'),
('DV14', 'Bùi Thị Nga', '2024-01-13', 'Nữ', '0359888777', 'Tây Ninh', 'CD2'),
('DV15', 'Võ Minh Quân', '2024-01-09', 'Nam', '0322547884', 'Lai Châu', 'CD3'),
('DV16', 'Lê Thị Sáng', '2024-01-06', 'Nữ', '0355554448', 'Hà Nam', 'CD2'),
('DV2', 'Nguyễn Trọng Mạnh', '2023-12-01', 'Nam', '0225554445', 'Hà Nội', 'CD1'),
('DV3', 'Nguyễn Quý Duy', '2022-12-02', 'Nam', '0114445554', 'Hà Đông', 'CD1'),
('DV4', 'Nguyễn Văn An', '2000-12-02', 'Nam', '022225552', 'Sơn La', 'CD1'),
('DV5', 'Trần Thị Trâm', '2024-01-09', 'Nữ', '0225554445', 'Tuyên Quang ', 'CD1'),
('DV6', 'Lê Minh Cường', '2024-01-12', 'Nam', '0225554447', 'Thanh Hóa', 'CD1'),
('DV7', 'Phạm Thị Dung', '2024-01-13', 'Nữ', '0225447774', 'Thanh Hóa', 'CD1'),
('DV8', 'Hoàng Đức', '2024-01-03', 'Nam', '0225447445', 'Ninh Bình', 'CD1'),
('DV9', 'Đặng Minh Gia', '2024-01-03', 'Nam', '0355474445', 'Lai Châu', 'CD1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chidoan`
--
ALTER TABLE `chidoan`
  ADD PRIMARY KEY (`idchidoan`);

--
-- Indexes for table `dangki`
--
ALTER TABLE `dangki`
  ADD PRIMARY KEY (`TAIKHOAN`);

--
-- Indexes for table `dangnhap`
--
ALTER TABLE `dangnhap`
  ADD PRIMARY KEY (`TAIKHOAN`);

--
-- Indexes for table `dgtheohk`
--
ALTER TABLE `dgtheohk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iddv` (`iddv`),
  ADD KEY `dgtheohk_ibfk_2` (`idchidoan`);

--
-- Indexes for table `dgtheonam`
--
ALTER TABLE `dgtheonam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_dgtheohocki_dgtheonam` (`iddv`),
  ADD KEY `FK_dgtheonam_chidoan` (`idchidoan`);

--
-- Indexes for table `dsdoanvien`
--
ALTER TABLE `dsdoanvien`
  ADD PRIMARY KEY (`iddv`),
  ADD KEY `dsdoanvien_ibfk_1` (`idchidoan`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dangnhap`
--
ALTER TABLE `dangnhap`
  ADD CONSTRAINT `dangnhap_ibfk_1` FOREIGN KEY (`TAIKHOAN`) REFERENCES `dangki` (`TAIKHOAN`);

--
-- Constraints for table `dgtheohk`
--
ALTER TABLE `dgtheohk`
  ADD CONSTRAINT `dgtheohk_ibfk_1` FOREIGN KEY (`iddv`) REFERENCES `dsdoanvien` (`iddv`),
  ADD CONSTRAINT `dgtheohk_ibfk_2` FOREIGN KEY (`idchidoan`) REFERENCES `chidoan` (`idchidoan`);

--
-- Constraints for table `dgtheonam`
--
ALTER TABLE `dgtheonam`
  ADD CONSTRAINT `FK_dgtheohocki_dgtheonam` FOREIGN KEY (`iddv`) REFERENCES `dsdoanvien` (`iddv`),
  ADD CONSTRAINT `FK_dgtheonam_chidoan` FOREIGN KEY (`idchidoan`) REFERENCES `chidoan` (`idchidoan`),
  ADD CONSTRAINT `dgtheonam_ibfk_1` FOREIGN KEY (`id`) REFERENCES `dgtheohk` (`id`);

--
-- Constraints for table `dsdoanvien`
--
ALTER TABLE `dsdoanvien`
  ADD CONSTRAINT `dsdoanvien_ibfk_1` FOREIGN KEY (`idchidoan`) REFERENCES `chidoan` (`idchidoan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
