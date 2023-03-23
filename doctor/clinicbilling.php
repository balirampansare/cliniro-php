<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:doctorlogout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $docid = $_SESSION['id'];
    $event = $_POST['event'];
    $edate = $_POST['edate'];
    $etime = $_POST['etime'];
    $eventaddress = $_POST['eventaddress'];
    $eventother = $_POST['eventother'];

    $query=mysqli_query($con, "insert into  events(Docid,Event_name,Event_date,Event_time,Event_address,Event_other)values('$docid','$event','$edate','$etime','$eventaddress','$eventother')");
    if ($query) {
    
    echo "<script>window.location.href ='events.php'</script>";
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  }
  

  if (isset($_GET['Eventid'])) {

    $eventid = $_GET['Eventid'];

    $query=mysqli_query($con, "delete from events where Eventid='$eventid' ");
if ($query) {

echo "<script>window.location.href ='events.php'</script>";
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
        <h1>Events</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Schedules</a></li>
                <li class="breadcrumb-item active">Events</li>
            </ol>
        </nav>
    </div>

    <div class="text-center">
        <button class="btn btn-outline-success " data-bs-toggle="modal" data-bs-target="#exampleModal">Add +</button>
        <hr>
       
    </div>

    <div class="modal fade modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      
      <div class="modal-body">
      <form method="post" name="submit">
                                        <div class="row jumbotron rounded py-2">
                                            <?php
                                            $ret=mysqli_query($con,"select * from doctors  where id='".$_SESSION['id']."'");
                                            while ($row=mysqli_fetch_array($ret)) { 
                                            ?>       
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
                                                <?php }?>
                                            </div> <!---------END OF HEADER----------->
                                            
                                            <div class="col-sm-4 text-center form-group">
                                                <label for="doctorname" class="fw-bold">Name:</label>
                                                <input type="text" class="form-control text-center border-0" name="patname" id="patname" value="<?php  echo $row['fullName'];?>" readonly  >
                                            </div>
                                            <div class="col-sm-4 text-center form-group">
                                                <label for="sex" class="fw-bold">Bill No:</label>
                                                <input type="text" class="form-control text-center border-0" name="gender" id="sex" value="<?php  echo $row['Clibillid'];?>" readonly  >
                                            </div>
                                            <div class="col-sm-4 text-center form-group">
                                                <label for="age" class="fw-bold">Date:</label>
                                                <div>
                                                    <?php
                                                    date_default_timezone_set("Asia/Kolkata");
                                                    echo date("Y-m-d")."\t";
                                                    echo date("H:i:s");
                                                    ?>
                                                </div>
                                            </div>
                                            <div class=" mt-0"><hr style="border: 1px solid #012970;"></div>
                                            
                                            <div class="col-sm-8 form-group text-center fw-bold ">
                                                <label for="description text-center fw-bold">Description</label>
                                                <hr class="text-primary fw-bold">
                                                <textarea type="text" class="form-control" name="paydescrp" id="description" placeholder="About Desease" required> </textarea>
                                            </div>
                                            <div class="col-sm-4 form-group text-center fw-bold">
                                                <label for="total ">Total</label>
                                                <hr class="text-primary fw-bold">
                                                <input type="text" class="form-control" name="payamount" id="total" placeholder="Amount" required>
                                            </div>
                                            <div class="col-sm-12 form-group mt-3">
                                                <br>
                                                <label for="signature " class="float-end fw-bold">Authorized Signature</label>                                    
                                            </div>
                                            <div class="col-sm-12 form-group mt-3">
                                                <hr class="mt-0">
                                                <button type="submit" name="submit"  class="btn btn-outline-success float-end">Submit</button>
                                            </div>
                                        </div>
                                    </form>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<div class="row row-cols-1 row-cols-md-2 g-4 justify-content-center">
    <?php
    $docid=$_SESSION['id'];
    $sql=mysqli_query($con,"SELECT * FROM events WHERE DocID = $docid ORDER BY Eventid DESC");
    $cnt=1;
    while($row=mysqli_fetch_array($sql))
    {
        $add = $row['Event_address'];
        ?>
  <div class="col-lg-4">
    <div class="card border border-dark rounded" style="width: 18rem;">
      <img src="https://digitalagencynetwork.com/wp-content/uploads/2021/10/top-technology-events-you-should-attend-1.jpg" class="card-img-top" alt="..." style="height:8rem;">
      <div class="card-body">
        <h3 class="text-center fw-bold mt-3" id="form-subhead"><?php echo $row['Event_name']?></h3>
        <div class="row text-center">
            <div class="col fw-bold text-success"> <i class="bi bi-calendar-date">  </i><?php echo $row['Event_date']?></div>
            <div class="col fw-bold text-success"><i class="bi bi-hourglass"> </i> <?php echo $row['Event_time']?> </div>
        </div>
        <hr>
        <div class=" text-center">
            <i class="bi bi-pin-map-fill fw-bold text-success"> - </i>
        </div>
        <div class="text-center"><?php echo $row['Event_address']?></div>

        <div style="overflow-y: auto">
        <hr>
        <div class=" text-center">
            <i class="bi bi-info-circle fw-bold text-success"></i>
        </div>
        <p class="card-text text-center"><?php echo $row['Event_other']?></p>
        <small class="text-muted float-end m-0 p-0"><?php echo $row['Event_created']?></small>

        </div>
      </div>
      <div class="card-footer">
        
      
      <a href="http://maps.google.com/?q=<?php echo $add;?>" target="blank"><button class="btn btn-outline-success"><i class="bi bi-geo-alt"></i></button></a>      
      <a href="events.php?Eventid=<?php echo $row['Eventid'];?>"><button class="btn btn-outline-success float-end ms-1"><i class="bi bi-trash"></i></button></a>
      <!--a href="notedelete.php?noteid=<?php echo $row['Noteid'];?>"><button class="btn btn-outline-success float-end"><i class="bi bi-pencil-fill"></i></button></a-->  
    </div>
    </div>
  </div>
  <?php $cnt=$cnt+1;}?>
</div>
  </main>

  <?php include('include/footer.php');?>


</body>

</html>

<?php } ?>