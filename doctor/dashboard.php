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

  <main id="main" class="main">

<div class="pagetitle">
  <h1>Clifea</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Clifea</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">

<!-- -------------------------------------------START OF TIME,APPOINTMENT,EVENTS,STOPWATCH ROW------------- -->
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Time Card -->
        <div class="col-xxl-3 col-md-6">
          <div class="card info-card sales-card">
            <div class="filter">
              <span class="text-success small pt-1 pe-4 fw-bold" id="timer"></span> 
            </div>

            <div class="card-body">
              <h5 class="card-title">Clock</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-clock"></i>
                </div>
                <div class="ps-3">
                  <h6 id="date"></h6>
                  <!--span class="text-success small pt-1 fw-bold" id="timer"></span--> 
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Time Card -->

        <!-- Appointments Card -->
        <div class="col-xxl-3 col-md-6">
          <div class="card info-card revenue-card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Cancel</a></li>
                <li><a class="dropdown-item" href="#">View</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Appointments</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-5" >
                  <h6>64</h6>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Appoinments Card -->

        <!-- Events Card -->
        <div class="col-xxl-3 col-md-6">

          <div class="card info-card customers-card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Cancel</a></li>
                <li><a class="dropdown-item" href="#">View</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Events</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-table"></i>
                </div>
                <div class="ps-5">
                  <h6>12</h6>
                </div>
              </div>

            </div>
          </div>

        </div><!-- End Events Card -->

        <!-- Stop watch Card -->
        <div class="col-xxl-3 col-md-6">

          <div class="card info-card customers-card">

            <!--div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Cancel</a></li>
                <li><a class="dropdown-item" href="#">View</a></li>
              </ul>
            </div-->

            <div class="card-body">
              <!--h5 class="card-title">Stop Watch</h5-->

              <div class="d-flex align-items-center">
                <!--div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-stopwatch"></i>
                </div-- >
                <div class="ps-5">
                  <div class="stopwatch">
                    <div class="profilehead"><span class="material-icons">timer</span></div-->
                    <div class="circle mt-4 ps-3">
                      <span class="text-success large pt-1 pe-4 fw-bold " id="display">00:00:00</span>
                    </div>
              
                    <div class="controls mt-4 ms-3">
                      <button class="buttonPlay">
                        <img id="playButton" src="https://cdn-icons-png.flaticon.com/512/6878/6878705.png" />
              
                        <img id="pauseButton" src="https://cdn-icons-png.flaticon.com/512/6878/6878704.png" />
                      </button>
              
                      <button class="buttonReset">
                        <img id="resetButton" src="https://cdn-icons-png.flaticon.com/512/6532/6532052.png" />
                      </button>
                    </div>
                  </div>
                </div>
              </div>

        </div>

        </div>

        </div><!-- End Stop watch Card -->
      </div>

<!-- -------------------------------------------START OF QUOTE,WEATHER ROW------------- -->
      <div class="row">
         <!-- quote -->
         <div class="col-xxl-8">
          <div class="card">

            <div class="card-body">
              <h5 class="card-title">Quote <span>/Today</span></h5>

              <!-- Line Chart -->
                <h1>
                <!--i class="fas fa-quote-left"></i-->
                <span class="quote" id="quote"></span>
                <!--i class="fas fa-quote-right"></i-->
                </h1>
                <p class="author" id="author"></p>
                
                <hr/>
                <div class="float-end">
                    <!--a class="twitter" id="tweet" data-size="large" target="_blank" rel="noopener noreferrer"><i class="bi bi-twitter"></i></a-->
                    <!--add an onclick event on 'next quote' button-->
                    <a class="btn btn-outline-success" id="tweet"><i class="bi bi-twitter"></i></a>
                    <button class="btn btn-outline-success" onclick="getNewQuote()">New quote</button>
                </div>
            

            </div>

          </div>
        </div><!-- End quote -->

        <!-- Weather  -->
        <div class="col-xxl-4">
          <div class="card recent-sales overflow-auto">

            <div class="filter px-2">
              <h3 class="weather-icon-main "><i class="bi bi-clouds-fill"></i></h3>
            </div>

            <div class="card-body">
              <h5 class="card-title">Weather <span>| Today</span></h5>                
              <div class="container-fluid">
                <div class="align-items-center justify-content-center">
                  <div class="weather-icon d-flex "><i class="bi bi-geo"></i><span id="cityoutput"></span></div>
                <div class="weather-icon d-flex" ><i class="bi bi-info-circle"></i><span id="description"></span></div>
                <div class="weather-icon d-flex p-2"> <i class="bi bi-thermometer-sun"></i><span id="temp"></span></div>
                <div class="weather-icon d-flex "> <i class="bi bi-wind"></i><span id="wind"></span></div>
              </div> 
              </div>
              <form class="d-flex">
                <input class="form-control me-2" type="text " placeholder="Enter city" aria-label="Search" id="cityinput">
                <button type="button" class="btn btn-outline-success"  id="add">Search</button>
              </form>
              </div>
            </div>
          </div><!-- End weather-->
        </div>


<!-- -------------------------------------------START OF DRAWING PAD ROW------------- -->

<div class="container2 mt-3">

<section class="tools-board">
<div class="drawrow">
  <label class="title">Shapes</label>
  <ul class="options">
    <li class="option tool" id="rectangle">
      <img src="assets/img/rectangle.svg" alt="">
      <span>Rectangle</span>
    </li>
    <li class="option tool" id="circle">
      <img src="assets/img/circle.svg" alt="">
      <span>Circle</span>
    </li>
    <li class="option tool" id="triangle">
      <img src="assets/img/triangle.svg" alt="">
      <span>Triangle</span>
    </li>
    <li class="option">
      <input type="checkbox" id="fill-color" name="fill-color">
      <label for="fill-color">Filled shape</label>
    </li>
  </ul>
</div>
<div class="drawrow">
  <label class="title">Options</label>
  <ul class="options">
    <li class="option active tool" id="brush">
      <img src="assets/img/brush.svg" alt="">
      <span>Brush</span>
    </li>
    <li class="option tool" id="eraser">
      <img src="assets/img/eraser.svg" alt="">
      <span>Eraser</span>
    </li>
    <li class="option">
      <input type="range" id="size-slider" min="1" max="30" value="5">
    </li>
  </ul>
</div>
<div class="drawrow colors">
  <label class="title">Colors</label>
  <ul class="options">
    <li class="option"></li>
    <li class="option selected"></li>
    <li class="option"></li>
    <li class="option"></li>
    <li class="option">
      <input type="color" id="color-picker" value="#4A98F7">
    </li>
  </ul>
</div>
<div class="d-flex my-2">
  <button class="btn btn-outline-success fw-bold btn-sm" id="clear-canvas">Clear Canvas</button>
  <button class="btn btn-outline-success fw-bold btn-sm ms-1" id="save-img">Save As Image</button>
</div>
</section>

<section class="drawing-board rounded">
<canvas></canvas>
</section>

</div>

<!-- -------------------------------------------START OF NEWS SECTION------------- -->
<div class="container mt-3">
<div class="row">
<div class="col-sm-11" id="news-head">Be Updated</div>
<div class="col-sm-1 "><button class="btn btn-outline-success btn-sm">View</button></div>
</div>
</div>

<hr>

<div class="card-group mt-1">
<div class="card p-2 rounded mx-3 my-1">
<img src="assets/img/card.jpg" class="card-img-top" alt="...">
<div class="card-body">
  <h5 class="card-title">Card title</h5>
  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
</div>
<div class="card-footer">
  <small class="text-muted">Last updated 3 mins ago</small>
</div>
</div>
<div class="card p-2 rounded mx-3 my-1">
<img src="assets/img/card.jpg" class="card-img-top" alt="...">
<div class="card-body">
  <h5 class="card-title">Card title</h5>
  <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
</div>
<div class="card-footer">
  <small class="text-muted">Last updated 3 mins ago</small>
</div>
</div>
<div class="card p-2 rounded mx-3 my-1">
<img src="assets/img/card.jpg" class="card-img-top" alt="...">
<div class="card-body">
  <h5 class="card-title">Card title</h5>
  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
</div>
<div class="card-footer">
  <small class="text-muted">Last updated 3 mins ago</small>
</div>
</div>
</div>
      
</section>

</main><!-- End #main -->


 

  

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