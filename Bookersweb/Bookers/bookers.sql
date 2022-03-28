-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2020 at 02:13 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookers`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `b_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `b_title` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `a_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `catagory` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(5) NOT NULL DEFAULT '0',
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Available',
  `b_pic` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`b_id`, `b_title`, `a_name`, `state`, `catagory`, `price`, `status`, `b_pic`) VALUES
('17864338', 'Teach yourself C++', 'Herbert Schildt', 'College', 'University', 180, 'In Rent', 'teach yourself c++.jpg'),
('29416637', 'Cloud Computing', 'Mr. xyz', 'College', 'Others', 200, 'In Rent', 'CC.jpg'),
('35899379', 'Cloud Computing', 'Rased', 'University', 'University', 200, '', 'CC.jpg'),
('51947221', 'Database System Concepts', 'Henry K. Korth', 'College', 'University', 150, 'Available', 'thFBYM6HN2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `n_id` int(10) NOT NULL,
  `to_user` int(10) NOT NULL,
  `from_user` int(10) NOT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `owns`
--

CREATE TABLE `owns` (
  `b_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `u_id` int(11) NOT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `rent_amount` int(10) DEFAULT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `owns`
--

INSERT INTO `owns` (`b_id`, `u_id`, `buyer_id`, `date`, `rent_amount`, `location`) VALUES
('51947221', 26, NULL, '2019-10-01', NULL, 'Muradpur'),
('17864338', 26, 26, '2019-10-01', NULL, 'CU'),
('35899379', 35, NULL, '2019-10-01', NULL, 'Jobra'),
('29416637', 26, 26, '2020-02-10', NULL, 'Oxygen');

-- --------------------------------------------------------

--
-- Table structure for table `p_coin_info`
--

CREATE TABLE `p_coin_info` (
  `tx_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `u_id` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `status` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `date_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `p_coin_info`
--

INSERT INTO `p_coin_info` (`tx_id`, `u_id`, `amount`, `status`, `date_time`) VALUES
('bcdcbheyub', 26, 200, '', ''),
('djcucyejhdh87y89789', 26, 100, '', ''),
('dkjcd9890', 26, 300, '', '2020/02/10'),
('eklnfekjn77786', 26, 100, '', '2020/02/10'),
('fvhcbe878', 26, 100, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `u_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL DEFAULT '5',
  `coin` int(11) NOT NULL DEFAULT '50',
  `p_pic` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'defaultpic1',
  `status` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `email`, `pass`, `token`, `u_name`, `mobile`, `rating`, `coin`, `p_pic`, `status`) VALUES
(26, 'inanmashrur@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '112704', 'inan mashrur', '01833484188', 5, 50, 'defaultpic1', '1'),
(27, 'mashrurinan@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '517867', 'inan mashrur', '01833484188', 5, 50, 'defaultpic1', '1'),
(29, 'arsami01910@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '957604', 'abdur Rahman', '01833484188', 5, 50, 'defaultpic1', '1'),
(32, 'inanmashrur4@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '602623', 'inan mashrur', '01833484188', 5, 50, 'defaultpic1', '0'),
(33, 'inanmashrur8@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '290691', 'inan mashrur', '01833484188', 5, 50, 'defaultpic1', '0'),
(35, 'arsami1710@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '262142', 'abdur Rahman', '01910944550', 5, 50, 'defaultpic1', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `p_coin_info`
--
ALTER TABLE `p_coin_info`
  ADD PRIMARY KEY (`tx_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `n_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
