<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="index.html" class="logo d-flex align-items-center">
    <img src="assets/img/logo.svg" alt="">
    <span class="d-none d-lg-block">Cliniro</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

  <!--li >
      <a class="nav-link nav-icon" href="stopwatch.php">
        <i class="bi bi-stopwatch"></i>
      </a>
    </li-->

    <li>

      <a class="nav-link nav-icon" href="scratchpad.php" target="_blank" >
        <i class="bi bi-easel2"></i>
      </a><!-- End Messages Icon -->
    </li><!-- End Messages Nav -->
    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="assets/img/logo copy.svg" alt="Profile" class="rounded-circle">
        <span class="d-none d-md-block  ps-2">
        <?php $query=mysqli_query($con,"select doctorName from doctors where id='".$_SESSION['id']."'");
        while($row=mysqli_fetch_array($query))
        {
             echo 'Dr.' ,  $row['doctorName'];
        }?>
        </span>
      </a><!-- End Profile Iamge Icon -->

      
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->