<?php include "../global/connection.php"; ?>
<?php
$order_id=$_POST['order_id'];
$track=$_POST['track'];
if($order_id!=''){
		$sql1 = "update sk_order set track='$track' where order_id='$order_id'";
		$res=mysqli_query($conn,$sql1);
	
}
if($res){	
		header('location: order.php?success');
}else{
		header('location: order.php?error');
}
?>