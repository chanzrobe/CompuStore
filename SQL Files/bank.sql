DROP DATABASE IF EXISTS bank;
CREATE DATABASE bank;
USE bank;

CREATE TABLE banker 
(	
	id int NOT NULL AUTO_INCREMENT,
	custfname varchar(25),
	custlname varchar(25),
	creditcardnum int(16),
	account_amt decimal(10,2),
	pin int(4),

	primary key(id)
);

INSERT INTO banker(custfname, custlname, creditcardnum, account_amt, pin) VALUES ('Domonic', 'Edwards', 620056781, 56000.00, 1234);