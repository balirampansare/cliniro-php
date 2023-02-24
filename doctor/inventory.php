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
        <h1>Inventory</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Inventory</a></li>
                <li class="breadcrumb-item active">Doctors Inventory</li>
            </ol>
        </nav>
    </div>

      <section>
        <form role="form" method="post" name="search">
            <div class="row border border-primary p-2 rounded">
              <div class="col-sm-4 text-center form-group">
                  <label for="patname" class="fw-bold">Dr. Name:</label>
                  <input type="text" class="form-control " name="patname" value="" id="patname" placeholder="">
              </div>
              <div class="col-sm-2 text-center form-group">
                  <label for="patloc" class="fw-bold">Locality:</label>
                  <input type="text" class="form-control " name="patloc" value="" id="patloc" placeholder="">
              </div>
              <div class="col-sm-2 text-center form-group">
                  <label for="patcity" class="fw-bold">City:</label>
                  <input type="text" class="form-control" name="patcity" value="" id="patcity" placeholder="">
              </div>
              <div class="col-sm-2 text-center form-group">
                  <label for="patpin" class="fw-bold">Pincode:</label>
                  <input type="text" class="form-control" name="patpin" value="" id="patpin" placeholder="">
              </div>
              <div class="col-sm-2 text-center form-group mt-3">
                <button type="submit" name="search" id="submit" class="btn btn-outline-success">Submit</button>
              </div>
            </div>

        </form>

        <?php
        if(isset($_POST['search']))
        { 
          $patname=$_POST['patname'];
          $patloc=$_POST['patloc'];
          $patcity=$_POST['patcity'];
          $patpin=$_POST['patpin'];
        
        $ret=mysqli_query($con,"select * from doctors where (doctorName like '%$patname%'|| clinic_locality like '%$patloc%')");
        $num=mysqli_num_rows($ret);
        echo $num;
        if($num>0)
        {
          while ($row=mysqli_fetch_array($ret)) { 
        ?>
        <div class="card mt-4 m-auto" style="max-width: 800px;">
          <div class="row g-0">
            <!--div class="col-md-4">
              <img src="https://resize.indiatvnews.com/en/resize/newbucket/1200_-/2021/07/doctor-1625125747.jpg" class="img-fluid rounded-start" alt="...">
            </div-->
            <div class="col-lg-12">
              <div class="card-body">
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
                  <div class="card-footer">
                    <a href="http://maps.google.com/?q=<?php echo $add;?>" target="blank"><button class="btn btn-outline-success"><i class="bi bi-geo-alt"></i></button></a>      
                    <a href="events.php?Eventid=<?php echo $row['Eventid'];?>"><button class="btn btn-outline-success float-end ms-1"><i class="bi bi-trash"></i></button></a>
                    <!--a href="notedelete.php?noteid=<?php echo $row['Noteid'];?>"><button class="btn btn-outline-success float-end"><i class="bi bi-pencil-fill"></i></button></a-->  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php }} else { ?>
          <div>No record found</div>
          <?php }
        } ?>
      </section>

    

    


  </main>

  <?php include('include/footer.php');?>


</body>

</html>

<?php } ?>