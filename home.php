<?php
$conn=mysqli_connect("localhost","root","") or die("could not connect database");
mysqli_select_db($conn,"blogger");
$search_query="SELECT * FROM `blogs`";
$search_result=mysqli_query($conn,$search_query);
$array_search='[x,';
$cnt=1;
while($row=mysqli_fetch_array($search_result))
{
  $username=$row['author'];
  $title=$row['title'];
    $array_search.="$username,";
    $array_search.="$title,";
  $cnt++;
  
}
$array_search=$array_search.']';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Blogger</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript">
	function loginpage()
	{
		document.getElementById('modalbackground').style.display='block';
		document.getElementById('login').style.display='block';
		document.getElementById('signup').style.display='none';
		document.getElementById('adminlogin').style.display='none';
    document.getElementById('contact_admin').style.display='none';
	}
	function cancel()
	{
		document.getElementById('modalbackground').style.display='none';		
	}
	function signup()
	{
		document.getElementById('modalbackground').style.display='block';
		document.getElementById('login').style.display='none';
		document.getElementById('signup').style.display='block';
		document.getElementById('adminlogin').style.display='none';
    document.getElementById('contact_admin').style.display='none';
	}
	function adminlogins()
	{
		document.getElementById('modalbackground').style.display='block';
		document.getElementById('adminlogin').style.display='block';
		document.getElementById('signup').style.display='none';
		document.getElementById('login').style.display='none';
    document.getElementById('contact_admin').style.display='none';
	}
  function show_blogger_details(a)
  {
    document.getElementById('modalbackground').style.display='block';
    document.getElementById('adminlogin').style.display='none';
    document.getElementById('signup').style.display='none';
    document.getElementById('login').style.display='none';
   document.getElementById(a).style.display='block'; 
   document.getElementById('contact_admin').style.display='none';
  }
  function cancel_blogger(a)
  {
    document.getElementById('modalbackground').style.display='none';
    document.getElementById(a).style.display='none';
    document.getElementById('contact_admin').style.display='none';
  }
  function user_complain()
  {
    document.getElementById('modalbackground').style.display='block';
    document.getElementById('login').style.display='none';
    document.getElementById('signup').style.display='none';
    document.getElementById('adminlogin').style.display='none';
    document.getElementById('contact_admin').style.display='block';
  }
</script>
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
#modalbackground{
     position: absolute; 
     height:100%; 
     width:100%; 
     display:none;  
}
.up{
    width: auto;
    height: 500px;
    margin-top: 50px;
    margin-bottom: 50px;
    background-image: url(nebula.jpg); 
    background-position: center;
    border-radius: 10px;
    padding: 82px 180px 33px 180px;
    position: absolute;
    text-align: center;
    right: 300px;
    left: 300px;
    opacity: 1;
}
#modalbackground input[type=text] {
    width: 100%;
    font-size: 15px;
    padding: 12px 20px;
    margin: 8px 0;
    color: black;
    box-sizing: border-box;
    border: none;
    border-bottom: 2px solid black;
    outline:none;
    background:transparent;
}
  
::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
    color: black;
    opacity: 1; /* Firefox */
}
#modalbackground input[type=password] {
    width: 100%;
    font-size: 15px;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    border-bottom: 2px solid black;
    outline:none;
    background:transparent;
}
#modalbackground input[type=email] {
    width: 100%;
    font-size: 15px;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    border-bottom: 2px solid black;
    outline:none;
    background:transparent;
}

#modalbackground .button{
    border: 2px solid black;
    background-color: white;
    color: black;
    padding: 14px 28px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
    background:transparent;
    outline: none;
}
#left_bar{
	display: inline-block;
	background: #0000009c;
	height:100%;
	width: 19%;
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
	width: 61.5%;
	margin-left: 19%;
	font-size: 20px; /* Increased text to enable scrolling */
    padding: 0px 10px;
    height: 1500px;
    margin-top: 3.5%;

}
#tag_bar{
	display: inline-block;
	background: #0000009c;
	height:100%;
	width: 19.5%;
  color: white;
	vertical-align: top;
margin-top: 3.5%;
	height: 100%;
    position: fixed;
    overflow-x: hidden;
    padding-top: 20px;
    margin-left: 0px;
}
@media screen and (max-height: 450px) {
    #left_bar {padding-top: 15px;}
    #left_bar a {font-size: 18px;}
}

#left_bar a {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
}

#left_bar a:hover {
    color: #f1f1f1;
}
#x input{
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
#x ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
    color: black;
    opacity: 1; /* Firefox */
}
#x textarea{
  font-size: 15px;
    padding: 12px 20px;
    margin: 8px 0;
  background: #e1dede8a;
  border: none;
  color: black;
  cursor: pointer;
  border-bottom: 10px white;
}
#contact_admin textarea{
  width: 100%;
    font-size: 15px;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    border-bottom: 2px solid black;
    outline:none;
    background:transparent;
}

</style>
<body background="background.jpg" style="width: 100%;font-family: Gill Sans,Gill Sans MT,Calibri,sans-serif;">
	<div id="modalbackground">
	<div id="login" class="up">
		<H2>Blogger Login</H2>
		<form name="login" action="" method="POST">
			<table align="center">
				<tr><input placeholder="UserName" type="text" name="username" required></tr>
				<tr><input placeholder="Password" type="password" name="password" required></tr>
			</table>
			<input type="submit" class="button" name="logup">
			<button class="button" style="margin-left: 20px;" onclick="cancel()">Cancel</button>
			<p>Want To Become Blogger ? <x onclick="signup()">Click Here</x></p>
		</form>
	</div>
	<div id="signup" class="up">
					<h2>Want To Become Blogger ?</h2>
					<form name="signups" action="" method="POST" enctype="multipart/form-data">
						<table align="center">
							<tr><input placeholder="Name" type="text" name="name" required></tr>
							<tr><input placeholder="UserName" type="text" name="username" required></tr>
							<tr><input placeholder="Email" type="email" name="email" required></tr>							
							<tr><input placeholder="Password" type="password" name="pass" required></tr>
							<tr><input placeholder="Confirm Password" type="password" name="confpass" required></tr>
							<tr><input type="file" name="photo" id="photo"></tr>
							<tr><br><br><input type="radio" name="gender" value="Male" checked="checked">Male<input type="radio" name="gender" value="Female">Female</tr>
						</table>
					<input type="submit" class="button" name="signin" style="margin-top: 20px;">
					<button class="button" style="margin-left: 20px;" onclick="cancel()">Cancel</button>
					</form>
	</div>
	<div id="adminlogin" class="up">
		<h2>Hey Admin</h2>
		<form name="adminlogin" action="" method="POST">
			<table align="center">
				<tr><input placeholder="AdminUsername" type="text" name="username" required></tr>
				<tr><input placeholder="Password" type="password" name="password" required></tr>
			</table>
			<input type="submit" class="button" name="adminlogup">
			<button class="button" style="margin-left: 20px;" onclick="cancel()">Cancel</button>
		</form>
	</div>
  <?php
  $conn=mysqli_connect("localhost","root","") or die("Could Not Connect");
  mysqli_select_db($conn,"blogger");
  $fetch_blogger="SELECT * FROM writer";
  $fetch_result=mysqli_query($conn,$fetch_blogger);
  while ($row=mysqli_fetch_array($fetch_result)) {
    $name=$row['name'];
    $username=$row['username'];
    $email=$row['email'];
    $gender=$row['gender'];
    $photo=$row['photo'];
    ?>
    <div id="<?php echo $username ?>" style="display: none;" class="up">
  <img src='<?php echo $photo ?>' alt='$photo' style='width:250px;height:300px;border-radius: 12px;'>
  <center>
  <table style="color: white; font-size: 25px;">
    <tr><td>Name : </td><td><?php echo $name ?></td></tr>
    <tr><td>Username : </td><td><?php echo $username ?></td></tr>
    <tr><td>Email : </td><td><?php echo $email ?></td></tr>
    <tr><td>Gender : </td><td><?php echo $gender ?></td></tr>
  </table>
  <button class="button" style="color:white;border-color: white; margin-left: 20px;" onclick="cancel_blogger('<?php echo $username ?>')">Cancel</button>
  </center>
</div>
    <?php
  }
  ?>
  <div id="contact_admin" class="up">
    <form name="user_complains" action="" method="POST">
      <input type="text" name="query_username" placeholder="username"/>
      <input type="text" name="complain_content" placeholder="Write Here.">
      <input type="submit" class="button" name="complain"/>
      <button class="button" style="margin-left: 20px;" onclick="cancel()">Cancel</button>
    </form>
  </div>
	</div>
	<div id="navbar">
		<div id="logo"><font face="Bunch Blossoms Personal Use" size="6px"><a href="Home.php">Blogger</a></font></div>
		<div id="logsign"><b><a href="#" onclick="loginpage()">LogIn</a><a>|</a><a href="#" onclick="signup()">SignUp</a></b></div>
	</div>
	<div id="left_bar">
		<center><form autocomplete="off" action="show_result.php" method="POST">
  <div class="autocomplete">
    <input style="margin-top: 10px;" id="myInput" type="text" name="myCountry" placeholder="Search">
  </div>
  <input style="margin-top: 10px;" type="submit" value="Search">
</form>
<a href="blogger_list.php">Blogger List</a>
<a href="#" onclick="adminlogins()">Admin</a>
<a href="#" onclick="user_complain()">Contact Us</a></center>
</div>
	<div id="main_content">
    <?php
      $conn=mysqli_connect("localhost","root","") or die("Could Not Connect ");
      mysqli_select_db($conn,"blogger");
      $query="select * from blogs";
      $result=mysqli_query($conn,$query);
      while($row=mysqli_fetch_array($result)){
        $title=$row["title"];
        $short_desc=$row["short_desc"];
        $content=$row["content"];
        $author=$row["author"];
        $like_count="select * from total_like where author='$author' and title='$title'";
        $comment_display="select * from total_like where author='$author' and title='$title'";
        $total_likes=0;
        $fetch_like=mysqli_query($conn,$like_count);
        $fetch_comment=mysqli_query($conn,$comment_display);
        while($rows=mysqli_fetch_array($fetch_like))
        {
            $total_likes=$rows['likes'];
        }
        echo "<h2>$title</h2>"; ?>
        <p onclick="show_blogger_details('<?php echo $author ?>')" style="cursor: pointer;">By <u style="text-decoration: underline;"><?php echo $author ?></u></p>
        <p><?php echo $short_desc ?></p>
        <x id="<?php echo  $title ?>1" style="cursor: pointer;text-decoration: underline;"  onclick="seeContent('<?php echo  $title ?>','<?php echo  $title ?>1','<?php echo  $title ?>2','like_comment<?php echo  $title ?>')">Read More..</x>
        <?php
        echo "<div id='$title' style='display:none;'>$content</div>";
        ?>
        <div id="like_comment<?php echo  $title ?>" style="display: none;">
        <form action="" method="POST">
          <div id="x">
          <input type="hidden" name="title" value="<?php echo  $title ?>">
          
          <input style="display: block;width: 40%;cursor: pointer;" type="text" name="username" placeholder="Username">
          <input type="hidden" name="author" value="<?php echo $author ?>">
          <input type="hidden" name="title" value="<?php echo $title ?>">
          <div style="display: flex;">
            <textarea placeholder="Type Here" style="display: block;" name="comments" rows="3" cols="40"></textarea>
            <button style="background: none;outline: none;border: none;" type="submit" name="like" value="like">
              <div style="margin-left: 50px;cursor: pointer;">
                <img  onmouseover="hover(this);" onmouseout="unhover(this);" src="like.png" style="height: 60px;width: 60px;">
                <div style="position: relative;top: -48px;font-size: 25px;"><?php echo $total_likes; ?></div>
              </div>
            </button>
          </div>
            <input style="width: 20%;cursor: pointer;" type="submit" name="comment" value="comment">
            </div>
        </form>
      
      <h3>Comment</h3>
      <table>
        <?php
        $fetch_comments=mysqli_query($conn,$comment_display);
        while($comment_row=mysqli_fetch_array($fetch_comments))
        {
          $username=$comment_row['username'];
          $comment=$comment_row['comment'];
          if($username!='NULL')
          {
            echo "<tr><td>$username : </td><td>$comment</td>";
          }
        }
        ?>
        </table>
        </div>
        <x id="<?php echo  $title ?>2" style="display: none;cursor: pointer;text-decoration: underline;"  onclick="hideContent('<?php echo  $title ?>','<?php echo  $title ?>1','<?php echo  $title ?>2','like_comment<?php echo  $title ?>')">Read Less..</x>
        <?php
      }
    ?>
	</div><div id="tag_bar">
   <h3>Our Popular Bloggers.</h3>
   <?php
   $conn=mysqli_connect("localhost","root","") or die("Could Not Connect.");
   mysqli_select_db($conn,"blogger");
   $fetch_blogger="SELECT DISTINCT author FROM total_like ORDER BY likes DESC";
   $blogger_result=mysqli_query($conn,$fetch_blogger);
   $i=1;
   while($row=mysqli_fetch_array($blogger_result))
   {
    if($i <=3)
    {
      $author=$row['author'];
      ?>
      <h4 style="cursor: pointer;" onclick="show_blogger_details('<?php echo $author ?>')"><?php echo $author ?></h4>
      <?php
      $i=$i+1;
    }
   }
   ?> 
   <h3>Our Popular Blogs.</h3>
   <?php
   $i=1;
  $fetch_blog="SELECT DISTINCT title FROM total_like ORDER BY likes DESC";
  $blog_result=mysqli_query($conn,$fetch_blog);
  while($row=mysqli_fetch_array($blog_result))
   {
    if($i <=3)
    {
      $title=$row['title'];
      ?>
      <h4 style="cursor: pointer;" onclick="seeContent('<?php echo  $title ?>','<?php echo  $title ?>1','<?php echo  $title ?>2','like_comment<?php echo  $title ?>')"><?php echo $title; ?></h4>
      <?php
      $i=$i+1;
    }
   }
  ?>
  </div>
</body>

<script type="text/javascript">
  function seeContent(a,b,c,d){
    document.getElementById(a).style.display="block";
    document.getElementById(b).style.display="none";
    document.getElementById(c).style.display="block";
    document.getElementById(d).style.display="block";
  }
  function hideContent(a,b,c,d){
    document.getElementById(a).style.display="none";
    document.getElementById(b).style.display="block";
    document.getElementById(c).style.display="none";
    document.getElementById(d).style.display="none";
    
  }

  function hover(element) {
  element.setAttribute('src', 'hover.png');
}

function unhover(element) {
  element.setAttribute('src', 'like.png');
}
</script>
</html>
<?php
if(isset($_POST['complain']))
{
  $conn=mysqli_connect("localhost","root","") or die("Could Not Connect");
  mysqli_select_db($conn,"blogger");
  $comlain_username=$_POST["query_username"];
  $comlain_of_username=$_POST["complain_content"];
  $query_complain="INSERT INTO complains(username,content) values('$complain_username','$complain_of_username')";
  if(mysqli_query($conn,$query_complain))
  {
    echo "<script>alert('Succesfully sent to Admin');window.location.href='home.php'</script>";
  }
}
if(isset($_POST['like']))
{
  $conn=mysqli_connect("localhost","root","") or die("Could Not Connect");
  mysqli_select_db($conn,"blogger");
  $title=$_POST["title"];
  $like_query="select likes  from total_like where title='$title' AND username='NULL' AND comment='NULL'";
  $like;
  $like_result=mysqli_query($conn,$like_query);
  while($row=mysqli_fetch_array($like_result))
  {
    $like=$row['likes'];
   }
//echo "<script>alert('$like')</script>";
  $like=$like+1;
 // echo "<script>alert('$like')</script>";
  $update_like="UPDATE total_like SET likes='$like' WHERE title='$title'";
  if(mysqli_query($conn,$update_like))
  {
    echo "<script>window.location.href='home.php'</script>";
  }

}
if(isset($_POST['comment']))
{
  $conn=mysqli_connect("localhost","root","") or die("Could Not Connect");
  mysqli_select_db($conn,"blogger");
  $username=$_POST['username'];
  $comment=$_POST['comments'];
  $title=$_POST['title'];
  $author=$_POST['author'];
  $query="INSERT INTO total_like (author,title,username,likes,comment) VALUES('$author','$title','$username',0,'$comment')";
  if(mysqli_query($conn,$query))
  {
    echo "<script>alert('Comment Added Succesfully');window.locatiom.href='home.php';</script>";
  }

}
if(isset($_POST['logup']))
{
	$conn=mysqli_connect("localhost","root","") or die("Could Not Connect");
mysqli_select_db($conn,"blogger");
session_start();
$_SESSION["username"]=$_POST["username"];
$username=$_POST["username"];
$password=$_POST["password"];
$query="select * from writer where username='$username' and password='$password'";
$run=mysqli_query($conn,$query);
if(mysqli_num_rows($run)==1)
{
	echo "<script>window.open('blogger_home.php','_self')</script>";
}
else
{
	echo"<script>alert('Incorrect Username or Password');</script>";
}
}
else if(isset($_POST['signin']))
{
	
$conn=mysqli_connect("localhost","root","") or die("could not connect");
mysqli_select_db($conn,"blogger")
or mysqli_query($conn,"create database blogger");
mysqli_select_db($conn,"blogger");
$myfilename = $_FILES["photo"]["name"];
$name=$_POST["name"];
$username=$_POST["username"];
$email=$_POST["email"];
$pass=$_POST["pass"];
$conf=$_POST["confpass"];
$gender=$_POST["gender"];
$checkuser="select * from writer where username='$username'";
$checkemail="select * from writer where email='$email'";
$runuser=mysqli_query($conn,$checkuser);
$runemail=mysqli_query($conn,$checkemail);
$cntuser=mysqli_num_rows($runuser);
$cntemail=mysqli_num_rows($runemail);
$otp=rand(1000,9999);
echo $cntuser;
session_start();
$_SESSION["otp"]=$otp;
$_SESSION["email"]=$email;
if($cntuser>0 && $cntemail>0 )
{
  echo "<script>alert('Username And Email Already Exist.Choose Another');</script>";
}
else if($cntuser>0)
{
  echo "<script>alert('Username Already Exist.Choose Another');</script>";
}
else if($cntemail>0 )
{
  echo "<script>alert('Email Already Exist.Choose Another');</script>";
}
else
{
  if($pass==$conf)
  {
	 $sql="INSERT INTO writer (name,username,email,password,gender,photo,permission,email_auth,otp) VALUES ('$name','$username','$email','$pass','$gender','$myfilename','NO','NO','$otp')";
	 if (mysqli_query($conn,$sql))
	 {
      echo "<script>alert('OTP has been Sent to Registered Email And Registration succesful!');location='ass2/sent.php';</script>";
    }
    else
    {
   		$ql= "create table writer (name text,username VARCHAR(20),email email,password VARCHAR(20),gender VARCHAR(20),photo VARCHAR(20),permission VARCHAR(4),email_auth VARCHAR(4),otp int)";
   		if(mysqli_query($conn,$ql))
   		{
    		if (mysqli_query($conn,$sql))
    		{
    			   echo "<script>alert('OTP has been Sent to Registered Email And Registration succesful!');location='ass2/sent.php';</script>";
			
			}
		}
	}
}
else
{
	echo '<script language="javascript">';
	echo 'alert("Password Did Not MATCH")';
	echo '</script>';
}}
}
else if(isset($_POST['adminlogup']))
{
	$username=$_POST["username"];
	$password=$_POST["password"];
	if($username=="yash" AND $password=="123")
	{
		echo "<script>alert('success');location='admin_home.php';</script>";
	}
	else{
		echo "<script>alert('Wrong Credentials!');location='home.php';</script>";
	}
}
?>

<!-- For Search Bar -->
<script type="text/javascript">
	function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}
/*An array containing all the country names in the world:*/
var countries = "<?php echo $array_search;?>".split(",");

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), countries);

</script>

<style type="text/css">
	.autocomplete {
  /*the container must be positioned relative:*/
  position: relative;
  display: inline-block;
}

#left_bar input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}

#left_bar input[type=text] {
  background-color: #f1f1f1;
  width: 100%;
  border-radius: 5px;
}

#left_bar input[type=submit] {
  background-color: #6c6e74;
  border-radius: 5px;
  color: #fff;
  cursor: pointer;
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
  width: 100%;
  border-radius: 5px;
}

.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9; 
}

.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
</style>