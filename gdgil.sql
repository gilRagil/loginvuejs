-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2018 at 05:00 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gdgil`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `admin_id` varchar(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `photo` varchar(300) NOT NULL,
  `sex` char(1) NOT NULL,
  `religion` varchar(15) NOT NULL,
  `address_identity` varchar(300) NOT NULL,
  `city_identity` varchar(100) NOT NULL,
  `address_domicile` varchar(300) NOT NULL,
  `city_domicile` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `marital_status` char(1) NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_date_of_birth` varchar(100) NOT NULL,
  `couple_name` varchar(200) NOT NULL,
  `couple_date_of_birth` date NOT NULL,
  `couple_place_of_birth` varchar(100) NOT NULL,
  `children_name1` varchar(200) NOT NULL,
  `children_dob1` date NOT NULL,
  `children_pob1` varchar(100) NOT NULL,
  `children_name2` varchar(200) NOT NULL,
  `children_dob2` date NOT NULL,
  `children_pob2` varchar(100) NOT NULL,
  `children_name3` varchar(200) NOT NULL,
  `children_dob3` date NOT NULL,
  `children_pob3` varchar(100) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `member_since` date NOT NULL,
  `employee_status` char(1) NOT NULL,
  `contract_start_date` date NOT NULL,
  `contract_end_date` date NOT NULL,
  `resign_date` date NOT NULL,
  `leave_date` date NOT NULL,
  `job_position` int(10) NOT NULL,
  `branch_id` varchar(10) NOT NULL,
  `mobile_phone1` varchar(30) NOT NULL,
  `mobile_phone2` varchar(30) NOT NULL,
  `email_office` varchar(100) NOT NULL,
  `email_personal` varchar(100) NOT NULL,
  `entry_by` varchar(10) NOT NULL,
  `entry_date` datetime NOT NULL,
  `update_by` varchar(10) NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` varchar(10) NOT NULL,
  `log_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `log_time`) VALUES
('USR0001', 'admin', 'admin', '1', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`admin_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
