<?php
include 'server.php';
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST"){

$pass=$_POST["password"];
$user=$_POST["uname"];

$sql="select * from admin where user='$user'";

$ra=$conn->query($sql);


if($ra-> num_rows > 0){
	
	while($row=$ra->fetch_assoc()){
			$_SESSION["user"]=$row['user'];
			$_SESSION["pass"]=$row['password'];
	if($row['user']===$user && $row['password']===$pass)
		{
			echo "<script>alert('welcome');</script>";
			header('location:admin/adminprofile.php');
		}
		else{
			echo "<script>alert('wrong password');</script>";
		}
	}
	
}
else
{
	echo "<script>alert('you are not admin!!');</script>";
}
}
?>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
#fields{
	padding:30px;
	background-color:white;
	width:40%;
}
#head{
    margin-top:150px;
	color:white;
}
.a
{  background-size:cover !important;
   width:100% !important; 
   height:100% !important;
   
   background-repeat:no-repeat !important;
	background-image:url("images/login.jpg") !important;
}

table td input{width:80% !important; height:50px !important;}
  table.borderless td,table.borderless th{
     border: none !important;
}
</style>
</head>
<body>
<div class="container-fluid a">

<center><div id="head">
<h2>Hostel Managment System</h2>
<div id="fields">
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<table class="table borderless">
<td colspan="2"><label>Admin User Name</label></td>
</tr>
<tr>
<td colspan="2"><input type="text" name="uname" placeholder="enter username"/></td>
</tr>
<tr>
<td colspan="2"><label>Enter password</label></td>
</tr>
<tr>
<td colspan="2"><input type="password" name="password" placeholder="enter password"/></td>
</tr><tr>
<tr>
<td><input type="submit" value="Login" class="btn btn-info" style="width:150px;margin-top:20px;"/></td>
</tr></table></form>
</div>
</div></center>
</div>
</body>
</html>