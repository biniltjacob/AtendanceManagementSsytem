<!--
 * Parent Registration Form
 * Author : Harilekshmi K, Jitty John
 *
 --->


<?php include "../header.php";?>
<div class="reg">
<form name="registration" method="POST" action="submit1.php" >
<h1> PARENT REGISTRATION FORM</h1><br><hr><br>
<label>Name:</label><input type="text" name="name" class="fld"/><br><br>
<label>Email:</label><input type="text" name="email" class="fld"/><br><br>
<label>Gender:</label><br><input type="radio" name="gender" value="Male" class="rad"/>Male
             <input type="radio" name="gender" value="Female" class="rad"/>Female<br><br>
<label>Student id:</label><input type="text" name="studentid" class="fld"/><br><br>
<label>Relation:</label>
<select name="relation"class="fld">
<option>select</option>
<option value="cse">Father</option>
<option value="ece">Mother</option>
 <option value="eee">siblings</option>
<option value="bca">Guardian</option>
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
<a href="parent.php"><input type="submit" value="Reset" name="reset" class="btn"/></a>
<a href='login.php'><input type="submit" value="Log In" name="login" class="btn"/></a>
<?php include "../footer.php";?>
