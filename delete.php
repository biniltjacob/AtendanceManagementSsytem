<?php
   /* Delete Student 
    * Author: Kripa John
    */
	
     require "../config.php";
	include "../header.php";
	$connection = new PDO($dsn, $username, $password, $options);
	session_start();
    if($_SESSION["uname"]&& $_SESSION['type_id']) 
	               {
					   echo"<h2> Welcome ". $_SESSION["uname"]; 
					   echo"<h2> Welcome ". $_SESSION["type_id"]; 
	               }
			try{
		echo	$id=$_GET['id'];
			
			$sql = "DELETE FROM  users  WHERE id=?";
	
	$statement = $connection->prepare($sql);
            $statement->execute(array($id));
	header("Location:student_list.php");
	echo "success";
	}
					catch(PDOException $e)
					{
						echo $stmt."<br>". $e->getMessage();
						
					}
	?>