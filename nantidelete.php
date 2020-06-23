<?php
// the message
$msg = "Your password\n123";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("afiq.fadhli98@gmail.com","My subject",$msg, "From: me@you.com");
?>