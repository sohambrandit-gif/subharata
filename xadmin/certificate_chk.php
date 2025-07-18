<?php include "../global/connection.php"; ?>
<?php
$sl_id=$_GET['id'];
$name=mysqli_real_escape_string($conn,$_POST['name']);
$type=mysqli_real_escape_string($conn,$_POST['type']);
$value=mysqli_real_escape_string($conn,$_POST['value']);
$expire=mysqli_real_escape_string($conn,$_POST['expire']);
$caption=mysqli_real_escape_string($conn,$_POST['caption']);
$category=mysqli_real_escape_string($conn,$_POST['category']);
if($sl_id==''){
	$sql1 = "insert into coupon (name,type,value,expire_date,caption,category) values('$name','$type','$value','$expire','$caption','$category')";
	$res=mysqli_query($conn,$sql1);
	$sl_id=mysqli_insert_id($conn);
}else{
	$sql1 = "update coupon set name='$name',value='$value',type='$type',expire_date='$expire' ,caption='$caption',category='$category' where sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
}
if ($_FILES['image']['name']!='') {
			
	$tempFile = $_FILES['image']['tmp_name'];          //3             
	$targetPath = '../uploads/coupon/'; 
	$ext = end((explode(".", $_FILES['image']['name'])));
	$file_name = 'coupon'.date('ymdhis').'.'.$ext;
	$targetFile = $targetPath.$file_name;  //5
	move_uploaded_file($tempFile, $targetFile); //6
	$image = $file_name;
				
	$sql1 = "update coupon set image='$image' where sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
}
if($res){
	header('location: certificate.php?success');
}else{
	header('location: certificate.php?error');
}
?>