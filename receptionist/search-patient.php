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
      <h1>Search Patient</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="doctorlanding.php">Home</a></li>
          <li class="breadcrumb-item">Patients</li>
          <li class="breadcrumb-item active">Search Patient</li>
        </ol>
      </nav>
    </div>

    

    <div class="container-fluid box8 rounded table-responsive" id="patients-patients-cont">

    <form role="form" method="post" name="search" class="text-center">
        <div class="form-group">
            <label for="doctorname" class="float-start">Search by Name/Mobile No.</label>
            <input type="text" name="searchdata" id="searchdata" class="form-control" value="" required='true'>
        </div>
        <button type="submit" name="search" id="submit" class="btn btn-outline-success my-2">Search</button>
    </form>
    <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
<hr>
                        <table class="table datatable">
                            <thead>
                              <tr id="form-subhead">
                                <th scope="col">#</th>
                                <th scope="col">Patient Name</th>
                                <th scope="col">Patient Age</th>
                                <th scope="col">Patient Gender</th>
                                <th scope="col">Allergies</th>
                                <th scope="col">Patient Contact</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>

                            <tbody>
                            <?php
$sql=mysqli_query($con,"select * from users where fullName like '%$sdata%'|| Phone like '%$sdata%'");
$num=mysqli_num_rows($sql);
if($num>0){
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
                           
                                <tr>
                                <td class="center"><?php echo $cnt;?>.</td>
                                <td ><?php echo $row['fullName'];?></td>
                                <td ><?php echo $row['Age'];?></td>
                                <td><?php echo $row['gender'];?></td>
                                <td><?php echo $row['Allergy'];?></td>
                                <td><?php echo $row['Phone'];?></td>
                                

                                   
                                    <td> 
                                    <a href="view-patient.php?viewid=<?php echo $row['id'];?>"><button class="btn btn-outline-success m-1"> <i class="bi bi-eye"></i></button> </a>                                    </td>
                                    
                                  </tr>

                                  <?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
   
<?php }} ?>

                                
                            </tbody>
                          </table>
                       
                      </div>

  

  </main>


 

  
  <?php include('include/footer.php');?>

</body>

</html>

<?php } ?>