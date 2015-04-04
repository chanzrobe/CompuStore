DROP DATABASE IF EXISTS customerinfo;
CREATE DATABASE customerinfo;
USE customerinfo;

CREATE TABLE customer 
(	
	custid int AUTO_INCREMENT NOT NULL,
	custfname varchar(25),
	custlname varchar(25),
	email varchar(50),
	password varchar(25),
	address varchar (50),
	city varchar (50),
	country varchar (50),
	creditcardnum int,

	primary key (custid)

);

CREATE TABLE orders(
	orderid int,
	custid int,
	date DATETIME,

	PRIMARY KEY(custid, orderid)
);

CREATE TABLE orderdetails
(
	itemnum int, 
	orderid int,
	branchid int,
	custid int,
	laptopid int,
	quantity int(3),
	price decimal(8,2),

	PRIMARY KEY(custid, orderid, itemnum)
);