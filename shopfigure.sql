-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2025 at 01:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopfigure`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `fullname`, `date`) VALUES
(24, 'thao@yahoo.com', '2015-03-06 02:09:24'),
(25, 'thao@yahoo.com', '2015-03-06 04:39:25'),
(26, 'thao@yahoo.com', '2015-03-08 12:18:20'),
(27, 'long@yahoo.com', '2015-03-09 11:35:06'),
(28, 'long@yahoo.com', '2015-03-10 07:53:04'),
(29, 'long@yahoo.com', '2015-03-10 08:02:22'),
(30, 'long@yahoo.com', '2015-03-10 08:37:39'),
(31, 'dai', '2025-03-14 02:36:24'),
(32, 'dai', '2025-03-14 02:49:23'),
(33, 'dai', '2025-03-14 02:53:48'),
(34, 'dai', '2025-03-14 03:01:53'),
(36, 'dai', '2025-03-14 07:46:05'),
(37, 'dai', '2025-03-14 07:51:09'),
(38, 'dai', '2025-03-14 08:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

CREATE TABLE `cart_detail` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `cart_detail`
--

INSERT INTO `cart_detail` (`id`, `cart_id`, `product_id`, `quantity`, `price`) VALUES
(49, 34, 40, 1, 600),
(53, 36, 40, 1, 600),
(54, 37, 40, 1, 600),
(55, 38, 40, 1, 600),
(56, 38, 41, 1, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `id_sanpham`, `name`, `comment`, `date`) VALUES
(38, 40, 'Trương tất thành', 'Figure quá đẹp mà không có tiền mua', '2025-03-14 09:26:58'),
(39, 40, 'Trương Nam Thành', 'Sản phẩm tuyệt vời', '2025-03-14 09:27:13'),
(43, 42, 'Hiếu', 'Nhất định sẽ mua về', '2025-03-14 09:27:27'),
(45, 44, 'Bội kỳ', 'Sản phẫm bán ở đâu vậy bạn?', '2015-03-11 13:06:20'),
(46, 44, 'lương gà', 'Figure này quá đẹp', '2025-03-14 09:27:45'),
(48, 41, '123', '123', '2025-03-14 02:34:53'),
(50, 40, '123', '123', '2025-03-14 02:41:33'),
(51, 40, 'dai', 'ada', '2025-03-15 12:40:36');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` text NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` varchar(100) NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(100) NOT NULL,
  `customer_image` text NOT NULL,
  `customer_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_image`, `customer_address`) VALUES
(8, 'dai', 'adm2in@gmail.com', '123', 'UK', 'Binh Duong', '123', '67d3b2090ac9e.jpg', '123'),
(9, 'dai2', '2124802010399@student.tdmu.edu.vn', '1', 'Vietnam', 'Binh Duong', '2', '67d3b3480ef1b.jpg', '1'),
(10, 'dai23', '21248020103a99@student.tdmu.edu.vn', '1', 'Vietnam', 'Binh Duong', '2', '67d3b5ba68464.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `game_id` int(11) NOT NULL,
  `tengame` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`game_id`, `tengame`) VALUES
(1, 'Genshin impact'),
(2, 'Honkai Star Rail');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvat`
--

CREATE TABLE `nhanvat` (
  `nhanvat_id` int(11) NOT NULL,
  `tennhanvat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `nhanvat`
--

INSERT INTO `nhanvat` (`nhanvat_id`, `tennhanvat`) VALUES
(1, 'Ayaka'),
(2, 'Firefly'),
(3, 'Ganyu'),
(4, 'Huohuo'),
(5, 'Jingliu'),
(6, 'Klee');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(40, 1, 3, 'Ganyu 01', 600, '🔥 LƯU Ý : Sản phẩm này cần INBOX SHOP ĐỂ ĐƯỢC TƯ VẤN  trước khi QUYẾT ĐỊNH đặt hàng !!!\r\n🔥 Xin vui lòng liên hệ theo Fanpage ( fb.com/shopmihoho ) / Hotline ( 090-945-6789 ) nếu có bất kì câu hỏi nào !!!\r\n------\r\n\r\nTHÔNG TIN SẢN PHẨM\r\n🔥 Hãng : Wonderful Works ( Chính Hãng Nhật Bản )\r\n🔥 Chất Liệu : PVC, ABS\r\n🔥 Chiều Cao: 290mm\r\n🔥 Ngày Phát Hành: T12/2025\r\n ----\r\nSHOP MIHOHO MUA LÀ GHIỀN\r\n🔥Add: Thủ dầu một\r\n🔥Hotline: 090-945-6789', 'Ganyu2.png', 'Ganyu'),
(41, 1, 3, 'ganyu', 1000, '🔥 LƯU Ý : Sản phẩm này cần INBOX SHOP ĐỂ ĐƯỢC TƯ VẤN  trước khi QUYẾT ĐỊNH đặt hàng !!!\r\n🔥 Xin vui lòng liên hệ theo Fanpage ( fb.com/shopmihoho ) / Hotline ( 090-945-6789 ) nếu có bất kì câu hỏi nào !!!\r\n------\r\n\r\nTHÔNG TIN SẢN PHẨM\r\n🔥 Hãng : Wonderful Works ( Chính Hãng Nhật Bản )\r\n🔥 Chất Liệu : PVC, ABS\r\n🔥 Chiều Cao: 290mm\r\n🔥 Ngày Phát Hành: T12/2025\r\n ----\r\nSHOP MIHOHO MUA LÀ GHIỀN\r\n🔥Add: Thủ dầu một\r\n🔥Hotline: 090-945-6789', 'Ganyu2.jpg', 'Ganyu'),
(42, 1, 1, 'Ayaka', 500, '🔥 LƯU Ý : Sản phẩm này cần INBOX SHOP ĐỂ ĐƯỢC TƯ VẤN  trước khi QUYẾT ĐỊNH đặt hàng !!!\r\n🔥 Xin vui lòng liên hệ theo Fanpage ( fb.com/shopmihoho ) / Hotline ( 090-945-6789 ) nếu có bất kì câu hỏi nào !!!\r\n------\r\n\r\nTHÔNG TIN SẢN PHẨM\r\n🔥 Hãng : Wonderful Works ( Chính Hãng Nhật Bản )\r\n🔥 Chất Liệu : PVC, ABS\r\n🔥 Chiều Cao: 290mm\r\n🔥 Ngày Phát Hành: T12/2025\r\n ----\r\nSHOP MIHOHO MUA LÀ GHIỀN\r\n🔥Add: Thủ dầu một\r\n🔥Hotline: 090-945-6789', 'Ayaka1.jpg', 'Ayaka figure'),
(43, 1, 1, 'Ayaka', 500, '🔥 LƯU Ý : Sản phẩm này cần INBOX SHOP ĐỂ ĐƯỢC TƯ VẤN  trước khi QUYẾT ĐỊNH đặt hàng !!!\r\n🔥 Xin vui lòng liên hệ theo Fanpage ( fb.com/shopmihoho ) / Hotline ( 090-945-6789 ) nếu có bất kì câu hỏi nào !!!\r\n------\r\n\r\nTHÔNG TIN SẢN PHẨM\r\n🔥 Hãng : Wonderful Works ( Chính Hãng Nhật Bản )\r\n🔥 Chất Liệu : PVC, ABS\r\n🔥 Chiều Cao: 290mm\r\n🔥 Ngày Phát Hành: T12/2025\r\n ----\r\nSHOP MIHOHO MUA LÀ GHIỀN\r\n🔥Add: Thủ dầu một\r\n🔥Hotline: 090-945-6789', 'Ayaka2.jpg', 'Ayaka figure'),
(44, 1, 1, 'Ayaka', 1400, '🔥 LƯU Ý : Sản phẩm này cần INBOX SHOP ĐỂ ĐƯỢC TƯ VẤN  trước khi QUYẾT ĐỊNH đặt hàng !!!\r\n🔥 Xin vui lòng liên hệ theo Fanpage ( fb.com/shopmihoho ) / Hotline ( 090-945-6789 ) nếu có bất kì câu hỏi nào !!!\r\n------\r\n\r\nTHÔNG TIN SẢN PHẨM\r\n🔥 Hãng : Wonderful Works ( Chính Hãng Nhật Bản )\r\n🔥 Chất Liệu : PVC, ABS\r\n🔥 Chiều Cao: 290mm\r\n🔥 Ngày Phát Hành: T12/2025\r\n ----\r\nSHOP MIHOHO MUA LÀ GHIỀN\r\n🔥Add: Thủ dầu một\r\n🔥Hotline: 090-945-6789', 'Ayaka3.jpg', 'Ayaka figure'),
(45, 2, 2, 'Firefly', 600, '🔥 LƯU Ý : Sản phẩm này cần INBOX SHOP ĐỂ ĐƯỢC TƯ VẤN  trước khi QUYẾT ĐỊNH đặt hàng !!!\r\n🔥 Xin vui lòng liên hệ theo Fanpage ( fb.com/shopmihoho ) / Hotline ( 090-945-6789 ) nếu có bất kì câu hỏi nào !!!\r\n------\r\n\r\nTHÔNG TIN SẢN PHẨM\r\n🔥 Hãng : Wonderful Works ( Chính Hãng Nhật Bản )\r\n🔥 Chất Liệu : PVC, ABS\r\n🔥 Chiều Cao: 290mm\r\n🔥 Ngày Phát Hành: T12/2025\r\n ----\r\nSHOP MIHOHO MUA LÀ GHIỀN\r\n🔥Add: Thủ dầu một\r\n🔥Hotline: 090-945-6789', 'firefly1.jpg', 'Firefly figure'),
(46, 2, 2, 'Firefly', 1000, '🔥 LƯU Ý : Sản phẩm này cần INBOX SHOP ĐỂ ĐƯỢC TƯ VẤN  trước khi QUYẾT ĐỊNH đặt hàng !!!\r\n🔥 Xin vui lòng liên hệ theo Fanpage ( fb.com/shopmihoho ) / Hotline ( 090-945-6789 ) nếu có bất kì câu hỏi nào !!!\r\n------\r\n\r\nTHÔNG TIN SẢN PHẨM\r\n🔥 Hãng : Wonderful Works ( Chính Hãng Nhật Bản )\r\n🔥 Chất Liệu : PVC, ABS\r\n🔥 Chiều Cao: 290mm\r\n🔥 Ngày Phát Hành: T12/2025\r\n ----\r\nSHOP MIHOHO MUA LÀ GHIỀN\r\n🔥Add: Thủ dầu một\r\n🔥Hotline: 090-945-6789', 'firefly2.jpg', 'Firefly figure'),
(47, 2, 4, 'Huohuo', 6000, '🔥 LƯU Ý : Sản phẩm này cần INBOX SHOP ĐỂ ĐƯỢC TƯ VẤN  trước khi QUYẾT ĐỊNH đặt hàng !!!\r\n🔥 Xin vui lòng liên hệ theo Fanpage ( fb.com/shopmihoho ) / Hotline ( 090-945-6789 ) nếu có bất kì câu hỏi nào !!!\r\n------\r\n\r\nTHÔNG TIN SẢN PHẨM\r\n🔥 Hãng : Wonderful Works ( Chính Hãng Nhật Bản )\r\n🔥 Chất Liệu : PVC, ABS\r\n🔥 Chiều Cao: 290mm\r\n🔥 Ngày Phát Hành: T12/2025\r\n ----\r\nSHOP MIHOHO MUA LÀ GHIỀN\r\n🔥Add: Thủ dầu một\r\n🔥Hotline: 090-945-6789', 'huohuo1.jpg', 'Huohuo'),
(48, 2, 4, 'Huohuo', 1000, '🔥 LƯU Ý : Sản phẩm này cần INBOX SHOP ĐỂ ĐƯỢC TƯ VẤN  trước khi QUYẾT ĐỊNH đặt hàng !!!\r\n🔥 Xin vui lòng liên hệ theo Fanpage ( fb.com/shopmihoho ) / Hotline ( 090-945-6789 ) nếu có bất kì câu hỏi nào !!!\r\n------\r\n\r\nTHÔNG TIN SẢN PHẨM\r\n🔥 Hãng : Wonderful Works ( Chính Hãng Nhật Bản )\r\n🔥 Chất Liệu : PVC, ABS\r\n🔥 Chiều Cao: 290mm\r\n🔥 Ngày Phát Hành: T12/2025\r\n ----\r\nSHOP MIHOHO MUA LÀ GHIỀN\r\n🔥Add: Thủ dầu một\r\n🔥Hotline: 090-945-6789', 'huohuo2.jpg', 'Huohuo'),
(49, 2, 5, 'Jingliu', 1600, '🔥 LƯU Ý : Sản phẩm này cần INBOX SHOP ĐỂ ĐƯỢC TƯ VẤN  trước khi QUYẾT ĐỊNH đặt hàng !!!\r\n🔥 Xin vui lòng liên hệ theo Fanpage ( fb.com/shopmihoho ) / Hotline ( 090-945-6789 ) nếu có bất kì câu hỏi nào !!!\r\n------\r\n\r\nTHÔNG TIN SẢN PHẨM\r\n🔥 Hãng : Wonderful Works ( Chính Hãng Nhật Bản )\r\n🔥 Chất Liệu : PVC, ABS\r\n🔥 Chiều Cao: 290mm\r\n🔥 Ngày Phát Hành: T12/2025\r\n ----\r\nSHOP MIHOHO MUA LÀ GHIỀN\r\n🔥Add: Thủ dầu một\r\n🔥Hotline: 090-945-6789', 'Jingliu1.jpg', 'Jingliu figure'),
(50, 2, 5, 'Jingliu', 1000, '🔥 LƯU Ý : Sản phẩm này cần INBOX SHOP ĐỂ ĐƯỢC TƯ VẤN  trước khi QUYẾT ĐỊNH đặt hàng !!!\r\n🔥 Xin vui lòng liên hệ theo Fanpage ( fb.com/shopmihoho ) / Hotline ( 090-945-6789 ) nếu có bất kì câu hỏi nào !!!\r\n------\r\n\r\nTHÔNG TIN SẢN PHẨM\r\n🔥 Hãng : Wonderful Works ( Chính Hãng Nhật Bản )\r\n🔥 Chất Liệu : PVC, ABS\r\n🔥 Chiều Cao: 290mm\r\n🔥 Ngày Phát Hành: T12/2025\r\n ----\r\nSHOP MIHOHO MUA LÀ GHIỀN\r\n🔥Add: Thủ dầu một\r\n🔥Hotline: 090-945-6789', 'Jingliu2.jpg', 'Jingliu'),
(51, 1, 6, 'Klee', 500, '🔥 LƯU Ý : Sản phẩm này cần INBOX SHOP ĐỂ ĐƯỢC TƯ VẤN  trước khi QUYẾT ĐỊNH đặt hàng !!!\r\n🔥 Xin vui lòng liên hệ theo Fanpage ( fb.com/shopmihoho ) / Hotline ( 090-945-6789 ) nếu có bất kì câu hỏi nào !!!\r\n------\r\n\r\nTHÔNG TIN SẢN PHẨM\r\n🔥 Hãng : Wonderful Works ( Chính Hãng Nhật Bản )\r\n🔥 Chất Liệu : PVC, ABS\r\n🔥 Chiều Cao: 290mm\r\n🔥 Ngày Phát Hành: T12/2025\r\n ----\r\nSHOP MIHOHO MUA LÀ GHIỀN\r\n🔥Add: Thủ dầu một\r\n🔥Hotline: 090-945-6789', 'Klee1.jpg', 'Klee'),
(52, 1, 6, 'Klee', 600, '🔥 LƯU Ý : Sản phẩm này cần INBOX SHOP ĐỂ ĐƯỢC TƯ VẤN  trước khi QUYẾT ĐỊNH đặt hàng !!!\r\n🔥 Xin vui lòng liên hệ theo Fanpage ( fb.com/shopmihoho ) / Hotline ( 090-945-6789 ) nếu có bất kì câu hỏi nào !!!\r\n------\r\n\r\nTHÔNG TIN SẢN PHẨM\r\n🔥 Hãng : Wonderful Works ( Chính Hãng Nhật Bản )\r\n🔥 Chất Liệu : PVC, ABS\r\n🔥 Chiều Cao: 290mm\r\n🔥 Ngày Phát Hành: T12/2025\r\n ----\r\nSHOP MIHOHO MUA LÀ GHIỀN\r\n🔥Add: Thủ dầu một\r\n🔥Hotline: 090-945-6789', 'Klee2.jpg', 'Klee'),
(53, 2, 4, 'Huohuo', 1600, '🔥 LƯU Ý : Sản phẩm này cần INBOX SHOP ĐỂ ĐƯỢC TƯ VẤN  trước khi QUYẾT ĐỊNH đặt hàng !!!\r\n🔥 Xin vui lòng liên hệ theo Fanpage ( fb.com/shopmihoho ) / Hotline ( 090-945-6789 ) nếu có bất kì câu hỏi nào !!!\r\n------\r\n\r\nTHÔNG TIN SẢN PHẨM\r\n🔥 Hãng : Wonderful Works ( Chính Hãng Nhật Bản )\r\n🔥 Chất Liệu : PVC, ABS\r\n🔥 Chiều Cao: 290mm\r\n🔥 Ngày Phát Hành: T12/2025\r\n ----\r\nSHOP MIHOHO MUA LÀ GHIỀN\r\n🔥Add: Thủ dầu một\r\n🔥Hotline: 090-945-6789', 'huohuo2.jpg', 'Huohuo'),
(54, 1, 3, 'Ganyu', 1400, '🔥 LƯU Ý : Sản phẩm này cần INBOX SHOP ĐỂ ĐƯỢC TƯ VẤN  trước khi QUYẾT ĐỊNH đặt hàng !!!\r\n🔥 Xin vui lòng liên hệ theo Fanpage ( fb.com/shopmihoho ) / Hotline ( 090-945-6789 ) nếu có bất kì câu hỏi nào !!!\r\n------\r\n\r\nTHÔNG TIN SẢN PHẨM\r\n🔥 Hãng : Wonderful Works ( Chính Hãng Nhật Bản )\r\n🔥 Chất Liệu : PVC, ABS\r\n🔥 Chiều Cao: 290mm\r\n🔥 Ngày Phát Hành: T12/2025\r\n ----\r\nSHOP MIHOHO MUA LÀ GHIỀN\r\n🔥Add: Thủ dầu một\r\n🔥Hotline: 090-945-6789', 'Ganyu2.jpg', 'Ganyu figure'),
(55, 2, 2, 'Firefly', 500, '🔥 LƯU Ý : Sản phẩm này cần INBOX SHOP ĐỂ ĐƯỢC TƯ VẤN  trước khi QUYẾT ĐỊNH đặt hàng !!!\r\n🔥 Xin vui lòng liên hệ theo Fanpage ( fb.com/shopmihoho ) / Hotline ( 090-945-6789 ) nếu có bất kì câu hỏi nào !!!\r\n------\r\n\r\nTHÔNG TIN SẢN PHẨM\r\n🔥 Hãng : Wonderful Works ( Chính Hãng Nhật Bản )\r\n🔥 Chất Liệu : PVC, ABS\r\n🔥 Chiều Cao: 290mm\r\n🔥 Ngày Phát Hành: T12/2025\r\n ----\r\nSHOP MIHOHO MUA LÀ GHIỀN\r\n🔥Add: Thủ dầu một\r\n🔥Hotline: 090-945-6789', 'firefly1.jpg', 'Firefly figure'),
(56, 2, 5, 'Jingliu', 1500, '🔥 LƯU Ý : Sản phẩm này cần INBOX SHOP ĐỂ ĐƯỢC TƯ VẤN  trước khi QUYẾT ĐỊNH đặt hàng !!!\r\n🔥 Xin vui lòng liên hệ theo Fanpage ( fb.com/shopmihoho ) / Hotline ( 090-945-6789 ) nếu có bất kì câu hỏi nào !!!\r\n------\r\n\r\nTHÔNG TIN SẢN PHẨM\r\n🔥 Hãng : Wonderful Works ( Chính Hãng Nhật Bản )\r\n🔥 Chất Liệu : PVC, ABS\r\n🔥 Chiều Cao: 290mm\r\n🔥 Ngày Phát Hành: T12/2025\r\n ----\r\nSHOP MIHOHO MUA LÀ GHIỀN\r\n🔥Add: Thủ dầu một\r\n🔥Hotline: 090-945-6789', 'Jingliu2.jpg', 'Jingliu figure'),
(57, 1, 6, 'Klee', 1400, '🔥 LƯU Ý : Sản phẩm này cần INBOX SHOP ĐỂ ĐƯỢC TƯ VẤN  trước khi QUYẾT ĐỊNH đặt hàng !!!\r\n🔥 Xin vui lòng liên hệ theo Fanpage ( fb.com/shopmihoho ) / Hotline ( 090-945-6789 ) nếu có bất kì câu hỏi nào !!!\r\n------\r\n\r\nTHÔNG TIN SẢN PHẨM\r\n🔥 Hãng : Wonderful Works ( Chính Hãng Nhật Bản )\r\n🔥 Chất Liệu : PVC, ABS\r\n🔥 Chiều Cao: 290mm\r\n🔥 Ngày Phát Hành: T12/2025\r\n ----\r\nSHOP MIHOHO MUA LÀ GHIỀN\r\n🔥Add: Thủ dầu một\r\n🔥Hotline: 090-945-6789', 'Klee1.jpg', 'Klee figure'),
(58, 2, 4, 'Huohuo', 500, '🔥 LƯU Ý : Sản phẩm này cần INBOX SHOP ĐỂ ĐƯỢC TƯ VẤN  trước khi QUYẾT ĐỊNH đặt hàng !!!\r\n🔥 Xin vui lòng liên hệ theo Fanpage ( fb.com/shopmihoho ) / Hotline ( 090-945-6789 ) nếu có bất kì câu hỏi nào !!!\r\n------\r\n\r\nTHÔNG TIN SẢN PHẨM\r\n🔥 Hãng : Wonderful Works ( Chính Hãng Nhật Bản )\r\n🔥 Chất Liệu : PVC, ABS\r\n🔥 Chiều Cao: 290mm\r\n🔥 Ngày Phát Hành: T12/2025\r\n ----\r\nSHOP MIHOHO MUA LÀ GHIỀN\r\n🔥Add: Thủ dầu một\r\n🔥Hotline: 090-945-6789', 'huohuo2.jpg', 'Huohuo figure'),
(59, 2, 5, 'Jingliu', 600, '🔥 LƯU Ý : Sản phẩm này cần INBOX SHOP ĐỂ ĐƯỢC TƯ VẤN  trước khi QUYẾT ĐỊNH đặt hàng !!!\r\n🔥 Xin vui lòng liên hệ theo Fanpage ( fb.com/shopmihoho ) / Hotline ( 090-945-6789 ) nếu có bất kì câu hỏi nào !!!\r\n------\r\n\r\nTHÔNG TIN SẢN PHẨM\r\n🔥 Hãng : Wonderful Works ( Chính Hãng Nhật Bản )\r\n🔥 Chất Liệu : PVC, ABS\r\n🔥 Chiều Cao: 290mm\r\n🔥 Ngày Phát Hành: T12/2025\r\n ----\r\nSHOP MIHOHO MUA LÀ GHIỀN\r\n🔥Add: Thủ dầu một\r\n🔥Hotline: 090-945-6789', 'Jingliu1.jpg', 'Jingliu figure'),
(60, 1, 1, 'Ayaka', 500, '🔥 LƯU Ý : Sản phẩm này cần INBOX SHOP ĐỂ ĐƯỢC TƯ VẤN  trước khi QUYẾT ĐỊNH đặt hàng !!!\r\n🔥 Xin vui lòng liên hệ theo Fanpage ( fb.com/shopmihoho ) / Hotline ( 090-945-6789 ) nếu có bất kì câu hỏi nào !!!\r\n------\r\n\r\nTHÔNG TIN SẢN PHẨM\r\n🔥 Hãng : Wonderful Works ( Chính Hãng Nhật Bản )\r\n🔥 Chất Liệu : PVC, ABS\r\n🔥 Chiều Cao: 290mm\r\n🔥 Ngày Phát Hành: T12/2025\r\n ----\r\nSHOP MIHOHO MUA LÀ GHIỀN\r\n🔥Add: Thủ dầu một\r\n🔥Hotline: 090-945-6789', 'Ayaka1.jpg', 'Ayaka figure'),
(61, 1, 6, 'Klee', 1400, '🔥 LƯU Ý : Sản phẩm này cần INBOX SHOP ĐỂ ĐƯỢC TƯ VẤN  trước khi QUYẾT ĐỊNH đặt hàng !!!\r\n🔥 Xin vui lòng liên hệ theo Fanpage ( fb.com/shopmihoho ) / Hotline ( 090-945-6789 ) nếu có bất kì câu hỏi nào !!!\r\n------\r\n\r\nTHÔNG TIN SẢN PHẨM\r\n🔥 Hãng : Wonderful Works ( Chính Hãng Nhật Bản )\r\n🔥 Chất Liệu : PVC, ABS\r\n🔥 Chiều Cao: 290mm\r\n🔥 Ngày Phát Hành: T12/2025\r\n ----\r\nSHOP MIHOHO MUA LÀ GHIỀN\r\n🔥Add: Thủ dầu một\r\n🔥Hotline: 090-945-6789', 'Klee2.jpg', 'Klee figure'),
(62, 2, 2, 'Firefly', 1000, '🔥 LƯU Ý : Sản phẩm này cần INBOX SHOP ĐỂ ĐƯỢC TƯ VẤN  trước khi QUYẾT ĐỊNH đặt hàng !!!\r\n🔥 Xin vui lòng liên hệ theo Fanpage ( fb.com/shopmihoho ) / Hotline ( 090-945-6789 ) nếu có bất kì câu hỏi nào !!!\r\n------\r\n\r\nTHÔNG TIN SẢN PHẨM\r\n🔥 Hãng : Wonderful Works ( Chính Hãng Nhật Bản )\r\n🔥 Chất Liệu : PVC, ABS\r\n🔥 Chiều Cao: 290mm\r\n🔥 Ngày Phát Hành: T12/2025\r\n ----\r\nSHOP MIHOHO MUA LÀ GHIỀN\r\n🔥Add: Thủ dầu một\r\n🔥Hotline: 090-945-6789', 'firefly2.jpg', 'Firefly figure'),
(68, 1, 3, 'Ganyu 01', 123, 'Ganyu 01', 'Ganyu1.png', 'Ganyu');

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `id_baiviet` int(11) NOT NULL,
  `tenbaiviet` varchar(255) NOT NULL,
  `anhminhhoa` varchar(255) NOT NULL,
  `noidung` longtext NOT NULL,
  `tomtat` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `tintuc`
--

INSERT INTO `tintuc` (`id_baiviet`, `tenbaiviet`, `anhminhhoa`, `noidung`, `tomtat`) VALUES
(4, 'Figure Kamisato Ayaka – Vẻ đẹp thanh tao', 'Ayaka2.jpg', '<div class=\"title_news\" style=\"margin-top: 10px; padding-bottom: 10px; width: 480.016px; float: left; color: rgb(51, 51, 51); background-color: rgb(255, 255, 255);\"><h3 style=\"\"><font face=\"times new roman\" size=\"3\"><strong style=\"\">Figure Kamisato Ayaka – Vẻ đẹp thanh tao<br></strong>&nbsp; &nbsp;Nếu bạn là một fan hâm mộ của <em>Genshin Impact</em>, đặc biệt là nhân vật Kamisato Ayaka, thì chắc chắn không thể bỏ qua mẫu figure tuyệt đẹp này. Ayaka, tiểu thư danh giá của gia tộc Kamisato tại Inazuma, được biết đến với khí chất thanh lịch, kỹ năng kiếm thuật điêu luyện và lòng trung thành tuyệt đối với dân chúng. Sản phẩm figure này tái hiện hoàn hảo thần thái cao quý và uyển chuyển của cô, mang đến một tuyệt tác nghệ thuật đáng sở hữu cho bất kỳ nhà sưu tập nào.</font></h3><h3 style=\"\"><hr style=\"\"><font face=\"times new roman\" size=\"3\"><strong style=\"\">Thiết kế tinh xảo – Từng đường nét đều hoàn hảo<br></strong>&nbsp; &nbsp; &nbsp;Figure Kamisato Ayaka được chế tác với độ chính xác cao, từng chi tiết đều được chăm chút tỉ mỉ để thể hiện đúng phong thái tao nhã của cô. Mẫu figure có thể được sản xuất bởi các hãng nổi tiếng như Good Smile Company, Kotobukiya hoặc Alter, đảm bảo chất lượng và độ hoàn thiện tuyệt vời.<br><strong>&nbsp; &nbsp; &nbsp;Tạo hình động tác đầy uyển chuyển</strong>: Ayaka được khắc hoạ trong tư thế chiến đấu hoặc đang múa kiếm, thể hiện rõ phong cách <em>Iaijutsu</em> thanh thoát của cô.<br><strong>&nbsp; &nbsp; &nbsp;Biểu cảm khuôn mặt chân thực</strong>: Đôi mắt sáng trong, nụ cười dịu dàng nhưng ẩn chứa sự kiên cường của một tiểu thư quyền quý.<br><strong>&nbsp; &nbsp; &nbsp;Chất liệu cao cấp</strong>: Figure được làm từ PVC và ABS bền bỉ, giúp giữ được màu sắc sắc nét và chi tiết trong thời gian dài.<br><strong>&nbsp; &nbsp; &nbsp;Trang phục tỉ mỹ</strong>: Bộ kimono truyền thống với họa tiết hoa anh đào được sơn phủ bóng, phản chiếu ánh sáng đẹp mắt, tạo nên sự sang trọng và chân thực.</font><hr style=\"\"><font face=\"times new roman\" size=\"3\"><strong style=\"\">Mua figure Kamisato Ayaka ở đâu?<br></strong>&nbsp; &nbsp; &nbsp;Bạn có thể tìm mua figure Ayaka chính hãng tại các cửa hàng chuyên về mô hình hoặc đặt hàng từ các trang web uy tín như:<br><strong style=\"\">&nbsp; &nbsp; &nbsp; &nbsp; Good Smile Company<br></strong><strong style=\"\">&nbsp; &nbsp; &nbsp; &nbsp; AmiAmi<br></strong><strong style=\"\">&nbsp; &nbsp; &nbsp; &nbsp; Kotobukiya<br></strong><strong style=\"\">&nbsp; &nbsp; &nbsp; &nbsp; Solaris Japan<br></strong><strong style=\"\">&nbsp; &nbsp; &nbsp; &nbsp; Amazon Japan<br></strong>&nbsp; &nbsp; &nbsp;Hãy đảm bảo mua từ các nguồn chính thức để tránh hàng giả hoặc hàng kém chất lượng.</font><hr style=\"\"><font face=\"times new roman\" size=\"3\"><strong style=\"\">Lời kết<br></strong>&nbsp; &nbsp; &nbsp;Figure Kamisato Ayaka không chỉ đơn thuần là một món đồ sưu tập, mà còn là một tác phẩm nghệ thuật thể hiện vẻ đẹp thanh tao, khí chất cao quý và tinh thần kiên cường của cô tiểu thư nhà Kamisato. Nếu bạn là một fan của <em style=\"\">Genshin Impact</em> hay đơn giản chỉ là người yêu thích những sản phẩm figure chất lượng cao, đây chắc chắn sẽ là một lựa chọn hoàn hảo.</font></h3><h1 style=\"font-family: arial; font-weight: 400; font-stretch: normal; line-height: 32px; text-rendering: geometricprecision;\"><p style=\"font-size: 28px;\"></p></h1></div>', '<p data-pm-slice=\"1 1 []\">Nếu bạn là một fan hâm mộ của <em>Genshin Impact</em>, đặc biệt là nhân vật Kamisato Ayaka, thì chắc chắn không thể bỏ qua mẫu figure tuyệt đẹp này</p>'),
(5, 'Firefly – Nhân Vật Mới Đầy Bí Ẩn Trong Honkai: Star Rail', 'firefly1.jpg', '<div class=\"title_news\" style=\"margin-top: 10px; padding-bottom: 10px; width: 480.016px; float: left; color: rgb(51, 51, 51); background-color: rgb(255, 255, 255);\"><h3 data-start=\"0\" data-end=\"66\" style=\"\"><strong data-start=\"4\" data-end=\"64\" style=\"\"><font size=\"3\" style=\"\" face=\"times new roman\">Firefly – Nhân Vật Mới Đầy Bí Ẩn Trong Honkai: Star Rail</font></strong></h3><h1 style=\"font-weight: 400; font-stretch: normal; line-height: 32px; text-rendering: geometricprecision;\">\r\n<p data-start=\"68\" data-end=\"396\" style=\"\"><font size=\"3\" face=\"times new roman\">Sau nhiều tin đồn và hé lộ từ HoYoverse, nhân vật <strong data-start=\"118\" data-end=\"129\">Firefly</strong> trong <em data-start=\"136\" data-end=\"155\">Honkai: Star Rail</em> cuối cùng cũng chính thức lộ diện, thu hút sự chú ý của cộng đồng game thủ. Là một chiến binh mạnh mẽ đến từ nhóm <strong data-start=\"270\" data-end=\"291\">Stellaron Hunters</strong>, Firefly sở hữu ngoại hình ấn tượng cùng sức mạnh đáng gờm, hứa hẹn mang đến một lối chơi đầy đột phá.</font></p>\r\n<p data-start=\"398\" data-end=\"725\" style=\"\"><font size=\"3\" style=\"\" face=\"times new roman\">Với thiết kế mang phong cách <em data-start=\"427\" data-end=\"438\" style=\"\">cyberpunk</em>, Firefly được cho là nhân vật hệ <strong data-start=\"472\" data-end=\"479\" style=\"\">Lửa</strong> và đi theo <strong data-start=\"491\" data-end=\"513\" style=\"\">Định Mệnh Hủy Diệt</strong>, tập trung vào lối chơi tấn công mạnh mẽ với sát thương diện rộng. Cốt truyện của cô cũng được kỳ vọng sẽ hé lộ thêm nhiều bí ẩn về thế giới <em data-start=\"655\" data-end=\"674\" style=\"\">Honkai: Star Rail</em>, đặc biệt là những âm mưu của Stellaron Hunters.</font></p></h1></div>', '<font face=\"times new roman\">nhân vật <strong data-start=\"118\" data-end=\"129\">Firefly</strong> trong <em data-start=\"136\" data-end=\"155\">Honkai: Star Rail</em> cuối cùng cũng chính thức lộ diện, thu hút sự chú ý của cộng đồng game thủ</font>'),
(6, 'Ganyu – Tiên Hạc Giữa Nhân Gian, Người Thư Ký Trung Thành của Liyue', 'Ganyu2.jpg', '<div class=\"title_news\" style=\"margin-top: 10px; padding-bottom: 10px; width: 480.016px; float: left; color: rgb(51, 51, 51); background-color: rgb(255, 255, 255);\"><h3 data-start=\"0\" data-end=\"77\" style=\"\"><strong data-start=\"4\" data-end=\"75\" style=\"\"><font size=\"3\" style=\"\" face=\"times new roman\">Ganyu – Tiên Hạc Giữa Nhân Gian, Người Thư Ký Trung Thành của Liyue</font></strong></h3><h1 style=\"font-weight: 400; font-stretch: normal; line-height: 32px; text-rendering: geometricprecision;\">\r\n<p data-start=\"79\" data-end=\"583\"><font size=\"3\" face=\"times new roman\">Trong thế giới rộng lớn của <em data-start=\"107\" data-end=\"123\">Genshin Impact</em>, mỗi nhân vật đều mang trong mình một câu chuyện riêng, một lý tưởng riêng và một phong cách chiến đấu độc đáo. Trong số đó, <strong data-start=\"249\" data-end=\"258\">Ganyu</strong>, một <strong data-start=\"264\" data-end=\"282\">Tiên Hạc Qilin</strong> mang trong mình dòng máu thần thú và đảm nhận vị trí <strong data-start=\"336\" data-end=\"366\">thư ký của Thất Tinh Liyue</strong>, đã để lại ấn tượng sâu sắc trong lòng người chơi. Với tính cách dịu dàng, tận tụy nhưng cũng đầy nội tâm, cùng sức mạnh chiến đấu phi thường, Ganyu chính là một trong những nhân vật được yêu thích nhất trong game.</font></p>\r\n<hr data-start=\"585\" data-end=\"588\">\r\n</h1><h2 data-start=\"590\" data-end=\"630\" style=\"\"><strong data-start=\"593\" data-end=\"628\"><font size=\"3\" face=\"times new roman\">Ngoại hình và thiết kế nhân vật</font></strong></h2><h1 style=\"font-weight: 400; font-stretch: normal; line-height: 32px; text-rendering: geometricprecision;\">\r\n<p data-start=\"632\" data-end=\"987\"><font size=\"3\" face=\"times new roman\">Là một <strong data-start=\"639\" data-end=\"655\">nửa thần thú</strong>, Ganyu sở hữu vẻ đẹp thanh tao, trang nhã nhưng vẫn đầy cuốn hút. Mái tóc xanh bồng bềnh cùng cặp sừng đỏ cong mềm mại trên đầu là đặc điểm nổi bật của dòng dõi Qilin mà cô mang trong mình. Đôi mắt tím mộng mơ, trang phục mang phong cách truyền thống kết hợp với yếu tố tiên khí tạo nên một hình ảnh vừa uyển chuyển, vừa mạnh mẽ.</font></p>\r\n<p data-start=\"989\" data-end=\"1264\"><font size=\"3\" face=\"times new roman\">Bộ trang phục của Ganyu cũng được thiết kế với những đường nét tinh tế, pha trộn giữa nét cổ điển và hiện đại. Những hoa văn hình sóng nước trên áo thể hiện sự gắn kết giữa cô và Liyue, trong khi những chi tiết màu vàng ánh kim lại tôn lên sự thanh thoát và cao quý của cô.</font></p>\r\n<hr data-start=\"1266\" data-end=\"1269\">\r\n</h1><h2 data-start=\"1271\" data-end=\"1319\" style=\"\"><strong data-start=\"1274\" data-end=\"1317\"><font size=\"3\" face=\"times new roman\">Tính cách – Sự tận tụy không ngừng nghỉ</font></strong></h2><h1 style=\"font-weight: 400; font-stretch: normal; line-height: 32px; text-rendering: geometricprecision;\">\r\n<p data-start=\"1321\" data-end=\"1587\"><font size=\"3\" face=\"times new roman\">Ganyu là người luôn đặt trách nhiệm lên hàng đầu, làm việc không biết mệt mỏi để đảm bảo sự vận hành trơn tru của cả Liyue. Dù là một <strong data-start=\"1455\" data-end=\"1472\">nửa tiên nhân</strong>, cô vẫn lựa chọn gánh vác nhiệm vụ của con người, luôn hết mình phục vụ cho Thất Tinh Liyue mà không chút do dự.</font></p>\r\n<p data-start=\"1589\" data-end=\"1956\"><font size=\"3\" face=\"times new roman\">Tuy nhiên, sau hàng trăm năm làm thư ký, Ganyu đôi khi cũng cảm thấy cô đơn. Cô tự hỏi liệu mình có thực sự thuộc về thế giới con người hay không, khi mà thời gian của cô dường như kéo dài vô tận, còn những người xung quanh cứ lần lượt già đi. Chính điều này khiến Ganyu trở thành một nhân vật có nội tâm sâu sắc, luôn mang trong mình sự dằn vặt giữa hai thân phận.</font></p>\r\n<p data-start=\"1958\" data-end=\"2192\"><font size=\"3\" face=\"times new roman\">Dù vậy, cô vẫn luôn dịu dàng, khiêm tốn và sẵn sàng giúp đỡ bất kỳ ai cần đến. Đối với người dân Liyue, Ganyu không chỉ là một thư ký tận tụy, mà còn là một người bạn đáng tin cậy, một biểu tượng của lòng trung thành và trách nhiệm.</font></p>\r\n<hr data-start=\"2194\" data-end=\"2197\">\r\n</h1><h2 data-start=\"2199\" data-end=\"2244\" style=\"\"><strong data-start=\"2202\" data-end=\"2242\"><font size=\"3\" face=\"times new roman\">Sức mạnh và lối chơi trong chiến đấu</font></strong></h2><h1 style=\"font-weight: 400; font-stretch: normal; line-height: 32px; text-rendering: geometricprecision;\">\r\n<p data-start=\"2246\" data-end=\"2521\"><font size=\"3\" face=\"times new roman\">Ganyu là một trong những nhân vật <strong data-start=\"2280\" data-end=\"2291\">hệ Băng</strong> mạnh nhất trong <em data-start=\"2308\" data-end=\"2324\">Genshin Impact</em>, đồng thời cũng là một trong những <strong data-start=\"2360\" data-end=\"2376\">cung thủ DPS</strong> hàng đầu. Với kỹ năng <strong data-start=\"2399\" data-end=\"2421\">Liễu Mộng Hồng Lưu</strong>, cô có thể <strong data-start=\"2433\" data-end=\"2468\">bắn những mũi tên Băng cực mạnh</strong>, gây sát thương lớn lên kẻ địch từ khoảng cách xa.</font></p>\r\n<ul data-start=\"2523\" data-end=\"3057\">\r\n<li data-start=\"2523\" data-end=\"2696\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"2525\" data-end=\"2561\">Đòn đánh thường - Thiên Hoa Tiễn</strong>: Ganyu có khả năng bắn cung với hai tầng tụ lực, trong đó tầng thứ hai sẽ biến thành một <strong data-start=\"2651\" data-end=\"2667\">Hoa Sen Băng</strong>, gây sát thương diện rộng.</font></li>\r\n<li data-start=\"2697\" data-end=\"2848\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"2699\" data-end=\"2742\">Kỹ năng nguyên tố - Sơn Trạch Lam Quang</strong>: Ganyu để lại một <strong data-start=\"2761\" data-end=\"2777\">hoa sen băng</strong>, thu hút kẻ địch tấn công nó trước khi phát nổ, gây sát thương Băng.</font></li>\r\n<li data-start=\"2849\" data-end=\"3057\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"2851\" data-end=\"2890\">Kỹ năng nộ - Thiên Hành Thanh Quyết</strong>: Triệu hồi một trận tuyết rơi liên tục, gây sát thương Băng diện rộng trong thời gian dài, biến cô trở thành một cỗ máy gây sát thương mạnh mẽ trong các trận chiến.</font></li>\r\n</ul>\r\n<p data-start=\"3059\" data-end=\"3308\"><font size=\"3\" face=\"times new roman\">Nhờ vào bộ kỹ năng mạnh mẽ này, Ganyu có thể dễ dàng làm chủ nhiều tình huống chiến đấu khác nhau. Cô có thể vừa đóng vai trò <strong data-start=\"3185\" data-end=\"3198\">DPS chính</strong> với sát thương Băng cực lớn, vừa có thể hỗ trợ đội hình với <strong data-start=\"3259\" data-end=\"3305\">khả năng gây sát thương diện rộng liên tục</strong>.</font></p>\r\n<hr data-start=\"3310\" data-end=\"3313\">\r\n</h1><h2 data-start=\"3315\" data-end=\"3357\" style=\"\"><strong data-start=\"3318\" data-end=\"3355\"><font size=\"3\" face=\"times new roman\">Mối quan hệ với các nhân vật khác</font></strong></h2><h1 style=\"font-weight: 400; font-stretch: normal; line-height: 32px; text-rendering: geometricprecision;\">\r\n<p data-start=\"3359\" data-end=\"3434\"><font size=\"3\" face=\"times new roman\">Ganyu có mối liên kết chặt chẽ với nhiều nhân vật trong <em data-start=\"3415\" data-end=\"3431\">Genshin Impact</em>:</font></p>\r\n<ul data-start=\"3436\" data-end=\"4068\">\r\n<li data-start=\"3436\" data-end=\"3587\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"3438\" data-end=\"3451\">Ningguang</strong>: Là một trong Thất Tinh của Liyue, Ningguang tin tưởng tuyệt đối vào năng lực của Ganyu và giao cho cô rất nhiều nhiệm vụ quan trọng.</font></li>\r\n<li data-start=\"3588\" data-end=\"3760\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"3590\" data-end=\"3598\">Xiao</strong>: Dù ít giao tiếp với người khác, Xiao vẫn dành sự tôn trọng đặc biệt cho Ganyu, vì cô là một trong những <strong data-start=\"3704\" data-end=\"3757\">người hiếm hoi hiểu được nỗi cô đơn của tiên nhân</strong>.</font></li>\r\n<li data-start=\"3761\" data-end=\"3927\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"3763\" data-end=\"3773\">Keqing</strong>: Cả hai đều làm việc dưới trướng Thất Tinh Liyue, tuy nhiên Keqing thường xuyên phàn nàn về tính cách <strong data-start=\"3876\" data-end=\"3914\">quá nghiêm túc và chăm chỉ quá mức</strong> của Ganyu.</font></li>\r\n<li data-start=\"3928\" data-end=\"4068\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"3930\" data-end=\"3940\">Beidou</strong>: Thuyền trưởng Beidou luôn tỏ ra bất ngờ khi thấy một <strong data-start=\"3995\" data-end=\"4065\">nửa tiên nhân như Ganyu lại có thể hòa nhập với thế giới con người</strong>.</font></li>\r\n</ul>\r\n<hr data-start=\"4070\" data-end=\"4073\">\r\n</h1><h2 data-start=\"4075\" data-end=\"4125\" style=\"\"><strong data-start=\"4078\" data-end=\"4123\"><font size=\"3\" face=\"times new roman\">Tại sao Ganyu lại được yêu thích đến vậy?</font></strong></h2><h1 style=\"font-weight: 400; font-stretch: normal; line-height: 32px; text-rendering: geometricprecision;\">\r\n<ol data-start=\"4127\" data-end=\"4724\">\r\n<li data-start=\"4127\" data-end=\"4285\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"4130\" data-end=\"4152\">Cốt truyện sâu sắc</strong>: Ganyu không chỉ đơn thuần là một thư ký, mà còn là một nhân vật có chiều sâu, với những suy tư và trăn trở về thân phận của mình.</font></li>\r\n<li data-start=\"4286\" data-end=\"4402\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"4289\" data-end=\"4309\">Thiết kế đẹp mắt</strong>: Từ màu sắc, trang phục đến từng cử chỉ của cô đều toát lên vẻ đẹp thanh thoát và tao nhã.</font></li>\r\n<li data-start=\"4403\" data-end=\"4548\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"4406\" data-end=\"4434\">Sức mạnh trong chiến đấu</strong>: Ganyu là một trong những nhân vật DPS mạnh nhất trong game, với khả năng gây sát thương liên tục và diện rộng.</font></li>\r\n<li data-start=\"4549\" data-end=\"4724\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"4552\" data-end=\"4574\">Tính cách đáng yêu</strong>: Dù rất nghiêm túc khi làm việc, nhưng cô cũng có những khoảnh khắc đáng yêu, như việc <strong data-start=\"4662\" data-end=\"4686\">ăn quá nhiều đồ ngọt</strong>, khiến cô bị nhiều người trêu chọc.</font></li>\r\n</ol>\r\n<hr data-start=\"4726\" data-end=\"4729\">\r\n</h1><h2 data-start=\"4731\" data-end=\"4747\" style=\"\"><strong data-start=\"4734\" data-end=\"4745\"><font size=\"3\" face=\"times new roman\">Lời kết</font></strong></h2><h1 style=\"font-weight: 400; font-stretch: normal; line-height: 32px; text-rendering: geometricprecision;\">\r\n<p data-start=\"4749\" data-end=\"5122\" style=\"\"><font size=\"3\" style=\"\" face=\"times new roman\">Ganyu là hiện thân của sự thanh tao và trách nhiệm, một nhân vật mang vẻ đẹp thuần khiết nhưng cũng đầy sức mạnh. Dù là trong cốt truyện hay trong chiến đấu, cô đều để lại dấu ấn khó phai trong lòng người chơi. Nếu bạn đang tìm kiếm một nhân vật vừa mạnh mẽ, vừa có chiều sâu, vừa có vẻ ngoài cuốn hút, thì Ganyu chắc chắn là một lựa chọn hoàn hảo trong đội hình của bạn!</font></p></h1></div>', '<font face=\"times new roman\">Trong thế giới rộng lớn của <em data-start=\"107\" data-end=\"123\">Genshin Impact</em>, mỗi nhân vật đều mang trong mình một câu chuyện riêng, một lý tưởng riêng và một phong cách chiến đấu độc đáo. Trong số đó, <strong data-start=\"249\" data-end=\"258\">Ganyu</strong>, một <strong data-start=\"264\" data-end=\"282\">Tiên Hạc Qilin</strong> mang trong mình dòng máu thần thú và đảm nhận vị trí <strong data-start=\"336\" data-end=\"366\">thư ký của Thất Tinh Liyue</strong>, đã để lại ấn tượng sâu sắc trong lòng người chơi.</font>'),
(7, 'Huohuo – Linh Quỷ Nhát Gan nhưng Đầy Sức Mạnh trong Honkai: Star Rail', 'huohuo2.jpg', '<div class=\"title_news\" style=\"margin-top: 10px; padding-bottom: 10px; width: 480.016px; float: left; color: rgb(51, 51, 51); background-color: rgb(255, 255, 255);\"><h3 data-start=\"0\" data-end=\"79\" style=\"\"><strong data-start=\"4\" data-end=\"77\" style=\"\"><font size=\"3\" style=\"\" face=\"times new roman\">Huohuo – Linh Quỷ Nhát Gan nhưng Đầy Sức Mạnh trong Honkai: Star Rail</font></strong></h3><h1 style=\"font-weight: 400; font-stretch: normal; line-height: 32px; text-rendering: geometricprecision;\">\r\n<p data-start=\"81\" data-end=\"555\"><font size=\"3\" face=\"times new roman\">Trong thế giới rộng lớn của <em data-start=\"109\" data-end=\"128\">Honkai: Star Rail</em>, mỗi nhân vật đều mang một màu sắc riêng biệt, từ những chiến binh dũng mãnh cho đến những nhân vật bí ẩn với quá khứ sâu sắc. <strong data-start=\"256\" data-end=\"266\">Huohuo</strong>, một <strong data-start=\"272\" data-end=\"313\">thiếu nữ trừ tà mang linh hồn của quỷ</strong>, là một trong những nhân vật thú vị nhất được giới thiệu trong game. Dù mang trong mình sứ mệnh trừ tà, cô bé lại có một <strong data-start=\"435\" data-end=\"506\">tính cách nhút nhát, sợ ma nhưng lại sở hữu sức mạnh đáng kinh ngạc</strong>, tạo nên sự đối lập vừa đáng yêu vừa cuốn hút.</font></p>\r\n<hr data-start=\"557\" data-end=\"560\">\r\n</h1><h2 data-start=\"562\" data-end=\"602\" style=\"\"><strong data-start=\"565\" data-end=\"600\"><font size=\"3\" face=\"times new roman\">Ngoại hình và Thiết Kế Nhân Vật</font></strong></h2><h1 style=\"font-weight: 400; font-stretch: normal; line-height: 32px; text-rendering: geometricprecision;\">\r\n<p data-start=\"604\" data-end=\"978\"><font size=\"3\" face=\"times new roman\">Huohuo sở hữu <strong data-start=\"618\" data-end=\"641\">ngoại hình đáng yêu</strong> với mái tóc xanh ngọc mềm mại và cặp sừng nhỏ trên đầu, biểu tượng cho nguồn gốc đặc biệt của cô. Trang phục của Huohuo mang phong cách cổ điển kết hợp với những chi tiết hiện đại, phản ánh vai trò của cô trong <strong data-start=\"853\" data-end=\"870\">Ủy Ban Trừ Tà</strong>. Đặc biệt, cô luôn mang theo một <strong data-start=\"904\" data-end=\"923\">lá bùa phong ấn</strong>, nơi giam giữ linh hồn mạnh mẽ của <strong data-start=\"959\" data-end=\"975\">quỷ Heliobus</strong>.</font></p>\r\n<p data-start=\"980\" data-end=\"1177\"><font size=\"3\" face=\"times new roman\">Lá bùa này vừa là vũ khí, vừa là một phần tính cách của Huohuo. Nó đại diện cho <strong data-start=\"1060\" data-end=\"1081\">nỗi sợ hãi của cô</strong>, nhưng đồng thời cũng là <strong data-start=\"1107\" data-end=\"1125\">nguồn sức mạnh</strong> giúp cô chiến đấu chống lại những linh hồn tà ác.</font></p>\r\n<hr data-start=\"1179\" data-end=\"1182\">\r\n</h1><h2 data-start=\"1184\" data-end=\"1234\" style=\"\"><strong data-start=\"1187\" data-end=\"1232\"><font size=\"3\" face=\"times new roman\">Tính Cách – Nỗi Sợ Hãi nhưng Vẫn Tiến Lên</font></strong></h2><h1 style=\"font-weight: 400; font-stretch: normal; line-height: 32px; text-rendering: geometricprecision;\">\r\n<p data-start=\"1236\" data-end=\"1495\"><font size=\"3\" face=\"times new roman\">Mặc dù là một <strong data-start=\"1250\" data-end=\"1263\">trừ tà sư</strong>, Huohuo lại <strong data-start=\"1276\" data-end=\"1308\">sợ ma và những điều huyền bí</strong>, khiến cô thường xuyên rơi vào những tình huống dở khóc dở cười. Tuy nhiên, dù sợ hãi, cô vẫn không từ bỏ nhiệm vụ của mình, luôn cố gắng thực hiện công việc trừ tà với tất cả sức lực.</font></p>\r\n<p data-start=\"1497\" data-end=\"1788\"><font size=\"3\" face=\"times new roman\">Sự nhút nhát của Huohuo được thể hiện rõ qua các đoạn hội thoại, nơi cô thường <strong data-start=\"1576\" data-end=\"1587\">nói lắp</strong>, lo lắng và luôn cố tìm cách trốn tránh trách nhiệm. Tuy nhiên, chính sự kiên trì và ý chí mạnh mẽ giúp cô dần trở thành một <strong data-start=\"1713\" data-end=\"1738\">người trừ tà thực thụ</strong>, ngày càng kiểm soát tốt hơn sức mạnh của mình.</font></p>\r\n<hr data-start=\"1790\" data-end=\"1793\">\r\n</h1><h2 data-start=\"1795\" data-end=\"1840\" style=\"\"><strong data-start=\"1798\" data-end=\"1838\"><font size=\"3\" face=\"times new roman\">Sức Mạnh và Lối Chơi trong Chiến Đấu</font></strong></h2><h1 style=\"font-weight: 400; font-stretch: normal; line-height: 32px; text-rendering: geometricprecision;\">\r\n<p data-start=\"1842\" data-end=\"1970\"><font size=\"3\" face=\"times new roman\">Huohuo là một nhân vật <strong data-start=\"1865\" data-end=\"1877\">hệ Phong</strong>, đi theo <strong data-start=\"1887\" data-end=\"1908\">Định Mệnh Hòa Hợp</strong>, đóng vai trò hỗ trợ hồi máu và tăng sức mạnh cho đồng đội.</font></p>\r\n<ul data-start=\"1972\" data-end=\"2386\">\r\n<li data-start=\"1972\" data-end=\"2074\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"1974\" data-end=\"1992\">Kỹ năng cơ bản</strong>: Gây sát thương Phong lên kẻ địch, giúp tạo điểm năng lượng cho kỹ năng hỗ trợ.</font></li>\r\n<li data-start=\"2075\" data-end=\"2240\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"2077\" data-end=\"2098\">Kỹ năng nguyên tố</strong> (<em data-start=\"2100\" data-end=\"2134\">Lời Cầu Nguyện của Lá Bùa Trừ Tà</em>) – Huohuo triệu hồi sức mạnh từ linh hồn quỷ Heliobus để hồi máu cho đồng đội theo phần trăm HP tối đa.</font></li>\r\n<li data-start=\"2241\" data-end=\"2386\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"2243\" data-end=\"2265\">Kỹ năng tối thượng</strong> (<em data-start=\"2267\" data-end=\"2292\">Lời Nguyện Của Linh Hồn</em>) – Tăng sức tấn công cho đồng đội, đồng thời tiếp tục hồi phục năng lượng và HP cho cả đội.</font></li>\r\n</ul>\r\n<p data-start=\"2388\" data-end=\"2535\"><font size=\"3\" face=\"times new roman\">Với bộ kỹ năng này, Huohuo là một trong những <strong data-start=\"2434\" data-end=\"2465\">hỗ trợ hồi máu mạnh mẽ nhất</strong>, giúp duy trì sức sống cho đội hình trong những trận chiến kéo dài.</font></p>\r\n<hr data-start=\"2537\" data-end=\"2540\">\r\n</h1><h2 data-start=\"2542\" data-end=\"2584\" style=\"\"><strong data-start=\"2545\" data-end=\"2582\"><font size=\"3\" face=\"times new roman\">Mối Quan Hệ Với Các Nhân Vật Khác</font></strong></h2><h1 style=\"font-weight: 400; font-stretch: normal; line-height: 32px; text-rendering: geometricprecision;\">\r\n<p data-start=\"2586\" data-end=\"2666\"><font size=\"3\" face=\"times new roman\">Huohuo có những tương tác thú vị với nhiều nhân vật trong <em data-start=\"2644\" data-end=\"2663\">Honkai: Star Rail</em>:</font></p>\r\n<ul data-start=\"2668\" data-end=\"3115\">\r\n<li data-start=\"2668\" data-end=\"2848\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"2670\" data-end=\"2681\">Fu Xuan</strong>: Với tư cách là một trong những lãnh đạo của Xianzhou Luofu, Fu Xuan thường xuyên phải nhắc nhở Huohuo <strong data-start=\"2785\" data-end=\"2817\">vượt qua nỗi sợ hãi của mình</strong> và làm tốt công việc trừ tà.</font></li>\r\n<li data-start=\"2849\" data-end=\"2964\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"2851\" data-end=\"2861\">Luocha</strong>: Dù Luocha cũng có khả năng hồi phục, nhưng vì xuất thân bí ẩn, Huohuo <strong data-start=\"2933\" data-end=\"2954\">vẫn luôn dè chừng</strong> anh ta.</font></li>\r\n<li data-start=\"2965\" data-end=\"3115\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"2967\" data-end=\"2976\">Xueyi</strong>: Một chiến binh mạnh mẽ, thường xuyên giúp đỡ Huohuo trong những nhiệm vụ trừ tà, dù đôi khi cũng trêu chọc cô về sự nhút nhát của mình.</font></li>\r\n</ul>\r\n<hr data-start=\"3117\" data-end=\"3120\">\r\n</h1><h2 data-start=\"3122\" data-end=\"3161\" style=\"\"><strong data-start=\"3125\" data-end=\"3159\"><font size=\"3\" face=\"times new roman\">Tại Sao Huohuo Được Yêu Thích?</font></strong></h2><h1 style=\"font-weight: 400; font-stretch: normal; line-height: 32px; text-rendering: geometricprecision;\">\r\n<ol data-start=\"3163\" data-end=\"3680\">\r\n<li data-start=\"3163\" data-end=\"3286\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"3166\" data-end=\"3190\">Ngoại hình dễ thương</strong>: Thiết kế của Huohuo mang đậm phong cách đáng yêu, nhưng vẫn toát lên vẻ huyền bí và độc đáo.</font></li>\r\n<li data-start=\"3287\" data-end=\"3414\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"3290\" data-end=\"3312\">Tính cách hài hước</strong>: Sự nhút nhát của Huohuo trong khi làm công việc trừ tà tạo ra những tình huống thú vị và đáng nhớ.</font></li>\r\n<li data-start=\"3415\" data-end=\"3540\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"3418\" data-end=\"3445\">Khả năng hỗ trợ mạnh mẽ</strong>: Là một trong những healer tốt nhất của game, Huohuo đóng vai trò quan trọng trong đội hình.</font></li>\r\n<li data-start=\"3541\" data-end=\"3680\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"3544\" data-end=\"3578\">Câu chuyện phát triển nhân vật</strong>: Từ một cô bé sợ hãi mọi thứ, Huohuo dần học cách đối mặt với nỗi sợ và mạnh mẽ hơn theo thời gian.</font></li>\r\n</ol>\r\n<hr data-start=\"3682\" data-end=\"3685\">\r\n</h1><h2 data-start=\"3687\" data-end=\"3704\" style=\"\"><strong data-start=\"3690\" data-end=\"3702\"><font size=\"3\" face=\"times new roman\">Kết Luận</font></strong></h2><h1 style=\"font-weight: 400; font-stretch: normal; line-height: 32px; text-rendering: geometricprecision;\">\r\n<p data-start=\"3706\" data-end=\"4085\" style=\"\"><font size=\"3\" style=\"\" face=\"times new roman\">Huohuo là một nhân vật đầy màu sắc trong <em data-start=\"3747\" data-end=\"3766\" style=\"\">Honkai: Star Rail</em>, kết hợp giữa sự đáng yêu, hài hước và sức mạnh chiến đấu đáng gờm. Dù mang trong mình nỗi sợ hãi, cô vẫn luôn cố gắng hoàn thành nhiệm vụ, trở thành một healer đáng tin cậy trên chiến trường. Nếu bạn đang tìm kiếm một nhân vật hỗ trợ mạnh mẽ với cốt truyện thú vị, Huohuo chắc chắn là một lựa chọn không thể bỏ qua!</font></p></h1></div>', '<font face=\"times new roman\">Trong thế giới rộng lớn của <em data-start=\"109\" data-end=\"128\">Honkai: Star Rail</em>, mỗi nhân vật đều mang một màu sắc riêng biệt, từ những chiến binh dũng mãnh cho đến những nhân vật bí ẩn với quá khứ sâu sắc. <strong data-start=\"256\" data-end=\"266\">Huohuo</strong>, một <strong data-start=\"272\" data-end=\"313\">thiếu nữ trừ tà mang linh hồn của quỷ</strong>, là một trong những nhân vật thú vị nhất được giới thiệu trong game.</font>'),
(9, 'Jingliu – Kiếm Khách Lạnh Lùng Của quá khứ Xianzhou', 'Jingliu1.jpg', '<div class=\"title_news\" style=\"margin-top: 10px; padding-bottom: 10px; width: 660.016px; float: left; color: rgb(51, 51, 51); background-color: rgb(255, 255, 255);\"><h3 data-start=\"0\" data-end=\"61\" style=\"\"><strong data-start=\"4\" data-end=\"59\" style=\"\"><font size=\"3\" style=\"\" face=\"times new roman\">Jingliu – Kiếm Khách Lạnh Lùng Của quá khứ Xianzhou</font></strong></h3><h1 style=\"font-weight: 400; font-stretch: normal; line-height: 32px; text-rendering: geometricprecision;\">\r\n<p data-start=\"63\" data-end=\"470\"><font size=\"3\" face=\"times new roman\">Trong <em data-start=\"69\" data-end=\"88\">Honkai: Star Rail</em>, có những nhân vật mang khí chất mạnh mẽ và thần bí, khiến người chơi không thể rời mắt. <strong data-start=\"178\" data-end=\"189\">Jingliu</strong>, một kiếm khách huyền thoại của <strong data-start=\"222\" data-end=\"240\">Xianzhou Luofu</strong>, chính là một trong số đó. Là <strong data-start=\"271\" data-end=\"295\">sư phụ của Jing Yuan</strong> và từng là một trong những chiến binh mạnh mẽ nhất Xianzhou, Jingliu có một quá khứ đau thương khi bị <strong data-start=\"398\" data-end=\"428\">nguyền rủa bởi Sự Hủy Diệt</strong>, dẫn đến việc cô dần mất đi chính mình.</font></p>\r\n<p data-start=\"472\" data-end=\"726\"><font size=\"3\" face=\"times new roman\">Tuy nhiên, ngay cả khi chìm vào bóng tối, phong thái kiếm đạo của Jingliu vẫn không hề lung lay. Sự kết hợp giữa <strong data-start=\"585\" data-end=\"648\">vẻ ngoài lạnh lùng, sức mạnh đáng sợ và quá khứ đầy bi kịch</strong> đã biến cô trở thành một trong những nhân vật lôi cuốn nhất trong trò chơi.</font></p>\r\n<hr data-start=\"728\" data-end=\"731\">\r\n</h1><h2 data-start=\"733\" data-end=\"773\" style=\"\"><strong data-start=\"736\" data-end=\"771\"><font size=\"3\" face=\"times new roman\">Ngoại Hình và Thiết Kế Nhân Vật</font></strong></h2><h1 style=\"font-weight: 400; font-stretch: normal; line-height: 32px; text-rendering: geometricprecision;\">\r\n<p data-start=\"775\" data-end=\"1097\"><font size=\"3\" face=\"times new roman\">Jingliu mang phong thái của một <strong data-start=\"807\" data-end=\"827\">kiếm sĩ lưu vong</strong>, với mái tóc trắng dài bay trong gió và ánh mắt đỏ rực như chứa đựng sự cuồng loạn bên trong. Dù có vẻ ngoài lạnh lùng, trang phục của cô vẫn giữ nguyên nét <strong data-start=\"985\" data-end=\"1014\">truyền thống của Xianzhou</strong>, tượng trưng cho quá khứ hào hùng của cô với tư cách là một kiếm khách bậc thầy.</font></p>\r\n<p data-start=\"1099\" data-end=\"1397\"><font size=\"3\" face=\"times new roman\">Điểm nhấn lớn nhất trong thiết kế của Jingliu chính là <strong data-start=\"1154\" data-end=\"1179\">đôi mắt bị nguyền rủa</strong>, tượng trưng cho việc cô bị ảnh hưởng bởi <strong data-start=\"1222\" data-end=\"1237\">Sự Hủy Diệt</strong>. Khi chiến đấu, đôi mắt này phát sáng rực rỡ, báo hiệu rằng cô đã đánh mất một phần nhân tính của mình, trở thành một kiếm sĩ chỉ còn lại bản năng chiến đấu.</font></p>\r\n<hr data-start=\"1399\" data-end=\"1402\">\r\n</h1><h2 data-start=\"1404\" data-end=\"1450\" style=\"\"><strong data-start=\"1407\" data-end=\"1448\"><font size=\"3\" face=\"times new roman\">Tính Cách – Giữa Lý Trí Và Cuồng Loạn</font></strong></h2><h1 style=\"font-weight: 400; font-stretch: normal; line-height: 32px; text-rendering: geometricprecision;\">\r\n<p data-start=\"1452\" data-end=\"1671\"><font size=\"3\" face=\"times new roman\">Trước khi rơi vào con đường Hủy Diệt, Jingliu từng là một trong những <strong data-start=\"1522\" data-end=\"1554\">kiếm sĩ vĩ đại nhất Xianzhou</strong>, được cả thiên hạ kính nể. Cô là một chiến binh điềm tĩnh, sắc sảo, và có niềm tin mạnh mẽ vào con đường kiếm đạo.</font></p>\r\n<p data-start=\"1673\" data-end=\"1890\"><font size=\"3\" face=\"times new roman\">Tuy nhiên, khi bị ảnh hưởng bởi <strong data-start=\"1705\" data-end=\"1734\">nguyền rủa từ Sự Hủy Diệt</strong>, cô dần mất đi kiểm soát bản thân, trở thành một kẻ <strong data-start=\"1787\" data-end=\"1822\">khát máu, chiến đấu không ngừng</strong>. Điều này khiến cô không thể ở lại Xianzhou nữa và phải lưu vong.</font></p>\r\n<p data-start=\"1892\" data-end=\"2113\"><font size=\"3\" face=\"times new roman\">Dù vậy, Jingliu không hoàn toàn bị bóng tối nuốt chửng. Cô vẫn giữ lại một phần lý trí, chiến đấu với sự cuồng loạn bên trong mình, tạo nên sự đối lập thú vị giữa một <strong data-start=\"2059\" data-end=\"2080\">kiếm sĩ thanh tao</strong> và một <strong data-start=\"2088\" data-end=\"2110\">chiến binh tàn bạo</strong>.</font></p>\r\n<hr data-start=\"2115\" data-end=\"2118\">\r\n</h1><h2 data-start=\"2120\" data-end=\"2165\" style=\"\"><strong data-start=\"2123\" data-end=\"2163\"><font size=\"3\" face=\"times new roman\">Sức Mạnh và Lối Chơi Trong Chiến Đấu</font></strong></h2><h1 style=\"font-weight: 400; font-stretch: normal; line-height: 32px; text-rendering: geometricprecision;\">\r\n<p data-start=\"2167\" data-end=\"2331\"><font size=\"3\" face=\"times new roman\">Jingliu là một nhân vật <strong data-start=\"2191\" data-end=\"2202\">hệ Băng</strong>, thuộc <strong data-start=\"2210\" data-end=\"2232\">Định Mệnh Hủy Diệt</strong>, đóng vai trò <strong data-start=\"2247\" data-end=\"2260\">DPS chính</strong> với sát thương cực mạnh và khả năng chuyển đổi trạng thái chiến đấu.</font></p>\r\n<ul data-start=\"2333\" data-end=\"2714\">\r\n<li data-start=\"2333\" data-end=\"2389\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"2335\" data-end=\"2353\">Kỹ năng cơ bản</strong>: Gây sát thương Băng lên kẻ địch.</font></li>\r\n<li data-start=\"2390\" data-end=\"2586\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"2392\" data-end=\"2413\">Kỹ năng nguyên tố</strong> (<em data-start=\"2415\" data-end=\"2441\">Kiếm Đạo Trong Sương Giá</em>) – Khi kích hoạt trạng thái <strong data-start=\"2470\" data-end=\"2482\">Hủy Diệt</strong>, cô tiêu hao HP của đồng đội để gia tăng sát thương và chuyển sang <strong data-start=\"2550\" data-end=\"2583\">trạng thái kiếm sĩ cuồng loạn</strong>.</font></li>\r\n<li data-start=\"2587\" data-end=\"2714\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"2589\" data-end=\"2611\">Kỹ năng tối thượng</strong> (<em data-start=\"2613\" data-end=\"2630\">Hàn Băng Vô Tận</em>) – Gây sát thương diện rộng, kết liễu kẻ địch bằng một chuỗi tấn công đầy uy lực.</font></li>\r\n</ul>\r\n<p data-start=\"2716\" data-end=\"2917\"><font size=\"3\" face=\"times new roman\">Jingliu là một <strong data-start=\"2731\" data-end=\"2763\">DPS sát thương băng cực mạnh</strong>, có thể <strong data-start=\"2772\" data-end=\"2821\">tấn công liên tục và tạo sát thương diện rộng</strong>, nhưng yêu cầu sự cân nhắc về chiến thuật, vì kỹ năng của cô có thể làm giảm HP của đồng đội.</font></p>\r\n<hr data-start=\"2919\" data-end=\"2922\">\r\n</h1><h2 data-start=\"2924\" data-end=\"2966\" style=\"\"><strong data-start=\"2927\" data-end=\"2964\"><font size=\"3\" face=\"times new roman\">Mối Quan Hệ Với Các Nhân Vật Khác</font></strong></h2><h1 style=\"font-weight: 400; font-stretch: normal; line-height: 32px; text-rendering: geometricprecision;\">\r\n<ul data-start=\"2968\" data-end=\"3468\">\r\n<li data-start=\"2968\" data-end=\"3157\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"2970\" data-end=\"2983\">Jing Yuan</strong>: Jingliu từng là <strong data-start=\"3001\" data-end=\"3025\">sư phụ của Jing Yuan</strong>, người đã huấn luyện anh trở thành một chiến tướng mạnh mẽ. Tuy nhiên, khi bị nguyền rủa, cô và Jing Yuan buộc phải đối đầu nhau.</font></li>\r\n<li data-start=\"3158\" data-end=\"3313\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"3160\" data-end=\"3190\">Dan Heng – Imbibitor Lunae</strong>: Dan Heng mang trong mình sức mạnh của hậu duệ Long Tộc, và là một trong những chiến binh có thể sánh ngang với Jingliu.</font></li>\r\n<li data-start=\"3314\" data-end=\"3468\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"3316\" data-end=\"3325\">Blade</strong>: Cả hai đều bị ảnh hưởng bởi <strong data-start=\"3355\" data-end=\"3370\">Sự Hủy Diệt</strong>, nhưng trong khi Blade <strong data-start=\"3394\" data-end=\"3425\">chịu đựng sự đau đớn bất tử</strong>, Jingliu lại bị cơn khát máu nuốt chửng.</font></li>\r\n</ul>\r\n<hr data-start=\"3470\" data-end=\"3473\">\r\n</h1><h2 data-start=\"3475\" data-end=\"3515\" style=\"\"><strong data-start=\"3478\" data-end=\"3513\"><font size=\"3\" face=\"times new roman\">Tại Sao Jingliu Được Yêu Thích?</font></strong></h2><h1 style=\"font-weight: 400; font-stretch: normal; line-height: 32px; text-rendering: geometricprecision;\">\r\n<ol data-start=\"3517\" data-end=\"4110\">\r\n<li data-start=\"3517\" data-end=\"3651\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"3520\" data-end=\"3553\">Thiết kế kiếm khách tuyệt đẹp</strong>: Vẻ ngoài thanh tao nhưng đầy bí ẩn của Jingliu khiến cô trở thành một nhân vật cực kỳ thu hút.</font></li>\r\n<li data-start=\"3652\" data-end=\"3776\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"3655\" data-end=\"3675\">Lối chơi mạnh mẽ</strong>: Là một trong những <strong data-start=\"3696\" data-end=\"3718\">DPS băng mạnh nhất</strong>, cô có thể gây sát thương cực lớn và quét sạch kẻ địch.</font></li>\r\n<li data-start=\"3777\" data-end=\"3921\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"3780\" data-end=\"3817\">Cốt truyện bi kịch nhưng cuốn hút</strong>: Từ một kiếm sĩ huyền thoại đến một chiến binh lưu vong, Jingliu mang đến một câu chuyện đầy cảm xúc.</font></li>\r\n<li data-start=\"3922\" data-end=\"4110\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"3925\" data-end=\"3954\">Mối quan hệ với Jing Yuan</strong>: Sự đối lập giữa <strong data-start=\"3972\" data-end=\"3990\">sư phụ – đồ đệ</strong>, giữa <strong data-start=\"3997\" data-end=\"4019\">quá khứ – hiện tại</strong>, khiến mối quan hệ của họ trở thành một trong những câu chuyện đáng nhớ nhất trong game.</font></li>\r\n</ol>\r\n<hr data-start=\"4112\" data-end=\"4115\">\r\n</h1><h2 data-start=\"4117\" data-end=\"4133\" style=\"\"><strong data-start=\"4120\" data-end=\"4131\"><font size=\"3\" face=\"times new roman\">Lời Kết</font></strong></h2><h1 style=\"font-weight: 400; font-stretch: normal; line-height: 32px; text-rendering: geometricprecision;\">\r\n<p data-start=\"4135\" data-end=\"4551\" style=\"\"><font size=\"3\" style=\"\" face=\"times new roman\">Jingliu là một nhân vật <strong data-start=\"4159\" data-end=\"4186\" style=\"\">vừa mạnh mẽ vừa bi kịch</strong>, đại diện cho một chiến binh bị giằng xé giữa <strong data-start=\"4233\" data-end=\"4259\" style=\"\">trách nhiệm và số phận</strong>. Sự đối lập giữa <strong data-start=\"4277\" data-end=\"4301\" style=\"\">lý trí và cuồng loạn</strong>, giữa <strong data-start=\"4308\" data-end=\"4331\" style=\"\">quá khứ và hiện tại</strong>, khiến cô trở thành một trong những nhân vật đáng nhớ nhất trong <em data-start=\"4397\" data-end=\"4416\" style=\"\">Honkai: Star Rail</em>. Nếu bạn đang tìm kiếm một <strong data-start=\"4444\" data-end=\"4496\" style=\"\">DPS mạnh, lối chơi độc đáo và cốt truyện sâu sắc</strong>, Jingliu chắc chắn là một lựa chọn không thể bỏ qua!</font></p></h1></div>', '<font face=\"times new roman\">Trong <em data-start=\"69\" data-end=\"88\">Honkai: Star Rail</em>, có những nhân vật mang khí chất mạnh mẽ và thần bí, khiến người chơi không thể rời mắt. <strong data-start=\"178\" data-end=\"189\">Jingliu</strong>, một kiếm khách huyền thoại của <strong data-start=\"222\" data-end=\"240\">Xianzhou Luofu</strong></font>');
INSERT INTO `tintuc` (`id_baiviet`, `tenbaiviet`, `anhminhhoa`, `noidung`, `tomtat`) VALUES
(11, 'Klee – Tiểu Quái Nổ Dễ Thương Nhất Mondstadt', 'Klee1.jpg', '<div class=\"title_news\" style=\"margin-top: 10px; padding-bottom: 10px; width: 480.016px; float: left; color: rgb(51, 51, 51); background-color: rgb(255, 255, 255);\"><h3 data-start=\"0\" data-end=\"54\" style=\"\"><strong data-start=\"4\" data-end=\"52\" style=\"\"><font size=\"3\" style=\"\" face=\"times new roman\">Klee – Tiểu Quái Nổ Dễ Thương Nhất Mondstadt</font></strong></h3><h1 style=\"font-weight: 400; font-stretch: normal; line-height: 32px; text-rendering: geometricprecision;\">\r\n<p data-start=\"56\" data-end=\"537\"><font size=\"3\" face=\"times new roman\">Trong <em data-start=\"62\" data-end=\"78\">Genshin Impact</em>, có những nhân vật mang đến sự phấn khích và niềm vui chỉ bằng sự xuất hiện của họ, và <strong data-start=\"166\" data-end=\"174\">Klee</strong> chính là một trong số đó! Là một <strong data-start=\"208\" data-end=\"226\">hiệp sĩ Sparks</strong>, Klee không chỉ nổi tiếng với vẻ ngoài dễ thương mà còn với những màn \"quậy banh Mondstadt\" bằng những quả bom rực rỡ của mình. Dù còn nhỏ tuổi, Klee là một trong những nhân vật <strong data-start=\"405\" data-end=\"415\">hệ Hỏa</strong> sở hữu <strong data-start=\"423\" data-end=\"453\">sát thương bùng nổ mạnh mẽ</strong>, phù hợp với biệt danh \"Tiểu Quái Nổ\" mà mọi người trong thành phố đặt cho cô bé.</font></p>\r\n<p data-start=\"539\" data-end=\"718\"><font size=\"3\" face=\"times new roman\">Nhưng đằng sau sự tinh nghịch đó, Klee vẫn là một đứa trẻ hồn nhiên, vui vẻ và đáng yêu, với một trái tim thuần khiết đầy yêu thương dành cho bạn bè, gia đình và... những vụ nổ.</font></p>\r\n<hr data-start=\"720\" data-end=\"723\">\r\n</h1><h2 data-start=\"725\" data-end=\"765\" style=\"\"><strong data-start=\"728\" data-end=\"763\"><font size=\"3\" face=\"times new roman\">Ngoại Hình và Thiết Kế Nhân Vật</font></strong></h2><h1 style=\"font-weight: 400; font-stretch: normal; line-height: 32px; text-rendering: geometricprecision;\">\r\n<p data-start=\"767\" data-end=\"1036\"><font size=\"3\" face=\"times new roman\">Klee có dáng vẻ của một cô bé <strong data-start=\"797\" data-end=\"810\">năng động</strong>, với mái tóc trắng ngắn cùng đôi mắt đỏ sáng lấp lánh đầy tinh nghịch. Cô bé luôn mặc một <strong data-start=\"901\" data-end=\"925\">bộ trang phục màu đỏ</strong> đặc trưng của <strong data-start=\"940\" data-end=\"960\">Hiệp sĩ Favonius</strong>, đi kèm với <strong data-start=\"973\" data-end=\"1000\">một chiếc balo nhỏ xinh</strong> đựng đầy bom và quà tặng bất ngờ.</font></p>\r\n<p data-start=\"1038\" data-end=\"1338\"><font size=\"3\" face=\"times new roman\">Điểm đặc biệt trong thiết kế của Klee chính là <strong data-start=\"1085\" data-end=\"1118\">chiếc mũ beret có hai cánh lá</strong> – một món quà từ mẹ cô, Alice, giúp Klee luôn cảm thấy gần gũi với gia đình. Ngoài ra, cô bé cũng thường xuyên mang theo <strong data-start=\"1240\" data-end=\"1250\">Dodoco</strong>, một món đồ chơi mà mẹ cô để lại, tượng trưng cho sự hồn nhiên và tinh nghịch của cô.</font></p>\r\n<hr data-start=\"1340\" data-end=\"1343\">\r\n</h1><h2 data-start=\"1345\" data-end=\"1399\" style=\"\"><strong data-start=\"1348\" data-end=\"1397\"><font size=\"3\" face=\"times new roman\">Tính Cách – Cô Bé Vui Vẻ Nhưng Siêu Tăng Động</font></strong></h2><h1 style=\"font-weight: 400; font-stretch: normal; line-height: 32px; text-rendering: geometricprecision;\">\r\n<p data-start=\"1401\" data-end=\"1602\"><font size=\"3\" face=\"times new roman\">Klee là một cô bé <strong data-start=\"1419\" data-end=\"1467\">hoạt bát, vui vẻ và luôn tràn đầy năng lượng</strong>. Điều cô bé thích nhất chính là <strong data-start=\"1500\" data-end=\"1515\">những vụ nổ</strong>, và không gì có thể làm Klee vui hơn là thử nghiệm những quả bom mới ở khắp mọi nơi.</font></p>\r\n<p data-start=\"1604\" data-end=\"1902\"><font size=\"3\" face=\"times new roman\">Vì tính cách <strong data-start=\"1617\" data-end=\"1638\">quá mức hiếu động</strong>, Klee thường xuyên bị <strong data-start=\"1661\" data-end=\"1715\">Jean \"tạm giam\" trong phòng để hạn chế gây rắc rối</strong>, nhưng điều đó không ngăn cản cô bé tìm mọi cách để trốn ra ngoài. Mặc dù vậy, mọi người trong Hiệp sĩ Favonius vẫn yêu thương Klee, xem cô bé như một đứa trẻ đáng yêu cần được bảo vệ.</font></p>\r\n<p data-start=\"1904\" data-end=\"2192\"><font size=\"3\" face=\"times new roman\">Một điểm đáng chú ý khác trong tính cách của Klee là <strong data-start=\"1957\" data-end=\"2002\">sự trong sáng và tình yêu dành cho bạn bè</strong>. Cô bé rất trân trọng những người thân yêu và luôn cố gắng làm mọi thứ để mang lại niềm vui cho họ, ngay cả khi những hành động của cô đôi khi... gây ra một chút thiệt hại ngoài mong đợi.</font></p>\r\n<hr data-start=\"2194\" data-end=\"2197\">\r\n</h1><h2 data-start=\"2199\" data-end=\"2244\" style=\"\"><strong data-start=\"2202\" data-end=\"2242\"><font size=\"3\" face=\"times new roman\">Sức Mạnh và Lối Chơi Trong Chiến Đấu</font></strong></h2><h1 style=\"font-weight: 400; font-stretch: normal; line-height: 32px; text-rendering: geometricprecision;\">\r\n<p data-start=\"2246\" data-end=\"2360\"><font size=\"3\" face=\"times new roman\">Klee là một <strong data-start=\"2258\" data-end=\"2277\">nhân vật hệ Hỏa</strong>, sử dụng <strong data-start=\"2287\" data-end=\"2299\">Pháp Khí</strong>, đóng vai trò là một <strong data-start=\"2321\" data-end=\"2357\">DPS chính với sát thương cực cao</strong>.</font></p>\r\n<ul data-start=\"2362\" data-end=\"2727\">\r\n<li data-start=\"2362\" data-end=\"2471\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"2364\" data-end=\"2398\">Đánh thường – Bom Nổ Liên Hoàn</strong>: Klee ném những quả bom nhỏ vào kẻ địch, gây sát thương Hỏa diện rộng.</font></li>\r\n<li data-start=\"2472\" data-end=\"2603\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"2474\" data-end=\"2505\">Kỹ năng nguyên tố – Bom Nảy</strong>: Ném ra một quả bom lớn, phát nổ nhiều lần và để lại những quả bom nhỏ tiếp tục gây sát thương.</font></li>\r\n<li data-start=\"2604\" data-end=\"2727\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"2606\" data-end=\"2651\">Kỹ năng tối thượng – Pháo Hoa Chớp Nhoáng</strong>: Triệu hồi một loạt vụ nổ liên tiếp, càn quét kẻ địch trong phạm vi rộng.</font></li>\r\n</ul>\r\n<p data-start=\"2729\" data-end=\"2970\"><font size=\"3\" face=\"times new roman\">Với lối chơi của mình, Klee là một trong những <strong data-start=\"2776\" data-end=\"2803\">DPS hệ Hỏa mạnh mẽ nhất</strong>, có thể <strong data-start=\"2812\" data-end=\"2859\">gây sát thương lớn với những vụ nổ liên tục</strong>, đặc biệt hiệu quả khi kết hợp với những nhân vật hỗ trợ khuếch đại sát thương như <strong data-start=\"2943\" data-end=\"2967\">Bennett hoặc Sucrose</strong>.</font></p>\r\n<hr data-start=\"2972\" data-end=\"2975\">\r\n</h1><h2 data-start=\"2977\" data-end=\"3019\" style=\"\"><strong data-start=\"2980\" data-end=\"3017\"><font size=\"3\" face=\"times new roman\">Mối Quan Hệ Với Các Nhân Vật Khác</font></strong></h2><h1 style=\"font-weight: 400; font-stretch: normal; line-height: 32px; text-rendering: geometricprecision;\">\r\n<ul data-start=\"3021\" data-end=\"3635\">\r\n<li data-start=\"3021\" data-end=\"3216\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"3023\" data-end=\"3031\">Jean</strong>: Jean là người thường xuyên phải <strong data-start=\"3065\" data-end=\"3082\">giám sát Klee</strong>, đảm bảo rằng cô bé không gây ra quá nhiều rắc rối. Dù nghiêm khắc, Jean thực sự rất yêu quý Klee và xem cô như một đứa em gái nhỏ.</font></li>\r\n<li data-start=\"3217\" data-end=\"3356\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"3219\" data-end=\"3229\">Albedo</strong>: Là một người anh trai trên danh nghĩa, Albedo luôn quan tâm và bảo vệ Klee, giúp cô bé trong những lần thí nghiệm \"bom nổ\".</font></li>\r\n<li data-start=\"3357\" data-end=\"3506\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"3359\" data-end=\"3368\">Razor</strong>: Cả hai đều là những đứa trẻ hoang dã, thích khám phá thế giới theo cách riêng của mình, khiến họ trở thành những người bạn thân thiết.</font></li>\r\n<li data-start=\"3507\" data-end=\"3635\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"3509\" data-end=\"3527\">Kaeya và Venti</strong>: Hai người này thường xuyên trêu chọc Klee, nhưng cũng rất thích thú với những trò nghịch ngợm của cô bé.</font></li>\r\n</ul>\r\n<hr data-start=\"3637\" data-end=\"3640\">\r\n</h1><h2 data-start=\"3642\" data-end=\"3679\" style=\"\"><strong data-start=\"3645\" data-end=\"3677\"><font size=\"3\" face=\"times new roman\">Tại Sao Klee Được Yêu Thích?</font></strong></h2><h1 style=\"font-weight: 400; font-stretch: normal; line-height: 32px; text-rendering: geometricprecision;\">\r\n<ol data-start=\"3681\" data-end=\"4193\">\r\n<li data-start=\"3681\" data-end=\"3804\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"3684\" data-end=\"3705\">Thiết kế đáng yêu</strong>: Klee có ngoại hình nhỏ nhắn, đáng yêu với phong cách tinh nghịch, khiến bất kỳ ai cũng yêu mến.</font></li>\r\n<li data-start=\"3805\" data-end=\"3904\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"3808\" data-end=\"3830\">Tính cách vui nhộn</strong>: Sự hồn nhiên và năng lượng của Klee mang đến sự vui vẻ cho người chơi.</font></li>\r\n<li data-start=\"3905\" data-end=\"4033\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"3908\" data-end=\"3930\">Sát thương bùng nổ</strong>: Là một trong những DPS hệ Hỏa mạnh nhất, Klee có thể tạo ra những vụ nổ liên tục trên chiến trường.</font></li>\r\n<li data-start=\"4034\" data-end=\"4193\"><font size=\"3\" face=\"times new roman\"><strong data-start=\"4037\" data-end=\"4061\">Cốt truyện dễ thương</strong>: Câu chuyện về Klee là sự pha trộn giữa những khoảnh khắc hài hước và những tình tiết đầy cảm xúc về gia đình và sự trưởng thành.</font></li>\r\n</ol>\r\n<hr data-start=\"4195\" data-end=\"4198\">\r\n</h1><h2 data-start=\"4200\" data-end=\"4217\" style=\"\"><strong data-start=\"4203\" data-end=\"4215\"><font size=\"3\" face=\"times new roman\">Kết Luận</font></strong></h2><h1 style=\"font-weight: 400; font-stretch: normal; line-height: 32px; text-rendering: geometricprecision;\">\r\n<p data-start=\"4219\" data-end=\"4597\" style=\"\"><font size=\"3\" style=\"\" face=\"times new roman\">Klee không chỉ là một nhân vật <strong data-start=\"4250\" data-end=\"4277\" style=\"\">mạnh mẽ trong chiến đấu</strong>, mà còn là một <strong data-start=\"4293\" data-end=\"4322\" style=\"\">nguồn năng lượng tích cực</strong> trong <em data-start=\"4329\" data-end=\"4345\" style=\"\">Genshin Impact</em>. Cô bé mang đến sự tươi vui, những khoảnh khắc hài hước và cả những vụ nổ bất ngờ khiến mọi người phải dè chừng. Nếu bạn đang tìm kiếm một nhân vật <strong data-start=\"4494\" data-end=\"4553\" style=\"\">vừa dễ thương, vừa mạnh mẽ, vừa đầy tinh thần phiêu lưu</strong>, thì Klee chắc chắn là lựa chọn hoàn hảo!</font></p></h1></div>', '<font face=\"times new roman\">Trong <em data-start=\"62\" data-end=\"78\">Genshin Impact</em>, có những nhân vật mang đến sự phấn khích và niềm vui chỉ bằng sự xuất hiện của họ, và <strong data-start=\"166\" data-end=\"174\">Klee</strong> chính là một trong số đó! Là một <strong data-start=\"208\" data-end=\"226\">hiệp sĩ Sparks</strong>, Klee không chỉ nổi tiếng với vẻ ngoài dễ thương mà còn với những màn \"quậy banh Mondstadt\" bằng những quả bom rực rỡ của mình.</font>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `created_date`) VALUES
(1, 'admin', '123', '2015-03-05 16:09:53');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id_video` int(11) NOT NULL,
  `tenvideo` varchar(255) NOT NULL,
  `anhvideo` varchar(255) NOT NULL,
  `linkvideo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id_video`, `tenvideo`, `anhvideo`, `linkvideo`) VALUES
(10, 'Ng.Thạch Free & Genshin Bất Ngờ Tung Ra Quả Bom Cốt Truyện! Teyvat Chuyện Chưa Kể: Hồi Sinh Nữ Thần', 'video1.PNG', 'https://youtu.be/IZTDWrUzcVQ?si=W_E_AMgbavZ4dyl1'),
(11, 'UNBOXING GENSHIN IMPACT ???? Mondstadt Battlefield Heroes Blind Box Figures with RARE BARBATOS STATUE', 'video2.PNG', 'https://youtu.be/QEeDoR75r1g?si=Ytry1i4zm-N4fdnq'),
(15, 'Ng.Thạch Free & Genshin Bất Ngờ Tung Ra Quả Bom Cốt Truyện! Teyvat Chuyện Chưa Kể: Hồi Sinh Nữ Thần', 'Ganyu2.png', 'https://www.youtube.com/watch?v=uSBO5wYZui');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `nhanvat`
--
ALTER TABLE `nhanvat`
  ADD PRIMARY KEY (`nhanvat_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id_baiviet`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `nhanvat`
--
ALTER TABLE `nhanvat`
  MODIFY `nhanvat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id_baiviet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD CONSTRAINT `cart_detail_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
