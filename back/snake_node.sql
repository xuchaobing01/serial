SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `snake_node`;
CREATE TABLE `snake_node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `node_name` varchar(155) NOT NULL DEFAULT '' COMMENT '节点名称',
  `module_name` varchar(155) NOT NULL DEFAULT '' COMMENT '模块名',
  `control_name` varchar(155) NOT NULL DEFAULT '' COMMENT '控制器名',
  `action_name` varchar(155) NOT NULL COMMENT '方法名',
  `is_menu` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否是菜单项 1不是 2是',
  `typeid` int(11) NOT NULL COMMENT '父级节点id',
  `style` varchar(155) DEFAULT '' COMMENT '菜单样式',
  `sort` smallint(4) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;

insert into `snake_node`(`id`,`node_name`,`module_name`,`control_name`,`action_name`,`is_menu`,`typeid`,`style`,`sort`) values('1','用户管理','#','#','#','2','0','fa fa-users','2');
insert into `snake_node`(`id`,`node_name`,`module_name`,`control_name`,`action_name`,`is_menu`,`typeid`,`style`,`sort`) values('2','用户列表','admin','user','index','2','1','','0');
insert into `snake_node`(`id`,`node_name`,`module_name`,`control_name`,`action_name`,`is_menu`,`typeid`,`style`,`sort`) values('3','添加用户','admin','user','useradd','1','2','','0');
insert into `snake_node`(`id`,`node_name`,`module_name`,`control_name`,`action_name`,`is_menu`,`typeid`,`style`,`sort`) values('4','编辑用户','admin','user','useredit','1','2','','0');
insert into `snake_node`(`id`,`node_name`,`module_name`,`control_name`,`action_name`,`is_menu`,`typeid`,`style`,`sort`) values('5','删除用户','admin','user','userdel','1','2','','0');
insert into `snake_node`(`id`,`node_name`,`module_name`,`control_name`,`action_name`,`is_menu`,`typeid`,`style`,`sort`) values('6','角色列表','admin','role','index','2','1','','0');
insert into `snake_node`(`id`,`node_name`,`module_name`,`control_name`,`action_name`,`is_menu`,`typeid`,`style`,`sort`) values('7','添加角色','admin','role','roleadd','1','6','','0');
insert into `snake_node`(`id`,`node_name`,`module_name`,`control_name`,`action_name`,`is_menu`,`typeid`,`style`,`sort`) values('8','编辑角色','admin','role','roleedit','1','6','','0');
insert into `snake_node`(`id`,`node_name`,`module_name`,`control_name`,`action_name`,`is_menu`,`typeid`,`style`,`sort`) values('9','删除角色','admin','role','roledel','1','6','','0');
insert into `snake_node`(`id`,`node_name`,`module_name`,`control_name`,`action_name`,`is_menu`,`typeid`,`style`,`sort`) values('10','分配权限','admin','role','giveaccess','1','6','','0');
insert into `snake_node`(`id`,`node_name`,`module_name`,`control_name`,`action_name`,`is_menu`,`typeid`,`style`,`sort`) values('11','系统管理','#','#','#','2','0','fa fa-desktop','3');
insert into `snake_node`(`id`,`node_name`,`module_name`,`control_name`,`action_name`,`is_menu`,`typeid`,`style`,`sort`) values('12','数据备份/还原','admin','data','index','2','11','','0');
insert into `snake_node`(`id`,`node_name`,`module_name`,`control_name`,`action_name`,`is_menu`,`typeid`,`style`,`sort`) values('13','备份数据','admin','data','importdata','1','12','','0');
insert into `snake_node`(`id`,`node_name`,`module_name`,`control_name`,`action_name`,`is_menu`,`typeid`,`style`,`sort`) values('14','还原数据','admin','data','backdata','1','12','','0');
insert into `snake_node`(`id`,`node_name`,`module_name`,`control_name`,`action_name`,`is_menu`,`typeid`,`style`,`sort`) values('15','权限列表','admin','auth','index','2','1','','0');
insert into `snake_node`(`id`,`node_name`,`module_name`,`control_name`,`action_name`,`is_menu`,`typeid`,`style`,`sort`) values('16','添加节点','admin','auth','authadd','1','15','','0');
insert into `snake_node`(`id`,`node_name`,`module_name`,`control_name`,`action_name`,`is_menu`,`typeid`,`style`,`sort`) values('17','编辑节点','admin','auth','authedit','1','15','','0');
insert into `snake_node`(`id`,`node_name`,`module_name`,`control_name`,`action_name`,`is_menu`,`typeid`,`style`,`sort`) values('18','删除节点','admin','auth','authdel','1','15','','0');
insert into `snake_node`(`id`,`node_name`,`module_name`,`control_name`,`action_name`,`is_menu`,`typeid`,`style`,`sort`) values('25','退出登陆','admin','login','loginout','2','11','','1');
insert into `snake_node`(`id`,`node_name`,`module_name`,`control_name`,`action_name`,`is_menu`,`typeid`,`style`,`sort`) values('26','系列号管理','#','#','#','2','0','fa fa-key','1');
insert into `snake_node`(`id`,`node_name`,`module_name`,`control_name`,`action_name`,`is_menu`,`typeid`,`style`,`sort`) values('27','系列号列表','admin','serial','index','2','26','','0');
insert into `snake_node`(`id`,`node_name`,`module_name`,`control_name`,`action_name`,`is_menu`,`typeid`,`style`,`sort`) values('28','生成系列号','admin','serial','serialadd','1','27','','0');
insert into `snake_node`(`id`,`node_name`,`module_name`,`control_name`,`action_name`,`is_menu`,`typeid`,`style`,`sort`) values('30','删除系列号','admin','serial','serialdel','1','27','','0');
insert into `snake_node`(`id`,`node_name`,`module_name`,`control_name`,`action_name`,`is_menu`,`typeid`,`style`,`sort`) values('24','修改密码','admin','user','editpwd','2','11','','0');
insert into `snake_node`(`id`,`node_name`,`module_name`,`control_name`,`action_name`,`is_menu`,`typeid`,`style`,`sort`) values('75','批量删除系列号','index','serial','serialdels','1','27','','0');
insert into `snake_node`(`id`,`node_name`,`module_name`,`control_name`,`action_name`,`is_menu`,`typeid`,`style`,`sort`) values('77','部门列表','index','dept','index','2','1','','0');
insert into `snake_node`(`id`,`node_name`,`module_name`,`control_name`,`action_name`,`is_menu`,`typeid`,`style`,`sort`) values('78','添加部门','index','dept','deptadd','1','77','','0');
insert into `snake_node`(`id`,`node_name`,`module_name`,`control_name`,`action_name`,`is_menu`,`typeid`,`style`,`sort`) values('79','编辑部门','index','dept','deptedit','1','77','','0');
insert into `snake_node`(`id`,`node_name`,`module_name`,`control_name`,`action_name`,`is_menu`,`typeid`,`style`,`sort`) values('80','删除部门','index','dept','deptdel','1','77','','0');
