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
                              </tr>
                            </thead>

                            <tbody>
                            <?php
                            $docid=$_SESSION['id'];
                            $sql=mysqli_query($con,"SELECT * FROM users INNER JOIN tblmedicalhistory ON users.id = tblmedicalhistory.PatientID INNER JOIN doctors ON tblmedicalhistory.DocId = doctors.id WHERE PatientID= $docid GROUP BY DocId;
                            ");
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
                                    
                                  </tr>

                                <?php 
                                $cnt=$cnt+1;
							}?>
                            </tbody>
                          </table>
                       
                      </div>
                     </div>



  </main>


 

  

  <?php include('include/footer.php');?>

</body>

</html>

<?php } ?>