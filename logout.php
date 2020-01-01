<?php
  /* Logout
   * Author: Riya Joseph
   */ 
    session_start();
    require "../config.php";
	include "../header.php";
	$connection = new PDO($dsn, $username, $password, $options);
	
	
	session_destroy();
	?>
	<script>
      alert('Your Session has expired for inactivity. Please log in again');
	  <?php header( "Location:login.php" );?>
     </script>
<?php

unset($_SESSION['type_id']);
unset($_SESSION['uname']);
?>