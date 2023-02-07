<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:doctorlogout.php');
  } else{
if(isset($_POST['submit']))
  {
    
    $prespid=$_GET['prespid'];
    $patname = $_POST['patname'];
    $gender = $_POST['gender'];
    $patage = $_POST['patage'];
    $patblood = $_POST['patblood'];
    $weight=$_POST['weight'];
    $bp=$_POST['bp']; 
    $temp=$_POST['temp'];
    $symptoms=$_POST['symptoms'];
    $tabpattern1=$_POST['tabpattern1'];
    $tabname1=$_POST['tabname1'];
    $tabperiod1=$_POST['tabperiod1'];
    $tabdays1=$_POST['tabdays1'];
    $tabother=$_POST['tabother'];
    $tests=$_POST['tests'];
   
 
      $query=mysqli_query($con, "insert into  tblmedicalhistory(PatientID,PatientName,gender,age,bloodgrp,symptoms,BloodPressure,Weight,Temperature,tabname1,tabpat1,tabped1,tabday1,tabother,tests)values('$prespid','$patname','$gender','$patage','$patblood','$symptoms','$bp','$weight','$temp','$tabname1','$tabpattern1','$tabperiod1','$tabdays1','$tabother','$tests')");
      //$query=mysqli_query($con,"update tblmedicalhistory set PatientID='$prespid',PatientName='$patname',gender='$gender',age='$patage',bloodgrp='$patblood',BloodPressure='$bp',Weight='$weight',Temperature='$temp',tabname1='$tabname1',tabpat1='$tabpattern1',tabped1='$tabperiod1',tabday1='$tabdays1',tabother='$tabother',tests='$tests'  where ID='$prespid'");
    if ($query) {
    echo '<script>alert("Medicle history has been added.")</script>';
    echo "<script>window.location.href ='manage-patient.php'</script>";
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
  

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
            <?php $query=mysqli_query($con,"select doctorName from doctors where id='".$_SESSION['id']."'");
            while($row=mysqli_fetch_array($query))
            {
	            echo $row['doctorName'];
            }?>
            </span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>
              <?php $query=mysqli_query($con,"select doctorName from doctors where id='".$_SESSION['id']."'");
            while($row=mysqli_fetch_array($query))
            {
	            echo $row['doctorName'];
            }?>
              </h6>
              <span>
              <?php $query=mysqli_query($con,"select specilization from doctors where id='".$_SESSION['id']."'");
            while($row=mysqli_fetch_array($query))
            {
	            echo $row['specilization'];
            }?> <span>Specialist</span>
              </span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="doctor-profile.php">
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
              <a class="dropdown-item d-flex align-items-center" href="doctor-change-password.php">
                <i class="bi bi-gear"></i>
                <span>Change password</span>
              </a>
            </li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="doctorlogout.php" id="logout-btn">
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
        <a class="nav-link collapsed " href="doctorlanding.php">
          <i class="bi bi-grid"></i>
          <span>Clifea</span>
        </a>
      </li><!-- End Dashboard Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed"  href="#">
          <i class="bi bi-bar-chart"></i><span>Dashboard</span>
        </a>
      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Patients</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="manage-patient.php">
              <i class="bi bi-circle"></i><span>All Patients</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Appointments</span>
            </a>
          </li>
          <li>
            <a href="add-patient.php">
              <i class="bi bi-circle"></i><span>Add Patient</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Schedules</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Kanban</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Notes</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Inventory</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Doctors Inventory</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->

      <li class="nav-heading">CliFea</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-newspaper"></i>
          <span>Be Updated</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-calculator"></i>
          <span>Calci</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-heart-pulse"></i>
          <span>Desease Info</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-easel2"></i>
          <span>drawing-board</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-stopwatch"></i>
          <span>Stop Watch</span>
        </a>
      </li>

      <hr>

      <li class="nav-item">
        <a class="nav-link collapsed" href="doctor-profile.php">
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
      <h1>Clifea</h1>
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
            $prespid=$_GET['prespid'];
            $ret=mysqli_query($con,"select * from tblpatient where ID='$prespid'");
            $cnt=1;
            while ($row=mysqli_fetch_array($ret)) {
            
                               ?>

                <div class="d-flex flex-wrap text-center m-2 rounded" id="patient-nav">
                  <a href="view-patient.php?viewid=<?php echo $row['ID'];?>" class="p-2 flex-grow-1 border rounded m-2">Patient Info</a>
                  <a href="prescriptions.php?prespid=<?php echo $row['ID'];?>" class="p-2 flex-grow-1 border rounded m-2 border-success border-2  fw-bold">Prescriptions</a>
                  <a href="#" class="p-2 flex-grow-1 border rounded m-2">Appointments</a>
                  <a href="#" class="p-2 flex-grow-1 border rounded m-2">Billings</a>
                </div>

<div class="row" >


                    <!-- quote -->
                    <div class="col-xxl-3 ">
                      <div class="card">
                        <img class="card-img-top" src="../assets/img/cardback.png" alt="Bologna">
                        <div class="card-body text-center">
                          <img class="avatar rounded-circle" src="../assets/img/messages-3.jpg" alt="patientpic">
                          <h4 class="card-title"><?php  echo $row['PatientName'];?></h4>
                          <div class="d-flex justify-content-between flex-wrap" id="form-subhead">
                            <div class="px-2"> <b>Id:</b>PT-<?php  echo $row['ID'];?></div>
                            <div class="px-2"> <b>Weight:</b><?php  echo $row['weight'];?></div>
                            <div class="px-2"> <b>Age:</b><?php  echo $row['PatientAge'];?></div>
                            <div class="px-2"> <b>Gender:</b><?php  echo $row['PatientGender'];?></div>
                            <div class="px-2"> <b>Blood Grp:</b> <?php  echo $row['bloodgrp'];?></div>
                            <div class="px-2"> <b>Allergies:</b> <?php  echo $row['allergy'];?></div>
                          </div>

                          <hr class="mt-1">
                          <button class="btn btn-outline-success mt-2 text-center align-items-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add +</button>
                        </div>
                      </div>
                        
                      <section>
                    <!-- Modal -->
                    <div class="modal fade modal-dialog-scrollable modal-lg " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">New Prescription</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" name="submit">
                                    <div class="row jumbotron rounded py-2">
                                      <!--div class="col-sm-12 mx-t3">
                                        <h2 class="text-center text-info">Register</h2>
                                      </div-->
          
                                      <div class="d-flex">
                                        <div class=" fw-bold" id="form-subhead">Personal</div>
                                        <div class="ms-auto"><label for="doctorname">Date: 5/02/2023</label></div>
                                      </div>
                                      <div class=" mt-0"><hr></div>
          
                                      <!--div class="col-sm-12 mt-3 fw-bold" id="form-subhead">
                                          Personal <hr class="mt-0">
          
                                      </div-->
                                      <div class="col-sm-4 text-center form-group">
                              <label for="doctorname" class="fw-bold">Name:</label>
                              <input type="text" class="form-control text-center border-0" name="patname" id="patname" value="<?php  echo $row['PatientName'];?>" readonly  >
                            </div>
                            
                            <div class="col-sm-2 text-center form-group">
                                <label for="sex" class="fw-bold">Gender:</label>
                                <input type="text" class="form-control text-center border-0" name="gender" id="sex" value="<?php  echo $row['PatientGender'];?>" readonly  >
                            </div>
                            <div class="col-sm-2 text-center form-group">
                                <label for="age" class="fw-bold">Age:</label>
                                <input type="number" class="form-control text-center border-0" name="patage" id="patage" value="<?php  echo $row['PatientAge'];?>" required >
                            </div>


                            <div class="col-sm-2 text-center form-group">
                                <label for="blood" class="fw-bold">Blood Group:</label>
                                <input type="text" class="form-control text-center border-0" name="patblood" id="blood" value="<?php  echo $row['bloodgrp'];?>" readonly  >
                            </div>
                            <div class="col-sm-2 text-center form-group">
                                <label for="weight" class="fw-bold">Weight</label>
                                <input type="number" class="form-control text-center border-0" name="weight" id="patweight" value="<?php  echo $row['weight'];?>" required>
                              </div>

                              <div class="col-sm-4 text-center form-group mt-1">
                                <label for="bp" class="fw-bold">BP</label>
                                <input type="number" class="form-control text-center border-0" name="bp" id="patbp" value="<?php  echo $row['weight'];?>" required>
                              </div>
                              <div class="col-sm-2 text-center form-group mt-1">
                                <label for="temp" class="fw-bold">Temp</label>
                                <input type="number" class="form-control text-center border-0" name="temp" id="patbp"  required>
                              </div>
                              


                                      
          
                                     

                                        <div class=" mt-0"><hr></div>
          
          
                                        <?php }?>
                                     
                                      <!------------------------------------------------------------------>
                                      
                                      
                                      <div class="col-sm-12 mt-3 fw-bold" id="form-subhead">
                                      Symptoms <hr class="mt-0">
                                      </div>

                                      <div class="col-sm-12 form-group">
                                          <textarea class="form-control border-bottom" name="symptoms" id="symptoms" cols="30" rows="2"></textarea>
                                      </div>          
                                      <!--------------------------------------------------------------------->
                                      
                                      <div class="col-sm-12 mt-3 fw-bold" id="form-subhead">
                                        Tablets <hr class="mt-0">
                                      </div>
                                      <!-------------------START OF TABLET SECTION----------------------->
                                      <!--section-->
                                        <div class="col-sm-5 form-group">
                                          <label for="tabname">Name</label>
                                          <input type="text" class="form-control border-0 " name="tabname1" id="tabname" placeholder="Tablet Name" required>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                          <label for="tabpattern">Pattern</label>
                                          <select name="tabpattern1" id="pattern" class="form-control browser-default custom-select border-0">
                                            
                                            <option value="1-1-1">1-1-1</option>
                                            <option value="1-0-1">1-0-1</option>
                                            <option value="0-1-1">0-1-1</option>
                                            <option value="1-1-0">1-1-0</option>
                                            <option value="1-0-0">1-0-0</option>
                                            <option value="0-1-0">0-1-0</option>
                                            <option value="0-0-1">0-0-1</option>
                                          </select>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                          <label for="tabperiod">Period</label>
                                          <select name="tabperiod1" id="tabperiod1" class="form-control browser-default custom-select border-0">
                                            
                                            <option value="After Meal">After Meal</option>
                                            <option value="Before Meal">Before Meal</option>
                                            <option value="Take Anytime">Take Anytime</option>
                                          </select>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                          <label for="tabdays1">Day/Week/Mth</label>
                                          <input type="text" class="form-control border-0" name="tabdays2" id="tabdays1" placeholder="days" required>
                                        </div>
                                        <div class="col-sm-5 form-group mt-1">
                                          <input type="text" class="form-control border-0" name="tabname2" id="tabname" placeholder="" required>
                                        </div>
                                        <div class="col-sm-2 form-group mt-1">
                                          <select name="pattern2" id="pattern" class="form-control border-0 browser-default custom-select">
                                            <option value=""></option>
                                            <option value="1-1-1">1-1-1</option>
                                            <option value="1-0-1">1-0-1</option>
                                            <option value="0-1-1">0-1-1</option>
                                            <option value="1-1-0">1-1-0</option>
                                            <option value="1-0-0">1-0-0</option>
                                            <option value="0-1-0">0-1-0</option>
                                            <option value="0-0-1">0-0-1</option>
                                          </select>
                                        </div>
                                        <div class="col-sm-3 form-group mt-1">
                                          <select name="tabperiod2" id="tabperiod2" class="form-control border-0 browser-default custom-select">
                                            <option value=""></option>
                                            <option value="After Meal">After Meal</option>
                                            <option value="Before Meal">Before Meal</option>
                                            <option value="Take Anytime">Take Anytime</option>
                                          </select>
                                        </div>
                                        <div class="col-sm-2 form-group mt-1">
                                          <input type="text" class="form-control border-0" name="tabdays2" id="tabdays2" placeholder="" required>
                                        </div>
                                        <div class="col-sm-5 form-group mt-1">
                                          <input type="text" class="form-control border-0" name="tabname3" id="tabname" placeholder="" required>
                                        </div>
                                        <div class="col-sm-2 form-group mt-1">
                                          <select name="pattern3" id="pattern" class="form-control border-0 browser-default custom-select">
                                            <option value=""></option>
                                            <option value="1-1-1">1-1-1</option>
                                            <option value="1-0-1">1-0-1</option>
                                            <option value="0-1-1">0-1-1</option>
                                            <option value="1-1-0">1-1-0</option>
                                            <option value="1-0-0">1-0-0</option>
                                            <option value="0-1-0">0-1-0</option>
                                            <option value="0-0-1">0-0-1</option>
                                          </select>
                                        </div>
                                        <div class="col-sm-3 form-group mt-1">
                                          <select name="tabperiod3" id="tabperiod3" class="form-control border-0 browser-default custom-select">
                                            <option value=""></option>
                                            <option value="After Meal">After Meal</option>
                                            <option value="Before Meal">Before Meal</option>
                                            <option value="Take Anytime">Take Anytime</option>
                                          </select>
                                        </div>
                                        <div class="col-sm-2 form-group mt-1">
                                          <input type="text" class="form-control border-0" name="tabdays3" id="tabdays3" placeholder="" required>
                                        </div>
                                      <!--/section-->
                                      <!-------------------END OF TABLET SECTION----------------------->
                                      <div class="col-sm-12 form-group mt-1">
                                          <label for="tabother">Tablet Other Info</label>
                                          <textarea class="form-control" name="tabother" id="tabother" cols="30" rows="2"></textarea>
                                      </div>
          
                                      <!--------------------------------------------------------------------->
                                      <div class="col-sm-12 mt-3 fw-bold" id="form-subhead">
                                       Tests/Advice/Other <hr class="mt-0">
                                      </div>
                                      <div class="col-sm-12 form-group mt-1">
                                          
                                          <textarea class="form-control" name="tests" id="tests" cols="30" rows="2"></textarea>
                                      </div>
          
                                      
                                      
                                      <div class="col-sm-12 form-group mt-3">
                                        <hr class="mt-0">
                                        <button type="submit" name="submit"  class="btn btn-outline-success float-end">Submit</button>
                                      </div>
                                
                                    </div>
                                  </form>
                            
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Understood</button>
                            </div>
                        </div>
                        </div>
                    </div>

                </section>
                      
                   </div><!-- End quote -->
       
                   <!-- patient form  -->
                   <div class="col-xxl-9">
                   <?php  

$ret=mysqli_query($con,"select * from tblmedicalhistory  where PatientID='$prespid'");



 ?>
                         <div class="container-fluid box8 rounded" id="patients-patients-cont">
                        <table class="table datatable">
                            <thead>
                              <tr id="form-subhead">
                                <th scope="col">#</th>
                                <th scope="col">Visited Date</th>
                                <th scope="col">Symptoms</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>

                            <tbody>
                            <?php  
while ($row=mysqli_fetch_array($ret)) { 
  ?>
                                <tr>
                                <td class="center"><?php echo $cnt;?>.</td>
                                <td><?php echo $row['CreationDate'];?></td>
                                <td><?php echo $row['symptoms'];?></td>

                                    <td> 
                                    <a href="#" class="p-2"><i class="bi bi-eye"></i></a> 
                                        <a href="#"><i class="bi bi-download"></i></a>  
                                    </td>
                                    
                                  </tr>


                                <?php $cnt=$cnt+1;} ?>
                            </tbody>
                          </table>
                       
                      </div>

                       
                      </div><!-- End patient form-->

</div>



               
</section>

<!------------------------------------------------------MODAL--------------------------------------------------------->






  

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