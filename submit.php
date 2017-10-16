<?php

include 'connects.php';

$name=$_GET['name'];
$student_no=$_GET['student_no'];
$course=$_GET['course'];
//$user_date=$_GET['date'];


  $result = mysql_query("INSERT INTO students(name,student_no,course,date) VALUES('','$user_name','$user_number','$user_course','$user_date')");

  if ($result)
{

echo "Submitted successfully"." "."<a href='student.html'>Saved</a>";

}
else
{
echo "0";
}
?>