-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2023 at 01:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogg`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `published` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `topic_id`, `title`, `image`, `body`, `published`, `created_at`) VALUES
(18, 23, 2, 'Rise Vision Revolutionizes Digital Signage with Rise Vision Media Player Hardware as a Service', '1695281685_risevision1.jpeg', '&lt;p&gt;School districts across North America are facing severe staff shortages at a time when school IT teams are managing exponentially more devices with the rapid increase of classroom technology and 1:1 programs. Managing and maintaining digital signage hardware is another task that doesn&rsquo;t need to be on the priority list for school technology teams.&lt;/p&gt;&lt;p&gt;Rise Vision set out to alleviate that burden with the Rise Vision Media Player Hardware as a Service. Schools can eliminate managing digital signage hardware from their to-do list with this solution. Rise Vision manages the media player software, provides technical support, sends out advanced replacements if an issue can&rsquo;t be fixed over the phone, and upgrades the devices regularly. The Rise Vision Media Player takes minutes to set up, is optimized for Rise Vision digital signage, and is a locked-down single-purpose device that diminishes the risk of unauthorized network access.&lt;/p&gt;&lt;p&gt;This solution provides districts with one software, hardware, and support vendor, simplifying digital signage procurement. The subscription model gives school administrators predictable costs, making annual budgeting easy and allowing them to scale the service up or down as their needs change.&lt;/p&gt;&lt;p&gt;With the Rise Vision Media Player Hardware as a Service, schools can streamline their digital signage experience, reduce hardware costs, and consolidate procurement. Rise Vision handles all the complexities, allowing schools to concentrate on their message and objectives.&lt;/p&gt;&lt;p&gt;The Rise Vision Media Player Hardware as a Service is an example of Rise Vision&rsquo;s continued commitment to providing schools with solutions that save time and enable districts to focus their efforts on what matters: improving communication and safety, celebrating student achievements, and creating a positive school culture.&lt;/p&gt;&lt;p&gt;&ldquo;Rise Vision&rsquo;s Media Player Hardware as a Service empowers schools to shift their focus from hardware management to achieving their digital signage communication goals. With our solution, schools can streamline their processes, reduce costs, and concentrate on creating meaningful messages that enhance their educational environment.&rdquo; &ndash; Brian Loosbrock, CEO of Rise Vision&lt;/p&gt;', 1, '2023-09-21 13:04:45'),
(19, 23, 8, 'Rise Vision Revolutionizes Digital Signage with Rise Vision Media Player Hardware as a Services', '1695281790_risevision1.jpeg', '&lt;p&gt;School districts across North America are facing severe staff shortages at a time when school IT teams are managing exponentially more devices with the rapid increase of classroom technology and 1:1 programs. Managing and maintaining digital signage hardware is another task that doesn&rsquo;t need to be on the priority list for school technology teams.&lt;/p&gt;&lt;p&gt;Rise Vision set out to alleviate that burden with the Rise Vision Media Player Hardware as a Service. Schools can eliminate managing digital signage hardware from their to-do list with this solution. Rise Vision manages the media player software, provides technical support, sends out advanced replacements if an issue can&rsquo;t be fixed over the phone, and upgrades the devices regularly. The Rise Vision Media Player takes minutes to set up, is optimized for Rise Vision digital signage, and is a locked-down single-purpose device that diminishes the risk of unauthorized network access.&lt;/p&gt;&lt;p&gt;This solution provides districts with one software, hardware, and support vendor, simplifying digital signage procurement. The subscription model gives school administrators predictable costs, making annual budgeting easy and allowing them to scale the service up or down as their needs change.&lt;/p&gt;&lt;p&gt;With the Rise Vision Media Player Hardware as a Service, schools can streamline their digital signage experience, reduce hardware costs, and consolidate procurement. Rise Vision handles all the complexities, allowing schools to concentrate on their message and objectives.&lt;/p&gt;&lt;p&gt;The Rise Vision Media Player Hardware as a Service is an example of Rise Vision&rsquo;s continued commitment to providing schools with solutions that save time and enable districts to focus their efforts on what matters: improving communication and safety, celebrating student achievements, and creating a positive school culture.&lt;/p&gt;&lt;p&gt;&ldquo;Rise Vision&rsquo;s Media Player Hardware as a Service empowers schools to shift their focus from hardware management to achieving their digital signage communication goals. With our solution, schools can streamline their processes, reduce costs, and concentrate on creating meaningful messages that enhance their educational environment.&rdquo; &ndash; Brian Loosbrock, CEO of Rise Vision&lt;/p&gt;', 1, '2023-09-21 13:06:30');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`) VALUES
(2, 'Life', '<p>test change</p>'),
(3, 'Quotes', ''),
(4, 'Fiction', ''),
(5, 'Biography', ''),
(6, ' Motivation', ''),
(7, 'Inspiration', ''),
(8, 'Technology', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `verified` tinyint(4) NOT NULL DEFAULT 0,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `token` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `admin`, `verified`, `username`, `email`, `password`, `created_at`, `token`) VALUES
(24, 0, 0, 'thatwildtjjhhought', 'mk@w', '$2y$10$HQA7EHIthVa2yadfWVScq.fDPbOIP/Z/m66eCzfJ73VchF200CfNm', '2023-09-21 08:24:22', ''),
(25, 0, 1, 'thatwildthought', 'kamatsparsh@gmail.com', '$2y$10$ForE4PLbE1Gd3DxOcyQpwOm8WdmuKABHazxWbUx0Z6QC/iT2gZREi', '2023-09-21 10:39:27', '106a7289551b9e9aede6d4e03157db09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
