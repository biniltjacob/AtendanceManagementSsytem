 <!---
    * Attendance Status of Students visible to Trainers
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
    if($_SESSION["uname"] && $_SESSION["type_id"] ) 
	               {
					echo"<h4> user: ". $_SESSION["uname"]."</h4>"; 
					echo"<h4> ID: ". $_SESSION["type_id"]."</h4>"; 
	                }
	//
	 $sel= "SELECT * FROM `attendance` WHERE status='present'";
			$statement = $connection->prepare($sel);
            $statement->execute();
            $result = $statement->fetchAll();
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
			<!--<th> Course: <?php // echo $course; ?></th>-->
			
			<th> Trainer: <?php echo $_SESSION["uname"]; ?> <!---user name--></th>
			<th> Present: <?php  $num = $connection->query("SELECT count(*) FROM `attendance` WHERE status='present'")->fetchColumn();
			  echo $num;?> </th>
			<th> Absent: <?php  $numa = $connection->query("SELECT count(*) FROM `attendance` WHERE status='absent'")->fetchColumn();
			  echo $numa;?> </th>
			  
			
			</tr>
			
			        <!---table details/fields-->
            <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Batch</th>
                    <th>Attendence Status</th>
            </tr>	
				
            </thead>
			
            <tbody>
<?php	   
            foreach ($result as $row) { 
?>
            <tr>
            <td><?php echo ($row["id"]); ?>
			   </td>
            <td><?php echo ($row["tdate"]); ?>
			   </td>
            <td><?php echo ($row["batch"]); ?>
			   		</td>
			  <td><?php echo ($row["status"]); ?>
			   </td>
				
            </tr>
<?php   } 
?>
            <tr>
            <td colspan="6">
			  <a href="trainer-dashboard.php">
			    <input type="submit" name="Home" value="Home" class="btn">
			  </a>
			</td>
            </tr>
        </tbody>
    </table>
	</form>

			 