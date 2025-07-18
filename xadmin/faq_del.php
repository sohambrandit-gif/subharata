<?php include "../global/connection.php"; ?>
<?php
$sl_id=$_GET['id'];
if($sl_id!=''){
	$sql1 = "delete from faq  where sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
}
if($res){	
		header('location: faq.php?success');
}else{
		header('location: faq.php?error');
}
?>