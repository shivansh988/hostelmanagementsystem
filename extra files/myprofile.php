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
		$reg=$row['reg_no'];
		$con=$row['con_no'];
		$gender=$row['gender'];
	}
}
?>
</body>
</body>