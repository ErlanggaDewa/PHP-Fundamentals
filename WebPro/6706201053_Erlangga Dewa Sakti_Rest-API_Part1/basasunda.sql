-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2019 at 11:17 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basasunda`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `label` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `label`) VALUES
(1, 'Numbers'),
(2, 'Family Members'),
(3, 'Colors'),
(4, 'Phrases');

-- --------------------------------------------------------

--
-- Table structure for table `word`
--

CREATE TABLE `word` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `label` varchar(100) NOT NULL,
  `sunda` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `word`
--

INSERT INTO `word` (`id`, `cat_id`, `label`, `sunda`) VALUES
(1, 1, 'one', 'hiji'),
(2, 1, 'two', 'dua'),
(3, 1, 'three', 'tilu'),
(4, 1, 'four', 'opat'),
(5, 1, 'five', 'lima'),
(6, 1, 'six', 'genep'),
(7, 1, 'seven', 'tujuh'),
(8, 1, 'eight', 'dalapan'),
(9, 1, 'nine', 'salapan'),
(10, 1, 'ten', 'sapuluh'),
(11, 2, 'father', 'bapa'),
(12, 2, 'mother', 'ema'),
(13, 2, 'son', 'putra'),
(14, 2, 'daughter', 'putri'),
(15, 2, 'older brother', 'lanceuk pamegeut'),
(16, 2, 'younger brother', 'adi pamegeut'),
(17, 2, 'older sister', 'lanceuk isteri'),
(18, 2, 'younger sister', 'adi isteri'),
(19, 2, 'grandmother', 'aki'),
(20, 2, 'grandfather', 'nini'),
(21, 3, 'red', 'beureum'),
(22, 3, 'green', 'hejo'),
(23, 3, 'brown', 'coklat'),
(24, 3, 'gray', 'kulawu'),
(25, 3, 'black', 'hideung'),
(26, 3, 'white', 'bodas'),
(27, 3, 'dusty yellow', 'koneng ngora'),
(28, 3, 'mustard yellow', 'koneng kolot'),
(29, 4, 'Where are you going?', 'Bade angkat kamana?'),
(30, 4, 'What is your name?', 'Saha nami anjeun?'),
(31, 4, 'My name is...', 'Nami abdi...'),
(32, 4, 'How are you feeling?', 'Kumaha karaosna ku anjeun?'),
(33, 4, 'I\'m feeling good.', 'Abdi ngaraos sae.'),
(34, 4, 'Are you coming?', 'Anjeun bade dongkap?'),
(35, 4, 'Yes, I\'m coming.', 'Sumuhun, abdi bade dongkap.'),
(36, 4, 'I\'m coming.', 'Abdi dongkap.'),
(37, 4, 'Let\'s go.', 'Hayu.'),
(38, 4, 'Come here.', 'Kadieu.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `word`
--
ALTER TABLE `word`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `word`
--
ALTER TABLE `word`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
