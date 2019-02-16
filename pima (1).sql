-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 16, 2019 at 04:24 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pima`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `name_in_full` varchar(255) NOT NULL,
  `nic_no` varchar(255) NOT NULL,
  `passport_no` varchar(255) NOT NULL,
  `mobile_1` varchar(255) NOT NULL,
  `mobile_2` varchar(255) NOT NULL,
  `personal_email` varchar(255) NOT NULL,
  `official_email` varchar(255) NOT NULL,
  `residence_address_1` varchar(255) NOT NULL,
  `residence_address_2` varchar(255) NOT NULL,
  `residence_city` varchar(255) NOT NULL,
  `resicence_district` varchar(255) NOT NULL,
  `residence_phone_no` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `official_address_1` varchar(255) NOT NULL,
  `official_address_2` varchar(255) NOT NULL,
  `official_city` varchar(255) NOT NULL,
  `official_district` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `enrolement_year_pim` varchar(255) NOT NULL,
  `completion_year_pim` varchar(255) NOT NULL,
  `year_of_graduation` varchar(255) NOT NULL,
  `pim_student_no` varchar(255) NOT NULL,
  `speciality` varchar(255) NOT NULL,
  `experienced_industries` varchar(255) NOT NULL,
  `member_image` text NOT NULL,
  `payment_image` text NOT NULL,
  `flag` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `title`, `first_name`, `surname`, `name_in_full`, `nic_no`, `passport_no`, `mobile_1`, `mobile_2`, `personal_email`, `official_email`, `residence_address_1`, `residence_address_2`, `residence_city`, `resicence_district`, `residence_phone_no`, `designation`, `official_address_1`, `official_address_2`, `official_city`, `official_district`, `country`, `enrolement_year_pim`, `completion_year_pim`, `year_of_graduation`, `pim_student_no`, `speciality`, `experienced_industries`, `member_image`, `payment_image`, `flag`) VALUES
(1, 'Mr', 'Kasun', 'Dissanayake', 'Kasun Dissanayake', '941440754V', '941440754V', '0757721908', '0757721908', 'kasunprageethdissanayake@gmail.com', 'kasunprageethdissanayake@gmail.com', '166/A,Patalirukkarama rd,Pinwala,Panadura', '', 'Panadura', 'Kalutara', 'Student', 'Student', '166/A,Patalirukkarama rd,Pinwala,Panadura', '', 'Kilinochchi', 'Colombo', 'Matale', '2019-02-21', '2019-02-12', '2019-02-13', '44', 'it', 'banking', 'x.jpg', 'y.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `contact_number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `img_url` varchar(50) NOT NULL,
  `flag` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `contact_number`, `email`, `type`, `img_url`, `flag`) VALUES
(1, 'Kasun', 'Dissanayake', '0723344556', 'kasun@gmail.com', 'Admin', 'image_jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(5) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `username`, `password`, `type`) VALUES
(1, 1, 'admin', '12345', 'Admin');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
