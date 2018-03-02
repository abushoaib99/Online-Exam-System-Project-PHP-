<?php
if($_POST['b']==1){
	extract($_POST);
	include("../class/users.php");
	$cat=new users;
	$qus=htmlentities($addcat);
	$query="insert into category values ('','$qus')";
	if($cat->add_category($query))
	{
		
		echo "Data insert successfully";
		header('location:AddSubject.php');
	}
}
else
	header("location:fdfdsf548541.ph.jfdsk");
?>