DROP DATABASE IF EXISTS customerinfo;
CREATE DATABASE customerinfo;
USE customerinfo;

CREATE TABLE customer 
(	
	custid int(14),
	custfname varchar(25),
	custlname varchar(25),
	password varchar(25),
	email varchar(50),
	creditcardnum int(16),

	primary key (custid)

);

create table customerpurchase
(
	tracking_num int(11),    /*purchase id*/
	custid int,
	laptopid int,
	totalcost float(8,2),
	primary key (tracking_num),
	FOREIGN KEY (custid) REFERENCES customer(custid),
	FOREIGN KEY (laptopid) REFERENCES kingston.laptop(laptopid),
	FOREIGN KEY (laptopid) REFERENCES portland.laptop(laptopid),
	FOREIGN KEY (laptopid) REFERENCES manchester.laptop(laptopid)
);

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


-- create table degrees	/*Need to find a away to account for majors and minors 
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