<?php include "../global/connection.php"; ?>
<?php
$sl_id=$_GET['id'];
$page=$_GET['page'];
$boldtext=mysqli_real_escape_string($conn,$_POST['boldtext']);
$description=mysqli_real_escape_string($conn,$_POST['description']);
$seo_title=mysqli_real_escape_string($conn,$_POST['seo_title']);
$seo_description=mysqli_real_escape_string($conn,$_POST['seo_description']);
$seo_tags=mysqli_real_escape_string($conn,$_POST['seo_tags']);

if($seo_title == ''){ $seo_title = $boldtext; }
if($sl_id==''){
	$sql1 = "insert into blog (boldtext,description,seo_title,seo_description,seo_tags) values('$boldtext','$description','$seo_title','$seo_description','$seo_tags')";
	$res=mysqli_query($conn,$sql1);
	$sl_id=mysqli_insert_id($conn);
}else{
	$sql1 = "update blog set boldtext='$boldtext',description='$description',seo_title='$seo_title',seo_description='$seo_description',seo_tags='$seo_tags'  where sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
}
if ($_FILES['banner_image']['name']!='') {
			
	$tempFile = $_FILES['banner_image']['tmp_name'];          //3             
	$targetPath = '../uploads/blog/'; 
	$ext = end((explode(".", $_FILES['banner_image']['name'])));
	$file_name = 'banner'.date('ymdhis').'.'.$ext;
	$targetFile = $targetPath.$file_name;  //5
	move_uploaded_file($tempFile, $targetFile); //6
	$banner_image = $file_name;
				
	$sql1 = "update blog set banner_image='$banner_image' where sl_id='$sl_id'";
	$res=mysqli_query($conn,$sql1);
}
if($res){
	header('location: blogs.php?success');
}else{
	header('location: blogs.php?error');
}
?>
