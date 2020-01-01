<?php
   /** Select batch and date for
    * marking attendance
	* Author: Riya Joseph
  **/
    require "../config.php";
	include "../header.php";
	$connection = new PDO($dsn, $username, $password, $options);
	session_start();
    if($_SESSION["uname"]&& $_SESSION['type_id']) 
	               {
					   echo"<h2> User ". $_SESSION["uname"]; 
	                }
	$uname=$_SESSION["uname"];
	$sel  = "Select * from admin_d where username='$uname'";
			$statement = $connection->prepare($sel);
            $statement->execute();
            $result = $statement->fetchAll();
			if ($result && $statement->rowCount() > 0)
		    {
			    foreach ($result as $row) { ?>
				<tr>
                <td><?php $uname; ?></td>
				</tr>
				<?php
				}
			}
			//$name=$row["name"]?>
<body>
        <div class="log">
		<br>
       <center> <form action="attendance.php" onSubmit="return copyForm()"method="post">
		 
		 <select name="course" class="fld" required>
           <option>select course:</option>
           <option value="jsd1">JSD 1</option>
           <option value="jsd2">JSD 2</option>
           <option value="ui">UI</option>
           <option value="ed">ED</option>
           <option value="fs">FS</option>
		 </select><br>
		 <input type="date" class="fld" name="date_a"required><br>
		 <select name="time_a"class="fld" value="Section"required>
		   <option value="Forenoon">Forenoon</option>
		   <option value="Afternoon">Afternoon</option>
		  </select><br>
		 <input type="text" class="fld" value="<?php echo $uname; ?>" name="<?php $row['uname']; ?>" disabled ><br>
		 <input type="submit" name="attendance" value="Mark Attendance" class="btn" >
		 
		 </form>
		<a href="student_list.php"><input type="submit" name="submit" value="Student List" class="btn">
		</a>
	</center>
        </div>
</body>
</html>
