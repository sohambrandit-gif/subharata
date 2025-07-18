<?php include "../global/connection.php"; ?>
<?php
$sl_id=$_GET['id'];
$action=$_GET['action'];
if($sl_id!='' && $action=='Active'){
	$sql1 = "update manufacture set valid=1  where sl_id='$sl_id'";
}else if($sl_id!='' && $action=='Regular'){
	$sql1 = "update manufacture set valid=0  where sl_id='$sl_id'";
}
else if($sl_id!='' && $action=='Featured'){
	$sql1 = "update manufacture set featured=1  where sl_id='$sl_id'";
}
else if($sl_id!='' && $action=='Normal'){
	$sql1 = "update manufacture set featured=0  where sl_id='$sl_id'";
}
$res=mysqli_query($conn,$sql1);
if($res){
		header('location: manufacture.php?success');
}else{
		header('location: manufacture.php?error');
}
?>