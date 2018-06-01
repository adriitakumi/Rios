-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2018 at 06:37 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `book_id` int(10) NOT NULL,
  `book_title` varchar(50) NOT NULL,
  `author` varchar(40) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `library_section` varchar(30) NOT NULL,
  `copies` int(4) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_title`, `author`, `genre`, `library_section`, `copies`, `date_added`) VALUES
(1, 'The Fault in Our Starsu', 'John Greenee', '1', 'Periodical Section', 32, '2018-05-31'),
(3, '50 shades of grey', 'el james', '1,2', 'Fiction', 4, '2018-05-31'),
(4, 'Cheap Thrills', 'Sia', '7,9,15', 'Children\'s Section', 4, '2018-06-01'),
(5, 'My R', 'Rachie', '2,11,12', 'Children\'s Section', 5, '2018-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_books`
--

CREATE TABLE `borrowed_books` (
  `id` int(10) NOT NULL,
  `book_id` int(10) NOT NULL,
  `member_id` int(10) NOT NULL,
  `status` varchar(30) NOT NULL,
  `date_borrowed` date NOT NULL,
  `due_date` date NOT NULL,
  `date_returned` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrowed_books`
--

INSERT INTO `borrowed_books` (`id`, `book_id`, `member_id`, `status`, `date_borrowed`, `due_date`, `date_returned`) VALUES
(1, 1, 2, 'Returned', '2018-05-31', '2018-06-07', 'N/A'),
(7, 3, 2, 'Returned', '2018-05-31', '2018-06-07', '2018/06/01'),
(22, 1, 2, 'Out', '2018-05-31', '2018-06-07', 'N/A'),
(26, 3, 2, 'Returned', '2018-05-31', '2018-06-07', '2018/06/01'),
(27, 3, 2, 'Out', '2018-05-31', '2018-06-07', 'N/A'),
(28, 3, 2, 'Out', '2018-05-31', '2018-06-07', 'N/A'),
(29, 1, 2, 'Out', '2018-05-31', '2018-06-07', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `genre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `genre`) VALUES
(1, 'Romance'),
(2, 'Mystery'),
(3, 'Sci-fi'),
(4, 'Horror'),
(5, 'Encyclopedia'),
(6, 'Directories'),
(7, 'Adventure'),
(8, 'Almanacs'),
(9, 'Maps'),
(10, 'Pictures'),
(11, 'Folklore'),
(12, 'Short Stories'),
(13, 'Magazines'),
(14, 'Newspapers'),
(15, 'Journals'),
(16, 'Spirituality'),
(17, 'Art'),
(18, 'Cooking'),
(19, 'Comics'),
(20, 'History');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(10) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `age` int(2) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `date_joined` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `first_name`, `last_name`, `age`, `address`, `contact_no`, `email`, `date_joined`) VALUES
(1, 'Hakeem', 'Polistico', 23, 'None, naglayas eh LMFAO', '09558874822', 'hjpolistico@gmail.com', '2018-05-31'),
(2, 'Aiella', 'Escaro', 18, 'Imus, Cavite', '093242522542', 'daniel_polistico@yahoo.com', '2018-05-31'),
(3, 'hfdbhg', 'gfghfhg', 88, 'jfdsfdsfs', '435353', 'asgfhsd@gmail.com', '2018-05-31'),
(4, 'sdjfsjfhsg', 'jhghfksjf', 73, 'sdfsk', '38647538', 'hdfjsd@gmail.com', '2018-05-31'),
(5, 'fsdjfsj', 'jfhdjg', 37, 'sjkgjsf', '8458734', 'jdjk2f@gmail.com', '2018-05-31'),
(6, 'kjwrh', 'jdgnkjg', 38, 'dkjjgjkf', '429842', 'sjdk@gmail.com', '2018-05-31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `user_role` varchar(10) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `address`, `contact_no`, `user_role`, `date_created`) VALUES
(1, 'admin', 'admin', 'Adrii', 'Escaro', 'Imus, Cavite', '09176103510', 'admin', '2018-05-29 15:23:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
