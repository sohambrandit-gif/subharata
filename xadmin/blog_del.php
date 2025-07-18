<?php include "../global/connection.php"; ?>
<?php
$sl_id=$_GET['id'];
$sql1 = "delete from blog  where sl_id='$sl_id'";
$res=mysqli_query($conn,$sql1);
if($res){
	
		header('location: blogs.php?success');
}else{
		header('location: blogs.php?error');
}
?>
