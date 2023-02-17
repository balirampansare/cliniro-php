<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:doctorlogout.php');
  } else{

if(isset($_POST['submit']))
{	
$vid=$_GET['viewid'];
$patname=$_POST['patname'];
$gender=$_POST['gender'];
$patage=$_POST['patage'];
$patblood=$_POST['patblood'];
$patsugar=$_POST['patsugar'];
$patdob=$_POST['patdob'];
$patheight=$_POST['patheight'];
$patweight=$_POST['patweight'];
$medhis=$_POST['medhis'];
$patallergy=$_POST['patallergy'];
$patcontact=$_POST['patcontact'];
$patemail=$_POST['patemail'];
$patlocality=$_POST['patlocality'];
$patcity=$_POST['patcity'];
$pataddress=$_POST['pataddress'];
$ename=$_POST['ename'];
$erelation=$_POST['erelation'];
$ephone=$_POST['ephone'];
$refdrname=$_POST['refdrname'];
$refdrclinic=$_POST['refdrclinic'];
$refdrcontact=$_POST['refdrcontact'];
$refdrlocality=$_POST['refdrlocality'];
$refdremail=$_POST['refdremail'];
$refdraddress=$_POST['refdraddress'];
$patother=$_POST['patother'];

$sql=mysqli_query($con,"update tblpatient set PatientName='$patname',PatientContno='$patcontact',PatientEmail='$patemail',PatientGender='$gender',PatientAdd='$pataddress',PatientAge='$patage',PatientMedhis='$medhis', bloodgrp='$patblood', height='$patheight', sugar='$patsugar',dob='$patdob',weight='$patweight',allergy='$patallergy',locality='$patlocality',city='$patcity',ename='$ename',erelation='$erelation',ephone='$ephone',refdrname='$refdrname',refdrclinic='$refdrclinic',refdrcontact='$refdrcontact',refdrlocality='$refdrlocality',refdremail='$refdremail',refdradd='$refdraddress',patother='$patother' where ID='$vid'");
if($sql)
{
echo "<script>alert('Patient info updated Successfully');</script>";
header("location:manage-patient.php");

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
        <a class="nav-link collapsed"  href="dashboard.php">
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
            <a href="appointments.php">
              <i class="bi bi-circle"></i><span>Appointments</span>
            </a>
          </li>
          <li>
            <a href="add-patient.php">
              <i class="bi bi-circle"></i><span>Add Patient</span>
            </a>
          </li>
          <li>
            <a href="search-patient.php">
              <i class="bi bi-circle"></i><span>Search Patient</span>
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
        <a class="nav-link collapsed" href="beupdated.php">
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
        <a class="nav-link collapsed" href="scratchpad.php">
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
        <a class="nav-link collapsed" href="faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" href="contactus.php">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="doctorlogout.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Sign Out</span>
        </a>
      </li><!-- End Login Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->

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
                          <h4 class="card-title"><?php  echo $row['fullName'];?></h4>
                          <div class="d-flex justify-content-between flex-wrap" id="form-subhead">
                            <div class="px-2"> <b>Id:</b>PT-<?php  echo $row['id'];?></div>
                            <div class="px-2"> <b>Weight:</b><?php  echo $row['weight'];?></div>
                            <div class="px-2"> <b>Age:</b><?php  echo $row['Age'];?></div>
                            <div class="px-2"> <b>Gender:</b><?php  echo $row['gender'];?></div>
                            <div class="px-2"> <b>Blood Grp:</b> <?php  echo $row['bloodgrp'];?></div>
                            <div class="px-2"> <b>Allergies:</b> <?php  echo $row['Allergy'];?></div>
                          </div>

                          <div class="text-center">
                            <hr>Profile
                          </div>
                          <div class="d-flex justify-content-between flex-wrap" id="form-subhead">
                              <div class="px-2"> <b>Registerd:</b><?php  echo $row['regDate'];?></div>
                              <div class="px-2">
                                <?php if($row['UpdationDate']){?>
                                    <b>Updated:</b> <?php  echo $row['UpdationDate'];?>
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

                              <div class="col-auto ">
                              <label for="doctorname" class="col-form-label">Patient Name:</label></div>
                              <div class="col-auto ">
                              <input type="text" class="form-control border-0" name="patname" id="patname" value="<?php  echo $row['fullName'];?>" required>
                            </div>
                            
                            <div class="col-auto">
                                <label for="sex" class="col-form-label">Gender:</label></div>
                            <div class="col-auto ms-0">
                                <select name="gender" id="sex" class="form-control border-0 browser-default custom-select">
                                <option value="<?php  echo $row['gender'];?>">
                                <?php  echo $row['gender'];?></option>  
                                <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                  <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-sm-2 form-group">
                                <label for="age">Age</label>
                                <input type="number" class="form-control border-0" name="patage" id="patage" value="<?php  echo $row['Age'];?>" required>
                            </div>


                            <div class="col-sm-2 form-group mt-1">
                                <label for="blood">Blood Group</label>
                                <select id="blood" name="patblood"  class="form-control border-0 browser-default custom-select">
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
                                <select id="sugar" name="patsugar" class="form-control border-0 browser-default custom-select">
                                <option value="<?php  echo $row['sugar'];?>">
                                <?php  echo $row['sugar'];?></option>    
                                <option value="none">None</option>
                                    <option value="type1">Type1</option>
                                    <option value="type2">Type2</option>
                                  </select>
                            </div>
                            <div class="col-sm-3 form-group mt-1">
                                <label for="Date">Date Of Birth</label>
                                <input type="Date" name="patdob" class="form-control border-0" id="patdob" value="<?php  echo $row['dob'];?>" required>
                            </div>
                            <div class="col-sm-2 form-group mt-1">
                                <label for="height">Height</label>
                                <input type="text" name="patheight" class="form-control border-0" id="patheight"value="<?php  echo $row['Height'];?>" required>
                              </div>
                              <div class="col-sm-2 form-group mt-1">
                                <label for="weight">Weight</label>
                                <input type="text" class="form-control border-0" name="patweight" id="patweight" value="<?php  echo $row['Weight'];?>" required>
                              </div>

                              <div class="col-sm-6 form-group mt-1">
                                <label for="medication">Any medication taken regularly</label>
                                <textarea class="form-control border-0" name="medhis" id="medhis" cols="30" rows="2"><?php  echo $row['Medication'];?></textarea>
                              </div>
                              <div class="col-sm-6 form-group mt-1">
                                <label for="allergy">Allergy / Medical problem</label>
                                <textarea class="form-control border-0" name="patallergy" id="patallergy" cols="30" rows="2"><?php  echo $row['Allergy'];?></textarea>
                              </div>

                            <!------------------------------------------------------------------>
                            <div class="col-sm-12 mt-3 fw-bold" id="form-subhead">
                            Contact <hr class="mt-0">
                            </div>
                            <div class="col-sm-3 form-group">
                              <label for="phone">Phone</label>
                              <input type="tel" class="form-control border-0" name="patcontact" id="patcontact" value="<?php  echo $row['Phone'];?>" required>
                            </div>
                            <div class="col-sm-5 form-group">
                              <label for="email">Email</label>
                              <input type="email" class="form-control border-0" name="patemail" id="patemail" value="<?php  echo $row['email'];?>" required>
                           </div>
                           <div class="col-sm-2 form-group">
                            <label for="locality">Locality</label>
                            <input type="text" class="form-control border-0" name="patlocality" id="patlocality" value="<?php  echo $row['Locality'];?>" required>
                          </div>

                          <div class="col-sm-2 form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control border-0" name="patcity" id="patcity" value="<?php  echo $row['city'];?>" required>
                          </div>

                          <div class="col-sm-6 form-group">
                            <label for="address">Patient Address</label>
                            <textarea name="pataddress" class="form-control border-0" required><?php  echo $row['address'];?></textarea>
                          </div>

                            <div class="col-sm-12 mt-3 fw-bold" id="form-subhead">
                              Emergency Contact <hr class="mt-0">
                            </div>

                            <div class="col-sm-4 form-group">
                              <label for="ename">Name</label>
                              <input type="text" class="form-control border-0" name="ename" id="ename" value="<?php  echo $row['Ename'];?>" required>
                            </div>
                            <div class="col-sm-4 form-group">
                              <label for="erelation">Relation</label>
                              <input type="text" class="form-control border-0" name="erelation" id="erelation" value="<?php  echo $row['Erelation'];?>" required>
                            </div>
                            <div class="col-sm-4 form-group">
                              <label for="ephone">Phone</label>
                              <input type="tel" class="form-control border-0" name="ephone" id="ephone" value="<?php  echo $row['Econtact'];?>" required>
                            </div>

                            <!--------------------------------------------------------------------->
                           
                              
                              <!--div class="col-sm-12">
                                <input type="checkbox" class="form-check d-inline" id="chb" required><label for="chb" class="form-check-label">&nbsp;I accept all terms and conditions.
                                </label>
                              </div-->
                              
                              <!--div class="col-sm-12 form-group mt-3">
                                <hr class="mt-0">
                                <button  type="submit" name="submit" id="submit" class="btn btn-outline-success float-end">Update</button>
                              </div-->
                        
                            </div>
                            <?php }?>
                          </form>
                        </div>
                      </div><!-- End patient form-->

</div>

               
</section>





  

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