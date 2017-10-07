-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2017 at 02:52 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_me`
--

CREATE TABLE `about_me` (
  `id` int(2) NOT NULL,
  `about_me` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `tag_one` varchar(255) NOT NULL,
  `tag_two` varchar(255) NOT NULL,
  `tag_three` varchar(255) NOT NULL,
  `tag_four` varchar(255) NOT NULL,
  `tag_five` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about_me`
--

INSERT INTO `about_me` (`id`, `about_me`, `title`, `content`, `tag_one`, `tag_two`, `tag_three`, `tag_four`, `tag_five`, `status`) VALUES
(1, 'about me										', 'Title', 'some Content here																									', 'One one', 'Two Two ', 'Three Three', 'Four', 'Five', 1),
(9, 'about me sdfsdf															', 'rtgd', 'sdf																									', '', 'sdf', 'dfgdshfgjfjhf', 'dsfs', 'sdfghdsfg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `id` int(2) NOT NULL,
  `cell_no` varchar(15) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `skype_address` varchar(25) NOT NULL,
  `web_address` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`id`, `cell_no`, `email_address`, `skype_address`, `web_address`, `address`, `status`) VALUES
(2, '01687835849', 'adeptsaiful@gmail.com', 'skype_address', 'www.saiful.com', '<p>Vill: Shinjour, P.O: Sholla, P.S: Nawabgonj, Dis: Dhaka -1320</p>\r\n', 1),
(6, '01687835849', 'adeptsaiful@gmail.com', 'mdsaifulcse', 'www.saiful.com', '<p>Vill: Shinjour, P.O: Sholla, P.S: Nawabgonj, Dis: Dhaka -1320</p>\r\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(40) CHARACTER SET utf8 NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `message`) VALUES
(1, 'Md. Saiful Islam', 'adeptsaiful@gmail.com', 'Outstanding Performance'),
(2, 'Md. Jahidul\'s Islam', 'jahidul@gmail.com', 'Sothing like That'),
(3, 'Sakib All Hasan', 'sakib@gmail.com', 'I Love Cricket and You ?'),
(4, 'Sakib All Hasan', 'sakib@gmail.com', 'I Love Cricket and You ?');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(2) NOT NULL,
  `skill_image` varchar(70) CHARACTER SET utf8 NOT NULL,
  `skill_title` varchar(120) CHARACTER SET utf8 NOT NULL,
  `skill_content` text CHARACTER SET utf8 NOT NULL,
  `skill_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill_image`, `skill_title`, `skill_content`, `skill_status`) VALUES
(1, 'img/10-2-web-development-png-image.png', 'PHP Programming', 'I love php Programming to developed web apps', 1),
(2, 'img/ios_logo1600.png', 'ISO PLATFORM', 'I am good at in Web Design', 1),
(3, 'img/tablet_PNG8586.png', 'Responsive Design s', 'Responsive Design web site good looking all difference Pixel Devices.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `testimonial_title` varchar(50) CHARACTER SET utf32 NOT NULL,
  `testimonial_content` text CHARACTER SET utf8 NOT NULL,
  `testimonial_image` varchar(50) CHARACTER SET utf8 NOT NULL,
  `testimonial_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `testimonial_title`, `testimonial_content`, `testimonial_image`, `testimonial_status`) VALUES
(2, 'Bangaldesh update', 'Some Content Here 2 ', 'img/saiful.jpg', 1),
(5, 'cook studies songs', 'Coke Studio Season 10: Here are the all latest updates on Coke Studio Pakistan Season 10 and other seasons of Coke Studio\'s. The songs are performed by a ...', 'img/07.png', 1),
(6, 'Bangladesh Cricket ', 'Champion Trophy', 'img/ICC_Champions_Trophy_cricket_logo.png', 1),
(8, 'New Testimonial 100', 'Coke Studio Season 10: Here are the all latest updates on Coke Studio Pakistan Season 10 and other seasons of Coke Studio\'s. The songs are performed by a ...', 'img/logo.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(2) NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`) VALUES
(1, 'Md.Saiful Islam', 'saiful@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_me`
--
ALTER TABLE `about_me`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
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
-- AUTO_INCREMENT for table `about_me`
--
ALTER TABLE `about_me`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
