-- Tạo Database
CREATE DATABASE IF NOT EXISTS shop_figure;
USE shop_figure;

-- Tạo bảng cart
CREATE TABLE `cart` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `fullname` VARCHAR(255) NOT NULL,
  `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- Chèn dữ liệu vào cart
INSERT INTO `cart` (`id`, `fullname`, `date`) VALUES
(24, 'thao@yahoo.com', '2015-03-06 02:09:24'),
(25, 'thao@yahoo.com', '2015-03-06 04:39:25'),
(26, 'thao@yahoo.com', '2015-03-08 12:18:20');

-- Tạo bảng products
CREATE TABLE `products` (
  `product_id` INT(11) NOT NULL AUTO_INCREMENT,
  `product_cat` INT(11) NOT NULL,
  `product_brand` INT(11) NOT NULL,
  `product_title` VARCHAR(255) NOT NULL,
  `product_price` INT(11) NOT NULL,
  `product_desc` TEXT NOT NULL,
  `product_image` VARCHAR(255) NOT NULL,
  `product_keywords` TEXT NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- Chèn dữ liệu vào bảng products
INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(41, 1, 1, 'Product 41', 1000, 'Description', 'image.jpg', 'keywords'),
(44, 1, 1, 'Product 44', 1400, 'Description', 'image.jpg', 'keywords'),
(45, 1, 1, 'Product 45', 600, 'Description', 'image.jpg', 'keywords'),
(46, 1, 1, 'Product 46', 1000, 'Description', 'image.jpg', 'keywords'),
(50, 1, 1, 'Product 50', 1000, 'Description', 'image.jpg', 'keywords'),
(57, 1, 1, 'Product 57', 1400, 'Description', 'image.jpg', 'keywords');

-- Tạo bảng cart_detail
CREATE TABLE `cart_detail` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `cart_id` INT(11) NOT NULL,
  `product_id` INT(11) NOT NULL,
  `quantity` INT(11) NOT NULL DEFAULT 1,
  `price` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_id` (`cart_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `cart_detail_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cart_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- Chèn dữ liệu vào cart_detail
INSERT INTO `cart_detail` (`id`, `cart_id`, `product_id`, `quantity`, `price`) VALUES
(32, 24, 46, 2, 1000),
(33, 24, 50, 1, 1000),
(34, 25, 57, 1, 1400),
(35, 25, 45, 1, 600),
(36, 25, 41, 1, 1000),
(37, 26, 44, 1, 1400),
(38, 26, 41, 1, 1000);

-- Tạo bảng customers
CREATE TABLE `customers` (
  `customer_id` INT(11) NOT NULL AUTO_INCREMENT,
  `customer_name` VARCHAR(255) NOT NULL,
  `customer_email` VARCHAR(255) NOT NULL,
  `customer_pass` VARCHAR(255) NOT NULL,
  `customer_country` VARCHAR(100) NOT NULL,
  `customer_city` VARCHAR(100) NOT NULL,
  `customer_contact` VARCHAR(100) NOT NULL,
  `customer_image` VARCHAR(255) NOT NULL,
  `customer_address` TEXT NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- Chèn dữ liệu vào customers
INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_image`, `customer_address`) VALUES
(1, 'dai', 'dai@yahoo.com', '12345', 'Viet Nam', 'TPHCM', '08989344', '', '1232'),
(2, 'thao', 'thao@yahoo.com', '123', 'Viet Nam', 'TPHCM', '42', '3.jpg', '543'),
(3, 'long', 'long@yahoo.com', '123456', 'Viet Nam', 'TPHCM', '12/5', '6.jpg', '543');

-- Tạo bảng users
CREATE TABLE `users` (
  `user_id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(200) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `created_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- Chèn dữ liệu vào users
INSERT INTO `users` (`user_id`, `username`, `password`, `created_date`) VALUES
(1, 'admin', 'admin!123', '2015-03-05 16:09:53');

-- Tạo bảng video
CREATE TABLE `video` (
  `id_video` INT(11) NOT NULL AUTO_INCREMENT,
  `tenvideo` VARCHAR(255) NOT NULL,
  `anhvideo` VARCHAR(255) NOT NULL,
  `linkvideo` TEXT NOT NULL,
  PRIMARY KEY (`id_video`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- Tạo bảng tintuc
CREATE TABLE `tintuc` (
  `id_baiviet` INT(11) NOT NULL AUTO_INCREMENT,
  `tenbaiviet` VARCHAR(255) NOT NULL,
  `anhminhhoa` VARCHAR(255) NOT NULL,
  `noidung` LONGTEXT NOT NULL,
  `tomtat` LONGTEXT NOT NULL,
  PRIMARY KEY (`id_baiviet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- Kết thúc lệnh
COMMIT;
