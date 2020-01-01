CREATE DATABASE attendance_system;

use attendance_system;

CREATE TABLE users (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	name VARCHAR(100) NOT NULL,
	dob VARCHAR(100) NOT NULL,
	email VARCHAR(100) NOT NULL,
	mobile VARCHAR(100) NOT NULL,
	gender VARCHAR(100) NOT NULL,
	address VARCHAR(100) NOT NULL,
	doj VARCHAR(100) NOT NULL,
	doc VARCHAR(100) NOT NULL,
	qualification VARCHAR(100) NOT NULL,
	course VARCHAR(100) NOT NULL,
	username VARCHAR(100) NOT NULL,
	password VARCHAR(100) NOT NULL, 
	type_id INT(3),
	created_at TIMESTAMP,
	created_by VARCHAR(90) NOT NULL, 
	updated_at TIMESTAMP NOT NULL DEFAULT NOW() ON UPDATE NOW(),
	updated_by VARCHAR(90) NOT NULL, 
    is_active BOOLEAN
);
CREATE TABLE division (
	division_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	division_name VARCHAR(90) NOT NULL,
	course_id INT(10)
);

CREATE TABLE user_type (
	usertype_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	usertype_name VARCHAR(90) NOT NULL
);

CREATE TABLE batch (
	batch_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	batch_name VARCHAR(30) NOT NULL,
	start_date VARCHAR(100) NOT NULL,
	end_date VARCHAR(100) NOT NULL,
	course_id INT(3),
	division_id INT(11),
	id INT(11)
);

CREATE TABLE attendance (
	atten_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	id INT(11),
	batch_id INT(11),
	class_id INT(11),
	tdate VARCHAR(80) NOT NULL,
	afternoon VARCHAR(40) NOT NULL,
	forenoon VARCHAR(40) NOT NULL,
	status VARCHAR(40) NOT NULL,
	sub_id INT(11),
	created_by VARCHAR(80) NOT NULL,
	created_at TIMESTAMP,
	updated_by VARCHAR(80) NOT NULL,
	updated_at TIMESTAMP NOT NULL DEFAULT NOW() ON UPDATE NOW()
);

CREATE TABLE course(
	course_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	course_name VARCHAR(30) NOT NULL,
	duration VARCHAR(30) NOT NULL
	
);

CREATE TABLE _class (
	sub_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	sub_name VARCHAR(30) NOT NULL,
	course_id INT(11) NOT NULL
);

CREATE TABLE student_parent (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	student_id INT(11) NOT NULL,
	parent_id INT(11) NOT NULL,
	relation VARCHAR(30) NOT NULL
);
			
CREATE TABLE admin_d (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	type_id INT(11) NOT NULL,
    name VARCHAR(100) NOT NULL,
	email VARCHAR(100) NOT NULL,
	mobile VARCHAR(100) NOT NULL,
	username VARCHAR(100) NOT NULL,
	password VARCHAR(100) NOT NULL
);	
CREATE TABLE leave_request(
	leave_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	type_id INT(11) NOT NULL,
    name VARCHAR(100) NOT NULL,
	email VARCHAR(100) NOT NULL,
	mobile VARCHAR(100) NOT NULL,
	department VARCHAR(100) NOT NULL,
	date_f VARCHAR(100) NOT NULL,
	date_t VARCHAR(100) NOT NULL,
	leave_type VARCHAR(100) NOT NULL,
	reson VARCHAR(100) NOT NULL,
	status VARCHAR(100) NOT NULL
);		
INSERT INTO `user_type`(`usertype_id`, `usertype_name`) 
           VALUES ('1','admin'),('2','trainer'),('3','student'),('4','parent');
		   
INSERT INTO `admin_d`(`type_id`, `name`, `email`, `mobile`, `username`, `password`)
           VALUES ('1','Orisys','orisysindia@gmail.com','9999988888','admin','admin11');