<?php
include "session.php";
include "connection.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Department</title>
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
              <li class="active-link">
                        <a href="adminhome.php" ><i class="fa fa-desktop "></i>Dashboard</a>
                    </li>
                   <li>
                        <a href="student.php"><i class="fa fa-group "></i>Students</a>
                    </li>
                    <li>
                        <a href="viewStaff.php"><i class="fa fa-group "></i>Staff</a>
                    </li>
                    <li class="active-link">
                        <a href="department.php"><i class="fa fa-building "></i>Department</a>
                    </li>
                     <li>
                        <a href="attendance.php"><i class="fa fa-edit"></i>Attendance</a>
                    </li>   
                     </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2 style="font-weight: bold;">Add Department </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
              <div class="container">
        <div class="row">
        <div class="col-md-4">
           <a class="btn btn-large btn-primary" href="department.php"><i class="fa fa-arrow-left icon-white"></i>Back To Departments</a><br/><br/>
           <?php
  if (isset($_POST['submit'])) {
    $department=htmlentities($_POST['department']);
  $course=htmlentities($_POST['course']);
 

    if (!empty($department) && !empty($course)) {
      $query="SELECT * FROM department WHERE department ='$department' AND course='$course' ";
      $result=mysql_query($query,$conn);
      $row=mysql_fetch_array($result);
      if (!empty($row)) {
        echo "<script type='text/javascript'>alert('The Department/Course already exists')</script>";
      }else{
      $query="INSERT INTO department ( department, course)VALUES('$department', '$course')";
      if (!mysql_query($query))
      {
      die('Error: ' . mysql_error());
      }else{
        echo "<script type='text/javascript'>alert('You have successfully added the department.');window.location.href='department.php'</script>";
  }
  }
    }else{
      echo "<script type='text/javascript'>alert('Fill the blank fields')</script>";
    }
    }
    mysql_close($conn)
?>
         <form action="dep.php" method="POST">
      <div class="form-group">
        <label class="control-label col-sm-6" for="department">Department Section</label>
        <div class="form-group">
        <input type="text" class="form-control" name="department" placeholder="Department name">
      </div>
       <br>
        <input type="text"  name="course" class="form-control" placeholder="Enter Course">
        <br>
      <button type="submit" name="submit" class="btn btn-primary">Add</button> 
 </form>   
        </div>
      
        </div>
                 <!-- /. ROW  -->           
    </div>


             <!-- /. PAGE INNER  -->
         
</div>
</div>
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
