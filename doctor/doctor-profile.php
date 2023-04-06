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

<!--script>
  const uid = sessionStorage.getItem("uid")

  if (uid == null){
    window.location.href = "pages-login.html"
  }
</script-->

<script>
function checkemailAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#docemail").val(),
type: "POST",
success:function(data){
$("#email-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

<body>

<?php 

if(isset($_POST['submit']))
{

$docname=$_POST['docname'];
$docgender=$_POST['docgender'];
$docage=$_POST['docage'];
$docdob=$_POST['docdob'];
$docspecialization=$_POST['Doctorspecialization'];
$doccontactno=$_POST['doccontact'];
$docemail=$_POST['docemail'];
$clinicname=$_POST['clinicname'];
$cliniccontact=$_POST['cliniccontact'];
$cliniclocality=$_POST['cliniclocality'];
$cliniccity=$_POST['cliniccity'];
$docfees=$_POST['docfees'];
$docaddress=$_POST['clinicaddress'];
$clinictiming=$_POST['clinictiming'];
$closed=$_POST['closed'];

$sql=mysqli_query($con,"Update doctors set specilization='$docspecialization',doctorName='$docname',address='$docaddress',docFees='$docfees',contactno='$doccontactno',docEmail='$docemail',gender='$docgender',age='$docage',dob='$docdob',clinic_name='$clinicname',clinic_contact='$cliniccontact',clinic_timing='$clinictiming',closed='$closed',clinic_locality='$cliniclocality',clinic_city='$cliniccity' where id='".$_SESSION['id']."'");

if($sql)
{
  echo '<script type="text/javascript">
  swal({
    title:"Hurray!",
    text: "Details Updated Successfully",
    icon: "success"
  }, function(){
        window.location.href = "doctor-profile.php";
  });

     </script>';

}
}
?>

<?php include('include/header.php');?>
<?php include('include/sidebar.php');?>

  <main class="main" id="main">
    <div class="pagetitle">
      <h1>Profile-Details</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item">Profile</li>
          <li class="breadcrumb-item active">Info</li>
        </ol>
      </nav>
    </div>
  
                    <section class="section">

<div class="d-flex flex-wrap text-center m-2 rounded" id="patient-nav">
  <a href="doctor-profile.php" class="p-2 flex-grow-1 border rounded m-2 border-success border-2  fw-bold">Doctor Info</a>
  <a href="doctor-change-password.php" class="p-2 flex-grow-1 border rounded m-2">Change Password</a>
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
          <img class="avatar rounded-circle" src="assets/img/cliniro logo.png" alt="patientpic">

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

          <div class="text-center">
            <hr>
            Profile
          </div>
            <div class="d-flex justify-content-between flex-wrap" id="form-subhead">
                <div class="px-2"> <b>Registerd:</b><?php echo htmlentities($data['creationDate']);?></div>
                <div class="px-2">
                <?php if($data['updationDate']){?>
                    <b>Updated:</b> <?php echo htmlentities($data['updationDate']);?>
                <?php } ?>  
            </div>
          </div>

        </div>
      </div>

      
   </div><!-- End quote -->

   <!-- patient form  -->
   <div class="col-md-8 col-lg-9">
    <div class="container rounded" id="patients-patients-cont">
    <form role="form" name="adddoc" method="post" onSubmit="return valid();">
                          <div class="row jumbotron box8 rounded py-2">
                            <!--div class="col-sm-12 mx-t3">
                              <h2 class="text-center text-info">Register</h2>
                            </div-->

                            <div class="d-flex">
                              <div class="p-1 fw-bold" id="form-subhead">Personal</div>
                            </div>
                            <div class=" mt-0"><hr></div>

                            <!--div class="col-sm-12 mt-3 fw-bold" id="form-subhead">
                                Personal <hr class="mt-0">

                            </div-->
                            <div class="col-sm-5 form-group">
                            <label for="doctorname">Doctor Name</label>
                      <input type="text" name="docname" class="form-control" value="<?php echo htmlentities($data['doctorName']);?>" >
                            </div>
                            <div class="col-sm-2 form-group">
                                <label for="sex">Gender</label>
                                <select id="sex" name="docgender" class="form-control browser-default custom-select">
                                <option value="<?php echo htmlentities($data['gender']);?>">
					<?php echo htmlentities($data['gender']);?></option>
                                  <option value="male">Male</option>
                                  <option value="female">Female</option>
                                  <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="col-sm-2 form-group">
                                <label for="docage">Age</label>
                                <input type="number" class="form-control" name="docage" value="<?php echo htmlentities($data['age']);?>">
                            </div>

                            <div class="col-sm-3 form-group mt-1">
                                <label for="Date">Date Of Birth</label>
                                <input type="Date" name="docdob" class="form-control" value="<?php echo htmlentities($data['dob']);?>">
                            </div>


                            <div class="col-sm-5 form-group">
															<label for="DoctorSpecialization">
																Doctor Specialization
															</label>
							                <select name="Doctorspecialization" class="form-control" required="required">
					<option value="<?php echo htmlentities($data['specilization']);?>">
					<?php echo htmlentities($data['specilization']);?></option>
<?php $ret=mysqli_query($con,"select * from doctorspecilization");
while($row=mysqli_fetch_array($ret))
{
?>
																<option value="<?php echo htmlentities($row['specilization']);?>">
																	<?php echo htmlentities($row['specilization']);?>
																</option>
																<?php } ?>
																
															</select>
														</div>

                            <div class="col-sm-3 form-group">
                              <label for="phone">Dr. Phone</label>
                              <input type="text" class="form-control" name="doccontact" title="format 10 digits" pattern="[1-9]{1}[0-9]{9}" value="<?php echo htmlentities($data['contactno']);?>" required>
                            </div>
                            <div class="col-sm-4 form-group">
                              <!--label for="email">Dr. Email</label>
                              <input type="email" id="docemail" name="docemail"  class="form-control" value="<?php echo htmlentities($data['docEmail']);?>" required>
                              <span id="email-availability-status"></span-->

                              <label for="email">Dr. Email</label>
                              <input type="email" id="docemail" name="docemail" class="form-control"  value="<?php echo htmlentities($data['docEmail']);?>" required="true" onBlur="checkemailAvailability()" >
                              <span id="email-availability-status"></span>

                           </div>
                            <div class="col-sm-12 mt-3 fw-bold" id="form-subhead">
                              Clinic Details <hr class="mt-0">
                            </div>

                            <div class="col-sm-5 form-group">
                              <label for="clinicname">Clinic Name</label>
                              <input type="text" class="form-control" name="clinicname" value="<?php echo htmlentities($data['clinic_name']);?>" required >
                            </div>
                            <div class="col-sm-4 form-group">
                              <label for="cliniccontact">Clinic Contact</label>
                              <input type="text" class="form-control" name="cliniccontact" title="format 10 digits" pattern="[1-9]{1}[0-9]{9}" value="<?php echo htmlentities($data['clinic_contact']);?>"  required>
                            </div>
                            <div class="col-sm-3 form-group">
                            <label for="cliniclocality">Clinic Locality</label>
                            <input type="text" class="form-control" name="cliniclocality" value="<?php echo htmlentities($data['clinic_locality']);?>"  required>
                          </div>
                          <div class="col-sm-2 form-group">
                            <label for="cliniccity">Clinic City</label>
                            <input type="text" class="form-control" name="cliniccity" value="<?php echo htmlentities($data['clinic_city']);?>"required>
                          </div>
                          <div class="col-sm-4 form-group">
                            <label for="clinictiming">Clinic Timing</label>
                            <input type="text" class="form-control" name="clinictiming" value="<?php echo htmlentities($data['clinic_timing']);?>" required>
                          </div>
                          <div class="col-sm-4 form-group">
                            <label for="closed">Clinic Closed On</label>
                            <input type="text" class="form-control" name="closed" value="<?php echo htmlentities($data['closed']);?>" required>
                          </div>
                            <div class="col-sm-2 form-group">
                              <label for="docfees">Fees</label>
                              <input type="text" class="form-control" name="docfees" value="<?php echo htmlentities($data['docFees']);?>"  required>
                            </div>

                            <div class="col-sm-12 form-group">
                            <label for="address">Doctor Clinic Address</label>
                            <textarea name="clinicaddress" class="form-control" required><?php echo htmlentities($data['address']);?></textarea>
													</div>                            
                            <div class="col-sm-12 form-group mt-3">
                              <hr class="mt-0">
                              <button type="submit" name="submit" id="submit" class="btn btn-outline-success float-end">Update</button>
                            </div>
                      
                          </div>

                          <?php } ?>
                        </form>
      </div>
     </div><!-- End patient form-->
   </div>


</section>
 

  </main>


 

  

  <?php include('include/footer.php');?>

</body>

</html>
<?php } ?>
