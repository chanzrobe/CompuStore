DROP DATABASE IF EXISTS kingston;
CREATE DATABASE kingston;
USE kingston;

CREATE TABLE laptop 
(	
	laptopid int NOT NULL AUTO_INCREMENT,
	brand varchar(30),
	description varchar(100),
	price decimal(8,2),
	amount int,

	primary key (laptopid)
);

INSERT INTO laptop(brand, description, price, account_amt, pin) VALUES ('Domonic', 'Edwards', 620056781, 56000.00, 1234);

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