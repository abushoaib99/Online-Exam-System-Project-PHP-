<?php
include("../class/users.php");
$profile=new users;
$profile->users_profile_foradmin();

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
				<div class="col-sm-8">
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
								<li style="float:right"><a href="logout.php">Logout</a></li>
							  </ul>
							  <div class="tab-content">
							  
									<div id="StudentProfile" class="tab-pane fade in active">
										
										<?php
											
											if(isset($_GET['id'])){
											$dis=$_GET['id'];
											$disUser=$profile->disableUser($dis);
											//header("location:profile.php");
											
											}
											
										
											if(isset($disUser))
												if($disUser==1)
												echo '<div style="margin-top:10px" class="alert alert-success">User status has been set to <strong>Active</strong></div>';
												else
													echo '<div style="margin-top:10px" class="alert alert-success">User status has been set to <strong>Inactive</strong></div>';
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
										<h4>Shoaib</h4>
									</div>
			
						</div>
				</div>
			<div class="col-sm-2"></div>
		</div>

	</body>
</html>
