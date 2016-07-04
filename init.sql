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

/*Table structure for table `cache_article_disease` */

DROP TABLE IF EXISTS `cache_article_disease`;

CREATE TABLE `cache_article_disease` (
  `aid` int(11) DEFAULT NULL,
  `title` varchar(1024) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `pd` varchar(1024) DEFAULT NULL,
  `mid` int(11) DEFAULT NULL,
  `md` varbinary(1024) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `cache_article_disease` */

/*Table structure for table `cache_article_doctor` */

DROP TABLE IF EXISTS `cache_article_doctor`;

CREATE TABLE `cache_article_doctor` (
  `aid` int(11) DEFAULT NULL,
  `title` varchar(1024) DEFAULT NULL,
  `did` int(11) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  `lv` varchar(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `cache_article_doctor` */

/*Table structure for table `cache_disease` */

DROP TABLE IF EXISTS `cache_disease`;

CREATE TABLE `cache_disease` (
  `pid` int(11) DEFAULT NULL,
  `pd` varchar(1024) DEFAULT NULL,
  `mid` int(11) DEFAULT NULL,
  `md` varchar(1024) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `cache_disease` */

insert  into `cache_disease`(`pid`,`pd`,`mid`,`md`) values (1,'前列腺疾病',2,'前列腺炎'),(1,'前列腺疾病',3,'前列腺增生'),(1,'前列腺疾病',4,'前列腺肥大'),(1,'前列腺疾病',5,'前列腺囊肿'),(1,'前列腺疾病',6,'前列腺痛'),(1,'前列腺疾病',7,'前列腺癌'),(8,'性功能障碍',9,'阳痿'),(8,'性功能障碍',10,'早泄'),(8,'性功能障碍',11,'勃起功能障碍'),(8,'性功能障碍',12,'射精功能障碍'),(8,'性功能障碍',13,'过度手淫'),(14,'性传播疾病',15,'尖锐湿疣'),(14,'性传播疾病',16,'生殖器疱疹'),(14,'性传播疾病',17,'非淋'),(14,'性传播疾病',18,'梅毒'),(14,'性传播疾病',19,'淋病'),(14,'性传播疾病',20,'艾滋病'),(21,'生殖整形',22,'包皮过长'),(21,'生殖整形',23,'包皮包茎'),(21,'生殖整形',24,'精索静脉曲张'),(21,'生殖整形',25,'鞘膜积液'),(21,'生殖整形',26,'疝气'),(21,'生殖整形',27,'隐睾症'),(28,'泌尿感染',29,'包皮龟头炎'),(28,'泌尿感染',30,'尿道炎'),(28,'泌尿感染',31,'睾丸炎'),(28,'泌尿感染',32,'精囊炎'),(28,'泌尿感染',33,'膀胱炎'),(28,'泌尿感染',34,'附睾炎'),(35,'男性不育',36,'精液异常'),(35,'男性不育',37,'精道异常'),(35,'男性不育',38,'睾丸异常'),(35,'男性不育',39,'肾虚'),(35,'男性不育',40,'男性不育症');

/*Table structure for table `cache_doctor` */

DROP TABLE IF EXISTS `cache_doctor`;

CREATE TABLE `cache_doctor` (
  `sid` int(11) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  `dmd` int(11) DEFAULT NULL,
  `lv` varchar(32) DEFAULT NULL,
  UNIQUE KEY `sid` (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `cache_doctor` */

/*Table structure for table `data_appraise` */

DROP TABLE IF EXISTS `data_appraise`;

CREATE TABLE `data_appraise` (
  `sid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `dod` int(11) NOT NULL,
  `txt` text COMMENT '满意度',
  `lv` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `data_appraise` */

insert  into `data_appraise`(`sid`,`uid`,`did`,`dod`,`txt`,`lv`,`date`) values (1,2,8,2,'cc',1,'2016-06-15');

/*Table structure for table `data_article` */

DROP TABLE IF EXISTS `data_article`;

CREATE TABLE `data_article` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `kw` varchar(1024) NOT NULL,
  `desc` text,
  `thumb` varchar(1024) DEFAULT NULL,
  `title` varchar(1024) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

/*Data for the table `data_article` */

insert  into `data_article`(`sid`,`kw`,`desc`,`thumb`,`title`,`content`,`date`) values (1,'d','c','/aa.png','gogo4','gogo','2016-05-17'),(2,'qq','bb','cc.png','t44tt','cdccc','2016-05-12'),(3,'',NULL,NULL,'qwerqwe','rqwreq','2016-05-12'),(4,'',NULL,NULL,'sdf qerqw','erqer qwerqer','2016-05-12'),(5,'',NULL,NULL,'asdfqwerqwerqwer','qerqwerqerw','2016-05-12'),(6,'',NULL,NULL,'fdqerqerqwerqwer','qwerqwerqewrqw','2016-05-12'),(7,'',NULL,NULL,'sf sadf qwer',' qr q43rsd gfhw','2016-05-12'),(8,'',NULL,NULL,'sdf3qt y45','hjlkjll\r\n\r\n','2016-05-12'),(9,'',NULL,NULL,'qertqerqe','qwerqwer\r\nqer\r\nwqerqwer\r\n','2016-05-12'),(10,'',NULL,NULL,'sdfhee34','erq\r\nsjyuyk\r\nqr34','2016-05-12'),(11,'',NULL,NULL,'mmmmmm','werqwerq','2016-05-12'),(12,'',NULL,NULL,'121212','dasf0sdf0w0eqwe','2016-05-12'),(13,'',NULL,NULL,'fjasdl','safwerq`','2016-05-16'),(14,'',NULL,NULL,'asdlkf','sadlkf','2016-05-12'),(15,'',NULL,NULL,'fasdf','wqerqwer','2016-05-12'),(16,'',NULL,NULL,'qwerqwre','qwerqwerqewrgwsefg','2016-05-12'),(17,'',NULL,NULL,'dfhggdsdf','grt3','2016-05-12'),(18,'',NULL,NULL,'sdgdsfgsdf','gert3q4rt34','2016-05-12'),(19,'',NULL,NULL,'dfgwerwrt3','4t34ert','2016-05-12'),(20,'',NULL,NULL,'sdfgwert','rtwertwert','2016-05-12'),(21,'',NULL,NULL,'rrrrr','rrrrrrrrrrrrrrrr','2016-05-12'),(22,'',NULL,NULL,'qewrqwer','qwerqwe','2016-05-12'),(23,'',NULL,NULL,'5454','44444444444444','2016-05-12'),(24,'',NULL,NULL,'66666666','66666666666666666','2016-05-12'),(26,'',NULL,NULL,'ewwe','ewewew','2016-06-01'),(27,'',NULL,NULL,'tttt','cccc','2016-06-01'),(28,'',NULL,NULL,'aa','bb','2016-06-03'),(29,'kw1,kw2','desc','','ads','content','2016-06-18'),(30,'lsdk','sdalfkwe','/uploads/user/201606211043371.png','tald','ldska','2016-06-21'),(31,'急性前列腺炎、慢性前列腺炎','前列腺炎是男性青壮年人的常见病，据统计，约占泌尿外科门诊病人的1／4。患前列腺炎可以全无症状，也可以引起持续或者反复发作的泌尿生殖系统的不适。由于精囊的解剖位置与前列腺相毗邻，因此大约80％的病例炎症同时累及精囊，因此该病也称为前列腺精囊炎。由于前列腺炎迁延难愈，易于复发，故许多慢性前列腺炎患者可将炎症带入老年。','','前列腺炎的感染途径有哪些？','前列腺炎是男性青壮年人的常见病，据统计，约占泌尿外科门诊病人的1／4。患前列腺炎可以全无症状，也可以引起持续或者反复发作的泌尿生殖系统的不适。由于精囊的解剖位置与前列腺相毗邻，因此大约80％的病例炎症同时累及精囊，因此该病也称为前列腺精囊炎。由于前列腺炎迁延难愈，易于复发，故许多慢性前列腺炎患者可将炎症带入老年。那么，前列腺为什么会发生感染呢?\r\n前列腺的感染途径大致有三个方面：\r\n1、经尿道直接蔓延：这是一条较为多见的感染途径。细菌经尿道口上行进入尿道，再经前列腺导管侵入前列腺体，引起急性或者慢性前列腺炎。值得注意的是，淋菌性尿道炎是引起前列腺炎的重要原因，随着近年淋病在我国的迅猛发展，已经成为慢性前列腺炎的一个重要病因。前列腺增生或存在结石可使前列腺部尿道变形、扭曲，充血和排尿不畅，并使前列腺部尿道粘膜对抗尿道内原来可以和平共处的非致病菌的抗原能力下降，因而易发生前列腺炎。性欲亢进或者过度手淫可以引起前列腺反复充血，诱发前列腺炎。导尿或者尿道器械检查可以将细菌带入尿道引起前列腺感染。\r\n2、经血液循环感染：身体其他地方感染灶的致病菌可以经过血液循环到达前列腺引起前列腺炎。常见的有皮肤、扁桃体、龋齿、呼吸道或者肠道感染灶的细菌入血后侵入前列腺。\r\n3、淋巴感染：比较少见，可因前列腺邻近的炎症如直肠、结肠、膀胱、尿道等通过淋巴管道引起前列腺炎。\r\n前列腺炎的分类比较复杂，除普通的细菌性前列腺炎可以分为急性前列腺炎和慢性前列腺炎之外，还有特异性前列腺炎，包括淋菌、结核菌、梅菌、真菌和寄生虫(如滴虫)等引起的前列腺炎；病毒、支原体、衣原体感染引起的前列腺炎；以及肉芽肿性前列腺炎；前列腺痛和前列腺充血等。','2016-07-01');

/*Table structure for table `data_article_comment` */

DROP TABLE IF EXISTS `data_article_comment`;

CREATE TABLE `data_article_comment` (
  `sid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `comment` text,
  `vertify` tinyint(1) DEFAULT '0',
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `data_article_comment` */

insert  into `data_article_comment`(`sid`,`aid`,`uid`,`comment`,`vertify`,`datetime`) values (1,1,1,'dd_new\r\nnew line',1,'2016-06-03 14:52:58');

/*Table structure for table `data_article_dis` */

DROP TABLE IF EXISTS `data_article_dis`;

CREATE TABLE `data_article_dis` (
  `aid` int(11) DEFAULT NULL,
  `did` int(11) DEFAULT NULL COMMENT 'disease id',
  UNIQUE KEY `aid` (`aid`,`did`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `data_article_dis` */

insert  into `data_article_dis`(`aid`,`did`) values (1,9),(1,10),(1,38),(1,39),(2,4),(4,9),(5,9),(6,9),(7,9),(9,9),(10,9),(11,3),(12,3),(13,3),(14,3),(15,3),(16,3),(17,3),(18,3),(19,3),(20,3),(21,17),(22,17),(23,10),(23,17),(23,39),(24,17),(26,15),(27,17),(28,2),(28,18),(28,29),(30,15),(30,327),(31,289);

/*Table structure for table `data_article_doc` */

DROP TABLE IF EXISTS `data_article_doc`;

CREATE TABLE `data_article_doc` (
  `aid` int(11) DEFAULT NULL,
  `dod` int(11) DEFAULT NULL COMMENT 'doctor id',
  UNIQUE KEY `aid` (`aid`,`dod`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `data_article_doc` */

insert  into `data_article_doc`(`aid`,`dod`) values (1,1),(1,4),(1,8),(2,3),(6,1),(6,4),(7,1),(8,1),(8,4),(9,1),(9,4),(10,4),(10,7),(11,4),(11,7),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,8),(21,8),(22,8),(23,8),(24,8),(26,10),(27,7),(28,2),(28,4),(28,8),(30,7),(31,7);

/*Table structure for table `data_article_sym` */

DROP TABLE IF EXISTS `data_article_sym`;

CREATE TABLE `data_article_sym` (
  `aid` int(11) DEFAULT NULL,
  `syd` int(11) DEFAULT NULL COMMENT 'symptom id',
  UNIQUE KEY `aid` (`aid`,`syd`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `data_article_sym` */

insert  into `data_article_sym`(`aid`,`syd`) values (1,42),(1,57),(2,48),(21,44),(30,47),(30,49),(31,480);

/*Table structure for table `data_article_tags` */

DROP TABLE IF EXISTS `data_article_tags`;

CREATE TABLE `data_article_tags` (
  `aid` int(11) DEFAULT NULL COMMENT 'artical id',
  `tid` int(11) DEFAULT NULL COMMENT 'tag id',
  UNIQUE KEY `aid` (`aid`,`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `data_article_tags` */

insert  into `data_article_tags`(`aid`,`tid`) values (1,4),(2,3),(4,1),(4,5),(4,6),(21,3),(21,5),(26,2),(26,3),(27,4),(27,5),(30,3),(30,5),(30,7),(31,1);

/*Table structure for table `data_ask` */

DROP TABLE IF EXISTS `data_ask`;

CREATE TABLE `data_ask` (
  `sid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT 'user id',
  `dod` int(11) DEFAULT NULL COMMENT 'doctor id',
  `title` varchar(128) DEFAULT NULL,
  `did` int(11) DEFAULT NULL COMMENT '病种ID',
  `desc` text COMMENT '病情描述',
  `svr` text COMMENT '希望提供的帮助',
  `files` varchar(2048) DEFAULT NULL COMMENT '上传的图片，相对于/UPLOADS',
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `data_ask` */

insert  into `data_ask`(`sid`,`uid`,`dod`,`title`,`did`,`desc`,`svr`,`files`,`date`) values (2,2,1,'ccc',327,'asdfw','qerqewr','','2016-05-24 00:00:00'),(4,2,4,'ccccc',2,'asda','asdfas','','2016-05-24 17:34:51'),(3,2,5,'a',39,'b','c','','2016-05-06 07:35:01'),(5,6,3,'dfa',19,'adsf','asdfwe','','2016-05-24 17:35:33');

/*Table structure for table `data_ask_append` */

DROP TABLE IF EXISTS `data_ask_append`;

CREATE TABLE `data_ask_append` (
  `sid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `askid` int(11) DEFAULT NULL,
  `role` enum('doctor','user') DEFAULT NULL,
  `conmeta` enum('text','present') DEFAULT 'text',
  `content` text COMMENT '当META为PRRSENT时，它的内容为图片路径，礼物名称',
  `files` varchar(2048) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `data_ask_append` */

insert  into `data_ask_append`(`sid`,`askid`,`role`,`conmeta`,`content`,`files`,`date`) values (1,2,'doctor','text','dddd',NULL,'2016-05-24 18:58:39'),(2,2,'user','text','ccccc',NULL,'2016-05-01 18:58:51'),(3,2,'user','text','ssssssssssssss','','2016-05-25 12:52:04'),(4,2,'doctor','text','ok,凯利门','','2016-05-25 12:59:18'),(5,2,'user','present','01541998.jpg,爱心卡片','','2016-05-25 17:12:01'),(6,2,'user','present','01541998.jpg,爱心卡片','','2016-05-25 17:16:11'),(7,2,'user','present','15248708.png,小小心意','','2016-05-25 17:16:14'),(8,2,'doctor','text','谢谢你的礼物','','2016-05-26 09:19:24'),(9,2,'user','text','呵呵，不客气','','2016-05-26 09:19:53');

/*Table structure for table `data_attr_data` */

DROP TABLE IF EXISTS `data_attr_data`;

CREATE TABLE `data_attr_data` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(64) NOT NULL,
  `data` varchar(1024) NOT NULL,
  `pid` int(11) NOT NULL,
  `grp` int(11) NOT NULL,
  `metaid` int(11) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=581 DEFAULT CHARSET=utf8;

/*Data for the table `data_attr_data` */

insert  into `data_attr_data`(`sid`,`key`,`data`,`pid`,`grp`,`metaid`) values (500,'','精液有胶状固体',484,2,4),(499,'','精液块状物',484,2,4),(498,'','精液有颗粒',484,2,4),(497,'','附睾结核垂体病变',484,2,4),(496,'','输精管梗塞',484,2,4),(495,'','精道梗阻',484,2,4),(494,'','精液稀',484,2,4),(493,'','精液不液化',484,2,4),(492,'','精液少精',484,2,4),(491,'','精液混浊',484,2,4),(490,'','精液团状',484,2,4),(489,'','精液浅红色',484,2,4),(488,'','精液带血',484,2,4),(487,'','精液发黄',484,2,4),(486,'','精液异味',484,2,4),(485,'','精液果冻状',484,2,4),(483,'','睾丸脱皮',453,2,4),(482,'','蛋疼',453,2,4),(481,'','睾丸有疙瘩',453,2,4),(480,'','睾丸坠胀',453,2,4),(479,'','睾丸附睾囊肿',453,2,4),(478,'','睾丸大小高低',453,2,4),(477,'','睾丸湿疹',453,2,4),(476,'','睾丸肿了',453,2,4),(475,'','睾丸杂词',453,2,4),(474,'','睾丸痛',453,2,4),(473,'','睾丸痒',453,2,4),(472,'','睾丸检查',453,2,4),(471,'','隐睾',453,2,4),(470,'','睾丸小',453,2,4),(469,'','睾丸肿胀肿硬',453,2,4),(468,'','睾丸囊肿',453,2,4),(467,'','睾丸发痒',453,2,4),(466,'','睾丸疼痛',453,2,4),(465,'','睾丸小疙瘩',453,2,4),(464,'','睾丸长痘痘',453,2,4),(463,'','睾丸发凉',453,2,4),(462,'','睾丸萎缩',453,2,4),(461,'','睾丸肉刺',453,2,4),(460,'','睾丸水泡',453,2,4),(459,'','睾丸大小高低不一',453,2,4),(458,'','睾丸潮湿',453,2,4),(457,'','睾丸扭转',453,2,4),(456,'','睾丸内有硬块',453,2,4),(455,'','睾丸胀酸胀',453,2,4),(454,'','睾丸下垂坠',453,2,4),(453,'','睾丸异常症状',0,2,3),(452,'','阴囊肉刺菜花状增生物',433,2,4),(451,'','阴囊长水泡',433,2,4),(450,'','阴囊大小高低不一',433,2,4),(449,'','阴囊萎缩',433,2,4),(448,'','阴囊扭转',433,2,4),(447,'','阴囊硬结',433,2,4),(446,'','阴囊小阴囊内有硬块',433,2,4),(445,'','阴囊发凉',433,2,4),(444,'','阴囊囊肿',433,2,4),(443,'','阴囊潮湿',433,2,4),(442,'','阴囊小疙瘩',433,2,4),(441,'','阴囊长痘痘',433,2,4),(440,'','阴囊变硬',433,2,4),(439,'','阴囊肿胀',433,2,4),(438,'','阴囊疼痛',433,2,4),(437,'','阴囊发痒',433,2,4),(436,'','阴囊酸胀',433,2,4),(435,'','阴囊坠胀',433,2,4),(434,'','阴囊下垂',433,2,4),(433,'','阴囊异常症状',0,2,3),(432,'','尿道口囊肿',416,2,4),(431,'','尿道口发红',416,2,4),(430,'','尿道口红点红疹',416,2,4),(429,'','尿道口滴白',416,2,4),(428,'','尿道口疙瘩',416,2,4),(427,'','尿道口疼痛',416,2,4),(426,'','尿道口出血',416,2,4),(425,'','尿道口异味',416,2,4),(424,'','尿道口流脓',416,2,4),(423,'','尿道口红肿',416,2,4),(422,'','尿道口痒',416,2,4),(421,'','尿道口灼热',416,2,4),(420,'','尿道口发黑发紫',416,2,4),(419,'','尿道口溃疡糜烂',416,2,4),(418,'','尿道口水泡',416,2,4),(417,'','尿道口长肉',416,2,4),(416,'','尿道口异常症状',0,2,3),(415,'','阴茎硬块',385,2,4),(414,'','阴茎流脓',385,2,4),(413,'','阴茎红点',385,2,4),(412,'','阴茎长肉增生物',385,2,4),(411,'','阴茎滴白',385,2,4),(410,'','阴茎水泡',385,2,4),(409,'','阴茎白点',385,2,4),(408,'','阴茎囊肿',385,2,4),(407,'','阴茎痒',385,2,4),(406,'','阴茎出血',385,2,4),(405,'','阴茎异味',385,2,4),(404,'','阴茎红肿',385,2,4),(403,'','阴茎灼热',385,2,4),(402,'','阴茎不硬',385,2,4),(401,'','阴茎蜕皮',385,2,4),(400,'','阴茎敏感',385,2,4),(399,'','阴茎有硬下疳',385,2,4),(398,'','阴茎肉刺肉芽',385,2,4),(397,'','阴茎溃疡溃烂',385,2,4),(396,'','阴茎发白',385,2,4),(395,'','阴茎长菜花状',385,2,4),(394,'','阴茎黑点黑斑',385,2,4),(393,'','阴茎发黑发紫阴',385,2,4),(392,'','阴茎疼痛',385,2,4),(391,'','阴茎长小疙瘩',385,2,4),(390,'','阴茎包皮粘连',385,2,4),(389,'','阴茎瘙痒',385,2,4),(388,'','阴茎滴白流脓',385,2,4),(387,'','阴茎红肿潮红',385,2,4),(386,'','阴茎红点红疹',385,2,4),(385,'','阴茎异常症状',0,2,3),(384,'','包皮肿',356,2,4),(383,'','包皮痒',356,2,4),(382,'','包皮分泌物',356,2,4),(381,'','包皮痘痘颗粒',356,2,4),(380,'','包皮溃疡',356,2,4),(379,'','包皮疙瘩',356,2,4),(378,'','包皮垢',356,2,4),(377,'','包皮小泡',356,2,4),(376,'','包皮系带',356,2,4),(375,'','包皮开裂',356,2,4),(374,'','包皮红点',356,2,4),(373,'','包皮增生物',356,2,4),(372,'','包皮疼痛',356,2,4),(371,'','包皮嵌顿',356,2,4),(370,'','包皮异味',356,2,4),(369,'','包皮黑点黑斑',356,2,4),(368,'','包皮发白  ',356,2,4),(367,'','包皮脱皮',356,2,4),(366,'','包皮出血',356,2,4),(365,'','包皮溃疡溃烂',356,2,4),(364,'','包皮龟头粘连',356,2,4),(363,'','包皮白点',356,2,4),(362,'','包皮长小颗粒',356,2,4),(361,'','包皮水泡',356,2,4),(360,'','包皮肉刺肉芽',356,2,4),(359,'','包皮瘙痒',356,2,4),(358,'','包皮红肿',356,2,4),(357,'','包皮长红色小颗粒',356,2,4),(356,'','包皮异常症状',0,2,3),(355,'','龟头破皮',328,2,4),(354,'','龟头蜕皮',328,2,4),(353,'','龟头滴白',328,2,4),(352,'','龟头痒',328,2,4),(351,'','龟头不硬',328,2,4),(350,'','龟头不露',328,2,4),(349,'','龟头敏感',328,2,4),(348,'','龟头红肿',328,2,4),(347,'','龟头湿疹',328,2,4),(346,'','龟头污垢',328,2,4),(345,'','龟头流脓',328,2,4),(344,'','龟头发红',328,2,4),(343,'','龟头发白',328,2,4),(342,'','龟头溃疡',328,2,4),(341,'','珍珠疹',328,2,4),(340,'','龟头黑点黑斑',328,2,4),(339,'','龟头长肉芽',328,2,4),(338,'','龟头发白龟头粘连',328,2,4),(337,'','龟头发黑发紫',328,2,4),(336,'','龟头长水泡',328,2,4),(335,'','龟头异味',328,2,4),(334,'','龟头脱皮',328,2,4),(333,'','感龟头长小颗粒',328,2,4),(332,'','龟头溃烂滴白',328,2,4),(331,'','痒龟红点',328,2,4),(330,'','红肿龟头',328,2,4),(329,'','龟头疼痛',328,2,4),(328,'','龟头异常症状',0,2,3),(327,'nxbyz','男性不育症',322,1,2),(326,'sx','肾虚',322,1,2),(325,'','睾丸异常',322,1,2),(324,'','精道异常',322,1,2),(323,'','精液异常',322,1,2),(322,'','男性不育',0,1,1),(321,'fgy','附睾炎',315,1,2),(320,'','膀胱炎',315,1,2),(319,'','精囊炎',315,1,2),(318,'','睾丸炎',315,1,2),(317,'','尿道炎',315,1,2),(316,'','包皮龟头炎',315,1,2),(315,'','泌尿感染',0,1,1),(314,'','隐睾症',308,1,2),(313,'','疝气',308,1,2),(312,'','鞘膜积液',308,1,2),(311,'','精索静脉曲张',308,1,2),(310,'','包皮包茎',308,1,2),(309,'','包皮过长',308,1,2),(308,'','生殖整形',0,1,1),(307,'','艾滋病',301,1,2),(306,'','淋病',301,1,2),(305,'','梅毒',301,1,2),(304,'','非淋',301,1,2),(303,'','生殖器疱疹',301,1,2),(302,'','尖锐湿疣',301,1,2),(301,'','性传播疾病',0,1,1),(300,'','过度手淫',295,1,2),(299,'','射精功能障碍',295,1,2),(298,'','勃起功能障碍',295,1,2),(297,'','早泄',295,1,2),(296,'','阳痿',295,1,2),(295,'','性功能障碍',0,1,1),(294,'','前列腺癌',288,1,2),(293,'','前列腺痛',288,1,2),(292,'','前列腺囊肿',288,1,2),(291,'','前列腺肥大',288,1,2),(290,'','前列腺增生',288,1,2),(289,'','前列腺炎',288,1,2),(288,'','前列腺疾病',0,1,1),(501,'','精液颜色异常',484,2,4),(502,'','精子质量异常',484,2,4),(503,'','精子畸形',484,2,4),(504,'','精子不液化',484,2,4),(505,'','精液太浓',484,2,4),(506,'','精子有异味',484,2,4),(507,'','精子发黄',484,2,4),(508,'','精子的组成',484,2,4),(509,'','精液稀少',484,2,4),(510,'','精子活力低',484,2,4),(511,'','少精',484,2,4),(512,'','男性射精异常症状',0,2,3),(513,'','射精延迟',512,2,4),(514,'','射精无力',512,2,4),(515,'','逆行射精',512,2,4),(516,'','不射精',512,2,4),(517,'','射精疼痛',512,2,4),(518,'','射精出血',512,2,4),(519,'','射精频繁',512,2,4),(520,'','射精快',512,2,4),(521,'','射精异常且龟头痛',512,2,4),(522,'','射精出现酱油色的小果冻',512,2,4),(523,'','射精过早',512,2,4),(524,'','房事射精',512,2,4),(525,'','射精没感觉',512,2,4),(526,'','很快就射',512,2,4),(527,'','插入即射',512,2,4),(528,'','性腺功能低下',512,2,4),(529,'','性腺功能亢进',512,2,4),(530,'','遗精',512,2,4),(531,'','射精异常呈红色',512,2,4),(532,'','男性勃起异常症状',0,2,3),(533,'','无法勃起',532,2,4),(534,'','勃起不坚',532,2,4),(535,'','勃起疼痛',532,2,4),(536,'','勃起时间短',532,2,4),(537,'','持续勃起',532,2,4),(538,'','硬不起来',532,2,4),(539,'','勃起障碍',532,2,4),(540,'','勃起背曲或侧弯',532,2,4),(541,'','性欲亢进',532,2,4),(542,'','阴茎勃起困难',532,2,4),(543,'','性欲亢进等',532,2,4),(544,'','勃起困难',532,2,4),(545,'','勃而不坚',532,2,4),(546,'','勃起后维持时间短',532,2,4),(547,'','勃起阴茎短小',532,2,4),(548,'','勃起龟头小',532,2,4),(549,'','排尿异常',0,2,3),(550,'','尿频',549,2,4),(551,'','尿急',549,2,4),(552,'','尿不尽',549,2,4),(553,'','小便有泡沫',549,2,4),(554,'','小便刺痛',549,2,4),(555,'','小便疼痛',549,2,4),(556,'','小便带血',549,2,4),(557,'','小便黄',549,2,4),(558,'','小便有异味',549,2,4),(559,'','排尿困难',549,2,4),(560,'','血尿',549,2,4),(561,'','小便滴白',549,2,4),(562,'','尿无力',549,2,4),(563,'','尿道口粘连',549,2,4),(564,'','尿浑浊',549,2,4),(565,'','尿黄',549,2,4),(566,'','尿滴白',549,2,4),(567,'','尿分叉',549,2,4),(568,'','尿困难',549,2,4),(569,'','尿等待',549,2,4),(570,'','尿臭',549,2,4),(571,'','小便痒',549,2,4),(572,'','尿痛',549,2,4),(573,'','尿分泌物流脓尿灼热',549,2,4),(574,'','尿泡沫',549,2,4),(580,'','hehe',453,2,4);

/*Table structure for table `data_attr_grp` */

DROP TABLE IF EXISTS `data_attr_grp`;

CREATE TABLE `data_attr_grp` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `grp` varchar(32) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `data_attr_grp` */

insert  into `data_attr_grp`(`sid`,`grp`) values (1,'病种'),(2,'症状');

/*Table structure for table `data_attr_meta` */

DROP TABLE IF EXISTS `data_attr_meta`;

CREATE TABLE `data_attr_meta` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `val` varchar(64) CHARACTER SET utf8 NOT NULL,
  `level` int(11) NOT NULL COMMENT '同一组中上下级排序(第几层,从0开始连续)',
  `grp` int(11) NOT NULL COMMENT '相同GRPID 为同一组',
  PRIMARY KEY (`sid`),
  UNIQUE KEY `level` (`level`,`grp`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `data_attr_meta` */

insert  into `data_attr_meta`(`sid`,`val`,`level`,`grp`) values (1,'病种',0,1),(2,'疾病',1,1),(3,'大症状',0,2),(4,'小症状',1,2);

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

/*Data for the table `data_doctor` */

insert  into `data_doctor`(`sid`,`id`,`name`,`pwd`,`avatar`,`date`) values (1,'lml','李美龙','90966a2a6ecc55926deb0b7830c1bca868d32df13b4f1f31a90a6b00dc305','lml.jpg','2016-05-16'),(2,'zyl','张耀龙','b6b43d151f19dd56ef62cb839d465e48be70c159a3951080f874de2a793d3','zyl.jpg','2016-05-16'),(3,'zdz','郑殿增','b6b43d151f19dd56ef62cb839d465e48be70c159a3951080f874de2a793d3','zdz.jpg','2016-05-16'),(4,'cyl','陈开亮','b6b43d151f19dd56ef62cb839d465e48be70c159a3951080f874de2a793d3','ckl.jpg','2016-05-16'),(5,'zly','郑隆邺','b6b43d151f19dd56ef62cb839d465e48be70c159a3951080f874de2a793d3','zly.jpg','2016-05-16'),(6,'zjf','张俊峰','b6b43d151f19dd56ef62cb839d465e48be70c159a3951080f874de2a793d3','zjf.jpg','2016-05-16'),(7,'cxq','陈希球','b6b43d151f19dd56ef62cb839d465e48be70c159a3951080f874de2a793d3','cxq.jpg','2016-05-16'),(8,'lzg','李志公','b6b43d151f19dd56ef62cb839d465e48be70c159a3951080f874de2a793d3','lzg.jpg','2016-05-16'),(9,'hyt','韩用涛','b6b43d151f19dd56ef62cb839d465e48be70c159a3951080f874de2a793d3','hyt.jpg','2016-05-16'),(10,'wrh','吴任红','b6b43d151f19dd56ef62cb839d465e48be70c159a3951080f874de2a793d3','wrh.jpg','2016-05-16');

/*Table structure for table `data_doctor_ext` */

DROP TABLE IF EXISTS `data_doctor_ext`;

CREATE TABLE `data_doctor_ext` (
  `dod` int(10) unsigned DEFAULT NULL COMMENT 'doctor sid',
  `dlv` int(11) DEFAULT NULL COMMENT 'doctor lv meta id',
  `start` int(11) DEFAULT NULL COMMENT '诊后服务星',
  `hot` float DEFAULT NULL COMMENT '患者推荐热度(0-5)',
  `love` int(11) DEFAULT NULL COMMENT '爱心',
  `contribution` int(11) DEFAULT NULL COMMENT '贡献值',
  `desc` text COMMENT '简介',
  `spec` text COMMENT '擅长',
  `duty` bigint(20) DEFAULT NULL COMMENT '4进制表示,按行算位数,第二行第一列为第8位',
  UNIQUE KEY `dod` (`dod`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `data_doctor_ext` */

insert  into `data_doctor_ext`(`dod`,`dlv`,`start`,`hot`,`love`,`contribution`,`desc`,`spec`,`duty`) values (3,3,2,0,0,0,'doc','spce',465675512940),(4,9,1,2,3,4,'doc555','spce677',1099538890815),(5,3,0,0,0,0,'doc','spce',NULL),(6,3,0,0,0,0,'doc','spce',NULL),(7,3,0,0,0,0,'doc','spce',NULL),(8,3,0,0,0,0,'doc','spce',NULL),(9,3,0,0,0,0,'doc','spce',NULL),(1,3,1,1,1,1,'ddd','weew',1924162138590),(2,3,10,22,2,2,'33','3',1108135150528);

/*Table structure for table `data_doctor_lv_meta` */

DROP TABLE IF EXISTS `data_doctor_lv_meta`;

CREATE TABLE `data_doctor_lv_meta` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `data` varchar(32) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `data_doctor_lv_meta` */

insert  into `data_doctor_lv_meta`(`sid`,`data`) values (3,'ccccccc'),(8,'dddp'),(9,'嗯嗯'),(10,'试试');

/*Table structure for table `data_doctor_present` */

DROP TABLE IF EXISTS `data_doctor_present`;

CREATE TABLE `data_doctor_present` (
  `sid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `dod` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `data_doctor_present` */

/*Table structure for table `data_letter` */

DROP TABLE IF EXISTS `data_letter`;

CREATE TABLE `data_letter` (
  `sid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `dod` int(11) DEFAULT NULL,
  `did` int(11) DEFAULT NULL,
  `content` text,
  `date` date NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `data_letter` */

insert  into `data_letter`(`sid`,`uid`,`dod`,`did`,`content`,`date`) values (3,6,1,1,'qrw','2016-06-15');

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
) ENGINE=MyISAM AUTO_INCREMENT=204 DEFAULT CHARSET=utf8;

/*Data for the table `data_oplog` */

insert  into `data_oplog`(`sid`,`optype`,`ipaddr`,`datetime`,`date`,`opflag`) values (33,'privUsr_auth','192.168.174.2','2016-05-09 19:47:43','2016-05-09',1),(32,'privUsr_auth','::1','2016-05-09 19:14:27','2016-05-09',1),(31,'privUsr_auth','::1','2016-05-09 18:41:11','2016-05-09',1),(30,'privUsr_auth','::1','2016-05-09 18:36:07','2016-05-09',1),(29,'privUsr_auth','::1','2016-05-09 16:12:15','2016-05-09',1),(28,'privUsr_auth','::1','2016-05-09 16:11:58','2016-05-09',0),(27,'privUsr_auth','::1','2016-05-09 16:11:49','2016-05-09',0),(26,'privUsr_auth','::1','2016-05-09 16:11:34','2016-05-09',0),(25,'privUsr_auth','::1','2016-05-09 16:11:31','2016-05-09',0),(24,'privUsr_auth','::1','2016-05-09 16:11:27','2016-05-09',0),(23,'privUsr_auth','::1','2016-05-09 16:11:24','2016-05-09',0),(22,'privUsr_auth','::1','2016-05-09 16:11:20','2016-05-09',0),(21,'privUsr_auth','::1','2016-05-09 16:11:15','2016-05-09',0),(20,'privUsr_auth','::1','2016-05-09 16:07:46','2016-05-09',1),(19,'privUsr_auth','::1','2016-05-09 15:55:21','2016-05-09',1),(18,'privUsr_auth','::1','2016-05-09 15:50:39','2016-05-09',1),(34,'privUsr_auth','::1','2016-05-10 09:03:48','2016-05-10',1),(35,'privUsr_auth','::1','2016-05-10 10:31:41','2016-05-10',0),(36,'privUsr_auth','::1','2016-05-10 10:31:46','2016-05-10',1),(37,'privUsr_auth','::1','2016-05-10 14:15:27','2016-05-10',1),(38,'privUsr_auth','::1','2016-05-10 16:02:11','2016-05-10',1),(39,'privUsr_auth','::1','2016-05-10 18:23:59','2016-05-10',1),(40,'privUsr_auth','::1','2016-05-11 09:08:26','2016-05-11',0),(41,'privUsr_auth','::1','2016-05-11 09:08:40','2016-05-11',1),(42,'privUsr_auth','::1','2016-05-11 10:18:53','2016-05-11',1),(43,'privUsr_auth','::1','2016-05-11 13:35:56','2016-05-11',1),(44,'privUsr_auth','::1','2016-05-11 16:05:42','2016-05-11',0),(45,'privUsr_auth','::1','2016-05-11 16:05:46','2016-05-11',1),(46,'privUsr_auth','::1','2016-05-11 16:39:25','2016-05-11',1),(47,'privUsr_auth','::1','2016-05-11 17:46:14','2016-05-11',1),(48,'privUsr_auth','::1','2016-05-12 09:15:25','2016-05-12',1),(49,'privUsr_auth','::1','2016-05-12 11:19:35','2016-05-12',0),(50,'privUsr_auth','::1','2016-05-12 11:19:40','2016-05-12',1),(51,'privUsr_auth','::1','2016-05-12 12:44:03','2016-05-12',1),(52,'privUsr_auth','::1','2016-05-12 15:24:18','2016-05-12',1),(53,'privUsr_auth','::1','2016-05-12 18:25:38','2016-05-12',1),(54,'privUsr_auth','::1','2016-05-13 09:55:03','2016-05-13',1),(55,'privUsr_auth','192.168.174.2','2016-05-13 13:29:16','2016-05-13',1),(56,'privUsr_auth','192.168.174.2','2016-05-13 14:42:05','2016-05-13',1),(57,'privUsr_auth','192.168.174.2','2016-05-13 15:20:40','2016-05-13',1),(58,'privUsr_auth','192.168.174.2','2016-05-13 17:40:36','2016-05-13',1),(59,'privUsr_auth','192.168.174.2','2016-05-14 09:20:58','2016-05-14',1),(60,'privUsr_auth','192.168.174.2','2016-05-14 12:55:45','2016-05-14',1),(61,'privUsr_auth','192.168.174.2','2016-05-14 13:54:20','2016-05-14',1),(62,'privUsr_auth','192.168.174.2','2016-05-14 16:22:47','2016-05-14',1),(63,'privUsr_auth','192.168.174.2','2016-05-16 09:17:49','2016-05-16',1),(64,'privUsr_auth','192.168.174.2','2016-05-16 14:00:24','2016-05-16',1),(65,'privUsr_auth','192.168.174.2','2016-05-16 15:51:39','2016-05-16',1),(66,'privUsr_auth','192.168.174.2','2016-05-16 16:43:02','2016-05-16',1),(67,'privUsr_auth','192.168.174.2','2016-05-17 09:02:27','2016-05-17',1),(68,'privUsr_auth','192.168.174.2','2016-05-17 10:15:02','2016-05-17',1),(69,'privUsr_auth','192.168.174.2','2016-05-17 12:16:12','2016-05-17',1),(70,'privUsr_auth','192.168.174.2','2016-05-17 14:51:16','2016-05-17',1),(71,'privUsr_auth','192.168.174.2','2016-05-17 17:09:07','2016-05-17',1),(72,'privUsr_auth','192.168.174.2','2016-05-17 17:13:03','2016-05-17',1),(73,'privUsr_auth','192.168.174.2','2016-05-17 18:31:57','2016-05-17',1),(74,'privUsr_auth','192.168.174.2','2016-05-17 20:06:17','2016-05-17',1),(75,'privUsr_auth','192.168.174.2','2016-05-19 09:13:21','2016-05-19',1),(76,'privUsr_auth','192.168.174.2','2016-05-19 10:02:44','2016-05-19',1),(77,'privUsr_auth','192.168.174.2','2016-05-19 10:41:23','2016-05-19',1),(78,'privUsr_auth','192.168.174.2','2016-05-19 12:12:35','2016-05-19',1),(79,'privUsr_auth','192.168.174.2','2016-05-19 15:28:30','2016-05-19',1),(80,'privUsr_auth','192.168.174.2','2016-05-19 17:47:00','2016-05-19',1),(81,'privUsr_auth','192.168.174.2','2016-05-20 09:02:25','2016-05-20',1),(82,'privUsr_auth','192.168.174.2','2016-05-20 10:15:18','2016-05-20',1),(83,'privUsr_auth','192.168.174.2','2016-05-20 12:45:36','2016-05-20',1),(84,'privUsr_auth','192.168.174.2','2016-05-20 15:32:52','2016-05-20',1),(85,'privUsr_auth','192.168.174.2','2016-05-20 17:26:14','2016-05-20',1),(86,'privUsr_auth','192.168.174.2','2016-05-21 14:27:27','2016-05-21',1),(87,'privUsr_auth','192.168.174.2','2016-05-23 09:15:33','2016-05-23',1),(88,'privUsr_auth','192.168.174.2','2016-05-23 10:40:47','2016-05-23',1),(89,'privUsr_auth','192.168.174.2','2016-05-23 12:55:51','2016-05-23',1),(90,'privUsr_auth','192.168.174.2','2016-05-23 14:46:43','2016-05-23',1),(91,'privUsr_auth','192.168.174.2','2016-05-23 17:02:22','2016-05-23',1),(92,'privUsr_auth','192.168.174.2','2016-05-24 09:11:13','2016-05-24',1),(93,'privUsr_auth','192.168.174.2','2016-05-24 11:30:57','2016-05-24',1),(94,'privUsr_auth','192.168.174.2','2016-05-24 13:41:49','2016-05-24',1),(95,'privUsr_auth','192.168.174.2','2016-05-24 15:48:56','2016-05-24',1),(96,'privUsr_auth','192.168.174.2','2016-05-24 16:52:19','2016-05-24',1),(97,'privUsr_auth','192.168.174.2','2016-05-25 09:11:48','2016-05-25',1),(98,'privUsr_auth','192.168.174.2','2016-05-25 10:39:31','2016-05-25',1),(99,'privUsr_auth','192.168.174.2','2016-05-25 11:16:02','2016-05-25',1),(100,'privUsr_auth','192.168.174.2','2016-05-25 12:18:45','2016-05-25',1),(101,'privUsr_auth','192.168.174.2','2016-05-25 17:02:20','2016-05-25',1),(102,'privUsr_auth','192.168.174.2','2016-05-26 09:11:42','2016-05-26',1),(103,'privUsr_auth','192.168.174.2','2016-05-26 15:11:27','2016-05-26',1),(104,'privUsr_auth','192.168.174.2','2016-05-27 09:07:28','2016-05-27',1),(105,'privUsr_auth','192.168.174.2','2016-05-27 10:17:35','2016-05-27',1),(106,'privUsr_auth','192.168.174.2','2016-05-28 09:52:46','2016-05-28',1),(107,'privUsr_auth','192.168.174.2','2016-05-28 14:35:10','2016-05-28',1),(108,'privUsr_auth','192.168.174.2','2016-05-28 16:37:20','2016-05-28',1),(109,'privUsr_auth','192.168.174.2','2016-05-30 09:17:20','2016-05-30',1),(110,'privUsr_auth','192.168.174.2','2016-05-30 12:25:38','2016-05-30',1),(111,'privUsr_auth','192.168.174.2','2016-05-30 14:57:45','2016-05-30',1),(112,'privUsr_auth','192.168.174.2','2016-05-31 09:37:55','2016-05-31',1),(113,'privUsr_auth','192.168.174.2','2016-05-31 17:08:09','2016-05-31',1),(114,'privUsr_auth','192.168.174.2','2016-06-01 09:16:59','2016-06-01',1),(115,'privUsr_auth','192.168.174.2','2016-06-01 11:18:38','2016-06-01',1),(116,'privUsr_auth','192.168.174.2','2016-06-01 16:08:25','2016-06-01',1),(117,'privUsr_auth','192.168.174.2','2016-06-02 09:14:36','2016-06-02',0),(118,'privUsr_auth','192.168.174.2','2016-06-02 09:14:47','2016-06-02',0),(119,'privUsr_auth','192.168.174.2','2016-06-02 09:14:53','2016-06-02',1),(120,'privUsr_auth','192.168.174.2','2016-06-02 09:15:03','2016-06-02',0),(121,'privUsr_auth','192.168.174.2','2016-06-02 09:15:05','2016-06-02',1),(122,'privUsr_auth','192.168.174.2','2016-06-02 09:21:22','2016-06-02',0),(123,'privUsr_auth','192.168.174.2','2016-06-02 09:24:30','2016-06-02',0),(124,'privUsr_auth','192.168.174.2','2016-06-02 09:24:37','2016-06-02',1),(125,'privUsr_auth','192.168.174.2','2016-06-02 17:02:10','2016-06-02',1),(126,'privUsr_auth','192.168.174.2','2016-06-02 17:51:28','2016-06-02',1),(127,'privUsr_auth','192.168.174.2','2016-06-03 12:43:48','2016-06-03',1),(128,'privUsr_auth','192.168.174.2','2016-06-03 14:36:12','2016-06-03',1),(129,'privUsr_auth','192.168.174.2','2016-06-04 10:39:16','2016-06-04',1),(130,'privUsr_auth','192.168.174.2','2016-06-06 09:21:44','2016-06-06',1),(131,'privUsr_auth','192.168.174.2','2016-06-06 11:27:11','2016-06-06',1),(132,'privUsr_auth','192.168.174.2','2016-06-06 12:39:47','2016-06-06',1),(133,'privUsr_auth','192.168.174.2','2016-06-07 09:23:39','2016-06-07',1),(134,'privUsr_auth','192.168.174.2','2016-06-07 16:07:26','2016-06-07',1),(135,'privUsr_auth','192.168.174.2','2016-06-08 09:42:41','2016-06-08',1),(136,'privUsr_auth','192.168.174.2','2016-06-11 09:56:10','2016-06-11',1),(137,'privUsr_auth','192.168.174.2','2016-06-12 10:18:31','2016-06-12',1),(138,'privUsr_auth','192.168.174.2','2016-06-12 13:40:56','2016-06-12',1),(139,'privUsr_auth','192.168.174.2','2016-06-12 14:10:40','2016-06-12',1),(140,'privUsr_auth','192.168.174.2','2016-06-13 09:24:34','2016-06-13',1),(141,'privUsr_auth','192.168.174.2','2016-06-13 10:13:35','2016-06-13',1),(142,'privUsr_auth','192.168.174.2','2016-06-13 14:34:49','2016-06-13',1),(143,'privUsr_auth','192.168.174.2','2016-06-15 10:38:13','2016-06-15',1),(144,'privUsr_auth','192.168.174.2','2016-06-15 13:11:36','2016-06-15',1),(145,'privUsr_auth','192.168.174.2','2016-06-15 14:46:16','2016-06-15',1),(146,'privUsr_auth','192.168.174.2','2016-06-16 09:12:51','2016-06-16',1),(147,'privUsr_auth','192.168.174.2','2016-06-16 09:13:07','2016-06-16',1),(148,'privUsr_auth','192.168.174.2','2016-06-16 11:07:06','2016-06-16',1),(149,'privUsr_auth','192.168.174.2','2016-06-17 13:13:11','2016-06-17',1),(150,'privUsr_auth','192.168.1.24','2016-06-17 14:14:01','2016-06-17',1),(151,'privUsr_auth','192.168.174.2','2016-06-17 14:35:37','2016-06-17',1),(152,'privUsr_auth','192.168.1.24','2016-06-17 15:13:21','2016-06-17',1),(153,'privUsr_auth','192.168.174.2','2016-06-17 16:24:23','2016-06-17',1),(154,'privUsr_auth','192.168.174.2','2016-06-18 09:06:29','2016-06-18',1),(155,'privUsr_auth','192.168.174.2','2016-06-18 10:46:47','2016-06-18',1),(156,'privUsr_auth','192.168.174.2','2016-06-18 11:55:22','2016-06-18',1),(157,'privUsr_auth','192.168.174.2','2016-06-18 15:19:32','2016-06-18',1),(158,'privUsr_auth','192.168.174.2','2016-06-20 13:03:18','2016-06-20',1),(159,'privUsr_auth','192.168.174.2','2016-06-21 09:15:11','2016-06-21',1),(160,'privUsr_auth','192.168.174.2','2016-06-21 13:00:00','2016-06-21',1),(161,'privUsr_auth','192.168.174.2','2016-06-21 16:59:04','2016-06-21',1),(162,'privUsr_auth','192.168.174.2','2016-06-22 10:02:52','2016-06-22',1),(163,'privUsr_auth','192.168.174.2','2016-06-23 10:29:48','2016-06-23',1),(164,'privUsr_auth','192.168.174.2','2016-06-23 12:18:12','2016-06-23',1),(165,'privUsr_auth','192.168.1.15','2016-06-23 13:37:40','2016-06-23',1),(166,'privUsr_auth','192.168.1.15','2016-06-23 15:05:21','2016-06-23',1),(167,'privUsr_auth','192.168.174.2','2016-06-23 15:11:24','2016-06-23',1),(168,'privUsr_auth','192.168.174.2','2016-06-23 16:10:00','2016-06-23',1),(169,'privUsr_auth','192.168.174.2','2016-06-24 11:38:52','2016-06-24',1),(170,'privUsr_auth','192.168.1.21','2016-06-24 15:35:17','2016-06-24',1),(171,'privUsr_auth','192.168.1.21','2016-06-24 16:43:41','2016-06-24',1),(172,'privUsr_auth','192.168.174.2','2016-06-24 17:21:14','2016-06-24',1),(173,'privUsr_auth','192.168.174.2','2016-06-25 09:26:09','2016-06-25',1),(174,'privUsr_auth','192.168.174.2','2016-06-25 11:11:37','2016-06-25',1),(175,'privUsr_auth','192.168.174.2','2016-06-25 12:46:36','2016-06-25',1),(176,'privUsr_auth','192.168.1.8','2016-06-25 13:24:11','2016-06-25',1),(177,'privUsr_auth','192.168.174.2','2016-06-25 15:41:52','2016-06-25',1),(178,'privUsr_auth','192.168.174.2','2016-06-27 09:25:40','2016-06-27',1),(179,'privUsr_auth','192.168.174.2','2016-06-29 12:19:33','2016-06-29',1),(180,'privUsr_auth','192.168.174.2','2016-06-29 14:29:50','2016-06-29',1),(181,'privUsr_auth','192.168.1.21','2016-06-29 16:11:29','2016-06-29',0),(182,'privUsr_auth','192.168.1.21','2016-06-29 16:11:42','2016-06-29',1),(183,'privUsr_auth','192.168.1.21','2016-06-29 17:38:47','2016-06-29',1),(184,'privUsr_auth','192.168.174.2','2016-06-29 17:58:46','2016-06-29',1),(185,'privUsr_auth','192.168.174.2','2016-06-30 13:49:31','2016-06-30',1),(186,'privUsr_auth','192.168.174.2','2016-06-30 14:42:34','2016-06-30',1),(187,'privUsr_auth','192.168.174.2','2016-06-30 17:31:19','2016-06-30',1),(188,'privUsr_auth','192.168.174.2','2016-06-30 18:28:13','2016-06-30',1),(189,'privUsr_auth','192.168.174.2','2016-07-01 12:55:48','2016-07-01',1),(190,'privUsr_auth','192.168.174.2','2016-07-01 13:59:30','2016-07-01',1),(191,'privUsr_auth','192.168.1.8','2016-07-01 14:12:17','2016-07-01',0),(192,'privUsr_auth','192.168.1.8','2016-07-01 14:12:45','2016-07-01',1),(193,'privUsr_auth','192.168.1.15','2016-07-01 14:14:10','2016-07-01',1),(194,'privUsr_auth','192.168.1.16','2016-07-01 14:17:34','2016-07-01',1),(195,'privUsr_auth','192.168.1.12','2016-07-01 14:18:47','2016-07-01',1),(196,'privUsr_auth','192.168.1.14','2016-07-01 14:18:54','2016-07-01',1),(197,'privUsr_auth','192.168.1.14','2016-07-01 14:27:31','2016-07-01',1),(198,'privUsr_auth','192.168.174.2','2016-07-02 09:47:57','2016-07-02',1),(199,'privUsr_auth','192.168.174.2','2016-07-02 13:16:53','2016-07-02',1),(200,'privUsr_auth','192.168.174.2','2016-07-02 14:49:45','2016-07-02',1),(201,'privUsr_auth','192.168.174.2','2016-07-04 08:59:40','2016-07-04',1),(202,'privUsr_auth','192.168.174.2','2016-07-04 09:45:52','2016-07-04',1),(203,'privUsr_auth','192.168.174.2','2016-07-04 14:04:28','2016-07-04',1);

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

/*Table structure for table `data_symptom_disease` */

DROP TABLE IF EXISTS `data_symptom_disease`;

CREATE TABLE `data_symptom_disease` (
  `syd` int(11) DEFAULT NULL,
  `did` int(11) DEFAULT NULL,
  UNIQUE KEY `syd` (`syd`,`did`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `data_symptom_disease` */

insert  into `data_symptom_disease`(`syd`,`did`) values (580,290),(580,294),(580,297),(580,300),(580,304),(580,307),(580,312),(580,314),(580,320),(580,321),(580,327);

/*Table structure for table `data_tags` */

DROP TABLE IF EXISTS `data_tags`;

CREATE TABLE `data_tags` (
  `sid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text` varchar(128) DEFAULT NULL,
  `sys` enum('y','n') DEFAULT 'n',
  PRIMARY KEY (`sid`),
  UNIQUE KEY `text` (`text`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `data_tags` */

insert  into `data_tags`(`sid`,`text`,`sys`) values (1,'病因','y'),(2,'症状','y'),(3,'检查','y'),(4,'治疗','y'),(5,'危害','y'),(6,'保健','y'),(7,'知识介绍','y');

/*Table structure for table `data_url` */

DROP TABLE IF EXISTS `data_url`;

CREATE TABLE `data_url` (
  `sid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mod` enum('artical','ask') NOT NULL COMMENT '模块',
  `url` varchar(64) NOT NULL COMMENT 'URL名，不带/',
  `mid` int(11) NOT NULL COMMENT '模块ID',
  PRIMARY KEY (`sid`),
  UNIQUE KEY `mod` (`mod`,`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `data_url` */

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
  `wa` enum('y','n') DEFAULT 'n' COMMENT 'y 4 water arm',
  `date` date NOT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `data_user` */

insert  into `data_user`(`sid`,`email`,`name`,`pwd`,`phone`,`avatar`,`rpq`,`rpa`,`wa`,`date`) values (6,'aaa@qq.com','balabala','04efe2a42c24e1adfbb9ef7f936c8397c5588b057d46646ef0e177b90ed60','','181940497.png','my card id?','302404501200','y','2016-05-13'),(2,'test@qq.com','test','df747c1d7e3a2c85c0c980e08df010434246120e79aac9be5f8759b2483bf','13640898273','181940360.png','my card id?','302404501200','y','2016-05-13'),(5,'uuu@qq.com','uuu','944bbe70185871dd55feb290572f41f0961e3bc30131a9d0bfdb3c7639a46','','104043359.png','my card id?','302404501200','n','2016-05-13'),(4,'love@163.com','lvoe','70973a8b52c709cb352896d872343c3b591f8e3d3493580726a1a1a6ac685','13650506262','181941301.png','my card id?','302404501200','y','2016-05-13'),(7,'bbbZ@cc.com','apocalypse','68c73fcf492a8448c1b609e544f58fe8d8c1a8889bf2a058e91c91bdcb6c4','13641414545','181940360.png','my card id?','302404501200','y','2016-05-13'),(8,'yyy@ll.com','yyx','9fd7cf97ea4a018af7d3487d39d06aab50a8357f992fb890ac243b6da9194','13052526463','181941301.png','my card id?','302404501200','y','2016-05-13'),(9,'111@aa.com','111','26f46fcca27f5971aea868ca6ed739e7ca42b5af7a27101960c95503c36c3','','181940360.png','my card id?','302404501200','y','2016-05-13'),(10,'222@qq.com','222','1ad05462722af6d33e3fc854e08965774936543eab30b218ca2701b978a4b','','100883320.png','my card id?','302404501200','y','2016-05-13'),(11,'333@333.com','333','c7ddfc0c4e14f338c25e7ec505f733772d7eec5baa0ed219956ef1159d522','','100883320.png','my card id?','302404501200','y','2016-05-13'),(12,'jjj@ll.com','jjj','124e344057e3c1c6ebb66a31bda28c722678e5083671e376537ddfd540e1f','','181940497.png','my card id?','302404501200','y','2016-05-13'),(13,'pagbe@cc.om','ccc','c105e1868e1198a7da94d4d0bc1cb44e0309dd3d23ba1721c6459caa00e91','','181941301.png','my card id?','302404501200','y','2016-05-13'),(14,'44@111.com','634','4313a1ba02b0ca71adead80369a9054152afc5cb46d12cca283dce9cee2a3','13650506262','104043359.png','my card id?','302404501200','y','2016-05-13'),(15,'226qq@fwqr.com','asdwe','e20510d4864822eb7cfbab825ff8dfb0640cd5b829518ee6c14604098f656','','181940360.png','my card id?','302404501200','y','2016-05-13'),(1,'xlong@qq.com','xlong','df747c1d7e3a2c85c0c980e08df010434246120e79aac9be5f8759b2483bf','13650506262','181941301.png','','','y','0000-00-00'),(16,'qq@cc.com','user','13d48ca9551a1593dd3fc01c58c9b5bf8416be87f3082b17fce982d9d5425','14521478521','181941301.png','my card id?','302404501200','y','2016-06-15');

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
