<?php
$to = "afiq.fadhli98@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: afiqfadhliii@gmail.com" . "\r\n" .
"CC: afiqfadhliii@gmail.com";

mail($to,$subject,$txt,$headers);
?>
