SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `snake_dept`;
CREATE TABLE `snake_dept` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `deptname` varchar(155) DEFAULT '' COMMENT '部门名称',
  `num` int(11) unsigned DEFAULT '0' COMMENT '人数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

insert into `snake_dept`(`id`,`deptname`,`num`) values('1','北京部','4');
insert into `snake_dept`(`id`,`deptname`,`num`) values('8','反对法1','1');
