/*
 Navicat Premium Data Transfer

 Source Server         : COMP1640_database
 Source Server Type    : MySQL
 Source Server Version : 50729
 Source Host           : localhost:3306
 Source Schema         : comp1640_database

 Target Server Type    : MySQL
 Target Server Version : 50729
 File Encoding         : 65001

 Date: 11/02/2021 16:12:09
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment`  (
  `Comment_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Comment_Details` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Comment_Employee` int(11) DEFAULT NULL,
  `Comment_Idea` int(11) DEFAULT NULL,
  `Comment_Time` datetime(6) DEFAULT NULL,
  PRIMARY KEY (`Comment_Id`) USING BTREE,
  INDEX `Comment_Idea`(`Comment_Idea`) USING BTREE,
  INDEX `Comment_Employee`(`Comment_Employee`) USING BTREE,
  CONSTRAINT `Comment_Employee` FOREIGN KEY (`Comment_Employee`) REFERENCES `employee` (`Employee_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Comment_Idea` FOREIGN KEY (`Comment_Idea`) REFERENCES `idea` (`Idea_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES (2, 'xxxxxxxxx', 13, 3, '2021-02-12 21:35:41.000000');
INSERT INTO `comment` VALUES (3, 'xxxxxxxxx', 12, 17, '2021-02-12 21:35:41.000000');
INSERT INTO `comment` VALUES (4, 'xxxxxxxxx', 6, 39, '2021-02-12 21:35:41.000000');
INSERT INTO `comment` VALUES (5, 'xxxxxxxxx', 8, 4, '2021-02-12 21:35:41.000000');
INSERT INTO `comment` VALUES (6, 'xxxxxxxxx', 23, 4, '2021-02-12 21:35:41.000000');
INSERT INTO `comment` VALUES (7, 'xxxxxxxxx', 25, 4, '2021-02-12 21:35:41.000000');

-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department`  (
  `Department_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Department_Name` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`Department_Id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES (1, 'COMP');
INSERT INTO `department` VALUES (2, 'ACAD');
INSERT INTO `department` VALUES (3, 'ACCO');
INSERT INTO `department` VALUES (4, 'ENVT');
INSERT INTO `department` VALUES (5, 'LAW');

-- ----------------------------
-- Table structure for employee
-- ----------------------------
DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee`  (
  `Employee_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Employee_Name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Employee_Details` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `Employee_Gender` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Employee_Age` int(11) DEFAULT NULL,
  `Employee_Password` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Employee_Email` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Employee_Department` int(11) DEFAULT NULL,
  `Employee_Identity` int(11) DEFAULT NULL,
  PRIMARY KEY (`Employee_Id`) USING BTREE,
  INDEX `Employee_Department`(`Employee_Department`) USING BTREE,
  CONSTRAINT `Employee_Department` FOREIGN KEY (`Employee_Department`) REFERENCES `department` (`Department_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of employee
-- ----------------------------
INSERT INTO `employee` VALUES (1, 'TestManagerCOMP', 'testdetails', 'Male', 49, 'TestManagerCOMP', 'dw7852v@gre.ac.uk', 1, 2);
INSERT INTO `employee` VALUES (2, 'TestManagerACAD', 'testdetails', 'Male', 53, 'TestManagerACAD', 'dw7852v@gre.ac.uk', 2, 2);
INSERT INTO `employee` VALUES (3, 'TestManagerACCO', 'testdetails', 'Female', 52, 'TestManagerACCO', 'dw7852v@gre.ac.uk', 3, 2);
INSERT INTO `employee` VALUES (4, 'TestManagerENVT', 'testdetails', 'Female', 50, 'TestManagerENVT', 'dw7852v@gre.ac.uk', 4, 2);
INSERT INTO `employee` VALUES (5, 'TestManagerLAW', 'testdetails', 'Male', 51, 'TestManagerLAW', 'dw7852v@gre.ac.uk', 5, 2);
INSERT INTO `employee` VALUES (6, 'TestUserCOMP1', 'testdetails', 'Female', 49, 'TestUserCOMP1', 'dw7852v@gre.ac.uk', 1, 1);
INSERT INTO `employee` VALUES (7, 'TestUserCOMP2', 'testdetails', 'Male', 22, 'TestUserCOMP2', 'dw7852v@gre.ac.uk', 1, 1);
INSERT INTO `employee` VALUES (8, 'TestUserCOMP3', 'testdetails', 'Male', 22, 'TestUserCOMP3', 'dw7852v@gre.ac.uk', 1, 1);
INSERT INTO `employee` VALUES (9, 'TestUserCOMP4', 'testdetails', 'Female', 23, 'TestUserCOMP4', 'dw7852v@gre.ac.uk', 1, 1);
INSERT INTO `employee` VALUES (10, 'TestUserCOMP5', 'testdetails', 'Male', 20, 'TestUserCOMP5', 'dw7852v@gre.ac.uk', 1, 1);
INSERT INTO `employee` VALUES (11, 'TestUserACAD1', 'testdetails', 'Male', 22, 'TestUserACAD1', 'dw7852v@gre.ac.uk', 2, 1);
INSERT INTO `employee` VALUES (12, 'TestUserACAD2', 'testdetails', 'Female', 22, 'TestUserACAD2', 'dw7852v@gre.ac.uk', 2, 1);
INSERT INTO `employee` VALUES (13, 'TestUserACAD3', 'testdetails', 'Male', 23, 'TestUserACAD3', 'dw7852v@gre.ac.uk', 2, 1);
INSERT INTO `employee` VALUES (14, 'TestUserACAD4', 'testdetails', 'Female', 24, 'TestUserACAD4', 'dw7852v@gre.ac.uk', 2, 1);
INSERT INTO `employee` VALUES (15, 'TestUserACAD5', 'testdetails', 'Female', 20, 'TestUserACAD5', 'dw7852v@gre.ac.uk', 2, 1);
INSERT INTO `employee` VALUES (16, 'TestUserACCO1', 'testdetails', 'Male', 22, 'TestUserACCO1', 'dw7852v@gre.ac.uk', 3, 1);
INSERT INTO `employee` VALUES (17, 'TestUserACCO2', 'testdetails', 'Female', 22, 'TestUserACCO2', 'dw7852v@gre.ac.uk', 3, 1);
INSERT INTO `employee` VALUES (18, 'TestUserACCO3', 'testdetails', 'Male', 23, 'TestUserACCO3', 'dw7852v@gre.ac.uk', 3, 1);
INSERT INTO `employee` VALUES (19, 'TestUserACCO4', 'testdetails', 'Female', 23, 'TestUserACCO4', 'dw7852v@gre.ac.uk', 3, 1);
INSERT INTO `employee` VALUES (20, 'TestUserACCO5', 'testdetails', 'Female', 22, 'TestUserACCO5', 'dw7852v@gre.ac.uk', 3, 1);
INSERT INTO `employee` VALUES (21, 'TestUserENVT1', 'testdetails', 'Male', 20, 'TestUserENVT1', 'dw7852v@gre.ac.uk', 4, 1);
INSERT INTO `employee` VALUES (22, 'TestUserENVT2', 'testdetails', 'Female', 21, 'TestUserENVT2', 'dw7852v@gre.ac.uk', 4, 1);
INSERT INTO `employee` VALUES (23, 'TestUserENVT3', 'testdetails', 'Male', 21, 'TestUserENVT3', 'dw7852v@gre.ac.uk', 4, 1);
INSERT INTO `employee` VALUES (24, 'TestUserENVT4', 'testdetails', 'Female', 22, 'TestUserENVT4', 'dw7852v@gre.ac.uk', 4, 1);
INSERT INTO `employee` VALUES (25, 'TestUserENVT5', 'testdetails', 'Female', 24, 'TestUserENVT5', 'dw7852v@gre.ac.uk', 4, 1);
INSERT INTO `employee` VALUES (26, 'TestUserLAW1', 'testdetails', 'Male', 22, 'TestUserLAW1', 'dw7852v@gre.ac.uk', 5, 1);
INSERT INTO `employee` VALUES (27, 'TestUserLAW2', 'testdetails', 'Female', 22, 'TestUserLAW2', 'dw7852v@gre.ac.uk', 5, 1);
INSERT INTO `employee` VALUES (28, 'TestUserLAW3', 'testdetails', 'Male', 21, 'TestUserLAW3', 'dw7852v@gre.ac.uk', 5, 1);
INSERT INTO `employee` VALUES (29, 'TestUserLAW4', 'testdetails', 'Female', 22, 'TestUserLAW4', 'dw7852v@gre.ac.uk', 5, 1);
INSERT INTO `employee` VALUES (30, 'TestUserLAW5', 'testdetails', 'Male', 21, 'TestUserLAW5', 'dw7852v@gre.ac.uk', 5, 1);
INSERT INTO `employee` VALUES (31, 'Manager', 'testdetails', 'Male', 52, 'Manager', 'dw7852v@gre.ac.uk', NULL, 3);

-- ----------------------------
-- Table structure for idea
-- ----------------------------
DROP TABLE IF EXISTS `idea`;
CREATE TABLE `idea`  (
  `Idea_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Idea_Employee` int(11) DEFAULT NULL,
  `Idea_Department` int(11) DEFAULT NULL,
  `Idea_Topic` int(11) DEFAULT NULL,
  `Idea_ThumbsUP_Number` int(20) DEFAULT NULL,
  `Idea_ThumbsDOWN_Number` int(20) DEFAULT NULL,
  `Idea_Document` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Idea_Time` datetime(6) DEFAULT NULL,
  `Idea_Title` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`Idea_Id`) USING BTREE,
  INDEX `Idea_Topic`(`Idea_Topic`) USING BTREE,
  INDEX `Idea_Employee`(`Idea_Employee`) USING BTREE,
  INDEX `Idea_Department`(`Idea_Department`) USING BTREE,
  CONSTRAINT `Idea_Department` FOREIGN KEY (`Idea_Department`) REFERENCES `department` (`Department_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Idea_Employee` FOREIGN KEY (`Idea_Employee`) REFERENCES `employee` (`Employee_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Idea_Topic` FOREIGN KEY (`Idea_Topic`) REFERENCES `topic` (`Topic_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 41 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of idea
-- ----------------------------
INSERT INTO `idea` VALUES (2, 6, 1, 1, 15, 2, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (3, 17, 3, 3, 12, 3, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (4, 13, 2, 2, 13, 4, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (5, 12, 2, 8, 23, 1, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (6, 7, 1, 4, 22, 2, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (7, 23, 4, 6, 4, 2, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (8, 22, 4, 6, 5, 3, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (9, 21, 4, 6, 7, 3, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (10, 15, 2, 2, 3, 1, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (11, 14, 2, 8, 12, 2, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (12, 30, 5, 5, 13, 7, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (13, 28, 5, 5, 14, 1, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (14, 12, 2, 2, 15, 5, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (15, 11, 2, 8, 2, 2, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (16, 16, 3, 3, 3, 3, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (17, 16, 3, 3, 1, 4, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (18, 25, 4, 6, 0, 5, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (19, 27, 5, 5, 3, 12, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (20, 17, 3, 3, 16, 6, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (21, 18, 3, 3, 23, 2, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (22, 24, 4, 6, 21, 2, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (23, 29, 5, 5, 22, 3, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (24, 26, 5, 5, 16, 6, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (25, 18, 3, 3, 8, 9, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (26, 19, 3, 3, 17, 3, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (27, 8, 1, 7, 22, 2, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (28, 9, 1, 1, 12, 10, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (29, 10, 1, 4, 2, 8, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (30, 13, 2, 2, 3, 9, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (31, 14, 2, 2, 4, 8, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (32, 12, 2, 2, 2, 8, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (33, 15, 2, 2, 1, 3, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (34, 23, 4, 6, 2, 16, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (35, 12, 2, 2, 21, 2, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (36, 24, 4, 6, 13, 2, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (37, 23, 4, 6, 15, 4, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (38, 26, 5, 5, 16, 2, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (39, 7, 1, 7, 22, 1, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');
INSERT INTO `idea` VALUES (40, 8, 1, 1, 12, 5, '/static/xxx.zip', '2021-02-10 21:19:05.000000', 'Testidea');

-- ----------------------------
-- Table structure for topic
-- ----------------------------
DROP TABLE IF EXISTS `topic`;
CREATE TABLE `topic`  (
  `Topic_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Topic_Name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Topic_Employee` int(11) DEFAULT NULL,
  `Topic_Deadline` datetime(6) DEFAULT NULL,
  PRIMARY KEY (`Topic_Id`) USING BTREE,
  INDEX `Topic_Employee`(`Topic_Employee`) USING BTREE,
  CONSTRAINT `Topic_Employee` FOREIGN KEY (`Topic_Employee`) REFERENCES `employee` (`Employee_Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of topic
-- ----------------------------
INSERT INTO `topic` VALUES (1, 'Should students be given more chances to pass the test', 1, '2021-02-28 21:05:28.000000');
INSERT INTO `topic` VALUES (2, 'Is the school cafeteria delicious?', 2, '2021-02-28 21:05:28.000000');
INSERT INTO `topic` VALUES (3, 'About returning to school', 3, '2021-02-28 21:05:28.000000');
INSERT INTO `topic` VALUES (4, 'Should the computer school teach more programm', 1, '2021-02-28 21:05:28.000000');
INSERT INTO `topic` VALUES (5, 'Should the school help law students for internship\r\nShould the school help law students for internshipShould the school help law students for internship', 5, '2021-02-28 21:05:28.000000');
INSERT INTO `topic` VALUES (6, 'About changes in environmental curriculum ', 4, '2021-02-28 21:05:28.000000');
INSERT INTO `topic` VALUES (7, 'Suggestions for improvement of the site', 1, '2021-02-28 21:05:28.000000');
INSERT INTO `topic` VALUES (8, 'Does the school need to recruit more students', 2, '2021-02-28 21:05:28.000000');

SET FOREIGN_KEY_CHECKS = 1;
