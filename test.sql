-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 21, 2013 at 03:00 
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `reminder`
--

CREATE TABLE IF NOT EXISTS `reminder` (
  `reminder_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(60) NOT NULL,
  `text` varchar(300) NOT NULL,
  `scheduled` datetime NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`reminder_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `reminder`
--

INSERT INTO `reminder` (`reminder_id`, `subject`, `text`, `scheduled`, `timestamp`, `user_id`) VALUES
(2, 'Got me', 'You got my message', '2013-04-22 00:00:00', '2013-04-21 02:18:06', 1),
(3, 'new message', 'Wir dich einmal betrugen hat dem traue dein lebtag nicht vieder', '0000-00-00 00:00:00', '2013-04-21 02:35:35', 0),
(4, 'Messsaj', 'Test', '0000-00-00 00:00:00', '2013-04-21 02:49:18', 0),
(5, 'Messsaj', 'Test', '0000-00-00 00:00:00', '2013-04-21 02:50:30', 0),
(6, 'Subject', 'Some Text', '0000-00-00 00:00:00', '2013-04-21 02:50:50', 0),
(7, 'Message me', 'Hello', '2013-04-23 00:00:00', '2013-04-21 02:51:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(32) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `location` varchar(60) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `timestamp`, `username`, `password`, `location`) VALUES
(1, 'Cumpanasu Florin', '2013-04-21 00:57:22', 'flo', '7e1e91156f7c4e1bd0831cf008ad5fdf', ''),
(2, 'Luiza Balasa', '2013-04-21 00:57:22', 'lui', '55681f25f2b5ce8a670140d1dff04da5', ''),
(4, 'alb', '2013-04-21 02:11:39', 'alb', '73717aafac1e7701dab0fa02b8936926', 'Cluj');
