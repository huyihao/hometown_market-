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
  `admins_lastip` varchar(20) NOT NULL,
  `admins_lastdate` int(10) unsigned NOT NULL,
  UNIQUE KEY `admins_name` (`admins_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tt_admins`
--

LOCK TABLES `tt_admins` WRITE;
/*!40000 ALTER TABLE `tt_admins` DISABLE KEYS */;
/*!40000 ALTER TABLE `tt_admins` ENABLE KEYS */;
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
-- Table structure for table `tt_members`
--

DROP TABLE IF EXISTS `tt_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tt_members` (
  `members_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `members_username` varchar(30) NOT NULL COMMENT '用户名',
  `members_password` char(32) NOT NULL COMMENT '密码',
  `members_truename` varchar(30) NOT NULL COMMENT '真实姓名',
  `members_identitycard` varchar(20) NOT NULL COMMENT '身份证',
  `members_studentscard` varchar(20) NOT NULL COMMENT '学生证',
  `members_address` varchar(120) NOT NULL COMMENT '住址',
  `members_mobile` varchar(18) NOT NULL COMMENT '手机',
  `members_qqnum` varchar(12) NOT NULL COMMENT 'qq号码',
  `members_email` varchar(40) NOT NULL COMMENT '邮箱',
  `members_bewrite` varchar(200) NOT NULL COMMENT '描述',
  `members_joinip` varchar(20) NOT NULL COMMENT '注册时ip地址',
  `members_joindate` int(10) unsigned NOT NULL COMMENT '注册时间',
  `members_lastloginip` varchar(20) NOT NULL COMMENT '最后一次登录的ip',
  `members_lastlogindate` int(10) unsigned NOT NULL COMMENT '最后一次登录的时间',
  `members_visitset` tinyint(1) unsigned NOT NULL COMMENT '用户审核状态0正常访问,1未审核,2审核未通过,3被禁止访问',
  `members_systembewrite` varchar(200) NOT NULL COMMENT '系统对该用户的描述',
  `members_schoolname` varchar(120) NOT NULL,
  `members_code` char(18) NOT NULL,
  `members_gender` tinyint(1) NOT NULL DEFAULT '0',
  `members_edit` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否已修改过',
  PRIMARY KEY (`members_id`),
  UNIQUE KEY `members_username` (`members_username`,`members_identitycard`,`members_studentscard`,`members_address`,`members_mobile`,`members_qqnum`,`members_email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tt_members`
--

LOCK TABLES `tt_members` WRITE;
/*!40000 ALTER TABLE `tt_members` DISABLE KEYS */;
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
  `membersunique_memberscode` char(18) NOT NULL,
  `membersunique_identityCard` varchar(20) NOT NULL,
  `membersunique_studentsCard` varchar(20) NOT NULL,
  `membersunique_mobile` varchar(18) NOT NULL,
  `membersunique_qqNum` varchar(12) NOT NULL,
  `membersunique_email` varchar(40) NOT NULL,
  PRIMARY KEY (`membersunique_memberscode`),
  UNIQUE KEY `membersunique_identityCard` (`membersunique_identityCard`,`membersunique_studentsCard`,`membersunique_mobile`,`membersunique_qqNum`,`membersunique_email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tt_membersunique`
--

LOCK TABLES `tt_membersunique` WRITE;
/*!40000 ALTER TABLE `tt_membersunique` DISABLE KEYS */;
/*!40000 ALTER TABLE `tt_membersunique` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tt_message`
--

DROP TABLE IF EXISTS `tt_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tt_message` (
  `message_code` char(18) NOT NULL,
  `message_from_usercode` char(18) NOT NULL,
  `message_from_username` varchar(30) NOT NULL,
  `message_msg` varchar(500) NOT NULL,
  `message_title` varchar(30) NOT NULL,
  `message_typeto` tinyint(1) unsigned NOT NULL COMMENT '0未读,1已读,2删除',
  `message_typefrom` tinyint(1) unsigned NOT NULL COMMENT '0未读,1已读,2删除',
  `message_to_usercode` char(18) NOT NULL,
  `message_to_username` varchar(30) NOT NULL,
  `message_date` int(10) unsigned NOT NULL,
  `message_ip` varchar(20) NOT NULL,
  PRIMARY KEY (`message_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tt_message`
--

LOCK TABLES `tt_message` WRITE;
/*!40000 ALTER TABLE `tt_message` DISABLE KEYS */;
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
INSERT INTO `tt_notice_all` VALUES ('1','goodnews','no news is good news','your dear admin',1410446412),('2','bestnews','good news is the best news','hehe',1410446412);
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
  `secondgoods_class` int(4) unsigned NOT NULL,
  `secondgoods_code` char(18) NOT NULL,
  `secondgoods_usercode` char(18) NOT NULL,
  `secondgoods_name` varchar(120) NOT NULL,
  `secondgoods_hownew` int(1) unsigned NOT NULL,
  `secondgoods_price` float unsigned NOT NULL,
  `secondgoods_delivertype` int(1) unsigned NOT NULL COMMENT '0当面,1邮寄对方付款,2邮寄寄方付款',
  `secondgoods_paidtype` int(1) NOT NULL COMMENT '0当面付款,1支付宝,2其他方式',
  `secondgoods_goodsnums` int(5) unsigned NOT NULL DEFAULT '1',
  `secondgoods_bewrite` varchar(5000) NOT NULL,
  `secondgoods_efficiency` int(1) unsigned NOT NULL COMMENT '0正常,1已成交,2过期',
  `secondgoods_orders` varchar(1000) NOT NULL,
  `secondgoods_postdate` int(10) unsigned NOT NULL,
  `secondgoods_pastdate` int(10) unsigned NOT NULL,
  `secondgoods_postip` varchar(20) NOT NULL DEFAULT '0.0.0.0',
  `secondgoods_tradetype` tinyint(1) NOT NULL,
  `secondgoods_views` int(8) unsigned NOT NULL,
  `secondgoods_deliverdata` varchar(200) NOT NULL,
  `secondgoods_editdate` int(10) NOT NULL,
  `secondgoods_connectset` char(5) NOT NULL COMMENT 'qq:mobile:email',
  `secondgoods_username` varchar(30) NOT NULL,
  `secondgoods_table` char(2) NOT NULL,
  PRIMARY KEY (`secondgoods_id`),
  UNIQUE KEY `tt_secondsell_code` (`secondgoods_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tt_secondgoods`
--

LOCK TABLES `tt_secondgoods` WRITE;
/*!40000 ALTER TABLE `tt_secondgoods` DISABLE KEYS */;
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
  `secondgoods_views` int(10) NOT NULL DEFAULT '0',
  UNIQUE KEY `secondgoods_code` (`secondgoods_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tt_secondgoods_title`
--

LOCK TABLES `tt_secondgoods_title` WRITE;
/*!40000 ALTER TABLE `tt_secondgoods_title` DISABLE KEYS */;
INSERT INTO `tt_secondgoods_title` VALUES ('1','二手书',0,1410446412,1,'1',1234,0),('2','三手书',1,1410446412,0,'1',1234,1);
/*!40000 ALTER TABLE `tt_secondgoods_title` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tt_secondgoods_title_all`
--

DROP TABLE IF EXISTS `tt_secondgoods_title_all`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tt_secondgoods_title_all` (
  `secondgoods_code` varchar(18) NOT NULL,
  `secondgoods_name` varchar(120) NOT NULL,
  `secondgoods_efficiency` int(1) unsigned NOT NULL COMMENT '0正常,1已成交,2过期',
  `secondgoods_postdate` int(10) unsigned NOT NULL,
  `secondgoods_tradetype` int(1) unsigned NOT NULL,
  `secondgoods_usercode` varchar(18) NOT NULL,
  `secondgoods_class` int(4) unsigned NOT NULL,
  `secondgoods_title_table` varchar(18) NOT NULL,
  `secondgoods_views` int(10) unsigned NOT NULL,
  UNIQUE KEY `secondgoods_code` (`secondgoods_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tt_secondgoods_title_all`
--

LOCK TABLES `tt_secondgoods_title_all` WRITE;
/*!40000 ALTER TABLE `tt_secondgoods_title_all` DISABLE KEYS */;
/*!40000 ALTER TABLE `tt_secondgoods_title_all` ENABLE KEYS */;
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
  `seconduploads_code` char(18) NOT NULL,
  `seconduploads_usercode` char(18) NOT NULL,
  `seconduploads_location` varchar(200) NOT NULL,
  `seconduploads_bewrite` varchar(200) NOT NULL,
  `seconduploads_date` int(10) unsigned NOT NULL,
  `seconduploads_size` int(4) unsigned NOT NULL,
  `seconduploads_type` tinytext NOT NULL,
  `seconduploads_goodscode` char(18) NOT NULL,
  PRIMARY KEY (`seconduploads_id`),
  UNIQUE KEY `photos_code` (`seconduploads_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tt_seconduploads`
--

LOCK TABLES `tt_seconduploads` WRITE;
/*!40000 ALTER TABLE `tt_seconduploads` DISABLE KEYS */;
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

-- Dump completed on 2015-05-13 12:38:13
