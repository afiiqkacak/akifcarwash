<!DOCTYPE html>
<html lang="en">
<?php
include('connection/connect.php');
?>
  <head>
  	<!-- <meta http-equiv="refresh" content="1"/> -->
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
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js"></script> -->
<script type="text/javascript" src="reloader.js"></script>

<link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
</head>

<div id="liveData">
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
<h4><?php echo $datenow ?>
<?php echo "\n" ?>
<?php echo $timenow;
$tar= date("Y-m-d");?>



</h4>


<br>
</div>
</div>
</div>

<br>
	<div class="row">
		<div class="col-md-4">
			<table class="table">
				<thead>
					<tr>
						<th style="text-align:center">
							Queuing <i class="fa fa-car" aria-hidden="true"></i>
						</th>
					</tr>
				</thead>
				<tbody class="table-danger">
					<tr>
						<?php
						$tar= date("Y-m-d");
		  			$sql = "SELECT car.plate_num 
					FROM car INNER JOIN queue 
					WHERE car.car_id=queue.car_id AND queue.date LIKE '$tar' AND status='Queuing' ORDER BY status DESC, queue_id ASC";
					$result = mysqli_query($connect,$sql);
					$x = 1;
					if(mysqli_num_rows($result) > 0 )
					{
					while($row = mysqli_fetch_array($result))
					{

						?>
						<td style="text-align:center">
							<?php echo $row['plate_num'];?>
						</td>
					</tr>
					<?php
				}
			}
			?>
				</tbody>
			</table>
		</div>
		<div class="col-md-4">
			<table class="table">
				<thead>
					<tr>
						<th style="text-align:center">
							In progress <i class="fa fa-wrench" aria-hidden="true"></i>
						</th>
					</tr>
				</thead>
				<tbody  class="table-active">
					<tr>
						<?php
						$tar= date("Y-m-d");
		  			$sql = "SELECT car.plate_num 
					FROM car INNER JOIN queue 
					WHERE car.car_id=queue.car_id AND queue.date LIKE '$tar' AND status='In Progress' ORDER BY status DESC, queue_id ASC";
					$result = mysqli_query($connect,$sql);
					$x = 1;
					if(mysqli_num_rows($result) > 0 )
					{
					while($row = mysqli_fetch_array($result))
					{

						?>
						<td style="text-align:center">
							<?php echo $row['plate_num'];?>
						</td>
					</tr>
					<?php
				}
			}
			?>
				</tbody>
			</table>
		</div>

		<div class="col-md-4">
			<table class="table">
				<thead>
					<tr>
						<th style="text-align:center">
							Completed <i class="fa fa-check-square-o" aria-hidden="true"></i>
						</th>
					</tr>
				</thead>
				<tbody class="table-warning">
					<tr>
						<?php
						$tar= date("Y-m-d");
		  			$sql = "SELECT car.plate_num 
					FROM car INNER JOIN queue 
					WHERE car.car_id=queue.car_id AND queue.date LIKE '$tar' AND status='Completed' ORDER BY status DESC, queue_id ASC";
					$result = mysqli_query($connect,$sql);
					$x = 1;
					if(mysqli_num_rows($result) > 0 )
					{
					while($row = mysqli_fetch_array($result))
					{

						?>
						<td style="text-align:center">
							<?php echo $row['plate_num'];?>
						</td>
					</tr>
					<?php
				}
			}
			?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">

		<div class="col-md-12">
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		</div>
	</div>
</div>
</div>

<script>
window.addEventListener('load', function()
{
    var xhr = null;

    getXmlHttpRequestObject = function()
    {
        if(!xhr)
        {               
            // Create a new XMLHttpRequest object 
            xhr = new XMLHttpRequest();
        }
        return xhr;
    };

    updateLiveData = function()
    {
        var now = new Date();
        // Date string is appended as a query with live data 
        // for not to use the cached version 
        var url = 'display.php?' + now.getTime();
        xhr = getXmlHttpRequestObject();
        xhr.onreadystatechange = evenHandler;
        // asynchronous requests
        xhr.open("GET", url, true);
        // Send the request over the network
        xhr.send(null);
    };

    updateLiveData();

    function evenHandler()
    {
        // Check response is ready or not
        if(xhr.readyState == 4 && xhr.status == 200)
        {
            dataDiv = document.getElementById('liveData');
            // Set current data text
            dataDiv.innerHTML = xhr.responseText;
            // Update the live data every 1 sec
            setTimeout(updateLiveData(), 1000);
        }
    }
});

</script>
