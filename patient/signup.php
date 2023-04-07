<?php
include_once('include/config.php');
if(isset($_POST['submit']))
{
$fname=$_POST['patname'];
$gender=$_POST['gender'];
$age=$_POST['age'];
$height=$_POST['height'];
$weight=$_POST['weight'];
$medhis=$_POST['medhis'];
$allergy=$_POST['allergy'];
$contact=$_POST['contact'];
$email=$_POST['email'];
$locality=$_POST['locality'];
$city=$_POST['city'];
$address=$_POST['address'];
$ename=$_POST['ename'];
$erelation=$_POST['erelation'];
$ephone=$_POST['ephone'];
$password=md5($_POST['password']);
$query=mysqli_query($con,"insert into users(fullname,address,city,gender,email,password,Age,Height,Weight,Medication,Allergy,Phone,Locality,Ename,Erelation,Econtact) values('$fname','$address','$city','$gender','$email','$password','$age','$height','$weight','$medhis','$allergy','$contact','$locality','$ename','$erelation','$ephone')");
if($query)
{
	echo "<script>alert('Successfully Registered. You can login now');</script>";
  echo "<script>window.location.href ='patientlogin.php'</script>";
	
}
else
{
  echo '<script>alert("Something Went Wrong. Please try again")</script>';
}

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Patient Signup</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo copy.svg" rel="icon">
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

  <script type="text/javascript">
function valid()
{
 if(document.registration.password.value!= document.registration.password_again.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.registration.password_again.focus();
return false;
}
return true;
}
</script>

</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-9 col-md-6 d-flex flex-column align-items-center justify-content-center">
              
              <div class="d-flex justify-content-center py-4">
                <a href="../index.php" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo copy.svg" alt="">
                  <span class="d-none d-lg-block me-1">Signup</span> <img src="assets/img/logo copy.svg" alt="">
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="">
                    <h5 class="card-title text-center pb-0 fs-4">Just one form to setup your patient profile</h5>
                    
                  </div>

                  <form name="registration" id="registration"  method="post" onSubmit="return valid();">
                            <div class="row jumbotron  rounded ">

                              <div class="d-flex">
                                <div class="fw-bold" id="form-subhead">Personal</div>
                              </div>
                              <div class=" mt-0"><hr></div>
                              <div class="col-sm-4 form-group">
                              <label for="doctorname">Patient Name</label>
                              <input type="text" class="form-control" name="patname" id="patname" required>
                            </div>
                            
                            <div class="col-sm-2 form-group">
                                <label for="sex">Gender</label>
                                <select name="gender" id="sex" class="form-control browser-default custom-select">
                                <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                  <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-sm-2 form-group">
                                <label for="age">Age</label>
                                <input type="number" class="form-control" name="age" id="patage"  required>
                            </div>


                            
                           
                            <div class="col-sm-2 form-group mt-1">
                                <label for="height">Height</label>
                                <input type="text" name="height" class="form-control" id="patheight">
                              </div>
                              <div class="col-sm-2 form-group mt-1">
                                <label for="weight">Weight</label>
                                <input type="text" class="form-control" name="weight" id="patweight">
                              </div>

                              <div class="col-sm-6 form-group mt-1">
                                <label for="medication">Any medication taken regularly</label>
                                <textarea class="form-control" name="medhis" id="medhis" cols="30" rows="2"></textarea>
                              </div>
                              <div class="col-sm-6 form-group mt-1">
                                <label for="allergy">Allergy / Medical problem</label>
                                <textarea class="form-control" name="allergy" id="patallergy" cols="30" rows="2"></textarea>
                              </div>

                            <!------------------------------------------------------------------>
                            <div class="col-sm-12 mt-3 fw-bold" id="form-subhead">
                            Contact <hr class="mt-0">
                            </div>
                            <div class="col-sm-3 form-group">
                              <label for="phone">Phone</label>
                              <input type="text" class="form-control" name="contact" title="format 10 digits" pattern="[1-9]{1}[0-9]{9}" id="patcontact"  required>
                            </div>
                            <div class="col-sm-5 form-group">
                              <label for="email">Email</label>
                              <input type="email" class="form-control" name="email" id="patemail"  required>
                           </div>
                           <div class="col-sm-2 form-group">
                            <label for="locality">Locality</label>
                            <input type="text" class="form-control" name="locality" id="patlocality"  required>
                          </div>

                          <div class="col-sm-2 form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="city" id="patcity"  required>
                          </div>

                          <div class="col-sm-12 form-group">
                            <label for="address">Patient Address</label>
                            <textarea name="address" class="form-control" required></textarea>
                          </div>

                            <div class="col-sm-12 mt-3 fw-bold" id="form-subhead">
                              Emergency Contact<hr class="mt-0">
                            </div>

                            <div class="col-sm-4 form-group">
                              <label for="ename">Name</label>
                              <input type="text" class="form-control" name="ename" id="ename">
                            </div>
                            <div class="col-sm-4 form-group">
                              <label for="erelation">Relation</label>
                              <input type="text" class="form-control" name="erelation" id="erelation">
                            </div>
                            <div class="col-sm-4 form-group">
                              <label for="ephone">Phone</label>
                              <input type="text" class="form-control" title="format 10 digits" pattern="[1-9]{1}[0-9]{9}" name="ephone" id="ephone">
                            </div>

                            <div class="col-sm-12 mt-3 fw-bold" id="form-subhead">
                              Password<hr class="mt-0">
                            </div>

                            <div class="col-sm-6 form-group">
                              <label for="password">Password</label>
                              <input type="password" class="form-control" title="min length: 8 with atleast one 0-9,a-z,A-Z,spl char" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$" name="password" id="password" required>
                            </div>
                            <div class="col-sm-6 form-group">
                              <label for="password_again">Enter Password Again</label>
                              <input type="password" class="form-control"  id="password_again" name="password_again"   required>
                            </div>

                           
                              
                              <div class="col-sm-12 form-group mt-3">
                                <hr class="mt-0">
                                <button  type="submit" name="submit" id="submit" class="btn btn-success col-12">Submit</button>
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
  </main><!-- End #main -->

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

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

 
  
  <!--script src="assets/js/config.js"></script-->
  <script src="assets/js/main.js"></script>

</body>



</html>