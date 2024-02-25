SET foreign_key_checks = 0;

DROP TABLE IF EXISTS `ecom_user`;
DROP TABLE IF EXISTS `ecom_manufacturer`;
DROP TABLE IF EXISTS `ecom_type`;
DROP TABLE IF EXISTS `ecom_product`;
DROP TABLE IF EXISTS `ecom_product_image`;
DROP TABLE IF EXISTS `ecom_post`;
DROP TABLE IF EXISTS `ecom_order`;
DROP TABLE IF EXISTS `ecom_order_item`;
DROP TABLE IF EXISTS `ecom_payments`;

SET foreign_key_checks = 1;

CREATE TABLE `ecom_user` (
  `username` VARCHAR(30) NOT NULL,
  `email` VARCHAR(60) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `title` ENUM('Mr','Mrs','Ms','Miss'),
  `first_name` VARCHAR(40) NOT NULL,
  `last_name` VARCHAR(40) NOT NULL,
  `gender` ENUM('Male','Female') ,
  `dob` DATE ,
  `image` VARCHAR(100) DEFAULT 'images/users/placeholder.png',
  `joined` DATE NOT NULL,
  `is_admin` TINYINT NOT NULL DEFAULT 0,
  PRIMARY KEY (`username`),
  UNIQUE (`email`)
);

INSERT INTO `ecom_user` (`username`, `email`, `password`, `title`, `first_name`, `last_name`, `gender`, `dob`, `image`, `joined`, `is_admin`)
VALUES
	('Phil','philip.henning.1@city.ac.uk','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3','Mr','Phil','Henning','Male','1982-09-23','images/users/Phil.jpg','2014-01-01', 1 ),
	('Tom', 'tom@city.ac.uk','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3','Mr','Tom','Hanks','Male','1980-01-06','images/users/tom.jpg','2014-03-01', 0),
	('Jen', 'jen@city.ac.uk','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3','Miss','Jennifer','Lawrence','Female','1960-01-01','images/users/jen.jpg','2014-01-01', 0),
	('Dick', 'dick@city.ac.uk','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3','Mr','Richard','Branson','Male','1970-01-01','images/users/dick.jpg','2014-02-01', 0),
	('Harry', 'harry@city.ac.uk','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3','Mr','Harry','Potter','Male','1985-01-01','images/users/harry.jpg','2014-02-01', 0);

CREATE TABLE `ecom_manufacturer` (
  `id` SMALLINT(3) NOT NULL,
  `manufacturer` VARCHAR(50) NOT NULL,
  `year_established` YEAR(4),
  `headquarters` VARCHAR(60),
  `image` VARCHAR(100),
  `website` VARCHAR(150),
  `about` TEXT,
  PRIMARY KEY (`id`)
);

INSERT INTO `ecom_manufacturer` (`id`, `manufacturer`, `year_established`, `headquarters`, `website`, `image`, `about`)
VALUES
	(1,'Atomic','1955','Austria','http://www.atomicsnow.com','images/manufacturers/atomic.png','Atomic is an Austrian company that manufactures and sells skiing equipment under different brand names. Atomic is also a well-known manufacturer of alpine skis'),
	(2,'DC','1993','Huntington Beach, USA','http://www.dcshoes.com','images/manufacturers/dc.jpg','DC Shoes is an American company that specializes in footwear for action sports, including skateboarding and snowboarding. The company also manufactures apparel, bags, accessories, and posters.'),
	(3,'K2','1961','Vashon Island, USA','http://k2snowboarding.com/','images/manufacturers/k2.jpg','K-2, Corporation was founded in 1962 by brothers Bill and Don Kirschner on Vashon Island, near Seattle, Washington in the United States. K2 is known for pioneering fiberglass ski technology, which made skis significantly lighter and more lively than their wood and metal contemporaries. Famous users of K2 skis include Seth Morrison, pro champion Spider Sabich, World Cup and Olympic champion Phil Mahre, and his twin brother Steve Mahre, World Champion and Olympic silver medalist.'),
	(4,'Palmer','1995','Europe? Unknown','http://www.palmerproject.com/','images/manufacturers/palmer.png','Palmer began Palmer Snowboards in 1995, as an offshoot of one of the most popular names in extreme sports. Palmer currently acts as CEO of Palmer Snowboards. As per his facebook page, Palmer Snowboards closed its U.S.-based office doors in 2008 and the brand is only available for purchase within Europe. Rumor is that a Swiss owner bought the brand with inheritance; as Palmer Snowboard\'s online shop is all in German language and an account to shop with can only be created with an address in Europe.'),
	(5,'Rome','2001','Vermont, USA','http://www.romesnowboards.com/','images/manufacturers/rome.jpg','Rome SDS was founded by Josh Reid and Paul Maravetz. Reed and Maravetz worked together in marketing and product development at Burton. They felt the need to start their own company when they began to feel that the snowboard industry was putting out too many mediocre products that sold only because they were used by an Olympic snowboarder and marketed heavily. The two felt that companies had stopped caring about snowboarding. Thus, in late 2001, the two launched Rome SDS.'),
	(6,'Rossignol','1907','Isere, France','http://www.rossignol.com','images/manufacturers/rossignol.jpg','Skis Rossignol S.A., or simply Rossignol, is a French manufacturer of alpine, snowboard, and Nordic equipment, as well as related outerwear and accessories, located in Isere, France. Rossignol was one of the first companies to produce plastic skis.');

CREATE TABLE `ecom_type` (
  `id` SMALLINT(6) NOT NULL,
  `name` VARCHAR(50) NOT NULL,
  `description` TEXT,
  `product_type_image` VARCHAR(100),
  PRIMARY KEY (`id`)
);

INSERT INTO `ecom_type` (`id`, `name`, `description`, `product_type_image`)
VALUES
	(1,'Snowboards', 'Snowboards are boards that are usually the width of one''s foot longways, with the ability to glide on snow. Snowboards are differentiated from monoskis by the stance of the user. In monoskiing, the user stands with feet inline with direction of travel (facing tip of monoski/downhill) (parallel to long axis of board), whereas in snowboarding, users stand with feet transverse (more or less) to the longitude of the board. Users of such equipment may be referred to as snowboarders. Commercial snowboards generally require extra equipment such as bindings and special boots which help secure both feet of a snowboarder, who generally rides in an upright position. These type of boards are commonly used by people at ski hills or resorts for leisure, entertainment and competitive purposes in the activity called snowboarding.', 'images/category/snowboards.jpg'),
	(2,'Skis', 'A ski is a narrow strip of semi-rigid material worn underfoot to glide over snow. Substantially longer than wide and characteristically employed in pairs, skis are attached to ski boots with ski bindings, with either a free, lockable, or partially secured heel. Originally intended as an aid to travel over snow, they are now mainly used recreationally in the sport of skiing.', 'images/category/skis.jpg'),
	(3,'Jackets', 'Jackets are just jackets at the end of the day.', 'images/category/jackets.jpg'),
	(4,'Bindings', 'Bindings are separate components from the snowboard deck and are very important parts of the total snowboard interface. The bindings'' main function is to hold the rider''s boot in place tightly to transfer their energy to the board. Most bindings are attached to the board with three or four screws that are placed in the center of the binding. Although a rather new technology from Burton called Infinite channel system uses two screws, both on the outsides of the binding. There are several types of bindings. Strap-in, step-in, and hybrid bindings are used by most recreational riders and all freestyle riders.', 'images/category/bindings.jpg');

CREATE TABLE `ecom_product` (
  `id` VARCHAR(100) NOT NULL,
  `name` VARCHAR(50) NOT NULL,
  `manufacturer_id` SMALLINT(3) NOT NULL,
  `type_id` SMALLINT(6) NOT NULL,
  `price` DOUBLE DEFAULT 0.00 NOT NULL,
  `year` YEAR(4) NOT NULL,
  `description` TEXT,
  `qty` INT DEFAULT 50 NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`manufacturer_id`) REFERENCES `ecom_manufacturer` (`id`),
  FOREIGN KEY (`type_id`) REFERENCES `ecom_type` (`id`)
);

INSERT INTO `ecom_product` (`id`, `name`, `manufacturer_id`, `type_id`, `price`, `year`, `description`, `qty`)
VALUES
	('atomic_access', 'Access', 1, 2, 349.99,'2013', 'Test',50),
	('atomic_jacket', 'Jacket', 1, 3, 49.99,'2014', 'This is the first jacket that Atomic have ever produced', 50),
	('atomic_redster', 'Redster', 1, 2, 224.99,'2013', 'Test',50),		
	('k2_kite', 'Kite', 3, 2, 0,'2013', 'Test',50),		
	('rossignol_radical', 'Radical', 6, 2, 199.99,'2013', 'Test',50),		
	('rossignol_soul', 'Soul', 6, 2, 319.99,'2013', 'Test',50),		
	('dc_porter', 'Porter', 2, 1, 310.99,'2013', 'Test',50),		
	('dc_pro', 'Pro', 2, 1, 290.98,'2013', 'Test',50),		
	('dc_sweet', 'Sweet', 2, 1, 430.00,'2013', 'Test',50),		
	('k2_ultra', 'Ultra', 3, 1, 549.99,'2013', 'Test',50),		
	('palmer_burn', 'Burn', 3, 1, 299.99,'2013', 'Test',50),		
	('palmer_pro', 'Pro', 4, 1, 399.99,'2013', 'Test',50),		
	('palmer_timber', 'Timber', 4, 1, 449.99,'2013', 'Test',50),		
	('rome_boss', 'Boss', 5, 4, 149.99,'2013', 'Test',50),		
	('rome_united', 'United', 5, 4, 199.99,'2013', 'Test',50),		
	('rossignol_unit', 'Unit', 6, 4, 249.99,'2013', 'Test',50),
	('rossignol_cage', 'Cage', 6, 4, 139.99,'2013', 'Test',50);

CREATE TABLE `ecom_post` (
`id` INT NOT NULL AUTO_INCREMENT,
`username` VARCHAR(60) NOT NULL,
`product_id` VARCHAR(100) NOT NULL,
`manufacturer_id` SMALLINT(3) NOT NULL,
`post_time` DATETIME NOT NULL,
`comment` TEXT NOT NULL,
PRIMARY KEY (`id`),
FOREIGN KEY (`username`) REFERENCES `ecom_user` (`username`),
FOREIGN KEY (`product_id`) REFERENCES `ecom_product` (`id`),
FOREIGN KEY (`manufacturer_id`) REFERENCES `ecom_manufacturer` (`id`)
);

INSERT INTO `ecom_post` (`id`, `username`, `product_id`, `manufacturer_id`, `post_time`, `comment`)
VALUES
	(1,	'Phil',	'atomic_access', 1, '2014-03-05 12:05:56', 'Another test comment.'),
	(2,	'Tom', 'k2_kite', 3, '2014-03-06 15:16:21', 'I''m getting bored of leaving comments.'),
	(3,	'Dick', 'dc_sweet', 2, '2014-03-07 10:45:13', 'Not sure what else to wrtie.'),
	(4, 'Harry', 'palmer_pro', 4, '2014-03-08 09:15:51', 'This seems like a cool product.'),
	(5, 'Tom', 'rome_boss', 5, '2014-03-09 19:29:37', 'I thought Rome was a place?'),
	(6,'Jen','rossignol_radical', 6,'2014-03-23 12:26:43','Test test test'),
	(7,'Phil','dc_sweet', 2,'2014-03-23 12:33:02','this is another comment'),
	(8,'Dick','k2_ultra', 3,'2014-03-23 15:20:19','test'),
	(9,'Harry','atomic_redster', 1,'2014-03-23 15:20:22',''),
	(10,'Jen','rome_united', 5,'2014-03-23 15:54:40','yay i think I have comments working'),
	(11,'Phil','palmer_timber', 4,'2014-03-24 00:16:12','bloody spiffing good product!!');
	
	
CREATE TABLE `ecom_product_image` (
`id` INT NOT NULL AUTO_INCREMENT,
`product_id` VARCHAR(100) NOT NULL,
`location` VARCHAR(255) NOT NULL,
PRIMARY KEY (`id`),
FOREIGN KEY (`product_id`) REFERENCES `ecom_product`(`id`)
);

INSERT INTO `ecom_product_image` (`product_id`, `location`)
VALUES

	('atomic_access', 'images/products/atomic_access.jpg'),
	('atomic_redster', 'images/products/atomic_redster.jpg'),	
	('atomic_jacket', 'images/products/atomic_jacket.jpg'),	
	('k2_kite', 'images/products/k2_kite.jpg'),		
	('rossignol_radical', 'images/products/rossignol_radical.jpg'),	
	('rossignol_soul', 'images/products/rossignol_soul.jpg'),	
	('dc_porter', 'images/products/dc_porter.jpg'),		
	('dc_pro', 'images/products/dc_pro.jpg'),
	('dc_sweet', 'images/products/dc_sweet.jpg'),	
	('k2_ultra', 'images/products/k2_ultra.png'),		
	('palmer_burn', 'images/products/palmer_burn.jpg'),
	('palmer_pro', 'images/products/palmer_pro.jpg'),
	('palmer_timber', 'images/products/palmer_timber.jpg'),		
	('rome_boss', 'images/products/rome_boss.jpg'),	
	('rome_united', 'images/products/rome_united.jpg'),
	('rossignol_unit', 'images/products/rossignol_unit.jpg'),
	('rossignol_cage', 'images/products/rossignol_cage.jpg');

CREATE TABLE `ecom_order` (
`id` INT NOT NULL AUTO_INCREMENT,
`username` VARCHAR(60) NOT NULL,
`date_time` DATETIME NOT NULL,
`total_amount` DOUBLE NOT NULL,
`ship_fname` VARCHAR(255) NOT NULL,
`ship_lname` VARCHAR(255) NOT NULL,
`ship_address` VARCHAR(255) NOT NULL,
`ship_postcode` VARCHAR(8) NOT NULL,
PRIMARY KEY (`id`),
FOREIGN KEY (`username`) REFERENCES `ecom_user`(`username`)
);

INSERT INTO `ecom_order` (`username`, `date_time`, `total_amount`, `ship_fname`, `ship_lname`, `ship_address`, `ship_postcode`)
VALUES
('Phil', '2014-04-21 12:05:56', 449.98, 'Phil', 'Henning', '23 Common Lane', 'HU15 1PT');

CREATE TABLE `ecom_order_item` (
`id` INT NOT NULL AUTO_INCREMENT,
`main_order` INT NOT NULL,
`product` VARCHAR(100) NOT NULL,
`quantity` INT NOT NULL,
PRIMARY KEY (`id`),
FOREIGN KEY (`main_order`) REFERENCES `ecom_order`(`id`),
FOREIGN KEY (`product`) REFERENCES `ecom_product`(`id`)
);

INSERT INTO `ecom_order_item` (`main_order`, `product`, `quantity`)
VALUES
(1, 'palmer_pro', 1),
(1, 'atomic_jacket', 1);

CREATE TABLE ecom_payments (
  id int(6) NOT NULL AUTO_INCREMENT,
  txnid varchar(20) NOT NULL,
  payment_amount decimal(7,2) NOT NULL,
  payment_status varchar(25) NOT NULL,
  itemid varchar(25) NOT NULL,
  createdtime datetime NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM;

	
	