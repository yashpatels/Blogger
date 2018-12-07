<?php
session_start();
$conn=mysqli_connect("localhost","root","") or die("Could Not Connect");
mysqli_select_db($conn,"blogger");
$show_blogger_detail="select * from writer";
$blogger_detail_result=mysqli_query($conn,$show_blogger_detail);
$usernames="yash"; 
if($usernames==''){
   echo "<script>location='home.php';</script>";
}
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
    font-size: 18px;
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
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  background-color: white;
}

.title {
  color: grey;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
.remove_button{
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #4646467d;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

</style>

</style>
<script type="text/javascript">
	function all_blogger()
	{
		document.getElementById('all_bloggers').style.display='block';
		document.getElementById('all_blogs').style.display='none';
		document.getElementById('blogger_permission').style.display='none';
		document.getElementById('complain').style.display='none';
	}
	function all_blog()
	{
		document.getElementById('all_bloggers').style.display='none';
		document.getElementById('all_blogs').style.display='block';
		document.getElementById('blogger_permission').style.display='none';
		document.getElementById('complain').style.display='none';
	}
	function bloggers_permission()
	{
		document.getElementById('all_bloggers').style.display='none';
		document.getElementById('all_blogs').style.display='none';
		document.getElementById('blogger_permission').style.display='block';
		document.getElementById('complain').style.display='none';
	}
	function viewer_complain()
	{
		document.getElementById('all_bloggers').style.display='none';
		document.getElementById('all_blogs').style.display='none';
		document.getElementById('blogger_permission').style.display='none';
		document.getElementById('complain').style.display='block';
	}
</script>
<body background="background.jpg">
<div id="navbar">
		<div id="logo"><font face="Bunch Blossoms Personal Use" size="6px"><a href="Home.php">Blogger</a></font></div>
		<div id="logsign"><b><a href="logout.php">Log Out</a></b></div>
	</div>

	<div id="left_bar">
		<center>
	<a onclick="all_blogger()">ALL BLOGGERS</a><br>
	<a onclick="all_blog()">ALL BLOGS</a><br>
	<a onclick="bloggers_permission()">PERMISSION</a><br>
	<a onclick="viewer_complain()">COMPLAIN/COMPLIMENTS</a>
	</div>
<div id="main_content">



<div id="all_blogs" style="display: none;">
	<?php
	$blogs_query="select * from blogs";
      $blogs_result=mysqli_query($conn,$blogs_query);
      while($rowss=mysqli_fetch_array($blogs_result))
      {
        $blog_title=$rowss["title"];
        $blog_short_desc=$rowss["short_desc"];
        $blog_content=$rowss["content"];
        $blog_author=$rowss["author"];
        ?>
        <h2>By <?php echo $blog_title ?></h2>
        <p>By <?php echo $blog_author ?></p>
        <p><?php echo $blog_short_desc ?></p>
        <p><?php echo $blog_content ?></p>
        <form action="" method="POST">
        	<input type="hidden" name="title" value="<?php echo $blog_title ?>">
        	<input type="submit" name="delete" value="Delete" style="width: 40%;">
        </form>
    <?php } ?>
</div>

<div id="complain" style="display: none;">
	<?php
	$i=1;
	$complain_query="SELECT * FROM `complains`";
	$complain_result=mysqli_query($conn,$complain_query);
	while($complain_row=mysqli_fetch_array($complain_result))
	{
		$complain_username=$complain_row['username'];
		$complain_content=$complain_row['content'];
		echo "$i.<h3>$complain_username</h3>";
		echo "<p>$complain_content</p>";
		$i++;  
	}
	?>
</div>

<div id="all_bloggers">
	<center><h1>Blogger List</h1></center>
<?php
$i=1;
while($rows = mysqli_fetch_array($blogger_detail_result))
{ 
   $name = $rows['name'];
   $email = $rows['email'];
   $gender = $rows['gender'];
   $photo = $rows['photo'];
   $username=$rows['username'];
   $permission=$rows['permission'];
   if($i%3==1)
   {
   	?><div style="display:flex;"><?php
   }
   ?>
   <div class="card" style="width: 25%; margin-left: 70px;">
  <img src="<?php echo $photo; ?>" alt="<?php echo $photo; ?>" style="width:100%;height: 300px;">
  <h1><?php echo $name; ?></h1>
  <p class="title"><?php echo $username; ?></p>
  <p><?php echo $email; ?></p>
  <p><?php echo $gender; ?></p>
  <p>Permission : <?php echo $permission; ?></p>
  <form action="remove_blogger.php" method="POST">
  <Button class="remove_button" type="submit" name="change" value="remove">Remove</Button>
  </form>
  </div>
   <?php
   if($i%3==0)
   {
   	?></div><br><br><?php
   }
   $i=$i+1;
}

if(($i%3)<>1)
{
  //echo('this worked');
  echo "</div><br><br>";
}
?>
</div>


<div id="blogger_permission" style="display: none;">
<h4>Permission To Be Pending</h4>
<form action="view_change.php" method="POST">
<?php
$query="select * from writer where permission='NO'";
$result=mysqli_query($conn,$query);
$i=1;
while($row=mysqli_fetch_array($result)){
	$name=$row['name'];
	$username=$row['username'];
	echo "<b>Name : </b>$name<br><b>Username : </b>$username<br>";
	?>
	<b>Change Permission : </b><input style="width: 20%;" type="submit" name="submit1" value="<?php echo $username ?>"><br><br>
	<?php
	$i=$i+1;
}
if($i==1)
{
	echo "No Permission to be given.";
}
?>
</form>
</div>

</div>

<?php
if(isset($_POST['delete']))
{
	$deletes=$_POST['title'];
	$delete_query="DELETE FROM blogs where title='$deletes'";
	$delete_likes="DELETE FROM total_like where title='$deletes'";
	if(mysqli_query($conn, $delete_query))
	{ 
		if(mysqli_query($conn, $delete_likes))
		{
    		echo "<script>alert('Blog Deleted Successfully..');window.location.href='admin_home.php';</script>"; 
    		}
    		 }
}
?>