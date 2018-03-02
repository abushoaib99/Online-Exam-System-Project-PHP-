<?php
include("class/users.php");
$email=$_SESSION['email'];
$profile=new users;
$profile->users_profile($email);
$profile->cat_show();

	if($_SESSION['email']==true)
	{
		$_SESSION['email'];
	}
	else
	{
		header('location:index.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link rel="icon" href="favicon.png"/>
  
  <title>Online Quiz</title>
  
</head>
<body>

<div class="container">


	<ul class="pager">
		<li><a href="index.php">Previous</a></li>
		<li><a href="#">Next</a></li>
	</ul>
	<div style="margin-top:10px" class="panel panel-primary">
		<div style="text-align:center;font-size:25px;font-family:arial black"class="panel-heading">Online Quiz</div>
	</div>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
    <li><a data-toggle="tab" href="#Profile">Profile</a></li>
    <li><a data-toggle="tab" href="#YourQuiz">Your Quiz</a></li>
	<?php
	$adminemail=$profile->adminEmail($_SESSION['email']);
	if($_SESSION['email']==$adminemail)
		echo '<li><a href="admin/index.php">Admin Panel</a></li>';
	?>
    <li style="float:right"><a href="logout.php">Logout</a></li>
  </ul>

  <div class="tab-content">
  
	 <div id="home" class="tab-pane fade in active">
      <h3>Home</h3>
	  
      <p>This platform for exam.</p>
    </div>
	
	<div id="Profile" class="tab-pane fade">
      <h3>Showing Profile</h3>
		<table class="table">
			<thead>
			  <tr>
				<th>Id</th>
				<th>Name</th>
				<th>Email</th>
				<th>Image</th>
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
				<td><img src="img/<?php echo $prof['img'];?>" alt="" width="25px" height="20px"/></td>
			  </tr>
			</tbody>
			<?php	}?>
		</table>
    </div>
	
    <div id="YourQuiz" class="tab-pane fade">
      <center><h4 style="color:#286090">Time: 2 Hour</center></h4>
      <center><button type="button" class="btn btn-primary" data-toggle="tab" href="#select">Start Quiz</button></center>
	  
		<div class="col-sm-4"></div>
			<div class="col-sm-4"><br>
			  <div id="select" class="tab-pane fade">
				 
				<form action="qus_show.php" method="post">
				<select class="form-control" id="" name="cat">
					<option disabled>select Subject</option>
					<?php
					foreach($profile->cat as $category)
					{?>
					<option value="<?php echo $category['id'];?>"><?php echo $category['cat_name'];?></option>
					<?php }?>
				</select><br>
				<center><input type="submit"  name="send" value="Start" class="btn btn-primary"/></center>
				 </form>
				  
				  
				</div>
			</div>
		<div class="col-sm-4"></div>
	</div>
  </div>
</div>

</body>
</html>
