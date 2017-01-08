SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `snake_role`;
CREATE TABLE `snake_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `rolename` varchar(155) NOT NULL COMMENT '角色名称',
  `rule` varchar(255) DEFAULT '' COMMENT '权限节点数据',
  `pid` int(11) DEFAULT '0' COMMENT '上级角色id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

insert into `snake_role`(`id`,`rolename`,`rule`,`pid`) values('1','超级管理员','','0');
insert into `snake_role`(`id`,`rolename`,`rule`,`pid`) values('2','管理员组','26,27,28,29,30,1,2,3,4,5,6,7,8,11,24,12,14,13,25','1');
insert into `snake_role`(`id`,`rolename`,`rule`,`pid`) values('3','会员单位','26,27,75,28,30,1,2,3,4,5,11,24,25','11');
insert into `snake_role`(`id`,`rolename`,`rule`,`pid`) values('9','代理商','26,27,75,28,30,11,24,25','3');
insert into `snake_role`(`id`,`rolename`,`rule`,`pid`) values('11','合作商','26,27,75,28,30,1,2,3,4,5,11,25','1');
