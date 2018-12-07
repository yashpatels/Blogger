<?php
$conn=mysqli_connect("localhost","root","") or die("Could Not Connect");
mysqli_select_db($conn,"blogger");
$query="select * from writer";
$result=mysqli_query($conn,$query);
?>
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
</style>
<body style="background-color: #8e919257;">
<center><h1>Blogger List</h1></center>
<?php
$i=1;
while($rows = mysqli_fetch_array($result))
{ 
   $name = $rows['name'];
   $email = $rows['email'];
   $gender = $rows['gender'];
   $photo = $rows['photo'];
   $username=$rows['username'];
   if($i%3==1)
   {
   	?><div style="display:flex;"><?php
   }
   ?>
   <div class="card">
  <img src="<?php echo $photo; ?>" alt="<?php echo $photo; ?>" style="width:100%;height: 300px;">
  <h1><?php echo $name; ?></h1>
  <p class="title"><?php echo $username; ?></p>
  <p><?php echo $email; ?></p>
  <p><?php echo $gender; ?></p>
  </div>
   <?php
   if($i%3==0)
   {
   	?></div><br><br><?php
   }
   $i=$i+1;
}

?>
</body>