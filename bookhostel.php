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

$email=$_SESSION["email"];

$sql="select * from registration where email='$email';";
$result=$conn->query($sql);
if($result->num_rows > 0)
{
	while($row=$result->fetch_assoc())
	{
		$name=$row['fname'];
		$lname=$row['lname'];
		$reg=$row['reg_no'];
		$con=$row['con_no'];
		$gender=$row['gender'];
		$dep=$row['department'];
		$course=$row['course'];
	}
}

if($_SERVER["REQUEST_METHOD"]=="POST"){

$reg1=$reg;
$c_ad=$_POST["address"];
$c_ct=$_POST["city"];
$c_st=$_POST["state"];
$c_pin=$_POST["pin"];
$p_ad=$_POST["paddress"];
$p_ct=$_POST["pcity"];
$p_st=$_POST["pstate"];
$p_pin=$_POST["ppin"];
$dep1=$dep;
$course1=$course;
if($c_ad==="" || $c_ct==="" || $c_st==="" ||
 $c_pin==="" || $p_ad===""||$p_ad==="" || $p_ct==="" || $p_st==="" )
{
	
 echo "<script>alert('please enter full information');</script>";
}
else{
$sql1="INSERT INTO `bookhostel`(`reg_no`,`c_address`, `c_city`, `c_state`, `C_pin`, `p_address`,
 `p_city`, `p_state`, `p_pin`,`department`,`course`) VALUES ($reg1,'$c_ad','$c_ct','$c_st',$c_pin,'$p_ad','$p_ct','$p_st',$p_pin,'$dep1','$course1');";
if($conn->query($sql1))
{
	echo "<script>alert('Request is Sent');</script>";
}

}
}
$sql="select * from registration where email='$email';";
$result=$conn->query($sql);
if($result->num_rows > 0)
{
	while($row=$result->fetch_assoc())
	{
		$name=$row['fname'];
		$lname=$row['lname'];
		$reg=$row['reg_no'];
		$con=$row['con_no'];
		$gender=$row['gender'];
		$dep=$row['department'];
		$course=$row['course'];
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

</script>
</head>
<body>

<?php include 'headprofile.php';?>
<?php include 'sidebarprofile.php';?>
<div class="container-fluid">
<div id="div5">

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

<div style="important;padding:20px !important;margin-top:30px !important;border:thin solid #000 !important;">
<h1>Request Hostel</h1>
<table class="table borderless">
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
<td><label>Department</label><span style="color:red;">
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){if($dep===""){echo "*not filled";}}?></span></td>
</tr>
<tr>
<td  colspan="2"><input type="text" name="department" placeholder="enter department" value="
<?php echo $dep;?>" disabled /></td>
</tr>
<tr>
<td><label>Course</label><span style="color:red;">
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){if($course===""){echo "*not filled";}}?></span></td>
</tr>
<tr>
<td  colspan="2"><input type="text" name="course" placeholder="enter department" value="
<?php echo $course;?>" disabled /></td>
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
<span style="color:red;">
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){if($c_ad===""){echo "*not filled";}}?></span></td>
<td class="address1"><textarea class="form-control" rows="5" name="address"></textarea></td>
</tr>
</div>
<div class="form-group">
<tr>
<td><label for="city">City:</label>
<span style="color:red;">
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){if($c_ct===""){echo "*not filled";}}?></span></td>
<td><input type="text" class="form-control" name="city"/></td>
</tr>
</div>
<div class="form-group">
<tr>
<td><label for="state">Select State:</label>
<span style="color:red;">
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){if($c_st===""){echo "*not filled";}}?></span></td>
<td>
<select class="form-control" name="state">
<option value="">Select State</option>
<?php
$sql2="select * from states";
$result2=$conn->query($sql2);
if($result2->num_rows > 0)
{
	while($row2=$result2->fetch_assoc())
	{
		echo "<option value='".$row2['state']."'>".$row2['state']."</option>";
	}
	}
?>
</select>
</td>


</div>
<div class="form-group">

<tr>
<td><label for="pin">Pin Code:</label>
<span style="color:red;">
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){if($c_pin===""){echo "*not filled";}}?></span></td>
<td><input type="number" class="form-control" name="pin"/></td>
</tr>
</div>

<tr><th>Permanent Address:</th></tr>
<div class="form-group">
<tr>
<td><label for="paddress">Address:</label>
<span style="color:red;">
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){if($p_ad===""){echo "*not filled";}}?></span></td>
<td><textarea class="form-control" rows="5" name="paddress"></textarea></td>
</tr>
</div>
<div class="form-group">
<tr>
<td><label for="pcity">City:</label>
<span style="color:red;">
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){if($p_ct===""){echo "*not filled";}}?></span></td>
<td><input type="text" class="form-control" name="pcity"/></td>
</tr>
</div>
<div class="form-group">
<tr>
<td><label for="pstate">Select State:</label>
<span style="color:red;">
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){if($p_st===""){echo "*not filled";}}?></span></td>
<td>
<select class="form-control" name="pstate">
<option value="">Select State</option>
<?php
$sql2="select * from states";
$result2=$conn->query($sql2);
if($result2->num_rows > 0)
{
	while($row2=$result2->fetch_assoc())
	{
		echo "<option value='".$row2['state']."'>".$row2['state']."</option>";
	}
	}
?>
</select>
</td>
</div>
<div class="form-group">

<tr>
<td><label for="ppin">Pin Code:</label>
<span style="color:red;">
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){if($p_pin===""){echo "*not filled";}}?></span></td>
<td><input type="number" class="form-control" name="ppin"/></td>
</tr>
</div>
</table>
<input type="submit" value="Submit Request" class="btn btn-info"/>

</div>
</form></div>
</div>

</body>

</html>