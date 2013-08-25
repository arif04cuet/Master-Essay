-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 25, 2013 at 05:56 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE IF NOT EXISTS `coupons` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) DEFAULT NULL,
  `commision_amount` float DEFAULT NULL,
  `commision_type` varchar(20) DEFAULT NULL,
  `valid_from` varchar(255) DEFAULT NULL,
  `valid_to` varchar(255) DEFAULT NULL,
  `creation_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `commision_amount`, `commision_type`, `valid_from`, `valid_to`, `creation_date`, `status`) VALUES
(11, 'DC-12310-6', 5, 'Percentange', '', '', '2013-08-22 21:24:00', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `country`, `phone`, `password`, `status`) VALUES
(3, 'asd', 'asd', 'arif@gmai.com', 'Albania', '355-123456', '0192023a7bbd73250516f069df18b500', 1),
(4, 'Arif', 'Hossain', 'arif04cuet2@gmail.com', 'Algeria', '213-123456-mobile', '0192023a7bbd73250516f069df18b500', 1),
(7, 'Arif', 'Hossain', 'arif_04_cuet@yahoo.com', 'Belgium', '32-123456-mobile', 'e10adc3949ba59abbe56e057f20f883e', 1),
(8, 'Na', 'vi', 'ali.tutors@gmail.com', 'Canada', '1-4164546036', 'c57af31c77958c9d9eedeabc6aa90753', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscribers`
--

CREATE TABLE IF NOT EXISTS `newsletter_subscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT '1',
  `subscription_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `newsletter_subscribers`
--

INSERT INTO `newsletter_subscribers` (`id`, `name`, `email`, `status`, `subscription_date`) VALUES
(3, 'Arif', 'arif04cuet2@gmail.com', '1', '2013-08-05 09:56:53'),
(4, 'arif', 'arif@gmail.com', '1', '2013-08-17 15:50:55');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `topic` varchar(255) DEFAULT NULL,
  `type_document` varchar(255) DEFAULT NULL,
  `urgency` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `spacing` varchar(255) DEFAULT NULL,
  `number_of_pages` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `cost_per_page` varchar(255) DEFAULT NULL,
  `page_summery` varchar(255) DEFAULT NULL,
  `subject_area` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `academic_level` varchar(255) DEFAULT NULL,
  `style` varchar(255) DEFAULT NULL,
  `no_sources` varchar(255) DEFAULT NULL,
  `writer` varchar(255) DEFAULT NULL,
  `order_description` varchar(255) DEFAULT NULL,
  `will_upload_files` varchar(255) DEFAULT NULL,
  `night_calls` varchar(255) DEFAULT NULL,
  `discount_code` varchar(255) DEFAULT NULL,
  `accept` varchar(255) DEFAULT NULL,
  `billing_address` text,
  `city_town` varchar(255) DEFAULT NULL,
  `c_country` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `holder_phone` varchar(255) DEFAULT NULL,
  `order_id` varchar(100) DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  `customer_id` int(10) NOT NULL,
  `order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `transsaction_time` varchar(100) DEFAULT NULL,
  `TRANSACTION_ID` varchar(100) DEFAULT NULL,
  `unique_key` varchar(255) DEFAULT NULL,
  `payment_status` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `topic`, `type_document`, `urgency`, `level`, `spacing`, `number_of_pages`, `currency`, `cost_per_page`, `page_summery`, `subject_area`, `total`, `academic_level`, `style`, `no_sources`, `writer`, `order_description`, `will_upload_files`, `night_calls`, `discount_code`, `accept`, `billing_address`, `city_town`, `c_country`, `zip_code`, `holder_phone`, `order_id`, `status`, `customer_id`, `order_date`, `transsaction_time`, `TRANSACTION_ID`, `unique_key`, `payment_status`) VALUES
(5, 'fghfgh', 'Essay', '10 days', 'Standard Quality', 'Double Spaced', '1', 'USD', '22.99', NULL, 'Dance', '22.99', 'Undergraduate', 'APA', '1', 'us_writer', 'fghfgh', NULL, NULL, 'fghfgh', '1', 'sdf', 'sdf', 'AD', '123', 'sdfsdf', NULL, 0, 3, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL),
(6, 'sadasd', 'Essay', '10 days', 'Standard Quality', 'Double Spaced', '1', 'USD', '22.99', '1', 'Movies', '45.98', 'Master', 'APA', '1', 'us_writer', 'asdasd', NULL, NULL, '', '1', 'asdas', 'Uttara', 'CA', '1230', '0215478', NULL, 1, 4, '2013-08-05 22:07:09', '2013-08-05T22:07:09Z', '3KE96561YT170880H', NULL, NULL),
(7, 'sdfsdf', 'Essay', '5 days', 'Premium Quality', 'Double Spaced', '1', 'USD', '25.20', NULL, 'Movies', '25.20', 'Undergraduate', 'APA', '1', NULL, 'sdf', NULL, NULL, '', '1', NULL, NULL, NULL, NULL, NULL, NULL, 0, 4, '2013-08-22 20:40:50', NULL, NULL, '52167752b8a04', NULL),
(8, 'sdfsdf', 'Essay', '5 days', 'Premium Quality', 'Double Spaced', '1', 'USD', '25.20', NULL, 'Movies', '25.20', 'Undergraduate', 'APA', '1', NULL, 'sdf', NULL, NULL, '', '1', NULL, NULL, NULL, NULL, NULL, NULL, 0, 4, '2013-08-22 20:41:56', NULL, NULL, '521677944c692', NULL),
(9, 'sdfsdf', 'Essay', '5 days', 'Premium Quality', 'Double Spaced', '1', 'USD', '25.20', NULL, 'Movies', '25.20', 'Undergraduate', 'APA', '1', NULL, 'sdf', NULL, NULL, '', '1', NULL, NULL, NULL, NULL, NULL, NULL, 0, 4, '2013-08-22 20:42:21', NULL, NULL, '521677ad55cb1', NULL),
(10, 'sdfsdf', 'Essay', '5 days', 'Premium Quality', 'Double Spaced', '1', 'USD', '25.20', NULL, 'Movies', '25.20', 'Undergraduate', 'APA', '1', NULL, 'sdf', NULL, NULL, '', '1', NULL, NULL, NULL, NULL, NULL, NULL, 0, 4, '2013-08-22 20:43:02', NULL, NULL, '521677d649ab8', NULL),
(11, 'sdfsdf', 'Essay', '5 days', 'Premium Quality', 'Double Spaced', '1', 'USD', '25.20', NULL, 'Movies', '25.20', 'Undergraduate', 'APA', '1', NULL, 'sdf', NULL, NULL, '', '1', NULL, NULL, NULL, NULL, NULL, NULL, 0, 4, '2013-08-22 20:43:26', NULL, NULL, '521677ee480d5', NULL),
(12, 'sdfsdf', 'Essay', '5 days', 'Premium Quality', 'Double Spaced', '1', 'USD', '25.20', NULL, 'Movies', '25.20', 'Undergraduate', 'APA', '1', NULL, 'sdf', NULL, NULL, '', '1', NULL, NULL, NULL, NULL, NULL, NULL, 0, 4, '2013-08-22 20:45:52', NULL, NULL, '5216788091624', NULL),
(13, 'sdfsdf', 'Essay', '5 days', 'Premium Quality', 'Double Spaced', '1', 'USD', '25.20', NULL, 'Movies', '25.20', 'Undergraduate', 'APA', '1', NULL, 'sdf', NULL, NULL, '', '1', NULL, NULL, NULL, NULL, NULL, NULL, 0, 4, '2013-08-22 20:46:09', NULL, NULL, '521678919cda3', NULL),
(14, 'sdfsdf', 'Essay', '48 hours', 'Premium Quality', 'Double Spaced', '1', 'EUR', '29.24', NULL, 'Drama', '27.78', 'Undergraduate', 'APA', '1', NULL, 'sdfsdf', NULL, NULL, 'DC-12310-6', '1', NULL, NULL, NULL, NULL, NULL, NULL, 0, 4, '2013-08-22 21:24:32', NULL, NULL, '521681902564a', NULL),
(15, 'sdfsdf', 'Admission Services - Admission Essay', '12 hours', 'Platinum Quality', 'Double Spaced', '1', 'CAD', '26.63', NULL, 'Movies', '26.63', 'Master', 'APA', '1', NULL, 'sdf', NULL, NULL, '', '1', NULL, NULL, NULL, NULL, NULL, NULL, 0, 4, '2013-08-24 19:51:11', NULL, NULL, '52190eafa57fe', NULL),
(16, 'sdfsdf', 'Admission Services - Admission Essay', '12 hours', 'Platinum Quality', 'Double Spaced', '1', 'USD', '25.30', NULL, 'Movies', '25.30', 'Master', 'APA', '1', NULL, 'sdf', NULL, NULL, '', '1', NULL, NULL, NULL, NULL, NULL, NULL, 0, 4, '2013-08-24 19:51:58', NULL, NULL, '52190ede5e214', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(100) NOT NULL,
  `from_user` int(10) DEFAULT '0',
  `to_user` int(10) DEFAULT '0',
  `message` text,
  `document` varchar(200) DEFAULT NULL,
  `action_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `from_user`, `to_user`, `message`, `document`, `action_time`, `status`) VALUES
(1, '5', 0, 3, 'Here your doc.download it', 'Application-Form.doc', '2013-08-01 10:14:40', 0),
(2, '5', 0, 3, 'Test', '', '2013-08-01 10:26:40', 0),
(4, '5', 3, 0, 'asdasd', 'learning English.pdf', '2013-08-01 11:07:43', 0),
(5, '6', 4, 0, '<p>Hello Admin</p>', '', '2013-08-05 22:17:47', 0),
(6, '6', 0, 4, '<p>ok uploading files</p>', 'layout_header.jpg', '2013-08-05 22:22:59', 0),
(7, '6', 0, 4, '<p>sdfsdf</p>', 'Cologne for men for Mithun.doc', '2013-08-05 22:23:59', 0),
(8, '6', 0, 4, '', '', '2013-08-05 22:24:03', 0),
(9, '5', 0, 3, '<p>ok</p>', '5201c025c5b7c-Ok there is no issue with the date.docx', '2013-08-07 03:33:57', 0),
(10, '6', 4, 0, '<p>test afc</p>', '', '2013-08-15 13:39:40', 0),
(11, '6', 0, 4, '<p>ksaljdfkljasdbfkjlasdfbklajsdbflkasdfblkasdblkasd</p>', '', '2013-08-17 19:20:00', 0),
(12, '6', 4, 0, '<p>askhf;asjdkhfkl;jasfklajsdhfasdhfladhfia;osdhfasldihfjhfasdlkjhfasdlkfhlasdfh</p>', '', '2013-08-17 19:20:19', 0),
(13, '6', 0, 4, '<p>ksaljdfkljasdbfkjlasdfbklajsdbflkasdfblkasdblkasd</p>', '', '2013-08-17 19:20:23', 0),
(14, '6', 4, 0, '<p>hey r u crazy????</p>', '', '2013-08-17 19:24:41', 0),
(15, '6', 0, 4, '<p>ksaljdfkljasdbfkjlasdfbklajsdbflkasdfblkasdblkasd</p>', '', '2013-08-17 19:24:50', 0),
(16, '6', 4, 0, '<p>hey r u crazy????</p>', '', '2013-08-17 19:34:45', 0),
(17, '16', 0, 4, '<p>ok</p>', '', '2013-08-25 05:51:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `service_id` varchar(200) DEFAULT NULL,
  `urgency` varchar(100) DEFAULT NULL,
  `standard` float DEFAULT NULL,
  `premium` float DEFAULT NULL,
  `platinum` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=440 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `service_id`, `urgency`, `standard`, `premium`, `platinum`) VALUES
(1, '22', '10 days', 22.99, 24.99, 27.99),
(2, '22', '7 days', 23.99, 25.99, 28.99),
(3, '22', '5 days', 25.99, 27.99, 30.99),
(4, '22', '4 days', 26.99, 28.99, 32.99),
(5, '22', '3 days', 28.99, 30.99, 35.99),
(6, '22', '48 hours', 36.99, 38.99, 41.99),
(7, '22', '24 hours', 42.99, 44.99, 49.99),
(8, '22', '12 hours', 46.99, 48.99, 53.99),
(9, '22', '6 hours ', 50.99, 52.99, 57.99),
(10, '22', '3 hours', 54.99, 56.99, 61.99),
(12, '42', '10 days', 22.99, 24.99, 27.99),
(13, '42', '7 days', 23.99, 25.99, 28.99),
(14, '42', '5 days', 25.99, 27.99, 30.99),
(15, '42', '4 days', 26.99, 28.99, 32.99),
(16, '42', '3 days', 28.99, 30.99, 35.99),
(17, '42', '48 hours', 36.99, 38.99, 41.99),
(18, '42', '24 hours', 42.99, 44.99, 49.99),
(19, '42', '12 hours', 46.99, 48.99, 53.99),
(20, '42', '6 hours', 50.99, 52.99, 57.99),
(21, '42', '3 hours', 54.99, 56.99, 61.99),
(23, '36', '10 days', 22.99, 24.99, 27.99),
(24, '36', '7 days', 23.99, 25.99, 28.99),
(25, '36', '5 days', 25.99, 27.99, 30.99),
(26, '36', '4 days', 26.99, 28.99, 32.99),
(27, '36', '3 days', 28.99, 30.99, 35.99),
(28, '36', '48 hours', 36.99, 38.99, 41.99),
(29, '36', '24 hours', 42.99, 44.99, 49.99),
(30, '36', '12 hours', 46.99, 48.99, 53.99),
(31, '36', '6 hours', 50.99, 52.99, 57.99),
(32, '36', '3 hours', 54.99, 56.99, 61.99),
(34, '11', '10 days', 22.99, 24.99, 27.99),
(35, '11', '7 days', 23.99, 25.99, 28.99),
(36, '11', '5 days', 25.99, 27.99, 30.99),
(37, '11', '4 days', 26.99, 28.99, 32.99),
(38, '11', '3 days', 28.99, 30.99, 35.99),
(39, '11', '48 hours', 36.99, 38.99, 41.99),
(40, '11', '24 hours', 42.99, 44.99, 49.99),
(41, '11', '12 hours', 46.99, 48.99, 53.99),
(42, '11', '6 hours', 50.99, 52.99, 57.99),
(43, '11', '3 hours', 54.99, 56.99, 61.99),
(45, '8', '10 days', 22.99, 24.99, 27.99),
(46, '8', '7 days', 23.99, 25.99, 28.99),
(47, '8', '5 days', 25.99, 27.99, 30.99),
(48, '8', '4 days', 26.99, 28.99, 32.99),
(49, '8', '3 days', 28.99, 30.99, 35.99),
(50, '8', '48 hours', 36.99, 38.99, 41.99),
(51, '8', '24 hours', 42.99, 44.99, 49.99),
(52, '8', '12 hours', 46.99, 48.99, 53.99),
(53, '8', '6 hours', 50.99, 52.99, 57.99),
(54, '8', '3 hours', 54.99, 56.99, 61.99),
(56, '9', '10 days', 22.99, 24.99, 27.99),
(57, '9', '7 days', 23.99, 25.99, 28.99),
(58, '9', '5 days', 25.99, 27.99, 30.99),
(59, '9', '4 days', 26.99, 28.99, 32.99),
(60, '9', '3 days', 28.99, 30.99, 35.99),
(61, '9', '48 hours', 36.99, 38.99, 41.99),
(62, '9', '24 hours', 42.99, 44.99, 49.99),
(63, '9', '12 hours', 46.99, 48.99, 53.99),
(64, '9', '6 hours', 50.99, 52.99, 57.99),
(65, '9', '3 hours', 54.99, 56.99, 61.99),
(67, '27', '10 days', 22.99, 24.99, 27.99),
(68, '27', '7 days', 23.99, 25.99, 28.99),
(69, '27', '5 days', 25.99, 27.99, 30.99),
(70, '27', '4 days', 26.99, 28.99, 32.99),
(71, '27', '3 days', 28.99, 30.99, 35.99),
(72, '27', '48 hours', 36.99, 38.99, 41.99),
(73, '27', '24 hours', 42.99, 44.99, 49.99),
(74, '27', '12 hours', 46.99, 48.99, 53.99),
(75, '27', '6 hours', 50.99, 52.99, 57.99),
(76, '27', '3 hours', 54.99, 56.99, 61.99),
(78, '38', '10 days', 30.99, 32.99, 35.99),
(79, '38', '7 days', 31.99, 33.99, 36.99),
(80, '38', '5 days', 33.99, 35.99, 38.99),
(81, '38', '4 days', 34.99, 36.99, 40.99),
(82, '38', '3 days', 36.99, 38.99, 43.99),
(83, '38', '48 hours', 44.99, 46.99, 49.99),
(84, '38', '24 hours', 50.99, 52.99, 57.99),
(85, '38', '12 hours', 54.99, 56.99, 61.99),
(86, '38', '6 hours', 58.99, 60.99, 65.99),
(87, '38', '3 hours', 62.99, 64.99, 69.99),
(89, '12', '2 months', 22.99, 22.99, 22.99),
(90, '12', '30 days', 24.99, 24.99, 24.99),
(91, '12', '20 days', 25.99, 25.99, 25.99),
(92, '12', '10 days', 26.99, 26.99, 26.99),
(93, '12', '7 days', 28.99, 28.99, 28.99),
(94, '12', '5 days', 29.99, 29.99, 29.99),
(95, '12', '3 days', 31.99, 31.99, 31.99),
(96, '12', '48 hours', 37.99, 37.99, 37.99),
(98, '43', '2 months', 22.99, 24.99, 26.99),
(99, '43', '30 days', 23.99, 25.99, 28.99),
(100, '43', '20 days', 25.99, 27.99, 30.99),
(101, '43', '10 days', 26.99, 28.99, 31.99),
(102, '43', '7 days', 28.99, 31.99, 35.99),
(103, '43', '5 days', 29.99, 32.99, 36.99),
(104, '43', '3 days', 31.99, 34.99, 38.99),
(105, '43', '48 hours', 37.99, 40.99, 44.99),
(107, '44', '2 months', 22.99, 24.99, 26.99),
(108, '44', '30 days', 23.99, 25.99, 28.99),
(109, '44', '20 days', 25.99, 27.99, 30.99),
(110, '44', '10 days', 26.99, 28.99, 31.99),
(111, '44', '7 days', 28.99, 31.99, 35.99),
(112, '44', '5 days', 29.99, 32.99, 36.99),
(113, '44', '3 days', 31.99, 34.99, 38.99),
(114, '44', '48 hours', 37.99, 40.99, 44.99),
(115, '44', '24 hours', 41.99, 44.99, 50.99),
(117, '37', '2 months', 22.99, 24.99, 26.99),
(118, '37', '30 days', 23.99, 25.99, 28.99),
(119, '37', '20 days', 25.99, 27.99, 30.99),
(120, '37', '10 days', 26.99, 28.99, 31.99),
(121, '37', '7 days', 28.99, 31.99, 35.99),
(122, '37', '5 days', 29.99, 32.99, 36.99),
(123, '37', '3 days', 31.99, 34.99, 38.99),
(124, '37', '48 hours', 37.99, 40.99, 44.99),
(125, '37', '24 hours', 41.99, 44.99, 50.99),
(127, '13', '2 months', 22.99, 24.99, 26.99),
(128, '13', '30 days', 23.99, 25.99, 28.99),
(129, '13', '20 days', 25.99, 27.99, 30.99),
(130, '13', '10 days', 26.99, 28.99, 31.99),
(131, '13', '7 days', 28.99, 31.99, 35.99),
(132, '13', '5 days', 29.99, 32.99, 36.99),
(133, '13', '3 days', 31.99, 34.99, 38.99),
(134, '13', '48 hours', 37.99, 40.99, 44.99),
(135, '13', '24 hours', 45.99, 48.99, 52.99),
(136, '13', '12 hours', 48.99, 51.99, 55.99),
(138, '15', '2 months', 22.99, 24.99, 26.99),
(139, '15', '30 days', 23.99, 25.99, 28.99),
(140, '15', '20 days', 25.99, 27.99, 30.99),
(141, '15', '10 days', 26.99, 28.99, 31.99),
(142, '15', '7 days', 28.99, 31.99, 35.99),
(143, '15', '5 days', 29.99, 32.99, 36.99),
(144, '15', '3 days', 31.99, 34.99, 38.99),
(145, '15', '48 hours', 37.99, 40.99, 44.99),
(146, '15', '24 hours', 45.99, 48.99, 52.99),
(147, '15', '12 hours', 48.99, 51.99, 55.99),
(149, '16', '2 months', 22.99, 24.99, 26.99),
(150, '16', '30 days', 23.99, 25.99, 28.99),
(151, '16', '20 days', 25.99, 27.99, 30.99),
(152, '16', '10 days', 26.99, 28.99, 31.99),
(153, '16', '7 days', 28.99, 31.99, 35.99),
(154, '16', '5 days', 29.99, 32.99, 36.99),
(155, '16', '3 days', 31.99, 34.99, 38.99),
(156, '16', '48 hours', 37.99, 40.99, 44.99),
(157, '16', '24 hours', 45.99, 48.99, 52.99),
(158, '16', '12 hours', 48.99, 51.99, 55.99),
(160, '17', '2 months', 22.99, 24.99, 26.99),
(161, '17', '30 days', 23.99, 25.99, 28.99),
(162, '17', '20 days', 25.99, 27.99, 30.99),
(163, '17', '10 days', 26.99, 28.99, 31.99),
(164, '17', '7 days', 28.99, 31.99, 35.99),
(165, '17', '5 days', 29.99, 32.99, 36.99),
(166, '17', '3 days', 31.99, 34.99, 38.99),
(167, '17', '48 hours', 37.99, 40.99, 44.99),
(168, '17', '24 hours', 45.99, 48.99, 52.99),
(169, '17', '12 hours', 48.99, 51.99, 55.99),
(171, '18', '2 months', 22.99, 24.99, 26.99),
(172, '18', '30 days', 23.99, 25.99, 28.99),
(173, '18', '20 days', 25.99, 27.99, 30.99),
(174, '18', '10 days', 26.99, 28.99, 31.99),
(175, '18', '7 days', 28.99, 31.99, 35.99),
(176, '18', '5 days', 29.99, 32.99, 36.99),
(177, '18', '3 days', 31.99, 34.99, 38.99),
(178, '18', '48 hours', 37.99, 40.99, 44.99),
(179, '18', '24 hours', 45.99, 48.99, 52.99),
(180, '18', '12 hours', 48.99, 51.99, 55.99),
(182, '14', '2 months', 22.99, 24.99, 26.99),
(183, '14', '30 days', 23.99, 25.99, 28.99),
(184, '14', '20 days', 25.99, 27.99, 30.99),
(185, '14', '10 days', 26.99, 28.99, 31.99),
(186, '14', '7 days', 28.99, 31.99, 35.99),
(187, '14', '5 days', 29.99, 32.99, 36.99),
(188, '14', '3 days', 31.99, 34.99, 38.99),
(189, '14', '48 hours', 37.99, 40.99, 44.99),
(190, '14', '24 hours', 45.99, 48.99, 52.99),
(191, '14', '12 hours', 48.99, 51.99, 55.99),
(193, '19', '10 days', 15.99, 16.99, 17.99),
(194, '19', '7 days', 16.99, 17.99, 18.99),
(195, '19', '4 days', 18.99, 19.99, 20.99),
(196, '19', '3 days', 19.99, 20.99, 21.99),
(197, '19', '48 hours', 20.99, 21.99, 22.99),
(198, '19', '24 hours', 25.99, 26.99, 27.99),
(199, '19', '12 hours', 27.99, 28.99, 29.99),
(200, '19', '6 hours', 29.99, 30.99, 31.99),
(201, '19', '3 hours', 31.99, 32.99, 33.99),
(203, '20', '10 days', 5.99, 6.99, 7.99),
(204, '20', '7 days', 6.99, 7.99, 8.99),
(205, '20', '4 days', 7.49, 8.49, 9.49),
(206, '20', '3 days', 7.99, 8.99, 9.99),
(207, '20', '48 hours', 8.49, 9.49, 10.49),
(208, '20', '24 hours', 8.99, 9.99, 10.99),
(209, '20', '12 hours', 9.99, 10.99, 11.99),
(210, '20', '6 hours', 10.99, 11.99, 12.99),
(211, '20', '3 hours', 12.99, 13.99, 14.99),
(213, '23', '10 days', 2.49, 3.49, 4.49),
(214, '23', '7 days', 3.49, 4.49, 5.49),
(215, '23', '4 days', 3.99, 4.99, 5.99),
(216, '23', '3 days', 4.49, 5.49, 6.49),
(217, '23', '48 hours', 4.99, 5.99, 6.99),
(218, '23', '24 hours', 5.49, 6.49, 7.49),
(219, '23', '12 hours', 6.49, 7.49, 8.49),
(220, '23', '6 hours', 7.49, 8.49, 9.49),
(221, '23', '3 hours', 9.49, 10.49, 11.49),
(223, '1', '10 days', 19.99, 20.99, 21.99),
(224, '1', '7 days', 20.95, 21.95, 22.95),
(225, '1', '4 days', 25.95, 26.95, 27.95),
(226, '1', '3 days', 28.95, 29.95, 30.95),
(227, '1', '48 hours', 33.95, 34.95, 35.95),
(228, '1', '24 hours', 39.95, 40.95, 41.95),
(229, '1', '12 hours', 43.95, 44.95, 45.95),
(230, '1', '6 hours', 48.95, 49.95, 50.95),
(232, '4', '10 days', 19.99, 20.99, 21.99),
(233, '4', '7 days', 20.95, 21.95, 22.95),
(234, '4', '4 days', 25.95, 26.95, 27.95),
(235, '4', '3 days', 28.95, 29.95, 30.95),
(236, '4', '48 hours', 33.95, 34.95, 35.95),
(237, '4', '24 hours', 39.95, 40.95, 41.95),
(238, '4', '12 hours', 43.95, 44.95, 45.95),
(239, '4', '6 hours', 48.95, 49.95, 50.95),
(241, '3', '10 days', 19.99, 20.99, 21.99),
(242, '3', '7 days', 20.95, 21.95, 22.95),
(243, '3', '4 days', 25.95, 26.95, 27.95),
(244, '3', '3 days', 28.95, 29.95, 30.95),
(245, '3', '48 hours', 33.95, 34.95, 35.95),
(246, '3', '24 hours', 39.95, 40.95, 41.95),
(247, '3', '12 hours', 43.95, 44.95, 45.95),
(248, '3', '6 hours', 48.95, 49.95, 50.95),
(250, '2', '10 days', 13.45, 14.45, 14.45),
(251, '2', '7 days', 14.45, 15.45, 15.45),
(252, '2', '4 days', 15.45, 16.45, 16.45),
(253, '2', '3 days', 16.45, 17.45, 17.45),
(254, '2', '48 hours', 17.45, 18.45, 18.45),
(255, '2', '24 hours', 22.45, 23.45, 23.45),
(256, '2', '12 hours', 23.45, 24.45, 24.45),
(257, '2', '6 hours', 24.45, 25.45, 25.45),
(258, '2', '3 hours', 26.45, 27.45, 27.45),
(260, '21', '10 days', 13.99, 14.99, 15.99),
(261, '21', '7 days', 14.99, 15.99, 16.99),
(262, '21', '5 days', 16.99, 17.99, 18.99),
(263, '21', '4 days', 17.99, 18.99, 19.99),
(264, '21', '3 days', 18.99, 19.99, 20.99),
(265, '21', '48 hours', 23.99, 24.99, 25.99),
(266, '21', '24 hours', 28.99, 29.99, 30.99),
(267, '21', '12 hours', 29.99, 30.99, 31.99),
(268, '21', '6 hours', 31.99, 32.99, 33.99),
(269, '21', '3 hours', 34.99, 35.99, 36.99),
(271, '34', '10 days', 5.49, 6.49, 7.49),
(272, '34', '7 days', 5.99, 6.99, 7.99),
(273, '34', '4 days', 6.49, 7.49, 8.49),
(274, '34', '3 days', 6.99, 7.99, 8.99),
(275, '34', '48 hours', 7.49, 8.49, 9.49),
(276, '34', '24 hours', 7.99, 8.99, 9.99),
(277, '34', '12 hours', 8.99, 9.99, 10.99),
(278, '34', '6 hours', 9.99, 10.99, 11.99),
(279, '34', '3 hours', 11.99, 12.99, 13.99),
(281, '10', '10 days', 22.99, 24.99, 27.99),
(282, '10', '7 days', 23.99, 25.99, 28.99),
(283, '10', '4 days', 26.99, 28.99, 31.99),
(284, '10', '3 days', 28.99, 30.99, 33.99),
(285, '10', '48 hours', 36.99, 38.99, 41.99),
(286, '10', '24 hours', 42.99, 44.99, 47.99),
(287, '10', '12 hours', 46.99, 48.99, 51.99),
(288, '10', '6 hours', 50.99, 52.99, 55.99),
(289, '10', '3 hours', 54.99, 56.99, 59.99),
(291, '24', '10 days', 23.99, 25.99, 28.99),
(292, '24', '7 days', 24.99, 26.99, 29.99),
(293, '24', '4 days', 28.99, 30.99, 33.99),
(294, '24', '3 days', 33.99, 35.99, 38.99),
(295, '24', '48 hours', 41.99, 43.99, 46.99),
(296, '24', '24 hours', 50.99, 52.99, 55.99),
(297, '24', '12 hours', 55.99, 57.99, 60.99),
(298, '24', '6 hours', 65.99, 67.99, 70.99),
(300, '40', '10 days', 22.99, 24.99, 27.99),
(301, '40', '7 days', 23.99, 25.99, 28.99),
(302, '40', '5 days', 25.99, 27.99, 30.99),
(303, '40', '4 days', 26.99, 28.99, 32.99),
(304, '40', '3 days', 28.99, 30.99, 35.99),
(305, '40', '48 hours', 36.99, 38.99, 41.99),
(306, '40', '24 hours', 42.99, 44.99, 49.99),
(307, '40', '12 hours', 46.99, 48.99, 53.99),
(308, '40', '6 hours', 50.99, 52.99, 57.99),
(309, '40', '3 hours', 54.99, 56.99, 61.99),
(311, '25', '10 days', 24.99, 26.99, 29.99),
(312, '25', '7 days', 25.99, 27.99, 30.99),
(313, '25', '4 days', 28.99, 30.99, 33.99),
(314, '25', '3 days', 30.99, 32.99, 35.99),
(315, '25', '48 hours', 38.99, 40.99, 43.99),
(316, '25', '24 hours', 44.99, 46.99, 49.99),
(317, '25', '12 hours', 48.99, 50.99, 53.99),
(318, '25', '6 hours', 52.99, 54.99, 57.99),
(319, '25', '3 hours', 56.99, 58.99, 61.99),
(321, '6', '10 days', 22.99, 24.99, 27.99),
(322, '6', '7 days', 23.99, 25.99, 28.99),
(323, '6', '5 days', 25.99, 27.99, 30.99),
(324, '6', '4 days', 26.99, 28.99, 32.99),
(325, '6', '3 days', 28.99, 30.99, 35.99),
(326, '6', '48 hours', 36.99, 38.99, 41.99),
(327, '6', '24 hours', 42.99, 44.99, 49.99),
(328, '6', '12 hours', 46.99, 48.99, 53.99),
(329, '6', '6 hours', 50.99, 52.99, 57.99),
(330, '6', '3 hours', 54.99, 56.99, 61.99),
(332, '7', '10 days', 22.99, 24.99, 27.99),
(333, '7', '7 days', 23.99, 25.99, 28.99),
(334, '7', '5 days', 25.99, 27.99, 30.99),
(335, '7', '4 days', 26.99, 28.99, 32.99),
(336, '7', '3 days', 28.99, 30.99, 35.99),
(337, '7', '48 hours', 36.99, 38.99, 41.99),
(338, '7', '24 hours', 42.99, 44.99, 49.99),
(339, '7', '12 hours', 46.99, 48.99, 53.99),
(340, '7', '6 hours', 50.99, 52.99, 57.99),
(341, '7', '3 hours', 54.99, 56.99, 61.99),
(343, '5', '10 days', 22.99, 24.99, 27.99),
(344, '5', '7 days', 23.99, 25.99, 28.99),
(345, '5', '4 days', 24.99, 26.99, 29.99),
(346, '5', '3 days', 26.99, 28.99, 31.99),
(347, '5', '48 hours', 32.99, 34.99, 37.99),
(348, '5', '24 hours', 40.99, 42.99, 45.99),
(349, '5', '12 hours', 44.99, 46.99, 49.99),
(350, '5', '6 hours', 48.99, 50.99, 53.99),
(352, '35', '10 days', 22.99, 24.99, 27.99),
(353, '35', '7 days', 23.99, 25.99, 28.99),
(354, '35', '5 days', 25.99, 27.99, 30.99),
(355, '35', '4 days', 26.99, 28.99, 32.99),
(356, '35', '3 days', 28.99, 30.99, 35.99),
(357, '35', '48 hours', 36.99, 38.99, 41.99),
(358, '35', '24 hours', 42.99, 44.99, 49.99),
(359, '35', '12 hours', 46.99, 48.99, 53.99),
(360, '35', '6 hours', 50.99, 52.99, 57.99),
(361, '35', '3 hours', 54.99, 56.99, 61.99),
(363, '29', '10 days', 1.95, 2.95, 3.95),
(364, '29', '7 days', 2.45, 3.45, 4.45),
(365, '29', '4 days', 3.45, 4.45, 5.45),
(366, '29', '3 days', 3.95, 4.95, 5.95),
(367, '29', '48 hours', 4.45, 5.45, 6.45),
(368, '29', '24 hours', 5.45, 6.45, 7.45),
(369, '29', '12 hours', 6.45, 7.45, 8.45),
(370, '29', '6 hours', 7.45, 8.45, 9.45),
(371, '29', '3 hours', 8.45, 9.45, 10.45),
(373, '30', '10 days', 2.45, 3.45, 4.45),
(374, '30', '7 days', 2.95, 3.95, 4.95),
(375, '30', '4 days', 3.95, 4.95, 5.95),
(376, '30', '3 days', 4.45, 5.45, 6.45),
(377, '30', '48 hours', 5.45, 6.45, 7.45),
(378, '30', '24 hours', 6.45, 7.45, 8.45),
(379, '30', '12 hours', 7.45, 8.45, 9.45),
(380, '30', '6 hours', 8.45, 9.45, 10.45),
(381, '30', '3 hours', 9.45, 10.45, 11.45),
(383, '41', '10 days', 23.99, 25.99, 28.99),
(384, '41', '7 days', 24.99, 26.99, 29.99),
(385, '41', '4 days', 26.99, 28.99, 31.99),
(386, '41', '3 days', 27.99, 29.99, 32.99),
(387, '41', '48 hours', 29.99, 31.99, 34.99),
(388, '41', '24 hours', 37.99, 39.99, 42.99),
(389, '41', '12 hours', 41.99, 43.99, 46.99),
(390, '41', '6 hours', 45.99, 47.99, 50.99),
(392, '32', '10 days', 15.99, 18.99, 23.99),
(393, '32', '7 days', 16.99, 19.99, 24.99),
(394, '32', '5 days', 17.99, 20.99, 25.99),
(395, '32', '3 days', 19.99, 22.99, 27.99),
(396, '32', '2 days', 22.99, 25.99, 30.99),
(397, '32', '24 hours', 25.99, 28.99, 33.99),
(398, '32', '12 hours', 29.99, 32.99, 37.99),
(399, '32', '6 hours', 33.99, 36.99, 41.99),
(401, '33', '20 days', 119.99, 159.99, 199.99),
(402, '33', '10 days', 124.99, 164.99, 204.99),
(403, '33', '7 days', 129.99, 169.99, 209.99),
(404, '33', '5 days', 134.99, 174.99, 214.99),
(405, '33', '4 days', 139.99, 179.99, 219.99),
(406, '33', '3 days', 149.99, 189.99, 229.99),
(407, '33', '48 hours', 169.99, 209.99, 249.99),
(409, '26', '10 days', 23.99, 26.99, 31.99),
(410, '26', '7 days', 24.99, 27.99, 32.99),
(411, '26', '5 days', 25.99, 28.99, 33.99),
(412, '26', '3 days', 27.99, 30.99, 35.99),
(413, '26', '48 hours', 30.99, 33.99, 38.99),
(414, '26', '24 hours', 33.99, 36.99, 41.99),
(415, '26', '12 hours', 37.99, 40.99, 45.99),
(417, '28', '10 days', 29.99, 31.99, 34.99),
(418, '28', '7 days', 30.99, 32.99, 35.99),
(419, '28', '4 days', 34.99, 36.99, 39.99),
(420, '28', '3 days', 39.99, 41.99, 44.99),
(421, '28', '48 hours', 47.99, 49.99, 52.99),
(422, '28', '24 hours', 56.99, 58.99, 61.99),
(423, '28', '12 hours', 61.99, 63.99, 66.99),
(425, '31', '10 days', 62.99, 82.99, 102.99),
(426, '31', '7 days', 65.99, 85.99, 105.99),
(427, '31', '5 days', 68.99, 88.99, 108.99),
(428, '31', '4 days', 70.99, 90.99, 110.99),
(429, '31', '3 days', 72.99, 92.99, 112.99),
(430, '31', '48 hours', 78.99, 98.99, 118.99),
(431, '31', '24 hours', 88.99, 108.99, 128.99),
(433, '39', '10 days', 29.99, 31.99, 34.99),
(434, '39', '7 days', 30.99, 32.99, 35.99),
(435, '39', '4 days', 32.99, 34.99, 37.99),
(436, '39', '3 days', 33.99, 35.99, 38.99),
(437, '39', '48 hours', 35.99, 37.99, 40.99),
(438, '39', '24 hours', 43.99, 45.99, 48.99),
(439, '39', '12 hours', 47.99, 49.99, 52.99);

-- --------------------------------------------------------

--
-- Table structure for table `sample_essay`
--

CREATE TABLE IF NOT EXISTS `sample_essay` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `topic` varchar(200) DEFAULT NULL,
  `type_document` varchar(200) DEFAULT NULL,
  `urgency` varchar(200) DEFAULT NULL,
  `level` varchar(200) DEFAULT NULL,
  `number_of_pages` varchar(200) DEFAULT NULL,
  `subject_area` varchar(200) DEFAULT NULL,
  `academic_level` varchar(200) DEFAULT NULL,
  `style` varchar(200) DEFAULT NULL,
  `no_sources` varchar(200) DEFAULT NULL,
  `pdf_file` varchar(200) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `sample_essay`
--

INSERT INTO `sample_essay` (`id`, `topic`, `type_document`, `urgency`, `level`, `number_of_pages`, `subject_area`, `academic_level`, `style`, `no_sources`, `pdf_file`, `status`, `update_date`) VALUES
(13, 'Test', 'Term paper', '4 days', 'Platinum Quality', '13', 'Business', 'Master', 'Vancouver', '18', 'popup_1.png', NULL, '2013-08-03 06:06:15'),
(14, 'Test2', 'coursework', '7 days', 'Standard Quality', '1', 'Public Relations', 'High School', 'APA', '1', 'ARIF HOSSAIN.pdf', NULL, '2013-08-03 06:07:20'),
(15, '', '', '', '', '', '', '', '', '', '', NULL, '2013-08-18 21:40:13'),
(16, '', '', '', '', '', '', '', '', '', '', NULL, '2013-08-18 21:47:03');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `status` int(2) DEFAULT '1',
  `description` text,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `status`, `description`) VALUES
(1, 'Admission Services - Admission Essay', 1, NULL),
(2, 'Admission Services - Editing', 1, NULL),
(3, 'Admission Services - Prsonal Statement', 1, NULL),
(4, 'Admission Services - Scholarship Essay', 1, NULL),
(5, 'Annotated Bibliography', 1, NULL),
(6, 'Article', 1, '<p>Need help researching and drafting an article? Our writers do that too! We specialize in providing you insightful and 100% original articles that are written to order. Don&rsquo;t put off that next assignment any longer. Let the experts at Master Essays craft you a project that is fully referenced and properly formatted.</p>\r\n<p>&nbsp;</p>\r\n<p>We are always standing by and ready to provide you with that perfect - top quality &ndash; article. Our clients are consistently amazed by the improvement in their grades after using our services. At Master Essays, our mission is to provide you with academic writing assistance 24 hours a day &ndash; 7 days a week. Master Essays is the one writing service you can trust and depend on.</p>'),
(7, 'Article Critique', 1, '<p>Article critiques are one of the most common assignments handed out at the university level. You have to carefully integrate course materials and theories, and then apply them to a text. You also have to be able to articulately argue a point and analyze this text. Sometimes this text is provided by your instructor - sometimes you are responsible for finding it yourself. Whatever the case &ndash; Master Essays has you covered.</p>\r\n<p>&nbsp;</p>\r\n<p>We are always standing by and ready to provide you with that perfect - top quality &ndash; article critique. Our clients are consistently amazed by the improvement in their grades after using our services. At Master Essays, our mission is to provide you with academic writing assistance 24 hours a day &ndash; 7 days a week. Master Essays is the one writing service you can trust and depend on.</p>'),
(8, 'book report', 1, '<p>Master Essays has a writing staff with a wealth of experience reviewing texts. We know how difficult it can be to pick out key points. Having trouble with symbolism, themes, sub-text? Don&rsquo;t worry. We&rsquo;ve got you covered. Our writers can also provide you with professional grade critiques and criticisms of full length novels and novellas. We understand how hard it can be to find the time to get through a 500 page book &ndash; let alone draft a coherent report on one.</p>\r\n<p>&nbsp;</p>\r\n<p>If you need some help with your next book review or report, contact us. Our writers specialize in this type of project because &ndash; hard as it may seem to believe &ndash; they actually enjoy them. Once they have your assigned text, they will carefully read and analyze it. Afterwards, they will draft you a perfect reference paper that will undoubtedly make your job a lot easier.</p>\r\n<p>&nbsp;</p>\r\n<p>Looking for some assistance with that next book review/report? Well, look no further than Master Essays. We are always standing by and ready to provide you with a quality and professional grade project. Master Essays has helped countless students achieve success by drafting them original book reviews and reports &ndash; written exactly to their specifications. At Master Essays, our mission is to provide you with academic writing assistance 24 hours a day &ndash; 7 days a week. Master Essays is the one writing service you can trust and depend on.</p>'),
(9, 'Book review', 1, '<p>Master Essays has a writing staff with a wealth of experience reviewing texts. We know how difficult it can be to pick out key points. Having trouble with symbolism, themes, sub-text? Don&rsquo;t worry. We&rsquo;ve got you covered. Our writers can also provide you with professional grade critiques and criticisms of full length novels and novellas. We understand how hard it can be to find the time to get through a 500 page book &ndash; let alone draft a coherent report on one.</p>\r\n<p>&nbsp;</p>\r\n<p>If you need some help with your next book review or report, contact us. Our writers specialize in this type of project because &ndash; hard as it may seem to believe &ndash; they actually enjoy them. Once they have your assigned text, they will carefully read and analyze it. Afterwards, they will draft you a perfect reference paper that will undoubtedly make your job a lot easier.</p>\r\n<p>&nbsp;</p>\r\n<p>Looking for some assistance with that next book review/report? Well, look no further than Master Essays. We are always standing by and ready to provide you with a quality and professional grade project. Master Essays has helped countless students achieve success by drafting them original book reviews and reports &ndash; written exactly to their specifications. At Master Essays, our mission is to provide you with academic writing assistance 24 hours a day &ndash; 7 days a week. Master Essays is the one writing service you can trust and depend on.</p>'),
(10, 'Case Study', 1, '<p>Writing case studies can be a long and tedious process. You have to be able to coherently draw conclusions from copious amounts of research gathered from the real world. Moreover, writing a quality case study will likely mean that you have to meticulously examine important issues and then test your research results against accepted theories. Sound like fun?</p>\r\n<p>&nbsp;</p>\r\n<p>If you&rsquo;ve got other things to do &ndash; or if you think your academic time could be better spent &ndash; contact us today. Our case study writers are experts. They have done it so many times that they have developed techniques which allow them to finish the writing much faster than the average student. This means a better case study for you &ndash; at a cheaper price.</p>\r\n<p>&nbsp;</p>\r\n<p>We are always standing by and ready to provide you with that perfect - top quality &ndash; case study. Our clients are consistently amazed by the improvement in their grades after using our services. At Master Essays, our mission is to provide you with academic writing assistance 24 hours a day &ndash; 7 days a week. Master Essays is the one writing service you can trust and depend on.</p>'),
(11, 'coursework', 1, '<p><strong>Coursework&amp; Assignments</strong>&nbsp;usually refers to assignments carried out by students at the university or middle/high school level. This work contributes towards their overall grade, but is usually assessed separately from their final exams.</p>\r\n<p>&nbsp;</p>\r\n<p>Good science&nbsp;and social science <strong>coursework</strong>&nbsp;generally rests on a serious theoretical base. As a young researcher choosing a topic for&nbsp;<strong>coursework,</strong>&nbsp;you will likely have to consult with your teachers about two matters: 1) first, the suitability and value of your chosen topic; and 2) which sources will likely be the most useful for this kind of writing. This stage will also take into consideration your level of skill and knowledge.</p>\r\n<p>&nbsp;</p>\r\n<p>In high school, college, and universities,&nbsp;<strong>coursework</strong>&nbsp;is just one mode of assessment. Students are required to produce&nbsp;<strong>coursework</strong><strong>&nbsp;</strong>in order to broaden their knowledge and enhance their research skills. This type of work is also used to demonstrate how well students can discuss, reason and construct practical outcomes from the theoretical knowledge learned during their course. Class notes are a good place to start. That being said, good <strong>coursework</strong>&nbsp;requires additional materials, and you will generally find them from the advised sources. Unless you plan on reading them twice, make sure to pay attention and thoroughly absorb the material. This will take more time but will always be more effective in the long run. Take good notes and mark passages. Use whatever techniques work best for you to in order to produce quality notes for <strong>coursework</strong>. You should also always keep in mind that your sources have to be listed appropriately. This is just another reason why you should always keep track of them while working with the literature.</p>\r\n<p>&nbsp;</p>\r\n<p>Without a doubt, a theoretical framework in <strong>coursework</strong>&nbsp;is great. However, what you need even more is your own proper interpretation of the facts. This is why you should be prepared to roll up your sleeves and work out a comprehensive theory of your own for the&nbsp;<strong>coursework</strong>. Just kidding &ndash; relax, it&rsquo;s not that complicated. The teachers won&rsquo;t let you, but this is why you should make sure that you include your own opinion within a social science&nbsp;<strong>coursework</strong>. Also do not forget to summarize and edit. When everything is done, go get yourself a snack.</p>\r\n<p>&nbsp;</p>\r\n<p>If you feel like you need a little help with any kind of paper or coursework, feel free to contact our team of writing professionals. We are always standing by and ready to provide you with that perfect - top quality &ndash; paper. Our clients are consistently amazed by the improvement in their grades after using our services. At Master Essays, our mission is to provide you with academic writing assistance 24 hours a day &ndash; 7 days a week. Master Essays is the one writing service you can trust and depend on.</p>'),
(12, 'Dissertation', 1, NULL),
(13, 'Dissertation chapter - Abstract', 1, NULL),
(14, 'Dissertation Chapter - Discussion', 1, NULL),
(15, 'Dissertation Chapter - Introduction Chapter', 1, NULL),
(16, 'Dissertation Chapter - Literature Review', 1, NULL),
(17, 'Dissertation Chapter - Methodology', 1, NULL),
(18, 'Dissertation Chapter - Results', 1, NULL),
(19, 'Dissertation Services - Editing', 1, NULL),
(20, 'Dissertation Services - Proofreading', 1, NULL),
(21, 'Editing', 1, NULL),
(22, 'Essay', 1, '<p>Got a specific project and don&rsquo;t see it listed in our services? Don&rsquo;t worry. At Master Essays we get requests for custom papers all the time. We understand that academic writing comes in countless shapes and forms. For this reason, we offer you the ability to have your paper custom designed by our skilled writers. Need a specific structure or obscure format? We handle that too. If it involves writing and academics &ndash; chances are we do it!</p>\r\n<p>&nbsp;</p>\r\n<p>If you&rsquo;ve got a custom paper requirement and need some help, don&rsquo;t hesitate any longer. Contact us today and we will have your paper written to your exact specifications. Master Essays understands that our clients need variety and adaptability in our writers. Therefore, they are all fully qualified and experienced at drafting great custom papers.</p>\r\n<p>&nbsp;</p>\r\n<p>If adaptability and creativity is what you need &ndash; look no further than Master Essays. We are always standing by and ready to provide you with that perfect - top quality &ndash; custom essay. Master Essays has helped countless clients achieve success by drafting them custom essays according to their exact instructions. At Master Essays, our mission is to provide you with academic writing assistance 24 hours a day &ndash; 7 days a week. Master Essays is the one writing service you can trust and depend on.</p>'),
(23, 'Formating', 1, NULL),
(24, 'Lab Report', 1, '<p>Lab reports are written after scientific examinations have taken place. They are used to document results and provide hypotheses. We understand how time consuming this process can be. Master Essays has a staff of fully-trained, qualified writers who can draft, edit, and format these reports in a way that ensures you receive the best possible grade. Our writers are also adaptable &ndash; they understand that different levels of ability require different levels of writing. Master Essays is able to provide you with a professional looking lab report that is appropriate to your level of education.</p>\r\n<p>&nbsp;</p>\r\n<p>If you have an important lab report due, don&rsquo;t risk a poor grade by handing in a sloppy or unfinished copy. Masters Essay can work with you on your report &ndash; regardless of the stage you are at. We are experts at providing our clients with a product that can get the job done. Don&rsquo;t let your workload overwhelm you - let us lend you a helping hand.</p>\r\n<p>&nbsp;</p>\r\n<p>If a professional looking, well-formatted lab report is what you need &ndash; look no further than Master Essays. We are always standing by and ready to provide you with that perfect - top quality &ndash; lab report. Master Essays has helped countless clients around the world achieve success by drafting them lab reports according to their experimental results and skill level. At Master Essays, our mission is to provide you with academic writing assistance 24 hours a day &ndash; 7 days a week. Master Essays is the one writing service you can trust and depend on.</p>\r\n<p><strong>&nbsp;</strong></p>'),
(25, 'Math/Physics/Economics/Statistics Problems', 1, NULL),
(26, 'Mind/Concept mapping', 1, NULL),
(27, 'Movie review', 1, NULL),
(28, 'Multimedia Project', 1, NULL),
(29, 'Multiple Choice Questions (Non-time-framed)', 1, NULL),
(30, 'Multiple Choice Questions (Time-framed)', 1, NULL),
(31, 'Online assignment', 1, NULL),
(32, 'PowerPoint Presentation', 1, NULL),
(33, 'Programming', 1, NULL),
(34, 'Proofreading', 1, NULL),
(35, 'Reaction Paper', 1, NULL),
(36, 'Research paper', 1, '<p>Let&rsquo;s face it - it&rsquo;s not always possible to get everything done on time. This is especially true when it comes to long and complicated research papers. We&rsquo;ve all been in a situation where things have been left too long and there&rsquo;s simply too much to do. If you&rsquo;ve been assigned a research paper and have no time to finish it, let us help.</p>\r\n<p>&nbsp;</p>\r\n<p>Everyone has different responsibilities. Sometimes work gets in the way of school, and sometimes there&rsquo;s just too many assignments at once. These are the times that you have to prioritize the things you can possibly handle and the things you simply can&rsquo;t.</p>\r\n<p>&nbsp;</p>\r\n<p>We&rsquo;ve got the writers on staff that can help ease the burden. They can draft you a custom research paper that is perfectly suited to your needs. Don&rsquo;t stress it &ndash; deal with it. Our writers have the experience and expertise to provide you with a top quality research paper &ndash; all for a reasonable price.</p>\r\n<p>&nbsp;</p>\r\n<p>We are always standing by and ready to provide you with that perfect - top quality &ndash; research paper. Our clients are consistently amazed by the improvement in their grades after using our services. At Master Essays, our mission is to provide you with academic writing assistance 24 hours a day &ndash; 7 days a week. Master Essays is the one writing service you can trust and depend on.</p>\r\n<p><strong>&nbsp;</strong></p>'),
(37, 'Research Proposal', 1, NULL),
(38, 'Research Summary', 1, NULL),
(39, 'Simulation report', 1, NULL),
(40, 'Speech/Presentation', 1, '<p>Studies have shown that public speaking and presenting are the number one fears of most people. Why add more worries by struggling through the writing process? Master Essays has writers who excel at this type of writing. They understand the intricacies of drafting written assignments that are pleasing to the eye &ndash; and the ear. We can provide you with that perfect speech or presentation on short notice. Master Essays has handled everything from class presentations to valedictory addresses. We know how to write in a way that will allow you to get your message across.</p>\r\n<p>&nbsp;</p>\r\n<p>Master Essays can work with your speech or presentation from scratch &ndash; or we can help you develop your own ideas and thoughts in a more coherent way. We handle this type of project every day and our clients are always very impressed. So - when it comes to speeches and presentations &ndash; ask not what Master Essays can do for you; ask why you didn&rsquo;t contact us sooner &ndash; we can do it all!</p>\r\n<p>&nbsp;</p>\r\n<p>If you need help with your next speech or presentation &ndash; look no further than Master Essays. We are always standing by and ready to provide you with the perfect written project. Master Essays has helped countless clients achieve success by drafting them speeches and presentations that are so good &ndash; they feel nothing but confidence as they deliver them. At Master Essays, our mission is to provide you with academic writing assistance 24 hours a day &ndash; 7 days a week. Master Essays is the one writing service you can trust and depend on</p>'),
(41, 'Statistics Project', 1, NULL),
(42, 'Term paper', 1, '<p>Term papers can be quite intimidating. It&rsquo;s just something about knowing that it has all come down to this. Ever had that feeling? A week to go in the term and you haven&rsquo;t even started? Relax, let us help. Our writers have the ability to research, draft, and complete a quality term paper &ndash; and they can do it on short notice!</p>\r\n<p>&nbsp;</p>\r\n<p>Don&rsquo;t settle for what the competition can offer you. We can get your term paper done quickly AND we can do it well. Our writers can draft you a custom term paper that is 100% original. You won&rsquo;t ever have to worry that your paper has been recycled, copied, or re-worked. Master Essays guarantees that your paper will be written to order based on the instructions you provide.</p>\r\n<p>&nbsp;</p>\r\n<p>If you&rsquo;ve left your term paper too late &ndash; or if you just feel overwhelmed by the whole process- we are standing by and ready to assist you. Why let the stresses overwhelm you when you there is a quality and affordable option only an email &ndash; or a phone call &ndash; away?</p>\r\n<p>&nbsp;</p>\r\n<p>We are always standing by and ready to provide you with that perfect - top quality &ndash; term paper. Our clients are consistently amazed by the improvement in their grades after using our services. At Master Essays, our mission is to provide you with academic writing assistance 24 hours a day &ndash; 7 days a week. Master Essays is the one writing service you can trust and depend on.</p>'),
(43, 'Thesis', 1, NULL),
(44, 'Thesis/Dissertion Proposal', 1, '<p>asdasdasdasd</p>');

-- --------------------------------------------------------

--
-- Table structure for table `services_products`
--

CREATE TABLE IF NOT EXISTS `services_products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(200) DEFAULT NULL,
  `service_id` int(10) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `type` int(2) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `status`, `type`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 1, 1),
(2, 'user', '6ad14ba9986e3615423dfca256d04e3f', 1, 2),
(6, 'shahid', '123456', 1, 2),
(7, 'rasel', '123456', 1, 2),
(8, 'monir', '123456', 1, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
