 <!---
    * Forenoon section attendance Marking for students 
	* Author: Riya Joseph

--> <style>
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
		text-align:center;
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
	session_start();
	if($_SESSION["uname"] && $_SESSION['course']) 
	    {
		    echo"<h2> Welcome ".$_SESSION['uname']."</h2>"; 
		    echo"<h4> Batch ".$_SESSION['course']."</h4>"; 
	    }
		echo $course = $_SESSION['course'];
		echo $uname  = $_SESSION['uname'];
?>
		<center><a href="pop.php"><h5> click here to go back to</h5>
		<h3>Home </a></h3></center>
<?php 
	    $connection = new PDO($dsn, $username, $password, $options);
       //contains PDO connection script
	try
	{
		 $date=$_POST['date_x'];
		 $id= $_POST['id'];
		 $name= $_POST['name'];
		 $section= $_POST['section'];
		
		foreach($_POST['attendance'] as $key =>$val)
		{       
           $studentid = $key;
           $status = $val;
			$stmt = $connection->prepare("INSERT INTO `attendance` 
		   (`id`,`batch`, `status`,`tdate`,  `created_by`, `forenoon`)
			               VALUES(?,?,?,?,?,?)");
           $stmt->execute(array($key, $course, $section, $date, $uname, $status));
		}
	
		    $sql="Select * from attendance where batch='$course' and tdate='$date'";
			$statement = $connection->prepare($sql);
            $statement->execute();
            $result = $statement->fetchAll();
			if ($result && $statement->rowCount() > 0)
		{
?>
		<center>
           
	   <table border="2px">
            <thead>
			<tr>
			<th colspan="6">			</th>
			</tr>
			        <!---Details from pop form   --> 
			<tr>
			<th colspan="2"> Course: <?php echo $course; ?></th>
			<th> Trainer: <?php echo $uname; ?> <!---user name--></th>
			<th colspan="2"> Date: <?php echo $date; ?>     <!---date-->
			</th>
			<th> Time: <?php echo  $section; ?>    <!---time-->
			</th>
			</tr>
			        <!---table details/fields-->
            <tr>
                    <th>ID</th>
                   <!-- <th>Name</th> -->
                    <th>Attendence Status</th>
                    <th>Forenoon</th>
                    <th>Afternoon</th>
                    <th>Created by</th>
                    <th>Created at</th>
            </tr>			
            </thead>	
            <tbody>
<?php	   
            foreach ($result as $row) 
			{ 
?>
            <tr>
            <td><?php echo ($row["id"]); ?></td>
            <td><?php echo ($row["status"]); ?></td>
            <td><?php echo ($row["forenoon"]); ?></td>
            <td><?php echo ($row["afternoon"]); ?></td>
            <td><?php echo ($row["created_by"]); ?></td>
            <td><?php echo ($row["created_at"]); ?></td>
            </tr>
<?php        } 
		}?>
		</table>	<center>
	<?php	
	}
		
	catch(PDOException $e)
    {
       echo $sql. "<br>" . $e->getMessage();
    }
	
	
       
?>