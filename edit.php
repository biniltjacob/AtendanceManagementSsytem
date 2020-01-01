<!--
 *  Student Details Edit
 * Author: Binil T Jacob
 *
 -->
 <style>
     table,td,th
    {
		margin:10px auto;
		border:2px solid #663300;
        border-collapse:collapse; 
        text-align:center;
        padding:20px;
        background:rgba(0,0,0,0.5);
		color:white;
    }
  th
    {
		background-color: black;
	}
h2  {
	  text-align:center;
	  color:tomato;
	}
a   {
	 text-decoration:none;
	 color:white;
	}
 </style>
 <?php
    require "../config.php";
	include "../header.php";
	session_start();
	if($_SESSION["uname"]&& $_SESSION['type_id']) 
	               {
					  // echo"<h2> Welcome ". $_SESSION["uname"]; 
	                }
	$connection = new PDO($dsn, $username, $password, $options);
	echo $id=$_GET['id'];
    $sel  = "Select * from users where id='$id'";
	echo $sel;
			$statement = $connection->prepare($sel);
            $statement->execute();
            $result = $statement->fetchAll();
			if ($result && $statement->rowCount() > 0)
		    {
			?>
          <h2>EDIT</h2>
          
<?php	    foreach ($result as $row) { 
?>
				<div class="reg">
				<form name="registration" method="GET" action="update.php" >
				<input type="hidden" name="id_x" value="<?php echo $id; ?>">
				<label>Name:</label>
				<input type="text" name="name" value="<?php echo $row['name']; ?>" class="fld"/><br><br>
                 <select name="user_type" class="fld">
                 <option value="<?php echo $row['type_id']; ?>"><?php echo $row['type_id']; ?></option>
                 <option value="2">Teacher</option>
                 <option value="3">Student</option>
                 <option value="4">Parent</option>
                </select><br>
				<label>Email:</label>
				<input type="text" name="email" value="<?php echo $row['email']; ?>" class="fld"/><br><br>
                <label>Gender:</label><br>
				<input type="radio" name="gender" value="Male" class="rad"/>Male
                <input type="radio" name="gender" value="Female" class="rad"/>Female<br><br>
				<label>DOB:</label><input type="date" name="dob" value="<?php echo $row['doj']; ?>" class="fld"/><br><br>
                <label>Date Of Joining:</label>
				<input type="date" name="doj" value="<?php echo $row['doj']; ?>" class="fld"/><br><br>
                <label>Qualification:</label>
                <select name="qualification"class="fld">
                <option><?php echo $row['qualification']; ?></option>
                <option value="cse">BTECH CSE</option>
                <option value="ece">BTECH ECE</option>
                <option value="eee">MTECH EEE</option>
                <option value="bca">BCA</option>
                <option value="mca">MCA</option>
                <option value="sslc">SSLC</option>
                <option value="diploma">DIPLOMA</option>
                </select><br><br>
                 <h2>PERSONAL DETAILS</h2><hr><br><br>
                <label>Address</label>
                <textarea name="address" class="fld" value="<?php echo $row['address']; ?>"></textarea>
                 <br><br>
                <label>Phone Number:</label>
				<input type="text" name="phn" value="<?php echo $row['mobile']; ?>" class="fld"/><br><br>
                <label>Username:</label><input type="text" name="uname" value="<?php echo $row['username']; ?>"class="fld"/><br><br>
                 <p> Password must contain: 6 characters, 1 capital, 1 lowercase, 1 number</p><br>
                 <label>password:</label><input type="text" name="pswd"value="<?php echo $row['password']; ?>" class="fld"/><br><br>
                 <label>confirm-password:</label><input type="password" name="cpswd" class="fld"/><br><br>
                 <input type="submit" value="Submit" name="submit" class="btn"/>
                 </form>
			     </div>
			  
        <?php } ?>
       
    <?php } else { ?>
        <blockquote>No results found for <?php echo escape($_POST['location']); ?>.</blockquote>
    <?php } 
 require "../footer.php" ?>