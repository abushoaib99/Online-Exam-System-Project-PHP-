<?php
include("../class/users.php");
$register=new users;
if($_POST['b']==1){
	$mysqli=mysqli_connect('localhost','root','','online_quiz');

	if(!$mysqli)
	{
		echo mysqli_connect_error;
	}
	extract($_POST);
	$query=mysqli_query($mysqli,"select * from admin where email ='$email'");
	
	if(!empty(strlen("$email")) ||!empty(strlen("$password")))
	{
		if(mysqli_num_rows($query))
		{
			header("location:profile.php?run=exist");
		}
		else if(strlen("$password")<2)
		{
			header("location:profile.php?run=length");
		}
		
		else
		{
			$query1="insert into admin values('','$email','$password','1')";
			if($register->add_admin($query1))
			{
				header("location:profile.php?run=success");
			}
		}
		
	}
}
		
else
	header("location:efdfsdfsdfsd.wrong.djsa.php");

?>