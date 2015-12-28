-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 22, 2011 at 09:12 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fashion`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(5) NOT NULL auto_increment,
  `active` tinyint(1) NOT NULL default '1',
  `name` varchar(250) character set utf8 collate utf8_unicode_ci NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `active`, `name`, `created`, `modified`) VALUES
(1, 1, 'Blue - Exchange', '2011-04-01 10:46:21', '2011-04-02 20:11:51'),
(2, 1, 'D&G', '2011-04-01 10:46:51', '2011-04-01 10:46:57'),
(5, 1, 'FOCI', '2011-04-02 15:14:04', '2011-04-02 15:14:04'),
(6, 1, 'Gucci', '2011-04-02 15:31:43', '2011-04-02 15:31:43');

-- --------------------------------------------------------

--
-- Table structure for table `cake_sesions`
--

CREATE TABLE `cake_sesions` (
  `id` varchar(255) NOT NULL,
  `data` text,
  `expires` int(11) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cake_sesions`
--


-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(10) default NULL,
  `lft` int(10) unsigned default NULL,
  `rght` int(10) unsigned default NULL,
  `active` tinyint(1) unsigned default '1',
  `sort` int(11) unsigned default NULL,
  `name` varchar(250) NOT NULL,
  `descripton` text NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `lft`, `rght`, `active`, `sort`, `name`, `descripton`, `created`, `modified`) VALUES
(1, NULL, 1, 10, 1, NULL, 'Nam', 'Thu muc nam', '2011-05-10 09:58:54', '2011-05-18 11:42:27'),
(2, 1, 2, 3, 1, NULL, 'Ão thun nam', 'Ão thun nam', '2011-05-10 10:05:09', '2011-05-18 11:42:27'),
(3, NULL, 11, 22, 1, NULL, 'Ná»¯', '', '2011-05-10 10:06:32', '2011-05-16 17:02:14'),
(4, NULL, 23, 30, 1, NULL, 'Phá»¥ Kiá»‡n Thá»i Trang', '', '2011-05-10 10:07:14', '2011-05-12 01:26:17'),
(5, 1, 4, 5, 1, NULL, 'Ão sÆ¡ mi nam', '', '2011-05-10 10:35:53', '2011-05-18 11:42:27'),
(6, 1, 6, 7, 1, NULL, 'Ão khoÃ¡c nam', 'Ão khoÃ¡c nam thá»i trang', '2011-05-10 10:36:41', '2011-05-18 11:42:28'),
(7, 1, 8, 9, 1, NULL, 'Jeans/Khaki nam', 'Quáº§n Jeans/Khaki nam thá»i trang', '2011-05-10 10:37:51', '2011-05-18 11:42:28'),
(8, 3, 12, 13, 1, NULL, 'Ão thun ná»¯', '', '2011-05-10 10:38:37', '2011-05-16 17:03:20'),
(9, 3, 14, 15, 1, NULL, 'Ão sÆ¡ mi ná»¯', '', '2011-05-10 10:39:26', '2011-05-15 19:20:46'),
(10, 3, 16, 17, 1, NULL, 'VÃ¡y/Ä‘áº§m', '', '2011-05-10 10:40:18', '2011-05-11 15:56:42'),
(11, 3, 18, 19, 1, NULL, 'Jeans/Khaki ná»¯', 'Quáº§n Jeans/Khaki Ná»¯', '2011-05-10 10:41:25', '2011-05-10 12:51:47'),
(12, 3, 20, 21, 1, NULL, 'Ão khoÃ¡c ná»¯', '', '2011-05-10 10:42:05', '2011-05-16 17:03:04'),
(13, 4, 24, 25, 1, NULL, 'KÃ­nh máº¯t', '', '2011-05-10 10:43:26', '2011-05-16 17:03:11'),
(14, 4, 26, 27, 1, NULL, 'DÃ¢y ná»‹t', '', '2011-05-10 10:44:21', '2011-05-16 16:00:44'),
(15, 4, 28, 29, 1, NULL, 'TÃºi xÃ¡ch/VÃ­', '', '2011-05-10 10:45:09', '2011-05-11 13:46:57');

-- --------------------------------------------------------

--
-- Table structure for table `categories_products`
--

CREATE TABLE `categories_products` (
  `category_id` int(10) unsigned NOT NULL default '0',
  `product_id` int(10) unsigned NOT NULL default '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories_products`
--

INSERT INTO `categories_products` (`category_id`, `product_id`) VALUES
(8, 12),
(5, 1),
(11, 11),
(13, 3),
(5, 4),
(5, 5),
(10, 6),
(10, 7),
(13, 66);

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL auto_increment,
  `content_category_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL default '1',
  `name` varchar(250) character set utf8 collate utf8_unicode_ci NOT NULL,
  `description` text character set utf8 collate utf8_unicode_ci NOT NULL,
  `url` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `content_category_id`, `active`, `name`, `description`, `url`, `created`, `modified`) VALUES
(1, 2, 0, 'Trang chá»§', '', '', '2011-04-03 08:41:25', '2011-04-03 08:41:25'),
(2, 1, 0, 'ThÃ´ng tin liÃªn há»‡', 'TÃªn           : DÆ°Æ¡ng Thá»‹ Tháº¯m - Tráº§n Thá»‹ HoÃ i NhÃ¢n\r\nÄá»‹a chá»‰      : Lá»›p 09TLT\r\nEmail        : duongthitham.88@gmail.com - moctinh88@gmail.com\r\nÄiá»‡n thoáº¡i : 01266.69.49.44 - 01205.12.11.33', '', '2011-04-03 08:47:28', '2011-04-03 08:47:28'),
(3, 1, 0, 'Giá»›i thiá»‡u', 'T&N Fashion shop lÃ  website Ä‘Æ°á»£c xÃ¢y dá»±ng vÃ  phÃ¡t triá»ƒn bá»Ÿi 2 thÃ nh viÃªn cá»§a lá»›p 09TLT :Tháº¯m vÃ  NhÃ¢n.\r\nWebsite Ä‘Æ°á»£c phÃ¡t triá»ƒn dá»±a framework Cakephp vÃ  sá»‘ thÆ° viá»‡n khÃ¡c nhÆ° Jquery, Open Flash Chart. \r\nDá»¯ liá»‡u trÃªn trang web chá»‰ mang tÃ­nh cháº¥t tham kháº£o, thÃ´ng tin cá»§a sáº£n pháº©m Ä‘Æ°á»£c láº¥y tá»« cÃ¡c trang web bÃ¡n hÃ ng thá»i trang. VÃ¬ tháº¿ giÃ¡ cáº£ hay thÃ´ng tin liÃªn quan, chÃºng tÃ´i khÃ´ng Ä‘áº£m báº£o lÃ  hoÃ n toÃ n chÃ­nh xÃ¡c.\r\nMong nháº­n Ä‘Æ°á»£c sá»± gÃ³p Ã½ cá»§a táº¥t cáº£ cÃ¡c báº¡n.Má»i sá»± gÃ³p Ã½, yÃªu cáº§u xin gá»Ÿi vá» email:duongthitham.88@gmail.com - moctinh88@gmail.com\r\nXin chÃ¢n thÃ nh cáº£m Æ¡n\r\n', '', '2011-04-03 09:07:37', '2011-04-03 09:07:37'),
(4, 2, 0, 'XÃ¡c nháº­n Ä‘áº·t hÃ ng', 'Cáº£m Æ¡n báº¡n Ä‘Ã£ Ä‘áº·t hÃ ng!', '', '2011-04-03 09:19:16', '2011-04-03 09:19:16'),
(5, 2, 0, '404 page', 'ChÃºng tÃ´i xin lá»—i, khÃ´ng cÃ³ trang nÃ y', '', '2011-04-03 09:21:12', '2011-04-04 08:01:22');

-- --------------------------------------------------------

--
-- Table structure for table `content_categories`
--

CREATE TABLE `content_categories` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(10) NOT NULL default '0',
  `lft` int(10) unsigned default NULL,
  `rght` int(10) unsigned default NULL,
  `active` tinyint(1) NOT NULL default '1',
  `name` varchar(250) character set utf8 collate utf8_unicode_ci NOT NULL,
  `description` text character set utf8 collate utf8_unicode_ci NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `content_categories`
--

INSERT INTO `content_categories` (`id`, `parent_id`, `lft`, `rght`, `active`, `name`, `description`, `created`, `modified`) VALUES
(1, 0, NULL, NULL, 0, 'Menu', '', '2011-04-03 08:08:56', '2011-04-03 08:08:56'),
(2, 0, NULL, NULL, 0, 'Messages', '', '2011-04-03 08:09:44', '2011-04-03 08:09:44');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL auto_increment,
  `active` tinyint(1) NOT NULL default '1',
  `code3` char(3) NOT NULL,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `active`, `code3`, `name`) VALUES
(2, 1, 'VIE', 'Viá»‡t Nam');

-- --------------------------------------------------------

--
-- Table structure for table `line_items`
--

CREATE TABLE `line_items` (
  `id` int(11) NOT NULL auto_increment,
  `order_id` int(11) NOT NULL default '0',
  `product_id` int(11) NOT NULL default '0',
  `quantity` int(11) NOT NULL default '1',
  `price` decimal(19,8) NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `line_items`
--

INSERT INTO `line_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created`, `modified`) VALUES
(1, 1, 1, 8, '20000.00000000', '2011-05-05 00:13:39', '2011-05-05 00:13:39'),
(2, 7, 4, 4, '0.00000000', '2011-05-06 01:39:15', '2011-05-06 01:39:15'),
(3, 112, 4, 4, '8.00000000', '2011-05-06 01:50:46', '2011-05-06 01:50:46'),
(6, 114, 5, 0, '8.00000000', '2011-05-06 02:18:42', '2011-05-06 02:18:42'),
(7, 114, 7, 1, '8.00000000', '2011-05-06 02:18:42', '2011-05-06 02:18:42'),
(9, 1, 5, 10, '20000.00000000', '2011-05-06 16:14:08', '2011-05-06 16:14:08'),
(24, 126, 2, 1, '320000.00000000', '2011-05-08 17:03:37', '2011-05-08 17:03:37'),
(25, 127, 7, 2, '692000.00000000', '2011-05-10 16:27:03', '2011-05-10 16:27:03'),
(26, 128, 11, 1, '250000.00000000', '2011-05-11 21:40:05', '2011-05-11 21:40:05'),
(27, 129, 1, 2, '200000.00000000', '2011-05-11 21:50:46', '2011-05-11 21:50:46'),
(28, 130, 1, 2, '200000.00000000', '2011-05-11 21:53:39', '2011-05-11 21:53:39'),
(29, 132, 10, 1, '120000.00000000', '2011-05-12 00:02:46', '2011-05-12 00:02:46'),
(30, 133, 1, 1, '200000.00000000', '2011-05-12 18:49:59', '2011-05-12 18:49:59'),
(31, 134, 10, 1, '120000.00000000', '2011-05-12 19:12:22', '2011-05-12 19:12:22'),
(32, 135, 10, 1, '120000.00000000', '2011-05-12 21:49:31', '2011-05-12 21:49:31'),
(33, 135, 11, 1, '250000.00000000', '2011-05-12 21:49:31', '2011-05-12 21:49:31'),
(34, 136, 2, 1, '320000.00000000', '2011-05-13 10:42:40', '2011-05-13 10:42:40'),
(35, 137, 2, 32, '320000.00000000', '2011-05-13 11:16:42', '2011-05-13 11:16:42'),
(36, 138, 2, 1, '320000.00000000', '2011-05-14 13:55:29', '2011-05-14 13:55:29'),
(37, 139, 12, 1, '150000.00000000', '2011-05-14 22:53:22', '2011-05-14 22:53:22'),
(38, 139, 11, 1, '250000.00000000', '2011-05-14 22:53:22', '2011-05-14 22:53:22'),
(39, 140, 5, 4, '268000.00000000', '2011-05-15 09:39:10', '2011-05-15 09:39:10'),
(40, 141, 5, 4, '268000.00000000', '2011-05-15 12:01:06', '2011-05-15 12:01:06'),
(41, 142, 3, 1, '180000.00000000', '2011-05-15 12:13:00', '2011-05-15 12:13:00'),
(42, 143, 5, 1, '268000.00000000', '2011-05-15 12:40:23', '2011-05-15 12:40:23'),
(43, 144, 5, 2, '268000.00000000', '2011-05-15 14:24:58', '2011-05-15 14:24:58'),
(44, 144, 4, 1, '268000.00000000', '2011-05-15 14:24:58', '2011-05-15 14:24:58'),
(45, 145, 11, 1, '250000.00000000', '2011-05-15 15:01:24', '2011-05-15 15:01:24'),
(46, 146, 1, 1, '200000.00000000', '2011-05-15 15:24:47', '2011-05-15 15:24:47'),
(47, 147, 1, 1, '200000.00000000', '2011-05-15 15:41:48', '2011-05-15 15:41:48'),
(48, 148, 1, 1, '200000.00000000', '2011-05-15 17:22:11', '2011-05-15 17:22:11'),
(49, 149, 4, 2, '268000.00000000', '2011-05-16 11:30:57', '2011-05-16 11:30:57'),
(50, 150, 11, 1, '250000.00000000', '2011-05-16 12:44:37', '2011-05-16 12:44:37'),
(51, 151, 5, 1, '268000.00000000', '2011-05-16 17:32:35', '2011-05-16 17:32:35'),
(52, 152, 7, 1, '692000.00000000', '2011-05-17 11:52:31', '2011-05-17 11:52:31'),
(53, 153, 7, 1, '692000.00000000', '2011-05-17 11:53:58', '2011-05-17 11:53:58'),
(54, 154, 7, 1, '692000.00000000', '2011-05-17 17:06:54', '2011-05-17 17:06:54'),
(55, 154, 2, 2, '320000.00000000', '2011-05-17 17:06:54', '2011-05-17 17:06:54'),
(56, 155, 7, 1, '692000.00000000', '2011-05-17 17:15:14', '2011-05-17 17:15:14'),
(57, 155, 2, 2, '320000.00000000', '2011-05-17 17:15:14', '2011-05-17 17:15:14'),
(58, 156, 7, 1, '692000.00000000', '2011-05-17 17:15:53', '2011-05-17 17:15:53'),
(59, 156, 2, 2, '320000.00000000', '2011-05-17 17:15:53', '2011-05-17 17:15:53'),
(60, 157, 1, 2, '200000.00000000', '2011-05-18 10:17:13', '2011-05-18 10:17:13'),
(61, 159, 11, 1, '250000.00000000', '2011-05-18 17:22:51', '2011-05-18 17:22:51'),
(62, 160, 12, 2, '150000.00000000', '2011-05-18 17:34:59', '2011-05-18 17:34:59'),
(63, 161, 3, 1, '180000.00000000', '2011-05-18 17:41:31', '2011-05-18 17:41:31'),
(64, 162, 6, 1, '498000.00000000', '2011-05-18 17:52:38', '2011-05-18 17:52:38'),
(65, 163, 2, 2, '320000.00000000', '2011-05-18 18:15:25', '2011-05-18 18:15:25'),
(66, 164, 11, 2, '160000.00000000', '2011-05-18 18:42:01', '2011-05-18 18:42:01'),
(67, 164, 6, 2, '498000.00000000', '2011-05-18 18:42:01', '2011-05-18 18:42:01'),
(68, 165, 3, 1, '100000.00000000', '2011-05-18 18:45:59', '2011-05-18 18:45:59'),
(69, 166, 5, 2, '268000.00000000', '2011-05-18 21:45:17', '2011-05-18 21:45:17'),
(70, 167, 5, 1, '268000.00000000', '2011-05-19 09:04:25', '2011-05-19 09:04:25'),
(71, 168, 5, 1, '268000.00000000', '2011-05-19 10:00:36', '2011-05-19 10:00:36'),
(72, 169, 10, 1, '100000.00000000', '2011-05-19 10:44:24', '2011-05-19 10:44:24'),
(73, 170, 10, 1, '1000.00000000', '2011-05-19 16:42:49', '2011-05-19 16:42:49'),
(74, 171, 10, 1, '1000.00000000', '2011-05-19 16:47:31', '2011-05-19 16:47:31'),
(75, 172, 10, 1, '1000.00000000', '2011-05-19 18:42:22', '2011-05-19 18:42:22'),
(76, 172, 11, 1, '160000.00000000', '2011-05-19 18:42:22', '2011-05-19 18:42:22'),
(77, 173, 6, 1, '498000.00000000', '2011-05-19 22:25:17', '2011-05-19 22:25:17'),
(78, 174, 6, 1, '498000.00000000', '2011-05-19 22:43:13', '2011-05-19 22:43:13'),
(79, 175, 6, 1, '498000.00000000', '2011-05-19 22:53:31', '2011-05-19 22:53:31'),
(80, 175, 7, 1, '692000.00000000', '2011-05-19 22:53:31', '2011-05-19 22:53:31');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `shipping_method_id` int(11) NOT NULL default '0',
  `payment_method_id` int(11) NOT NULL default '0',
  `province_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `address` text NOT NULL,
  `country` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `re_name` varchar(250) NOT NULL,
  `re_phone` varchar(32) NOT NULL,
  `re_address` text NOT NULL,
  `re_country` varchar(150) NOT NULL,
  `re_city` varchar(150) NOT NULL,
  `shipping_method` varchar(100) character set latin1 collate latin1_spanish_ci NOT NULL,
  `shipping_price` decimal(19,8) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `payment_price` decimal(19,8) NOT NULL,
  `state_tax` decimal(6,6) NOT NULL,
  `comments` text,
  `active` tinyint(1) NOT NULL default '1',
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=176 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `shipping_method_id`, `payment_method_id`, `province_id`, `name`, `email`, `phone`, `address`, `country`, `city`, `re_name`, `re_phone`, `re_address`, `re_country`, `re_city`, `shipping_method`, `shipping_price`, `payment_method`, `payment_price`, `state_tax`, `comments`, `active`, `created`, `modified`) VALUES
(127, 0, 1, 6, 1, 'VÃµ Má»¹ Thanh', 'tham@gmail.com', '5679098', 'ghrtgtrhe', 'Viá»‡t Nam', '', 'tryuy', '65865988798', '586kkkgkfjfdk', 'Viá»‡t Nam', 'HÃ  Ná»™i', '', '0.00000000', '', '0.00000000', '0.000000', 'gragregd', 1, '2011-05-10 16:27:02', '2011-05-18 12:55:38'),
(128, 0, 3, 6, 1, 'duong thi tham', 'tham@gmail.com', '01235688994', '99 phan thanh', 'Viá»‡t Nam', '', 'sfdsfdsfdf', '98553', 'dfsadfsdf', 'Viá»‡t Nam', 'ÄÃ  Náºµng', '', '0.00000000', '', '0.00000000', '0.000000', 'chu y mang lai cho  nhung hinh anh', 1, '2011-05-11 21:40:04', '2011-05-18 11:30:02'),
(135, 0, 1, 4, 1, 'ksdgsd', 'thamnag@gmail.com', '456885', 'aejflekg', 'Viá»‡t Nam', '', 'sdkglaskjl', '644543331231', 'krskrjgtkrej', 'Viá»‡t Nam', 'Há»“ ChÃ­ Minh', '', '0.00000000', '', '0.00000000', '0.000000', '', 1, '2011-05-12 21:49:31', '2011-05-12 21:49:31'),
(136, 0, 1, 4, 1, 'chuyen gia', 'thamnag@gmail.com', '15466', 'tieng anh', 'Viá»‡t Nam', '', 'kdfgdlk', '65476576', 'hgjhgjgh', 'Viá»‡t Nam', 'Há»“ ChÃ­ Minh', '', '0.00000000', '', '0.00000000', '0.000000', 'gjvjcghjc', 1, '2011-05-13 10:42:40', '2011-05-13 10:42:40'),
(137, 0, 1, 4, 1, 'gfdh', 'thamnag@gmail.com', '56323', 'yytujyty', 'USA', '', 'dsgfdhg', '3416', 'fhfdhfg', 'Viá»‡t Nam', 'Huáº¿', '', '0.00000000', '', '0.00000000', '0.000000', 'gfjghju', 1, '2011-05-13 11:16:41', '2011-05-13 11:16:41'),
(138, 0, 1, 4, 1, 'duong thi tham', 'thamnag@gmail.com', '0123588999', 'chinh quyen ', 'Viá»‡t Nam', '', 'mai van be', '012369874', 'afnaskjlkas', 'Viá»‡t Nam', 'ÄÃ  Náºµng', '', '0.00000000', '', '0.00000000', '0.000000', '', 1, '2011-05-14 13:55:29', '2011-05-14 13:55:29'),
(143, 0, 1, 4, 3, 'hien van thi', 'thamnag@gmail.com', '575668776', 'dgfdsgfds', 'Viá»‡t Nam', '', 'rsfrytuydryu', '689879', 'fhgfjhg', 'Viá»‡t Nam', 'Há»“ ChÃ­ Minh', '', '0.00000000', '', '0.00000000', '0.000000', '', 0, '2011-05-15 12:40:23', '2011-05-15 12:40:23'),
(144, 0, 1, 4, 1, 'le thi suong', 'thamnag@gmail.com', '0123444', '45 phan dinh tung', 'Viá»‡t Nam', '', 'ung nho dai', '012587+4666', '89 hai phong ', 'Viá»‡t Nam', 'Háº£i PhÃ²ng', '', '0.00000000', '', '0.00000000', '0.000000', '87903322', 1, '2011-05-15 14:24:58', '2011-05-15 14:25:01'),
(145, 0, 1, 4, 2, 'tran dang kien', 'thamnag@gmail.com', '1236985', '99 phan boi chau', 'Viá»‡t Nam', '', 'tran dang cuong', '0126598777', '60 dong da', 'Viá»‡t Nam', 'Huáº¿', '', '0.00000000', '', '0.00000000', '0.000000', 'chuong trinh khuyen mai dac biet', 1, '2011-05-15 15:01:24', '2011-05-15 15:01:24'),
(146, 0, 1, 4, 3, 'chien', 'thamnag@gmail.com', '455555', 'fdsfds', 'Viá»‡t Nam', '', 'dfdsfgfd', '45555', 'dfdsf', 'Viá»‡t Nam', 'ÄÃ  Náºµng', '', '0.00000000', '', '0.00000000', '0.000000', 'he he he\r\nthich cai gi thi ghi vao day ne:)', 0, '2011-05-15 15:24:47', '2011-05-15 15:24:47'),
(147, 0, 1, 4, 3, 'Tráº§n HoÃ i NhÃ¢n', 'moctinh88@gmail.com', '65768', 'gdsgfdg', 'Viá»‡t Nam', '', 'Tháº¯m', '6586787', 'sdgdfhgj', 'Viá»‡t Nam', 'Háº£i PhÃ²ng', '', '0.00000000', '', '0.00000000', '0.000000', '', 0, '2011-05-15 15:41:47', '2011-05-18 11:19:30'),
(149, 0, 1, 4, 3, 'hoang thi thao', 'thamnag@gmail.com', '95376345309', 'dafdsf', 'Viá»‡t Nam', '', 'duong phu tuan', '45555', 'fsdfsd', 'Viá»‡t Nam', 'Quáº£ng NgÃ£i', '', '0.00000000', '', '0.00000000', '0.000000', '', 1, '2011-05-16 11:30:57', '2011-05-16 11:30:57'),
(150, 0, 3, 6, 1, 'mai thanh son', 'thamnag@gmail.com', '95376345309', 'sdgdhgf', 'Viá»‡t Nam', '', 'nguyen thi hong giang', '01235893', 'hryujtyuj', 'Viá»‡t Nam', 'ÄÃ  Náºµng', '', '0.00000000', '', '0.00000000', '0.000000', '', 0, '2011-05-16 12:44:37', '2011-05-16 12:44:37'),
(151, 0, 1, 4, 1, 'le dinh huy', 'nhm@gmail.com', '01235688994', 'fjlkfjdsk', '', '', 'le thi ngoc han', '01235893', 'sfkseljfled', 'Viá»‡t Nam', 'ÄÃ  Náºµng', '', '0.00000000', '', '0.00000000', '0.000000', '', 1, '2011-05-16 17:32:35', '2011-05-16 17:32:35'),
(152, 0, 1, 5, 1, 'duong thi tham', 'thamnag@gmail.com', '5676868', 'dsgfdg', 'Viá»‡t Nam', '', 'hien van thin', '45555', 'hfgjhj', 'Viá»‡t Nam', 'Há»“ ChÃ­ Minh', '', '0.00000000', '', '0.00000000', '0.000000', 'jghjb', 0, '2011-05-17 11:52:31', '2011-05-17 11:52:31'),
(163, 0, 1, 6, 1, 'VÃµ Má»¹ Thanh', 'moctinh88@gmail.com', '0985238060', 'ghgfhgh', 'Viá»‡t Nam', '', 'hien van thin', '878992522', 'ghgfjh', 'Viá»‡t Nam', 'HÃ  Ná»™i', '', '0.00000000', '', '0.00000000', '0.000000', 'gfhgdh', 1, '2011-05-18 18:15:25', '2011-05-18 18:15:25'),
(164, 0, 1, 6, 1, 'Tráº§n HoÃ i NhÃ¢n', 'moctinh88@gmail.com', '95376345309', 'strtrt', 'Viá»‡t Nam', '', 'nguyen thi hong giang', '45555', 'rtry', 'Viá»‡t Nam', 'ÄÃ  Náºµng', '', '0.00000000', '', '0.00000000', '0.000000', '', 1, '2011-05-18 18:42:01', '2011-05-18 18:42:01'),
(165, 0, 1, 4, 1, 'VÃµ Má»¹ Thanh', 'thamnag@gmail.com', '01235688994', 'rghf', 'Viá»‡t Nam', '', 'hien van thin', '012587995222', 'gfdsgdfg', 'Viá»‡t Nam', 'HÃ  Ná»™i', '', '0.00000000', '', '0.00000000', '0.000000', '', 1, '2011-05-18 18:45:59', '2011-05-18 18:45:59'),
(166, 0, 1, 4, 4, 'duong phu sinh', 'moctinh88@gmail.com', '0985238060', 'dffghdg', 'Viá»‡t Nam', '', 'nguyen thi hong giang', '012587995222', 'fgfdgdf', 'Viá»‡t Nam', 'Há»“ ChÃ­ Minh', '', '0.00000000', '', '0.00000000', '0.000000', '', 0, '2011-05-18 21:45:16', '2011-05-18 21:45:16'),
(167, 0, 1, 4, 3, 'duong thi tham', 'moctinh88@gmail.com', '0985238060', 'rdgfdhygh', 'Viá»‡t Nam', '', 'nguyen thi hong giang', '012587995222', 'fdgfdhgf', 'Viá»‡t Nam', 'HÃ  Ná»™i', '', '0.00000000', '', '0.00000000', '0.000000', '', 0, '2011-05-19 09:04:25', '2011-05-19 09:04:25'),
(168, 0, 1, 4, 4, 'VÃµ Má»¹ Thanh', 'moctinh88@gmail.com', '0985238060', 'fsdfd', 'Viá»‡t Nam', '', 'nguyen thi hong giang', '012587995222', 'fgdtyt', 'Viá»‡t Nam', 'Huáº¿', '', '0.00000000', '', '0.00000000', '0.000000', '', 1, '2011-05-19 10:00:36', '2011-05-19 10:00:36'),
(169, 0, 1, 5, 1, 'duong thi tham', 'moctinh88@gmail.com', '01235688994', 'fdgdfyhy', 'Viá»‡t Nam', '', 'nguyen thi hong giang', '012587995222', 'hfhfghg', 'Viá»‡t Nam', 'ÄÃ  Náºµng', '', '0.00000000', '', '0.00000000', '0.000000', '', 0, '2011-05-19 10:44:24', '2011-05-19 10:44:24'),
(170, 0, 1, 5, 1, 'be vinh', 'moctinh88@gmail.com', '0985238060', 'zdfsf', 'Viá»‡t Nam', '', 'hien van thin', '012587995222', 'sdrfsdfsÄ‘', 'Viá»‡t Nam', 'ÄÃ  Náºµng', '', '0.00000000', '', '0.00000000', '0.000000', '', 0, '2011-05-19 16:42:49', '2011-05-19 16:42:49'),
(171, 0, 1, 5, 1, 'duong thi tham', 'moctinh88@gmail.com', '0985238060', 'sadfdsfc', 'Viá»‡t Nam', '', 'duong phu tuan', '012587995222', 'sdfdsfds', 'Viá»‡t Nam', 'ÄÃ  Náºµng', '', '0.00000000', '', '0.00000000', '0.000000', 'adfsdfd', 0, '2011-05-19 16:47:31', '2011-05-19 16:47:31'),
(172, 0, 1, 4, 1, 'le thi ru to', 'moctinh88@gmail.com', '0985238060', 'Ã¡hkfsdfds', 'Viá»‡t Nam', '', 'duong phu tuan', '878992522', 'sdgdfg', 'Viá»‡t Nam', 'Háº£i PhÃ²ng', '', '0.00000000', '', '0.00000000', '0.000000', '', 1, '2011-05-19 18:42:22', '2011-05-19 18:42:22'),
(173, 0, 1, 4, 1, 'duong thi tham', 'moctinh88@gmail.com', '01235688994', 'sfdgfdg', 'Viá»‡t Nam', '', 'be ty y', '012587995222', 'tryrty', 'Viá»‡t Nam', 'ÄÃ  Náºµng', '', '0.00000000', '', '0.00000000', '0.000000', '', 0, '2011-05-19 22:25:17', '2011-05-19 22:25:17'),
(174, 0, 1, 4, 1, 'duong thi tham', 'moctinh88@gmail.com', '01235688994', 'sfadfd', 'Viá»‡t Nam', '', 'duong phu tuan', '012587995222', 'fasdfsdf', 'Viá»‡t Nam', '', '', '0.00000000', '', '0.00000000', '0.000000', '', 0, '2011-05-19 22:43:12', '2011-05-19 22:43:12'),
(175, 0, 1, 4, 1, 'duong thi tham', 'moctinh88@gmail.com', '01235688994', 'gfdgfg', 'Viá»‡t Nam', '', 'hien van thin', '01235893', 'tytryut', 'Viá»‡t Nam', 'ÄÃ  Náºµng', '', '0.00000000', '', '0.00000000', '0.000000', '', 0, '2011-05-19 22:53:31', '2011-05-19 22:53:31');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(11) NOT NULL auto_increment,
  `active` tinyint(1) unsigned default '1',
  `price` int(11) NOT NULL default '0',
  `processor` varchar(255) NOT NULL,
  `name` varchar(250) NOT NULL,
  `images` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `active`, `price`, `processor`, `name`, `images`, `created`, `modified`) VALUES
(4, 0, 0, 'paypal', 'PayPal', 'icon-paypal.png', '2011-04-03 19:31:41', '2011-04-03 19:31:41'),
(5, 0, 0, 'nganluong', 'Ngan Luong', 'nganluong.jpg', '2011-04-03 19:32:16', '2011-04-03 19:32:16'),
(6, 0, 0, 'nhan', 'Thanh toÃ¡n trá»±c tiáº¿p', '', '2011-04-28 12:03:04', '2011-04-28 12:03:04');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL auto_increment,
  `brand_id` int(5) NOT NULL,
  `active` tinyint(1) NOT NULL default '1',
  `code` varchar(10) character set utf8 collate utf8_unicode_ci NOT NULL,
  `name` varchar(250) character set utf8 collate utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL default '0',
  `special_price` int(11) NOT NULL default '0',
  `quantity` int(10) unsigned default NULL,
  `description` text NOT NULL,
  `images` text NOT NULL,
  `detail_image_1` text,
  `detail_image_2` text,
  `detail_image_3` text,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `active`, `code`, `name`, `price`, `special_price`, `quantity`, `description`, `images`, `detail_image_1`, `detail_image_2`, `detail_image_3`, `created`, `modified`) VALUES
(1, 5, 1, 'MSM - 001', 'Ão sÆ¡ mi nam - M1', 268000, 0, 8, 'Size :X,LX\r\n', 'img/uploads/MSM-001.jpg', 'img/uploads/MSM-002.jpg', 'img/uploads/MSM-003.jpg', '', '2011-04-02 15:01:30', '2011-05-18 18:02:03'),
(3, 6, 1, 'KM-001', 'KÃ­nh máº¯t Gucci', 120000, 100000, 9, 'Máº¯t kÃ­nh thá»i trang hiá»‡u gucci, cháº¥t lÆ°á»£ng cao, giÃ¡ ráº»', 'img/uploads/KM-001.jpg', 'img/uploads/KM-001.jpg', '', '', '2011-04-02 15:40:10', '2011-05-18 18:47:50'),
(4, 5, 1, 'MSM -002', 'Ão sÆ¡ mi nam - M2', 268000, 0, 10, 'A B C D', 'img/uploads/MSM-002.jpg', 'img/uploads/MSM-002.jpg', '', '', '2011-04-12 06:44:43', '2011-05-06 16:38:06'),
(5, 5, 1, 'MSM-003', 'Ão sÆ¡ mi nam - M3', 268000, 0, 14, 'A B C D', 'img/uploads/MSM-004.jpg', 'img/uploads/MSM-004.jpg', '', '', '2011-04-12 06:46:24', '2011-05-19 10:39:20'),
(6, 5, 1, 'WD-001', 'Äáº§m dáº¡ há»™i', 498000, 0, 8, 'A B C D', 'img/uploads/WD-001-1.JPG', 'img/uploads/WD-001-1.JPG', 'img/uploads/WD-001-2.JPG', 'img/uploads/WD-001-3.JPG', '2011-04-12 21:30:59', '2011-05-18 18:43:47'),
(7, 5, 1, 'WD-002', 'Äáº§m SFY', 692000, 0, 10, 'A B C D', 'img/uploads/D-002.jpg', 'img/uploads/D-002.jpg', '', '', '2011-04-12 21:34:15', '2011-05-06 16:40:54'),
(11, 5, 1, 'WJ-001', 'Quáº§n jean ngáº¯n', 160000, 0, 5, 'A B C D', 'img/uploads/WJ-001-1.jpg', 'img/uploads/WJ-001-1.jpg', 'img/uploads/WJ-001-2.jpg', 'img/uploads/WJ-001-3.jpg', NULL, '2011-05-19 18:43:32'),
(12, 5, 1, 'WT-002', 'Ão thun ná»¯-002', 120000, 0, 8, 'A B C D', 'img/uploads/WT-002-1.JPG', 'img/uploads/WT-002-1.JPG', 'img/uploads/WT-002-2.JPG', 'WT-img/uploads/002-3.JPG', NULL, '2011-05-18 18:03:34'),
(33, 1, 1, 'WV-001', 'VÃ¡y hÃ¨', 1000, 0, 5, 'A B C D', 'img/uploads/WV-001-1.jpg', 'img/uploads/WV-001-1.jpg', 'img/uploads/WV-001-2.jpg', 'img/uploads/WV-001-3.jpg', '2011-05-21 15:15:37', '2011-05-21 15:44:14'),
(63, 1, 1, 'WS-001-1.J', 'Ão sÆ¡ mi ná»¯ - W1', 15000, 0, 10, '', 'img/uploads/WS-001-1.JPG', 'img/uploads/WS-001-1.JPG', 'img/uploads/WS-001-2.JPG', 'img/uploads/WS-001-3.JPG', '2011-05-21 22:14:34', '2011-05-21 22:14:34'),
(66, 1, 0, 'bi bi', 'canh hoa  bi', 1000, 0, 10, '', '', NULL, NULL, NULL, '2011-05-22 02:26:58', '2011-05-22 10:06:25');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(11) NOT NULL auto_increment,
  `country_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `country_id`, `name`, `created`, `modified`) VALUES
(1, 2, 'HÃ  Ná»™i', '2011-04-03 09:41:53', '2011-04-03 09:41:53'),
(2, 2, 'ÄÃ  Náºµng', '2011-04-03 09:42:09', '2011-04-03 09:42:50'),
(3, 2, 'Há»“ ChÃ­ Minh', '2011-04-03 09:42:33', '2011-04-03 09:42:59'),
(4, 2, 'Háº£i PhÃ²ng', '2011-04-03 09:43:14', '2011-04-03 09:43:14'),
(5, 2, 'Huáº¿', '2011-04-03 09:43:56', '2011-04-03 09:43:56'),
(6, 2, 'Quáº£ng Nam', '2011-04-03 09:44:11', '2011-04-03 09:44:11'),
(7, 2, 'Quáº£ng NgÃ£i', '2011-04-03 09:44:29', '2011-04-03 09:44:29');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(5) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'users');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_methods`
--

CREATE TABLE `shipping_methods` (
  `id` int(11) NOT NULL auto_increment,
  `active` tinyint(1) unsigned default '1',
  `price` int(11) NOT NULL default '0',
  `processor` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `images` text NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `shipping_methods`
--

INSERT INTO `shipping_methods` (`id`, `active`, `price`, `processor`, `name`, `images`, `created`, `modified`) VALUES
(1, 0, 1000, 'nhan', 'Gá»­i hÃ ng qua bÆ°u Ä‘iá»‡n (3 - 7 ngÃ y)', '', '2011-04-23 22:47:11', '2011-04-23 22:47:11'),
(2, 0, 30000, 'tháº¯m', 'Gá»­i hÃ ng chuyá»ƒn phÃ¡t nhanh (2 - 3 ngÃ y)', '', '2011-04-23 22:48:34', '2011-04-23 22:48:34'),
(3, 0, 25000, 'tham', 'Giao hÃ ng tÃ­nh phÃ­ tÃ¹y theo khu vá»±c', '', '2011-04-28 12:05:18', '2011-04-28 12:05:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `role_id` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(64) NOT NULL,
  `name` varchar(250) NOT NULL,
  `telephone` varchar(32) default NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `password`, `email`, `name`, `telephone`, `created`, `modified`) VALUES
(7, 1, 'admin', 'af38e085b712e6b27ea766fd85d52f54a3e6d645', 'duongthitham.88@gmail.com', 'duong thi tham', '01266694944', '2011-05-12 10:40:44', '2011-05-12 10:40:44');

-- --------------------------------------------------------

--
-- Table structure for table `users_products`
--

CREATE TABLE `users_products` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users_products`
--

