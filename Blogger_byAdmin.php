<?php
$conn=mysqli_connect("localhost","root","") or die("Could Not Connect");
mysqli_select_db($conn,"blogger");
$query="select * from writer";
$result=mysqli_query($conn,$query);
?>
<h2>Blogger List</h2>
<?php
$i=1;
while($rows = mysqli_fetch_array($result))
{ 
   $username = $rows['username'];
   $name = $rows['name'];
   $email = $rows['email'];
   $gender = $rows['gender'];
   $photo = $rows['photo'];
   $permission=$rows['permission'];
   echo "<x style='font-size:20px;'>$i.<br>";
   echo "<img src='$photo' alt='$photo' style='width:250px;height:300px;'><br><b>Name : </b>$name</x><br><b>Userame : </b>$username<br><b>Email :</b> $email<br><b>Gender : </b>$gender<br><b>Permission : </b>$permission<br>";      
   $i=$i+1;
}

?>