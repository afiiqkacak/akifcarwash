<?php
date_default_timezone_set('Asia/Kuala_Lumpur');
include('connection/connect.php');
$sql3 = "SELECT * FROM queue ORDER BY queue_id DESC LIMIT 1";
$result2 = mysqli_query($connect, $sql3);
if (mysqli_num_rows($result2)) {
	while($row2 = mysqli_fetch_array($result2)) {

	$masa=$row2['completed_time'];
	$memasa=$masa("H:i");
	echo $memasa;
	echo '\n';

	$time=date("H:i");
	echo $time;

	// $timestampCheck = $time - 120;
	// 	if ($masa >= $timestampCheck){
	// 			echo "<audio src='bell.mp3' controls autoplay></audio>";
	// }else{
	// 	echo "listening";
	// }
}

	
}
?>
