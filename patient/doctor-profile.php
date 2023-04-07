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

<body>

<?php 

if(isset($_POST['update']))
{
  $did=$_GET['viewid'];


$rate=$_POST['rate'];
$review=$_POST['review'];

$sql=mysqli_query($con,"Update ratings set rating='$rate',comment='$review' where ratepatid='".$_SESSION['id']."' and ratedocid='$did';");

if($sql)
{
  echo '<script type="text/javascript">
  swal({
    title:"Hurray!",
    text: "Details Updated Successfully",
    icon: "success"
  }, function(){
        window.location.href = "patientlanding.php";
  });

     </script>';

}
}
?>

<?php 

if(isset($_POST['submit']))
{
  $did=$_GET['viewid'];
  $patid = $_SESSION['id'];


$rate=$_POST['rate'];
$review=$_POST['review'];

$sql=mysqli_query($con, "insert into  ratings(ratedocid,ratepatid,rating,comment)values('$did','$patid','$rate','$review')");
if($sql)
{
  echo '<script type="text/javascript">
  swal({
    title:"Thanks!",
    text: "Thanks for Your Review",
    icon: "success"
  }, function(){
        window.location.href = "patientlanding.php";
  });

     </script>';

}
}
?>




<?php include('include/header.php');?>
<?php include('include/sidebar.php');?>

  <main class="main" id="main">
    <div class="pagetitle">
      <h1>Doctor-Details</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="patientlanding.php">Home</a></li>
          <li class="breadcrumb-item">Profile</li>
          <li class="breadcrumb-item active">Info</li>
        </ol>
      </nav>
    </div>
  
                    <section class="section">
                    <?php 
$did=$_GET['viewid'];
$sql=mysqli_query($con,"SELECT * FROM doctors where id='$did';");
while($data=mysqli_fetch_array($sql))
{
?>


                    <div class="d-flex flex-wrap text-center m-2 rounded" id="patient-nav">
                  <a href="doctor-profile.php?viewid=<?php echo $data['id'];?>" class="p-2 flex-grow-1 border rounded m-2 border-success border-2  fw-bold">Doctor Info</a>
                  <a href="prescription.php?prespid=<?php echo $data['id'];?>" class="p-2 flex-grow-1 border rounded m-2 ">Prescriptions</a>
                  <a href="patientappointment.php?patid=<?php echo $data['id'];?>" class="p-2 flex-grow-1 border rounded m-2">Appointments</a>
                  <a href="patientbilling.php?patid=<?php echo $data['id'];?>" class="p-2 flex-grow-1 border rounded m-2">Billings</a>
                </div>



<div class="row" >
    <!-- quote -->

   


    <div class="col-md-4 col-lg-3">
      <div class="card">
        <img class="card-img-top" src="../assets/img/cardback.png" alt="Bologna">
        <div class="card-body text-center">
          <img class="avatar rounded-circle" src="assets/img/cliniro logo.png" alt="patientpic">

          <div>
          <h4 class="card-title"><?php echo htmlentities($data['doctorName']);?></h4>
          <span>
              <?php 
	            echo $data['specilization'];
            ?> Specialist
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

          <hr>
          <span>
              <?php $query=mysqli_query($con,"SELECT * FROM ratings WHERE ratings.ratedocid='$did' AND ratings.ratepatid=".$_SESSION['id']."; ");
              $row=mysqli_fetch_array($query);
	            if($row['rating']>0){ ?>
              <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                You rated: <?php echo htmlentities($row['rating']);?> <i class="bi bi-star-fill"></i>
              </button>
             <?php  } else { ?> 
              <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#fillreview">Rate Your Doctor</button>
              

              <?php } ?>
              </span>


         

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
                      <input type="text" name="docname" class="form-control" value="<?php echo htmlentities($data['doctorName']);?>" readonly >
                            </div>
                            <div class="col-sm-2 form-group">
                                <label for="sex">Gender</label>
                                <input type="text" name="docgender" class="form-control" value="<?php echo htmlentities($data['gender']);?>" readonly>
                                
                            </div>
                            <div class="col-sm-2 form-group">
                                <label for="docage">Age</label>
                                <input type="number" class="form-control" name="docage" value="<?php echo htmlentities($data['age']);?>" readonly>
                            </div>

                            <div class="col-sm-3 form-group mt-1">
                                <label for="Date">Date Of Birth</label>
                                <input type="Date" name="docdob" class="form-control" value="<?php echo htmlentities($data['dob']);?>" readonly>
                            </div>


                            <div class="col-sm-5 form-group">
															<label for="DoctorSpecialization">
																Doctor Specialization
															</label>
                              <input type="text" name="Doctorspecialization" class="form-control" value="<?php echo htmlentities($data['specilization']);?>" readonly>
														</div>

                            <!--div class="col-sm-3 form-group">
                              <label for="phone">Dr. Phone</label>
                              <input type="number" class="form-control" name="doccontact" value="<?php echo htmlentities($data['contactno']);?>" readonly>
                            </div-->
                            <div class="col-sm-4 form-group">
                              <label for="email">Dr. Email</label>
                              <input type="email" id="docemail" name="docemail" class="form-control" value="<?php echo htmlentities($data['docEmail']);?>" readonly >
                              <span id="email-availability-status"></span>
                           </div>
                            <div class="col-sm-12 mt-3 fw-bold" id="form-subhead">
                              Clinic Details <hr class="mt-0">
                            </div>

                            <div class="col-sm-5 form-group">
                              <label for="clinicname">Clinic Name</label>
                              <input type="text" class="form-control" name="clinicname" value="<?php echo htmlentities($data['clinic_name']);?>" readonly >
                            </div>
                            <div class="col-sm-4 form-group">
                              <label for="cliniccontact">Clinic Contact</label>
                              <input type="number" class="form-control" name="cliniccontact" value="<?php echo htmlentities($data['clinic_contact']);?>" readonly >
                            </div>
                            <div class="col-sm-3 form-group">
                            <label for="cliniclocality">Clinic Locality</label>
                            <input type="text" class="form-control" name="cliniclocality" value="<?php echo htmlentities($data['clinic_locality']);?>" readonly >
                          </div>
                          <div class="col-sm-2 form-group">
                            <label for="cliniccity">Clinic City</label>
                            <input type="text" class="form-control" name="cliniccity" value="<?php echo htmlentities($data['clinic_city']);?>" readonly>
                          </div>
                          <div class="col-sm-4 form-group">
                            <label for="clinictiming">Clinic Timing</label>
                            <input type="text" class="form-control" name="clinictiming" value="<?php echo htmlentities($data['clinic_timing']);?>" readonly>
                          </div>
                          <div class="col-sm-4 form-group">
                            <label for="closed">Clinic Closed On</label>
                            <input type="text" class="form-control" name="closed" value="<?php echo htmlentities($data['closed']);?>" readonly>
                          </div>
                            <div class="col-sm-2 form-group">
                              <label for="docfees">Fees</label>
                              <input type="text" class="form-control" name="docfees" value="<?php echo htmlentities($data['docFees']);?>" readonly >
                            </div>

                            <div class="col-sm-10 form-group">
                            <label for="address">Doctor Clinic Address</label>
                            <textarea name="clinicaddress" class="form-control" readonly><?php echo htmlentities($data['address']);?></textarea>
													</div>                            
                           
                      
                          </div>

                          <?php } ?>
                        </form>
      </div>
     </div><!-- End patient form-->
   </div>

   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
      <?php 
$did=$_GET['viewid'];
$sql=mysqli_query($con,"SELECT * FROM ratings WHERE ratings.ratedocid='$did' AND ratings.ratepatid=".$_SESSION['id'].";");
while($data=mysqli_fetch_array($sql))
{
?>
      <form method="post" name="update">
            <div class="row jumbotron rounded py-2">
                <!--div class="col-sm-12 form-group"-->
                    <div class="col-sm-12 form-group">
                    <label for="rate" class="form-label">Rate 1 - 5</label>
                      <input type="range" class="form-range" name="rate" min="0" max="5" id="customRange2" value="<?php echo htmlentities($data['rating']);?>" required>
                    </div>
                    
                    <div class="col-sm-12 form-group">
                        <label for="review" class="fw-semibold">Review:</label>
                        <textarea class="form-control border-bottom" name="review" id="review"  cols="30" rows="2"><?php echo htmlentities($data['comment']);?></textarea>
                    </div>
                    <div class="col-sm-12 form-group mt-1">
                      
                        <button type="submit" name="update" class="btn btn-outline-success float-end">Submit</button>
                    </div>
                <!--/div-->
            </div>
            <?php }?>

        </form>
         
         
                           
                                  
          </div>
          
        </div>
      </div>
    </div>

    <div class="modal fade" id="fillreview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
      
      <form method="post" name="submit">
            <div class="row jumbotron rounded py-2">
                <!--div class="col-sm-12 form-group"-->
                    <div class="col-sm-12 form-group">
                    <label for="rate" class="form-label">Rate 1 - 5</label>
                      <input type="range" class="form-range" name="rate" min="0" max="5" id="customRange2"  required>
                    </div>
                    
                    <div class="col-sm-12 form-group">
                        <label for="review" class="fw-semibold">Review:</label>
                        <textarea class="form-control border-bottom" name="review" id="review"  cols="30" rows="2"></textarea>
                    </div>
                    <div class="col-sm-12 form-group mt-1">
                      
                        <button type="submit" name="submit" class="btn btn-outline-success float-end">Submit</button>
                    </div>
                <!--/div-->
            </div>
        </form>
         
         
                           
                                  
          </div>
          
        </div>
      </div>
    </div>


</section>
 

  </main>


 

  

  <?php include('include/footer.php');?>

</body>

</html>
<?php } ?>
