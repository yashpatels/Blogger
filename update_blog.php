<?php
session_start();
$username=$_SESSION["username"];
$title=$_SESSION["title"];
$conn=mysqli_connect("localhost","root","") or die("could not Connect");
mysqli_select_db($conn,"blogger");
$query="SELECT * FROM blogs WHERE author='$username' AND title='$title'";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($result))
{
	$short=$row['short_desc'];
	$content=$row['content'];
	?>
	<form action="" method="POST">
	<table>
			<tr><td>Heading : </td><td><input type="text" name="heading"  value="<?php echo $title ?>" disabled></td></tr>
			<tr><td>Short Description : </td><td><textarea rows="3" cols="50" name="shortdesc">"<?php echo $short ?>"</textarea></td></tr>
			<tr><td>Content : </td><td><textarea rows="20" cols="50" name="content">"<?php echo $content ?>"</textarea></td></tr>
		</table>
		<input type="submit" name="submit" value="Update">
		</form>
	<?php
}

if(isset($_POST['submit']))
{
	$short_desc=$_POST['shortdesc'];
	$content=$_POST['content'];
	$update_data="UPDATE blogs SET short_desc='$short_desc', content='$content' where author='$username' AND title='$title'";
	if(mysqli_query($conn,$update_data))
	{
		echo "<script>alert('Blog Updated Successfully');window.location.href='blogger_home.php';</script>";
	}
}
?>