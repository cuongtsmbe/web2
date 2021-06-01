-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2021 at 09:26 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `text_balo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(191) NOT NULL,
  `name` varchar(191) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(11) NOT NULL,
  `gmail` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `blocked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `name`, `phone`, `gmail`, `password`, `create_at`, `update_at`, `blocked`) VALUES
('admin', 'Phan Hữu Cường', '01649612646', 'phanhuucuong05012001@gmail.com', 'admin', '2021-03-22 22:44:13', '2021-04-06 07:31:06', 0),
('admin1', 'phan cường phan', '0145236789', 'hoangbatruong@gmail.com', 'admin1', '2021-04-06 04:00:27', '2021-04-06 06:46:47', 0),
('admin2', 'phan huu cuong', '0123456879', 'anc@gmail.com', 'admin2', '2021-05-07 16:10:03', '2021-05-07 16:10:03', 0),
('admin3', 'vuvu', '321', '321', 'admin3', '2021-04-07 04:43:12', '2021-04-18 18:06:38', 0),
('tuanle', 'lê quang tuấn ', '1', '123@gmail.com', '123tuan', '2021-03-22 23:09:01', '2021-04-06 04:15:40', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_privilege`
--

CREATE TABLE `admin_privilege` (
  `id` int(11) NOT NULL,
  `username_admin` varchar(191) NOT NULL,
  `privilege_id` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_privilege`
--

INSERT INTO `admin_privilege` (`id`, `username_admin`, `privilege_id`, `create_at`, `update_at`) VALUES
(252, 'admin', 1, '2021-04-06 05:12:27', '2021-04-06 05:12:27'),
(253, 'admin', 2, '2021-04-06 05:12:27', '2021-04-06 05:12:27'),
(256, 'admin', 5, '2021-04-06 05:12:27', '2021-04-06 05:12:27'),
(257, 'admin', 6, '2021-04-06 05:12:27', '2021-04-06 05:12:27'),
(258, 'admin', 7, '2021-04-06 05:12:27', '2021-04-06 05:12:27'),
(259, 'admin', 8, '2021-04-06 05:12:27', '2021-04-06 05:12:27'),
(260, 'admin', 9, '2021-04-06 05:12:27', '2021-04-06 05:12:27'),
(261, 'admin', 10, '2021-04-06 05:12:27', '2021-04-06 05:12:27'),
(262, 'admin', 11, '2021-04-06 05:12:27', '2021-04-06 05:12:27'),
(263, 'admin', 12, '2021-04-06 05:12:27', '2021-04-06 05:12:27'),
(264, 'admin', 13, '2021-04-06 05:12:27', '2021-04-06 05:12:27'),
(265, 'admin', 14, '2021-04-06 05:12:27', '2021-04-06 05:12:27'),
(406, 'tuanle', 2, '2021-04-19 16:20:14', '2021-04-19 16:20:14'),
(407, 'tuanle', 5, '2021-04-19 16:20:14', '2021-04-19 16:20:14'),
(408, 'tuanle', 7, '2021-04-19 16:20:14', '2021-04-19 16:20:14'),
(409, 'tuanle', 8, '2021-04-19 16:20:14', '2021-04-19 16:20:14'),
(410, 'tuanle', 14, '2021-04-19 16:20:14', '2021-04-19 16:20:14'),
(414, 'admin1', 5, '2021-05-07 07:26:41', '2021-05-07 07:26:41'),
(415, 'admin1', 8, '2021-05-07 07:26:41', '2021-05-07 07:26:41'),
(417, 'admin', 15, '2021-05-08 05:34:56', '2021-05-08 05:34:56'),
(432, 'admin', 16, '2021-05-11 02:34:39', '2021-05-11 02:34:39'),
(453, 'admin3', 1, '2021-05-16 07:14:16', '2021-05-16 07:14:16'),
(454, 'admin3', 2, '2021-05-16 07:14:16', '2021-05-16 07:14:16'),
(456, 'admin2', 1, '2021-05-16 09:20:22', '2021-05-16 09:20:22'),
(457, 'admin2', 15, '2021-05-16 09:20:22', '2021-05-16 09:20:22'),
(458, 'admin2', 16, '2021-05-16 09:20:22', '2021-05-16 09:20:22'),
(459, 'admin2', 9, '2021-05-16 09:20:22', '2021-05-16 09:20:22'),
(460, 'admin2', 10, '2021-05-16 09:20:22', '2021-05-16 09:20:22'),
(461, 'admin2', 13, '2021-05-16 09:20:22', '2021-05-16 09:20:22');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `binhluan_id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `binhluan` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`binhluan_id`, `user`, `binhluan`, `product_id`, `create_at`) VALUES
(65, 'auprovip', 'uo', 45, '2021-05-11 10:53:47'),
(66, 'auprovip', 'san pham 10', 10, '2021-05-11 10:53:59'),
(67, 'admin', 'mua balo', 10, '2021-05-13 08:15:19'),
(68, 'cuongphan', 'hi', 10, '2021-05-13 08:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `cthd`
--

CREATE TABLE `cthd` (
  `ma_hoadon` varchar(6) NOT NULL,
  `id_product` int(6) NOT NULL,
  `soluong` int(11) NOT NULL,
  `sale` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cthd`
--

INSERT INTO `cthd` (`ma_hoadon`, `id_product`, `soluong`, `sale`) VALUES
('5dh0w6', 13, 4, 0),
('rsskda', 10, 1, 60),
('2ockdw', 13, 1, 15),
('2ockdw', 10, 2, 60),
('lynybv', 10, 1, 60),
('js50wn', 13, 2, 15),
('qcmjm1', 10, 3, 60),
('mrs5sl', 13, 11, 15),
('7i1hv6', 13, 3, 15),
('ybr1mz', 13, 6, 15),
('tuxs00', 47, 2, 10),
('tuxs00', 13, 2, 15),
('rp0wdm', 48, 6, 22),
('rp0wdm', 56, 44, 44),
('tzock4', 53, 4, 56),
('5lia8n', 10, 14, 60),
('vpncuc', 49, 3, 21),
('vpncuc', 47, 3, 10),
('vpncuc', 50, 3, 11),
('285yp2', 13, 1, 15),
('285yp2', 45, 7, 1),
('73qai5', 45, 3, 1),
('0v64sa', 13, 3, 15),
('0v64sa', 10, 3, 60),
('x2jvql', 13, 1, 15),
('hmix2a', 48, 1, 22);

-- --------------------------------------------------------

--
-- Table structure for table `cthd_wait_check`
--

CREATE TABLE `cthd_wait_check` (
  `ma_HD_check` varchar(6) NOT NULL,
  `id_product` int(6) NOT NULL,
  `soluong` int(8) NOT NULL,
  `sale` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cthd_wait_check`
--

INSERT INTO `cthd_wait_check` (`ma_HD_check`, `id_product`, `soluong`, `sale`) VALUES
('2hcr7e', 56, 5, 44),
('2hcr7e', 49, 6, 21),
('2hcr7e', 13, 8, 15),
('2hcr7e', 52, 3, 21),
('2hcr7e', 47, 4, 10),
('cwygyl', 47, 5, 10),
('cwygyl', 49, 3, 21),
('cwygyl', 56, 3, 44);

-- --------------------------------------------------------

--
-- Table structure for table `group_privilege`
--

CREATE TABLE `group_privilege` (
  `id` int(11) NOT NULL,
  `name` varchar(191) CHARACTER SET utf8 NOT NULL,
  `position` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_privilege`
--

INSERT INTO `group_privilege` (`id`, `name`, `position`, `create_at`, `update_at`) VALUES
(1, 'Dang Mục ', 1, '2021-03-22 22:46:28', '2021-03-22 22:46:28'),
(2, 'Sản Phẩm', 2, '2021-03-22 22:46:28', '2021-03-22 22:46:28'),
(3, 'Thành Viên', 3, '2021-03-22 22:47:54', '2021-03-22 22:47:54'),
(4, 'Hóa Đơn', 4, '2021-03-22 22:57:59', '2021-03-22 22:57:59'),
(6, 'danh muc abc', 5, '2021-05-17 07:38:13', '2021-05-17 07:38:13');

-- --------------------------------------------------------

--
-- Table structure for table `hd_wait_check`
--

CREATE TABLE `hd_wait_check` (
  `ma_HD_check` varchar(6) NOT NULL,
  `ma_kh` varchar(191) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Tri_gia` int(11) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hd_wait_check`
--

INSERT INTO `hd_wait_check` (`ma_HD_check`, `ma_kh`, `create_at`, `Tri_gia`, `active`) VALUES
('2hcr7e', 'auprovip ', '2021-05-08 16:36:02', 1020842, 0),
('cwygyl', 'cuongphan ', '2021-05-16 13:42:31', 59778540, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don`
--

CREATE TABLE `hoa_don` (
  `ma_hd` varchar(6) NOT NULL,
  `user_login` varchar(191) NOT NULL,
  `ma_nhanvien` varchar(191) NOT NULL,
  `create_at` timestamp NULL DEFAULT current_timestamp(),
  `tongtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hoa_don`
--

INSERT INTO `hoa_don` (`ma_hd`, `user_login`, `ma_nhanvien`, `create_at`, `tongtien`) VALUES
('0v64sa', 'cuongphan ', 'tuanle', '2021-05-11 11:35:26', 11182500),
('285yp2', 'cuongphan ', 'admin', '2021-05-09 17:17:04', 128352),
('2ockdw', 'cuongphan ', 'admin', '2021-04-05 03:34:08', 7327505),
('5dh0w6', 'cuongphan ', 'admin', '2021-04-04 22:38:07', 3100003),
('5lia8n', 'auprovip ', 'admin', '2021-05-08 08:02:13', 50400000),
('5z679m', 'cuongphan ', 'admin', '2021-03-05 04:35:12', 18),
('73qai5', 'cuongphan ', 'admin', '2021-05-11 11:34:12', 365),
('7i1hv6', 'cuongphan ', 'admin', '2021-04-19 05:19:37', 382500),
('fy6wa6', 'cuongphan ', 'admin', '2021-04-04 22:34:23', 16),
('hmix2a', 'abcabc ', 'admin', '2021-05-17 07:32:18', 85800),
('js50wn', 'cuongphan ', 'admin', '2021-04-05 07:00:28', 255004),
('lynybv', 'cuongphan ', 'admin', '2021-04-05 03:41:40', 3600002),
('mrs5sl', 'cuongphan ', 'admin', '2021-04-06 07:54:22', 1402500),
('qcmjm1', 'cuongphan ', 'admin', '2021-04-06 07:10:55', 10800005),
('rp0wdm', 'auprovip ', 'admin', '2021-03-19 19:14:17', 3082),
('rsskda', 'auprovip ', 'admin', '2021-04-05 03:06:04', 3600000),
('tuxs00', 'auprovip ', 'admin', '2021-04-19 17:48:49', 255079),
('tzock4', 'auprovip ', 'admin', '2021-04-19 23:05:50', 7821),
('vpncuc', 'auprovip ', 'admin', '2021-05-08 15:16:21', 341),
('x2jvql', 'cuongphan ', 'tuanle', '2021-05-14 08:21:08', 127500),
('ybr1mz', 'cuongphan ', 'admin', '2021-04-19 07:40:45', 765000);

-- --------------------------------------------------------

--
-- Table structure for table `image_sp`
--

CREATE TABLE `image_sp` (
  `id` int(11) NOT NULL,
  `id_product` int(10) NOT NULL,
  `name` varchar(191) NOT NULL,
  `link_src` varchar(191) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image_sp`
--

INSERT INTO `image_sp` (`id`, `id_product`, `name`, `link_src`, `create_at`, `update_at`) VALUES
(124, 13, 'Them_image', 'balo-phoi-luoi-dan-anh-kim-bac-0135-mau-xam-khoi-dam-3__57578__1604487344.jpg', '2021-04-18 23:49:02', '2021-04-18 23:49:02'),
(127, 43, 'Them_image', 'balo-phi-hanh-gia-danh-cho-thu-cung-hinh-co-anh-thiet-ke-moi-dep-gia-re-P1703-1574540695197.jpg', '2021-04-18 23:50:43', '2021-04-18 23:50:43'),
(129, 43, 'anh them ', 'balo-may-anh-Lowepro-Slingshot-102-AW-3.jpg', '2021-04-19 05:59:59', '2021-04-19 05:59:59'),
(133, 45, 'anh them ', 'balo-may-anh-Lowepro-Slingshot-102-AW-3.jpg', '2021-04-19 06:07:58', '2021-04-19 06:07:58'),
(135, 47, 'anh them ', '2.jpg', '2021-04-19 07:20:54', '2021-04-19 07:20:54'),
(136, 48, 'anh them ', '3.jpg', '2021-04-19 07:21:16', '2021-04-19 07:21:16'),
(137, 49, 'anh them ', '4.jpg', '2021-04-19 07:21:57', '2021-04-19 07:21:57'),
(138, 50, 'anh them ', '5.jpg', '2021-04-19 07:22:18', '2021-04-19 07:22:18'),
(139, 51, 'anh them ', '6.jpg', '2021-04-19 07:22:47', '2021-04-19 07:22:47'),
(140, 52, 'anh them ', '7.jpg', '2021-04-19 07:23:06', '2021-04-19 07:23:06'),
(141, 53, 'anh them ', '8.jpg', '2021-04-19 07:23:40', '2021-04-19 07:23:40'),
(142, 54, 'anh them ', '9.jpg', '2021-04-19 07:24:09', '2021-04-19 07:24:09'),
(143, 55, 'anh them ', '10.jpg', '2021-04-19 07:24:32', '2021-04-19 07:24:32'),
(144, 56, 'anh them ', '11.jpg', '2021-04-19 07:24:58', '2021-04-19 07:24:58'),
(145, 57, 'anh them ', '12.jpg', '2021-04-19 07:25:28', '2021-04-19 07:25:28'),
(146, 58, 'anh them ', '13.jpg', '2021-04-19 07:25:45', '2021-04-19 07:25:45'),
(147, 59, 'anh them ', '14.jpg', '2021-04-19 07:26:03', '2021-04-19 07:26:03'),
(151, 61, 'Them_image', 'balo-chong-trom.jpg', '2021-05-07 08:14:28', '2021-05-07 08:14:28'),
(152, 60, 'Them_image', 'balo-varsity-aq248006-01.jpg', '2021-05-07 08:14:57', '2021-05-07 08:14:57'),
(158, 10, 'balo10', '1.jpg', '2021-05-08 17:11:56', '2021-05-08 17:11:56'),
(160, 70, 'anh them ', 'balo-jbl-2019(1).jpg', '2021-05-11 02:44:43', '2021-05-11 02:44:43'),
(163, 72, 'anh them ', 'hong.jpg', '2021-05-11 06:38:45', '2021-05-11 06:38:45'),
(164, 73, 'anh them ', 'balo_white.jpg', '2021-05-11 06:39:51', '2021-05-11 06:39:51'),
(165, 74, 'anh them ', 'balod.jpg', '2021-05-11 06:41:43', '2021-05-11 06:41:43'),
(167, 74, 'Them_image', 'balo-jbl-2019(1).jpg', '2021-05-11 07:37:50', '2021-05-11 07:37:50'),
(170, 77, 'anh them ', 'balo-jbl-2019(1).jpg', '2021-05-17 07:40:57', '2021-05-17 07:40:57');

-- --------------------------------------------------------

--
-- Table structure for table `menu_group`
--

CREATE TABLE `menu_group` (
  `Value` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_group`
--

INSERT INTO `menu_group` (`Value`, `name`) VALUES
('menu_item_chatlieu', 'Chất Liệu'),
('menu_item_color', 'Màu Sắc'),
('menu_item_ngan_laptop', 'Ngăn Đựng Laptop'),
('menu_item_nhomsp', 'Nhóm sản phẩm'),
('menu_item_price', 'Giá Tiền'),
('menu_item_thuong_hieu', 'Thương Hiệu');

-- --------------------------------------------------------

--
-- Table structure for table `menu_item_chatlieu`
--

CREATE TABLE `menu_item_chatlieu` (
  `value_name` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_item_chatlieu`
--

INSERT INTO `menu_item_chatlieu` (`value_name`, `name`) VALUES
('da', 'Da'),
('kodura', 'Vải Kodura'),
('nhua', 'Nhựa'),
('spxqa174', 'Vải bông PV'),
('vai', 'Vải'),
('vai_nylon', 'Vải NyLon');

-- --------------------------------------------------------

--
-- Table structure for table `menu_item_color`
--

CREATE TABLE `menu_item_color` (
  `value_name` varchar(191) NOT NULL,
  `name` varchar(191) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_item_color`
--

INSERT INTO `menu_item_color` (`value_name`, `name`) VALUES
('#000000', 'Màu Đen'),
('#0000ff', 'Màu Xanh '),
('#804040', 'Màu Nâu '),
('#cccccc', 'Màu Xám'),
('#df2828', 'Màu Đỏ'),
('#ff80c0', 'Màu Hồng'),
('#ffffff', 'Màu Trắng');

-- --------------------------------------------------------

--
-- Table structure for table `menu_item_ngan_laptop`
--

CREATE TABLE `menu_item_ngan_laptop` (
  `value_name` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_item_ngan_laptop`
--

INSERT INTO `menu_item_ngan_laptop` (`value_name`, `name`) VALUES
('12_inch', 'Ngăn đựng laptop 12 inch'),
('14_inch', 'Ngăn đựng laptop 14 inch'),
('15.4_inch', 'Ngăn đựng laptop 15.4 inch'),
('15.6_inch', 'Ngăn đựng laptop 15.6 inch'),
('15_inch', 'Ngăn đựng laptop 15 inch'),
('16_inch', 'Ngăn đựng laptop 16 inch'),
('17_inch', 'Ngăn đựng laptop 17 inch'),
('9iyruiux', 'Ngăn đựng 13 inch '),
('d9luji99', 'Ngăn đựng laptop 10 inch');

-- --------------------------------------------------------

--
-- Table structure for table `menu_item_nhomsp`
--

CREATE TABLE `menu_item_nhomsp` (
  `value_name` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_item_nhomsp`
--

INSERT INTO `menu_item_nhomsp` (`value_name`, `name`) VALUES
('3hl17bkh', 'balo thợ hàn'),
('83cqdgbp', 'balo nhỏ P'),
('axa2yrf9', 'balo ao'),
('balo_chong_gu', 'Balo Chống Gù'),
('balo_chong_trom', 'Balo Chống Trộm'),
('balo_cho_be', 'Balo Cho Bé'),
('balo_du_lich', 'Balo Du Lịch'),
('Balo_hoc_sinh', 'Balo Học Sinh'),
('balo_the_thao', 'Balo Thể Thao'),
('txa63ffl', 'balo thợ'),
('ul4nws8b', 'balo thợ rèn');

-- --------------------------------------------------------

--
-- Table structure for table `menu_item_price`
--

CREATE TABLE `menu_item_price` (
  `value_name` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_item_price`
--

INSERT INTO `menu_item_price` (`value_name`, `name`) VALUES
('0-500000', 'Dưới 500.000đ'),
('100000-300000', '1 tram den 3 tram'),
('500000-1000000', '500.000vnd đến 1.000.000 vnd'),
('500000-2000000', '500.000đ-2.000.000đ'),
('500000-600000', '500.000vnd đến 600.000vnd'),
('5000000-1', 'Trên 5 triệu');

-- --------------------------------------------------------

--
-- Table structure for table `menu_item_thuong_hieu`
--

CREATE TABLE `menu_item_thuong_hieu` (
  `value_name` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_item_thuong_hieu`
--

INSERT INTO `menu_item_thuong_hieu` (`value_name`, `name`) VALUES
('408dk9v3', 'BY'),
('AGVA', 'AGVA'),
('Beam', 'Beam'),
('bunny_land', 'Bunny Land'),
('Korin', 'Korin'),
('Tomtoc', 'Tomtoc'),
('XD_Design', 'XD Design');

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

CREATE TABLE `privilege` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `group_privilege_id` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `privilege`
--

INSERT INTO `privilege` (`id`, `name`, `group_privilege_id`, `create_at`, `update_at`) VALUES
(1, 'Xem User', 1, '2021-03-22 22:48:46', '2021-03-22 22:48:46'),
(2, 'Check hóa đơn', 1, '2021-03-22 22:48:46', '2021-03-22 22:48:46'),
(5, 'Thêm sản phẩm', 2, '2021-03-22 22:54:18', '2021-03-22 22:54:18'),
(6, 'Sửa sản phẩm', 2, '2021-03-22 22:54:18', '2021-03-22 22:54:18'),
(7, 'Xóa sản phẩm', 2, '2021-03-22 22:55:46', '2021-03-22 22:55:46'),
(8, 'Xem sản phẩm', 2, '2021-03-22 22:56:35', '2021-03-22 22:56:35'),
(9, 'Xem Thành Viên Admin', 3, '2021-03-22 23:01:37', '2021-03-22 23:01:37'),
(10, 'Sửa Thành Viên ', 3, '2021-03-22 23:03:46', '2021-03-22 23:03:46'),
(11, 'Thêm thành viên admin', 3, '2021-03-22 23:03:46', '2021-03-22 23:03:46'),
(12, 'Xóa thành viên', 3, '2021-03-22 23:04:29', '2021-03-22 23:04:29'),
(13, 'Phân Quyền Admin', 3, '2021-03-22 23:05:23', '2021-03-22 23:05:23'),
(14, 'Xem hóa đơn', 4, '2021-03-22 23:06:07', '2021-03-22 23:06:07'),
(15, 'Nhà cung cấp', 2, '2021-05-08 05:29:26', '2021-05-08 05:29:26'),
(16, 'quản lý menu sản phẩm', 2, '2021-05-11 02:31:26', '2021-05-11 02:31:26'),
(17, 'kk', 6, '2021-05-17 07:38:42', '2021-05-17 07:38:42');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(6) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `namesp` varchar(191) NOT NULL,
  `type_product` varchar(191) NOT NULL,
  `Chat_lieu` varchar(191) NOT NULL,
  `Thuong_hieu` varchar(191) NOT NULL,
  `Ngan_dung_laptop` varchar(191) CHARACTER SET utf8 NOT NULL,
  `Color` varchar(191) NOT NULL,
  `linksp` varchar(191) NOT NULL,
  `price` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `buy` int(8) NOT NULL,
  `view` int(10) NOT NULL,
  `sale` int(8) NOT NULL,
  `content` longtext NOT NULL,
  `NSX` date NOT NULL,
  `HSD` date NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `supplier_id`, `namesp`, `type_product`, `Chat_lieu`, `Thuong_hieu`, `Ngan_dung_laptop`, `Color`, `linksp`, `price`, `so_luong`, `buy`, `view`, `sale`, `content`, `NSX`, `HSD`, `create_at`, `update_at`) VALUES
(4, 2, 'thethao,nhua,beam,12_inch,#804040,12500đ', 'balo_the_thao', 'nhua', 'Beam', '12_inch', '#804040', 'http_>>', 12500, 120, 0, 0, 0, 'thuc pham khong chat bao quan', '2021-03-08', '2021-03-03', '2021-03-23 04:45:30', '2021-03-23 04:45:30'),
(5, 1, 'dulich,da,AGVA,15.6,#804040,500000', 'balo_du_lich', 'da', 'AGVA', '15.6_inch', '#804040', 'http:///', 5000000, 150, 0, 0, 0, 'Túi xanh , đỏ size 5', '2021-03-13', '2021-03-02', '2021-03-23 04:46:57', '2021-03-23 04:46:57'),
(10, 3, 'balo Ol a', 'balo_the_thao', 'nhua', 'Tomtoc', '17_inch', '#ff80c0', 'http/:ks', 9000000, 96, 5, 35, 60, 'abcvgs', '2021-03-04', '2021-03-20', '2021-03-23 04:53:41', '2021-05-13 08:23:09'),
(13, 2, 'ballo K', 'balo_chong_trom', 'vai_nylon', 'Korin', '15_inch', '#ff80c0', 'https://media.balohanghieu.com/uploads/clever-hippo-compact-sieu-xe-dung-manh-bm1110-m-red.jpg', 150000, 5, 23, 28, 15, 'khog co binh luo', '2021-03-02', '2021-03-03', '2021-03-25 04:40:52', '2021-05-13 08:22:45'),
(43, 1, 'Bo akana', 'balo_chong_gu', 'vai', 'AGVA', '12_inch', '#000000', '', 1600000, 123, 4, 20, 12, '', '0000-00-00', '0000-00-00', '2021-04-18 23:50:30', '2021-05-13 08:22:27'),
(45, 1, 'Re Oka', 'balo_chong_gu', 'da', 'AGVA', '12_inch', '#000000', '', 5800000, 12, 17, 16, 1, '', '0000-00-00', '0000-00-00', '2021-04-19 06:07:58', '2021-05-13 08:22:10'),
(47, 1, 'anoka', 'balo_chong_gu', 'da', 'AGVA', '12_inch', '#000000', '', 9604200, 12, 14, 17, 10, '123', '0000-00-00', '0000-00-00', '2021-04-19 07:20:54', '2021-05-13 08:21:17'),
(48, 1, 'ornu', 'balo_du_lich', 'da', 'AGVA', '12_inch', '#000000', '', 110000, 25, 7, 10, 22, '12512', '0000-00-00', '0000-00-00', '2021-04-19 07:21:16', '2021-05-13 08:20:56'),
(49, 1, 'balo nam', 'balo_chong_gu', 'da', 'AGVA', '12_inch', '#000000', '', 6900000, 32, 12, 9, 21, 'balo thời trang', '0000-00-00', '0000-00-00', '2021-04-19 07:21:57', '2021-05-13 08:20:35'),
(50, 1, 'balo sach 123', 'balo_chong_gu', 'da', 'AGVA', '12_inch', '#000000', '', 4480000, 56, 6, 2, 11, '2133', '0000-00-00', '0000-00-00', '2021-04-19 07:22:18', '2021-05-13 08:20:21'),
(51, 1, 'balo cao cấp', 'balo_chong_gu', 'da', 'AGVA', '12_inch', '#000000', '', 510000, 61, 0, 0, 43, 'balo nam', '0000-00-00', '0000-00-00', '2021-04-19 07:22:47', '2021-05-13 08:19:01'),
(52, 1, 'baba', 'balo_chong_gu', 'da', 'AGVA', '12_inch', '#000000', '', 55000, 41, 3, 1, 21, '3124', '0000-00-00', '0000-00-00', '2021-04-19 07:23:06', '2021-05-13 08:20:06'),
(53, 1, 'unico', 'balo_the_thao', 'da', 'AGVA', '12_inch', '#000000', '', 4444000, 55, 4, 1, 56, '4124', '0000-00-00', '0000-00-00', '2021-04-19 07:23:40', '2021-05-13 08:19:54'),
(54, 1, 'sanohan ', 'balo_chong_gu', 'da', 'AGVA', '12_inch', '#000000', '', 1320000, 35, 0, 0, 31, '12321', '0000-00-00', '0000-00-00', '2021-04-19 07:24:09', '2021-05-13 08:19:36'),
(55, 1, 'balo L2', 'balo_chong_gu', 'da', 'AGVA', '12_inch', '#000000', '', 55, 49, 0, 0, 41, '123213', '0000-00-00', '0000-00-00', '2021-04-19 07:24:32', '2021-05-08 17:02:46'),
(56, 1, 'balo nữ', 'balo_chong_gu', 'da', 'AGVA', '12_inch', '#000000', '', 123000, 126, 52, 5, 44, 'quá đẹp', '0000-00-00', '0000-00-00', '2021-04-19 07:24:58', '2021-05-13 08:18:46'),
(57, 1, 'baloooo', 'balo_chong_gu', 'da', 'AGVA', '12_inch', '#000000', '', 150000, 41, 0, 1, 3, '123', '0000-00-00', '0000-00-00', '2021-04-19 07:25:28', '2021-05-07 07:35:38'),
(58, 1, 'balo M5', 'balo_chong_gu', 'da', 'AGVA', '12_inch', '#000000', '', 123000, 26, 0, 0, 14, '', '0000-00-00', '0000-00-00', '2021-04-19 07:25:45', '2021-05-13 08:18:34'),
(59, 1, 'babap', 'balo_chong_gu', 'da', 'AGVA', '12_inch', '#000000', '', 333000, 21, 0, 0, 13, '123', '0000-00-00', '0000-00-00', '2021-04-19 07:26:03', '2021-05-13 08:16:45'),
(60, 2, 'balo đi chơi', 'balo_du_lich', 'da', 'AGVA', '15.6_inch', '#000000', '', 152000, 10, 0, 2, 2, '', '0000-00-00', '0000-00-00', '2021-05-07 08:09:23', '2021-05-11 04:21:29'),
(61, 1, 'balo đi bộ 25', 'balo_the_thao', 'da', 'AGVA', '12_inch', '#000000', '', 156000, 12, 0, 1, 6, '', '0000-00-00', '0000-00-00', '2021-05-07 08:12:53', '2021-05-08 17:02:04'),
(70, 1, 'balo LP', 'balo_the_thao', 'nhua', 'bunny_land', '12_inch', '#000000', '', 250000, 19, 0, 0, 15, '', '0000-00-00', '0000-00-00', '2021-05-11 02:44:43', '2021-05-11 02:44:43'),
(72, 1, 'balo hồng', 'balo_cho_be', 'spxqa174', '408dk9v3', 'd9luji99', '#000000', '', 170000, 26, 0, 24, 5, 'balo hồng ', '0000-00-00', '0000-00-00', '2021-05-11 06:38:45', '2021-05-11 06:38:45'),
(73, 1, 'Balo T white', 'balo_du_lich', 'da', '408dk9v3', '9iyruiux', '#ffffff', '', 200000, 2, 0, 1, 10, '', '0000-00-00', '0000-00-00', '2021-05-11 06:39:51', '2021-05-11 06:39:51'),
(74, 1, 'balo du lich ', '3hl17bkh', 'kodura', 'AGVA', '17_inch', '#0000ff', '', 560000, 1, 0, 13, 6, '', '0000-00-00', '0000-00-00', '2021-05-11 06:41:43', '2021-05-11 08:07:59'),
(77, 1, 'abc', '3hl17bkh', 'da', '408dk9v3', '12_inch', '#000000', '', 150000, 3, 0, 0, 10, 'abc', '0000-00-00', '0000-00-00', '2021-05-17 07:40:57', '2021-05-17 07:40:57');

-- --------------------------------------------------------

--
-- Table structure for table `supplieres`
--

CREATE TABLE `supplieres` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `mail` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplieres`
--

INSERT INTO `supplieres` (`id`, `name`, `phone`, `mail`, `address`, `create_at`, `update_at`) VALUES
(1, 'ABC company', '0349612648', 'ACB@gmail.com', 'quan9,hcm', '2021-03-22 23:33:36', '2021-03-22 23:33:36'),
(2, 'company Thực Phẩm', '0345872619', 'THucPham@gmail.com', 'quan2,hcm', '2021-03-22 23:34:33', '2021-03-22 23:34:33'),
(3, 'công ty balo HH-group', '0125478962', 'HH_group_gmail.com', 'quận 9,hcm', '2021-03-23 04:49:40', '2021-03-23 04:49:40'),
(10, 'company thời trang ', '034589612', 'bgc@gmail.com', 'hcm', '2021-05-11 07:06:15', '2021-05-11 07:06:15'),
(13, 'company BP', '0254136789', 'hcuong@gmail.com', 'hcm ', '2021-05-11 07:17:16', '2021-05-11 07:17:16');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_login` varchar(191) NOT NULL,
  `name` varchar(191) CHARACTER SET utf8 NOT NULL,
  `password` varchar(191) NOT NULL,
  `sdt` varchar(11) NOT NULL,
  `gmail` varchar(191) NOT NULL,
  `avatar_img` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_login`, `name`, `password`, `sdt`, `gmail`, `avatar_img`, `address`) VALUES
('admin', 'abc ', 'admin', '035648296', 'abc@gmail.com', '', 'hcm'),
('adminaa', 'cuongpja ', 'admin', '0123456789', 'admin@gmail.com', '', 'asd'),
('auprovip', 'Bùi Tấn Âu ', '12345', '01452367896', 'airua0987@gmail.com', 'https://90scoffee.vn/wp-content/uploads/2019/07/gai-xinh-giam-can-dep.jpg', 'quang ngai,da nanga'),
('cuongphan', 'phan hữu cường', '123456', '0123456789', 'phanhuucuong05012001@gmail.com', 'https://anhdep3d.com/wp-content/uploads/2019/05/anh-dep-3d-kiem-hiep-12.jpg', 'hai thuong hai lang qiang tri');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `admin_privilege`
--
ALTER TABLE `admin_privilege`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`username_admin`),
  ADD KEY `privilege_id` (`privilege_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`binhluan_id`);

--
-- Indexes for table `cthd`
--
ALTER TABLE `cthd`
  ADD KEY `ma_hoadon` (`ma_hoadon`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `cthd_wait_check`
--
ALTER TABLE `cthd_wait_check`
  ADD KEY `ma_HD_check` (`ma_HD_check`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `group_privilege`
--
ALTER TABLE `group_privilege`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hd_wait_check`
--
ALTER TABLE `hd_wait_check`
  ADD PRIMARY KEY (`ma_HD_check`),
  ADD KEY `ma_kh` (`ma_kh`);

--
-- Indexes for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`ma_hd`),
  ADD KEY `user_login` (`user_login`),
  ADD KEY `ma_nhanvien` (`ma_nhanvien`);

--
-- Indexes for table `image_sp`
--
ALTER TABLE `image_sp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `menu_group`
--
ALTER TABLE `menu_group`
  ADD PRIMARY KEY (`Value`);

--
-- Indexes for table `menu_item_chatlieu`
--
ALTER TABLE `menu_item_chatlieu`
  ADD PRIMARY KEY (`value_name`);

--
-- Indexes for table `menu_item_color`
--
ALTER TABLE `menu_item_color`
  ADD PRIMARY KEY (`value_name`);

--
-- Indexes for table `menu_item_ngan_laptop`
--
ALTER TABLE `menu_item_ngan_laptop`
  ADD PRIMARY KEY (`value_name`);

--
-- Indexes for table `menu_item_nhomsp`
--
ALTER TABLE `menu_item_nhomsp`
  ADD PRIMARY KEY (`value_name`);

--
-- Indexes for table `menu_item_price`
--
ALTER TABLE `menu_item_price`
  ADD PRIMARY KEY (`value_name`);

--
-- Indexes for table `menu_item_thuong_hieu`
--
ALTER TABLE `menu_item_thuong_hieu`
  ADD PRIMARY KEY (`value_name`);

--
-- Indexes for table `privilege`
--
ALTER TABLE `privilege`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_privilege_id` (`group_privilege_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`supplier_id`),
  ADD KEY `name_type_sp` (`type_product`),
  ADD KEY `Chat_lieu` (`Chat_lieu`),
  ADD KEY `Thuong_hieu` (`Thuong_hieu`),
  ADD KEY `Ngan_dung_laptop` (`Ngan_dung_laptop`),
  ADD KEY `Color` (`Color`);

--
-- Indexes for table `supplieres`
--
ALTER TABLE `supplieres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_privilege`
--
ALTER TABLE `admin_privilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=464;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `binhluan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `group_privilege`
--
ALTER TABLE `group_privilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `image_sp`
--
ALTER TABLE `image_sp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `privilege`
--
ALTER TABLE `privilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `supplieres`
--
ALTER TABLE `supplieres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_privilege`
--
ALTER TABLE `admin_privilege`
  ADD CONSTRAINT `admin_privilege_ibfk_2` FOREIGN KEY (`privilege_id`) REFERENCES `privilege` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_privilege_ibfk_3` FOREIGN KEY (`username_admin`) REFERENCES `admin` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cthd`
--
ALTER TABLE `cthd`
  ADD CONSTRAINT `cthd_ibfk_2` FOREIGN KEY (`ma_hoadon`) REFERENCES `hoa_don` (`ma_hd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cthd_wait_check`
--
ALTER TABLE `cthd_wait_check`
  ADD CONSTRAINT `cthd_wait_check_ibfk_1` FOREIGN KEY (`ma_HD_check`) REFERENCES `hd_wait_check` (`ma_HD_check`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hd_wait_check`
--
ALTER TABLE `hd_wait_check`
  ADD CONSTRAINT `hd_wait_check_ibfk_1` FOREIGN KEY (`ma_kh`) REFERENCES `user` (`user_login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `image_sp`
--
ALTER TABLE `image_sp`
  ADD CONSTRAINT `image_sp_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `privilege`
--
ALTER TABLE `privilege`
  ADD CONSTRAINT `privilege_ibfk_1` FOREIGN KEY (`group_privilege_id`) REFERENCES `group_privilege` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplieres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`type_product`) REFERENCES `menu_item_nhomsp` (`value_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_4` FOREIGN KEY (`Chat_lieu`) REFERENCES `menu_item_chatlieu` (`value_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_5` FOREIGN KEY (`Thuong_hieu`) REFERENCES `menu_item_thuong_hieu` (`value_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_6` FOREIGN KEY (`Ngan_dung_laptop`) REFERENCES `menu_item_ngan_laptop` (`value_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_7` FOREIGN KEY (`Color`) REFERENCES `menu_item_color` (`value_name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
