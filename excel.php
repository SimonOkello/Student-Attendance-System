<?php

//connect the database
$conn =mysql_connect("localhost","root","")or die(mysql_error());
$db =mysql_select_db('attendance', $conn)or die(mysql_error());

//Enter the headings of the excel columns

$contents="REGISTRATION NUMBER,STUDENT NAMES,DEPARTMENT, ATTENDANCE, DATE & TIME\n";

$query = mysql_query("SELECT attendance.stud_id,login_date, status,reg_no,f_name,l_name,department FROM attendance,students WHERE attendance.stud_id=students.stud_id ")or die(mysql_error());

//Mysql query to get records from datanbase


//While loop to fetch the records
while($row = mysql_fetch_array($query))
{
$contents.=$row['reg_no'].",";
$contents.=$row['f_name']." ".$row['l_name'].",";
$contents.=$row['department'].",";
$contents.=$row['status'].",";
$contents.=$row['login_date']."\n";
}

// remove html and php tags etc.
$contents = strip_tags($contents); 

//header to make force download the file
header("Content-Disposition: attachment; filename=Attendance_Report.xls".date('d-m-Y').".csv");
print $contents;

//For more examples related PHP visit www.webinfoipedia.com and enjoy demo and free download..
?>