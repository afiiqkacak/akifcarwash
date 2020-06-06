<!DOCTYPE html>
<html lang="en">
<?php
include('connection/connect.php');
?>
  <head>
<!--   	<meta http-equiv="refresh" content="5"/> -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AKIF CARWASH</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
   <!--  <link rel="icon" href="shop.png" type="image/gif" sizes="16x16"> -->


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

<style>
	.foo {
  float: left;
  width: 100px;
  height: 55px;
  margin: 5px;
  border: 2px solid rgba(0, 0, 0, .2);
}

.queue {
  background: #f2dede;
}

.blue {
  background: rgba(0, 0, 0, 0.075);
}

.completed {
  background: #fcf8e3;
}

.collected {
  background: #dff0d8;
}

</style>




  </head>
  <body>

    <div class="container-fluid">
	<div class="row" style="background-image: linear-gradient(to bottom right, #4fdce0,#9ad5fc );">
		<div class="col-md-12">
			<div class="page-header" align="center">
				<br>
				<img align="center" src="akif.png" height="50" width="150"/>
				<h1>
					<small>CAR 'Q'</small>
				</h1>
<?php
date_default_timezone_set('Asia/Kuala_Lumpur');
$datenow = date("l, d F Y");
$timenow = date("g:i a", time());
?>
<h4>
<?php echo $datenow ?>
<?php echo "\n" ?>
<?php echo $timenow;
$tar= date("Y-m-d");?>


</h4>
			</div>
			
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a class="nav-link" href="index.php">Queue <i class="fa fa-hand-paper-o" aria-hidden="true"></i></a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="services.php">Service <i class="fa fa-wrench" aria-hidden="true"></i></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="customer.php">Customer <i class="fa fa-id-card-o" aria-hidden="true"></i></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="car.php">Car <i class="fa fa-car" aria-hidden="true"></i></a>
				</li>


<!-- 				<li class="nav-item dropdown ml-md-auto">
					 <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown">Dropdown link</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
						 <a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a>
						<div class="dropdown-divider">
						</div> <a class="dropdown-item" href="#">Separated link</a>
					</div>
				</li> -->
			</ul>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-4">
			<form action="" method="post" role="form">
				<div class="form-group">
					 
					<label for="service">
						Service: <span style="color:red;">*</span>
					</label>
					<!-- <input type="text" class="form-control" name="platenum"> -->
					 <input class="form-control" name="service" type="text" maxlength="50" required>

				</div>
				<!-- <div class="form-group">
					 
					<label for="exampleInputPassword1">
						Password
					</label>
					<input type="password" class="form-control" id="exampleInputPassword1">
				</div>
				<div class="form-group">
					 
					<label for="exampleInputFile">
						File input
					</label>
					<input type="file" class="form-control-file" id="exampleInputFile">
					<p class="help-block">
						Example block-level help text here.
					</p>
				</div> -->
				<div class="checkbox">
				<label for="type">Service Type: <span style="color:red;">*</span></label>
  <select class="form-control" name="type" required>
  	<option></option>
    <option value="Exterior">Exterior</option>
    <option value="Interior">Interior</option>

  </select><br><br>
  
				
					
				</div> 
				<button type="submit" name="submit" class="btn btn-info">Insert <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
				</button>
				
			</form>
			<br>

		</div>

		<div class="col-md-8" style="overflow-y:auto;height: 500px">
			
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							Service
						</th>
						<th>
							Type
						</th>
						<th style="text-align:center">
							Action
						</th>
					</tr>
				</thead>
				<tbody class="table-warning">
		<?php
		$tar= date("Y-m-d");
		  $sql = "select * from service ORDER BY type ASC, service_id";
					$result = mysqli_query($connect,$sql);
					$x = 1;
					if(mysqli_num_rows($result) > 0 )
					{
					while($row = mysqli_fetch_array($result))
					{
			?>
			
					

						<td>
							<?php echo $row['service_type'];?>
						</td>
						<td>
							<?php echo $row['type'];?>
						</td>

					<td style="text-align:center">
					<a href="deleteservice.php?serviceid=<?php echo $row['service_id'];?>" 
					onclick="return confirm('Delete from service?')" class="danger" style="color: red; "><i class="fa fa-times fa-lg" aria-hidden="true"></i>
						</button>

						<!-- <a href="update.php?queue_id=<?php //echo $row['queue_id'];?>"><i class="fa fa-window-close" aria-hidden="true"></i> --></td>
				</tr>
				</form>
				<?php
				}
					}
				?>
				
					
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php

if(isset($_POST['submit'])){
	$service=$_POST['service'];
	$type=$_POST['type'];



	
	$sql = "INSERT INTO `service`(`service_type`, `type`) VALUES ('$service','$type')";
	$result = mysqli_query($connect, $sql);

	if($result == TRUE){
				echo '<script language="javascript">';
				echo 'alert("Service added.");';
				echo 'window.location.href="services.php";';
				echo '</script>';
			}else{
				echo '<script language="javascript">';
				echo 'alert("Data is already present! Avoid duplicate entry.");';
				echo 'window.location.href="services.php";';
				echo '</script>';
			}

			mysqli_close($connect);

}
?>

<!--     <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script> -->
    <script>
    	$('select').selectpicker();
    </script>

  </body>
</html>