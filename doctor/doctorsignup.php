<?php
include('include/config.php');


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




<!--script>
  const uid = sessionStorage.getItem("uid")

  if (uid == null){
    window.location.href = "pages-login.html"
  }
</script-->

<body >
<?php
if(isset($_POST['submit']))
{

$npass=md5($_POST['npass']);
$cfpass=md5($_POST['cfpass']);
   if( $npass != $cfpass){
    echo '<script type="text/javascript">
    swal({
      title:"Oops!",
      text: "Password and Confirm Password didnt matched",
      icon: "error"
    }, function(){
          window.location.href = "doctorsignup.php";
    });

       </script>';



   } 
        else
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

        $sql=mysqli_query($con,"insert into doctors(specilization,doctorName,address,docFees,contactno,docEmail,gender,age,dob,clinic_name,clinic_contact,clinic_locality,clinic_city,clinic_timing,closed,password) values('$docspecialization','$docname','$docaddress','$docfees','$doccontactno','$docemail','$docgender','$docage','$docdob','$clinicname','$cliniccontact','$cliniclocality','$cliniccity','$clinictiming','$closed','$password')");
        if($sql)
        {
        
            echo '<script type="text/javascript">
            swal({
            title: "Account Created Successfully!",
            text: "Redirecting in 2 seconds",
            type: "success",
            timer: 2000,
            showConfirmButton: false
        }, function(){
                window.location.href = "doctorlogin.php";
        });
            
        
                </script>';

        }

        }

}

?>

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
                                <select id="sex" name="docgender" class="form-control browser-default custom-select" required>
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
                              <input type="text" class="form-control" name="doccontact" title="format 10 digits" pattern="[1-9]{1}[0-9]{9}" id="phone" placeholder="phone" required>
                            </div>
                            <div class="col-sm-4 form-group">
                              <label for="email">Dr. Email</label>
                              <input type="email" id="docemail" name="docemail" class="form-control"  placeholder="Enter Doctor Email id" required="true" onBlur="checkemailAvailability()" >
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
                              <input type="text" class="form-control" name="cliniccontact" title="format 10 digits" pattern="[1-9]{1}[0-9]{9}" id="cliniccontact" placeholder="Contact" required>
                            </div>
                            <div class="col-sm-3 form-group">
                            <label for="cliniclocality">Clinic Locality</label>
                            <input type="text" class="form-control" name="cliniclocality" id="cliniclocality" placeholder="locality" required>
                          </div>

                         

                          <div class="col-sm-2 form-group">
                            <label for="cliniccity">Clinic City</label>
                            <input type="text" class="form-control" name="cliniccity" placeholder="cliniccity" required>
                          </div>
                          <div class="col-sm-4 form-group">
                            <label for="clinictiming">Clinic Timing</label>
                            <input type="text" class="form-control" name="clinictiming" placeholder="clinictiming"  required>
                          </div>
                          <div class="col-sm-4 form-group">
                            <label for="closed">Clinic Closed On</label>
                            <input type="text" class="form-control" name="closed" placeholder="closed"  required>
                          </div>
                            <div class="col-sm-2 form-group">
                              <label for="docfees">Fees</label>
                              <input type="text" class="form-control" name="docfees" placeholder="fees"  required>
                            </div>

                            <div class="col-sm-12 form-group">
                            <label for="address">Doctor Clinic Address</label>
                            <textarea name="clinicaddress" class="form-control" required></textarea>
													</div>
                             <!--------------------------------------------------------------------->
                             <div class="col-sm-12 mt-3 fw-bold" id="form-subhead">
                              Encryption<hr class="mt-0">
                            </div>
                            <div class="col-sm-6 form-group">
                              <label for="exampleInputPassword1">Password</label>
                              <input type="password" name="npass" class="form-control" title="min length: 8 with atleast one 0-9,a-z,A-Z,spl char" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$"  placeholder="Password" required>
														</div>				
                            <div class="col-sm-6 form-group">
															<label for="exampleInputPassword2">Confirm Password</label>
                              <input type="password" name="cfpass" class="form-control"  placeholder="Confirm Password" required>
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


 

  

  <?php include('include/footer.php');?>

</body>

</html>

