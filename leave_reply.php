<!--
  * Leave Response from Admin or Trainer
  * Author: Abhijith M Shaji
  *
-->

<?php
    require "../config.php";
	include "../header.php";
	$connection = new PDO($dsn, $username, $password, $options);
	session_start();
    if($_SESSION["uname"]) 
	               {
					echo"<h4 style='margin:10px;margin-left:40px;'> user: ". $_SESSION["uname"]."</h4>"; 
	                }
try{
		echo	$id=$_GET['id'];
			
			$sql = "DELETE FROM  users  WHERE id=?";
	
	$statement = $connection->prepare($sql);
            $statement->execute(array($id));
	header("Location:leave_request_st_tr.php");
	echo "success";
	}
	foreach($_POST['attendance'] as $key =>$val)
		{       
           echo  $studentid = $key;
           echo  $status = $val;
			$sql = "UPDATE leave_request SET status=? WHERE leave_id=?";
      $stmt= $connection->prepare($sql);
      $stmt->execute([$val, $key]);
	 	}
	
	