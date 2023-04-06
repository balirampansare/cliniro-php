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

<?php 

if(isset($_POST['submit']))
{
$patname=$_POST['patname'];
$gender=$_POST['gender'];
$patage=$_POST['patage'];
$patheight=$_POST['patheight'];
$patweight=$_POST['patweight'];
$medhis=$_POST['medhis'];
$patallergy=$_POST['patallergy'];
$patcontact=$_POST['patcontact'];
$patemail=$_POST['patemail'];
$patlocality=$_POST['patlocality'];
$patcity=$_POST['patcity'];
$pataddress=$_POST['pataddress'];
$ename=$_POST['ename'];
$erelation=$_POST['erelation'];
$ephone=$_POST['ephone'];



$sql=mysqli_query($con,"Update users set fullName='$patname',address='$pataddress',city='$patcity',gender='$gender',email='$patemail',Age='$patage',Height='$patheight',Weight='$patweight',Medication='$medhis',Allergy='$patallergy',Phone='$patcontact',Locality='$patlocality',Ename='$ename',Erelation='$erelation',Econtact='$ephone' where id='".$_SESSION['id']."';");

if($sql)
{
  echo '<script type="text/javascript">
  swal({
    title:"Hurray!",
    text: "Details Updated Successfully",
    icon: "success"
  }, function(){
        window.location.href = "patient-profile.php";
  });

     </script>';

}
}
?>


  <?php include('include/header.php');?>
  <?php include('include/sidebar.php');?>


  

  <main class="main" id="main">
  <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div>
    
    <div class="section">
    <div class="d-flex flex-wrap text-center m-2 rounded" id="patient-nav">
  <a href="patient-profile.php" class="p-2 flex-grow-1 border rounded m-2  border-success border-2  fw-bold">Profile</a>
  <a href="patient-change-password.php" class="p-2 flex-grow-1 border rounded m-2">Change Password</a>
</div>

<div class="row" >
    <!-- quote -->

    <?php 
$sql=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($sql))
{
?>



    <div class="col-xxl-3 ">
      <div class="card">
        <img class="card-img-top" src="../assets/img/cardback.png" alt="Bologna">
        <div class="card-body text-center">
          <img class="avatar rounded-circle" src="assets/img/cliniro logo.png" alt="patientpic">

          <div>
          <h4 class="card-title"><?php echo htmlentities($row['fullName']);?></h4>
          

          </div>
          
          <!--h6 class="card-subtitle mb-2 text-muted">Famous Actor</h6>
          <p class="card-text">Robert John Downey Jr.'career has included critical and popular success in his youth, followed by a period of substance abuse and legal difficulties, and a resurgence of commercial success in middle age. </p>
          <a href="#" class="btn btn-info">Follow</a>
          <a href="#" class="btn btn-outline-info">Message</a-->

          <div class="d-flex justify-content-between flex-wrap" id="form-subhead">
                            <div class="px-2"> <b>Id:</b> PT- <?php echo $row['id'];?></div>
                            <div class="px-2"> <b>City:</b> <?php echo $row['city'];?></div>
                            
                            <div class="px-2"> <b>Gender:</b> <?php echo $row['gender'];?></div>
                            <div class="px-2"> <b>Email:</b> <?php echo $row['email'];?></div>
                            <div class="px-2"> <b>Address:</b> <?php echo $row['address'];?></div>
                          </div>
                          <div class="text-center">
                            <hr>Profile
                          </div>
                          <div class="d-flex justify-content-between flex-wrap" id="form-subhead">
                              <div class="px-2"> <b>Registerd:</b><?php echo $row['regDate'];?></div>
                              <div class="px-2">
                                <?php if($data['updationDate']){?>
                                    <b>Updated:</b> <?php echo $row['updationDate'];?>
                                <?php } ?>  
                              </div>
                          </div>

        </div>
      </div>

      
   </div><!-- End quote -->

   <!-- patient form  -->
   <div class="col-xxl-9">
                        <div class="container rounded" id="patients-patients-cont">
                          <form  name="submit" method="post">
                            <div class="row jumbotron box8 rounded py-2">

                              <div class="d-flex">
                                <div class="p-1 fw-bold" id="form-subhead">Personal</div>
                              </div>
                              <div class=" mt-0"><hr></div>
                              <div class="col-sm-4 form-group">
                              <label for="doctorname">Patient Name</label>
                              <input type="text" class="form-control" name="patname" id="patname" value="<?php  echo $row['fullName'];?>" required>
                            </div>
                            
                            <div class="col-sm-2 form-group">
                                <label for="sex">Gender</label>
                                <select name="gender" id="sex" class="form-control browser-default custom-select">
                                <option value="<?php  echo $row['gender'];?>">
                                <?php  echo $row['gender'];?></option>  
                                <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                  <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-sm-2 form-group">
                                <label for="age">Age</label>
                                <input type="number" class="form-control" name="patage" id="patage" value="<?php  echo $row['Age'];?>" required>
                            </div>


                            
                            <div class="col-sm-2 form-group mt-1">
                                <label for="height">Height</label>
                                <input type="text" name="patheight" class="form-control" id="patheight"value="<?php  echo $row['Height'];?>" required>
                              </div>
                              <div class="col-sm-2 form-group mt-1">
                                <label for="weight">Weight</label>
                                <input type="text" class="form-control" name="patweight" id="patweight" value="<?php  echo $row['Weight'];?>" required>
                              </div>

                              <div class="col-sm-6 form-group mt-1">
                                <label for="medication">Any medication taken regularly</label>
                                <textarea class="form-control" name="medhis" id="medhis" cols="30" rows="2"><?php  echo $row['Medication'];?></textarea>
                              </div>
                              <div class="col-sm-6 form-group mt-1">
                                <label for="allergy">Allergy / Medical problem</label>
                                <textarea class="form-control" name="patallergy" id="patallergy" cols="30" rows="2"><?php  echo $row['Allergy'];?></textarea>
                              </div>

                            <!------------------------------------------------------------------>
                            <div class="col-sm-12 mt-3 fw-bold" id="form-subhead">
                            Contact <hr class="mt-0">
                            </div>
                            <div class="col-sm-3 form-group">
                              <label for="phone">Phone</label>
                              <input type="text" class="form-control" name="patcontact" id="patcontact" title="format 10 digits" pattern="[1-9]{1}[0-9]{9}" value="<?php  echo $row['Phone'];?>" required>
                            </div>
                            <div class="col-sm-5 form-group">
                              <label for="email">Email</label>
                              <input type="email" class="form-control" name="patemail" id="email" value="<?php  echo $row['email'];?>" required>
                           </div>
                           <div class="col-sm-2 form-group">
                            <label for="locality">Locality</label>
                            <input type="text" class="form-control" name="patlocality" id="patlocality" value="<?php  echo $row['Locality'];?>" required>
                          </div>

                          <div class="col-sm-2 form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="patcity" id="patcity" value="<?php  echo $row['city'];?>" required>
                          </div>

                          <div class="col-sm-12 form-group">
                            <label for="address">Patient Address</label>
                            <textarea name="pataddress" class="form-control" required><?php  echo $row['address'];?></textarea>
                          </div>

                            <div class="col-sm-12 mt-3 fw-bold" id="form-subhead">
                              Emergency <hr class="mt-0">
                            </div>

                            <div class="col-sm-4 form-group">
                              <label for="ename">Name</label>
                              <input type="text" class="form-control" name="ename" id="ename" value="<?php  echo $row['Ename'];?>" required>
                            </div>
                            <div class="col-sm-4 form-group">
                              <label for="erelation">Relation</label>
                              <input type="text" class="form-control" name="erelation" id="erelation" value="<?php  echo $row['Erelation'];?>" required>
                            </div>
                            <div class="col-sm-4 form-group">
                              <label for="ephone">Phone</label>
                              <input type="text" class="form-control" name="ephone" id="ephone" title="format 10 digits" pattern="[1-9]{1}[0-9]{9}" value="<?php  echo $row['Econtact'];?>" required>
                            </div>

                            <!--------------------------------------------------------------------->
                           

                            
                            
                              
                              <!--div class="col-sm-12">
                                <input type="checkbox" class="form-check d-inline" id="chb" required><label for="chb" class="form-check-label">&nbsp;I accept all terms and conditions.
                                </label>
                              </div-->
                              
                              <div class="col-sm-12 form-group mt-3">
                                <hr class="mt-0">
                                <button  type="submit" name="submit" id="submit" class="btn btn-outline-success float-end">Update</button>
                              </div>
                        
                            </div>
                            <?php }?>
                          </form>
                        </div>
                      </div>
   <!-- End patient form-->
   </div>

    </div>
  

  </main>

  <?php include('include/footer.php');?>

 

  

   

</body>

</html>

<?php } ?>