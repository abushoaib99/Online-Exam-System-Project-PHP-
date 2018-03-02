
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
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-danger">
					<div class="panel-heading">Online Quiz System</div>
					<div class="panel-body">Quiz</div>
				</div>
			</div>
		</div>
	</div>

	
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="panel panel-danger">
					<div class="panel panel-heading">Login Form</div>
					<div class="panel-body">
							<?php
							if(isset($_GET['run']) && $_GET['run']=="Failed")
							{
								echo "Your Email or Password is not correct";
								
								
							}
							else if(isset($_GET['run']) && $_GET['run']=="Deactive")
							{
								echo "Your Account has been disabled, please contact admin";
								session_start();
								session_destroy();
							}
							
							?>
						<form role="form" action="signin.php" method="post">
							<div class="form-group">
							
								<label for="email1">Email:</label>
								<input type="email" name="e1" class="form-control" id="email1" required placeholder="Enter email"/>
							</div>
							<div class="form-group"  method="post">
								<label for="pwd1">Password:</label>
								<input type="password" name="p1"  class="form-control" id="pwd1" required placeholder="Enter password"/>
							</div>
							
							<button type="submit" class="btn btn-default">Submit</button>
						</form>
					</div>
				</div>
			</div>
		
			<div class="col-sm-6">
				<div class="panel panel-danger">
					<div class="panel panel-heading">Signup Form</div>
					<div class="panel-body">
					<?php 
					if(isset($_GET['run']) && $_GET['run']=="success") 
					{
						echo "<mark>Your registration is successfully done</mark>";
					}
					
					?>
						<form role="form" method="post" action="singup.php" enctype="multipart/form-data">
							<div class="form-group">
								<label for="name">Name:</label>
								<input type="text" class="form-control" name="n" id="name" maxlength="30" required placeholder="Enter Name"/>
							</div>
							<div class="form-group">
								<label for="email">Email:</label>
								<input type="email" class="form-control" name="e" id="email" required  placeholder="Enter Email"/>
								<?php 
									if(isset($_GET['run']) && $_GET['run']=="exist")
									{
										echo "Email is already exist";
										
									}
								?>
							</div>
							<div class="form-group">
								<label for="pwd">Password:</label>
								<input type="password" class="form-control" name="p"id="pwd" maxlength="15" required  placeholder="Enter password"/>
								<?php 
									if(isset($_GET['run']) && $_GET['run']=="length")
									{
										echo "Password required minimum 8 character";
										
									}
								?>
							</div>
							<div class="form-group">
								<label for="file">Upload your Image:</label>
								<input type="file" class="form-control" id="file" name="img" required />
							</div>
						
							<button type="submit" id="b" name="b" value="1" class="btn btn-default">Submit</button>
						</form>
						<?php 
							$name=$email=$password="";
							if($_SERVER["REQUEST_METHOD"]=="POST"){
								$name=validate($_POST["n"]);
								$email=validate($_POST["e"]);
								$password=validate($_POST["p"]);
								
								echo "Name: ".$name."<br>";
								echo "Name: ".$email."<br>";
								echo "Name: ".$password."<br>";
								
							}
							function validate($data){
								$data=trim($data);
								$data=stripcslashes($data);
								$data=htmlspecialchars($data);
								return $data;
							}
							
						?>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
