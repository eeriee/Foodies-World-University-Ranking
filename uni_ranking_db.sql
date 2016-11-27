-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 27, 2016 at 09:02 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uni_ranking_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `area_state`
--

CREATE TABLE `area_state` (
  `COL 1` varchar(5) DEFAULT NULL,
  `COL 2` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `area_state`
--

INSERT INTO `area_state` (`COL 1`, `COL 2`) VALUES
('EDH', 'Edinburgh'),
('FIF', 'Edinburgh'),
('BW', 'Karlsruhe'),
('QC', 'Montreal'),
('ON', 'Waterloo'),
('PA', 'Pittsburgh'),
('NC', 'Charlotte'),
('SC', 'Charlotte'),
('IL', 'Urbana-Champaign'),
('AZ', 'Phoenix'),
('NV', 'Las Vegas'),
('WI', 'Madison');

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `business_id` int(11) NOT NULL,
  `business_name` varchar(150) NOT NULL,
  `full_address` varchar(500) NOT NULL,
  `city` varchar(50) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `avg_star` float NOT NULL,
  `review_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `star` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uni`
--

CREATE TABLE `uni` (
  `uni_id` int(11) NOT NULL,
  `area` varchar(50) NOT NULL,
  `university` varchar(150) NOT NULL,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uni`
--

INSERT INTO `uni` (`uni_id`, `area`, `university`, `longitude`, `latitude`) VALUES
(1, 'Edinburgh', 'University of Edinburgh', 55.9492, -3.18871),
(2, 'Edinburgh', 'Heriot-Watt University', 55.916, -3.32141),
(3, 'Edinburgh', 'Edinburgh Napier University', 55.9187, -3.23983),
(4, 'Edinburgh', 'Edinburgh College', 55.9439, -3.09852),
(5, 'Edinburgh', 'Leith School of Art', 55.9763, -3.17979),
(6, 'Edinburgh', 'Edinburgh Theological Seminary', 55.95, -3.19428),
(7, 'Montreal', 'University of Montreal', 45.5056, -73.6137),
(8, 'Montreal', 'Université du Québec à Montréal', 45.5126, -73.5607),
(9, 'Montreal', 'Concordia University - Loyola Campus', 45.458, -73.6403),
(10, 'Montreal', 'McGill University', 45.505, -73.5762),
(11, 'Montreal', 'HEC Montréal', 45.5033, -73.6203),
(12, 'Montreal', 'École Polytechnique de Montréal', 45.5044, -73.6125),
(13, 'Montreal', 'Cégep du Vieux Montréal', 45.5146, -73.5656),
(14, 'Montreal', 'Vanier College', 45.5152, -73.675),
(15, 'Montreal', 'LaSalle College', 45.4915, -73.581),
(16, 'Montreal', 'Collège Ahuntsic', 45.5521, -73.6414),
(17, 'Pittsburgh', 'University of Pittsburgh', 40.4462, -79.9608),
(18, 'Pittsburgh', 'Carnegie Mellon University', 40.4435, -79.9437),
(19, 'Pittsburgh', 'Duquesne University', 40.437, -79.9902),
(20, 'Pittsburgh', 'Point Park University', 40.4385, -80.0013),
(21, 'Pittsburgh', 'Chatham University', 40.4513, -79.9255),
(22, 'Pittsburgh', 'Carlow University', 40.439, -79.9631),
(23, 'Pittsburgh', 'La Roche College', 40.5703, -80.0136),
(24, 'Pittsburgh', 'The Art Institute of Pittsburgh', 40.4373, -79.9996),
(25, 'Pittsburgh', 'Joseph M. Katz Graduate School of Business', 40.4408, -79.9533),
(26, 'Karlsruhe', 'Karlsruhe Institute of Technology', 49.0117, 8.43038),
(27, 'Karlsruhe', 'Hochschule Karlsruhe – Technik und Wirtschaft', 49.0159, 8.38962),
(28, 'Karlsruhe', 'Pädagogische Hochschule Karlsruhe', 49.0133, 8.39438),
(29, 'Karlsruhe', 'Hochschule für Musik Karlsruhe', 49.0046, 8.42767),
(30, 'Karlsruhe', 'Karlsruhe University of Arts and Design', 49.0018, 8.38565),
(31, 'Karlsruhe', 'Academy of Fine Arts, Karlsruhe', 49.013, 8.3885),
(32, 'Karlsruhe', 'Karlshochschule International University', 49.0067, 8.3956),
(33, 'Waterloo', 'University of Waterloo', 43.4725, -80.5449),
(34, 'Waterloo', 'Wilfrid Laurier University', 43.4729, -80.5263),
(35, 'Waterloo', 'Waterloo Bible College', 43.4908, -80.544),
(36, 'Charlotte', 'University of North Carolina at Charlotte', 35.3071, -80.7351),
(37, 'Charlotte', 'Queens University of Charlotte', 35.1888, -80.8331),
(38, 'Charlotte', 'Johnson C. Smith University', 35.2445, -80.8574),
(39, 'Charlotte', 'Johnson & Wales University - Charlotte', 35.2325, -80.8509),
(40, 'Charlotte', 'Charlotte School of Law', 35.225, -80.843),
(41, 'Charlotte', 'Kings College Charlotte NC', 35.2135, -80.822),
(42, 'Charlotte', 'DeVry University-North Carolina', 35.1378, -80.9314),
(43, 'Charlotte', 'University of Phoenix-Charlotte Campus', 35.1525, -80.9489),
(44, 'Urbana-Champaign', 'University of Illinois at Urbana-Champaign', 40.1128, -88.2271),
(45, 'Urbana-Champaign', 'Tricoci University of Beauty Culture', 40.1331, -88.2158),
(46, 'Phoenix', 'Grand Canyon University', 33.5105, -112.127),
(47, 'Phoenix', 'Phoenix College', 33.4833, -112.088),
(48, 'Phoenix', 'arizona state university', 33.4975, -112.07),
(49, 'Phoenix', 'DeVry University', 33.566, -112.104),
(50, 'Phoenix', 'Arizona Christian University', 33.5946, -112.026),
(51, 'Phoenix', 'Arizona Summit Law School', 33.4485, -112.072),
(52, 'Phoenix', 'The Art Institute of Phoenix', 33.5669, -112.106),
(53, 'Las Vegas', 'University of Nevada, Las Vegas', 36.1056, -115.139),
(54, 'Las Vegas', 'College of Southern Nevada', 36.0079, -114.965),
(55, 'Las Vegas', 'Northwest Career College', 36.2038, -115.255),
(56, 'Las Vegas', 'Brightwood College-Las Vegas', 36.1433, -115.188),
(57, 'Las Vegas', 'Le Cordon Bleu College of Culinary Arts Las Vegas', 36.188, -115.312),
(58, 'Las Vegas', 'Pima Medical Institute – Las Vegas', 36.1144, -115.102),
(59, 'Las Vegas', 'Euphoria Institute of Beauty Arts & Sciences-Las Vegas', 36.1475, -115.299),
(60, 'Madison', 'University of Wisconsin–Madison', 43.0792, -89.4122),
(61, 'Madison', 'Madison Area Technical College', 43.122, -89.328),
(62, 'Madison', 'Edgewood College', 43.0609, -89.4234),
(63, 'Madison', 'University of Wisconsin-Extension', 43.0744, -89.3978),
(64, 'Madison', 'Madison Media Institute', 43.0591, -89.2942),
(65, 'Madison', 'Herzing University‎ - Madison', 43.1786, -89.2816),
(66, 'Madison', 'Globe University', 43.1963, -89.2947),
(67, 'Madison', 'Madison Cosmetology College', 43.1314, -89.3052);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `review_count` int(11) NOT NULL,
  `avg_stars` float NOT NULL,
  `yelping_since` int(11) NOT NULL,
  `fans` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `world_ranking`
--

CREATE TABLE `world_ranking` (
  `id` int(11) NOT NULL,
  `uni_name` varchar(150) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `world_ranking`
--

INSERT INTO `world_ranking` (`id`, `uni_name`, `city`, `country`) VALUES
(1, 'Yale', 'New Haven', 'USA'),
(2, 'Cambridge', 'Cambridge', 'UK'),
(3, 'Columbia', 'New York', 'USA'),
(4, 'Tsinghua', 'Beijing', 'China');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`business_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `uni`
--
ALTER TABLE `uni`
  ADD PRIMARY KEY (`uni_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `world_ranking`
--
ALTER TABLE `world_ranking`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `uni`
--
ALTER TABLE `uni`
  MODIFY `uni_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
