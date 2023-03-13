<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:patientlogout.php');
  } else{

    

    if (isset($_GET['Docid'])) {
      echo 'Hello';

      $docid = $_GET['Docid'];
      $rate = $_POST['rate'];
      $review = $_POST['review'];
      $patid = $_SESSION['id'];

  
      $query=mysqli_query($con, "insert into ratings(ratedocid,ratepatid,rating,comment)values('$docid','$patid','$rate','$review')");
  if ($query) {
  
  echo "<script>window.location.href ='mydoctor.php'</script>";
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
      <h1>My Doctors</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item">Stuff</li>
          <li class="breadcrumb-item active">My Doctors</li>
        </ol>
      </nav>
    </div>

    <div class="col-xxl-12 mx-auto">
                    <div class="container-fluid box8 rounded table-responsive" id="patients-patients-cont">
                        <table class="table datatable">
                            <thead>
                              <tr id="form-subhead">
                                <th scope="col">#</th>
                                <th scope="col">Dr. Name</th>
                                <th scope="col">Clinic Name</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Upcoming Appointment</th>
                                <th scope="col">Action</th>
                                <th scope="col">Rate Your Doctor</th>
                              </tr>
                            </thead>

                            <tbody>
                            <?php
                            $docid=$_SESSION['id'];
                            $sql=mysqli_query($con,"SELECT * FROM users INNER JOIN tblmedicalhistory ON users.id = tblmedicalhistory.PatientID INNER JOIN doctors ON tblmedicalhistory.DocId = doctors.id WHERE PatientID= $docid GROUP BY DocId;");
                            $cnt=1;
                            while($row=mysqli_fetch_array($sql))
                            {
                            ?>
                                <tr>
                                <td class="center"><?php echo $cnt;?>.</td>
                                <td><?php echo $row['doctorName'];?></td>
                                <td><?php echo $row['clinic_name'];?></td>
                                <td><?php echo $row['clinic_contact'];?></td>
                                <td><?php echo $row['oop'];?></td>                         
                                    <td>

                                        <a href="doctor-profile.php?viewid=<?php echo $row['DocId'];?>"> <button class="btn btn-outline-success"><i class="bi bi-eye"></i></button> </a> 
                                    </td>
                                <td>
                                  <!--button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#rateview<?php echo $row['DocId'] ?>">Give Your Ratings <i class="bi bi-star"></i></button-->
                                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['DocId'] ?>">
  Launch demo modal
</button>
                                <?php
                                if ($row['rating']>0) { 
                                ?>

                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['DocId'] ?>">You Rated: <?php echo $row['rating'] ?> </button>

                                <?php
                                } else { 
                                ?>

                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#presppayment<?php echo $row['ID'] ?>">Pay</button>
                                <?php
                                }
                                ?>
                              </td>
                                    
                                  </tr>

                                  <div class="modal fade" id="exampleModal<?php echo $row['DocId'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
      <form method="post" name="submit">
            <div class="row jumbotron rounded py-2">
                <!--div class="col-sm-12 form-group"-->
                    <div class="col-sm-12 form-group">
                    <label for="rate" class="form-label">Rate</label>
<input type="range" class="form-range" name="rate" min="0" max="5" id="customRange2" required>
                    </div>
                    
                    <div class="col-sm-12 form-group">
                        <label for="review" class="fw-semibold">Review:</label>
                        <textarea class="form-control border-bottom" name="review" id="review" placeholder="Other" cols="30" rows="2" required></textarea>
                    </div>
                    <div class="col-sm-12 form-group mt-1">
                      
                        <button type="submit" name="submit" class="btn btn-outline-success float-end">Submit</button>
                    </div>
                <!--/div-->
            </div>

        </form>
         <?php 
         if(isset($_POST['submit']))
         {
           
          
           $rate=$_POST['rate'];
           $review=$_POST['review'];
           $patid =$_SESSION['id'];
           $Docid = $row['DocId'];
          
         
           $query1=mysqli_query($con,"insert into ratings(ratedocid,ratepatid,rating,comment)values('$Docid','$patid','$rate','$review')");
           //$query=mysqli_query($con,"update tblmedicalhistory set PatientID='$prespid',PatientName='$patname',gender='$gender',age='$patage',bloodgrp='$patblood',BloodPressure='$bp',Weight='$weight',Temperature='$temp',tabname1='$tabname1',tabpat1='$tabpattern1',tabped1='$tabperiod1',tabday1='$tabdays1',tabother='$tabother',tests='$tests'  where ID='$prespid'");
           if ($query1) {
           echo '<script>alert("Review has been added.")</script>';
         
           echo "<script>window.location.href ='mydoctor.php'</script>";
           break;
         }
         else
           {
             echo '<script>alert("Something Went Wrong. Please try again")</script>';
           }
         
         
         }
         
         ?>
         
                           
                                  
      </div>
      
    </div>
  </div>
</div>
                                  
                                  

                                <?php 
                                $cnt++;}?>
                            </tbody>
                          </table>
                       
                      </div>
                     </div>


                     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->




  </main>


 

  

  <?php include('include/footer.php');?>

</body>

</html>

<?php } ?>