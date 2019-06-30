<?php
session_start();
include 'server.php';


if($_SERVER["REQUEST_METHOD"]=="POST"){

$pass=$_POST["password"];
$email=$_POST["email"];

$sql="select * from registration where email='$email'";

$ra=$conn->query($sql);


if($ra-> num_rows > 0){
	
	while($row=$ra->fetch_assoc()){
			$_SESSION["email"]=$row['email'];
			$_SESSION["pass"]=$row['password'];
	if($row['email']===$email && $p=$row['password']===$pass)
		{
			header('location:profile.php');
		}
		else{
			echo "<script>alert('wrong password');</script>";
		}
	}
	
}
else
{
	echo "<script>alert('you are not registred!!');</script>";
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
<link rel="stylesheet" href="dynstyle.css">
<link rel="stylesheet" href="dynamic1.css">
<script src="dynimic.js"></script>
<style>

table td input{width:80% !important;}
  table.borderless td,table.borderless th{
     border: none !important;
}

</style>
<script>

</script>
</head>
<body>
<?php include 'check3.php';?>
<?php include 'sidebar1.php';?>
<div class="container-fluid">
<div id="div5">
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<div style="padding:20px !important;margin-top:30px !important;border:thin solid #000 !important;">
<h1>Login Here</h1>
<table class="table borderless">
<td colspan="2"><label>Enter User Name</label></td>
</tr>
<tr>
<td colspan="2"><input type="email" name="email" placeholder="enter username"/></td>
</tr>
<tr>
<td colspan="2"><label>Enter password</label></td>
</tr>
<tr>
<td colspan="2"><input type="password" name="password" placeholder="enter password"/></td>
</tr><tr></table>
<input type="submit" value="Login" class="btn btn-info"/></div></form>
</div>
</div>


</body>
</html>