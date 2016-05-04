-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 04, 2016 at 04:55 PM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shbdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `abc`
--

CREATE TABLE IF NOT EXISTS `abc` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `a` varchar(10) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `acb`
--

CREATE TABLE IF NOT EXISTS `acb` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `q` varchar(16) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `aii`
--

CREATE TABLE IF NOT EXISTS `aii` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `u` int(11) NOT NULL,
  `m` int(11) NOT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `u` (`u`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `attr_disease`
--

CREATE TABLE IF NOT EXISTS `attr_disease` (
  `dis_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ac_id` int(10) unsigned DEFAULT NULL,
  `dis_val` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`dis_id`),
  UNIQUE KEY `ch_id` (`ac_id`,`dis_val`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `data_account`
--

CREATE TABLE IF NOT EXISTS `data_account` (
  `ac_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ch_id` int(11) NOT NULL,
  `ac_val` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`ac_id`),
  UNIQUE KEY `dev` (`ch_id`,`ac_val`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `data_channel`
--

CREATE TABLE IF NOT EXISTS `data_channel` (
  `ch_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ch_val` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`ch_id`),
  UNIQUE KEY `ch_val` (`ch_val`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `data_idea`
--

CREATE TABLE IF NOT EXISTS `data_idea` (
  `id_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `un_id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL COMMENT '50个字符',
  `desc1` varchar(80) DEFAULT NULL COMMENT '创意描述1(80个字符)',
  `desc2` varchar(80) DEFAULT NULL COMMENT '创意描述2(80个字符)',
  `url` varchar(36) DEFAULT NULL COMMENT '显示URL(36个字符)',
  `id_code_pc` varchar(64) DEFAULT NULL COMMENT '唯一识别码',
  `id_code_m` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id_id`),
  UNIQUE KEY `un_id` (`un_id`,`title`,`desc1`,`desc2`),
  UNIQUE KEY `code` (`id_code_pc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `data_plan`
--

CREATE TABLE IF NOT EXISTS `data_plan` (
  `pl_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ac_id` int(11) DEFAULT NULL,
  `pl_val` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`pl_id`),
  UNIQUE KEY `dis_id` (`ac_id`,`pl_val`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `data_unit`
--

CREATE TABLE IF NOT EXISTS `data_unit` (
  `un_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pl_id` int(11) NOT NULL,
  `un_val` varchar(128) NOT NULL,
  `un_code_pc` varchar(64) DEFAULT NULL,
  `un_code_m` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`un_id`),
  UNIQUE KEY `pl_id` (`pl_id`,`un_val`),
  UNIQUE KEY `un_code` (`un_code_pc`),
  UNIQUE KEY `un_code_m` (`un_code_m`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `log_load_token`
--

CREATE TABLE IF NOT EXISTS `log_load_token` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `token` char(32) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `log_upload_token`
--

CREATE TABLE IF NOT EXISTS `log_upload_token` (
  `token` char(32) NOT NULL COMMENT 'md5(fn+time)',
  `cls` varchar(32) NOT NULL COMMENT '识别的类名',
  `name` varchar(1024) NOT NULL,
  `cnt` int(11) NOT NULL,
  UNIQUE KEY `token` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prvt_data`
--

CREATE TABLE IF NOT EXISTS `prvt_data` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(64) NOT NULL,
  `chat` int(11) unsigned NOT NULL,
  `subscribe` int(11) unsigned NOT NULL,
  `rcvpayment` float NOT NULL,
  `link` varchar(128) NOT NULL,
  `kw` varchar(128) NOT NULL,
  `mark` text NOT NULL,
  `date` date NOT NULL,
  `hour` int(11) NOT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `one` (`code`,`date`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `publ_data`
--

CREATE TABLE IF NOT EXISTS `publ_data` (
  `pu_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_id` int(10) unsigned NOT NULL,
  `paysum` float NOT NULL COMMENT '消费',
  `shows` int(10) unsigned NOT NULL COMMENT '展现',
  `clks` int(10) unsigned NOT NULL COMMENT '点击',
  `dev` enum('pc','m') NOT NULL,
  `date` date NOT NULL,
  `hour` int(11) NOT NULL,
  PRIMARY KEY (`pu_id`),
  UNIQUE KEY `uniq` (`id_id`,`dev`,`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
