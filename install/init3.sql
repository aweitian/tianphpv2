-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2016 at 12:17 AM
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
-- Table structure for table `data_idea_bd_mb`
--

CREATE TABLE IF NOT EXISTS `data_idea_bd_mb` (
  `id_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account` varchar(30) NOT NULL,
  `plan` varchar(30) NOT NULL,
  `unit` varchar(30) NOT NULL,
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
  `unit_code` varchar(32) DEFAULT NULL COMMENT '唯一识别码',
  `idea_code` varchar(32) NOT NULL,
  `at_code` int(11) NOT NULL DEFAULT '0',
  `datetime` datetime DEFAULT NULL COMMENT '时间',
  PRIMARY KEY (`id_id`),
  UNIQUE KEY `id_code` (`unit_code`),
  KEY `account` (`account`),
  KEY `plan` (`plan`),
  KEY `unit` (`unit`),
  KEY `ac_at_index` (`account`,`at_code`),
  KEY `pl_at_index` (`plan`,`at_code`),
  KEY `un_at_index` (`unit`,`at_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `data_idea_bd_pc`
--

CREATE TABLE IF NOT EXISTS `data_idea_bd_pc` (
  `id_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `chananel` varchar(30) NOT NULL,
  `account` varchar(30) NOT NULL,
  `plan` varchar(30) NOT NULL,
  `unit` varchar(30) NOT NULL,
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
  `at_code` int(11) NOT NULL DEFAULT '0',
  `datetime` datetime DEFAULT NULL COMMENT '时间',
  PRIMARY KEY (`id_id`),
  UNIQUE KEY `id_code` (`id_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `data_private_bd`
--

CREATE TABLE IF NOT EXISTS `data_private_bd` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(64) NOT NULL,
  `chat` int(11) NOT NULL,
  `subscribe` int(11) NOT NULL,
  `rcvpayment` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sid`)
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;