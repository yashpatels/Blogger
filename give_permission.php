<?php
session_start();
$conn=mysqli_connect("localhost","root","") or die("Could Not Connect");
mysqli_select_db($conn,"blogger");
$username=$_SESSION["username"];
$yes="YES";
	$update="UPDATE writer SET permission='$yes' where username='$username'";
	if (mysqli_query($conn,$update))
	{
    	echo "<script>alert('Permission Given Successfully');";
     	echo 'window.location= "admin_home.php"</script>'; 
    }
    else
    {
    	echo "Failed". mysqli_error($conn);
    }
?>