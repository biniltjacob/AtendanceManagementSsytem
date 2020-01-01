<?php
    require "../config.php";
	include "../header.php";
	$connection = new PDO($dsn, $username, $password, $options);
	session_start();
    if($_SESSION["uname"]) 
	               {
					echo"<h4 style='margin:10px;margin-left:40px;'> user: ". $_SESSION["uname"]."</h4>"; 
	                }
	
    $sel  = "Select * from users where type_id='3'";
			$statement = $connection->prepare($sel);
            $statement->execute();
            $result = $statement->fetchAll();
			if ($result && $statement->rowCount() > 0)
		    {
			?>
          <h2>Results</h2>
         <center><a href="dashboard.php"><h5> click here to go back to</h5><h3>Home </a></h3></center>
        <table border="2px">
            <thead>
			<tr>
			<td colspan="7">
			  <input type="text" name="search" class="fld"  onkeyup="showHint(this.value)">
			  <input type="submit" name="submit" value="Search" class="btn">
			</td>
			</tr>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Email Address</th>
                    <th>Mobile</th>
                    <th>DOJ</th>
                    <th>Batch</th>
                    
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
                <td><?php  echo ($row["course"]); ?></td>
			</tr>
			  
        <?php } ?>
        </tbody>
		
    </table>
	
    <?php } else { ?>
        <blockquote>No results found for <?php echo escape($_POST['location']); ?>.</blockquote>
    <?php } 
 require "../footer.php" ?>