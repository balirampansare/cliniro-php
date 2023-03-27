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

      <li >
          <a class="nav-link nav-icon" href="#">
            <i class="bi bi-stopwatch"></i>
            <!--span class="badge bg-primary badge-number">4</span-->
          </a><!-- End Notification Icon -->
        </li><!-- End Notification Nav -->

        <li>

          <a class="nav-link nav-icon" href="scratchpad.php" >
            <i class="bi bi-easel2"></i>
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
      <h1>Clifea</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Clifea</li>
        </ol>
      </nav>
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



<!--div class="row row-cols-1 row-cols-md-2 g-4 justify-content-center">
  <div class="col-lg-4">
    <div class="card border border-dark rounded" style="width: 18rem;">
      <img src="https://www.talentmark.com/wp-content/uploads/2022/04/laboratory-700x395.jpg" class="card-img-top" alt="..." style="height:8rem;">
      <div class="card-body">
        <h4 class="text-center fw-bold mt-3" id="form-subhead">Patel Chemist</h4>
        <div><i class="bi bi-pin-map-fill fw-bold fs-5 text-justify"  id="form-subhead"> -</i>  Louis Wadi, Shop No. 9 Raj Krupa Socity, Thane West, Thane, Maharashtra 400604</div>
        <div><i class="bi bi-clock fw-bold fs-5"  id="form-subhead"> -</i>  9 am to 9 pm</div>
        <div><i class="bi bi-telephone fw-bold fs-5"  id="form-subhead"> -</i>  7854789658</div>
      </div>
      <div class="card-footer">
        
      
      <a href="http://maps.google.com/?q=<?php echo $add;?>" target="blank"><button class="btn btn-outline-success"><i class="bi bi-geo-alt"> Direction</i></button></a>      
      <a href="events.php?Eventid=<?php echo $row['Eventid'];?>"><button class="btn btn-outline-success float-end ms-1"><i class="bi bi-globe"></i></button></a>
    </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="card border border-dark rounded" style="width: 18rem;">
      <img src="https://www.cmss.gov.in/wp-content/uploads/2021/12/Slider-new.jpg" class="card-img-top" alt="..." style="height:8rem;">
      <div class="card-body">
        <h4 class="text-center fw-bold mt-3" id="form-subhead">Patel Chemist</h4>
        <div><i class="bi bi-pin-map-fill fw-bold fs-5 text-justify"  id="form-subhead"> -</i>  Louis Wadi, Shop No. 9 Raj Krupa Socity, Thane West, Thane, Maharashtra 400604</div>
        <div><i class="bi bi-clock fw-bold fs-5"  id="form-subhead"> -</i>  9 am to 9 pm</div>
        <div><i class="bi bi-telephone fw-bold fs-5"  id="form-subhead"> -</i>  7854789658</div>
      </div>
      <div class="card-footer">
        
      
      <a href="http://maps.google.com/?q=<?php echo $add;?>" target="blank"><button class="btn btn-outline-success"><i class="bi bi-geo-alt"> Direction</i></button></a>      
      <a href="events.php?Eventid=<?php echo $row['Eventid'];?>"><button class="btn btn-outline-success float-end ms-1"><i class="bi bi-globe"></i></button></a>
    </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="card border border-dark rounded" style="width: 18rem;">
      <img src="https://nccdriversed.com/wp-content/uploads/2015/02/10.12-Ambulanc-e.jpg" class="card-img-top" alt="..." style="height:8rem;">
      <div class="card-body">
        <h4 class="text-center fw-bold mt-3" id="form-subhead">Patel Chemist</h4>
        <div><i class="bi bi-pin-map-fill fw-bold fs-5 text-justify"  id="form-subhead"> -</i>  Louis Wadi, Shop No. 9 Raj Krupa Socity, Thane West, Thane, Maharashtra 400604</div>
        <div><i class="bi bi-clock fw-bold fs-5"  id="form-subhead"> -</i>  9 am to 9 pm</div>
        <div><i class="bi bi-telephone fw-bold fs-5"  id="form-subhead"> -</i>  7854789658</div>
      </div>
      <div class="card-footer">
        
      
      <a href="http://maps.google.com/?q=<?php echo $add;?>" target="blank"><button class="btn btn-outline-success"><i class="bi bi-geo-alt"> Direction</i></button></a>      
      <a href="events.php?Eventid=<?php echo $row['Eventid'];?>"><button class="btn btn-outline-success float-end ms-1"><i class="bi bi-globe"></i></button></a>
    </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="card border border-dark rounded" style="width: 18rem;">
      <img src="https://media.istockphoto.com/id/1411192752/vector/two-human-hands-are-holds-heart-wireframe-glowing-low-poly-heart-design-on-dark-blue.jpg?b=1&s=612x612&w=0&k=20&c=edEKMf7rs_M2atHscLaVWWyN95Z_L_bXtgujROs0OQA=" class="card-img-top" alt="..." style="height:8rem;">
      <div class="card-body">
        <h4 class="text-center fw-bold mt-3" id="form-subhead">Patel Chemist</h4>
        <div><i class="bi bi-pin-map-fill fw-bold fs-5 text-justify"  id="form-subhead"> -</i>  Louis Wadi, Shop No. 9 Raj Krupa Socity, Thane West, Thane, Maharashtra 400604</div>
        <div><i class="bi bi-clock fw-bold fs-5"  id="form-subhead"> -</i>  9 am to 9 pm</div>
        <div><i class="bi bi-telephone fw-bold fs-5"  id="form-subhead"> -</i>  7854789658</div>
      </div>
      <div class="card-footer">
        
      
      <a href="http://maps.google.com/?q=<?php echo $add;?>" target="blank"><button class="btn btn-outline-success"><i class="bi bi-geo-alt"> Direction</i></button></a>      
      <a href="events.php?Eventid=<?php echo $row['Eventid'];?>"><button class="btn btn-outline-success float-end ms-1"><i class="bi bi-globe"></i></button></a>
    </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="card border border-dark rounded" style="width: 18rem;">
      <img src="https://cdn.systematic.com/media/g0sj1tbg/hospital-building-001-global.jpg?mode=crop&width=1200&height=630&center=" class="card-img-top" alt="..." style="height:8rem;">
      <div class="card-body">
        <h4 class="text-center fw-bold mt-3" id="form-subhead">Patel Chemist</h4>
        <div><i class="bi bi-pin-map-fill fw-bold fs-5 text-justify"  id="form-subhead"> -</i>  Louis Wadi, Shop No. 9 Raj Krupa Socity, Thane West, Thane, Maharashtra 400604</div>
        <div><i class="bi bi-clock fw-bold fs-5"  id="form-subhead"> -</i>  9 am to 9 pm</div>
        <div><i class="bi bi-telephone fw-bold fs-5"  id="form-subhead"> -</i>  7854789658</div>
      </div>
      <div class="card-footer">
        
      
      <a href="http://maps.google.com/?q=<?php echo $add;?>" target="blank"><button class="btn btn-outline-success"><i class="bi bi-geo-alt"> Direction</i></button></a>      
      <a href="events.php?Eventid=<?php echo $row['Eventid'];?>"><button class="btn btn-outline-success float-end ms-1"><i class="bi bi-globe"></i></button></a>
    </div>
    </div>
  </div>
  
</div-->


<div class="row row-cols-1 row-cols-md-3 g-4">
<?php 
$ret=mysqli_query($con,"select * from inventory ");
        /*$ret=mysqli_query($con,"select * from inventory where Locality like '%$patloc%' and Type='$typeofreg' ");*/
          while ($row=mysqli_fetch_array($ret)) { 
        ?>
  <div class="col">
    <div class="card h-100">
      <img src="https://www.cmss.gov.in/wp-content/uploads/2021/12/Slider-new.jpg" class="card-img-top" alt="...">
      <div class="card-body">
      <h4 class="text-center fw-bold mt-3" id="form-subhead"><?php echo $row['Name'];?></h4>
        <div><i class="bi bi-pin-map-fill fw-bold fs-5 text-justify"  id="form-subhead"> -</i>  <?php echo $row['Address'];?></div>
        <div><i class="bi bi-clock fw-bold fs-5"  id="form-subhead"> -</i>  <?php echo $row['Timing'];?></div>
        <div><i class="bi bi-telephone fw-bold fs-5"  id="form-subhead"> -</i>  <?php echo $row['Contact'];?></div>
      </div>
      <div class="card-footer">
        
      
      <a href="http://maps.google.com/?q=<?php echo $row['Address'];?>" target="blank"><button class="btn btn-outline-success"><i class="bi bi-geo-alt"> Direction</i></button></a>      
      <a href="<?php echo $row['Website'];?>" target="blank"><button class="btn btn-outline-success float-end ms-1"><i class="bi bi-globe"></i></button></a>
      <!--a href="notedelete.php?noteid=<?php echo $row['Noteid'];?>"><button class="btn btn-outline-success float-end"><i class="bi bi-pencil-fill"></i></button></a-->  
    </div>
    </div>
  </div>
  <?php }  ?>
</div>