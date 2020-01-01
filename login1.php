 <?php
    require "../config.php";
	include "../header.php";
	$connection = new PDO($dsn, $username, $password, $options);
?>

	<!---------DIV------>
	<center>
	   <div class="log" >
	    
	     <form action="validate.php" method="post"  name="login" onsubmit="return validate()"><br><br>
		 <h3>Login</h3>
		 <select name="type_id" class="fld" required >
		 <option value=""></option>
         <option value="1">Admin</option>
         <option value="2">Teacher</option>
         <option value="3">Student</option>
         <option value="4">Parent</option>
		 </select><br>
		  <input type="text" name="user" Placeholder="Username" class="fld" ><br>
		  <input type="password" name="pass" Placeholder="Password" class="fld" required><br>
		  <input type="submit" value="Reset" class="btn">
		  <input type="submit" value="Log In" class="btn" name="submit"><br>
		  <b><a href="registration.php">New user Register here</a></b>
		 </form>
	   </div>
	</center> <center>
	<div class="row">
		<img src="../img/kudumbasree.png" width="200px" height="200px">&nbsp; &nbsp;&nbsp; &nbsp;
			     
		<img src="../img/ddu-gky.png" width="200px" height="200px">&nbsp; &nbsp;&nbsp; &nbsp;
			
		<img src="../img/orisys.png" width="200px" height="200px">&nbsp; &nbsp;	&nbsp; &nbsp;
		</div>
			 </div>
<?php include "../footer.php";?>
