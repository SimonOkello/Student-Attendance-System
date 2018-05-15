<?php
include "session.php";
include "connection.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
     <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                </div>
              <?php include "clock.php";?>
                <span class="logout-spn" >
                  <?php $query= mysql_query("select * from admin where id = '$session_id'")or die(mysql_error());
                  $row = mysql_fetch_array($query);
              ?>
              <?php echo "User:  ". $row['username'];  ?> 
              <br><br>
                  <a href="logout.php" style="color:#fff;">LOGOUT</a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 <li class="active-link">
                        <a href="adminhome.php" ><i class="fa fa-desktop "></i>Dashboard</a>
                    </li>
                   

                    <li>
                        <a href="student.php"><i class="fa fa-group "></i>Students  <span class="badge"></span></a>
                    </li>
                     <li>
                        <a href="viewStaff.php"><i class="fa fa-group "></i>Staff <span class="badge"></span></a>
                    </li>
                     <li>
                        <a href="department.php"><i class="fa fa-building "></i>Department <span class="badge"></span></a>
                    </li>
                    <li>
                        <a href="attendance.php"><i class="fa fa-edit "></i>Attendance <span class="badge"></span></a>
                    </li>
                        
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                  <br><br>
                    <div class="col-lg-12">
                     <h1 style="font-weight: bold;">ADMIN DASHBOARD</h1>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
                             <table style="font-size: 1.5em; font-weight: 800;" class="table">
                <tr>
                  <?php 
                      $students = mysql_query("SELECT COUNT(*) AS `users` FROM `students`");
                      $row = mysql_fetch_assoc($students);
                      $number = $row['users'];
                      ?>
                  <td>Total Students:</td>
                  <td><?php echo $number ?></td>
                </tr>
                <tr>
                  <?php 
                      $staff = mysql_query("SELECT COUNT(*) AS `total` FROM `staff`");
                      $row = mysql_fetch_assoc($staff);
                      $total = $row['total'];
                      ?>
                  <td>Total Lecturers:</td>
                  <td><?php echo $total ?></td>
                </tr>
                <tr>
                  <?php 
                      $attendance = mysql_query("SELECT  COUNT(*) AS `total` FROM `attendance`");
                      $row = mysql_fetch_assoc($attendance);
                      $total = $row['total'];
                      ?>
                  <td>Total Attendance:</td>
                  <td><?php echo $total ?></td>
                </tr>
                
                
              </table>
                        </div>
                       
                    </div>
                    </div>
                  <!-- /. ROW  -->
                
                  <!-- /. ROW  --> 
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer">
     <div class="row">
                <div class="col-lg-12" >
                    <p>Copyright &copy;2018. All rights reserved. Developed by OLIYA</p>
                </div>
            </div>
        </div>
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
