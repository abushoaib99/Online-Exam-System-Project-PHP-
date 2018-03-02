<?php
include("../class/users.php");
$cat=new users;
$profile=new users;
$category=$cat->cat_show();
$mysqli=mysqli_connect('localhost','root','','online_quiz');

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
		<div class="col-sm-6">
				<div style="background: #222222; margin-top:0px;" class="col-sm-3 col-md-2 sidebar">
				<label for=""><h3 style="color:white">Dashboard</h3></label>
					<ul class="nav nav-sidebar">
						<li><a href="profile.php">Profile</a></li>
						<li><a  href="AddSubject.php">Add Subject</a></li>
						<li><a href="AddNewQuiz.php">Add New Quiz</a></li>
						<li style="background-color: #337AB7"><a id="h" href="Delete.php">Delete Subject</a></li>
						
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
				
				<div style="margin-top:100px">
					<div >
						<div class="panel panel-primary">
								<div style="text-align:center;font-size:18px"class="panel-heading">Delete Subject</div>
						</div>
						<div class="form-group">
							
							<table class="table table-bordered">
								<thead>
								  <tr>
									<th><center>No.</center></th>
									<th><center>Subject</center></th>
									<th><center>Delete</center></th>
								  </tr>
								</thead>
								<tbody>
								<?php
								if(!empty($category)){
									$i = 1;
									foreach($category as $c)
									{
										?>
										<tr>
											<td width=50px><center><?php echo $i++;?></center></td>
											<td><?php echo "<option value=".$c['id'].">".$c['cat_name']."</option>";?></td>
											<td width=80px><center><a onclick="return confirm('Are you sure?')" href="?delet=<?php echo $c['id'];?>" class="btn btn-danger btn-xs action">Delete</a></center></td>
										</tr>
								<?php }?>
								<?php 
									
									if(isset($_GET['delet']))
									{
										$delet=$_GET['delet'];
										$sql="delete from category where id='$delet'";
										$sql1="delete from question where cat_id='$delet'";
										$result=mysqli_query($mysqli,$sql);
										$result1=mysqli_query($mysqli,$sql1);
										if($result && $result1)
										{
											header("location:Delete.php");	
										}
										
										else{
											?>
											<script>
												alert("Fail to delete data");
												window.location.href="Delete.php";
											</script>
											 
										<?php	
										}
									}
								}
								else
								{
									echo "There are no subject";
								}
								?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
		</div>
		<div class="col-sm-2"></div>
		</div>

	</body>
</html>
