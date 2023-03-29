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
url: "check_username_availability.php",
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

<body>

<?php include('include/header.php');?>
<?php include('include/sidebar.php');?>

  <main class="main" id="main">
  <div class="pagetitle">
      <h1>Search Patient</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item">Patients</li>
          <li class="breadcrumb-item active">Search Patient</li>
        </ol>
      </nav>
    </div>

    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-9 col-md-6 d-flex flex-column align-items-center justify-content-center">

              

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

                            <div class="col-sm-4 form-group">
                              <label for="email">Dr. Email</label>
                              <input type="email" id="docemail" name="docemail" class="form-control"  placeholder="Enter Doctor Email id" required="true" onBlur="checkemailAvailability()" >
                              <span id="email-availability-status"></span>
                           </div>                          
                             <!--------------------------------------------------------------------->
                             <div class="col-sm-12 mt-3 fw-bold" id="form-subhead">
                              Encryption<hr class="mt-0">
                            </div>
                            <div class="col-sm-6 form-group">
                              <label for="exampleInputPassword1">Password</label>
                              <input type="password" name="npass" class="form-control"  placeholder="New Password" required>
														</div>				
                            <div class="col-sm-6 form-group">
															<label for="exampleInputPassword2">Confirm Password</label>
                              <input type="password" name="cfpass" class="form-control"  placeholder="Confirm Password" required>
							</div>
                                                       
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


 

  
  <?php include('include/footer.php');?>

</body>

</html>

<?php } ?>