SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `snake_dept`;
CREATE TABLE `snake_dept` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `deptname` varchar(155) DEFAULT NULL COMMENT '角色名称',
  `maxtimes` int(11) unsigned DEFAULT '0' COMMENT '生产系列号的最大使用次数',
  `maxnum` int(11) unsigned DEFAULT '0' COMMENT '生成系列号的最大数量',
  `pid` int(11) DEFAULT '0' COMMENT '上级部门id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

insert into `snake_dept`(`id`,`deptname`,`maxtimes`,`maxnum`,`pid`) values('1','北京部','0','0','0');
insert into `snake_dept`(`id`,`deptname`,`maxtimes`,`maxnum`,`pid`) values('2','交易所A','0','0','1');
insert into `snake_dept`(`id`,`deptname`,`maxtimes`,`maxnum`,`pid`) values('3','交易所B','12','50','2');
insert into `snake_dept`(`id`,`deptname`,`maxtimes`,`maxnum`,`pid`) values('4','会员单位Ad','50','30','2');
