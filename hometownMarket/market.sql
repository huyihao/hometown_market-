CREATE DATABASE  IF NOT EXISTS `market` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `market`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: market
-- ------------------------------------------------------
-- Server version	5.6.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tt_ad`
--

DROP TABLE IF EXISTS `tt_ad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tt_ad` (
  `tt_ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `tt_ad_sort` varchar(20) NOT NULL,
  `tt_ad_content` varchar(5000) NOT NULL,
  `tt_ad_direction` int(1) NOT NULL,
  PRIMARY KEY (`tt_ad_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tt_ad`
--

LOCK TABLES `tt_ad` WRITE;
/*!40000 ALTER TABLE `tt_ad` DISABLE KEYS */;
/*!40000 ALTER TABLE `tt_ad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tt_admins`
--

DROP TABLE IF EXISTS `tt_admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tt_admins` (
  `admins_name` varchar(30) NOT NULL,
  `admins_password` char(32) NOT NULL,
  `admins_lastip` varchar(20) DEFAULT NULL,
  `admins_lastdate` int(10) unsigned DEFAULT NULL,
  `admins_id` int(11) NOT NULL,
  PRIMARY KEY (`admins_id`),
  UNIQUE KEY `admins_name` (`admins_name`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tt_admins`
--

LOCK TABLES `tt_admins` WRITE;
/*!40000 ALTER TABLE `tt_admins` DISABLE KEYS */;
INSERT INTO `tt_admins` VALUES ('HMT','HMT',NULL,NULL,0);
/*!40000 ALTER TABLE `tt_admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tt_category`
--

DROP TABLE IF EXISTS `tt_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tt_category` (
  `cate_class` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(45) DEFAULT NULL,
  `cate_pid` int(11) DEFAULT NULL,
  PRIMARY KEY (`cate_class`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tt_category`
--

LOCK TABLES `tt_category` WRITE;
/*!40000 ALTER TABLE `tt_category` DISABLE KEYS */;
INSERT INTO `tt_category` VALUES (1,'数码类',0),(2,'招聘兼职',0),(3,'房屋租赁',0),(4,'日常用品',0),(5,'单车特卖区',0),(6,'书摊',0),(7,'其他',0),(8,'电脑硬件',1),(9,'电脑软件',1),(10,'影音家电',1),(11,'通讯产品',1),(12,'招聘兼职',2),(13,'房屋租赁',3),(14,'日常用品',4),(15,'二手单车',5),(16,'公共课书籍',6),(17,'专业课书籍',6),(18,'其他',7);
/*!40000 ALTER TABLE `tt_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tt_findpassword`
--

DROP TABLE IF EXISTS `tt_findpassword`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tt_findpassword` (
  `findpassword_code` char(18) NOT NULL,
  `findpassword_key` char(35) NOT NULL,
  `findpassword_usercode` char(18) NOT NULL,
  `findpassword_table` char(2) NOT NULL,
  PRIMARY KEY (`findpassword_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tt_findpassword`
--

LOCK TABLES `tt_findpassword` WRITE;
/*!40000 ALTER TABLE `tt_findpassword` DISABLE KEYS */;
/*!40000 ALTER TABLE `tt_findpassword` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tt_logging`
--

DROP TABLE IF EXISTS `tt_logging`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tt_logging` (
  `logging_id` int(11) NOT NULL AUTO_INCREMENT,
  `logging_content` varchar(45) NOT NULL,
  `logging_time` int(11) NOT NULL,
  `logging_ip` int(11) NOT NULL,
  PRIMARY KEY (`logging_id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tt_logging`
--

LOCK TABLES `tt_logging` WRITE;
/*!40000 ALTER TABLE `tt_logging` DISABLE KEYS */;
INSERT INTO `tt_logging` VALUES (3,'ip地址为::1的用户登陆后台',1433582702,0),(4,'ip地址为::1的用户登陆后台',1433606268,0),(5,'ip地址为::1的用户登陆后台',1433645733,0),(6,'ip地址为::1的用户登陆后台',1433656195,0),(7,'ip地址为::1的用户登陆后台',1433663420,0),(8,'ip地址为::1的用户登陆后台',1433827877,0),(9,'ip地址为::1的用户登陆后台',1433852557,0),(10,'ip地址为::1的用户登陆后台',1435819007,0),(11,'ip地址为::1的用户登陆后台',1436538646,0),(12,'ip地址为::1的用户登陆后台',1436541704,0),(13,'ip地址为::1的用户登陆后台',1436589388,0),(14,'ip地址为::1的用户登陆后台',1436696496,0),(15,'ip地址为::1的用户登陆后台',1436797294,0),(16,'ip地址为::1的用户把商品商品fromalextest7的分类改成：电脑硬件',1436883946,0),(17,'ip地址为::1的用户把商品商品fromalextest7的分类改成：通讯产品',1436883955,0),(18,'ip地址为::1的用户把alextest7设为被禁止访问',1436886863,0),(21,'ip地址为::1的用户删除了1个商品',1437183340,0),(22,'ip地址为::1的用户把alextest7设为正常访问',1437199789,0),(23,'ip地址为::1的用户把alextest7设为被禁止访问',1437199806,0),(24,'ip地址为::1的用户登陆后台',1437201778,0),(25,'ip地址为::1的用户登陆后台',1437229938,0),(26,'ip地址为::1的用户把alextest5设为正常访问',1437236246,0),(27,'ip地址为::1的用户把alextest5设为正常访问',1437236319,0),(28,'ip地址为::1的用户把alextest5设为正常访问',1437236341,0),(29,'ip地址为::1的用户把alextest5设为正常访问',1437236820,0),(30,'ip地址为::1的用户把alextest5设为正常访问',1437237000,0),(31,'ip地址为::1的用户把alextest5设为正常访问',1437237136,0),(32,'ip地址为::1的用户把alextest5设为正常访问',1437237243,0),(33,'ip地址为::1的用户把alextest5设为正常访问',1437237320,0),(34,'ip地址为::1的用户把alextest5设为正常访问',1437237385,0),(35,'ip地址为::1的用户把alextest5设为正常访问',1437270480,0),(36,'ip地址为::1的用户把alextest5设为未审核',1437270848,0),(37,'ip地址为::1的用户把alextest5设为正常访问',1437270854,0),(38,'ip地址为::1的用户把alextest5设为未审核',1437270990,0),(39,'ip地址为::1的用户把alextest5设为正常访问',1437270997,0),(40,'ip地址为::1的用户把alextest5设为未审核',1437271118,0),(41,'ip地址为::1的用户把alextest5设为正常访问',1437271130,0),(42,'ip地址为::1的用户把alextest5设为未审核',1437271164,0),(43,'ip地址为::1的用户把alextest5设为正常访问',1437271175,0),(44,'ip地址为::1的用户把alextest5设为未审核',1437271303,0),(45,'ip地址为::1的用户把alextest5设为正常访问',1437271317,0),(46,'ip地址为::1的用户把alextest5设为未审核',1437271356,0),(47,'ip地址为::1的用户把alextest5设为正常访问',1437271365,0),(48,'ip地址为::1的用户把alextest5设为未审核',1437271403,0),(49,'ip地址为::1的用户把alextest5设为正常访问',1437271411,0),(50,'ip地址为::1的用户把alextest4设为正常访问',1437271495,0),(51,'ip地址为::1的用户把alextest5设为未审核',1437271505,0),(52,'ip地址为::1的用户把alextest4设为未审核',1437271578,0),(53,'ip地址为::1的用户把alextest5设为正常访问',1437271590,0),(54,'ip地址为::1的用户把alextest3设为正常访问',1437272310,0),(55,'ip地址为::1的用户把alextest4设为正常访问',1437272324,0),(56,'ip地址为::1的用户把alextest4设为正常访问',1437272397,0),(57,'ip地址为::1的用户把alextest5设为正常访问',1437272402,0),(58,'ip地址为::1的用户把alextest5设为未审核',1437274605,0),(59,'ip地址为::1的用户把alextest4设为未审核',1437274609,0),(60,'ip地址为::1的用户把alextest5设为正常访问',1437274619,0),(61,'ip地址为::1的用户把alextest4设为正常访问',1437274634,0),(62,'ip地址为::1的用户把alextest3设为审核未通过',1437274648,0),(63,'ip地址为::1的用户把alextest4设为未审核',1437274651,0),(64,'ip地址为::1的用户把aaaa设为未审核',1437274654,0),(65,'ip地址为::1的用户把alextest设为正常访问',1437274664,0),(66,'ip地址为::1的用户把alextest7设为正常访问',1437274759,0);
/*!40000 ALTER TABLE `tt_logging` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tt_members`
--

DROP TABLE IF EXISTS `tt_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tt_members` (
  `members_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `members_username` varchar(30) DEFAULT NULL COMMENT '用户名',
  `members_password` char(32) DEFAULT NULL COMMENT '密码',
  `members_truename` varchar(30) DEFAULT NULL COMMENT '真实姓名',
  `members_identitycard` varchar(20) DEFAULT NULL COMMENT '身份证',
  `members_studentscard` varchar(20) DEFAULT NULL COMMENT '学生证',
  `members_address` varchar(120) DEFAULT NULL COMMENT '住址',
  `members_mobile` varchar(18) DEFAULT NULL COMMENT '手机',
  `members_qqnum` varchar(12) DEFAULT NULL COMMENT 'qq号码',
  `members_email` varchar(40) DEFAULT NULL COMMENT '邮箱',
  `members_bewrite` varchar(200) DEFAULT NULL COMMENT '描述',
  `members_joinip` varchar(20) DEFAULT NULL COMMENT '注册时ip地址',
  `members_joindate` int(10) unsigned DEFAULT NULL COMMENT '注册时间',
  `members_lastloginip` varchar(20) DEFAULT NULL COMMENT '最后一次登录的ip',
  `members_lastlogindate` int(10) unsigned DEFAULT NULL COMMENT '最后一次登录的时间',
  `members_visitset` tinyint(1) unsigned DEFAULT NULL COMMENT '用户审核状态0正常访问,1未审核,2审核未通过,3被禁止访问',
  `members_systembewrite` varchar(200) DEFAULT NULL COMMENT '系统对该用户的描述',
  `members_schoolname` varchar(120) DEFAULT NULL,
  `members_code` char(18) DEFAULT '0',
  `members_gender` tinyint(1) DEFAULT '0',
  `members_edit` tinyint(1) unsigned DEFAULT '0' COMMENT '是否已修改过',
  PRIMARY KEY (`members_id`),
  UNIQUE KEY `members_username` (`members_username`,`members_identitycard`,`members_studentscard`,`members_address`,`members_mobile`,`members_qqnum`,`members_email`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tt_members`
--

LOCK TABLES `tt_members` WRITE;
/*!40000 ALTER TABLE `tt_members` DISABLE KEYS */;
INSERT INTO `tt_members` VALUES (31,'alextest7','49d23a29a22cb93add4aa239a89577a8','dfjslkdjf','123456789012345644','221324545','12132456421','12345678905','1245678','1231878@qq.com','215487','::1',1435635396,'::1',0,0,NULL,'fdjskfjlk','0',1,0),(10,'非官方的','2ca3b7f3ca77c165aaa1f8991e036cdc','打算放豆腐','','','','','','','','0.0.0.0',1431611676,NULL,NULL,1,'无','','0',1,0),(11,'呵呵哒','11ddbaf3386aea1f2974eee984542152','淡定点','淡定点','淡定点','淡定点','淡定点','淡定点','点点滴滴','顶顶顶顶顶顶顶顶顶顶','0.0.0.0',1431611907,NULL,NULL,0,'无','淡定点','0',1,0),(12,'aaaa','47bce5c74f589f4867dbd57e9ca9f808','sdfsdf','sdfsdf','sdff','safsdf','sfsdf','dsfsdf','sfsdf','sfsdfds','0.0.0.0',1431616148,NULL,NULL,1,'无','sdfds','0',1,0),(13,'fsafsdf','e10adc3949ba59abbe56e057f20f883e','12313','123456789012345678','54564654','1321321','12345678901','13213244','1213154@qq.com','sfdd','0.0.0.0',1431619383,NULL,NULL,0,'无','121331','0',0,0),(14,'ddss','1adbb3178591fd5bb0c248518f39bf6d','发的发松岛枫','123456789012345679','2121','123132','12345678902','12315465231','123131@qq.com','132132','0.0.0.0',1431653574,NULL,NULL,3,'无','阿范德萨发','0',0,0),(15,'aaa123','0b4e7a0e5fe84ad35fb5f95b9ceeac79','12312','123456789012345675','121321','1231231','12345789091','1212131','12315456@qq.com','佛挡杀佛','0.0.0.0',1431670047,NULL,NULL,1,'无','123132','0',0,0),(16,'aaa456','855b99840f919bb853087c182c939512','4545','123456789012345674','123132','12313','12345678908','21313','13213@qq.com','15645','0.0.0.0',1431670122,NULL,NULL,1,'无','456465','0',0,0),(17,'agha','e99a18c428cb38d5f260853678922e03','1213','123456789012345677','121313','132132','78945612301','1321321','12313@qq.com','245','0.0.0.0',1431671290,NULL,NULL,1,'无','213213','0',0,0),(18,'agha1','e99a18c428cb38d5f260853678922e03','1213','123456789012345670','121313','132132','78945612302','1321321','123132221@qq.com','245','0.0.0.0',1431671381,NULL,NULL,1,'无','213213','0',0,0),(19,'fdfd','25f9e794323b453885f5181f1b624d0b','21321','123456789123456780','12313213','1213213','12345679805','1231456','1231321@qq.com','54545','0.0.0.0',1431671592,NULL,NULL,2,'无','3132132','0',0,0),(20,'aaaa1234','943811a65c02a2b0563d2d997b83d016','132145','123456790123456975','213132','456465456','78945612350','123123321','233133@qq.com','safdf','0.0.0.0',1431677664,NULL,NULL,2,'无','1231564','0',0,0),(27,'alextest2','55233683efa66cc5e90e32e5b90de8cf','sfsdfdsfsd','440685198725410325','123132','123132','45678912301','4543213','13213213@qq.com','dsfdsfdf','0.0.0.0',1433344334,NULL,NULL,2,'无','fdsafdsf','0',0,0),(25,'alextest','dbffd6445d2a0c37b6b99eb69cfac75d','就看到','123456789123456789','12345','12315115','78945612305','12454','12133@qq.com','32165','0.0.0.0',1432695704,NULL,NULL,0,'无','第三方','0',0,0),(26,'alextest1','48e1865d0757a5da114bd11c5296d808','呵呵呵','789456123987654321','126054','21saf2ds1f','45678912320','545423','123113@qq.com','jdhsfkj','0.0.0.0',1432970349,NULL,NULL,1,'无','呵呵呵','0',0,0),(28,'alextest3','e0f5d94620eb675c0450c4c439e16b57','阿萨德将','456789123098765432','12465465','1321321','12345678985','1234567895','123456@qq.com','dfsdfdf','0.0.0.0',1433518354,NULL,NULL,2,'无','滇水金凤考四六级','0',0,0),(29,'alextest4','2e3778e2a925fb2fdf9e41c36be03133',NULL,'112465789012345678','132132','','12345678905','12345','123465@qq.com','djfkslf','::1',1433808845,NULL,NULL,1,NULL,'dksfjlksdf','0',0,0),(30,'alextest5','9a43905758e7c0491799dd5e9e5c507c',NULL,'123456781012345678','1545','545646','12345678901','1245787','124564@qq.com','jkslfjds','::1',1433814144,NULL,NULL,0,NULL,'safdjkldjf','0',0,0);
/*!40000 ALTER TABLE `tt_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tt_members_forbidden`
--

DROP TABLE IF EXISTS `tt_members_forbidden`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tt_members_forbidden` (
  `members_forbidden_usercode` char(18) NOT NULL,
  `members_forbidden_username` varchar(30) NOT NULL,
  `members_forbidden_table` char(2) NOT NULL,
  `members_forbidden_date` int(10) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tt_members_forbidden`
--

LOCK TABLES `tt_members_forbidden` WRITE;
/*!40000 ALTER TABLE `tt_members_forbidden` DISABLE KEYS */;
/*!40000 ALTER TABLE `tt_members_forbidden` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tt_membersunique`
--

DROP TABLE IF EXISTS `tt_membersunique`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tt_membersunique` (
  `membersunique_memberscode` int(11) NOT NULL AUTO_INCREMENT,
  `membersunique_identityCard` varchar(20) NOT NULL,
  `membersunique_studentsCard` varchar(20) NOT NULL,
  `membersunique_mobile` varchar(18) NOT NULL,
  `membersunique_qqNum` varchar(12) NOT NULL,
  `membersunique_email` varchar(40) NOT NULL,
  PRIMARY KEY (`membersunique_memberscode`),
  UNIQUE KEY `membersunique_identityCard` (`membersunique_identityCard`,`membersunique_studentsCard`,`membersunique_mobile`,`membersunique_qqNum`,`membersunique_email`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tt_membersunique`
--

LOCK TABLES `tt_membersunique` WRITE;
/*!40000 ALTER TABLE `tt_membersunique` DISABLE KEYS */;
INSERT INTO `tt_membersunique` VALUES (6,'123456781012345678','1545','12345678901','1245787','124564@qq.com'),(7,'123456789123456789','12345','78945612305','12454','12133@qq.com'),(5,'112465789012345678','132132','12345678905','12345','123465@qq.com'),(8,'123456789012345644','221324545','12345678905','1245678','1231878@qq.com');
/*!40000 ALTER TABLE `tt_membersunique` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tt_message`
--

DROP TABLE IF EXISTS `tt_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tt_message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_from_userid` char(18) DEFAULT NULL,
  `message_from_username` varchar(30) DEFAULT NULL,
  `message_msg` varchar(500) DEFAULT NULL,
  `message_title` varchar(30) DEFAULT NULL,
  `message_typeto` tinyint(1) unsigned DEFAULT '0' COMMENT '0未读,1已读,2删除',
  `message_typefrom` tinyint(1) unsigned DEFAULT '0' COMMENT '0未读,1已读,2删除',
  `message_to_userid` char(18) DEFAULT NULL,
  `message_to_username` varchar(30) DEFAULT NULL,
  `message_date` int(10) unsigned DEFAULT NULL,
  `message_ip` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tt_message`
--

LOCK TABLES `tt_message` WRITE;
/*!40000 ALTER TABLE `tt_message` DISABLE KEYS */;
INSERT INTO `tt_message` VALUES (32,'1','系统','该信息由系统自动发送给您!用户：alextest 订购或对您发布的商品信息表示感兴趣，您可以通过短信方式联系他\r\n													[浏览商品]','商品订购（或感兴趣）:对双方都',0,32,'25','alextest',1433207158,'::1'),(33,'1','系统','该信息由系统自动发送给您!用户：alextest 订购或对您发布的商品信息表示感兴趣，您可以通过短信方式联系他\r\n													[浏览商品]','商品订购（或感兴趣）:发达地方',0,15,'25','alextest',1433208032,'::1'),(22,'25','alextest','呵呵呵呵咳咳咳咳','呵呵呵咳咳咳',1,0,'25','alextest',1433152518,'::1'),(18,'25','alextest','的说法是否','客户即可',0,0,'26','alextest1',1432978580,'::1'),(17,'25','alextest','去你的，滚边去','wa ta shi wa hehe de su',0,0,'26','alextest1',1432974113,'::1'),(16,'26','alextest1','wa ta shi wa hehe de suwa ta shi wa hehe de su','wa ta shi wa hehe de su',1,0,'25','alextest',1432974063,'::1'),(13,'25','alextest','色融入一体','fsdf',1,0,'25','alextest',1432973280,'::1'),(14,'25','alextest','的发发顺丰的','我是新来的，我叫alextest1',0,0,'26','alextest1',1432973348,'::1'),(34,'1','系统','该信息由系统自动发送给您!用户：alextest 订购或对您发布的商品信息表示感兴趣，您可以通过短信方式联系他\r\n													[浏览商品]','商品订购（或感兴趣）:大件事',0,50,'25','alextest',1433432090,'::1');
/*!40000 ALTER TABLE `tt_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tt_notice_all`
--

DROP TABLE IF EXISTS `tt_notice_all`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tt_notice_all` (
  `notice_id` varchar(18) NOT NULL,
  `notice_title` varchar(60) NOT NULL,
  `notice_content` text NOT NULL,
  `notice_author` varchar(20) NOT NULL,
  `notice_noticedate` int(20) NOT NULL,
  PRIMARY KEY (`notice_id`),
  KEY `notice_id` (`notice_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tt_notice_all`
--

LOCK TABLES `tt_notice_all` WRITE;
/*!40000 ALTER TABLE `tt_notice_all` DISABLE KEYS */;
INSERT INTO `tt_notice_all` VALUES ('1','goodnews','no news is good news','your dear admin',1410446412),('2','bestnews','good news is the best news','hehe',1410446412),('3','nonews','no news is no news','hehe',1410446412),('4','badnews','badnews','hehe',1410446412);
/*!40000 ALTER TABLE `tt_notice_all` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tt_secondgoods`
--

DROP TABLE IF EXISTS `tt_secondgoods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tt_secondgoods` (
  `secondgoods_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `secondgoods_class` int(4) unsigned DEFAULT NULL,
  `secondgoods_code` char(18) DEFAULT NULL,
  `secondgoods_usercode` char(18) DEFAULT NULL,
  `secondgoods_name` varchar(120) DEFAULT NULL,
  `secondgoods_hownew` int(1) unsigned DEFAULT NULL,
  `secondgoods_price` float unsigned DEFAULT NULL,
  `secondgoods_delivertype` int(1) unsigned DEFAULT NULL COMMENT '0当面,1邮寄对方付款,2邮寄寄方付款',
  `secondgoods_paidtype` int(1) DEFAULT NULL COMMENT '0当面付款,1支付宝,2其他方式',
  `secondgoods_goodsnums` int(5) unsigned DEFAULT '1',
  `secondgoods_bewrite` varchar(5000) DEFAULT NULL,
  `secondgoods_efficiency` int(1) unsigned DEFAULT '0' COMMENT '0正常,1已成交,2过期',
  `secondgoods_orders` int(11) DEFAULT '0',
  `secondgoods_postdate` int(10) unsigned DEFAULT NULL,
  `secondgoods_pastdate` int(10) unsigned DEFAULT NULL,
  `secondgoods_postip` varchar(20) DEFAULT '0.0.0.0',
  `secondgoods_tradetype` tinyint(1) DEFAULT NULL,
  `secondgoods_views` int(8) unsigned DEFAULT '0',
  `secondgoods_deliverdata` varchar(200) DEFAULT NULL,
  `secondgoods_editdate` int(10) DEFAULT NULL,
  `secondgoods_connectset` char(5) DEFAULT NULL COMMENT 'qq:mobile:email',
  `secondgoods_username` varchar(30) DEFAULT NULL,
  `secondgoods_table` char(2) DEFAULT NULL,
  PRIMARY KEY (`secondgoods_id`),
  UNIQUE KEY `tt_secondsell_code` (`secondgoods_code`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tt_secondgoods`
--

LOCK TABLES `tt_secondgoods` WRITE;
/*!40000 ALTER TABLE `tt_secondgoods` DISABLE KEYS */;
INSERT INTO `tt_secondgoods` VALUES (5,10,NULL,'sessionuserid','松岛枫松岛枫',9,1234,0,0,134,'防守打法额额冯绍峰',2,0,1432197955,1432457155,'::1',0,0,NULL,NULL,NULL,NULL,NULL),(6,9,NULL,'sessionuserid','松岛枫松岛枫',9,1234,0,0,134,'防守打法额额冯绍峰',2,0,1432197955,1432457155,'::1',0,0,NULL,NULL,NULL,NULL,NULL),(7,12,NULL,'sessionuserid','第三方第三方',9,12,0,0,12,'发的顺丰发发送到',2,0,1432199143,1432458343,'::1',0,0,NULL,1432199143,NULL,NULL,NULL),(8,15,NULL,'sessionuserid','第三方第三方',9,12,0,0,12,'发的顺丰发发送到',2,0,1432199143,1432458343,'::1',1,0,NULL,1432199143,NULL,NULL,NULL),(9,13,NULL,'sessionuserid','adfdf',9,23434,0,0,424,'fdsfdsdf',2,0,1432210864,1432470064,'::1',1,2,NULL,1432210864,NULL,NULL,NULL),(10,9,NULL,'sessionuserid','adfdf',9,23434,0,0,424,'fdsfdsdf',2,0,1432210865,1432470064,'::1',1,0,NULL,1432210865,NULL,NULL,NULL),(58,11,NULL,'31','商品fromalextest7',9,12,0,0,12,'疯狂点开始放假',2,0,1435635503,1435894703,'::1',0,2,NULL,1435635503,NULL,NULL,NULL),(12,16,NULL,'sessionuserid','fdsfsdf',9,13,0,0,32,'fdsfsdf fsdf ',2,0,1432211068,1432470268,'::1',1,0,NULL,1432211068,NULL,NULL,NULL),(13,17,NULL,'sessionuserid','发顺丰的说',9,123,0,0,13,'法第三方第三方',2,0,1432211305,1432470505,'::1',1,2,NULL,1432211305,NULL,NULL,NULL),(16,13,NULL,'sessionuserid','发达地方',9,12,0,0,12,'的冯绍峰第三个',2,0,1432212656,1432471856,'::1',0,0,NULL,1432212656,NULL,NULL,NULL),(19,8,NULL,'sessionuserid','第三方',9,12,0,0,12,'撒地方第三方',2,0,1432213015,1432472215,'::1',0,0,NULL,1432213015,NULL,NULL,NULL),(20,8,NULL,'sessionuserid','第三方',9,12,0,0,12,'撒地方第三方',2,0,1432213015,1432472215,'::1',0,0,NULL,1432213015,NULL,NULL,NULL),(21,8,NULL,'sessionuserid','第三方斯蒂芬',9,12,0,0,12,'fjdskfjd',2,0,1432222416,1432481616,'::1',0,0,NULL,1432222416,NULL,NULL,NULL),(22,8,NULL,'sessionuserid','第三方斯蒂芬',9,12,0,0,12,'fjdskfjd',2,0,1432222416,1432481616,'::1',0,0,NULL,1432222416,NULL,NULL,NULL),(31,7,NULL,'25','呵呵呵',9,3234,0,1,12,'第三方的丰富的',2,0,1432813830,1433073030,'::1',0,4,NULL,1432813830,NULL,NULL,NULL),(33,10,NULL,'25','防守打法',9,32,0,0,23,'风更大更热官方的说法',2,0,1432814419,1433073619,'::1',0,6,NULL,1432814419,NULL,NULL,NULL),(34,8,NULL,'25','没有电脑',9,1000,0,0,1,'没有电脑卖',2,0,1433243328,1433502528,'::1',0,2,NULL,1433243328,NULL,NULL,NULL),(35,18,NULL,'25','没东西卖',9,12,0,0,12,'啊啊啊啊啊啊',1,0,1433312087,1433571287,'::1',0,19,NULL,1433312087,NULL,NULL,NULL),(36,18,NULL,'25','阿迪达斯',9,23,0,0,1,'正版无码高清',1,0,1433316047,1433575246,'::1',0,124,NULL,1433316047,NULL,NULL,NULL),(37,13,NULL,'27','打电脑大点挠',9,2222,0,0,11,'弄弄弄弄弄弄弄弄',2,0,1433345367,1433604567,'::1',0,0,NULL,1433345367,NULL,NULL,NULL),(38,13,NULL,'27','怎么又是买电脑',9,1234,0,0,1,'呵呵呵呵呵呵呵呵',2,0,1433345494,1433604694,'::1',0,0,NULL,1433345494,NULL,NULL,NULL),(40,17,NULL,'27','打算放豆腐',9,222,0,0,12,'大送飞吻丰富',2,0,1433346336,1433605536,'::1',0,0,NULL,1433346336,NULL,NULL,NULL),(42,8,NULL,'27','啊啊啊啊',9,12,0,0,12,'啊啊啊啊啊啊啊啊啊',2,0,1433378255,1433637455,'::1',0,0,NULL,1433378255,NULL,NULL,NULL),(43,13,NULL,'27','出口将分类肯定是',9,2121,0,0,12,'额呵呵呵呵',2,0,1433380668,1433639868,'::1',0,0,NULL,1433380668,NULL,NULL,NULL),(44,13,NULL,'27','啊啊啊啊',9,32,0,0,2,'的撒范德萨',2,0,1433382608,1433641808,'::1',0,0,NULL,1433382608,NULL,NULL,NULL),(45,14,NULL,'27','第三方二二二',9,12,0,0,21,'粉色为法国',2,0,1433382871,1433642071,'::1',0,0,NULL,1433382871,NULL,NULL,NULL),(46,16,NULL,'27','第三方第三方',9,11,0,0,1,'顺风娃娃饭店',2,0,1433383150,1433642350,'::1',0,6,NULL,1433383150,NULL,NULL,NULL),(47,11,NULL,'27','佛挡杀佛',9,12,0,0,12,'撒地方第三方',2,0,1433385044,1433644244,'::1',0,4,NULL,1433385044,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tt_secondgoods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tt_secondgoods_title`
--

DROP TABLE IF EXISTS `tt_secondgoods_title`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tt_secondgoods_title` (
  `secondgoods_code` char(18) NOT NULL,
  `secondgoods_name` varchar(120) NOT NULL,
  `secondgoods_efficiency` int(1) unsigned NOT NULL COMMENT '0正常,1已成交,2过期',
  `secondgoods_postdate` int(10) unsigned NOT NULL,
  `secondgoods_tradetype` tinyint(1) unsigned NOT NULL,
  `secondgoods_usercode` varchar(18) NOT NULL,
  `secondgoods_class` int(4) unsigned NOT NULL,
  `secondgoods_title_table` char(2) NOT NULL,
  `secondgoods_views` int(10) unsigned NOT NULL,
  UNIQUE KEY `secondgoods_code` (`secondgoods_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tt_secondgoods_title`
--

LOCK TABLES `tt_secondgoods_title` WRITE;
/*!40000 ALTER TABLE `tt_secondgoods_title` DISABLE KEYS */;
/*!40000 ALTER TABLE `tt_secondgoods_title` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tt_secondgoodsreply`
--

DROP TABLE IF EXISTS `tt_secondgoodsreply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tt_secondgoodsreply` (
  `secondgoodsreply_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `secondgoodsreply_code` char(18) NOT NULL,
  `secondgoodsreply_replyto` char(18) NOT NULL,
  `secondgoodsreply_usercode` char(18) NOT NULL,
  `secondgoodsreply_postdate` int(10) unsigned NOT NULL,
  `secondgoodsreply_postip` varchar(20) NOT NULL,
  `secondgoodsreply_msg` varchar(300) NOT NULL,
  `secondgoodsreply_secret` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0代表全部人可以看到,1代表只有卖家或买家可以看到',
  `secondgoodsreply_username` varchar(30) NOT NULL,
  PRIMARY KEY (`secondgoodsreply_id`),
  UNIQUE KEY `secondbuyreply_code` (`secondgoodsreply_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tt_secondgoodsreply`
--

LOCK TABLES `tt_secondgoodsreply` WRITE;
/*!40000 ALTER TABLE `tt_secondgoodsreply` DISABLE KEYS */;
/*!40000 ALTER TABLE `tt_secondgoodsreply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tt_seconduploads`
--

DROP TABLE IF EXISTS `tt_seconduploads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tt_seconduploads` (
  `seconduploads_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `seconduploads_code` char(18) DEFAULT NULL,
  `seconduploads_usercode` int(11) DEFAULT NULL,
  `seconduploads_location` varchar(200) DEFAULT NULL,
  `seconduploads_bewrite` varchar(200) DEFAULT NULL,
  `seconduploads_date` int(10) unsigned DEFAULT NULL,
  `seconduploads_size` int(4) unsigned DEFAULT NULL,
  `seconduploads_type` tinytext,
  `seconduploads_goodscode` int(11) DEFAULT NULL,
  PRIMARY KEY (`seconduploads_id`),
  UNIQUE KEY `photos_code` (`seconduploads_code`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tt_seconduploads`
--

LOCK TABLES `tt_seconduploads` WRITE;
/*!40000 ALTER TABLE `tt_seconduploads` DISABLE KEYS */;
INSERT INTO `tt_seconduploads` VALUES (1,NULL,27,NULL,NULL,1433345367,NULL,NULL,37),(2,NULL,27,NULL,NULL,1433345494,NULL,NULL,38),(3,NULL,27,NULL,NULL,1433345678,NULL,NULL,39),(4,NULL,27,NULL,NULL,1433346336,NULL,NULL,40),(5,NULL,27,NULL,NULL,1433346404,NULL,NULL,41),(6,NULL,NULL,NULL,NULL,1433378255,NULL,NULL,42),(7,NULL,27,'2015-06-04/','556fa73c33741.jpg',1433380668,10115,'image/jpeg',43),(8,NULL,27,'2015-06-04/','556faed020c2b.jpg',1433382608,10115,'image/jpeg',44),(9,NULL,27,'2015-06-04/','556fafd7681b3.jpg',1433382871,10115,'image/jpeg',45),(10,NULL,27,'2015-06-04/','556fb0ee6d65d.JPG',1433383150,82776,'image/jpeg',46),(11,NULL,27,'2015-06-04/','556fb0ee6e1c3.jpg',1433383150,1787626,'image/jpeg',46),(12,NULL,27,'2015-06-04/','556fc2c62f38a.jpg',1433387718,1787626,'image/jpeg',48),(13,NULL,27,'2015-06-04/','556fc2c62f8e5.JPG',1433387718,82776,'image/jpeg',48),(14,NULL,27,'2015-06-04/','556fc751f3cf4.jpg',1433388882,41755,'image/jpeg',50),(15,NULL,27,'2015-06-04/','556fef255580a.jpg',1433399077,41755,'image/jpeg',52),(16,NULL,27,'2015-06-04/','556fefcc0db45.jpg',1433399244,41755,'image/jpeg',54),(17,NULL,27,'2015-06-04/','556ff125c560e.jpg',1433399589,80229,'image/jpeg',55),(18,NULL,0,'2015-06-06/','55725475dba69.jpg',1433556086,1787626,'image/jpeg',57);
/*!40000 ALTER TABLE `tt_seconduploads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tt_sqltable`
--

DROP TABLE IF EXISTS `tt_sqltable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tt_sqltable` (
  `sqltable_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `sqltable_name` varchar(18) NOT NULL,
  `sqltable_type` varchar(18) NOT NULL,
  `sqltable_createdate` int(10) unsigned NOT NULL,
  PRIMARY KEY (`sqltable_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1383 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tt_sqltable`
--

LOCK TABLES `tt_sqltable` WRITE;
/*!40000 ALTER TABLE `tt_sqltable` DISABLE KEYS */;
/*!40000 ALTER TABLE `tt_sqltable` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-07-19 19:57:33
