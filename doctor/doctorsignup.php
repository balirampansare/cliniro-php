<?php
include('include/config.php');


if(isset($_POST['submit']))
{	
$docname=$_POST['docname'];
$docgender=$_POST['docgender'];
$docage=$_POST['docage'];
$docdob=$_POST['docdob'];
$docspecialization=$_POST['Doctorspecialization'];
$doccontactno=$_POST['doccontact'];
$docemail=$_POST['docemail'];
$clinicname=$_POST['clinicname'];
$cliniccontact=$_POST['cliniccontact'];
$cliniclocality=$_POST['cliniclocality'];
$cliniccity=$_POST['cliniccity'];
$clinictiming=$_POST['clinictiming'];
$closed=$_POST['closed'];
$docfees=$_POST['docfees'];
$docaddress=$_POST['clinicaddress'];
$password=md5($_POST['npass']);

$sql=mysqli_query($con,"insert into doctors(specilization,doctorName,address,docFees,contactno,docEmail,gender,age,dob,clinic_name,clinic_contact,clinic_locality,clinic_city,password) values('$docspecialization','$docname','$docaddress','$docfees','$doccontactno','$docemail','$docgender','$docage','$docdob','$clinicname','$cliniccontact','$cliniclocality','$cliniccity','$password')");
if($sql)
{
echo "<script>alert('Doctor info added Successfully');</script>";
echo "<script>window.location.href ='managedoctor.php'</script>";

}
}
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


    <script type="text/javascript">
function valid()
{
 if(document.adddoc.npass.value!= document.adddoc.cfpass.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.adddoc.cfpass.focus();
return false;
}
return true;
}
</script>


<script>
function checkemailAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#docemail").val(),
type: "POST",
success:function(data){
$("#email-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>


</head>

<!--script>
  const uid = sessionStorage.getItem("uid")

  if (uid == null){
    window.location.href = "pages-login.html"
  }
</script-->

<body>

<main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-9 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo copy.svg" alt="">
                  <span class="d-none d-lg-block me-1">Sigup</span> <img src="assets/img/logo copy.svg" alt="">
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="">
                    <h5 class="card-title text-center pb-0 fs-4">Just one form to setup your profile</h5>
                    
                  </div>
                  <form role="form" name="adddoc" method="post" onSubmit="return valid();">
                          <div class="row jumbotron  rounded py-2">
                            <!--div class="col-sm-12 mx-t3">
                              <h2 class="text-center text-info">Register</h2>
                            </div-->

                            <div class="d-flex">
                              <div class="p-1 fw-bold" id="form-subhead">Personal</div>
                            </div>
                            <div class=" mt-0"><hr></div>

                            <!--div class="col-sm-12 mt-3 fw-bold" id="form-subhead">
                                Personal <hr class="mt-0">

                            </div-->
                            <div class="col-sm-5 form-group">
                              <label for="doctorname">Dr. Name</label>
                              <input type="text" class="form-control" name="docname" placeholder="Enter name." required>
                            </div>
                            <div class="col-sm-2 form-group">
                                <label for="sex">Gender</label>
                                <select id="sex" name="docgender" class="form-control browser-default custom-select">
                                  <option value="male">Male</option>
                                  <option value="female">Female</option>
                                  <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="col-sm-2 form-group">
                                <label for="docage">Age</label>
                                <input type="number" class="form-control" name="docage" id="age" placeholder="age" required>
                            </div>

                            <div class="col-sm-3 form-group mt-1">
                                <label for="Date">Date Of Birth</label>
                                <input type="Date" name="docdob" class="form-control" id="Date" placeholder="" required>
                            </div>


                            <div class="col-sm-5 form-group">
															<label for="DoctorSpecialization">
																Doctor Specialization
															</label>
							                <select name="Doctorspecialization" class="form-control" required="true">
																<option value="">Select Specialization</option>
                                  <?php $ret=mysqli_query($con,"select * from doctorspecilization");
                                  while($row=mysqli_fetch_array($ret))
                                  {
                                  ?>
																<option value="<?php echo htmlentities($row['specilization']);?>">
																	<?php echo htmlentities($row['specilization']);?>
																</option>
																<?php } ?>
																
															</select>
														</div>

                            <div class="col-sm-3 form-group">
                              <label for="phone">Dr. Phone</label>
                              <input type="number" class="form-control" name="doccontact" id="phone" placeholder="phone" required>
                            </div>
                            <div class="col-sm-4 form-group">
                              <label for="email">Dr. Email</label>
                              <input type="email" id="docemail" name="docemail" class="form-control"  placeholder="Enter Doctor Email id" required="true" onBlur="checkemailAvailability()">
                              <span id="email-availability-status"></span>
                           </div>

                            <!------------------------------------------------------------------>
 
                            <!--------------------------------------------------------------------->
                          
                            <!--------------------------------------------------------------------->
                            <div class="col-sm-12 mt-3 fw-bold" id="form-subhead">
                              Clinic Details <hr class="mt-0">
                            </div>

                            <div class="col-sm-5 form-group">
                              <label for="clinicname">Clinic Name</label>
                              <input type="text" class="form-control" name="clinicname" id="clinicname" placeholder="Name" required>
                            </div>
                            <div class="col-sm-4 form-group">
                              <label for="cliniccontact">Clinic Contact</label>
                              <input type="number" class="form-control" name="cliniccontact" id="cliniccontact" placeholder="Contact" required>
                            </div>
                            <div class="col-sm-3 form-group">
                            <label for="cliniclocality">clinicLocality</label>
                            <input type="text" class="form-control" name="cliniclocality" id="cliniclocality" placeholder="locality" required>
                          </div>

                         

                          <div class="col-sm-2 form-group">
                            <label for="cliniccity">Clinic City</label>
                            <input type="text" class="form-control" name="cliniccity" required>
                          </div>
                          <div class="col-sm-4 form-group">
                            <label for="clinictiming">Clinic Timing</label>
                            <input type="text" class="form-control" name="clinictiming"  required>
                          </div>
                          <div class="col-sm-4 form-group">
                            <label for="closed">Clinic Closed On</label>
                            <input type="text" class="form-control" name="closed"  required>
                          </div>
                            <div class="col-sm-2 form-group">
                              <label for="docfees">Fees</label>
                              <input type="text" class="form-control" name="docfees"  required>
                            </div>

                            <div class="col-sm-12 form-group">
                            <label for="address">Doctor Clinic Address</label>
                            <textarea name="clinicaddress" class="form-control"></textarea>
													</div>
                             <!--------------------------------------------------------------------->
                             <div class="col-sm-12 mt-3 fw-bold" id="form-subhead">
                              Encryption<hr class="mt-0">
                            </div>
                            <div class="col-sm-6 form-group">
                              <label for="exampleInputPassword1">Password</label>
                              <input type="password" name="npass" class="form-control"  placeholder="New Password" required="required">
														</div>				
                            <div class="col-sm-6 form-group">
															<label for="exampleInputPassword2">Confirm Password</label>
                              <input type="password" name="cfpass" class="form-control"  placeholder="Confirm Password" required="required">
														</div>
                            
                            <!--div class="col-sm-12">
                              <input type="checkbox" class="form-check d-inline" id="chb" required><label for="chb" class="form-check-label">&nbsp;I accept all terms and conditions.
                              </label>
                            </div-->
                            
                            <div class="col-sm-12 form-group mt-3">
                              <hr class="mt-0">
                              <button type="submit" name="submit" id="submit" class="btn btn-outline-success float-end">Submit</button>
                            </div>
                      
                          </div>
                        </form>

                </div>
              </div>

              

            </div>
          </div>
        </div>

      </section>

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

