<?php include "../global/connection.php"; ?>
<?php
$sl_id=$_GET['id'];
$page=$_GET['page'];
$title1=mysqli_real_escape_string($conn,$_POST['title1']);
$description1=mysqli_real_escape_string($conn,$_POST['description1']);

if($sl_id==''){
	 $sql1 = "insert into services (title1,description1) values($title1','$description1')";
	$res=mysqli_query($conn,$sql1);
	$sl_id=mysqli_insert_id($conn);
}else{
	 $sql1 = "update services set title1='$title1',description1='$description1'  where sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
}


if($res){
	header('location: service.php?id='.$sl_id.'&success');
}else{
	header('location: service.php?id='.$sl_id.'&error');
}
?>
