
CREATE TABLE course(
	course_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	course_name VARCHAR(30) NOT NULL,
	duration VARCHAR(30) NOT NULL
	
);

CREATE TABLE class (
	sub_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	sub_name VARCHAR(30) NOT NULL,
	course_id INT(11) NOT NULL
	
	);
CREATE TABLE student_parent (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	student_1d INT(11) NOT NULL,
	parent_1d INT(11) NOT NULL,
	sub_name VARCHAR(30) NOT NULL,
	
	);
	