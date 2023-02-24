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

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      
      <div class="modal-body">
        <form method="post" name="submit">
            <div class="row jumbotron rounded py-2">
                <!--div class="col-sm-12 form-group"-->
                    <div class="col-sm-12 form-group">
                        <label for="event" class="fw-semibold">Event Name:</label>
                        <input type="text" class="form-control" name="event" id="event" placeholder="Event name">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="edate" class="fw-semibold">Date:</label>
                        <input type="date" class="form-control" name="edate" id="edate" placeholder="Event date">
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="etime" class="fw-semibold">Time:</label>
                        <input type="time" class="form-control" name="etime" id="etime" placeholder="Event time">
                    </div>
                    <div class="col-sm-12 form-group">
                        <label for="eventaddress" class="fw-semibold">Address:</label>
                        <textarea class="form-control border-bottom" name="eventaddress" id="eventaddress" placeholder="Address" cols="30" rows="2"></textarea>
                    </div>
                    <div class="col-sm-12 form-group">
                        <label for="eventother" class="fw-semibold">Other Details:</label>
                        <textarea class="form-control border-bottom" name="eventother" id="eventother" placeholder="Other" cols="30" rows="2"></textarea>
                    </div>
                    <div class="col-sm-12 form-group mt-1">
                        <button type="submit" name="submit"  class="btn btn-outline-success float-end">Submit</button>
                    </div>
                <!--/div-->
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