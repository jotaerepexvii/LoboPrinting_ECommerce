/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 5.7.29-0ubuntu0.16.04.1 : Database - brytacmo_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`brytacmo_db` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;

USE `brytacmo_db`;

/*Table structure for table `Address` */

DROP TABLE IF EXISTS `Address`;

CREATE TABLE `Address` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(9) NOT NULL,
  `address_1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `address_2` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `zip_code` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `city` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `state` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`address_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `Address` */

insert  into `Address`(`address_id`,`user_id`,`address_1`,`address_2`,`zip_code`,`city`,`state`) values 
(1,840168316,'Carr 129 km 22.1',NULL,'00669','Lares','PR');

/*Table structure for table `Administartor` */

DROP TABLE IF EXISTS `Administartor`;

CREATE TABLE `Administartor` (
  `admi_id` char(9) COLLATE utf8_spanish_ci NOT NULL,
  `name` char(16) COLLATE utf8_spanish_ci NOT NULL,
  `lastnamme` char(16) COLLATE utf8_spanish_ci NOT NULL,
  `email` char(32) COLLATE utf8_spanish_ci NOT NULL,
  `password` char(16) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`admi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `Administartor` */

/*Table structure for table `Category` */

DROP TABLE IF EXISTS `Category`;

CREATE TABLE `Category` (
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `Category` */

insert  into `Category`(`category_id`,`product_id`) values 
(2,369258147),
(1,123456789),
(1,987654321),
(3,147258369),
(1,963852741),
(2,963852741),
(3,369258147),
(1,987456123);

/*Table structure for table `Payment_method` */

DROP TABLE IF EXISTS `Payment_method`;

CREATE TABLE `Payment_method` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `card_name` char(32) COLLATE utf8_spanish_ci NOT NULL,
  `card_number` char(32) COLLATE utf8_spanish_ci NOT NULL,
  `exp_month` int(11) NOT NULL,
  `exp_year` int(11) NOT NULL,
  `ccv` char(3) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `Payment_method` */

insert  into `Payment_method`(`payment_id`,`user_id`,`card_name`,`card_number`,`exp_month`,`exp_year`,`ccv`) values 
(1,840168316,'BRYAN TACORONTE','123456789',8,22,'000');

/*Table structure for table `Product` */

DROP TABLE IF EXISTS `Product`;

CREATE TABLE `Product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `price` float NOT NULL,
  `cost` float NOT NULL,
  `in_stock` int(11) NOT NULL,
  `sold` int(11) NOT NULL,
  `date` date NOT NULL,
  `image` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `Product` */

insert  into `Product`(`product_id`,`name`,`description`,`price`,`cost`,`in_stock`,`sold`,`date`,`image`) values 
(123456789,'Lapiz','Papermate',0.25,0.1,100,10,'2021-03-23','papermate_pencil.jpg'),
(147258368,'Camisa','Lobo UPRA',15,7,25,2,'2021-03-30','1.png'),
(369258147,'Bata','UPRA',25,10,15,1,'2021-03-23','lab-coat.webp'),
(456123369,'Lapiz','Papermate Mechanical Clearpoint',3.99,1.14,20,3,'2021-04-14','papermate-mechanical-pencs.png'),
(456852147,'Libreta','Composition Journal Notebook',1.99,0.5,25,5,'2021-04-14','notebook-journal.jpg'),
(963852741,'Libreta','Cuadriculados 1/4\"',2.25,1,45,5,'2021-03-21','1.png'),
(987456123,'Goma','Papermate Pink Pearl',0.99,0.5,50,8,'2021-04-04','papermate-pinkPearl.jpg'),
(987654321,'Marcador','Sharpie Fine Point',1.15,0.75,50,6,'2021-03-21','sharpie_fine.jpeg');

/*Table structure for table `Users` */

DROP TABLE IF EXISTS `Users`;

CREATE TABLE `Users` (
  `user_id` int(9) NOT NULL,
  `name` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `student` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `Users` */

insert  into `Users`(`user_id`,`name`,`lastname`,`email`,`password`,`phone`,`student`) values 
(840112,'lolo','collazo','lolo.collazo@upr','25d55ad283aa400af464c76d713c07ad','',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
