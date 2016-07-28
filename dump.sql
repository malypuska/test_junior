/*
SQLyog Enterprise - MySQL GUI v8.18 
MySQL - 5.5.23 : Database - eda
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`eda` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `eda`;

/*Table structure for table `ingredient` */

DROP TABLE IF EXISTS `ingredient`;

CREATE TABLE `ingredient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `visible` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `ingredient` */

insert  into `ingredient`(`id`,`name`,`visible`) values (1,'Сыр',1),(2,'Укроп',1),(3,'Салат',1),(4,'Сухарики',1),(5,'Майонез',1),(6,'Томат',1),(7,'Огурец',1),(8,'Редиска',1),(9,'Перец',1),(10,'Масло',1),(11,'Курица',1),(12,'Горох',1),(13,'Мясо',1),(14,'Колбаса',1),(16,'Марковь',0);

/*Table structure for table `recipe` */

DROP TABLE IF EXISTS `recipe`;

CREATE TABLE `recipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `recipe` */

insert  into `recipe`(`id`,`name`) values (1,'Цезарь'),(2,'Марковный'),(3,'Помидор огурец');

/*Table structure for table `recipe_ingredient` */

DROP TABLE IF EXISTS `recipe_ingredient`;

CREATE TABLE `recipe_ingredient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_id` int(11) DEFAULT NULL,
  `ingredient_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `recipe_ingredient` */

insert  into `recipe_ingredient`(`id`,`recipe_id`,`ingredient_id`) values (1,1,1),(2,1,5),(3,1,7),(4,1,9),(7,1,6),(8,2,1),(9,2,5),(10,2,9),(11,2,16),(12,3,10),(13,3,7),(14,3,6),(15,3,5),(16,3,9);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
