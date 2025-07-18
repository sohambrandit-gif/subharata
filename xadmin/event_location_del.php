<?php include "../global/connection.php"; ?>
<?php
$event_id = $_GET['event_id'] ?? '';
$sl_id=$_GET['id'];
if($sl_id!=''){
	$sql1 = "delete from event_location where sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
}
if($res){	
		header('location: event_location.php?event_id='.$event_id.'&success');
}else{
		header('location: event_location.php?event_id='.$event_id.'&success');
}
?>