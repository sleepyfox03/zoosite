-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2023 at 06:50 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zoo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `animals_id` int(11) NOT NULL,
  `animals_name` varchar(20) DEFAULT NULL,
  `scientific_name` varchar(400) NOT NULL,
  `type` varchar(50) NOT NULL,
  `category` varchar(20) NOT NULL,
  `activity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`animals_id`, `animals_name`, `scientific_name`, `type`, `category`, `activity`) VALUES
(1, 'Frog', 'Rana Tigrina', 'Terrestrial', 'Amphibian', 1),
(2, 'Crocodile', 'Crocodylidae', 'Terrestrials', 'Amphibian', 1),
(3, 'Frog', 'Rana Tigrina', 'Terrestrial', 'Amphibian', 1),
(4, 'Crocodile', 'Crocodylidae', 'Terrestrial', 'Amphibian', 1);

-- --------------------------------------------------------

--
-- Table structure for table `animal_zoo_map`
--

CREATE TABLE `animal_zoo_map` (
  `s_no` int(11) NOT NULL,
  `animals_id` varchar(23) NOT NULL,
  `zoo_id` varchar(23) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animal_zoo_map`
--

INSERT INTO `animal_zoo_map` (`s_no`, `animals_id`, `zoo_id`) VALUES
(1, '1', '1'),
(2, '2', '5'),
(3, '3', '3'),
(4, '4', '5');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `uname` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `phn_no` varchar(50) NOT NULL,
  `role` varchar(10) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL,
  `activity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `uname`, `email`, `phn_no`, `role`, `pass`, `activity`) VALUES
(2, 'Satvik', 'satvik@gmail.com', '6230145111', 'Superadmin', '123', 1),
(25, 'Shalini', 'shalini@gmail.com', '9418369111', 'Employee', '123', 1),
(26, 'abc', 'abc@gmail.com', '0', 'User', '123', 1),
(31, 'Rahul', 'rahul@gmail.com', '8580922111', 'ManagerS', NULL, 1),
(32, 'test user', 't@t.com', '6565548111', 'User', NULL, 1),
(53, 'pawan', 'pawan@gmail.com', '1234', 'Ch2a', '1234', 1),
(54, '12999', 'satviknjnj@gmail.com', '234567576', '234', '124', 1),
(60, 'svk', 'shalinis@gmail.com', '62301454111', 'Admin', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `zoo`
--

CREATE TABLE `zoo` (
  `zoo_id` int(11) NOT NULL,
  `zoo_name` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `area` float NOT NULL,
  `activity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zoo`
--

INSERT INTO `zoo` (`zoo_id`, `zoo_name`, `state`, `city`, `area`, `activity`) VALUES
(1, 'National Zoological Park', '-', 'Delhi', 0.71, 1),
(2, 'Arignar Anna Zoological Park', 'Tamil Nadu', 'Chennai', 6.02, 1),
(3, 'Chhatbir Zoo', 'Punjab', 'Chandigarh', 2.02, 1),
(4, 'Jijamata Udyaan', 'Maharashtra', 'Mumbai', 0.48, 1),
(5, 'Crocodile Breeding Centre', 'Jharkhand', 'Ranchi', 0.02, 1),
(6, ' memorial', 'solid', 'Delhi', 0, 0),
(7, 'as', 'liquid2', 'as', 312, 0),
(8, '23', '23', '23', 12, 0),
(9, 'abc parks', 'Himachal Pradesh', 'Hamirpur', 12, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`animals_id`);

--
-- Indexes for table `animal_zoo_map`
--
ALTER TABLE `animal_zoo_map`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `zoo`
--
ALTER TABLE `zoo`
  ADD PRIMARY KEY (`zoo_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `animals_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `animal_zoo_map`
--
ALTER TABLE `animal_zoo_map`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `zoo`
--
ALTER TABLE `zoo`
  MODIFY `zoo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
