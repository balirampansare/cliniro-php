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
      <h1>Clifea</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Clifea</li>
        </ol>
      </nav>
    </div>

        
                     <div class="container-fluid box8 rounded table-responsive" id="patients-patients-cont">
                        <table class="table datatable">
                            <thead>
                              <tr id="form-subhead">
                                <th scope="col">#</th>
                                <th scope="col">Visited Date</th>
                                <th scope="col">Symptoms</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>

                            <tbody>
                            <?php
                             $docid = $_SESSION['id'];


                             $ret=mysqli_query($con,"SELECT * FROM users INNER JOIN tblmedicalhistory ON users.id = tblmedicalhistory.PatientID INNER JOIN doctors ON tblmedicalhistory.DocId = doctors.id WHERE PatientID='5' AND DocId='$docid';
                             ");
                             $i = 1;
while ($row=mysqli_fetch_array($ret)) { 
  
  ?>
  
                                <tr>
                                <td class="center"><?php echo $i;?>.</td>
                                <td><?php echo $row['CreationDate'];?></td>
                                <td><?php echo $row['symptoms'];?></td>

                                    <td> 
                                    
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?php echo $row['ID'] ?>">View</button>
                                        <button class="btn btn-outline-success m-1" onclick="GeneratePdf();" value="GeneratePdf"><i class="bi bi-download"></i></button>  
                                    </td>
                                    
                                  </tr>



                                  <div id="myModal<?php echo $row['ID'] ?>" class="modal fade modal-lg" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								 <button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Details</h4>
							</div>
							<div class="modal-body">
                            <form id ="form-print" enctype="text/plain">
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
                                                        <div class="text-center" id="form-subhead">9 am to 2pm | 6pm to 9pm</div>
                                                        <div class="text-center text-danger">Closed: Sunday</div>
                                                        <div class="text-center fw-bold" id="form-subhead">Contact:</div>
                                                        <div class="text-center" id="form-subhead"><?php echo $row['clinic_contact'];?> | 78965412587</div>
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
                                          <input type="text" class="form-control border-0 " name="tabname1" id="tabname" value="<?php  echo $row['tabname1'];?>" required>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                          <label for="tabpattern">Pattern</label>
                                          <input type="text" class="form-control border-0 " name="tabpattern1" id="tabpattern1" value="<?php  echo $row['tabpat1'];?>" required>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                          <label for="tabperiod">Period</label>
                                          <input type="text" class="form-control border-0 " name="tabperiod1" id="tabperiod1" value="<?php  echo $row['tabped1'];?>" required>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                          <label for="tabdays1">Day/Week/Mth</label>
                                          <input type="text" class="form-control border-0 " name="tabdays1" id="tabdays1" value="<?php  echo $row['tabday1'];?>" required>
                                        </div>
                                        <div class="col-sm-12 form-group mt-1">
                                            <textarea class="form-control border-0" name="pdftabother" id="tabother" cols="30" rows="2"><?php  echo $row['tabother'];?></textarea>
                                        </div>
                                        <div class="col-sm-12 mt-3 fw-bold" id="form-subhead"><hr>Tests/Advice/Other</div>
                                        <div class="col-sm-12 form-group mt-1">
                                            <textarea class="form-control border-0" name="pdftests" id="tests" cols="30" rows="2"><?php  echo $row['tests'];?></textarea>
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

                       
                     
  

  </main>


 

  

  <?php include('include/footer.php');?>

</body>

</html>

<?php } ?>