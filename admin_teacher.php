 <!--
   /*  Showing trainers list for admin
    *  Author: Riya Joseph 
	*
	*/
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
    if($_SESSION["uname"]&& $_SESSION['type_id']) 
	               {
					   echo"<h2> User:". $_SESSION["uname"]; 
	                }
	$uname=$_SESSION["uname"];
	$sel  = "Select * from users where type_id='2'";
			$statement = $connection->prepare($sel);
            $statement->execute();
            $result = $statement->fetchAll();
			if ($result && $statement->rowCount() > 0)
		    {
	?>
	<center>
	<table  border="2px">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Email Address</th>
                    <th>Mobile</th>
                    <th>DOJ</th>
                    <th>Type Id </th>
                    <th>Ops</th>
                    
                </tr>
            </thead>
            <tbody>
<?php	    foreach ($result as $row) { 
?>
                <tr>
                <td><?php echo ($row["id"]); ?></td>
                <td><?php echo ($row["name"]); ?></td>
                <td><?php echo ($row["gender"]); ?></td>
                <td><?php echo ($row["email"]); ?></td>
                <td><?php  echo ($row["mobile"]); ?></td>
                <td><?php  echo ($row["doj"]); ?></td>
                <td><?php  echo ($row["type_id"]); ?></td>
				
                <td><a href='teacher_edit.php?id=<?=$row["id"]?>'>Edit</a> | 
				    <a href='teacher_delete.php?id=<?=$row["id"]?>'>Delete</a></td>
				
			</tr>
			         <?php } ?>
        </tbody>
		
    </table>
	<?php
	}
    ?>
<button class="btn"><td><a href='trainer_pop.php?id=<?=$row["id"]?>'>Mark Attendance</a></button> 
 
<p><a href="admin_dashboard.php"> Back to Home </a></p>