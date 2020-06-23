/*
MySQL Data Transfer
Source Host: localhost
Source Database: followsuit
Target Host: localhost
Target Database: followsuit
Date: 2018/12/21 10:32:23
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for account
-- ----------------------------
DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(13) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(55) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for collection
-- ----------------------------
DROP TABLE IF EXISTS `collection`;
CREATE TABLE `collection` (
  `userID` int(11) NOT NULL,
  `goodsID` int(11) NOT NULL,
  `quantity` int(11) DEFAULT '1',
  `size` varchar(4) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`userID`,`goodsID`,`size`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `goodsid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(22) CHARACTER SET utf8 DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `mainpicture` varchar(55) CHARACTER SET utf8 DEFAULT NULL,
  `detailedpicture` varchar(55) CHARACTER SET utf8 DEFAULT NULL,
  `date` date DEFAULT NULL,
  `inventory` int(12) DEFAULT NULL,
  `introduction` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `type` char(2) CHARACTER SET utf8 DEFAULT NULL,
  `clotheskind` char(2) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`goodsid`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for orderform
-- ----------------------------
DROP TABLE IF EXISTS `orderform`;
CREATE TABLE `orderform` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(55) CHARACTER SET utf8 DEFAULT NULL,
  `name` varchar(55) CHARACTER SET utf8 DEFAULT NULL,
  `size` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `quantity` varchar(55) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for size
-- ----------------------------
DROP TABLE IF EXISTS `size`;
CREATE TABLE `size` (
  `goodsid` int(11) NOT NULL,
  `s` int(5) NOT NULL,
  `m` int(5) NOT NULL,
  `l` int(5) NOT NULL,
  `inventory` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for userinformation
-- ----------------------------
DROP TABLE IF EXISTS `userinformation`;
CREATE TABLE `userinformation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(24) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(55) CHARACTER SET utf8 DEFAULT NULL,
  `phone` char(11) CHARACTER SET utf8 DEFAULT NULL,
  `headPortrait` varchar(55) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- View structure for accountwithuseinfor
-- ----------------------------
DROP VIEW IF EXISTS `accountwithuseinfor`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `accountwithuseinfor` AS select `account`.`userid` AS `id`,`account`.`username` AS `username`,`account`.`password` AS `password`,`userinformation`.`name` AS `name` from (`account` join `userinformation`) where (`account`.`userid` = `userinformation`.`id`) group by `account`.`userid` order by `account`.`userid`;

-- ----------------------------
-- View structure for detail
-- ----------------------------
DROP VIEW IF EXISTS `detail`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail` AS select `goods`.`goodsid` AS `Goodsid`,`goods`.`name` AS `Name`,`goods`.`price` AS `Price`,`goods`.`mainpicture` AS `mainpicture`,`goods`.`detailedpicture` AS `detailedpicture`,`goods`.`date` AS `Date`,`goods`.`clotheskind` AS `Clotheskind`,`goods`.`type` AS `Type`,`goods`.`introduction` AS `Introduction`,`size`.`s` AS `S`,`size`.`m` AS `M`,`size`.`l` AS `L`,`goods`.`inventory` AS `Inventory` from (`goods` join `size`) where (`goods`.`goodsid` = `size`.`goodsid`);

-- ----------------------------
-- View structure for shopping
-- ----------------------------
DROP VIEW IF EXISTS `shopping`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `shopping` AS select `userinformation`.`id` AS `id`,`goods`.`goodsid` AS `goodsid`,`goods`.`name` AS `name`,`goods`.`price` AS `price`,`goods`.`mainpicture` AS `mainpicture`,`collection`.`size` AS `size` from ((`goods` join `userinformation`) join `collection`) where ((`goods`.`goodsid` = `collection`.`goodsID`) and (`userinformation`.`id` = `collection`.`userID`)) order by `userinformation`.`id`;

-- ----------------------------
-- View structure for shoppingcart
-- ----------------------------
DROP VIEW IF EXISTS `shoppingcart`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `shoppingcart` AS select `userinformation`.`id` AS `id`,`goods`.`goodsid` AS `goodsid`,`goods`.`name` AS `name`,`goods`.`price` AS `price`,`goods`.`mainpicture` AS `mainpicture`,`collection`.`size` AS `size`,`collection`.`quantity` AS `quantity`,`goods`.`inventory` AS `inventory`,`goods`.`detailedpicture` AS `detailedpicture` from ((`goods` join `userinformation`) join `collection`) where ((`goods`.`goodsid` = `collection`.`goodsID`) and (`userinformation`.`id` = `collection`.`userID`)) order by `userinformation`.`id`;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `account` VALUES ('1', 'ABC1234', '25d55ad283aa400af464c76d713c07ad');
INSERT INTO `account` VALUES ('2', 'QWE1234', 'bf7129758c202fb18a68155d27b0c85d');
INSERT INTO `account` VALUES ('3', 'Allen666', '25d55ad283aa400af464c76d713c07ad');
INSERT INTO `account` VALUES ('4', 'a123456', '25f9e794323b453885f5181f1b624d0b');
INSERT INTO `account` VALUES ('5', 'nuoyier', 'ebfb2add31de069cd38c5d9eab1a2649');
INSERT INTO `account` VALUES ('6', 'z123456', '5afb7b5360ab76ae55734560b574845d');
INSERT INTO `account` VALUES ('7', 'whr12345', 'ffb446e0692565ea2e9427a51a094188');
INSERT INTO `account` VALUES ('8', 'sjz123', '25f9e794323b453885f5181f1b624d0b');
INSERT INTO `account` VALUES ('9', 'ABC123', '25d55ad283aa400af464c76d713c07ad');
INSERT INTO `account` VALUES ('10', 'ASD231', '25d55ad283aa400af464c76d713c07ad');
INSERT INTO `account` VALUES ('11', 'AAA123', '25d55ad283aa400af464c76d713c07ad');
INSERT INTO `collection` VALUES ('1', '1', '1', 'm');
INSERT INTO `collection` VALUES ('1', '5', '1', 's');
INSERT INTO `collection` VALUES ('1', '2', '1', 's');
INSERT INTO `collection` VALUES ('1', '11', '1', 's');
INSERT INTO `collection` VALUES ('1', '14', '1', 's');
INSERT INTO `collection` VALUES ('1', '12', '1', 's');
INSERT INTO `collection` VALUES ('1', '8', '1', 's');
INSERT INTO `collection` VALUES ('1', '26', '1', 's');
INSERT INTO `collection` VALUES ('1', '1', '1', 's');
INSERT INTO `collection` VALUES ('1', '3', '1', 's');
INSERT INTO `collection` VALUES ('3', '1', '1', 'S');
INSERT INTO `collection` VALUES ('9', '8', '1', 'S');
INSERT INTO `collection` VALUES ('1', '6', '1', 'S');
INSERT INTO `collection` VALUES ('3', '25', '1', 'S');
INSERT INTO `collection` VALUES ('10', '5', '1', 'S');
INSERT INTO `collection` VALUES ('9', '16', '1', 's');
INSERT INTO `collection` VALUES ('6', '18', '1', 'S');
INSERT INTO `collection` VALUES ('6', '3', '1', 'S');
INSERT INTO `collection` VALUES ('6', '7', '1', 'S');
INSERT INTO `goods` VALUES ('1', '潮牌绿短袖', '128.00', '01.png', 'C01', '2018-12-14', '50', '潮牌', '男装', '衣服');
INSERT INTO `goods` VALUES ('15', '黄潮裤子（长）', '188.00', '15.png', 'T15', '2018-12-12', '29', '招牌裤子', '女装', '裤子');
INSERT INTO `goods` VALUES ('2', '黑T-Shiirt白印花', '99.00', '02.png', 'C02', '2018-12-02', '49', '潮', '男装', '衣服');
INSERT INTO `goods` VALUES ('3', '白T-shirt冠军牌', '66.00', '03.png', 'C03', '2018-12-05', '49', '冠军牌子', '情侣', '衣服');
INSERT INTO `goods` VALUES ('4', '黑T-Shiirt冠军牌', '88.00', '04.png', 'C04', '2018-12-12', '50', '牌子货', '男装', '衣服');
INSERT INTO `goods` VALUES ('5', '浅粉T-shirt白字', '55.00', '05.png', 'C05', '2018-12-05', '46', '新货', '女装', '衣服');
INSERT INTO `goods` VALUES ('6', '潮牌黑短袖', '55.00', '06.png', 'C06', '2018-11-13', '50', '潮牌短袖', '男装', '衣服');
INSERT INTO `goods` VALUES ('7', '墨绿色T-shirt', '80.00', '07.png', 'C07', '2018-10-16', '49', '新潮货', '男装', '衣服');
INSERT INTO `goods` VALUES ('8', '红蓝外套', '199.00', '08.png', 'C08', '2018-12-05', '49', '冬装', '男装', '衣服');
INSERT INTO `goods` VALUES ('9', '大白外套', '188.00', '09.png', 'C09', '2018-12-02', '50', '冬装', '女装', '衣服');
INSERT INTO `goods` VALUES ('10', '白色黑边毛衣', '166.00', '10.png', 'C10', '2018-09-18', '50', '秋装', '男装', '衣服');
INSERT INTO `goods` VALUES ('11', '灰白大外套', '222.00', '11.png', 'C11', '2018-12-29', '50', '冬装', '女装', '衣服');
INSERT INTO `goods` VALUES ('12', '黑色大外套', '200.00', '12.png', 'C12', '2018-12-24', '50', '冬装', '男装', '衣服');
INSERT INTO `goods` VALUES ('13', '蓝红色大外套', '211.00', '13.png', 'C13', '2018-12-31', '50', '冬装', '男装', '衣服');
INSERT INTO `goods` VALUES ('14', '灰黑外套', '166.00', '14.png', 'C14', '2018-09-11', '50', '秋装', '女装', '衣服');
INSERT INTO `goods` VALUES ('16', '蓝牛仔裤', '99.00', '02.png', 'T02', '2018-07-17', '50', '秋装', '男装', '裤子');
INSERT INTO `goods` VALUES ('17', '黑白长裤', '118.00', '03.png', 'T03', '2018-10-26', '50', '秋装', '男装', '裤子');
INSERT INTO `goods` VALUES ('18', '黑白长裤', '100.00', '04.png', 'T04', '2018-12-03', '50', '秋装', '男装', '裤子');
INSERT INTO `goods` VALUES ('19', '蓝色牛仔长裤', '99.00', '05.png', 'T05', '2018-12-04', '50', '秋装', '女装', '裤子');
INSERT INTO `goods` VALUES ('20', '黑灰运动裤', '66.00', '06.png', 'T06', '2018-11-05', '50', '秋装', '男装', '裤子');
INSERT INTO `goods` VALUES ('21', '黄色黑字印花裤子', '123.00', '07.png', 'T07', '2018-12-10', '50', '冬装', '男装', '裤子');
INSERT INTO `goods` VALUES ('22', '红棕色睡裤', '55.00', '08.png', 'T08', '2018-07-17', '50', '秋装', '女装', '裤子');
INSERT INTO `goods` VALUES ('23', '花印牛仔裤', '66.00', '09.png', 'T09', '2018-12-12', '50', '秋装', '女装', '裤子');
INSERT INTO `goods` VALUES ('24', '天蓝短裤', '55.00', '10.png', 'T10', '2018-12-19', '50', '夏装', '男装', '裤子');
INSERT INTO `goods` VALUES ('25', '土黄短裤', '33.00', '11.png', 'T11', '2018-12-11', '50', '夏装', '男装', '裤子');
INSERT INTO `goods` VALUES ('26', '沙白裙子', '77.00', '12.png', 'T12', '2018-12-19', '49', '夏装', '女装', '裙子');
INSERT INTO `goods` VALUES ('27', '暗金裙子', '55.00', '13.png', 'T13', '2018-12-19', '50', '夏装', '女装', '裙子');
INSERT INTO `goods` VALUES ('28', '校裙', '22.00', '14.png', 'T14', '2018-12-03', '50', '夏装', '女装', '裙子');
INSERT INTO `orderform` VALUES ('5', '王五', '浅粉T-shirt白字', 'M', null, '1');
INSERT INTO `orderform` VALUES ('4', '王五', '黑T-Shiirt白印花', 'M', null, '1');
INSERT INTO `orderform` VALUES ('6', '王五', '', '', null, null);
INSERT INTO `orderform` VALUES ('7', '王五', '黑T-Shiirt冠军牌', 'L', null, '1');
INSERT INTO `orderform` VALUES ('8', '王五', '浅粉T-shirt白字', '4', null, '1');
INSERT INTO `orderform` VALUES ('9', '王五', '浅粉T-shirt白字', 'L', null, '1');
INSERT INTO `orderform` VALUES ('10', '王五', '白T-shirt冠军牌', 'L', null, '1');
INSERT INTO `orderform` VALUES ('11', '王五', '黑T-Shiirt白印花', 'S', null, '1');
INSERT INTO `orderform` VALUES ('12', '王五', '白T-shirt冠军牌', 'S', null, '1');
INSERT INTO `orderform` VALUES ('13', '王五', '黑T-Shiirt白印花', 'S', null, '1');
INSERT INTO `orderform` VALUES ('14', 'Allen', '', '', null, null);
INSERT INTO `orderform` VALUES ('15', 'Allen', '黑T-Shiirt白印花', 'S', null, '1');
INSERT INTO `orderform` VALUES ('16', 'Allen', '墨绿色T-shirt', 'S', null, '1');
INSERT INTO `orderform` VALUES ('17', 'Allen', '白T-shirt冠军牌', 'S', null, '1');
INSERT INTO `orderform` VALUES ('18', 'Allen', '浅粉T-shirt白字', 'S', null, '1');
INSERT INTO `orderform` VALUES ('19', 'Allen', '红蓝外套', 'S', null, '1');
INSERT INTO `orderform` VALUES ('20', 'Allen', '', '', null, null);
INSERT INTO `orderform` VALUES ('21', 'Allen', '浅粉T-shirt白字', 'S', null, '1');
INSERT INTO `orderform` VALUES ('22', 'ZC', '', '', null, null);
INSERT INTO `orderform` VALUES ('23', 'ZC', '浅粉T-shirt白字', 'S', null, '2');
INSERT INTO `orderform` VALUES ('24', 'ZC', '黄潮裤子（长）', 's', null, '1');
INSERT INTO `orderform` VALUES ('25', 'ZC', '沙白裙子', 's', null, '1');
INSERT INTO `size` VALUES ('1', '20', '20', '10', '50');
INSERT INTO `size` VALUES ('2', '10', '20', '10', '50');
INSERT INTO `size` VALUES ('3', '10', '20', '10', '50');
INSERT INTO `size` VALUES ('4', '10', '20', '10', '50');
INSERT INTO `size` VALUES ('5', '10', '20', '10', '50');
INSERT INTO `size` VALUES ('6', '10', '20', '10', '50');
INSERT INTO `size` VALUES ('7', '10', '20', '10', '50');
INSERT INTO `size` VALUES ('8', '10', '20', '10', '50');
INSERT INTO `size` VALUES ('9', '10', '20', '10', '50');
INSERT INTO `size` VALUES ('10', '10', '20', '10', '50');
INSERT INTO `size` VALUES ('11', '10', '20', '10', '50');
INSERT INTO `size` VALUES ('12', '20', '20', '10', '50');
INSERT INTO `size` VALUES ('13', '20', '20', '10', '50');
INSERT INTO `size` VALUES ('14', '20', '20', '10', '50');
INSERT INTO `size` VALUES ('15', '20', '20', '10', '50');
INSERT INTO `size` VALUES ('16', '20', '20', '10', '50');
INSERT INTO `size` VALUES ('17', '20', '20', '10', '50');
INSERT INTO `size` VALUES ('18', '20', '20', '10', '50');
INSERT INTO `size` VALUES ('19', '20', '20', '10', '50');
INSERT INTO `size` VALUES ('20', '20', '20', '10', '50');
INSERT INTO `size` VALUES ('21', '20', '20', '10', '50');
INSERT INTO `size` VALUES ('22', '20', '20', '10', '50');
INSERT INTO `size` VALUES ('23', '20', '20', '10', '50');
INSERT INTO `size` VALUES ('24', '20', '20', '10', '50');
INSERT INTO `size` VALUES ('25', '20', '20', '10', '50');
INSERT INTO `size` VALUES ('26', '20', '20', '10', '50');
INSERT INTO `size` VALUES ('27', '20', '20', '10', '50');
INSERT INTO `size` VALUES ('28', '20', '20', '10', '50');
INSERT INTO `userinformation` VALUES ('1', '王五', '深圳市罗湖区', '13670315972', '');
INSERT INTO `userinformation` VALUES ('2', '李四', '深圳市龙岗区', '13670315983', '');
INSERT INTO `userinformation` VALUES ('3', 'Allen', 'shenzhen', '13424589183', null);
INSERT INTO `userinformation` VALUES ('4', '小激动', 'gfdcfg', '13719286510', null);
INSERT INTO `userinformation` VALUES ('5', '光头', 'hhhhhhhh', '13714904135', null);
INSERT INTO `userinformation` VALUES ('6', 'z123456', 'zdwsfdsfvd', '13035858066', null);
INSERT INTO `userinformation` VALUES ('7', '小激动', 'sdsada', '13719286510', null);
INSERT INTO `userinformation` VALUES ('8', '泽爸爸', 'D11116', '13145817504', null);
INSERT INTO `userinformation` VALUES ('9', 'ABC12346', '111111', '111111', 'ABC12346.jpg');
INSERT INTO `userinformation` VALUES ('10', '张三', 'ABC12345', '111111', '张三.jpg');
INSERT INTO `userinformation` VALUES ('11', 'ZC', '1111111', '1111111', null);

-- ----------------------------
-- Trigger structure for pwdadd
-- ----------------------------
DELIMITER ;;
CREATE TRIGGER `pwdadd` BEFORE INSERT ON `account` FOR EACH ROW BEGIN
SET new.password=MD5(new.password);
END;;
DELIMITER ;

-- ----------------------------
-- Trigger structure for pwdreset
-- ----------------------------
DELIMITER ;;
CREATE TRIGGER `pwdreset` BEFORE UPDATE ON `account` FOR EACH ROW BEGIN
SET new.password=MD5(new.password);
END;;
DELIMITER ;
