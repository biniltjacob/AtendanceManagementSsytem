<!--
 * Leave Request from student to Trainer
 * Author: Riya Joseph, Harilekshmi K
 *
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
 




<?php include "../header.php";
      require "../config.php";
	  session_start();
	
	$connection = new PDO($dsn, $username, $password, $options);
	
?>
<?php
$sel  = "Select * from leave_request where type_id='3'";
			$statement = $connection->prepare($sel);
            $statement->execute();
            $result = $statement->fetchAll();
			if ($result && $statement->rowCount() > 0)
		    {
			?>
          <h2>Results</h2>
         <center><a href="leave_reply.php"><h5> click here to go back to</h5><h3>Home </a></h3></center>
		 <form action="" method="">
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
                    <th>Batch</th>
                    <th>Leave From</th>
                    <th>Leave To</th>
                    <th>Reason</th>
                    <th>Status</th>
                    
                </tr>
            </thead>
            <tbody>
<?php	    foreach ($result as $row) { 
?>
                <tr>
                <td><?php echo ($row["leave_id"]); ?></td>
                <td><?php echo ($row["name"]); ?></td>
                <td><?php echo ($row["department"]); ?></td>
                <td><?php echo ($row["date_f"]); ?></td>
                <td><?php  echo ($row["date_t"]); ?></td>
                <td><?php  echo ($row["reson"]); ?></td>
                <td>
		     Accept<input required type="radio" name="leave[<?php echo $row['leave_id'] ?>]" value="Accepted" >
             Reject<input required type="radio" name="leave[<?php echo $row['leave_id']; ?>]" value="Rejected">
         </td>
			</tr>
			  
        <?php } ?>
        </tbody>
		
    </table>
	</form>
	
    <?php }?>