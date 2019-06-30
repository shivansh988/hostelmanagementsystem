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


if($_SERVER["REQUEST_METHOD"]=="POST"){
$fname1=$_POST["fname"];
$lname1=$_POST["lname"];
$reg1=$_POST["regno"];
$gender1=$_POST["gender"];
$contact1=$_POST["conno"];

if($fname1==="" || $lname1==="" || $contact1==="" || $reg1==="" || $gender1==="")
{
	
 echo "<script>alert('please enter full information');</script>";
}
else{
$sql1="update registration set fname='$fname1' ,lname='$lname1', reg_no=$reg1, 
con_no=$contact1 , gender='$gender1' where email='$email';";
if($conn->query($sql1))
{
	echo "<script>alert('record is updated!!');</script>";
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
<link rel="stylesheet" href="dynstyle.css">
<link rel="stylesheet" href="profile.css">
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

<div style="important;padding:20px !important;margin-top:30px !important;border:thin solid #000 !important;">
<h1><?php echo $name."'s Profile";?> </h1>
<table class="table borderless">
<td><label>First Name</label><span style="color:red;">
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){if($fname1===""){echo "*not filled";}}?></span></td>
</tr>
<tr>
<td colspan="2"><input type="text" name="fname" placeholder="enter first name" 
value="<?php echo $name;?>" pattern="[a-zA-Z]{1,}" required/></td>

</tr>
<tr>
<td><label>Last Name</label><span style="color:red;">
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){if($lname1===""){echo "*not filled";}}?></span></td>
</tr>
<tr>
<td  colspan="2"><input type="text" name="lname" placeholder="enter last name" value="
<?php echo $lname;?>" pattern="[a-zA-Z]{1,}" required /></td>
</tr>

<tr>
<td colspan="2"><label>Registeration no.</label><span style="color:red;">
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){if($reg1===""){echo "*not filled";}}?></span></td>
</tr>

<tr>
<td colspan="2"><input type="number" name="regno" 
value="<?php echo $reg; ?>" placeholder="enter Registration number"/></td>
</tr>

<tr>
<td colspan="2"><label>Gender</label><span style="color:red;">
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){ if($gender1===""){echo "*not filled";}}?></span></td>
</tr>

<tr>

<td colspan="2"><select class="form-control" style="width:80% !important;" name="gender" placeholder="select gender">
<option value="Male" <?php if ($gender=="Male") echo "selected"; ?>>Male</option>
<option value="Female" <?php if ($gender=="Female") echo "selected";?>>Female</option>
<option value="other" <?php if ($gender=="other") echo "selected";?>>other</option>
</select></td>
</tr>
<tr>
<td colspan="2"><label>Contect no.(10-digit)</label><span style="color:red;">
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){ if($contact1===""){echo "not filled";}}?></span></td>
</tr>
<tr>
<td colspan="2"><input type="text" maxlength="10" pattern="[1-9]{1}[0-9]{9}" name="conno" placeholder="enter contact number" 
value="<?php echo $con;?>"/></td>
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

</table>
<input type="submit" value="Update Data" class="btn btn-info"/>

</div>
</form></div>
</div>

</body>

</html>