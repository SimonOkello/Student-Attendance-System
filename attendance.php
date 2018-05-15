<?php
include "session.php";
include('connection.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Attendance Summary</title>
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
               <li >
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
                    <li class="active-link">
                        <a href="attendance.php"><i class="fa fa-edit "></i>Attendance <span class="badge"></span></a>
                    </li>
                      
                     </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                      <br><br>
                     <h2 style="font-weight: bold;">Attendance Summary </h2>   
                    </div>
                </div>              
                  <hr />
          <div class="row">
            <?php
if(isset($_GET['delete'] , $_GET['id'])){
$reg_no = (int) $_GET['id']; 
mysql_query("DELETE FROM `students` WHERE `reg_no` = '" .stripslashes($reg_no)."' ") ; 
echo (mysql_affected_rows()) ? "Student deleted.<br /> " : "Nothing deleted.<br /> ";
}
?> 
                    <div class="col-lg-12 ">
                        <a class="btn btn-large btn-primary" href="Full_attendance.php"><i class="icon-plus icon-white"></i>See Full report</a><br/><br/>
<table class="table table-hover table-striped table-condensed table-bordered">
    <thead class="" >
        <th>#</th>
        <th>RegNo:</th>
         <th>Firstname:</th>
        <th>Lastname:</th>
        <th>Department:</th>
        <th>Attendance</th>
        
        
        </thead>
    <tbody>
  <?php

$query = mysql_query("SELECT COUNT(attendance.stud_id) AS attend,attendance_id,status,reg_no,f_name,l_name,department FROM attendance,students WHERE attendance.stud_id=students.stud_id GROUP BY attendance.stud_id")or die(mysql_error());
$i=0;
 while($row = mysql_fetch_array($query)){
$i+=1;
    echo '<tr>';
        echo '<td>'.$i.'</td>';
        echo '<td>'.$row['reg_no'].'</td>';
        echo '<td>'.$row['f_name'].'</td>';
        echo '<td>'.$row['l_name'].'</td>';
        echo '<td>'.$row['department'].'</td>';
        echo '<td>'.$row['attend'].'</td>';
        
         
           /*echo '<td  style="text-align: center">
                <a href="editstud.php?edit=1&id='.$row['reg_no'].'" class="btn btn-primary btn-mini"><i class="icon-edit icon-white"></i>Edit</a> | 
               <a href="?delete=1&id='.$row['reg_no'].'" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i>Delete</a> 
            </td>';*/
         

    echo '</tr>';
}
?>
</tbody>
</table>
                       
                    </div>
                    </div>
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
