DROP DATABASE IF EXISTS kingston;
CREATE DATABASE kingston;
USE kingston;

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
	custid int,
	orderid int,
	dateadded timestamp(12),

	PRIMARY KEY(orderid),
	FOREIGN KEY(custid) REFERENCES customerinfo.customer(custid)	
);

CREATE TABLE orderdetails
(
	orderid int,
	itemid int,
	laptopid int,
	quantity int(3),
	price decimal(8,2),

	PRIMARY KEY(custid, orderid, itemid),
	FOREIGN KEY(orderid) REFERENCES orders(orderid)
);