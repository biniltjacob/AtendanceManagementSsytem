<?php
   /* Search option for students by Batchwise List
    * Author: Harilekshmi K
    */
    require "../config.php";
	include "../header.php";
	?>

<!---------DIV------>
	<center>
	
	   <div class="reg" >
	     <form action="demy.php" method="post"  ><br><br>
		 <h2>Student Batch</h2>
		  <select name="batch_name" class="fld">
           <option>select batch:</option>
           <option value="jsd">JSD</option>
           <option value="ui">UI</option>
           <option value="ed">ED</option>
           <option value="fs">FS</option>
		 </select><br>
		  <input type="submit" value="Refresh" class="btn">
		  <input type="submit" name="submit" value="Search" class="btn"><br></form>
		  <a  href="batch.php"><input type="submit" name="add" value="Add" class="btn"></a><br>
		  
	
		 
	   </div>
	   </div>
	</center>

<?php include "../footer.php";?>