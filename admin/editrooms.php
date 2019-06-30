<?php
session_start();
include '../server.php';


if(isset($_POST['submit'])){
	$id=$_GET['id'];
	$seater1=$_POST["seater"];
//$roomno1=$_POST['roomno'];
$fees1=$_POST["fees"];

if($seater1==="" || $fees1==="")
{
	
 echo "<script>alert('please enter full information');</script>";
}
else{
$sql1="update rooms set seater=$seater1 ,fees=$fees1 where id=$id;";
if($conn->query($sql1))
{
	echo "<script>alert('record is updated!!');</script>";
}

}


}
	$id=$_GET['id'];
$sql="select * from rooms where id=$id;";
$result=$conn->query($sql);

if($result->num_rows > 0)
{
	while($row=$result->fetch_assoc())
	{
		$seater=$row['seater'];
		$roomno=$row['room_no'];
		$fees=$row['fees'];
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
<h1>Edit Room Details</h1>
<hr/>
<table class="table borderless">

<tr>
<td style="text-align:right;"><label for="seater">Seater</label><span style="color:red;">
<?php if(isset($_POST['submit'])){ if($seater1===""){echo "*not filled";}}?></span></td>

<td><input type="text" name="seater" value="<?php echo $seater;?>"/></td>
</tr>

<tr>
<td style="text-align:right;"><label for="roomno">Room no.</label><span style="color:red;">
</span></td>

<td><input type="text" name="roomno" value="<?php echo $roomno;?>" disabled /></td>
</tr>

<tr>
<td style="text-align:right;"><label for="fees">Fees</label><span style="color:red;">
<?php if(isset($_POST['submit'])){ if($fees1===""){echo "*not filled";}}?></span></td>

<td><input type="text" name="fees" value="<?php echo $fees;?>"/></td>
</tr>
</table>
<center><input type="submit" name="submit" value="Update Data" class="btn btn-info"/></center>

</div>
</form></div>
</div>

</body>
</html>