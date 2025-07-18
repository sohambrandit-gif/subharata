<?php include "../global/connection.php"; ?>
<?php
$submenu_id=$_GET['id'];
$menu_id=$_GET['cat'];
if($submenu_id!=''){
	$sql1 = "delete from submenu  where submenu_id='$submenu_id'";
	$res=mysqli_query($conn,$sql1);
}
if($res){
	header('location: submenu.php?cat='.$menu_id.'&success');
}else{
	header('location: submenu.php?cat='.$menu_id.'&error');
}
?>