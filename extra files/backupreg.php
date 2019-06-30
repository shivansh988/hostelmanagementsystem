<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hostel1";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$pass=$_POST["password"];
$cpass=$_POST["cpassword"];
$reg=$_POST["regno"];
$email=$_POST["email"];
$gender=$_POST["gender"];
$contact=$_POST["conno"];

?>
<?php
if($email==="" || $fname==="" || $lname==="" || $pass==="" || $cpass==="" || $contact==="" || $reg==="" || $gender==="")
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
 $sql="insert into registration (fname,lname,reg_no,gender,email,con_no,password)
 values('$fname','$lname',$reg,'$gender','$email',$contact,'$pass');";
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
<style>

table td input{width:80% !important;}
  table.borderless td,table.borderless th{
     border: none !important;
}
</style>
<script>

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
<td><input type="text" name="fname" placeholder="enter first name" value="<?php if($_SERVER["REQUEST_METHOD"]=="POST"){ echo $fname;}?>" /></td>
<td><input type="text" name="lname" placeholder="enter last name" value="<?php if($_SERVER["REQUEST_METHOD"]=="POST"){ echo $lname;}?>" /></td>
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
<tr>
<td colspan="2"><label>Contect no.(10-digit)</label><span style="color:red;">
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){ if($contact===""){echo "not filled";}}?></span></td>
</tr>
<tr>
<td colspan="2"><input type="number" name="conno" placeholder="enter contact number" value="<?php if($_SERVER["REQUEST_METHOD"]=="POST"){ echo $contact;}?>"/></td>
</tr>
<tr>
<td colspan="2"><label>password</label><span style="color:red;">
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){ if($pass===""){echo "*not filled";}}?></span></td>
</tr>
<tr>
<td colspan="2"><input type="password" name="password" placeholder="enter password"/></td>
</tr>
<tr>
<td colspan="2"><label>confirm password</label><span style="color:red;">
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){ if($cpass===""){echo "*not filled";}}?></span></td>
</tr>
<tr>
<td colspan="2"><input type="password" name="cpassword" placeholder="reenter password"/></td>
</tr>
</table>
<input type="submit"  class="btn btn-info"/>
</div>
</form></div>
</div>
</body>
