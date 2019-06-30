<?php
include '../server.php';
if(isset($_GET['del']))
{   
	$id=intval($_GET['del']);
	$sql1="delete from rooms where reg_no=$id;";
	if($conn->query($sql1)){
	echo "<script>alert('data deleted sucessfully');</script>";
	}
	else
	{
		echo "<script>alert('problem while deleting');</script>";
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
<h1>Manage Strdent Room Alocation</h1>
<hr/>
<table class="table table-bordered table-hover table-striped"  style="margin-top:80px;">
<tr>
<th>Serial No.</th>
<th>Registration no.</th>
<th>Room no.</th>
<th>permanent address</th>
<th>city</th>
<th>state</th>
</tr>
<?php
$sql="select * from bookhostel;";
$result=$conn->query($sql);
$sr=1;
if($result->num_rows > 0)
{
	while($row=$result->fetch_assoc())
	{
		echo "<tr>";
        echo "<td>".$sr."</td>";
echo "<td>".$row['reg_no']."</td>";
echo "<td>".$row['room_no']."</td>";
echo "<td>".$row['p_address']."</td>";
echo "<td>".$row['p_city']."</td>";
echo "<td>".$row['p_state']."</td>";
echo "<td><a href='editrooms.php?id=".$row['id']."' ><i class='glyphicon glyphicon-edit'></i></a>
<a href='admin.php?del=".$row['reg_no']."'>
<i  class='glyphicon glyphicon-remove'></i></a></td>";
echo "</tr>";		
$sr=$sr+1;
	}
}
?>
</table>
</div>
</div>
</body>
</html>