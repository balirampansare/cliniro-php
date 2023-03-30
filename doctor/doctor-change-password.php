<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:doctorlogout.php');
  } else{
    

?>

<!DOCTYPE html>
<html lang="en">

<?php include('include/head.php');?>

<body>

<?php
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
if(isset($_POST['submit']))
{
$cpass=md5($_POST['cpass']);
$did=$_SESSION['id'];
$sql=mysqli_query($con,"SELECT password FROM  doctors where password='$cpass' && id='$did'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
$npass=md5($_POST['npass']);
$cfpass=md5($_POST['cfpass']);
   if( $npass != $cfpass){
    echo '<script type="text/javascript">
    swal({
      title:"Oops!",
      text: "New and Confirm didnt matched",
      icon: "error"
    }, function(){
          window.location.href = "doctor-change-password.php";
    });

       </script>';



   }

   else{
    $con=mysqli_query($con,"update doctors set password='$npass', updationDate='$currentTime' where id='$did'");
 echo '<script type="text/javascript">
 swal({
  title: "Password Changed Successfully!",
  text: "Redirecting in 2 seconds",
  type: "success",
  timer: 2000,
  showConfirmButton: false
}, function(){
      window.location.href = "doctor-change-password.php";
});
 

       </script>';
 //echo "<script>window.location.href ='doctor-change-password.php'</script>";

   }
 
 
}
else
{
  echo '<script type="text/javascript">
  swal({
    title:"Oops!",
    text: "Current Password didnt matched!",
    icon: "error"
  }, function(){
        window.location.href = "doctor-change-password.php";
  });
  </script>';
}
}
?>





<?php include('include/header.php');?>
<?php include('include/sidebar.php');?>

  
  <main class="main" id="main">
  

    <div class="pagetitle">
      <h1>Profile-Change Password</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active ">Profile</li>
          <li class="breadcrumb-item active ">Change Password</li>
        </ol>
      </nav>
    </div>

    <div class="section">
    <div class="d-flex flex-wrap text-center m-2 rounded" id="patient-nav">
  <a href="doctor-profile.php" class="p-2 flex-grow-1 border rounded m-2">Doctor Info</a>
  <a href="doctor-change-password.php" class="p-2 flex-grow-1 border rounded m-2 border-success border-2  fw-bold">Change Password</a>
  <!--a href="../patients/pages-patient-appointments.html" class="p-2 flex-grow-1 border rounded m-2">Appointments</a>
  <a href="../patients/pages-patient-billings.html" class="p-2 flex-grow-1 border rounded m-2">Billings</a-->
</div>


<div class="row" >
    <!-- quote -->

    <?php 
$did=$_SESSION['dlogin'];
$sql=mysqli_query($con,"select * from doctors where docEmail='$did'");
while($data=mysqli_fetch_array($sql))
{
?>


    <div class="col-md-4 col-lg-3">
      <div class="card">
        <img class="card-img-top" src="../assets/img/cardback.png" alt="Bologna">
        <div class="card-body text-center">
          <img class="avatar rounded-circle" src="../assets/img/messages-3.jpg" alt="patientpic">

          <div>
          <h4 class="card-title"><?php echo htmlentities($data['doctorName']);?></h4>
          <span>
              <?php $query=mysqli_query($con,"select specilization from doctors where id='".$_SESSION['id']."'");
            while($row=mysqli_fetch_array($query))
            {
	            echo $row['specilization'];
            }?> Specialist
              </span>

          </div>
          
          <!--h6 class="card-subtitle mb-2 text-muted">Famous Actor</h6>
          <p class="card-text">Robert John Downey Jr.'career has included critical and popular success in his youth, followed by a period of substance abuse and legal difficulties, and a resurgence of commercial success in middle age. </p>
          <a href="#" class="btn btn-info">Follow</a>
          <a href="#" class="btn btn-outline-info">Message</a-->

          <div class="d-flex justify-content-between flex-wrap" id="form-subhead">
            <div class="px-2"> <b>Contact:</b><?php echo htmlentities($data['contactno']);?></div>
            <div class="px-2"> <b>Email:</b> <?php echo htmlentities($data['docEmail']);?></div>
            <div class="px-2"> <b>Fees:</b> <?php echo htmlentities($data['docFees']);?></div>
          </div>

         

        </div>
      </div>
      <?php } ?>

      
   </div><!-- End quote -->

   <!-- patient form  -->
   <div class="col-md-8 col-lg-9">
    <div class="container rounded" id="patients-patients-cont">
      <form role="form" name="submit" method="post">
        <div class="row jumbotron box8 rounded py-2">
          <p style="color:red;"><?php echo htmlentities($_SESSION['msg1']);?></p>	
          <div class="form-group">
            <label for="exampleInputEmail1">Current Password</label>
            <input type="password" name="cpass" class="form-control"  placeholder="Enter Current Password" required>
          </div>
          <div class="form-group">
            <label for="npass">New Password</label>
            <input type="password" name="npass" class="form-control" title="min length: 8 with atleast one 0-9,a-z,A-Z,spl char" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$"  id="npass" placeholder="New Password" required>
          </div>
          <div class="form-group">
            <label for="cfpass">Confirm Password</label>
            <input type="password" name="cfpass" class="form-control" id="cfpass"  placeholder="Confirm Password" required>
          </div>
          <div class="col-sm-12 form-group mt-3">
            <button type="submit" name="submit" class="btn btn-outline-success mt-2 float-end">Change Password</button>
          </div>								
        </div> 
       </form>
      </div>
    </div><!-- End patient form-->
   </div>
    </div>
  </main>

  <?php include('include/footer.php');?>

</body>

</html>

<?php } ?>

