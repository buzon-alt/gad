/*
SQLyog Enterprise - MySQL GUI v8.18 
MySQL - 5.5.5-10.4.24-MariaDB : Database - dbgadproject
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbgadproject` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `dbgadproject`;

/*Table structure for table `attachment` */

DROP TABLE IF EXISTS `attachment`;

CREATE TABLE `attachment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `attachment` */

insert  into `attachment`(`id`,`project_id`,`filename`) values (1,36,'1670172442.PNG'),(3,38,'1670173744.png'),(4,38,'1670173817.png');

/*Table structure for table `evaluation` */

DROP TABLE IF EXISTS `evaluation`;

CREATE TABLE `evaluation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `evaluation_id` int(11) NOT NULL,
  `evaluation` varchar(225) NOT NULL,
  `type` varchar(225) NOT NULL,
  `score` decimal(10,2) NOT NULL,
  `attribution` decimal(10,2) NOT NULL,
  `interpretation` varchar(225) NOT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

/*Data for the table `evaluation` */

insert  into `evaluation`(`id`,`project_id`,`evaluation_id`,`evaluation`,`type`,`score`,`attribution`,`interpretation`,`date_created`) values (1,33,0,'Evaluation 2','','0.00','50025.00','Proposed project is gender-responsive.','2022-12-05 00:03:34'),(2,33,0,'Evaluation 1','Infrastructure','0.00','50025.00','Proposed project is gender-responsive.','2022-12-05 00:03:34'),(3,33,0,'Evaluation 1','Infrastructure','0.00','50025.00','Proposed project is gender-responsive.','2022-12-05 00:03:34'),(4,33,0,'Evaluation 1','Infrastructure','0.00','50025.00','Proposed project is gender-responsive.','2022-12-05 00:03:34'),(5,33,0,'Evaluation 1','Infrastructure','0.00','50025.00','Proposed project is gender-responsive.','2022-12-05 00:03:34'),(6,0,0,'Evaluation 1','Infrastructure','0.00','50025.00','Proposed project is gender-responsive.','2022-12-05 00:03:34'),(7,0,0,'Evaluation 1','Infrastructure','0.00','50025.00','Proposed project is gender-responsive.','2022-12-05 00:03:34'),(8,0,10,'Evaluation 1','Infrastructure','7.50','8.63','Proposed project has promising GAD prospects.','2022-12-05 00:03:34'),(9,33,0,'Evaluation 2','','0.00','50025.00','Proposed project is gender-responsive.','2022-12-05 00:03:34'),(10,33,0,'Evaluation 2','','0.00','50025.00','Proposed project is gender-responsive.','2022-12-05 00:03:34'),(11,1,0,'Evaluation 2','','0.00','50025.00','Proposed project is gender-responsive.','2022-12-05 00:03:34'),(12,1,1,'Evaluation2','','0.00','0.00','Proposed project is gender-sensitive.','2022-12-05 00:03:34'),(13,1,2,'Evaluation2','','10.99','0.00','Proposed project is gender-sensitive.','2022-12-05 00:03:34'),(14,1,11,'Evaluation 1','<br />\r\n<b>Warning</b>:  Undefined array key ','4.01','0.00','Proposed project has promising GAD prospects.','2022-12-05 00:03:34'),(15,39,12,'Evaluation 1','Infrastructure','18.67','198950.32','Proposed project is gender-responsive (proponent is commended).','2022-12-05 00:03:34'),(16,36,9,'Evaluation 1','Generic','17.00','170000.00','Proposed project is gender-responsive.','2022-12-05 00:03:34'),(17,1,10,'Evaluation 1','Generic','7.50','8.63','Proposed project has promising GAD prospects.','2022-12-05 00:03:34'),(18,1,3,'Evaluation2','Generic','17.67','0.00','Proposed project is gender-responsive.','2022-12-05 00:03:34'),(19,1,4,'Evaluation2','Generic','12.01','0.00','Proposed project is gender-sensitive.','2022-12-05 00:03:34'),(20,1,5,'Evaluation2','Generic','12.01','0.00','Proposed project is gender-sensitive.','2022-12-05 00:03:34'),(21,1,6,'Evaluation2','Generic','12.01','0.00','Proposed project is gender-sensitive.','2022-12-05 00:03:34'),(22,1,7,'Evaluation2','Generic','12.01','90075.00','Proposed project is gender-sensitive.','2022-12-05 00:03:34'),(23,11,13,'Evaluation 1','','1.34','0.00','GAD is invisible in the project (proposal is returned).','2022-12-05 00:03:34'),(24,11,14,'Evaluation 1','','20.02','2002000.00','Proposed project is gender-responsive.','2022-12-05 00:03:34'),(25,11,11,'Evaluation 1','Generic','0.00','0.00','Proposed project is gender-responsive.','2022-12-05 00:03:34'),(26,11,12,'Evaluation 1','Generic','18.67','198950.32','Proposed project is gender-responsive (proponent is commended).','2022-12-05 00:03:34'),(27,11,13,'Evaluation 1','Generic','16.85','4212.50','Proposed project is gender-responsive.','2022-12-05 00:03:34'),(28,34,14,'Evaluation 1','Generic','20.02','2002000.00','Proposed project is gender-responsive.','2022-12-05 00:03:34'),(29,34,8,'Evaluation 2','Generic','18.01','1801000.00','Proposed project is gender-responsive.','2022-12-05 00:03:34'),(30,35,15,'Evaluation 1','Infrastructure','1.67','1.92','GAD is invisible in the project','2022-12-05 00:03:34'),(31,35,9,'Evaluation 2','Infrastructure','17.00','170000.00','Proposed project is gender-responsive.','2022-12-05 00:03:34'),(32,37,16,'Evaluation 1','Infrastructure','1.99','23.28','GAD is invisible in the project (proposal is returned).','2022-12-19 00:04:52'),(33,38,15,'Evaluation 1','Generic','1.67','1.92','GAD is invisible in the project','2022-12-19 00:16:32'),(34,38,10,'Evaluation 2','Generic','7.50','8.63','Proposed project has promising GAD prospects.','2022-12-19 00:21:19');

/*Table structure for table `evaluation1_generic` */

DROP TABLE IF EXISTS `evaluation1_generic`;

CREATE TABLE `evaluation1_generic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `f_1` decimal(10,2) DEFAULT NULL,
  `f_1_desc` varchar(225) DEFAULT NULL,
  `f_1_1` decimal(10,2) DEFAULT NULL,
  `f_1_1_4` decimal(10,2) DEFAULT NULL,
  `f_1_1_desc` varchar(225) DEFAULT NULL,
  `f_1_2` decimal(10,2) DEFAULT NULL,
  `f_1_2_4` decimal(10,2) DEFAULT NULL,
  `f_1_2_desc` varchar(225) DEFAULT NULL,
  `f_2` decimal(10,2) DEFAULT NULL,
  `f_2_4` decimal(10,2) DEFAULT NULL,
  `f_2_desc` varchar(225) DEFAULT NULL,
  `f_3` decimal(10,2) DEFAULT NULL,
  `f_3_desc` varchar(225) DEFAULT NULL,
  `f_3_1` decimal(10,2) DEFAULT NULL,
  `f_3_1_4` decimal(10,2) DEFAULT NULL,
  `f_3_1_desc` varchar(225) DEFAULT NULL,
  `f_3_2` decimal(10,2) DEFAULT NULL,
  `f_3_2_4` decimal(10,2) DEFAULT NULL,
  `f_3_2_desc` varchar(225) DEFAULT NULL,
  `f_4` decimal(10,2) DEFAULT NULL,
  `f_4_4` decimal(10,2) DEFAULT NULL,
  `f_4_desc` varchar(225) DEFAULT NULL,
  `f_5` decimal(10,2) DEFAULT NULL,
  `f_5_4` decimal(10,2) DEFAULT NULL,
  `f_5_desc` varchar(225) DEFAULT NULL,
  `f_6` decimal(10,2) DEFAULT NULL,
  `f_6_desc` varchar(225) DEFAULT NULL,
  `f_6_1` decimal(10,2) DEFAULT NULL,
  `f_6_1_4` decimal(10,2) DEFAULT NULL,
  `f_6_1_desc` varchar(225) DEFAULT NULL,
  `f_6_2` decimal(10,2) DEFAULT NULL,
  `f_6_2_4` decimal(10,2) DEFAULT NULL,
  `f_6_2_desc` varchar(225) DEFAULT NULL,
  `f_6_3` decimal(10,2) DEFAULT NULL,
  `f_6_3_4` decimal(10,2) DEFAULT NULL,
  `f_6_3_desc` varchar(225) DEFAULT NULL,
  `f_7` decimal(10,2) DEFAULT NULL,
  `f_7_4` decimal(10,2) DEFAULT NULL,
  `f_7_desc` varchar(225) DEFAULT NULL,
  `f_8` decimal(10,2) DEFAULT NULL,
  `f_8_4` decimal(10,2) DEFAULT NULL,
  `f_8_desc` varchar(225) DEFAULT NULL,
  `f_9` decimal(10,2) DEFAULT NULL,
  `f_9_desc` varchar(225) DEFAULT NULL,
  `f_9_1` decimal(10,2) DEFAULT NULL,
  `f_9_1_4` decimal(10,2) DEFAULT NULL,
  `f_9_1_desc` varchar(225) DEFAULT NULL,
  `f_9_2` decimal(10,2) DEFAULT NULL,
  `f_9_2_4` decimal(10,2) DEFAULT NULL,
  `f_9_2_desc` varchar(225) DEFAULT NULL,
  `f_10` decimal(10,2) DEFAULT NULL,
  `f_10_desc` varchar(225) DEFAULT NULL,
  `f_10_1` decimal(10,2) DEFAULT NULL,
  `f_10_1_4` decimal(10,2) DEFAULT NULL,
  `f_10_1_desc` varchar(225) DEFAULT NULL,
  `f_10_2` decimal(10,2) DEFAULT NULL,
  `f_10_2_4` decimal(10,2) DEFAULT NULL,
  `f_10_2_desc` varchar(225) DEFAULT NULL,
  `f_10_3` decimal(10,2) DEFAULT NULL,
  `f_10_3_4` decimal(10,2) DEFAULT NULL,
  `f_10_3_desc` varchar(225) DEFAULT NULL,
  `total_score` decimal(10,2) DEFAULT NULL,
  `interpretation` varchar(225) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

/*Data for the table `evaluation1_generic` */

insert  into `evaluation1_generic`(`id`,`project_id`,`f_1`,`f_1_desc`,`f_1_1`,`f_1_1_4`,`f_1_1_desc`,`f_1_2`,`f_1_2_4`,`f_1_2_desc`,`f_2`,`f_2_4`,`f_2_desc`,`f_3`,`f_3_desc`,`f_3_1`,`f_3_1_4`,`f_3_1_desc`,`f_3_2`,`f_3_2_4`,`f_3_2_desc`,`f_4`,`f_4_4`,`f_4_desc`,`f_5`,`f_5_4`,`f_5_desc`,`f_6`,`f_6_desc`,`f_6_1`,`f_6_1_4`,`f_6_1_desc`,`f_6_2`,`f_6_2_4`,`f_6_2_desc`,`f_6_3`,`f_6_3_4`,`f_6_3_desc`,`f_7`,`f_7_4`,`f_7_desc`,`f_8`,`f_8_4`,`f_8_desc`,`f_9`,`f_9_desc`,`f_9_1`,`f_9_1_4`,`f_9_1_desc`,`f_9_2`,`f_9_2_4`,`f_9_2_desc`,`f_10`,`f_10_desc`,`f_10_1`,`f_10_1_4`,`f_10_1_desc`,`f_10_2`,`f_10_2_4`,`f_10_2_desc`,`f_10_3`,`f_10_3_4`,`f_10_3_desc`,`total_score`,`interpretation`,`date_created`) values (1,33,'1.00',NULL,'1.00','1.00',NULL,'1.00','1.00',NULL,'0.00','0.00',NULL,'2.00',NULL,'1.00','1.00',NULL,'1.00','1.00',NULL,'0.00','0.00',NULL,'0.00','0.00',NULL,'2.00',NULL,'1.00','1.00',NULL,'1.00','1.00',NULL,'1.00','1.00',NULL,'1.00','1.00',NULL,'0.00','0.00',NULL,'2.00',NULL,'1.00','1.00',NULL,'1.00','1.00',NULL,'2.00',NULL,'1.00','1.00',NULL,'1.00','1.00',NULL,'0.00','0.00',NULL,'10.00','Proposed project is gender-sensitive.','2022-12-04 23:59:24'),(2,33,'1.00',NULL,'0.50','0.50',NULL,'0.50','0.50',NULL,'0.00','0.00',NULL,'2.00',NULL,'1.00','1.00',NULL,'1.00','1.00',NULL,'0.00','0.00',NULL,'0.00','0.00',NULL,'2.01',NULL,'0.67','0.67',NULL,'0.67','0.67',NULL,'0.67','0.67',NULL,'1.00','1.00',NULL,'0.00','0.00',NULL,'2.00',NULL,'1.00','1.00',NULL,'1.00','1.00',NULL,'1.67',NULL,'0.67','0.67',NULL,'0.67','0.67',NULL,'0.33','0.33',NULL,'9.68','Proposed project is gender-sensitive.','2022-12-04 23:59:24'),(3,33,'1.00',NULL,'1.00','1.00',NULL,'0.00','0.00',NULL,'0.00','0.00',NULL,'2.00',NULL,'1.00','1.00',NULL,'1.00','1.00',NULL,'1.00','1.00',NULL,'1.00','1.00',NULL,'2.01',NULL,'0.67','0.67',NULL,'0.67','0.67',NULL,'0.67','0.67',NULL,'0.00','0.00',NULL,'0.00','0.00',NULL,'2.00',NULL,'1.00','1.00',NULL,'1.00','1.00',NULL,'1.34',NULL,'0.67','0.67',NULL,'0.67','0.67',NULL,'0.00','0.00',NULL,'10.35','Proposed project is gender-sensitive.','2022-12-04 23:59:24'),(4,33,'0.00',NULL,'0.00','0.00',NULL,'0.00','0.00',NULL,'0.00','0.00',NULL,'0.00',NULL,'0.00','0.00',NULL,'0.00','0.00',NULL,'0.00','0.00',NULL,'0.00','0.00',NULL,'0.00',NULL,'0.00','0.00',NULL,'0.00','0.00',NULL,'0.00','0.00',NULL,'0.00','0.00',NULL,'0.00','0.00',NULL,'1.00',NULL,'0.00','0.00',NULL,'1.00','1.00',NULL,'1.34',NULL,'0.00','0.00',NULL,'0.67','0.67',NULL,'0.67','0.67',NULL,'2.34','GAD is invisible in the project','2022-12-04 23:59:24'),(5,33,'0.00',NULL,'0.00','0.00',NULL,'0.00','0.00',NULL,'0.00','0.00',NULL,'0.00',NULL,'0.00','0.00',NULL,'0.00','0.00',NULL,'0.00','0.00',NULL,'0.00','0.00',NULL,'0.00',NULL,'0.00','0.00',NULL,'0.00','0.00',NULL,'0.00','0.00',NULL,'2.00','2.00',NULL,'2.00','2.00',NULL,'1.00',NULL,'1.00','1.00',NULL,'0.00','0.00',NULL,'1.34',NULL,'0.67','0.67',NULL,'0.67','0.67',NULL,'0.00','0.00',NULL,'6.34','Proposed project has promising GAD prospects.','2022-12-04 23:59:24'),(6,33,'0.00',NULL,'0.00','0.00',NULL,'0.00','0.00',NULL,'0.00','0.00',NULL,'1.00',NULL,'0.00','0.00',NULL,'1.00','1.00',NULL,'2.00','2.00',NULL,'0.00','0.00',NULL,'0.00',NULL,'0.00','0.00',NULL,'0.00','0.00',NULL,'0.00','0.00',NULL,'0.00','0.00',NULL,'0.00','0.00',NULL,'0.00',NULL,'0.00','0.00',NULL,'0.00','0.00',NULL,'2.01',NULL,'0.67','0.67',NULL,'0.67','0.67',NULL,'0.67','0.67',NULL,'5.01','Proposed project has promising GAD prospects.','2022-12-04 23:59:24'),(7,33,'2.00','','1.00','1.00','','1.00','1.00','','2.00','2.00','','2.00','','1.00','1.00','','1.00','1.00','','2.00','2.00','fgh','2.00','2.00','xf','2.01','fghfhgf','0.67','0.67','','0.67','0.67','','0.67','0.67','asd','2.00','2.00','asd','2.00','2.00','','2.00','','1.00','1.00','','1.00','1.00','asd','2.01','asd','0.67','0.67','','0.67','0.67','','0.67','0.67','','20.02','Proposed project is gender-responsive.','2022-12-04 23:59:24'),(8,1,'0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','ertyrty','0.00','0.00','ry','0.00','0.00','brst','0.00','dfxbf','0.00','0.00','wr','0.00','0.00','wer','0.00','0.00','we','0.00','','2022-12-04 23:59:24'),(9,36,'2.00','issue comment','1.00','1.00','','1.00','1.00',' ','2.00','2.00',' comment','2.00',' ','1.00','1.00','','1.00','1.00','','2.00','2.00','','2.00','2.00','','1.67','','0.67','0.67','','0.33','0.33','','0.67','0.67','','0.00','0.00','','2.00','2.00','','2.00','','1.00','1.00','','1.00','1.00','','1.33','','0.33','0.33','asd','0.67','0.67','asd','0.33','0.33','sadasd','17.00','Proposed project is gender-responsive.','2022-12-04 23:59:24'),(10,1,'2.00','','1.00','1.00','','1.00','1.00','','2.00','2.00','','2.00','','1.00','1.00','','1.00','1.00','','2.00','2.00','','2.00','2.00','','0.66','','0.00','0.00','','0.33','0.33','','0.33','0.33','','2.00','2.00','','1.00','1.00','','2.00','','1.00','1.00','','1.00','1.00','','1.67','','0.67','0.67','','0.33','0.33','','0.67','0.67','','17.33','Proposed project is gender-responsive.','2022-12-04 23:59:24'),(11,11,'2.00','','1.00','1.00','','1.00','1.00','','2.00','2.00','','2.00','','1.00','1.00','','1.00','1.00','','2.00','2.00','','0.00','0.00','','1.34','','0.00','0.00','','0.67','0.67','','0.67','0.67','','2.00','2.00','','2.00','2.00','','1.50','','0.50','0.50','','1.00','1.00','','2.01','','0.67','0.67','','0.67','0.67','','0.67','0.67','','16.85','Proposed project is gender-responsive.','2022-12-04 23:59:24'),(12,11,'2.00','','1.00','1.00','','1.00','1.00','','2.00','2.00','','2.00','','1.00','1.00','','1.00','1.00','','2.00','2.00','','0.00','0.00','','1.34','','0.00','0.00','','0.67','0.67','','0.67','0.67','','2.00','2.00','','2.00','2.00','','1.50','','0.50','0.50','','1.00','1.00','','2.01','','0.67','0.67','','0.67','0.67','','0.67','0.67','','16.85','Proposed project is gender-responsive.','2022-12-04 23:59:24'),(13,11,'2.00','','1.00','1.00','','1.00','1.00','','2.00','2.00','','2.00','','1.00','1.00','','1.00','1.00','','2.00','2.00','','0.00','0.00','','1.34','','0.00','0.00','','0.67','0.67','','0.67','0.67','','2.00','2.00','','2.00','2.00','','1.50','','0.50','0.50','','1.00','1.00','','2.01','','0.67','0.67','','0.67','0.67','','0.67','0.67','','16.85','Proposed project is gender-responsive.','2022-12-04 23:59:24'),(14,34,'2.00','sdf','1.00','1.00','sdf','1.00','1.00','  adfasf sdfas','2.00','2.00',' sdf','2.00',' sdf','1.00','1.00','','1.00','1.00','','2.00','2.00','','2.00','2.00','','2.01','','0.67','0.67','','0.67','0.67','','0.67','0.67','','2.00','2.00','','2.00','2.00','','2.00','','1.00','1.00','','1.00','1.00','','2.01','','0.67','0.67','','0.67','0.67','','0.67','0.67','','20.02','Proposed project is gender-responsive.','2022-12-04 23:59:24'),(15,38,'0.00','','0.00','0.00','','0.00','0.00',' ','0.00','0.00',' ','0.00',' ','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','1.67','','0.67','0.67','','0.33','0.33','','0.67','0.67','','1.67','GAD is invisible in the project','2022-12-19 00:16:32');

/*Table structure for table `evaluation1_infra` */

DROP TABLE IF EXISTS `evaluation1_infra`;

CREATE TABLE `evaluation1_infra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `f_1` decimal(10,2) NOT NULL,
  `f_1_desc` varchar(255) NOT NULL,
  `f_1_1` decimal(10,2) NOT NULL,
  `f_1_1_4` decimal(10,2) NOT NULL,
  `f_1_1_desc` varchar(255) NOT NULL,
  `f_1_2` decimal(10,2) NOT NULL,
  `f_1_2_4` decimal(10,2) NOT NULL,
  `f_1_2_desc` varchar(255) NOT NULL,
  `f_1_3` decimal(10,2) DEFAULT NULL,
  `f_1_3_4` decimal(10,2) DEFAULT NULL,
  `f_1_3_desc` varchar(255) NOT NULL,
  `f_2` decimal(10,2) DEFAULT NULL,
  `f_2_4` decimal(10,2) DEFAULT NULL,
  `f_2_desc` varchar(255) NOT NULL,
  `f_3` decimal(10,2) DEFAULT NULL,
  `f_3_4` decimal(10,2) DEFAULT NULL,
  `f_3_desc` varchar(255) NOT NULL,
  `f_4` decimal(10,2) DEFAULT NULL,
  `f_4_desc` varchar(255) NOT NULL,
  `f_4_1` decimal(10,2) DEFAULT NULL,
  `f_4_1_4` decimal(10,2) DEFAULT NULL,
  `f_4_1_desc` varchar(255) NOT NULL,
  `f_4_2` decimal(10,2) DEFAULT NULL,
  `f_4_2_4` decimal(10,2) DEFAULT NULL,
  `f_4_2_desc` varchar(255) NOT NULL,
  `f_5` decimal(10,2) DEFAULT NULL,
  `f_5_desc` varchar(255) NOT NULL,
  `f_5_1` decimal(10,2) DEFAULT NULL,
  `f_5_1_4` decimal(10,2) DEFAULT NULL,
  `f_5_1_desc` varchar(255) NOT NULL,
  `f_5_2` decimal(10,2) DEFAULT NULL,
  `f_5_2_4` decimal(10,2) DEFAULT NULL,
  `f_5_2_desc` varchar(255) NOT NULL,
  `f_6` decimal(10,2) DEFAULT NULL,
  `f_6_desc` varchar(255) NOT NULL,
  `f_6_1_4` decimal(10,2) DEFAULT NULL,
  `f_6_1_desc` varchar(255) NOT NULL,
  `f_6_1_1` decimal(10,2) DEFAULT NULL,
  `f_6_1_1_4` decimal(10,2) DEFAULT NULL,
  `f_6_1_1_desc` varchar(255) NOT NULL,
  `f_6_1_2` decimal(10,2) DEFAULT NULL,
  `f_6_1_2_4` decimal(10,2) DEFAULT NULL,
  `f_6_1_2_desc` varchar(255) NOT NULL,
  `f_6_2_4` decimal(10,2) DEFAULT NULL,
  `f_6_2_desc` varchar(255) NOT NULL,
  `f_6_2_1` decimal(10,2) DEFAULT NULL,
  `f_6_2_1_4` decimal(10,2) DEFAULT NULL,
  `f_6_2_1_desc` varchar(255) NOT NULL,
  `f_6_2_2` decimal(10,2) DEFAULT NULL,
  `f_6_2_2_4` decimal(10,2) DEFAULT NULL,
  `f_6_2_2_desc` varchar(255) NOT NULL,
  `f_6_3_4` decimal(10,2) DEFAULT NULL,
  `f_6_3_desc` varchar(255) NOT NULL,
  `f_6_3_1` decimal(10,2) DEFAULT NULL,
  `f_6_3_1_4` decimal(10,2) DEFAULT NULL,
  `f_6_3_1_desc` varchar(255) NOT NULL,
  `f_6_3_2` decimal(10,2) DEFAULT NULL,
  `f_6_3_2_4` decimal(10,2) DEFAULT NULL,
  `f_6_3_2_desc` varchar(255) NOT NULL,
  `f_7` decimal(10,2) DEFAULT NULL,
  `f_7_4` decimal(10,2) DEFAULT NULL,
  `f_7_desc` varchar(255) NOT NULL,
  `f_8` decimal(10,2) DEFAULT NULL,
  `f_8_4` decimal(10,2) DEFAULT NULL,
  `f_8_desc` varchar(255) NOT NULL,
  `f_9_4` decimal(10,2) DEFAULT NULL,
  `f_9_desc` varchar(255) NOT NULL,
  `f_9_1` decimal(10,2) DEFAULT NULL,
  `f_9_1_4` decimal(10,2) DEFAULT NULL,
  `f_9_1_desc` varchar(255) NOT NULL,
  `f_9_2` decimal(10,2) DEFAULT NULL,
  `f_9_2_4` decimal(10,2) DEFAULT NULL,
  `f_9_2_desc` varchar(255) NOT NULL,
  `f_10_4` decimal(10,2) DEFAULT NULL,
  `f_10_desc` varchar(255) NOT NULL,
  `f_10_1` decimal(10,2) DEFAULT NULL,
  `f_10_1_4` decimal(10,2) DEFAULT NULL,
  `f_10_1_desc` varchar(255) NOT NULL,
  `f_10_2` decimal(10,2) DEFAULT NULL,
  `f_10_2_4` decimal(10,2) DEFAULT NULL,
  `f_10_2_desc` varchar(255) NOT NULL,
  `f_10_3` decimal(10,2) DEFAULT NULL,
  `f_10_3_4` decimal(10,2) DEFAULT NULL,
  `f_10_3_desc` varchar(255) NOT NULL,
  `total_score` decimal(10,2) DEFAULT NULL,
  `interpretation` varchar(225) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Data for the table `evaluation1_infra` */

insert  into `evaluation1_infra`(`id`,`project_id`,`f_1`,`f_1_desc`,`f_1_1`,`f_1_1_4`,`f_1_1_desc`,`f_1_2`,`f_1_2_4`,`f_1_2_desc`,`f_1_3`,`f_1_3_4`,`f_1_3_desc`,`f_2`,`f_2_4`,`f_2_desc`,`f_3`,`f_3_4`,`f_3_desc`,`f_4`,`f_4_desc`,`f_4_1`,`f_4_1_4`,`f_4_1_desc`,`f_4_2`,`f_4_2_4`,`f_4_2_desc`,`f_5`,`f_5_desc`,`f_5_1`,`f_5_1_4`,`f_5_1_desc`,`f_5_2`,`f_5_2_4`,`f_5_2_desc`,`f_6`,`f_6_desc`,`f_6_1_4`,`f_6_1_desc`,`f_6_1_1`,`f_6_1_1_4`,`f_6_1_1_desc`,`f_6_1_2`,`f_6_1_2_4`,`f_6_1_2_desc`,`f_6_2_4`,`f_6_2_desc`,`f_6_2_1`,`f_6_2_1_4`,`f_6_2_1_desc`,`f_6_2_2`,`f_6_2_2_4`,`f_6_2_2_desc`,`f_6_3_4`,`f_6_3_desc`,`f_6_3_1`,`f_6_3_1_4`,`f_6_3_1_desc`,`f_6_3_2`,`f_6_3_2_4`,`f_6_3_2_desc`,`f_7`,`f_7_4`,`f_7_desc`,`f_8`,`f_8_4`,`f_8_desc`,`f_9_4`,`f_9_desc`,`f_9_1`,`f_9_1_4`,`f_9_1_desc`,`f_9_2`,`f_9_2_4`,`f_9_2_desc`,`f_10_4`,`f_10_desc`,`f_10_1`,`f_10_1_4`,`f_10_1_desc`,`f_10_2`,`f_10_2_4`,`f_10_2_desc`,`f_10_3`,`f_10_3_4`,`f_10_3_desc`,`total_score`,`interpretation`,`date_created`) values (1,33,'2.01','','0.67','0.67','','0.67','0.67','','0.67','0.67','','2.00','2.00','','2.00','2.00','','2.00','','1.00','1.00','','1.00','1.00','','2.00','','1.00','1.00','','1.00','1.00','','1.98','','0.66','','0.33','0.33','','0.33','0.33','','0.66','','0.33','0.33','','0.33','0.33','','0.66','','0.33','0.33','','0.33','0.33','','2.00','2.00','','2.00','2.00','','2.00','','1.00','1.00','','1.00','1.00','','2.01','','0.67','0.67','','0.67','0.67','','0.67','0.67','','20.00','Proposed project is gender-responsive.','2022-12-04 22:18:28'),(2,33,'2.01','','0.67','0.67','','0.67','0.67','','0.67','0.67','','2.00','2.00','','1.00','1.00','','1.50','','1.00','1.00','','0.50','0.50','','2.00','','1.00','1.00','','1.00','1.00','','1.33','','0.66','','0.33','0.33','','0.33','0.33','','0.34','','0.17','0.17','','0.17','0.17','','0.33','','0.33','0.33','','0.00','0.00','','0.00','0.00','','2.00','2.00','','2.00','','1.00','1.00','','1.00','1.00','','2.01','','0.67','0.67','','0.67','0.67','','0.67','0.67','','15.85','Proposed project is gender-responsive.','2022-12-04 22:18:28'),(3,33,'2.01','','0.67','0.67','','0.67','0.67','','0.67','0.67','','2.00','2.00','','1.00','1.00','','1.50','','1.00','1.00','','0.50','0.50','','2.00','','1.00','1.00','','1.00','1.00','','1.33','','0.66','','0.33','0.33','','0.33','0.33','','0.34','','0.17','0.17','','0.17','0.17','','0.33','','0.33','0.33','','0.00','0.00','','0.00','0.00','','2.00','2.00','','2.00','','1.00','1.00','','1.00','1.00','','2.01','','0.67','0.67','','0.67','0.67','','0.67','0.67','','15.85','Proposed project is gender-responsive.','2022-12-04 22:18:28'),(4,33,'2.01','','0.67','0.67','','0.67','0.67','','0.67','0.67','','2.00','2.00','','1.00','1.00','','1.50','','1.00','1.00','','0.50','0.50','','2.00','','1.00','1.00','','1.00','1.00','','1.33','','0.66','','0.33','0.33','','0.33','0.33','','0.34','','0.17','0.17','','0.17','0.17','','0.33','','0.33','0.33','','0.00','0.00','','0.00','0.00','','2.00','2.00','','2.00','','1.00','1.00','','1.00','1.00','','2.01','','0.67','0.67','','0.67','0.67','','0.67','0.67','','15.85','Proposed project is gender-responsive.','2022-12-04 22:18:28'),(5,0,'1.00','','0.67','0.67','','0.00','0.00','','0.33','0.33','','2.00','2.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','3.00','GAD is invisible in the project','2022-12-04 22:18:28'),(6,0,'1.00','','0.67','0.67','','0.00','0.00','','0.33','0.33','','2.00','2.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','3.00','GAD is invisible in the project','2022-12-04 22:18:28'),(7,0,'1.00','','0.67','0.67','','0.00','0.00','','0.33','0.33','','2.00','2.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','3.00','GAD is invisible in the project','2022-12-04 22:18:28'),(8,0,'1.00','','0.67','0.67','','0.00','0.00','','0.33','0.33','','2.00','2.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','3.00','GAD is invisible in the project','2022-12-04 22:18:28'),(9,0,'0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','','2022-12-04 22:18:28'),(10,0,'0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','','2022-12-04 22:18:28'),(11,1,'0.00','1','0.00','0.00','11','0.00','0.00','12','0.00','0.00','13','0.00','0.00','2','0.00','0.00','3','0.00','3','0.00','0.00','41','0.00','0.00','42','0.00','5','0.00','0.00','51','0.00','0.00','52','0.00','6','0.00','61','0.00','0.00','611','0.00','0.00','612','0.00','62','0.00','0.00','621','0.00','0.00','622','0.00','63','0.00','0.00','631','0.00','0.00','632','0.00','0.00','7','0.00','0.00','8','2.00','9','1.00','1.00','91','1.00','1.00','92','2.01','10','0.67','0.67','101','0.67','0.67','102','0.67','0.67','103','4.01','Proposed project has promising GAD prospects.','2022-12-04 22:18:28'),(12,39,'2.01','sdf','0.67','0.67','sdf','0.67','0.67','sssdf','0.67','0.67','cvb','2.00','2.00','cvb','2.00','2.00','cvb','2.00','sd','1.00','1.00','sdf','1.00','1.00','sdf','1.00','sdf','1.00','1.00','zsdf','0.00','0.00','sdf','1.65','szdf','0.66','fsdf','0.33','0.33','sdsd','0.33','0.33','','0.33',' sd','0.33','0.33','','0.00','0.00','ergxcvbvbb','0.66','xcvb','0.33','0.33','vbnvn','0.33','0.33','rrte','2.00','2.00','bmvbm','2.00','2.00','vbnmvnm','2.00','cnc','1.00','1.00','wsdh','1.00','1.00',' xv','2.01',' xcv','0.67','0.67','sdf','0.67','0.67','sdf','0.67','0.67','sdf','18.67','Proposed project is gender-responsive (proponent is commended).','2022-12-04 22:18:28'),(13,11,'1.34','','0.67','0.67','','0.67','0.67','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','1.34','GAD is invisible in the project (proposal is returned).','2022-12-04 22:18:28'),(14,11,'2.01','','0.67','0.67','','0.67','0.67','','0.67','0.67','','0.00','0.00','','0.00','0.00','','2.00','','1.00','1.00','','1.00','1.00','','2.00','','1.00','1.00','','1.00','1.00','','0.66','','0.66','','0.33','0.33','','0.33','0.33','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','1.00','1.00','','2.00','','1.00','1.00','','1.00','1.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','9.67','Proposed project is gender-sensitive (proposal passes the GAD test).','2022-12-04 22:18:28'),(15,35,'2.01','asd sd','0.67','0.67','','0.67','0.67','','0.67','0.67','','2.00','2.00','','2.00','2.00','','2.00','','1.00','1.00','','1.00','1.00','','2.00','','1.00','1.00','','1.00','1.00','','1.98','','0.66','','0.33','0.33','','0.33','0.33','','0.66','','0.33','0.33','','0.33','0.33','','0.66','','0.33','0.33','','0.33','0.33','','2.00','2.00','','2.00','2.00','','2.00','','1.00','1.00','','1.00','1.00',' ','2.01','','0.67','0.67','','0.67','0.67','','0.67','0.67','','20.00','Proposed project is gender-responsive (proponent is commended).','2022-12-04 22:18:28'),(16,37,'0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','1.00','','0.00','0.00','','1.00','1.00','  ','0.99','','0.33','0.33','','0.33','0.33','','0.33','0.33','','1.99','GAD is invisible in the project (proposal is returned).','2022-12-19 00:04:52');

/*Table structure for table `evaluation2` */

DROP TABLE IF EXISTS `evaluation2`;

CREATE TABLE `evaluation2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `f_1` decimal(10,2) DEFAULT NULL,
  `f_1_desc` varchar(255) DEFAULT NULL,
  `f_1_1` decimal(10,2) DEFAULT NULL,
  `f_1_1_4` decimal(10,2) DEFAULT NULL,
  `f_1_1_desc` varchar(255) DEFAULT NULL,
  `f_1_2` decimal(10,2) DEFAULT NULL,
  `f_1_2_4` decimal(10,2) DEFAULT NULL,
  `f_1_2_desc` varchar(255) DEFAULT NULL,
  `f_2` decimal(10,2) DEFAULT NULL,
  `f_2_desc` varchar(255) DEFAULT NULL,
  `f_2_1` decimal(10,2) DEFAULT NULL,
  `f_2_1_4` decimal(10,2) DEFAULT NULL,
  `f_2_1_desc` varchar(255) DEFAULT NULL,
  `f_2_2` decimal(10,2) DEFAULT NULL,
  `f_2_2_4` decimal(10,2) DEFAULT NULL,
  `f_2_2_desc` varchar(255) DEFAULT NULL,
  `f_2_3` decimal(10,2) DEFAULT NULL,
  `f_2_3_4` decimal(10,2) DEFAULT NULL,
  `f_2_3_desc` varchar(255) DEFAULT NULL,
  `f_3` decimal(10,2) DEFAULT NULL,
  `f_3_desc` varchar(255) DEFAULT NULL,
  `f_3_1` decimal(10,2) DEFAULT NULL,
  `f_3_1_4` decimal(10,2) DEFAULT NULL,
  `f_3_1_desc` varchar(255) DEFAULT NULL,
  `f_3_2` decimal(10,2) DEFAULT NULL,
  `f_3_2_4` decimal(10,2) DEFAULT NULL,
  `f_3_2_desc` varchar(255) DEFAULT NULL,
  `f_4` decimal(10,2) DEFAULT NULL,
  `f_4_desc` varchar(255) DEFAULT NULL,
  `f_4_1` decimal(10,2) DEFAULT NULL,
  `f_4_1_4` decimal(10,2) DEFAULT NULL,
  `f_4_1_desc` varchar(255) DEFAULT NULL,
  `f_4_2` decimal(10,2) DEFAULT NULL,
  `f_4_2_4` decimal(10,2) DEFAULT NULL,
  `f_4_2_desc` varchar(255) DEFAULT NULL,
  `f_4_3` decimal(10,2) DEFAULT NULL,
  `f_4_3_4` decimal(10,2) DEFAULT NULL,
  `f_4_3_desc` varchar(255) DEFAULT NULL,
  `f_4_4` decimal(10,2) DEFAULT NULL,
  `f_4_4_4` decimal(10,2) DEFAULT NULL,
  `f_4_4_desc` varchar(255) DEFAULT NULL,
  `total_score16` decimal(10,2) DEFAULT NULL,
  `ff_1` decimal(10,2) DEFAULT NULL,
  `ff_1_desc` varchar(255) DEFAULT NULL,
  `ff_1_1` decimal(10,2) DEFAULT NULL,
  `ff_1_1_4` decimal(10,2) DEFAULT NULL,
  `ff_1_1_desc` varchar(255) DEFAULT NULL,
  `ff_1_2` decimal(10,2) DEFAULT NULL,
  `ff_1_2_4` decimal(10,2) DEFAULT NULL,
  `ff_1_2_desc` varchar(255) DEFAULT NULL,
  `ff_2` decimal(10,2) DEFAULT NULL,
  `ff_2_desc` varchar(255) DEFAULT NULL,
  `ff_2_1` decimal(10,2) DEFAULT NULL,
  `ff_2_1_4` decimal(10,2) DEFAULT NULL,
  `ff_2_1_desc` varchar(255) DEFAULT NULL,
  `ff_2_2` decimal(10,2) DEFAULT NULL,
  `ff_2_2_4` decimal(10,2) DEFAULT NULL,
  `ff_2_2_desc` varchar(255) DEFAULT NULL,
  `ff_2_3` decimal(10,2) DEFAULT NULL,
  `ff_2_3_4` decimal(10,2) DEFAULT NULL,
  `ff_2_3_desc` varchar(255) DEFAULT NULL,
  `ff_2_4` decimal(10,2) DEFAULT NULL,
  `ff_2_4_4` decimal(10,2) DEFAULT NULL,
  `ff_2_4_desc` varchar(255) DEFAULT NULL,
  `ff_3` decimal(10,2) DEFAULT NULL,
  `ff_3_desc` varchar(255) DEFAULT NULL,
  `ff_3_1` decimal(10,2) DEFAULT NULL,
  `ff_3_1_4` decimal(10,2) DEFAULT NULL,
  `ff_3_1_desc` varchar(255) DEFAULT NULL,
  `ff_3_2` decimal(10,2) DEFAULT NULL,
  `ff_3_2_4` decimal(10,2) DEFAULT NULL,
  `ff_3_2_desc` varchar(255) DEFAULT NULL,
  `ff_4` decimal(10,2) DEFAULT NULL,
  `ff_4_4` decimal(10,2) DEFAULT NULL,
  `ff_4_desc` varchar(255) DEFAULT NULL,
  `ff_5` decimal(10,2) DEFAULT NULL,
  `ff_5_desc` varchar(255) DEFAULT NULL,
  `ff_5_1` decimal(10,2) DEFAULT NULL,
  `ff_5_1_4` decimal(10,2) DEFAULT NULL,
  `ff_5_1_desc` varchar(255) DEFAULT NULL,
  `ff_5_2` decimal(10,2) DEFAULT NULL,
  `ff_5_2_4` decimal(10,2) DEFAULT NULL,
  `ff_5_2_desc` varchar(255) DEFAULT NULL,
  `total_score17` decimal(10,2) DEFAULT NULL,
  `alltotal_score` decimal(10,2) DEFAULT NULL,
  `interpretation` text NOT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `evaluation2` */

insert  into `evaluation2`(`id`,`project_id`,`f_1`,`f_1_desc`,`f_1_1`,`f_1_1_4`,`f_1_1_desc`,`f_1_2`,`f_1_2_4`,`f_1_2_desc`,`f_2`,`f_2_desc`,`f_2_1`,`f_2_1_4`,`f_2_1_desc`,`f_2_2`,`f_2_2_4`,`f_2_2_desc`,`f_2_3`,`f_2_3_4`,`f_2_3_desc`,`f_3`,`f_3_desc`,`f_3_1`,`f_3_1_4`,`f_3_1_desc`,`f_3_2`,`f_3_2_4`,`f_3_2_desc`,`f_4`,`f_4_desc`,`f_4_1`,`f_4_1_4`,`f_4_1_desc`,`f_4_2`,`f_4_2_4`,`f_4_2_desc`,`f_4_3`,`f_4_3_4`,`f_4_3_desc`,`f_4_4`,`f_4_4_4`,`f_4_4_desc`,`total_score16`,`ff_1`,`ff_1_desc`,`ff_1_1`,`ff_1_1_4`,`ff_1_1_desc`,`ff_1_2`,`ff_1_2_4`,`ff_1_2_desc`,`ff_2`,`ff_2_desc`,`ff_2_1`,`ff_2_1_4`,`ff_2_1_desc`,`ff_2_2`,`ff_2_2_4`,`ff_2_2_desc`,`ff_2_3`,`ff_2_3_4`,`ff_2_3_desc`,`ff_2_4`,`ff_2_4_4`,`ff_2_4_desc`,`ff_3`,`ff_3_desc`,`ff_3_1`,`ff_3_1_4`,`ff_3_1_desc`,`ff_3_2`,`ff_3_2_4`,`ff_3_2_desc`,`ff_4`,`ff_4_4`,`ff_4_desc`,`ff_5`,`ff_5_desc`,`ff_5_1`,`ff_5_1_4`,`ff_5_1_desc`,`ff_5_2`,`ff_5_2_4`,`ff_5_2_desc`,`total_score17`,`alltotal_score`,`interpretation`,`date_created`) values (1,1,'1.00','','0.50','0.50','','0.50','0.50','','0.99','','0.33','0.33','','0.33','0.33','','0.33','0.33','','1.00','','0.50','0.50','','0.50','0.50','','1.00','','0.25','0.25','','0.25','0.25','','0.25','0.25','','0.25','0.25','','3.99','0.00','1','0.00','0.00','11','0.00','0.00','111','1.00','2','0.25','0.25','22','0.25','0.25','222','0.25','0.25','2222','0.25','0.25','22222','3.00','3','1.00','1.00','33','2.00','2.00','333','2.00','2.00','4','1.00','5','1.00','1.00','55','0.00','0.00','555','7.00','10.99','Proposed project is gender-sensitive.','2022-12-04 23:16:09'),(2,1,'1.00','','0.50','0.50','','0.50','0.50','','0.99','','0.33','0.33','','0.33','0.33','','0.33','0.33','','1.00','','0.50','0.50','','0.50','0.50','','1.00','','0.25','0.25','','0.25','0.25','','0.25','0.25','','0.25','0.25','','3.99','0.00','1','0.00','0.00','11','0.00','0.00','111','1.00','2','0.25','0.25','22','0.25','0.25','222','0.25','0.25','2222','0.25','0.25','22222','3.00','3','1.00','1.00','33','2.00','2.00','333','2.00','2.00','4','1.00','5','1.00','1.00','55','0.00','0.00','555','7.00','10.99','Proposed project is gender-sensitive.','2022-12-04 23:16:09'),(3,1,'2.00','','1.00','1.00','','1.00','1.00','','1.67','','0.67','0.67','','0.67','0.67','','0.33','0.33','','0.50','','0.00','0.00','','0.50','0.50','','1.50','','0.25','0.25','','0.25','0.25','','0.50','0.50','','0.50','0.50','','5.67','2.00','','1.00','1.00','','1.00','1.00','','2.00','','0.50','0.50','','0.50','0.50','','0.50','0.50','','0.50','0.50','','4.00','','2.00','2.00','','2.00','2.00','','2.00','2.00','','2.00','','1.00','1.00','','1.00','1.00','','12.00','17.67','Proposed project is gender-responsive.','2022-12-04 23:16:09'),(4,1,'2.00','','1.00','1.00','','1.00','1.00','','2.01','','0.67','0.67','','0.67','0.67','','0.67','0.67','','2.00','','1.00','1.00','','1.00','1.00','','2.00','','0.50','0.50','','0.50','0.50','','0.50','0.50','','0.50','0.50','','8.01','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','2.00','','0.00','0.00','','2.00','2.00','','2.00','2.00','','0.00','','0.00','0.00','','0.00','0.00','','4.00','12.01','Proposed project is gender-sensitive.','2022-12-04 23:16:09'),(5,1,'2.00','','1.00','1.00','','1.00','1.00','','2.01','','0.67','0.67','','0.67','0.67','','0.67','0.67','','2.00','','1.00','1.00','','1.00','1.00','','2.00','','0.50','0.50','','0.50','0.50','','0.50','0.50','','0.50','0.50','','8.01','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','2.00','','0.00','0.00','','2.00','2.00','','2.00','2.00','','0.00','','0.00','0.00','','0.00','0.00','','4.00','12.01','Proposed project is gender-sensitive.','2022-12-04 23:16:09'),(6,1,'2.00','','1.00','1.00','','1.00','1.00','','2.01','','0.67','0.67','','0.67','0.67','','0.67','0.67','','2.00','','1.00','1.00','','1.00','1.00','','2.00','','0.50','0.50','','0.50','0.50','','0.50','0.50','','0.50','0.50','','8.01','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','2.00','','0.00','0.00','','2.00','2.00','','2.00','2.00','','0.00','','0.00','0.00','','0.00','0.00','','4.00','12.01','Proposed project is gender-sensitive.','2022-12-04 23:16:09'),(7,1,'2.00','','1.00','1.00','','1.00','1.00','','2.01','','0.67','0.67','','0.67','0.67','','0.67','0.67','','2.00','','1.00','1.00','','1.00','1.00','','2.00','','0.50','0.50','','0.50','0.50','','0.50','0.50','','0.50','0.50','','8.01','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','2.00','','0.00','0.00','','2.00','2.00','','2.00','2.00','','0.00','','0.00','0.00','','0.00','0.00','','4.00','12.01','Proposed project is gender-sensitive.','2022-12-04 23:16:09'),(8,34,'2.00','','1.00','1.00','','1.00','1.00','','2.01','','0.67','0.67','','0.67','0.67','','0.67','0.67','','2.00','','1.00','1.00','','1.00','1.00','','2.00','','0.50','0.50','','0.50','0.50','','0.50','0.50','','0.50','0.50','','8.01','2.00','','1.00','1.00','','1.00','1.00','','2.00','','0.50','0.50','','0.50','0.50','','0.50','0.50','','0.50','0.50','','2.00','','0.00','0.00','','2.00','2.00','','2.00','2.00','','2.00','','1.00','1.00','','1.00','1.00','','10.00','18.01','Proposed project is gender-responsive.','2022-12-04 23:16:09'),(9,35,'2.00','','1.00','1.00','','1.00','1.00','','2.01','','0.67','0.67','','0.67','0.67','','0.67','0.67','','2.00','','1.00','1.00','','1.00','1.00',' ','2.00',' ','0.50','0.50','','0.50','0.50','','0.50','0.50','','0.50','0.50','','0.00','2.00','','1.00','1.00','','1.00','1.00','','2.00','','0.50','0.50','','0.50','0.50','','0.50','0.50','','0.50','0.50','','4.00','','2.00','2.00','','2.00','2.00','','2.00','2.00','','2.00','','1.00','1.00','','1.00','1.00','','0.00','0.00','interpretation','0000-00-00 00:00:00'),(10,38,'2.00','dgdfgfdg','1.00','1.00','dfgvcbvcbcv','1.00','1.00','','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','','0.00','0.00','','0.00','0.00','       ','0.00','       ','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','0.00','0.00','','2.00','','0.50','0.50','','0.50','0.50','','0.50','0.50','','0.50','0.50','','2.00','','2.00','2.00','','0.00','0.00','','0.00','0.00','','2.00','','1.00','1.00','','0.50','0.50','','5.50','7.50','Proposed project has promising GAD prospects.','0000-00-00 00:00:00');

/*Table structure for table `projects` */

DROP TABLE IF EXISTS `projects`;

CREATE TABLE `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_title` varchar(255) DEFAULT NULL,
  `project_cost` double DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `project_leader` varchar(255) DEFAULT NULL,
  `date_submitted` date DEFAULT NULL,
  `project_duration` varchar(255) DEFAULT NULL,
  `project_location` varchar(255) DEFAULT NULL,
  `project_type` varchar(255) DEFAULT NULL,
  `descriptions` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `flag` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;

/*Data for the table `projects` */

insert  into `projects`(`id`,`project_title`,`project_cost`,`department`,`project_leader`,`date_submitted`,`project_duration`,`project_location`,`project_type`,`descriptions`,`status`,`flag`) values (1,'Sample Project',150000,'CCSIT','39','2022-10-06','6 months','SLSU','Generic','ssfsdf','Evaluation 1 Complete',0),(2,'Sample Project',150000,'CCSIT','39','2022-10-06','6 months','SLSU','Generic','','Evaluation 1 Complete',0),(3,'Sample Project',150000,'CCSIT','39','2022-10-06','6 months','SLSU','Generic','','Evaluation 1 Complete',0),(4,'Sample Project',150000,'CCSIT','39','2022-10-06','6 months','SLSU','Generic','','Evaluation 1 Complete',0),(5,'Sample 1',100000,'IT','39','2022-10-11','9 months','SLSU','Generic','','Evaluation 1 Complete',0),(34,'SLSU Building',2000000,'CCSIT','39','2022-11-26','8 mons','SLSU Main','Generic','','Evaluation 1 Complete',0),(35,'SLSU Main Gate',50000,'CCSIT','39','2022-11-25','8 mons','SLSU Main','Infrastructure','','Evaluation 1 Complete',0),(36,'SLSU Building',200000,'CCSIT','39','2022-11-25','10 months','SLSU Main Campus','Generic','sample desc here..','Evaluation 1 Complete',0),(37,'dsfsdf',234,'CCSIT','39','2022-12-01','10 months','SLSU Main Campus','Infrastructure','fghgh','Evaluation 1 Re-evaluate',0),(38,'asd',23,'23','39','2022-12-05','','SLSU Main Campus','Generic','sdf','Complete',1),(39,'sampleasdasd',213123,'CCSIT','39','2022-12-17','asdasd','assad','Generic','aasd','Complete',0);

/*Table structure for table `proponents` */

DROP TABLE IF EXISTS `proponents`;

CREATE TABLE `proponents` (
  `users_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `proponents` */

insert  into `proponents`(`users_id`,`project_id`) values (29,13),(31,14),(30,14),(31,15),(32,15),(31,16),(32,16),(31,17),(32,17),(31,18),(32,18),(31,19),(32,19),(31,20),(32,20),(29,21),(32,21),(29,22),(29,23),(30,24),(30,25),(29,26),(29,27),(29,28),(31,29),(31,30),(29,31),(31,32),(30,33),(39,34),(40,34),(39,35),(40,35),(39,36),(40,36),(39,37),(40,37),(39,38),(40,38),(39,39),(40,39);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `office` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`contact`,`office`,`username`,`email`,`password`,`usertype`) values (10,'Test Proponent','213123','CCSIT','usertest','testpro@gmail.com','81dc9bdb52d04dc20036dbd8313ed055','Administrator'),(39,'Test Proponent','213123','CCSIT','testpro','testpro@gmail.com','827ccb0eea8a706c4c34a16891f84e7b','Proponent'),(40,'John Mark','09876511234','CCSIT','johntest','john@gmail.com','81dc9bdb52d04dc20036dbd8313ed055','Proponent'),(41,'Alex','213123','CCSIT','alextest','alextest@gmail.com','81dc9bdb52d04dc20036dbd8313ed055','Department Head');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
