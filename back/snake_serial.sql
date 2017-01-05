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
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('1','11CNE03WRFG7I','4','4','0','1480573435','2','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('2','1GRYBWHD9VXCJ','20','4','16','1480573435','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('3','1K9P0ZJBM6QWD','20','0','20','1480573435','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('4','1DS4N3GF51C7T','20','0','20','1480573435','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('5','1K0FQO7B35RYX','20','0','20','1480573435','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('6','16AJXE58FTU0S','20','0','20','1480573435','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('7','1T7EW3SJY9NAC','20','0','20','1480573435','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('8','1OYRI1DQ3M6UA','20','0','20','1480573435','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('9','123E1N70Z84GX','20','0','20','1480573435','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('10','1N49MKLT6P320','20','0','20','1480573435','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('11','1RNSHCG7O14V5','20','0','20','1480573435','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('12','1L21CGWS7BPO8','20','0','20','1480573435','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('13','1PC45NZA6RXOG','20','0','20','1480573435','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('14','196YR5NS0PGO1','20','0','20','1480573435','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('15','1D937ANM0GF1O','20','0','20','1480573435','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('16','1ICL326GAR50J','20','0','20','1480573435','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('17','13GHSB2O8TEUY','20','0','20','1480573435','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('18','13F7HLSX2RN8B','20','0','20','1480573435','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('19','14BADOKHMS8VT','20','0','20','1480573435','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('20','1TUWJO1G8VMKA','20','0','20','1480573435','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('21','1QN5OZH0AR3MS','20','0','20','1480573435','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('22','1Y2184ZHMGCRD','20','0','20','1480573435','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('23','1C1QXYAOHSLK5','20','0','20','1480573435','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('24','1QPZRLFC6OKIU','20','0','20','1480573435','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('25','1ZHIR2LWU7CMT','20','0','20','1480573435','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('26','1LBD2OY96STI5','20','0','20','1480573435','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('27','1CG86XNPK204L','20','0','20','1480573435','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('28','1H3C96XU4T07B','20','0','20','1480573435','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('29','1MWNSUZFA2CO4','20','0','20','1480573435','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('30','1JIKZU1HGD2E8','20','0','20','1480573435','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('31','27JC8V9H1MUK0W','5','0','5','1483525749','1','27');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('32','27GMK1J0LEQUFX','5','0','5','1483525749','1','27');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('33','27C60IGYDT5AWU','5','0','5','1483525749','1','27');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('34','27U2TI1NDHQZ7J','5','0','5','1483525749','1','27');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('35','27OGFCV9YDNSP1','5','0','5','1483525749','1','27');
