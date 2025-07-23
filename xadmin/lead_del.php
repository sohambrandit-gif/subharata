<?php include "../global/function.php"; ?>
<?php
$sl_id=$_GET['id'];
$action=$_GET['action'];
if($sl_id!='' && $action=='Active'){
		$sql1 = "update user set valid=1 where sl_id='$sl_id'";
		$res=mysqli_query($conn,$sql1);
	}else if($sl_id!='' && $action=='Block'){
		$sql1 = "update user set valid=0 where sl_id='$sl_id'";
		$res=mysqli_query($conn,$sql1);
	}

else if($sl_id!='' && $action=='Verified'){
	$sql1 = "update user set student=1  where sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
}
else if($sl_id!='' && $action=='Unverified'){
	$sql1 = "update user set student=0  where sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
}
if($res){	
		header('location: lead.php?success');
}else{
		header('location: lead.php?error');
}
?>