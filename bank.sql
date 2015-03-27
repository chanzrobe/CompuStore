DROP DATABASE IF EXISTS bank;
CREATE DATABASE bank;
USE bank;

CREATE TABLE banker 
(	
	id int NOT NULL AUTO_INCREMENT,
	custfname varchar(25),
	custlname varchar(25),
	creditcardnum int(16),
	accountamt decimal(10,2),
	pin int(4),
	primary key(id),
	FOREIGN KEY (creditcardnum) REFERENCES customer.customer(creditcardnum)
);