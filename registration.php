<?php 
/* Staff  Registration Form
 * AUthor: Kripa John
 */
   require "../config.php";
   include "../header.php";
   session_start();
   $connection = new PDO($dsn, $username, $password, $options);
   if($_SESSION["uname"] && $_SESSION['type_id']) 
	               {
					  $_SESSION["uname"]; 
					   $_SESSION["type_id"]; 
					   
	               }

?>
<head>
<link href="../css/style.css" type="stylesheet">
</head>
 <div class="reg">
    <form name="registration" method="POST" action="submit.php" >
    <h1> STAFF REGISTRATION FORM</h1><br><hr><br>
    <label>Created By :</label><input type="text" name="<?php echo $_SESSION["type_id"]; ?>" value="<?php echo $_SESSION["type_id"]; ?>" class="fld" disabled /><br><br>
    <input type="text" name="user_type" class="fld" placeholder="Teacher" disabled>
    

    <label>Name:</label><input type="text" name="name" class="fld"/><br><br>
    <label>Email:</label><input type="text" name="email" class="fld"/><br><br>
    <label>Gender:</label><br><input type="radio" name="gender" value="Male" class="rad"/>Male
                              <input type="radio" name="gender" value="Female" class="rad"/>Female<br><br>
    <label>DOB:</label><input type="date" name="dob" class="fld"/><br><br>
    <label>Date Of Joining:</label><input type="date" name="doj" class="fld"/><br><br>
    <label>Qualification:</label>
    <select name="qualification"class="fld">
      <option>select</option>
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
<textarea name="address" class="fld"></textarea>
<br><br>
<label>Phonenumber:</label><input type="text" name="phn" class="fld"/><br><br>
<label>Username:</label><input type="text" name="uname" class="fld"/><br><br>
<p> Password must contain: 6 characters, 1 capital, 1 lowercase, 1 number</p><br>
<label>password:</label><input type="text" name="pswd" class="fld"/><br><br>
<label>confirm-password:</label><input type="password" name="cpswd" class="fld"/><br><br>
<input type="submit" value="Submit" name="submit" class="btn"/>
</form>
<a href="registration.php"><input type="submit" value="Reset" name="reset" class="btn"/></a>
<a href='login.php'><input type="submit" value="Log In" name="login" class="btn"/></a>
<?php include "../footer.php";?>
