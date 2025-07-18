<?php include "../global/connection.php"; ?>
<?php
$sl_id=$_GET['id'];
if($sl_id!=''){
	$sql1 = "delete from testimonial  where sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
}
if($res){	
		header('location: testimonial.php?success');
}else{
		header('location: testimonial.php?error');
}
?>