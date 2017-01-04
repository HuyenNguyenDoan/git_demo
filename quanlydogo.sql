-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2016 at 05:03 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlydogo`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `hot_category` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `hot_category`) VALUES
(3, 'Bàn Ghế', 1),
(4, 'Giường', 1),
(5, 'Kệ Ti Vi', 1),
(6, 'Tủ', 1),
(7, 'Cầu Thang', 1),
(8, 'Cửa', 1),
(9, 'Bàn Thờ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `id_user`, `id_product`, `content`, `created_at`) VALUES
(1, 5, 20, 'sản phẩm này khá hay', '2016-11-09 19:15:32'),
(3, 12, 22, 'hợp giá cả túi tiền', '2016-11-04 19:16:19'),
(5, 13, 22, 'cũng được nhưng còn xem độ bền', '2016-11-21 19:23:28'),
(6, 17, 21, 'thiết kế sang trọng mẫu mã sáng tạo', '0000-00-00 00:00:00'),
(7, 13, 11, '                                                  \r\n giường này giá bao nhiêu vậy ad.', NULL),
(8, 13, 11, '                                                  \r\n                      cái này có được khuyến mại không ad?    ', NULL),
(9, 5, 21, '                                                  \r\n                       sản phẩm này khá hay   ', NULL),
(10, 5, 33, '     bàn này giá bao nhiêu ad?                                             \r\n                          ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `fullname` varchar(300) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `email` varchar(300) NOT NULL,
  `address` varchar(300) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fullname`, `phone_number`, `email`, `address`, `content`) VALUES
(1, 'Nguyễn Doãn huyên', '0123456978', 'huyen@gmai.com', 'Bắc Ninh', 'tôi muốn hợp tác vối bên anh'),
(4, 'Hồ Việt Chung', '0123456789', 'chung@gmail.com', 'Tp.HCM', 'anh muốn bên e thiết kế cho anh một mẫu \r\n                                             ');

-- --------------------------------------------------------

--
-- Table structure for table `countviews`
--

CREATE TABLE `countviews` (
  `id` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `view_day` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countviews`
--

INSERT INTO `countviews` (`id`, `id_product`, `ip_address`, `view_day`) VALUES
(1, 6, '02666555', '2016-12-27 14:56:46');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `fullname` varchar(300) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fullname`, `phone_number`, `address`) VALUES
(3, 'trac', '0123456789', 'Nam định '),
(5, 'Hồ Việt Chung', '0123456789', 'Hà Nội 3'),
(6, 'nguyeenx doan huyen', '0123456789', 'Hai Bà Trưng ,Hà Nội'),
(7, 'tester', '01548945458', 'hanoi'),
(8, 'VU HUY Hung', '0123456789', 'ha Tay hoai duc'),
(9, 'Van Ha', '0123456789', 'nam dinh'),
(10, 'Văn tiến', '0123456789', 'Tp. HCM'),
(11, 'Vu duy phúc', '0123456789', '2566662');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `content` text,
  `images` varchar(300) DEFAULT NULL,
  `hot_news` int(1) NOT NULL,
  `created_at` datetime DEFAULT NULL COMMENT '20 / 10 /2016'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `images`, `hot_news`, `created_at`) VALUES
(1, 'Giá gỗ lên cao nhiều người thu mua khó khăn khi mua gỗ.Bộ cửa đi sang trọng được sử dụng rộng rãi ở các nhà hiện nay.', 'đây là tin tức 1', 'news1.jpg', 0, NULL),
(2, 'Bộ cửa đi sang trọng được sử dụng rộng rãi ở các nhà hiện nay.', 'đây là tin tức 2', 'new2.jpg', 1, NULL),
(3, 'Đồ gỗ mỹ nghệ làng đồng kị đang được xem xét là làng nghề truyền thống.', 'Đồ gỗ mỹ nghệ làng đồng kị đang được xem xét là làng nghề truyền thống.', 'new3.jpg', 1, NULL),
(4, 'Giá gỗ lên cao nhiều người thu mua khó khăn khi mua gỗ.', 'Giá gỗ lên cao nhiều người thu mua khó khăn khi mua gỗ.', 'new4.jpg', 1, NULL),
(5, 'Bộ cửa đi sang trọng được sử dụng rộng rãi ở các nhà hiện nay.', 'Bộ cửa đi sang trọng được sử dụng rộng rãi ở các nhà hiện nay.', 'new5.jpg', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `address` varchar(500) NOT NULL,
  `phone_number` varchar(11) DEFAULT NULL,
  `total_price` double(11,0) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) DEFAULT '0',
  `name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `id_user`, `address`, `phone_number`, `total_price`, `created_at`, `status`, `name`) VALUES
(15, 2, 'ha Tay hoai duc', '0123456', NULL, '2016-12-26 16:36:12', 0, NULL),
(16, 2, 'THAINGUYEN', NULL, 1000000, '2016-12-26 14:51:17', 0, NULL),
(17, 2, 'nam dinh', NULL, 3013000, '2016-12-26 15:23:00', 0, NULL),
(18, 1, 'TP. Bắc Ninh', '0164455892', 44000, '2016-12-28 17:00:11', 0, NULL),
(19, 0, 'Tp. HCM', NULL, 3007000, '2016-12-28 17:21:12', 0, NULL),
(20, 0, '2566662', NULL, 240000, '2016-12-28 21:07:01', 0, 'Vu duy phúc'),
(21, 6, 'TP. Bắc Ninh', '0164455892', 204000, '2016-12-28 21:48:18', 0, NULL),
(22, 6, 'Tp.hcm', '0164455892', 240000, '2016-12-28 21:49:00', 0, NULL),
(23, 6, 'Hà Nam', '0164455892', 3100000, '2016-12-28 21:49:33', 0, NULL),
(24, 10, 'TP.HCM', '025896314', 300000, '2016-12-28 21:50:43', 0, NULL),
(25, 10, 'TP.HCM', '0164455892', 254000, '2016-12-28 21:51:18', 0, NULL),
(26, 7, 'Hải Dương', '025874136', 400000, '2016-12-28 21:52:51', 0, NULL),
(27, 7, 'Hải Dương', '0164455892', 400000, '2016-12-28 21:53:32', 0, NULL),
(28, 1, '', '', 0, '2016-12-28 22:39:13', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(11,0) NOT NULL,
  `total_price` double(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`, `total_price`) VALUES
(6, 15, 41, 1, 4000, 4000),
(7, 15, 42, 2, 40000, 80000),
(8, 15, 32, 1, 200000, 200000),
(9, 17, 40, 1, 3000, 3000),
(10, 17, 31, 1, 10000, 10000),
(11, 17, 33, 1, 3000000, 3000000),
(12, 18, 42, 1, 40000, 40000),
(13, 18, 41, 1, 4000, 4000),
(14, 19, 40, 1, 3000, 3000),
(15, 19, 33, 1, 3000000, 3000000),
(16, 19, 41, 1, 4000, 4000),
(17, 20, 42, 1, 40000, 40000),
(18, 20, 39, 1, 200000, 200000),
(19, 21, 41, 1, 4000, 4000),
(20, 21, 39, 1, 200000, 200000),
(21, 22, 42, 1, 40000, 40000),
(22, 22, 12, 1, 100000, 100000),
(23, 22, 21, 1, 100000, 100000),
(24, 23, 12, 1, 100000, 100000),
(25, 23, 33, 1, 3000000, 3000000),
(26, 24, 19, 2, 100000, 200000),
(27, 24, 11, 1, 100000, 100000),
(28, 25, 32, 1, 200000, 200000),
(29, 25, 41, 1, 4000, 4000),
(30, 25, 23, 1, 50000, 50000),
(31, 26, 15, 1, 100000, 100000),
(32, 26, 16, 1, 100000, 100000),
(33, 26, 20, 1, 100000, 100000),
(34, 26, 7, 1, 100000, 100000),
(35, 27, 32, 1, 200000, 200000),
(36, 27, 39, 1, 200000, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` bigint(11) NOT NULL,
  `view` bigint(20) DEFAULT NULL,
  `images` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `type_of_wood_id` int(11) NOT NULL,
  `description` longtext,
  `quantity` int(11) NOT NULL,
  `hot_product` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `view`, `images`, `category_id`, `type_of_wood_id`, `description`, `quantity`, `hot_product`) VALUES
(6, 'Bàn Ghế 1', 100000, 9, 't1.jpg', 3, 3, '', 1, 1),
(7, 'Bàn Ghế 2', 100000, 3, 't2.jpg', 3, 2, '', 1, 1),
(8, 'Bàn Ghế 3', 100000, 3, 't3.jpg', 3, 4, '', 1, 1),
(9, 'Bàn Ghế 4', 100000, 0, 't4.jpg', 3, 6, '', 1, 0),
(10, 'Giường 1', 100000, 13, 'b1.jpg', 4, 2, '', 2, 1),
(11, 'Giường 2', 100000, 3, 'b2.jpg', 4, 4, '', 3, 1),
(12, 'Giường 3', 100000, 0, 'b3.jpg', 4, 2, '', 3, 1),
(13, 'Giường 4', 100000, 0, 'b4.jpg', 4, 4, '', 4, 0),
(14, 'Kệ Ti Vi 1', 100000, 0, 'TV1.jpg', 5, 5, '', 2, 1),
(15, 'Kệ Ti Vi 2', 100000, 0, 'TV2.jpg', 5, 5, '', 2, 1),
(16, 'Kệ Ti Vi 3', 100000, 0, 'Tv3.jpg', 5, 3, '', 2, 1),
(17, 'Kệ Ti Vi 4', 100000, 0, 'Tv4.jpg', 5, 6, '', 2, 0),
(18, 'Tủ 1', 100000, 0, 'k1.jpg', 6, 4, '', 2, 1),
(19, 'cửa 1', 100000, 0, 'd1.jpg', 8, 6, '', 2, 1),
(20, 'Tủ 2', 100000, 0, 'k2.jpg', 6, 6, '', 2, 1),
(21, 'Tủ 3', 100000, 0, 'k3.jpg', 6, 7, '', 2, 1),
(23, 'cửa 3', 50000, 0, 'd3.jpg', 8, 7, ' đây là cửa', 2, 1),
(24, 'Bàn ghế 5', 300000, 0, 't5.jpg', 3, 7, 'bàn ghế', 3, 0),
(25, 'Giường 5', 3000000, 0, 'b5.jpg', 4, 3, 'giường ngủ', 2, 0),
(26, 'Giường 6', 600000, 0, 'b6.jpg', 4, 3, 'giường ngủ', 2, 0),
(27, 'Kệ Ti Vi 5', 250000, 0, 'Tv5.jpg', 5, 2, 'kệ ti vi ', 3, 0),
(28, 'Kệ Ti Vi 6', 350000, 0, 'Tv6.jpg', 5, 2, 'kệ ti vi', 1, 0),
(29, 'Tủ 4', 100000, 0, 'k4.jpg', 6, 2, 'tủ bếp', 0, 0),
(30, 'Tủ 5', 650000, 0, 'k5.jpg', 6, 2, 'tủ bếp', 0, 0),
(31, 'Cầu Thang 1', 10000, 0, 's1.jpg', 7, 4, 'cầu thang', 0, 1),
(32, 'Cầu Thang 2', 200000, 0, 's2.jpg', 7, 4, 'cầu thang', 0, 1),
(33, 'Cầu Thang 3', 3000000, 0, 's3.jpg', 7, 4, '', 0, 1),
(34, 'Cầu Thang 4', 400000, 0, 's4.jpg', 7, 5, '', 0, 0),
(35, 'Cầu Thang 5', 5000000, 0, 's5.jpg', 7, 5, '', 0, 0),
(36, 'Cầu Thang 6', 600000, 0, 's6.jpg', 7, 5, '', 0, 0),
(38, 'Bàn Thờ 1', 100000, 0, 'bantho1.jpg', 9, 5, '', 0, 0),
(39, 'Bàn Thờ 2', 200000, 0, 'bantho2.jpg', 9, 6, '', 0, 1),
(40, 'Bàn Thờ 3', 3000, 0, 'bantho3.jpg', 9, 6, '', 0, 1),
(41, 'Bàn Thờ 4', 4000, 0, 'bantho4.jpg', 9, 3, '', 0, 1),
(42, 'Cửa 2', 40000, NULL, 'd2.jpg', 8, 6, NULL, 2, 1),
(43, 'Bàn Ghế7', 500000, 0, 't4.jpg', 3, 2, 'đây là bà ghế mới', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `address` varchar(300) DEFAULT NULL,
  `phone_number` varchar(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `address`, `phone_number`, `id_user`) VALUES
(1, 'Ha Noi', '0123456789', 1),
(2, 'Tp.Hcm', '0123456789', 2);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(300) NOT NULL,
  `link` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `title`, `image`, `link`) VALUES
(1, 'slide1', 'slider1.jpg', ''),
(2, 'slide2', 'slider1.jpg', ''),
(3, 'slide3', 'slider1.jpg', ''),
(4, 'slide4', 'slider1.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `type_of_wood`
--

CREATE TABLE `type_of_wood` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `hot_type_of_wood` bigint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_of_wood`
--

INSERT INTO `type_of_wood` (`id`, `name`, `hot_type_of_wood`) VALUES
(2, 'Gỗ Lim', 1),
(3, 'Gỗ Xoan', 1),
(4, 'Gỗ Hương', 1),
(5, 'Gỗ Gụ', 1),
(6, 'Gỗ Cam Xe', 1),
(7, 'Gỗ Nghiến', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Doãn Huyên', 'huyendoan1809@gmail.com', '$2y$10$1C.w7Y8.Amwyr/bT3klKHuaq9rII3bosfRQdWmQlMMfqjjY4NUzDm', 1, '5tx4Ql2iKruarsWraP67QvgL6C3SzPiMdpkHo7DCEWLBualtotmK5RjAKYO3', NULL, NULL),
(2, 'Hồ Việt Chung', 'chung@gmail.com', '$2y$10$Bw0zzEvyC2asxyaWJa1/HOgdcV9WMkLV9c51eyHgHuJRQ9utOsbXG', 0, 'Xh7e1j6dEKbVFWzxqIvvLSwOJQXJkvYgYYmGtLacabVvXFUeypvMlEHwQcZz', NULL, NULL),
(5, 'Trần lê tùng', 'tung@gmail.com', '$2y$10$cIiIgzZz7oMd5MDZaKW30eckiAZW4H/Vi6uHicSXZ3gaYXTW5vm2W', 0, 'RYr4vDd9a3N6iVIjpcfPOZlCW14oCb7Au5W30nrTfKRksBfko8kAAB30356X', NULL, NULL),
(6, 'Ưng hoàng Phúc', 'phuc@gmail.com', '$2y$10$t.y4cUoCWsFqY16piV6ZWuM/GYwUwg8QALeeNr21SSxTQjLeJBgsW', 0, 'RbKxsaBBRlv8FXOcu5fKa7tNbs7XGT0Kv5yb8YsuwhXltuYJiuqsKX02LrKo', NULL, NULL),
(7, 'Bùi bích phương', 'phuong@gmail.com', '$2y$10$nHg7iu/mlwC6vqCYGytC3.ilrpnPiNf4yqN3pV4iBjVbgnna1F6S2', 0, 'w9ETQ9xhQ0NnJ4mCJxuGSzkNoEl71WO44f5A8fAo08S3IBpSuYzx5VCImBL3', NULL, NULL),
(8, 'Hồ quang Hiếu', 'hieu@gmail.com', '$2y$10$WNEAODvrSbi9OXUwcrGezOmx84u8sahB/u9BcFIzcu2pGqj0jLuo.', 0, 'eiQeJE90VLVVv3whEdOqq1Ai5TehpboqtD8iOCEXQhfyjcNEzyNcHhKSlZ0S', NULL, NULL),
(9, 'Phan duy anh', 'duyanh@gmail.com', '$2y$10$HjSosE2ECdb.n5ECAqy5Suerja7GX.NxZ1usIOXrkelDxd1N3OlDS', 0, 'hVUumwIOOiMUV6Hawr39ViUoOQCw4OMm3azEulokimMGZoSmEKSeqA22Vjcb', NULL, NULL),
(10, 'Nguyễn Văn Chung', 'vanchung@gmail.com', '$2y$10$TpfhyVpAEoIsTnz3WPiH9epmxNuJfLk9l/Xu.5LQTMeplgldxWgxm', 0, 'RnV8zDPtn5Mmym6tKnRTWpiOrkWWsXYqQpuZ7UXTdXdvUEGgarCBYDvclR65', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countviews`
--
ALTER TABLE `countviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_of_wood`
--
ALTER TABLE `type_of_wood`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `countviews`
--
ALTER TABLE `countviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `type_of_wood`
--
ALTER TABLE `type_of_wood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
