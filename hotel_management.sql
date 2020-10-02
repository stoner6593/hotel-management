/*
Navicat MySQL Data Transfer

Source Server         : ERWIN
Source Server Version : 50724
Source Host           : localhost:3306
Source Database       : hotel_management

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2020-10-01 19:48:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for contact_channel
-- ----------------------------
DROP TABLE IF EXISTS `contact_channel`;
CREATE TABLE `contact_channel` (
  `contact_channel_id` int(11) NOT NULL,
  `contact_channel_descrip` varchar(50) NOT NULL,
  PRIMARY KEY (`contact_channel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of contact_channel
-- ----------------------------
INSERT INTO `contact_channel` VALUES ('1', 'Facebook');
INSERT INTO `contact_channel` VALUES ('2', 'Instagram');
INSERT INTO `contact_channel` VALUES ('3', 'Web');
INSERT INTO `contact_channel` VALUES ('4', 'Email');
INSERT INTO `contact_channel` VALUES ('5', 'Teléfono');

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_firstname` varchar(50) NOT NULL,
  `customer_lastname` varchar(50) NOT NULL,
  `customer_TCno` varchar(11) NOT NULL,
  `customer_city` varchar(50) DEFAULT NULL,
  `customer_country` varchar(50) DEFAULT NULL,
  `customer_telephone` varchar(50) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES ('5', 'JEANS PIERRE', 'GRAOS NECIOSUP', '46368207', 'Trujillo', 'Perú', '921969649', 'jean.pier.164@gmail.com', '2020-09-01 11:20:21');
INSERT INTO `customer` VALUES ('6', 'ERWIN', 'TORRES', '47961796', 'Piura', 'Perú', '920176645', 'asasas@gmail.com', '2020-09-28 20:41:42');

-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(50) NOT NULL,
  `department_budget` float DEFAULT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES ('1', 'administrador', '999');
INSERT INTO `department` VALUES ('3', 'Recepcion', '1');

-- ----------------------------
-- Table structure for do_sport
-- ----------------------------
DROP TABLE IF EXISTS `do_sport`;
CREATE TABLE `do_sport` (
  `customer_id` int(11) NOT NULL,
  `sportfacility_id` int(11) NOT NULL,
  `dosport_date` varchar(50) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `dosport_details` text,
  `dosport_price` float DEFAULT NULL,
  PRIMARY KEY (`customer_id`,`sportfacility_id`,`dosport_date`),
  KEY `customer` (`customer_id`),
  KEY `sport_facility` (`sportfacility_id`),
  KEY `employee` (`employee_id`),
  CONSTRAINT `do_sport_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `do_sport_ibfk_2` FOREIGN KEY (`sportfacility_id`) REFERENCES `sport_facilities` (`sportfacility_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `do_sport_ibfk_3` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of do_sport
-- ----------------------------

-- ----------------------------
-- Table structure for employee
-- ----------------------------
DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_username` varchar(50) NOT NULL,
  `employee_password` varchar(50) CHARACTER SET utf32 NOT NULL,
  `employee_firstname` varchar(50) NOT NULL,
  `employee_lastname` varchar(50) NOT NULL,
  `employee_telephone` varchar(50) DEFAULT NULL,
  `employee_email` varchar(50) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `employee_type` varchar(50) NOT NULL,
  `employee_salary` float DEFAULT NULL,
  `employee_hiring_date` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`employee_id`),
  UNIQUE KEY `username` (`employee_username`),
  UNIQUE KEY `email` (`employee_email`),
  KEY `department` (`department_id`),
  KEY `login` (`employee_username`,`employee_password`),
  CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of employee
-- ----------------------------
INSERT INTO `employee` VALUES ('49', 'admin', '123456', 'admin', '', null, 'jean.pier.164@gmail.com', '1', '', null, null);
INSERT INTO `employee` VALUES ('50', 'recepcion', '123456', 'Recepcion', '1', null, null, '3', 'Recepcion', null, null);

-- ----------------------------
-- Table structure for get_medicalservice
-- ----------------------------
DROP TABLE IF EXISTS `get_medicalservice`;
CREATE TABLE `get_medicalservice` (
  `customer_id` int(11) NOT NULL,
  `medicalservice_id` int(11) NOT NULL,
  `medicalservice_date` varchar(50) CHARACTER SET utf8 NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `getmedicalservice_details` text CHARACTER SET utf8,
  `medicalservice_price` float DEFAULT NULL,
  PRIMARY KEY (`customer_id`,`medicalservice_id`,`medicalservice_date`),
  KEY `customer` (`customer_id`),
  KEY `medical_service` (`medicalservice_id`),
  KEY `employee` (`employee_id`),
  CONSTRAINT `get_medicalservice_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `get_medicalservice_ibfk_2` FOREIGN KEY (`medicalservice_id`) REFERENCES `medical_service` (`medicalservice_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `get_medicalservice_ibfk_3` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- ----------------------------
-- Records of get_medicalservice
-- ----------------------------

-- ----------------------------
-- Table structure for get_roomservice
-- ----------------------------
DROP TABLE IF EXISTS `get_roomservice`;
CREATE TABLE `get_roomservice` (
  `customer_id` int(11) NOT NULL,
  `roomservice_id` int(11) NOT NULL,
  `roomservice_date` varchar(50) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `getroomservice_details` text,
  `roomservice_price` float DEFAULT NULL,
  PRIMARY KEY (`customer_id`,`roomservice_id`,`roomservice_date`),
  KEY `customer` (`customer_id`),
  KEY `room_service` (`roomservice_id`),
  KEY `employee` (`employee_id`),
  CONSTRAINT `get_roomservice_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `get_roomservice_ibfk_2` FOREIGN KEY (`roomservice_id`) REFERENCES `room_service` (`roomservice_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `get_roomservice_ibfk_3` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of get_roomservice
-- ----------------------------

-- ----------------------------
-- Table structure for laundry
-- ----------------------------
DROP TABLE IF EXISTS `laundry`;
CREATE TABLE `laundry` (
  `laundry_id` int(11) NOT NULL AUTO_INCREMENT,
  `laundry_open_time` varchar(50) DEFAULT NULL,
  `laundry_close_time` varchar(50) DEFAULT NULL,
  `laundry_details` text,
  PRIMARY KEY (`laundry_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of laundry
-- ----------------------------

-- ----------------------------
-- Table structure for laundry_service
-- ----------------------------
DROP TABLE IF EXISTS `laundry_service`;
CREATE TABLE `laundry_service` (
  `customer_id` int(11) NOT NULL,
  `laundry_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `laundry_date` varchar(50) DEFAULT NULL,
  `laundry_amount` int(11) DEFAULT NULL,
  `laundry_price` float DEFAULT NULL,
  PRIMARY KEY (`customer_id`,`laundry_id`),
  KEY `customer` (`customer_id`),
  KEY `laundry` (`laundry_id`),
  KEY `employee` (`employee_id`),
  CONSTRAINT `laundry_service_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `laundry_service_ibfk_2` FOREIGN KEY (`laundry_id`) REFERENCES `laundry` (`laundry_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `laundry_service_ibfk_3` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of laundry_service
-- ----------------------------

-- ----------------------------
-- Table structure for massage_room
-- ----------------------------
DROP TABLE IF EXISTS `massage_room`;
CREATE TABLE `massage_room` (
  `massageroom_id` int(11) NOT NULL AUTO_INCREMENT,
  `massageroom_open_time` varchar(10) DEFAULT NULL,
  `massageroom_close_time` varchar(10) DEFAULT NULL,
  `massageroom_details` text,
  PRIMARY KEY (`massageroom_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of massage_room
-- ----------------------------

-- ----------------------------
-- Table structure for massage_service
-- ----------------------------
DROP TABLE IF EXISTS `massage_service`;
CREATE TABLE `massage_service` (
  `customer_id` int(11) NOT NULL,
  `massageroom_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `massage_date` varchar(50) DEFAULT NULL,
  `massage_details` text,
  `massage_price` float DEFAULT NULL,
  PRIMARY KEY (`customer_id`,`massageroom_id`),
  KEY `customer` (`customer_id`),
  KEY `massage` (`massageroom_id`),
  KEY `employee` (`employee_id`),
  CONSTRAINT `massage_service_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `massage_service_ibfk_2` FOREIGN KEY (`massageroom_id`) REFERENCES `massage_room` (`massageroom_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `massage_service_ibfk_3` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of massage_service
-- ----------------------------

-- ----------------------------
-- Table structure for medical_service
-- ----------------------------
DROP TABLE IF EXISTS `medical_service`;
CREATE TABLE `medical_service` (
  `medicalservice_id` int(11) NOT NULL AUTO_INCREMENT,
  `medicalservice_open_time` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `medicalservice_close_time` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `medicalservice_details` text CHARACTER SET utf8,
  PRIMARY KEY (`medicalservice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- ----------------------------
-- Records of medical_service
-- ----------------------------

-- ----------------------------
-- Table structure for reservation
-- ----------------------------
DROP TABLE IF EXISTS `reservation`;
CREATE TABLE `reservation` (
  `customer_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `checkin_date` varchar(50) NOT NULL,
  `checkout_date` varchar(50) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `reservation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reservation_price` float DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `type_pay` int(11) NOT NULL DEFAULT '1',
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `type_rental_id` int(11) DEFAULT NULL,
  `contact_channel_id` int(11) DEFAULT NULL,
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `observacion` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`reservation_id`),
  KEY `customer` (`customer_id`),
  KEY `employee` (`employee_id`),
  KEY `room` (`room_id`),
  KEY `availability` (`room_id`,`checkin_date`,`checkout_date`),
  CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reservation
-- ----------------------------
INSERT INTO `reservation` VALUES ('5', '101', '2020-08-31', '2020-09-02', '49', '0000-00-00 00:00:00', '170', '1', '1', '12:00:00', '12:00:00', '2', '1', '1', '');
INSERT INTO `reservation` VALUES ('5', '102', '2020-09-02', '2020-09-02', '49', '0000-00-00 00:00:00', '120', '1', '1', '12:00:00', '16:00:00', '1', '1', '2', '');
INSERT INTO `reservation` VALUES ('5', '102', '2020-09-04', '2020-09-05', '49', '0000-00-00 00:00:00', '85', '1', '1', '12:00:00', '12:00:00', '2', '1', '3', '');
INSERT INTO `reservation` VALUES ('5', '103', '2020-09-02', '2020-09-03', '49', '0000-00-00 00:00:00', '85', '1', '1', '12:00:00', '12:00:00', '2', '1', '4', '');
INSERT INTO `reservation` VALUES ('5', '103', '2020-09-04', '2020-09-05', '49', '2020-09-01 11:19:11', '85', '1', '1', '12:00:00', '12:00:00', '2', '1', '5', '');
INSERT INTO `reservation` VALUES ('5', '106', '2020-09-01', '2020-09-03', '49', '2020-09-01 12:02:34', '170', '1', '1', '12:00:00', '12:00:00', '2', '1', '6', '1324134');
INSERT INTO `reservation` VALUES ('6', '108', '2020-09-29', '2020-09-29', '49', '2020-09-28 21:28:36', '30', '1', '1', '14:00:00', '18:00:00', '1', '1', '7', '');
INSERT INTO `reservation` VALUES ('6', '103', '2020-10-01', '2020-10-01', '49', '2020-09-30 23:35:35', '30', '3', '2', '12:00:00', '15:00:00', '1', '1', '8', '');
INSERT INTO `reservation` VALUES ('6', '104', '2020-10-01', '2020-10-03', '49', '2020-09-30 23:48:50', '170', '1', '1', '12:00:00', '12:00:00', '2', '1', '9', '');

-- ----------------------------
-- Table structure for reservation_status
-- ----------------------------
DROP TABLE IF EXISTS `reservation_status`;
CREATE TABLE `reservation_status` (
  `reservation_status_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`reservation_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of reservation_status
-- ----------------------------
INSERT INTO `reservation_status` VALUES ('1', 'Pendiente');
INSERT INTO `reservation_status` VALUES ('2', 'No Concretado');
INSERT INTO `reservation_status` VALUES ('3', 'Concretado');

-- ----------------------------
-- Table structure for reservation_type_pay
-- ----------------------------
DROP TABLE IF EXISTS `reservation_type_pay`;
CREATE TABLE `reservation_type_pay` (
  `reservation_type_pay_id` int(11) NOT NULL,
  `type_pay` varchar(50) NOT NULL,
  PRIMARY KEY (`reservation_type_pay_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of reservation_type_pay
-- ----------------------------
INSERT INTO `reservation_type_pay` VALUES ('1', 'No Indicado');
INSERT INTO `reservation_type_pay` VALUES ('2', 'Efectivo');
INSERT INTO `reservation_type_pay` VALUES ('3', 'Tarjeta');
INSERT INTO `reservation_type_pay` VALUES ('4', 'Depósito');
INSERT INTO `reservation_type_pay` VALUES ('5', 'Yape');
INSERT INTO `reservation_type_pay` VALUES ('6', 'Plin');

-- ----------------------------
-- Table structure for restaurant
-- ----------------------------
DROP TABLE IF EXISTS `restaurant`;
CREATE TABLE `restaurant` (
  `restaurant_name` varchar(50) NOT NULL,
  `restaurant_open_time` varchar(10) DEFAULT NULL,
  `restaurant_close_time` varchar(10) DEFAULT NULL,
  `restaurant_details` text,
  `table_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`restaurant_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of restaurant
-- ----------------------------

-- ----------------------------
-- Table structure for restaurant_booking
-- ----------------------------
DROP TABLE IF EXISTS `restaurant_booking`;
CREATE TABLE `restaurant_booking` (
  `restaurant_name` varchar(50) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `book_date` varchar(50) NOT NULL,
  `table_number` int(11) DEFAULT NULL,
  `book_price` float DEFAULT NULL,
  PRIMARY KEY (`restaurant_name`,`customer_id`,`book_date`),
  KEY `restaurant` (`restaurant_name`),
  KEY `customer` (`customer_id`),
  CONSTRAINT `restaurant_booking_ibfk_1` FOREIGN KEY (`restaurant_name`) REFERENCES `restaurant` (`restaurant_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `restaurant_booking_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of restaurant_booking
-- ----------------------------

-- ----------------------------
-- Table structure for room
-- ----------------------------
DROP TABLE IF EXISTS `room`;
CREATE TABLE `room` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`room_id`),
  KEY `room_type` (`room_type`),
  CONSTRAINT `room_ibfk_1` FOREIGN KEY (`room_type`) REFERENCES `room_type` (`room_type`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=206 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of room
-- ----------------------------
INSERT INTO `room` VALUES ('101', 'Matrimonial');
INSERT INTO `room` VALUES ('102', 'Matrimonial');
INSERT INTO `room` VALUES ('103', 'Matrimonial');
INSERT INTO `room` VALUES ('104', 'Matrimonial');
INSERT INTO `room` VALUES ('105', 'Matrimonial');
INSERT INTO `room` VALUES ('106', 'Matrimonial');
INSERT INTO `room` VALUES ('107', 'Matrimonial');
INSERT INTO `room` VALUES ('108', 'Matrimonial');
INSERT INTO `room` VALUES ('109', 'Matrimonial');
INSERT INTO `room` VALUES ('110', 'Matrimonial');
INSERT INTO `room` VALUES ('201', 'Suite');
INSERT INTO `room` VALUES ('202', 'Suite');
INSERT INTO `room` VALUES ('203', 'Suite');
INSERT INTO `room` VALUES ('204', 'Suite');
INSERT INTO `room` VALUES ('205', 'Suite');

-- ----------------------------
-- Table structure for room_sales
-- ----------------------------
DROP TABLE IF EXISTS `room_sales`;
CREATE TABLE `room_sales` (
  `customer_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `checkin_date` varchar(50) NOT NULL,
  `checkout_date` varchar(50) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `room_sales_price` float DEFAULT NULL,
  `total_service_price` float DEFAULT NULL,
  PRIMARY KEY (`customer_id`,`room_id`,`checkin_date`),
  KEY `customer` (`customer_id`),
  KEY `employee` (`employee_id`),
  KEY `room` (`room_id`),
  KEY `availability` (`room_id`,`checkin_date`,`checkout_date`),
  CONSTRAINT `room_sales_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `room_sales_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `room_sales_ibfk_3` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of room_sales
-- ----------------------------

-- ----------------------------
-- Table structure for room_service
-- ----------------------------
DROP TABLE IF EXISTS `room_service`;
CREATE TABLE `room_service` (
  `roomservice_id` int(11) NOT NULL AUTO_INCREMENT,
  `roomservice_open_time` varchar(50) DEFAULT NULL,
  `roomservice_close_time` varchar(50) DEFAULT NULL,
  `roomservice_floor` varchar(50) DEFAULT NULL,
  `roomservice_details` text,
  PRIMARY KEY (`roomservice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of room_service
-- ----------------------------

-- ----------------------------
-- Table structure for room_type
-- ----------------------------
DROP TABLE IF EXISTS `room_type`;
CREATE TABLE `room_type` (
  `room_type` varchar(50) NOT NULL,
  `room_price` int(11) DEFAULT NULL,
  `room_details` text,
  `room_quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`room_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of room_type
-- ----------------------------
INSERT INTO `room_type` VALUES ('Matrimonial', '90', 'Para 2 personas', '10');
INSERT INTO `room_type` VALUES ('Suite', '0', '2 personas + jacuzi', '5');

-- ----------------------------
-- Table structure for room_type_rental
-- ----------------------------
DROP TABLE IF EXISTS `room_type_rental`;
CREATE TABLE `room_type_rental` (
  `room_type_rental_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL,
  `type_rental_id` int(11) NOT NULL,
  `room_price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`room_type_rental_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of room_type_rental
-- ----------------------------
INSERT INTO `room_type_rental` VALUES ('1', '201', '1', '45.00');
INSERT INTO `room_type_rental` VALUES ('2', '202', '1', '45.00');
INSERT INTO `room_type_rental` VALUES ('3', '203', '1', '45.00');
INSERT INTO `room_type_rental` VALUES ('4', '204', '1', '45.00');
INSERT INTO `room_type_rental` VALUES ('5', '205', '1', '45.00');
INSERT INTO `room_type_rental` VALUES ('6', '201', '2', '120.00');
INSERT INTO `room_type_rental` VALUES ('7', '202', '2', '120.00');
INSERT INTO `room_type_rental` VALUES ('8', '203', '2', '120.00');
INSERT INTO `room_type_rental` VALUES ('9', '204', '2', '120.00');
INSERT INTO `room_type_rental` VALUES ('10', '205', '2', '120.00');
INSERT INTO `room_type_rental` VALUES ('11', '101', '1', '30.00');
INSERT INTO `room_type_rental` VALUES ('12', '102', '1', '30.00');
INSERT INTO `room_type_rental` VALUES ('13', '103', '1', '30.00');
INSERT INTO `room_type_rental` VALUES ('14', '104', '1', '30.00');
INSERT INTO `room_type_rental` VALUES ('15', '105', '1', '30.00');
INSERT INTO `room_type_rental` VALUES ('16', '106', '1', '30.00');
INSERT INTO `room_type_rental` VALUES ('17', '107', '1', '30.00');
INSERT INTO `room_type_rental` VALUES ('18', '108', '1', '30.00');
INSERT INTO `room_type_rental` VALUES ('19', '109', '1', '30.00');
INSERT INTO `room_type_rental` VALUES ('20', '110', '1', '30.00');
INSERT INTO `room_type_rental` VALUES ('21', '101', '2', '85.00');
INSERT INTO `room_type_rental` VALUES ('22', '102', '2', '85.00');
INSERT INTO `room_type_rental` VALUES ('23', '103', '2', '85.00');
INSERT INTO `room_type_rental` VALUES ('24', '104', '2', '85.00');
INSERT INTO `room_type_rental` VALUES ('25', '105', '2', '85.00');
INSERT INTO `room_type_rental` VALUES ('26', '106', '2', '85.00');
INSERT INTO `room_type_rental` VALUES ('27', '107', '2', '85.00');
INSERT INTO `room_type_rental` VALUES ('28', '108', '2', '85.00');
INSERT INTO `room_type_rental` VALUES ('29', '109', '2', '85.00');
INSERT INTO `room_type_rental` VALUES ('30', '110', '2', '85.00');

-- ----------------------------
-- Table structure for sport_facilities
-- ----------------------------
DROP TABLE IF EXISTS `sport_facilities`;
CREATE TABLE `sport_facilities` (
  `sportfacility_id` int(11) NOT NULL AUTO_INCREMENT,
  `sportfacility_open_time` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `sportfacility_close_time` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `sportfacility_details` text CHARACTER SET utf8,
  PRIMARY KEY (`sportfacility_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of sport_facilities
-- ----------------------------

-- ----------------------------
-- Table structure for type_rental
-- ----------------------------
DROP TABLE IF EXISTS `type_rental`;
CREATE TABLE `type_rental` (
  `type_rental_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_rental` varchar(50) NOT NULL,
  PRIMARY KEY (`type_rental_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of type_rental
-- ----------------------------
INSERT INTO `type_rental` VALUES ('1', 'HORAS');
INSERT INTO `type_rental` VALUES ('2', 'DIAS');

-- ----------------------------
-- Procedure structure for get_available_rooms
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_available_rooms`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_available_rooms`(IN `o_room_type` VARCHAR(50), IN `o_checkin_date` VARCHAR(50), IN `o_checkout_date` VARCHAR(50), IN `o_type_rental_id` INT)
BEGIN
SELECT *, IFNULL((select room_price from room_type_rental where room_type_rental.room_id = room.room_id
					and room_type_rental.type_rental_id = o_type_rental_id), 0) as room_price
FROM `room`
WHERE room_type=o_room_type AND NOT EXISTS (
SELECT room_id FROM reservation WHERE reservation.room_id=room.room_id AND checkout_date >= o_checkin_date AND checkin_date <= o_checkout_date
UNION ALL
SELECT room_id FROM room_sales WHERE room_sales.room_id=room.room_id AND checkout_date >= o_checkin_date AND checkin_date <= o_checkout_date
);
end
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for get_customers
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_customers`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_customers`(IN `today_date` VARCHAR(50))
BEGIN
SELECT * FROM `room_sales` NATURAL JOIN `customer` WHERE checkout_date >= today_date AND checkin_date <= today_date;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for get_report_reservation
-- ----------------------------
DROP PROCEDURE IF EXISTS `get_report_reservation`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_report_reservation`(IN `o_checkin_date_from` VARCHAR(50), IN `o_checkin_date_to` VARCHAR(50), IN `o_status` INT)
BEGIN
SELECT 	a.reservation_id, a.room_id, b.customer_TCno, b.customer_firstname, b.customer_lastname,
		a.checkin_date, case when a.type_rental_id = 1 then null else a.checkout_date end as checkout_date,
        case when a.type_rental_id = 2 then null else a.start_time end as start_time,
        case when a.type_rental_id = 2 then null else a.end_time end as end_time,
        case when a.type_rental_id = 1 then  1 /*hour(subtime(a.end_time , a.start_time ))*/
			 when a.type_rental_id = 2 then DATEDIFF(a.checkout_date, a.checkin_date) 
		end as count_time,
				IF(a.type_rental_id = 1, a.reservation_price,(a.reservation_price /DATEDIFF(a.checkout_date, a.checkin_date) )) as romm_price
       /* (a.reservation_price / (case when a.type_rental_id = 1 then hour(subtime(a.end_time , a.start_time ))
			 when a.type_rental_id = 2 then DATEDIFF(a.checkout_date, a.checkin_date) 
		end)) as romm_price*/,
        a.reservation_price,
        c.employee_username,
        e.status,
        f.type_pay,
        g.contact_channel_descrip,
        a.observacion,
				h.room_type
FROM reservation a
inner join customer b on b.customer_id = a.customer_id
inner join employee c on c.employee_id = a.employee_id
inner join room_type_rental d on d.room_id = a.room_id and d.type_rental_id = a.type_rental_id
inner join reservation_status e on e.reservation_status_id = a.status
inner join reservation_type_pay f on f.reservation_type_pay_id = a.type_pay
inner join contact_channel g on g.contact_channel_id = a.contact_channel_id
inner join room h on h.room_id = d.room_id
where a.checkin_date between o_checkin_date_from and o_checkin_date_to
		and (e.status = 0 or e.status = o_status)
order by a.reservation_id desc;
end
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for todays_service_count
-- ----------------------------
DROP PROCEDURE IF EXISTS `todays_service_count`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `todays_service_count`(IN `today_date` VARCHAR(50))
BEGIN
SELECT count(*) as amount, "laundry" as type 
FROM laundry_service WHERE laundry_date=today_date 
UNION ALL SELECT count(*) as amount, "massage" as type FROM massage_service WHERE massage_date=today_date 
UNION ALL SELECT count(*) as amount, "roomservice" as type FROM get_roomservice WHERE roomservice_date=today_date 
UNION ALL SELECT count(*) as amount, "medicalservice" as type FROM get_medicalservice WHERE medicalservice_date=today_date 
UNION ALL SELECT count(*) as amount, "sport" as type FROM do_sport WHERE dosport_date=today_date
UNION ALL SELECT count(*) as amount, "restaurant" as type FROM restaurant_booking WHERE book_date=today_date
UNION ALL SELECT count(*) as amount, "reservation" as type FROM reservation WHERE cast(reservation_date as date)=today_date
UNION ALL SELECT count(*) as amount, "customer" as type FROM customer WHERE cast(customer_date as date)=today_date
;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `after_insert_sport_service`;
DELIMITER ;;
CREATE TRIGGER `after_insert_sport_service` AFTER INSERT ON `do_sport` FOR EACH ROW BEGIN
    UPDATE room_sales SET room_sales.total_service_price = room_sales.total_service_price + NEW.dosport_price WHERE room_sales.customer_id = NEW.customer_id AND room_sales.checkin_date <= NEW.dosport_date AND room_sales.checkout_date >= NEW.dosport_date;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `before_delete_sport_service`;
DELIMITER ;;
CREATE TRIGGER `before_delete_sport_service` BEFORE DELETE ON `do_sport` FOR EACH ROW BEGIN
    UPDATE room_sales SET room_sales.total_service_price = room_sales.total_service_price - OLD.dosport_price WHERE room_sales.customer_id = OLD.customer_id AND room_sales.checkin_date <= OLD.dosport_date AND room_sales.checkout_date >= OLD.dosport_date;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `after_insert_medical_service`;
DELIMITER ;;
CREATE TRIGGER `after_insert_medical_service` AFTER INSERT ON `get_medicalservice` FOR EACH ROW BEGIN
    UPDATE room_sales SET room_sales.total_service_price = room_sales.total_service_price + NEW.medicalservice_price WHERE room_sales.customer_id = NEW.customer_id AND room_sales.checkin_date <= NEW.medicalservice_date AND room_sales.checkout_date >= NEW.medicalservice_date;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `after_delete_medical_service`;
DELIMITER ;;
CREATE TRIGGER `after_delete_medical_service` BEFORE DELETE ON `get_medicalservice` FOR EACH ROW BEGIN
    UPDATE room_sales SET room_sales.total_service_price = room_sales.total_service_price - OLD.medicalservice_price WHERE room_sales.customer_id = OLD.customer_id AND room_sales.checkin_date <= OLD.medicalservice_date AND room_sales.checkout_date >= OLD.medicalservice_date;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `after_insert_room_service`;
DELIMITER ;;
CREATE TRIGGER `after_insert_room_service` AFTER INSERT ON `get_roomservice` FOR EACH ROW BEGIN
    UPDATE room_sales SET room_sales.total_service_price = room_sales.total_service_price + NEW.roomservice_price WHERE room_sales.customer_id = NEW.customer_id AND room_sales.checkin_date <= NEW.roomservice_date AND room_sales.checkout_date >= NEW.roomservice_date;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `before_delete_room_service`;
DELIMITER ;;
CREATE TRIGGER `before_delete_room_service` BEFORE DELETE ON `get_roomservice` FOR EACH ROW BEGIN
    UPDATE room_sales SET room_sales.total_service_price = room_sales.total_service_price - OLD.roomservice_price WHERE room_sales.customer_id = OLD.customer_id AND room_sales.checkin_date <= OLD.roomservice_date AND room_sales.checkout_date >= OLD.roomservice_date;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `after_insert_laundry_service`;
DELIMITER ;;
CREATE TRIGGER `after_insert_laundry_service` AFTER INSERT ON `laundry_service` FOR EACH ROW BEGIN
    UPDATE room_sales SET room_sales.total_service_price = room_sales.total_service_price + NEW.laundry_price WHERE room_sales.customer_id = NEW.customer_id AND room_sales.checkin_date <= NEW.laundry_date AND room_sales.checkout_date >= NEW.laundry_date;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `before_delete_laundry_service`;
DELIMITER ;;
CREATE TRIGGER `before_delete_laundry_service` BEFORE DELETE ON `laundry_service` FOR EACH ROW BEGIN
    UPDATE room_sales SET room_sales.total_service_price = room_sales.total_service_price - OLD.laundry_price WHERE room_sales.customer_id = OLD.customer_id AND room_sales.checkin_date <= OLD.laundry_date AND room_sales.checkout_date >= OLD.laundry_date;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `after_insert_massage_service`;
DELIMITER ;;
CREATE TRIGGER `after_insert_massage_service` AFTER INSERT ON `massage_service` FOR EACH ROW BEGIN
    UPDATE room_sales SET room_sales.total_service_price = room_sales.total_service_price + NEW.massage_price WHERE room_sales.customer_id = NEW.customer_id AND room_sales.checkin_date <= NEW.massage_date AND room_sales.checkout_date >= NEW.massage_date;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `before_delete_massage_service`;
DELIMITER ;;
CREATE TRIGGER `before_delete_massage_service` BEFORE DELETE ON `massage_service` FOR EACH ROW BEGIN
    UPDATE room_sales SET room_sales.total_service_price = room_sales.total_service_price - OLD.massage_price WHERE room_sales.customer_id = OLD.customer_id AND room_sales.checkin_date <= OLD.massage_date AND room_sales.checkout_date >= OLD.massage_date;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `after_insert_restaurant_service`;
DELIMITER ;;
CREATE TRIGGER `after_insert_restaurant_service` AFTER INSERT ON `restaurant_booking` FOR EACH ROW BEGIN
    UPDATE room_sales SET room_sales.total_service_price = room_sales.total_service_price + NEW.book_price WHERE room_sales.customer_id = NEW.customer_id AND room_sales.checkin_date <= NEW.book_date AND room_sales.checkout_date >= NEW.book_date;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `before_delete_restaurant_service`;
DELIMITER ;;
CREATE TRIGGER `before_delete_restaurant_service` BEFORE DELETE ON `restaurant_booking` FOR EACH ROW BEGIN
    UPDATE room_sales SET room_sales.total_service_price = room_sales.total_service_price - OLD.book_price WHERE room_sales.customer_id = OLD.customer_id AND room_sales.checkin_date <= OLD.book_date AND room_sales.checkout_date >= OLD.book_date;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `after_insert_room`;
DELIMITER ;;
CREATE TRIGGER `after_insert_room` AFTER INSERT ON `room` FOR EACH ROW BEGIN
    UPDATE room_type SET room_type.room_quantity =room_type.room_quantity + 1 WHERE room_type.room_type = NEW.room_type;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `before_delete_room`;
DELIMITER ;;
CREATE TRIGGER `before_delete_room` BEFORE DELETE ON `room` FOR EACH ROW BEGIN
    UPDATE room_type SET room_type.room_quantity =room_type.room_quantity - 1 WHERE room_type.room_type = OLD.room_type;
END
;;
DELIMITER ;
SET FOREIGN_KEY_CHECKS=1;
