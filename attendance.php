<!--
  * Attendance Marking Home Page
  * Author: Riya Joseph
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
	$connection = new PDO($dsn, $username, $password, $options);
	session_start();
    if($_SESSION["uname"]) 
	               {
					echo"<h4 style='margin:10px;margin-left:40px;'> user: ". $_SESSION["uname"]."</h4>"; 
	                }
			 
			 $course=$_POST['course'];
			 $date_a=$_POST['date_a'];
			 $section=$_POST['time_a'];
			 $_SESSION['course']=$course;
			//Forenoon Section
    if($section=="Forenoon")
	{	
			//Selecting students 
        $sel= "Select * from users where type_id='3' and course='$course'";
			$statement = $connection->prepare($sel);
            $statement->execute();
            $result = $statement->fetchAll();
			if ($result && $statement->rowCount() > 0)
		    {
?>
          <h2>Results</h2>
          <center>
		    <a href="admin_dashboard.php"><h5> click here to go back to</h5>
		    <h3>Home </a></h3>
		  </center>
           
	   <table border="2px">
            <thead>
			<tr>
			<th colspan="6">
			  <!--<input type="text" name="search" class="fld" >
			  <input type="submit" name="submit" value="Search" class="btn">-->
			</th>
			</tr>
			        <!---Details from pop form   -->
			<form action="attendance_mark.php"  method="post">  
			<tr>
			<th> Course: <?php echo $course; ?></th>
			
			<th> Trainer: <?php echo $_SESSION["uname"]; ?> <!---user name--></th>
			
			<th> Date: <?php echo $date_a; ?>     <!---date-->
			    <input type="hidden" name="date_x" value="<?php echo $date_a; ?>">
			</th>
			
			<th> Time: <?php echo  $section; ?>    <!---time-->
			     <input type="hidden" name="section" value="<?php echo $section; ?>">
			</th>
			</tr>
			
			        <!---table details/fields-->
            <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Mark Attendence</th>
            </tr>	
				
            </thead>
			
            <tbody>
<?php	   
            foreach ($result as $row) { 
?>
            <tr>
            <td><?php echo ($row["id"]); ?>
			    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
			</td>
            <td><?php echo ($row["name"]); ?>
			    <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
			</td>
            <td><?php echo ($row["gender"]); ?>
			    <input type="hidden" name="gender" value="<?php $row['gender']; ?>">
			</td>
				
		    <td>
		     Present<input required type="radio" name="attendance[<?php echo $row['id'] ?>]" value="Present" checked>
             Absent<input required type="radio" name="attendance[<?php echo $row['id']; ?>]" value="Absent">
            </td>
            </tr>
<?php   } 
?>
            <tr>
            <td colspan="6">
			  <a href="attendance_mark.php">
			    <input type="submit" name="attendanceData" value="Save" class="btn">
			  </a>
			</td>
            </tr>
        </tbody>
    </table>
	</form>
<?php } 
	}
  else if($section=="Afternoon")
	{
		$sel  = "Select * from users where type_id='3' and course='$course'";
		$statement = $connection->prepare($sel);
        $statement->execute();
        $result = $statement->fetchAll();
	    if ($result && $statement->rowCount() > 0)
		   {
?>
          <h2>Results</h2>
          <center><a href="dash.php"><h5> click here to go back to</h5>
		  <h3>Home </a></h3></center>
           
	   <table border="2px">
            <thead>
			<tr>
			<th colspan="6">
			  <!--<input type="text" name="search" class="fld" >
			  <input type="submit" name="submit" value="Search" class="btn">-->
			</th>
			</tr>
			        <!---Details from pop form   -->
			<form action="attendance_mark_an.php"  method="post">  
			<tr>
			<th> Course: <?php echo $course; ?>   <!---course/batch name
			     <input type="hidden" name="course" value="<?//php echo $course;?>">-->
			</th>
			<th> Trainer: <?php echo $_SESSION["uname"]; ?> <!---user name-->
			</th>
			<th> Date: <?php echo $date_a; ?>     <!---date-->
			    <input type="hidden" name="date_x" value="<?php echo $date_a; ?>">
			</th>
			<th> Time: <?php echo  $section; ?>    <!---time-->
			     <input type="hidden" name="section" value="<?php $section; ?>">
			</th>
			</tr>
			        <!---table details/fields-->
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Mark Attendence</th>
                </tr>	
            </thead>
            <tbody>
<?php	    foreach ($result as $row) { 
?>
            <tr>
		              <!---    -->
             <td><?php echo ($row["id"]); ?>
			      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
			  </td>
              <td><?php echo ($row["name"]); ?>
			      <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
			  </td>
              <td><?php echo ($row["gender"]); ?>
			      <input type="hidden" name="gender" value="gender[<?php $row['gender']; ?>]">
			  </td>
				
		      <td>
		     Present<input required type="radio" name="attendance[<?php echo $row['id'] ?>]" value="Present" checked>
             Absent<input required type="radio" name="attendance[<?php echo $row['id']; ?>]" value="Absent">
         </td>
        </tr>
          <?php } ?>
        <tr>
            <td colspan="6">
			<a href="attendance_mark_an.php"><input type="submit" name="attendanceData" value="Save" class="btn"></a></td>
        </tr>
        </tbody>
    </table>
	
    <?php }
	}
		
	
else { ?>
        <blockquote>No results found for <?php echo ($_POST['location']); ?></blockquote>
         
   </form> 
     <?php } 
 require "../footer.php" ?>