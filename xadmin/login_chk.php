<?php include "../global/connection.php"; ?>
<?php
if($_POST['password']=='subhabrata@123'){
	 echo $_SESSION['admin_login']='1';
	header('location: classes.php');
}else{
	header('location: index.php?error');
}
?>