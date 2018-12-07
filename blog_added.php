<?php
session_start();
$username=$_SESSION["username"];
$conn=mysqli_connect("localhost","root","") or die("could not connect database");
mysqli_select_db($conn,"blogger");
$heading=$_POST["heading"];
$short_desc=$_POST["shortdesc"];
$content=$_POST["content"];
 $sql="INSERT INTO blogs (author,title,short_desc,content) VALUES ('$username','$heading','$short_desc','$content')";
 $add_like="INSERT INTO total_like(author,title,username,likes,comment) VALUES ('$username','$heading','NULL',0,'NULL')";
   if (mysqli_query($conn,$sql))
	 {

    if (mysqli_query($conn,$add_like))
    {
      echo "<script>alert('Blog Added Successfully..');location='blogger_home.php';</script>";
    }
    }
    else
    {
   		$ql= "create table blogs (author text,title text,short_desc longtext,content longtext)";
   		if(mysqli_query($conn,$ql))
   		{
    		if (mysqli_query($conn,$sql))
    		{
          if (mysqli_query($conn,$add_like))
          {
    			   echo "<script>alert('Blog Added Successfully..');location='blogger_home.php';</script>";
          }
			
			}
		}
	}

?>