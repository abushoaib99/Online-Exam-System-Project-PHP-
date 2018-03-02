<?php
include("../class/users.php");
$cat=new users;
$profile=new users;
$category=$cat->cat_show();
$adminemail=$profile->adminEmail($_SESSION['email']);
if($_SESSION['email']==true && $_SESSION['email']==$adminemail)	{
		$_SESSION['email'];
	}
	else
	{
		header('location:../logout.php');
	}
//print_r($category);
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
		<div class="col-sm-6">
				<div style="background: #222222; margin-top:0px;" class="col-sm-3 col-md-2 sidebar">
				<label for=""><h3 style="color:white">Dashboard</h3></label>
					<ul class="nav nav-sidebar">
						<li><a href="profile.php">Profile</a></li>
						<li style="background-color: #337AB7"><a id="h" href="AddSubject.php">Add Subject</a></li>
						<li><a href="AddNewQuiz.php">Add New Quiz</a></li>
						<li><a href="Delete.php">Delete Subject</a></li>
					</ul>
					
				</div>
				
				<style>
					 
					#h:hover{
						color:#337AB7;
					}
					#h{
						color:#fff;
						font-size:16px
					}
				</style>
				
				<div style="margin-top:100px">
					
						<table class="table table-striped">
						
							<form method="post" action="add_category.php">
								<div class="form-group">
									<div class="panel panel-primary">
										<div style="text-align:center;font-size:18px"class="panel-heading">Add Subject</div>
									</div>
									<label for="text">Subject Name</label>
									<input id="text" type="text" name="addcat" required class="form-control" placeholder="Enter Subject"/>
								</div>
								
							
								<button type="submit" name="b" value="1" class="btn btn-default">Submit</button>
							</form>
						</table>
				</div>
		</div>
		<div class="col-sm-2"></div>
		</div>

	</body>
</html>
