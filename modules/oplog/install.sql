DROP TABLE IF EXISTS `oplog`;

CREATE TABLE `oplog` (
  `sid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `optype` varchar(16) NOT NULL,
  `ipaddr` varchar(15) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date` date NOT NULL,
  `opflag` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`sid`),
  KEY `optype` (`optype`,`ipaddr`,`date`,`opflag`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;