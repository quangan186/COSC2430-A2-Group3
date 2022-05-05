-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2022 at 01:02 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) NOT NULL,
  `postid` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `content` text NOT NULL,
  `images` varchar(500) NOT NULL,
  `has_image` tinyint(1) NOT NULL,
  `comments` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `url_address` varchar(200) NOT NULL,
  `profile_image` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `firstname`, `lastname`, `email`, `password`, `url_address`, `profile_image`, `date`) VALUES
(1, 61617148984418637, 'Loan', 'Loan', 'loan@gmail.com', 'loan', 'loan.loan.61617148984418637', '', '2022-04-25 17:23:27'),
(21, 93456875962034, 'Loan', 'Testing', 'Azz2rri007@yahoo.com.vn', '$2y$10$UoEgpjCf3xn6dddEDnHy/.ETqP6tkdXJ/PbcbjvLiYK', 'loan.testing.0093456875962034', '', '2022-05-05 10:24:15'),
(22, 713569, 'Loan', 'Testing', 'Az342urri007@yahoo.com.vn', '$2y$10$vYZg5o3P0aNa9IyChmrCde9JpKHYGoaxKhm/7c3BQJB', 'loan.testing.713569', '', '2022-05-05 10:24:57'),
(23, 86663, 'Testing', 'Nguyen', 'fds@yahoo.com.vn', '$2y$10$U29qgEO35NE5.KJvtsnGJuXGa6YJdtHmz7oBzSfjhfk', 'testing.nguyen.86663', '', '2022-05-05 10:33:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`),
  ADD KEY `id_3` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
