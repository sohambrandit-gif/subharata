<?php include "../global/connection.php"; ?>
<?php
$sl_id=$_GET['id'];
$action=$_GET['action'];
$payment=$_GET['payment'];
if($action !=''){
	$sql1 = "update sk_order set status='$action' where order_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
	
}
if($payment !=''){
echo $sql1 = "update sk_order set payment='$payment' where order_id='$sl_id'";
$res=mysqli_query($conn,$sql1);
}
if($res){	
	header('location: order.php?success');
}else{
	header('location: order.php?error');
}
?>