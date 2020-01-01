<?php
 /* Student Registration Page
  * Author: Abhijith M Shaji
  *
  */
include "../header.php";
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "attendence_system";

// connect to mysql database

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// mysql select query
$query = "SELECT course_name FROM `course`";

// for method 1

$result1 = mysqli_query($connect, $query);

// for method 2





?>

<script>
function validate()
{
var name=document.registration.name.value;
var email=document.registration.email.value;
   var atposition=email.indexOf("@");
   var dotposition=email.lastIndexOf(".");
var genderM=document.registration.gender.value;
var genderF=document.registration.gender.value;
var dob=document.registration.dob.value;
var doj=document.registration.doj.value;
var qualification=document.registration.qualification.value;
var address=document.registration.address.value;
var phonenum=document.registration.phn.value;
var uname=document.registration.uname.value;
var password=document.registration.pswd.value;
var password2=document.registration.cpswd.value;



if(name==""||name==null)
{
alert("name can't be blank");
document.registration.name.focus();
return false;
}
else if(atposition<1||dotposition<atposition+2||dotposition+2>=email.length)
{
alert("Please enter a valid email id");
return false;
}
else if(genderM.checked==false && genderF.checked==false )
{
 alert("You must select male or female");
 return false;
    }
else if(dob=="")
{
alert("You must choose date");
 return false;
}
else if(doj=="")
{
alert("You must choose date");
 return false;
}
else if(qualification.selectedIndex<1)                  
{
alert("Please enter your course.");
document.registration.qualification.focus();
return false;
}
else if(address==""||address==null)
{
alert("address can't be blank");
document.registration.address.focus();
return false;
}
else if(phonenum.length<10){
alert("phonenum must be 10 values");
return false;
}
if(uname==""||uname==null)
{
alert("username can't be blank");
document.registration.uname.focus();
return false;
}
else if(password.length<6){
alert("password must be 6");
document.registration.pswd.focus();
return false;
}
else if(password!=password2){
alert("password must be same");
return false;
}
else{
alert("successfull");
return true;
}
}
</script>

<head>
<link href="../css/style.css" type="stylesheet">
</head>
<div class="reg">
<form name="registration" method="POST"onsubmit=" return validate()" action="submit_st.php" >
<h1> STUDENT REGISTRATION FORM</h1><br><hr><br>
<label>Name:</label><input type="text" name="name" class="fld"/><br><br>
<label>Email:</label><input type="text" name="email" class="fld"/><br><br>
<label>Gender:</label><br><input type="radio" name="gender" value="Male" class="rad" checked/>Male
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
<label>Course:</label>
<select name="course" class="fld">

            <?php while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[0];?>"><?php echo $row1[0];?></option>

            <?php endwhile;?>

 </select>

</select><br><br>
<h2>PERSONAL DETAILS</h2><hr><br><br>
<label>Address</label>
<textarea name="address" class="fld"></textarea>
<br><br>
<label>Phonenumber:</label><input type="text" name="phn" class="fld"/><br><br>
<label>Username:</label><input type="text" name="uname" class="fld"/><br><br>
<p> Password must contain: 6 characters,1 capital,1 lowercase,1 number</p><br>
<label>password:</label><input type="password" name="pswd" class="fld"/><br><br>
<label>confirm-password:</label><input type="password" name="cpswd" class="fld"/><br><br>
<input type="submit" value="Submit" name="submit" class="btn"/>
</form>
<a href="registration.php"><input type="submit" value="Reset" name="reset" class="btn"/></a>
<?php include "../footer.php";?>
