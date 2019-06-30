<?php
//error handler function
function customError($errno, $errstr) {
  
}

//set error handler
set_error_handler("customError");


?>
<?php
session_start();
include 'server.php';

$email=$_SESSION['email'];
$sql="select * from registration where email='$email';";
$result=$conn->query($sql);
if($result->num_rows > 0){
	while($row=$result->fetch_assoc()){
		$regno=$row['reg_no'];
		$sql2="select * from bookhostel where reg_no=$regno;";
$result2=$conn->query($sql2);
if($result2->num_rows > 0){
	while($row2=$result2->fetch_assoc()){
		$roomno=$row2['room_no'];
			$sql3="select * from rooms where room_no=$roomno;";
$result3=$conn->query($sql3);
if($result3->num_rows > 0){
	while($row3=$result3->fetch_assoc()){
		$roomno=$row3['room_no'];
		$seater=$row3['seater'];
		$fees=$row3['fees'];
		
	}
}
	}
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
<link rel="stylesheet" href="dynstyle.css"></link>
<link rel="stylesheet" href="profile.css"></link>
<script src="profilejs.js"></script>
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
<?php include 'headprofile.php';?>
<?php include 'sidebarprofile.php';?>
<div class="container-fluid">
<div id="div5">
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<div style="padding:20px !important;margin-top:30px !important;border:thin solid #000 !important;">
<h1>Your Room Details</h1>
<table class="table borderless">

<tr>
<td><label for="roomno">Room Number</label></td>
<td><?php echo $roomno ?></td>
</tr>
<tr>
<td><label for="roomno">Seater</label></td>
<td><?php echo $seater ?></td>
</tr>
<tr>
<td><label for="roomno">rent per mounth</label></td>
<td><?php echo $fees ?></td>
</tr>
</table>
</div></form>
</div>
</div>


</body>

</html>