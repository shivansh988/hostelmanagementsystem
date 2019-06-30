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

$(document).ready(function(){
	$("#room").click(function(){
		$("#a").hide();
	});
</script>
</head>
<body>
<?php include 'headadmin.php';?>
<?php include 'sidebaradmin.php';?>
<div class="container-fluid">
<div id="div5"><div class="panel panel-warning">
<div class="panel-body adj" id="pan1">
My Profile
</div>
<div class="panel-footer adj2">
<a href="adminprofile.php">full details -></a>
</div>
</div>
<div class="panel panel-warning">
<div class="panel-body adj" id="pan2">
Students
</div>
<div class="panel-footer adj2">
<a href="editrooms.php">see details -></a>
</div>
<div class="panel panel-warning">
<div class="panel-body adj" id="pan2">
Rooms
</div>
<div class="panel-footer adj2">
<a href="roomdetails.php">see details -></a>
</div>

</div>
</div>
</div>
</body>
</html>