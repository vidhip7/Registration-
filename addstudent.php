<?php
include 'dbconnect.php';

if(isset($_POST['register'])){

$studentid=$_POST['studentid'];
$studentname=$_POST['studentname'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$birthdate=$_POST['birthdate'];
$branch=$_POST['branch'];
$password=$_POST['password'];

$sql="INSERT INTO student_info(studentid,studentname,gender,email,birthdate,branch,password)
		VALUES('$studentid','$studentname','$gender','$email','$birthdate','$branch','$password')";

	if(!$result= $db->query($sql)){
		die ('There was an error running the query'.$db->error);
		}
	

}

?>