-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 20, 2021 lúc 10:52 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quan_ly_shop_sua`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `User` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PassWord` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`User`, `PassWord`) VALUES
('admin', '12345');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `MaKH` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MaID` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `TenSp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CheckTT` int(1) NOT NULL,
  `Soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`MaKH`, `MaID`, `TenSp`, `CheckTT`, `Soluong`) VALUES
('user1', '00002', 'sữa vinamilk', 0, 1),
('user3', '00002', 'sữa vinamilk', 0, 1),
('user2', '00008', 'sữa vinamilk', 0, 1),
('ngoquocviet', '00002', 'sữa vinamilk', 0, 1),
('user1', '00004', 'okla', 0, 1),
('user1', '00004', 'okla', 0, 2),
('hoailien', '00001', 'Sữa milo bột', 0, 1),
('hoailien', '00009', 'Sữa milo bột', 0, 1),
('hoailien', '00009', 'Sữa milo bột', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `TenKH` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Gioitinh` int(1) NOT NULL,
  `Diachi` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `User` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PassWord` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`TenKH`, `Gioitinh`, `Diachi`, `SDT`, `Email`, `User`, `PassWord`) VALUES
('Hoài Liên', 0, 'Nghệ An', '0584929026', 'hoailien221000@gmail.com', 'hoailien', '22102000'),
('khương', 1, 'Quảng Nam', '3234234', 'khuong@gmail.cm', 'khuong', '123456'),
('Ngô Quốc Việt', 0, '10 Lê Văn Hiến-Khuê Mỹ-Ngũ Hành Sơn-Đà Nẵng', '019383', 'dfdf@gamail.com', 'ngoquocviet', '123456'),
('việt', 0, 'Nghệ An', '0974974116', 'viet@gmail.com', 'user1', '12345'),
('Nguyễn Chính Nghĩa', 1, 'Quảng Nam', 'd4345234234', 'sdfasdfsd', 'user2', '12345'),
('Trần Thị C', 0, 'Nghệ An', '0988674574', 'dfdf@gamail.com', 'user3', '12345');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `MaNCC` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenNCC` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SDT` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`MaNCC`, `TenNCC`, `DiaChi`, `Email`, `SDT`) VALUES
('00001', 'Công ty sữa Vinamilk Đà Nẵng', '02 Doãn Uẩn-Khuê Mỹ-Ngũ Hành Sơn-Đà Nẵng', 'congtyA@gmail.com', '0334446789'),
('00002', 'Khu công nghiệp sữa tươi TP.HCM', '123 Nguyễn Du-Quận 1 - TP.HCM', 'suatuoi@gamil.com', '08794561'),
('00003', 'Công ty sữa Nutifood Sóng Thần Bình Dương', 'Khu công nghiệp Sóng Thân Bình Dương', 'nutifood@ntf.com', '07895632'),
('00004', 'Công ty nhập khẩu Việt Nam', '12 Lê Duẩn-Quận 2-Đà Nẵng', 'abbott@ab.com', '07841258'),
('00005', 'Công ty Daisy', 'Khu công nghiệp Sóng Thần Bình Dương', 'daisy@ds.com', '0567890'),
('00006', 'Nhà cung cấp sữa Dutch Lady', 'Khu công nghiệp Biên Hòa-Đồng Nai', 'dutchlady@dl.com', '07823456'),
('00007', 'Khu công nghiệp Dumex ', 'Khu công nghiệp Sóng Thần Bình Dương', 'dumex@dm.com', '062238943'),
('00008', 'Công ty TNHH Sữa tươi Đà Nẵng', '10 Lê Văn Hiến-Khuê Mỹ-Ngũ Hành Sơn-Đà Nẵng', 'congtysuatuoidn@gamil.com', '456545444');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaMH` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaNCC` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenHang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LoaiHang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaMH`, `MaNCC`, `TenHang`, `LoaiHang`) VALUES
('AB', '00004', 'Abbott', 'Hãng sữa'),
('DL', '00006', 'Dutch Lady', 'Hãng sữa'),
('DM', '00006', 'Dumex', 'Hãng sữa'),
('DS', '00005', 'Daisy', 'Hãng sữa'),
('ML', '00008', 'Milo', 'Hãng sữa'),
('NTF', '00003', 'Nutifood', 'Hãng sữa'),
('TH', '00002', 'TH true milk', 'Hãng sữa'),
('VNM', '00001', 'Vinamilk', 'Hãng sữa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhtoan`
--

CREATE TABLE `thanhtoan` (
  `MaKH` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `MaID` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `TenKH` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TenSP` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `NgayMua` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ttsanpham`
--

CREATE TABLE `ttsanpham` (
  `MaID` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaMH` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenSanPham` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenHang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Loai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TrongLuong` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Dongia` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgaySX` date NOT NULL,
  `HanSD` date NOT NULL,
  `TPDinhDuong` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Loiich` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ttsanpham`
--

INSERT INTO `ttsanpham` (`MaID`, `MaMH`, `TenSanPham`, `TenHang`, `Loai`, `TrongLuong`, `Dongia`, `NgaySX`, `HanSD`, `TPDinhDuong`, `Loiich`, `image`) VALUES
('00001', 'AB', '', 'Abbott', 'Bột', '100gram', '100.000VND', '2021-11-09', '2022-02-09', 'rất nhiều thành phần dinh dưỡng nhé', 'Cao, to, khỏe', 'mlb_01.jpg'),
('00002', 'VNM', 'sữa vinamilk', 'Vinamilk', 'Bột', '100gram', '5.000 VND', '2021-11-09', '2021-12-17', 'rất nhiều thành phần dinh dưỡng nhé', 'Cao, to, khỏe', 'vnm01.jpg'),
('00004', 'AB', 'okla', 'Abbott', 'Bột', '100gram', '100.000VND', '2021-11-04', '2021-11-03', 'rất nhiều thành phần dinh dưỡng nhé', 'Cao, to, khỏe', 'vnm01.jpg'),
('00005', 'AB', 'kiki', 'Abbott', 'Bột', '100gram', '100.000VND', '2021-11-03', '2021-11-12', 'rất nhiều thành phần dinh dưỡng nhé', 'Cao, to, khỏe', 'vnm04.jpg'),
('00006', 'DL', 'okla', 'Dutch Lady', 'Bột', '100gram', '100.000VND', '2021-11-04', '2021-11-27', 'rất nhiều thành phần dinh dưỡng nhé', 'Cao, to, khỏe', 'vnm04.jpg'),
('00007', 'DL', 'Sữa milo bột', 'Abbott', 'Bột', '100gram', '100.000VND', '2021-11-04', '2021-11-19', 'rất nhiều thành phần dinh dưỡng nhé', 'Cao, to, khỏe', 'vnm02.jpg'),
('00008', 'AB', '', 'Abbott', 'Bột', '100gram', '100.000VND', '2021-10-10', '0000-00-00', 'rất nhiều thành phần dinh dưỡng nhé', 'Cao, to, khỏe', 'vnm04.jpg'),
('00009', 'AB', 'Sữa milo tiết trùng', 'Abbott', 'nước', '100gram', '100.000VND', '2021-11-19', '2021-12-05', 'rất nhiều thành phần dinh dưỡng nhé', 'Cao, to, khỏe', 'vnm03.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`User`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD KEY `lk_giohang_kh` (`MaKH`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`User`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`MaNCC`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaMH`),
  ADD KEY `lk_sp_ncc` (`MaNCC`);

--
-- Chỉ mục cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD PRIMARY KEY (`MaKH`,`MaID`);

--
-- Chỉ mục cho bảng `ttsanpham`
--
ALTER TABLE `ttsanpham`
  ADD PRIMARY KEY (`MaID`),
  ADD KEY `lk_ttsp_sp` (`MaMH`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `lk_giohang_kh` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`User`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `lk_sp_ncc` FOREIGN KEY (`MaNCC`) REFERENCES `nhacungcap` (`MaNCC`);

--
-- Các ràng buộc cho bảng `ttsanpham`
--
ALTER TABLE `ttsanpham`
  ADD CONSTRAINT `lk_ttsp_sp` FOREIGN KEY (`MaMH`) REFERENCES `sanpham` (`MaMH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
