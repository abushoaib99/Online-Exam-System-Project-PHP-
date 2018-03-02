<?php
include("../class/users.php");
$profile=new users;
$profileadmin=new users;
$profile->users_profile_foruser();
$profileadmin->users_profile_foradmin();
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
		
		<link href=""/>
		
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
						<div style="background: #222222; margin-top:0px;" class="col-sm-3 col-md-2 sidebar">
							<label for=""><h3 style="color:white">Dashboard</h3></label>
							<ul class="nav nav-sidebar">
								<li style="background-color: #337AB7"><a id="h" href="profile.php">Profile</a></li>
								<li><a  href="AddSubject.php">Add Subject</a></li>
								<li><a href="AddNewQuiz.php">Add New Quiz</a></li>
								<li><a href="Delete.php">Delete Subject</a></li>
							</ul>
							<style>
							 
							#h:hover{
								color:#337AB7;
							}
							#h{
								color:#fff;
								font-size:16px
							}
							</style>
						</div>
						
								<ul class="pager">
									<li><a href="index.php">Previous</a></li>
									<li><a href="#">Next</a></li>
								</ul>
								<div style="margin-top:10px" class="panel panel-primary">
									<div style="text-align:center;font-size:25px;font-family:arial black"class="panel-heading">Profile</div>
								</div>
							  <ul class="nav nav-tabs">
								<li class="active"><a data-toggle="tab" href="#StudentProfile">Student Profile</a></li>
								<li><a data-toggle="tab" href="#AdminProfile">Admin Profile</a></li>
								<?php
									
									if($_SESSION['email']=='abushoaib99@gmail.com')
										echo '<li><a data-toggle="tab" href="#AddAdmin">Add Admin</a></li>';
									?>
							  </ul>
							  <div class="tab-content">
							  
									<div id="StudentProfile" class="tab-pane fade in active">
										
										<?php
											
											if(isset($_GET['id'])){
											$dis=$_GET['id'];
											$disUser=$profile->disableUser($dis);
											header("location:profile.php");
											
											}
											if(isset($_GET['adminid'])){
											$disable=$_GET['adminid'];
											$disadmin=$profile->disableAdmin($disable);
											header("location:profile.php");
											
											}
											
										
											if(isset($disUser))
												if($disUser==1)
												echo '<div style="margin-top:10px" class="alert alert-success">User status has been set to <strong>Inactive</strong></div>';
												else
													echo '<div style="margin-top:10px" class="alert alert-success">User status has been set to <strong>Active</strong></div>';
											?>
										
										
										<table class="table">
											<thead>
											  <tr>
												<th>Id</th>
												<th>Name</th>
												<th>Email</th>
												
												<th style="width:50px"><center>Status</center></th>
												<th style="width:50px"><center>Action</center></th>
											  </tr>
											</thead>
											<tbody>
											<?php
											foreach($profile->data as $prof)
											{?>
											  <tr>
												<td><?php echo $prof['id'];?></td>
												<td><?php echo $prof['name'];?></td>
												<td><?php echo $prof['email'];?></td>
												<td><center >
												
													<?php

													if($prof['status']==1)
													{
														echo '<span class="label label-success">Active</span>';
													}
													
													else
													{
														echo '<span class="label label-danger">Inactive</span>';
													}
												?>
												</center>
												</td>
												
												
												<td width=80px><center><a onclick="return confirm('Are you sure?')" href="?id=<?php echo $prof['id'];?>" class="label label-info">Action</a></center></td>
												
											  </tr>
											</tbody>
											<?php	}?>
										</table>
										
									  
									</div>
									
									<div id="AdminProfile" class="tab-pane fade">
										<table class="table">
											<thead>
											  <tr>
												<th>Id</th>
												<th>Email</th>
												<th style="width:50px"><center>Status</center></th>
												<?php if($_SESSION['email']=='abushoaib99@gmail.com')
												echo '<th style="width:50px"><center>Action</center></th>';?>
											  </tr>
											</thead>
											<tbody>
											<?php
											foreach($profileadmin->data as $prof)
											{?>
											  <tr>
												<td><?php echo $prof['id'];?></td>
												<td><?php echo $prof['email'];?></td>
												<td><center >
												
													<?php

													if($prof['status']==1)
													{
														echo '<span class="label label-success">Active</span>';
													}
													
													else
													{
														echo '<span class="label label-danger">Inactive</span>';
													}
												?>
												</center>
												</td>
												
												<?php if($_SESSION['email']=='abushoaib99@gmail.com'){?>
												<td width=80px><center><a onclick="return confirm('Are you sure?')" href="?adminid=<?php echo $prof['id'];?>" class="label label-info">Action</a></center></td>
												<?php }?>
											  </tr>
											</tbody>
											<?php	}?>
										</table>
									</div>
									
									
									
									<div id="AddAdmin" class="tab-pane fade" style="margin-top:20px">
										
										<div class="col-sm-2"></div>
										<div class="col-sm-5">
										<div class="panel panel-primary">
											<div style="text-align:center"class="panel-heading">Add Admin</div>
										</div>
												
											<table class="table table-striped">
											<?php 
												if(isset($_GET['run']) && $_GET['run']=="success") 
												{
													echo "<mark>Your registration is successfully done</mark>";
												}
												
												?>
												<form action="addAdmin.php" method="post">
													<div class="form-group">
													
														<label for="email">Email:</label>
														<input type="email" name="email" class="form-control" id="email" required placeholder="Enter email"/>
														<?php 
															if(isset($_GET['run']) && $_GET['run']=="exist")
															{
																echo "Email is already exist";
																
															}
														?>
													</div>
													<div class="form-group"  method="post">
														<label for="pwd">Password:</label>
														<input type="password" name="password"  class="form-control" id="pwd" required placeholder="Enter password"/>
														<?php 
															if(isset($_GET['run']) && $_GET['run']=="length")
															{
																echo "Password required minimum 8 character";
																
															}
														?>
													</div>
													
													<button type="submit" name="b" value="1" class="btn btn-default">Submit</button>
												</form>
											</table>	
											</div>
										<div class="col-sm-2"></div>	
									</div>
									
			
						</div>
				</div>
			<div class="col-sm-2"></div>
		</div>

	</body>
</html>
