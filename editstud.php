<?php
include "session.php";
include "connection.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Student</title>
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
               <li  >
                        <a href="adminhome.php" ><i class="fa fa-desktop "></i>Dashboard</a>
                    </li>
                     <li class="active-link">
                        <a href="student.php"><i class="fa fa-group "></i>Students</a>
                    </li>
                   <li>
                        <a href="viewStaff.php"><i class="fa fa-group "></i>Staff</a>
                    </li>
                    <li>
                        <a href="stud.php"><i class="fa fa-building "></i>Departments</a>
                    </li>
                    <li>
                        <a href="dep.php"><i class="fa fa-edit "></i>Attendance</a>
                    </li>
                      
                     </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Students </h2>   
          <?php
//if (isset($_GET['edit']) && isset($_GET['id'])) {
    if (isset($_GET['id'])) {
    $reg_no =  $_GET['id'];
    if (isset($_POST['submitted'])) {

        $sql = mysql_query("UPDATE `students` SET  `f_name` =  '{$_POST['f_name']}',`l_name` =  '{$_POST['l_name']}',`department` =  '{$_POST['department']}',`course` =  '{$_POST['course']}',`teacher` =  '{$_POST['teacher']}',`yrOfStudy` =  '{$_POST['yrOfStudy']}' WHERE `reg_no` = '$reg_no'  ")or die(mysql_error());

       
        echo (mysql_affected_rows()) ? "Student Updated.<br />" : "Nothing changed. <br />";
       
    }
    $row = mysql_fetch_array(mysql_query("SELECT * FROM `students` WHERE `reg_no` = '$reg_no' "));
  
    } ?> 
                    </div>
                </div>              
                  <hr />
                   <a href='student.php' class='btn btn-primary'><i class="fa fa-arrow-left icon-white"></i> Back To Students</a><br>
          <div class="row">
                    <div class="col-lg-12 ">
              
                 
                   <form action='' method="POST" class="form-horizontal" >
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="l_name">First name:</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="f_name" placeholder="Firstname" value='<?php echo stripslashes($row['f_name']) ?>'>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="gender">Last name:</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="l_name" placeholder="Lastname" value='<?php echo stripslashes($row['l_name']) ?>'>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="department">Department:</label>
     <div class="col-sm-6">
      <input type="text" class="form-control" name="department" placeholder="department" value='<?php echo stripslashes($row['department']) ?>'>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="address">Course:</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="course" placeholder="Course" value='<?php echo stripslashes($row['course']) ?>'>
    </div>
  </div>
  <div class="form-group">
        <label class="control-label col-sm-2" for="teacher"> Year of Study</label >
        <div class="col-sm-6">

<select name="yrOfStudy" class="form-control" required />
<option value="<?php echo $row['yrOfStudy']; ?>"><?php echo $row['yrOfStudy']; ?></option>
            <option value="1.1">1.1</option>
            <option value="1.2">1.2</option>
            <option value="2.1">2.1</option>
            <option value="2.2">2.2</option>
            <option value="3.1">3.1</option>
            <option value="3.2">3.2</option>
            <option value="4.1">4.1</option>
            <option value="4.2">4.2</option>
</select>
</div>
</div>
  <div class="form-group">
        <label class="control-label col-sm-2" for="teacher"> Class Teacher</label >
        <div class="col-sm-6">

<select name="teacher" class="form-control" required />
<option value="<?php echo $row['teacher']; ?>"><?php echo $row['teacher']; ?></option>
<?php $s="select * from staff ";
$q=mysql_query($s) or die($s);
while($rw=mysql_fetch_array($q))
{ ?>
<option value="<?php echo $rw['f_name']." ".$rw['l_name']; ?>"><?php echo $rw['f_name']." ".$rw['l_name']; ?></option>
<?php } ?>
</select>
</div>
</div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-6">
      <input type="submit"  value="Save" class="btn btn-primary"/>
      <input type='hidden' value='1' name='submitted' /> 
    </div>
  </div>
</form>

                       
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
