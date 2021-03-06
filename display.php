<!DOCTYPE html>
<html lang="en">

  <head>
  	<meta http-equiv="refresh" content="300"/>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js"></script> -->
<script type="text/javascript" src="reloader.js"></script>

<link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<script type="text/javascript">// <![CDATA[
$(document).ready(function() {
$.ajaxSetup({ cache: false }); // This part addresses an IE bug. without it, IE will only load the first number and will never refresh
setInterval(function() {
$('#divToRefresh').load('dbcheck.php');
}, 10000); // refers to the time to refresh the div. it is in milliseconds.
});
// ]]></script>



</head>



<br>
	<div class="row">
		<div class="col-md-4">
			<table class="table">
				<thead>
					<tr>
						<th style="text-align:center; font-size:30px;">
							Queuing <i class="fa fa-car" aria-hidden="true"></i>
						</th>
					</tr>
				</thead>
				<tbody class="table-danger" id="liveData3" style="text-align:center; font-size:40px;">
				</tbody>
				
			</table>
		</div>
		<div class="col-md-4">
			<table class="table">
				<thead>
					<tr>
						<th style="text-align:center; font-size:30px;">
							In progress <i class="fa fa-wrench" aria-hidden="true"></i>
						</th>
					</tr>
				</thead>
				<tbody class="table-warning" id="liveData2" style="text-align:center; font-size:40px;">
					<tr>

						<td style="text-align:center">
						</td>
					</tr>
				</tbody>
			</table>

		</div>

		<div class="col-md-4">
			<table class="table">
				<thead>
					<tr>
						<th style="text-align:center; font-size:30px;">
							Completed <i class="fa fa-check-square-o" aria-hidden="true"></i>
						</th>
					</tr>
					
				</thead>
				<tbody class="table-success" id="liveData" style="text-align:center; font-size:40px;">
					<tr>

						<td style="text-align:center">
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">

	</div>
	<div class="row">
		<div class="col-md-12" id="check">


		</div>
		<div class="col-md-12" id="sound">

			
		</div>
	</div>
</div>
<!-- </div> -->

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
        var url = 'complete.php?' + now.getTime();
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
            setTimeout(updateLiveData(), 10000);
        }
    }
});


window.addEventListener('load', function()
{
    var xhr2 = null;

    getXmlHttpRequestObject2 = function()
    {
        if(!xhr2)
        {               
            // Create a new XMLHttpRequest object 
            xhr2 = new XMLHttpRequest();
        }
        return xhr2;
    };

    updateLiveData2 = function()
    {
        var now2 = new Date();
        // Date string is appended as a query with live data 
        // for not to use the cached version 
        var url2 = 'progress.php?' + now2.getTime();
        xhr2 = getXmlHttpRequestObject2();
        xhr2.onreadystatechange = evenHandler2;
        // asynchronous requests
        xhr2.open("GET", url2, true);
        // Send the request over the network
        xhr2.send(null);
    };

    updateLiveData2();

    function evenHandler2()
    {
        // Check response is ready or not
        if(xhr2.readyState == 4 && xhr2.status == 200)
        {
            dataDiv = document.getElementById('liveData2');
            // Set current data text
            dataDiv.innerHTML = xhr2.responseText;
            // Update the live data every 1 sec
            setTimeout(updateLiveData2(), 10000);
        }
    }
});

window.addEventListener('load', function()
{
    var xhr3 = null;

    getXmlHttpRequestObject3 = function()
    {
        if(!xhr3)
        {               
            // Create a new XMLHttpRequest object 
            xhr3 = new XMLHttpRequest();
        }
        return xhr3;
    };

    updateLiveData3 = function()
    {
        var now3 = new Date();
        // Date string is appended as a query with live data 
        // for not to use the cached version 
        var url3 = 'q.php?' + now3.getTime();
        xhr3 = getXmlHttpRequestObject3();
        xhr3.onreadystatechange = evenHandler3;
        // asynchronous requests
        xhr3.open("GET", url3, true);
        // Send the request over the network
        xhr3.send(null);
    };

    updateLiveData3();

    function evenHandler3()
    {
        // Check response is ready or not
        if(xhr3.readyState == 4 && xhr3.status == 200)
        {
            dataDiv = document.getElementById('liveData3');
            // Set current data text
            dataDiv.innerHTML = xhr3.responseText;
            // Update the live data every 1 sec
            setTimeout(updateLiveData3(), 10000);
        }
    }
});


</script>
