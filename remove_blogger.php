<?php
session_start();
$conn=mysqli_connect("localhost","root","") or die("Could Not Connect");
mysqli_select_db($conn,"blogger");
$username=$_SESSION["username"];
$yes="YES";
	$update="DELETE FROM writer where username='$username'";
    $deletes="DELETE FROM total_like where username='$username'";
    $deletess="DELETE FROM blogs where author='$username'";
	if (mysqli_query($conn,$update))
	{
        if (mysqli_query($conn,$deletes))
    {
        if (mysqli_query($conn,$deletess))
    {
    	echo "<script>alert('Bloogger Removed Successfully');";
     	echo 'window.location= "admin_home.php"</script>'; 
    }}}
    else
    {
    	echo "Failed". mysqli_error($conn);
    }
?>