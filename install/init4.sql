-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 18, 2016 at 12:34 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `data_account`
--

CREATE TABLE IF NOT EXISTS `data_account` (
  `ac_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dev` enum('pc','mobile') NOT NULL,
  `ch_id` int(11) NOT NULL,
  `ac_val` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`ac_id`),
  UNIQUE KEY `dev` (`dev`,`ch_id`,`ac_val`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `data_channel`
--

CREATE TABLE IF NOT EXISTS `data_channel` (
  `ch_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ch_val` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`ch_id`),
  UNIQUE KEY `ch_val` (`ch_val`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `data_channel`
--

INSERT INTO `data_channel` (`ch_id`, `ch_val`) VALUES
(1, '百度');

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
  `paysum` float DEFAULT NULL COMMENT '消费',
  `shows` int(10) unsigned DEFAULT NULL COMMENT '展现',
  `clks` float DEFAULT NULL COMMENT '点击率',
  `avgprice` float DEFAULT NULL COMMENT '平均点击价格',
  `chat` int(10) unsigned DEFAULT NULL COMMENT '对话',
  `subscribe` int(10) unsigned DEFAULT NULL COMMENT '预约',
  `rcvpayment` float DEFAULT NULL COMMENT '到院',
  `id_code` varchar(32) DEFAULT NULL COMMENT '唯一识别码',
  `datetime` datetime DEFAULT NULL COMMENT '时间',
  PRIMARY KEY (`id_id`),
  UNIQUE KEY `id_code` (`id_code`),
  UNIQUE KEY `un_id` (`un_id`,`title`,`desc1`,`desc2`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `data_unit`
--

CREATE TABLE IF NOT EXISTS `data_unit` (
  `un_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pl_id` int(11) NOT NULL,
  `un_val` varchar(128) NOT NULL,
  PRIMARY KEY (`un_id`),
  UNIQUE KEY `pl_id` (`pl_id`,`un_val`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `log_upload_token`
--

CREATE TABLE IF NOT EXISTS `log_upload_token` (
  `token` varchar(32) NOT NULL COMMENT 'md5(fn+time)',
  `ch` varchar(16) NOT NULL,
  `dev` varchar(16) NOT NULL,
  `name` varchar(1024) NOT NULL,
  `cnt` int(11) NOT NULL,
  UNIQUE KEY `token` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prvt_data`
--

CREATE TABLE IF NOT EXISTS `prvt_data` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(64) NOT NULL,
  `chat` int(11) NOT NULL,
  `subscribe` int(11) NOT NULL,
  `rcvpayment` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
