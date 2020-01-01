<!---
   * Leave Form
   * Author: Binil T Jacob
-->


<?php include "../header.php";
    require "../config.php";
	$connection = new PDO($dsn, $username, $password, $options);
	?>
<!DOCTYPE html>
<html>
<head>
<style>
</style>
</head>
<body >
<div class="reg">
<form method="post" action="submit_leave.php">
<h3>Leave Form</h3>
 <input type="text" name="name" Placeholder="Name" class="fld"><br><br>
 <select name="dpt"class="fld">
   <option>Department</option>
   <option value="jsd_t">JSD </option>
   <option value="ui_t">UI</option>
   <option value="fs_t">FS</option>
 </select>
 <br><br>

Date<input type="date" name="date_f" class="fld">To
    <input type="date" name="date_t" class="fld"><br><br>
	
 <select name="leave_type"class="fld">
   <option>Nature of leave</option>
   <option value="casual">Casual</option>
   <option value="compensatory">Compensatory</option>
   <option value="others">Others</option>
 </select>
 <br><br>

<textarea name="comment"  class="fld">Reason for leave</textarea><br>
<input type="submit" value="Submit" name="submit" class="btn"/>
</form><br><br>
</body>
</html>