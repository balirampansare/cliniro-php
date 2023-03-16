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
          <h5 class="card-title">Next Appointment</h5>

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
                  $result = mysqli_query($con,"SELECT Appt_Date FROM patappointments WHERE Appt_Patid=$patid AND Appt_Status='1' AND Appt_Date >= CURDATE() ORDER by Appt_Date ASC LIMIT 1;");
                  if ($row=mysqli_fetch_array($result)) { 
                    echo $row['Appt_Date'];
                    
                  } else { ?>
                    <div class="text-center pe-5">Not Scheduled</div>
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

  <div class="pagetitle">
      <h1>My Doctors</h1>
    </div>

  <div class="col-xxl-12 mx-auto">
                    <div class="container-fluid box8 rounded table-responsive" id="patients-patients-cont">
                        <table class="table datatable">
                            <thead>
                              <tr id="form-subhead">
                                <th scope="col">#</th>
                                <th scope="col">Dr. Name</th>
                                <th scope="col">Clinic Name</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Timing</th>
                                <th scope="col">Closed</th>
                                <th scope="col">Fees</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>

                            <tbody>
                            <?php
                            $docid=$_SESSION['id'];
                            $sql=mysqli_query($con,"SELECT * FROM users INNER JOIN tblmedicalhistory ON users.id = tblmedicalhistory.PatientID INNER JOIN doctors ON tblmedicalhistory.DocId = doctors.id WHERE PatientID= $docid GROUP BY DocId;");
                            $cnt=1;
                            while($row=mysqli_fetch_array($sql))
                            {
                            ?>
                                <tr>
                                <td class="center"><?php echo $cnt;?>.</td>
                                <td><?php echo $row['doctorName'];?></td>
                                <td><?php echo $row['clinic_name'];?></td>
                                <td><?php echo $row['clinic_contact'];?></td>
                                <td><?php echo $row['clinic_timing'];?></td>
                                <td><?php echo $row['closed'];?></td>
                                <td><?php echo $row['docFees'];?></td>                         
                                    <td>

                                        <a href="doctor-profile.php?viewid=<?php echo $row['DocId'];?>"> <button class="btn btn-outline-success"><i class="bi bi-eye"></i></button> </a> 
                                    </td>                                   
                                  </tr>

                                  <div class="modal fade" id="exampleModal<?php echo $row['DocId'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
      <form method="post" name="submit">
            <div class="row jumbotron rounded py-2">
                <!--div class="col-sm-12 form-group"-->
                    <div class="col-sm-12 form-group">
                    <label for="rate" class="form-label">Rate</label>
<input type="range" class="form-range" name="rate" min="0" max="5" id="customRange2" required>
                    </div>
                    
                    <div class="col-sm-12 form-group">
                        <label for="review" class="fw-semibold">Review:</label>
                        <textarea class="form-control border-bottom" name="review" id="review" placeholder="Other" cols="30" rows="2" required></textarea>
                    </div>
                    <div class="col-sm-12 form-group mt-1">
                      
                        <button type="submit" name="submit" class="btn btn-outline-success float-end">Submit</button>
                    </div>
                <!--/div-->
            </div>

        </form>
         <?php 
         if(isset($_POST['submit']))
         {
           
          
           $rate=$_POST['rate'];
           $review=$_POST['review'];
           $patid =$_SESSION['id'];
           $Docid = $row['DocId'];
          
         
           $query1=mysqli_query($con,"insert into ratings(ratedocid,ratepatid,rating,comment)values('$Docid','$patid','$rate','$review')");
           //$query=mysqli_query($con,"update tblmedicalhistory set PatientID='$prespid',PatientName='$patname',gender='$gender',age='$patage',bloodgrp='$patblood',BloodPressure='$bp',Weight='$weight',Temperature='$temp',tabname1='$tabname1',tabpat1='$tabpattern1',tabped1='$tabperiod1',tabday1='$tabdays1',tabother='$tabother',tests='$tests'  where ID='$prespid'");
           if ($query1) {
           echo '<script>alert("Review has been added.")</script>';
         
           echo "<script>window.location.href ='mydoctor.php'</script>";
           break;
         }
         else
           {
             echo '<script>alert("Something Went Wrong. Please try again")</script>';
           }
         
         
         }
         
         ?>
         
                           
                                  
      </div>
      
    </div>
  </div>
</div>
                                  
                                  

                                <?php 
                                $cnt++;}?>
                            </tbody>
                          </table>
                       
                      </div>
                     </div>
    </section>

    


    

<!-- Modal -->
  

  </main>


 

  

  <?php include('include/footer.php');?>

</body>

</html>

<?php } ?>