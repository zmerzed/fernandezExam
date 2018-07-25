-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2018 at 05:36 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `remz`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `by_user` int(11) NOT NULL,
  `comment` text NOT NULL,
  `commented_at` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `by_user`, `comment`, `commented_at`, `post_id`) VALUES
(1, 7, 'asdfasdfdsa', 2018, 22),
(2, 7, 'x2', 2018, 22),
(3, 7, 'sdfasdfd', 2018, 22),
(4, 7, 'sdfasd', 2018, 22),
(5, 7, 'asdfsaf', 2018, 22),
(6, 7, 'ffffff', 2018, 20),
(7, 7, 'the quickrbwon', 2018, 19),
(8, 7, 'asdfdsaf', 2018, 2),
(9, 7, 'fffff', 2018, 25);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `content`, `created_at`) VALUES
(1, 7, 'test', 'sadfasdf', '2018-07-25 02:35:10'),
(2, 5, 'test2', 'asdfsa', '2018-07-25 02:35:17'),
(3, 5, 'test3', 'cccc', '2018-07-25 02:35:18'),
(4, 5, 'test4', 'ggggg', '2018-07-25 02:35:20'),
(5, 5, 'test5', 'hhhhh', '2018-07-25 02:35:22'),
(11, 9, 'sadfsdafdsa', 'fdsafadsdsaf', '2018-07-25 08:52:42'),
(12, 9, 'dfh', 'g', '2018-07-25 08:52:50'),
(13, 9, 'gsgsgsdfgdfs', 'dgsdfgdsf', '2018-07-25 08:52:55'),
(16, 9, 'fg', 'jgjg', '2018-07-25 08:54:34'),
(17, 9, 'f', 'gfgd', '2018-07-25 08:54:43'),
(18, 10, 'ffff', 'addf', '2018-07-25 08:55:21'),
(19, 10, '', 'addf', '2018-07-25 09:01:48'),
(20, 10, 'dsfg', 'sdfgfdsgdsg', '2018-07-25 09:02:03'),
(22, 7, 'xxxx', 'xxx', '2018-07-25 09:16:19'),
(25, 7, 'asdfasdf', 'asdfsa', '2018-07-25 09:32:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(5, 'remz', 'remz@gmail.com', 'test123'),
(6, 'james', 'james@gmail.com', 'test123'),
(7, 'pjtucker', 'pjtucker@gmail.com', 'test123'),
(8, 'cpaul', 'cpaul@gmail.com', 'test123'),
(9, 'cool', 'cool@gmail.com', 'test123'),
(10, 'pokloy', 'pokloy@gmail.com', 'ttttt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
