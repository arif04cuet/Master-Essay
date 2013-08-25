-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 01, 2013 at 08:39 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `country`, `phone`, `password`, `status`) VALUES
(3, 'asd', 'asd', 'arif@gmail.com', 'Albania', '355-123456', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(5, 'Arif2', 'Hossain', 'arif2@gmail.com', 'Bangladesh', '263-01717348147-land line', '0192023a7bbd73250516f069df18b500', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscribers`
--

CREATE TABLE IF NOT EXISTS `newsletter_subscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `subscription_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `newsletter_subscribers`
--

INSERT INTO `newsletter_subscribers` (`id`, `name`, `email`, `status`, `subscription_date`) VALUES
(1, 'test', 'test@gmail.com', NULL, '2013-07-23 16:35:53');

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
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `topic`, `type_document`, `urgency`, `level`, `spacing`, `number_of_pages`, `currency`, `cost_per_page`, `page_summery`, `subject_area`, `total`, `academic_level`, `style`, `no_sources`, `writer`, `order_description`, `will_upload_files`, `night_calls`, `discount_code`, `accept`, `billing_address`, `city_town`, `c_country`, `zip_code`, `holder_phone`, `order_id`, `status`, `customer_id`, `order_date`) VALUES
(5, 'fghfgh', 'Essay', '10 days', 'Standard Quality', 'Double Spaced', '1', 'USD', '22.99', NULL, 'Dance', '22.99', 'Undergraduate', 'APA', '1', 'us_writer', 'fghfgh', NULL, NULL, 'fghfgh', '1', 'sdf', 'sdf', 'AD', '123', 'sdfsdf', NULL, 0, 3, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `urgency` varchar(100) DEFAULT NULL,
  `standard` float DEFAULT NULL,
  `premium` float NOT NULL,
  `platinum` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=397 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `urgency`, `standard`, `premium`, `platinum`) VALUES
(1, 'Essay', '10 days', 22.99, 24.99, 27.99),
(2, 'Essay', '7 days', 23.99, 25.99, 28.99),
(3, 'Essay', '5 days', 25.99, 27.99, 30.99),
(4, 'Essay', '4 days', 26.99, 28.99, 32.99),
(5, 'Essay', '3 days', 28.99, 30.99, 35.99),
(6, 'Essay', '48 hours', 36.99, 38.99, 41.99),
(7, 'Essay', '24 hours', 42.99, 44.99, 49.99),
(8, 'Essay', '12 hours', 46.99, 48.99, 53.99),
(9, 'Essay', '6 hours ', 50.99, 52.99, 57.99),
(10, 'Essay', '3 hours', 54.99, 56.99, 61.99),
(11, 'Term paper', '10 days', 22.99, 24.99, 27.99),
(12, 'Term paper', '7 days', 23.99, 25.99, 28.99),
(13, 'Term paper', '5 days', 25.99, 27.99, 30.99),
(14, 'Term paper', '4 days', 26.99, 28.99, 32.99),
(15, 'Term paper', '3 days', 28.99, 30.99, 35.99),
(16, 'Term paper', '48 hours', 36.99, 38.99, 41.99),
(17, 'Term paper', '24 hours', 42.99, 44.99, 49.99),
(18, 'Term paper', '12 hours', 46.99, 48.99, 53.99),
(19, 'Term paper', '6 hours', 50.99, 52.99, 57.99),
(20, 'Term paper', '3 hours', 54.99, 56.99, 61.99),
(21, 'Research paper', '10 days', 22.99, 24.99, 27.99),
(22, 'Research paper', '7 days', 23.99, 25.99, 28.99),
(23, 'Research paper', '5 days', 25.99, 27.99, 30.99),
(24, 'Research paper', '4 days', 26.99, 28.99, 32.99),
(25, 'Research paper', '3 days', 28.99, 30.99, 35.99),
(26, 'Research paper', '48 hours', 36.99, 38.99, 41.99),
(27, 'Research paper', '24 hours', 42.99, 44.99, 49.99),
(28, 'Research paper', '12 hours', 46.99, 48.99, 53.99),
(29, 'Research paper', '6 hours', 50.99, 52.99, 57.99),
(30, 'Research paper', '3 hours', 54.99, 56.99, 61.99),
(31, 'coursework', '10 days', 22.99, 24.99, 27.99),
(32, 'coursework', '7 days', 23.99, 25.99, 28.99),
(33, 'coursework', '5 days', 25.99, 27.99, 30.99),
(34, 'coursework', '4 days', 26.99, 28.99, 32.99),
(35, 'coursework', '3 days', 28.99, 30.99, 35.99),
(36, 'coursework', '48 hours', 36.99, 38.99, 41.99),
(37, 'coursework', '24 hours', 42.99, 44.99, 49.99),
(38, 'coursework', '12 hours', 46.99, 48.99, 53.99),
(39, 'coursework', '6 hours', 50.99, 52.99, 57.99),
(40, 'coursework', '3 hours', 54.99, 56.99, 61.99),
(41, 'book report', '10 days', 22.99, 24.99, 27.99),
(42, 'book report', '7 days', 23.99, 25.99, 28.99),
(43, 'book report', '5 days', 25.99, 27.99, 30.99),
(44, 'book report', '4 days', 26.99, 28.99, 32.99),
(45, 'book report', '3 days', 28.99, 30.99, 35.99),
(46, 'book report', '48 hours', 36.99, 38.99, 41.99),
(47, 'book report', '24 hours', 42.99, 44.99, 49.99),
(48, 'book report', '12 hours', 46.99, 48.99, 53.99),
(49, 'book report', '6 hours', 50.99, 52.99, 57.99),
(50, 'book report', '3 hours', 54.99, 56.99, 61.99),
(51, 'Book review', '10 days', 22.99, 24.99, 27.99),
(52, 'Book review', '7 days', 23.99, 25.99, 28.99),
(53, 'Book review', '5 days', 25.99, 27.99, 30.99),
(54, 'Book review', '4 days', 26.99, 28.99, 32.99),
(55, 'Book review', '3 days', 28.99, 30.99, 35.99),
(56, 'Book review', '48 hours', 36.99, 38.99, 41.99),
(57, 'Book review', '24 hours', 42.99, 44.99, 49.99),
(58, 'Book review', '12 hours', 46.99, 48.99, 53.99),
(59, 'Book review', '6 hours', 50.99, 52.99, 57.99),
(60, 'Book review', '3 hours', 54.99, 56.99, 61.99),
(61, 'Movie review', '10 days', 22.99, 24.99, 27.99),
(62, 'Movie review', '7 days', 23.99, 25.99, 28.99),
(63, 'Movie review', '5 days', 25.99, 27.99, 30.99),
(64, 'Movie review', '4 days', 26.99, 28.99, 32.99),
(65, 'Movie review', '3 days', 28.99, 30.99, 35.99),
(66, 'Movie review', '48 hours', 36.99, 38.99, 41.99),
(67, 'Movie review', '24 hours', 42.99, 44.99, 49.99),
(68, 'Movie review', '12 hours', 46.99, 48.99, 53.99),
(69, 'Movie review', '6 hours', 50.99, 52.99, 57.99),
(70, 'Movie review', '3 hours', 54.99, 56.99, 61.99),
(71, 'Research Summary', '10 days', 30.99, 32.99, 35.99),
(72, 'Research Summary', '7 days', 31.99, 33.99, 36.99),
(73, 'Research Summary', '5 days', 33.99, 35.99, 38.99),
(74, 'Research Summary', '4 days', 34.99, 36.99, 40.99),
(75, 'Research Summary', '3 days', 36.99, 38.99, 43.99),
(76, 'Research Summary', '48 hours', 44.99, 46.99, 49.99),
(77, 'Research Summary', '24 hours', 50.99, 52.99, 57.99),
(78, 'Research Summary', '12 hours', 54.99, 56.99, 61.99),
(79, 'Research Summary', '6 hours', 58.99, 60.99, 65.99),
(80, 'Research Summary', '3 hours', 62.99, 64.99, 69.99),
(81, 'Dissertation', '2 months', 22.99, 22.99, 22.99),
(82, 'Dissertation', '30 days', 24.99, 24.99, 24.99),
(83, 'Dissertation', '20 days', 25.99, 25.99, 25.99),
(84, 'Dissertation', '10 days', 26.99, 26.99, 26.99),
(85, 'Dissertation', '7 days', 28.99, 28.99, 28.99),
(86, 'Dissertation', '5 days', 29.99, 29.99, 29.99),
(87, 'Dissertation', '3 days', 31.99, 31.99, 31.99),
(88, 'Dissertation', '48 hours', 37.99, 37.99, 37.99),
(89, 'Thesis', '2 months', 22.99, 24.99, 26.99),
(90, 'Thesis', '30 days', 23.99, 25.99, 28.99),
(91, 'Thesis', '20 days', 25.99, 27.99, 30.99),
(92, 'Thesis', '10 days', 26.99, 28.99, 31.99),
(93, 'Thesis', '7 days', 28.99, 31.99, 35.99),
(94, 'Thesis', '5 days', 29.99, 32.99, 36.99),
(95, 'Thesis', '3 days', 31.99, 34.99, 38.99),
(96, 'Thesis', '48 hours', 37.99, 40.99, 44.99),
(97, 'Thesis/Dissertion Proposal', '2 months', 22.99, 24.99, 26.99),
(98, 'Thesis/Dissertion Proposal', '30 days', 23.99, 25.99, 28.99),
(99, 'Thesis/Dissertion Proposal', '20 days', 25.99, 27.99, 30.99),
(100, 'Thesis/Dissertion Proposal', '10 days', 26.99, 28.99, 31.99),
(101, 'Thesis/Dissertion Proposal', '7 days', 28.99, 31.99, 35.99),
(102, 'Thesis/Dissertion Proposal', '5 days', 29.99, 32.99, 36.99),
(103, 'Thesis/Dissertion Proposal', '3 days', 31.99, 34.99, 38.99),
(104, 'Thesis/Dissertion Proposal', '48 hours', 37.99, 40.99, 44.99),
(105, 'Thesis/Dissertion Proposal', '24 hours', 41.99, 44.99, 50.99),
(106, 'Research Proposal', '2 months', 22.99, 24.99, 26.99),
(107, 'Research Proposal', '30 days', 23.99, 25.99, 28.99),
(108, 'Research Proposal', '20 days', 25.99, 27.99, 30.99),
(109, 'Research Proposal', '10 days', 26.99, 28.99, 31.99),
(110, 'Research Proposal', '7 days', 28.99, 31.99, 35.99),
(111, 'Research Proposal', '5 days', 29.99, 32.99, 36.99),
(112, 'Research Proposal', '3 days', 31.99, 34.99, 38.99),
(113, 'Research Proposal', '48 hours', 37.99, 40.99, 44.99),
(114, 'Research Proposal', '24 hours', 41.99, 44.99, 50.99),
(115, 'Dissertation chapter - Abstract', '2 months', 22.99, 24.99, 26.99),
(116, 'Dissertation chapter - Abstract', '30 days', 23.99, 25.99, 28.99),
(117, 'Dissertation chapter - Abstract', '20 days', 25.99, 27.99, 30.99),
(118, 'Dissertation chapter - Abstract', '10 days', 26.99, 28.99, 31.99),
(119, 'Dissertation chapter - Abstract', '7 days', 28.99, 31.99, 35.99),
(120, 'Dissertation chapter - Abstract', '5 days', 29.99, 32.99, 36.99),
(121, 'Dissertation chapter - Abstract', '3 days', 31.99, 34.99, 38.99),
(122, 'Dissertation chapter - Abstract', '48 hours', 37.99, 40.99, 44.99),
(123, 'Dissertation chapter - Abstract', '24 hours', 45.99, 48.99, 52.99),
(124, 'Dissertation chapter - Abstract', '12 hours', 48.99, 51.99, 55.99),
(125, 'Dissertation Chapter - Introduction Chapter', '2 months', 22.99, 24.99, 26.99),
(126, 'Dissertation Chapter - Introduction Chapter', '30 days', 23.99, 25.99, 28.99),
(127, 'Dissertation Chapter - Introduction Chapter', '20 days', 25.99, 27.99, 30.99),
(128, 'Dissertation Chapter - Introduction Chapter', '10 days', 26.99, 28.99, 31.99),
(129, 'Dissertation Chapter - Introduction Chapter', '7 days', 28.99, 31.99, 35.99),
(130, 'Dissertation Chapter - Introduction Chapter', '5 days', 29.99, 32.99, 36.99),
(131, 'Dissertation Chapter - Introduction Chapter', '3 days', 31.99, 34.99, 38.99),
(132, 'Dissertation Chapter - Introduction Chapter', '48 hours', 37.99, 40.99, 44.99),
(133, 'Dissertation Chapter - Introduction Chapter', '24 hours', 45.99, 48.99, 52.99),
(134, 'Dissertation Chapter - Introduction Chapter', '12 hours', 48.99, 51.99, 55.99),
(135, 'Dissertation Chapter - Literature Review', '2 months', 22.99, 24.99, 26.99),
(136, 'Dissertation Chapter - Literature Review', '30 days', 23.99, 25.99, 28.99),
(137, 'Dissertation Chapter - Literature Review', '20 days', 25.99, 27.99, 30.99),
(138, 'Dissertation Chapter - Literature Review', '10 days', 26.99, 28.99, 31.99),
(139, 'Dissertation Chapter - Literature Review', '7 days', 28.99, 31.99, 35.99),
(140, 'Dissertation Chapter - Literature Review', '5 days', 29.99, 32.99, 36.99),
(141, 'Dissertation Chapter - Literature Review', '3 days', 31.99, 34.99, 38.99),
(142, 'Dissertation Chapter - Literature Review', '48 hours', 37.99, 40.99, 44.99),
(143, 'Dissertation Chapter - Literature Review', '24 hours', 45.99, 48.99, 52.99),
(144, 'Dissertation Chapter - Literature Review', '12 hours', 48.99, 51.99, 55.99),
(145, 'Dissertation Chapter - Methodology', '2 months', 22.99, 24.99, 26.99),
(146, 'Dissertation Chapter - Methodology', '30 days', 23.99, 25.99, 28.99),
(147, 'Dissertation Chapter - Methodology', '20 days', 25.99, 27.99, 30.99),
(148, 'Dissertation Chapter - Methodology', '10 days', 26.99, 28.99, 31.99),
(149, 'Dissertation Chapter - Methodology', '7 days', 28.99, 31.99, 35.99),
(150, 'Dissertation Chapter - Methodology', '5 days', 29.99, 32.99, 36.99),
(151, 'Dissertation Chapter - Methodology', '3 days', 31.99, 34.99, 38.99),
(152, 'Dissertation Chapter - Methodology', '48 hours', 37.99, 40.99, 44.99),
(153, 'Dissertation Chapter - Methodology', '24 hours', 45.99, 48.99, 52.99),
(154, 'Dissertation Chapter - Methodology', '12 hours', 48.99, 51.99, 55.99),
(155, 'Dissertation Chapter - Results', '2 months', 22.99, 24.99, 26.99),
(156, 'Dissertation Chapter - Results', '30 days', 23.99, 25.99, 28.99),
(157, 'Dissertation Chapter - Results', '20 days', 25.99, 27.99, 30.99),
(158, 'Dissertation Chapter - Results', '10 days', 26.99, 28.99, 31.99),
(159, 'Dissertation Chapter - Results', '7 days', 28.99, 31.99, 35.99),
(160, 'Dissertation Chapter - Results', '5 days', 29.99, 32.99, 36.99),
(161, 'Dissertation Chapter - Results', '3 days', 31.99, 34.99, 38.99),
(162, 'Dissertation Chapter - Results', '48 hours', 37.99, 40.99, 44.99),
(163, 'Dissertation Chapter - Results', '24 hours', 45.99, 48.99, 52.99),
(164, 'Dissertation Chapter - Results', '12 hours', 48.99, 51.99, 55.99),
(165, 'Dissertation Chapter - Discussion', '2 months', 22.99, 24.99, 26.99),
(166, 'Dissertation Chapter - Discussion', '30 days', 23.99, 25.99, 28.99),
(167, 'Dissertation Chapter - Discussion', '20 days', 25.99, 27.99, 30.99),
(168, 'Dissertation Chapter - Discussion', '10 days', 26.99, 28.99, 31.99),
(169, 'Dissertation Chapter - Discussion', '7 days', 28.99, 31.99, 35.99),
(170, 'Dissertation Chapter - Discussion', '5 days', 29.99, 32.99, 36.99),
(171, 'Dissertation Chapter - Discussion', '3 days', 31.99, 34.99, 38.99),
(172, 'Dissertation Chapter - Discussion', '48 hours', 37.99, 40.99, 44.99),
(173, 'Dissertation Chapter - Discussion', '24 hours', 45.99, 48.99, 52.99),
(174, 'Dissertation Chapter - Discussion', '12 hours', 48.99, 51.99, 55.99),
(175, 'Dissertation Services - Editing', '10 days', 0, 0, 0),
(176, 'Dissertation Services - Editing', '7 days', 0, 0, 0),
(177, 'Dissertation Services - Editing', '4 days', 0, 0, 0),
(178, 'Dissertation Services - Editing', '3 days', 0, 0, 0),
(179, 'Dissertation Services - Editing', '48 hours', 0, 0, 0),
(180, 'Dissertation Services - Editing', '24 hours', 0, 0, 0),
(181, 'Dissertation Services - Editing', '12 hours', 0, 0, 0),
(182, 'Dissertation Services - Editing', '6 hours', 0, 0, 0),
(183, 'Dissertation Services - Editing', '3 hours', 0, 0, 0),
(184, 'Dissertation Services - Proofreading', '10 days', 0, 0, 0),
(185, 'Dissertation Services - Proofreading', '7 days', 0, 0, 0),
(186, 'Dissertation Services - Proofreading', '4 days', 0, 0, 0),
(187, 'Dissertation Services - Proofreading', '3 days', 0, 0, 0),
(188, 'Dissertation Services - Proofreading', '48 hours', 0, 0, 0),
(189, 'Dissertation Services - Proofreading', '24 hours', 0, 0, 0),
(190, 'Dissertation Services - Proofreading', '12 hours', 0, 0, 0),
(191, 'Dissertation Services - Proofreading', '6 hours', 0, 0, 0),
(192, 'Dissertation Services - Proofreading', '3 hours', 0, 0, 0),
(193, 'Formating', '10 days', 0, 0, 0),
(194, 'Formating', '7 days', 0, 0, 0),
(195, 'Formating', '4 days', 0, 0, 0),
(196, 'Formating', '3 days', 0, 0, 0),
(197, 'Formating', '48 hours', 0, 0, 0),
(198, 'Formating', '24 hours', 0, 0, 0),
(199, 'Formating', '12 hours', 0, 0, 0),
(200, 'Formating', '6 hours', 0, 0, 0),
(201, 'Formating', '3 hours', 0, 0, 0),
(202, 'Admission Services - Admission Essay', '10 days', 0, 0, 0),
(203, 'Admission Services - Admission Essay', '7 days', 0, 0, 0),
(204, 'Admission Services - Admission Essay', '4 days', 0, 0, 0),
(205, 'Admission Services - Admission Essay', '3 days', 0, 0, 0),
(206, 'Admission Services - Admission Essay', '48 hours', 0, 0, 0),
(207, 'Admission Services - Admission Essay', '24 hours', 0, 0, 0),
(208, 'Admission Services - Admission Essay', '12 hours', 0, 0, 0),
(209, 'Admission Services - Admission Essay', '6 hours', 0, 0, 0),
(210, 'Admission Services - Scholarship Essay', '10 days', 0, 0, 0),
(211, 'Admission Services - Scholarship Essay', '7 days', 0, 0, 0),
(212, 'Admission Services - Scholarship Essay', '4 days', 0, 0, 0),
(213, 'Admission Services - Scholarship Essay', '3 days', 0, 0, 0),
(214, 'Admission Services - Scholarship Essay', '48 hours', 0, 0, 0),
(215, 'Admission Services - Scholarship Essay', '24 hours', 0, 0, 0),
(216, 'Admission Services - Scholarship Essay', '12 hours', 0, 0, 0),
(217, 'Admission Services - Scholarship Essay', '6 hours', 0, 0, 0),
(218, 'Admission Services - Prsonal Statement', '10 days', 0, 0, 0),
(219, 'Admission Services - Prsonal Statement', '7 days', 0, 0, 0),
(220, 'Admission Services - Prsonal Statement', '4 days', 0, 0, 0),
(221, 'Admission Services - Prsonal Statement', '3 days', 0, 0, 0),
(222, 'Admission Services - Prsonal Statement', '48 hours', 0, 0, 0),
(223, 'Admission Services - Prsonal Statement', '24 hours', 0, 0, 0),
(224, 'Admission Services - Prsonal Statement', '12 hours', 0, 0, 0),
(225, 'Admission Services - Prsonal Statement', '6 hours', 0, 0, 0),
(226, 'Admission Services - Editing', '10 days', 0, 0, 0),
(227, 'Admission Services - Editing', '7 days', 0, 0, 0),
(228, 'Admission Services - Editing', '4 days', 0, 0, 0),
(229, 'Admission Services - Editing', '3 days', 0, 0, 0),
(230, 'Admission Services - Editing', '48 hours', 0, 0, 0),
(231, 'Admission Services - Editing', '24 hours', 0, 0, 0),
(232, 'Admission Services - Editing', '12 hours', 0, 0, 0),
(233, 'Admission Services - Editing', '6 hours', 0, 0, 0),
(234, 'Admission Services - Editing', '3 hours', 0, 0, 0),
(235, 'Editing', '10 days', 0, 0, 0),
(236, 'Editing', '7 days', 0, 0, 0),
(237, 'Editing', '5 days', 0, 0, 0),
(238, 'Editing', '4 days', 0, 0, 0),
(239, 'Editing', '3 days', 0, 0, 0),
(240, 'Editing', '48 hours', 0, 0, 0),
(241, 'Editing', '24 hours', 0, 0, 0),
(242, 'Editing', '12 hours', 0, 0, 0),
(243, 'Editing', '6 hours', 0, 0, 0),
(244, 'Editing', '3 hours', 0, 0, 0),
(245, 'Proofreading', '10 days', 0, 0, 0),
(246, 'Proofreading', '7 days', 0, 0, 0),
(247, 'Proofreading', '4 days', 0, 0, 0),
(248, 'Proofreading', '3 days', 0, 0, 0),
(249, 'Proofreading', '48 hours', 0, 0, 0),
(250, 'Proofreading', '24 hours', 0, 0, 0),
(251, 'Proofreading', '12 hours', 0, 0, 0),
(252, 'Proofreading', '6 hours', 0, 0, 0),
(253, 'Proofreading', '3 hours', 0, 0, 0),
(254, 'Case Study', '10 days', 0, 0, 0),
(255, 'Case Study', '7 days', 0, 0, 0),
(256, 'Case Study', '4 days', 0, 0, 0),
(257, 'Case Study', '3 days', 0, 0, 0),
(258, 'Case Study', '48 hours', 0, 0, 0),
(259, 'Case Study', '24 hours', 0, 0, 0),
(260, 'Case Study', '12 hours', 0, 0, 0),
(261, 'Case Study', '6 hours', 0, 0, 0),
(262, 'Case Study', '3 hours', 0, 0, 0),
(263, 'Lab Report', '10 days', 0, 0, 0),
(264, 'Lab Report', '7 days', 0, 0, 0),
(265, 'Lab Report', '4 days', 0, 0, 0),
(266, 'Lab Report', '3 days', 0, 0, 0),
(267, 'Lab Report', '48 hours', 0, 0, 0),
(268, 'Lab Report', '24 hours', 0, 0, 0),
(269, 'Lab Report', '12 hours', 0, 0, 0),
(270, 'Lab Report', '6 hours', 0, 0, 0),
(271, 'Speech/Presentation', '10 days', 0, 0, 0),
(272, 'Speech/Presentation', '7 days', 0, 0, 0),
(273, 'Speech/Presentation', '5 days', 0, 0, 0),
(274, 'Speech/Presentation', '4 days', 0, 0, 0),
(275, 'Speech/Presentation', '3 days', 0, 0, 0),
(276, 'Speech/Presentation', '48 hours', 0, 0, 0),
(277, 'Speech/Presentation', '24 hours', 0, 0, 0),
(278, 'Speech/Presentation', '12 hours', 0, 0, 0),
(279, 'Speech/Presentation', '6 hours', 0, 0, 0),
(280, 'Speech/Presentation', '3 hours', 0, 0, 0),
(281, 'Math/Physics/Economics/Statistics Problems', '10 days', 0, 0, 0),
(282, 'Math/Physics/Economics/Statistics Problems', '7 days', 0, 0, 0),
(283, 'Math/Physics/Economics/Statistics Problems', '4 days', 0, 0, 0),
(284, 'Math/Physics/Economics/Statistics Problems', '3 days', 0, 0, 0),
(285, 'Math/Physics/Economics/Statistics Problems', '48 hours', 0, 0, 0),
(286, 'Math/Physics/Economics/Statistics Problems', '24 hours', 0, 0, 0),
(287, 'Math/Physics/Economics/Statistics Problems', '12 hours', 0, 0, 0),
(288, 'Math/Physics/Economics/Statistics Problems', '6 hours', 0, 0, 0),
(289, 'Math/Physics/Economics/Statistics Problems', '3 hours', 0, 0, 0),
(290, 'Article', '10 days', 0, 0, 0),
(291, 'Article', '7 days', 0, 0, 0),
(292, 'Article', '5 days', 0, 0, 0),
(293, 'Article', '4 days', 0, 0, 0),
(294, 'Article', '3 days', 0, 0, 0),
(295, 'Article', '48 hours', 0, 0, 0),
(296, 'Article', '24 hours', 0, 0, 0),
(297, 'Article', '12 hours', 0, 0, 0),
(298, 'Article', '6 hours', 0, 0, 0),
(299, 'Article', '3 hours', 0, 0, 0),
(300, 'Article Critique', '10 days', 0, 0, 0),
(301, 'Article Critique', '7 days', 0, 0, 0),
(302, 'Article Critique', '5 days', 0, 0, 0),
(303, 'Article Critique', '4 days', 0, 0, 0),
(304, 'Article Critique', '3 days', 0, 0, 0),
(305, 'Article Critique', '48 hours', 0, 0, 0),
(306, 'Article Critique', '24 hours', 0, 0, 0),
(307, 'Article Critique', '12 hours', 0, 0, 0),
(308, 'Article Critique', '6 hours', 0, 0, 0),
(309, 'Article Critique', '3 hours', 0, 0, 0),
(310, 'Annotated Bibliography', '10 days', 0, 0, 0),
(311, 'Annotated Bibliography', '7 days', 0, 0, 0),
(312, 'Annotated Bibliography', '4 days', 0, 0, 0),
(313, 'Annotated Bibliography', '3 days', 0, 0, 0),
(314, 'Annotated Bibliography', '48 hours', 0, 0, 0),
(315, 'Annotated Bibliography', '24 hours', 0, 0, 0),
(316, 'Annotated Bibliography', '12 hours', 0, 0, 0),
(317, 'Annotated Bibliography', '6 hours', 0, 0, 0),
(318, 'Reaction Paper', '10 days', 0, 0, 0),
(319, 'Reaction Paper', '7 days', 0, 0, 0),
(320, 'Reaction Paper', '5 days', 0, 0, 0),
(321, 'Reaction Paper', '4 days', 0, 0, 0),
(322, 'Reaction Paper', '3 days', 0, 0, 0),
(323, 'Reaction Paper', '48 hours', 0, 0, 0),
(324, 'Reaction Paper', '24 hours', 0, 0, 0),
(325, 'Reaction Paper', '12 hours', 0, 0, 0),
(326, 'Reaction Paper', '6 hours', 0, 0, 0),
(327, 'Reaction Paper', '3 hours', 0, 0, 0),
(328, 'Multiple Choice Questions (Non-time-framed)', '10 days', 0, 0, 0),
(329, 'Multiple Choice Questions (Non-time-framed)', '7 days', 0, 0, 0),
(330, 'Multiple Choice Questions (Non-time-framed)', '4 days', 0, 0, 0),
(331, 'Multiple Choice Questions (Non-time-framed)', '3 days', 0, 0, 0),
(332, 'Multiple Choice Questions (Non-time-framed)', '48 hours', 0, 0, 0),
(333, 'Multiple Choice Questions (Non-time-framed)', '24 hours', 0, 0, 0),
(334, 'Multiple Choice Questions (Non-time-framed)', '12 hours', 0, 0, 0),
(335, 'Multiple Choice Questions (Non-time-framed)', '6 hours', 0, 0, 0),
(336, 'Multiple Choice Questions (Non-time-framed)', '3 hours', 0, 0, 0),
(337, 'Multiple Choice Questions (Time-framed)', '10 days', 0, 0, 0),
(338, 'Multiple Choice Questions (Time-framed)', '7 days', 0, 0, 0),
(339, 'Multiple Choice Questions (Time-framed)', '4 days', 0, 0, 0),
(340, 'Multiple Choice Questions (Time-framed)', '3 days', 0, 0, 0),
(341, 'Multiple Choice Questions (Time-framed)', '48 hours', 0, 0, 0),
(342, 'Multiple Choice Questions (Time-framed)', '24 hours', 0, 0, 0),
(343, 'Multiple Choice Questions (Time-framed)', '12 hours', 0, 0, 0),
(344, 'Multiple Choice Questions (Time-framed)', '6 hours', 0, 0, 0),
(345, 'Multiple Choice Questions (Time-framed)', '3 hours', 0, 0, 0),
(346, 'Statistics Project', '10 days', 0, 0, 0),
(347, 'Statistics Project', '7 days', 0, 0, 0),
(348, 'Statistics Project', '4 days', 0, 0, 0),
(349, 'Statistics Project', '3 days', 0, 0, 0),
(350, 'Statistics Project', '48 hours', 0, 0, 0),
(351, 'Statistics Project', '24 hours', 0, 0, 0),
(352, 'Statistics Project', '12 hours', 0, 0, 0),
(353, 'Statistics Project', '6 hours', 0, 0, 0),
(354, 'PowerPoint Presentation', '10 days', 0, 0, 0),
(355, 'PowerPoint Presentation', '7 days', 0, 0, 0),
(356, 'PowerPoint Presentation', '5 days', 0, 0, 0),
(357, 'PowerPoint Presentation', '3 days', 0, 0, 0),
(358, 'PowerPoint Presentation', '2 days', 0, 0, 0),
(359, 'PowerPoint Presentation', '24 hours', 0, 0, 0),
(360, 'PowerPoint Presentation', '12 hours', 0, 0, 0),
(361, 'PowerPoint Presentation', '6 hours', 0, 0, 0),
(362, 'Programming', '20 days', 0, 0, 0),
(363, 'Programming', '10 days', 0, 0, 0),
(364, 'Programming', '7 days', 0, 0, 0),
(365, 'Programming', '5 days', 0, 0, 0),
(366, 'Programming', '4 days', 0, 0, 0),
(367, 'Programming', '3 days', 0, 0, 0),
(368, 'Programming', '48 hours', 0, 0, 0),
(369, 'Mind/Concept mapping', '10 days', 0, 0, 0),
(370, 'Mind/Concept mapping', '7 days', 0, 0, 0),
(371, 'Mind/Concept mapping', '5 days', 0, 0, 0),
(372, 'Mind/Concept mapping', '3 days', 0, 0, 0),
(373, 'Mind/Concept mapping', '48 hours', 0, 0, 0),
(374, 'Mind/Concept mapping', '24 hours', 0, 0, 0),
(375, 'Mind/Concept mapping', '12 hours', 0, 0, 0),
(376, 'Multimedia Project', '10 days', 0, 0, 0),
(377, 'Multimedia Project', '7 days', 0, 0, 0),
(378, 'Multimedia Project', '4 days', 0, 0, 0),
(379, 'Multimedia Project', '3 days', 0, 0, 0),
(380, 'Multimedia Project', '48 hours', 0, 0, 0),
(381, 'Multimedia Project', '24 hours', 0, 0, 0),
(382, 'Multimedia Project', '12 hours', 0, 0, 0),
(383, 'Online assignment', '10 days', 0, 0, 0),
(384, 'Online assignment', '7 days', 0, 0, 0),
(385, 'Online assignment', '5 days', 0, 0, 0),
(386, 'Online assignment', '4 days', 0, 0, 0),
(387, 'Online assignment', '3 days', 0, 0, 0),
(388, 'Online assignment', '48 hours', 0, 0, 0),
(389, 'Online assignment', '24 hours', 0, 0, 0),
(390, 'Simulation report', '10 days', 0, 0, 0),
(391, 'Simulation report', '7 days', 0, 0, 0),
(392, 'Simulation report', '4 days', 0, 0, 0),
(393, 'Simulation report', '3 days', 0, 0, 0),
(394, 'Simulation report', '48 hours', 0, 0, 0),
(395, 'Simulation report', '24 hours', 0, 0, 0),
(396, 'Simulation report', '12 hours', 0, 0, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `sample_essay`
--

INSERT INTO `sample_essay` (`id`, `topic`, `type_document`, `urgency`, `level`, `number_of_pages`, `subject_area`, `academic_level`, `style`, `no_sources`, `pdf_file`, `status`, `update_date`) VALUES
(12, 'asd', 'Custom Essay', '2 months', 'Standard Quality', '1', 'Design Analysis', 'Undergraduate', 'APA', '1', 'layout_header.jpg', NULL, '2013-07-23 14:30:52'),
(13, 'sadasd', 'Custom Essay', '10 days', 'Premium Quality', '1', 'Company Analysis', 'High School', 'APA', '1', 'popup_1.png', NULL, '2013-07-31 23:11:08');

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
