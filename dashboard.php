<?php
//error handler function
function customError($errno, $errstr) {
  
}

//set error handler
set_error_handler("customError");


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
<link rel="stylesheet" href="profile.css">
<script src="dashbord.js"></script>
<link rel="stylesheet" href="dashbord.css">
<style>
#pan1{
	 background-color:blue;
	 color:white;
	 
}
#pan2{
	 background-color:green;
	 color:white;
	
}

.adj{
	width:180px !important;
	height:180px !important;
	font-size:40px !important;
}

.adj2{
	width:180px !important;
	height:40px !important;
}
</style>
<script>

</script>
</head>
<body>
<?php include 'headprofile.php';?>
<?php include 'sidebarprofile.php';?>
<div class="container-fluid">
<div id="div5"><div class="panel panel-warning">
<div class="panel-body adj" id="pan1">
My Profile
</div>
<div class="panel-footer adj2">
<a href="profile.php">full details -></a>
</div>
</div>
<div class="panel panel-warning">
<div class="panel-body adj" id="pan2">
My Room
</div>
<div class="panel-footer adj2">
<a href="roomdetails.php">see details -></a>
</div>
</div>
</div>
</div>
</body>
</html>