<?php
     /* Teacher Update Action Page
	  * Author: Roshin Reji
	  */
    require "../config.php";
	include "../header.php";
	$connection = new PDO($dsn, $username, $password, $options);
	session_start();
    if($_SESSION["uname"]&& $_SESSION['type_id']) 
	               {
					   echo"<h2> Welcome ". $_SESSION["uname"]; 
	               }
				    try{
	$id=  $_GET['id_x'];
	$user_type=$_GET['user_type'];
    $name=$_GET['name'];
    $email=$_GET['email'];
    $gender=$_GET['gender'];
    $dob=$_GET['dob'];
    $doj=$_GET['doj'];
    $qual=$_GET['qualification'];
    $address=$_GET['address'];
    $phone=$_GET['phn'];
    $uname=$_GET['uname'];
    $cpass=$_GET['cpswd'];
	 
	  $sql = "UPDATE users SET name=?, dob=?, email=?, mobile=?, gender=?, address=?, doj=?, qualification=?, username=?, password=? WHERE id=?";
      $stmt= $connection->prepare($sql);
      $stmt->execute([$name, $dob, $email,$phone, $gender, $address, $doj, $qual, $uname, $cpass, $id]);
	  header("Location:admin_teacher.php");
	  echo "success";
	}
					catch(PDOException $e)
					{
						echo $stmt."<br>". $e->getMessage();
						
					}
	?>