<?php 
include 'server.php';

$sql2="select cor from department where det='".$_REQUEST['g']."';";
$result2=$conn->query($sql2);
echo '<select class="form-control" name="course">';
echo '<option value="">Select course</option>';




	while($row2=$result2->fetch_assoc())
	{
		echo "<option value='".$row2['cor']."'>".$row2['cor']."</option>";
	}
	

echo "</select>";



?>