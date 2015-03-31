DROP DATABASE IF EXISTS portland;
CREATE DATABASE portland;
USE portland;

CREATE TABLE laptop 
(	
	laptopid int NOT NULL AUTO_INCREMENT,
	brand varchar(30),
	description varchar(100),
	price decimal(8,2),

	primary key (laptopid)
);

CREATE TABLE warehouse 
(	
	warehouseid int,
	laptopid int,
	amount int,

	primary key (warehouseid),
	FOREIGN KEY (laptopid) REFERENCES laptop(laptopid)
);

CREATE TABLE branch 
(	
	branchid int,
	warehouseid int,
	name varchar(25),

	primary key (branchid),
	FOREIGN KEY (warehouseid) REFERENCES warehouse(warehouseid)
);

CREATE TABLE orders(
	orderid int,
	custid int,
	date DATETIME,
	total decimal(8,2),

	PRIMARY KEY(orderid)
);

CREATE TABLE orderdetails
(
	itemnum int, 
	orderid int,
	laptopid int,
	quantity int(3),
	price decimal(8,2),

	PRIMARY KEY(itemnum)
);