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
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('90','1TAM1K7X0DY4L','5','0','5','1483767247','1','1');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('108','27QONE8MAI6RLZ','3','0','3','1483796245','1','27');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('109','27CM6T0JGEWP8B','3','0','3','1483796245','1','27');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('110','2721AO0R75IN3M','3','0','3','1483796245','1','27');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('111','270E42POTHA3F7','3','0','3','1483796245','1','27');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('112','273LFE1GA6KW75','3','0','3','1483796245','1','27');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('113','27Z6P7QSVM8OUK','3','0','3','1483796245','1','27');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('114','27HDSXFZRI3VOK','3','0','3','1483796245','1','27');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('115','27CYJUZOIMW4SD','3','0','3','1483796245','1','27');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('116','27Y4RVOJH87KNC','3','0','3','1483796245','1','27');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('117','270JIG3FWT6AKP','3','0','3','1483796245','1','27');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('118','27TLAY1HOGE7Z0','3','0','3','1483796245','1','27');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('119','27FC5YAEVTNUOI','3','0','3','1483796245','1','27');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('120','27QSCZT8K7XPAM','3','0','3','1483796245','1','27');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('121','279LG2YZPA83RV','3','0','3','1483796245','1','27');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('122','27O5GYJ4UHARC8','3','0','3','1483796245','1','27');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('123','27F50GKN1J9L4D','3','0','3','1483796245','1','27');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('124','272OXFMKTV8JLZ','3','0','3','1483796245','1','27');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('125','27DGENMIW2910Y','3','0','3','1483796245','1','27');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('126','27M0PNQLSETZYC','3','0','3','1483796245','1','27');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('127','272RS06GD8T7L9','3','0','3','1483796245','1','27');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('128','675FVJAWGYBC7L','2','0','2','1483796329','1','67');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('129','67GKJILM3EAHXP','2','0','2','1483796329','1','67');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('130','67GC05F8ETHK4N','2','0','2','1483796329','1','67');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('131','67WBUZ2LOKYIMN','2','0','2','1483796329','1','67');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('132','6714NJVDSAM06W','2','0','2','1483796329','1','67');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('133','67EIFC1NK2S57W','2','0','2','1483796329','1','67');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('134','67HETBCA0MK386','2','0','2','1483796329','1','67');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('135','67G5PBC6702EA9','2','0','2','1483796329','1','67');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('136','676WVQE5DRBZ0O','2','0','2','1483796329','1','67');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('137','67GW58R3YV9DPJ','2','0','2','1483796329','1','67');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('138','736X9RLMNG4A1H','5','0','5','1483886586','1','73');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('139','731DF2UNCVR9OZ','5','0','5','1483886586','1','73');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('143','74CKUJY6RPD3GB','5','0','5','1483886617','1','74');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('144','74SJR1MKVUAZGE','5','0','5','1483886617','1','74');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('145','74L2UBCK4W76RG','5','0','5','1483886617','1','74');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('148','75W5K0Q3Y8ODN9','5','0','5','1483886640','1','75');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('149','75KS143DJMFR57','5','0','5','1483886640','1','75');
insert into `snake_serial`(`id`,`serial`,`can_use_num`,`used_num`,`surplus_num`,`createtime`,`status`,`userid`) values('150','75TIR8Q5XC7DEL','5','0','5','1483886640','1','75');
