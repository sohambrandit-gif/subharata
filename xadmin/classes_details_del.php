<?php include "../global/connection.php"; ?>
<?php
$sl_id=$_GET['id'];
if($sl_id!=''){
	$sql1 = "delete from class_details where sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
}
if($res){	
		header('location: classes_details.php?class_id=' . $class_id . '&success');
}else{
		header('location: classes_details.php?class_id=' . $class_id . '&error');
}
?>