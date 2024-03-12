-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2024 at 02:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `Book_id` int(11) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Author` varchar(30) NOT NULL,
  `Publisher` varchar(50) NOT NULL,
  `Date_of_publication` date NOT NULL,
  `Language` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Book_id`, `Title`, `Author`, `Publisher`, `Date_of_publication`, `Language`) VALUES
(1, 'Nichomachean Ethics', 'Aristotle', 'Penguin Books', '2012-06-22', 'English'),
(2, 'Understanding Marxism', 'Richard D Wolff', 'Lulu.com', '2018-11-26', 'English'),
(3, 'Mein Kampf', 'Adolf Hitler', 'General Press', '2019-11-11', 'English'),
(4, 'The Communist Manifesto', 'Karl Marx', 'Pocket Books', '1988-10-01', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `borrowing`
--

CREATE TABLE `borrowing` (
  `id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Book_id` int(11) NOT NULL,
  `Date_borrowed` date NOT NULL,
  `Due_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrowing`
--

INSERT INTO `borrowing` (`id`, `User_id`, `Book_id`, `Date_borrowed`, `Due_date`) VALUES
(17, 1, 1, '2024-03-03', '2024-03-18'),
(18, 1, 2, '2024-03-03', '2024-03-18'),
(19, 1, 3, '2024-03-03', '2024-03-18'),
(20, 1, 4, '2024-03-03', '2024-03-18');

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `Borrow_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Book_id` int(11) NOT NULL,
  `Date_returned` date NOT NULL,
  `Due_date` date NOT NULL,
  `Fine` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `returns`
--

INSERT INTO `returns` (`Borrow_id`, `User_id`, `Book_id`, `Date_returned`, `Due_date`, `Fine`) VALUES
(1, 1, 3, '2024-03-01', '2024-02-23', 'Rs. 7'),
(10, 1, 2, '2024-03-02', '2024-03-17', 'Rs. 0'),
(11, 4, 3, '2024-03-03', '2024-03-17', 'Rs. 0'),
(12, 1, 1, '2024-03-02', '2024-03-17', 'Rs. 0'),
(13, 16, 4, '2024-03-02', '2024-03-17', 'Rs. 0'),
(14, 1, 2, '2024-03-03', '2024-03-17', 'Rs. 0'),
(15, 16, 1, '2024-03-03', '2024-03-18', 'Rs. 0'),
(16, 5, 4, '2024-03-03', '2024-03-18', 'Rs. 0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_id` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Password` char(255) NOT NULL,
  `Email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_id`, `Username`, `Name`, `Password`, `Email`) VALUES
(1, 'john_rai', 'John Rai', '$2y$10$3.FX.AJX5UQREoB6OCcJtubTvB3mMJF.JwXiOE9H87eNW7.8pgfN6', 'johnrai23@gmail.com'),
(4, 'kushnepal', 'Kush Nepal', '$2y$10$FQawp5GprQi8kY19F9gWjeGpIkngWgDMyNb1Tu8biSyH4eTsTqDy.', 'nepalkush77@gmail.com'),
(5, 'bobby', 'Bob Dylan', '$2y$10$x.7UodxudunmxR0DZBTVwOUX1p8TQQUKQwEYpTpkvPv55DN/bAxPO', 'bobbydylan@gmail.com'),
(16, 'saulgoodman', 'Jimmy McGill', '$2y$10$NcaLbvD18DWALPsXciEQCuzye6oHtl2bn.IjvthCO6RkJK.nwaoD6', 'bettercallsaul@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`Book_id`);

--
-- Indexes for table `borrowing`
--
ALTER TABLE `borrowing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Book_id` (`Book_id`),
  ADD KEY `User_id` (`User_id`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`Borrow_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_id`),
  ADD UNIQUE KEY `UNIQUE` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `Book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `borrowing`
--
ALTER TABLE `borrowing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrowing`
--
ALTER TABLE `borrowing`
  ADD CONSTRAINT `borrowing_ibfk_1` FOREIGN KEY (`Book_id`) REFERENCES `books` (`Book_id`),
  ADD CONSTRAINT `borrowing_ibfk_2` FOREIGN KEY (`User_id`) REFERENCES `users` (`User_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
