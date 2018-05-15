<?php
session_start();
    include('connection.php');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $access=$_POST['access'];
    /* user */
 if ($access == "admin") {
  $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
      $result = mysql_query($query)or die(mysql_error());
      $row = mysql_fetch_array($result);
  if ($row >0) {
     $_SESSION['id']=$row['id'];
        $_SESSION['username']=$username;
            header("Location:adminhome.php");
  } else {
   header("Location:index_error.php");
  }
  }
  elseif ($access == "lecturer") {
  $query = "SELECT * FROM staff WHERE username='$username' AND password='$password'";
      $result = mysql_query($query)or die(mysql_error());
      $row = mysql_fetch_array($result);
  if ($row >0) {
     $_SESSION['id']=$row['staff_id'];
        $_SESSION['username']=$username;
            header("Location:lechome.php");
  } else {
   header("Location:index_error.php");
  }
  }
  elseif ($access == "student") {
  $query = "SELECT * FROM students WHERE username='$username' AND password='$password'";
      $result = mysql_query($query)or die(mysql_error());
      $row = mysql_fetch_array($result);
  if ($row >0) {
     $_SESSION['id']=$row['stud_id'];
        $_SESSION['username']=$username;
        $studId=$_SESSION['id'];
        $user=$_SESSION['username'];
        $sql = "INSERT INTO `attendance` (`stud_id`,`username`,`login_date`,`status`) VALUES ('$studId','$user', NOW(), 'Present')";
        $query = mysql_query($sql);

            header("Location:student_home.php");
  } else {
   header("Location:index_error.php");
  }
  }
      
      
    
    ?>