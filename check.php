<?php
$conn=mysqli_connect("localhost","root","") or die("could not connect database");
mysqli_select_db($conn,"blogger");
$search_query="SELECT * FROM `blogs`";
$search_result=mysqli_query($conn,$search_query);
$array_search='[';
$comma='"';
$a=',';
$cnt=1;
while($row=mysqli_fetch_array($search_result))
{
	$username=$row['author'];
	$title=$row['title'];
	if($cnt==1)
	{
		$array_search='['.$comma.$username.$comma.$a.$comma.$title.$comma.$a;
	}
	else
	{
		$array_search=$array_search.$comma.$username.$comma.$a.$comma.$title.$comma;
	}
	$cnt++;
	
}
$array_search=$array_search.']';
echo $array_search;
?>