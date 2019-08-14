-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2018 at 03:36 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `morex`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `date`) VALUES
(1, 'peter', 'admin', '2018-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `current_location` varchar(200) NOT NULL,
  `destination` varchar(200) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fullname`, `phone`, `current_location`, `destination`, `date`) VALUES
(1, 'Okeke', '070896789', 'Akili-Ozizor', 'Odiukwuenu', '2018-05-29 10:35:25'),
(2, 'Okeke', '070896789', 'Akili-Ozizor', 'Obeagwe', '2018-05-29 10:37:54');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `make` varchar(150) NOT NULL,
  `model` varchar(255) NOT NULL,
  `license` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `passport` varchar(150) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `fullname`, `make`, `model`, `license`, `password`, `email`, `phone`, `ip_address`, `passport`, `date_added`) VALUES
(1, 'Solomon Ugochukwu', 'Toyota', 'M450', 'AN-RBC', 'soloking2', 'soloking2forsure@gmail.com', '07032427838', '1', '817843.JPG', '2018-05-25 00:19:42');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `amount` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `location`, `destination`, `amount`) VALUES
(1, 'Akili-Ogidi', 'Odiukwuenu', '5000'),
(2, 'Akili-Ozizor', 'Odekpe', '3000'),
(3, 'Akpo', 'Oba', '2000'),
(4, 'Akpu', 'Obeagwe', '1000'),
(5, 'Akwaeze', 'Obeledu', '500'),
(6, 'Akwaihedi', 'Odiukwuenu', ''),
(7, 'Akwaukwu', 'Odiukwuenu', ''),
(8, 'Alaohia', 'Odiukwuenu', ''),
(9, 'Alor', 'Odiukwuenu', ''),
(10, 'Amaetiti', 'Odiukwuenu', ''),
(11, 'Amansea', 'Odiukwuenu', ''),
(12, 'Amanuke', 'Odiukwuenu', ''),
(13, 'Amaokpala', 'Odiukwuenu', ''),
(14, 'Amawbia', 'Odiukwuenu', ''),
(15, 'Amesi', 'Odiukwuenu', ''),
(16, 'Amichi', 'Odiukwuenu', ''),
(17, 'Amiyi', 'Odiukwuenu', ''),
(18, 'Amorka', 'Odiukwuenu', ''),
(19, 'Anaku', 'Odiukwuenu', ''),
(20, 'Atani', 'Odiukwuenu', ''),
(21, 'Awa', 'Odiukwuenu', ''),
(22, 'Awba-Ofemili', 'Odiukwuenu', ''),
(23, 'Awgbu', 'Odiukwuenu', ''),
(24, 'Awka', 'Odiukwuenu', ''),
(25, 'Awka-Etiti', 'Odiukwuenu', ''),
(26, 'Awkuzu', 'Odiukwuenu', ''),
(27, 'Azia', 'Odiukwuenu', ''),
(28, 'Azigbo', 'Odiukwuenu', ''),
(29, 'Ebenator', 'Odiukwuenu', ''),
(30, 'Ebenebe', 'Odiukwuenu', ''),
(31, 'Ekwulobia', 'Odiukwuenu', ''),
(32, 'Ekwulumili', 'Odiukwuenu', ''),
(33, 'Enugwu', 'Odiukwuenu', ''),
(34, 'Otu Aguleri', 'Odiukwuenu', ''),
(35, 'Enugwu_Aguleri', 'Odiukwuenu', ''),
(36, 'Enugwu-Agidi', 'Odiukwuenu', ''),
(37, 'Enugwu-Ukwu', 'Odiukwuenu', ''),
(38, 'Enugwu-Umuonyia', 'Odiukwuenu', ''),
(39, 'Eziagu', 'Odiukwuenu', ''),
(40, 'Eziagulu', 'Odiukwuenu', ''),
(41, 'Otu Aguleri', 'Odiukwuenu', ''),
(42, 'Ezinato', 'Odiukwuenu', ''),
(43, 'Ezinifite-Aguata', 'Odiukwuenu', ''),
(44, 'Ezinifite-Nnewi', 'Odiukwuenu', ''),
(45, 'Eziowelle', 'Odiukwuenu', ''),
(46, 'Ezira', 'Odiukwuenu', ''),
(47, '', 'Odiukwuenu', ''),
(48, '', 'Odiukwuenu', ''),
(49, '', 'Odiukwuenu', ''),
(50, '', 'Odiukwuenu', '');

-- --------------------------------------------------------

--
-- Table structure for table `merge`
--

CREATE TABLE `merge` (
  `id` int(11) NOT NULL,
  `driver_id` int(10) NOT NULL,
  `driver_name` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merge`
--

INSERT INTO `merge` (`id`, `driver_id`, `driver_name`, `message`, `date`) VALUES
(1, 1, 'Solomon Ugochukwu', 'You are pick up Mrs. Edith', '2018-05-29 12:56:54'),
(2, 1, 'Solomon Ugochukwu', 'You are pick up Mrs. Edith', '2018-05-29 12:57:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merge`
--
ALTER TABLE `merge`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `merge`
--
ALTER TABLE `merge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
