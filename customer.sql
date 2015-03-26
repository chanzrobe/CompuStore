
DROP DATABASE IF EXISTS customer;
CREATE DATABASE customer;
USE customer;

CREATE TABLE customer 
(	
	custid int,
	custfname varchar(25),
	custlname varchar(25),
	password varchar(25),
	email varchar(50),
	creditcardnum int,

	primary key (custid)

);

-- INSERT INTO customer (custid, custfname, custlname, email, creditcardnum)
-- WITH custids(custid) AS
-- (VALUES(1) UNION ALL
-- SELECT custid+1 FROM custids WHERE custid < 500000)
-- SELECT custid,
-- TRANSLATE (CHAR(BIGINT(RAND() * 10000000000 )), 'abcdefgHij', '1234567890'),
-- TRANSLATE (CHAR(BIGINT(RAND() * 10000000000 )), 'abcdefgHij', '1234567890'),
-- TRANSLATE (CHAR(BIGINT(RAND() * 10000000000 )), 'abcdefgHij', '1234567890') ,
-- TRANSLATE ((BIGINT(RAND() * 10000000000 )), '1234567890') 
-- FROM custids

-- /*create table customerpurchase
-- (
-- 	tracking_num int,    /*purchase id*/
-- 	custid int,
-- 	laptopid int,
-- 	cost float(8,2),
-- 	primary key (tracking_num),
-- 	FOREIGN KEY (custid) REFERENCES customer(custid),
-- 	FOREIGN KEY (laptopid) REFERENCES laptop(laptopid)
-- );

-- create table courses
-- 	(
-- 		c_code varchar (25),
-- 		c_name varchar (50),
-- 		c_level int,
-- 		c_descrip varchar(500),
-- 		semester int,
-- 		creditnum int,


-- 		primary key (c_code)

-- 	);

-- create table prereq
-- (
-- 	id int not null AUTO_INCREMENT,
-- 	c_code varchar(8),
-- 	prereq_code varchar(8),
-- 	primary key (id),
-- 	FOREIGN KEY (c_code) REFERENCES courses(c_code),
-- 	FOREIGN KEY (prereq_code) REFERENCES courses(c_code)

-- );


-- create table degrees	/*Need to find a away to account for majors and minors */
-- 	(
-- 		id int auto_increment NOT NULL,
-- 		name varchar(50),
-- 		department varchar(50),
-- 		type varchar(50),

-- 		primary key (id)

-- 	);

-- 	create table requirements
-- 		(
-- 			id int not null AUTO_INCREMENT,
-- 			degree_name varchar(50),
-- 			core_course varchar(25),
-- 			primary key (id),
-- 			FOREIGN KEY (core_course) REFERENCES courses(c_code)
-- 			/*FOREIGN KEY (name) REFERENCES courses(c_code)*/
-- 		);



-- create table lecturer
-- 	(
-- 		lec_id int,
-- 		lec_name varchar(50),
-- 		lec_code varchar(8),

-- 		primary key (lec_id),
-- 		FOREIGN KEY (lec_code) REFERENCES courses(c_code)

-- 	);*/