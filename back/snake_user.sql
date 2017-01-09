SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `snake_user`;
CREATE TABLE `snake_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_bin DEFAULT '' COMMENT '用户名',
  `password` varchar(255) COLLATE utf8_bin DEFAULT '' COMMENT '密码',
  `loginnum` int(11) DEFAULT '0' COMMENT '登陆次数',
  `last_login_ip` varchar(255) COLLATE utf8_bin DEFAULT '' COMMENT '最后登录IP',
  `last_login_time` int(11) DEFAULT '0' COMMENT '最后登录时间',
  `real_name` varchar(255) COLLATE utf8_bin DEFAULT '' COMMENT '真实姓名',
  `status` int(1) DEFAULT '0' COMMENT '状态',
  `typeid` int(11) DEFAULT '1' COMMENT '用户角色id',
  `serialnum` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '系列号数量',
  `maxtimes` int(11) unsigned DEFAULT '0' COMMENT '生产系列号的最大使用次数',
  `maxnum` int(11) unsigned DEFAULT '0' COMMENT '生成系列号的最大数量',
  `pid` int(11) DEFAULT '0' COMMENT '上级部门id',
  `son` varchar(255) CHARACTER SET utf8 DEFAULT '' COMMENT '下级用户的id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

insert into `snake_user`(`id`,`username`,`password`,`loginnum`,`last_login_ip`,`last_login_time`,`real_name`,`status`,`typeid`,`serialnum`,`maxtimes`,`maxnum`,`pid`,`son`) values('1','admin','21232f297a57a5a743894a0e4a801fc3','171','127.0.0.1','1483931606','admin','1','1','1','0','0','0','');
insert into `snake_user`(`id`,`username`,`password`,`loginnum`,`last_login_ip`,`last_login_time`,`real_name`,`status`,`typeid`,`serialnum`,`maxtimes`,`maxnum`,`pid`,`son`) values('73','张三','01d7f40760960e7bd9443513f22ab9af','4','127.0.0.1','1483886668','张三','1','11','2','5','20','0','74,75');
insert into `snake_user`(`id`,`username`,`password`,`loginnum`,`last_login_ip`,`last_login_time`,`real_name`,`status`,`typeid`,`serialnum`,`maxtimes`,`maxnum`,`pid`,`son`) values('74','李四','dc3a8f1670d65bea69b7b65048a0ac40','4','127.0.0.1','1483930270','李四','1','3','3','5','20','73','75');
insert into `snake_user`(`id`,`username`,`password`,`loginnum`,`last_login_ip`,`last_login_time`,`real_name`,`status`,`typeid`,`serialnum`,`maxtimes`,`maxnum`,`pid`,`son`) values('75','王二','2aa3f4ba3af7dbb6821c4f0e977610a1','5','127.0.0.1','1483887056','王二','1','9','3','5','20','74','');
