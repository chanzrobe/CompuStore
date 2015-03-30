DROP DATABASE IF EXISTS manchester;
CREATE DATABASE manchester;
USE manchester;

CREATE TABLE laptop 
(	
	laptopid int,
	type varchar(30),
	description varchar(100),
	cost decimal(8,2),
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