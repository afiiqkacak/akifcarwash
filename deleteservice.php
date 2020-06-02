<?php

include('connection/connect.php');

$queueid = $_GET["serviceid"];


	$sql = "DELETE FROM service WHERE service_id = '".$queueid."'";
	$result = mysqli_query($connect, $sql);

	if($result == TRUE){
				echo '<script language="javascript">';
				echo 'window.location.href="services.php";';
				echo '</script>';
			}else{
				echo '<script language="javascript">';
				echo 'alert("delete Fail");';
				echo 'window.location.href="../admin/assign.php";';
				echo '</script>';
			}

			mysqli_close($connect);

?>