-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 10, 2017 at 07:37 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `csm`
--
CREATE DATABASE IF NOT EXISTS `csm` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `csm`;

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE IF NOT EXISTS `attribute` (
  `TAG_ID` int(11) NOT NULL,
  `ATTR_ID` int(11) NOT NULL,
  `ATTR` varchar(25) NOT NULL,
  `DEFAULT_VALUE` varchar(20) NOT NULL,
  `INPUT_TYPE` varchar(100) NOT NULL,
  PRIMARY KEY (`TAG_ID`,`ATTR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`TAG_ID`, `ATTR_ID`, `ATTR`, `DEFAULT_VALUE`, `INPUT_TYPE`) VALUES
(1, 1, 'border', '1px solid black', 'TEXT'),
(1, 2, 'border-collapse', 'collapse', 'TEXT'),
(1, 3, 'width', '100%', 'TEXT'),
(1, 4, 'height', '100%', 'TEXT'),
(1, 5, 'text-align', 'left', 'TEXT'),
(1, 6, 'vertical-align', 'bottom', 'TEXT'),
(1, 7, 'padding', '5px', 'TEXT'),
(1, 8, 'color', 'black', 'color'),
(1, 9, 'background-color', 'white', 'color'),
(1, 10, 'border-spacing', '10px 50px', 'TEXT'),
(1, 11, 'caption-side', 'bottom', 'TEXT'),
(1, 12, 'empty-cells', 'hide', 'TEXT'),
(2, 1, 'background-attachment', 'fixed', 'TEXT'),
(2, 2, 'background-color', 'white', 'color'),
(2, 3, 'background-image', 'src', 'TEXT'),
(2, 4, 'background-repeat', 'repeat', 'TEXT'),
(2, 5, 'visibility', 'visible', 'TEXT'),
(2, 6, 'overflow', 'sroll', 'TEXT'),
(2, 7, 'height', '50%', 'TEXT'),
(2, 8, 'width', '50%', 'TEXT'),
(2, 9, 'font-family', 'Arial', 'TEXT'),
(2, 10, 'font-weight', 'bold', 'TEXT'),
(2, 11, 'font-style', 'Italic', 'TEXT'),
(3, 1, 'background-color', '#00BFFF', 'color'),
(3, 2, 'border', '3px solid gray', 'TEXT'),
(3, 3, 'color', 'white', 'color'),
(3, 4, 'padding', '15px 32px', 'TEXT'),
(3, 5, 'text-align', 'center', 'TEXT'),
(3, 6, 'text-decoration', 'none', 'TEXT'),
(3, 7, 'display', 'inline-block', 'TEXT'),
(3, 8, 'font-size', '16px', 'TEXT'),
(3, 9, 'border-radius', '2px', 'TEXT'),
(3, 10, 'width', '250px', 'TEXT'),
(3, 11, 'float', 'left', 'TEXT'),
(4, 1, 'list-style-type', 'circle', 'TEXT'),
(4, 2, 'list-style-image', 'url(''sqpurple.gif'')', 'TEXT'),
(4, 3, 'list-style-position', 'inside', 'TEXT'),
(4, 4, 'background', '#ff9999', 'color'),
(4, 5, 'padding', '20px', 'TEXT'),
(5, 1, 'background', '##cce5ff', 'color'),
(5, 2, 'padding', '5px', 'TEXT'),
(5, 3, 'margin', '5px', 'TEXT'),
(5, 4, 'margin-left', '35px', 'TEXT'),
(5, 5, 'margin-right', '15px', 'TEXT'),
(6, 1, 'list-style-type', 'upper-roman', 'TEXT'),
(6, 2, 'background', '#ff9999', 'color'),
(6, 3, 'padding', '20px', 'TEXT');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_value`
--

CREATE TABLE IF NOT EXISTS `attribute_value` (
  `ATTR_ID` int(11) NOT NULL,
  `VALUE` varchar(25) NOT NULL,
  PRIMARY KEY (`ATTR_ID`,`VALUE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class_attributes`
--

CREATE TABLE IF NOT EXISTS `class_attributes` (
  `attribute_type_id` int(11) NOT NULL,
  `attribute_type_name` varchar(20) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `attribute_name` varchar(20) NOT NULL,
  `attribute_default_value` varchar(50) NOT NULL,
  PRIMARY KEY (`attribute_type_id`,`attribute_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_attributes`
--

INSERT INTO `class_attributes` (`attribute_type_id`, `attribute_type_name`, `attribute_id`, `attribute_name`, `attribute_default_value`) VALUES
(1, 'font', 1, 'color', 'red'),
(1, 'font', 2, 'size', '12'),
(1, 'font', 3, 'family', 'arial'),
(1, 'font', 4, 'weight', 'bold'),
(1, 'font', 5, 'style', 'italic'),
(1, 'font', 6, 'variant', 'normal'),
(2, 'background', 1, 'attachment', 'fixed'),
(2, 'background', 2, 'color', 'white'),
(2, 'background', 3, 'repeat', 'repeat'),
(2, 'background', 4, 'image', 'src'),
(3, 'text', 1, 'align', 'center'),
(3, 'text', 2, 'decoration', 'none'),
(3, 'text', 3, 'transform', 'lowercase'),
(3, 'text', 4, 'indent', '50px'),
(4, 'list-style', 1, 'type', 'circle'),
(4, 'list-style', 2, 'image', 'src'),
(4, 'list-style', 3, 'position', 'inside');

-- --------------------------------------------------------

--
-- Table structure for table `effects`
--

CREATE TABLE IF NOT EXISTS `effects` (
  `effect_category_id` int(11) NOT NULL,
  `effect_id` int(11) NOT NULL,
  `effect_name` varchar(20) NOT NULL,
  PRIMARY KEY (`effect_category_id`,`effect_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `effects`
--

INSERT INTO `effects` (`effect_category_id`, `effect_id`, `effect_name`) VALUES
(1, 1, 'Grid Loader'),
(1, 2, 'Spinner Loader'),
(1, 3, 'typing loader'),
(2, 1, 'Elegant Shadow'),
(2, 2, 'Deep Shadow');

-- --------------------------------------------------------

--
-- Table structure for table `effect_category`
--

CREATE TABLE IF NOT EXISTS `effect_category` (
  `effect_category_id` int(11) NOT NULL,
  `effect_category_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `effect_category`
--

INSERT INTO `effect_category` (`effect_category_id`, `effect_category_name`) VALUES
(1, 'loader'),
(2, 'text Shadow');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `TAG_ID` int(11) NOT NULL,
  `TAG` varchar(15) NOT NULL,
  PRIMARY KEY (`TAG_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`TAG_ID`, `TAG`) VALUES
(1, 'table'),
(2, 'div'),
(3, 'button'),
(4, 'ul'),
(5, 'li'),
(6, 'ol');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `First_Name` varchar(15) NOT NULL,
  `Last_Name` varchar(15) NOT NULL,
  `User_Name` varchar(30) NOT NULL DEFAULT '',
  `Password` varchar(15) NOT NULL,
  PRIMARY KEY (`User_Name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`First_Name`, `Last_Name`, `User_Name`, `Password`) VALUES
('', '', '', ''),
('a', 'g', 'ag@gmail.com', '2345'),
('example', 'example', 'example', '1234'),
('abhay', 'garg', 'gargabhay', '1234'),
('shakti', 'rajput', 'rajputshakti', '4565'),
('umang', 'shah', 'shahumang', '6300'),
('Shivam', 'S', 'Sshivam1999', '12345678');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute`
--
ALTER TABLE `attribute`
  ADD CONSTRAINT `fk_tag_id` FOREIGN KEY (`TAG_ID`) REFERENCES `tags` (`TAG_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
