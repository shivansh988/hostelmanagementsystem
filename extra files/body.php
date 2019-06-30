<html>
<head>
<title>Login</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
   table.borderless td,table.borderless th{
     border: none !important;
}
table td input{width:100% !important;}
</style>
</head>
<body>
<div class="container-fluid">
<div id="div5" style="margin-left:250px">
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