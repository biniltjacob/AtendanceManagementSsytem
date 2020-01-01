CREATE TABLE student_parent (
	parent_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	name VARCHAR(100) NOT NULL,
	email VARCHAR(100) NOT NULL,
	gender VARCHAR(100) NOT NULL,
	student_id INT(11) NOT NULL,
	relation VARCHAR(100) NOT NULL,
	address VARCHAR(100) NOT NULL,
	phone VARCHAR(100) NOT NULL,
	username VARCHAR(100) NOT NULL,
	password VARCHAR(100) NOT NULL, 
	type_id INT(3),
	created_at TIMESTAMP,
	created_by VARCHAR(90) NOT NULL, 
	updated_at TIMESTAMP NOT NULL DEFAULT NOW() ON UPDATE NOW(),
	updated_by VARCHAR(90) NOT NULL, 
    is_active BOOLEAN
);