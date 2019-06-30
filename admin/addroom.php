<?php
session_start();
include '../server.php';


if(isset($_POST['submit'])){
	
	$seater1=$_POST["seater"];
  $roomno1=$_POST['roomno'];
  $id1=$_POST['id'];
$fees1=$_POST["fees"];

if($seater1==="" || $fees1===""||$roomno1===""||$id1==="")
{
	
 echo "<script>alert('please enter full information');</script>";
}
else{
$sql1="insert into rooms(id,seater,room_no,fees) values ($id1,$seater1,$roomno1,$fees1)";

if($conn->query($sql1)==1)
{
	echo "<script>alert('record is added!!');</script>";
}
else{
	echo "<script>alert('either id or room no already exist or field contain non integer values');</script>";
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
<form method="post">

<div style="important;padding:20px !important;margin-top:30px !important;border:thin solid #000 !important;">
<h1>Add Room Details</h1>
<hr/>
<table class="table borderless">
<tr>
<td style="text-align:right;"><label for="id">Id</label><span style="color:red;">
<?php if(isset($_POST['submit'])){ if($id1===""){echo "*not filled";}}?></span></td>

<td><input type="text" name="id"/></td>
</tr>

<tr>
<td style="text-align:right;"><label for="seater">Seater</label><span style="color:red;">
<?php if(isset($_POST['submit'])){ if($seater1===""){echo "*not filled";}}?></span></td>

<td><input type="text" name="seater"/></td>
</tr>

<tr>
<td style="text-align:right;"><label for="roomno">Room no.</label><span style="color:red;">
<?php if(isset($_POST['submit'])){ if($roomno1===""){echo "*not filled";}}?></span></td>

<td><input type="text" name="roomno"/></td>
</tr>

<tr>
<td style="text-align:right;"><label for="fees">Fees</label><span style="color:red;">
<?php if(isset($_POST['submit'])){ if($fees1===""){echo "*not filled";}}?></span></td>

<td><input type="text" name="fees"/></td>
</tr>
</table>
<center><input type="submit" name="submit" value="Add Data" class="btn btn-info"/></center>

</div>
</form></div>
</div>

</body>
</html>