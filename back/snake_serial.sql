SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `snake_serial`;
CREATE TABLE `snake_serial` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '序号',
  `serial` varchar(255) COLLATE utf8_bin DEFAULT '' COMMENT '系列号',
  `can_use_num` int(11) unsigned DEFAULT '0' COMMENT '可使用次数',
  `used_num` int(11) unsigned DEFAULT '0' COMMENT '已使用次数',
  `surplus_num` int(11) unsigned DEFAULT '0' COMMENT '剩余次数',
  `createtime` int(11) unsigned DEFAULT '0' COMMENT '最后登录时间',
  `status` int(2) DEFAULT '1' COMMENT '状态1有效2失效',
  `userid` int(11) DEFAULT '0' COMMENT '用户表user的id号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('90','1TAM1K7X0DY4L','5','0','5','1483767247','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('104','1PMAYGFZ94JQ7','5','0','5','1483767400','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('105','1MH726I9GSNFT','5','0','5','1483767400','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('106','1B9DP5HKQTGM6','5','0','5','1483767400','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('107','1BMD90QXW5LGA','5','0','5','1483767400','1','1');
