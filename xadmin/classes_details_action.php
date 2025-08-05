<?php include "../global/connection.php"; ?>
<?php

$sl_id=$_GET['id'];
$action=$_GET['action'];
if($sl_id!='' && $action=='Active'){
	$sql1 = "update class_details set valid=1  where sl_id='$sl_id'";
}else if($sl_id!='' && $action=='Regular'){
	$sql1 = "update class_details set valid=0  where sl_id='$sl_id'";
}
$res=mysqli_query($conn,$sql1);
if($res){
		header('location: classes_details.php?class_id=' . $class_id . '&success');
}else{
		header('location: classes_details.php?class_id=' . $class_id . '&error');
}
?>