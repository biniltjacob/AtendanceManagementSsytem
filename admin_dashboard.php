<?php 
    /* Dashboard for Admin
	 * Features: Trainer, Student, Parent Visibility, Add, Delete, Update Options
	             Leave Requests, Count for Absentee
	 * Authors: Kripa John, Riya Joseph
	 *
	 */


      include "../header.php";
      require "../config.php";
	  session_start();
	
	$connection = new PDO($dsn, $username, $password, $options);
?>

<!--sidebar start-->
<link href="css/style.css" rel="stylesheet" type="text/css">
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation" tabindex="5000" style="overflow: hidden; outline: none;">
         <center>   <img src="../img/f.png" class="prfl">
			<?php 
                if($_SESSION["uname"] && $_SESSION['type_id']) 
	               {
					   echo"<center><h4>" .$_SESSION["uname"]."</h4></center>"; 
					   
	               }
		    ?>
			</center>
			<ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="index.html">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="sub-menu dcjq-parent-li">
                    <a href="student_list.php"  class="dcjq-parent">
                        
                        <span>Student Managemnet</span></a>
                    
                </li>
                
                <li class="sub-menu dcjq-parent-li">
                     
					<a href="admin_teacher.php"  class="dcjq-parent">
                        <span>Staff Managemnet</span></a>
                </li>
                <li class="sub-menu dcjq-parent-li">
                    <a href="parent_list.php"class="dcjq-parent">
                        <span>Parent Management</span>
                    </a>
                </li>
                <li class="sub-menu dcjq-parent-li">
                    <a href="attendance.php" class="dcjq-parent">
                        
                        <span>Attendance Managemnet </span>
                    </a>
                    
                </li>
                
                <li>
                    <a href="logout.php">
                        
                        <span>Logout Page</span>
                    </a>
                </li>
            </ul>            </div>
        <!-- sidebar menu end-->
</aside>		
		
		
		<!--main content start-->
<section id="main-content">
	
	<div class="row">
	<div class="col">
	<p><a href="admin_teacher.php"><img src="../img/teacher.png"></a></p>
		<?php $num = $connection->query("select count(id) from  users where type_id='2'")->fetchColumn();
			  echo "<h2> ".$num. "+</h2>";
			  echo "<h5>Trainers</h5>";?>
	</div>
	
	<div class="col">
	<p><a href="student_list_ad.php"><img src="../img/total_users.png"></a></p>
		<?php $num = $connection->query("select count(id) from  users where type_id='3'")->fetchColumn();
			  echo "<h2> ".$num. "+</h2>";
			  echo "<h5>Students</h5>";?>
	</div>
	
    <div class="col">
	<p><a href="parent_list.php"><img src="../img/parent.png"></a></p>
		<?php $num = $connection->query("select count(id) from  users where type_id='4'")->fetchColumn();
			  echo "<h2> ".$num. "+</h2>";
			  echo "<h5>Parents</h5>";?>
	</div>
	
	<div class="col">
		   <p><a href="leave_status_admin.php"><img src="../img/msgs.ico"></a></p>
		<?php $num = $connection->query("select count(leave_id) from  leave_request")->fetchColumn();
			  echo "<h2> ".$num. "+</h2>";
			  echo "<h5>messages</h5>";
		?>
	 </div>
	 <div class="col">
	    
		<p><img src="../img/task.png"></p>
		<?php $num = $connection->query("select count(id) from  users")->fetchColumn();
			  echo "<h2> ".$num. "+</h2>";
			  echo "<h5>tasks</h5>";
		?>
	 </div>
	 </div>
	 <div class="row">
	 <div class="col">
		<p><a href="teacher_registration.php"><img src="../img/add.png"></a></p>
		<?php echo "<center><h2> Add</h2><h5>new Trainer</h5></center>";	 ?>
	 </div>
	 <div class="col">
		<p><a href="student_registration.php"><img src="../img/student.png"></a></p>
		<?php echo "<center><h2> Add</h2><h5>new Student</h5></center>";	 ?>
	 </div>
	 <div class="col">
		<p><a href="parent.php"><img src="../img/parent_add.png"></a></p>
		<?php echo "<center><h2> Add</h2><h5>new Parent</h5></center>";	 ?>
	 </div>
	 <div class="col">
		<p><a href="batch.php"><img src="../img/b.png"></a></p>
		<?php echo "<center><h2> Add</h2><h5>new batch</h5></center>";	 ?>
	 </div>
	</div>
    </section>
</section>
<!--<marquee direction="right"> <img src="../img/santa.gif"></marquee>-->
<?php 
    include "../footer.php";
	?>