﻿<?php
include "session.php";
include "include/connection.php";

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Profile</title>
  <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
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
                   <?php $query= mysql_query("SELECT * FROM students WHERE stud_id = '$session_id'")or die(mysql_error());
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
               <li  >
                        <a href="student_home.php" ><i class="fa fa-desktop "></i>Dashboard</a>
                    </li>
                     <li class="active-link">
                        <a href="profile.php"><i class="fa fa-user "></i>My Profile  <span class="badge"></span></a>
                    </li>
                     <li>
                        <a href="my_attendance.php"><i class="fa fa-edit "></i>My attendance <span class="badge"></span></a>
                    </li>
                      
                     </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2 style="font-weight: bold;">My Profile </h2>  


                      <?php
 

    $query= mysql_query("SELECT * FROM students WHERE stud_id= '$session_id' ")or die(mysql_error());
    $row=mysql_fetch_array($query);
                  
?> 
                    </div>
                </div>              
                  <hr />
              <div class="container">

                <table style="width: 85%" class="table table-hover table-striped table-condensed table-bordered">
                <tr>
                  <td style="font-weight:bold; text-transform: uppercase;">Registration Number:</td>
                  <td><?php echo $row['reg_no'] ?></td>
                </tr>
                <tr>
                  <td style="font-weight:bold; text-transform: uppercase;">First Name:</td>
                  <td><?php echo $row['f_name'] ?></td>
                </tr>
                <tr>
                  
                  <td style="font-weight:bold; text-transform: uppercase;">Last Name:</td>
                  <td><?php echo $row['l_name'] ?></td>
                </tr>
                 <tr>
                  
                  <td style="font-weight:bold;text-transform: uppercase;">Gender:</td>
                  <td><?php echo $row['gender'] ?></td>
                </tr>
                 <tr>
                  
                  <td style="font-weight:bold; text-transform: uppercase;">Department:</td>
                  <td><?php echo $row['department'] ?></td>
                </tr>
                 <tr>
                  
                  <td style="font-weight:bold; text-transform: uppercase;">Course:</td>
                  <td><?php echo $row['course'] ?></td>
                </tr>
                 <tr>
                  
                  <td style="font-weight:bold; text-transform: uppercase;">Year of Study:</td>
                  <td><?php echo $row['yrOfStudy'] ?></td>
                </tr>
                 <tr>
                  
                  <td style="font-weight:bold; text-transform: uppercase;">Class Teacher:</td>
                  <td><?php echo $row['teacher'] ?></td>
                </tr>
                
              </table>
    
       
</div>
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        
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