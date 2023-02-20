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
      <h1>Manage Patients</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item">Patients</li>
          <li class="breadcrumb-item active">All Patients</li>
        </ol>
      </nav>
    </div>

    <div class="col-xxl-12 mx-auto">
                    <div class="container-fluid box8 rounded table-responsive" id="patients-patients-cont">
                        <table class="table datatable">
                            <thead>
                              <tr id="form-subhead">
                                <th scope="col">#</th>
                                <th scope="col">Patient Name</th>
                                <th scope="col">Patient Contact</th>
                                <th scope="col">Patient Gender</th>
                                <th scope="col">Creation Date</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>

                            <tbody>
                            <?php
                            $docid=$_SESSION['id'];
                            $sql=mysqli_query($con,"SELECT * FROM users RIGHT JOIN tblmedicalhistory on users.id = tblmedicalhistory.PatientID WHERE DocID = $docid GROUP BY PatientID;");
                            $cnt=1;
                            while($row=mysqli_fetch_array($sql))
                            {
                            ?>
                                <tr>
                                <td class="center"><?php echo $cnt;?>.</td>
                                <td><?php echo $row['PatientName'];?></td>
                                <td><?php echo $row['Phone'];?></td>
                                <td><?php echo $row['gender'];?></td>
                                <td><?php echo $row['CreationDate'];?></td>
                                

                                    <td> 
                                        <a href="view-patient.php?viewid=<?php echo $row['PatientID'];?>"><i class="bi bi-eye"></i></a> 
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