/*
SQLyog Community v11.2 (64 bit)
MySQL - 5.5.49-0ubuntu0.14.04.1 : Database - shbdata
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`shbdata` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `shbdata`;

/*Table structure for table `abc` */

DROP TABLE IF EXISTS `abc`;

CREATE TABLE `abc` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `a` varchar(10) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `abc` */

/*Table structure for table `acb` */

DROP TABLE IF EXISTS `acb`;

CREATE TABLE `acb` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `q` varchar(16) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `acb` */

/*Table structure for table `aii` */

DROP TABLE IF EXISTS `aii`;

CREATE TABLE `aii` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `u` int(11) NOT NULL,
  `m` int(11) NOT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `u` (`u`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `aii` */

/*Table structure for table `attr_disease` */

DROP TABLE IF EXISTS `attr_disease`;

CREATE TABLE `attr_disease` (
  `dis_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ac_id` int(10) unsigned DEFAULT NULL,
  `dis_val` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`dis_id`),
  UNIQUE KEY `ch_id` (`ac_id`,`dis_val`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `attr_disease` */

/*Table structure for table `data_account` */

DROP TABLE IF EXISTS `data_account`;

CREATE TABLE `data_account` (
  `ac_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ch_id` int(11) NOT NULL,
  `ac_val` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`ac_id`),
  UNIQUE KEY `dev` (`ch_id`,`ac_val`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `data_account` */

/*Table structure for table `data_channel` */

DROP TABLE IF EXISTS `data_channel`;

CREATE TABLE `data_channel` (
  `ch_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ch_val` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`ch_id`),
  UNIQUE KEY `ch_val` (`ch_val`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `data_channel` */

/*Table structure for table `data_idea` */

DROP TABLE IF EXISTS `data_idea`;

CREATE TABLE `data_idea` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `data_idea` */

/*Table structure for table `data_plan` */

DROP TABLE IF EXISTS `data_plan`;

CREATE TABLE `data_plan` (
  `pl_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ac_id` int(11) DEFAULT NULL,
  `pl_val` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`pl_id`),
  UNIQUE KEY `dis_id` (`ac_id`,`pl_val`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `data_plan` */

/*Table structure for table `data_unit` */

DROP TABLE IF EXISTS `data_unit`;

CREATE TABLE `data_unit` (
  `un_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pl_id` int(11) NOT NULL,
  `un_val` varchar(128) NOT NULL,
  `un_code_pc` varchar(64) DEFAULT NULL,
  `un_code_m` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`un_id`),
  UNIQUE KEY `pl_id` (`pl_id`,`un_val`),
  UNIQUE KEY `un_code` (`un_code_pc`),
  UNIQUE KEY `un_code_m` (`un_code_m`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `data_unit` */

/*Table structure for table `log_load_token` */

DROP TABLE IF EXISTS `log_load_token`;

CREATE TABLE `log_load_token` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `token` char(32) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `log_load_token` */

/*Table structure for table `log_upload_token` */

DROP TABLE IF EXISTS `log_upload_token`;

CREATE TABLE `log_upload_token` (
  `token` char(32) NOT NULL COMMENT 'md5(fn+time)',
  `cls` varchar(32) NOT NULL COMMENT '识别的类名',
  `name` varchar(1024) NOT NULL,
  `cnt` int(11) NOT NULL,
  UNIQUE KEY `token` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `log_upload_token` */

/*Table structure for table `prvt_data` */

DROP TABLE IF EXISTS `prvt_data`;

CREATE TABLE `prvt_data` (
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
  UNIQUE KEY `one` (`code`,`date`,`hour`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `prvt_data` */

/*Table structure for table `publ_data` */

DROP TABLE IF EXISTS `publ_data`;

CREATE TABLE `publ_data` (
  `pu_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_id` int(10) unsigned NOT NULL,
  `paysum` float NOT NULL COMMENT '消费',
  `shows` int(10) unsigned NOT NULL COMMENT '展现',
  `clks` int(10) unsigned NOT NULL COMMENT '点击',
  `dev` enum('pc','m') NOT NULL,
  `date` date NOT NULL,
  `hour` int(11) NOT NULL,
  PRIMARY KEY (`pu_id`),
  UNIQUE KEY `uniq` (`id_id`,`dev`,`date`,`hour`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `publ_data` */

/* Procedure structure for procedure `clean` */

/*!50003 DROP PROCEDURE IF EXISTS  `clean` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`%` PROCEDURE `clean`()
BEGIN
	TRUNCATE TABLE `abc`;
	TRUNCATE TABLE `acb`;
	TRUNCATE TABLE `aii`;
	TRUNCATE TABLE `attr_disease`;
	TRUNCATE TABLE `data_account`;
	TRUNCATE TABLE `data_channel`;
	TRUNCATE TABLE `data_idea`;
	TRUNCATE TABLE `data_plan`;
	TRUNCATE TABLE `data_unit`;
	TRUNCATE TABLE `log_load_token`;
	TRUNCATE TABLE `log_upload_token`;
	TRUNCATE TABLE `prvt_data`;
	TRUNCATE TABLE `publ_data`;
    END */$$
DELIMITER ;

/*Table structure for table `table_tree` */

DROP TABLE IF EXISTS `table_tree`;

/*!50001 DROP VIEW IF EXISTS `table_tree` */;
/*!50001 DROP TABLE IF EXISTS `table_tree` */;

/*!50001 CREATE TABLE  `table_tree`(
 `ch_id` int(10) unsigned ,
 `ch_val` varchar(128) ,
 `ac_id` int(10) unsigned ,
 `ac_val` varchar(128) ,
 `pl_id` int(10) unsigned ,
 `pl_val` varchar(128) ,
 `un_id` int(10) unsigned ,
 `un_val` varchar(128) ,
 `un_code_pc` varchar(64) ,
 `un_code_m` varchar(64) ,
 `grp_id_code_pc` text ,
 `grp_id_code_m` text ,
 `grp_id_id` text 
)*/;

/*View structure for view table_tree */

/*!50001 DROP TABLE IF EXISTS `table_tree` */;
/*!50001 DROP VIEW IF EXISTS `table_tree` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `table_tree` AS (select `data_channel`.`ch_id` AS `ch_id`,`data_channel`.`ch_val` AS `ch_val`,`data_account`.`ac_id` AS `ac_id`,`data_account`.`ac_val` AS `ac_val`,`data_plan`.`pl_id` AS `pl_id`,`data_plan`.`pl_val` AS `pl_val`,`data_unit`.`un_id` AS `un_id`,`data_unit`.`un_val` AS `un_val`,`data_unit`.`un_code_pc` AS `un_code_pc`,`data_unit`.`un_code_m` AS `un_code_m`,group_concat(`data_idea`.`id_code_pc` separator ',') AS `grp_id_code_pc`,group_concat(`data_idea`.`id_code_m` separator ',') AS `grp_id_code_m`,group_concat(`data_idea`.`id_id` separator ',') AS `grp_id_id` from ((`data_unit` left join (`data_plan` left join (`data_channel` left join `data_account` on((`data_channel`.`ch_id` = `data_account`.`ch_id`))) on((`data_plan`.`ac_id` = `data_account`.`ac_id`))) on((`data_unit`.`pl_id` = `data_plan`.`pl_id`))) left join `data_idea` on((`data_idea`.`un_id` = `data_unit`.`un_id`))) group by `data_unit`.`un_id`) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
