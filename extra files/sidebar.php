<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
.sidebar
{
	width:200px;
	height:100%;
	background-color:#111;
	padding-top:50px;
	position:fixed;
	left:0;
	top:48px;
	overflow-x:hidden;
}
.list-group-item{
	background-color:#111 !important;
	border:none !important;
	color:white !important;
}
#main{
	color:#fffdd0;
	padding-left:30px;
	
}

   table.borderless td,table.borderless th{
     border: none !important;
}
table td input{width:100% !important;}

#div2{
	
margin-left:300px;

}
</style>

</head>


<body>
<?php include 'check.php';?>
<div class="sidebar list-group">
<label id="main">Main</label>
<a href="#" class="list-group-item"><i class="glyphicon glyphicon-file"></i>  User Registration</a>
<a href="#" class="list-group-item"><i class="glyphicon glyphicon-user"></i>  User Login</a>
<a href="#" class="list-group-item"><i class="glyphicon glyphicon-lock"></i>  Admin Login</a>
</div>
<div class="container-fluid">
<div id="div2">
<form action="login.php" method="post">
<div style="padding:20px !important;margin-top:30px !important;border:thin solid #000 !important;">
<h1>Login Here</h1>
<table class="table borderless">
<td colspan="2">Enter User Name</td>
</tr>
<tr>
<td colspan="2"><input type="text" name="uname" placeholder="enter username"/></td>
</tr>
<tr>
<td colspan="2">Enter password</td>
</tr>
<tr>
<td colspan="2"><input type="password" name="password" placeholder="enter password"/></td>
</tr><tr></table>
<input type="submit" value="Login" class="btn btn-info"/></div></form>
</div>
</div>

</body>
</html>