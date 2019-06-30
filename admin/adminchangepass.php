<?php

include '../server.php';
session_start();
$password=$_SESSION["pass"];
$user=$_SESSION["user"];
if($_SERVER["REQUEST_METHOD"]=="POST"){
$opass=$_POST["oldpassword"];
$npass=$_POST["newpassword"];
$cpass=$_POST["cfpassword"];

if($opass==="" || $npass==="" || $cpass==="")
{
	
 echo "<script>alert('please enter full information');</script>";
}
else
{
	if($opass===$password)
	{
		if($npass===$cpass)
		{
				
$sql1="update admin set password='$npass' where user='$user';";
if($conn->query($sql1))
{
	echo "<script>alert('Password is updated!!');</script>";
	session_destroy();
	header('location:../adminlogin.php');
}
	
	}
		else{
				echo "<script>alert('new password and confirm password do not match!!');</script>";

		}
	}
else
{
	echo "<script>alert('old password do not match!!');</script>";

}
}
}
?>


<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="../dynstyle.css">
<link rel="stylesheet" href="../profile.css">
<script src="../dashbord.js"></script>
<style>


</style>
<script>
function confirm()
{
	confirm("do you want to delete");
}
$(document).ready(function(){
	$("#room").click(function(){
		$("#a").hide();
	});
</script>
<style>
.big{
	
}
table td input{width:80%  !important;
height:40px  !important;
}
table td label{
	height:40px  !important;
	padding-top:10px !important;
}
  table.borderless td,table.borderless th{
     border: none !important;
}

</style>

<script>
function reloc()
{
	window.location = "profile.php";
}
</script>
</head>
<body>
<?php include 'headadmin.php';?>
<?php include 'sidebaradmin.php';?>
<div class="container-fluid">

<div id="div5">

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

<div style="important;padding:20px !important;margin-top:30px !important;margin-right:150px !important;border:thin solid #000 !important;">
<h1>Change Password</h1>
<hr/>
</br>
</br>
<table class="table borderless">

<tr>
<td style="text-align:right;"><label for="oldpassword">Old Password</label><span style="color:red;">
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){ if($opass===""){echo "*not filled";}}?></span></td>

<td><input type="password" name="oldpassword"/></td>
</tr>

<tr>
<td style="text-align:right;"><label for="newpassword">New Password</label><span style="color:red;">
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){ if($npass===""){echo "*not filled";}}?></span></td>

<td><input type="password" name="newpassword"/></td>
</tr>

<tr>
<td style="text-align:right;"><label for="cfpassword">Confirm Password</label><span style="color:red;">
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){ if($cpass===""){echo "*not filled";}}?></span></td>

<td><input type="password" name="cfpassword"/></td>
</tr>
</table>
<center><input type="submit" value="Update Password" class="btn btn-info"/>
<input type="button" class="btn btn-default" value="cancel" onClick="reloc()" /></center>

</div>
</form></div>
</div>

</body>
</html>