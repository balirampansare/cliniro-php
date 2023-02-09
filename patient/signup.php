<?php
session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['submit']))
{
$puname=$_POST['username'];	
$ppwd=md5($_POST['password']);
$ret=mysqli_query($con,"SELECT * FROM users WHERE email='$puname' and password='$ppwd'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$_SESSION['login']=$_POST['username'];
$_SESSION['id']=$num['id'];
$pid=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
// For stroing log if user login successfull
$log=mysqli_query($con,"insert into userlog(uid,username,userip,status) values('$pid','$puname','$uip','$status')");
header("location:patientlanding.php");
}
else
{
// For stroing log if user login unsuccessfull
$_SESSION['login']=$_POST['username'];	
$uip=$_SERVER['REMOTE_ADDR'];
$status=0;
mysqli_query($con,"insert into userlog(username,userip,status) values('$puname','$uip','$status')");
$_SESSION['errmsg']="Invalid username or password";

header("location:patientlogin.php");
}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Patient Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo copy.svg" rel="icon">
  <!--link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"-->

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-9 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo copy.svg" alt="">
                  <span class="d-none d-lg-block me-1">Sigup</span> <img src="assets/img/logo copy.svg" alt="">
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Just one form to setup your patient profile</h5>
                    <p>
								
								<span style="color:red;"><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
							</p>
                  </div>

                  <form role="form" name="" method="post">
                            <div class="row jumbotron  rounded py-2">

                              <div class="d-flex">
                                <div class="p-1 fw-bold" id="form-subhead">Personal</div>
                              </div>
                              <div class=" mt-0"><hr></div>
                              <div class="col-sm-4 form-group">
                              <label for="doctorname">Patient Name</label>
                              <input type="text" class="form-control" name="patname" id="patname" value="<?php  echo $row['fullName'];?>" required>
                            </div>
                            
                            <div class="col-sm-2 form-group">
                                <label for="sex">Gender</label>
                                <select name="gender" id="sex" class="form-control browser-default custom-select">
                                <option value="<?php  echo $row['gender'];?>">
                                <?php  echo $row['gender'];?></option>  
                                <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                  <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-sm-2 form-group">
                                <label for="age">Age</label>
                                <input type="number" class="form-control" name="patage" id="patage" value="<?php  echo $row['PatientAge'];?>" required>
                            </div>


                            <div class="col-sm-2 form-group mt-1">
                                <label for="blood">Blood Group</label>
                                <select id="blood" name="patblood"  class="form-control browser-default custom-select">
                                <option value="<?php  echo $row['bloodgrp'];?>">
                                <?php  echo $row['bloodgrp'];?></option>
                                  <option value="A+">A+</option>
                                  <option value="A-">A-</option>
                                  <option value="B+">B+</option>
                                  <option value="B-">B-</option>
                                  <option value="O+">O+</option>
                                  <option value="O-">O-</option>
                                  <option value="AB+">AB+</option>
                                  <option value="AB-">AB-</option>
                                </select>
                            </div>
                            <div class="col-sm-2 form-group mt-1">
                                <label for="sugar">Sugar</label>
                                <select id="sugar" name="patsugar" class="form-control browser-default custom-select">
                                <option value="<?php  echo $row['sugar'];?>">
                                <?php  echo $row['sugar'];?></option>    
                                <option value="none">None</option>
                                    <option value="type1">Type1</option>
                                    <option value="type2">Type2</option>
                                  </select>
                            </div>
                            <div class="col-sm-3 form-group mt-1">
                                <label for="Date">Date Of Birth</label>
                                <input type="Date" name="patdob" class="form-control" id="patdob" value="<?php  echo $row['dob'];?>" required>
                            </div>
                            <div class="col-sm-2 form-group mt-1">
                                <label for="height">Height</label>
                                <input type="text" name="patheight" class="form-control" id="patheight"value="<?php  echo $row['height'];?>" required>
                              </div>
                              <div class="col-sm-2 form-group mt-1">
                                <label for="weight">Weight</label>
                                <input type="text" class="form-control" name="patweight" id="patweight" value="<?php  echo $row['weight'];?>" required>
                              </div>

                              <div class="col-sm-6 form-group mt-1">
                                <label for="medication">Any medication taken regularly</label>
                                <textarea class="form-control" name="medhis" id="medhis" cols="30" rows="2"><?php  echo $row['PatientMedhis'];?></textarea>
                              </div>
                              <div class="col-sm-6 form-group mt-1">
                                <label for="allergy">Allergy / Medical problem</label>
                                <textarea class="form-control" name="patallergy" id="patallergy" cols="30" rows="2"><?php  echo $row['allergy'];?></textarea>
                              </div>

                            <!------------------------------------------------------------------>
                            <div class="col-sm-12 mt-3 fw-bold" id="form-subhead">
                            Contact <hr class="mt-0">
                            </div>
                            <div class="col-sm-3 form-group">
                              <label for="phone">Phone</label>
                              <input type="tel" class="form-control" name="patcontact" id="patcontact" value="<?php  echo $row['PatientContno'];?>" required>
                            </div>
                            <div class="col-sm-5 form-group">
                              <label for="email">Email</label>
                              <input type="email" class="form-control" name="patemail" id="patemail" value="<?php  echo $row['PatientEmail'];?>" required>
                           </div>
                           <div class="col-sm-2 form-group">
                            <label for="locality">Locality</label>
                            <input type="text" class="form-control" name="patlocality" id="patlocality" value="<?php  echo $row['locality'];?>" required>
                          </div>

                          <div class="col-sm-2 form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="patcity" id="patcity" value="<?php  echo $row['city'];?>" required>
                          </div>

                          <div class="col-sm-6 form-group">
                            <label for="address">Patient Address</label>
                            <textarea name="pataddress" class="form-control" required><?php  echo $row['PatientAdd'];?></textarea>
                          </div>

                            <div class="col-sm-12 mt-3 fw-bold" id="form-subhead">
                              Emergency Contact<hr class="mt-0">
                            </div>

                            <div class="col-sm-4 form-group">
                              <label for="ename">Name</label>
                              <input type="text" class="form-control" name="ename" id="ename" value="<?php  echo $row['ename'];?>" required>
                            </div>
                            <div class="col-sm-4 form-group">
                              <label for="erelation">Relation</label>
                              <input type="text" class="form-control" name="erelation" id="erelation" value="<?php  echo $row['erelation'];?>" required>
                            </div>
                            <div class="col-sm-4 form-group">
                              <label for="ephone">Phone</label>
                              <input type="tel" class="form-control" name="ephone" id="ephone" value="<?php  echo $row['ephone'];?>" required>
                            </div>

                           
                              
                              <div class="col-sm-12 form-group mt-3">
                                <hr class="mt-0">
                                <button  type="submit" name="submit" id="submit" class="btn btn-success col-12">Submit</button>
                              </div>
                        
                            </div>
                            
                          </form>

                </div>
              </div>

              

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

 
  
  <!--script src="assets/js/config.js"></script-->
  <script src="assets/js/main.js"></script>

</body>



</html>