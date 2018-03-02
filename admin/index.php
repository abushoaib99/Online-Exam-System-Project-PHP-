<?php
include("../class/users.php");
$profile=new users;
$adminemail=$profile->adminEmail($_SESSION['email']);
if($_SESSION['email']==true && $_SESSION['email']==$adminemail)
	{
		$_SESSION['email'];
	}
	else
	{
		header('location:../logout.php');
	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<link rel="icon" href="favicon.png"/>

		<title>Admin Dashboard</title>

		<link href="dashboard.css" rel="stylesheet"/>	
	</head>

	
	<body>
		<nav style="border:1px solid"class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div  class="navbar-header">
					
					<a class="navbar-brand" href="index.php">Admin Panel</a>
				</div>
				
			</div>
		</nav>

		<div class="container">
		<div class="col-sm-2"></div>
		<div class="col-sm-10">
			<div class="row">
				<div style="background: #222222; margin-top:0px;" class="col-sm-3 col-md-2 sidebar">
				<label for=""><h3 style="color:white">Dashboard</h3></label>
					<ul class="nav nav-sidebar">
						<li><a  href="profile.php">Profile</a></li>
						<li><a  href="AddSubject.php">Add Subject</a></li>
						<li><a href="AddNewQuiz.php">Add New Quiz</a></li>
						<li><a href="Delete.php">Delete Subject</a></li>
					</ul>
					
				</div>
				
				<div style="margin-top:100px" class="tab-content">
					
					



						<ul class="pager">
							<li><a href="#">Previous</a></li>
							<li><a href="#">Next</a></li>
						</ul>
						<div style="margin-top:10px" class="panel panel-primary">
							<div style="text-align:center;font-size:25px;font-family:arial black"class="panel-heading">Online Quiz</div>
						</div>
					  <ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#home">Home</a></li>
						<li><a data-toggle="tab" href="#About">About</a></li>
						<li><a data-toggle="tab" href="#Result">Result</a></li>
						<li><a href="../home.php">User Panel</a></li>
						<li style="float:right"><a href="../logout.php">Logout</a></li>
					  </ul>

					  <div class="tab-content">
					  
						 <div id="home" class="tab-pane fade in active">
						  <h3>Home</h3>
						  
						  
						</div>
						
						<div id="About" class="tab-pane fade">
						  <h3>About</h3>
							
						</div>
						
						<div id="Result" class="tab-pane fade">
						  
						  
							<div class="col-sm-4"></div>
								<div class="col-sm-4"><br>
								  <h3>Here Result</h3>
								</div>
							<div class="col-sm-4"></div>
						</div>
					  </div>
		
					
				</div>
			</div>
		</div>
		<div class="col-sm-2"></div>
		</div>

	</body>
</html>
