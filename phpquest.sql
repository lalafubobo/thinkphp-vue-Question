/*
 Navicat MySQL Data Transfer

 Source Server         : fubobo
 Source Server Type    : MySQL
 Source Server Version : 80018
 Source Host           : localhost:3306
 Source Schema         : phpquest

 Target Server Type    : MySQL
 Target Server Version : 80018
 File Encoding         : 65001

 Date: 15/04/2020 18:34:46
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for answer
-- ----------------------------
DROP TABLE IF EXISTS `answer`;
CREATE TABLE `answer`  (
  `aid` int(10) NOT NULL AUTO_INCREMENT,
  `Uid` int(10) NOT NULL,
  `Qid` int(10) NOT NULL,
  PRIMARY KEY (`aid`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of answer
-- ----------------------------
INSERT INTO `answer` VALUES (6, 1, 1);
INSERT INTO `answer` VALUES (8, 1, 2);
INSERT INTO `answer` VALUES (9, 1, 1);

-- ----------------------------
-- Table structure for option
-- ----------------------------
DROP TABLE IF EXISTS `option`;
CREATE TABLE `option`  (
  `Oid` int(10) NOT NULL AUTO_INCREMENT,
  `Oname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Sid` int(10) NOT NULL,
  PRIMARY KEY (`Oid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of option
-- ----------------------------
INSERT INTO `option` VALUES (1, '喜欢', 1);
INSERT INTO `option` VALUES (2, '不喜欢', 1);
INSERT INTO `option` VALUES (3, '民谣', 2);
INSERT INTO `option` VALUES (4, '流行', 2);
INSERT INTO `option` VALUES (5, '摇滚', 2);
INSERT INTO `option` VALUES (6, '轻音乐', 2);
INSERT INTO `option` VALUES (7, '网易云', 3);
INSERT INTO `option` VALUES (8, '酷狗', 3);
INSERT INTO `option` VALUES (9, 'QQ音乐', 3);
INSERT INTO `option` VALUES (10, '没有', 4);
INSERT INTO `option` VALUES (11, '有', 4);
INSERT INTO `option` VALUES (12, '会', 5);
INSERT INTO `option` VALUES (13, '不会', 5);
INSERT INTO `option` VALUES (14, '1小时', 6);
INSERT INTO `option` VALUES (15, '2小时', 6);
INSERT INTO `option` VALUES (16, '2小时以上', 6);

-- ----------------------------
-- Table structure for questionnaire
-- ----------------------------
DROP TABLE IF EXISTS `questionnaire`;
CREATE TABLE `questionnaire`  (
  `Qid` int(10) NOT NULL AUTO_INCREMENT,
  `Qname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Qdate` date NOT NULL,
  `uid` int(10) NOT NULL,
  PRIMARY KEY (`Qid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of questionnaire
-- ----------------------------
INSERT INTO `questionnaire` VALUES (1, '音乐无国界！', '2020-04-14', 1);
INSERT INTO `questionnaire` VALUES (2, '今天你学习了吗？', '2020-04-14', 2);
INSERT INTO `questionnaire` VALUES (3, '测测你的睡觉天赋', '2020-04-15', 1);
INSERT INTO `questionnaire` VALUES (7, '路人女主养成方法', '2020-04-15', 1);

-- ----------------------------
-- Table structure for subject
-- ----------------------------
DROP TABLE IF EXISTS `subject`;
CREATE TABLE `subject`  (
  `Sid` int(10) NOT NULL AUTO_INCREMENT,
  `Sname` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Qid` int(10) NOT NULL,
  PRIMARY KEY (`Sid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of subject
-- ----------------------------
INSERT INTO `subject` VALUES (1, '你喜欢听歌吗？', 1);
INSERT INTO `subject` VALUES (2, '你一般喜欢听什么类型的歌呢？', 1);
INSERT INTO `subject` VALUES (3, '你用的什么平台听歌', 1);
INSERT INTO `subject` VALUES (4, '自己有过创作的念头吗？', 1);
INSERT INTO `subject` VALUES (5, '你每天都会学习吗？', 2);
INSERT INTO `subject` VALUES (6, '你每天学习多久呢？', 2);

-- ----------------------------
-- Table structure for userinfo
-- ----------------------------
DROP TABLE IF EXISTS `userinfo`;
CREATE TABLE `userinfo`  (
  `Uid` int(10) NOT NULL AUTO_INCREMENT,
  `Uname` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Upassword` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `hob` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`Uid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of userinfo
-- ----------------------------
INSERT INTO `userinfo` VALUES (1, '付梓豪', '594118225', 'man', '女孩');
INSERT INTO `userinfo` VALUES (2, 'test', 'test', 'man', NULL);
INSERT INTO `userinfo` VALUES (3, 'fubobo', '594118225', '1', '吉他');
INSERT INTO `userinfo` VALUES (4, '1', '1', '1', '吉他');
INSERT INTO `userinfo` VALUES (5, 'fzh', '594118225', '1', '吉他');

-- ----------------------------
-- View structure for aninfo
-- ----------------------------
DROP VIEW IF EXISTS `aninfo`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `aninfo` AS select `questionnaire`.`Qname` AS `Qname`,`questionnaire`.`Qdate` AS `Qdate`,`answer`.`Uid` AS `Uid` from (`questionnaire` join `answer`) where (`questionnaire`.`Qid` = `answer`.`Qid`);

-- ----------------------------
-- View structure for antopic
-- ----------------------------
DROP VIEW IF EXISTS `antopic`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `antopic` AS select `aninfo`.`Qname` AS `Atopic`,`aninfo`.`Qdate` AS `Adate`,`userinfo`.`Uname` AS `Uname` from (`aninfo` join `userinfo`) where (`aninfo`.`Uid` = `userinfo`.`Uid`);

-- ----------------------------
-- View structure for auinfo
-- ----------------------------
DROP VIEW IF EXISTS `auinfo`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `auinfo` AS select `questionnaire`.`Qid` AS `Qid`,`questionnaire`.`Qname` AS `Qname`,`questionnaire`.`Qdate` AS `Qdate`,`userinfo`.`Uname` AS `Uname` from (`questionnaire` join `userinfo`) where (`questionnaire`.`uid` = `userinfo`.`Uid`);

SET FOREIGN_KEY_CHECKS = 1;
