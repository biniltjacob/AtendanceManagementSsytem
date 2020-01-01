<?php
   /* Action page for parent registration
    * Server side validation: Jitty John, Harilekshmi K
	* Author: Harilekshmi K
	*/
    
    require "../config.php";
	include "../header.php";
	$connection = new PDO($dsn, $username, $password, $options);
//validation
    echo $name=$_POST['name'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $studentid=$_POST['studentid'];
    $relation=$_POST['relation'];
    $address=$_POST['address'];
    $phone=$_POST['phn'];
    $uname=$_POST['uname'];
    $pass=$_POST['pswd'];
    $cpass=$_POST['cpswd'];
	
	// Name validation
	$flag=0;              
        if(preg_match("/^[a-zA-Z -]+$/", $name) === 0)     //First Name
		    {
			   echo " <br>Name is not valid";
			   $flag++;
		    }
	//Email Validation
		if (filter_var($email, FILTER_VALIDATE_EMAIL))
		    {
               // echo("$email is a valid email address");
            }
		else 
		    {
               echo("<br> $email is not a valid email address");
			    $flag++;
			}
	//Gender Validation
	    if(empty($gender))
		   {
              echo "Select your gender";
			  $flag++;
           }
	    if($studentid=="")
		   {
			   echo "Enter a valid studentid";
			   $flag++;
		   }
	    if($relation=="")
		   {
			   echo "Enter a valid relation";
			   $flag++;
		   }
		
	    if($address=="")
		   {
			   echo "Enter a valid address";
			   $flag++;
		   }
	//	if(preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone))
		 if($phone=="")
			{
				echo "not valid";
              // $phone is valid
            }
			//else
			//{
			  //  echo "Not a valid number";
			//	$flag++;
			//}
		if(preg_match("/^[a-zA-Z -]+$/", $uname) === 0)     //User Name
		    {
			   echo " <br>User Name is not valid";
			   $flag++;
		    }
		if (strlen($pass) <= '6') 
		    {
                echo "Your Password Must Contain At Least 6 Characters!";
				$flag++;
            }
        elseif(!preg_match("#[0-9]+#",$pass)) 
		    {
                echo "Your Password Must Contain At Least 1 Number!";
				$flag++;
            }
        elseif(!preg_match("#[A-Z]+#",$pass)) 
		    {
                echo "Your Password Must Contain At Least 1 Capital Letter!";
				$flag++;
            }
        elseif(!preg_match("#[a-z]+#",$pass)) 
		    {
                echo "Your Password Must Contain At Least 1 Lowercase Letter!";
				$flag++;
            }
        if($pass!=$cpass)
			{
				echo "Password Mismatch!";
				$flag++;
			}
				
		//Insertion
		try{
		if($flag<1)
		{
			$sel = "Select * from student_parent where email='$email'";
			$statement = $connection->prepare($sel);
            $statement->execute();
            $result = $statement->fetchAll();
			if ($result && $statement->rowCount() > 0) {
				echo "Email already Exist";
				echo "<a href='parent.php'>Try again</a>";
				
				
			}
			else
			{
			$sel = "Select * from student_parent where phone='$phone'";
			$statement = $connection->prepare($sel);
            $statement->execute();
            $result = $statement->fetchAll();
			if ($result && $statement->rowCount() > 0) {
				echo "Phone already Exist";
				echo "<a href='parent.php'>Try again</a>";
			}
			else
			{
				
		    $sql="INSERT INTO users(name,email,gender,student_id,relation,address, 
			phone, username, password, created_by, created_at) VALUES ('$name','$email','$gender','$address',
			'$phone','$uname','$pass', '$created_by', '$created_at')";
			$connection->exec($sql);
			/*$upd= "UPDATE student_parent SET name=?, gender=? , student_id, parent_id, relation WHERE id=?";
            $stmt= $pdo->prepare($sql);
            $stmt->execute([$name, $gender, $sex, $studentid, $relation]);"*/
			$sdl="INSERT INTO student_parent (name, gender, student_id, parent_id, relation) VALUES 
			      ($name, $gender, $gender, $studentid, $relation)";
            $connection->exec($sdl);
			header( "Location: registration.php/" );
			
           }
		}}}
	catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }
	include "../footer.php";
?>