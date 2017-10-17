<?php

include 'connection.php';

$user_name=$_POST['name'];
$user_course=$_POST['course'];
$user_studentno=$_POST['student_no'];


  $sql = "INSERT INTO studentsform(name,course,student_no) VALUES('$user_name','$user_course','$user_studentno')";
  $result = $conn->query($sql);//execute code


if(!$result){
	echo $user_name;
	echo $user_course;
	echo $user_studentno;
	echo "not successful";

}else{
	echo "Submission successful"." "."<a href='student.php'>student</a>";
}


?>