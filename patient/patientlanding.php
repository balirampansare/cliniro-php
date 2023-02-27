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

    <section class="section dashboard">
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
          <h5 class="card-title">Upcoming Appointment</h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-people"></i>
            </div>
            <div class="ps-5" >
              <h6>
                <?php
                  date_default_timezone_set("Asia/Kolkata");
                  $todaydate =date("Y-m-d");
                  $patid = $_SESSION['id'];
                  $result = mysqli_query($con,"SELECT Appt_Date FROM patappointments WHERE Appt_Patid=$patid AND Appt_Status='1' AND Appt_Date >= $todaydate ORDER by Appt_Date DESC LIMIT 1");
                  if ($row=mysqli_fetch_array($result)) { 
                    echo $row['Appt_Date']
                    
                    ?>  
                  
               <?php } ?>

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
            <li><a class="dropdown-item" href="patient-profile.php">Update</a></li>
          </ul>
        </div>

        <div class="card-body">
        <?php 
        $sql=mysqli_query($con,"SELECT * FROM users where id= ".$_SESSION['id'].";");
        while($data=mysqli_fetch_array($sql)) 
        {
        ?>
          <h5 class="card-title">Height</h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-h-circle"></i>
            </div>
            <div class="ps-5">
              <h6>
              <?php echo $data['Height']?>
              </h6>
            </div>
          </div>

        </div>
      </div>

    </div><!-- End Events Card -->

    <!-- Stop watch Card -->
    <div class="col-xxl-3 col-md-6">

      <div class="card info-card revenue-card">

        <div class="filter">
          <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <li><a class="dropdown-item" href="patient-profile.php">Update</a></li>
          </ul>
        </div>

        <div class="card-body">
          <h5 class="card-title">Weight</h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-pip-fill"></i>
            </div>
            <div class="ps-5">
              <h6>
              <?php echo $data['Weight']?>
              </h6>
            </div>
          </div>

        </div>
        <?php } ?>
      </div>

    </div>
    </div>

    </div><!-- End Stop watch Card -->
  </div>

    </section>
  

  </main>


 

  

  <?php include('include/footer.php');?>

</body>

</html>

<?php } ?>