<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:patientlogout.php');
  } else{


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Cliniro</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.svg" rel="icon">
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


  <script data-require="jquery@*" data-semver="3.0.0" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css" />
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>


</head>

<!--script>
  const uid = sessionStorage.getItem("uid")

  if (uid == null){
    window.location.href = "pages-login.html"
  }
</script-->

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.svg" alt="">
        <span class="d-none d-lg-block">Cliniro</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-stopwatch"></i>
            <!--span class="badge bg-primary badge-number">4</span-->
          </a><!-- End Notification Icon -->
        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-easel2"></i>
            <!--span class="badge bg-success badge-number">3</span-->
          </a><!-- End Messages Icon -->
        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/logo copy.svg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">
            <?php $query=mysqli_query($con,"select fullName from users where id='".$_SESSION['id']."'");
            while($row=mysqli_fetch_array($query))
            {
	            echo $row['fullName'];
            }?>
            </span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>
              <?php $query=mysqli_query($con,"select fullName from users where id='".$_SESSION['id']."'");
            while($row=mysqli_fetch_array($query))
            {
	            echo $row['fullName'];
            }?>
              </h6>
              
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="patient-profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="patient-change-password.php">
                <i class="bi bi-gear"></i>
                <span>Change password</span>
              </a>
            </li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="patientlogout.php" id="logout-btn">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->


  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed " href="patientlanding.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed " href="#">
          <i class="bi bi-stack"></i>
          <span>Stuff</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed " href="#">
          <i class="bi bi-search"></i>
          <span>Find</span>
        </a>
      </li>
    

      <li class="nav-item">
        <a class="nav-link collapsed" href="patient-profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Sign Out</span>
        </a>
      </li><!-- End Login Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <main class="main" id="main">
  <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>
    
    <div class="section">
    <div class="d-flex flex-wrap text-center m-2 rounded" id="patient-nav">
  <a href="patient-profile.php" class="p-2 flex-grow-1 border rounded m-2  border-success border-2  fw-bold">Profile</a>
  <a href="patient-change-password.php" class="p-2 flex-grow-1 border rounded m-2">Change Password</a>
</div>

<div class="row" >
    <!-- quote -->

    <?php 
$sql=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($sql))
{
?>



    <div class="col-xxl-3 ">
      <div class="card">
        <img class="card-img-top" src="../assets/img/cardback.png" alt="Bologna">
        <div class="card-body text-center">
          <img class="avatar rounded-circle" src="../assets/img/messages-3.jpg" alt="patientpic">

          <div>
          <h4 class="card-title"><?php echo htmlentities($data['fullName']);?></h4>
          

          </div>
          
          <!--h6 class="card-subtitle mb-2 text-muted">Famous Actor</h6>
          <p class="card-text">Robert John Downey Jr.'career has included critical and popular success in his youth, followed by a period of substance abuse and legal difficulties, and a resurgence of commercial success in middle age. </p>
          <a href="#" class="btn btn-info">Follow</a>
          <a href="#" class="btn btn-outline-info">Message</a-->

          <div class="d-flex justify-content-between flex-wrap" id="form-subhead">
                            <div class="px-2"> <b>Id:</b>PT-<?php echo $row['id'];?></div>
                            <div class="px-2"> <b>City:</b><?php echo $row['city'];?></div>
                            
                            <div class="px-2"> <b>Gender:</b><?php echo $row['gender'];?></div>
                            <div class="px-2"> <b>Email:</b> <?php echo $row['email'];?></div>
                            <div class="px-2"> <b>Address:</b> <?php echo $row['address'];?></div>
                          </div>
                          <div class="text-center">
                            <hr>Profile
                          </div>
                          <div class="d-flex justify-content-between flex-wrap" id="form-subhead">
                              <div class="px-2"> <b>Registerd:</b><?php echo $row['regDate'];?></div>
                              <div class="px-2">
                                <?php if($data['updationDate']){?>
                                    <b>Updated:</b> <?php echo $row['updationDate'];?>
                                <?php } ?>  
                              </div>
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
                                <input type="number" class="form-control" name="patage" id="patage" value="<?php  echo $row['Age'];?>" required>
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
                                <input type="text" name="patheight" class="form-control" id="patheight"value="<?php  echo $row['Height'];?>" required>
                              </div>
                              <div class="col-sm-2 form-group mt-1">
                                <label for="weight">Weight</label>
                                <input type="text" class="form-control" name="patweight" id="patweight" value="<?php  echo $row['Weight'];?>" required>
                              </div>

                              <div class="col-sm-6 form-group mt-1">
                                <label for="medication">Any medication taken regularly</label>
                                <textarea class="form-control" name="medhis" id="medhis" cols="30" rows="2"><?php  echo $row['Medication'];?></textarea>
                              </div>
                              <div class="col-sm-6 form-group mt-1">
                                <label for="allergy">Allergy / Medical problem</label>
                                <textarea class="form-control" name="patallergy" id="patallergy" cols="30" rows="2"><?php  echo $row['Allergy'];?></textarea>
                              </div>

                            <!------------------------------------------------------------------>
                            <div class="col-sm-12 mt-3 fw-bold" id="form-subhead">
                            Contact <hr class="mt-0">
                            </div>
                            <div class="col-sm-3 form-group">
                              <label for="phone">Phone</label>
                              <input type="tel" class="form-control" name="patcontact" id="patcontact" value="<?php  echo $row['Phone'];?>" required>
                            </div>
                            <div class="col-sm-5 form-group">
                              <label for="email">Email</label>
                              <input type="email" class="form-control" name="patemail" id="patemail" value="<?php  echo $row['Email'];?>" required>
                           </div>
                           <div class="col-sm-2 form-group">
                            <label for="locality">Locality</label>
                            <input type="text" class="form-control" name="patlocality" id="patlocality" value="<?php  echo $row['Locality'];?>" required>
                          </div>

                          <div class="col-sm-2 form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="patcity" id="patcity" value="<?php  echo $row['city'];?>" required>
                          </div>

                          <div class="col-sm-6 form-group">
                            <label for="address">Patient Address</label>
                            <textarea name="pataddress" class="form-control" required><?php  echo $row['address'];?></textarea>
                          </div>

                            <div class="col-sm-12 mt-3 fw-bold" id="form-subhead">
                              Emergency <hr class="mt-0">
                            </div>

                            <div class="col-sm-4 form-group">
                              <label for="ename">Name</label>
                              <input type="text" class="form-control" name="ename" id="ename" value="<?php  echo $row['Ename'];?>" required>
                            </div>
                            <div class="col-sm-4 form-group">
                              <label for="erelation">Relation</label>
                              <input type="text" class="form-control" name="erelation" id="erelation" value="<?php  echo $row['Erelation'];?>" required>
                            </div>
                            <div class="col-sm-4 form-group">
                              <label for="ephone">Phone</label>
                              <input type="tel" class="form-control" name="ephone" id="ephone" value="<?php  echo $row['Econtact'];?>" required>
                            </div>

                            <!--------------------------------------------------------------------->
                           

                             <!--------------------------------------------------------------------->
                             <div class="col-sm-12 mt-3 fw-bold" id="form-subhead">
                              Other<hr class="mt-0">
                            </div>
                            <div class="col-sm-12 form-group mt-1">
                              <label for="other">Detail</label>
                              <textarea class="form-control" name="patother" id="patother" cols="30" rows="2" ><?php  echo $row['patother'];?></textarea>
                            </div>
                              
                              <!--div class="col-sm-12">
                                <input type="checkbox" class="form-check d-inline" id="chb" required><label for="chb" class="form-check-label">&nbsp;I accept all terms and conditions.
                                </label>
                              </div-->
                              
                              <div class="col-sm-12 form-group mt-3">
                                <hr class="mt-0">
                                <button  type="submit" name="submit" id="submit" class="btn btn-outline-success float-end">Update</button>
                              </div>
                        
                            </div>
                            <?php }?>
                          </form>
                        </div>
                      </div>
   <!-- End patient form-->
   </div>

    </div>
  

  </main>


 

  

    <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Cliniro</span></strong>. All Rights Reserved
    </div>
  </footer><!--End Footer-->

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
  <script src="assets/js/tablesearch.js"></script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


  <!--firebase files-->
  <script src="assets/js/config.js"></script>
  <!-- Template Main JS File -->

  <script src="assets/js/main.js"></script>

</body>

</html>

<?php } ?>