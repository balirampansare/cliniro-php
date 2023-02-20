<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:doctorlogout.php');
  } else{
    if (isset($_GET['noteid'])) {

        $Noteid = $_GET['noteid'];
    
        $query=mysqli_query($con, "delete from notes where Noteid='$Noteid' ");
    if ($query) {
    
    echo "<script>window.location.href ='notes.php'</script>";
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
    
    } 
  


}?>