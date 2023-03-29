<?php 
require_once("include/config.php");
if(!empty($_POST["username"])) {
	$email= $_POST["username"];
	
		$result =mysqli_query($con,"SELECT recep_username FROM receptionist WHERE recep_username='$email'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> username already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> username available for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>
