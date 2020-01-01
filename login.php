 <?php
 
 /*   Login Page
  *   Author:  Roshin Reji, Riya Joseph, Harilekshmi K, Rakhi Dayanadan
  *
  */
    require "../config.php";
	include "../header_login.php";
	$connection = new PDO($dsn, $username, $password, $options);
?>
<style>
h2{color:white;
}
</style>

	<!---------DIV------>
	<center>
	<br><br>
	   <div class="reg" >
	     <form action="validate.php" method="post"  name="login" onsubmit="return validate()">
		 <!--<img src="../img/hn.png" width="300px" height="200px">-->
		 <h2>Login</h2><br>
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
		  <input type="submit" value="Log In" class="btn" name="submit"><br><br>
		  <b><a href="parent.php">Parent Registration</a></b>
		 </form>
	   </div>
	   <div class="row">
		<img src="../img/kudumbasree.png" width="200px" height="200px">&nbsp; &nbsp;&nbsp; &nbsp;
			     
		<img src="../img/ddu-gky.png" width="200px" height="200px">&nbsp; &nbsp;&nbsp; &nbsp;
			
		<img src="../img/orisys.png" width="200px" height="200px">&nbsp; &nbsp;	&nbsp; &nbsp;
		</div>
			 </div>
	</center>
<?php include "../footer.php";?>