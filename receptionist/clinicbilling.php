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
    $billname = $_POST['billname'];
    $description = $_POST['paydescrp'];
    $total = $_POST['payamount'];

    $ret=mysqli_query($con,"select Clibillid FROM billing WHERE billing.Docid='$docid' ORDER BY billing.Clibillid DESC LIMIT 1; ");
    while ($row=mysqli_fetch_array($ret)) {
        if($row['Clibillid'] >= 1){
            $billno = $row['Clibillid'] + 1;
        }
        else{
            $billno = 1;
        }

    }

    
   
 
    $query=mysqli_query($con, "insert into  billing(billname,DocId,Clibillid,Description,Amount)values('$billname','$docid','$billno','$description','$total')");
    if ($query) {
    echo '<script>alert("Bill Created")</script>';
    echo "<script>window.location.href ='clinicbilling.php'</script>";
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
        <h1>Clinic Bills</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="doctorlanding.php">Home</a></li>
                <li class="breadcrumb-item">Inventory</li>
                <li class="breadcrumb-item active">Bills</li>
            </ol>
        </nav>
    </div>

    <div class="text-center">
        <button class="btn btn-outline-success " data-bs-toggle="modal" data-bs-target="#billpayment">Add +</button>
        <hr>
       
    </div>

    <div class="modal fade modal-dialog-scrollable modal-lg " id="billpayment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="billpayment">Bill</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
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
                                                <label for="billname" class="fw-bold">Name:</label>
                                                <input type="text" class="form-control text-center border-0" name="billname" id="billname" value="<?php  echo $row['fullName'];?>">
                                            </div>
                                            <div class="col-sm-4 text-center form-group">
                                                <label for="sex" class="fw-bold">Bill No:</label>
                                                <?php 
                                                 $patid=$_GET['patid'];
                                                 $docid = $_SESSION['id'];
                                                 $ret=mysqli_query($con,"select Clibillid FROM billing WHERE billing.Docid='$docid' ORDER BY billing.Clibillid DESC LIMIT 1; ");
                                                 while ($row=mysqli_fetch_array($ret)) {
                                                     if($row['Clibillid'] >= 1){
                                                         $billno = $row['Clibillid'] + 1;
                                                     }
                                                     else{
                                                         $billno = 1;
                                                     } ?>
                                             
                                               
                                                <input type="text" class="form-control text-center border-0" name="Clibillid" id="sex" value="Cli-<?php  echo $billno;?>" readonly  >
                                                <?php  }
                                                ?>
                                                

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
                                                <input type="text" class="form-control" name="paydescrp" id="description" placeholder="Description" required>
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
                            </div>
                        </div>
                    </div>

<div class="col-xxl-12">
                <h3 id="form-subhead">Patients Bills</h3>
                <div class="container-fluid box8 rounded table-responsive" id="patients-patients-cont">
                    <table class="table datatable">
                        <thead>
                            <tr id="form-subhead">
                                <th scope="col">#</th>
                                <th scope="col">Bill No.</th>
                                <th scope="col">Bill Of.</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $docid = $_SESSION['id'];
                            $ret=mysqli_query($con,"SELECT * FROM users INNER JOIN billing ON users.id = billing.Patid INNER JOIN doctors ON billing.DocId = doctors.id where Docid='$docid';");
                            $i = 1;
                            while ($row=mysqli_fetch_array($ret)) { ?>
                            <tr>
                                <td class="center"><?php echo $i;?>.</td>
                                <td>Cli-<?php echo $row['Clibillid'];?></td>
                                <td><?php echo $row['Amount'];?>/-</td>
                                <td><?php echo $row['Created'];?></td>
                                <td> 
                                <button class="btn btn-outline-success text-center align-items-center" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $row['Billid']?>">View</button>
                                </td>
                            </tr>
                            <div id="myModal<?php echo $row['Billid']?>" class="modal fade modal-lg" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                                <div id="form-print" enctype="text/plain">
                                                    <div class="row jumbotron rounded py-2">       
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
                                                    </div> <!---------END OF HEADER----------->
                                                    <div class="col-sm-4 text-center form-group">
                                                        <label for="doctorname" class="fw-bold">Name:</label>
                                                        <input type="text" class="form-control text-center border-0" name="patname" id="patname" value="<?php  echo $row['fullName'];?>" readonly  >
                                                    </div>
                                                    <div class="col-sm-4 text-center form-group">
                                                        <label for="sex" class="fw-bold">Bill No:</label>
                                                        <input type="text" class="form-control text-center border-0" name="Clibillid" id="sex" value="Cli-<?php  echo $row['Clibillid'];?>" readonly  >
                                                    </div>
                                                    <div class="col-sm-4 text-center form-group">
                                                        <label for="age" class="fw-bold">Date:</label>
                                                        <div>
                                                            <?php
                                                            echo $row['Created'];
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class=" mt-0"><hr style="border: 1px solid #012970;"></div>
                                                    <div class="col-sm-8 form-group text-center ">
                                                        <label for="description text-center">Description</label>
                                                        <hr class="text-primary">
                                                        <input type="text" class="form-control text-center" name="paydescrp" id="description" value="<?php  echo $row['Description'];?>" readonly>
                                                    </div>
                                                    <div class="col-sm-4 form-group text-center">
                                                        <label for="total ">Total</label>
                                                        <hr class="text-primary">
                                                        <input type="text" class="form-control text-center" name="payamount" id="total" value="<?php  echo $row['Amount'];?>/-" readonly>
                                                    </div>
                                                    <div class="col-sm-12 form-group mt-3">
                                                        <br>
                                                        <label for="signature " class="float-end fw-bold">Authorized Signature</label>                                    
                                                    </div>  
                                                </div>                              
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-outline-success m-1" onclick="GeneratePdf();" value="GeneratePdf"><i class="bi bi-download"></i></button>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $i++; }?>
                        </tbody>
                    </table>
                </div>
            </div>

            <h3 id="form-subhead" class="mt-2">Clinics Bills</h3>
            <div class="col-xxl-12">
                <div class="container-fluid box8 rounded table-responsive" id="patients-patients-cont">
                    <table class="table datatable">
                        <thead>
                            <tr id="form-subhead">
                                <th scope="col">#</th>
                                <th scope="col">Bill No.</th>
                                <th scope="col">Bill Of.</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $docid = $_SESSION['id'];
                            $ret=mysqli_query($con,"SELECT * FROM billing INNER JOIN doctors ON billing.DocId = doctors.id where Docid='1' and Patid < 1;");
                            $i = 1;
                            while ($row=mysqli_fetch_array($ret)) { ?>
                            <tr>
                                <td class="center"><?php echo $i;?>.</td>
                                <td>Cli-<?php echo $row['Clibillid'];?></td>
                                <td><?php echo $row['Amount'];?>/-</td>
                                <td><?php echo $row['Created'];?></td>
                                <td> 
                                <button class="btn btn-outline-success text-center align-items-center" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $row['Billid']?>">View</button>
                                </td>
                            </tr>
                            <div id="myModal<?php echo $row['Billid']?>" class="modal fade modal-lg" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                                <div id="form-print" enctype="text/plain">
                                                    <div class="row jumbotron rounded py-2">       
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
                                                    </div> <!---------END OF HEADER----------->
                                                    <div class="col-sm-4 text-center form-group">
                                                        <label for="doctorname" class="fw-bold">Name:</label>
                                                        <input type="text" class="form-control text-center border-0" name="patname" id="patname" value="<?php  echo $row['billname'];?>" readonly  >
                                                    </div>
                                                    <div class="col-sm-4 text-center form-group">
                                                        <label for="sex" class="fw-bold">Bill No:</label>
                                                        <input type="text" class="form-control text-center border-0" name="Clibillid" id="sex" value="Cli-<?php  echo $row['Clibillid'];?>" readonly  >
                                                    </div>
                                                    <div class="col-sm-4 text-center form-group">
                                                        <label for="age" class="fw-bold">Date:</label>
                                                        <div>
                                                            <?php
                                                            echo $row['Created'];
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class=" mt-0"><hr style="border: 1px solid #012970;"></div>
                                                    <div class="col-sm-8 form-group text-center ">
                                                        <label for="description text-center">Description</label>
                                                        <hr class="text-primary">
                                                        <input type="text" class="form-control text-center" name="paydescrp" id="description" value="<?php  echo $row['Description'];?>" readonly>
                                                    </div>
                                                    <div class="col-sm-4 form-group text-center">
                                                        <label for="total ">Total</label>
                                                        <hr class="text-primary">
                                                        <input type="text" class="form-control text-center" name="payamount" id="total" value="<?php  echo $row['Amount'];?>/-" readonly>
                                                    </div>
                                                    <div class="col-sm-12 form-group mt-3">
                                                        <br>
                                                        <label for="signature " class="float-end fw-bold">Authorized Signature</label>                                    
                                                    </div>  
                                                </div>                              
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-outline-success m-1" onclick="GeneratePdf();" value="GeneratePdf"><i class="bi bi-download"></i></button>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $i++; }?>
                        </tbody>
                    </table>
                </div>
            </div>
  </main>

  <?php include('include/footer.php');?>
  <script>
  function GeneratePdf() {
    var element = document.getElementById('form-print');
    var opt = {
        margin:       0.2,
        filename:     'myfile.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 },
        jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
    };
    html2pdf(element, opt);
}
  </script>


</body>

</html>

<?php } ?>