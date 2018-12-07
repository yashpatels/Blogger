<?php
$conn=mysqli_connect("localhost","root","") or die("could not connect database");
mysqli_select_db($conn,"blogger");
$username='';
session_start();
$username=$_SESSION["username"];
if($username==''){
   echo "<script>location='home.php';</script>";
}
if($username<>''){
$query="select * from writer where username='$username'";
$result=mysqli_query($conn,$query);
while($row = $result->fetch_assoc())
{
	$permission=$row['permission'];
	$name=$row['name'];
	$email=$row['email'];
	$gender=$row['gender'];
	$photo=$row['photo'];
	$email_auth=$row['email_auth'];
	$otp=$row['otp'];
	if($email_auth=="NO")
	{
		?>
		<style type="text/css">
			input{
	width: 100%;
    font-size: 15px;
    padding: 12px 20px;
    margin: 8px 0;
    color: black;
    box-sizing: border-box;
    border: none;
    border-bottom: 2px white;
    outline:none;
    background:#e1dede8a;		
}
		</style>
		<form action="" method="POST">
		<input type="text" name="otp" placeholder="Enter OTP Sent to your Email">
		<input type="submit" name="confirm" value="confirm">
		</form>
		<?php
		if(isset($_POST["confirm"]))
		{
			if($_POST["otp"]==$otp)
			{
			$update_email="UPDATE writer SET email_auth='YES' where username='$username'";
			if(mysqli_query($conn,$update_email))
			{
				echo "<script>alert('Updated Succesfully');window.location.href='blogger_home.php';</script>";
			}
			}
			else
			{
				echo "<script>alert('Wrong OTP');window.location.href='blogger_home.php';</script>";
			}
		}
	}
	else
	{

?>
<style type="text/css">
	#navbar{
    overflow: hidden;
    background-color: #000000b0;
    width: 100%;  
  position: fixed;
  top: 0;
}
#logo
{
    display: block;
    float:left;
    margin:0;
}
#logsign{
    display: block;
    float:right;
    padding-top: 22px;
    padding-right: 10px;
}
#logsign :hover{
    color:#e70bff;
}
#navbar a {
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}
#left_bar{
	display: inline-block;
	background: #0000009c;
	height:100%;
	width: 19%;
		color: white;
	vertical-align: top;
  margin-top: 3.5%;
	height: 100%;
    position: fixed;
    overflow-x: hidden;
    padding-top: 20px;
}
#main_content{
	display: inline-block;
	background: #0000009c;
	color: white;
	width: 80.5%;
	margin-left: 19%;
	font-size: 20px; /* Increased text to enable scrolling */
    padding: 0px 10px;
    height: 1500px;
    margin-top: 3.5%;

}
#left_bar a {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    cursor: pointer;
}

#left_bar a:hover {
    color: #f1f1f1;
}
input{
	width: 100%;
    font-size: 15px;
    padding: 12px 20px;
    margin: 8px 0;
    color: black;
    box-sizing: border-box;
    border: none;
    border-bottom: 2px white;
    outline:none;
    background:#e1dede8a;		
}
::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
    color: black;
    opacity: 1; /* Firefox */
}
textarea{
	font-size: 15px;
    padding: 12px 20px;
    margin: 8px 0;
	background: #e1dede8a;
	border: none;
	color: black;
	cursor: pointer;
	border-bottom: 10px white;
}
</style>
<script type="text/javascript">
	function show_add_blog()
	{
		document.getElementById('blog_add').style.display='block';
		document.getElementById('blogger_info').style.display='none';
		document.getElementById('blogs_show').style.display='none';
		document.getElementById('like_comment').style.display='none';
	}
	function show_blog()
	{
		document.getElementById('blog_add').style.display='none';
		document.getElementById('blogger_info').style.display='none';
		document.getElementById('blogs_show').style.display='block';
		document.getElementById('like_comment').style.display='none';
	}
	function your_info()
	{
		document.getElementById('blog_add').style.display='none';
		document.getElementById('blogger_info').style.display='block';
		document.getElementById('blogs_show').style.display='none';
		document.getElementById('like_comment').style.display='none';
	}
	function show_notification()
	{
		document.getElementById('blog_add').style.display='none';
		document.getElementById('blogger_info').style.display='none';
		document.getElementById('blogs_show').style.display='none';
		document.getElementById('like_comment').style.display='block';
	}
</script>
<body background="background.jpg">
<div id="navbar">
		<div id="logo"><font face="Bunch Blossoms Personal Use" size="6px"><a href="Home.php">Blogger</a></font></div>
		<div id="logsign"><b><a href="logout.php">Log Out</a></b></div>
	</div>

	<div id="left_bar">
		<center>
	<h2> Hey <?php echo $name ?> </h2>
	<a onclick="your_info()">YOUR INFO</a><br>
	<a onclick="show_add_blog()">ADD BLOG</a><br>
	<a onclick="show_blog()">YOUR BLOGS</a><br>
	<a onclick="show_notification()">NOTIFICATIONS</a>
	</div>
<?php
if($permission=="NO")
{?>
	<div id="main_content">
	<h3>Sorry, You Don't Have Permission to write the blogs, at this moment.</h3>
	<h3>When Admin will approve then you will get to see the inside content.</h3>
		</body>
	</div>
		<?php
}
else
{?>
	<div id="main_content">
		<div style="display: none;" id="like_comment">
			<?php
			$fetch_like="SELECT * FROM total_like WHERE author='$username' AND username='NULL' AND comment='NULL'";
			$result_like=mysqli_query($conn,$fetch_like);
			$cnt=1;
			while($like_row=mysqli_fetch_array($result_like))
			{
				$title=$like_row['title'];
				$likes=$like_row['likes'];
				echo "<h2>$title</h2><b>You got $likes likes in $title Block.</b><br><br><b>Comments got in $title block are </b><br><br>";
				$fetch_comment="SELECT * FROM total_like WHERE author='$username' AND title='$title'";
				$result_comment=mysqli_query($conn,$fetch_comment);
				while($row_comment=mysqli_fetch_array($result_comment))
				{
					$comment_user=$row_comment['username'];
					$comment_con=$row_comment['comment'];
					if($comment_con!='NULL'){
					echo "<b>$comment_user : </b> $comment_con <br>";
				}
				}

			}
			?>
		</div>
		<div id="blogs_show" style="display: none;">
	<?php
	$view="select * from blogs where author='$username'";
	$run=mysqli_query($conn,$view);
	$i=1;
	while($rows=mysqli_fetch_array($run)){
		$heading=$rows['title'];
		$short_desc=$rows['short_desc'];
		$content=$rows['content'];
		$i=$i+1;
		?>
		<h2>Title : <?php echo $heading ?></h2>
		<h3>Description : <?php echo $short_desc ?></h3>
		<p><b> Content : </b><br><?php echo $content ?></p>
		<form action="" method="POST">
		<input type="hidden" name="blogname" value="<?php echo $heading ?>">
		<input style="width: 30%;" type="Submit" name="submit" value="Delete">
		<input style="width: 30%;" type="Submit" name="update" value="Update">
		</form>
		<?php
	}
	if($i==1)
	{
		echo "<h3>You Have Not Written Any Blogs Yet</h3>";
	}
?>
</div>
<div id="blogger_info" style="display: block">
	<img src='<?php echo $photo ?>' alt='$photo' style='width:250px;height:300px;margin-left: 33%;border-radius: 12px;'>
	<center>
		<br><br>
	<table style="color: white; font-size: 25px;">
		<tr><td>Name : </td><td><?php echo $name ?></td></tr>
		<tr><td>Username : </td><td><?php echo $username ?></td></tr>
		<tr><td>Email : </td><td><?php echo $email ?></td></tr>
		<tr><td>Gender : </td><td><?php echo $gender ?></td></tr>
	</table>
	</center>
</div>
<div id="blog_add" style="display: none;">
	<center>
		<h2>Add Your Blog</h2>
	<form action="blog_added.php" method="POST">
		<table style="color: white;">
			<tr><td><input placeholder="Heading" type="text" name="heading" ></td></tr>
			<tr><td><textarea placeholder="Short Description" rows="3" cols="50" name="shortdesc"></textarea></td></tr>
			<tr><td><textarea placeholder="Content" rows="15" cols="50" name="content"></textarea></td></tr>
		</table>
		<input style="width: 37.5%; cursor: pointer;" type="submit" name="submit">
	</form>
</center>
</div>
</div>
<?php
}
if(isset($_POST['submit']))
{
	$delete=$_POST['blogname'];
	$delete_query="DELETE FROM blogs where title='$delete'";
	$delete_likes="DELETE FROM total_like where title='$delete'";
	if(mysqli_query($conn, $delete_query))
	{ 
		if(mysqli_query($conn, $delete_likes))
		{
    		echo "<script>alert('Blog Deleted Successfully..');window.location.href='blogger_home.php';</script>"; 
		}
	}
}
if(isset($_POST['update']))
{
	$_SESSION["title"]=$_POST['blogname'];
	echo "<script>window.location.href='update_blog.php'</script>";
}}
}}
?>
