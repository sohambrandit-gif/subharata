<?php include "../global/connection.php"; ?>
<?php
$sl_id=$_GET['id'];
$cat_id=$_GET['cat'];
$action=$_GET['action'];
if($sl_id!='' && $action=='New'){
	$sql1 = "update product set new=1  where sl_id='$sl_id'";
}else if($sl_id!='' && $action=='Old'){
	$sql1 = "update product set new=0  where sl_id='$sl_id'";
}elseif($sl_id!='' && $action=='Featured'){
	$sql1 = "update product set featured=1  where sl_id='$sl_id'";
}else if($sl_id!='' && $action=='Regular'){
	$sql1 = "update product set featured=0  where sl_id='$sl_id'";
}else if($sl_id!='' && $action=='Active'){
	$sql1 = "update product set valid=1  where sl_id='$sl_id'";
}else if($sl_id!='' && $action=='Block'){
	$sql1 = "update product set valid=0  where sl_id='$sl_id'";
}else if($sl_id!='' && $action=='In Stock'){
	$sql1 = "update product set stock='In Stock'  where sl_id='$sl_id'";
}else if($sl_id!='' && $action=='Out of Stock'){
	$sql1 = "update product set stock='Out of Stock'  where sl_id='$sl_id'";
}


	$res=mysqli_query($conn,$sql1);


if($res){
	
		header('location: product.php?cat='.$cat_id.'&success');
	
}else{
		header('location: product.php?cat='.$cat_id.'&error');
	
}

?>