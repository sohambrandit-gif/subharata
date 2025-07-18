<?php include "../global/connection.php"; ?>
<?php
$submenu_id=$_GET['id'];

$submenu=mysqli_real_escape_string($conn,$_POST['submenu']);
$menu_id=mysqli_real_escape_string($conn,$_GET['cat']);

			
if($submenu_id==''){
	$sql1 = "insert into submenu (submenu, menu_id) values('$submenu','$menu_id')";
	$res=mysqli_query($conn,$sql1);
	$submenu_id=mysqli_insert_id($conn);
}else{
	$sql1 = "update submenu set menu_id='$menu_id', submenu='$submenu'   where submenu_id='$submenu_id'";
	$res=mysqli_query($conn,$sql1);
}
if($res){
	header('location: submenu.php?cat='.$menu_id.'&success');
}else{
	header('location: submenu.php?cat='.$menu_id.'&error');
}
?>
