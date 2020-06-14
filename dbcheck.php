<?php
include('connection/connect.php');
$sql3 = "SELECT * FROM queue ORDER BY queue_id DESC LIMIT 1";
$result2 = mysqli_query($connect, $sql3);
if (mysqli_num_rows($result2)) {
	$masa=$result3['completed_time'];
	echo $masa;
	
	$time=time();
	echo "$time";

	// $timestampCheck = time() - 120;
	// if ($result3['completed_time'] >= $timestampCheck){

	// 	echo "<audio src='bell.mp3' controls autoplay></audio>";

}
else{
	
}
?>
