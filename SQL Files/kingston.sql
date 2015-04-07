DROP DATABASE IF EXISTS kingston;
CREATE DATABASE kingston;
USE kingston;

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `laptopUpdate`(
IN quantity INT, IN laptop_id INT)
begin
UPDATE laptop SET amt_in_stock=amt_in_stock-quantity WHERE laptopid=laptop_id;
end$$

DELIMITER;

CREATE TABLE laptop 
(	
	laptopid int NOT NULL AUTO_INCREMENT,
	brand varchar(30),
	model varchar(30),
	description varchar(500),
	image varchar(100),
	price decimal(8,2),
	amt_in_stock int,

	primary key (laptopid)
);

INSERT INTO laptop(brand, model, description, image, price, amt_in_stock) VALUES ('Apple', 'Mac Air 2', '', 'images/mac_air2.jpg', 1499.00, 3000);
INSERT INTO laptop(brand, model, description, image, price, amt_in_stock) VALUES ('Acer', 'ChromeBook', 'The Acer Chromebook is a super portable laptop with enough power to last all day on a single charge.', 'images/acer_2.png', 379.00, 30000);
INSERT INTO laptop(brand, model, description, image, price, amt_in_stock) VALUES ('Toshiba', 'Satellite', '' ,'images/toshiba_1.jpg', 229.00, 30000);
INSERT INTO laptop(brand, model, description, image, price, amt_in_stock) VALUES ('Dell', 'Inspiron', '', '' ,329.00, 30000);
INSERT INTO laptop(brand, model, description, image, price, amt_in_stock) VALUES ('Lenovo', 'Yoga', '', '' ,1199.00, 7000);
