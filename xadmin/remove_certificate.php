<?php include "../global/connection.php"; ?>
<?php
$sl_id=$_GET['id'];
	$sql1 = "update certificate set image=''  where sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);;
if($res){
		header('location: home.php?success');
}else{
		header('location: home.php?error');
}
?>