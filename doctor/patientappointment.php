<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:doctorlogout.php');
  } else{
if(isset($_POST['submit']))
  {
    
    $patid=$_GET['patid'];
    $docid = $_SESSION['id'];
    $description = $_POST['paydescrp'];
    $total = $_POST['payamount'];
   
 
      $query=mysqli_query($con, "insert into  billing(Patid,DocId,Description,Amount)values('$patid','$docid','$description','$total')");
    if ($query) {
    echo '<script>alert("Bill Created")</script>';
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
      <h1>Patient Billing</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item">Patients</li>
          <li class="breadcrumb-item active">Billing</li>
        </ol>
      </nav>
    </div>

    <section class="section">
        <?php
        $patid=$_GET['patid'];
        $ret=mysqli_query($con,"select * from users where id='$patid'");
        $cnt=1;
        while ($row=mysqli_fetch_array($ret)) {
        ?>
        
        <div class="d-flex flex-wrap text-center m-2 rounded" id="patient-nav">
            <a href="view-patient.php?viewid=<?php echo $row['id'];?>" class="p-2 flex-grow-1 border rounded m-2">Patient Info</a>
            <a href="prescriptions.php?prespid=<?php echo $row['id'];?>" class="p-2 flex-grow-1 border rounded m-2">Prescriptions</a>
            <a href="patientappointment.php?patid=<?php echo $row['id'];?>" class="p-2 flex-grow-1 border rounded m-2 border-success border-2 fw-bold">Appointments</a>
            <a href="patientbilling.php?patid=<?php echo $row['id'];?>" class="p-2 flex-grow-1 border rounded m-2">Billings</a>
        </div>
        
        <div class="row" >
            <div class="col-xxl-3 ">
                <div class="card">
                    <img class="card-img-top" src="../assets/img/cardback.png" alt="Bologna">
                    <div class="card-body text-center">
                        <img class="avatar rounded-circle" src="../assets/img/messages-3.jpg" alt="patientpic">
                        <h4 class="card-title"><?php  echo $row['fullName'];?></h4>
                        <div class="d-flex justify-content-between flex-wrap" id="form-subhead">
                            <div class="px-2"> <b>Id:</b>PT-<?php  echo $row['id'];?></div>
                            <div class="px-2"> <b>Weight:</b><?php  echo $row['Weight'];?></div>
                            <div class="px-2"> <b>Age:</b><?php  echo $row['Age'];?></div>
                            <div class="px-2"> <b>Gender:</b><?php  echo $row['gender'];?></div>
                            <div class="px-2"> <b>Blood Grp:</b> <?php  echo $row['bloodgrp'];?></div>
                            <div class="px-2"> <b>Allergies:</b> <?php  echo $row['Allergy'];?></div>
                        </div>
                        <hr class="mt-1">
                        <button class="btn btn-outline-success mt-2 text-center align-items-center" data-bs-toggle="modal" data-bs-target="#billpayment">Add +</button>
                    </div>
                </div>
                <?php }?>
                
            </div>

            <div class="col-xxl-9">
                <div class="container-fluid box8 rounded table-responsive" id="patients-patients-cont">
                    <table class="table datatable">
                        <thead>
                            <tr id="form-subhead">
                                <th scope="col">#</th>
                                <th scope="col">Bill No.</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $docid = $_SESSION['id'];
                            $patid=$_GET['patid'];
                            $ret=mysqli_query($con,"SELECT * FROM users INNER JOIN billing ON users.id = billing.Patid INNER JOIN doctors ON billing.DocId = doctors.id where Patid='$patid' AND Docid='$docid';");
                            $i = 1;
                            while ($row=mysqli_fetch_array($ret)) { ?>
                            <tr>
                                <td class="center"><?php echo $i;?>.</td>
                                <td><?php echo $row['Billid'];?></td>
                                <td><?php echo $row['Created'];?></td>
                                <td> 
                                <button class="btn btn-outline-success text-center align-items-center" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $row['Billid']?>">View</button>
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