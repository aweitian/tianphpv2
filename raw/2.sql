/*
SQLyog Ultimate v11.24 (32 bit)
MySQL - 5.5.49-0ubuntu0.14.04.1 : Database - tianv2
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tianv2` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `tianv2`;

/*Table structure for table `aaa` */

DROP TABLE IF EXISTS `aaa`;

CREATE TABLE `aaa` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `data` varchar(32) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Table structure for table `cache_artical_disease` */

DROP TABLE IF EXISTS `cache_artical_disease`;

CREATE TABLE `cache_artical_disease` (
  `aid` int(11) DEFAULT NULL,
  `title` varchar(1024) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `pd` varchar(1024) DEFAULT NULL,
  `mid` int(11) DEFAULT NULL,
  `md` varbinary(1024) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `cache_artical_doctor` */

DROP TABLE IF EXISTS `cache_artical_doctor`;

CREATE TABLE `cache_artical_doctor` (
  `aid` int(11) DEFAULT NULL,
  `title` varchar(1024) DEFAULT NULL,
  `did` int(11) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  `lv` varchar(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `cache_disease` */

DROP TABLE IF EXISTS `cache_disease`;

CREATE TABLE `cache_disease` (
  `pid` int(11) DEFAULT NULL,
  `pd` varchar(1024) DEFAULT NULL,
  `mid` int(11) DEFAULT NULL,
  `md` varchar(1024) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `data_artical` */

DROP TABLE IF EXISTS `data_artical`;

CREATE TABLE `data_artical` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(1024) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

/*Table structure for table `data_artical_dis` */

DROP TABLE IF EXISTS `data_artical_dis`;

CREATE TABLE `data_artical_dis` (
  `aid` int(11) DEFAULT NULL,
  `did` int(11) DEFAULT NULL COMMENT 'disease id',
  UNIQUE KEY `aid` (`aid`,`did`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `data_artical_doc` */

DROP TABLE IF EXISTS `data_artical_doc`;

CREATE TABLE `data_artical_doc` (
  `aid` int(11) DEFAULT NULL,
  `dod` int(11) DEFAULT NULL COMMENT 'doctor id',
  UNIQUE KEY `aid` (`aid`,`dod`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `data_attr_data` */

DROP TABLE IF EXISTS `data_attr_data`;

CREATE TABLE `data_attr_data` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `data` varchar(1024) NOT NULL,
  `pid` int(11) NOT NULL,
  `grp` int(11) NOT NULL,
  `metaid` int(11) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

/*Table structure for table `data_attr_grp` */

DROP TABLE IF EXISTS `data_attr_grp`;

CREATE TABLE `data_attr_grp` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `grp` varchar(32) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Table structure for table `data_attr_meta` */

DROP TABLE IF EXISTS `data_attr_meta`;

CREATE TABLE `data_attr_meta` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `val` varchar(64) CHARACTER SET utf8 NOT NULL,
  `level` int(11) NOT NULL COMMENT '同一组中上下级排序(第几层,从0开始连续)',
  `grp` int(11) NOT NULL COMMENT '相同GRPID 为同一组',
  PRIMARY KEY (`sid`),
  UNIQUE KEY `level` (`level`,`grp`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `data_doctor` */

DROP TABLE IF EXISTS `data_doctor`;

CREATE TABLE `data_doctor` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `pwd` char(61) NOT NULL,
  `avatar` varchar(24) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Table structure for table `data_doctor_ext` */

DROP TABLE IF EXISTS `data_doctor_ext`;

CREATE TABLE `data_doctor_ext` (
  `dod` int(10) unsigned DEFAULT NULL COMMENT 'doctor sid',
  `dlv` int(11) DEFAULT NULL COMMENT 'doctor lv meta id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `data_doctor_lv_meta` */

DROP TABLE IF EXISTS `data_doctor_lv_meta`;

CREATE TABLE `data_doctor_lv_meta` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `data` varchar(32) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Table structure for table `data_oplog` */

DROP TABLE IF EXISTS `data_oplog`;

CREATE TABLE `data_oplog` (
  `sid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `optype` varchar(16) NOT NULL,
  `ipaddr` varchar(15) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date` date NOT NULL,
  `opflag` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`sid`),
  KEY `optype` (`optype`,`ipaddr`,`date`,`opflag`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

/*Table structure for table `data_present` */

DROP TABLE IF EXISTS `data_present`;

CREATE TABLE `data_present` (
  `sid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cost` int(11) DEFAULT NULL COMMENT '消耗积分',
  `data` varchar(36) DEFAULT NULL COMMENT '礼物名称',
  `ben` int(11) DEFAULT NULL COMMENT '医生获得的爱心点数',
  `avatar` varchar(32) DEFAULT NULL COMMENT '礼物图片名字',
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Table structure for table `data_priv` */

DROP TABLE IF EXISTS `data_priv`;

CREATE TABLE `data_priv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `pass` varchar(61) NOT NULL,
  `privilege` varchar(30) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Table structure for table `data_user` */

DROP TABLE IF EXISTS `data_user`;

CREATE TABLE `data_user` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(64) NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `pwd` char(61) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `avatar` varchar(24) NOT NULL DEFAULT '181941301.png',
  `rpq` varchar(64) NOT NULL,
  `rpa` varchar(64) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Table structure for table `data_user_ext` */

DROP TABLE IF EXISTS `data_user_ext`;

CREATE TABLE `data_user_ext` (
  `uid` int(11) DEFAULT NULL,
  `pt` int(11) DEFAULT NULL COMMENT '积分',
  UNIQUE KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
