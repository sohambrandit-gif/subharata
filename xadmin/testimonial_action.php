<?php include "../global/connection.php"; ?>
<?php
$sl_id=$_GET['id'];
$action=$_GET['action'];
if($sl_id!='' && $action=='Active'){
	$sql1 = "update testimonial set valid=1  where sl_id='$sl_id'";
}else if($sl_id!='' && $action=='Regular'){
	$sql1 = "update testimonial set valid=0  where sl_id='$sl_id'";
}
$res=mysqli_query($conn,$sql1);
if($res){
		header('location: testimonial.php?success');
}else{
		header('location: testimonial.php?error');
}
?>