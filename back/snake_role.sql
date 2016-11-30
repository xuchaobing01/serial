SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `snake_role`;
CREATE TABLE `snake_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `rolename` varchar(155) NOT NULL COMMENT '角色名称',
  `rule` varchar(255) DEFAULT '' COMMENT '权限节点数据',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

insert into `snake_role`(`id`,`rolename`,`rule`) values('1','超级管理员','');
insert into `snake_role`(`id`,`rolename`,`rule`) values('2','系统维护员','1,2,3,4,5,6,7,8,9,10');
insert into `snake_role`(`id`,`rolename`,`rule`) values('3','新闻发布员','1,2,3,22');
