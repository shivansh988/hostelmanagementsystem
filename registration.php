<?php
session_start();
include 'server.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$pass=$_POST["password"];
$cpass=$_POST["cpassword"];
$reg=$_POST["regno"];
$email=$_POST["email"];
$gender=$_POST["gender"];
$contact=$_POST["conno"];
$dep=$_POST["department"];
$course=$_POST["course"];

?>
<?php
if($email==="" || $fname==="" || $lname==="" || $pass==="" || $cpass==="" || $contact==="" || $reg==="" || $gender===""|| $dep=="" || $course=="")
{
	
 echo "<script>alert('please enter full information');</script>";			
 
}
else
{
		if($pass!==$cpass)
	{    

 echo	"<script>alert('password does not match or password length < 8');</script>";
		}
	
else{ 
 $sql="insert into registration(fname,lname,reg_no,gender,email,con_no,password,department,course)
 values('$fname','$lname',$reg,'$gender','$email',$contact,'$pass','$dep','$course');";
		 if($conn->query($sql)){
			
			
			echo "<script>alert('you are sucessfully registred.');</script>";
			
			header('Location:check2.php');
			
			die();
		 }
		if($conn->query($sql)===false){
		echo "<script>alert('wrong info or contact or email or regstration number already exist!!');</script>";
		
		}
}
}
}

?>
<head>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="dynstyle.css">
<link rel="stylesheet" href="dynamic1.css">
<script src="dynimic.js"></script>
<script type="text/javascript">
function show(str)
{
	if(str=="")
	{
		document.getElementById("show").innerHTML="";
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
			document.getElementById("show").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","getdata_dep.php?g="+str,true);
	xmlhttp.send();
}
</script>
<style>

table td input{width:80% !important;}
  table.borderless td,table.borderless th{
     border: none !important;
}
</style>
<script>
function reg()
{
	window.location = "registration.php";
}
</script>
</head>
</body>

<?php include 'check3.php';?>
<?php include 'sidebar1.php';?>
<div class="container-fluid">
<div id="div5">

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

<div style="important;padding:20px !important;margin-top:30px !important;border:thin solid #000 !important;">
<h1>Register Here</h1>
<table class="table borderless">
<tr>
<td><label>First Name</label><span style="color:red;">
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){if($fname===""){echo "*not filled";}}?></span></td>
<td><label>Last Name</label><span style="color:red;">
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){if($lname===""){echo "*not filled";}}?></span></td>
</tr>
<tr>
<td><input type="text" name="fname" placeholder="enter first name" pattern="[a-zA-Z]{1,}" required value="<?php if($_SERVER["REQUEST_METHOD"]=="POST"){ echo $fname;}?>" /></td>
<td><input type="text" name="lname" placeholder="enter last name" value="
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){ echo $lname;} ?>"pattern="[a-zA-Z]{1,}" required /></td>
</tr>
<tr>
<td colspan="2"><label>Registeration no.</label><span style="color:red;">
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){if($reg===""){echo "*not filled";}}?></span></td>
</tr>

<tr>
<td colspan="2"><input type="number" name="regno" value="<?php if($_SERVER["REQUEST_METHOD"]=="POST"){ echo $reg;}?>" placeholder="enter Registration number"/></td>
</tr>

<tr>
<td colspan="2"><label>Select Gender</label><span style="color:red;">
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){ if($gender===""){echo "*not filled";}}?></span></td>
</tr>

<tr>

<td colspan="2"><select class="form-control" style="width:80% !important;" name="gender" placeholder="select gender">
<option value="">Select Gender</option>
<option value="Male" <?php if($_SERVER["REQUEST_METHOD"]=="POST"){if ($gender=="Male") echo "selected";}?>>Male</option>
<option value="Female" <?php if($_SERVER["REQUEST_METHOD"]=="POST"){if ($gender=="Female") echo "selected";}?>>Female</option>
<option value="other" <?php if($_SERVER["REQUEST_METHOD"]=="POST"){if ($gender=="other") echo "selected";}?>>other</option>
</select></td>
</tr>
<tr>
<td colspan="2"><label>email</label><span style="color:red;">
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){ if($email===""){echo "*not filled";}}?></span></td>
</tr>
<tr>
<td colspan="2"><input type="email" name="email" placeholder="enter email" value="<?php if($_SERVER["REQUEST_METHOD"]=="POST"){ echo $email;}?>"/></td>
</tr>
<div class="form-group">















































<tr>
<td><label for="pstate">Select Department:</label>
<span style="color:red;">
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){if($dep===""){echo "*not filled";}}?></span></td>
</tr><tr><td>
<select class="form-control" id="department" name="department" onChange="show(this.value)">
<option value="">Select department</option>
<?php
$sql2="select distinct det from department";
$result2=$conn->query($sql2);
if($result2->num_rows > 0)
{
	while($row2=$result2->fetch_assoc())
	{
		echo "<option value='".$row2['det']."'>".$row2['det']."</option>";
	}
	}
?>
</select>

</td>
</tr>
</div>
<div class="form-group">
<tr>
<td><label for="pstate">Select Course:</label>
<span style="color:red;">
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){if($course===""){echo "*not filled";}}?></span></td>
</tr>
<tr>
<td>
<div id="show"></div>


</td>
</tr>
</div>

<tr>
<td colspan="2"><label>Contect no.(10-digit)</label><span style="color:red;">
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){ if($contact===""){echo "not filled";}}?></span></td>
</tr>
<tr>
<td colspan="2"><input type="text" maxlength="10" pattern="[1-9]{1}[0-9]{9}" name="conno" placeholder="enter contact number" value="<?php if($_SERVER["REQUEST_METHOD"]=="POST"){ echo $contact;}?>"/></td>
</tr>
<tr>
<td colspan="2"><label>password</label><span style="color:red;">
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){ if($pass===""){echo "*not filled";}}?></span></td>
</tr>
<tr>
<td colspan="2"><input type="password" name="password" minlength="8" placeholder="enter password"/></td>
</tr>
<tr>
<td colspan="2"><label>confirm password</label><span style="color:red;">
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){ if($cpass===""){echo "*not filled";}}?></span></td>
</tr>
<tr>
<td colspan="2"><input type="password" name="cpassword" minlength="8" placeholder="reenter password"/></td>
</tr>
</table>
<input type="submit"  class="btn btn-info"/>
<input type="reset" value="Reset" class="btn btn-default" onClick="reg()">
</div>
</form></div>
</div>
<?php 
session_destroy(); 
?>
</body>
