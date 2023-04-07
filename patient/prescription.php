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
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Cliniro</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/logo.svg" rel="icon">

  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">


  <script data-require="jquery@*" data-semver="3.0.0" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css" />
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.1/html2pdf.bundle.min.js" integrity="sha512vDKWohFHe2vkVWXHp3tKvIxxXg0pJxeid5eo+UjdjME3DBFBn2F8yWOE0XmiFcFbXxrEOR1JriWEno5Ckpn15A=="
		crossorigin="anonymous">
	</script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
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
      <h1>Prescriptions - 
      <?php
                                    $docid=$_GET['prespid'];
                                    $ret=mysqli_query($con,"SELECT doctorName FROM doctors where id='$docid';");
                                    if ($row=mysqli_fetch_array($ret)) { ?>
                                    Dr.<?php echo $row['doctorName'];?></h4>
                            <?php } ?>

      
      </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="patientlanding.php">Home</a></li>
          <li class="breadcrumb-item">My Doctors</li>
          <li class="breadcrumb-item active">Prescriptions</li>
        </ol>
      </nav>
    </div>
    
    <section class="section">
      <?php
      $prespid=$_SESSION['id'];
      $docid=$_GET['prespid'];
      $ret=mysqli_query($con,"select * from users where id='$prespid'");
      $cnt=1;
      while ($row=mysqli_fetch_array($ret)) {
      ?>
      
      
      <div class="d-flex flex-wrap text-center m-2 rounded" id="patient-nav">
        <a href="doctor-profile.php?viewid=<?php echo $docid;?>" class="p-2 flex-grow-1 border rounded m-2">Doctor Info</a>
        <a href="prescription.php?prespid=<?php echo $docid;?>" class="p-2 flex-grow-1 border rounded m-2 border-success border-2  fw-bold">Prescriptions</a>
        <a href="patientappointment.php?patid=<?php echo $docid;?>" class="p-2 flex-grow-1 border rounded m-2">Appointments</a>
        <a href="patientbilling.php?patid=<?php echo $docid;?>" class="p-2 flex-grow-1 border rounded m-2">Billings</a>
      </div>
      
      <div class="row" >
        <div class="col-md-4 col-lg-3">
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
        
        <div class="col-md-8 col-lg-9">
          <div class="container-fluid box8 rounded table-responsive" id="patients-patients-cont">
            <table class="table datatable">
              <thead>
                <tr id="form-subhead">
                  <th scope="col">#</th>
                  <th scope="col">Visited Date</th>
                  <th scope="col">Symptoms</th>
                  <th scope="col">Prescription</th>
                  <th scope="col">Payment</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $patientid = $_SESSION['id'];
                  $docid=$_GET['prespid'];
                  $ret=mysqli_query($con,"SELECT * FROM users INNER JOIN tblmedicalhistory ON users.id = tblmedicalhistory.PatientID INNER JOIN doctors ON tblmedicalhistory.DocId = doctors.id WHERE PatientID='$patientid' AND DocId='$docid' ORDER BY tblmedicalhistory.CreationDate DESC;;");
                  $i = 1;
                  while ($row=mysqli_fetch_array($ret)) { 
                  ?>
                  
                  <tr>
                    <td class="center"><?php echo $i;?>.</td>
                    <td><?php echo $row['CreationDate'];?></td>
                    <td><?php echo $row['symptoms'];?></td>
                    <td> 
                      <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#myModal<?php echo $row['ID'] ?>">View</button>
                      <button class="btn btn-outline-success m-1" onclick="GeneratePdf();" value="GeneratePdf"><i class="bi bi-download"></i></button>  
                    </td>
                    
                    <td>
                      <?php
                      if ($row['PayAmount']>0) { 
                        ?>
                        <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#presppaymentview<?php echo $row['ID'] ?>">View</button>
                        <?php
                        } else { ?>
                        
                        <button type="button" class="btn btn-outline-danger" disabled >Not Paid</button>
                        <?php } ?>
                    </td>
                  </tr>
                  
                  <div id="myModal<?php echo $row['ID'] ?>" class="modal fade modal-lg" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-body">
                            <div id="form-print" enctype="text/plain">                              
                                <div class="row">
                                    <div class="row">
                                        <div class="col-sm-2 text-center justify-content-center m-auto">
                                            <img src="assets/img/logo.svg"  alt="" style="width:100px; height:100px; ">
                                        </div>
                                        <div class="col-sm-10">
                                            
                                              <div class="row">
                                                  <div class="col-sm-7">
                                                      <div class="text-center fw-bold fs-3" id="form-subhead">Dr. <?php echo $row['doctorName'];?></div>
                                                      <div class="text-center fw-bold fs-5" id="form-subhead"> <img src="assets/img/logo.svg" alt="" style="width:15px; height:15px">
                                                          <?php echo $row['clinic_name'];?> <img src="assets/img/logo.svg" alt="" style="width:15px; height:15px"> 
                                                      </div> 
                                                      <div class="text-center fw-bold fs-5" id="form-subhead"><?php echo $row['specilization'];?> Specialist</div>
                                                  </div>
                                                  <div class="col-sm-5">
                                                      <div class="text-center fw-bold" id="form-subhead">Timing:</div>
                                                      <div class="text-center" id="form-subhead"><?php echo $row['clinic_timing'];?></div>
                                                      <div class="text-center text-danger">Closed: <?php echo $row['closed'];?></div>
                                                      <div class="text-center fw-bold" id="form-subhead">Contact:</div>
                                                      <div class="text-center" id="form-subhead"><?php echo $row['clinic_contact'];?>
                                                    
                                                    </div>
                                                  </div>
                                              </div>
                                              <div class="d-flex flex-row">
                                                  <div class="fw-bold mx-2" id="form-subhead">Address:</div>
                                                  <div id="form-subhead"><?php echo $row['address'];?></div>
                                              </div>
                                          </div>
                                            <hr style="border: 1px solid #012970;;"> 
                                            </div> <!---------END OF HEADER----------->
                                            <div class="col-sm-4 text-center form-group">
                                                <label for="doctorname" class="fw-bold">Name:</label>
                                                <input type="text" class="form-control text-center border-0" name="pdfname" id="patname" value="<?php  echo $row['PatientName'];?>" readonly  >
                                            </div>
                                            <div class="col-sm-2 text-center form-group">
                                                <label for="sex" class="fw-bold">Gender:</label>
                                                <input type="text" class="form-control text-center border-0" name="pdfgender" id="sex" value="<?php  echo $row['gender'];?>" readonly  >
                                            </div>
                                            <div class="col-sm-2 text-center form-group">
                                                <label for="age" class="fw-bold">Age:</label>
                                                <input type="number" class="form-control text-center border-0" name="pdfpatage" id="patage" value="<?php  echo $row['age'];?>" required readonly >
                                            </div>
                                            <div class="col-sm-2 text-center form-group">
                                                <label for="blood" class="fw-bold">Blood Group:</label>
                                                <input type="text" class="form-control text-center border-0" name="pdfpatblood" id="blood" value="<?php  echo $row['bloodgrp'];?>" readonly readonly >
                                            </div>
                                            <div class="col-sm-2 text-center form-group">
                                                <label for="weight" class="fw-bold">Weight</label>
                                                <input type="number" class="form-control text-center border-0" name="pdfweight" id="patweight" value="<?php  echo $row['Weight'];?>" required readonly>
                                            </div>
                                            <div class="col-sm-4 text-center form-group mt-1">
                                                <label for="bp" class="fw-bold">BP</label>
                                                <input type="number" class="form-control text-center border-0" name="pdfbp" id="patbp" value="<?php  echo $row['BloodPressure'];?>" required readonly>
                                            </div>
                                            <div class="col-sm-2 text-center form-group mt-1">
                                                <label for="temp" class="fw-bold">Temp</label>
                                                <input type="number" class="form-control text-center border-0" name="pdftemp" id="patbp" value="<?php  echo $row['Temperature'];?>"  required readonly>
                                            </div>
                                            <hr>
                                            <div class="col-sm-12  fw-bold form-group" id="form-subhead">Symptoms: </div>
                                            <div class="col-sm-12 form-group">
                                                <textarea class="form-control border-0" name="pdfsymptoms" id="symptoms" cols="30" rows=auto readonly><?php  echo $row['symptoms'];?></textarea>
                                            </div>
                                            <div class="col-sm-12 mt-3 fw-bold" id="form-subhead">Tablets <hr class="mt-0"></div>
                                            <!--section-->
                                        <div class="col-sm-5 form-group">
                                          <label for="tabname">Name</label>
                                          <input type="text" class="form-control border-0 " name="tabname1" id="tabname" value="<?php  echo $row['tabname1'];?>" required readonly>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                          <label for="tabpattern">Pattern</label>
                                          <input type="text" class="form-control border-0 " name="tabpattern1" id="tabpattern1" value="<?php  echo $row['tabpat1'];?>" required readonly>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                          <label for="tabperiod">Period</label>
                                          <input type="text" class="form-control border-0 " name="tabperiod1" id="tabperiod1" value="<?php  echo $row['tabped1'];?>" required readonly>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                          <label for="tabdays1">Day/Week/Mth</label>
                                          <input type="text" class="form-control border-0 " name="tabdays1" id="tabdays1" value="<?php  echo $row['tabday1'];?>" required readonly>
                                        </div>
                                        <div class="col-sm-12 form-group mt-1">
                                            <textarea class="form-control border-0" name="pdftabother" id="tabother" cols="30" rows="2" readonly><?php  echo $row['tabother'];?></textarea>
                                        </div>
                                        <div class="col-sm-12 mt-3 fw-bold" id="form-subhead"><hr>Tests/Advice/Other</div>
                                        <div class="col-sm-12 form-group mt-1">
                                            <textarea class="form-control border-0" name="pdftests" id="tests" cols="30" rows="2" readonly><?php  echo $row['tests'];?></textarea>
                                        </div>
                                        <hr>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                    <div class="modal fade modal-lg " id="presppaymentview<?php echo $row['ID'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            
                            <div class="modal-body">
                              
                                <form method="post" name="submit">
                                    <div class="row jumbotron rounded py-2">
                                      <!--div class="col-sm-12 mx-t3">
                                        <h2 class="text-center text-info">Register</h2>
                                      </div-->
                                      
          
                                      <div class="row">
                  <div class="col-sm-2 text-center justify-content-center m-auto">
                    <img src="assets/img/logo.svg"  alt="" style="width:100px; height:100px; ">
                  </div>
                  <div class="col-sm-10">
                    <div class="row">
                    <div class="col-sm-7">
                  <div class="text-center fw-bold fs-3" id="form-subhead">Dr. <?php echo $row['doctorName'];?></div>
                  <div class="text-center fw-bold fs-5" id="form-subhead"> <img src="assets/img/logo.svg" alt="" style="width:15px; height:15px">
                  <?php echo $row['clinic_name'];?> <img src="assets/img/logo.svg" alt="" style="width:15px; height:15px"> </div> 
                  <div class="text-center fw-bold fs-5" id="form-subhead"><?php echo $row['specilization'];?> Specialist</div>
                  
                </div>
                  
                  <div class="col-sm-5">
                  <div class="text-center fw-bold" id="form-subhead">Timing:</div>
                  <div class="text-center" id="form-subhead"><?php echo $row['clinic_timing'];?></div>
                  <div class="text-center text-danger">Closed: <?php echo $row['closed'];?></div>
                  <div class="text-center fw-bold" id="form-subhead">Contact:</div>
                  <div class="text-center" id="form-subhead"><?php echo $row['clinic_contact'];?></div>
                  
                  </div>

                    </div>
                    <div class="d-flex flex-row">
                    <div class="fw-bold mx-2" id="form-subhead">Address:</div>
                  <div id="form-subhead"><?php echo $row['address'];?></div>
                    </div>

                  </div>
                  <hr style="border: 1px solid #012970;"> 

              </div> <!---------END OF HEADER----------->

              <div class="col-sm-8 form-group text-center fw-bold ">
                                          <label for="tabname text-center fw-bold">Description</label>
                                          <hr class="text-primary fw-bold">
                                          <input type="text" class="form-control" name="paydescrp" id="tabname" value="<?php echo $row['PayDescription'];?>" required readonly>
                                        </div>

                                        <div class="col-sm-4 form-group text-center fw-bold">
                                          <label for="tabname ">Total</label>
                                          <hr class="text-primary fw-bold">
                                          <input type="text" class="form-control" name="payamount" id="tabname" value="<?php echo $row['PayAmount'];?>/-" required readonly>
                                        </div>
                                    </div>
                                  </form>
                            
                            </div>
                        </div>
                        </div>
                    </div>
            <?php $i++;}?>
        </tbody>
    </table>
</div>
</div><!-- End patient form-->

</div>



               
</section>

<!------------------------------------------END OF VIEW PAYMENT MODAL------------------->
  </main>
 
  <?php include('include/footer.php');?>

  <script>
  function GeneratePdf() {
    var element = document.getElementById('form-print');
    var opt = {
      margin:       0.2,
      filename:     'myfile.pdf',
      image:        { type: 'jpeg', quality: 0.98 },
      html2canvas:  { scale: 2 },
      jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
    };
    html2pdf(element, opt);
  }
  </script>

  

</body>

</html>

<?php } ?>