<?php
/** Leave request database action
  *  Author: Binil T jacob
  */
   foreach($_POST['leave'] as $key =>$val)
		{       
           echo  $studentid = $key;
           echo  $status = $val;
			$stmt = $connection->prepare("INSERT INTO `attendance` 
		   (`id`,`batch`, `status`,`tdate`,  `created_by`, `forenoon`)
			               VALUES(?,?,?,?,?,?)");
           $stmt->execute(array($key, $course, $section, $date, $uname, $status));
		}
	
	
?>