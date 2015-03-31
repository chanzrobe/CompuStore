DROP DATABASE IF EXISTS kingston;
CREATE DATABASE kingston;
USE kingston;

CREATE TABLE laptop 
(	
	laptopid int NOT NULL AUTO_INCREMENT,
	brand varchar(30),
	description varchar(100),
	image varchar(100),
	price decimal(8,2),
	amt_in_stock int,

	primary key (laptopid)
);

INSERT INTO laptop(brand, description, image, price, amt_in_stock) VALUES ('Apple', 'Mac Air 2', 'images/mac_air2.jpg', 1499.00, 3000);
INSERT INTO laptop(brand, description, image, price, amt_in_stock) VALUES ('Acer', 'ChromeBook', 'images/acer_2.png', 379.00, 30000);
INSERT INTO laptop(brand, description, image, price, amt_in_stock) VALUES ('Toshiba', 'Satellite', 'images/toshiba_1.jpg', 229.00, 30000);
INSERT INTO laptop(brand, description, image, price, amt_in_stock) VALUES ('Dell', 'Inspiron', '', 329.00, 30000);
INSERT INTO laptop(brand, description, image, price, amt_in_stock) VALUES ('Lenovo', 'Yoga', '', 1199.00, 7000);
-- CREATE TABLE warehouse 
-- (	
-- 	warehouseid int,
-- 	laptopid int,
-- 	amount int,

-- 	primary key (warehouseid),
-- 	FOREIGN KEY (laptopid) REFERENCES laptop(laptopid)
-- );

-- CREATE TABLE branch 
-- (	
-- 	branchid int,
-- 	warehouseid int,
-- 	name varchar(25),

-- 	primary key (branchid),
-- 	FOREIGN KEY (warehouseid) REFERENCES warehouse(warehouseid)
-- );

CREATE TABLE orders(
	orderid int,
	custid int,
	date DATETIME,
	total decimal(8,2),

	PRIMARY KEY(custid, orderid)
);

CREATE TABLE orderdetails
(
	itemnum int, 
	orderid int,
	custid int,
	laptopid int,
	quantity int(3),
	price decimal(8,2),

	PRIMARY KEY(custid, orderid, itemnum)
);