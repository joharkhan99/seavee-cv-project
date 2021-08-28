-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 22, 2021 at 07:48 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seavi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

DROP TABLE IF EXISTS `about`;
CREATE TABLE IF NOT EXISTS `about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userkey` varchar(255) NOT NULL,
  `short_desc` text NOT NULL,
  `long_desc` text NOT NULL,
  `status` varchar(3) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `userkey`, `short_desc`, `long_desc`, `status`) VALUES
(1, '03549f7b0fd26b04532644247a224b31', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse hic expedita sequi necessitatibus quasi, praesentium officiis veniam quo possimus corporis eaque in? Repellat. veniam quo possimus', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse hic expedita sequi necessitatibus quasi, praesentium officiis veniam quo possimus corporis eaque in? Repellat. veniam quo possimus corporis eaque in\r\nLorem ipsum, dolor sit amet consectetur adipisicing elit. Esse hic expedita sequi necessitatibus quasi, praesentium officiis veniam quo possimus corporis eaque in? Repellat. veniam quo possimus corporis eaq\r\n\r\nLorem ipsum, dolor sit amet consectetur adipisicing elit. Esse hic expedita sequi necessitatibus quasi, praesentium officiis veniam quo possimus corporis eaque in? Repellat. veniam quo possimus corporis eaque in\r\n\r\nLorem ipsum, dolor sit amet consectetur adipisicing elit. Esse hic expedita sequi necessitatibus quasi, praesentium officiis veniam quo possimus corporis eaque in? Repellat. veniam quo possimus corporis eaque in', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `cvs`
--

DROP TABLE IF EXISTS `cvs`;
CREATE TABLE IF NOT EXISTS `cvs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userkey` varchar(255) DEFAULT NULL,
  `cv` text,
  `status` varchar(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userkey` (`userkey`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cvs`
--

INSERT INTO `cvs` (`id`, `userkey`, `cv`, `status`) VALUES
(7, '03549f7b0fd26b04532644247a224b31', '611dcd711f3f73. Software Verification and Validation.pdf', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `education_info`
--

DROP TABLE IF EXISTS `education_info`;
CREATE TABLE IF NOT EXISTS `education_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userkey` varchar(255) DEFAULT NULL,
  `degree` varchar(50) DEFAULT NULL,
  `field_of_study` text,
  `institute` text,
  `from_date` date DEFAULT NULL,
  `to_date` text,
  `cert` text,
  `status` varchar(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userkey` (`userkey`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education_info`
--

INSERT INTO `education_info` (`id`, `userkey`, `degree`, `field_of_study`, `institute`, `from_date`, `to_date`, `cert`, `status`) VALUES
(10, '03549f7b0fd26b04532644247a224b31', 'short_course', 'Science', 'IIT', '2021-08-02', '2021-06-28', '611de0fc065d4ajax-loader.gif', 'yes'),
(11, '03549f7b0fd26b04532644247a224b31', 'phd', 'software', 'CIIT', '2025-08-02', '2030-06-28', '611de0de034dfA2 Lab.pdf', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `employee_info`
--

DROP TABLE IF EXISTS `employee_info`;
CREATE TABLE IF NOT EXISTS `employee_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employerkey` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `company` text NOT NULL,
  `city` text NOT NULL,
  `country` text NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `emp_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(3) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_info`
--

INSERT INTO `employee_info` (`id`, `employerkey`, `image`, `company`, `city`, `country`, `contact_no`, `emp_created_at`, `status`) VALUES
(1, '8214335251ab19abfdda6779121f6e50', '../../profiles/611e67cee188dbachakhan.jpg', 'Mercedez Benz', 'Chicago', 'UK', '+1 232 24423 34', '2021-08-19 10:58:47', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

DROP TABLE IF EXISTS `favorites`;
CREATE TABLE IF NOT EXISTS `favorites` (
  `fav_id` int(11) NOT NULL AUTO_INCREMENT,
  `candidatekey` varchar(255) NOT NULL,
  `employerkey` varchar(255) NOT NULL,
  PRIMARY KEY (`fav_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`fav_id`, `candidatekey`, `employerkey`) VALUES
(6, '03549f7b0fd26b04532644247a224b31', '8214335251ab19abfdda6779121f6e50');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `incoming_msg_id` varchar(255) NOT NULL,
  `outgoing_msg_id` varchar(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(1, '03549f7b0fd26b04532644247a224b31', '8214335251ab19abfdda6779121f6e50', 'hi fella');

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

DROP TABLE IF EXISTS `personal_info`;
CREATE TABLE IF NOT EXISTS `personal_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userkey` varchar(255) DEFAULT NULL,
  `image` text,
  `gender` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `contact_no` varchar(100) DEFAULT NULL,
  `status` varchar(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userkey` (`userkey`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_info`
--

INSERT INTO `personal_info` (`id`, `userkey`, `image`, `gender`, `dob`, `city`, `country`, `contact_no`, `status`) VALUES
(7, '03549f7b0fd26b04532644247a224b31', '../../profiles/611c99e6bf9641108509.jpg', 'Male', '2001-08-10', 'Islamabad', 'Pakistan', '+928385245', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `profession_info`
--

DROP TABLE IF EXISTS `profession_info`;
CREATE TABLE IF NOT EXISTS `profession_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userkey` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `experience` varchar(20) DEFAULT NULL,
  `salary_range` varchar(50) DEFAULT NULL,
  `languages` text,
  `status` varchar(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userkey` (`userkey`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profession_info`
--

INSERT INTO `profession_info` (`id`, `userkey`, `category`, `experience`, `salary_range`, `languages`, `status`) VALUES
(1, '03549f7b0fd26b04532644247a224b31', 'web_dev', '5', '$100 - $1000', 'urdu,english,', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userkey` varchar(255) NOT NULL,
  `employerkey` varchar(255) NOT NULL,
  `rating` int(20) NOT NULL DEFAULT '1',
  `text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `userkey`, `employerkey`, `rating`, `text`, `created_at`) VALUES
(1, '03549f7b0fd26b04532644247a224b31', '8214335251ab19abfdda6779121f6e50', 3, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam officia totam omnis, aperiam fugiat quis, ipsum assumenda reprehenderit neque dicta eum sunt tempora in magni adipisci.', '2021-06-03 11:15:07'),
(2, '03549f7b0fd26b04532644247a224b31', '8214335251ab19abfdda6779121f6e50', 2, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam officia totam omnis, aperiam fugiat quis, ipsum assumenda reprehenderit neque dicta eum sunt tempora in magni adipisci. sunt tempora in magni adipisci. sunt tempora.\r\n', '2021-08-19 05:25:42'),
(3, 'uii8789789987', '7ioyuiy876876876', 3, 'dfgdf\r\ndf\r\ng\r\ndg\r\nfg\r\ngjfgfjghjgfjgfjghjgh\r\nj\r\nghj\r\ngh\r\njgh\r\nj', '2021-08-21 11:02:17'),
(5, '03549f7b0fd26b04532644247a224b31', '8214335251ab19abfdda6779121f6e50', 5, 'asd asd a sd as d as d as d asd\r\nasd\r\nasd\r\nasd\r\nas\r\ndas\r\nd', '2021-08-21 11:40:09');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userkey` varchar(255) DEFAULT NULL,
  `skills` text,
  `status` varchar(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userkey` (`userkey`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `userkey`, `skills`, `status`) VALUES
(1, '03549f7b0fd26b04532644247a224b31', 'c++,cv,python,AI,', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `social_info`
--

DROP TABLE IF EXISTS `social_info`;
CREATE TABLE IF NOT EXISTS `social_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userkey` varchar(255) DEFAULT NULL,
  `linkedin` text,
  `twitter` text,
  `facebook` text,
  `insta` text,
  `git` text,
  `dribble` text,
  `behance` text,
  `status` varchar(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userkey` (`userkey`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_info`
--

INSERT INTO `social_info` (`id`, `userkey`, `linkedin`, `twitter`, `facebook`, `insta`, `git`, `dribble`, `behance`, `status`) VALUES
(1, '03549f7b0fd26b04532644247a224b31', 'https://www.linkedin.com/home/?originalSubdomain=pk', '', 'facebook.com', 'instagram.com', '', 'dribble.com', '', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `profile_status` varchar(20) NOT NULL,
  `user_created_at` timestamp NOT NULL,
  `userkey` varchar(255) NOT NULL,
  `message_status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `profile_status`, `user_created_at`, `userkey`, `message_status`) VALUES
(4, 'Mark jhon', 'employer@gmail.com', '$2y$12$e7IU741mAhJUmKf3bfQHm.bduu.CGOZHTIjEpimX.hpfQYbp3HEkC', 'employer', 'incomplete', '2021-08-19 05:00:50', '8214335251ab19abfdda6779121f6e50', 'online'),
(3, 'johar ha', 'johar', '$2y$12$u9feUQqb6PQAI8gxUe3VROftzFL6Ykkx6BYV.1dFxOh3XBr7e0QHC', 'candidate', 'incomplete', '2021-07-01 04:08:40', '03549f7b0fd26b04532644247a224b31', 'online');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
