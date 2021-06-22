-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2021 at 10:13 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms2`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Bootstrap'),
(2, 'JS'),
(3, 'CS Global Offensive'),
(22, 'C'),
(24, 'PHP'),
(25, 'C++'),
(26, 'Go');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(4) NOT NULL,
  `comment_post_id` int(4) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_date` date NOT NULL,
  `comment_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'Iran'),
(2, 'Germany'),
(3, 'America'),
(4, 'Brazil'),
(5, 'France'),
(6, 'Russia'),
(7, 'England'),
(8, 'Iraq'),
(9, 'Afghanistan'),
(10, 'Albania'),
(11, 'Algeria'),
(12, 'Andorra'),
(13, 'Burundi'),
(14, 'Bolivia'),
(15, 'China'),
(16, 'Chile'),
(17, 'Egypt'),
(18, 'France'),
(19, 'Fiji'),
(20, 'Georgia'),
(21, 'Iceland'),
(22, 'India'),
(23, 'Japan'),
(24, 'Jordan'),
(25, 'Liberia'),
(26, 'Libya'),
(27, 'Nepal');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(5) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(110, 2, '1', 'Mostafa Binesh', '2021-05-23', 'rainbow.jpg', '<h2>pashmaloo hastam</h2><p>what the hell is wrong with you mate?!</p>', 'javascript,programming,awesome', 5, 'published'),
(111, 25, '2', 'کوروش', '2021-05-10', 'rainboe21.jpg', 'battlefield 1 is here', 'gta,rainbow,bf1', 0, 'published'),
(134, 2, '1', 'Mostafa Binesh', '2021-05-23', 'rainbow.jpg', '<h2>pashmaloo hastam</h2><p>what the hell is wrong with you mate?!</p>', 'javascript,programming,awesome', 5, 'published'),
(135, 25, '2', 'کوروش', '2021-05-10', 'rainboe21.jpg', 'battlefield 1 is here', 'gta,rainbow,bf1', 0, 'published'),
(136, 2, '1', 'Mostafa Binesh', '2021-05-23', 'rainbow.jpg', '<h2>pashmaloo hastam</h2><p>what the hell is wrong with you mate?!</p>', 'javascript,programming,awesome', 5, 'published'),
(137, 25, '2', 'کوروش', '2021-05-10', 'rainboe21.jpg', 'battlefield 1 is here', 'gta,rainbow,bf1', 0, 'published'),
(138, 2, '1', 'Mostafa Binesh', '2021-05-23', 'rainbow.jpg', '<h2>pashmaloo hastam</h2><p>what the hell is wrong with you mate?!</p>', 'javascript,programming,awesome', 5, 'published'),
(139, 25, '2', 'کوروش', '2021-05-10', 'rainboe21.jpg', 'battlefield 1 is here', 'gta,rainbow,bf1', 0, 'published'),
(140, 2, '1', 'Mostafa Binesh', '2021-05-23', 'rainbow.jpg', '<h2>pashmaloo hastam</h2><p>what the hell is wrong with you mate?!</p>', 'javascript,programming,awesome', 5, 'published'),
(141, 25, '2', 'کوروش', '2021-05-10', 'rainboe21.jpg', 'battlefield 1 is here', 'gta,rainbow,bf1', 0, 'published'),
(142, 2, '1', 'Mostafa Binesh', '2021-05-23', 'rainbow.jpg', '<h2>pashmaloo hastam</h2><p>what the hell is wrong with you mate?!</p>', 'javascript,programming,awesome', 5, 'published'),
(143, 25, '2', 'کوروش', '2021-05-10', 'rainboe21.jpg', 'battlefield 1 is here', 'gta,rainbow,bf1', 0, 'published'),
(144, 2, '1', 'Mostafa Binesh', '2021-05-23', 'rainbow.jpg', '<h2>pashmaloo hastam</h2><p>what the hell is wrong with you mate?!</p>', 'javascript,programming,awesome', 5, 'published'),
(145, 25, '2', 'کوروش', '2021-05-10', 'rainboe21.jpg', 'battlefield 1 is here', 'gta,rainbow,bf1', 0, 'published');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `last_time` int(12) DEFAULT 100
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `last_time`) VALUES
(1, 'admin', '$argon2id$v=19$m=65536,t=4,p=1$OEFJQVFscHdmeHlJT0pWVA$iiRTPcc1GYYwn7Lhw0l918Ciro5B/wr9lBO9GBIFbWk', 'kurosh', 'binesh', 'kurosh@gmail.comsss', '', 'admin', 1624133639),
(4, 'adminasdasdasd', '$argon2id$v=19$m=65536,t=4,p=1$dlR1Z05XVnhNZGlISW5HbQ$OdTzvaxnlRq8O5tqiosf7rvZuxWwW9rbKePI+TXZ3QI', 'kurosh', 'kurosh', 'kurosh', 'pashm.png', 'subscriber', 1622310827),
(5, 'kashani', '$argon2id$v=19$m=65536,t=4,p=1$WlFsaFdXakgwV0ZJVkp0cw$bgwabhgnXNF+IOxBCRkJ4WdEGuL4S+94LFzAWqL/ZwI', 'kurosh', 'kurosh', 'kurosh', '', 'Subscriber', 1622310827),
(7, 'kurosh', '$argon2id$v=19$m=65536,t=4,p=1$VVRhWW5QdFRJYXZnc1kxeQ$oR6k19R77RiKU8qZHDwLq5F4lBEVsCf4kKsDo+jVzrI', 'mostafa', 'binesh', 'ubirockteam@gmail.com', 'pashm.png', 'admin', 1622645430),
(8, 'test', '$argon2id$v=19$m=65536,t=4,p=1$QkF6MkMzbEQxVEhxQ1VVaQ$B+DRO9KTtq4gNSxnqQRSUM8wO4mP9nsdXhkz3+IvvUw', 'sadasds', 'asdasdasd', 'test@gmail.com', 'pashm.png', 'subscriber', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
