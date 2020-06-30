<?php 
include('connection/connect.php');
date_default_timezone_set('Asia/Kuala_Lumpur');
$time = date("H:i:s");

if(isset($_POST['status'])){
	$plate=$_POST['plate'];
	$queueid = $_POST['queueid'];
	$sql="SELECT plate_num from queue WHERE queue_id='$queue'";
	$result=mysqli_query($connect, $sql);
	$row=mysqli_fetch_array($result);
	
	if($plate != $row){
		$sql = "UPDATE `queue` SET `plate_num` = '$plate' WHERE `queue_id` = '$queueid'";
		mysqli_query($connect, $sql);
		echo '<script language="javascript">';
		echo 'window.location.href="index.php";';
		echo '</script>';
	}
	
	$status = $_POST['status'];
	$queueid = $_POST['queueid'];
	
	
	
		
	
	
	

	if($status=="Completed"){
		
		$sql = "UPDATE `queue` SET `status` = '$status' WHERE `queue_id` = '$queueid'";
		mysqli_query($connect, $sql);
		echo '<script language="javascript">';
		echo 'window.location.href="index.php";';
		echo '</script>';



	}else{




	$sql = "UPDATE `queue` SET `status` = '$status' WHERE `queue_id` = '$queueid'";
	$result = mysqli_query($connect, $sql);

	if($result == TRUE){
				echo '<script language="javascript">';
				echo 'window.location.href="index.php";';
				echo '</script>';
			}else{
				echo '<script language="javascript">';
				echo 'alert("delete Fail");';
				echo 'window.location.href="../admin/assign.php";';
				echo '</script>';
			}
		}

			mysqli_close($connect);
		}
?>
