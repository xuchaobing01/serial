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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

