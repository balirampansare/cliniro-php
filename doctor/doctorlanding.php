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

<?php include('include/header.php');?>
<?php include('include/sidebar.php');?>

  <main id="main" class="main">

<div class="pagetitle">
  <h1>Clifea</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="doctorlanding.php">Home</a></li>
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
                <li><a class="dropdown-item" href="appointments.php">View</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Appointments</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-5" >
                  <h6>
                    <?php
                      date_default_timezone_set("Asia/Kolkata");
                      $todaydate =date("Y-m-d");
                      $docid = $_SESSION['id'];
                      $result = mysqli_query($con,"SELECT * FROM patappointments where Appt_Docid = '$docid' and Appt_Date='$todaydate' and Appt_Status='1';");
                      $num_rows = mysqli_num_rows($result);
                      {
                        echo htmlentities($num_rows);  
                      }
                    ?>

                  </h6>
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
                <li><a class="dropdown-item" href="events.php">View</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Events</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-table"></i>
                </div>
                <div class="ps-5">
                  <h6>
                  <?php
                      date_default_timezone_set("Asia/Kolkata");
                      $todaydate =date("Y-m-d");
                      $docid = $_SESSION['id'];
                      $result = mysqli_query($con,"SELECT * FROM events where Docid = '$docid' and Event_date='$todaydate';");
                      $num_rows = mysqli_num_rows($result);
                      {
                        echo htmlentities($num_rows);  
                      }
                    ?>
                  </h6>
                </div>
              </div>

            </div>
          </div>

        </div><!-- End Events Card -->

        <!-- Stop watch Card -->
        <div class="col-xxl-3 col-md-6">

          <div class="card info-card customers-card">
            <div class="card-body">
              <div class="d-flex align-items-center">
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
              <form onSubmit="return false;" class="d-flex">
                <input class="form-control me-2" type="text " placeholder="Enter city" aria-label="Search" id="cityinput">
                <button type="button" class="btn btn-outline-success"  id="add">Search</button>
              </form>
              </div>
            </div>
          </div><!-- End weather-->
        </div>



<!-- -------------------------------------------START OF NEWS SECTION------------- -->
<div class="container mt-3">
<div class="row">
<div class="col-sm-11" id="news-head">Be Updated</div>
<div class="col-sm-1 "> <a href="beupdated.php"><button class="btn btn-outline-success btn-sm">View</button></a></div>
</div>
</div>

<hr>



<!--div class="card-group mt-1">
<div class="card rounded mx-3">
<img src="assets/img/card.jpg" class="card-img-top" alt="...">
<div class="card-body">
  <h5 class="card-title">Card title</h5>
  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
</div>
<div class="card-footer">
  <small class="text-muted">Last updated 3 mins ago</small>
</div>
</div>

<div class="card rounded mx-3">
<img src="assets/img/card.jpg" class="card-img-top" alt="...">
<div class="card-body">
  <h5 class="card-title">Card title</h5>
  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
</div>
<div class="card-footer">
  <small class="text-muted">Last updated 3 mins ago</small>
</div>
</div>

<div class="card rounded mx-3">
<img src="assets/img/card.jpg" class="card-img-top" alt="...">
<div class="card-body">
  <h5 class="card-title">Card title</h5>
  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
</div>
<div class="card-footer">
  <small class="text-muted">Last updated 3 mins ago</small>
</div>
</div>

</div-->

<!--rssapp-wall id="9CCLUg7bG3yiDeda"></rssapp-wall><script src="https://widget.rss.app/v1/wall.js" type="text/javascript" async></script-->

<rssapp-wall id="epf8uhi4hBBVHzDM"></rssapp-wall><script src="https://widget.rss.app/v1/wall.js" type="text/javascript" async></script> 
</section>

</main><!-- End #main -->


 

  

<?php include('include/footer.php');?>


</body>

</html>

<?php } ?>