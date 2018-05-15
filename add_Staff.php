<?php
include "session.php";
include "include/connection.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Staff</title>
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
               <li class="active-link" >
                        <a href="adminhome.php" ><i class="fa fa-desktop "></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="student.php"><i class="fa fa-group "></i>Students</a>
                    </li>
                   <li class="active-link">
                        <a href="viewStaff.php"><i class="fa fa-group "></i>Staff</a>
                    </li>
                    <li>
                        <a href="department.php"><i class="fa fa-building "></i>Department</a>
                    </li>
                    <li>
                        <a href="attendance.php"><i class="fa fa-edit "></i>Attendance</a>
                    </li>
                      
                     </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2 style="font-weight: bold;">Add Lecturer </h2> 
                                          <?php
  if (isset($_POST['submit'])) {
   $f_name=htmlentities($_POST['f_name']);
  $l_name=htmlentities($_POST['l_name']);
  $username=htmlentities($_POST['username']);
  $password=htmlentities($_POST['password']);
  $email=htmlentities($_POST['email']);
  $department=htmlentities($_POST['department']);
  $position=htmlentities($_POST['position']);

    

      $query="SELECT * FROM staff WHERE email ='$email'";
      $result=mysql_query($query,$conn);
      $row=mysql_fetch_array($result);
      if (!empty($row)) {
        echo (mysql_affected_rows()) ? "Staff Already Exists.<br />" : "";
      }else{
      $query="INSERT INTO staff (f_name, l_name, username, password, email, department, position)VALUES('$f_name', '$l_name', '$username', '$password','$email', '$department', '$position')";
      
      if (!mysql_query($query))
      {
      die('Error: ' . mysql_error());
      }else{
       echo (mysql_affected_rows()) ? "Staff Added.<br />" : "Nothing Added. <br />";
  }
  }
   
    }
    mysql_close($conn)
?> 
                     
                    </div>
                </div>              
                  <hr />
                  
              <div class="container">
<a href='viewStaff.php' class='btn btn-primary'><i class="fa fa-arrow-left icon-white"></i> Back To Staff</a><br>

<form action="add_Staff.php" method="POST"  role="form">
        <div class="row">
          <div class="col-md-4">
  <div class=" form-group">
    <label class="control-label"  for="f_name">First name:</label>
      <input type="text" class="form-control" name="f_name" placeholder="Firstname" required>
    </div>
  <div class=" form-group">
    <label class="control-label " for="l_name">Last name:</label>
      <input type="text" class="form-control" name="l_name" placeholder="Last name" required>
    
  </div>
  <div class="form-group">
    <label class="control-label" for="username">Username:</label>
      <input type="text" class="form-control" name="username" placeholder="Username" required>
  </div>


  <div class="form-group">
     <label class="control-label" for="password">Password:</label>
      <input type="password" class="form-control" name="password" placeholder="Password" required>
  </div>
</div>
<div class="col-md-4">
  <div class="form-group">
    <label class="control-label col-md-2" for="gender">Email:</label>
      <input type="email" class="form-control" name="email" placeholder="someone@domain.com" required>
    
  </div>
   <div class="form-group">
    <label class="control-label col-md-2" for="department">Department:</label>
      <select name="department" class="form-control">
            <option selected="selected" value="">select department</option>
            <option>COHRED</option>
            <option>IT</option>
            <option>COATEC</option>
            <option>COPAS</option>
          </select>
  </div>
  <div class="form-group">
    <label class="control-label" for="address">Position:</label>
      <input type="text" class="form-control" name="position" placeholder="Position" required>
   
  </div>
</div>
</div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-6">
   <button type="submit" name="submit" class="btn btn-primary">Register</button>
    </div>
  </div>
  </div>
</div>
</form>
</div>
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        
    <div class="footer">
    <div class="row">
                <div class="col-lg-12" >
                    &copyright; 2017 OLIYA.
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
