<?php

include '../server.php';
session_start();
$reg=$_SESSION['reg'];
$sql="select * from registration where reg_no=$reg;";
$result=$conn->query($sql);

if($_SERVER["REQUEST_METHOD"]=="POST")
{   
	$room=$_POST['room'];
	$sql1="update bookhostel set room_no=$room  where reg_no=$reg;";
	if($conn->query($sql1)){
	echo "<script>alert('room added sucessfully');</script>";
	header('Location:managestu.php');
	}
	else
	{
		echo "<script>alert('problem while adding room to database');</script>";
	}
}
if($result->num_rows > 0)
{
	while($row=$result->fetch_assoc())
	{
		$name=$row['fname'];
		$lname=$row['lname'];
		$reg=$row['reg_no'];
		$con=$row['con_no'];
		$gender=$row['gender'];
		$email=$row['email'];
	}
}

$sql2="select * from bookhostel where reg_no=$reg;";
$result2=$conn->query($sql2);
if($result2->num_rows > 0)
{
	while($row2=$result2->fetch_assoc())
	{
		$caddress=$row2['c_address'];
		$ccity=$row2['c_city'];
		$cstate=$row2['c_state'];
		$cpin=$row2['c_pin'];
		
		$paddress=$row2['p_address'];
		$pcity=$row2['p_city'];
		$pstate=$row2['p_state'];
		$ppin=$row2['p_pin'];
		
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

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

<div style="important;padding:20px !important;margin-top:30px !important;border:thin solid #000 !important;">
<h1>Request Hostel</h1>
<table class="table borderless">

<div class="form-group">
<tr>
<td><label for="room">Select Room:</label>
</td>
<td>
<select class="form-control" name="room" onChange="show(this.value)" >
<option value="">Select Room</option>
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
<tr><th>Personal Info:</th></tr>
<td><label>First Name</label></td>
</tr>
<tr>
<td colspan="2"><input type="text" name="fname" placeholder="enter first name" 
value="<?php echo $name;?>" disabled /></td>

</tr>
<tr>
<td><label>Last Name</label></td>
</tr>
<tr>
<td  colspan="2"><input type="text" name="lname" placeholder="enter last name" value="
<?php echo $lname;?>" disabled /></td>
</tr>

<tr>
<td colspan="2"><label>Registeration no.</label></td>
</tr>

<tr>
<td colspan="2"><input type="number" name="regno" 
value="<?php echo $reg; ?>" placeholder="enter Registration number" disabled /></td>
</tr>

<tr>
<td colspan="2"><label>Gender</label></td>
</tr>

<tr>

<td colspan="2"><select class="form-control" style="width:80% !important;" name="gender" placeholder="select gender" disabled >
<option value="Male" <?php if ($gender=="Male") echo "selected"; ?>>Male</option>
<option value="Female" <?php if ($gender=="Female") echo "selected";?>>Female</option>
<option value="other" <?php if ($gender=="other") echo "selected";?>>other</option>
</select></td>
</tr>
<tr>
<td colspan="2"><label>Contect no.(10-digit)</label></td>
</tr>
<tr>
<td colspan="2"><input type="number" name="conno" placeholder="enter contact number" 
value="<?php echo $con;?>" disabled /></td>
</tr>
<tr>
<td colspan="2"><label>email</label><span style="color:red;">
</tr>
<tr>
<td colspan="2"><input type="email" name="email" placeholder="enter email" 
value="<?php echo $email;?>" disabled /></td>
</tr>

<tr><th>Correspondance Address:</th></tr>
<div class="form-group">
<tr>
<td class="address"><label for="address">Address:</label>
</td>
<td class="address1"><textarea class="form-control" rows="5" name="address"  disabled ><?php echo $caddress;?></textarea></td>
</tr>
</div>
<div class="form-group">
<tr>
<td><label for="city">City:</label>
</td>
<td><input type="text" class="form-control" name="city" value="<?php echo $ccity;?>" disabled /></td>
</tr>
</div>
<div class="form-group">
<tr>
<td><label for="state">State:</label>
</td>
<td>
<input type="text" class="form-control" name="cstate" value="<?php echo $cstate;?>" disabled />
</td>
</div>
<div class="form-group">

<tr>
<td><label for="pin">Pin Code:</label>
</td>
<td><input type="number" class="form-control" name="pin" value="<?php echo $cpin;?>" disabled /></td>
</tr>
</div>

<tr><th>Permanent Address:</th></tr>
<div class="form-group">
<tr>
<td><label for="paddress">Address:</label>
</td>
<td><textarea class="form-control" rows="5" name="paddress"  disabled ><?php echo $paddress;?></textarea></td>
</tr>
</div>
<div class="form-group">
<tr>
<td><label for="pcity">City:</label>
</td>
<td><input type="text" class="form-control" name="pcity" value="<?php echo $pcity;?>" disabled /></td>
</tr>
</div>
<div class="form-group">
<tr>
<td><label for="pstate">State:</label>
</td>
<td>
<input type="text" class="form-control" name="pstate" value="<?php echo $pstate;?>" disabled />
</td>
</div>
<div class="form-group">

<tr>
<td><label for="ppin">Pin Code:</label>
</td>
<td><input type="number" class="form-control" name="ppin" value="<?php echo $ppin;?>" disabled /></td>
</tr>
</div>
</table>
<input type="submit" value="Assign Hostel" class="btn btn-info"/>

</div>
</form></div>
</div>

</body>
</html>