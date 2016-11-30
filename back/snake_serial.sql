SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `snake_serial`;
CREATE TABLE `snake_serial` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '序号',
  `serial` varchar(255) COLLATE utf8_bin DEFAULT '' COMMENT '系列号',
  `can_use_num` int(11) unsigned DEFAULT '0' COMMENT '可使用次数',
  `used_num` int(11) unsigned DEFAULT '0' COMMENT '已使用次数',
  `surplus_num` int(11) unsigned DEFAULT '0' COMMENT '剩余次数',
  `createtime` int(11) unsigned DEFAULT '0' COMMENT '最后登录时间',
  `status` int(1) DEFAULT '1' COMMENT '状态:1有效;2失效',
  `userid` int(11) DEFAULT '0' COMMENT '用户表user的id号',
  PRIMARY KEY (`id`),
  KEY `serial` (`serial`),
  KEY `status` (`status`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('2','1YWGKPV7H1F2D','10','0','10','1480515012','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('3','1IFWK13P42REX','10','0','10','1480515012','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('4','1NTOMVQK72Z14','20','0','20','1480516922','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('5','1QFHBVP0279K8','20','0','20','1480516922','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('6','1WKVYZSBIHGTD','20','0','20','1480516922','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('7','12HZBYGKF098Q','20','0','20','1480516922','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('8','145XZRPMULHS2','20','0','20','1480516922','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('9','1KDU8LOHMVJWT','20','0','20','1480516922','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('10','1FLSTI264UHYG','20','0','20','1480516922','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('11','113JLCKY7FU8A','20','0','20','1480516922','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('12','1A3ZBINTH9GOW','20','0','20','1480516922','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('13','11DHKO69P35FX','20','0','20','1480516922','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('14','16Z3MF5QRI21H','20','0','20','1480516922','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('15','10YIEMVZN82B4','20','0','20','1480516922','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('16','1L8GEMAIVX5WJ','20','0','20','1480516922','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('17','1L50GWQO1XHZ6','20','0','20','1480516922','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('18','1BP72O4XNLMYI','20','0','20','1480516922','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('19','13ZWRG8D1OK7F','20','0','20','1480516922','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('20','1ZE4Q0IGU861Y','20','0','20','1480516922','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('21','1I6CPOH7DE8WU','20','0','20','1480516922','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('22','1NSPTECQ5J42X','20','0','20','1480516922','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('23','11KL83IZFGMNB','20','0','20','1480516922','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('24','1Y4RVK0PUT1F5','20','0','20','1480516922','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('25','13NS92I7A0B8P','20','0','20','1480516922','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('26','1BW9HEFQKGJ2L','20','0','20','1480516922','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('27','11ZMX8QOK3NIP','20','0','20','1480516922','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('28','1RV9Q5AN4KPDJ','20','0','20','1480516922','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('29','1FL10TYI6GEDH','20','0','20','1480516922','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('30','15TKV431YED0A','20','0','20','1480516922','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('31','1NE5KD9HWOC8B','20','0','20','1480516922','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('32','13DRYZJTQ1V4U','20','0','20','1480516922','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('33','1DJWGCXLNR6QU','20','0','20','1480516922','1','1');
