DROP TABLE IF EXISTS `data_priv`;

CREATE TABLE `data_priv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) COLLATE utf8_general_ci NOT NULL,
  `pass` varchar(61) COLLATE utf8_general_ci NOT NULL,
  `privilege` varchar(30) COLLATE utf8_general_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `tny_priv` default ps:007007*/

insert  into `data_priv`(`id`,`email`,`pass`,`privilege`,`time`) 
values 
(0,'awei.tian@qq.com','ff76f7dbd32701d7e64ab84d2a475371653e089a267442caf47e5eb0eb8a1','root','2010-06-29 20:54:12')
;
