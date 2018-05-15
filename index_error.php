<?php 
include "include/connection.php";
?>
<!DOCTYPE HTML>
<html>
<head>
<title>SAS</title>
<link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 

<!--web-fonts-->
<link href='//fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
<!--web-fonts-->
</head>
<body style="background-image: url(images/banner1.jpg);">
			<div class="main">
				<center>
		<h1 style="font-size: 5em; color:#fff;"> STUDENTS ATTENDANCE SYSTEM</h1>
	</center>
			<br><br>
				<div class="login">
					<div class="login-top">
						<img src="images/p.png">
					</div>
					<h1>User Login</h1>
					<div class="login-bottom">
					<form action="login.php" method="POST" >
						<input type="text" name="username" placeholder="Username" required=" ">					
						<input type="password"  name="password" class="password" placeholder="Password" required=" ">						<select style="  font-size: 1em; width: 100%; padding: .6em .8em; outline: none; background: #eaeaea; border: none; border-radius: 5px; text-align: center; margin-bottom: 15px; font-family: 'PT Sans Narrow',sans-serifoutline: none;" name="access">
						<option value="admin">Admin</option>
						<option value="lecturer">Lecturer</option>
						<option value="student">Student</option>
					</select>
						<input type="submit" value="login" name="login">
					</form>
					<a href="#"><p>Forgot your password? Click Here</p></a>
					</div>
					<br><br>
					 <div  class="alert alert-dismissable alert-warning">
			   Sorry Your Usename or Password is Incorrect!
				</div>
			</div>
</body>
</html>
