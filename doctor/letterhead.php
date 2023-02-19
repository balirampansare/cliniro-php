


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Bootstrap 101 Template</title>

		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"  integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">


		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<table class="table table-bordered table-striped">
			<thead>
				<tr class="btn-primary">
					<th>S.No.</th>
					<th>Name</th>
					<th>Phone Number</th>
					<th>Email</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$sql = 'SELECT * FROM users'; 
					$result = mysqli_query($con,$sql);
					$i = 1;
					while($row = mysqli_fetch_array($result)) 
					{
				?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $row['fullName']; ?></td>
					<td><?php echo $row['phone']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td>
		
					// here i am creating a button to open a modal popup
		
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?php echo $row['id'] ?>">View</button>
		
		
		
					</td>
				</tr>
		
				//  here i am creating a modal popup code.........
		
				<div id="myModal<?php echo $row['id'] ?>" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								 <button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Details</h4>
							</div>
							<div class="modal-body">
								 <h3>Name : <?php echo $row['name']; ?></h3>
								 <h3>Mobile Number : <?php echo $row['phone']; ?></h3>
								 <h3>Email : <?php echo $row['email']; ?></h3>
							</div>
						</div>
					</div>
				</div>
		
				// end modal popup code........
		
				<?php 
					$i++;
					}
				?>
			</tbody>
		</table>
  </body>
</html>


<?php 
    foreach($NewsData -> articles as $News)
    {
    ?>
    
      <div class="card p-2 rounded mx-3 my-1">
        <img src="<?php echo $News->urlToImage?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?php echo $News->title?></h5>
          <p class="card-text"><?php echo $News->description?></p>
          <p class="card-text"><?php echo $News->content?></p>
          <p class="card-text"><?php echo $News->author?></p>
        </div>
        <div class="card-footer">
          <small class="text-muted"><?php echo $News->publishedAt?></small>
        </div>
      </div>
    
    <?php 
    }
    ?>


<div class="container-fluid">
    <?php 
    foreach($NewsData -> articles as $News)
    {
    ?>

    <div class="row ">
      <div class="col-md-3">
      <img src="<?php echo $News->urlToImage?>" class="card-img-top" alt="...">

      </div>
      <div class="col-md-9">
      <h5 class="card-title">Title:<?php echo $News->title?></h5>
          <p class="card-text">description:<?php echo $News->description?></p>
          <p class="card-text">Content:<?php echo $News->content?></p>
          <p class="card-text">Author:<?php echo $News->author?></p>

      </div>

    </div>
    <?php 
    }
    ?>

    </div>
