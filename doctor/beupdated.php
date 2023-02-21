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
      <h1>Be Updated</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Be Updated</li>
        </ol>
      </nav>
    </div>
    <?php 
    $url = 'https://newsapi.org/v2/everything?q=health&apiKey=14752f907dba4fa09868548074054773';
    $response = file_get_contents($url);
    $NewsData = json_decode($response);
    ?>
    
    <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php 
    foreach($NewsData -> articles as $News)
    {
      
    ?>
  <div class="col">
    <div class="card p-2 h-100 border border-primary rounded">
    <img src="<?php echo $News->urlToImage?>" class="card-img-top rounded" alt="..." style="height:18rem">
    <div class="card-body">
      <h5 class="card-title"><?php echo $News->title?></h5>
      <p class="card-text"><?php echo $News->description?></p>
      
    </div>
    <div class="card-footer">
      <small class="text-muted"><?php echo $News->author?></small>
      <div class="float-end"><a href="<?php echo $News->url?>" target="blank"><button type="button" class="btn btn-outline-success">Read...</button></a></div>
    </div>
    </div>
  </div>
        
  <?php }?>
  
</div>





      
    
    

    
  

  </main>
  <?php include('include/footer.php');?>

</body>

</html>

<?php } ?>