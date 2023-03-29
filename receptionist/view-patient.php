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

<?php include('include/header.php');?>


<?php include('include/sidebar.php');?>

  <main class="main" id="main">
  <div class="pagetitle">
      <h1>Patients</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Patient</li>
          <li class="breadcrumb-item active">Patient Info</li>
        </ol>
      </nav>
    </div>

<section class="section">
<?php
            $vid=$_GET['viewid'];
            $ret=mysqli_query($con,"select * from users where ID='$vid'");
            $cnt=1;
            while ($row=mysqli_fetch_array($ret)) {
                               ?>
                <div class="d-flex flex-wrap text-center m-2 rounded" id="patient-nav">
                  <a href="view-patient.php?viewid=<?php echo $row['id'];?>" class="p-2 flex-grow-1 border rounded m-2 border-success border-2  fw-bold">Patient Info</a>
                  <a href="prescriptions.php?prespid=<?php echo $row['id'];?>" class="p-2 flex-grow-1 border rounded m-2">Prescriptions</a>
                  <a href="patientappointment.php?patid=<?php echo $row['id'];?>" class="p-2 flex-grow-1 border rounded m-2">Appointments</a>
                  <a href="patientbilling.php?patid=<?php echo $row['id'];?>" class="p-2 flex-grow-1 border rounded m-2">Billings</a>
                </div>
<div class="row" >


                    <!-- quote -->
                    <div class="col-xxl-3 ">
                      <div class="card">
                        <img class="card-img-top" src="../assets/img/cardback.png" alt="Bologna">
                        <div class="card-body text-center">
                          <img class="avatar rounded-circle" src="../assets/img/messages-3.jpg" alt="patientpic">
                          <h4 class="card-title"><?php  echo $row['fullName'];?></h4>
                          <div class="d-flex justify-content-between flex-wrap" id="form-subhead">
                            <div class="px-2"> <b>Id:</b>PT-<?php  echo $row['id'];?></div>
                            <div class="px-2"> <b>Weight:</b><?php  echo $row['Weight'];?></div>
                            <div class="px-2"> <b>Age:</b><?php  echo $row['Age'];?></div>
                            <div class="px-2"> <b>Gender:</b><?php  echo $row['gender'];?></div>
                            <div class="px-2"> <b>Allergies:</b> <?php  echo $row['Allergy'];?></div>
                          </div>
                        </div>
                      </div>

                      
                   </div><!-- End quote -->
       
                   <!-- patient form  -->
                   
                   <div class="col-xxl-9">
                        <div class="container rounded" id="patients-patients-cont">
                          
                          <form role="form" name="" method="post">
                            <div class="row jumbotron box8 rounded py-2">

                            

                              <div class="d-flex">
                                <div class="p-1 fw-bold" id="form-subhead">Personal</div>
                              </div>
                              <div class=" mt-0"><hr></div>

                              <div class="col-sm-4 ">
                              <label for="doctorname" class="ms-2 fw-semibold">Patient Name:</label>
                              <input type="text" class="form-control border-0" name="patname" id="patname" value="<?php  echo $row['fullName'];?>" required readonly>
                            </div>
                            
                            <div class="col-sm-2">
                                <label for="sex" class="ms-2 fw-semibold">Gender:</label>
                                <input type="text" name="gender" class="form-control border-0" value="<?php  echo $row['gender'];?>" readonly>
                            </div>
                            <div class="col-sm-2 form-group">
                                <label for="age" class="ms-2 fw-semibold">Age</label>
                                <input type="number" class="form-control border-0" name="patage" id="patage" value="<?php  echo $row['Age'];?>" required readonly>
                            </div>
                            <div class="col-sm-2 form-group mt-1">
                                <label for="height" class="ms-2 fw-semibold">Height</label>
                                <input type="text" name="patheight" class="form-control border-0" id="patheight"value="<?php  echo $row['Height'];?>" required readonly>
                              </div>
                              <div class="col-sm-2 form-group mt-1">
                                <label for="weight" class="ms-2 fw-semibold">Weight</label>
                                <input type="text" class="form-control border-0" name="patweight" id="patweight" value="<?php  echo $row['Weight'];?>" required readonly>
                              </div>

                              <div class="col-sm-6 form-group mt-1">
                                <label for="medication" class="ms-2 fw-semibold">Any medication taken regularly</label>
                                <textarea class="form-control border-0" name="medhis" id="medhis" cols="30" rows="2"><?php  echo $row['Medication'];?></textarea>
                              </div>
                              <div class="col-sm-6 form-group mt-1">
                                <label for="allergy" class="ms-2 fw-semibold">Allergy / Medical problem</label>
                                <textarea class="form-control border-0" name="patallergy" id="patallergy" cols="30" rows="2"><?php  echo $row['Allergy'];?></textarea>
                              </div>

                            <!------------------------------------------------------------------>
                            <div class="col-sm-12 mt-3 fw-bold" id="form-subhead">
                            Contact <hr class="mt-0">
                            </div>
                            <div class="col-sm-3 form-group">
                              <label for="phone" class="ms-2 fw-semibold">Phone</label>
                              <input type="tel" class="form-control border-0 " name="patcontact" id="patcontact" value="<?php  echo $row['Phone'];?>" required readonly>
                            </div>
                            <div class="col-sm-3 form-group ">
                              <label for="email" class="ms-2 fw-semibold">Email</label>
                              <input type="email" class="form-control border-0 " name="patemail" id="patemail" value="<?php  echo $row['email'];?>" required readonly>
                           </div>
                           <div class="col-sm-2 form-group ">
                            <label for="locality" class="ms-2 fw-semibold">Locality</label>
                            <input type="text" class="form-control border-0 " name="patlocality" id="patlocality" value="<?php  echo $row['Locality'];?>" required readonly>
                          </div>

                          <div class="col-sm-2 form-group ">
                            <label for="city" class="ms-2 fw-semibold">City</label>
                            <input type="text" class="form-control border-0 " name="patcity" id="patcity" value="<?php  echo $row['city'];?>" required readonly>
                          </div>

                          <div class="col-sm-12 form-group">
                            <label for="address" class="ms-2 fw-semibold">Patient Address</label>
                            <textarea name="pataddress" class="form-control border-0" required readonly><?php  echo $row['address'];?></textarea>
                          </div>

                            <div class="col-sm-12 mt-3 fw-bold" id="form-subhead">
                              Emergency Contact <hr class="mt-0">
                            </div>

                            <div class="col-sm-4 form-group">
                              <label for="ename" class="ms-2 fw-semibold">Name</label>
                              <input type="text" class="form-control border-0" name="ename" id="ename" value="<?php  echo $row['Ename'];?>" required readonly>
                            </div>
                            <div class="col-sm-4 form-group">
                              <label for="erelation" class="ms-2 fw-semibold  ">Relation</label>
                              <input type="text" class="form-control border-0" name="erelation" id="erelation" value="<?php  echo $row['Erelation'];?>" required readonly>
                            </div>
                            <div class="col-sm-4 form-group">
                              <label for="ephone" class="ms-2 fw-semibold">Phone</label>
                              <input type="tel" class="form-control border-0" name="ephone" id="ephone" value="<?php  echo $row['Econtact'];?>" required readonly>
                            </div>                        
                            </div>
                            <?php }?>
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