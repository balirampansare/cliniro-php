<?php
session_start();
include("include/config.php");
error_reporting(0); ?>



<!DOCTYPE html>
<html lang="en">

<?php include('include/head.php');?>

<body style="background: url('../assets/img/better.jfif');">
<?php 
if(isset($_POST['submit']))
{
$uname=$_POST['username'];
$dpassword=md5($_POST['password']);	
$ret=mysqli_query($con,"SELECT * FROM doctors WHERE docEmail='$uname' and password='$dpassword'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$_SESSION['dlogin']=$_POST['username'];
$_SESSION['id']=$num['id'];
$uid=$num['id'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
//Code Logs


/*header("location:doctorlanding.php")*/
echo '<script type="text/javascript">
 swal({
  title: "Setting up your profile",
  text: "Redirecting to your profile",
  type: "success",
  timer: 2000,
  showConfirmButton: false
}, function(){
      window.location.href = "doctorlanding.php";
});
 

       </script>';
}
else
{

  echo '<script type="text/javascript">
  swal({
    title:"Oops!",
    text: "Invalid Username or Password",
    icon: "error"
  }, function(){
        window.location.href = "doctorlogin.php";
  });

     </script>';


}
}
?>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="../index.php" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo copy.svg" alt="">
                  <span class="d-none d-lg-block text-primary">Doctor Login</span>
                </a>
              </div><!-- End Logo -->

              

              <div class="card ">
              <div class="d-flex flex-wrap text-center m-2 rounded" id="patient-nav">
                  <a href="../index.php" class="p-2 flex-grow-1 border rounded m-2"><i class="bi bi-house-door"></i></a>
                  <a href="doctorlogin.php" class="p-2 flex-grow-1 border rounded m-2 border-success border-2  fw-bold">Doctor</a>
                  <a href="../patient/patientlogin.php" class="p-2 flex-grow-1 border rounded m-2">Patient</a>
                  <a href="../receptionist/receplogin.php" class="p-2 flex-grow-1 border rounded m-2">Assistant</a>
                  
                </div>

                <div class="card-body">

                  <div class=" pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p>
								Please enter your email and password to log in.<br />
								<span style="color:red;"><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
							</p>
                  </div>

                  <form class="row g-3 needs-validation" method="post" novalidate>

                    <div class="col-12">
                      <label for="yourEmaillogin" class="form-label">Your Email</label>
                      <input type="email" name="username" class="form-control" id="yourEmaillogin" required>
                      <div class="invalid-feedback" id="error-name-login">Please enter a valid Email adddress!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourPasswordlogin" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPasswordlogin" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    
                    <div class="col-12">
                      <button  class="btn btn-primary w-100" type="submit" id="signin" name="submit" >Login</button>
                    </div>

                    <!--div class="form-actions">
								
								<button type="submit" class="btn btn-primary pull-right" name="submit">
									Login <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div-->

              
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="doctorsignup.php">Create an account</a></p>
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