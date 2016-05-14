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

/*Data for the table `aaa` */

insert  into `aaa`(`sid`,`data`) values (1,'a'),(2,'b'),(3,'aaa');

/*Table structure for table `cache_attr` */

DROP TABLE IF EXISTS `cache_attr`;

CREATE TABLE `cache_attr` (
  `grpid` int(11) NOT NULL,
  `grp` varchar(32) NOT NULL,
  `attrid` int(11) NOT NULL,
  `attdata` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `cache_attr` */

/*Table structure for table `data_artical` */

DROP TABLE IF EXISTS `data_artical`;

CREATE TABLE `data_artical` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(1024) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

/*Data for the table `data_artical` */

insert  into `data_artical`(`sid`,`title`,`content`,`date`) values (1,'gogo4','gogo','2016-05-17'),(2,'t44tt','cdccc','2016-05-12'),(3,'qwerqwe','rqwreq','2016-05-12'),(4,'sdf qerqw','erqer qwerqer','2016-05-12'),(5,'asdfqwerqwerqwer','qerqwerqerw','2016-05-12'),(6,'fdqerqerqwerqwer','qwerqwerqewrqw','2016-05-12'),(7,'sf sadf qwer',' qr q43rsd gfhw','2016-05-12'),(8,'sdf3qt y45','hjlkjll\r\n\r\n','2016-05-12'),(9,'qertqerqe','qwerqwer\r\nqer\r\nwqerqwer\r\n','2016-05-12'),(10,'sdfhee34','erq\r\nsjyuyk\r\nqr34','2016-05-12'),(11,'mmmmmm','werqwerq','2016-05-12'),(12,'121212','dasf0sdf0w0eqwe','2016-05-12'),(13,'fjasdl','safwerq`','2016-05-16'),(14,'asdlkf','sadlkf','2016-05-12'),(15,'fasdf','wqerqwer','2016-05-12'),(16,'qwerqwre','qwerqwerqewrgwsefg','2016-05-12'),(17,'dfhggdsdf','grt3','2016-05-12'),(18,'sdgdsfgsdf','gert3q4rt34','2016-05-12'),(19,'dfgwerwrt3','4t34ert','2016-05-12'),(20,'sdfgwert','rtwertwert','2016-05-12'),(21,'rrrrr','rrrrrrrrrrrrrrrr','2016-05-12'),(22,'qewrqwer','qwerqwe','2016-05-12'),(23,'5454','44444444444444','2016-05-12'),(24,'66666666','66666666666666666','2016-05-12');

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

/*Data for the table `data_attr_data` */

insert  into `data_attr_data`(`sid`,`data`,`pid`,`grp`,`metaid`) values (1,'前列腺疾病',0,1,1),(2,'前列腺炎',1,1,2),(3,'前列腺增生',1,1,2),(4,'前列腺肥大',1,1,2),(5,'前列腺囊肿',1,1,2),(6,'前列腺痛',1,1,2),(7,'前列腺癌',1,1,2),(8,'性功能障碍',0,1,1),(9,'阳痿',8,1,2),(10,'早泄',8,1,2),(11,'勃起功能障碍',8,1,2),(12,'射精功能障碍',8,1,2),(13,'过度手淫',8,1,2),(14,'性传播疾病',0,1,1),(15,'尖锐湿疣',14,1,2),(16,'生殖器疱疹',14,1,2),(17,'非淋',14,1,2),(18,'梅毒',14,1,2),(19,'淋病',14,1,2),(20,'艾滋病',14,1,2),(21,'生殖整形',0,1,1),(22,'包皮过长',21,1,2),(23,'包皮包茎',21,1,2),(24,'精索静脉曲张',21,1,2),(25,'鞘膜积液',21,1,2),(26,'疝气',21,1,2),(27,'隐睾症',21,1,2),(28,'泌尿感染',0,1,1),(29,'包皮龟头炎',28,1,2),(30,'尿道炎',28,1,2),(31,'睾丸炎',28,1,2),(32,'精囊炎',28,1,2),(33,'膀胱炎',28,1,2),(34,'附睾炎',28,1,2),(35,'男性不育',0,1,1),(36,'精液异常',35,1,2),(37,'精道异常',35,1,2),(38,'睾丸异常',35,1,2),(39,'肾虚',35,1,2),(40,'男性不育症',35,1,2);

/*Table structure for table `data_attr_grp` */

DROP TABLE IF EXISTS `data_attr_grp`;

CREATE TABLE `data_attr_grp` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `grp` varchar(32) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `data_attr_grp` */

insert  into `data_attr_grp`(`sid`,`grp`) values (1,'病种');

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

/*Data for the table `data_attr_meta` */

insert  into `data_attr_meta`(`sid`,`val`,`level`,`grp`) values (1,'病种',0,1),(2,'疾病',1,1);

/*Table structure for table `data_doctor` */

DROP TABLE IF EXISTS `data_doctor`;

CREATE TABLE `data_doctor` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(64) NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `pwd` char(61) NOT NULL,
  `avatar` varchar(24) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `data_doctor` */

/*Table structure for table `data_doctor_lv` */

DROP TABLE IF EXISTS `data_doctor_lv`;

CREATE TABLE `data_doctor_lv` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `data` varchar(32) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `data_doctor_lv` */

insert  into `data_doctor_lv`(`sid`,`data`) values (3,'ccccccc');

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
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

/*Data for the table `data_oplog` */

insert  into `data_oplog`(`sid`,`optype`,`ipaddr`,`datetime`,`date`,`opflag`) values (33,'privUsr_auth','192.168.174.2','2016-05-09 19:47:43','2016-05-09',1),(32,'privUsr_auth','::1','2016-05-09 19:14:27','2016-05-09',1),(31,'privUsr_auth','::1','2016-05-09 18:41:11','2016-05-09',1),(30,'privUsr_auth','::1','2016-05-09 18:36:07','2016-05-09',1),(29,'privUsr_auth','::1','2016-05-09 16:12:15','2016-05-09',1),(28,'privUsr_auth','::1','2016-05-09 16:11:58','2016-05-09',0),(27,'privUsr_auth','::1','2016-05-09 16:11:49','2016-05-09',0),(26,'privUsr_auth','::1','2016-05-09 16:11:34','2016-05-09',0),(25,'privUsr_auth','::1','2016-05-09 16:11:31','2016-05-09',0),(24,'privUsr_auth','::1','2016-05-09 16:11:27','2016-05-09',0),(23,'privUsr_auth','::1','2016-05-09 16:11:24','2016-05-09',0),(22,'privUsr_auth','::1','2016-05-09 16:11:20','2016-05-09',0),(21,'privUsr_auth','::1','2016-05-09 16:11:15','2016-05-09',0),(20,'privUsr_auth','::1','2016-05-09 16:07:46','2016-05-09',1),(19,'privUsr_auth','::1','2016-05-09 15:55:21','2016-05-09',1),(18,'privUsr_auth','::1','2016-05-09 15:50:39','2016-05-09',1),(34,'privUsr_auth','::1','2016-05-10 09:03:48','2016-05-10',1),(35,'privUsr_auth','::1','2016-05-10 10:31:41','2016-05-10',0),(36,'privUsr_auth','::1','2016-05-10 10:31:46','2016-05-10',1),(37,'privUsr_auth','::1','2016-05-10 14:15:27','2016-05-10',1),(38,'privUsr_auth','::1','2016-05-10 16:02:11','2016-05-10',1),(39,'privUsr_auth','::1','2016-05-10 18:23:59','2016-05-10',1),(40,'privUsr_auth','::1','2016-05-11 09:08:26','2016-05-11',0),(41,'privUsr_auth','::1','2016-05-11 09:08:40','2016-05-11',1),(42,'privUsr_auth','::1','2016-05-11 10:18:53','2016-05-11',1),(43,'privUsr_auth','::1','2016-05-11 13:35:56','2016-05-11',1),(44,'privUsr_auth','::1','2016-05-11 16:05:42','2016-05-11',0),(45,'privUsr_auth','::1','2016-05-11 16:05:46','2016-05-11',1),(46,'privUsr_auth','::1','2016-05-11 16:39:25','2016-05-11',1),(47,'privUsr_auth','::1','2016-05-11 17:46:14','2016-05-11',1),(48,'privUsr_auth','::1','2016-05-12 09:15:25','2016-05-12',1),(49,'privUsr_auth','::1','2016-05-12 11:19:35','2016-05-12',0),(50,'privUsr_auth','::1','2016-05-12 11:19:40','2016-05-12',1),(51,'privUsr_auth','::1','2016-05-12 12:44:03','2016-05-12',1),(52,'privUsr_auth','::1','2016-05-12 15:24:18','2016-05-12',1),(53,'privUsr_auth','::1','2016-05-12 18:25:38','2016-05-12',1),(54,'privUsr_auth','::1','2016-05-13 09:55:03','2016-05-13',1),(55,'privUsr_auth','192.168.174.2','2016-05-13 13:29:16','2016-05-13',1),(56,'privUsr_auth','192.168.174.2','2016-05-13 14:42:05','2016-05-13',1),(57,'privUsr_auth','192.168.174.2','2016-05-13 15:20:40','2016-05-13',1),(58,'privUsr_auth','192.168.174.2','2016-05-13 17:40:36','2016-05-13',1),(59,'privUsr_auth','192.168.174.2','2016-05-14 09:20:58','2016-05-14',1),(60,'privUsr_auth','192.168.174.2','2016-05-14 12:55:45','2016-05-14',1),(61,'privUsr_auth','192.168.174.2','2016-05-14 13:54:20','2016-05-14',1);

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

/*Data for the table `data_present` */

insert  into `data_present`(`sid`,`cost`,`data`,`ben`,`avatar`) values (1,100,'爱心卡片',1,'01541998.jpg'),(2,100,'小小心意',1,'15248708.png'),(4,100,'心情愉快',1,'71452639.jpg'),(5,200,'赞',2,'17289481.gif'),(6,200,'感恩花篮',2,'76008251.jpg'),(7,400,'暖暖关怀',4,'59963328.gif'),(8,600,'医德高尚',6,'79912207.jpg'),(9,600,'德医双馨',6,'66725258.jpg'),(10,1000,'暖暖心意',10,'20492350.png'),(11,3000,'诚心诚意',30,'28910696.png'),(12,10000,'心意满满',40,'30522324.png'),(13,10000,'一帆风顺',40,'32569282.jpg'),(14,10000,'幸福美满',40,'36922814.jpg');

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

/*Data for the table `data_priv` */

insert  into `data_priv`(`id`,`email`,`pass`,`privilege`,`time`) values (1,'awei.tian@qq.com','ff76f7dbd32701d7e64ab84d2a475371653e089a267442caf47e5eb0eb8a1','root','2010-06-29 20:54:12');

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

/*Data for the table `data_user` */

insert  into `data_user`(`sid`,`email`,`name`,`pwd`,`phone`,`avatar`,`rpq`,`rpa`,`date`) values (6,'aaa@qq.com','balabala','7b91c3e7a6fd93fc0090262e47473c1df3e63a7af2091079698ea60d809f2','','181940497.png','my card id?','302404501200','2016-05-13'),(2,'test@qq.com',NULL,'df747c1d7e3a2c85c0c980e08df010434246120e79aac9be5f8759b2483bf','13640898273','181940360.png','my card id?','302404501200','2016-05-13'),(5,'uuu@qq.com',NULL,'944bbe70185871dd55feb290572f41f0961e3bc30131a9d0bfdb3c7639a46','','104043359.png','my card id?','302404501200','2016-05-13'),(4,'love@163.com',NULL,'70973a8b52c709cb352896d872343c3b591f8e3d3493580726a1a1a6ac685','13650506262','181941301.png','my card id?','302404501200','2016-05-13'),(7,'bbbZ@cc.com','apocalypse','68c73fcf492a8448c1b609e544f58fe8d8c1a8889bf2a058e91c91bdcb6c4','13641414545','181940360.png','my card id?','302404501200','2016-05-13'),(8,'yyy@ll.com',NULL,'9fd7cf97ea4a018af7d3487d39d06aab50a8357f992fb890ac243b6da9194','13052526463','181941301.png','my card id?','302404501200','2016-05-13'),(9,'111@aa.com',NULL,'26f46fcca27f5971aea868ca6ed739e7ca42b5af7a27101960c95503c36c3','','181940360.png','my card id?','302404501200','2016-05-13'),(10,'222@qq.com',NULL,'1ad05462722af6d33e3fc854e08965774936543eab30b218ca2701b978a4b','','100883320.png','my card id?','302404501200','2016-05-13'),(11,'333@333.com',NULL,'c7ddfc0c4e14f338c25e7ec505f733772d7eec5baa0ed219956ef1159d522','','100883320.png','my card id?','302404501200','2016-05-13'),(12,'jjj@ll.com',NULL,'124e344057e3c1c6ebb66a31bda28c722678e5083671e376537ddfd540e1f','','181940497.png','my card id?','302404501200','2016-05-13'),(13,'pagbe@cc.om','ccc','c105e1868e1198a7da94d4d0bc1cb44e0309dd3d23ba1721c6459caa00e91','','181941301.png','my card id?','302404501200','2016-05-13'),(14,'44@111.com',NULL,'4313a1ba02b0ca71adead80369a9054152afc5cb46d12cca283dce9cee2a3','13650506262','104043359.png','my card id?','302404501200','2016-05-13'),(15,'226qq@fwqr.com',NULL,'e20510d4864822eb7cfbab825ff8dfb0640cd5b829518ee6c14604098f656','','181940360.png','my card id?','302404501200','2016-05-13');

/*Table structure for table `data_user_ext` */

DROP TABLE IF EXISTS `data_user_ext`;

CREATE TABLE `data_user_ext` (
  `uid` int(11) DEFAULT NULL,
  `pt` int(11) DEFAULT NULL COMMENT '积分',
  UNIQUE KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `data_user_ext` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
