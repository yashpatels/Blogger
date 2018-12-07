<?php
session_start();
$_SESSION["username"]=$_POST['submit1'];
$conn=mysqli_connect("localhost","root","") or die("Could Not Connect");
mysqli_select_db($conn,"blogger");
$username=$_POST['submit1'];
$query="select * from writer where username='$username'";
$result=mysqli_query($conn,$query);
while($rows = mysqli_fetch_array($result))
{ $username = $rows['username'];
   $name = $rows['name'];
   $email = $rows['email'];
   $gender = $rows['gender'];
   $photo = $rows['photo'];
   $permission=$rows['permission'];
   ?>
   <div class="card">
  <img src="<?php echo $photo; ?>" alt="<?php echo $photo; ?>" style="width:100%;height: 300px;">
  <h1><?php echo $name; ?></h1>
  <p class="title"><?php echo $username; ?></p>
  <p><?php echo $email; ?></p>
  <p><?php echo $gender; ?></p>
    <?php
}
?>
<form action="give_permission.php" method="POST">
	<Button type="submit" name="change" value="Give Permission">Give Permission</Button>
</form>
</div>
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
