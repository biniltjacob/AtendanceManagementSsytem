<!--
 /* Action page for Login
  * Dashboard will be chosen as per the type id
  * Author: Riya Joseph
  */
-->
<style>
h2, a{color:white;
}
</style>
<?php
    session_start();
	include "../header.php";
    require "../config.php";
	$connection = new PDO($dsn, $username, $password, $options);

 //validation
    
    $uname   = $_POST['user'];
    $pass    = $_POST['pass'];
	$type_id = $_POST['type_id'];
	
	  // Redirecting the user based on type id
	if($type_id=="1")
	{
        $sel  = "Select * from admin_d where username='$uname' and password='$pass'";
	    $statement = $connection->prepare($sel);
        $statement->execute();
        $result = $statement->fetchAll();
			if ($result && $statement->rowCount() > 0)
		    {
			    foreach ($result as $row)
				{ ?><center><br>
				<?php echo "<h2> Welcome " .($row["name"]). "</h2>"; ?>
                  <?php ($row["email"]); ?>
                  <?php ($row["id"]); ?>
				 <div class="row">
	              <div class="col">
				     <a href="admin_dashboard.php"> <img src="../img/home.png"> Home </a>
				  </div>
				  <div class="col">
				     <a href="logout.php"> <img src="../img/off.png"> Log Out </a>
				  </div>
                 
                  </center>
				  
<?php		    }
                $_SESSION['uname'] = $uname;
                $_SESSION['type_id'] = $type_id;
               
			
			}
			else
			{ 
                header( "Location:login.php" );
                echo '<script language="javascript">';
                echo 'alert(Invalid Credentials)';  //not showing an alert box.
                echo '</script>';
			  	
			}	
	}
	
    else if($type_id=="2")
    {
	    $sel  = "Select * from users where username='$uname' and password='$pass'";
		$statement = $connection->prepare($sel);
        $statement->execute();
        $result = $statement->fetchAll();
		if ($result && $statement->rowCount() > 0)
		    {
			    foreach ($result as $row) 
				{ 
?>
                 <tr>
				 <td> <center>Trainer Management </td><br><br>
                 <td><?php echo "<h2> Welcome " .($row["name"]). "</h2>"; ?></td>
                 <td><?php ($row["email"]); ?></td>
                 <td><?php  ($row["id"]); ?></td>
				 <div class="row">
	             <div class="col">
				     <a href="trainer-dashboard.php"> <img src="../img/home.png"> Home </a>
				 </div>
				 <div class="col">
				     <a href="login.php"> <img src="../img/off.png"> Log Out </a>
				 </div></center>
<?php		}
            $_SESSION['uname'] = $uname;
			 $_SESSION['type_id'] = $type_id;
            
			
	    }
		else
		{ 
            header( "Location:login.php" );
            echo '<script language="javascript">';
            echo 'alert(Invalid Credentials)';  //not showing an alert box.
            echo '</script>';
			  	
		}
    }
    else if($type_id=="3"){
    $sel  = "Select * from admin where username='$uname' and password='$pass'";
			$statement = $connection->prepare($sel);
            $statement->execute();
            $result = $statement->fetchAll();
			if ($result && $statement->rowCount() > 0)
		    {
			    foreach ($result as $row) { 
?>
                <tr>
				<td> <center> Trainee Management </center> </td>
                <td><?php echo "<h2> Welcome " .($row["name"]). "</h2>"; ?></td>
                <td><?php ($row["email"]); ?></td>
                <td><?php  echo ($row["id"]); ?></td>
				<div class="row">
	            <div class="col">
				<a href="student_dashboard.php"> <img src="../img/home.png"> Home </a></div>
				<div class="col">
				<a href="logout.php"> <img src="../img/off.png"> Log Out </a></div>
<?php		}
            $_SESSION['uname'] = $uname;
            $_SESSION['type_id'] = $type_id;
			
			}
			else
			{ 
             header( "Location:login.php" );
             echo '<script language="javascript">';
             echo 'alert(Invalid Credentials)';  //not showing an alert box.
             echo '</script>';
			  	
			}	
	}
else if($type_id=="4"){
    $sel  = "Select * from users where username='$uname' and password='$pass'";
			$statement = $connection->prepare($sel);
            $statement->execute();
            $result = $statement->fetchAll();
			if ($result && $statement->rowCount() > 0)
		    {
			    foreach ($result as $row) { 
?>
                <tr>
				<td> <center>Parent Management </center></td>
                <td><?php echo "<h2> Welcome " .($row["name"]). "</h2>"; ?></td>
                <td><?php ($row["email"]); ?></td>
                <td><?php  echo ($row["id"]); ?></td>
				<div class="row">
	            <div class="col">
				<a href="parent_dashboard.php"> <img src="../img/home.png"> Home </a></div>
				<div class="col">
				<a href="logout.php"> <img src="../img/off.png"> Log Out </a></div>
<?php		}
            $_SESSION['uname'] = $uname;
            $_SESSION['type_id'] = $type_id;
			
		}
		else
		{ 
             header( "Location:login.php" );?>
            <script language="javascript">
             alert("Invalid Credentials");  //not showing an alert box.
            </script>
			  	
<?php		}	
	}
			
?>