--
-- Database: `library`
--
CREATE DATABASE IF NOT EXISTS `library` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
USE `library`;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `Book_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Title` varchar(1000) NOT NULL,
  `Author` varchar(1000) NOT NULL,
  `Publisher` int(5) NOT NULL,
  `Date_of_publication` date NOT NULL,
  `Language` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE IF NOT EXISTS `returns` (
  `Borrow_id` int(11) NOT NULL PRIMARY KEY,
  `User_id` int(11) NOT NULL,
  `Book_id` int(11) NOT NULL,
  `Date_returned` date NOT NULL,
  `Due_date` date NOT NULL,
  `Fine` varchar(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `borrowing`
--

CREATE TABLE IF NOT EXISTS `borrowing` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `User_id` int(11) NOT NULL,
  `Book_id` int(11) NOT NULL,
  `Date_borrowed` date NOT NULL,
  `Due_date` date NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `User_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Username` varchar(255) NOT NULL ,
  `Name` varchar(512) NOT NULL,
  `Password` char(255) NOT NULL,
  `Email` varhcar(40) NOT NULL
  CONSTRAINT `unique_key_name` UNIQUE (`User_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

