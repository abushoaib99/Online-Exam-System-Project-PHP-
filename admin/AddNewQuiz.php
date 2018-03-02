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
						<li><a  href="AddSubject.php">Add Subject</a></li>
						<li style="background-color: #337AB7"><a id="h" href="AddNewQuiz.php">Add New Quiz</a></li>
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
					
					
					<div >
						<table class="table table-striped">
							
							
							<div class="panel panel-primary">
								<div style="text-align:center;font-size:18px"class="panel-heading">Add New Quiz</div>
							</div>
							
							
							<form method="post" action="add_quiz.php">
								<div class="form-group">
									<label for="text">Question</label>
									<input id="text" type="text" name="qus" class="form-control" required  placeholder="Enter Question">
								</div>
								
								<div class="form-group">
									<label for="text1">Option-1</label>
									<input id="text1" type="text" name="op1" class="form-control" required  placeholder="Enter Option-1">
								</div>
								
								<div class="form-group">
									<label for="text2">Option-2</label>
									<input id="text2" type="text" name="op2" class="form-control" required  placeholder="Enter Option-2">
								</div>
								<div class="form-group">
									<label for="text3">Option-3</label>
									<input id="text3" type="text" name="op3" class="form-control" required   placeholder="Enter Option-3">
								</div>
								
								<div class="form-group">
									<label for="text4">Option-4</label>
									<input id="text4" type="text" name="op4" class="form-control" required  placeholder="Enter Option-4">
								</div>
								
								<div class="form-group">
									<label for="text5">answer</label>
									<input id="text5" type="text" name="ans" class="form-control" required  placeholder="Enter answer">
								</div>
								
								<div class="form-group">
									<select class="form-control" id="sel1" name="cat">
										<option value="" disabled>Choose Subject</option>
										<?php
										foreach($category as $c)
										{
											echo "<option value=".$c['id'].">".$c['cat_name']."</option>";
										}
										
										?>
									</select>
								</div>
								
								<button type="submit" name="b" value="1" class="btn btn-default">Submit</button>
							</form>
						</table>
					</div>
					
				</div>
		</div>
		<div class="col-sm-2"></div>
		</div>

	</body>
</html>
