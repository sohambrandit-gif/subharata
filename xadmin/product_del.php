<?php include "../global/connection.php"; ?>
<?php
$sl_id=$_GET['id'];
$cat_id=$_GET['cat_id'];
if($sl_id!=''){
	$sql1 = "delete from product  where sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
}

if($res){
	
		header('location: product.php?cat='.$cat_id.'&success');
	
}else{
		header('location: product.php?cat='.$cat_id.'&error');
	
}

?>