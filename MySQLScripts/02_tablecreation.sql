-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 21, 2013 at 03:44 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `cosmicsays`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `catID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) NOT NULL,
  PRIMARY KEY (`catID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category_fact`
--

DROP TABLE IF EXISTS `category_fact`;
CREATE TABLE `category_fact` (
  `catID` int(11) NOT NULL,
  `factID` int(11) NOT NULL,
  KEY `catID` (`catID`),
  KEY `factID` (`factID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fact`
--

DROP TABLE IF EXISTS `fact`;
CREATE TABLE `fact` (
  `factID` int(11) NOT NULL AUTO_INCREMENT,
  `Fact` varchar(50) NOT NULL,
  PRIMARY KEY (`factID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE `image` (
  `imgID` int(11) NOT NULL AUTO_INCREMENT,
  `FileName` varchar(50) NOT NULL,
  `Title` varchar(20) DEFAULT NULL,
  `NumberOfViews` int(50) NOT NULL,
  `UploadDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`imgID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `image_category`
--

DROP TABLE IF EXISTS `image_category`;
CREATE TABLE `image_category` (
  `imgID` int(11) NOT NULL,
  `catID` int(11) NOT NULL,
  KEY `imgID` (`imgID`),
  KEY `catID` (`catID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meme`
--

DROP TABLE IF EXISTS `meme`;
CREATE TABLE `meme` (
  `memeID` int(11) NOT NULL AUTO_INCREMENT,
  `Titile` varchar(20) DEFAULT NULL,
  `FileName` varchar(20) NOT NULL,
  `Text` varchar(50) NOT NULL,
  `NumberOfViews` int(11) NOT NULL,
  `UploadDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`memeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `meme_category`
--

DROP TABLE IF EXISTS `meme_category`;
CREATE TABLE `meme_category` (
  `memeID` int(11) NOT NULL,
  `catID` int(11) NOT NULL,
  KEY `memeID` (`memeID`),
  KEY `catID` (`catID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE `video` (
  `vidID` int(11) NOT NULL AUTO_INCREMENT,
  `Link` varchar(50) NOT NULL,
  `NumberOfViews` int(11) NOT NULL,
  `UploadDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Title` varchar(20) NOT NULL,
  PRIMARY KEY (`vidID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `video_category`
--

DROP TABLE IF EXISTS `video_category`;
CREATE TABLE `video_category` (
  `vidID` int(11) NOT NULL,
  `catID` int(11) NOT NULL,
  KEY `vidID` (`vidID`),
  KEY `catID` (`catID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_fact`
--
ALTER TABLE `category_fact`
  ADD CONSTRAINT `category_fact_ibfk_1` FOREIGN KEY (`catID`) REFERENCES `category` (`catID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `category_fact_ibfk_2` FOREIGN KEY (`factID`) REFERENCES `fact` (`factID`) ON UPDATE CASCADE;

--
-- Constraints for table `image_category`
--
ALTER TABLE `image_category`
  ADD CONSTRAINT `image_category_ibfk_2` FOREIGN KEY (`catID`) REFERENCES `category` (`catID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `image_category_ibfk_1` FOREIGN KEY (`imgID`) REFERENCES `image` (`imgID`) ON UPDATE CASCADE;

--
-- Constraints for table `meme_category`
--
ALTER TABLE `meme_category`
  ADD CONSTRAINT `meme_category_ibfk_2` FOREIGN KEY (`catID`) REFERENCES `category` (`catID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `meme_category_ibfk_1` FOREIGN KEY (`memeID`) REFERENCES `meme` (`memeID`) ON UPDATE CASCADE;

--
-- Constraints for table `video_category`
--
ALTER TABLE `video_category`
  ADD CONSTRAINT `video_category_ibfk_2` FOREIGN KEY (`catID`) REFERENCES `category` (`catID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `video_category_ibfk_1` FOREIGN KEY (`vidID`) REFERENCES `video` (`vidID`) ON UPDATE CASCADE;
