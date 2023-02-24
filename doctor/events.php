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

<div class="container">
    <div class="row pt-5 m-auto">
      <div class="col-md-6 col-lg-4 pb-3">

        <!-- Copy the content below until next comment -->
        <div class="card card-custom bg-white border-white border-0">
          <div class="card-custom-img" style="background-image: url('http://res.cloudinary.com/d3/image/upload/c_scale,q_auto:good,w_1110/trianglify-v1-cs85g_cc5d2i.jpg');"></div>
          <div class="card-custom-avatar">
            <img class="img-fluid" src="http://res.cloudinary.com/d3/image/upload/c_pad,g_center,h_200,q_auto:eco,w_200/bootstrap-logo_u3c8dx.jpg" alt="Avatar" />
          </div>
          <div class="card-body" style="overflow-y: auto">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Card has minimum height set but will expand if more space is needed for card body content. You can use Bootstrap <a href="https://getbootstrap.com/docs/4.0/components/card/#card-decks" target="_blank">card-decks</a> to align multiple cards nicely in a row.</p>
          </div>
          <div class="card-footer" style="background: inherit; border-color: inherit;">
            <a href="#" class="btn btn-primary">Option</a>
            <a href="#" class="btn btn-outline-primary">Other option</a>
          </div>
        </div>
        <!-- Copy until here -->

      </div>
      <div class="col-md-6 col-lg-4 pb-3">

        <!-- Add a style="height: XYZpx" to div.card to limit the card height and display scrollbar instead -->
        <div class="card card-custom bg-white border-white border-0" style="height: 450px">
          <div class="card-custom-img" style="background-image: url(http://res.cloudinary.com/d3/image/upload/c_scale,q_auto:good,w_1110/trianglify-v1-cs85g_cc5d2i.jpg);"></div>
          <div class="card-custom-avatar">
            <img class="img-fluid" src="http://res.cloudinary.com/d3/image/upload/c_pad,g_center,h_200,q_auto:eco,w_200/bootstrap-logo_u3c8dx.jpg" alt="Avatar" />
          </div>
          <div class="card-body" style="overflow-y: auto">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">You can also set maximum height on and the card will not expand, instead a scrollbar in the card body will appear.</p>
            <p class="card-text">Some example text to show the scrollbar.</p>
            <p class="card-text">Lorem ipsum dolor sit amet, te vix omittam fastidii, enim paulo omnes ea has, illud luptatum no qui. Sed ea qualisque urbanitas, purto elit nec te. Possim inermis antiopam ut eum. Eos te zril labore laboramus, quem erant nam in. Ut sed molestie
              antiopam. At altera facilisis mel.</p>
          </div>
          <div class="card-footer" style="background: inherit; border-color: inherit;">
            <a href="#" class="btn btn-primary">Option</a>
            <a href="#" class="btn btn-outline-primary">Other option</a>
          </div>
        </div>

      </div>
      <div class="col-md-6 col-lg-4 pb-3">

        <div class="card card-custom bg-white border-white border-0">
          <div class="card-body">
            <img src="http://res.cloudinary.com/d3/image/upload/c_scale,h_450,q_auto:best/color-cards_lorvwg.jpg" alt="Colored cards" class="img-fluid">
            <p>You can use this card together with standard Bootstrap 4 cards and use card features on it.</p>
            <p class="h5 text-center pt-3">See the card on GitHub:</p>
            <p class="h1 text-center"><a href="https://github.com/peterdanis/custom-bootstrap-cards" target="_blank"><i class="fa fa-github"></i></a></p>

          </div>
        </div>

      </div>
    </div>
  </div>


<!--div class="row row-cols-1 row-cols-md-3 g-4">
<?php
                            $docid=$_SESSION['id'];
                            $sql=mysqli_query($con,"SELECT * FROM notes WHERE DocID = $docid ORDER BY Noteid DESC");
                            $cnt=1;
                            while($row=mysqli_fetch_array($sql))
                            {
                                $nid = $row['Noteid'];
                            ?>

  <div class="col" style="transform: rotate(1.5deg);">
    <div class="card h-100 border border-primary rounded">

    <div class="card-body">
    <h4><i class="bi bi-pin-angle-fill" style="color:#012970"></i></h4>
      
      <p class="card-text fw-bold" id="form-subhead"><?php echo $row['Description']?></p>
      
    </div>
    <div class="card-footer">
      <small class="text-muted"><?php echo $row['Created']?></small>
      
      <a href="notedelete.php?noteid=<?php echo $row['Noteid'];?>"><button class="btn btn-outline-success float-end"><i class="bi bi-trash"></i></button></a>
      

      
      
      
      
    </div>
    </div>
  </div>
        
  <?php 
                                $cnt=$cnt+1;
							}?>
  
</div-->
    


    
  

  </main>

  <?php include('include/footer.php');?>


</body>

</html>

<?php } ?>