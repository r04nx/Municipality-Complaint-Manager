-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2023 at 07:56 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmp`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `indate` date NOT NULL DEFAULT current_timestamp(),
  `outdate` date DEFAULT NULL,
  `subject` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `imageid` varchar(50) NOT NULL,
  `expenses` int(11) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `time` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `fname`, `phone`, `email`, `indate`, `outdate`, `subject`, `description`, `imageid`, `expenses`, `status`, `time`) VALUES
(85, 'Soham', '87654321', 'soham@2004', '2023-02-05', NULL, 'Disturbance in studi', 'Loud noise in neighberhood and causing issues in c', '63df5f56951f48.89908891.jpg', 1890, 'rejected', '2023-02-05'),
(86, 'Soham', '9874321121', 'akshay@admin', '2023-02-05', NULL, 'this is my problem ', 'f3e', '63df8a5bd1c585.48483557.jpg', 0, 'new', '2023-02-05'),
(87, 'Nargis Shah', '987654321', 'nargis@admin', '2023-02-06', '0000-00-00', 'college is far', 'No Transport Service to travel to college', '63e141b2dec7b4.05632896.jpg', 0, 'inprogress', '2023-02-06'),
(88, 'David', '987654321', 'david@gmail.com', '2023-02-08', NULL, 'Water Issue', 'Water is impure', '63e3380bb96e96.79586925.jpg', 0, 'inprogress', '2023-02-08'),
(89, 'David', '987654321', 'david@gmail.com', '2023-02-08', NULL, 'Water Issue', 'Water is impure', '63e36e7d6b7830.16922018.jpg', 0, 'new', '2023-02-08'),
(90, 'Nargis Pawar', '9594729669', 'shahnargis29@gmail.c', '2023-02-08', NULL, 'Attention', 'I need attention from  Mr Rohan Pawar.', '63e36f508bed21.71291453.jpg', 0, 'new', '2023-02-08'),
(91, 'David', '987654321', 'admin@rohan.tk', '2023-02-09', NULL, 'Subject2', 'we are anonymous', '63e5369d14be86.27130432.jpg', 9000, 'new', '2023-02-09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'rohan', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
