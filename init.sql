CREATE TABLE `data_tree` (
  `sid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL COMMENT '名称',
  `url` varchar(128) NOT NULL COMMENT '生成路径',
  `order` int(11) DEFAULT '0' COMMENT '排序',
  `layout` varchar(64) DEFAULT NULL COMMENT '皮肤保留字段',
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `lft` (`lft`),
  UNIQUE KEY `rgt` (`rgt`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8