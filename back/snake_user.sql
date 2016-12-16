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
  `deptid` int(11) DEFAULT '0' COMMENT '上级部门id',
  `pid` int(11) DEFAULT '0' COMMENT '上级部门id',
  `son` varchar(255) CHARACTER SET utf8 DEFAULT '' COMMENT '下级用户的id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

insert into `snake_user`(`id`,`username`,`password`,`loginnum`,`last_login_ip`,`last_login_time`,`real_name`,`status`,`typeid`,`serialnum`,`maxtimes`,`maxnum`,`deptid`,`pid`,`son`) values('1','admin','21232f297a57a5a743894a0e4a801fc3','105','127.0.0.1','1481880583','admin','1','1','30','0','0','0','0','');
insert into `snake_user`(`id`,`username`,`password`,`loginnum`,`last_login_ip`,`last_login_time`,`real_name`,`status`,`typeid`,`serialnum`,`maxtimes`,`maxnum`,`deptid`,`pid`,`son`) values('2','xiaobai','e10adc3949ba59abbe56e057f20f883e','7','127.0.0.1','1480483521','小白','1','2','0','0','0','0','0','');
insert into `snake_user`(`id`,`username`,`password`,`loginnum`,`last_login_ip`,`last_login_time`,`real_name`,`status`,`typeid`,`serialnum`,`maxtimes`,`maxnum`,`deptid`,`pid`,`son`) values('3','xuchaobing','c18d65c8abed9fc4028365a00422f2e1','1','127.0.0.1','1477361836','朝兵','1','3','0','0','0','0','0','');
insert into `snake_user`(`id`,`username`,`password`,`loginnum`,`last_login_ip`,`last_login_time`,`real_name`,`status`,`typeid`,`serialnum`,`maxtimes`,`maxnum`,`deptid`,`pid`,`son`) values('4','zhangsan','21232f297a57a5a743894a0e4a801fc3','32','127.0.0.1','1477365248','zhangsan','1','2','0','0','0','0','0','');
insert into `snake_user`(`id`,`username`,`password`,`loginnum`,`last_login_ip`,`last_login_time`,`real_name`,`status`,`typeid`,`serialnum`,`maxtimes`,`maxnum`,`deptid`,`pid`,`son`) values('5','lisi','4297f44b13955235245b2497399d7a93','6','127.0.0.1','1470368260','lisi','1','2','0','0','0','0','0','');
insert into `snake_user`(`id`,`username`,`password`,`loginnum`,`last_login_ip`,`last_login_time`,`real_name`,`status`,`typeid`,`serialnum`,`maxtimes`,`maxnum`,`deptid`,`pid`,`son`) values('6','wangwu','c18d65c8abed9fc4028365a00422f2e1','1','127.0.0.1','1477361836','wangwu','1','3','0','0','0','0','0','');
insert into `snake_user`(`id`,`username`,`password`,`loginnum`,`last_login_ip`,`last_login_time`,`real_name`,`status`,`typeid`,`serialnum`,`maxtimes`,`maxnum`,`deptid`,`pid`,`son`) values('7','zhangsan','21232f297a57a5a743894a0e4a801fc3','32','127.0.0.1','1477365248','zhangsan','1','2','0','0','0','0','0','');
insert into `snake_user`(`id`,`username`,`password`,`loginnum`,`last_login_ip`,`last_login_time`,`real_name`,`status`,`typeid`,`serialnum`,`maxtimes`,`maxnum`,`deptid`,`pid`,`son`) values('8','lisi123','c3cb6d12c40908943b64bc0681af47db','15','127.0.0.1','1477471885','lisi','1','3','0','0','0','0','0','');
insert into `snake_user`(`id`,`username`,`password`,`loginnum`,`last_login_ip`,`last_login_time`,`real_name`,`status`,`typeid`,`serialnum`,`maxtimes`,`maxnum`,`deptid`,`pid`,`son`) values('9','wangwu','c18d65c8abed9fc4028365a00422f2e1','1','127.0.0.1','1477361836','wangwu','1','3','0','0','0','0','0','');
insert into `snake_user`(`id`,`username`,`password`,`loginnum`,`last_login_ip`,`last_login_time`,`real_name`,`status`,`typeid`,`serialnum`,`maxtimes`,`maxnum`,`deptid`,`pid`,`son`) values('10','zhangsan','21232f297a57a5a743894a0e4a801fc3','32','127.0.0.1','1477365248','zhangsan','1','2','0','0','0','0','0','');
insert into `snake_user`(`id`,`username`,`password`,`loginnum`,`last_login_ip`,`last_login_time`,`real_name`,`status`,`typeid`,`serialnum`,`maxtimes`,`maxnum`,`deptid`,`pid`,`son`) values('11','lisi','4297f44b13955235245b2497399d7a93','6','127.0.0.1','1470368260','lisi','1','2','0','0','0','0','0','');
insert into `snake_user`(`id`,`username`,`password`,`loginnum`,`last_login_ip`,`last_login_time`,`real_name`,`status`,`typeid`,`serialnum`,`maxtimes`,`maxnum`,`deptid`,`pid`,`son`) values('12','wangwu','c18d65c8abed9fc4028365a00422f2e1','1','127.0.0.1','1477361836','wangwu','1','3','0','0','0','0','0','');
insert into `snake_user`(`id`,`username`,`password`,`loginnum`,`last_login_ip`,`last_login_time`,`real_name`,`status`,`typeid`,`serialnum`,`maxtimes`,`maxnum`,`deptid`,`pid`,`son`) values('13','zhangsan','21232f297a57a5a743894a0e4a801fc3','32','127.0.0.1','1477365248','zhangsan','1','2','0','0','0','0','0','');
insert into `snake_user`(`id`,`username`,`password`,`loginnum`,`last_login_ip`,`last_login_time`,`real_name`,`status`,`typeid`,`serialnum`,`maxtimes`,`maxnum`,`deptid`,`pid`,`son`) values('14','lisi','4297f44b13955235245b2497399d7a93','6','127.0.0.1','1470368260','lisi','1','2','0','0','0','0','0','');
insert into `snake_user`(`id`,`username`,`password`,`loginnum`,`last_login_ip`,`last_login_time`,`real_name`,`status`,`typeid`,`serialnum`,`maxtimes`,`maxnum`,`deptid`,`pid`,`son`) values('15','wangwu','c18d65c8abed9fc4028365a00422f2e1','1','127.0.0.1','1477361836','wangwu','1','3','0','0','0','2','0','');
insert into `snake_user`(`id`,`username`,`password`,`loginnum`,`last_login_ip`,`last_login_time`,`real_name`,`status`,`typeid`,`serialnum`,`maxtimes`,`maxnum`,`deptid`,`pid`,`son`) values('16','zhangsan','21232f297a57a5a743894a0e4a801fc3','32','127.0.0.1','1477365248','zhangsan','1','2','0','0','0','2','0','');
insert into `snake_user`(`id`,`username`,`password`,`loginnum`,`last_login_ip`,`last_login_time`,`real_name`,`status`,`typeid`,`serialnum`,`maxtimes`,`maxnum`,`deptid`,`pid`,`son`) values('17','lisi','4297f44b13955235245b2497399d7a93','6','127.0.0.1','1470368260','lisi','1','2','0','0','0','0','0','');
insert into `snake_user`(`id`,`username`,`password`,`loginnum`,`last_login_ip`,`last_login_time`,`real_name`,`status`,`typeid`,`serialnum`,`maxtimes`,`maxnum`,`deptid`,`pid`,`son`) values('18','wangwu','c18d65c8abed9fc4028365a00422f2e1','1','127.0.0.1','1477361836','wangwu','1','3','0','0','0','0','0','');
insert into `snake_user`(`id`,`username`,`password`,`loginnum`,`last_login_ip`,`last_login_time`,`real_name`,`status`,`typeid`,`serialnum`,`maxtimes`,`maxnum`,`deptid`,`pid`,`son`) values('19','zhangsan','21232f297a57a5a743894a0e4a801fc3','32','127.0.0.1','1477365248','zhangsan','1','2','0','0','0','0','0','');
insert into `snake_user`(`id`,`username`,`password`,`loginnum`,`last_login_ip`,`last_login_time`,`real_name`,`status`,`typeid`,`serialnum`,`maxtimes`,`maxnum`,`deptid`,`pid`,`son`) values('20','lisi','4297f44b13955235245b2497399d7a93','6','127.0.0.1','1470368260','lisi','1','2','0','0','0','0','0','');
insert into `snake_user`(`id`,`username`,`password`,`loginnum`,`last_login_ip`,`last_login_time`,`real_name`,`status`,`typeid`,`serialnum`,`maxtimes`,`maxnum`,`deptid`,`pid`,`son`) values('21','wangwu','c18d65c8abed9fc4028365a00422f2e1','1','127.0.0.1','1477361836','wangwu','1','3','0','0','0','0','0','');
insert into `snake_user`(`id`,`username`,`password`,`loginnum`,`last_login_ip`,`last_login_time`,`real_name`,`status`,`typeid`,`serialnum`,`maxtimes`,`maxnum`,`deptid`,`pid`,`son`) values('22','zhangsan','21232f297a57a5a743894a0e4a801fc3','32','127.0.0.1','1477365248','zhangsan','1','2','0','0','0','0','0','');
insert into `snake_user`(`id`,`username`,`password`,`loginnum`,`last_login_ip`,`last_login_time`,`real_name`,`status`,`typeid`,`serialnum`,`maxtimes`,`maxnum`,`deptid`,`pid`,`son`) values('23','lisi','4297f44b13955235245b2497399d7a93','6','127.0.0.1','1470368260','lisi','1','2','0','0','0','0','0','');
insert into `snake_user`(`id`,`username`,`password`,`loginnum`,`last_login_ip`,`last_login_time`,`real_name`,`status`,`typeid`,`serialnum`,`maxtimes`,`maxnum`,`deptid`,`pid`,`son`) values('24','wangwu','c18d65c8abed9fc4028365a00422f2e1','1','127.0.0.1','1477361836','wangwu','1','3','0','0','0','0','0','');
insert into `snake_user`(`id`,`username`,`password`,`loginnum`,`last_login_ip`,`last_login_time`,`real_name`,`status`,`typeid`,`serialnum`,`maxtimes`,`maxnum`,`deptid`,`pid`,`son`) values('25','zhangsan','21232f297a57a5a743894a0e4a801fc3','32','127.0.0.1','1477365248','zhangsan','1','2','0','0','0','0','0','');
insert into `snake_user`(`id`,`username`,`password`,`loginnum`,`last_login_ip`,`last_login_time`,`real_name`,`status`,`typeid`,`serialnum`,`maxtimes`,`maxnum`,`deptid`,`pid`,`son`) values('27','wangwu1','dec0ef5afdf085ee35bdd941ab5ab4f6','3','127.0.0.1','1481855875','wangwu','1','3','0','0','0','0','0','');
insert into `snake_user`(`id`,`username`,`password`,`loginnum`,`last_login_ip`,`last_login_time`,`real_name`,`status`,`typeid`,`serialnum`,`maxtimes`,`maxnum`,`deptid`,`pid`,`son`) values('28','xiaoming1','97304531204ef7431330c20427d95481','7','127.0.0.1','1480656785','小明','1','2','0','0','0','0','0','');
