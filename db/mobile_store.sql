-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 18, 2015 at 05:01 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mobile_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE IF NOT EXISTS `admin_user` (
  `uid` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--


-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `mname` varchar(30) NOT NULL,
  `qty` int(2) NOT NULL,
  `sid` varchar(40) NOT NULL,
  `sno` int(3) NOT NULL AUTO_INCREMENT,
  `uid` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=135 ;

--
-- Dumping data for table `cart`
--


-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `ccode` int(3) NOT NULL AUTO_INCREMENT,
  `scode` int(3) NOT NULL,
  `cityname` varchar(100) NOT NULL,
  PRIMARY KEY (`ccode`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`ccode`, `scode`, `cityname`) VALUES
(1, 125, 'Jaipur'),
(2, 131, 'Kolkata'),
(3, 122, 'Bhubaneshwar'),
(4, 121, 'Kohima'),
(5, 120, 'Imphal'),
(6, 131, 'Durgapur'),
(7, 103, 'Dispur'),
(8, 103, 'Guwahati'),
(9, 126, 'Gangtok'),
(10, 127, 'Chennai'),
(11, 104, 'Patna'),
(12, 130, 'Lucknow'),
(13, 123, 'Pondicherry'),
(14, 124, 'Amritsar'),
(15, 128, 'Agartala'),
(16, 129, 'Dehradun'),
(17, 112, 'Ranchi'),
(18, 101, 'Hyderabad'),
(19, 105, 'Raipur'),
(20, 106, 'New Delhi'),
(21, 107, 'Panaji'),
(22, 108, 'Ahmedabad'),
(23, 109, 'Chandigarh'),
(24, 110, 'Shimla'),
(25, 111, 'Jammu'),
(26, 113, 'Bengaluru'),
(27, 114, 'Thrivandram'),
(28, 116, 'Bhopal'),
(29, 117, 'Mumbai'),
(30, 119, 'Shilong');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `com_id` varchar(20) NOT NULL,
  `com_name` varchar(20) NOT NULL,
  PRIMARY KEY (`com_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`com_id`, `com_name`) VALUES
('105', 'Motorola'),
('104', 'Blackberry'),
('103', 'Sony Ericsson'),
('102', 'Samsung'),
('101', 'Nokia'),
('106', 'LG'),
('107', 'Apple'),
('108', 'Spice'),
('109', 'Micromax');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE IF NOT EXISTS `model` (
  `model_name` varchar(150) NOT NULL,
  `com_id` int(4) NOT NULL,
  PRIMARY KEY (`model_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`model_name`, `com_id`) VALUES
('C2-02', 101),
('603', 101),
('E6 00', 101),
('500', 101),
('X1 01', 101),
('C6', 101),
('C5-05', 101),
('X6', 101),
('lumia 800', 101),
('E7', 101),
('Galaxy Note', 102),
('Champ Deluxe', 102),
('B7722', 102),
('Galaxy Ace plus', 102),
('Galaxy Ace', 102),
('Chat 527', 102),
('S3850 Corby II', 102),
('Corby TXT', 102),
('Omnia W', 102),
('Galaxy Y Duos', 102),
('MICR-256', 109);

-- --------------------------------------------------------

--
-- Table structure for table `model_images`
--

CREATE TABLE IF NOT EXISTS `model_images` (
  `model_id` varchar(30) NOT NULL,
  `img_name` varchar(50) NOT NULL,
  PRIMARY KEY (`model_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model_images`
--

INSERT INTO `model_images` (`model_id`, `img_name`) VALUES
('X1 01', 'X1_01.jpg'),
('C2-02', 'C2_02.jpg'),
('603', '603.jpg'),
('E6 00', 'E6_00.jpg'),
('500', '500.jpg'),
('C6', 'C6.jpg'),
('C5-05', 'C5_05.jpg'),
('X6', 'X6.jpg'),
('lumia 800', 'lumia_800.jpg'),
('E7', 'E7.jpg'),
('Galaxy Ace plus', 'galaxy_ace_plus.jpg'),
('B7722', 'B7722.jpg'),
('Galaxy Note', 'galaxy_note.jpg'),
('Champ Deluxe', 'champ.jpg'),
('Galaxy Ace', 'ace.jpg'),
('Chat 527', 'chat_527.jpg'),
('S3850 Corby II', 'S3850_corby.jpg'),
('Corby TXT', 'corby_txt.jpg'),
('Omnia W', 'omnia_w.jpg'),
('Galaxy Y Duos', 'galaxy_y.jpg'),
('MICR-256', 'MICR_256.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `register_user`
--

CREATE TABLE IF NOT EXISTS `register_user` (
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `addr` varchar(50) DEFAULT NULL,
  `country` varchar(10) NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(10) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `tel_no` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gen` varchar(8) NOT NULL,
  `email` varchar(30) NOT NULL,
  `occupation` varchar(30) DEFAULT NULL,
  `area` varchar(30) DEFAULT NULL,
  `pin` varchar(8) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_user`
--


-- --------------------------------------------------------

--
-- Table structure for table `specifications`
--

CREATE TABLE IF NOT EXISTS `specifications` (
  `com_name` varchar(20) NOT NULL,
  `model_id` varchar(50) NOT NULL,
  `memory_slot` varchar(5) NOT NULL,
  `inbuild_memory` varchar(20) NOT NULL,
  `external_memory` varchar(20) NOT NULL,
  `camera` varchar(20) NOT NULL,
  `keypad` varchar(50) NOT NULL,
  `music_player` varchar(20) NOT NULL,
  `ringtone` varchar(20) NOT NULL,
  `vedio_capture` varchar(10) NOT NULL,
  `vedio_player` varchar(80) NOT NULL,
  `g3` varchar(5) NOT NULL,
  `bluetooth` varchar(5) NOT NULL,
  `wifi` varchar(5) NOT NULL,
  `radio` varchar(5) NOT NULL,
  `gprs` varchar(5) NOT NULL,
  `speaker` varchar(5) NOT NULL,
  `usb` varchar(5) NOT NULL,
  `mms` varchar(5) NOT NULL,
  `sms` varchar(5) NOT NULL,
  `email` varchar(5) NOT NULL,
  `network` varchar(20) NOT NULL,
  `battery` varchar(10) NOT NULL,
  `web_browser` varchar(20) NOT NULL,
  `games` varchar(20) NOT NULL,
  `dimension` varchar(10) NOT NULL,
  `display_size` varchar(10) NOT NULL,
  `display_colour` varchar(30) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `headphone` varchar(5) NOT NULL,
  `warranty` varchar(10) NOT NULL,
  `price` varchar(10) NOT NULL,
  `touch_screen` varchar(5) NOT NULL,
  `discount` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specifications`
--

INSERT INTO `specifications` (`com_name`, `model_id`, `memory_slot`, `inbuild_memory`, `external_memory`, `camera`, `keypad`, `music_player`, `ringtone`, `vedio_capture`, `vedio_player`, `g3`, `bluetooth`, `wifi`, `radio`, `gprs`, `speaker`, `usb`, `mms`, `sms`, `email`, `network`, `battery`, `web_browser`, `games`, `dimension`, `display_size`, `display_colour`, `weight`, `headphone`, `warranty`, `price`, `touch_screen`, `discount`) VALUES
('101', 'X1 01', 'yes', '200', '10', 'No', 'Normal', 'yes', 'no', 'no', ' | Quick_Time', 'no', 'no', 'no', ' | Qu', 'no', 'yes', 'no', 'no', 'yes', 'no', '2G,GSM', 'A-1000001', '', 'yes', '112.2 x 47', '99.2 x 38', '16 bit', '91.1g', 'yes', '12', '1825', 'no', '20.00'),
('101', 'C2-02', 'yes', '500', '10', '2MP', 'no', 'yes', 'yes', 'yes', ' | Real Player | Qui', 'no', 'yes', 'no', ' | Re', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '2G,GSM', 'A-1000002', '  Opera  Safari', 'yes', '103 x 51.4', '100 x 52', '16 bit true color', '115g', 'yes', '12', '4769', 'yes', '15.00'),
('101', '603', 'yes', '500', '2', '5MP', 'no', 'yes', 'yes', 'yes', ' | Real Player | Qui', 'yes', 'yes', 'yes', ' | Re', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '2G,GSM', 'A-1000003', '  Opera  Safari', 'yes', '113.5 x 57', '111 x 55', '32 bit', '109.6g', 'yes', '18', '15719', 'yes', '15.00'),
('101', 'E6 00', 'yes', '1024', '10', '8MP', 'Querty pad', 'yes', 'yes', 'yes', ' | Real Player | Qui', 'yes', 'yes', 'yes', ' | Re', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '2G,GSM', 'A-1000004', '  Opera  Safari', 'yes', '115.5 x 59', '113 x 57', '16 bit', '133g', 'yes', '24', '19019', 'yes', '10.00'),
('101', '500', 'yes', '500', '2', '5MP', 'no', 'yes', 'yes', 'yes', ' | Real Player | Qui', 'yes', 'yes', 'yes', ' | Re', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '2G,GSM', 'A-1000005', '  Internet Explorer ', 'yes', '111.3 x 53', '110 x 51', '256', '93g', 'yes', '18', '10999', 'yes', '16.00'),
('101', 'C6', 'yes', '1024', '1', '5MP', 'Querty pad', 'yes', 'yes', 'yes', ' | Real Player | Med', 'yes', 'yes', 'yes', ' | Re', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '2G,GSM', 'A-1000006', '  Opera  Safari', 'yes', '113 x 53 x', '111 x 50', '256', '150g', 'yes', '18', '14999', 'yes', '12.00'),
('101', 'C5-05', 'yes', '200', '1', '2MP', 'no', 'yes', 'yes', 'yes', ' | Real Player | Qui', 'no', 'yes', 'no', ' | Re', 'no', 'yes', 'yes', 'yes', 'yes', 'yes', '2G,GSM', 'A-1000007', '', 'yes', '105.8 x 51', '103 x 49', '32 bit', '93g', 'yes', '18', '6899', 'yes', '0.00'),
('101', 'X6', 'yes', '500', '2', '5MP', 'no', 'yes', 'yes', 'yes', ' | Real Player | Qui', 'yes', 'yes', 'yes', ' | Re', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '2G,GSM', 'A-1000008', '  Opera  Safari', 'yes', '111 x 51 x', '99 x 49', '32 bit', '122g', 'yes', '24', '18059', 'yes', '0.00'),
('101', 'lumia 800', 'yes', '500', '10', '8MP', 'no', 'yes', 'yes', 'yes', ' | Quick_Time | Medi', 'yes', 'yes', 'yes', ' | Qu', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '2G,GSM', 'A-1000009', '  Internet Explorer ', 'yes', '116.5 x 61', '114 x 60', '32 bit', '142g', 'yes', '24', '31699', 'yes', '0.00'),
('101', 'E7', 'yes', '500', '5', '8MP', 'Querty pad', 'yes', 'yes', 'yes', ' | Real Player | Qui', 'yes', 'yes', 'yes', ' | Re', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '2G,GSM', 'A-1000010', '  Opera  Safari', 'yes', '123.7 x 62', '122 x 61', '16 bit true color', '176g', 'yes', '24', '20199', 'yes', '0.00'),
('102', 'Galaxy Ace plus', 'yes', '500', '10', '5MP', 'No', 'yes', 'yes', 'yes', ' | Real Player | Qui', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '2G,GSM', 'B-142363', '  Internet Explorer ', 'yes', '114.5 x 62', '113 x 61', '16 bit true color', '115g', 'yes', '18', '18150', 'yes', '0.00'),
('102', 'B7722', 'yes', '500', '10', '6MP', 'No', 'yes', 'yes', 'yes', ' | Real Player | Qui', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '2G,GSM', 'B-142366', '  Opera  Safari', 'yes', '113.5 x 55', '111 x 54', '16 bit true color', '112g', 'yes', '18', '10990', 'yes', '0.00'),
('102', 'Galaxy Note', 'yes', '500', '10', '8MP', 'No', 'yes', 'yes', 'yes', ' | Real Player | Qui', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '2G,GSM,4G', 'B-142365', '  Internet Explorer ', 'yes', '146.9 x 83', '145 x 81', '256', '178g', 'yes', '18', '34990', 'yes', '0.00'),
('102', 'Champ Deluxe', 'yes', '200', '5', '5MP', 'No', 'yes', 'yes', 'yes', ' | Real Player | Qui', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '2G,GSM,CDMA', 'B-142364', '  Opera', 'yes', '103 x 51.4', '100 x 52', '16 bit true color', '95g', 'yes', '12', '4550', 'yes', '0.00'),
('102', 'Galaxy Ace', 'yes', '100', '5', '6MP', 'No', 'yes', 'yes', 'yes', ' | Real Player | Qui', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '2G,GSM', 'B-142367', '  Internet Explorer ', 'yes', '112.4 x 59', '111 x 58', '256', '113g', 'yes', '18', '152990', 'yes', '0.00'),
('102', 'Chat 527', 'yes', '500', '5', '4MP', 'Querty pad', 'yes', 'yes', 'yes', ' | Quick_Time | Medi', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '2G,GSM', 'B-142360', '  Opera  Safari', 'yes', '103 x 55 x', '101 x 53', '16 bit true color', '96g', 'yes', '18', '5990', 'no', '0.00'),
('102', 'S3850 Corby II', 'yes', '500', '5', '3MP', 'No', 'yes', 'yes', 'yes', ' | Quick_Time', 'no', 'yes', 'no', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '2G,GSM', 'B-142369', '  Opera', 'yes', '109.9 x 60', '108 x 59', '16 bit true color', '102g', 'yes', '12', '6150', 'yes', '0.00'),
('102', 'Corby TXT', 'yes', '500', '5', '2MP', 'Querty pad', 'yes', 'yes', 'yes', ' | Quick_Time', 'no', 'yes', 'no', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '2G,GSM', 'B-142349', '  Opera', 'yes', '109.9 x 60', '108 x 59', '256', '94g', 'yes', '12', '4550', 'no', '0.00'),
('102', 'Omnia W', 'yes', '500', '5', '5MP', 'No', 'yes', 'yes', 'yes', ' | Quick_Time | Medi', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '2G,GSM', 'B-142350', '  Opera  Safari', 'yes', '115.6 x 58', '114 x 57', '16 bit true color', '115.3g', 'yes', '18', '20900', 'yes', '0.00'),
('102', 'Galaxy Y Duos', 'yes', '500', '10', '3.15MP', 'Querty pad', 'yes', 'yes', 'yes', ' | Quick_Time | Medi', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '2G,GSM', 'B-142355', '  Opera  Safari', 'yes', '109.8 x 60', '108 x 59', '256', '109g', 'yes', '18', '10498', 'no', '0.00'),
('109', 'MICR-256', 'yes', '10', '10', 'Yes', 'yes', 'yes', 'yes', 'yes', ' | Real Player | Quick_Time | Media_Player', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', '', '', '  Opera', 'yes', '25x25', '5x5', '32 bit', '25 gm', 'yes', '24', '25000', 'yes', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `scode` int(3) NOT NULL AUTO_INCREMENT,
  `sname` varchar(120) NOT NULL,
  PRIMARY KEY (`scode`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=132 ;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`scode`, `sname`) VALUES
(101, 'Andhra Pradesh'),
(102, 'Arunachal Pradesh'),
(103, 'Assam'),
(104, 'Bihar'),
(105, 'Chattisgarh'),
(106, 'Delhi'),
(107, 'Goa'),
(108, 'Gujarat'),
(109, 'Haryana'),
(110, 'Himachal Pradesh'),
(111, 'Jammu and Kashmir'),
(112, 'Jharkhand'),
(113, 'Karnataka'),
(114, 'Kerela'),
(115, 'Lakshadweep'),
(116, 'Madhya Pradesh'),
(117, 'Maharashtra'),
(118, 'Manipur'),
(119, 'Meghalaya'),
(120, 'Mizoram'),
(121, 'Nagaland'),
(122, 'Orissa'),
(123, 'Pondicherry'),
(124, 'Punjab'),
(125, 'Rajasthan'),
(126, 'Sikkim'),
(127, 'Tamil Nadu'),
(128, 'Tripura'),
(129, 'Uttaranchal'),
(130, 'Uttar Pradesh'),
(131, 'West Bengal');
