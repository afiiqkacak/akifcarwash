<!DOCTYPE html>
<html lang="en">
<?php

$session_lifetime = 3600 * 24 * 2; // 2 days
session_set_cookie_params ($session_lifetime);
session_start();
	
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
    <link rel="icon" href="akif.png" type="image/gif">


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
					<a class="nav-link active" href="index.php"><i class="fa fa-hand-paper-o" aria-hidden="true"></i> Queue</a>
				</li>

				
			</ul>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-4">
			<form action="form.php" method="post" role="form">
				<div class="form-group">
					 
					<label for="platenum">
						Plate Number: <span style="color:red;">*</span>
					</label>
					<!-- <input type="text" class="form-control" name="platenum"> -->
					 <input class="form-control" name="platenum" id="someInput" required>
					 	
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

				<button type="submit" name="submit" class="btn btn-info">Insert <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
				</button> 
				
				
			</form>
			<br><br>
			<button class="btn btn-danger" value="PLAY" onclick="play()">Bell <i class="fa fa-bell" aria-hidden="true"></i></button>
			

    			<audio id="audio" src="bell.mp3"></audio>
			<br>
			
		</div>

		<div class="col-md-8" style="overflow-y:auto;height: 500px">

			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							Plate Number
						</th>
						<th>
							Status
						</th>
						<th style="text-align:center" colspan="2">
							Action
						</th>
					</tr>
				</thead>
				<tbody>
		<?php
		$tar= date("Y-m-d");
		  $sql = "SELECT * FROM queue WHERE date LIKE '$tar' ORDER BY status DESC, queue_id ASC";
					$result = mysqli_query($connect,$sql);
					$x = 1;
					if(mysqli_num_rows($result) > 0 )
					{
					while($row = mysqli_fetch_array($result))
					{
						if($row['status'] == "Queuing"){
							echo '<tr class="table-danger">';
						}elseif($row['status'] == "In Progress"){
							echo '<tr class="table-warning">';
						}elseif($row['status'] == "Completed"){
							echo '<tr class="table-success">';
						}else{
							echo '<tr class="table-active">';
						}
			?>
			
					
						<form action="update.php" method="post">
						<td>
							<input name="plate" type="text" class= "form-control" value="<?php echo $row['plate_num'];?>" />
						</td>
						<td>
							
					<!-- <tr class="table-warning"> -->

					
							<input name="queueid" autofocus class="input" type="hidden" value="<?php echo $row['queue_id']; ?>">
							<select class="form-control" name="status" onchange="this.form.submit()">
							<option><?php echo $row['status'];?></option>
							<?php
							if ($row['status'] == "Queuing"){


							?>
							<option value="In Progress">In Progress</option>
							<option value="Completed">Completed</option>
							<option value="Collected">Collected</option>
	        		  
	        		  <?php
	        		  }elseif ($row['status'] == "In Progress"){
	        		  	?>
							<option value="Queuing">Queuing</option>
							<option value="Completed">Completed</option>
							<option value="Collected">Collected</option>
	        		  
	        		  <?php
	        		  }elseif ($row['status'] == "Completed"){
							?>
							<option value="Queuing">Queuing</option>
							<option value="In Progress">In Progress</option>
							<option value="Collected">Collected</option>
							
						<?php
	        		  }elseif ($row['status'] == "Collected"){
							?>
							<option value="Queuing">Queuing</option>
							<option value="In Progress">In Progress</option>
							<option value="Completed">Completed</option>
							</select>

							<?php
							}
							?>
							
						</td>



						<td style="text-align:right">
						<noscript><input type="submit" value="submit"></noscript>
					    </td>


					<td style="text-align:left">
					<a href="deletequeue.php?queueid=<?php echo $row['queue_id'];?>" 
					onclick="return confirm('Delete from queue?')" class="danger" style="color: red; "><i class="fa fa-times fa-lg" aria-hidden="true"></i>
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

<!--     <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script> -->
    <script>
    	$('select').selectpicker();
    </script>

    <script>
    	
      function play() {
        var audio = document.getElementById("audio");
        audio.play();
      }
    </script>
<script>
var someInput = document.querySelector('#someInput');
someInput.addEventListener('input', function () {
    someInput.value = someInput.value.toUpperCase();
});
    </script>
    

  </body>
</html>
