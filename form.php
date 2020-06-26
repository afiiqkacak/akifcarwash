<?php
include('connection/connect.php');
date_default_timezone_set('Asia/Kuala_Lumpur');
$date = date("Y-m-d");
$time = date("H:i:s");

if(isset($_POST['submit'])){
	$platenum = $_POST['platenum'];

	// $checkBox = implode(',', $_POST['service']); jangandelete

	// echo $pele;

	$sql="INSERT INTO `queue`(`date`,`status`,`plate_num`) VALUES ('$time','$date','Queuing','$platenum')";
	
		mysqli_query($connect, $sql);

  		





// 	$sql3="INSERT INTO `queue_service`(`queue_id`, `service_id`) VALUES ('$someString','$checkBox')";
// 		if(mysqli_query($connect, $sql3)==TRUE){
		echo '<script language="javascript">';
		echo 'alert("'.$platenum.' is now in queue.");';
		echo 'window.location.href="index.php";';
		echo '</script>';
	}


// } else {
//   echo "Error: " . $sql . "<br>" . mysqli_error($connect);
}





mysqli_close($connect);

?>