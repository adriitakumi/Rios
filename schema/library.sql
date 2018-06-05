-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2018 at 12:49 PM
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
(1, 'The Handmaid\'s Tale', 'Margaret Atwood', '2,20', 'Fiction', 3, '2018-06-05'),
(2, 'It', 'Stephen King', '4', 'Fiction', 2, '2018-06-05'),
(3, 'Beneath a Scarlet Sky ', 'Mark Sullivan', '13,15', 'Fiction', 4, '2018-06-05'),
(4, 'Origin', 'Dan Brown', '2,11,15', 'Fiction', 3, '2018-06-05'),
(5, 'The Fault in Our Stars', 'John Greene', '1', 'Fiction', 5, '2018-06-05'),
(6, 'New York Times', 'New York Times', '14', 'Periodical Section', 2, '2018-06-05'),
(7, 'Harry Potter and the Philosopher\'s Stone', 'J.K. Rowling', '2,7', 'Fiction', 2, '2018-06-05'),
(8, 'Harry Potter and the Chamber of Secrets', 'J.K. Rowling', '2,7', 'Fiction', 2, '2018-06-05'),
(9, 'Harry Potter and the Prisoner of Azkaban', 'J.K. Rowling', '2,7', 'Fiction', 2, '2018-06-05');

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
  `house_no` varchar(30) NOT NULL DEFAULT '',
  `street` varchar(30) NOT NULL,
  `barangay` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `province` varchar(30) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `date_joined` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `first_name`, `last_name`, `age`, `house_no`, `street`, `barangay`, `city`, `province`, `contact_no`, `email`, `date_joined`) VALUES
(1, 'Hakeem', 'Polistico', 23, '', '', '', '', '', '09558874822', 'hjpolistico@gmail.com', '2018-06-05'),
(2, 'Aiella', 'Escaro', 18, '', '', '', '', '', '09222222222', 'aiella.escaro@gmail.com', '2018-06-05'),
(3, 'Aiella', 'Francesca', 19, '#211', 'Barietto st.', 'Maharlika', 'Imus', 'Cavite', '0933333333', 'dhajkda@gmail.com', '2018-06-05');

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
  MODIFY `book_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
