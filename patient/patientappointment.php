<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0))
{
 header('location:patientlogout.php');
  } else{
if(isset($_POST['submit']))
  {
    
    $docid=$_GET['patid'];
    $patid = $_SESSION['id'];
    $description = $_POST['apptdescrip'];
    $date = $_POST['appt'];
    $time = $_POST['time'];
    $status = 1;
   
 
      $query=mysqli_query($con, "insert into  patappointments(Appt_Patid,Appt_DocId,Appt_Descrip,Appt_Date,Appt_Time,Appt_Status)values('$patid','$docid','$description','$date','$time','$status')");
    if ($query) {
    echo '<script>alert("Appointment Booked")</script>';
    echo "<script>window.location.href ='mydoctor.php'</script>";
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}

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
        <h1>Appointments - 
        <?php
                                    $docid=$_GET['patid'];
                                    $ret=mysqli_query($con,"SELECT doctorName FROM doctors where id='$docid';");
                                    if ($row=mysqli_fetch_array($ret)) { ?>
                                    Dr.<?php echo $row['doctorName'];?></h4>
                            <?php } ?>

        </h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item">My Doctors</li>
            <li class="breadcrumb-item active">Appointments</li>
          </ol>
        </nav>
      </div>
      
      <section class="section">
        <?php
         $docid=$_GET['patid'];
         $patid = $_SESSION['id'];
         $ret=mysqli_query($con,"select * from users where id='$patid'");
         $cnt=1;
         while ($row=mysqli_fetch_array($ret)) {
        ?>
        
        <div class="d-flex flex-wrap text-center m-2 rounded" id="patient-nav">
          <a href="doctor-profile.php?viewid=<?php echo $docid;?>" class="p-2 flex-grow-1 border rounded m-2">Patient Info</a>
          <a href="prescription.php?prespid=<?php echo $docid;?>" class="p-2 flex-grow-1 border rounded m-2">Prescriptions</a>
          <a href="patientappointment.php?patid=<?php echo $docid;?>" class="p-2 flex-grow-1 border rounded m-2 border-success border-2 fw-bold">Appointments</a>
          <a href="patientbilling.php?patid=<?php echo $docid;?>" class="p-2 flex-grow-1 border rounded m-2">Billings</a>
        </div>
        
        <div class="row" >
          <div class="col-xxl-3 ">
            <div class="card">
              <img class="card-img-top" src="../assets/img/cardback.png" alt="Bologna">
              <div class="card-body text-center">
                <img class="avatar rounded-circle" src="assets/img/cliniro logo.png" alt="patientpic">
                <h4 class="card-title"><?php  echo $row['fullName'];?></h4>
                <div class="d-flex justify-content-between flex-wrap" id="form-subhead">
                  <div class="px-2"> <b>Id:</b>PT-<?php  echo $row['id'];?></div>
                  <div class="px-2"> <b>Weight:</b><?php  echo $row['Weight'];?></div>
                  <div class="px-2"> <b>Age:</b><?php  echo $row['Age'];?></div>
                  <div class="px-2"> <b>Gender:</b><?php  echo $row['gender'];?></div>
                  <div class="px-2"> <b>Allergies:</b> <?php  echo $row['Allergy'];?></div>
                </div>
                <hr class="mt-1">
                <a href="patient-profile.php"><button class="btn btn-outline-success mt-2 text-center align-items-center">Update Profile</button></a>
              </div>
            </div>
            <?php }?>
          </div>
          
          <div class="col-xxl-9">
            <div class="container-fluid box8 rounded table-responsive" id="patients-patients-cont">
              <form method="post" name="submit">
                  <div class="row mt-2 justify-content-end">
                      <div class="col-3 form-group">
                          <input type="text" class="form-control" name="apptdescrip" placeholder="Any Description" >
                      </div>
                      <div class="col-3 form-group">
                          <input type="date" class="form-control" name="appt" placeholder="Date"  required>
                      </div>
                      <div class="col-3 form-group">
                          <input type="time" class="form-control" name="time" placeholder="time">
                      </div>
                      <div class="col-1 px-1 form-group">
                          <button type="submit" name="submit" class="btn btn-outline-success ">Book</button>
                      </div>
                      <hr class="mt-2">
                  </div>
              </form>  
              
              <table class="table">
                <thead>
                  <tr id="form-subhead">
                    <th scope="col">#</th>
                    <th scope="col">Appointment</th>
                    <th scope="col">Time</th>
                    <th scope="col">Created</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                <tr>
          <td colspan="6" class="text-center fw-bold text-success">Today's Appointments</td>
        </tr>
                  <?php
                  $docid=$_GET['patid'];
                  $patid = $_SESSION['id'];
                  $ret=mysqli_query($con,"SELECT * FROM patappointments where Appt_Patid='$patid' AND Appt_Docid='$docid' AND Appt_Date = CURDATE();");
                  $i = 1;
                  while ($row=mysqli_fetch_array($ret)) { ?>
                  
                  <tr class="table-active">
                    <td class="center"><?php echo $i;?>.</td>
                    <td ><?php echo $row['Appt_Date'];?></td>
                    <td><?php echo $row['Appt_Time'];?></td>
                    <td><?php echo $row['Appt_Created'];?></td>
                    <td><?php echo $row['Appt_Descrip'];?></td>
                    <td> 
                      <?php if($row['Appt_Status']==1)
                      { ?>
                      <button class="btn btn-outline-success" disabled>Active</button>
                      <?php } else { ?>
                        <button type="button" class="btn btn-outline-danger" disabled>Canceled</button>
                        <?php } ?>
                      </td>
                    </tr>
                    <?php $i++; }?>

                    <tr>
          <td colspan="6" class="text-center fw-bold text-primary">Upcoming Appointments</td>
        </tr>
                  <?php
                  $docid=$_GET['patid'];
                  $patid = $_SESSION['id'];
                  $ret=mysqli_query($con,"SELECT * FROM patappointments where Appt_Patid='$patid' AND Appt_Docid='$docid' AND Appt_Date > CURDATE();");
                  $i = 1;
                  while ($row=mysqli_fetch_array($ret)) { ?>
                  
                  <tr class="table-warning">
                    <td class="center"><?php echo $i;?>.</td>
                    <td ><?php echo $row['Appt_Date'];?></td>
                    <td><?php echo $row['Appt_Time'];?></td>
                    <td><?php echo $row['Appt_Created'];?></td>
                    <td><?php echo $row['Appt_Descrip'];?></td>
                    <td> 
                      <?php if($row['Appt_Status']==1)
                      { ?>
                      <button class="btn btn-outline-success" disabled>Active</button>
                      <?php } else { ?>
                        <button type="button" class="btn btn-outline-danger" disabled>Canceled</button>
                        <?php } ?>
                      </td>
                    </tr>
                    <?php $i++; }?>

                    <tr>
          <td colspan="6" class="text-center fw-bold text-danger">Past Appointments</td>
        </tr>
                  <?php
                  $docid=$_GET['patid'];
                  $patid = $_SESSION['id'];
                  $ret=mysqli_query($con,"SELECT * FROM patappointments where Appt_Patid='$patid' AND Appt_Docid='$docid' AND Appt_Date < CURDATE();");
                  $i = 1;
                  while ($row=mysqli_fetch_array($ret)) { ?>
                  
                  <tr class="table-danger">
                    <td class="center"><?php echo $i;?>.</td>
                    <td ><?php echo $row['Appt_Date'];?></td>
                    <td><?php echo $row['Appt_Time'];?></td>
                    <td><?php echo $row['Appt_Created'];?></td>
                    <td><?php echo $row['Appt_Descrip'];?></td>
                    <td> 
                      <?php if($row['Appt_Status']==1)
                      { ?>
                      <button class="btn btn-outline-success" disabled>Done</button>
                      <?php } else { ?>
                        <button type="button" class="btn btn-outline-danger" disabled>Canceled</button>
                        <?php } ?>
                      </td>
                    </tr>
                    <?php $i++; }?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>         
       </section>
      </main>
      <?php include('include/footer.php');?>
    </body>
    </html>
<?php } ?>