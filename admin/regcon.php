<?php
session_start();
include '../server.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
	$regno=$_POST['stureg'];
	$sql="select * from bookhostel where reg_no=$regno";
	$result=$conn->query($sql);
	if($result->num_rows > 0){
		$_SESSION['reg']=$regno;
		header('Location:givehostel.php');
	}
	else
	{
		echo "<script>alert('no request for this registeration no. or wrong regstration no.');</script>";
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
table th{
	color:green;
	padding:10px;
}
label{
	padding-left:20px;
}
table td input{width:80% !important;}
  table.borderless td,table.borderless th{
     border: none !important;
}
table td{
	padding-left:0px !important;
}
.address{
	width:20%;
}

.address1{
	width:80%;
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
<body>
<?php include 'headadmin.php';?>
<?php include 'sidebaradmin.php';?>
<div class="container-fluid">
<div id="div5">

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

<div style="important;padding:20px !important;margin-top:30px !important;border:thin solid #000 !important;">
<h1>Enter::</h1>
<hr/>
<table class="table">
<tr>
<div class="form-group">
<td><label for="stureg">Student Registration no.</label></td>
<td><input type="number" class="control-flow" name="stureg" /></td>
</div>
</tr>
</table>

<input type="submit" class="btn btn-info"/>
</div>

</form>
</div>
</div>
</body>
</html>