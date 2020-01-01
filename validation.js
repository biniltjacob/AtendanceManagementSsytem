
<script>
   function validate()
	 {
		 var type=document.forms["login"]["type_id"].value;
		 if(type=="")
		 {
			 alert("Enter a valid name");
			 document.forms["login"]["type_id"].focus();
			 return false;
		 }
		 var name=document.forms["login"]["user"].value;
		 if(name=="")
		 {
			 alert("Enter a valid name");
			 document.forms["login"]["user"].focus();
			 return false;
		 }
		 else if(!isNaN(name))
		 {
			 alert("Name can't be in digits");
			 document.forms["login"]["user"].focus();
			 return false;
		 }
</script>