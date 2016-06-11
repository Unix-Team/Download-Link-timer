-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2016 at 02:28 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hossin_unixteam`
--

-- --------------------------------------------------------

--
-- Table structure for table `downloadlinks`
--

CREATE TABLE `downloadlinks` (
  `id` bigint(16) NOT NULL,
  `owner` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `downloadkey` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `downloads` int(10) NOT NULL,
  `created` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `expires` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `downloadlinks`
--

INSERT INTO `downloadlinks` (`id`, `owner`, `downloadkey`, `file`, `downloads`, `created`, `expires`) VALUES
(1, 'test_hastim@gmail.com', '26ea57e6f039d6f4c87569f8d8d9b0f3', 'test hastim.zip', 0, '16:56:08 - 2016/06/10', 1465647968);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `downloadlinks`
--
ALTER TABLE `downloadlinks`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `downloadlinks`
--
ALTER TABLE `downloadlinks`
  MODIFY `id` bigint(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
