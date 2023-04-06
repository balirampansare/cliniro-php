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
  <h1>Stop Watch</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Clifea</li>
      <li class="breadcrumb-item active">Stop Watch</li>
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
        

        <div class="col-xxl-12 col-md-6">

          <div class="card info-card customers-card">
            <div class="card-body justify-cotent-center">
              <div class="d-flex align-items-center justify-cotent-center">
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
                      <h6  id="date" style="color:white;font-size:2px"></h6>
                    </div>
                  </div>
                </div>
              </div>

        </div>

        </div>

        </div><!-- End Stop watch Card -->
      </div>



</main><!-- End #main -->


 

  

<?php include('include/footer.php');?>


</body>

</html>

<?php } ?>