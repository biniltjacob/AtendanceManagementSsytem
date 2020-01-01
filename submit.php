<?php
    /* Action page for Login form
	 * Email and Phone Number will be validated
	 * Server side validation
	 * Author: Riya joseph
	 */
    require "../config.php";
	include "../header.php";
     session_start();
	$connection = new PDO($dsn, $username, $password, $options);
	if($_SESSION["uname"] && $_SESSION['type_id']) 
	               {
					 echo   $cname=$_SESSION["uname"]; 
	               }
//validation
    $user_type=$_POST['user_type'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $dob=$_POST['dob'];
    $doj=$_POST['doj'];
    $qual=$_POST['qualification'];
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
	    if($dob=="")
		   {
			   echo "Enter a valid date of birth";
			   $flag++;
		   }
	    if($doj=="")
		   {
			   echo "Enter a valid date of joining";
			   $flag++;
		   }
		if($qual=="")
		   {
			   echo "Enter a valid Qualification";
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
			$sel = "Select * from users where email='$email'";
			$statement = $connection->prepare($sel);
            $statement->execute();
            $result = $statement->fetchAll();
			if ($result && $statement->rowCount() > 0) {
				echo "Email already Exist";
				echo "<a href='teacher_registration.php'>Try again</a>";
				
				
			}
			else
			{
			$sel = "Select * from users where mobile='$phone'";
			$statement = $connection->prepare($sel);
            $statement->execute();
            $result = $statement->fetchAll();
			if ($result && $statement->rowCount() > 0) {
				echo "Phone already Exist";
				echo "<a href='teacher_registration.php'>Try again</a>";
			}
			else
			{
				
		    $sql="INSERT INTO users(name, dob, email, mobile, gender, address, doj, 
			qualification, username, password, type_id, created_by) VALUES ('$name', '$dob', '$email',
			'$phone','$gender','$address','$doj','$qual', '$uname','$pass', '$user_type', '$cname')";
			$connection->exec($sql);
			echo "onClick returnConfirm 'Registered Succesfully...'";
		    header( "Location: login.php" );
           }
		}}}
	catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }
	include "../footer.php";
?>