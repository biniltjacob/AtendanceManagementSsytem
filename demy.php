<?php

    /* Adding Values to database:Batch
	 * AUthor: Harilekshmi K
	 */

    require "../config.php";
    include "../header.php";
	$connection = new PDO($dsn, $username, $password, $options);
	session_start();
	$bname=$_POST['batch_name'];
    $sel  = "Select * from users where course='$bname'";
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
                    
                </tr>
            </thead>
            <tbody>
<?php	   foreach ($result as $row) { 
?>
                <tr>
					<td><?php echo ($row["id"]); ?></td>
					<td><?php echo ($row["name"]); ?></td>
					<td><?php echo ($row["gender"]); ?></td>
					<td><?php echo ($row["email"]); ?></td>
					<td><?php  echo ($row["mobile"]); ?></td>
					<td><?php  echo ($row["doj"]); ?></td>
					<td><?php  echo ($row["type_id"]); ?></td>

                <td><a href='edit.php?id=id=<?=$row["id"]?>'>Edit</a> | 
   <a href='delete.php?id=id=<?=$row["id"]?>'>Delete</a></td>
</tr>
 
        <?php } ?>
        </tbody>

    </table>
<?php
}
?>