<!--
  * Contact Us page
  * Author: Rakhi Dayanandan
-->
<?php include "../header.php"; ?>

<center>
	
	   <div class="reg" >
	     <form action="message.php" method="post"  ><br><br>
		 <h2>Get in Touch</h2>
		  <input type="text" name="user" placeholder="Name" class="fld"><br><br>
		  <input type="text" name="email" Placeholder="Enter email" class="fld"><br><br>
		  <input type="text" name="regardings" Placeholder="Regardings" class="fld"><br><br>
		  <textarea name="Meaasge" Placeholder="Meaasge" class="fld"></textarea><br><br>
		  <input type="submit" value="Reset" class="btn">
		  <input type="submit" value="Submit" class="btn"><br>
		 </form>
	   </div>
	</center>
<?php include "../footer.php";?>
