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
      <h1>All Appointments</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Appointments</li>
        </ol>
      </nav>
    </div>

    <!--div class="col-xxl-12 mx-auto"-->
                    <div class="container-fluid box8 rounded table-responsive" id="patients-patients-cont">
                        <table class="table datatable">
                            <thead>
                              <tr id="form-subhead">
                                <th scope="col">#</th>
                                <th scope="col">Patient Name</th>
                                <th scope="col">Patient Contact</th>
                                <th scope="col">Appointment Date</th>
                                <th scope="col">Appointment Creation Date</th>
                                <th>Current Status</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>

                            <tbody>
                            <?php
$sql=mysqli_query($con,"select users.fullName as fname,appointment.*  from appointment join users on users.id=appointment.userId where appointment.doctorId='".$_SESSION['id']."'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
                                <tr>
                                <td class="center"><?php echo $cnt;?>.</td>
                                <td class="hidden-xs"><?php echo $row['fname'];?></td>
                                <td><?php echo $row['PatientContno'];?></td>
                                <td><?php echo $row['appointmentDate'];?> / <?php echo
												 $row['appointmentTime'];?></td>
                                <td><?php echo $row['postingDate'];?></td>
                                
                                <td>
<?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
{
	echo "Active";
}
if(($row['userStatus']==0) && ($row['doctorStatus']==1))  
{
	echo "Cancel by Patient";
}

if(($row['userStatus']==1) && ($row['doctorStatus']==0))  
{
	echo "Cancel by you";
}



												?></td>
                                                <td >
												<!--div class="visible-md visible-lg hidden-sm hidden-xs"-->
							<?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
{ ?>

													
	<a href="appointment-history.php?id=<?php echo $row['id']?>&cancel=update" onClick="return confirm('Are you sure you want to cancel this appointment ?')"class="btn btn-transparent btn-xs tooltips" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove">Cancel</a>
	<?php } else {

		echo "Canceled";
		} ?>
												<!--/div-->
												</td>
                                    
                                  </tr>

                                <?php 
                                $cnt=$cnt+1;
							}?>
                            </tbody>
                          </table>
                       
                      </div>
                     <!--/div-->


  

  </main>


 

  

  <?php include('include/footer.php');?>

</body>

</html>

<?php } ?>