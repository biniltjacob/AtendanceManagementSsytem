<?php 
/* form for adding new batch 
 * Author: Harilekshmi K
 *
 */
   require "../config.php";
   include "../header.php";
   session_start();
   $connection = new PDO($dsn, $username, $password, $options);
?>
<head>
<link href="../css/style.css" type="stylesheet">
</head>
<div class="reg">
<form name="batch" method="POST" action="demy1.php" >
<label>Batch name</label>
<select name="batch_name" class="fld">
           <option>select batch:</option>
           <option value="jsd">JSD</option>
           <option value="ui">UI</option>
           <option value="ed">ED</option>
           <option value="fs">FS</option>
		 </select><br>
<label>start date</label><input type="date" name="start_date" class="fld"/><br><br>
<label>end date</label><input type="date" name="end_date" class="fld"><br><br>
<label>course_id</label><input type="text" name="course_id" class="fld"/><br><br>
<label>division_id</label><input type="text" name="division_id" class="fld"/><br><br>
<label>id</label><input type="text" name="id" class="fld"/><br><br>
<input type="submit" value="Submit" name="submit" class="btn"/>
</form>
<a href="batch.php"><input type="submit" value="Reset" name="reset" class="btn"/></a>
<a href='demy1.php'><input type="submit" value="add" name="add" class="btn"/></a>

<?php include "../footer.php";?>
