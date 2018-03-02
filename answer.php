<?php
include("class/users.php");
if($_SESSION['email']==true)
	{
		$_SESSION['email'];
	}
	else
	{
		header('location:index.php');
	}

$ans=new users;
$answer=$ans->answer($_POST);
?>
<!DOCTYPE html/>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<link rel="icon" href="favicon.png"/>
		<title>Online Quiz</title>
	</head>
	
	<body>
		<center>
			
			<?php
				$total_qus=$answer['right']+$answer['wrong']+$answer['no_answer'];
				$attempt_qus=$total_qus-$answer['no_answer'];
				$percentage=($answer['right']*100)/$total_qus;
			?>
			<div class="container">
			<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<ul class="pager">
						<li><a href="home.php">Previous</a></li>
						<li><a href="#" disabled>Next</a></li>
					</ul>
					<div style="margin-top:10px" class="panel panel-primary">
						<div style="text-align:center;font-size:25px;font-family:arial black"class="panel-heading">Result Sheet</div>
					</div> 
					
					<table class="table table-bordered">
						<thead >
							<tr style="background:#ccd7ff;color:#4d73ff">
								<th >Total number of Question</th>
								<th ><?php echo $total_qus;?></th>
							</tr>
						</thead>
						<tbody >
							<tr class="alert alert-info">
								<td><strong>Attempted Question</strong></td>
								<td><strong><?php echo $attempt_qus;?></strong></td>
							</tr>
							<tr class="alert alert-success">
								<td><strong>Right Answer</strong></td>
								<td><strong><?php echo $answer['right'];?></strong></td>
							</tr>
							<tr class="alert alert-danger">
								<td><strong>Wrong Answer</strong></td>
								<td><strong><?php echo $answer['wrong'];?></strong></td>
							</tr>
							<tr class="alert alert-warning">
								<td><strong>No Answer</strong></td>
								<td><strong><?php echo $answer['no_answer'];?></strong></td>
							</tr>
							<tr style="background:#666666;color:#bfff00">
								<td ><strong>Your Result</strong></td>
								<td ><strong><?php echo $percentage."%";?></strong></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col-sm-4"></div>
			</div>
		</center>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>