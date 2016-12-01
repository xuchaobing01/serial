SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `snake_role`;
CREATE TABLE `snake_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `rolename` varchar(155) NOT NULL COMMENT '角色名称',
  `rule` varchar(255) DEFAULT '' COMMENT '权限节点数据',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

insert into `snake_role`(`id`,`rolename`,`rule`) values('1','超级管理员','');
insert into `snake_role`(`id`,`rolename`,`rule`) values('2','管理员组','26,27,28,29,30,1,15,16,17,18,2,3,4,5,6,7,8,11,24,12,14,13,25');
insert into `snake_role`(`id`,`rolename`,`rule`) values('3','合作商组','26,27,28,29,30,11,24,25');
