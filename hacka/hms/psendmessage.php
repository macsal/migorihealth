<script src="sweetalert.min.js"></script>
<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['send']))
{


$userid=$_SESSION['id'];
$doctorid=$_POST['doctor'];
$message=$_POST['message'];
$date=date('Y-m-d');


	$query=mysql_query("insert into d_mbox(id,patient_id,doctorid,message,date) values('','$userid','$doctorid','$message','$date')");
	if($query)
	{
		header('location:message.php');
	}else{
		echo "not sent".mysql_error();
		echo "$userid";
	}

}
?>