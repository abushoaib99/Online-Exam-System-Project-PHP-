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

$qus=new users;
//print_r();
if(!empty($_POST['cat']))
{
	$cat=$_POST['cat'];
	$qus->qus_show($cat);
	$_SESSION['cat']=$cat;
}

?>


<!DOCTYPE html>
	<html>
		<head>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			<link rel="icon" href="favicon.png"/>
			<title>Online Quiz</title>
			<script type="text/javascript">
				function timeout()
				{
					var hours=Math.floor(timeleft/3600);
					var minute=Math.floor((timeleft-(hours*3600))/60);
					var second=timeleft%60;
					var hr=checktime(hours);
					var mint=checktime(minute);
					var sec=checktime(second);
					if(timeleft<=0)
					{
						clearTimeout(tm);
						document.getElementById("form1").submit();
					}
					else
					{
						document.getElementById("time").innerHTML="Time left: "+hr+":"+mint+":"+sec;
					}
					timeleft--;
					var tm=setTimeout(function(){timeout()},1000);
				}

				function checktime(msg)
				{
					if(msg<10)
					{
						msg="0"+msg;
					}
					return msg;
				}
			</script>
		</head>
		
		<body onload="timeout()">

			<div class="container">
				<div class="col-sm-2"></div>
					<div class="col-sm-8">
						<ul class="pager">
							<li><a href="home.php">Previous</a></li>
							<li><a href="#">Next</a></li>
						</ul>
						<div style="margin-top:10px" class="panel panel-primary">
							<div style="text-align:center;font-size:25px;font-family:arial black"class="panel-heading">Online Quiz</div>
						</div> 
						<script>
						var timeleft=2*60*60;
						</script>
						<?php 
						$i=1;
						if(!empty($qus->qus)){?>
							<div id="time" style="float:right;font-size:20px">Timeout</div>
						<?php

						foreach($qus->qus as $question){?>
						<form action="answer.php" method="post" id="form1">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th class="alert alert-success">&nbsp;Q.<?php echo $i;?>&emsp;<?php echo $question['question'];?></th>
									</tr>
								</thead>
								<tbody class="alert alert-info">
									<?php if(isset($question['answer1'])){?>
										<tr>
											<td><label>&nbsp;1&emsp;<input type="radio" value="0" name="<?php echo $question['id'];?>"/>&nbsp;<?php echo $question['answer1'];?></label></td>
										</tr>
									<?php }?>
									<?php if(isset($question['answer2'])){?>
										<tr>
											<td><label>&nbsp;2&emsp;<input type="radio" value="1" name="<?php echo $question['id'];?>"/>&nbsp;<?php echo $question['answer2'];?></label></td>
										</tr>
									<?php }?>
									<?php if(isset($question['answer3'])){?>
										<tr>
											<td><label>&nbsp;3&emsp;<input type="radio" value="2" name="<?php echo $question['id'];?>"/>&nbsp;<?php echo $question['answer3'];?></label></td>
										</tr>
									<?php }?>
									<?php if(isset($question['answer4'])){?>
										<tr>
											<td><label>&nbsp;4&emsp;<input type="radio" value="3" name="<?php echo $question['id'];?>"/>&nbsp;<?php echo $question['answer4'];?></label></td>
										</tr>
									<?php }?>
										<tr style="display:none">
											<td><input type="radio" checked="checked" style="display:none;" value="no_attempt" name="<?php echo $question['id'];?>"/></td>
										</tr>
								</tbody>
							</table>
								<?php $i++;}?>
							
							<center><input type="submit" value="submit Quiz" class="btn btn-success"/></center>
						</form>
							
							<?php }
								else
								{
									echo "Question are not set";
								}
							?>
							
						
					</div>
					<div class="col-sm-2"></div>
			</div>

		</body>
	</html>
