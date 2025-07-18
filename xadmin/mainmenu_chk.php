<?php include "../global/connection.php"; ?>
<?php
$sl_id=$_GET['id'];
$brand=mysqli_real_escape_string($conn,$_POST['brand']);

			
if($sl_id==''){
	$sql1 = "insert into brand (brand) values('$brand')";
	$res=mysqli_query($conn,$sql1);
	$sl_id=mysqli_insert_id($conn);
}else{
	$sql1 = "update brand set brand='$brand' where sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
}
if($res){
	header('location: mainmenu.php?success');
}else{
	header('location: mainmenu.php?error');
}
?>
