<?php

	session_start();
	if($_SESSION['email']==true)
	{
		$_SESSION['email'];
	}
	else
	{
		header("location:index.php");
	}
	include("class/users.php");
	$signin=new users;
	extract($_POST);
	$loginuser=$signin->signin($e1,$p1);
	$loginadmin=$signin->adminsignin($e1,$p1);
	
	if(empty(strlen("$e1")) ||empty(strlen("$p1")))
	{
		header("location:index.php");
	}
	else if($loginuser['status']==1 || $loginadmin['status']==1)
	{
		$signin->url("home.php");
	}
	else if($loginuser['status']==2 || $loginadmin['status']==2)
	{
		header("location:index.php?run=Deactive");
	}
	else
	{
		header("location:index.php?run=Failed");
	}
	

?>