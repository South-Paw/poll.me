-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 18, 2016 at 12:07 AM
-- Server version: 5.1.73
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `pollme`
--

-- --------------------------------------------------------

--
-- Table structure for table `Polls`
--

CREATE TABLE IF NOT EXISTS `Polls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(512) NOT NULL,
  `question` varchar(512) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Polls`
--

INSERT INTO `Polls` (`id`, `title`, `question`) VALUES
(1, 'Best PC game of 2016', 'What PC game do you think is or will be the best of 2016?'),
(2, 'Least favourite vegetable', 'What is your least favourite vegetable?'),
(3, 'Preferred programming language', 'What is your preferred programming language?');

-- --------------------------------------------------------

--
-- Table structure for table `PollsAnswers`
--

CREATE TABLE IF NOT EXISTS `PollsAnswers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pollid` int(11) NOT NULL,
  `answerid` int(11) NOT NULL,
  `answer` varchar(512) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `PollsAnswers`
--

INSERT INTO `PollsAnswers` (`id`, `pollid`, `answerid`, `answer`) VALUES
(1, 1, 1, 'Doom'),
(2, 1, 2, 'Overwatch'),
(3, 1, 3, 'No Mans Sky'),
(4, 1, 4, 'Dark Souls 3'),
(5, 1, 5, 'The Division'),
(6, 1, 6, 'Total War: Warhammer'),
(7, 1, 7, 'XCOM 2'),
(8, 1, 8, 'Homefront: The Revolution'),
(9, 1, 9, 'Stardew Valley'),
(10, 1, 10, 'Firewatch'),
(11, 2, 1, 'Cabbage'),
(12, 2, 2, 'Brussels sprout'),
(13, 2, 3, 'Lettuce'),
(14, 2, 4, 'Kale'),
(15, 2, 5, 'Bok choy'),
(16, 2, 6, 'None of the above'),
(17, 3, 1, 'Python'),
(18, 3, 2, 'Java'),
(19, 3, 3, 'C'),
(20, 3, 4, 'C#'),
(21, 3, 5, 'C++'),
(22, 3, 6, 'PHP'),
(23, 3, 7, 'Javascript'),
(24, 3, 8, 'Not listed');

-- --------------------------------------------------------

--
-- Table structure for table `PollsVotes`
--

CREATE TABLE IF NOT EXISTS `PollsVotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(256) NOT NULL,
  `pollid` int(11) NOT NULL,
  `answerid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=70 ;
