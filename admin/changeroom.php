<?php
session_start();
include '../server.php';


if(isset($_POST['submit'])){
	$id=$_GET['id'];

$room=$_POST['room'];
if($room==="")
{
	
 echo "<script>alert('please select room');</script>";
}
else{
$sql1="update bookhostel set room_no=$room where reg_no=$id;";

if($conn->query($sql1))
{
	echo "<script>alert('record is updated!!');</script>";
	header('location:managestu.php');
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
function show(str)
{
	if(str=="")
	{
		document.getElementById("seates").innerHTML="";
		return;
	}
	if(window.XMLHttpRequest){
		xmlhttp= new XMLHttpRequest();
	}
	else
	{
		xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function (){
		if(this.readyState==4 && this.status==200)
		{
			document.getElementById("seates").innerHTML=this.responseText;
		}
	}
	xmlhttp.open("GET","getinfo.php?g="+str,true);
	xmlhttp.send();
}
</script>
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
<h1>Change Student room</h1>
<hr/>
<table class="table borderless">
<tr>
<td><label for="room">Change Room:</label>
</td>
<td>
<select class="form-control" name="room" onChange="show(this.value)">
<option value="">Change Room</option>
<?php
$sql2="select * from rooms";
$result2=$conn->query($sql2);
if($result2->num_rows > 0)
{
	while($row2=$result2->fetch_assoc())
	{
		echo "<option value='".$row2['room_no']."'>".$row2['room_no']."</option>";
	}
	}
?>
</select>
<span id="seates" style="color:red;" ></span>
</td>
</div>
</tr>

</table>
<center><input type="submit" name="submit" value="Update Data" class="btn btn-info"/></center>

</div>
</form></div>
</div>

</body>
</html>