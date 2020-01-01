<?php
    /* Adding Values to database:Batch
	 * AUthor: Harilekshmi K
	 */
	 
    require "../config.php";
	include "../header.php";
	$connection = new PDO($dsn, $username, $password, $options);
//validation
      $batch_id=$_POST['batch_id'];
	   echo $bname=$_POST['batch_name'];
	   $start_date=$_POST['start_date'];
	   $end_date=$_POST['end_date'];
	   $course_id=$_POST['course_id'];
	   $division_id=$_POST['division_id'];
	   $id=$_POST['id'];
		//Insertion
		$flag=0; 
		try{	
			$sql="INSERT INTO `batch`(`batch_id`, `batch_name`, `start_date`, `end_date`, `course_id`, `division_id`, `id`) VALUES ('$batch_id','$bname','$start_date','$end_date','$course_id','$division_id','$id')";
			
			
			
			$connection->exec($sql);
			header( "Location: registration.php/" );
		}
	catch(PDOException $e)
    {
        echo $sel . "<br>" . $e->getMessage();
    }
	include "../footer.php";
?>