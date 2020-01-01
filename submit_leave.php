<?php 
  /* Insertion of leave Request to database
   * Author: Binil T Jacob
   */
  
    require "../config.php";
	include "../header.php";
	$connection = new PDO($dsn, $username, $password, $options);
//validation
    //echo $type_id=$_POST['type_id'];
    echo $name=$_POST['name'];
    echo $dep=$_POST['dpt'];
    echo $date_f=$_POST['date_f'];
    echo $date_t=$_POST['date_t'];
    echo $leave_type=$_POST['leave_type'];
	echo $comment=$_POST["comment"];
	
	$sql="INSERT INTO leave_request(name, department, date_f, date_t, leave_type, reson) VALUES
      	('$name', '$dep', '$date_f','$date_t','$leave_type','$comment')";
	$connection->exec($sql);
	
?>