<?php include "../global/connection.php"; ?>
<?php
$submenu_id=$_GET['id'];
$menu_id=$_GET['cat'];
$action=$_GET['action'];
if($submenu_id!='' && $action=='Active'){
	$sql1 = "update submenu set valid=1  where submenu_id='$submenu_id'";
}else if($submenu_id!='' && $action=='Regular'){
	$sql1 = "update submenu set valid=0  where submenu_id='$submenu_id'";
}
$res=mysqli_query($conn,$sql1);
if($res){
	header('location: submenu.php?cat='.$menu_id.'&success');
}else{
	header('location: submenu.php?cat='.$menu_id.'&error');
}
?>