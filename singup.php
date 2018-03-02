<?php
include("class/users.php");
$register=new users;
if($_POST['b']==1){
	$mysqli=mysqli_connect('localhost','root','','online_quiz');

	if(!$mysqli)
	{
		echo mysqli_connect_error;
	}
	extract($_POST);
	$img_name=$_FILES['img']['name'];
	$tmp_name=$_FILES['img']['tmp_name'];
	move_uploaded_file($tmp_name,"img/".$img_name);
	$query=mysqli_query($mysqli,"select * from signup where email ='$e'");
	$queryadmin=mysqli_query($mysqli,"select * from admin where email ='$e'");
	
	if(!empty(strlen("$n"))||!empty(strlen("$e")) ||!empty(strlen("$p")))
	{
		if(mysqli_num_rows($query) || mysqli_num_rows($queryadmin))
		{
			header("location:index.php?run=exist");
		}
		else if(strlen("$p")<2)
		{
			header("location:index.php?run=length");
		}
		
		else
		{
			$query1="insert into signup values('','$n','$e','$p','$img_name','1')";
			if($register->signup($query1))
			{
				header("location:index.php?run=success");
			}
		}
		


	}
}
		
else
	header("location:index.php");

?>