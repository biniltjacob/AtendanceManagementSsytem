<?php include "../header.php";
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
          <center>  <img src="../img/f.png" class="prfl">
			<?php 
                if($_SESSION["uname"]) 
	               {
					   echo"<h4>" .$_SESSION["uname"]."</h4>"; 
	               }
		    ?></center>
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
	    <p><img src="../img/at.png"></p>
		<?php $num = $connection->query("select count(id) from  users")->fetchColumn();
			  echo "<h2> ".$num. "+</h2>";
			  echo "<h5>attendance</h5>";
		?>
		
	 </div>
	</div>
    </section>
</section>