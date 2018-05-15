<?php
// the message
$msg = "You are registered into the system";

//$email=htmlentities($_POST['email']);

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail('simonokello93@yahoo.com','Welcome Note',$msg,'From: simonokello93@gmail.com');
?>