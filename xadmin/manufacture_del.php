<?php include "../global/connection.php"; ?>
<?php
$sl_id=$_GET['id'];
if($sl_id!=''){
	$sql1 = "delete from manufacture  where sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
}
if($res){	
		header('location: manufacture.php?success');
}else{
		header('location: manufacture.php?error');
}
?>