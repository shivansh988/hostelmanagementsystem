<?php

include '../server.php';
session_start();
$user=$_SESSION["user"];


if($_SERVER["REQUEST_METHOD"]=="POST"){
$email1=$_POST["email"];


if($email1==="")
{
	
 echo "<script>alert('please enter full information');</script>";
}
else{
$sql1="update admin set email='$email1' where user='$user';";
if($conn->query($sql1))
{
	echo "<script>alert('record is updated!!');</script>";
}

}
}
$sql="select * from admin where user='$user';";
$result=$conn->query($sql);
if($result->num_rows > 0)
{
	while($row=$result->fetch_assoc())
	{
		$user=$row['user'];
		$email=$row['email'];
	}
}

?>

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
table td input{width:80% !important;}
  table.borderless td,table.borderless th{
     border: none !important;
}


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
</head>
</body>
<?php include 'headadmin.php';?>
<?php include 'sidebaradmin.php';?>
<div class="container-fluid">
<div id="div5">

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

<div style="important;padding:20px !important;margin-top:30px !important;border:thin solid #000 !important;">
<h1><?php echo $user."'s Profile";?> </h1>
<table class="table borderless">

<tr>
<td><label>User Name</label><span style="color:red;">
</span></td>
</tr>
<tr>
<td  colspan="2"><input type="text" name="user" placeholder="enter last name" value="
<?php echo $user;?>"  pattern="[a-zA-Z]{1,}" required /></td>
</tr>

<tr>
<td colspan="2"><label>email
<span style="color:red;">
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){if($email===""){echo "*not filled";}}?></span></label><span style="color:red;">
</tr>
<tr>
<td colspan="2"><input type="email" name="email" placeholder="enter email" 
value="<?php echo $email;?>" disabled /></td>
</tr>

</table>
<input type="submit" value="Update Data" class="btn btn-info"/>

</div>
</form></div>
</div>

</body>