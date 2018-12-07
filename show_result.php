<?php
$username=$_POST['myCountry'];
$conn=mysqli_connect("localhost","root","") or die("could not connect database");
mysqli_select_db($conn,"blogger");
$query="select * from writer where username='$username'";
$blog_query="select * from blogs where title='$username'";
$blog_result=mysqli_query($conn,$blog_query);
while($blog_row=mysqli_fetch_array($blog_result))
{
	$author=$blog_row['author'];
	$title=$blog_row['title'];
	$short_desc=$blog_row['short_desc'];
	$content=$blog_row['content'];
	?>
  <body background="background.jpg" style="color: white;">
	<h2>author : <?php echo $author; ?></h2>
	<h2>title : <?php echo $title; ?></h2>
	<p><b>Short Description : </b><br>        <?php echo $short_desc; ?></p>
	<p><b>content : </b><br>      <?php echo $content; ?></p>
  </body>
	<?php
}
$result=mysqli_query($conn,$query);
while($rows = mysqli_fetch_array($result))
{ $username = $rows['username'];
   $name = $rows['name'];
   $email = $rows['email'];
   $gender = $rows['gender'];
   $photo = $rows['photo'];
   $permission=$rows['permission'];
   ?>
   <body style="background-color: #9b80a4ba;">
    <center><h1>Our Blogger</h1></center>
   <div class="card" style="background-color: #c366ec;  ">
  <img src="<?php echo $photo; ?>" alt="<?php echo $photo; ?>" style="width:100%;height: 300px;">
  <h1><?php echo $name; ?></h1>
  <p class="title"><?php echo $username; ?></p>
  <p><?php echo $email; ?></p>
  <p><?php echo $gender; ?></p>
    <?php
}
?>
</div></body>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
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
</style>
