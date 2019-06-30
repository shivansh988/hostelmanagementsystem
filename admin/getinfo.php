<?php
include '../server.php';

$room=intval($_GET['g']);
$sql="select seater,fees from rooms where room_no=$room;";
$result=$conn->query($sql);

if($result->num_rows > 0)
{
	while($row=$result->fetch_assoc())
	{
		$seater=$row['seater'];
		$fees=$row['fees'];
	}
	$sql2="select * from bookhostel where room_no=$room;";
	$result2=$conn->query($sql2);
	if($result2->num_rows < $seater)
	{
		$left=($seater)-($result2->num_rows);
		echo "seat is avaliable. ".$left." seats left out of ".$seater.".       ".$fees." rent per mounth.";
	}
	else
	{
		echo "no seat is avaliable";
	}
	
}
?>